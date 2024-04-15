@extends('layouts.app')
@section('title', trans('Accueil'))
@section('content')
   
<main class="wrapper">
    <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
    </p>

    <ul>
        @foreach ($voitures as $voiture)
            <li>{{ $voiture->id }} - 
                <a href="{{ route('voiture.edit', $voiture->id) }}">Modifier voiture</a> - 
                <form action="{{ route('voiture.delete', $voiture->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Supprimer voiture</button>
                </form>
            </li>
        @endforeach
    </ul>
</main>
@endsection
    