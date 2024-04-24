<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Privilege;
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
        $privileges = Privilege::all();
        $users = User::all(); 
        return view('user.index', ["users" => $users, "privileges" => $privileges]);
      
    }

    public function indexClient()
    {
        $privileges = Privilege::all();
        $users = User::all(); 


        return view('user.indexClient', ["users" => $users, "privileges" => $privileges]);
      
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
     * Show the form for creating a new resource.
     */
    public function createClient()
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
            'privilege_id' => 'required',
            'ville_id' => 'required|exists:villes,id',
        ]);
        
        // return $request;

        $user = new User;
        $user->fill($request->all());
        $user->nom = $request->nom;
        $user->date_de_naissance = $request->date_de_naissance;
        $user->code_postal = $request->code_postal;
        $user->telephone = $request->telephone;
        $user->courriel = $request->courriel;
        $user->password = Hash::make($request->password);
        $user->privilege_id = $request->privilege_id;
        $user->ville_id = $request->ville_id;
        $user->timestamps = false;
        $user->save();

        if(Auth::user()) $privilegeCreator = Auth::user()->privilege->nom;
        else $privilegeCreator = 'client';

        $privilegeIdNewUser = Privilege::select()->where('id', $request->privilege_id)->first();
        $privilegeNewUser = $privilegeIdNewUser->nom;

        if($privilegeCreator == 'client') 
        {
            return redirect()->route('login')->with('success', trans('You\'re registered successfully'));
        }
        else 
        {
            if($privilegeNewUser == 'client' ) return redirect()->route('user.indexClient')->with('success', trans('User created successfully'));
            else return redirect()->route('user.index')->with('success', trans('User created successfully'));
        }
    }

    public function storeGuest(Request $request) {
        $voiture_id = $request->query('voiture_id');

        $request->validate([
            'nom' => 'required|min:2|max:191',
            'courriel' => 'required|email|unique:users',
            'ville_id' => 'required|exists:villes,id'
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->nom = $request->nom;
        $user->courriel = $request->courriel;
        $user->ville_id = $request->ville_id;
        $user->save();

        $id = $user->id;
        $guest_id = $request->session()->put('id', $id);
        //return $id;
        return redirect()->route('commande.panier', ['voiture' => $voiture_id, 'id' => $id]);
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
    public function edit(User $user)
    {
        $villes = Ville::villes();
        $privileges = Privilege::all();
        // return $user;

        return view('user.edit', ['user' => $user, 'privileges' => $privileges, 'villes'=> $villes]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function editClient(User $user)
    {
        $villes = Ville::villes();
        $privileges = Privilege::all();
        // return $user;

        return view('user.edit', ['user' => $user, 'privileges' => $privileges, 'villes'=> $villes]);
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'min:2|max:191',
            'date_de_naissance' => 'date',
            'code_postal' => 'size:6',
            'telephone' => 'min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'ville_id' => 'exists:villes,id',
        ]);

        $user->update([
            'nom' => $request->nom,
            'date_de_naissance' => $request->date_de_naissance,
            'code_postal' => $request->code_postal,
            'telephone' => $request->telephone,
            'ville_id' => $request->ville_id,

        ]);

        
        $privilegeIdNewUser = Privilege::select()->where('id', $user->privilege_id)->first();
        $privilegeNewUser = $privilegeIdNewUser->nom;
        // return $privilegeNewUser;

        if($privilegeNewUser == 'client' ) return redirect()->route('user.indexClient')->with('success', trans('User modified successfully'));
        else return redirect()->route('user.index')->with('success', trans('User modified successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
        $type_user = $request->type_user;
        $user->delete();
        
        if($type_user == 'client') return redirect()->route('user.indexClient')->with('success', trans('User deleted successfully'));
        else return redirect()->route('user.index')->with('success', trans('User deleted successfully'));
    }

}
