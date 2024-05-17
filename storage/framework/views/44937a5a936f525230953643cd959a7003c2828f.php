<script>
    WebFontConfig = {
        google: { families: [ 'Open+Sans:300,400,600,700','Poppins:300,400,500,600,700' ] }
    };
    (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = "<?php echo e(staticAsset('frontend/skinoasis/assets/js/webfont.js')); ?>";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>


<script>
    'use strict'

    var TT = TT || {};
    TT.localize = {
        buyNow: '<?php echo e(localize('Buy Now')); ?>',
        addToCart: '<?php echo e(localize('Add to Cart')); ?>',
        outOfStock: '<?php echo e(localize('Out of Stock')); ?>',
        addingToCart: '<?php echo e(localize('Adding..')); ?>',
        optionsAlert: '<?php echo e(localize('Please choose all the available options')); ?>',
        applyCoupon: '<?php echo e(localize('Apply Coupon')); ?>',
        pleaseWait: '<?php echo e(localize('Please Wait')); ?>',
    }

    TT.ProductSliders = () => {
        let quickViewProductSlider = new Swiper(".quickview-product-slider", {
            slidesPerView: 1,
            centeredSlides: true,
            speed: 700,
            loop: true,
            loopedSlides: 6,
        });
        let productThumbnailSlider = new Swiper(".product-thumbnail-slider", {
            slidesPerView: 4,
            speed: 700,
            loop: true,
            spaceBetween: 20,
            slideToClickedSlide: true,
            loopedSlides: 6,
            centeredSlides: true,
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                380: {
                    slidesPerView: 3,
                },
                576: {
                    slidesPerView: 4,
                },
            },
        });
        if (quickViewProductSlider && quickViewProductSlider.length > 0) {
            quickViewProductSlider.forEach(function(item, index) {
                item.controller.control = productThumbnailSlider[index];
                productThumbnailSlider[index].controller.control = item;
            });
        } else {
            quickViewProductSlider.controller.control = productThumbnailSlider;
            productThumbnailSlider.controller.control = quickViewProductSlider;
        }
    }
    </script><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/inc/head-scripts.blade.php ENDPATH**/ ?>