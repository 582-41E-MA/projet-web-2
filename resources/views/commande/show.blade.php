@extends('layouts.app')
@section('title', 'Commande')
@section('content')
   
<main class="page-commande">
    <div class="nom-page">
        <h2>Commande</h2>
    </div>
    <div class="liste-commande">
        <div class="chaque-voiture">
            <div class="photo">
                <img src="{{asset('assets/img/jpg/1.jpg')}}">
            </div>
            <div class="detail-prix">
                <div class="detail">
                    <h3>2017 Porsche MAGS </h3>
                </div>
                <div class="prix">
                    <h1>$19,999</h1>
                </div>
            </div>
        </div>
        <div class="chaque-voiture">
            <div class="photo">
                <img src="{{asset('assets/img/jpg/2.jpg')}}">
            </div>
            <div class="detail-prix">
                <div class="detail">
                    <h3>2020 Volovo PP8 TOIT</h3>
                </div>
                <div class="prix">
                    <h1>$29,999</h1>
                </div>
            </div>
        </div>
        <div class="user">
            <p><b>Nom : </b>Nom de Client</p>
            <p><b>Adresse : </b>1000 adresse, Montreal, QC, Canada</p>
            <p><b>Téléphone : </b>514-000-0000</p>
        </div>
        <div class="expedition">
            <label for="expedition">Expédition</label>
            <select name="expedition" id="expedition">
                <option value="">Livraison locale avec $1000 des frais</option>
                <option value="">Payer en magasin</option>
            </select>
        </div>
        <hr>
        <div class="prix-total">
            <p>Prix : 79,998</p>
            <p>Frais d'expédition : 1,000</p>
            <p>TPS/TVH  : 8,000</p>
            <p>TVP/TVD/TVQ : 4,000</p>
            <p><b>Paiement total : 91,998</b></p>
        </div>
    </div>

    <div class="buttons">
        {{--<button class="btn btn-primaire">Payer</button>--}}
        <div class="paiement-reussi">
            <h3>Félicitations pour votre achat !</h3>
        </div>
        <button class="btn btn-primaire">Telechanger PDF</button>
    </div>
</main>
@endsection

    