@extends('layouts.app')
@section('title', 'About')
@section('content')
   
<main class="wrapper">
    <div class="about">
        <img src="" alt="company5">
        <div class="text">
            <h2>@lang('about-title-1')</h2>
                <p>@lang('about-p-2')</p>
            <h2>@lang('about-title-2')</h2>
                <p>@lang('about-p-2')</p>
            <h2>@lang('about-title-3')</h2>
                <p>@lang('about-p-3')</p>
        </div>
    </div>
</main>
@endsection