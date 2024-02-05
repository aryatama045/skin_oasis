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

    <div class="page-header text-center" style="background-image: url('{{ staticAsset('frontend/skinoasis/assets/images/page-header-bg.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Product's<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <!--breadcrumb-->
    @include('frontend.default.inc.breadcrumb')
    <!--breadcrumb-->

    <!--checkout form start-->
    <form class="checkout-form" action="{{ route('checkout.complete') }}" method="POST">
        @csrf

    </form>
    <!--checkout form end-->


    <!--add address modal start-->
    @include('frontend.skinoasis.inc.addressForm', ['countries' => $countries])
    <!--add address modal end-->
@endsection
