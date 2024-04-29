@extends('layouts.app')
@section('title', __('Inscription'))
@section('content')

<form method="POST" class="form" action="{{ route('user.storeGuest', ['voiture_id' => $voiture_id]) }}">
    <div class="form-inscription">
        <h2>@lang('Are you already a member ?')</h2>
        <div>
            <a target=_blank href="{{ route('login', ['voiture_id' => $voiture_id]) }}" class="btn btn-primaire">@lang('Login')</a>
        </div>
    </div>
    <div class="line-form mt-lg"></div>
    @csrf
    <div class="form-inputContainer">
        <div class="mt-xs mb-lg">
            <p>@lang('If you wish to checkout as a visitor, please fill in the following information :')</p>
        </div>
        <div class="control-input">
            <label class="label" for="nom">@lang('Name')*</label>
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




































