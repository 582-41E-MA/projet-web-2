@extends('layouts.app')
@section('title', __('Add photo'))
@section('content')
<main class="wrapper liste">
    <div class="container-form">
        <h1>@lang('Add photo')</h1>
        <form method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div class="form-inputContainer">
                <div class="control-input">
                    <label for="photo" class="label">@lang('Photos') (max {{$nbNewPhotos}})</label>
                    <input type="file" name="photo[]" class="input" id="photo" multiple>
                </div>
                <div class="control-erreur">
                @if($errors->has('photo'))
                    {{ $errors->first('photo')}}
                @endif
                @foreach($errors->all() as $error)
                    @if(strpos($error, 'photo') !== false)
                        {{ $error }}
                    @endif
                @endforeach
                </div>
            </div>

            <div class="buttons">
                <a class="btn btn-tertiaire" href="{{ route('photo.voiture', $voiture['id'] ) }}"> @lang('Cancel')</a>
                <button type="submit" class="btn btn-primaire">@lang('Add')</button>
            </div>
        </form>
    </div>
</main>
@endsection
