@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Home') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <!--hero section start-->
    @include('frontend.skinoasis.pages.halloBeauty.inc.1hero')
    <!--hero section end-->

    <!--info section start-->
    @include('frontend.skinoasis.pages.halloBeauty.inc.2info')
    <!--info section end-->

    <!--listdokter section start-->
    @include('frontend.skinoasis.pages.halloBeauty.inc.janjiTemu')
    <!--listdokter section end-->


@endsection
