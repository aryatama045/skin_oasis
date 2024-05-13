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

<br>
    <center>
        <?php $banner = getSetting('banner_header'); ?>
        <div>
            <img  src="{{ uploadedAsset($banner) }}" style="max-width: 83%">
        </div>
    </center><br><br>


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
                                <li class="nav-item partner">
                                    <a class="text-uppercase nav-link <?php if($loop->first){ ?>active <?php } ?>"
                                    id="partner-{{ $page->slug }}-tab" data-toggle="tab" href="#partner-{{ $page->slug }}"
                                    role="tab" aria-controls="partner-{{ $page->slug }}" aria-selected="<?php if($loop->first){ ?>true<?php }else{ ?>false <?php } ?>">
                                    {{ $page->title }}</a>
                                </li>
                            @endforeach

                            <li class="nav-item partner">
                                <a class="nav-link" id="partner-join-our-influencer-tab" data-toggle="tab" href="#partner-join-our-influencer" role="tab" aria-controls="partner-join-our-influencer" aria-selected="false">
                                JOIN OUR INFLUENCER</a>
                            </li>
                            <li class="nav-item partner">
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

                                <div class="tab-pane fade <?php if($loop->first){ ?>show active<?php } ?>" id="partner-{{ $pageC->slug }}" role="tabpanel" aria-labelledby="partner-{{ $pageC->slug }}">
                                    <div class="product-desc-content">
                                        <h3 class="text-center mt-6 mb-5">{!! $pageC->title !!}</h3>
                                        <p>{!! $pageC->content !!}</p>
                                    </div>
                                </div><!-- .End .tab-pane -->
                            @endforeach


                            <div class="tab-pane fade" id="partner-join-our-influencer" role="tabpanel" aria-labelledby="partner-join-our-influencer">
                                <div class="addAddressModal" id="formInfluencer">
                                    <h3 class="text-center mt-6 mb-5">LET'S BECOME OUR INFLUENCER</h3>
                                    <!-- form influencer -->
                                    @include('frontend.skinoasis.pages.partner.inc.joinOurInfluencer', [
                                        'country' => $country,
                                    ])
                                    <!-- form influencer -->

                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-join-our-partner" role="tabpanel" aria-labelledby="partner-join-our-partner">
                                <div class="addAddressModal" id="formPartner">
                                    <h3 class="text-center">LET'S BECOME OUR PARTNER</h3>
                                    <!-- form Partner -->
                                    @include('frontend.skinoasis.pages.partner.inc.joinOurPartner', [
                                        'country2' => $country,
                                    ])
                                    <!-- form Partner -->
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="partner-join-our-community" role="tabpanel" aria-labelledby="partner-join-our-community">
                                <div class="addAddressModal" id="formCommunity">
                                    <h3 class="text-center">LET'S BECOME OUR COMMUNITY</h3>
                                    <!-- form Community -->
                                    @include('frontend.skinoasis.pages.partner.inc.joinOurCommunity', [
                                        'country3' => $country,
                                    ])
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


@section('scripts')
    <script>
        "use strict";

        // runs when the document is ready
        $(document).ready(function() {
            var parent = '#formInfluencer';
            $('.select2Inf').select2({
                dropdownParent: $(parent)
            });

            var parent2 = '#formPartner';
            $('.select2Part').select2({
                dropdownParent: $(parent2)
            });

            var parent3 = '#formCommunity';
            $('.select2Comm').select2({
                dropdownParent: $(parent3)
            });
        });

    //# Influencer
        //  get states on country change
        $(document).on('change', '[name=country_id1]', function() {
            var country_id1 = $(this).val();
            getStates1(country_id1);
        });

        //  get states
        function getStates1(country_id1) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getStates') }}",
                type: 'POST',
                data: {
                    country_id: country_id1
                },
                success: function(response) {
                    $('[name="state_id1"]').html("");
                    $('[name="state_id1"]').html(JSON.parse(response));
                }
            });
        }

        ///  get cities on state change
        $(document).on('change', '[name=state_id1]', function() {
            var state_id1 = $(this).val();
            getCities1(state_id1);
        });

        //  get cities
        function getCities1(state_id1) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getCities') }}",
                type: 'POST',
                data: {
                    state_id: state_id1
                },
                success: function(response) {
                    $('[name="city_id1"]').html("");
                    $('[name="city_id1"]').html(JSON.parse(response));
                }
            });
        }
    //#End Influencer

    //# Partner
        //  get states on country change
        $(document).on('change', '[name=country_id2]', function() {
            var country_id2 = $(this).val();
            getStates2(country_id2);

        });

        //  get states
        function getStates2(country_id2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getStates') }}",
                type: 'POST',
                data: {
                    country_id: country_id2
                },
                success: function(response) {
                    $('[name="state_id2"]').html("");
                    $('[name="state_id2"]').html(JSON.parse(response));
                }
            });
        }

        ///  get cities on state change
        $(document).on('change', '[name=state_id2]', function() {
            var state_id2 = $(this).val();
            getCities2(state_id2);
        });

        //  get cities
        function getCities2(state_id2) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getCities') }}",
                type: 'POST',
                data: {
                    state_id: state_id2
                },
                success: function(response) {
                    $('[name="city_id2"]').html("");
                    $('[name="city_id2"]').html(JSON.parse(response));
                }
            });
        }
    //#End Partner

    //# Community
        //  get states on country change
        $(document).on('change', '[name=country_id3]', function() {
            var country_id3 = $(this).val();
            getStates3(country_id3);

        });

        //  get states
        function getStates3(country_id3) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getStates') }}",
                type: 'POST',
                data: {
                    country_id: country_id3
                },
                success: function(response) {
                    $('[name="state_id3"]').html("");
                    $('[name="state_id3"]').html(JSON.parse(response));
                }
            });
        }

        ///  get cities on state change
        $(document).on('change', '[name=state_id3]', function() {
            var state_id3 = $(this).val();
            getCities3(state_id3);
        });

        //  get cities
        function getCities3(state_id3) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('address.getCities') }}",
                type: 'POST',
                data: {
                    state_id: state_id3
                },
                success: function(response) {
                    $('[name="city_id3"]').html("");
                    $('[name="city_id3"]').html(JSON.parse(response));
                }
            });
        }
    
    //# End Community

    </script>
@endsection