<!-- Product Favorite -->
<div class="arrival pt-8 pb-100 bg-white position-relative overflow-hidden z-1 trending-products-area">
    <div class="container">

        <div class="heading heading-center mb-5">
            <h2 class="title text-uppercase mb-4">{{ localize('Products Favorite') }}</h2>
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a href="#arrival-all" class="nav-link font-size-normal letter-spacing-large active" data-toggle="tab" role="tab">All</a>
                </li>

                @php
                    $trending_product_categories = getSetting('trending_product_categories') != null ? json_decode(getSetting('trending_product_categories')) : [];
                    $categories = \App\Models\Category::whereIn('id', $trending_product_categories)->get();
                @endphp
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="#fav-{{ $category->id }}" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">{{ $category->collectLocalization('name') }}</a>
                </li>
                @endforeach

            </ul>
        </div>

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="arrival-all" role="tabpanel">
                <div class="owl-carousel  carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items": 2
                            },
                            "768": {
                                "items": 3
                            },
                            "992": {
                                "items": 4,
                                "nav": true
                            }
                        }
                    }'>
                    @php
                        $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                        $products = \App\Models\Product::whereIn('id', $trending_products)->get();
                    @endphp

                    @foreach ($products as $product)
                        <div class="filter_item
                            @php if($product->categories()->count() > 0){
                                    foreach ($product->categories as $category) {
                                        echo $category->id .' ';
                                    }
                                } @endphp">
                            @include('frontend.skinoasis.pages.partials.products.favoriteProduct', [
                                'product' => $product,
                            ])
                        </div>
                    @endforeach
                </div>
            </div>

            @foreach ($categories as $category)
                <div class="tab-pane p-0 fade " id="fav-{{ $category->id }}" role="tabpanel">
                    <div class="owl-carousel  carousel-equal-height owl-simple carousel-with-shadow row cols-lg-4 cols-md-3 cols-2" data-toggle="owl"
                        data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items": 2
                                },
                                "768": {
                                    "items": 3
                                },
                                "992": {
                                    "items": 4,
                                    "nav": true
                                }
                            }
                        }'>
                        @php
                            $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                            $products = \App\Models\Product::whereIn('id', $trending_products)->get();
                        @endphp

                        @foreach ($products as $product)

                            <?php
                                if($product->categories()->count() > 0){
                                    foreach ($product->categories as $category) {
                                        echo $category->id .' ';
                                    }
                                }
                            ?>

                            @include('frontend.skinoasis.pages.partials.products.favoriteProduct', [
                                'product' => $product,
                            ])
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
