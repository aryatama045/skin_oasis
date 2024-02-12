<!-- Product Favorite -->
<section class="pt-8 pb-100 bg-white position-relative overflow-hidden z-1 trending-products-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5">
                <div class="section-title text-center text-xl-start">
                    <h3 class="mb-0">{{ localize('Products Favorite') }}</h3>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="filter-btns gshop-filter-btn-group text-center text-xl-end mt-4 mt-xl-0">

                    @php
                        $trending_product_categories = getSetting('trending_product_categories') != null ? json_decode(getSetting('trending_product_categories')) : [];
                        $categories = \App\Models\Category::whereIn('id', $trending_product_categories)->get();
                    @endphp
                    <button class="active" data-filter="*">{{ localize('All Products') }}</button>
                    @foreach ($categories as $category)
                        <button data-filter=".{{ $category->id }}">{{ $category->collectLocalization('name') }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4 mt-5 filter_group">

            @php
                $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                $products = \App\Models\Product::whereIn('id', $trending_products)->get();
            @endphp

            @foreach ($products as $product)
                <div
                    class="col-xxl-3 col-lg-4 col-md-6 col-sm-10 filter_item
                    @php if($product->categories()->count() > 0){
                            foreach ($product->categories as $category) {
                                echo $category->id .' ';
                            }
                        } @endphp">
                    @include('frontend.default.pages.partials.products.trending-product-card', [
                        'product' => $product,
                    ])
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="seller pt-5 pt-md-6 pb-1 pb-lg-3 my-2 mt-0">
    <div class="container">
        <div class="heading heading-center mb-5">
            <h2 class="title text-uppercase mb-3">{{ localize('Products Favorite') }}</h2>
            <ul class="nav nav-pills filter-btns justify-content-center" role="tablist">
                @php
                    $trending_product_categories = getSetting('trending_product_categories') != null ? json_decode(getSetting('trending_product_categories')) : [];
                    $categories = \App\Models\Category::whereIn('id', $trending_product_categories)->get();
                @endphp
                <li class="nav-item">
                    <a href="#fav-all" class="nav-link font-size-normal letter-spacing-large active" data-toggle="tab" role="tab">{{ localize('All') }}</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a href="#fav-{{ $category->id }}" class="nav-link font-size-normal letter-spacing-large" data-toggle="tab" role="tab">{{ $category->collectLocalization('name') }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content tab-content-carousel filter_group">
            @php
                $trending_products = getSetting('top_trending_products') != null ? json_decode(getSetting('top_trending_products')) : [];
                $products = \App\Models\Product::whereIn('id', $trending_products)->get();
            @endphp

            @foreach ($products as $product)
            <div class="tab-pane p-0 fade filter-item" role="tabpanel" id="@php if($product->categories()->count() > 0){
                            foreach ($product->categories as $category) {
                                echo 'fav-'.$category->id .' ';
                            }
                        } @endphp">

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
                    <div class="product bg-white shadow-none">
                        <span class="product-label letter-spacing-large p-2 bg-dark text-white">SALE</span>
                        <figure class="product-media">
                            <a href="#">
                                <img src="assets/images/demos/demo-25/product/product-6.jpg" alt="Product image" width="277" height="377" class="product-image" />
                                <img src="assets/images/demos/demo-25/product/product-6-2.jpg" alt="Product image" width="277" height="377" class="product-image-hover" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                            </div>
                        </figure>
                        <div class="product-body text-center">
                            <h3 class="product-title font-size-normal">Sterling Silver Tassel Drop Earrings</h3>
                            <div class="product-price font-size-normal mb-0 text-dark justify-content-center">
                                <div class="old-price mx-3">$424.00</div>
                                <span>Now $355.00</span>
                            </div>
                            <div class="product-footer justify-content-center d-block">
                                <div class="ratings-container justify-content-center">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div>
                                <a href="#" class="btn font-size-normal letter-spacing-large btn-dark">
                                    <i class="icon-cart-plus"></i>
                                    <span>ADD TO CART</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @include('frontend.default.pages.partials.products.trending-product-card', [
                        'product' => $product,
                    ])
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
