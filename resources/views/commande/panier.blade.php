@extends('layouts.app')
@section('title', __('Cart'))
@section('content')

<main class="page-panier">
    <div class="nom-page">
        <h3>@lang('Cart')</h3>
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

                        <div>
                            <form action="{{ route('commande.deleteVoiturePanier', $voiture['id']) }}" method="post" class="form-panier">
                                @csrf
                                @method('delete')
                                <button class="suppression" type="submit">
                                    <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="prix">
                        <h1>${{ $voiture->prix_vente }}</h1>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach

    </div>
    <div class="buttons">
        <button class="btn btn-primaire">
            <a href="{{ route('commande.show', $id) }}">
                @lang('Check Out')
            </a>
        </button>
        <button class="btn btn-primaire">
            <a href="{{ route('commande.reservation', $id) }}">
                @lang('Reserve')
            </a>
        </button>
    </div>
</main>
@endsection
