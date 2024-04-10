@extends('layouts.app')
@section('title', __('Car parameters'))
@section('content')
<main class="wrapper">
    <div class="div-parametres">
        <div class="div-marque pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Brand')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <input type="text" name="" class="input" id="date_arrive">
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($marques as $marque)
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $marque->nom}}</li>
                            <div>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M14.6283 6.43471C14.9067 6.15637 15.2842 6 15.6779 6C16.0716 6 16.4492 6.15637 16.7276 6.43471L18.5649 8.27207C18.7029 8.40995 18.8123 8.57365 18.8869 8.75383C18.9616 8.934 19 9.12712 19 9.32215C19 9.51718 18.9616 9.7103 18.8869 9.89047C18.8123 10.0706 18.7029 10.2344 18.5649 10.3722L9.73618 19.2012L5 20L5.79951 15.2637L14.6283 6.43471ZM14.4583 8.70413L16.2956 10.5415L17.5152 9.32178L15.6779 7.48516L14.4583 8.70413ZM15.2451 11.5919L13.4086 9.75458L7.18473 15.9786L6.81133 18.1886L9.0213 17.816L15.2451 11.5919Z" fill="black"/>
                                </svg>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M6 7.78271L18 17.9105M18 7.78271L6 17.9105" stroke="#3D3D3D" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="div-modele pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Model')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <input type="text" name="" class="input" id="date_arrive">
            </div>
            <div class="div-liste pl-md pr-md pt-xs pb-xs">
                <ul>
                    @foreach ($modeles as $modele)
                        <div class="div-li pt-xs pb-xs">
                            <li>{{ $modele->nom}}</li>
                            <div>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M14.6283 6.43471C14.9067 6.15637 15.2842 6 15.6779 6C16.0716 6 16.4492 6.15637 16.7276 6.43471L18.5649 8.27207C18.7029 8.40995 18.8123 8.57365 18.8869 8.75383C18.9616 8.934 19 9.12712 19 9.32215C19 9.51718 18.9616 9.7103 18.8869 9.89047C18.8123 10.0706 18.7029 10.2344 18.5649 10.3722L9.73618 19.2012L5 20L5.79951 15.2637L14.6283 6.43471ZM14.4583 8.70413L16.2956 10.5415L17.5152 9.32178L15.6779 7.48516L14.4583 8.70413ZM15.2451 11.5919L13.4086 9.75458L7.18473 15.9786L6.81133 18.1886L9.0213 17.816L15.2451 11.5919Z" fill="black"/>
                                </svg>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M6 7.78271L18 17.9105M18 7.78271L6 17.9105" stroke="#3D3D3D" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="div-carrosserie pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Body type')</h2> 
            </div>
            <div class="div-input pt-md pb-xs">
                <input type="text" name="" class="input" id="date_arrive">
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
                            <div>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M14.6283 6.43471C14.9067 6.15637 15.2842 6 15.6779 6C16.0716 6 16.4492 6.15637 16.7276 6.43471L18.5649 8.27207C18.7029 8.40995 18.8123 8.57365 18.8869 8.75383C18.9616 8.934 19 9.12712 19 9.32215C19 9.51718 18.9616 9.7103 18.8869 9.89047C18.8123 10.0706 18.7029 10.2344 18.5649 10.3722L9.73618 19.2012L5 20L5.79951 15.2637L14.6283 6.43471ZM14.4583 8.70413L16.2956 10.5415L17.5152 9.32178L15.6779 7.48516L14.4583 8.70413ZM15.2451 11.5919L13.4086 9.75458L7.18473 15.9786L6.81133 18.1886L9.0213 17.816L15.2451 11.5919Z" fill="black"/>
                                </svg>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M6 7.78271L18 17.9105M18 7.78271L6 17.9105" stroke="#3D3D3D" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="div-transmission pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Transmission')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <input type="text" name="" class="input" id="date_arrive">
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
                            <div>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M14.6283 6.43471C14.9067 6.15637 15.2842 6 15.6779 6C16.0716 6 16.4492 6.15637 16.7276 6.43471L18.5649 8.27207C18.7029 8.40995 18.8123 8.57365 18.8869 8.75383C18.9616 8.934 19 9.12712 19 9.32215C19 9.51718 18.9616 9.7103 18.8869 9.89047C18.8123 10.0706 18.7029 10.2344 18.5649 10.3722L9.73618 19.2012L5 20L5.79951 15.2637L14.6283 6.43471ZM14.4583 8.70413L16.2956 10.5415L17.5152 9.32178L15.6779 7.48516L14.4583 8.70413ZM15.2451 11.5919L13.4086 9.75458L7.18473 15.9786L6.81133 18.1886L9.0213 17.816L15.2451 11.5919Z" fill="black"/>
                                </svg>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M6 7.78271L18 17.9105M18 7.78271L6 17.9105" stroke="#3D3D3D" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="div-traction pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Traction')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <input type="text" name="" class="input" id="date_arrive">
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
                            <div>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M14.6283 6.43471C14.9067 6.15637 15.2842 6 15.6779 6C16.0716 6 16.4492 6.15637 16.7276 6.43471L18.5649 8.27207C18.7029 8.40995 18.8123 8.57365 18.8869 8.75383C18.9616 8.934 19 9.12712 19 9.32215C19 9.51718 18.9616 9.7103 18.8869 9.89047C18.8123 10.0706 18.7029 10.2344 18.5649 10.3722L9.73618 19.2012L5 20L5.79951 15.2637L14.6283 6.43471ZM14.4583 8.70413L16.2956 10.5415L17.5152 9.32178L15.6779 7.48516L14.4583 8.70413ZM15.2451 11.5919L13.4086 9.75458L7.18473 15.9786L6.81133 18.1886L9.0213 17.816L15.2451 11.5919Z" fill="black"/>
                                </svg>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M6 7.78271L18 17.9105M18 7.78271L6 17.9105" stroke="#3D3D3D" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="div-carburant pl-lg pr-lg">
            <div class="div-titre">
                <h2>@lang('Fuel')</h2>
            </div>
            <div class="div-input pt-md pb-xs">
                <input type="text" name="" class="input" id="date_arrive">
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
                            <div>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M14.6283 6.43471C14.9067 6.15637 15.2842 6 15.6779 6C16.0716 6 16.4492 6.15637 16.7276 6.43471L18.5649 8.27207C18.7029 8.40995 18.8123 8.57365 18.8869 8.75383C18.9616 8.934 19 9.12712 19 9.32215C19 9.51718 18.9616 9.7103 18.8869 9.89047C18.8123 10.0706 18.7029 10.2344 18.5649 10.3722L9.73618 19.2012L5 20L5.79951 15.2637L14.6283 6.43471ZM14.4583 8.70413L16.2956 10.5415L17.5152 9.32178L15.6779 7.48516L14.4583 8.70413ZM15.2451 11.5919L13.4086 9.75458L7.18473 15.9786L6.81133 18.1886L9.0213 17.816L15.2451 11.5919Z" fill="black"/>
                                </svg>
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="25" height="25" rx="5" fill="#D9D9D9"/>
                                <path d="M6 7.78271L18 17.9105M18 7.78271L6 17.9105" stroke="#3D3D3D" stroke-width="3"/>
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection