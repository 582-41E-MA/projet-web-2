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
        return view ('voiture.index');
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
            'photo_principale' => 'required|image',
            'photo_secundaire' => 'required|array|size:3',
            'photo_secundaire.*' => 'required|image',
            'prix_paye' => 'required|numeric|decimal:0,2',
            'prix_vente' => 'required|numeric|decimal:0,2',
            'disponible' => 'required',
        ]);
        
        // Création nouvelle voiture
        $voiture = new Voiture;
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

    /**
     * Show cars parameters.
     */
    public function parametres()
    {
        $marques = Marque::all();
        $modeles = Modele::all();
        $annees = Annee::all();
        $transmissions = Transmission::all();
        $tractions = Traction::all();
        $carburants = Carburant::all();
        $carrosseries = Carrosserie::all();
        return view('voiture.parametres', ['marques' => $marques, 'modeles' => $modeles, 'annees' => $annees, 'transmissions' => $transmissions, 'tractions' => $tractions, 'carburants' => $carburants, 'carrosseries' => $carrosseries]);
    } 
}
