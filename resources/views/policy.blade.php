@extends('layouts.app')
@section('title', 'Sales Policies')
@section('content')
   
<main class="wrapper">
    <div class="policy">
        <img>
        <div class="text">
            <h3>@lang('policy-title-1')</h3>
                <ul>
                    <li>@lang('policy-ul1-li1')</li>
                    <li>@lang('policy-ul1-li2')</li>
                    <li>@lang('policy-ul1-li3')</li>
                    <li>@lang('policy-ul1-li4')</li>
                </ul>
            <h3>@lang('policy-title-2')</h3>
                <p>@lang('policy-p-2')</p>
            <h3>@lang('policy-title-3')</h3>    
                <p>@lang('policy-p-3')</p>
            <h3>@lang('policy-title-4')</h3>    
                <p>@lang('policy-p-4')</p>
                <ul>
                    <li>@lang('policy-ul4-li1')</li>
                    <li>@lang('policy-ul4-li2')</li>
                    <li>@lang('policy-ul4-li3')</li>
                </ul>    
        </div>
    </div>
</main>
@endsection