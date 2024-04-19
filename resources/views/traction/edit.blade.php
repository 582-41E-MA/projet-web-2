@extends('layouts.app')
@section('title', __('Modify traction'))
@section('content') 
<main class="wrapper">
    <div class="container-form">
        <h1>@lang('Modify traction')</h1>
        <form method="POST" class="form">
            @csrf
            @method('put')
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="en" class="label">@lang('Name in English')</label>
                    <input type="text" name="en" class="input" id="en" value="{{ old('en', $traction->nom['en']) }}">
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
                    <input type="text" name="fr" class="input" id="fr" value="{{ old('fr', $traction->nom['fr']) }}">
                </div>
                <div class="control-erreur">
                    @if($errors->has('fr'))
                        {{ $errors->first('fr')}}
                    @endif
                </div>
            </div>
            <div class="form-btnContainer">
                <button type="submit" class="btn btn-tertiaire">@lang('Update')</button>
            </div>
        </form>
    </div>
</main>
@endsection