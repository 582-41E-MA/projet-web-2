@extends('layouts.app')
@section('title', __('Car parameters'))
@section('styles')
    <!-- Lien Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection
@section('content')
<main class="wrapper">
    <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
    </p>
    <div class="div-parametres">
        <div class="div-marque pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Brand')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <button class="btn btn-tertiaire" type="submit">
                    <a class="ajout" href="{{ route('marque.create') }}">@lang('Add')</a>
                </button>
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($marques as $marque)
                        <div class="div-li pt-xs pb-xs"> 
                            <li>{{ $marque->nom}}</li>
                            <div class="div-form">
                                <a href="{{ route('marque.edit', $marque->id) }}">
                                    <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                                </a>
                                <form action="{{ route('marque.delete', $marque->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="div-pagination pt-xs pb-xs">
                {{ $marques->links() }}
            </div>
        </div>
        <div class="div-modele pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Model')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <button class="btn btn-tertiaire" type="submit">
                    <a class="ajout" href="{{ route('modele.create') }}">@lang('Add')</a>
                </button>
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($modeles as $modele)
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $modele->marque->nom }} - {{ $modele->nom}}</li>
                            <div class="div-form">
                                <a href="{{ route('modele.edit', $modele->id) }}">
                                    <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                                </a>
                                <form action="{{ route('modele.delete', $modele->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button>
                                        <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="div-pagination pt-xs pb-xs">
                {{ $modeles->onEachSide(3)->links() }}
            </div>
        </div>
        <div class="div-carrosserie pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Body type')</h2> 
            </div>
            <div class="div-input pt-md pb-xs">
                <button class="btn btn-tertiaire" type="submit">
                    <a class="ajout" href="{{ route('carrosserie.create') }}">@lang('Add')</a>
                </button>
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($carrosseries as $carrosserie)
                    @php
                    $locale = (session('locale') !== null ? session('locale') : 'en');
                    $carrosserie->nom = $carrosserie->nom[$locale];
                    @endphp
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $carrosserie->nom}}</li>
                            <div class="div-form">
                                <a href="{{ route('carrosserie.edit', $carrosserie->id) }}">
                                    <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                                </a>
                                <form action="{{ route('carrosserie.delete', $carrosserie->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button>
                                        <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="div-pagination pt-xs pb-xs">
                {{ $carrosseries->onEachSide(3)->links() }}
            </div>
        </div>
        <div class="div-transmission pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Transmission')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <button class="btn btn-tertiaire" type="submit">
                    <a class="ajout" href="{{ route('transmission.create') }}">@lang('Add')</a>
                </button>
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($transmissions as $transmission)
                    @php
                    $locale = (session('locale') !== null ? session('locale') : 'en');
                    $transmission->nom = $transmission->nom[$locale];
                    @endphp
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $transmission->nom}}</li>
                            <div class="div-form">
                                <a href="{{ route('transmission.edit', $transmission->id) }}">
                                    <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                                </a>
                                <form action="{{ route('transmission.delete', $transmission->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="div-pagination pt-xs pb-xs">
                {{ $transmissions->links() }}
            </div>
        </div>
        <div class="div-traction pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Traction')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <button class="btn btn-tertiaire" type="submit">
                    <a class="ajout" href="{{ route('traction.create') }}">@lang('Add')</a>
                </button>
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($tractions as $traction)
                    @php
                    $locale = (session('locale') !== null ? session('locale') : 'en');
                    $traction->nom = $traction->nom[$locale];
                    @endphp
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $traction->nom}}</li>
                            <div class="div-form">
                                <a href="{{ route('traction.edit', $traction->id) }}">
                                    <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                                </a>
                                <form action="{{ route('traction.delete', $traction->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="div-pagination pt-xs pb-xs">
                {{ $tractions->links() }}
            </div>
        </div>
        <div class="div-carburant pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Fuel')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <button class="btn btn-tertiaire" type="submit">
                    <a class="ajout" href="{{ route('carburant.create') }}">@lang('Add')</a>
                </button>
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($carburants as $carburant)
                    @php
                    $locale = (session('locale') !== null ? session('locale') : 'en');
                    $carburant->nom = $carburant->nom[$locale];
                    @endphp
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $carburant->nom}}</li>
                            <div class="div-form">
                                <a href="{{ route('carburant.edit', $carburant->id) }}">
                                    <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                                </a>
                                <form action="{{ route('carburant.delete', $carburant->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">
                                        <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <div class="div-pagination pt-xs pb-xs">
                {{ $carburants->links() }}
            </div>
        </div>
    </div>
</main>
@endsection