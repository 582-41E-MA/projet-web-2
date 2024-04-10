@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
<main>
    <div class="container_accueil">
        <div class="filtres-catalogue">filtres</div>
        <div class="grid-catalogue">
            <div> 
                <form>
                    <label for="rechercher"></label>
                    <input type="text" id="rechercher" name="rechercher">
                    <button class="btn-primaire" type="submit">Rechercher</button>
                </form>
            </div>
        <div class="item-catalogue">
            <div class="car-image">
                <img src="{{ asset('assets/img/voitures/audi_a5.jpg') }}" width="252" alt="Audi A5">
            </div>
            <div class="car-info">
                <div class="car-detail">
                    <h2>Audi A5</h2>
                    <p>Km : 10,000</p>
                    <p>Transmission : Automatic</p>
                    <p>Fuel: Gas</p>
                </div>
                <div class="car-prix">
                    <h2>50.000,00</h2>
                    <button class="btn-primaire" type="submit">Plus</button>
                </div>
            </div>
        </div>
        <div class="item-catalogue">
            <div class="car-image">
                <img src="{{ asset('assets/img/voitures/audi_a5.jpg') }}" width="252" alt="Audi A5">
            </div>
            <div class="car-info">
                <div class="car-detail">
                    <h2>Audi A5</h2>
                    <p>Km : 10,000</p>
                    <p>Transmission : Automatic</p>
                    <p>Fuel: Gas</p>
                </div>
                <div class="car-prix">
                    <h2>50.000,00</h2>
                    <button class="btn-primaire" type="submit">Plus</button>
                </div>
            </div>
        </div>
        <div class="item-catalogue">
            <div class="car-image">
                <img src="{{ asset('assets/img/voitures/audi_a5.jpg') }}" width="252" alt="Audi A5">
            </div>
            <div class="car-info">
                <div class="car-detail">
                    <h2>Audi A5</h2>
                    <p>Km : 10,000</p>
                    <p>Transmission : Automatic</p>
                    <p>Fuel: Gas</p>
                </div>
                <div class="car-prix">
                    <h2>50.000,00</h2>
                    <button class="btn-primaire" type="submit">Plus</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection