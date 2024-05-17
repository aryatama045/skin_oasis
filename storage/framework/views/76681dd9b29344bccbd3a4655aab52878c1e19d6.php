
<?php $__env->startSection('contents'); ?>
<div class="error-content text-center" style="background-image: url(<?php echo e(staticAsset('frontend/skinoasis/assets/images/backgrounds/error-bg.jpg')); ?>)">
    <div class="container">
        <h1 class="error-title">Error 404</h1><!-- End .error-title -->
        <p>We are sorry, the page you've requested is not available.</p>
        <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-primary-2 btn-minwidth-lg">
            <span>BACK TO HOMEPAGE</span>
            <i class="icon-long-arrow-right"></i>
        </a>
    </div><!-- End .container -->
</div><!-- End .error-content text-center -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.skinoasis.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/errors/404.blade.php ENDPATH**/ ?>