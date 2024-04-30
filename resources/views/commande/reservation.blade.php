@extends('layouts.app')
@section('title', __('Reservation'))
@section('content')

<main class="page-panier">
    <div class="nom-page">
        <h3>@lang('Reserve')</h3>
    </div>
    <div class="liste-panier">
        @foreach($voitures as $voiture)
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
        @endforeach
        <div class="liste-reservation ml-md">
            <ul>
                <li class="mb-md mt-md">Order Number : <strong>{{ $commande->id }}</strong></li>
                <li class="mb-md mt-md">{{ $federal_tax->nom }} : <strong>{{ $federal_tax->valeur }}</strong></li>
                <li class="mb-md mt-md">Federal tax value : <strong>${{ $federal_tax_valeur }}</strong></li>
                <li class="mb-md mt-md">{{ $provincial_tax->nom }} : <strong>{{ $provincial_tax->valeur }}</strong></li>
                <li class="mb-md mt-md">Provincial tax value : <strong>${{ $provincial_tax_valeur }}</strong></li>
                <li class="mb-md mt-md">Price with taxes : <strong>${{ $commande->prix }}</strong></li>
            </ul>
        </div>
    </div>
    <div class="buttons">
        <a href="{{route('commande.pdf', $commande->id)}}">
            <button class="btn btn-primaire">PDF</button>
        </a>
    </div>
</main>
@endsection