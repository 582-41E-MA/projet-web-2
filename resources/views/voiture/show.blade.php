@extends('layouts.app')
@section('title', trans('Car'))
@section('content')
   
<main class="page-voiture">
    <div class="voiture-photos" data-js-component="Photo">
        <div class="photo-large" data-js-photo>
            <img src="{{asset('assets/img/jpg/').'/'. $photoPrincipale->nom}}" alt="{{$photoPrincipale->nom}}">
        </div>
        <div class="thumbnails">
            @forelse($photosSecondaires as $photoSecondaire)
            <div class="thumbnail " data-js-thumbnail="{{ $photoSecondaire->nom }}">
                <img src="{{asset('assets/img/jpg/').'/'. $photoSecondaire->nom}}" alt="{{$photoSecondaire->nom}}">
            </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="voiture-details">
        <h1>{{$voiture['annee']}} {{$voiture['marque']}} {{$voiture['modele']}} {{$voiture['transmission']}} {{$voiture['traction']}} {{$voiture['carburant']}} {{$voiture['carrosserie']}}</h1>

        <div class="voiture-actions">
            <span class="prix">${{$voiture['prix']}}</span>
            <button class="btn btn-primaire">@lang('Add to cart')</button>
            <button class="btn btn-primaire">@lang('Contact us')</button>
        </div>


    </div>
    <div class="voiture-params">
        <span><span class="bold">@lang('Year:')</span> {{$voiture['annee']}}</span>
        <span><span class="bold">@lang('Make:')</span> {{$voiture['marque']}}</span>
        <span><span class="bold">@lang('Model:')</span> {{$voiture['modele']}}</span>
        <span><span class="bold">@lang('Transmission:')</span> {{$voiture['transmission']}}</span>
        <span><span class="bold">@lang('Traction:')</span> {{$voiture['traction']}}</span>
        <span><span class="bold">@lang('Feul:')</span> {{$voiture['carburant']}}</span>
        <span><span class="bold">@lang('Bodywork:')</span> {{$voiture['carrosserie']}}</span>
    </div>

</main>
@endsection
    