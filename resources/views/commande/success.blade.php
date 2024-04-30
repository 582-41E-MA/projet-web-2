@extends('layouts.app')
@section('title', trans('Confirmation'))
@section('content')


<main class="wrapper liste">
    @if(session('success'))
    <p class="message">
         {{session('success')}}
    </p>
    @endif
    <h1 class="nom-liste">@lang('Confirmation')</h1>
    <div class="buttons">

        <a class="btn btn-primaire" href="{{route('commande.pdf', $commande->id)}}"> @lang('Download the order')</a>
    </div>

    <div class="liste-photos">
        @foreach($voitures as $voiture)
        <div class="chaque-photo">
            <div class="photo" >
                <img src="{{asset('assets/img/voitures/' . $voiture['photo']) }}" alt="{{$voiture['photo']}}">
            </div>
            <div class="photoEtTitre">
                <p>{{$voiture['annee']}} {{$voiture['marque']}} {{$voiture['modele']}}</p>
                <span class="prix">${{$voiture['prix']}}</span>
            </div>
        </div>
        
        @endforeach
    </div>
</main>
@endsection