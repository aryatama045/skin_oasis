

    <div class="product shadow-none">

        <?php
            $discountPercentage = discountPercentage($product);
        ?>

        <?php if($discountPercentage > 0): ?>
            <span class="product-label letter-spacing-large p-2 bg-dark text-white">
                -<?php echo e(discountPercentage($product)); ?>% <span class="text-uppercase"><?php echo e(localize('Off')); ?></span>
            </span>
        <?php endif; ?>
        <figure class="product-media bg-transparant">

                <img src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>" alt="<?php echo e($product->collectLocalization('name')); ?>" class="product-image fit-cover" />
                <!-- <img src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>" alt="<?php echo e($product->collectLocalization('name')); ?>" class="product-image-hover" /> -->
            <div class="product-action-vertical">
                <?php if(Auth::check() && Auth::user()->user_type == 'customer'): ?>
                    <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                        onclick="addToWishlist(<?php echo e($product->id); ?>)" alt="Add Wishlist"></a>
                <?php elseif(!Auth::check()): ?>
                    <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                        onclick="addToWishlist(<?php echo e($product->id); ?>)" alt="Add Wishlist"></a>
                <?php endif; ?>

                <a href="javascript:void(0);" class="btn-product-icon btn-quickview"
                    onclick="showProductDetailsModal(<?php echo e($product->id); ?>)" alt="Preview"></a>
            </div>
        </figure>
        <div class="product-body text-left bg-transparant">
            <?php if(getSetting('enable_reward_points') == 1): ?>
                <span class="fs-xxs fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="<?php echo e(localize('Reward Points')); ?>">
                    <i class="fas fa-medal"></i> <?php echo e($product->reward_points); ?>

                </span>
            <?php endif; ?>
            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                <?php if($product->categories()->count() > 0): ?>
                    <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"
                            class="d-inline-block text-brown"><?php echo e($category->collectLocalization('name')); ?>

                            <?php if(!$loop->last): ?>
                                ,
                            <?php endif; ?>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <a href="<?php echo e(route('products.show', $product->slug)); ?>">
                <h3 class="product-title fw-bold font-size-normal tt-line-clamp tt-clamp-1"><?php echo e($product->collectLocalization('name')); ?></h3>
            </a>

            <div class="product-price font-size-normal mt-lg-4 mb-0 text-dark text-left">
                <h6 class="price">
                    <?php echo $__env->make('frontend.skinoasis.pages.partials.products.pricing', [
                        'product' => $product,
                        'onlyPrice' => true,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </h6>
            </div>

            <div class="text-left d-block mt-lg-5">
                
                    <a href="javascript:void(0);" class="font-size-normal fw-bold add-to-cart-text-fav text-uppercase letter-spacing-large w-100"
                        onclick="showProductDetailsModal(<?php echo e($product->id); ?>)"><?php echo e(localize('Add to Cart')); ?></a>

            </div>
        </div>
    </div>
<?php /**PATH D:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/partials/products/favoriteProduct.blade.php ENDPATH**/ ?>