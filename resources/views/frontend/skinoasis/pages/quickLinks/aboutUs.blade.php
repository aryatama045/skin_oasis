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
            <div class="col-lg-10 offset-lg-1">
                <div class="about-text-header ">
                    <h2 class="title text-center mb-2"> SKINOASIS</h2><!-- End .title text-center mb-2 -->
                    <p align="justify">Skinoasis is a special platform which provides beauty solutions, packed with great knowledge and integrity to become an oasis for everyone who is looking for excellent beauty products. Established in 2023 with years' experience in the beauty industry. Skinoasis also a collaborative platform to bring together an experts, doctors, scientist, products and beloved customer for discovering  a great beauty experience.</p>
                </div><!-- End .about-text -->
            </div><!-- End .col-lg-10 offset-1 -->

            <div class="justify-content-center">
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
                </div><!-- End .col-lg-6 col-sm-12 -->

                <div class="col-lg-6 col-sm-12">
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


            </div><!-- End .row -->
        </div><!-- End .row -->
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
            </div><!-- End .col-lg-6 col-sm-12 -->

            <div class="col-lg-6 col-sm-12">
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


        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-2"></div><!-- End .mb-2 -->




@endsection
