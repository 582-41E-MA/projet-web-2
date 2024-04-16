<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Transmission;
use App\Models\Traction;
use App\Models\Carburant;


class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $voitures = Voiture::with('photos')->get();

        $marques = Marque::all();
        $transmissions = Transmission::transmissions();
        $tractions = Traction::tractions();
        $carburants = Carburant::carburants();
        return view ('voiture.index', compact('voitures','marques', 'transmissions', 'tractions', 'carburants'));
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
}
