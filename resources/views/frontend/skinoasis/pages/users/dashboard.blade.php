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
        height: 40em;
    }
</style>


<section class="my-account pb-120">

        @php
            $avatar = staticAsset('frontend/default/assets/img/authors/avatar.png');
            $user = auth()->user();
            if (!is_null($user->avatar)) {
                $avatar = uploadedAsset($user->avatar);
            }
        @endphp

        <!-- Profile widget -->
        <div class="bg-white overflow-hidden">
            <div class="px-4 pt-0 pb-4 bg-dark">
                <div class="media align-items-end profile-header">
                    <div class="profile mt-5 mr-8">
                        <img src="{{$avatar}}" alt="..." width="180" class="rounded-circle mb-2 img-profile">
                    </div>
                    <div class="media-body ml-5 mb-5 ">
                        <h2 class="mt-0 mb-0">{{ $user->name }}</h2>
                        <h4 class="mt-2 mb-4">Sahabat Skin Oasis</h4>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">

                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">{{ $user->orders()->isProcessing()->count() }}</h5>
                        <small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i> Order Proses</small>
                    </li>

                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">{{ $user->orders()->isPlacedOrPending()->count() }}</h5>
                        <small class="text-muted">
                        <i class="fa fa-chart-bar"></i>
                        New Order</small>
                    </li>

                    <li class="list-inline-item"></li>

                    <li class="list-inline-item">
                        <a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a>
                    </li>
                </ul>
            </div>

        </div><!-- End profile widget -->

        <div class="container mt-10">
            <div class="row">
                <div class="col-lg-8">
                    <div class="rounded shadow-box bg-white py-5">
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

                <div class="col-lg-4">
                    <div class="rounded shadow-box bg-white ">
                        <div class="p-4 ">
                            <h5 class="mb-3">INVITE YOUR FRIENDS</h5>
                            <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <ul class="list-inline small text-muted mt-3 mb-0">
                                <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                            </ul>
                        </div>
                    </div>

                    <div class="rounded shadow-box bg-white mt-5">
                        <div class="p-4 ">
                            <h5 class="mb-3">REGISTRATION & VERIFICATION</h5>
                            <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <ul class="list-inline small text-muted mt-3 mb-0">
                                <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                                <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

@endsection