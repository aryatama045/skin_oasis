@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Home') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <!--hero section start-->
    @include('frontend.skinoasis.pages.partials.home.1hero')
    <!--hero section end-->

    <!--brand section start-->
    @include('frontend.skinoasis.pages.partials.home.2brand')
    <!--brand section end-->

    <!--banner section start-->
    @include('frontend.skinoasis.pages.partials.home.3banners')
    <!--banner section end-->

    <!--bestdeal section start-->
    @include('frontend.skinoasis.pages.partials.home.4bestdeals')
    <!--bestdeal section end-->

    <!--favoriteproduct products start-->
    @include('frontend.skinoasis.pages.partials.home.5favoriteproduct')
    <!--favoriteproduct products end-->

    <!--banner 2 section start-->
    @include('frontend.skinoasis.pages.partials.home.6bannerstwo')
    <!--banner 2 section end-->

    <!--featured products start-->
    @include('frontend.skinoasis.pages.partials.home.7featuredproducts')
    <!--featured products end-->

    <!--banner 3 section start-->
    @include('frontend.skinoasis.pages.partials.home.8bannersthree')
    <!--banner 3 section end-->

    <!--infoUpdate section start-->
    @include('frontend.skinoasis.pages.partials.home.9infoupdate')
    <!--infoUpdate section end-->

    <!--igFeed listing start-->
    @include('frontend.skinoasis.pages.partials.home.10igfeed')
    <!--igFeed listing end-->

@endsection

@section('scripts')
    <script>
        "use strict";

        // runs when the document is ready
        $(document).ready(function() {
            @if (\App\Models\Location::where('is_published', 1)->count() > 1)
                notifyMe('info', '{{ localize('Select your location if not selected') }}');
            @endif
        });
    </script>
@endsection
