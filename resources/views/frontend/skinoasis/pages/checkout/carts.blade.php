@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Carts') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('breadcrumb-contents')
    <ol class="breadcrumb">
        <li class="breadcrumb-item fw-bold" aria-current="page"><a
                        href="{{ route('home') }}">{{ localize('Home') }}</a></li>
        <li class="breadcrumb-item fw-bold active" aria-current="page">{{ localize('Carts') }}</li>
    </ol>
@endsection


@section('contents')

    <div class="page-header text-center" style="background-image: url('{{ staticAsset('frontend/default/assets/images/page-header-bg.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <!--breadcrumb-->
    @include('frontend.skinoasis.inc.breadcrumb')
    <!--breadcrumb-->


    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="rounded-2 overflow-hidden">
                            <table class="cart-table table table-cart table-mobile w-100 bg-white">
                                <thead>
                                    <th>{{ localize('Image') }}</th>
                                    <th>{{ localize('Product Name') }}</th>
                                    <th>{{ localize('U. Price') }}</th>
                                    <th>{{ localize('Quantity') }}</th>
                                    <th>{{ localize('T. Price') }}</th>
                                    <th>{{ localize('Action') }}</th>
                                </thead>
                                <tbody class="cart-listing">
                                    <!--cart listing-->
                                    @include('frontend.skinoasis.pages.partials.carts.cart-listing', ['carts' => $carts])
                                    <!--cart listing-->
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#" class="coupon-form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group">
                                        <input type="text" class="form-control theme-input w-100 coupon-input"
                                                name="code" placeholder="{{ localize('Enter Your Coupon Code') }}"
                                                @if (isset($_COOKIE['coupon_code'])) value="{{ $_COOKIE['coupon_code'] }}" disabled @endif
                                                required>
                                        @if (isset($_COOKIE['coupon_code']))
                                            <div class="input-group-append">
                                                <button type="submit"
                                                    class="btn btn-secondary btn-outline-primary-2 flex-shrink-0 apply-coupon-btn d-none px-4">{{ localize('Apply Coupon') }}</button>
                                                <button type="button" class="btn btn-secondary btn-outline-primary-2 flex-shrink-0 clear-coupon-btn"><i
                                                    class="fas fa-close"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        @else
                                            <div class="input-group-append">
                                                <button type="submit"
                                                    class="btn btn-secondary btn-outline-primary-2 flex-shrink-0 apply-coupon-btn px-4">{{ localize('Apply Coupon') }}</button>
                                                <button type="button" class="btn btn-secondary btn-outline-primary-2 flex-shrink-0 clear-coupon-btn d-none"><i
                                                        class="fas fa-close"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        @endif

                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->

                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>{{ localize('Subtotal') }}</td>
                                        <td><h5 class="mb-0 text-end sub-total-price">
                                            {{ formatPrice(getSubTotal($carts, false)) }}</h5></td>
                                    </tr><!-- End .summary-subtotal -->

                                    <tr class="coupon-discount-wrapper {{ getCoupon() == '' ? 'd-none' : '' }}">
                                        <td class="py-3">
                                            <h5 class="mb-0 fw-medium">{{ localize('Coupon Discount') }}</h5>
                                        </td>
                                        <td class="py-3">
                                            <h5 class="mb-0 text-end coupon-discount-price">
                                                {{ formatPrice(getCouponDiscount(getSubTotal($carts, false), getCoupon())) }}</h5>
                                        </td>
                                    </tr>

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>$160.00</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <p class="mb-5 mt-2">{{ localize('Shipping options will be updated during checkout.') }}</p>

                            <!-- Btn Checkout -->
                            <a href="{{ route('checkout.proceed') }}" type="submit"
                                class="btn btn-outline-primary-2 btn-order btn-block btn-md rounded-1">{{ localize('Checkout') }}</a>

                        </div><!-- End .summary -->

                        <!-- Btn Contunie -->
                        <a href="{{ route('home') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span> {{ localize('Continue Shopping') }}</span><i class="icon-refresh"></i></a>

                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->


@endsection

