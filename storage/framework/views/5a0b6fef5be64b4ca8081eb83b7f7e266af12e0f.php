

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Home')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <!--hero section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.1hero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--hero section end-->

    <!--brand section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.2brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--brand section end-->

    <!--banner section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.3banners', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--banner section end-->

    <!--bestdeal section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.4bestdeals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--bestdeal section end-->

    <!--favoriteproduct products start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.5favoriteproduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--favoriteproduct products end-->

    <!--6bannerstwo section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.6bannerstwo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--6bannerstwo section end-->

    <!--featured products start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.7featuredproducts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--featured products end-->

    <!--8bannersthree section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.8bannersthree', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--8bannersthree section end-->

    <!--infoUpdate section start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.9infoupdate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--infoUpdate section end-->

    <!--igFeed listing start-->
    <?php echo $__env->make('frontend.skinoasis.pages.partials.home.10igfeed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--igFeed listing end-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // runs when the document is ready
        $(document).ready(function() {
            <?php if(\App\Models\Location::where('is_published', 1)->count() > 1): ?>
                notifyMe('info', '<?php echo e(localize('Select your location if not selected')); ?>');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.skinoasis.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/home.blade.php ENDPATH**/ ?>