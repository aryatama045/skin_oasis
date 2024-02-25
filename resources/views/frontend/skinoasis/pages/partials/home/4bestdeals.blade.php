@php
    $campaigns = \App\Models\Campaign::where('end_date', '>=', strtotime(date('Y-m-d')))
        ->where('is_published', 1)
        ->latest()->get()->first();

@endphp

@if(!empty($campaigns))
<!-- Best Deals -->
<div class="bg-green deal-container pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="deal align-items-center ">
                    <div class="deal-content wow animate__animated animate__fadeInUp" data-wow-delay=".0s">
                        <h4>{{$campaigns->title}}</h4>
                        <h2>Rp.{{$campaigns->harga_promo}}</h2>

                        <h3 class="product-tanggal">
                            @php
                                $start_date = date('d ', $campaigns->start_date);
                                $end_date = date('d M Y', $campaigns->end_date);
                            @endphp
                            {{$start_date}}-{{ $end_date}}
                        </h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price">{{$campaigns->subtitle}}</span>
                            <!-- <span class="old-price">Was $240.00</span> -->
                        </div><!-- End .product-price -->

                        <a href="{{ route('home.campaigns.show', $campaigns->slug) }}"
                            class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark mt-5">{{ localize('Shop Now') }}</a>

                    </div><!-- End .deal-content -->
                    <div class="deal-image wow animate__animated animate__fadeInLeft" data-wow-delay=".0s">
                            <img src="{{ uploadedAsset($campaigns->banner) }}" alt="image">
                    </div><!-- End .deal-image -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-12 -->

        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light -->
@endif