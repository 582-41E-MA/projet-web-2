@extends('layouts.app')
@section('title', trans('Modify'))
@section('content')

<main class="wrapper">
    <div class="container-form">
        <h1>Modification</h1>
        <form action="{{ route('user.update', $user->id) }}" method="POST" class="form"> 
            @csrf
            @method('put')
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="nom">@lang('Nom')*</label>
                    <input class="input" type="text" id="nom" name="nom" value="{{old('nom', $user->nom)}}">
                </div>
                <div class="control-erreur">
                @if($errors->has('nom'))
                    {{ $errors->first('nom')}}
                @endif
                </div>
            </div>
            <div class="form-inputContainer">
                <div class="control-input">
                    <label class="label" for="date_de_naissance" >@lang('Date of birth')*</label>
                    <input class="input input-placeholder" type="date" id="date_de_naissance" name="date_de_naissance" value="{{old('date_de_naissance', $user->date_de_naissance)}}" placeholder=" {{trans('dd-mm-yyyy')}}">
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
                    <input class="input" type="text" id="code_postal" name="code_postal" value="{{old('code_postal', $user->code_postal)}}">
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
                    <input class="input" type="tel" id="telephone" name="telephone" value="{{old('telephone', $user->telephone)}}">
                </div>
                <div class="control-erreur">
                @if($errors->has('telephone'))
                    {{ $errors->first('telephone')}}
                @endif
                </div>
            </div>
            <div class="form-btnContainer">
                <button class="btn btn-tertiaire">@lang('Update')</button>
            </div>
        </form>
    </div>
</main>

@endsection
