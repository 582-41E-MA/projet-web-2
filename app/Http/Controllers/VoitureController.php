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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voitures = Voiture::all();
        return view ('voiture.index', compact('voitures'));
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
            'photo_principale' => 'required|image',
            'photo_secundaire' => 'required|array|size:3',
            'photo_secundaire.*' => 'required|image',
            'prix_paye' => 'required|numeric|decimal:0,2',
            'prix_vente' => 'required|numeric|decimal:0,2',
            'kilometrage' => 'required|numeric|decimal:0,2',
        ]);
        
        // Création nouvelle voiture
        $voiture = new Voiture;
        $voiture->proprietaire = Auth::user()->id;
        $voiture->fill($request->all());
        $voiture->save();

        // Création photo principale
        $photo = new Photo();
        $file = $request->file('photo_principale');
        $filename = time() . "." . $file->getClientOriginalExtension();
        $request->photo_principale->move('assets/img/voitures', $filename);

        $photo->nom = $filename;
        $photo->principal = 1;
        $photo->voiture_id = $voiture->id;
        $photo->save();
        
        // Création photos secundaires
        $filesSecundaires = $request->file('photo_secundaire');

        foreach ($filesSecundaires as $i => $fileSecundaire) {
            $fileSecundaireName = time() . "_$i." . $fileSecundaire->getClientOriginalExtension();
            $fileSecundaire->move('assets/img/voitures', $fileSecundaireName);

            $photo = new Photo();
            $photo->nom = $fileSecundaireName;
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
        //
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
            'photo_principale' => 'image',
            'photo_secundaire' => 'array|size:3',
            'photo_secundaire.*' => 'image',
            'prix_paye' => 'required|numeric|decimal:0,2',
            'prix_vente' => 'required|numeric|decimal:0,2',
            'kilometrage' => 'required|numeric|decimal:0,2',
        ]);

        $voiture->proprietaire = Auth::user()->id;
        $voiture->fill($request->all());
        $voiture->save();

        // Si l'utilisateur essaie d'envoyer une nouvelle photo principale, la base de données mettra à jour l'image
        if ($request->photo_principale) {
            $photo = Photo::select()->where('voiture_id', $voiture->id)->where('principal', '1')->first();
            $photo->delete();

            $photo = new Photo();
            $file = $request->file('photo_principale');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $request->photo_principale->move('assets/img/voitures', $filename);

            $photo->nom = $filename;
            $photo->principal = 1;
            $photo->voiture_id = $voiture->id;
            $photo->save();
        }

        // Si l'utilisateur essaie d'envoyer des nouvelles photos secundaires, la base de données mettra à jour les images
        $filesSecundaires = $request->file('photo_secundaire');
        if ($filesSecundaires) {
            $photos = Photo::select()->where('voiture_id', $voiture->id)->where('principal', '0')->get();

            foreach ($photos as $photo) {
                $photo->delete();
            }

            foreach ($filesSecundaires as $i => $fileSecundaire) {
                $fileSecundaireName = time() . "_$i." . $fileSecundaire->getClientOriginalExtension();
                $fileSecundaire->move('assets/img/voitures', $fileSecundaireName);
    
                $photo = new Photo();
                $photo->nom = $fileSecundaireName;
                $photo->principal = 0;
                $photo->voiture_id = $voiture->id;
                $photo->save();    
            }        
        }

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
