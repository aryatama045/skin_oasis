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
        min-height: 60em;
        height: auto;
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
        font-family: 'avenir lt pro' !important;
        font-size: 16px;
    }
    .clearfix {
        clear: both;
    }

    .text-green {
        color: rgba(93, 80, 5, 1);
    }

</style>


<section class="my-account pb-120">

    @include('frontend.skinoasis.pages.users.partials.profileWidget')

    <div class="container mt-8">
        <div class="row">

            <div class="col-md-8 offset-md-2 rounded shadow-box bg-white p-4">
                
                <div class="update-profile bg-white py-5 px-4">
                    <h3 class="mb-4">{{ localize('Update Profile') }}</h3>
                    <form class="profile-form" action="{{ route('customers.updateProfile') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="info">
                        <div class="file-upload text-center rounded-3 mb-5">
                            <input type="file" name="avatar">
                            <img src="{{ staticAsset('frontend/default/assets/img/icons/image.svg') }}" alt="dp"
                                class="img-fluid">
                            <p class="text-dark fw-bold mb-2 mt-3">{{ localize('Drop your files here or browse') }}</p>
                            <p class="mb-0 file-name"></p>
                        </div>
                        <div class="row g-4">
                            <div class="col-sm-12">
                                <div class="label-input-field">
                                    <label>{{ localize('Name') }}</label>
                                    <input type="text" name="name" placeholder="{{ localize('Your Name') }}"
                                        value="{{ $user->name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="label-input-field">
                                    <label>{{ localize('Email Address') }}</label>
                                    <input type="email" name="email" placeholder="{{ localize('Your Email') }}"
                                        value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="label-input-field">
                                    <label>{{ localize('Phone') }}</label>
                                    <input type="text" name="phone" placeholder="{{ localize('Your Phone') }}"
                                        value="{{ $user->phone }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark mt-6">{{ localize('Update Profile') }}</button>
                    </form>
                </div>

                <div class="change-password bg-white py-5 px-4 mt-4 rounded">
                    <h3 class="mb-4">{{ localize('Change Password') }}</h3>
                    <form class="password-reset-form" action="{{ route('customers.updateProfile') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="password">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="label-input-field">
                                    <label>{{ localize('New Password') }}</label>
                                    <input type="password" name="password" placeholder="******" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="label-input-field">
                                    <label>{{ localize('Re-type Password') }}</label>
                                    <input type="password" name="password_confirmation" placeholder="******" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark mt-6">{{ localize('Change Password') }}</button>
                    </form>
                </div>
            
            </div>

        </div>
    </div>

</section>


@endsection

