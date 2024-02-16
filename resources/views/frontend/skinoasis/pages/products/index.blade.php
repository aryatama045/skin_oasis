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
                <div class="row g-4">
                    <!--rightbar-->
                    <div class="col-xl-12">
                        <div class="shop-grid">
                            <div class="row g-4">
                                @foreach ($products as $product)
                                    <div class="col-xl-4">
                                        <div class="thumbnail position-relative text-center p-4 flex-shrink-0">
                                            <img src="{{ uploadedAsset($product->thumbnail_image) }}"
                                                class="img-fluid fit-cover">
                                        </div>
                                        <!-- <div class="card-content w-100">
                                            <form action="" class="direct-add-to-cart-form">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="product_variation_id" value="{{ $product->product_variation_id }}">
                                                <input type="hidden" value="1" name="quantity">

                                                @if ($product->stock_qty < 1)
                                                    <a href="javascript:void(0);"
                                                        class="btn-product btn-cart mt-4 w-100">{{ localize('Out of Stock') }}</a>
                                                @else
                                                    <a href="javascript:void(0);"
                                                        onclick="directAddToCartFormSubmit(this)"class="btn-product btn-cart mt-4 w-100 direct-add-to-cart-btn add-to-cart-text">
                                                        {{ localize('Add to Cart') }}</a>
                                                @endif
                                            </form>
                                        </div> -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--rightbar-->

                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </form>
    <center>
        <a href="{{ route('products.allproduct') }}" class="btn btn-rounded btn-outline-green-dark"> OUR PRODUCT</a>
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

