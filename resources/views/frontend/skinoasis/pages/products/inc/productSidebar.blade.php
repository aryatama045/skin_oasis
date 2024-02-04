
    <div class="sidebar sidebar-shop">

        <!-- Filter Clear -->
        <div class="widget widget-clean">
            <label>Filters:</label>
            <a href="#" class="sidebar-filter-clear">Clean All</a>
        </div><!-- End .widget widget-clean -->

        <!-- Category -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                {{ localize('Categories') }}
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-1">
                <div class="widget-body">
                    <div class="filter-items filter-items-count">
                    
                        <div class="filter-item">
                            <a href="{{ route('products.index') }}">
                            <label > ALL</label>
                            </a>
                        </div><!-- End .filter-item -->
                        
                        @php
                            $product_listing_categories = getSetting('product_listing_categories') != null ? json_decode(getSetting('product_listing_categories')) : [];
                            $categories = \App\Models\Category::whereIn('id', $product_listing_categories)->get();
                        @endphp
                        @foreach ($categories as $category)
                            @php
                                $productsCount = \App\Models\ProductCategory::where('category_id', $category->id)->count();
                            @endphp
                            
                            <div class="filter-item">
                                <a href="{{ route('products.index') }}?&category_id={{ $category->id }}">
                                <label >{{ $category->collectLocalization('name') }}</label>
                                <span class="item-count">{{ $productsCount }}</span>
                                </a>
                            </div><!-- End .filter-item -->
                        @endforeach


                    </div><!-- End .filter-items -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->

        <!-- Brand -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                    Brand
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-4">
                <div class="widget-body">
                    <div class="filter-items">
                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-1">
                                <label class="custom-control-label" for="brand-1">Next</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-2">
                                <label class="custom-control-label" for="brand-2">River Island</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-3">
                                <label class="custom-control-label" for="brand-3">Geox</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-4">
                                <label class="custom-control-label" for="brand-4">New Balance</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-5">
                                <label class="custom-control-label" for="brand-5">UGG</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-6">
                                <label class="custom-control-label" for="brand-6">F&F</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                        <div class="filter-item">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="brand-7">
                                <label class="custom-control-label" for="brand-7">Nike</label>
                            </div><!-- End .custom-checkbox -->
                        </div><!-- End .filter-item -->

                    </div><!-- End .filter-items -->
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->

        <!-- Price -->
        <div class="widget widget-collapsible">
            <h3 class="widget-title">
                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                    {{ localize('Filter by Price') }}
                </a>
            </h3><!-- End .widget-title -->

            <div class="collapse show" id="widget-5">
                <div class="widget-body">
                    <div class="filter-price">
                        <form class="range-slider-form">
                            <div class="price-filter-range"></div>
                            <div class="d-flex align-items-center mt-3">
                                <input type="number" min="0" oninput="validity.valid||(value='0');"
                                    class="form-control min_price price-range-field price-input price-input-min" name="min_price"
                                    data-value="{{ $min_value }}" data-min-range="0">
                                <span class="d-inline-block ms-2 me-2 fw-bold">-</span>

                                <input type="number" max="{{ $max_range }}"
                                    oninput="validity.valid||(value='{{ $max_range }}');"
                                    class="form-control max_price price-range-field price-input price-input-max" name="max_price"
                                    data-value="{{ $max_value }}" data-max-range="{{ $max_range }}">

                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">{{ localize('Filter') }}</button>
                        </form>
                    </div><!-- End .filter-price -->

                    
                </div><!-- End .widget-body -->
            </div><!-- End .collapse -->
        </div><!-- End .widget -->
    </div><!-- End .sidebar sidebar-shop -->
