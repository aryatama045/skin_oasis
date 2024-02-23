@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Products') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')
    <br>
    <center>
        <div>
            <img src="{{ staticAsset('frontend/skinoasis/assets/images/page-header-bg.png') }}" style="max-width: 83%">
        </div>
    </center><br><br>

    <center class="container">
        <h1 class="page-title">Popular Product</h1>
    </center>

    <br><br>
    <form class="filter-form" action="{{ Request::fullUrl() }}" method="GET">
        <div class="page-content gshop-gshop-grid bg-white">
            <div class="container">
                <div class="row banner-group-1">
                    @foreach ($kategori as $key => $category)
                        <div class="col-md-3">
                            <a href="{{ route('products.allproduct') }}?&category_id={{ $category->id }}">
                                <div class="banner banner-1">
                                    <img src="{{ uploadedAsset($category->collectLocalization('thumbnail_image')) }}" alt="Banner" width="688" height="400" style="background-color: #fff; opacity: 0.7;">

                                    <div class="banner-content banner-content-center">
                                        <h1 class="banner-subtitle text-black fw-bold">{{$category->name}}</h1>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </a>
                        </div>
                    @endforeach
                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </form>
    <center>
        <a href="{{ route('products.allproduct') }}" class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark"> OUR PRODUCT</a>
    </center>
@endsection

@section('scripts')
    <script>
        "use strict";

        $('.product-listing-pagination').on('focusout', function() {
            $('.filter-form').submit();
        });

        $('.sort_by').on('change', function() {
            $('.filter-form').submit();
        });
    </script>
@endsection

