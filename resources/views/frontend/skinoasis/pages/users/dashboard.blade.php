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
        <div class="bg-white shadow overflow-hidden">
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

            <div class="py-4 px-4">

                <div class="row mt-5">
                    <div class="col-xl-9">
                        <div class="recent-orders shadow bg-white rounded py-5">

                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div class="recent-orders shadow bg-white rounded py-5">

                        </div>
                    </div>
                </div>

                <div class="py-4">
                    <h5 class="mb-3">Recent posts</h5>
                    <div class="p-4 bg-light rounded shadow-sm">
                        <p class="font-italic mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <ul class="list-inline small text-muted mt-3 mb-0">
                            <li class="list-inline-item"><i class="fa fa-comment-o mr-2"></i>12 Comments</li>
                            <li class="list-inline-item"><i class="fa fa-heart-o mr-2"></i>200 Likes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End profile widget -->

</section>

@endsection