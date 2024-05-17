<!-- IG Feed -->
<div class="bg-lighter pt-5 pb-5" data-aos="fade-up">
    <div class="container">
        <div class="heading-ig text-center">
            <h4>Follow us on Instagram</h4><!-- End .title -->
            <img src="<?php echo e(staticAsset('frontend/skinoasis/assets/images/logo-hashtag.png')); ?>" alt="Logo Hastag" width="50" class="logo-hashtag">
        </div><!-- End .heading -->

        <div class="row">

            <?php $__currentLoopData = $instagram_feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3 col-6">
                <div class="instagram-feed">
                    <img src="<?php echo e($post->url); ?>" alt="A post from my instagram">
                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>280</a>
                        <a href="#"><i class="icon-comments"></i>22</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

        <div class="more-container text-center">
            <a href="#" class="btn btn-outline-primary-2 btn-more">@Skinoasis  Instagram</a>
        </div><!-- End .more-container -->
    </div><!-- End .container -->
</div><!-- End .bg-lighter pt-5 pb-5 --><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/partials/home/10igfeed.blade.php ENDPATH**/ ?>