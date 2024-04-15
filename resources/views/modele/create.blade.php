@extends('layouts.app')
@section('title', __('Add model'))
@section('content') 
<main class="wrapper">
    <div class="container-form">
        <h1>@lang('Add model')</h1>
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
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="marque_id" class="label">@lang('Brand')</label>
                    <select name="marque_id" id="marque_id" class="input input-placeholder" data-js-select>
                        <option value="0">@lang('Select a brand')</option>
                        @foreach($marques as $marque)
                            <option data-js-marque="{{ $marque->id }}" value="{{ $marque->id }}" {{ old('marque_id') == $marque->id ? 'selected' : '' }}>{{ $marque->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="control-erreur">
                @if($errors->has('marque_id'))
                    {{ $errors->first('marque_id')}}
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