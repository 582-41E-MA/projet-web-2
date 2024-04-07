@extends('layouts.app')
@section('title', trans('Login'))
@section('content')

<main>
@php $loginMsg = trans('lang.text_registration_success') @endphp

   {{ $loginMsg }}

</main>
   
@endsection
    