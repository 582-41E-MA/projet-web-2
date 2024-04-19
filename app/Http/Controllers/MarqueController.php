<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
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
        return view('marque.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:191'
        ]);

        $marque = new Marque;
        $marque->fill($request->all());
        $marque->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve added a new brand successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        return view('marque.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            'nom' => 'required|max:191'
        ]);

        $marque->fill($request->all());
        $marque->save();

        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve modified a brand successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();
        return redirect()->route('voiture.parametres')->with('success', trans('You\'ve deleted a brand successfully'));
    }
}
