<?php if(productBasePrice($product) == discountedProductBasePrice($product)): ?>
    <?php if(productBasePrice($product) == productMaxPrice($product)): ?>
        <h4 class="fw-bold text-danger"><?php echo e(formatPrice(productBasePrice($product))); ?></h4>
    <?php else: ?>
        <h4 class="fw-bold text-danger"><?php echo e(formatPrice(productBasePrice($product))); ?> - <?php echo e(formatPrice(productMaxPrice($product))); ?></h4>

    <?php endif; ?>
<?php else: ?>
    <?php if(discountedProductBasePrice($product) == discountedProductMaxPrice($product)): ?>
        <h4 class="fw-bold text-danger"><?php echo e(formatPrice(discountedProductBasePrice($product))); ?></h4>
    <?php else: ?>
        <h4 class="fw-bold text-danger"><?php echo e(formatPrice(discountedProductBasePrice($product))); ?> - <?php echo e(formatPrice(discountedProductMaxPrice($product))); ?></h4>
    <?php endif; ?>

    <?php if(isset($br)): ?>
        <br>
    <?php endif; ?>

    <?php if(!isset($onlyPrice) || $onlyPrice == false): ?>
        <?php if(productBasePrice($product) == productMaxPrice($product)): ?>
            <h4
                class="fw-bold deleted text-muted <?php echo e(isset($br) ? '' : 'ms-1'); ?>"><?php echo e(formatPrice(productBasePrice($product))); ?></h4>
        <?php else: ?>
            <h4 class="fw-bold deleted text-muted <?php echo e(isset($br) ? '' : 'ms-1'); ?>"><?php echo e(formatPrice(productBasePrice($product))); ?> - <?php echo e(formatPrice(productMaxPrice($product))); ?></h4>

        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<!-- <?php if($product->unit): ?>
    <small>/<?php echo e($product->unit->collectLocalization('name')); ?></small>
<?php endif; ?> -->
<?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/default/pages/partials/products/pricing.blade.php ENDPATH**/ ?>