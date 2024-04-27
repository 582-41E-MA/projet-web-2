@extends('layouts.app')
@section('title', __('Modify Photos'))
@section('content')

<main class="wrapper liste">
    @if(session('success'))
    <p class="message">
         {{session('success')}}
    </p>
    @endif
    <h1 class="nom-liste">@lang('Modify photos') - @lang('car number') {{$voiture['id']}}</h1>
    <div class="buttons">

        <a class="btn btn-tertiaire" href="{{ route('photo.create', $voiture['id'] ) }}"> @lang('Add a photo')</a>
        <a class="btn btn-primaire" href="{{ route('voiture.show', $voiture['id'] ) }}"> @lang('Return to the product')</a>
    </div>

    <div class="liste-photos">
        @foreach($photos as $photo)
        <div class="chaque-photo">

            <div class="photo" >
                <img src="{{asset('assets/img/voitures/' . $photo->nom) }}" alt="{{$photo->nom}}">
            </div>
            <div class="buttons">
                <form action="{{ route('photo.delete', $photo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-tertiaire">@lang('Delete')</button>
                </form>
                @if($photoPrincipale_id == $photo->id)
                    <p>Main photo</p>

                @else
                <form action="{{ route('photo.principal', $photo->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button class="btn btn-tertiaire">@lang('Set as main photo')</button>
                </form>
                @endif

            </div>
        </div>
        
        @endforeach
    </div>
</main>
@endsection