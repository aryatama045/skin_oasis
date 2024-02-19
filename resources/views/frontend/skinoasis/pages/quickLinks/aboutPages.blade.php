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
                <div class="about-text-header entry-content">
                    {!! $page->collectLocalization('content') !!}

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
                        LEAF & COCO
                        <span class="title-separator">|</span>
                        BAIN & CO
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="mb-2"></div>




@endsection
