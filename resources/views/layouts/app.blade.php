<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles supplémentaire -->
    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" media="screen">

    <!-- Scripts -->
    <script type="module" src="{{asset('assets/js/main.js')}}" defer></script>

</head>
<body>
    @php 
        $locale = session()->get('locale');

        if(Auth::user()) $privilege = Auth::user()->privilege->nom;
        else $privilege = 'client';
    @endphp

    <header>
        <div class="div-header">
            <div class="line-1"></div>
            <div class="line-2"></div>
            <div class="div-nav">
                <div class="logo">
                    <img src="{{asset('assets/img/svg/logo.svg')}}" alt="logo">
                </div>
                @if($privilege == 'employé' || $privilege == 'administrateur')
                    <div class="div-list-nav">
                        <nav>
                            <ul class="list-nav">
                                <li class="voiture-nav"><span class="{{ request()->routeIs('user.index') || request()->routeIs('user.create') || request()->routeIs('user.edit') ? 'active' : '' }}"href="">@lang('Employee')</span>                          
                                    <ul class="sous-list-nav">
                                        <li><a class="{{ request()->routeIs('user.index') ? 'active' : '' }}" href="{{ route('user.index') }}">@lang('Employee list')</a></li>
                                        <li><a class="{{ request()->routeIs('user.create') ? 'active' : '' }}" href="{{ route('user.create') }}">@lang('Add employee')</a></li>
                                    </ul>
                                </li>

                                <li class="voiture-nav"><span class="{{ request()->routeIs('user.indexClient') ||  request()->routeIs('user.createClient') ||  request()->routeIs('user.editClient') ? 'active' : '' }}"href="">@lang('Client')</span>                          
                                    <ul class="sous-list-nav">
                                        <li><a class="{{ request()->routeIs('user.indexClient') ? 'active' : '' }}" href="{{ route('user.indexClient') }}">@lang('Client list')</a></li>
                                        <li><a class="{{ request()->routeIs('user.createClient') ? 'active' : '' }}" href="{{ route('user.createClient') }}">@lang('Add Client')</a></li>
                                    </ul>
                                </li>

                                <!-- ajouter l'autres routes -->
                                <li class="voiture-nav"><span class=" {{ request()->routeIs('voiture.index') || request()->routeIs('voiture.create') || request()->routeIs('voiture.edit') || request()->routeIs('voiture.parametres') ? 'active' : '' }}" href="">@lang('Car')</span>                          
                                    <ul class="sous-list-nav">
                                        <li><a class="{{ request()->routeIs('voiture.index') ? 'active' : '' }}" href="{{ route('voiture.index') }}">@lang('Cars list')</a></li>
                                        <li><a class="{{ request()->routeIs('voiture.create') ? 'active' : '' }}" href="{{ route('voiture.create') }}">@lang('Add car')</a></li>
                                        <li><a class="{{ request()->routeIs('voiture.parametres') ? 'active' : '' }}" href="{{ route('voiture.parametres') }}">@lang('Car parameters')</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>           
                @else
                <!-- version sans sous-liste / guest -->
                <div class="div-list-nav">
                    <nav>
                        <ul class="list-nav">
                            <li><a href="{{ route('voiture.index') }}" class="{{ request()->routeIs('voiture.index') ? 'active' : '' }}">@lang('Cars list')</a></li>
                            <li><a href="">@lang('About us')</a></li>
                            <li><a href="">@lang('Sales Policies')</a></li>
                        </ul>
                    </nav>
                </div> 
                @endif
            </div>
            <div class="div-lang">
                @if ($locale == 'en' || $locale == '')
                    <button class="btn btn-primaire"><a href="{{ route('lang', 'fr') }}">FR</a></button>
                @else ($locale == 'fr')
                    <button class="btn btn-primaire"><a href="{{ route('lang', 'en') }}">EN</a></button>
                @endif
                @auth
                <div class="div-connexion">
                    <a href="{{ route('logout') }}">@lang('Sign out')</a>
                </div>
                <p class="user-email">{{ Auth::user()->courriel }}</p>
                @else
                <div class="div-connexion">
                    <a href="{{ route('user.createClient') }}">@lang('Registration')</a>
                </div>
                <div class="div-connexion">
                    <a href="{{ route('login') }}">@lang('Sign in')</a>
                </div>
                @endauth
            </div>
        </div>
    </header>

    @yield('content')

</body>
</html>