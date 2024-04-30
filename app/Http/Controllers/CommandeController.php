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
use App\Models\Expedition;
use App\Models\CommandeTax;
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

        // Si l'utilisateur est un invité qui a déjà ajouté quelque chose à son panier, il sera récupéré par la variable ci-dessous
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
    public function panier(Request $request)
    {
        // Créer une variable dans la session qui indique s'il y a ou non un panier dans cette session (aider à gérer l'affichage de l'icône du panier)
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
        if (!in_array($voitureId, $voitureIds)) {
            $voitureIds[] = $voitureId;
        }
    
        // Convertir la liste d'ID en une chaîne séparée par des virgules
        $updatedCookieValue = implode(',', $voitureIds);
    
        // Créer ou mettre à jour le cookie avec la liste des ID par 60 minutes
        $cookie = Cookie::make('voiture_id_' . $id, $updatedCookieValue, 60);
    
        // Rediriger vers la route 'commande.showPanier' avec le cookie mis à jour
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
    
            // Récupérer toutes les voitures
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

            return view('commande.panier', compact('voitures', 'marques', 'annees', 'transmissions', 'tractions', 'carburants', 'photos', 'carrosseries', 'id'));
        } else {
            return redirect()->route('voiture.index');
        }
    }
    
    /**
     * Delete car from cart
     */
    public function deleteVoiturePanier(Request $request) {
        $user = Auth::user();
        $guest = $request->session()->get('id');

        // Récupérer voiture a supprimer
        $voiture_supprimer = $request->voiture;

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
            
            // Supprimer la voiture du tableau provenant du cookie
            $voitureIds = array_diff($voitureIds, [$voiture_supprimer]);
            
            // Convertir la liste d'ID en une chaîne séparée par des virgules
            $updatedCookieValue = implode(',', $voitureIds);
            
            if (empty($voitureIds)) {
                // Si la liste d'ID est vide, supprimez le cookie
                Cookie::queue(Cookie::forget('voiture_id_' . $id));
                // Cookie::forget('voiture_id_' . $id);

                // Si la liste d'ID est vide, supprimez la variable panier dans la session
                $panier = $request->session()->put('panier', false);

                return redirect()->route('voiture.index');
            } else {
                // Mettez à jour le cookie avec la nouvelle valeur de la liste
                Cookie::queue('voiture_id_' . $id, $updatedCookieValue);
                
                // Récupérer toutes les voitures
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
            
                return view('commande.panier', compact('voitures', 'marques', 'annees', 'transmissions', 'tractions', 'carburants', 'photos', 'carrosseries', 'id'));
            }
        }
    }
    
    /**
     * Show user's cart and prepare commande
     */
    public function show($id) {
        // Obtenir le cookie avec la liste des ID de voitures
        $cookieValue = Cookie::get('voiture_id_' . $id, '');
        
        // Convertir la chaîne séparée par des virgules en un tableau d'ID
        $voitureIds = explode(',', $cookieValue);

        // Verificar se ja existe uma comanda na conta deste usuario
        //$commandes = Commande::all();

        $commande = Commande::select()->where('user_id', $id)->first();
        //return $commande;

        if ($commande) {
            // Récupérer toutes les voitures
            $voitures = Voiture::all();
            
            $voituresAcheter = [];

            //$prix = 0;
            $quantite = 0;

            foreach ($voitures as $voiture) {                
                foreach ($voitureIds as $voitureId) {
                    if ($voiture->id == $voitureId) {
                        $voiture->commande_id = $commande->id;
                        $voiture->disponible = false;
                        $voiture->save();
    
                        //$prix += $voiture->prix_vente;
                        $quantite += 1;
                        $voituresAcheter[] = $voiture;
                    }
                }
            }
            
            $voitures = $voituresAcheter;

            $expeditions = Expedition::all();
            $userInfo = User::select()->where('id', $id)->first();
            $villeUser = Ville::select()->where('id', $userInfo->ville_id)->first();
            $villeUserId = $villeUser->id;
            $provenceUserId = $villeUser->provence_id;
            $photos = Photo::select()->where('principal', 1)->get();
            $commande_id = $commande->id;

            return view('commande.show', ['user' => $id, 'expeditions' => $expeditions, 'provence_user' => $provenceUserId, 'voitures' => $voitures, 'photos' => $photos, 'commande_id' => $commande_id]);
        } else {
            // Criar comanda e recuperar o id da comanda
            $commande = new Commande;
            $commande->user_id = $id;
            $commande->statut_id = 1;
            $commande->date = now();
            $commande->quantite = 0;
            $commande->prix = 0;
            $commande->save();
            $commande_id = $commande->id;

            // Initialiser un tableau vide pour voir parmi toutes les voitures, lesquelles ont le même ID que les voitures ajoutées comme cookies
            $voituresAcheter = [];
    
            //$prix = 0;
            $quantite = 0;

            // Récupérer toutes les voitures
            $voitures = Voiture::all();
            
            // Atualizar o valor de comanda dos carros que estavam no cart
            foreach ($voitures as $voiture) { 
                //return 'entrei aqui';               
                foreach ($voitureIds as $voitureId) {
                    if ($voiture->id == $voitureId) {
                        $voiture->commande_id = $commande_id;
                        $voiture->disponible = false;
                        $voiture->save();
    
                        //$prix += $voiture->prix_vente;
                        $quantite += 1;
                        $voituresAcheter[] = $voiture;
                    }
                }
            }
    
            //$commande->prix = $prix;
            $commande->quantite = $quantite;
            $commande->save();

            $expeditions = Expedition::all();
            $userInfo = User::select()->where('id', $id)->first();
            $villeUser = Ville::select()->where('id', $userInfo->ville_id)->first();
            $villeUserId = $villeUser->id;
            $provenceUserId = $villeUser->provence_id;
            $photos = Photo::select()->where('principal', 1)->get();

            return view('commande.show', ['user' => $id, 'voitures' => $voituresAcheter, 'provence_user' => $provenceUserId, 'expeditions' => $expeditions, 'photos' => $photos, 'commande_id' => $commande_id]);
        }
    }

    public function paiement(Request $request) {
        //return $request;
        // !!!!!!!!!!! Se for necessario atualizar status aqui

        // Supprimer le cookie
        Cookie::queue(Cookie::forget('voiture_id_' . $request->user_id));

        // Mettre à jour le mode d'expédition de la commande et le prix total
        $commande = Commande::select()->where('id', $request->commande_id)->first();

        if ($commande) {
            $commande->expedition_id = $request->expedition_id;
            $commande->prix = $request->prix_finale;
            $commande->save();
            
            // Création de commande_tax dans la table commande_taxes pour qu'il soit possible de suivre quelles sont les taxes appliquées à cette commande en fonction du mode d'expédition choisi
            if ($request->federal_tax_id) {
                $federal_tax = new CommandeTax;
                $federal_tax->commande_id = $request->commande_id;
                $federal_tax->tax_id = $request->federal_tax_id;
                $federal_tax->save();
            }
            
            if ($request->provincial_tax_id) {
                $provincial_tax = new CommandeTax;
                $provincial_tax->commande_id = $request->commande_id;
                $provincial_tax->tax_id = $request->provincial_tax_id;
                $provincial_tax->save();
            }
   
            return "iuhu!";
        } else {
            return view('voiture.index');
        }
        
    }
    
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
 
