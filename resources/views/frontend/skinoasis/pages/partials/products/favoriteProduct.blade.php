

    <div class="product bg-white shadow-none">

        @php
            $discountPercentage = discountPercentage($product);
        @endphp

        @if ($discountPercentage > 0)
            <span class="product-label letter-spacing-large p-2 bg-dark text-white">
                -{{ discountPercentage($product) }}% <span class="text-uppercase">{{ localize('Off') }}</span>
            </span>
        @endif
        <figure class="product-media">
            <a href="#">
                <img src="{{ uploadedAsset($product->thumbnail_image) }}" alt="{{ $product->collectLocalization('name') }}" width="277" height="377" class="product-image" />
                <img src="{{ uploadedAsset($product->thumbnail_image) }}" alt="{{ $product->collectLocalization('name') }}" width="277" height="377" class="product-image-hover" />
            </a>
            <div class="product-action-vertical">
                @if (Auth::check() && Auth::user()->user_type == 'customer')
                    <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                        onclick="addToWishlist({{ $product->id }})" alt="Add Wishlist"></a>
                @elseif(!Auth::check())
                    <a href="javascript:void(0);" class="btn-product-icon btn-wishlist"
                        onclick="addToWishlist({{ $product->id }})" alt="Add Wishlist"></a>
                @endif

                <a href="javascript:void(0);" class="btn-product-icon btn-quickview"
                    onclick="showProductDetailsModal({{ $product->id }})" alt="Preview"></a>
            </div>
        </figure>
        <div class="product-body text-center">
            @if (getSetting('enable_reward_points') == 1)
                <span class="fs-xxs fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{ localize('Reward Points') }}">
                    <i class="fas fa-medal"></i> {{ $product->reward_points }}
                </span>
            @endif
            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                @if ($product->categories()->count() > 0)
                    @foreach ($product->categories as $category)
                        <a href="{{ route('products.index') }}?&category_id={{ $category->id }}"
                            class="d-inline-block text-muted fs-xxs">{{ $category->collectLocalization('name') }}
                            @if (!$loop->last)
                                ,
                            @endif
                        </a>
                    @endforeach
                @endif
            </div>

            <a href="{{ route('products.show', $product->slug) }}">
                <h3 class="product-title font-size-normal">{{ $product->collectLocalization('name') }}</h3>
            </a>

            <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                <h6 class="price">
                    @include('frontend.default.pages.partials.products.pricing', [
                        'product' => $product,
                        'onlyPrice' => true,
                    ])
                </h6>
            </div>
            <div class="product-footer justify-content-center d-block">
                @php
                    $isVariantProduct = 0;
                    $stock = 0;
                    if ($product->variations()->count() > 1) {
                        $isVariantProduct = 1;
                    } else {
                        $stock = $product->variations[0]->product_variation_stock ? $product->variations[0]->product_variation_stock->stock_qty : 0;
                    }
                @endphp
                @if ($isVariantProduct)
                    <a href="javascript:void(0);" class="btn btn-secondary d-block btn-md rounded-1"
                        onclick="showProductDetailsModal({{ $product->id }})">{{ localize('Add to Cart') }}</a>
                @else
                    <form action="" class="direct-add-to-cart-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="product_variation_id" value="{{ $product->variations[0]->id }}">
                        <input type="hidden" value="1" name="quantity">

                        @if (!$isVariantProduct && $stock < 1)
                            <a href="javascript:void(0);" class="btn btn-secondary d-block btn-md rounded-1 w-100">
                                {{ localize('Out of Stock') }}</a>
                        @else
                            <a href="javascript:void(0);" onclick="directAddToCartFormSubmit(this)"
                                class="btn btn-secondary d-block btn-md rounded-1 w-100 direct-add-to-cart-btn add-to-cart-text">{{ localize('Add to Cart') }}</a>
                        @endif
                    </form>
                @endif
            </div>
        </div>
    </div>
