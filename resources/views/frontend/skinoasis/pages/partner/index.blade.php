@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Quick Links') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a
                href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item">Partner</li>
    </ol>
@endsection

@section('contents')

    <!--pageheader-->
    @include('frontend.skinoasis.inc.pageHeader',
            ['title'=> 'Partner'])
    <!--pageheader-->

    <!--breadcrumb-->
    @include('frontend.skinoasis.inc.breadcrumb')
    <!--breadcrumb-->

    <!--page section start-->
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            @foreach ($pages as $page)
                                <li class="nav-item text-uppercase">
                                    <a class="nav-link <?php if($loop->first){ ?>active <?php } ?>"
                                    id="{{ $page->title }}-{{ $page->slug }}-tab" href="#{{ $page->title }}-{{ $page->slug }}" aria-controls="{{ $page->title }}-{{ $page->slug }}"
                                    data-toggle="tab" role="tab" aria-selected="true">
                                    {{ $page->title }}</a>
                                </li>
                            @endforeach

                            <li class="nav-item">
                                <a class="nav-link" id="partner-join-our-influencer-tab" data-toggle="tab" href="#partner-join-our-influencer" role="tab" aria-controls="partner-join-our-influencer" aria-selected="false">
                                JOIN OUR INFLUENCER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="partner-join-our-partner-tab" data-toggle="tab" href="#partner-join-our-partner" role="tab" aria-controls="partner-join-our-partner" aria-selected="false">
                                JOIN OUR PARTNER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="partner-join-our-community-tab" data-toggle="tab" href="#partner-join-our-community" role="tab" aria-controls="partner-join-our-community" aria-selected="false">
                                JOIN OUR COMMUNITY</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            @foreach ($pagesContent as $pageC)

                                <div class="tab-pane fade <?php if($loop->first){ ?>show active<?php } ?>" id="{{ $pageC->title }}-{{ $pageC->slug }}" role="tabpanel" aria-labelledby="{{ $pageC->title }}-{{ $pageC->slug }}">
                                    <div class="product-desc-content">
                                        <h3>{!! $pageC->title !!}</h3>
                                        <p>{!! $pageC->content !!}</p>
                                    </div>
                                </div><!-- .End .tab-pane -->
                            @endforeach


                            <div class="tab-pane fade" id="partner-join-our-influencer" role="tabpanel" aria-labelledby="partner-join-our-influencer">
                                <div class="product-desc-content">
                                    <h3 class="text-center mt-6 mb-5">LET'S BECOME OUR INFLUENCER</h3>
                                    <!-- form influencer -->
                                    @include('frontend.skinoasis.pages.partner.inc.joinOurInfluencer')
                                    <!-- form influencer -->

                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-join-our-partner" role="tabpanel" aria-labelledby="partner-join-our-partner">
                                <div class="product-desc-content">
                                    <h3 class="text-center">LET'S BECOME OUR PARTNER</h3>
                                    <!-- form Partner -->
                                    @include('frontend.skinoasis.pages.partner.inc.joinOurPartner')
                                    <!-- form Partner -->
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-join-our-community" role="tabpanel" aria-labelledby="partner-join-our-community">
                                <div class="product-desc-content">
                                    <h3 class="text-center">Join Our Community</h3>
                                    <!-- form Community -->
                                    @include('frontend.skinoasis.pages.partner.inc.joinOurCommunity')
                                    <!-- form Community -->
                                </div>
                            </div><!-- .End .tab-pane -->


                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
                </div>
            </div>
        </div>
    <!--page section end-->
@endsection