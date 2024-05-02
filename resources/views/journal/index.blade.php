@extends('layouts.app')
@section('title', 'Journal')
@section('content')
       <!-- Lien Bootstrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<div>
    <div class="div-marque pl-lg pr-lg">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th>IP</th>
                    <th>@lang('Email')</th>
                    <th>URL</th>
                    <th>@lang('Date of visit')</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach($journals as $journal)
                <tr>
                    <td>{{ $journal->ip }}</td>
                    <td>{{ $journal->nom }}</td>
                    <td>{{ $journal->page_visite }}</td>
                    <td>{{ $journal->date_visite }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="div-pagination pt-xs pb-xs">
                {{ $journals->links() }}
            </div>
    </div>
</div>




@endsection