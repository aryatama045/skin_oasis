@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Customer Dashboard') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')

<style>

    @media (min-width: 1200px){
        .container {
            max-width: 95%;
        }
    }


    .profile-header {
        transform: translateY(5rem);
    }
    .profile {
        position: relative;
        margin-left: 8rem;
        top: 4rem;
    }
    .media-body {
        top: 6rem !important;
        position: relative;
    }
    .img-profile{
        padding: 0.25rem;
        background-color: #fafafa;
        border: 1px solid var(--bs-border-color);
        border-radius: 0.375rem;
        width: 180px;
        height: 180px;
        object-fit: cover;
    }

    .shadow-box {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }

    .user-content {
        height: 60em;
    }

    .nav-pills {
        --bs-nav-pills-border-radius: 0.375rem;
        --bs-nav-pills-link-active-color: #fff;
        --bs-nav-pills-link-active-bg: #d5976a;
        border-bottom: 1px solid;
    }

    .nav.nav-pills .nav-item .nav-link.active, .nav.nav-pills .nav-item.show .nav-link
    {
        color: rgba(93, 80, 5, 1);
        border-color: #d7d7d7;
        border-bottom-color: rgba(93, 80, 5, 1);
        font-weight: 600;
    }

    .img-icon {
        display:inline-block;
        padding-right:10px;
        width:75;
    }

    .icondiv{
        display: inline-block;
        margin: 0 auto;
        width: auto;
    }
    .icon-img {
        max-width: 14rem;
        float: left;
        display: block;
        margin: 0 auto;
        box-align: middle;
        padding: 2rem;
    }
    .icon-content {
        overflow: hidden;
        padding: 2rem;
    }

    .icon-content h5 {
        color: rgba(93, 80, 5, 1);
    }

    .icon-content p {
        font-weight: 400;
        font-family: 'avenir lt pro';
    }
    .clearfix {
        clear: both;
    }

    .text-green {
        color: rgba(93, 80, 5, 1);
    }

</style>


<section class="my-account pb-120">

    @include('frontend.skinoasis.pages.users.partials.profile')

    <div class="container mt-8">
        <div class="row">
            <div class="col-lg-8" >
                <div class="user-content rounded shadow-box bg-white py-5 mb-3">
                    <div class="p-4 ">
                        <ul class="nav nav-pills justify-content-center" id="tabs-6" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-21-tab" data-toggle="tab" href="#tab-21" role="tab" aria-controls="tab-21" aria-selected="true">ARTICLE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-22-tab" data-toggle="tab" href="#tab-22" role="tab" aria-controls="tab-22" aria-selected="false">VIDEO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-23-tab" data-toggle="tab" href="#tab-23" role="tab" aria-controls="tab-23" aria-selected="false">REVIEW</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-24-tab" data-toggle="tab" href="#tab-24" role="tab" aria-controls="tab-24" aria-selected="false">PHOTO</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-6">
                            <div class="tab-pane fade active show" id="tab-21" role="tabpanel" aria-labelledby="tab-21-tab">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. </p>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="tab-22" role="tabpanel" aria-labelledby="tab-22-tab">
                                <p>Nobis perspiciatis natus cum, sint dolore earum rerum tempora aspernatur numquam velit tempore omnis, delectus repellat facere voluptatibus nemo non fugiat consequatur repellendus! Enim, commodi, veniam ipsa voluptates quis amet.</p>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="tab-23" role="tabpanel" aria-labelledby="tab-23-tab">
                                <p>Perspiciatis quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="tab-24" role="tabpanel" aria-labelledby="tab-24-tab">
                                <p>Quis nobis, adipisci quae aspernatur, nulla suscipit eum. Dolorum, earum. Consectetur pariatur repellat distinctio atque alias excepturi aspernatur nisi accusamus sed molestias ipsa numquam eius, iusto, aliquid, quis aut.</p>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div>
                </div>
            </div>

            <div class="col-lg-4" >
                <div class="icondiv rounded shadow-box bg-white ">
                    <img src="{{ staticAsset('frontend/skinoasis/assets/images/icons/icon-send.JPG') }}" alt="icon" class="icon-img">
                    <div class="icon-content">
                        <h5 class="mb-3">INVITE YOUR FRIENDS</h5>
                        <p class="text-dark mb-2">
                            Bagikan link referral ke temanmu via media sosial, kontak, atau email.
                        </p>
                        <!-- <ul class="list-inline small text-muted mt-3 mb-0">
                            <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                            <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                        </ul> -->
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="icondiv rounded shadow-box bg-white mt-5">
                    <img src="{{ staticAsset('frontend/skinoasis/assets/images/icons/icon-form.JPG') }}" alt="icon" class="icon-img">
                    <div class="icon-content">
                        <h5 class="mb-3">REGISTRATION & VERIFICATION</h5>
                        <p class="text-dark mb-2">
                            Setelah berhasil mendaftarkan diri melalui link referral, memverifikasi nomor HP, dan melengkapi Profile, temanmu akan mendapatkan voucher 20% untuk belanja cantik pertamanya di SKINOASIS
                        </p>
                        <!-- <ul class="list-inline small text-muted mt-3 mb-0">
                            <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                            <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="cta cta-horizontal mt-lg-7 mb-3 rounded shadow-box bg-white p-4">
            <div class="row align-items-center">
                <div class="col-lg-4 col-xl-3 offset-xl-1">
                    <h3 class="text-green text-capitalize">INVITE VIA EMAIL </h3>
                </div>

                <div class="col-lg-8 col-xl-7">
                    <form action="#">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required="">
                            <div class="input-group-append">
                                <button class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark" type="submit"><span class="text-capitalize"> kirim email</span><i class="icon-long-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="mt-lg-5 rounded shadow-box bg-white p-4">
                    <div class="icondiv">
                        <img src="{{ staticAsset('frontend/skinoasis/assets/images/icons/icon-send.JPG') }}" alt="icon" class="icon-img">
                        <div class="icon-content">
                            <h5 class="mb-3">Share QR Code</h5>
                            <p class="text-dark mb-2">
                                Bagikan kode QR untuk ajak temanmu
                            </p>
                            <button class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark" >
                                <span class="text-capitalize"> Share Image</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mt-lg-5 mt-sm-5 rounded shadow-box bg-white p-4">
                    <div class="icondiv">
                        <img src="{{ staticAsset('frontend/skinoasis/assets/images/icons/icon-send.JPG') }}" alt="icon" class="icon-img">
                        <div class="icon-content">
                            <h5 class="mb-3">Share QR Code</h5>
                            <p class="text-dark mb-2">
                                Bagikan Referral Anda via media Social
                            </p>
                            <div class="social-icons social-icons-color">
                                <a href="#" class="social-icon text-green" title="Whatsapp" target="_blank"><i class="icon-whatsapp"></i></a>
                                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook"></i></a>
                                <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-3 mb-5">
        <h3 class="title text-center text-uppercase text-green mb-5">Syarat & Ketentuan</h3>

    </div>



</section>


@endsection