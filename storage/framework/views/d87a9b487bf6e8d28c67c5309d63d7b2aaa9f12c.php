

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Orders')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Orders')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12">
                    <div class="card mb-4" id="section-1">
                        <form class="app-search" action="<?php echo e(Request::fullUrl()); ?>" method="GET">
                            <div class="card-header border-bottom-0">
                                <div class="row justify-content-between g-3">
                                    <div class="col-auto flex-grow-1 d-none">
                                        <div class="tt-search-box">
                                            <div class="input-group">
                                                <span class="position-absolute top-50 start-0 translate-middle-y ms-2"> <i
                                                        data-feather="search"></i></span>
                                                <input class="form-control rounded-start w-100" type="text"
                                                    id="search" name="search"
                                                    placeholder="<?php echo e(localize('Search by name/phone')); ?>"
                                                    <?php if(isset($searchKey)): ?>
                                                value="<?php echo e($searchKey); ?>"
                                                <?php endif; ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto flex-grow-1">
                                        <div class="input-group mb-3">
                                            <?php if(getSetting('order_code_prefix') != null): ?>
                                                <div class="input-group-prepend">
                                                    <span
                                                        class="input-group-text rounded-end-0"><?php echo e(getSetting('order_code_prefix')); ?></span>
                                                </div>
                                            <?php endif; ?>
                                            <input type="text" class="form-control" placeholder="<?php echo e(localize('code')); ?>"
                                                name="code"
                                                <?php if(isset($searchCode)): ?>
                                                value="<?php echo e($searchCode); ?>"
                                                <?php endif; ?>>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select select2" name="payment_status"
                                            data-minimum-results-for-search="Infinity" id="payment_status">
                                            <option value=""><?php echo e(localize('Payment Status')); ?></option>
                                            <option value="<?php echo e(paidPaymentStatus()); ?>"
                                                <?php if(isset($paymentStatus) && $paymentStatus == paidPaymentStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Paid')); ?></option>
                                            <option value="<?php echo e(unpaidPaymentStatus()); ?>"
                                                <?php if(isset($paymentStatus) && $paymentStatus == unpaidPaymentStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Unpaid')); ?></option>
                                        </select>
                                    </div>

                                    <div class="col-auto">
                                        <select class="form-select select2" name="delivery_status"
                                            data-minimum-results-for-search="Infinity" id="update_delivery_status">
                                            <option value=""><?php echo e(localize('Delivery Status')); ?></option>
                                            <option value="order_placed" <?php if(isset($deliveryStatus) && $deliveryStatus == orderPlacedStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Order Placed')); ?></option>
                                            <option value="pending" <?php if(isset($deliveryStatus) && $deliveryStatus == orderPendingStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Pending')); ?>

                                            <option value="processing" <?php if(isset($deliveryStatus) && $deliveryStatus == orderProcessingStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Processing')); ?>

                                            <option value="delivered" <?php if(isset($deliveryStatus) && $deliveryStatus == orderDeliveredStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Delivered')); ?>

                                            <option value="cancelled" <?php if(isset($deliveryStatus) && $deliveryStatus == orderCancelledStatus()): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Cancelled')); ?>

                                            </option>
                                        </select>
                                    </div>

                                    <?php if(count($locations) > 0): ?>
                                        <div class="col-auto">
                                            <select class="form-select select2" name="location_id"
                                                data-minimum-results-for-search="Infinity" id="location_id">
                                                <option value=""><?php echo e(localize('Location')); ?></option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($location->id); ?>"
                                                        <?php if(isset($locationId) && $locationId == $location->id): ?> selected <?php endif; ?>>
                                                        <?php echo e($location->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-auto">
                                        <select class="form-select select2" name="is_pos_order"
                                            data-minimum-results-for-search="Infinity" id="is_pos_order">
                                            <option value="0" <?php if(isset($posOrder) && $posOrder == 0): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('Online Orders')); ?>

                                            </option>
                                            <option value="1" <?php if(isset($posOrder) && $posOrder == 1): ?> selected <?php endif; ?>>
                                                <?php echo e(localize('POS Orders')); ?>

                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">
                                            <i data-feather="search" width="18"></i>
                                            <?php echo e(localize('Search')); ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table tt-footable border-top align-middle" data-use-parent-width="true">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo e(localize('S/L')); ?>

                                    </th>
                                    <th><?php echo e(localize('Order Code')); ?></th>
                                    <th data-breakpoints="xs sm md"><?php echo e(localize('Customer')); ?></th>
                                    <th><?php echo e(localize('Placed On')); ?></th>
                                    <th data-breakpoints="xs"><?php echo e(localize('Items')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Payment')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Status')); ?></th>
                                    <th data-breakpoints="xs sm"><?php echo e(localize('Type')); ?></th>
                                    <th data-breakpoints="xs sm">Mitra</th>
                                    <?php if(count($locations) > 0): ?>
                                        <th data-breakpoints="xs sm"><?php echo e(localize('Location')); ?></th>
                                    <?php endif; ?>
                                    <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo e($key + 1 + ($orders->currentPage() - 1) * $orders->perPage()); ?></td>

                                        <td class="fs-sm">
                                            <?php echo e(getSetting('order_code_prefix')); ?><?php echo e($order->orderGroup->order_code); ?>

                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img class="rounded-circle"
                                                        src="<?php echo e(uploadedAsset(optional($order->user)->avatar)); ?>"
                                                        alt="avatar"
                                                        onerror="this.onerror=null;this.src='<?php echo e(staticAsset('backend/assets/img/placeholder-thumb.png')); ?>';" />
                                                </div>
                                                <div class="ms-2">
                                                    <h6 class="fs-sm mb-0"><?php echo e(optional($order->user)->name); ?></h6>
                                                    <span class="text-muted fs-sm">
                                                        <?php echo e(optional($order->user)->phone ?? '-'); ?></span>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="fs-sm"><?php echo e(date('d M, Y', strtotime($order->created_at))); ?></span>
                                        </td>

                                        <td class="tt-tb-price">
                                            <span class="fw-bold">
                                                <?php echo e($order->orderItems()->count()); ?>

                                            </span>
                                        </td>

                                        <td>
                                            <?php if($order->payment_status == unpaidPaymentStatus()): ?>
                                                <span class="badge bg-soft-danger rounded-pill text-capitalize">
                                                    <?php echo e($order->payment_status); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-soft-primary rounded-pill text-capitalize">
                                                    <?php echo e($order->payment_status); ?>

                                                </span>
                                            <?php endif; ?>
                                        </td>


                                        <td>
                                            <?php if($order->delivery_status == orderDeliveredStatus()): ?>
                                                <span class="badge bg-soft-primary rounded-pill text-capitalize">
                                                    <?php echo e($order->delivery_status); ?>

                                                </span>
                                            <?php elseif($order->delivery_status == orderCancelledStatus()): ?>
                                                <span class="badge bg-soft-danger rounded-pill text-capitalize">
                                                    <?php echo e(localize(Str::title(Str::replace('_', ' ', $order->delivery_status)))); ?>

                                                </span>
                                            <?php else: ?>
                                                <span class="badge bg-soft-info rounded-pill text-capitalize">
                                                    <?php echo e(localize(Str::title(Str::replace('_', ' ', $order->delivery_status)))); ?>

                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <span
                                                class="badge rounded-pill text-capitalize <?php echo e($order->shipping_delivery_type == getScheduledDeliveryType() ? 'bg-soft-warning' : 'bg-secondary'); ?>">
                                                <?php echo e(Str::title(Str::replace('_', ' ', $order->shipping_delivery_type))); ?>

                                            </span>
                                        </td>

                                        <td align="center">
                                            <?php if($order->nama_mitra == null): ?>
                                                -
                                            <?php else: ?>
                                                <?php echo e($order->nama_mitra); ?>

                                            <?php endif; ?>
                                        </td>

                                        <?php if(count($locations) > 0): ?>
                                            <td>
                                                <span class="badge rounded-pill text-capitalize bg-secondary">
                                                    <?php if($order->location): ?>
                                                        <?php echo e($order->location->name); ?>

                                                    <?php else: ?>
                                                        <?php echo e(localize('N/A')); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                        <?php endif; ?>

                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage_orders')): ?>
                                                <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>"
                                                    class="btn btn-sm p-0 tt-view-details" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="View Details">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!--pagination start-->
                        <div class="d-flex align-items-center justify-content-between px-4 pb-4">
                            <span><?php echo e(localize('Showing')); ?>

                                <?php echo e($orders->firstItem()); ?>-<?php echo e($orders->lastItem()); ?> <?php echo e(localize('of')); ?>

                                <?php echo e($orders->total()); ?> <?php echo e(localize('results')); ?></span>
                            <nav>
                                <?php echo e($orders->appends(request()->input())->links()); ?>

                            </nav>
                        </div>
                        <!--pagination end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/pages/orders/index.blade.php ENDPATH**/ ?>