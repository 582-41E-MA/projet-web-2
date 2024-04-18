@extends('layouts.app')
@section('title', trans('Users'))
@section('content')
   
<main class="wrapper">
   <p class="message">
      @if(session('success'))
         {{session('success')}}
      @endif
   </p>

    <table>
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

</main>
@endsection
