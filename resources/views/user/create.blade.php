@extends('layouts.app')

@php
    if(request()->routeIs('user.create')) $title = "Registration";
    else $title = "New user";
@endphp

@section('title', trans($title))
@section('content')


<main class="wrapper">
    <div class="container-form">
        <h1>@lang($title)</h1>
        <form method="POST" action="{{ route('user.store') }}" class="form">
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

            @if(request()->routeIs('user.create'))
            <input type="hidden" name="privilege_id" value="1">
            @elseif(request()->routeIs('user.employee'))
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="privilege" >@lang('Privilege')*</label>
                    <select class="input input-placeholder" name="privilege_id" id="privilege">
                        <option value="2"  
                            @if(2 == old('privilege_id'))
                            selected
                            @endif 
                            >@lang('Employee')
                        </option>
                        <option value="3"  
                            @if(3 == old('privilege_id'))
                            selected
                            @endif 
                            >@lang('Administrator')
                        </option>
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('privilege_id'))
                    {{ $errors->first('privilege_id')}}
                @endif
                </div>
            </div>
            @endif


            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="date_de_naissance" >@lang('Date of birth')*</label>
                    <input class="input input-placeholder" type="date" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance')}}" placeholder=" {{trans('dd-mm-yyyy')}}">
                </div>
                <div class="control-erreur">
                @if($errors->has('date_de_naissance'))
                    {{ $errors->first('date_de_naissance')}}
                @endif
                </div>
            </div>
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="code_postal">@lang('Post code')*</label>
                    <input class="input" type="text" id="code_postal" name="code_postal" value="{{old('code_postal')}}">
                </div>
                <div class="control-erreur">
                @if($errors->has('code_postal'))
                    {{ $errors->first('code_postal')}}
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
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="telephone">@lang('Telephone')*</label>
                    <input class="input" type="tel" id="telephone" name="telephone" value="{{old('telephone')}}">
                </div>
                <div class="control-erreur">
                @if($errors->has('telephone'))
                    {{ $errors->first('telephone')}}
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
                    <label class="label" for="password" >@lang('Password')*</label>
                    <input class="input" type="password" id="password" name="password">
                </div>
                <div class="control-erreur">
                @if($errors->has('password'))
                    {{ $errors->first('password')}}
                @endif
                </div>
            </div>
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="password_confirmation">@lang('Confirm password')*</label>
                    <input class="input" type="password" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
            <div class="form-btnContainer">
                <button class="btn btn-tertiaire">@lang('Submit')</button>
            </div>
        </form>
    </div>
</main>

@endsection
