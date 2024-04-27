@extends('layouts.app')
@section('title', __('Order'))
@section('content')

<main class="page-panier">
    user id : {{ $user }}
    <br>
    provence id : {{ $provence_user }}
    <script>
        // Envoyer le user id vers le JS
        var user_id = {{ $user }}
        var provence_user_id = {{ $provence_user }}
    </script>
    <div class="nom-page">
        <h3>@lang('')</h3>
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
                        <h1 data-js-prix="{{ $voiture->prix_vente }}">${{ $voiture->prix_vente }}</h1>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach

    </div>

    <form method="POST" class="form form-commande">
    @csrf
        <div class="form-inputContainer" data-js-component="Expedition">
            <div class="control-input">
                <label for="expedition_id" class="label">@lang('Expedition')</label>
                <select name="expedition_id" id="expedition_id" class="input input-placeholder" data-js-select>
                    <option value="0">@lang('Select an expedition')</option>
                    @foreach($expeditions as $expedition)
                    @php
                    $locale = (session('locale') !== null ? session('locale') : 'en');
                    $expedition->nom = $expedition->nom[$locale];
                    @endphp
                        <option data-js-expedition="{{ $expedition->id }}" value="{{ $expedition->id }}" {{ old('expedition_id') == $expedition->id ? 'selected' : '' }}>{{ $expedition->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="control-erreur">
                @if($errors->has('expedition_id'))
                    {{ $errors->first('expedition_id')}}
                @endif
            </div>
        </div>

        <div class="form-inputContainer">
            <div class="control-input">
                <label for="" class="label">@lang('Price') : </label>
                <input type="text" name="" class="input input-simple" id="" data-js-input="prix">
            </div>
        </div>
        <div class="form-inputContainer">
            <div class="control-input">
                <label for="" class="label">@lang('Expedition tax') : </label>
                <input type="text" name="" class="input input-simple" id="" data-js-input="expedition_tax">
            </div>
        </div>
        <div class="form-inputContainer">
            <div class="control-input">
                <label for="federal_tax" class="label">GST/HST : </label>
                <input type="text" name="federal_tax" class="input input-simple" id="federal_tax" data-js-input="federal_tax">
            </div>
        </div>
        <div class="form-inputContainer">
            <div class="control-input">
                <label for="provincial_tax" class="label">PST/RST/QST : </label>
                <input type="text" name="provincial_tax" class="input input-simple" id="provincial_tax" data-js-input="provincial_tax">
            </div>
        </div>
        <div class="form-inputContainer">
            <div class="control-input">
                <label for="prix_finale" class="label">@lang('Total') : </label>
                <input type="text" name="prix_finale" class="input input-simple" id="prix_finale" data-js-input="prix_finale">
            </div>
        </div>
        <div data-js-infos>
            <input type="hidden" name="commande_id" value="{{ $commande_id }}">
        </div>
        <div class="buttons">
            <button class="btn btn-primaire">
                @lang('Pay')
            </button>
        </div>
    </form>
    <br>
    <br>
    <br>

</main>

@endsection