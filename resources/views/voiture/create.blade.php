@extends('layouts.app')
@section('title', __('Add car'))
@section('content')
<main class="wrapper">
    <div class="container-form">
        <h1>@lang('Add car')</h1>
        <form method="POST" class="form" enctype="multipart/form-data">
            @if(Auth::user()) 
                @php $privilege = Auth::user()->privilege_id @endphp
            @else
                @php $privilege = 1 @endphp
            @endif
            <script>
                // Envoyer les variables de traduction vers le JS
                var translations = {
                    select_model: "@lang('Select a model')",
                };
                // Envoyer les variables de privilege vers le JS
                var privilegeLevel = {{ $privilege }};
            </script>
            @csrf
            <div class="form-inputContainer" data-js-component="Marque">
                <div class="control-input">
                    <label for="marque_id" class="label">@lang('Brand')</label>
                    <select name="marque_id" id="marque_id" class="input input-placeholder" data-js-select>
                        <option value="0">@lang('Select a brand')</option>
                        @foreach($marques as $marque)
                            <option data-js-marque="{{ $marque->id }}" value="{{ $marque->id }}" {{ old('marque_id') == $marque->id ? 'selected' : '' }}>{{ $marque->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('marque_id'))
                    {{ $errors->first('marque_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer" data-js-component="Modele" >
                <div class="control-input">
                    <label for="modele_id" class="label">@lang('Model')</label>
                    <select name="modele_id" id="modele_id" class="input input-placeholder" data-js-modeles data-old-modele-id="{{ old('modele_id') }}">
                        <option value="0">@lang('Select a model')</option>
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('modele_id'))
                    {{ $errors->first('modele_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="annee_id" class="label">@lang('Year')</label>
                    <select name="annee_id" id="annee_id" class="input input-placeholder">
                        <option value="0">@lang('Select the year')</option>
                        @foreach($annees as $annee)
                            <option value="{{ $annee->id }}" {{ old('annee_id') == $annee->id ? 'selected' : '' }}>{{ $annee->annee }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('annee_id'))
                    {{ $errors->first('annee_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="transmission_id" class="label">@lang('Transmission')</label>
                    <select name="transmission_id" id="transmission_id" class="input input-placeholder">
                        <option value="0">@lang('Select a transmission')</option>
                        @foreach($transmissions as $transmission)
                        @php
                        $locale = (session('locale') !== null ? session('locale') : 'en');
                        $transmission->nom = $transmission->nom[$locale];
                        @endphp
                        <option value="{{ $transmission->id }}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{ $transmission->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('transmission_id'))
                    {{ $errors->first('transmission_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="traction_id" class="label">@lang('Traction')</label>
                    <select name="traction_id" id="traction_id" class="input input-placeholder">
                        <option value="0">@lang('Select a traction')</option>
                        @foreach($tractions as $traction)
                        @php
                        $locale = (session('locale') !== null ? session('locale') : 'en');
                        $traction->nom = $traction->nom[$locale];
                        @endphp
                        <option value="{{ $traction->id }}" {{ old('traction_id') == $traction->id ? 'selected' : '' }}>{{ $traction->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('traction_id'))
                    {{ $errors->first('traction_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="carburant_id" class="label">@lang('Fuel')</label>
                    <select name="carburant_id" id="carburant_id" class="input input-placeholder">
                        <option value="0">@lang('Select a fuel type')</option>
                        @foreach($carburants as $carburant)
                        @php
                        $locale = (session('locale') !== null ? session('locale') : 'en');
                        $carburant->nom = $carburant->nom[$locale];
                        @endphp
                        <option value="{{ $carburant->id }}" {{ old('carburant_id') == $carburant->id ? 'selected' : '' }}>{{ $carburant->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('carburant_id'))
                    {{ $errors->first('carburant_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="carrosserie_id" class="label">@lang('Body type')</label>
                    <select name="carrosserie_id" id="carrosserie_id" class="input input-placeholder">
                        <option value="0">@lang('Select body type')</option>
                        @foreach($carrosseries as $carrosserie)
                        @php
                        $locale = (session('locale') !== null ? session('locale') : 'en');
                        $carrosserie->nom = $carrosserie->nom[$locale];
                        @endphp
                        <option value="{{ $carrosserie->id }}" {{ old('carrosserie_id') == $carrosserie->id ? 'selected' : '' }}>{{ $carrosserie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('carrosserie_id'))
                    {{ $errors->first('carrosserie_id')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="date_arrive" class="label">@lang('Arrival date')</label>
                    <input type="date" name="date_arrive" class="input" id="date_arrive" value="{{ old('date_arrive') }}">
                </div>
                <div class="control-erreur">
                @if($errors->has('date_arrive'))
                    {{ $errors->first('date_arrive')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="prix_paye" class="label">@lang('Price paid')</label>
                    <input type="number" name="prix_paye" class="input" id="prix_paye" data-js-input="prix_paye" value="{{ old('prix_paye') }}">
                </div>
                <div class="control-erreur">
                @if($errors->has('prix_paye'))
                    {{ $errors->first('prix_paye')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer" data-js-component="Prix">
                <div class="control-input">
                    <label for="prix_vente" class="label">@lang('Selling price')</label>
                    <input type="number" name="prix_vente" class="input" id="prix_vente" data-js-input="prix_vente">
                </div>
                <div class="control-erreur">
                @if($errors->has('prix_vente'))
                    {{ $errors->first('prix_vente')}}
                @endif
                </div>
            </div>
    
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="proprietaire" class="label">@lang('Owner')</label>
                    <input type="number" name="proprietaire" class="input" id="proprietaire" value="1">
                </div>
                <div class="control-erreur">
                @if($errors->has('proprietaire'))
                    {{ $errors->first('proprietaire')}}
                @endif
                </div>
            </div>
            
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="photo_principale" class="label">@lang('Main photo')</label>
                    <input type="file" name="photo_principale" class="input" id="photo_principale">
                </div>
                <div class="control-erreur">
                    @if($errors->has('photo_principale'))
                    {{ $errors->first('photo_principale')}}
                    @endif
                </div>
            </div>
            
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="photo_secundaire" class="label">@lang('Secondary photo(s)')</label>
                    <input type="file" name="photo_secundaire[]" class="input" id="photo_secundaire" multiple>
                </div>
                <div class="control-erreur">
                    @if($errors->has('photo_secundaire'))
                    {{ $errors->first('photo_secundaire')}}
                    @endif
                </div>
            </div>
    
            <!-- mudar as infos desse campo -->
            <div class="form-inputContainer">
                <div class="control-input">
                    <!-- <label for="disponible" class="label">@lang('Disponible')</label> -->
                    <input type="hidden" name="disponible" class="input" id="disponible" value="1">
                </div>
            </div>

            <div class="form-btnContainer">
                <button type="submit" class="btn btn-tertiaire">@lang('Add')</button>
            </div>
        </form>
    </div>
</main>
@endsection
