<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'courriel' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('courriel', 'password');

        if(!Auth::validate($credentials)):
            return redirect(route('login'))  
                    ->withErrors(trans('auth.password')) 
                    ->withInput();  
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        // return Auth::user();

        return redirect()->intended(route('voiture.index'))->withSuccess(trans('Welcome back'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // effacer toutes les donnees de la session
        Session::flush();
        // deconnecter l'utilisateur authentifie
        Auth::logout();
        return redirect(route('login'));

    }
}
