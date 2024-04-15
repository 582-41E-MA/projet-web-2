<?php

namespace App\Http\Controllers;

use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
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
        return view('transmission.create');
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

        $transmission = new Transmission;
        $transmission->nom = $nom;
        $transmission->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve added a new transmission successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transmission $transmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transmission $transmission)
    {
        return view('transmission.edit', compact('transmission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transmission $transmission)
    {
        $request->validate([
            'en' => 'required|max:100',
            'fr' => 'required|max:100',
        ]);

        $nom = [
            'en' => $request->en,
            'fr' => $request->fr
        ];

        $transmission->nom = $nom;
        $transmission->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve modified a transmission successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transmission $transmission)
    {
        $transmission->delete();
        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve deleted a transmission successfully'));
    }
}
