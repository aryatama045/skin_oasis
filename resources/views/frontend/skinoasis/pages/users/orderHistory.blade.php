@extends('frontend.skinoasis.layouts.master')

@section('title')
    {{ localize('Customer Dashboard') }} {{ getSetting('title_separator') }} {{ getSetting('system_title') }}
@endsection

@section('contents')

@include('frontend.skinoasis.pages.users.partials.cssUser')

<section class="my-account pb-120">

    @include('frontend.skinoasis.pages.users.partials.profileWidget')

    <div class="container mt-8">
        <div class="row">

            <div class="col-10 offset-1 bg-white p-4">
                <h3 class="border-down">My Orders</h3>

                <div class="recent-orders rounded shadow-box py-5">
                    <h6 class="mb-4 px-4">{{ localize('Your Orders') }}</h6>

                    <div class="container">

                        <article class="entry entry-list mb-2">
                            <div class="row border-down align-items-center">
                                <div class="col-md-6">
                                    AUSEGZZNL <span>29 Des 2023</span> <br>
                                    <span>1 item purchased</span>
                                </div>
                                <div class="col-md-4">
                                    Order Status <br>
                                    <span>Cancelled</span>
                                </div>
                                <div class="col-md-4">
                                    Total Price <br>
                                    <h3 class="text-dark">Rp. 528.750</h3>
                                </div>
                            </div>

                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <figure class="entry-media">
                                        <a href="single.html">
                                            <img src="assets/images/blog/listing/post-1.jpg" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->
                                </div><!-- End .col-md-4 -->

                                <div class="col-md-4">
                                    <div class="entry-body">
                                        <div class="entry-meta">
                                            <span class="entry-author">
                                                by <a href="#">John Doe</a>
                                            </span>
                                            <span class="meta-separator">|</span>
                                            <a href="#">Nov 22, 2018</a>
                                            <span class="meta-separator">|</span>
                                            <a href="#">2 Comments</a>
                                        </div><!-- End .entry-meta -->

                                        <h2 class="entry-title">
                                            <a href="single.html">Cras ornare tristique elit.</a>
                                        </h2><!-- End .entry-title -->

                                        <div class="entry-cats">
                                            in <a href="#">Lifestyle</a>,
                                            <a href="#">Shopping</a>
                                        </div><!-- End .entry-cats -->

                                        <div class="entry-content">
                                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas ... </p>
                                            <a href="single.html" class="read-more">Continue Reading</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-md-8 -->

                                <div class="col-md-4">
                                    <div class="entry-body">
                                        <h2 class="entry-title">
                                            <a href="single.html">Cras ornare tristique elit.</a>
                                        </h2><!-- End .entry-title -->

                                        <div class="entry-cats">
                                            in <a href="#">Lifestyle</a>,
                                            <a href="#">Shopping</a>
                                        </div><!-- End .entry-cats -->

                                        <div class="entry-content">
                                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas ... </p>
                                            <a href="single.html" class="read-more">Continue Reading</a>
                                        </div><!-- End .entry-content -->
                                    </div>
                                </div>

                            </div><!-- End .row -->
                        </article>
                    </div>

                    <div class="table-responsive">
                        <table class="order-history-table table">
                            <tbody>
                                <tr>
                                    <th>{{ localize('Order Code') }}</th>
                                    <th>{{ localize('Placed on') }}</th>
                                    <th>{{ localize('Items') }}</th>
                                    <th>{{ localize('Total') }}</th>
                                    <th>{{ localize('Status') }}</th>
                                    <th class="text-center">{{ localize('Action') }}</th>
                                </tr>

                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ getSetting('order_code_prefix') }}{{ $order->orderGroup->order_code }}
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->orderItems()->count() }}</td>
                                        <td class="text-secondary">
                                            {{ formatPrice($order->orderGroup->grand_total_amount) }}</td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ ucwords(str_replace('_', ' ', $order->delivery_status)) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('customers.trackOrder') }}?code={{ $order->orderGroup->order_code }}"
                                                class="view-invoice fs-xs me-2" target="_blank" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="{{ localize('Track My Order') }}"><i
                                                    class="fas fa-truck text-dark"></i></a>

                                            <a href="{{ route('checkout.invoice', $order->orderGroup->order_code) }}"
                                                class="view-invoice fs-xs" target="_blank" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="{{ localize('View Details') }}"><i
                                                    class="fas fa-eye"></i></a>


                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-1 px-md-3">
                        {{ $orders->appends(request()->input())->links() }}
                    </div>
                </div>

            </div>

        </div>
    </div>

</section>


@endsection
