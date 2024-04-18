<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Annee;
use App\Models\Transmission;
use App\Models\Traction;
use App\Models\Carburant;
use App\Models\Carrosserie;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1 Afficher toutes les filtres et initialiser leur valeur // 

        $marques = Marque::all();
        $carrosseries = Carrosserie::carrosseries();
        $urlSvgCarrosserie = Carrosserie::all();
        $tractions = Traction::tractions();
        $carburants = Carburant::carburants();
        $transmissions = Transmission::transmissions();
        
        // 1.1 Afficher les filtres de carrosseries
        $filtresCarrosserie = [];
        
        foreach ($carrosseries as $key => $carrosserie) 
        {
            $filtresCarrosserie[$key]['id'] = $carrosserie['id'];
            $filtresCarrosserie[$key]['nom'] = $carrosserie['nom'];
            $filtresCarrosserie[$key]['url_svg'] = $urlSvgCarrosserie[$key]['nom']['en']; // gerer l'url du svg
        }

        // 1.2 Afficher les filtres d'annees
        $optionsAnnee = [
            0 => [
                "value" => "1980",
                "label" => "1980 and before",
            ],
            1 => [
                "value" => "1990",
                "label" => "1981 - 1990",
            ],
            2 => [
                "value" => "2000",
                "label" => "1991 - 2000",
            ],
            3 => [
                "value" => "2010",
                "label" => "2001 - 2010",
            ],
            4 => [
                "value" => "2020",
                "label" => "2011 - 2020",
            ],
            4 => [
                "value" => "2021",
                "label" => "2000 and after",
            ]
        ];

        // 2 Afficher la liste de toutes les voitures de BD // 

        $voitures = Voiture::all();
        $donneesVoiture = [];

        foreach ($voitures as $key => $voiture) 
        {
            $photoPrincipale = Photo::select()->where('voiture_id', $voiture['id'])->orderBy('principal','DESC')->first(); 
            $annee = $voiture->annee;
            $marque = $voiture->marque;
            $modele = $voiture->modele;
            $traction = Traction::tractionParId($voiture['traction_id']);
            $carburant = Carburant::carburantParId($voiture['carburant_id']);
            $transmission = Transmission::transmissionParId($voiture['transmission_id']);

            $donneesVoiture[$key]['photoPrincipale'] = $photoPrincipale->nom;
            $donneesVoiture[$key]['annee'] = $annee->annee;
            $donneesVoiture[$key]['marque'] = $marque->nom;
            $donneesVoiture[$key]['modele'] =  $modele->nom;
            $donneesVoiture[$key]['traction'] = $traction[0]['nom'];
            $donneesVoiture[$key]['transmission'] = $transmission[0]['nom'];
            $donneesVoiture[$key]['carburant'] = $carburant[0]['nom'];
            $donneesVoiture[$key]['prix_vente'] = round($voiture['prix_vente']);
        }

        return view('voiture.index', ['marques' => $marques, 'annees' => $optionsAnnee, 'tractions'=> $tractions, 'transmissions'=> $transmissions, 'carburants'=> $carburants, 'carrosseries' => $filtresCarrosserie, 'voitures'=> $donneesVoiture]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marques = Marque::all();
        $annees = Annee::all();
        $transmissions = Transmission::all();
        $tractions = Traction::all();
        $carburants = Carburant::all();
        $carrosseries = Carrosserie::all();
        return view('voiture.create', ['marques' => $marques, 'annees' => $annees, 'transmissions' => $transmissions, 'tractions' => $tractions, 'carburants' => $carburants, 'carrosseries' => $carrosseries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'marque_id' => 'required|exists:marques,id',
            'modele_id' => 'required|exists:modeles,id',
            'annee_id' => 'required|exists:annees,id',
            'transmission_id' => 'required|exists:transmissions,id',
            'traction_id' => 'required|exists:tractions,id',
            'carburant_id' => 'required|exists:carburants,id',
            'carrosserie_id' => 'required|exists:carrosseries,id',
            'proprietaire' => 'required',
            'date_arrive' => 'required|date|before_or_equal:today',
            'photo_principale' => 'required',
            'photo_secundaire' => 'required',
            'prix_paye' => 'required',
            'prix_vente' => 'required',
            'disponible' => 'required',
        ]);
        
        $voiture = new Voiture;
        $voiture->fill($request->all());
        $voiture->save();

        $photo = new Photo();
        //$file = $request->photo_principale;
        $file = $request->file('photo_principale');
        $filename = time() . "." . $file->getClientOriginalExtension();
        $request->photo_principale->move('assets', $filename);

        $photo->nom = $filename;
        $photo->principal = 1;
        $photo->voiture_id = $voiture->id;
        $photo->save();

        $filesSecundaires = $request->file('photo_secundaire');

        foreach ($filesSecundaires as $i => $fileSecundaire) {
            $fileSecundaireName = time() . "_$i." . $fileSecundaire->getClientOriginalExtension();
            $fileSecundaire->move("assets/img/voitures", $fileSecundaireName);

            // $photo = Photo::create([
            //     'nom' => $fileSecundaireName,
            //     'principal' => 0,
            //     'voiture_id' => 1
            // ]);
            $photo = new Photo();
            $photo->nom = $fileSecundaireName;
            $photo->principal = 0;
            $photo->voiture_id = $voiture->id;
            $photo->save();    
        }

        $voitures = Voiture::all();
        return redirect()->route('voiture.index', ['voitures' => $voitures]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function select(Request $request)
    {        
        // 1 Afficher toutes les filtres et initialiser leur valeur // 

        $marques = Marque::all();
        $annees = Annee::all();
        $carrosseries = Carrosserie::carrosseries();
        $urlSvgCarrosserie = Carrosserie::all();
        $tractions = Traction::tractions();
        $carburants = Carburant::carburants();
        $transmissions = Transmission::transmissions();

        // 1.1 recuperer tous les ids de marques depuis BD (quand aucune marques n'est selectionne, selectionner toutes les marques comme filtres)
        $idsVoitureParMarque = [];   
        
        foreach ($marques as $key => $marque) 
        {
            $idsVoitureParMarque[] = $marque['id'];
        }
 
        // 1.2 recuperer toutes les donnees de carrosseries depuis BD et afficher les filtres de carrosseries (quand aucune carrosseries n'est selectionne, selectionner toutes les carrosseries comme filtres)
        $filtresCarrosserie = [];
        $idsVoitureParCarrosserie = [];

        foreach ($carrosseries as $key => $carrosserie) 
        {
            $filtresCarrosserie[$key]['id'] = $carrosserie['id'];
            $filtresCarrosserie[$key]['nom'] = $carrosserie['nom'];
            $filtresCarrosserie[$key]['url_svg'] = $urlSvgCarrosserie[$key]['nom']['en'];  // gerer l'url du svg
            $idsVoitureParCarrosserie[] = $carrosserie['id'];
        }
               
        // 1.3 recuperer tous les ids d'annees depuis BD et afficher les filtres d'annees (quand aucune annees n'est selectionne, selectionner toutes les annees comme filtres)
        $idsVoitureParAnnee = [];

        foreach ($annees as $key => $annee) 
        {
            $idsVoitureParAnnee[] = $annee['id'];
        }
        
        $optionsAnnee = [
            0 => [
                "value" => "1980",
                "label" => "1980 and before",
            ],
            1 => [
                "value" => "1990",
                "label" => "1981 - 1990",
            ],
            2 => [
                "value" => "2000",
                "label" => "1991 - 2000",
            ],
            3 => [
                "value" => "2010",
                "label" => "2001 - 2010",
            ],
            4 => [
                "value" => "2020",
                "label" => "2011 - 2020",
            ],
            4 => [
                "value" => "2021",
                "label" => "2000 and after",
            ]
        ];

        // 1.4 recuperer tous les ids de tractions depuis BD (quand aucune tractions n'est selectionne, selectionner toutes les tractions comme filtres)
        $idsVoitureParTraction = [];

        foreach ($tractions as $key => $traction) 
        {
            $idsVoitureParTraction[] = $traction['id'];
        }

        // 1.5 recuperer tous les ids de carburants depuis BD (quand aucune carburants n'est selectionne, selectionner toutes les carburants comme filtres)
        $idsVoitureParCarburant = [];

        foreach ($carburants as $key => $carburant) 
        {
            $idsVoitureParCarburant[] = $carburant['id'];
        }

        // 1.6 recuperer tous les ids de transmissions depuis BD (quand aucune transmissions n'est selectionne, selectionner toutes les transmissions comme filtres)
        $idsVoitureParTransmission = [];

        foreach ($transmissions as $key => $transmission) 
        {
            $idsVoitureParTransmission[] = $transmission['id'];
        }


        // 2 Recuperer la valeur des filtres au clic // 

        // 2.1 si une ou plusieurs marques est selectionneess
        if (isset($request['marques']))
        {
            // vider les ids de marques
            $idsVoitureParMarque = []; 

            // saisir les ids de marques selectionnees
            foreach($request['marques'] as $key=>$value)
            {       
                $idsVoitureParMarque[$key] = $value;
            }
        }

        // 2.2 si une ou plusieurs carrosseries est selectionnees
        if (isset($request['carrosseries']))
        {
            // vider les ids de carrosseries
            $idsVoitureParCarrosserie = [];   

            // saisir les ids de carrosseries selectionnees
            foreach($request['carrosseries'] as $key=>$value)
            {          
                $idsVoitureParCarrosserie[$key] = $value;
            }
        }

        // 2.3 si une ou plusieurs annees est selectionnees
        if (isset($request['annees']))
        {
            
            // vider les ids d'annees
            $idsVoitureParAnnee = [];   

            // saisir les ids d'annees selectionnees
            foreach($request['annees'] as $key=>$value)
            {   
                if(($value) == 1980)
                {
                    $annees = Annee::select('id')
                                ->where('annee', '<=', $value)
                                ->get();
                }
                else if(($value) == 2021)
                {
                    $annees = Annee::select('id')
                                ->where('annee', '>=', $value)
                                ->get();
                }
                else
                {
                    $annees = Annee::select('id')
                                ->where('annee', '>', $value - 10)
                                ->where('annee', '<=', $value)
                                ->get();
                }

                foreach($annees as $key=>$annee)
                {
                    $idsVoitureParAnnee[] = $annee['id'];
                }
            }
        }

        // 2.4 si une traction est selectionnee
        if (isset($request['tractions']) && $request['tractions'] != null)
        {
            // saisir l'id de traction selectionnee
            $idsVoitureParTraction = [];    
            $idsVoitureParTraction[0] = $request['tractions'];   
        }

        // 2.5 si un carburant est selectionnee
        if (isset($request['carburants']) && $request['carburants'] != null)
        {
            // saisir l'id de carburant selectionnee
            $idsVoitureParCarburant = [];    
            $idsVoitureParCarburant[0] = $request['carburants'];   
        }

        // 2.6 si une transmission est selectionnee
        if (isset($request['transmissions'] ) && $request['transmissions'] != null)
        {
            // saisir l'id de transmission selectionnee
            $idsVoitureParTransmission = [];    
            $idsVoitureParTransmission[0] = $request['transmissions'];   
        }

        
        // 3 Envoyer la requete de filtrage a la BD // 
        
        $voitures = Voiture::select()
                    ->whereIn('marque_id', $idsVoitureParMarque)
                    ->whereIn('carrosserie_id', $idsVoitureParCarrosserie)
                    ->whereIn('annee_id', $idsVoitureParAnnee)
                    ->whereIn('traction_id', $idsVoitureParTraction)
                    ->whereIn('carburant_id', $idsVoitureParCarburant)
                    ->whereIn('transmission_id', $idsVoitureParTransmission)
                    ->get();
        

        // 4 Afficher la liste de voitures filtres // 

        $donneesVoiture = [];

        foreach ($voitures as $key => $voiture) 
        {
            $photoPrincipale = Photo::select()->where('voiture_id', $voiture['id'])->orderBy('principal','DESC')->first(); 
            $annee = $voiture->annee;
            $marque = $voiture->marque;
            $modele = $voiture->modele;
            $traction = Traction::tractionParId($voiture['traction_id']);
            $carburant = Carburant::carburantParId($voiture['carburant_id']);
            $transmission = Transmission::transmissionParId($voiture['transmission_id']);

            $donneesVoiture[$key]['photoPrincipale'] = $photoPrincipale->nom;
            $donneesVoiture[$key]['annee'] = $annee->annee;
            $donneesVoiture[$key]['marque'] = $marque->nom;
            $donneesVoiture[$key]['modele'] =  $modele->nom;
            $donneesVoiture[$key]['traction'] = $traction[0]['nom'];
            $donneesVoiture[$key]['transmission'] = $transmission[0]['nom'];
            $donneesVoiture[$key]['carburant'] = $carburant[0]['nom'];
            $donneesVoiture[$key]['prix_vente'] = round($voiture['prix_vente']);
        }

        return view('voiture.index', ['marques' => $marques, 'annees' => $optionsAnnee, 'tractions'=> $tractions, 'transmissions'=> $transmissions, 'carburants'=> $carburants, 'carrosseries' => $filtresCarrosserie, 'filtres'=>$request, 'voitures'=> $donneesVoiture]);
    }
}
