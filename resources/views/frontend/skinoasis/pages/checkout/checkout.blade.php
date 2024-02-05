@extends('frontend.default.layouts.master')

@section('title')
    {{ localize('Checkout') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <ol class="breadcrumb">
        <li class="breadcrumb-item fw-bold" aria-current="page">
            <a  href="{{ route('home') }}">{{ localize('Home') }}</a>
        </li>
        <li class="breadcrumb-item fw-bold active" aria-current="page">{{ localize('Checkout') }}</li>
    </ol>
@endsection

@section('contents')
    <!--breadcrumb-->
    @include('frontend.default.inc.breadcrumb')
    <!--breadcrumb-->