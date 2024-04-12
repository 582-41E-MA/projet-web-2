<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Models\Photo;
use App\Models\Annee;
use App\Models\Modele;
use App\Models\Marque;
use App\Models\Transmission;
use App\Models\Traction;
use App\Models\Carburant;
use App\Models\Carrosserie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Voiture $voiture)
    {
        $photoPrincipale = Photo::select()->where('voiture_id', $voiture['id'])->where('principal', 1)->first();
        $photosSecondaires = Photo::select()->where('voiture_id', $voiture['id'])->orderBy('principal', 'desc')->get();

        $annee = Annee::select()->where('id', $voiture['annee_id'])->first()->annee;
        $marque = Marque::select()->where('id', $voiture['marque_id'])->first()->nom;
        $modele = Modele::select()->where('id', $voiture['modele_id'])->first()->nom;
        $prix = Voiture::select()->where('id', $voiture['id'])->first()->prix_vente;

        // data en json depuis Resources
        $transmission = Transmission::transmissionParId($voiture['transmission_id']);
        $traction = Traction::tractionParId($voiture['traction_id']);
        $carburant = Carburant::carburantParId($voiture['carburant_id']);
        $carrosserie = Carrosserie::carrosserieParId($voiture['carrosserie_id']);

        $data['annee'] = $annee;
        $data['marque'] = $marque;
        $data['modele'] = $modele;
        $data['prix'] = round($prix);
        $data['transmission'] = $transmission[0]['nom'];
        $data['traction'] = $traction[0]['nom'];
        $data['carburant'] = $carburant[0]['nom'];
        $data['carrosserie'] = $carrosserie[0]['nom'];


        return view('voiture.show', ['voiture' => $data, 'photosSecondaires'=>$photosSecondaires, 'photoPrincipale' => $photoPrincipale]);
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
}
