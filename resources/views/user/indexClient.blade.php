@extends('layouts.app')
@section('title', trans('Users'))
@section('content')
<script>
    var currentLocale = "<?php print app()->getLocale(); ?>";
</script>

<main class="wrapper">
    <div class="form_recherche" data-js-component="RechercheClient"> 
        <label for="rechercher"></label>
            <input class="input_recherche mt-xl" type="text" id="recherche" name="rechercher">
            <button class="btn btn-quatrieme mr-sm" type="submit">@lang('Search')</button>
    </div>

    <!-- template -->

    <template class="div-crm" data-template-liste>
    <table class="table">
        <thead class="thead">
            <tr>
                <th>Nom</th>
                <th>Courriel</th>
                <th class="privilege">Privilege</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <tr>
                <td class="nom"></td>
                <td class="courriel"></td>
                <td class="privilege"></td>
                <td> 
                    <a href="">
                        <img src="assets/img/svg/modifier.svg" alt="icone_modification">
                    </a>
                    <form method="post" action="">
                        <input type="hidden" name="_token" value="...">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit">
                            <img src="" alt="icone_suppression">
                        </button>
                    </form>       
                </td>
            </tr>
        </tbody>
    </table>
</template>

    <!-- liste -->
    <div class="div-crm mt-lg" data-js-liste="2">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th class="privilege">Privilege</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach($users as $user)
                @if($user->privilege_id == 1)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->courriel }}</td>
                    <td class="privilege">{{ $user->privilege->nom }}</td>
                    <td> 
                        <a href="{{route('user.edit', $user->id)}}">
                            <img src="{{asset('assets/img/svg/modifier.svg')}}" alt="icone_modification">
                        </a>
                        <form method="post" action="{{ route('user.delete', $user->id) }}">
                            @csrf
                            @method('delete')
                            <!-- <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit">@lang('Delete')</button> -->
                            <button type="submit">
                                <img src="{{asset('assets/img/svg/supprimer.svg')}}" alt="icone_suppression">
                            </button>
                        </form>       
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection