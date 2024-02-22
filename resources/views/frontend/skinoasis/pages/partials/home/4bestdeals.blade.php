@php
    $campaigns = \App\Models\Campaign::where('end_date', '>=', strtotime(date('Y-m-d')))
        ->where('is_published', 1)
        ->latest()->get()->first();

@endphp

<!-- Best Deals -->
<div class="bg-green deal-container pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="deal align-items-center">
                    <div class="deal-content">
                        <h4>{{$campaigns->title}}</h4>
                        <h2>Rp. {{$campaigns->harga_promo}}</h2>

                        <h3 class="product-title">
                            @php
                                $start_date = date('d m', $campaign->start_date);
                                $end_date = date('d m Y', $campaign->end_date);
                            @endphp
                            {{$start_date}}-26 Dec 2023
                        </h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">{{$campaigns->subtitle}}</span>
                            <!-- <span class="old-price">Was $240.00</span> -->
                        </div><!-- End .product-price -->

                        <div class="deal-countdown" data-until="+10h"></div><!-- End .deal-countdown -->

                    </div><!-- End .deal-content -->
                    <div class="deal-image">
                            <img src="{{ staticAsset('frontend/skinoasis/assets/images/best-deal.png') }}" alt="image">
                    </div><!-- End .deal-image -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-12 -->

        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light -->