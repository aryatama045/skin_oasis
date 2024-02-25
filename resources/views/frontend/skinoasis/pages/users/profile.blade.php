@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Customer Dashboard') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')

@include('frontend.skinoasis.pages.users.partials.cssUser')

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

