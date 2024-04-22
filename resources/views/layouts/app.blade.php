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
    @php $locale = session()->get('locale') @endphp

    @if(Auth::user()) 
        @php $privilege = Auth::user()->privilege_id @endphp
    @else
        @php $privilege = 1 @endphp
    @endif
   
    <header>
        <div class="div-header">
            <div class="line-1"></div>
            <div class="line-2"></div>
            <div class="div-nav">
                <img src="{{asset('assets/img/svg/logo.svg')}}" alt="logo">
                    @if($privilege == 2 || $privilege == 3)
                    <div class="div-list-nav">
                        <nav>
                            <ul class="list-nav">
                            <li class="voiture-nav"><a class="{{ request()->routeIs('voiture.create') ? 'active' : '' }}" href="">@lang('Employee')</a>                          
                                    <ul class="sous-list-nav">
                                        <li><a class="{{ request()->routeIs('voiture.index') ? 'active' : '' }}" href="{{ route('user.index') }}">@lang('Employee list')</a></li>
                                        <li><a class="{{ request()->routeIs('voiture.create') ? 'active' : '' }}" href="">@lang('Add an employee')</a></li>
                                    </ul>
                                </li>

                                <li class="voiture-nav"><a class="{{ request()->routeIs('voiture.create') ? 'active' : '' }}" href="">@lang('Client')</a>                          
                                    <ul class="sous-list-nav">
                                        <li><a class="{{ request()->routeIs('voiture.index') ? 'active' : '' }}" href="{{ route('userClient.index') }}">@lang('Client list')</a></li>
                                        <li><a class="{{ request()->routeIs('voiture.create') ? 'active' : '' }}" href="">@lang('Add a client')</a></li>
                                    </ul>
                                </li>
                                <!-- ajouter l'autres routes -->
                                <li class="voiture-nav"><a class="{{ request()->routeIs('voiture.create') ? 'active' : '' }}" href="">@lang('Car')</a>                          
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
                            <li><a href="{{ route('voiture.index') }}" class="active">@lang('Cars list')</a></li>
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
                <p>@lang('User:') {{ Auth::user()->courriel }}</p>
                @else
                <div class="div-connexion">
                    <a href="{{ route('user.create') }}">@lang('Registration')</a>
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