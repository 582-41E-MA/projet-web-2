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


    <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
    </p>
    
    <!-- Button de filtrage a la version mobile -->
    <div class="filtrage" data-js-component="Filtrage">
        <button class="btn btn-primaire mt-xl" type="submit">@lang('Filters')</button>
    </div>


    <div class="container_accueil mt-sm mr-sm ml-sm">

        <!-- Modal pour afficher les filtres a la version mobile -->
        <section class="modal modal--ferme" data-js-modal="exit">
            <div class="modal__filtres">
                <div class="filtres__titre">
                    <h2 >Filtres</h2>
                </div>
                <form class="filtres__form" action="{{ route('voitures.select') }}"  data-js-filtres="modal" >         
                </form>
            </div>
        </section>

        <!-- Filtres -->
        <div class="filtres-catalogue">

            <form action="{{ route('voitures.select') }}" data-js-filtres="ecran">

                <!-- Make -->

                <h3 class="p_titre_filtre mb-sm">@lang('Make')</h3>
                <div class="mb-xs">
                    @foreach($marques as $marque)
                    <div class="checkbox-container mb-xs">
                        <input type="checkbox" id="{{$marque->nom}}" name="marques[]" value="{{$marque->id}}"
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
                        <label class="p-filtre mb-lg" for="{{$marque->nom}}">{{$marque->nom}}</label>
                    </div>
                    @endforeach
                </div>

                <!-- Body Type -->

                <h3 class="p_titre_filtre mb-sm mt-sm">@lang('Body Type')</h3>
                <div class="grid_carrosserie mb-xs">
                    @foreach($carrosseries as $carrosserie)
                    <div>
                        <div class="checkbox-container checkbox-container--body-type" >
                            <label class="p-filtre" for="{{$carrosserie['nom']}}">{{$carrosserie['nom']}}</label>

                            <input type="checkbox" id="{{$carrosserie['nom']}}" name="carrosseries[]" value="{{$carrosserie['id']}}"
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
                        <div class="body-type">
                            <img src="{{asset('assets/img/svg/').'/'.$carrosserie['url_svg'].'.svg'}}" alt="{{$carrosserie['nom']}}">
                        </div>
                    </div>
                    @endforeach
                </div> 
                
                <!-- Year -->

                <h3 class="p_titre_filtre mb-sm mt-sm">@lang('Year')</h3>
                @foreach($annees as $annee)
                <div class="checkbox-container mb-xs">
                    <input type="checkbox" id="{{ $annee['value'] }}" name="annees[]" value="{{ $annee['value'] }}"
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
                    <label class="p-filtre mb-lg" for="{{ $annee['value'] }}">@lang($annee['label'])</label>
                </div>
                @endforeach


                <!-- Traction -->
                <div class="p_titre_filtre mb-sm mt-sm">
                    <label for="traction_id p-filtre mb-lg">@lang('Traction')</label>
                </div>
                <select class="select" name="tractions" id="traction_id">
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
                    <label for="carburant_id p-filtre mb-lg">@lang('Carburant')</label>
                </div>
                <select  class="select" name="carburants" id="carburant_id" >
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
                    <label for="transmission_id p-filtre mb-lg">@lang('Transmission')</label>
                </div>
                <select  class="select" name="transmissions" id="transmission_id" >
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
                        <img src="{{asset('assets/img/voitures/').'/'.$voiture['photoPrincipale']}}" alt="{{ $voiture['marque']}} {{ $voiture['modele']}} {{ $voiture['annee']}}" >
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
            <h2 class="ml-xl mt-lg">@lang('There are no results for the selected filtres')</h2>
            @endforelse
        </div>

    </div> 
</main>
@endsection
    