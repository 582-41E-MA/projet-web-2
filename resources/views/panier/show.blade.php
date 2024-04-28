@extends('layouts.app')
@section('title', 'Panier')
<!-- @section('title', trans('Panier')) -->
@section('content')
   
<main class="page-panier">
    <div class="nom-page">
        <h3>Panier</h3>
    </div>
    <div class="liste-panier">
    {{--@forelse($paniers as $panier)--}}
        <div class="chaque-voiture">
            <div>
                <img class="photo" src="{{asset('assets/img/jpg/1.jpg')}}">
                {{--<img class="photo" src="{{asset('assets/img/jpg/').'/'. $photoPrincipale->nom}}" alt="{{$photoPrincipale->nom}}">--}}
            </div>
            <div class="detail-prix">
                <div class="detail">
                    <h3>2017 Porsche PP8 V TOIT MAGS CAM RECUL BLUETOOTH</h3>
                    {{--<h3>{{$voiture['annee']}} {{$voiture['marque']}} {{$voiture['modele']}} {{$voiture['transmission']}} {{$voiture['traction']}} {{$voiture['carburant']}} {{$voiture['carrosserie']}}</h3> --}}
                </div>
                <div class="prix">
                    <h1>$19,999</h1>
                    {{--{{$voiture['prix_vente']}}--}}
                </div>
            </div>
        </div>
        <hr>
    {{--@empty--}}
    {{--@endforelse--}}
    </div>
    <div class="buttons">
        <button class="btn btn-primaire">@lang('Check Out')</button>
        <button class="btn btn-primaire">@lang('Reserve')</button>
    </div>
</main>
@endsection

{{-- 
    en.json
    "Check Out": "Check Out",
    "Reserve": "Reserve"
    "Cart": "Cart"

    fr.json
    "Check Out": "Commander",
    "Reserve": "Réserver"
    "Cart": "Panier"
--}}
    