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
                <img src="{{$avatar}}" alt="img-profile" width="180" class="rounded-circle mb-2 img-profile">
            </div>
            <div class="media-body ml-5 mb-5 ">
                <h2 class="text-capitalize mt-0 mb-0">{{ $user->name }}</h2>
                <h4 class="text-capitalize mt-2 mb-4">Sahabat Skin Oasis</h4>
            </div>
        </div>
    </div>

    <div class="bg-light d-flex justify-content-end text-center">
        <ul class="list-inline p-5">

            <li class="list-inline-item">
                <a href="{{ route('customers.profile') }}" class="btn btn-sm text-capitalize btn-outline-green-skin d-xs-none btn-block">Edit profile</a>
            </li>
        </ul>
    </div>

</div>
<!-- End profile widget -->