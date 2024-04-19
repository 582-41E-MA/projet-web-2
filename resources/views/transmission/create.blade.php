@extends('layouts.app')
@section('title', __('Add transmission'))
@section('content') 
<main class="wrapper">
    <div class="container-form">
        <h1>@lang('Add transmission')</h1>
        <form method="POST" class="form">
            @csrf
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="en" class="label">@lang('Name in English')</label>
                    <input type="text" name="en" class="input" id="en" value="{{ old('en') }}">
                </div>
                <div class="control-erreur">
                    @if($errors->has('en'))
                        {{ $errors->first('en')}}
                    @endif
                </div>
            </div>
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="fr" class="label">@lang('Name in French')</label>
                    <input type="text" name="fr" class="input" id="fr" value="{{ old('fr') }}">
                </div>
                <div class="control-erreur">
                    @if($errors->has('fr'))
                        {{ $errors->first('fr')}}
                    @endif
                </div>
            </div>
            <div class="form-btnContainer">
                <button type="submit" class="btn btn-tertiaire">@lang('Add')</button>
            </div>
        </form>
    </div>
</main>
@endsection