@extends('layouts.app')
@section('title', __('Add brand'))
@section('content') 
<main class="wrapper">
    <div class="container-form">
        <h1>@lang('Add brand')</h1>
        <form method="POST" class="form">
            @csrf
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="nom" class="label">@lang('Name')</label>
                    <input type="text" name="nom" class="input" id="nom" value="{{ old('nom') }}">
                </div>
                <div class="control-erreur">
                    @if($errors->has('nom'))
                        {{ $errors->first('nom')}}
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