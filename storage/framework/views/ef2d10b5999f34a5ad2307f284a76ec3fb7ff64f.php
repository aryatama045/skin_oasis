

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('Payment Methods Settings')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('Payment Methods Settings')); ?></h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <table class="table tt-footable border-top" data-use-parent-width="true">
                <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Nama Bank</th>
                        <th data-breakpoints="xs sm">No. Rek</th>
                        <th data-breakpoints="xs sm">Jenis</th>
                        <th data-breakpoints="xs sm">Aktif</th>
                        <!-- <th data-breakpoints="xs sm" class="text-end"><?php echo e(localize('Action')); ?></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $paymenthod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $listbank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center">
                                #
                            </td>
                            <td>
                                <span class="fw-semibold">
                                    <?php echo e($listbank->account_name); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($listbank->account_number != ''): ?>
                                    <span class="badge rounded-pill bg-secondary">
                                        <?php echo e($listbank->account_number); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="badge rounded-pill bg-secondary">
                                        N/A
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($listbank->remark); ?>

                            </td>
                            <td>
                                <?php if($listbank->active == 0): ?>
                                    <span class="badge rounded-pill bg-secondary" style="color: red">
                                        Tidak Aktif
                                    </span>
                                <?php else: ?>
                                    <span class="badge rounded-pill bg-secondary" style="color: green">
                                        Aktif
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <!-- <div class="row g-2">
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="<?php echo e(route('admin.settings.updatePaymentMethods')); ?>" method="POST"
                        enctype="multipart/form-data" class="pb-650">
                        <?php echo csrf_field(); ?>

                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label"><?php echo e(localize('Enable COD')); ?></label>
                                    <select id="enable_cod" class="form-control select2" name="enable_cod"
                                        data-toggle="select2">
                                        <option value="0" <?php echo e(getSetting('enable_cod') == '0' ? 'selected' : ''); ?>>
                                            <?php echo e(localize('Disable')); ?></option>
                                        <option value="1" <?php echo e(getSetting('enable_cod') == '1' ? 'selected' : ''); ?>>
                                            <?php echo e(localize('Enable')); ?></option>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/pages/systemSettings/paymentMethods.blade.php ENDPATH**/ ?>