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

    <div class="container bg-white">
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




@endsection
