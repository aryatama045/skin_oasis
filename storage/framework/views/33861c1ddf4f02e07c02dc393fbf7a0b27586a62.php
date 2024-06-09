<!-- Product Favorite -->
<div class="arrival pt-8 pb-100 position-relative overflow-hidden z-1 trending-products-area">
    <div class="container">

        <div class="heading-fav">

            <h2 class="title d-inline" data-aos="fade-up">
                <img class="img-fluid text-left d-inline p-2 mb-lg-2" src="https://skinoasis.solusiitkreasi.com/public/uploads/media/0szep88MhwsQEGt367sGBWvjDSTF99mm4XryAZAb.png" width="220">
                backed-up with high knowledge in natural ingredients and headmost technologies,
            </h2><!-- End .entry-title -->

            <div class="entry-content mt-lg-6" data-aos="fade-up">
                <p style="font-size:22px !important;">We present you the list of extremely powerful effect but also delicate products.</p>
            </div><!-- End .entry-content -->
        </div>

        <div class="heading-fav heading-center mb-5 " data-aos="fade-up">
            <h4 class="subtitle text-uppercase mb-4">
                <?php echo e(localize('Products Favorite')); ?>

            </h4>
            <ul class="nav nav-pills justify-content-center" style="display:none;" role="tablist">
                <li class="nav-item">
                    <a href="#arrival-all" class="nav-link font-size-normal letter-spacing-large active" data-toggle="tab" role="tab">All</a>
                </li>

                <?php
                    $trending_product_categories = getSetting('trending_product_categories') != null ? json_decode(getSetting('trending_product_categories')) : [];
                    $categories = \App\Models\Category::whereIn('id', $trending_product_categories)->get();
                ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a href="#fav-<?php echo e($category->id); ?>" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab"><?php echo e($category->collectLocalization('name')); ?></a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>

        <div class="tab-content tab-content-carousel " data-aos="fade-up">
            <div class="tab-pane p-0 fade show active" id="arrival-all" role="tabpanel">
                <div class="owl-carousel  carousel-equal-height owl-simple carousel-with-shadow  cols-lg-4 cols-md-3 cols-2" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items": 2
                            },
                            "768": {
                                "items": 3
                            },
                            "992": {
                                "items": 4,
                                "nav": true
                            }
                        }
                    }'>
                    <?php
                        $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                        $products = \App\Models\Product::whereIn('id', $trending_products)->get();
                    ?>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('frontend.skinoasis.pages.partials.products.favoriteProduct', [
                                'product' => $product,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane p-0 fade " id="fav-<?php echo e($category->id); ?>" role="tabpanel">
                    <div class="owl-carousel  carousel-equal-height owl-simple carousel-with-shadow cols-lg-4 cols-md-3 cols-2" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items": 2
                                },
                                "768": {
                                    "items": 3
                                },
                                "992": {
                                    "items": 4,
                                    "nav": true
                                }
                            }
                        }'>
                        <?php
                            $cat_id =$category->id;
                            $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                            $products = \App\Models\Product::leftJoin('product_categories','products.id','=','product_categories.product_id')->where('product_categories.category_id',$cat_id)->whereIn('products.id', $trending_products)->get();
                        ?>

                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php echo $__env->make('frontend.skinoasis.pages.partials.products.favoriteProduct', [
                                'product' => $product,
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</div>
<?php /**PATH D:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/partials/home/5favoriteproduct.blade.php ENDPATH**/ ?>