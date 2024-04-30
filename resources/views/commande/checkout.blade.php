@extends('layouts.app')
@section('title', trans('Checkout'))
@section('content')
   
<main class="wrapper">
@if(session('success'))
    <p class="message">
    {{session('success')}}
    </p>
@endif

    <div class="container-form">
        <h1>@lang('Checkout')</h1>
        <form method="POST" class="form">
            @csrf
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="prix">@lang('Amount')</label>
                    <input class="input" disabled id="prix" name="prix" value="{{$commande->prix}}">
                </div>
                <div class="control-erreur">
                @if($errors->has('prix'))
                    {{ $errors->first('prix')}}
                @endif
                </div>
            </div>
            <div class="form-btnContainer">
                <button class="btn btn-primaire">@lang('Checkout')</button>
            </div>
        </form>
    </div>
</main>
@endsection
    