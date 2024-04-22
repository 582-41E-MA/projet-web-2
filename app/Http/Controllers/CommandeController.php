<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;
use App\Models\Voiture;
use App\Models\Photo;
use App\Models\Annee;
use App\Models\Marque;
use App\Models\Modele;
use Dompdf\Dompdf;
use App\Models\Ville;
use App\Models\Transmission;
use App\Models\Traction;
use App\Models\Carburant;
use App\Models\Carrosserie;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CommandeController extends Controller
{
    /**
     * Display page that allows user to continue as a guest or sign in to see their cart
     */
    public function inscriptionPanier(Request $request) {
        // Vérifiez si l'utilisateur existe déjà avec un login activé et un id
        $user = Auth::user();
        $guest = $request->session()->get('id');

        if ($user) {
            $id = Auth::user()->id;
            $idUserExist = true;
        } elseif ($guest) {
            $id = $guest;
            $idUserExist = true;
        } else {
            $idUserExist = false;
        }
        
        // Voiture qui sera ajoutée au panier d'achat
        $voiture_id = $request->voiture_id;

        // Si l'utilisateur est déjà connecté, il sera redirigé vers sa page de panier
        if ($idUserExist) {
            return redirect()->route('commande.panier', ['voiture' => $voiture_id, 'id' => $id]);
        } else {
            // Si l'utilisateur n'est pas connecté, il sera dirigé vers une page où il pourra se connecter ou continuer en tant qu'invité
            $villes = Ville::villes();
    
            return view('commande.inscription', ['voiture_id' => $voiture_id, 'villes'=>$villes]);
        }
    }

    /**
     * Set up items on the cart with cookies
     */    

    //public function panier(Voiture $voiture)
    public function panier(Request $request)
    {
        $panier = $request->session()->put('panier', true);

        // Voiture qui a été cliquée pour être ajoutée au panier
        $voitureId = $request->voiture;

        // Configurez l'id en fonction de l'action de la personne
        // 1. Si l'utilisateur s'est inscrite et a décidé de continuer en tant qu'invité
        if ($request->id) {
            $id = $request->id;
        } else {
        // 2. Si l'utilisateur est connecté et est un membre enregistré
            $id = Auth::user()->id;
        }

        // Obtenir le cookie existant nommé 'voiture_id' ou commencer avec une liste vide
        $existingCookie = Cookie::get('voiture_id_' . $id, '');

        // Séparer la liste des ID des voitures existants dans le cookie d'utilisateur en un tableau
        $voitureIds = $existingCookie ? explode(',', $existingCookie) : [];
    
        // Ajouter le nouvel ID de voiture à la liste s'il n'est pas encore présent
        //if (!in_array($voiture->id, $voitureIds)) {
        if (!in_array($voitureId, $voitureIds)) {
            $voitureIds[] = $voitureId;
        }
    
        // Convertir la liste d'ID en une chaîne séparée par des virgules
        $updatedCookieValue = implode(',', $voitureIds);
    
        // Créer ou mettre à jour le cookie avec la liste des ID par 60 minutes
        $cookie = Cookie::make('voiture_id_' . $id, $updatedCookieValue, 60);
    
        // Rediriger vers la route 'commande.show' avec le cookie mis à jour
        return redirect()->route('commande.showPanier', $id)->withCookie($cookie);
    }
    
    /**
     * Display the cart of user
     */
    public function showPanier($id)
    {
        // Obtenir le cookie avec la liste des ID de voitures
        $cookieValue = Cookie::get('voiture_id_' . $id, '');
    
        if ($cookieValue) {
            // Convertir la chaîne séparée par des virgules en un tableau d'ID
            $voitureIds = explode(',', $cookieValue);
    
            //Récupérer toutes les voitures
            $voitures = Voiture::all();

            // Initialiser un tableau vide pour voir parmi toutes les voitures, lesquelles ont le même ID que les voitures ajoutées comme cookies
            $voitureAfficher = [];

            foreach ($voitures as $voiture) {                
                foreach ($voitureIds as $voitureId) {
                    if ($voiture->id == $voitureId) {
                        $voitureAfficher[] = $voiture;
                    }
                }
            }
            
            $voitures = $voitureAfficher;
            $marques = Marque::all();
            $annees = Annee::all();
            $transmissions = Transmission::all();
            $tractions = Traction::all();
            $carburants = Carburant::all();
            $carrosseries = Carrosserie::all();
            $photos = Photo::select()->where('principal', 1)->get();

            return view('commande.panier', compact('voitures', 'marques', 'annees', 'transmissions', 'tractions', 'carburants', 'photos', 'carrosseries'));
        } else {
            return redirect()->route('voiture.index');
        }
    }
    
    public function deleteVoiturePanier(Request $request) {
        
        $user = Auth::user();
        $guest = $request->session()->get('id');
        $voiture_supprimer = $request->voiture;
        // return $voiture_supprimer;

        if ($user) {
            $id = Auth::user()->id;
        } elseif ($guest) {
            $id = $guest;
        } else {
            return view('voiture.index');
        }

        $cookieValue = Cookie::get('voiture_id_' . $id, '');
        
        if ($cookieValue) {
            // Convertir la chaîne séparée par des virgules en un tableau d'ID
            $voitureIds = explode(',', $cookieValue);
            
            $voitureIds = array_diff($voitureIds, [$voiture_supprimer]);
            
            // Converter o array de volta para uma string separada por vírgulas
            $updatedCookieValue = implode(',', $voitureIds);
            
            if (empty($voitureIds)) {
                // Se a lista de IDs estiver vazia, exclua o cookie
                Cookie::queue(Cookie::forget('voiture_id_' . $id));
                $panier = $request->session()->put('panier', false);
                return redirect()->route('voiture.index');
            } else {
                // Atualize o cookie com o novo valor da lista
                Cookie::queue('voiture_id_' . $id, $updatedCookieValue);
                
                //Récupérer toutes les voitures
                $voitures = Voiture::all();
                
                // Initialiser un tableau vide pour voir parmi toutes les voitures, lesquelles ont le même ID que les voitures ajoutées comme cookies
                $voitureAfficher = [];
                
                foreach ($voitures as $voiture) {                
                    foreach ($voitureIds as $voitureId) {
                        if ($voiture->id == $voitureId) {
                            $voitureAfficher[] = $voiture;
                        }
                    }
                }
                
                // Convertir la liste d'ID en une chaîne séparée par des virgules
                $updatedCookieValue = implode(',', $voitureIds);
        
                // Créer ou mettre à jour le cookie avec la liste des ID par 60 minutes
                $cookie = Cookie::make('voiture_id_' . $id, $updatedCookieValue, 60);
                
                $voitures = $voitureAfficher;
                $marques = Marque::all();
                $annees = Annee::all();
                $transmissions = Transmission::all();
                $tractions = Traction::all();
                $carburants = Carburant::all();
                $carrosseries = Carrosserie::all();
                $photos = Photo::select()->where('principal', 1)->get();
            
                return view('commande.panier', compact('voitures', 'marques', 'annees', 'transmissions', 'tractions', 'carburants', 'photos', 'carrosseries'));
            }
        }
    }
    
    
    
    /**
     * Display a listing of the resource.
     */
    public function index(Voiture $voiture)
    {


        // $id = Auth::user()->id;
        // $commandeExist = Commande::where('voiture_id', $voiture->id)->exists();

        // if ($commandeExist) {
        //     return redirect()->route('voiture.index');
        // } else {
        //     $commande = Commande::create([
        //         'voiture_id' => $voiture->id,
        //         'user_id' => $id,
        //         'payment_id' => 0,
        //         'statut_id' => 0,
        //         'expedition_id' => 0,
        //         'date' => now(),
        //         'quantite' => 1,
        //         'prix' => $voiture->prix_vente
        //     ]);

        //     $marques = Marque::all();
        //     $annees = Annee::all();
        //     $transmissions = Transmission::all();
        //     $tractions = Traction::all();
        //     $carburants = Carburant::all();
        //     $carrosseries = Carrosserie::all();
        //     $photos = Photo::select()->where('principal', 1)->get();
            
        //     $commandes = Commande::select()->where('user_id', $id)->get();
        //     $voitures = Voiture::all();
       
        //     return view('commande.index', compact('commandes', 'voitures', 'marques', 'annees', 'transmissions', 'tractions', 'carburants', 'photos', 'carrosseries'));
        // }
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
    public function show(string $id)
    {
        $id = Auth::user()->id;
        $marques = Marque::all();
        $annees = Annee::all();
        $transmissions = Transmission::all();
        $tractions = Traction::all();
        $carburants = Carburant::all();
        $carrosseries = Carrosserie::all();
        $photos = Photo::select()->where('principal', 1)->get();
        
        $commandes = Commande::select()->where('user_id', $id)->get();
        $voitures = Voiture::all();
    
        return view('commande.index', compact('commandes', 'voitures', 'marques', 'annees', 'transmissions', 'tractions', 'carburants', 'photos', 'carrosseries'));

        return view('commande.show');
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

    /**
     * Effectuer le process de checkout
     */
    public function checkout(Commande $commande)
    {
        return view('commande.checkout', ['commande' => $commande]);
    }

    /**
     * Rédiriger vers stripe pour finalizer le paiement
     */
    public function paiement(Request $request, Commande $commande)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' =>
            [
                [
                    'price_data' => 
                    [
                        'currency' => 'cad',
                        'product_data' => [
                            'name' => 'car'
                        ],
                        'unit_amount' => intval($commande->prix) * 100,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route(('commande.success'), ['commande'=>$commande]),
            'cancel_url' => route(('commande.checkout'), ['commande'=>$commande]),
        ]);

        // Changer l'état de la commande
        $commande->statut_id = 3;
        $commande->save();

        return redirect()->away($session->url)->with('success', trans('You\'ve paid the order successfully'));     
    }

    /**
     * Retourner à la page de confirmation
     */
    public function success(Commande $commande)
    {
        $voitures = Voiture::select()->where('commande_id', $commande->id)->get();

        // Initialiser un tableau vide pour voir parmi toutes les voitures, lesquelles ont le même ID que les voitures ajoutées comme cookies
        $voitureAfficher = [];

        foreach ($voitures as $key => $voiture) {                
            $photo = Photo::select()->where('voiture_id', $voiture->id)->orderBy('principal','DESC')->first(); 
            $voitureAfficher[$key]['photo'] = $photo->nom;
            $voitureAfficher[$key]['annee'] = Annee::select()->where('id', $voiture['annee_id'])->first()->annee;
            $voitureAfficher[$key]['marque'] = Marque::select()->where('id', $voiture['marque_id'])->first()->nom;
            $voitureAfficher[$key]['modele'] = Modele::select()->where('id', $voiture['modele_id'])->first()->nom;
            $voitureAfficher[$key]['prix'] = $voiture->prix_vente;
        }

        return view('commande.success', ['commande'=>$commande, 'voitures'=> $voitureAfficher]);
    }

    /**
     * Télécharger la confirmation en pdf
     */
    public function pdfConfirmation(Commande $commande)
    {
        $voitures = Voiture::select()->where('commande_id', $commande->id)->get();

        // Initialiser un tableau vide pour voir parmi toutes les voitures, lesquelles ont le même ID que les voitures ajoutées comme cookies
        $voitureAfficher = [];

        foreach ($voitures as $key => $voiture) {                
            $photo = Photo::select()->where('voiture_id', $voiture->id)->orderBy('principal','DESC')->first(); 
            $voitureAfficher[$key]['photo'] = $photo->nom;
            $voitureAfficher[$key]['annee'] = Annee::select()->where('id', $voiture['annee_id'])->first()->annee;
            $voitureAfficher[$key]['marque'] = Marque::select()->where('id', $voiture['marque_id'])->first()->nom;
            $voitureAfficher[$key]['modele'] = Modele::select()->where('id', $voiture['modele_id'])->first()->nom;
            $voitureAfficher[$key]['prix'] = $voiture->prix_vente;
        }

        $pdf = new Dompdf;
        $pdf->setPaper('letter', 'portrait');
        $pdf->loadHTML(view('commande.pdf-confirmation', ['commande' => $commande, 'voitures'=> $voitureAfficher, 'photo' => $photo]));
        $pdf->render();

        return $pdf->stream('commande-'.$commande->id. '.pdf'); // definir le nom du fichier pdf
    }
}
 
