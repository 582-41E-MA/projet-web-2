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
use App\Models\Transmission;
use App\Models\Traction;
use App\Models\Carburant;
use App\Models\Carrosserie;
use App\Http\Controllers\VoitureController;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Voiture $voiture)
    {
        $id = Auth::user()->id;
        $commandeExist = Commande::where('voiture_id', $voiture->id)->exists();

        if ($commandeExist) {
            return redirect()->route('voiture.index');
        } else {
            $commande = Commande::create([
                'voiture_id' => $voiture->id,
                'user_id' => $id,
                'payment_id' => 0,
                'statut_id' => 0,
                'expedition_id' => 0,
                'date' => now(),
                'quantite' => 1,
                'prix' => $voiture->prix_vente
            ]);

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
        }
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
 
