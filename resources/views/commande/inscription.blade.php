@extends('layouts.app')
@section('title', trans(''))
@section('content')

<!-- Ajouter form de guest checkout ou faire login -->
<p>Voiture id : {{ $voiture_id }}</p>
<br>
<br>
<br>
<a href="{{ route('login', ['voiture_id' => $voiture_id]) }}">Deja un membre ? Login</a>
<br>
<br>
<form method="POST" class="form" action="{{ route('user.storeGuest', ['voiture_id' => $voiture_id]) }}">
    <h1>Creer une compte !</h1>
    @csrf
    <div class="form-inputContainer">
        <div class="control-input">
            <label class="label" for="nom">@lang('Nom')*</label>
            <input class="input" type="text" id="nom" name="nom" value="{{old('nom')}}">
        </div>
        <div class="control-erreur">
        @if($errors->has('nom'))
            {{ $errors->first('nom')}}
        @endif
        </div>
    </div>
    <div class="form-inputContainer">
        <div class="control-input">
            <label class="label" for="courriel">@lang('Email')*</label>
            <input class="input" type="text" id="courriel" name="courriel" value="{{old('courriel')}}">
        </div>
        <div class="control-erreur">
        @if($errors->has('courriel'))
            {{ $errors->first('courriel')}}
        @endif
        </div>
    </div>
    <div class="form-inputContainer">
        <div class="control-input">
            <label class="label" for="ville" >@lang('City')*</label>
            <select class="input input-placeholder" name="ville_id" id="ville">
                <option value="">@lang('Choose one')</option>
                @foreach($villes as $ville)
                <option value="{{$ville['id']}}" 
                    @if($ville['id'] == old('ville_id'))
                    selected
                    @endif 
                >{{$ville['nom']}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="control-erreur">
        @if($errors->has('ville_id'))
            {{ $errors->first('ville_id')}}
        @endif
        </div>
    </div>
    <div class="form-btnContainer">
        <button class="btn btn-primaire">@lang('Submit')</button>
    </div>
</form>
@endsection