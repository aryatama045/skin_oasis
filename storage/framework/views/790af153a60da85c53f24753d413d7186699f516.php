<!-- Header -->
<header class="header
        
    <?php $url1 = Request::segment(1); ?>

    <?php if($url1 != true){ ?>
        <?php if(Route::current()->getName() == 'home' || Route::current()->getName() == 'home.pages.aboutUs'): ?>
            header-11
        <?php endif; ?>
    <?php } else{ ?>
        <?php if(!empty(Route::current()->getName() == 'halloBeauty.index' || Route::current()->getName() == 'halloBeauty.listdokter' || Route::current()->getName() == 'halloBeauty.listpaket' )): ?>
            <?php if(Route::current()->getName() == 'halloBeauty.index' || Route::current()->getName() == 'halloBeauty.listdokter' || Route::current()->getName() == 'halloBeauty.listpaket' ): ?>
                header-hallo-beauty
            <?php endif; ?>
        <?php endif; ?>
    <?php } ?>
    ">
    <div class="header-middle ">
        <div class="container">
            <div class="header-center">
                <a href="<?php echo e(route('home')); ?>" class="logo">
                    <?php if(!empty(Route::current()->getName())): ?>
                        <?php if(Route::current()->getName() == 'home'): ?>
                            <img src="<?php echo e(staticAsset('frontend/skinoasis/assets/images/logo.png')); ?>" alt="SKINOASIS Logo" width="250" height="25">
                        <?php else: ?>
                            <img src="<?php echo e(staticAsset('frontend/skinoasis/assets/images/logo-black.png')); ?>" alt="SKINOASIS Logo" width="250" height="25">
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            </div><!-- End .header-center -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-middle sticky-header ff">
        <div class="container">
            <div class="header-left">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">

                        <?php if(!is_null(getSetting('header_menu_labels'))): ?>
                            <?php
                                $labels = json_decode(getSetting('header_menu_labels')) ?? [];
                                $menus = json_decode(getSetting('header_menu_links')) ?? [];
                            ?>

                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuKey => $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if($menuItem==Request::url()){ 'active'; } ?>" >
                                    <a href="<?php echo e($menuItem); ?>"><?php echo e(localize($labels[$menuKey])); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                            <li><a href="<?php echo e(route('products.index')); ?>"><?php echo e(localize('Products')); ?></a></li>
                            <li><a href="<?php echo e(route('home.campaigns')); ?>"><?php echo e(localize('Campaigns')); ?></a>
                            </li>
                            <li><a href="<?php echo e(route('home.coupons')); ?>"><?php echo e(localize('Coupons')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->

                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
            </div><!-- End .header-left -->

            <div class="header-right">

                <div class="cart-dropdown gshop-header-cart position-relative">
                    <?php
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
                    ?>


                    <button type="button" class="dropdown-toggle">
                        <i class="icon-shopping-cart"></i>
                        <span
                            class="cart-count cart-counter <?php echo e(count($carts) > 0 ? '' : 'd-none'); ?>"><?php echo e(count($carts)); ?></span>
                    </button>
                    <div class="cart-box-wrapper">
                        <div class="apt_cart_box theme-scrollbar">
                            <ul class="at_scrollbar scrollbar cart-navbar-wrapper">
                                <!--cart listing-->
                                <?php echo $__env->make('frontend.skinoasis.pages.partials.carts.cart-navbar', [
                                    'carts' => $carts,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <!--cart listing-->

                            </ul>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h6 class="mb-0"><?php echo e(localize('Subtotal')); ?>:</h6>
                                <span
                                    class="fw-semibold text-secondary sub-total-price"><?php echo e(formatPrice(getSubTotal($carts, false))); ?></span>
                            </div>
                            <div class="row align-items-center justify-content-between">
                                <div class="col-6">
                                    <a href="<?php echo e(route('carts.index')); ?>"
                                        class="btn btn-rounded btn-sm btn-outline-green-dark btn-md mt-4 w-100"><span
                                            class="me-2"><i
                                                class="fa-solid fa-eye"></i></span>View Cart</a>
                                </div>
                                <div class="col-6">
                                    <a href="<?php echo e(route('checkout.proceed')); ?>"
                                        class="btn btn-rounded btn-sm btn-primary btn-md mt-4 w-100"><span class="me-2"><i
                                                class="fa-solid fa-credit-card"></i></span>Checkout</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-user"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right sf-arrows">
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->user_type == 'customer'): ?>

                            <li class="mt-2 mb-2 <?php echo e(areActiveRoutes(['customers.dashboard'], 'active')); ?>"><a href="<?php echo e(route('customers.dashboard')); ?>" class=" fw-bolder text-dark" >
                                <span class="me-1"><i class="fa-solid fa-home"></i></span>
                                <?php echo e(localize('Dashboard')); ?></a>
                            </li>

                            <li class="mt-2 mb-2"><a href="#" class=" fw-bolder text-dark" >
                                <span class="me-1"><i class="fa-solid fa-user"></i></span>
                                <?php echo e(localize('Profile')); ?></a>
                                <ul class="pl-4">
                                    <li><a class="<?php echo e(areActiveRoutes(['customers.profile'], 'active')); ?>" href="<?php echo e(route('customers.profile')); ?>">Profile Detail</a></li>
                                </ul>
                            </li>

                            <li class="mt-2 mb-2"><a class=" fw-bolder text-dark" href="#">
                                <span class="me-1"><i class="fa-solid fa-shopping-cart"></i></span>
                                <?php echo e(localize('My Shopping')); ?></a>
                                <ul class="pl-4">
                                    <li><a class="<?php echo e(areActiveRoutes(['customers.orderHistory'], 'active')); ?>" href="<?php echo e(route('customers.orderHistory')); ?>">
                                        <?php echo e(localize('My Orders')); ?></a></li>
                                    <li><a class=" " href="<?php echo e(route('customers.address')); ?>">
                                        <?php echo e(localize('Shipping Address')); ?></a></li>
                                    <li><a class=" " href="<?php echo e(route('customers.wishlist')); ?>">
                                        <?php echo e(localize('Saved Product')); ?></a>
                                    </li>
                                </ul>
                            </li>

                            <li class="mt-2 mb-2"><a class=" fw-bolder text-dark" href="#">
                                <span class="me-1"><i class="fa-solid fa-journal-whills"></i></span>
                                <?php echo e(localize('My Journal')); ?></a>
                                <ul class="pl-4">
                                    <li><a class="<?php echo e(areActiveRoutes(['customers.article'], 'active')); ?>" href="<?php echo e(route('customers.article')); ?>">
                                        <?php echo e(localize('Article')); ?></a></li>
                                    <li><a class="<?php echo e(areActiveRoutes(['customers.photo'], 'active')); ?>" href="<?php echo e(route('customers.photo')); ?>">
                                        <?php echo e(localize('Photo')); ?></a></li>
                                    <li><a class=" <?php echo e(areActiveRoutes(['customers.video'], 'active')); ?>" href="<?php echo e(route('customers.video')); ?>">
                                        <?php echo e(localize('Video')); ?></a></li>
                                    <li><a class=" <?php echo e(areActiveRoutes(['customers.review'], 'active')); ?>" href="<?php echo e(route('customers.review')); ?>">
                                        <?php echo e(localize('Review')); ?></a></li>
                                </ul>
                            </li class="mt-2 mb-2">

                            <li class="mt-2 mb-2"><a href="#" class=" fw-bolder text-dark" >
                                <span class="me-1"><i class="fa-solid fa-tag"></i></span>
                                <?php echo e(localize('Event')); ?></a>
                                <ul class="pl-4">
                                    <li><a class=" <?php echo e(areActiveRoutes(['customers.event'], 'active')); ?>" href="<?php echo e(route('customers.event')); ?>">Event List</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="mt-2 mb-2"><a class="text-dark" href="<?php echo e(route('admin.dashboard')); ?>">
                                <span class="me-1"><i class="fa-solid fa-bars"></i></span>
                                <?php echo e(localize('Dashboard')); ?></a>
                            </li>
                        <?php endif; ?>

                        <li class="mt-2 mb-2"><a class="text-dark" href="<?php echo e(route('logout')); ?>">
                            <span class="me-1"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                            <?php echo e(localize('Sign Out')); ?>

                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(auth()->guard()->guest()): ?>
                            <li class="mt-2 mb-2"><a class="text-dark" href="<?php echo e(route('login')); ?>"><span class="me-2"><i
                                        class="fa-solid fa-arrow-right-from-bracket"></i></span><?php echo e(localize('Sign In')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div><!-- End .user-dropdown -->

            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header --><?php /**PATH D:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/inc/header.blade.php ENDPATH**/ ?>