@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Customer Dashboard') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')

<style>
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

    #sticky {
        position:relative;
        padding: 0.5ex;
        font-size: 2em;
        text-align:center;
    }
    #sticky.stick {
        position: fixed;
        top: 0;
        left:0;
        right:0;
        z-index: 10000;
    }
</style>


<section class="my-account pb-120">

    @include('frontend.skinoasis.pages.users.partials.profile')

    <div class="container mt-8">
        <div class="row">
            <div class="col-lg-8" id="sticky-anchor">
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

            <div class="col-lg-4" id="sticky">
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
    </div>

</section>

<script>
    function sticky_relocate() {
        var window_top = $(window).scrollTop();
        var div_top = $('#sticky-anchor').offset().top;
        if (window_top > div_top) {
            $('#sticky').addClass('stick');
        } else {
            $('#sticky').removeClass('stick');
        }
    }

    $(function() {
        $(window).scroll(sticky_relocate);
        sticky_relocate();
    });
</script>
@endsection