@if (productBasePrice($product) == discountedProductBasePrice($product))
    @if (productBasePrice($product) == productMaxPrice($product))
        <h3 class="fw-bold text-danger">{{ formatPrice(productBasePrice($product)) }}</h3>
    @else
        <h3 class="fw-bold text-danger">{{ formatPrice(productBasePrice($product)) }} - {{ formatPrice(productMaxPrice($product)) }}</h3>

    @endif
@else
    @if (discountedProductBasePrice($product) == discountedProductMaxPrice($product))
        <h3 class="fw-bold text-danger">{{ formatPrice(discountedProductBasePrice($product)) }}</h3>
    @else
        <h3 class="fw-bold text-danger">{{ formatPrice(discountedProductBasePrice($product)) }} - {{ formatPrice(discountedProductMaxPrice($product)) }}</h3>
    @endif

    @if (isset($br))
        <br>
    @endif

    @if (!isset($onlyPrice) || $onlyPrice == false)
        @if (productBasePrice($product) == productMaxPrice($product))
            <h3
                class="fw-bold deleted text-muted {{ isset($br) ? '' : 'ms-1' }}">{{ formatPrice(productBasePrice($product)) }}</h3>
        @else
            <h3 class="fw-bold deleted text-muted {{ isset($br) ? '' : 'ms-1' }}">{{ formatPrice(productBasePrice($product)) }} - {{ formatPrice(productMaxPrice($product)) }}</h3>

        @endif
    @endif
@endif

@if ($product->unit)
    <small>/{{ $product->unit->collectLocalization('name') }}</small>
@endif
