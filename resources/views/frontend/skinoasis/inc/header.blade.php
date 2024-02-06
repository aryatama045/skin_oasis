<!-- Header -->
<header class="header @if(!empty(Route::current()->getName())) @if(Route::current()->getName() == 'home') header-11 @endif  @endif">
    <div class="header-middle ">
        <div class="container">
            <div class="header-center">
                <a href="{{ route('home') }}" class="logo">
                    @if(!empty(Route::current()->getName()))
                        @if(Route::current()->getName() == 'home')
                            <img src="{{ staticAsset('frontend/skinoasis/assets/images/logo.png') }}" alt="SKINOASIS Logo" width="200" height="25">
                        @else
                        <img src="{{ staticAsset('frontend/skinoasis/assets/images/logo-black.png') }}" alt="SKINOASIS Logo" width="200" height="25">
                        @endif
                    @endif
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

            <div class="gshop-header-cart position-relative">
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


                <button type="button" class="header-icon">
                    <svg width="18" height="25" viewBox="0 0 22 25" fill="#fff"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.1704 23.9559L19.6264 7.01422C19.5843 6.55156 19.1908 6.19718 18.7194 6.19718H15.5355V4.78227C15.5355 2.14533 13.3583 0 10.6823 0C8.00628 0 5.82937 2.14533 5.82937 4.78227V6.19718H2.6433C2.17192 6.19718 1.77839 6.55156 1.73625 7.01422L0.186259 24.0225C0.163431 24.2735 0.248671 24.5223 0.421216 24.7082C0.593761 24.8941 0.837705 25 1.0933 25H20.2695C20.2702 25 20.2712 25 20.2719 25C20.775 25 21.1826 24.5982 21.1826 24.1027C21.1825 24.0528 21.1784 24.0036 21.1704 23.9559ZM7.65075 4.78227C7.65075 3.1349 9.01071 1.79465 10.6824 1.79465C12.3542 1.79465 13.7142 3.1349 13.7142 4.78227V6.19718H7.65075V4.78227ZM2.08948 23.2055L3.47591 7.99183H5.82937V9.59649C5.82937 10.0921 6.237 10.4938 6.74006 10.4938C7.24313 10.4938 7.65075 10.0921 7.65075 9.59649V7.99183H13.7142V9.59649C13.7142 10.0921 14.1219 10.4938 14.6249 10.4938C15.128 10.4938 15.5356 10.0921 15.5356 9.59649V7.99183H17.8869L19.2733 23.2055H2.08948Z"
                            fill="#fff" />
                    </svg>
                    <span
                        class="cart-counter badge bg-primary rounded-circle p-2 {{ count($carts) > 0 ? '' : 'd-none' }}">{{ count($carts) }}</span>
                </button>
                <div class="cart-box-wrapper">
                    <div class="apt_cart_box theme-scrollbar">
                        <ul class="at_scrollbar scrollbar cart-navbar-wrapper">
                            <!--cart listing-->
                            @include('frontend.default.pages.partials.carts.cart-navbar', [
                                'carts' => $carts,
                            ])
                            <!--cart listing-->

                        </ul>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <h6 class="mb-0">{{ localize('Subtotal') }}:</h6>
                            <span
                                class="fw-semibold text-secondary sub-total-price">{{ formatPrice(getSubTotal($carts, false)) }}</span>
                        </div>
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6">
                                <a href="{{ route('carts.index') }}"
                                    class="btn btn-secondary btn-md mt-4 w-100"><span
                                        class="me-2"><i
                                            class="fa-solid fa-shopping-bag"></i></span>{{ localize('View Cart') }}</a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('checkout.proceed') }}"
                                    class="btn btn-primary btn-md mt-4 w-100"><span class="me-2"><i
                                            class="fa-solid fa-credit-card"></i></span>{{ localize('Checkout') }}</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-user"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
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
                    </ul>

                </div><!-- End .user-dropdown -->


            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->