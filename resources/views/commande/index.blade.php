@extends('layouts.app')
@section('title', __('Cart'))
@section('content')

<main class="page-panier">
    <div class="nom-page">
        <h3>@lang('Cart')</h3>
    </div>
    <div class="liste-panier">
    @forelse($commandes as $commande)
        @foreach($voitures as $voiture)
            @if($voiture->id == $commande->voiture_id)
            <div class="chaque-voiture">
                <div>
                    @foreach($photos as $photo)
                        @if($voiture->id == $photo->voiture_id)
                            <img class="photo" src="{{asset('assets/img/voitures/' . $photo->nom) }}" alt="{{$photo->nom}}">
                        @endif
                    @endforeach
                </div>
                <div class="detail-prix">
                    <div class="detail">
                        <h3>{{ $voiture->annee->annee }} 
                            {{ $voiture->marque->nom }} 
                            {{ $voiture->modele->nom }}
                        </h3>
                    </div>
                    <div class="prix">
                        <h1>${{ $voiture->prix_vente }}</h1>
                    </div>
                </div>
            </div>
            <hr>
            @endif
        @endforeach
    @empty
    @endforelse
    </div>
    <div class="buttons">
        <button class="btn btn-primaire">@lang('Check Out')</button>
        <button class="btn btn-primaire">@lang('Reserve')</button>
    </div>
</main>
@endsection