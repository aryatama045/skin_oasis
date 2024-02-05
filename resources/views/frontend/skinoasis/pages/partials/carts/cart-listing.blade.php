<!-- Carts -->
@forelse ($carts as $cart)
    <tr>
        <td class="product-col">
            <div class="product">
                <figure class="product-media">
                        <img src="{{ uploadedAsset($cart->product_variation->product->thumbnail_image) }}"
                        alt="{{ $cart->product_variation->product->collectLocalization('name') }}" class="img-fluid"
                        width="100">
                </figure>

                <h3 class="product-title">
                    {{ $cart->product_variation->product->collectLocalization('name') }}
                </h3><!-- End .product-title -->

                @foreach (generateVariationOptions($cart->product_variation->combinations) as $variation)
                    <span class="fs-xs">
                        {{ $variation['name'] }}:
                        @foreach ($variation['values'] as $value)
                            {{ $value['name'] }}
                        @endforeach
                        @if (!$loop->last)
                            ,
                        @endif
                    </span>
                @endforeach
            </div><!-- End .product -->
        </td>
        <td class="price-col">
            {{ formatPrice(variationDiscountedPrice($cart->product_variation->product, $cart->product_variation)) }}
        </td>
        <td class="quantity-col">
            <div class="cart-product-quantity product-qty d-inline-flex align-items-center">
                <button class="decrese" onclick="handleCartItem('decrease',{{ $cart->id }})">-</button>
                <input type="text" class="form-control" readonly value="{{ $cart->qty }}">
                <button class="increase" onclick="handleCartItem('increase', {{ $cart->id }})">+</button>
            </div>
        </td>
        <td class="total-col">{{ formatPrice(variationDiscountedPrice($cart->product_variation->product, $cart->product_variation) * $cart->qty) }}</td>
        <td class="remove-col">
            <button type="button" class="close-btn ms-3 btn-remove"
                    onclick="handleCartItem('delete', {{ $cart->id }})">
                    <i class="icon-close"></i></button>
        </td>
    </tr>

@empty
    <tr>
        <td colspan="6" class="py-4">{{ localize('No data found') }}</td>
    </tr>
@endforelse