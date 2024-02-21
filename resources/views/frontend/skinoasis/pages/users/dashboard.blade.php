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
                        <img src="{{$avatar}}" alt="..." width="180" class="rounded-circle mb-2 img-thumbnail">
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
                        <span
                            class="icon bg-color-4 d-inline-flex align-items-center justify-content-center flex-shrink-0 bg-color-1 rounded-3">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M29.3988 26.2549H8.4524C8.19484 26.2549 8.08449 25.9166 8.28619 25.7611L11.202 23.5201H27.8625C29.047 23.5201 30.0295 22.5464 30.0524 21.3637L30.2391 11.7551C30.2605 10.6597 29.4583 9.70857 28.3734 9.54639C27.8514 9.46831 27.3626 9.8272 27.2844 10.3499C27.2062 10.8726 27.5669 11.359 28.09 11.4372C28.226 11.4575 28.3265 11.5757 28.3239 11.7125L28.1371 21.3265C28.1343 21.4743 28.0111 21.6057 27.8626 21.6057H11.6372L8.61464 8.53751L10.1488 8.76115C10.6718 8.83909 11.1595 8.47611 11.2378 7.95341C11.316 7.43071 10.9553 6.9422 10.4321 6.86398L8.1342 6.51987L7.25576 3.10519C7.14712 2.68191 6.76533 2.39331 6.32796 2.39331H2.59851C2.06952 2.39331 1.64062 2.822 1.64062 3.35051C1.64062 3.87902 2.06945 4.30771 2.59851 4.30771H5.58477L9.80376 22.1608L7.11615 24.2313C5.49472 25.4806 6.40666 28.1693 8.45233 28.1693H10.9669C10.8556 28.4428 10.7945 28.7915 10.7945 29.1338C10.7945 30.7172 12.0918 32 13.6865 32C15.2812 32 16.5785 30.7199 16.5785 29.1365C16.5785 28.7942 16.5174 28.4428 16.4061 28.1693H21.6375C21.5262 28.4428 21.4651 28.7915 21.4651 29.1338C21.4651 30.7172 22.7625 32 24.3572 32C25.9519 32 27.2493 30.7199 27.2493 29.1365C27.2493 28.7942 27.1881 28.4428 27.0768 28.1693H29.3989C29.928 28.1693 30.3568 27.7406 30.3568 27.2121C30.3568 26.6836 29.9279 26.2549 29.3988 26.2549V26.2549ZM13.6865 30.0806C13.1481 30.0806 12.7102 29.6511 12.7102 29.1232C12.7102 28.5952 13.1482 28.1657 13.6865 28.1657C14.2249 28.1657 14.6628 28.5952 14.6628 29.1232C14.6628 29.6511 14.2249 30.0806 13.6865 30.0806ZM24.3571 30.0806C23.8187 30.0806 23.3808 29.6511 23.3808 29.1232C23.3808 28.5952 23.8188 28.1657 24.3571 28.1657C24.8955 28.1657 25.3334 28.5952 25.3334 29.1232C25.3334 29.6511 24.8954 30.0806 24.3571 30.0806Z"
                                    fill="#A158FF"></path>
                                <path
                                    d="M19.1561 13.8741C15.3201 13.8741 12.1992 10.7621 12.1992 6.93703C12.1992 3.11192 15.3201 0 19.1561 0C22.9922 0 26.1131 3.11192 26.1131 6.93703C26.1131 10.7621 22.9922 13.8741 19.1561 13.8741ZM19.1561 1.91399C16.3764 1.91399 14.115 4.1673 14.115 6.93703C14.115 9.70675 16.3765 11.9601 19.1561 11.9601C21.9358 11.9601 24.1973 9.70675 24.1973 6.93703C24.1973 4.1673 21.9359 1.91399 19.1561 1.91399V1.91399Z"
                                    fill="#A158FF"></path>
                                <path
                                    d="M17.459 9.3735L15.9204 7.54764C15.5798 7.14336 15.6316 6.53964 16.0363 6.19922C16.4409 5.8588 17.0451 5.91056 17.3859 6.31498L18.2313 7.31819L20.8614 4.52358C21.2238 4.13858 21.8301 4.11991 22.2154 4.48194C22.6009 4.84397 22.6195 5.44967 22.2571 5.83467L18.8896 9.41275C18.5888 9.72937 17.8191 9.79207 17.459 9.3735V9.3735Z"
                                    fill="#A158FF"></path>
                            </svg>
                        </span>
                        New Order</small>
                    </li>

                    <li class="list-inline-item"></li>

                    <li class="list-inline-item">
                        <a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a>
                    </li>
                </ul>
            </div>

            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-3.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-4.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-5.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pl-lg-1"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-6.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
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