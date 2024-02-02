@forelse ($carts as $cart)
    <div class="product @if (!$loop->first) pt-1 @endif">
        <div class="product-cart-details">
            <h4 class="product-title">
                <a href="{{ route('products.show', $cart->product_variation->product->slug) }}">
                    {{ $cart->product_variation->product->collectLocalization('name') }}</a>
                    @foreach (generateVariationOptions($cart->product_variation->combinations) as $variation)
                        <span class="fs-xs text-muted">
                            {{-- {{ $variation['name'] }}: --}}
                            @foreach ($variation['values'] as $value)
                                {{ $value['name'] }}
                            @endforeach
                            @if (!$loop->last)
                                ,
                            @endif
                        </span>
                    @endforeach
            </h4>

            <span class="cart-product-info">
                <span class="cart-product-qty count">{{ $cart->qty }}</span>
                x {{ formatPrice(variationDiscountedPrice($cart->product_variation->product, $cart->product_variation)) }}
            </span>
        </div><!-- End .product-cart-details -->

        <figure class="product-image-container">
            <a href="product.html" class="product-image">
                <img src="{{ uploadedAsset($cart->product_variation->product->thumbnail_image) }}" alt="products">
            </a>
        </figure>

        <button title="Remove Product" class="remove_cart_btn btn-remove" onclick="handleCartItem('delete', {{ $cart->id }})">
            <i class="icon-close"></i></button>
    </div><!-- End .product -->
@empty

    <div class="product">
        <img src="{{ staticAsset('frontend/default/assets/img/empty-cart.svg') }}" alt="" srcset=""
            class="img-fluid">
    </div>
@endforelse