<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Annee;
use App\Models\Photo;
use App\Models\Transmission;
use App\Models\Traction;
use App\Models\Carburant;
use App\Models\Carrosserie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
                "value" => "1919",
                "label" => "1919 and before",
            ],
            1 => [
                "value" => "1939",
                "label" => "1920 - 1939",
            ],
            2 => [
                "value" => "1959",
                "label" => "1940 - 1959",
            ],
            3 => [
                "value" => "1979",
                "label" => "1960 - 1979",
            ],
            4 => [
                "value" => "1999",
                "label" => "1980 - 1999",
            ], 
            5 => [
                "value" => "2000",
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

            $donneesVoiture[$key]['id'] = $voiture->id;
            $donneesVoiture[$key]['disponible'] = $voiture->disponible;
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
            'date_arrive' => 'required|date|before_or_equal:today',
            'photo' => 'required|array|max:10',
            'photo.*' => 'required|file|mimes:jpeg,jpg,png,gif,svg|max:5120|dimensions:min_width=1024',
            'prix_paye' => 'required|numeric|decimal:0,2',
            'prix_vente' => 'required|numeric|decimal:0,2',
            'kilometrage' => 'required|numeric|decimal:0,2',
        ]);
        
        // Création nouvelle voiture
        $voiture = new Voiture;
        $voiture->proprietaire = Auth::user()->id;
        $voiture->fill($request->all());
        $voiture->save();
        
        // Création photos
        $photos = $request->file('photo');

        foreach ($photos as $i => $photo) 
        {
            //Compresser images, ref: https://www.prashantwebdeveloper.in/laravel-image-compression-project/
            $photoName = time() . "_$i." . $photo->getClientOriginalExtension();
            $imagepath = public_path('/assets/img/');
            $pathToOutput = public_path('/assets/img/voitures/');

            $photo->move($imagepath, $photoName);
            $optimizerChain = OptimizerChainFactory::create();
            $optimizerChain->optimize($imagepath.$photoName,$pathToOutput.$photoName);
            unlink($imagepath.$photoName);

            // Redimensionner images ref: https://image.intervention.io/v3
            $manager = new ImageManager(new Driver());
            $image = $manager->read($pathToOutput.$photoName);
            $image->scale(width: 1024); // resize image proportionally to 1024px width
            $image->save($pathToOutput.$photoName);

            $photo = new Photo();
            $photo->nom = $photoName;
            $photo->principal = 0;
            $photo->voiture_id = $voiture->id;
            $photo->save();    
        }

        $voitures = Voiture::all();
        return redirect()->route('voiture.index', ['voitures' => $voitures])->with('success', trans('You\'ve added a new car successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        $photoPrincipale = Photo::select()->where('voiture_id', $voiture['id'])->orderBy('principal','DESC')->first(); 
        $photos = Photo::select()->where('voiture_id', $voiture['id'])->orderBy('principal', 'DESC')->get();

        $annee = Annee::select()->where('id', $voiture['annee_id'])->first()->annee;
        $marque = Marque::select()->where('id', $voiture['marque_id'])->first()->nom;
        $modele = Modele::select()->where('id', $voiture['modele_id'])->first()->nom;
        $prix = Voiture::select()->where('id', $voiture['id'])->first()->prix_vente;

        // data en json depuis Resources
        $transmission = Transmission::transmissionParId($voiture['transmission_id']);
        $traction = Traction::tractionParId($voiture['traction_id']);
        $carburant = Carburant::carburantParId($voiture['carburant_id']);
        $carrosserie = Carrosserie::carrosserieParId($voiture['carrosserie_id']);

        $data['id'] = $voiture['id'];
        $data['annee'] = $annee;
        $data['marque'] = $marque;
        $data['modele'] = $modele;
        $data['prix'] = round($prix);
        $data['transmission'] = $transmission[0]['nom'];
        $data['traction'] = $traction[0]['nom'];
        $data['carburant'] = $carburant[0]['nom'];
        $data['carrosserie'] = $carrosserie[0]['nom'];
        
        return view('voiture.show', ['voiture' => $data, 'photos'=>$photos, 'photoPrincipale' => $photoPrincipale]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voiture $voiture)
    {
        $marques = Marque::all();
        $annees = Annee::all();
        $transmissions = Transmission::all();
        $tractions = Traction::all();
        $carburants = Carburant::all();
        $carrosseries = Carrosserie::all();

        return view('voiture.edit', compact('marques', 'annees', 'transmissions', 'tractions', 'carburants', 'carrosseries', 'voiture'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voiture $voiture)
    {
        $request->validate([
            'marque_id' => 'required|exists:marques,id',
            'modele_id' => 'required|exists:modeles,id',
            'annee_id' => 'required|exists:annees,id',
            'transmission_id' => 'required|exists:transmissions,id',
            'traction_id' => 'required|exists:tractions,id',
            'carburant_id' => 'required|exists:carburants,id',
            'carrosserie_id' => 'required|exists:carrosseries,id',
            'date_arrive' => 'required|date|before_or_equal:today',
            'prix_paye' => 'required|numeric|decimal:0,2',
            'prix_vente' => 'required|numeric|decimal:0,2',
            'kilometrage' => 'required|numeric|decimal:0,2',
        ]);

        $voiture->proprietaire = Auth::user()->id;
        $voiture->fill($request->all());
        $voiture->save();

        return redirect()->route('voiture.index')->with('success', trans('You\'ve modified a new car successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voiture $voiture)
    {
        // Supprimer le photo principale
        $photo = Photo::select()->where('voiture_id', $voiture->id)->where('principal', '1')->first();
        if ($photo) {
            $photo->delete();
        }

        // Supprimer les photos secundaires
        $photos = Photo::select()->where('voiture_id', $voiture->id)->where('principal', '0')->get();
        if ($photos) {
            foreach ($photos as $photo) {
                $photo->delete();
            }
        }

        // Supprimer la voiture
        $voiture->delete();
        return redirect()->route('voiture.index')->with('success', trans('You\'ve deleted a car successfully'));
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
                "value" => "1919",
                "label" => "1919 and before",
            ],
            1 => [
                "value" => "1939",
                "label" => "1920 - 1939",
            ],
            2 => [
                "value" => "1959",
                "label" => "1940 - 1959",
            ],
            3 => [
                "value" => "1979",
                "label" => "1960 - 1979",
            ],
            4 => [
                "value" => "1999",
                "label" => "1980 - 1999",
            ], 
            5 => [
                "value" => "2000",
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
                if(($value) == 1919)
                {
                    $annees = Annee::select('id')
                                ->where('annee', '<=', $value)
                                ->get();
                }
                else if(($value) == 2000)
                {
                    $annees = Annee::select('id')
                                ->where('annee', '>=', $value)
                                ->get();
                }
                else
                {
                    $annees = Annee::select('id')
                                ->where('annee', '>', $value - 20)
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

            $donneesVoiture[$key]['id'] = $voiture['id'];
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

    /**
     * Show cars parameters.
     */
    public function parametres()
    {
        $marques = Marque::paginate(10);
        $modeles = Modele::paginate(10);
        $annees = Annee::paginate(10);
        $transmissions = Transmission::paginate(10);
        $tractions = Traction::paginate(10);
        $carburants = Carburant::paginate(10);
        $carrosseries = Carrosserie::paginate(10);
       
        return view('voiture.parametres', compact('marques', 'modeles', 'annees', 'transmissions', 'tractions', 'carburants', 'carrosseries'));
    } 
}
