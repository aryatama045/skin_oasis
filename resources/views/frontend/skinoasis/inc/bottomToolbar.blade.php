<div class="footer-fix-nav shadow">
    <div class="row mx-0">

        <div class="col">
            <a href="https://klbtheme.com/cosmetsy/" title="Cosmetsy – Beauty and Cosmetics Shop">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </a>
        </div>

        <div class="col">
            <a href="https://klbtheme.com/cosmetsy/shop/"><i class="klb-grid"></i></a>
        </div>

        <div class="col">
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
            <a href="{{ route('carts.index') }}">
                <i class="klb-shop-bag"></i>
                <span class="count">{{ count($carts) }}</span>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('customers.dashboard') }}">
                <i class="klb-user-profile"></i>
            </a>
        </div>
    </div>
</div>