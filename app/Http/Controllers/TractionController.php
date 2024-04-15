<?php

namespace App\Http\Controllers;

use App\Models\Traction;
use Illuminate\Http\Request;

class TractionController extends Controller
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
        return view('traction.create');
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

        $traction = new Traction;
        $traction->nom = $nom;
        $traction->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve added a new traction successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Traction $traction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Traction $traction)
    {
        return view('traction.edit', compact('traction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Traction $traction)
    {
        $request->validate([
            'en' => 'required|max:100',
            'fr' => 'required|max:100',
        ]);

        $nom = [
            'en' => $request->en,
            'fr' => $request->fr
        ];

        $traction->nom = $nom;
        $traction->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve modified a traction successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Traction $traction)
    {
        $traction->delete();
        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve deleted a traction successfully'));
    }
}
