@extends('layouts.app')
@section('title', trans('Users'))
@section('content')
   
<main class="wrapper">
   <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
   </p>
</main>
@endsection
    