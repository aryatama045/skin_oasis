<?php
    $campaigns = \App\Models\Campaign::where('end_date', '>=', strtotime(date('Y-m-d')))
        ->where('is_published', 1)
        ->latest()->get()->first();

?>

<?php if(!empty($campaigns)): ?>
<!-- Best Deals -->
<div class="bg-green deal-container pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="deal align-items-center">
                    <div class="deal-content" data-aos="fade-up">
                        <h4 class="mb-lg-4"><?php echo e($campaigns->title); ?></h4>
                        <h2><?php echo e(formatPrice($campaigns->harga_promo)); ?></h2>

                        <h3 class="product-tanggal">
                            <?php
                                $start_date = date('d ', $campaigns->start_date);
                                $end_date = date('d M Y', $campaigns->end_date);
                            ?>
                            <?php echo e($start_date); ?>-<?php echo e($end_date); ?>

                        </h3><!-- End .product-title -->

                        <div class="product-price">
                            <span class="new-price"><?php echo e($campaigns->subtitle); ?></span>
                            <!-- <span class="old-price">Was $240.00</span> -->
                        </div><!-- End .product-price -->

                        <a href="<?php echo e(route('home.campaigns.show', $campaigns->slug)); ?>"
                            class="btn btn-rounded btn-sm text-uppercase btn-outline-green-dark mt-5"><?php echo e(localize('Shop Now')); ?></a>

                    </div><!-- End .deal-content -->
                    <div class="deal-image" data-aos="fade-left">
                            <img src="<?php echo e(uploadedAsset($campaigns->banner)); ?>" alt="image" class="deal-img rounded">
                    </div><!-- End .deal-image -->
                </div><!-- End .deal -->
            </div><!-- End .col-lg-12 -->

        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .bg-light -->
<?php endif; ?><?php /**PATH D:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/partials/home/4bestdeals.blade.php ENDPATH**/ ?>