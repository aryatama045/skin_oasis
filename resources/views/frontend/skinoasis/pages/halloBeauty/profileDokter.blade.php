@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Home') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')

    <!--listdokter section start-->
    @include('frontend.skinoasis.pages.halloBeauty.inc.dokter')
    <!--listdokter section end-->


@endsection
