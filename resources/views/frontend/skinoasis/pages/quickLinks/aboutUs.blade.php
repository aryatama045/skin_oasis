@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('About Us') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection



@section('contents')

    <!--hero section start-->
    @include('frontend.skinoasis.pages.partials.home.1hero',[
                'sliders' => $sliders,
            ])
    <!--hero section end-->

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="about-text text-center mt-3">
                    <h2 class="title text-center mb-2">Who We Are</h2><!-- End .title text-center mb-2 -->
                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. </p>
                    <img src="assets/images/about/about-2/signature.png" alt="signature" class="mx-auto mb-5">

                    <img src="assets/images/about/about-2/img-1.jpg" alt="image" class="mx-auto mb-6">
                </div><!-- End .about-text -->
            </div><!-- End .col-lg-10 offset-1 -->
        </div><!-- End .row -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <i class="icon-puzzle-piece"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Design Quality</h3><!-- End .icon-box-title -->
                        <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero <br>eu augue.</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Professional Support</h3><!-- End .icon-box-title -->
                        <p>Praesent dapibus, neque id cursus faucibus, <br>tortor neque egestas augue, eu vulputate <br>magna eros eu erat. </p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <i class="icon-heart-o"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Made With Love</h3><!-- End .icon-box-title -->
                        <p>Pellentesque a diam sit amet mi ullamcorper <br>vehicula. Nullam quis massa sit amet <br>nibh viverra malesuada.</p> 
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-2"></div><!-- End .mb-2 -->


    <div class="container">
        <div class="banner-group my-md-n5 mt-1">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="ab-left position-relative">
                        <img src="{{ uploadedAsset(getSetting('about_intro_image')) }}" alt="" class="img-fluid">
                        <div class="text-end">
                            <div class="ab-quote p-4 text-start">
                                <h4 class="mb-0 fw-normal text-white">“{{ getSetting('about_intro_quote') }}” <span
                                        class="fs-md fw-medium position-relative">{{ getSetting('about_intro_quote_by') }}</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ab-about-right">
                        <div class="subtitle d-flex align-items-center gap-3 flex-wrap">
                            <span class="gshop-subtitle">{{ getSetting('about_intro_sub_title') }}</span>
                            <span>
                                <svg width="78" height="16" viewBox="0 0 78 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <line x1="0.0138875" y1="7.0001" x2="72.0139" y2="8.0001" stroke="#FF7C08"
                                        stroke-width="2" />
                                    <path d="M78 8L66 14.9282L66 1.0718L78 8Z" fill="#FF7C08" />
                                </svg>
                            </span>
                        </div>
                        <h2 class="mb-4">{!! getSetting('about_intro_title') !!}</h2>
                        <p class="mb-8">{{ getSetting('about_intro_text') }}</p>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="image-box py-6 px-4 image-box-border">
                                    <div class="icon position-relative">
                                        <img src="{{ staticAsset('frontend/default/assets/img/icons/hand-icon.svg') }}"
                                            alt="hand icon" class="img-fluid">
                                    </div>
                                    <h4 class="mt-3">{{ localize('Our Mission') }}</h4>
                                    <p class="mb-0">{{ getSetting('about_intro_mission') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="image-box py-6 px-4 image-box-border">
                                    <div class="icon position-relative">
                                        <img src="{{ staticAsset('frontend/default/assets/img/icons/hand-icon.svg') }}"
                                            alt="hand icon" class="img-fluid">
                                    </div>
                                    <h4 class="mt-3">{{ localize('Our Vision') }}</h4>
                                    <p class="mb-0">{{ getSetting('about_intro_vision') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="brand-wrapper px-5 rounded-4">
            <h4 class="section-title mb-0">{{ localize('The Most Popular Brands') }}</h4>
            <div class="brands-slider swiper px-2 pt-4 pb-7">
                @php
                    $about_popular_brand_ids = getSetting('about_popular_brand_ids') != null ? json_decode(getSetting('about_popular_brand_ids')) : [];
                    $brands = \App\Models\Brand::whereIn('id', $about_popular_brand_ids)->get();
                @endphp
                <div class="swiper-wrapper">
                    @foreach ($brands as $brand)
                        <div class="swiper-slide brand-item rounded">
                            <img src="{{ uploadedAsset($brand->collectLocalization('brand_image')) }}" alt=""
                                class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row g-4 align-items-center">
            <div class="col-xl-5">
                <div class="about-us-left position-relative">
                    <img src="{{ uploadedAsset(getSetting('about_why_choose_banner')) }}" alt=""
                        class="img-fluid w-100">
                </div>
            </div>
            <div class="col-xl-7">
                <div class="about-us-right">
                    <div class="section-title-mx mb-6">
                        <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                            <h6 class="mb-0 gshop-subtitle text-secondary">
                                {{ getSetting('about_why_choose_sub_title') }}</h6>
                            <span>
                                <svg width="58" height="10" viewBox="0 0 58 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <line x1="-6.99382e-08" y1="5.2" x2="52" y2="5.2"
                                        stroke="#FF7C08" stroke-width="1.6" />
                                    <path d="M58 5L50.5 9.33013L50.5 0.669872L58 5Z" fill="#FF7C08" />
                                </svg>
                            </span>
                        </div>
                        <h2 class="mb-3">{!! getSetting('about_why_choose_title') !!}</h2>
                        <p class="mb-0">{{ getSetting('about_why_choose_text') }}</p>
                    </div>
                    <div class="row g-3">
                        @foreach ($why_choose_us as $each_why_choose_us)
                            <div class="col-md-6">
                                <div
                                    class="horizontal-icon-box d-flex align-items-center gap-4 bg-white rounded p-4 hover-shadow flex-wrap flex-xxl-nowrap">
                                    <span class="icon-wrapper position-relative flex-shrink-0">
                                        <img src="{{ uploadedAsset($each_why_choose_us->image) }}" alt=""
                                            class="img-fluid">
                                    </span>
                                    <div class="content-right">
                                        <h5 class="mb-3">{{ $each_why_choose_us->title }}</h5>
                                        <p class="mb-0">{{ $each_why_choose_us->text }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>




@endsection
