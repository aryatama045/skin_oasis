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
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="partner-benefit" role="tabpanel" aria-labelledby="partner-benefit">
                                <div class="product-desc-content">
                                    <h3>Benefit</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-program" role="tabpanel" aria-labelledby="partner-program">
                                <div class="product-desc-content">
                                    <h3>Program</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-list-clinic" role="tabpanel" aria-labelledby="partner-list-clinic">
                                <div class="product-desc-content">
                                    <h3>List Clinic</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-list-influencer" role="tabpanel" aria-labelledby="partner-list-influencer">
                                <div class="product-desc-content">
                                    <h3>List Influencer</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-list-community" role="tabpanel" aria-labelledby="partner-list-community">
                                <div class="product-desc-content">
                                    <h3>List Community</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div>
                            </div><!-- .End .tab-pane -->




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