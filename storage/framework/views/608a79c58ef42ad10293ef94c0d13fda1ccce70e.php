

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Order Details')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Order Details')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <div class="card mb-4" id="section-1">
                        <div class="card-header border-bottom-0">

                            <!--order status-->
                            <div class="row justify-content-between align-items-center g-3">
                                <div class="col-auto flex-grow-1">
                                    <h5 class="mb-0"><?php echo e(localize('Invoice')); ?>

                                        <span
                                            class="text-accent"><?php echo e(getSetting('order_code_prefix')); ?><?php echo e($order->orderGroup->order_code); ?>

                                        </span>
                                    </h5>
                                    <span class="text-muted"><?php echo e(localize('Order Date')); ?>:
                                        <?php echo e(date('d M, Y', strtotime($order->created_at))); ?>

                                    </span>

                                    <?php if($order->location_id != null): ?>
                                        <div>
                                            <span class="text-muted">
                                                <i class="las la-map-marker"></i> <?php echo e(optional($order->location)->name); ?>

                                            </span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <?php if(auth()->user()->user_type == "mitra"): ?>
                                    
                                <?php else: ?>
                                    <div class="col-auto col-lg-3">
                                        <div class="input-group">
                                            <select class="form-select select2" name="payment_status"
                                                data-minimum-results-for-search="Infinity" id="update_payment_status">
                                                <option value="" disabled>
                                                    <?php echo e(localize('Payment Status')); ?>

                                                </option>
                                                <option value="paid" <?php if($order->payment_status == 'paid'): ?> selected <?php endif; ?>>
                                                    <?php echo e(localize('Paid')); ?></option>
                                                <option value="unpaid" <?php if($order->payment_status == 'unpaid'): ?> selected <?php endif; ?>>
                                                    <?php echo e(localize('Unpaid')); ?>

                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="col-auto col-lg-3">
                                    <div class="input-group">
                                        <select class="form-select select2" name="delivery_status"
                                            data-minimum-results-for-search="Infinity" id="update_delivery_status">
                                            <option value="" disabled><?php echo e(localize('Delivery Status')); ?></option>
                                            <option value="order_placed" <?php if($order->delivery_status == orderPlacedStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Order Placed')); ?></option>
                                            <option value="pending" <?php if($order->delivery_status == orderPendingStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Pending')); ?>

                                            <option value="processing" <?php if($order->delivery_status == orderProcessingStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Processing')); ?>

                                            <option value="delivered" <?php if($order->delivery_status == orderDeliveredStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Delivered')); ?>

                                            <option value="cancelled" <?php if($order->delivery_status == orderCancelledStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Cancelled')); ?>

                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <?php if(auth()->user()->user_type == "mitra"): ?>
                                    
                                <?php else: ?>
                                    <div class="cl-auto col-lg-4">
                                        Transfer Pesanan ke Mitra : 
                                        <div class="input-group">
                                            <select class="form-select select2" name="transfer_ke_mitra"
                                                data-minimum-results-for-search="Infinity" id="transfer_ke_mitra">
                                                <option value="0">-- Pilih Mitra --</option>
                                                <?php $__currentLoopData = $mitra; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key->id); ?>"><?php echo e($key->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="col-auto">
                                    <a href="<?php echo e(route('admin.orders.downloadInvoice', $order->id)); ?>"
                                        class="btn btn-primary">
                                        <i data-feather="download" width="18"></i>
                                        <?php echo e(localize('Download Invoice')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>

                        <!--customer info-->
                        <div class="card-body">
                            <div class="row justify-content-between g-3">
                                <div class="col-xl-7 col-lg-6">
                                    <div class="welcome-message">
                                        <h6 class="mb-2"><?php echo e(localize('Customer Info')); ?></h6>
                                        <p class="mb-0"><?php echo e(localize('Name')); ?>: <?php echo e(optional($order->user)->name); ?></p>
                                        <p class="mb-0"><?php echo e(localize('Email')); ?>: <?php echo e(optional($order->user)->email); ?></p>
                                        <p class="mb-0"><?php echo e(localize('Phone')); ?>: <?php echo e(optional($order->user)->phone); ?></p>

                                        <?php
                                            $deliveryInfo = json_decode($order->scheduled_delivery_info);
                                        ?>

                                        <p class="mb-0"><?php echo e(localize('Delivery Type')); ?>:
                                            <span
                                                class="badge bg-primary"><?php echo e(Str::title(Str::replace('_', ' ', $order->shipping_delivery_type))); ?></span>


                                        </p>
                                        <?php if($order->shipping_delivery_type == getScheduledDeliveryType()): ?>
                                            <p class="mb-0">
                                                <?php echo e(localize('Delivery Time')); ?>:
                                                <?php echo e(date('d F', $deliveryInfo->scheduled_date)); ?>,
                                                <?php echo e($deliveryInfo->timeline); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="shipping-address d-flex justify-content-md-end">
                                        <div class="border-end pe-2">
                                            <h6 class="mb-2"><?php echo e(localize('Shipping Address')); ?></h6>
                                            <?php
                                                $shippingAddress = $order->orderGroup->shippingAddress;
                                            ?>
                                            <p class="mb-0">
                                                <?php if($order->orderGroup->is_pos_order): ?>
                                                    <?php echo e($order->orderGroup->pos_order_address); ?>

                                                <?php else: ?>
                                                    <?php echo e(optional($shippingAddress)->address); ?>,
                                                    <?php echo e(optional(optional($shippingAddress)->city)->name); ?>,
                                                    <?php echo e(optional(optional($shippingAddress)->state)->name); ?>,
                                                    <?php echo e(optional(optional($shippingAddress)->country)->name); ?>

                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <?php if(!$order->orderGroup->is_pos_order): ?>
                                            <div class="ms-4">
                                                <h6 class="mb-2"><?php echo e(localize('Billing Address')); ?></h6>
                                                <?php
                                                    $billingAddress = $order->orderGroup->billingAddress;
                                                ?>
                                                <p class="mb-0">

                                                    <?php echo e(optional($billingAddress)->address); ?>,
                                                    <?php echo e(optional(optional($billingAddress)->city)->name); ?>,
                                                    <?php echo e(optional(optional($billingAddress)->state)->name); ?>,
                                                    <?php echo e(optional(optional($billingAddress)->country)->name); ?>

                                                </p>
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--order details-->
                        <table class="table tt-footable border-top" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center" width="7%"><?php echo e(localize('S/L')); ?></th>
                                    <th><?php echo e(localize('Products')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Unit Price')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('QTY')); ?></th>
                                    <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Total Price')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $product = $item->product_variation->product;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($key + 1); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm"> <img
                                                        src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>"
                                                        alt="<?php echo e($product->collectLocalization('name')); ?>"
                                                        class="rounded-circle">
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="fs-sm mb-0">
                                                        <?php echo e($product->collectLocalization('name')); ?>

                                                    </h6>
                                                    <div class="text-muted">
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
                                                </div>
                                            </div>
                                        </td>

                                        <td class="tt-tb-price">
                                            <span class="fw-bold"><?php echo e(formatPrice($item->unit_price)); ?>

                                            </span>
                                        </td>
                                        <td class="fw-bold"><?php echo e($item->qty); ?></td>

                                        <td class="tt-tb-price text-end">
                                            <?php if($item->refundRequest && $item->refundRequest->refund_status == 'refunded'): ?>
                                                <span
                                                    class="badge bg-soft-info rounded-pill text-capitalize"><?php echo e($item->refundRequest->refund_status); ?></span>
                                            <?php endif; ?>
                                            <span class="text-accent fw-bold"><?php echo e(formatPrice($item->total_price)); ?>

                                            </span>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!--grand total-->
                        <div class="card-body">
                            <div class="card-footer border-top-0 px-4 py-3 rounded">
                                <div class="row g-4">
                                    <div class="col-auto">
                                        <h6 class="mb-1"><?php echo e(localize('Payment Method')); ?></h6>
                                        <span><?php echo e(ucwords(str_replace('_', ' ', $order->orderGroup->payment_method))); ?></span>
                                    </div>

                                    <div class="col-auto flex-grow-1">
                                        <h6 class="mb-1"><?php echo e(localize('Logistic')); ?></h6>
                                        <span><?php echo e($order->logistic_name); ?></span>
                                    </div>

                                    <div class="col-auto">
                                        <h6 class="mb-1"><?php echo e(localize('Sub Total')); ?></h6>
                                        <strong><?php echo e(formatPrice($order->orderGroup->sub_total_amount)); ?></strong>
                                    </div>

                                    <div class="col-auto">
                                        <h6 class="mb-1"><?php echo e(localize('Tips')); ?></h6>
                                        <strong><?php echo e(formatPrice($order->orderGroup->total_tips_amount)); ?></strong>
                                    </div>

                                    <div class="col-auto ps-lg-5">
                                        <h6 class="mb-1"><?php echo e(localize('Shipping Cost')); ?></h6>
                                        <strong><?php echo e(formatPrice($order->orderGroup->total_shipping_cost)); ?></strong>
                                    </div>

                                    <?php if($order->orderGroup->total_coupon_discount_amount > 0): ?>
                                        <div class="col-auto ps-lg-5">
                                            <h6 class="mb-1"><?php echo e(localize('Coupon Discount')); ?></h6>
                                            <strong><?php echo e(formatPrice($order->orderGroup->total_coupon_discount_amount)); ?></strong>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-auto text-lg-end ps-lg-5">
                                        <h6 class="mb-1"><?php echo e(localize('Grand Total')); ?></h6>
                                        <strong
                                            class="text-accent"><?php echo e(formatPrice($order->orderGroup->grand_total_amount)); ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="tt-sticky-sidebar">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Order Logs')); ?></h5>
                                <div class="tt-vertical-step">
                                    <ul class="list-unstyled">

                                        <?php $__empty_1 = true; $__currentLoopData = $order->orderUpdates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderUpdate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li>
                                                <a class="<?php echo e($loop->first ? 'active' : ''); ?>">
                                                    <?php echo e($orderUpdate->note); ?> <br> By
                                                    <span
                                                        class="text-capitalize"><?php echo e(optional($orderUpdate->user)->name); ?></span>
                                                    at
                                                    <?php echo e(date('d M, Y', strtotime($orderUpdate->created_at))); ?>.</a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li>
                                                <a class="active"><?php echo e(localize('No logs found')); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        "use strict";

        // payment status
        $('#update_payment_status').on('change', function() {
            var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_payment_status').val();
            $.post('<?php echo e(route('admin.orders.update_payment_status')); ?>', {
                _token: '<?php echo e(@csrf_token()); ?>',
                order_id: order_id,
                status: status
            }, function(data) {
                notifyMe('success', '<?php echo e(localize('Payment status has been updated')); ?>');
                window.location.reload();
            });
        });

        // delivery status 
        $('#update_delivery_status').on('change', function() {
            var order_id = <?php echo e($order->id); ?>;
            var status = $('#update_delivery_status').val();
            $.post('<?php echo e(route('admin.orders.update_delivery_status')); ?>', {
                _token: '<?php echo e(@csrf_token()); ?>',
                order_id: order_id,
                status: status
            }, function(data) {
                notifyMe('success', '<?php echo e(localize('Delivery status has been updated')); ?>');
                window.location.reload();
            });
        });

        // transfer ke mitra 
        $('#transfer_ke_mitra').on('change', function() {
            var order_id = <?php echo e($order->id); ?>;
            var transfer_id = $('#transfer_ke_mitra').val();
            var text = $("#transfer_ke_mitra option:selected").text();
            $.post('<?php echo e(route('admin.orders.transfer_ke_mitra')); ?>', {
                _token: '<?php echo e(@csrf_token()); ?>',
                order_id: order_id,
                transfer_id: transfer_id,
                nama_mitra: text
            }, function(data) {
                notifyMe('success', '<?php echo e(localize('Delivery status has been updated')); ?>');
                window.location.reload();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/pages/orders/show.blade.php ENDPATH**/ ?>