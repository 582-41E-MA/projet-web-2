<?php

namespace App\Http\Controllers;

use App\Models\Carburant;
use Illuminate\Http\Request;

class CarburantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carburant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'en' => 'required|max:100',
            'fr' => 'required|max:100',
        ]);

        $nom = [
            'en' => $request->en,
            'fr' => $request->fr
        ];

        $carburant = new Carburant;
        $carburant->nom = $nom;
        $carburant->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve added a new fuel type successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Carburant $carburant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carburant $carburant)
    {
        return view('carburant.edit', compact('carburant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carburant $carburant)
    {
        $request->validate([
            'en' => 'required|max:100',
            'fr' => 'required|max:100',
        ]);

        $nom = [
            'en' => $request->en,
            'fr' => $request->fr
        ];

        $carburant->nom = $nom;
        $carburant->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve modified a fuel type successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carburant $carburant)
    {
        $carburant->delete();
        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve deleted a fuel type successfully'));
    }
}
