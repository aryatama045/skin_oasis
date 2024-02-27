@if (productBasePrice($product) == discountedProductBasePrice($product))
    @if (productBasePrice($product) == productMaxPrice($product))
        <h6 class="fw-semibold mt-lg-4 mb-lg-3 ">{{ formatPrice(productBasePrice($product)) }}</h6>
    @else
        <h6 class="fw-semibold mt-lg-4 mb-lg-3 ">{{ formatPrice(productBasePrice($product)) }} - {{ formatPrice(productMaxPrice($product)) }}</h6>

    @endif
@else
    @if (discountedProductBasePrice($product) == discountedProductMaxPrice($product))
        <h6 class="fw-semibold mt-lg-4 mb-lg-3 ">{{ formatPrice(discountedProductBasePrice($product)) }}</h6>
    @else
        <h6 class="fw-semibold mt-lg-4 mb-lg-3 ">{{ formatPrice(discountedProductBasePrice($product)) }} - {{ formatPrice(discountedProductMaxPrice($product)) }}</h6>
    @endif

    @if (isset($br))
        <br>
    @endif

    @if (!isset($onlyPrice) || $onlyPrice == false)
        @if (productBasePrice($product) == productMaxPrice($product))
            <h6
                class="fw-semibold mt-lg-4 mb-lg-3 deleted text-muted {{ isset($br) ? '' : 'ms-1' }}">{{ formatPrice(productBasePrice($product)) }}</h6>
        @else
            <h6 class="fw-semibold mt-lg-4 mb-lg-3 deleted text-muted {{ isset($br) ? '' : 'ms-1' }}">{{ formatPrice(productBasePrice($product)) }} - {{ formatPrice(productMaxPrice($product)) }}</h6>

        @endif
    @endif
@endif

<!-- @if ($product->unit)
    <small>/{{ $product->unit->collectLocalization('name') }}</small>
@endif -->
