@extends('layouts.app')
@section('title', 'Page Teste')
@section('content')

<main class="wrapper">
    <div class="welcome">
        <div class="projet">
            <h3>Description du Projet :</h3>
            <p><b>VEHICULES D'OCCASION INC. </b>est un concessionnaire automobile qui achète et revend des voitures. L'entreprise
            vise à améliorer son processus de gestion commerciale des produits (voitures), des clients, des ventes et des
            nouvelles arrivées (voitures) en intégrant un CRM et en proposant ses produits aux clients potentiels via un site
            Web transactionnel (commerce électronique).</p>
        </div>

        <div class="equipe"> 
            <h3>Équipe :</h3>
            <div class="m">
                <img src="{{asset('assets/img/svg/m.svg')}}" alt="Mei">
                <div class="div-p">
                    <p>Mei Yang</p>
                </div>
            </div>
            <div class="f">
                <img src="{{asset('assets/img/svg/f.svg')}}" alt="Fernanda">
                <div class="div-p">
                    <p>Fernanda Frata Mamud</p>
                </div>
            </div>
            <div class="g">
                <img src="{{asset('assets/img/svg/g.svg')}}" alt="Guillermo">
                <div class="div-p">
                    <p>Guillermo Villanueva Jimenez</p>
                </div>
            </div>
            <div class="x">
                <img src="{{asset('assets/img/svg/x.svg')}}" alt="Xuying">
                <div class="div-p">
                    <p>Xuying Wu</p>
                </div>
            </div>
        </div>

        <div class="role">
            <h3>Rôles :</h3>
            <li>Responsable Git : <b>Fernanda</b></li>
            <li>Responsable de la planification : <b>Mei</b></li>
            <li>Responsable du design : <b>Xuying</b></li>
            <li>Responsable deCSS Architecture : <b>Mei</b></li>
            <li>Responsable de la base de données : <b>Guillermo</b></li>
            <li>Responsable de l'intégration côté client : <b>Guillermo</b></li>
            <li>Responsable de l'intégration côté serveur : <b>Fernanda</b></li>
            <li>Responsable de la réalisation de pages statiques : <b>Xuying</b></li>
        </div>

        <div class="app">
            <h3>Technologies Utilisées :</h3>
            <li>Backend : <b>Laravel, Php, MySql, PhpUnit</b> </li>
            <li>Frontend : <b>React, Javascript, Jest (au besoin)</b> </li>
            <li>Gestion de version : <b>Git, Github</b></li>
        </div>
    </div>
</main>
@endsection