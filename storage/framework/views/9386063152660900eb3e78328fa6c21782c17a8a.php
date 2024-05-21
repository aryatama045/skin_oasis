

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Invoice')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contents'); ?>

    <!--invoice section start-->
    <?php if(!is_null($orderGroup)): ?>
        <?php
            $order = $orderGroup->order;
            $orderItems = $order->orderItems;
        ?>
        <section class="invoice-section pt-6 pb-120">
            <div class="container">
                <div class="invoice-box bg-white rounded p-4 p-sm-6">
                    <div class="row g-5 justify-content-between">
                        <div class="col-lg-6">
                            <div class="invoice-title d-flex align-items-center">
                                <h3><?php echo e(localize('Invoice')); ?></h3>
                                <span class="badge rounded-pill bg-primary-light text-primary fw-medium ms-3">
                                    <?php echo e(ucwords(str_replace('_', ' ', $order->delivery_status))); ?>

                                </span>
                            </div>
                            <table class="invoice-table-sm">
                                <tr>
                                    <td><strong><?php echo e(localize('Order Code')); ?></strong></td>
                                    <td><?php echo e(getSetting('order_code_prefix')); ?><?php echo e($orderGroup->order_code); ?></td>
                                </tr>

                                <tr>
                                    <td><strong><?php echo e(localize('Date')); ?></strong></td>
                                    <td><?php echo e(date('d M, Y', strtotime($orderGroup->created_at))); ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="badge bg-primary" target="_blank" style="padding: 10px" href="https://api.whatsapp.com/send/?phone=6285218265680&text=Halo+saya+ingin+konfirmasi+pembayaran+dengan+nomor+SKINOASIS-<?php echo e($orderGroup->order_code); ?>&type=phone_number">Saya Sudah Bayar</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-5 col-md-8">
                            <div class="text-lg-end">
                                <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(uploadedAsset(getSetting('navbar_logo'))); ?>"
                                        alt="logo" class="img-fluid"></a>
                                <h6 class="mb-0 text-gray mt-4"><?php echo e(getSetting('site_address')); ?></h6>
                            </div>
                        </div>
                    </div>
                    <span class="my-6 w-100 d-block border-top"></span>
                    <div class="row justify-content-between g-5">
                        <div class="col-xl-7 col-lg-6">
                            <div class="welcome-message">
                                <h4 class="mb-2"><?php echo e(auth()->user()->name); ?></h4>
                                <p class="mb-0">
                                    <?php echo e(localize('Here are your order details. We thank you for your purchase.')); ?></p>

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
                            <?php if(!$order->orderGroup->is_pos_order): ?>
                                <div class="shipping-address d-flex justify-content-md-end">
                                    <div class="border-end pe-2">
                                        <h6 class="mb-2"><?php echo e(localize('Shipping Address')); ?></h6>
                                        <?php
                                            $shippingAddress = $orderGroup->shippingAddress;
                                        ?>
                                        <p class="mb-0"><?php echo e(optional($shippingAddress)->address); ?>,
                                            <?php echo e(optional(optional($shippingAddress)->city)->name); ?>,
                                            <?php echo e(optional(optional($shippingAddress)->state)->name); ?>,
                                            <?php echo e(optional(optional($shippingAddress)->country)->name); ?></p>
                                    </div>
                                    <div class="ms-4">
                                        <h6 class="mb-2"><?php echo e(localize('Billing Address')); ?></h6>
                                        <?php
                                            $billingAddress = $orderGroup->billingAddress;
                                        ?>
                                        <p class="mb-0"><?php echo e(optional($billingAddress)->address); ?>,
                                            <?php echo e(optional(optional($billingAddress)->city)->name); ?>,
                                            <?php echo e(optional(optional($billingAddress)->state)->name); ?>,
                                            <?php echo e(optional(optional($billingAddress)->country)->name); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-6">
                        <table class="table invoice-table">
                            <tr>
                                <th><?php echo e(localize('S/L')); ?></th>
                                <th><?php echo e(localize('Products')); ?></th>
                                <th><?php echo e(localize('U.Price')); ?></th>
                                <th><?php echo e(localize('QTY')); ?></th>
                                <th><?php echo e(localize('T.Price')); ?></th>
                                <?php if(getSetting('enable_refund_system') == 1): ?>
                                    <th><?php echo e(localize('Refund')); ?></th>
                                <?php endif; ?>
                            </tr>
                            <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product = $item->product_variation->product;
                                ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td class="text-nowrap">
                                        <div class="d-flex">
                                            <img src="<?php echo e(uploadedAsset($product->thumbnail_image)); ?>"
                                                alt="<?php echo e($product->collectLocalization('name')); ?>"
                                                class="img-fluid product-item d-none">
                                            
                                            <div class="">
                                                <span><?php echo e($product->collectLocalization('name')); ?></span>
                                                <div>
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
                                    <td><?php echo e(formatPrice($item->unit_price)); ?></td>
                                    <td><?php echo e($item->qty); ?></td>
                                    <td><?php echo e(formatPrice($item->total_price)); ?></td>

                                    <?php if(getSetting('enable_refund_system') == 1): ?>
                                        <td>
                                            <?php if($item->refundRequest): ?>
                                                <?php if($item->refundRequest->refund_status == 'pending'): ?>
                                                    <span class="badge bg-info text-capitalize">
                                                        <?php echo e($item->refundRequest->refund_status); ?>

                                                    </span>
                                                <?php elseif($item->refundRequest->refund_status == 'refunded'): ?>
                                                    <span class="badge bg-primary text-capitalize">
                                                        <?php echo e($item->refundRequest->refund_status); ?>

                                                    </span>
                                                <?php else: ?>
                                                    <span class="btn badge bg-danger text-capitalize cursor-pointer"
                                                        onclick="showRejectionReason('<?php echo e($item->refundRequest->refund_reject_reason); ?>')">
                                                        <?php echo e($item->refundRequest->refund_status); ?>

                                                    </span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php
                                                    $withinDays = (int) getSetting('refund_within_days');
                                                    
                                                    $checkDate = \Carbon\Carbon::parse($item->created_at)->addDays($withinDays);
                                                    $today = today();
                                                    
                                                    $count = $checkDate->diffInDays($today);
                                                ?>
                                                <?php if($count > 0): ?>
                                                    <a href="javascript:void(0);"
                                                        onclick="requestRefund(<?php echo e($item->id); ?>)"
                                                        class="fw-semibold badge bg-secondary"><i
                                                            class="fas fa-rotate-left me-1"></i>
                                                        <?php echo e(localize('Request Refund')); ?></a>
                                                <?php else: ?>
                                                    <?php echo e(localize('Time Over')); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </table>
                    </div>
                    <div class="mt-4 table-responsive">
                        <table class="table footer-table">
                            <tr>
                                <td>
                                    <strong class="text-dark d-block text-nowrap"><?php echo e(localize('Payment Method')); ?></strong>
                                    <span> <?php echo e(ucwords(str_replace('_', ' ', $orderGroup->payment_method))); ?></span>
                                </td>

                                <td>
                                    <strong class="text-dark d-block text-nowrap"><?php echo e(localize('Sub Total')); ?></strong>
                                    <span><?php echo e(formatPrice($orderGroup->sub_total_amount)); ?></span>
                                </td>

                                <td>
                                    <strong class="text-dark d-block text-nowrap"><?php echo e(localize('Tips')); ?></strong>
                                    <span><?php echo e(formatPrice($orderGroup->total_tips_amount)); ?></span>
                                </td>

                                <td>
                                    <strong class="text-dark d-block text-nowrap"><?php echo e(localize('Shipping Cost')); ?></strong>
                                    <span><?php echo e(formatPrice($orderGroup->total_shipping_cost)); ?></span>
                                </td>
                                <?php if($orderGroup->total_coupon_discount_amount > 0): ?>
                                    <td>
                                        <strong
                                            class="text-dark d-block text-nowrap"><?php echo e(localize('Coupon Discount')); ?></strong>
                                        <span><?php echo e(formatPrice($orderGroup->total_coupon_discount_amount)); ?></span>
                                    </td>
                                <?php endif; ?>

                                <td>
                                    <strong class="text-dark d-block text-nowrap"><?php echo e(localize('Total Price')); ?></strong>
                                    <span
                                        class="text-primary fw-bold"><?php echo e(formatPrice($orderGroup->grand_total_amount)); ?></span>
                                </td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
    <!--invoice section end-->

    <!--refund modal-->
    <div class="modal fade refundModal" id="refundModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="gstore-product-quick-view bg-white rounded-3 pt-3 pb-6 px-4">
                        <h2 class="modal-title fs-5 mb-3"><?php echo e(localize('Request Refund')); ?></h2>
                        <form action="<?php echo e(route('customers.requestRefund')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="order_item_id" value="" class="order_item_id">
                            <div class="row g-4">
                                <div class="col-sm-12">
                                    <div class="label-input-field">
                                        <label><?php echo e(localize('Refund Reason')); ?></label>
                                        <textarea rows="4" placeholder="<?php echo e(localize('Type refund reason')); ?>" name="refund_reason" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 d-flex">
                                <button type="submit"
                                    class="btn btn-secondary btn-md me-3"><?php echo e(localize('Submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--rejection modal-->
    <?php echo $__env->make('frontend.skinoasis.pages.checkout.inc.rejectionModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // request refund
        function requestRefund(order_item_id) {
            $('#refundModal').modal('show');
            $('.order_item_id').val(order_item_id);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.skinoasis.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/checkout/invoice.blade.php ENDPATH**/ ?>