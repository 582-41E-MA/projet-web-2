@extends('layouts.app')
@section('title', trans('Accueil'))
@section('content')
<script>
    var currentLocale = "<?php print app()->getLocale(); ?>";
</script>


<main class="wrapper">
    <div class="form_recherche" data-js-component="Recherche"> 
            <label for="rechercher"></label>
            <input class="input_recherche mt-xl" type="text" id="recherche" name="rechercher">
            <button class="btn btn-quatrieme mr-sm" type="submit">@lang('Search')</button>
    </div>

    <div class="container_accueil mt-sm mr-sm ml-sm">

        <!-- Filtres -->
        <div class="filtres-catalogue" >

            <form method="post">
            @csrf

                <!-- Make -->

                <h3 class="p_titre_filtre mb-sm">@lang('Make')</h3>
                @foreach($marques as $marque)
                <div class="mb-xs">
                    <label class="p-filtre mb-lg" for="{{$marque->nom}}">{{$marque->nom}}</label>
                    <input class="checkbox-container" type="checkbox" id="{{$marque->nom}}" name="marques[]" value="{{$marque->id}}"
                    @if(isset($filtres->marques))
                        @php
                            $key = $marque['id'];
                            $table = $filtres->marques;
                        @endphp

                        @if (in_array($key, $table))
                            checked
                        @endif 
                    @endif 
                    >
                </div>
                @endforeach

                <!-- Body Type -->

                <h3 class="p_titre_filtre mb-sm mt-sm">@lang('Body Type')</h3>
                <div class="grid_carrosserie" class="mb-xs">
                    @foreach($carrosseries as $carrosserie)
                    <div>
                        <div>
                            <label class="p-filtre mb-lg" for="{{$carrosserie['nom']}}">{{$carrosserie['nom']}}</label>
                            <input class="checkbox-container" type="checkbox" id="carrosserie" name="carrosseries[]" value="{{$carrosserie['id']}}"
                            @if(isset($filtres->carrosseries))
                                @php
                                    $key = $carrosserie['id'];
                                    $table = $filtres->carrosseries;
                                @endphp

                                @if (in_array($key, $table))
                                    checked
                                @endif 
                            @endif 
                            >
                        </div>
                        <div>
                            <img src="{{asset('assets/img/svg/').'/'.$carrosserie['url_svg'].'.svg'}}" alt="{{$carrosserie['nom']}}">
                        </div>
                    </div>
                    @endforeach
                </div> 
                
                <!-- Year -->

                <h3 class="p_titre_filtre mb-sm mt-sm">@lang('Year')</h3>
                @foreach($annees as $annee)
                <div class="mb-xs">
                    <input class="checkbox-container" type="checkbox" id="annee1" name="annees[]" value="{{ $annee['value'] }}"
                    @if(isset($filtres->annees))
                        @php
                            $key = $annee['value'];
                            $table = $filtres->annees;
                        @endphp

                        @if (in_array($key, $table))
                            checked
                        @endif 
                    @endif 
                    >
                    <label class="p-filtre mb-lg" for="annee1">@lang($annee['label'])</label>
                </div>
                @endforeach

                <!-- Traction -->
                <div class="p_titre_filtre mb-sm mt-sm">
                    <label for="traction_id" class="p-filtre mb-lg">@lang('Traction')</label>
                </div>
                <select name="tractions" id="traction_id" class="checkbox-container" >
                    <option value="">@lang('Choose one')</option>
                    @foreach($tractions as $traction)
                        <option value="{{ $traction['id'] }}" 
                        @if(isset($filtres))
                            @if ($traction['id'] == $filtres->tractions) selected 
                            @endif
                        @endif >
                        {{ $traction['nom'] }}
                        </option>
                    @endforeach
                </select>

                <!-- Carburant -->
                <div class="p_titre_filtre mb-sm mt-sm">
                    <label for="carburant_id" class="p-filtre mb-lg">@lang('Carburant')</label>
                </div>
                <select name="carburants" id="carburant_id" >
                    <option value="">@lang('Choose one')</option>
                    @foreach($carburants as $carburant)
                        <option value="{{ $carburant['id'] }}" 
                        @if(isset($filtres))
                            @if ($carburant['id'] == $filtres->carburants) selected 
                            @endif
                        @endif >
                        {{ $carburant['nom'] }}
                        </option>
                    @endforeach
                </select>

                <!-- Transmission -->
                <div class="p_titre_filtre mb-sm mt-sm">
                    <label for="transmission_id" class="p-filtre mb-lg">@lang('Transmission')</label>
                </div>
                <select name="transmissions" id="transmission_id" >
                    <option value="">@lang('Choose one')</option>
                    @foreach($transmissions as $transmission)
                        <option value="{{ $transmission['id'] }}" 
                        @if(isset($filtres))
                            @if ($transmission['id'] == $filtres->transmissions) selected 
                            @endif
                        @endif >
                        {{ $transmission['nom'] }}
                        </option>
                    @endforeach
                </select>
                
                <div class="filtres__btns">
                    <button class="btn btn-primaire mt-xl" type="submit">@lang('Apply')</button>
                    <a href="{{ route('voiture.index') }}" class="btn btn-quatrieme mt-sm" >@lang('Reset')</a>
                </div>

            </form>
        </div>

        <!-- Template -->
        <template data-template-voiture>
            <div class="item-catalogue">
                <div class="car-image">
                    <img src="" alt="image" >
                </div>
                <div class="car-info">
                <div class="car-detail">
                    <h2></h2>
                    <p class="mt-xs">Km : 10,000</p>
                    <p class="mt-xs">Transmission : </p>
                    <p class="mt-xs">Fuel: </p>
                </div>
                <div class="car-prix">
                    <p class="p_text_prix mr-sm mb-sm"></p>
                    <button class="btn btn-primaire mt-xs mr-sm" type="submit">Plus d‘info</button>
                </div>
            </div>
        </template>

        <!-- Catalogue -->
        <div class="grid-catalogue" data-js-catalogue>
            @forelse($voitures as $voiture)
                <div class="item-catalogue">
                    <div class="car-image">
                        <img src="{{asset('assets/img/voitures/').'/'.$voiture['photoPrincipale']}}" alt="">
                    </div>
                    <div class="car-info">
                        <div class="car-detail">
                            <a href="{{ route('voiture.show', $voiture['id'] ) }}">
                                <h2>{{ $voiture['marque']}} {{ $voiture['modele']}} {{ $voiture['annee']}}</h2>
                            </a>
                            <p class="mt-xs">@lang('Traction'): {{ $voiture['traction']}}</p>
                            <p class="mt-xs">@lang('Transmission'): {{ $voiture['transmission']}}</p>
                            <p class="mt-xs">@lang('Fuel'): {{ $voiture['carburant']}}</p>
                        </div>
                        <div class="car-prix">
                            <p class="p_text_prix mr-sm mb-sm">{{ $voiture['prix_vente']}}$</p>
                            <a href="{{ route('voiture.show', $voiture['id'] ) }}">
                                <button class="btn btn-primaire mt-xs mr-sm " type="submit">@lang('More info')</button>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
            <p>@lang('No results')</p>
            @endforelse
        </div>

    </div> 
</main>
@endsection
    