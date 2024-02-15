<div class="product product-7 text-center">
    <figure class="product-media">
        @php
            $discountPercentage = discountPercentage($product);
        @endphp

        @if ($discountPercentage > 0)
            <span class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">
                -{{ discountPercentage($product) }}% <span class="text-uppercase">{{ localize('Off') }}</span>
            </span>
        @endif
        
        

        @if (getSetting('enable_reward_points') == 1)

            <span class="product-label label-new" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-title="{{ localize('Reward Points') }}" > {{ $product->reward_points }}</span>
        @endif

        <a href="product.html">
            <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
        </a>

        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
        </div><!-- End .product-action-vertical -->

        <div class="product-action">
            <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
        </div><!-- End .product-action -->
    </figure><!-- End .product-media -->

    <div class="product-body">
        <div class="product-cat">
            <a href="#">Women</a>
        </div><!-- End .product-cat -->
        <h3 class="product-title"><a href="product.html">Brown paperbag waist pencil skirt</a></h3><!-- End .product-title -->
        <div class="product-price">
            $60.00
        </div><!-- End .product-price -->
        <div class="ratings-container">
            <div class="ratings">
                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
            </div><!-- End .ratings -->
            <span class="ratings-text">( 2 Reviews )</span>
        </div><!-- End .rating-container -->

        <div class="product-nav product-nav-thumbs">
            <a href="#" class="active">
                <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
            </a>
            <a href="#">
                <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
            </a>

            <a href="#">
                <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
            </a>
        </div><!-- End .product-nav -->
    </div><!-- End .product-body -->
</div><!-- End .product -->