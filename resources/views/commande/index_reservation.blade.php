@extends('layouts.app')
@section('title', __('Cart'))
@section('content')

<main class="page-panier">
    <div class="nom-page">
        <h3>Reserver</h3>
    </div>
    <div class="liste-panier">
        <div class="chaque-voiture">
            <div>
                <img class="photo" src="{{asset('assets/img/voitures/1714414702_0.jpg') }}" alt="">
            </div>
        <div class="detail-prix">
            <div class="detail">
                <h3>Hyundai Tucson 2022    
                </h3>
            </div>
            <div class="prix">
                <h1>45900</h1>
            </div>
        </div>
    </div>
    <div class="buttons">
        <a href="{{ route('reservation.index')}}" class="btn btn-sm btn-outline-info">
            <button class="btn btn-primaire">PDF</button>
        </a>
    </div>
</main>
@endsection