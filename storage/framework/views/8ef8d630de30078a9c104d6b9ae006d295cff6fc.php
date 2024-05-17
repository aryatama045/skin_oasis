

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Order Settings')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Order Settings')); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 pb-650">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data"
                        class="mb-4">
                        <?php echo csrf_field(); ?>

                        <!--order settings-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Order Information')); ?></h5>

                                <div class="mb-3">
                                    <label for="enable_scheduled_order"
                                        class="form-label"><?php echo e(localize('Enable Scheduled Order')); ?></label>
                                    <input type="hidden" name="types[]" value="enable_scheduled_order">
                                    <select id="enable_scheduled_order" class="form-control text-uppercase select2"
                                        name="enable_scheduled_order" data-toggle="select2">
                                        <option value="1"
                                            <?php echo e(getSetting('enable_scheduled_order') == '1' ? 'selected' : ''); ?>>
                                            <?php echo e(localize('Enable')); ?></option>
                                        <option value="0"
                                            <?php echo e(getSetting('enable_scheduled_order') == '0' ? 'selected' : ''); ?>>
                                            <?php echo e(localize('Disable')); ?></option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="allowed_order_days"
                                        class="form-label"><?php echo e(localize('Scheduled Order Days')); ?></label>
                                    <input type="hidden" name="types[]" value="allowed_order_days">
                                    <input type="number" id="allowed_order_days" name="allowed_order_days"
                                        class="form-control" min="1" value="<?php echo e(getSetting('allowed_order_days')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="order_code_prefix"
                                        class="form-label"><?php echo e(localize('Order Code Prefix')); ?></label>
                                    <input type="hidden" name="types[]" value="order_code_prefix">
                                    <input type="text" id="order_code_prefix" name="order_code_prefix"
                                        class="form-control" placeholder="<?php echo e(localize('#Grostore-')); ?>"
                                        value="<?php echo e(getSetting('order_code_prefix')); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="order_code_start"
                                        class="form-label"><?php echo e(localize('Order Code Starts From')); ?></label>
                                    <input type="hidden" name="types[]" value="order_code_start">
                                    <input type="number" min="1" id="order_code_start" name="order_code_start"
                                        class="form-control" placeholder="<?php echo e(localize('1001')); ?>"
                                        value="<?php echo e(getSetting('order_code_start')); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="invoice_thanksgiving"
                                        class="form-label"><?php echo e(localize('Invoice Thank You Message')); ?></label>
                                    <input type="hidden" name="types[]" value="invoice_thanksgiving">
                                    <textarea rows="4" id="invoice_thanksgiving" name="invoice_thanksgiving" class="form-control"
                                        placeholder="<?php echo e(localize('Type your thank you message for invoice')); ?>"><?php echo e(getSetting('invoice_thanksgiving')); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!--order settings-->


                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                            </button>
                        </div>
                    </form>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card mb-4" id="section-2">

                                <div class="card-body pb-2">
                                    <h5><?php echo e(localize('Scheduled Time Slot List')); ?></h5>
                                </div>
                                <table class="table tt-footable" data-use-parent-width="true">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="7%"><?php echo e(localize('S/L')); ?></th>
                                            <th><?php echo e(localize('Time Slot')); ?></th>
                                            <th><?php echo e(localize('Sorting Order')); ?></th>
                                            <th data-breakpoints="xs sm" class="text-end">
                                                <?php echo e(localize('Action')); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $slots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <?php echo e($key + 1); ?>

                                                </td>

                                                <td class="align-middle">
                                                    <h6 class="fs-sm mb-0">
                                                        <?php echo e($slot->timeline); ?></h6>
                                                </td>

                                                <td class="align-middle">
                                                    <?php echo e($slot->sorting_order); ?>

                                                </td>

                                                <td class="text-end align-middle">
                                                    <div class="dropdown tt-tb-dropdown">
                                                        <button type="button" class="btn p-0" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i data-feather="more-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end shadow">

                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('admin.timeslot.edit', ['id' => $slot->id, 'lang_key' => env('DEFAULT_LANGUAGE')])); ?>&localize">
                                                                <i data-feather="edit-3"
                                                                    class="me-2"></i><?php echo e(localize('Edit')); ?>

                                                            </a>

                                                            <a href="#" class="dropdown-item confirm-delete"
                                                                data-href="<?php echo e(route('admin.timeslot.delete', $slot->id)); ?>"
                                                                title="<?php echo e(localize('Delete')); ?>">
                                                                <i data-feather="trash-2" class="me-2"></i>
                                                                <?php echo e(localize('Delete')); ?>

                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form action="<?php echo e(route('admin.timeslot.store')); ?>" method="POST" enctype="multipart/form-data"
                        class="mt-4" id="section-3">
                        <?php echo csrf_field(); ?>

                        <!--timeslot-->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Add New Time Slot')); ?></h5>
                                <div class="mb-3">
                                    <label for="timeline" class="form-label"><?php echo e(localize('Time Slot')); ?></label>
                                    <input type="text" id="timeline" name="timeline" class="form-control"
                                        placeholder="<?php echo e(localize('8am - 9am')); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="sorting_order" class="form-label"><?php echo e(localize('Sorting Order')); ?></label>
                                    <input type="number" min="0" value="0" id="sorting_order"
                                        name="sorting_order" class="form-control">
                                    <small><?php echo e(localize('Timeslots with lower sorting order will be shown first')); ?></small>
                                </div>

                            </div>
                        </div>
                        <!--timeslot-->


                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save')); ?>

                            </button>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo e(localize('Configure Order Settings')); ?></h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active"><?php echo e(localize('Order Information')); ?></a>
                                    </li>

                                    <li>
                                        <a href="#section-2"><?php echo e(localize('Time Slot List')); ?></a>
                                    </li>

                                    <li>
                                        <a href="#section-3"><?php echo e(localize('Add New Time Slot')); ?></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        "use strict";

        // runs when the document is ready --> for media files
        $(document).ready(function() {
            //  
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/pages/systemSettings/orderSettings.blade.php ENDPATH**/ ?>