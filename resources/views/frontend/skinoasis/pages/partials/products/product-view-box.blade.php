<div class="product product-7 text-center">
    <figure class="product-media">

        <span class="product-label label-new">New</span>

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

        <!--product category start-->
        @if ($product->categories()->count() > 0)
            <div class="product-cat">
                @foreach ($product->categories as $category)
                    <a href="{{ route('products.index') }}?&category_id={{ $category->id }}"
                        class="text-muted fs-xxs">{{ $category->collectLocalization('name') }}</a>
                @endforeach
            </div>
        @endif
        <!-- End .product-cat -->


        <h3 class="product-title">
            <a href="product.html">
                {{ $product->collectLocalization('name') }}
            </a>
        </h3><!-- End .product-title -->
        
        <div class="product-price">
            @include('frontend.default.pages.partials.products.pricing', compact('product'))
        </div><!-- End .product-price -->

    </div><!-- End .product-body -->
</div><!-- End .product -->