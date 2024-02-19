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

    <div class="container bg-white mb-10">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-text-header ">
                    <h2 class="title text-center mb-2"> SKINOASIS</h2>
                    <p align="justify">Skinoasis is a special platform which provides beauty solutions, packed with great knowledge and integrity to become an oasis for everyone who is looking for excellent beauty products. Established in 2023 with years' experience in the beauty industry. Skinoasis also a collaborative platform to bring together an experts, doctors, scientist, products and beloved customer for discovering  a great beauty experience.</p>

                    <div class="video-banner video-banner-poster text-center mt-10 pb-5">
                        <div class="container">
                            <div class="row ">

                                <div class="col-md-6">
                                    <div class="video-poster">
                                        <img style="border-radius: 0 !important;" src="{{ staticAsset('frontend/skinoasis/assets/images/banners/about-s.png') }}" alt="poster">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3 align-items-center mb-md-0">
                                    <h3 class="video-banner-title fw-bold h3">
                                        <span class="fw-light">TRENDING</span>
                                        Always Make Room for a Little Beauty in Your Life
                                    </h3>

                                    <p>Our beauty box is a set of best full-size products that are top sellers in out online shop.
                                        We want you to be able to try everything at once and make sure that our selection of products is about quality.</p>
                                    <a href="#" class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark btn-bottom-c"> Shop Now</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <div class="clearfix">
                    <img src="{{ staticAsset('frontend/skinoasis/assets/images/banner1.png') }}" class="col-md-6 float-md-start mb-3 ms-md-3" alt="...">

                    <p>
                        A paragraph of placeholder text. We're using it here to show the use of the clearfix class. We're adding quite a few meaningless phrases here to demonstrate how the columns interact here with the floated image.
                    </p>

                    <p>
                        As you can see the paragraphs gracefully wrap around the floated image. Now imagine how this would look with some actual content in here, rather than just this boring placeholder text that goes on and on, but actually conveys no tangible information at. It simply takes up space and should not really be read.
                    </p>

                    <p>
                        And yet, here you are, still persevering in reading this placeholder text, hoping for some more insights, or some hidden easter egg of content. A joke, perhaps. Unfortunately, there's none of that here.
                    </p>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="icon-box icon-box-sm text-center">
                    <span class="icon-box-icon">
                        <i class="icon-life-ring"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Professional Support</h3>
                        <p>Praesent dapibus, neque id cursus faucibus, <br>tortor neque egestas augue, eu vulputate <br>magna eros eu erat. </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-6 justify-content-center">
            <div class="col-md-12">
                <div class="heading">
                    <div class="heading subtitle-about">
                        <span class="fw-bolder">
                            <a class="text-dark" href="#">SKINOASIS</a>
                        </span>
                        <span class="title-separator">|</span>
                        PION TECH
                        <span class="title-separator">|</span>
                        VEGETOLOGY
                        <span class="title-separator">|</span>
                        SHINSIAVIEW
                        <span class="title-separator">|</span>
                        LEAF&amp;COCO
                        <span class="title-separator">|</span>
                        BAIN&amp;CO
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="mb-2"></div>




@endsection
