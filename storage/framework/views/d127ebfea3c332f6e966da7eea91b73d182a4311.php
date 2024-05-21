

<?php
    $detailedProduct = $product;
?>

<?php $__env->startSection('title'); ?>
    <?php if($detailedProduct->meta_title): ?>
        <?php echo e($detailedProduct->meta_title); ?>

    <?php else: ?>
        <?php echo e(localize('Product Details')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?>
    <?php echo e($detailedProduct->meta_description); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?>
    <?php $__currentLoopData = $detailedProduct->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($tag->name); ?> <?php if(!$loop->last): ?>
            ,
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploadedAsset($detailedProduct->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($detailedProduct->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($detailedProduct->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploadedAsset($detailedProduct->meta_img)); ?>">
    <meta name="twitter:data1" content="<?php echo e(formatPrice($detailedProduct->min_price)); ?>">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($detailedProduct->meta_title); ?>" />
    <meta property="og:type" content="og:product" />
    <meta property="og:url" content="<?php echo e(route('products.show', $detailedProduct->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploadedAsset($detailedProduct->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($detailedProduct->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(getSetting('meta_title')); ?>" />
    <meta property="og:price:amount" content="<?php echo e(formatPrice($detailedProduct->min_price)); ?>" />
    <meta property="product:price:currency" content="<?php echo e(env('DEFAULT_CURRENCY')); ?>" />
    <meta property="fb:app_id" content="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-contents'); ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
        <li class="breadcrumb-item"><?php echo e(localize('Products')); ?></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(localize('Product Details')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

    <br>
    <center>
        <?php $banner = getSetting('banner_header'); ?>
        <div>
            <img  src="<?php echo e(uploadedAsset($banner)); ?>" style="max-width: 90%">
        </div>
    </center><br><br>

    <!--breadcrumb-->
    <?php echo $__env->make('frontend.skinoasis.inc.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--breadcrumb-->

    <div class="container">
        <div class="product-details-top gstore-product-quick-view bg-white rounded-3 py-6 px-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <?php
                                if (!is_null($product->gallery_images)) {
                                    $galleryImages = explode(',', $product->gallery_images);
                                } else {
                                    $galleryImages = [];
                                    $galleryImages[] = $product->thumbnail_image;
                                }
                            ?>
                            <figure class="product-main-image">

                                <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                <img id="product-zoom" src="<?php echo e(uploadedAsset($galleryImage)); ?>?thumb"
                                        data-zoom-image="<?php echo e(uploadedAsset($galleryImage)); ?>?thumb" alt="<?php echo e($product->collectLocalization('name')); ?>">

                                <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                    <i class="icon-arrows"></i>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </figure><!-- End .product-main-image -->

                            <div id="product-zoom-gallery" class="product-image-gallery">
                                <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="product-gallery-item <?php if ($loop->first) { ?>active<?php } ?>"
                                    href="#" data-image="<?php echo e(uploadedAsset($galleryImage)); ?>"
                                    data-zoom-image="<?php echo e(uploadedAsset($galleryImage)); ?>">
                                    <img src="<?php echo e(uploadedAsset($galleryImage)); ?>" alt="product side">
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div><!-- End .product-image-gallery -->
                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="row g-4">
                        <div class="product-details">
                            <h1 class="product-title mt-xs-3"><?php echo e($product->collectLocalization('name')); ?></h1><!-- End .product-title -->


                            <div class="product-price">
                                <?php echo $__env->make('frontend.default.pages.partials.products.pricing', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div><!-- End .product-price -->

                            <!-- selected variation pricing -->
                            <div class="pricing variation-pricing mt-2 d-none">
                            </div>
                            <!-- selected variation pricing -->

                            <div class="product-content">
                                <p><?php echo e($product->collectLocalization('short_description')); ?></p>
                            </div><!-- End .product-content -->

                            <?php if(!empty($product->pdf)): ?>
                                <a href="<?php echo e(uploadedAsset($product->pdf)); ?>" target="_blank" class="btn btn-rounded btn-sm mb-1 text-uppercase btn-outline-green-dark"> Download PDF</a>
                                <div class="separator mt-4 mb-2"></div>
                            <?php endif; ?>


                            <form action="" class="add-to-cart-form">
                                <?php
                                    $isVariantProduct = 0;
                                    $stock = 0;
                                    if ($product->variations()->count() > 1) {
                                        $isVariantProduct = 1;
                                    } else {
                                        $stock = $product->variations[0]->product_variation_stock ? $product->variations[0]->product_variation_stock->stock_qty : 0;
                                    }
                                ?>

                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" name="product_variation_id"
                                    <?php if(!$isVariantProduct): ?> value="<?php echo e($product->variations[0]->id); ?>" <?php endif; ?>>

                                <!-- variations -->
                                <?php echo $__env->make('frontend.default.pages.partials.products.variations', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <!-- variations -->

                                <div class="d-flex align-items-center gap-3 flex-wrap mt-5">
                                    <div class="product-details-quantity">
                                        <div class="product-qty qty-increase-decrease d-flex align-items-center">
                                            <button type="button" class="decrease">-</button>
                                            <input type="text" readonly value="1" name="quantity" min="1"
                                                <?php if(!$isVariantProduct): ?> max="<?php echo e($stock); ?>" <?php endif; ?>>
                                            <button type="button" class="increase">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="align-items-center mt-5">
                                    <div class="product-details-action">
                                        <button type="submit" class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark btn-product btn-cart add-to-cart-btn"
                                            <?php if(!$isVariantProduct && $stock < 1): ?> disabled <?php endif; ?>>

                                            <span class="add-to-cart-text">
                                                <?php if(!$isVariantProduct && $stock < 1): ?>
                                                    <?php echo e(localize('Out of Stock')); ?>

                                                <?php else: ?>
                                                    <?php echo e(localize('Add to Cart')); ?>

                                                <?php endif; ?>
                                            </span>
                                        </button>

                                        <button type="button" class="mt-xs-2 btn btn-rounded btn-sm text-uppercase btn-outline-green-dark btn-product btn-wishlist" title="Wishlist"
                                            onclick="addToWishlist(<?php echo e($product->id); ?>)">
                                            Add to Wishlist
                                        </button>
                                    </div>


                                    <div class="flex-grow-1"></div>
                                    <?php if(getSetting('enable_reward_points') == 1): ?>
                                        <span class="fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-title="<?php echo e(localize('Reward Points')); ?>">
                                            <i class="fas fa-medal"></i> <?php echo e($product->reward_points); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>

                            <div class="product-details-footer">
                                    <!--product category start-->
                                    <?php if($product->categories()->count() > 0): ?>
                                        <div class="tt-category-tag mt-4 mt-4">
                                            <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('products.index')); ?>?&category_id=<?php echo e($category->id); ?>"
                                                    class="text-muted fs-xxs"><?php echo e($category->collectLocalization('name')); ?></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                    <!--product category end-->
                                </form>

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div>
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->
        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (<?php echo e($review->count()); ?>)</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                    <?php if($product->description): ?>
                        <?php echo $product->collectLocalization('description'); ?>

                    <?php else: ?>
                        <div class="text-dark text-center border py-2"><?php echo e(localize('Not Available')); ?>

                        </div>
                    <?php endif; ?>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <h3 class="mb-2"><?php echo e(localize('Additional Information')); ?>:</h3>
                        <table class="w-100 product-info-table">
                            <?php $__currentLoopData = generateVariationOptions($product->variation_combinations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-dark fw-semibold"><?php echo e($variation['name']); ?></td>
                                <td>
                                    <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($value['name']); ?><?php if(!$loop->last): ?>
                                            ,
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>

                        <br><br>
                        <?php if($product->additional_info): ?>
                            <?php echo $product->additional_info; ?>

                        <?php else: ?>
                            <div class="text-dark text-center border py-2"><?php echo e(localize('Not Available')); ?>

                            </div>
                        <?php endif; ?>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                    <div class="reviews">
                        <h3>Reviews (<?php echo e($review->count()); ?>)</h3>
                        <?php if(count($review) >  0): ?>
                        <div class="review">
                            <?php $__currentLoopData = $review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimoni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#"><?php echo e($testimoni->name_user); ?></a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val"
                                                <?php if($testimoni->rating==1): ?>
                                                    style="width: 20%;"
                                                <?php elseif($testimoni->rating==2): ?>
                                                    style="width: 40%;"
                                                <?php elseif($testimoni->rating==3): ?>
                                                    style="width: 60%;"
                                                <?php elseif($testimoni->rating==4): ?>
                                                    style="width: 80%;"
                                                <?php elseif($testimoni->rating==5): ?>
                                                    style="width: 100%;"
                                                <?php endif; ?>
                                            >
                                            </div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date"><?php echo e(getTimeAgo($testimoni->tanggal)); ?></span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <h4><?php echo $testimoni->title; ?></h4>
                                    <div class="review-content">
                                        <p><?php echo $testimoni->comment; ?> </p>
                                    </div><!-- End .review-content -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .row -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div><!-- End .review -->
                        <?php else: ?>
                            <div class="text-dark text-center border py-2"><?php echo e(localize('Not Available')); ?>

                            </div>
                        <?php endif; ?>
                    </div><!-- End .reviews -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

        <!--related product slider start -->
        <?php echo $__env->make('frontend.skinoasis.pages.partials.products.related-products', [
            'relatedProducts' => $relatedProducts,
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--related products slider end-->
    </div><!-- End .container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.skinoasis.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/products/show.blade.php ENDPATH**/ ?>