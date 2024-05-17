<!-- Banner 1 -->
<div>
    <section class="gallery pt-5">
        <div class="container">
            <div class="row">

                <div class="col-md-5">
                    <div class="content-right" data-aos="fade-right">
                        <figure class="mb-md-12">
                            <?php $__currentLoopData = $banner_section_one_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($val->id == "434865"): ?> 
                                    <img src="<?php echo e(uploadedAsset($val->image)); ?>" alt="Banner">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </figure>
                    </div>
                </div>

                <div class="col-md-7 p-md-0">
                    <div class="content-left" data-aos="fade-left">
                        <div class="heading mt-14">
                            <h3 class="title mt-lg-6">Coming soon</h3>
                            <span class="desc">Discover all your skin needs through time-efficient skin check system. Try it now!</span>

                            <?php $__currentLoopData = $banner_section_one_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($val->id == "809781"): ?>
                                    <p class="scan-here mt-lg-10 mb-2">
                                        Scan Here
                                    </p>
                                    <img class="barcode" src="<?php echo e(uploadedAsset($val->image)); ?>" alt="Banner" width="50" height="20">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/partials/home/3banners.blade.php ENDPATH**/ ?>