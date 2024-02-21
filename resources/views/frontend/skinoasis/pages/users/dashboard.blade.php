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
</style>
<section class="my-account pt-6 pb-120">
        <div class="container">
            <!-- Profile widget -->
            <div class="bg-white shadow overflow-hidden">
                <div class="px-4 pt-0 pb-4 bg-dark">
                    <div class="media align-items-end profile-header">
                        <div class="profile mt-5 mr-8">
                            <img src="https://bootstrapious.com/i/snippets/sn-profile/teacher.jpg" alt="..." width="180" class="rounded-cirlce mb-2 img-thumbnail">
                            <a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a>
                        </div>
                        <div class="media-body ml-5 mb-5 text-white">
                            <h2 class="mt-0 mb-0">Manuella Tarly</h2>
                            <h4 class="mb-4">Sahabat Skin Oasis</h4>
                        </div>
                    </div>
                </div>

                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>
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
        </div>
</section>

@endsection