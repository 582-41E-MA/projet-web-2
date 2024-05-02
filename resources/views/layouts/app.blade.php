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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            <a href="{{ route('voiture.index') }}">

                <div class="logo">
                    <img src="{{asset('assets/img/svg/logo.svg')}}" alt="logo">
                </div>
            </a>
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
                                <li><a href="{{ route('journal') }}">@lang('Journal Log')</a></li>
                            </ul>
                        </nav>
                    </div>           
                @else
                <!-- version sans sous-liste / guest -->
                <div class="div-list-nav">
                    <nav>
                        <ul class="list-nav">
                            <li><a href="{{ route('voiture.index') }}" class="{{ request()->routeIs('voiture.index') ? 'active' : '' }}">@lang('Cars list')</a></li>
                            <li><a href="{{ route('voiture.about') }}">@lang('About us')</a></li>
                            <li><a href="{{ route('voiture.policy') }}">@lang('Sales Policies')</a></li>
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

                @php
                    $panier = session('panier');
                @endphp
                @if ($panier)
                <a href="{{ route('commande.showPanier', Auth::user()->id) }}">
                    <img src="{{ asset('assets/img/svg/panier.svg') }}" alt="icone_panier">
                </a>
                @endif

                <div class="div-connexion">
                    <a href="{{ route('logout') }}">@lang('Sign out')</a>
                </div>
                <p class="user-email">{{ Auth::user()->courriel }}</p>

                @else

                @php
                    $sessionId = session('id');
                    $panier = session('panier');
                @endphp

                @if ($sessionId && $panier) 
                    <a href="{{ route('commande.showPanier', ['user' => $sessionId]) }}">
                        <img src="{{ asset('assets/img/svg/panier.svg') }}" alt="icone_panier">
                    </a>
                @endif
                
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

<footer>
    <div class="div-footer">
        <div class="footer-contenu">
            <div class="logo-contact">
                <a href="{{ route('voiture.index') }}">
                    <div class="logo">
                        <img src="{{asset('assets/img/svg/logo-car.svg')}}" alt="logo">
                    </div>
                </a>
                <div class="contact">
                    <div>
                        <label for="name">@lang('Name')</label>
                        <input type="text" id="name">
                    </div>
                    <div>
                        <label for="email">@lang('Email')</label>
                        <input type="email" id="email">
                    </div>
                    <div>
                        <label for="message">@lang('Message')</label>
                        <input type="text" id="message">
                    </div> 
                    <div class="div-button">
                        <a href="#"><button>@lang('Contact us')</button></a>                  
                    </div>
                </div>                    
            </div>
            <div class="link-icon">
                <div class="link">
                    <a href="#"><p>@lang('Privacy Policy')</p></a>
                    <a href="#"><p>@lang('Find a car')</p></a>
                    <a href="#"><p>@lang('Get approved')</p></a>
                    <a href="#"><p>@lang('Sell your car')</p></a>
                    <a href="#"><p>@lang('Career')</p></a>
                    <a href="#"><p>@lang('Humanity')</p></a>
                    <a href="#"><p>@lang('Newsroom')</p></a>
                    <a href="#"><p>@lang('Blog')</p></a>
                </div>
                <div class="icon">
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                    <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="copyright">© 2024 Copyright - Vechicles d’Occasion</div>
    </div>
</footer>

</body>
</html>