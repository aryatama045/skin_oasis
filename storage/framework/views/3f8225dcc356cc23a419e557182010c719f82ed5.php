<?php
    $avatar = staticAsset('frontend/default/assets/img/authors/avatar.png');
    $user = auth()->user();
    if (!is_null($user->avatar)) {
        $avatar = uploadedAsset($user->avatar);
    }
?>


<!-- Profile widget -->
<div class="text-white d-flex flex-row" style="background-color: #000; height:200px;">
    <div class="profile d-flex flex-column" >
        <img src="<?php echo e($avatar); ?>" alt="Generic placeholder image" class="rounded-circle mb-2 img-profile img-fluid img-thumbnail mt-4 mb-2" style="z-index: 1;">
    </div>

    <div class="profile-name d-none d-sm-block">
        <h2 class="text-capitalize mt-0 mb-0"><?php echo e($user->name); ?></h2>
        <p class="text-capitalize mt-0 mb-0">Sahabat Skin Oasis</p>
    </div>
</div>
<div class="p-4 text-black bg-white" >
    <div class="d-flex justify-content-end text-center py-1">
        <div>
            <a href="<?php echo e(route('customers.profile')); ?>"
                class="btn btn-sm text-capitalize btn-outline-green-skin btn-block">
                Edit profile</a>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/users/partials/profileWidget.blade.php ENDPATH**/ ?>