<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
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
        $marques = Marque::all();
        return view('modele.create', compact('marques'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:191',
            'marque_id' => 'required|exists:marques,id'
        ]);
        
        $modele = new Modele;
        $modele->fill($request->all());
        $modele->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve added a new model successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modele $modele)
    {
        $marques = Marque::all();
        return view('modele.edit', compact('modele', 'marques'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modele $modele)
    {
        $request->validate([
            'nom' => 'required|max:191',
            'marque_id' => 'required|exists:marques,id'
        ]);
        
        $modele->fill($request->all());
        $modele->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve modified a model successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modele $modele)
    {
        $modele->delete();
        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve deleted a model successfully'));
    }
}
