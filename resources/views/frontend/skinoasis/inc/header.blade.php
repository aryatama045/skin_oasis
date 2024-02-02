<!-- Header -->
<header class="header @if(Route::current()->getName() == 'Home') header-11 @endif">
    <div class="header-middle ">
        <div class="container">
            <div class="header-center">
                <a href="index.html" class="logo">
                    <img src="{{ staticAsset('frontend/skinoasis/assets/images/logo.png') }}" alt="SKINOASIS Logo" width="200" height="25">
                </a>
            </div><!-- End .header-center -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">

                        @if (!is_null(getSetting('header_menu_labels')))
                            @php
                                $labels = json_decode(getSetting('header_menu_labels')) ?? [];
                                $menus = json_decode(getSetting('header_menu_links')) ?? [];
                            @endphp

                            @foreach ($menus as $menuKey => $menuItem)
                                <li class="<?php if($menuItem==localize($labels[$menuKey])){ "active"; } ?>" >
                                    <a href="{{ $menuItem }}">{{ localize($labels[$menuKey]) }}</a>
                                </li>
                            @endforeach
                        @else
                            <li><a href="{{ route('home') }}">{{ localize('Home') }}</a></li>
                            <li><a href="{{ route('products.index') }}">{{ localize('Products') }}</a></li>
                            <li><a href="{{ route('home.campaigns') }}">{{ localize('Campaigns') }}</a>
                            </li>
                            <li><a href="{{ route('home.coupons') }}">{{ localize('Coupons') }}</a>
                            </li>
                        @endif
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->

                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
            </div><!-- End .header-left -->

            <div class="header-right">
                @php
                    $carts = [];
                    if (Auth::check()) {
                        $carts = App\Models\Cart::where('user_id', Auth::user()->id)
                            ->where('location_id', session('stock_location_id'))
                            ->get();
                    } else {
                        if (isset($_COOKIE['guest_user_id'])) {
                            $carts = App\Models\Cart::where('guest_user_id', (int) $_COOKIE['guest_user_id'])
                                ->where('location_id', session('stock_location_id'))
                                ->get();
                        }
                    }
                @endphp


                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-counter cart-count {{ count($carts) > 0 ? '' : 'd-none' }}">{{ count($carts) }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products ">
                            <!--cart listing-->
                            @include('frontend.skinoasis.pages.partials.carts.cart-navbar', [
                                    'carts' => $carts, ])
                            <!--cart listing-->
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>{{ localize('Subtotal') }}:</span>

                            <span class="sub-total-price">
                                {{ formatPrice(getSubTotal($carts, false)) }}
                            </span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{ route('carts.index') }}" class="btn btn-primary">{{ localize('View Cart') }}</a>
                            <a href="{{ route('checkout.proceed') }}" class="btn btn-outline-primary-2"><span>{{ localize('Checkout') }}</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->

                <div class="dropdown wishlist-link">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-user"></i>
                    </a>
                @auth
                    @if (auth()->user()->user_type == 'customer')
                        <li><a href="{{ route('customers.dashboard') }}">
                            <span class="me-2"><i class="fa-solid fa-user"></i></span>
                            {{ localize('My Account') }}</a>
                        </li>
                        <li><a href="{{ route('customers.orderHistory') }}">
                            <span class="me-2"><i class="fa-solid fa-tags"></i></span>
                            {{ localize('My Orders') }}</a>
                        </li>
                        <li><a href="{{ route('customers.wishlist') }}">
                            <span class="me-2"><i class="fa-solid fa-heart"></i></span>
                            {{ localize('My Wishlist') }}</a>
                        </li>
                    @else
                        <li><a href="{{ route('admin.dashboard') }}">
                            <span class="me-2"><i class="fa-solid fa-bars"></i></span>
                            {{ localize('Dashboard') }}</a>
                        </li>
                    @endif

                    <li><a href="{{ route('logout') }}">
                        <span class="me-2"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                        {{ localize('Sign Out') }}
                        </a>
                    </li>
                @endauth


                @guest
                    <li><a href="{{ route('login') }}"><span class="me-2"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i></span>{{ localize('Sign In') }}</a>
                    </li>
                @endguest

                </div><!-- End .user-dropdown -->


            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->