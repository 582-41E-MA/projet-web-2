@extends('layouts.app')
@section('title', trans('Car'))
@section('content')
@if(Auth::user()) 
    @php $privilege = Auth::user()->privilege_id @endphp
@else
    @php $privilege = 1 @endphp
@endif

<main class="page-voiture">
    <div class="voiture-photos" data-js-component="Photo">
        <div class="photo-large" data-js-photo>
            <img src="{{asset('assets/img/voitures/').'/'. $photoPrincipale->nom}}" alt="{{$photoPrincipale->nom}}">
        </div>
        <div class="thumbnails">
            @forelse($photos as $photo)
            <div class="thumbnail " data-js-thumbnail="{{ $photo->nom }}">
                <img src="{{asset('assets/img/voitures/').'/'. $photo->nom}}" alt="{{$photo->nom}}">
            </div>
            @empty
            @endforelse
        </div>
    </div>
    <div class="voiture-details">
        <h1>{{$voiture['annee']}} {{$voiture['marque']}} {{$voiture['modele']}} {{$voiture['transmission']}} {{$voiture['traction']}} {{$voiture['carburant']}} {{$voiture['carrosserie']}}</h1>

        <div class="voiture-actions">
            <span class="prix">${{$voiture['prix']}}</span>
            @if($privilege == 2 || $privilege == 3)

                <a href="{{ route('voiture.edit', $voiture['id']) }}">
                    <button class="btn btn-tertiaire">@lang('Modify infos')</button>
                </a>

                <a href="{{ route('photo.voiture', $voiture['id']) }}">
                    <button class="btn btn-tertiaire">@lang('Modify photos')</button>
                </a>

                <form action="{{ route('voiture.delete', $voiture['id']) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-tertiaire">@lang('Delete')</button>
                </form>

            @else
            <form action="{{ route('commande.inscriptionPanier') }}" method="post">
                @csrf
                <input type="hidden" name="voiture_id" value="{{ $voiture['id'] }}">
                <button class="btn btn-primaire" type="submit">@lang('Add to cart')</button>
            </form>
            @endif

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
    