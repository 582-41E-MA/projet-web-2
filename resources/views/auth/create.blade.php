@extends('layouts.app')
@section('title', trans('Login'))
@section('content')
   
<main class="wrapper">
   <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
   </p>

    <div class="container-form">
        <form method="POST" class="form">
            @csrf
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
            <div class="form-btnContainer">
                <button class="btn btn-tertiaire">@lang('Submit')</button>
            </div>
        </form>
    </div>
</main>
@endsection
    