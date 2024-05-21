

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Customer Order History')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="my-account pt-6 pb-120">
        <div class="container">

            <?php echo $__env->make('frontend.skinoasis.pages.users.partials.customerHero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row g-4">
                <div class="col-xl-3">
                    <?php echo $__env->make('frontend.skinoasis.pages.users.partials.customerSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-xl-9">

                    <div class="order-tracking-wrap bg-white rounded py-5 px-4">

                        <h6 class="mb-4"><?php echo e(localize('Order Tracking')); ?></h6>
                        <form class="search-form d-flex align-items-center mb-5 justify-content-center"
                            action="<?php echo e(route('customers.trackOrder')); ?>">
                            <div class="input-group mb-3 d-flex justify-content-center">
                                <?php if(getSetting('order_code_prefix') != null): ?>
                                    <div class="input-group-prepend">
                                        <span
                                            class="input-group-text rounded-0 rounded-start"><?php echo e(getSetting('order_code_prefix')); ?></span>
                                    </div>
                                <?php endif; ?>
                                <input type="text" class="w-50" placeholder="<?php echo e(localize('code')); ?>" name="code"
                                    <?php if(isset($searchCode)): ?>
                                            value="<?php echo e($searchCode); ?>"
                                            <?php endif; ?>>

                                <button type="submit" class="btn btn-secondary px-3"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>


                        <?php if(isset($order)): ?>
                            <ol id="progress-bar">

                                <li class="fs-xs tt-step <?php if($order->delivery_status != orderCancelledStatus()): ?> tt-step-done <?php endif; ?>">
                                    <?php echo e(localize('Order Placed')); ?></li>
                                <li
                                    class="fs-xs tt-step <?php if($order->delivery_status == orderProcessingStatus() || $order->delivery_status == orderDeliveredStatus()): ?> tt-step-done  
<?php elseif($order->delivery_status == orderPendingStatus()): ?>
active <?php endif; ?>">
                                    <?php echo e(localize('Pending')); ?></li>
                                <li
                                    class="fs-xs tt-step <?php if($order->delivery_status == orderDeliveredStatus()): ?> tt-step-done  
                                    <?php elseif($order->delivery_status == orderProcessingStatus()): ?>
                                    active <?php endif; ?>">
                                    <?php echo e(localize('Processing')); ?></li>
                                <li class="fs-xs tt-step <?php if($order->delivery_status == orderDeliveredStatus()): ?> tt-step-done <?php endif; ?>">
                                    <?php echo e(localize('Delivered')); ?></li>
                            </ol>
                            <div class="table-responsive-md mt-5">
                                <table class="table table-bordered fs-xs">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(localize('Date')); ?></th>
                                            <th scope="col"><?php echo e(localize('Status Info')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $order->orderUpdates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderUpdate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(date('d M, Y', strtotime($orderUpdate->created_at))); ?></td>
                                                <td><?php echo e($orderUpdate->note); ?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <tr>
                                            <td> <?php echo e(date('d M, Y', strtotime($order->created_at))); ?> </td>
                                            <td><?php echo e(localize('Order has been placed')); ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.skinoasis.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/pages/users/orderTrack.blade.php ENDPATH**/ ?>