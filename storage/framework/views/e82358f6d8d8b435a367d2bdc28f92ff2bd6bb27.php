<!-- Brands -->
<div class="bg-white deal-container pt-5 pb-3">

    <h2 class="title text-center brands" data-aos="fade-up">
        “Skin Oasis product is a high-tech and newest product from Korea”
    </h2>
    <div class="brands-border owl-carousel owl-simple mb-5" data-aos="fade-up" data-toggle="owl"
        data-owl-options='{
            "nav": false,
            "dots": false,
            "margin": 10,
            "loop": false,
            "responsive": {
                "0": {
                    "items":2
                },
                "420": {
                    "items":3
                },
                "600": {
                    "items":4
                },
                "900": {
                    "items":5
                }
            }
        }'>
<!-- 
        ,
                "1024": {
                    "items":6
                } -->
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandPrd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="brand" href="<?php echo e(route('products.index')); ?>?&brand_id=<?php echo e($brandPrd->id); ?>">
                <img src="<?php echo e(uploadedAsset($brandPrd->brand_image)); ?>" alt="Brand Name">
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div><!-- End .owl-carousel -->
</div><?php /**PATH D:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/partials/home/2brand.blade.php ENDPATH**/ ?>