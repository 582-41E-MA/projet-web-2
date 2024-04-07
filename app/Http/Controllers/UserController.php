<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $villes = Ville::all();
        return view('user.create', ['villes'=>$villes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nom' => 'required|min:2|max:191',
            'date_de_naissance' => 'required|date',
            'code_postal' => 'required|size:6',
            'telephone' => 'required|min:9|regex:/^([0-9\s\-\+\(\)]*)$/',
            'courriel' => 'required|email|unique:users',
            'mot_de_passe' => 'required|confirmed|min:2|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'mot_de_passe_confirmation' => 'required',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->nom = $request->nom;
        $user->date_de_naissance = $request->date_de_naissance;
        $user->code_postal = $request->code_postal;
        $user->telephone = $request->telephone;
        $user->courriel = $request->courriel;
        $user->mot_de_passe = Hash::make($request->mot_de_passe);
        $user->privilege_id = 3;
        $user->ville_id = $request->ville_id;
        $user->timestamps = false;
        $user->save();

        return redirect()->route('login')->with('success', trans('You\'re registered'));
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
