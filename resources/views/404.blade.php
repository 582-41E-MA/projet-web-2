@extends('layouts.app')
@section('title', '404')
@section('content')
   
<main class="wrapper">
    <div class="page404">
        <img src="{{asset('assets/img/svg/404.svg')}}" alt="404">
        <h3>Oops ! Page not found !</h3>
    </div>
</main>
@endsection