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
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::villes();

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
            'telephone' => 'required|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'courriel' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:2|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'password_confirmation' => 'required',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->nom = $request->nom;
        $user->date_de_naissance = $request->date_de_naissance;
        $user->code_postal = $request->code_postal;
        $user->telephone = $request->telephone;
        $user->courriel = $request->courriel;
        $user->password = Hash::make($request->password);
        $user->privilege_id = 1;
        $user->ville_id = $request->ville_id;
        $user->timestamps = false;
        $user->save();

        return redirect()->route('login')->with('success', trans('You\'re registered successfully'));
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
