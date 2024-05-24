@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Blogs') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item fw-bold" aria-current="page"><a
                href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item fw-bold" aria-current="page"><a
                href="{{ route('home.blogs') }}">{{ localize('Blogs') }}</a></li>
    </ol>
@endsection

@section('contents')

    <!--blog details start-->
    <section class="blog-listing-section ptb-20">
        <div class="container">
            <div class="row">
                <img src="{{ uploadedAsset($blogs->banner) }}" alt="{{ $blogs->collectLocalization('title') }}" class="img-fluid rounded-top">
                <img src="{{ uploadedAsset($blogs->banner1) }}" alt="{{ $blogs->collectLocalization('title') }}" class="img-fluid rounded-top">
            </div>
        </div>
    </section>
    <!--blog details end-->
@endsection
