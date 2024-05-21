

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Customer Dashboard')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>

<?php echo $__env->make('frontend.skinoasis.pages.users.partials.cssUser', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="my-account pb-120">

    <?php echo $__env->make('frontend.skinoasis.pages.users.partials.profileWidget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container mt-8">
        <div class="row">

            <div class="col-10 offset-1 bg-white p-4">
                <h3 class="border-down">My Orders</h3>

                <div class="recent-orders rounded shadow-box py-5">

                    <div class="container">

                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <article class="entry entry-list mb-5 border-down">
                            <div class="row border-down align-items-center">
                                <div class="col-md-6">
                                <?php echo e(getSetting('order_code_prefix')); ?><?php echo e($order->orderGroup->order_code); ?> <span><?php echo e(date('d M Y', strtotime($order->created_at))); ?></span> <br>
                                    <span><?php echo e($order->orderItems()->count()); ?> item purchased</span>
                                </div>
                                <div class="col-md-3">
                                    Order Status <br>
                                    <span><?php echo e(ucwords(str_replace('_', ' ', $order->delivery_status))); ?></span>
                                </div>
                                <div class="col-md-3">
                                    Total Price <br>
                                    <h3 class="text-dark"><?php echo e(formatPrice($order->orderGroup->grand_total_amount)); ?></h3>
                                </div>
                            </div>

                            <?php
                                $order_id = $order->id;
                                $detail_order = \App\Models\OrderItem::where('order_id', $order_id)->get();
                            ?>

                            <?php $__empty_2 = true; $__currentLoopData = $detail_order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>

                            <?php $product = $item->product_variation->product; ?>
                                <?php if($product): ?>
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <figure class="entry-media">
                                            <a href="single.html">
                                                <img src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>"
                                                alt="<?php echo e($product->collectLocalization('name')); ?>">
                                            </a>
                                        </figure>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="entry-body p-5">
                                            <h3 class="entry-title mt-2">
                                                <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->collectLocalization('name')); ?></a>
                                            </h3>

                                            <div class="entry-cats">
                                                <?php $__currentLoopData = generateVariationOptions($item->product_variation->combinations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="fs-xs">
                                                        <?php echo e($variation['name']); ?>:
                                                        <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($value['name']); ?>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!$loop->last): ?>
                                                            ,
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                            <h4 class="text-dark"><?php echo e(formatPrice($item->unit_price)); ?></h4>

                                            <h5 class="text-dark"><?php echo e($item->qty); ?></h5>

                                            <div class="entry-meta">
                                                <span class="entry-author">
                                                    by <a href="#">John Doe</a>
                                                </span>
                                                <span class="meta-separator">|</span>
                                                <a href="#">Nov 22, 2018</a>
                                            </div>

                                            <div class="entry-content">
                                                <p>Sed pretium</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <?php if($loop->last): ?>
                                        <div class="entry-body">
                                            <?php
                                                $shippingAddress = $order->orderGroup->shippingAddress;
                                                $billingAddress = $order->orderGroup->billingAddress;
                                            ?>

                                            <div class="entry-content">
                                                <h3>Payment Method</h3>
                                                <p class="mb-2"><?php echo e(ucwords(str_replace('_', ' ', $order->orderGroup->payment_method))); ?></p>
                                            </div>

                                            <div class="entry-content">
                                                <h3>Delivery Address</h3>
                                                <p class="mb-2"><?php echo e(optional($shippingAddress)->address); ?>,
                                                    <?php echo e(optional(optional($shippingAddress)->city)->name); ?>,
                                                    <?php echo e(optional(optional($shippingAddress)->state)->name); ?>,
                                                    <?php echo e(optional(optional($shippingAddress)->country)->name); ?></p>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="entry-body">
                                            <?php if($loop->last): ?>
                                            <div class="entry-content">
                                                <h3>Shipping Cost</h3>
                                                <p class="mb-2"><?php echo e(formatPrice($order->orderGroup->total_shipping_cost)); ?></p>
                                            </div>

                                            <?php if($order->orderGroup->total_coupon_discount_amount > 0): ?>
                                            <div class="entry-content">
                                                <h3><?php echo e(localize('Coupon Discount')); ?></h3>
                                                <p class="mb-2"><?php echo e(formatPrice($order->orderGroup->total_coupon_discount_amount)); ?></p>
                                            </div>
                                            <?php endif; ?>

                                            <div class="entry-content">
                                                <h3>Subtotal</h3>
                                                <p class="mb-2"><?php echo e(formatPrice($order->orderGroup->sub_total_amount)); ?></p>
                                            </div>

                                            <div class="entry-content">
                                                <h3>Total</h3>
                                                <p class="mb-2"><?php echo e(formatPrice($order->orderGroup->grand_total_amount)); ?></p>
                                            </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                    </div>

                    <div class="table-responsive">
                        <table class="order-history-table table">
                            <tbody>
                                <tr>
                                    <th><?php echo e(localize('Order Code')); ?></th>
                                    <th><?php echo e(localize('Placed on')); ?></th>
                                    <th><?php echo e(localize('Items')); ?></th>
                                    <th><?php echo e(localize('Total')); ?></th>
                                    <th><?php echo e(localize('Status')); ?></th>
                                    <th class="text-center"><?php echo e(localize('Action')); ?></th>
                                </tr>

                                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(getSetting('order_code_prefix')); ?><?php echo e($order->orderGroup->order_code); ?>

                                        </td>
                                        <td><?php echo e(date('d M, Y', strtotime($order->created_at))); ?></td>
                                        <td><?php echo e($order->orderItems()->count()); ?></td>
                                        <td class="text-secondary">
                                            <?php echo e(formatPrice($order->orderGroup->grand_total_amount)); ?></td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                <?php echo e(ucwords(str_replace('_', ' ', $order->delivery_status))); ?>

                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('customers.trackOrder')); ?>?code=<?php echo e($order->orderGroup->order_code); ?>"
                                                class="view-invoice fs-xs me-2" target="_blank" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="<?php echo e(localize('Track My Order')); ?>"><i
                                                    class="fas fa-truck text-dark"></i></a>

                                            <a href="<?php echo e(route('checkout.invoice', $order->orderGroup->order_code)); ?>"
                                                class="view-invoice fs-xs" target="_blank" data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                data-bs-title="<?php echo e(localize('View Details')); ?>"><i
                                                    class="fas fa-eye"></i></a>


                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-1 px-md-3">
                        <?php echo e($orders->appends(request()->input())->links()); ?>

                    </div>
                </div>

            </div>

        </div>
    </div>

</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.skinoasis.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/users/orderHistory.blade.php ENDPATH**/ ?>