@extends('layouts.app')
@section('title', __('Modify brand'))
@section('content') 
<main class="wrapper">
    <div class="container-form">
        <h1>@lang('Modify brand')</h1>
        <form method="POST" class="form">
            @csrf
            @method('put')
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="nom" class="label">@lang('Name')</label>
                    <input type="text" name="nom" class="input" id="nom" value="{{ old('nom', $marque->nom) }}">
                </div>
                <div class="control-erreur">
                    @if($errors->has('nom'))
                        {{ $errors->first('nom')}}
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