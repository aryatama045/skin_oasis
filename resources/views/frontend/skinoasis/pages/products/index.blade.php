@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Products') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ localize('Products') }}</li>
    </ol>
@endsection

@section('contents')

    <div class="page-header text-center" style="background-image: url('{{ staticAsset('frontend/skinoasis/assets/images/page-header-bg.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Product's<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    @include('frontend.skinoasis.inc.breadcrumb')


    <form class="filter-form" action="{{ Request::fullUrl() }}" method="GET">


        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                {{ localize('Showing') }}
                                <span>{{ $products->firstItem() }} of {{ $products->lastItem() }} </span> {{ localize('of') }}
                                {{ $products->total() }} {{ localize('results') }}

                                <label class="fw-bold fs-xs text-dark flex-shrink-0"> {{ localize('Show') }}:</label>
                                <div class="number-count-filter">
                                    
                                    <input type="number"
                                        @isset($per_page)
                                    value="{{ $per_page }}"
                                    @else
                                    value="9" 
                                    @endisset
                                        name="per_page" class="product-listing-pagination form-control">
                                </div>

                                </div><!-- End .toolbox-info -->
                            </div><!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-sort">

                                    <label for="sortby">{{ localize('Sort by') }}:</label>
                                    <div class="select-custom">
                                        <select name="sort_by" id="sortby" class="sort_by form-control">
                                            <option value="new"
                                                @isset($sort_by)
                                                    @if ($sort_by == 'new')
                                                    selected
                                                    @endif
                                                @endisset>
                                                {{ localize('Newest First') }}
                                            </option>

                                            <option value="best_selling"
                                                @isset($sort_by)
                                                    @if ($sort_by == 'best_selling')
                                                    selected
                                                    @endif
                                                @endisset>
                                                {{ localize('Best Selling') }}
                                            </option>
                                        </select>
                                    </div>

                                </div><!-- End .toolbox-sort -->

                                <div class="toolbox-layout">

                                    <a href="{{ route('products.index') }}?view=grid" class="btn-layout {{ request()->view != 'list' ? 'active' : '' }}">
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.97196 0H1.37831C0.706579 0 0.160156 0.546422 0.160156 1.21815V5.8118C0.160156 6.48353 0.706579 7.02996 1.37831 7.02996H5.97196C6.64369 7.02996 7.19011 6.48353 7.19011 5.8118V1.21815C7.19 0.546422 6.64369 0 5.97196 0Z"
                                                fill="#5f5d5d" />
                                            <path
                                                d="M14.9407 0H10.3471C9.67533 0 9.12891 0.546422 9.12891 1.21815V5.8118C9.12891 6.48353 9.67533 7.02996 10.3471 7.02996H14.9407C15.6124 7.02996 16.1589 6.48353 16.1589 5.8118V1.21815C16.1589 0.546422 15.6124 0 14.9407 0Z"
                                                fill="#5f5d5d" />
                                            <path
                                                d="M5.97196 8.96973H1.37831C0.706579 8.96973 0.160156 9.51609 0.160156 10.1878V14.7815C0.160156 15.4532 0.706579 15.9996 1.37831 15.9996H5.97196C6.64369 15.9996 7.19011 15.4532 7.19011 14.7815V10.1878C7.19 9.51609 6.64369 8.96973 5.97196 8.96973Z"
                                                fill="#5f5d5d" />
                                            <path
                                                d="M14.9407 8.96973H10.3471C9.67533 8.96973 9.12891 9.51615 9.12891 10.1879V14.7815C9.12891 15.4533 9.67533 15.9997 10.3471 15.9997H14.9407C15.6124 15.9996 16.1589 15.4532 16.1589 14.7815V10.1878C16.1589 9.51609 15.6124 8.96973 14.9407 8.96973Z"
                                                fill="#5f5d5d" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('products.index') }}?view=list" class="btn-layout {{ request()->view == 'list' ? 'active' : '' }}">
                                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.31378 0C1.12426 0 0.160156 0.9641 0.160156 2.15359C0.160156 3.34309 1.12426 4.30722 2.31378 4.30722C3.50328 4.30722 4.46738 3.34312 4.46738 2.15359C4.46738 0.964066 3.50328 0 2.31378 0ZM2.31378 5.74293C1.12426 5.74293 0.160156 6.70706 0.160156 7.89656C0.160156 9.08608 1.12426 10.0502 2.31378 10.0502C3.50328 10.0502 4.46738 9.08608 4.46738 7.89656C4.46738 6.70706 3.50328 5.74293 2.31378 5.74293ZM2.31378 11.4859C1.12426 11.4859 0.160156 12.45 0.160156 13.6395C0.160156 14.829 1.12426 15.7931 2.31378 15.7931C3.50328 15.7931 4.46738 14.829 4.46738 13.6395C4.46738 12.45 3.50328 11.4859 2.31378 11.4859ZM8.05671 3.58933H19.5426C20.3358 3.58933 20.9783 2.94683 20.9783 2.15359C20.9783 1.36036 20.3358 0.717853 19.5426 0.717853H8.05671C7.26348 0.717853 6.62097 1.36036 6.62097 2.15359C6.62097 2.94683 7.26348 3.58933 8.05671 3.58933ZM19.5426 6.46082H8.05671C7.26348 6.46082 6.62097 7.10332 6.62097 7.89656C6.62097 8.68979 7.26348 9.3323 8.05671 9.3323H19.5426C20.3358 9.3323 20.9783 8.68979 20.9783 7.89656C20.9783 7.10332 20.3358 6.46082 19.5426 6.46082ZM19.5426 12.2038H8.05671C7.26348 12.2038 6.62097 12.8463 6.62097 13.6395C6.62097 14.4327 7.26348 15.0752 8.05671 15.0752H19.5426C20.3358 15.0752 20.9783 14.4327 20.9783 13.6395C20.9783 12.8463 20.3358 12.2038 19.5426 12.2038Z"
                                                fill="#a7a6a6" />
                                        </svg>
                                    </a>

                                </div><!-- End .toolbox-layout -->

                            </div><!-- End .toolbox-right -->
                        </div><!-- End .toolbox -->

                        <div class="products mb-3">
                            <div class="row justify-content-center">

                                @if (count($products) > 0)
                                    @if (request()->has('view') && request()->view == 'list')
                                        @foreach ($products as $product)
                                            <div class="col-xl-12">
                                                @include(
                                                    'frontend.skinoasis.pages.partials.products.product-card-list',
                                                    [
                                                        'product' => $product,
                                                    ]
                                                )
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($products as $product)
                                            <div class="col-6 col-md-4 col-lg-4">
                                                @include(
                                                    'frontend.skinoasis.pages.partials.products.vertical-product-card',
                                                    [
                                                        'product' => $product,
                                                        'bgClass' => 'bg-white',
                                                    ]
                                                )
                                            </div>
                                        @endforeach
                                    @endif
                                @else
                                    <div class="col-6 mx-auto">
                                        <img src="{{ staticAsset('frontend/default/assets/img/empty-cart.svg') }}"
                                            alt="" srcset="" class="img-fluid">
                                    </div>
                                @endif

                                
                            </div><!-- End .row -->
                        </div><!-- End .products -->

                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {{ $products->appends(request()->input())->links() }}
                                
                                
                            </ul>
                        </nav>

                        <ul class="d-flex align-items-center gap-3 mt-7">
                                {{ $products->appends(request()->input())->links() }}
                            </ul>
                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3 order-lg-first d-none d-xl-block">
                        @include('frontend.skinoasis.pages.products.inc.productSidebar')
                    </aside><!-- End .col-lg-3 -->

                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->


    </form>
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

