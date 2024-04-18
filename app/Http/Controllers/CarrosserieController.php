<?php

namespace App\Http\Controllers;

use App\Models\Carrosserie;
use Illuminate\Http\Request;

class CarrosserieController extends Controller
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
        return view('carrosserie.create');
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

        $carrosserie = new Carrosserie;
        $carrosserie->nom = $nom;
        $carrosserie->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve added a new body type successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrosserie $carrosserie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrosserie $carrosserie)
    {
        return view('carrosserie.edit', compact('carrosserie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrosserie $carrosserie)
    {
        $request->validate([
            'en' => 'required|max:100',
            'fr' => 'required|max:100',
        ]);

        $nom = [
            'en' => $request->en,
            'fr' => $request->fr
        ];

        $carrosserie->nom = $nom;
        $carrosserie->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve modified a body type successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrosserie $carrosserie)
    {
        $carrosserie->delete();
        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve deleted a body type successfully'));
    }
}
