@extends('layouts.app')
@section('title', trans('Users'))
@section('content')
   
<main class="wrapper">
   <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
   </p>

    <!-- form -->
    <div class="form_recherche" data-js-component="RechercheUser"> 
            <label for="rechercher"></label>
            <input class="input_recherche mt-xl" type="text" id="recherche" name="rechercher">
            <button class="btn btn-quatrieme mr-sm" type="submit">@lang('Search')</button>
    </div>
<!-- template -->
    <template data-template-liste>
        <table data-js-liste>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Privilege</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->privilege_id == 2)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->courriel }}</td>
                    <td>{{ $user->privilege->nom }}</td>
                    <td> 
                        <a href="{{route('user.edit', $user->id)}}" >@lang('Modifier') </a>
                        <form method="post" action="{{ route('user.delete', $user->id) }}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit">@lang('Delete')</button>
                        </form>       
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
</template>

<!-- liste -->
    <div>
        <table data-js-liste>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Courriel</th>
                    <th>Privilege</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->privilege_id == 2)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->courriel }}</td>
                    <td>{{ $user->privilege->nom }}</td>
                    <td> 
                        <a href="{{route('user.edit', $user->id)}}" >@lang('Modifier') </a>
                        <form method="post" action="{{ route('user.delete', $user->id) }}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <button type="submit">@lang('Delete')</button>
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
