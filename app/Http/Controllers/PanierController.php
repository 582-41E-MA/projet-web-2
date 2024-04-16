<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Voiture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PanierController extends Controller
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
        $paniers = Panier::select('paniers.*')
                    ->join('users', 'users.id', 'user_id')
                    ->join('voitures', 'voitures.id', 'voiture_id')
                    ->join('photos', 'photos.id', 'photo_id');
    
        return view ('panier.show', compact("paniers"));
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
