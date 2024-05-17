

<?php $__env->startSection('title'); ?>
    <?php echo e(localize('General Settings')); ?> <?php echo e(getSetting('title_separator')); ?> <?php echo e(getSetting('system_title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contents'); ?>
    <section class="tt-section pt-4">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card tt-page-header">
                        <div class="card-body d-lg-flex align-items-center justify-content-lg-between">
                            <div class="tt-page-title">
                                <h2 class="h5 mb-lg-0"><?php echo e(localize('General Settings')); ?></h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!--left sidebar-->
                <div class="col-xl-9 order-2 order-md-2 order-lg-2 order-xl-1">
                    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data"
                        class="pb-650">
                        <?php echo csrf_field(); ?>

                        <!--general settings-->
                        <div class="card mb-4" id="section-1">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('General Informations')); ?></h5>

                                <div class="mb-3">
                                    <label for="system_title" class="form-label"><?php echo e(localize('System Title')); ?></label>
                                    <input type="hidden" name="types[]" value="system_title">
                                    <input type="text" id="system_title" name="system_title" class="form-control"
                                        value="<?php echo e(getSetting('system_title')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="title_separator"
                                        class="form-label"><?php echo e(localize('Browser Tab Title Separator')); ?></label>
                                    <input type="hidden" name="types[]" value="title_separator">
                                    <input type="text" id="title_separator" name="title_separator" class="form-control"
                                        value="<?php echo e(getSetting('title_separator')); ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="site_address" class="form-label"><?php echo e(localize('Address')); ?></label>
                                    <input type="hidden" name="types[]" value="site_address">
                                    <input type="text" id="site_address" name="site_address" class="form-control"
                                        value="<?php echo e(getSetting('site_address')); ?>">
                                </div>
                            </div>
                        </div>
                        <!--general settings-->



                        <!--logo settings-->
                        <div class="card mb-4" id="section-3">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Dashboard Logo & Favicon')); ?></h5>
                                <div class="mb-3">
                                    <label for="admin_panel_logo"
                                        class="form-label"><?php echo e(localize('Dashboard Logo')); ?></label>
                                    <input type="hidden" name="types[]" value="admin_panel_logo">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Dashboard Logo')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="admin_panel_logo"
                                                    value="<?php echo e(getSetting('admin_panel_logo')); ?>">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="favicon" class="form-label"><?php echo e(localize('Favicon')); ?></label>
                                    <input type="hidden" name="types[]" value="favicon">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Favicon')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="favicon" value="<?php echo e(getSetting('favicon')); ?>">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--logo settings-->

                        <!--maintenance mode settings-->
                        <div class="card mb-4" id="section-4">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('Maintenance Mode')); ?></h5>
                                <div class="mb-3">
                                    <label for="enable_maintenance_mode"
                                        class="form-label"><?php echo e(localize('Enable Maintenance Mode')); ?></label>
                                    <input type="hidden" name="types[]" value="enable_maintenance_mode">
                                    <select id="enable_maintenance_mode" class="form-control text-uppercase select2"
                                        name="enable_maintenance_mode" data-toggle="select2">
                                        <option value="" disabled selected><?php echo e(localize('Set maintenance mode')); ?>

                                        </option>
                                        <option value="1"
                                            <?php echo e(getSetting('enable_maintenance_mode') == '1' ? 'selected' : ''); ?>>
                                            <?php echo e(localize('Enable')); ?></option>
                                        <option value="0"
                                            <?php echo e(getSetting('enable_maintenance_mode') == '0' ? 'selected' : ''); ?>>
                                            <?php echo e(localize('Disable')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--maintenance mode settings-->

                        <!--seo meta description start-->
                        <div class="card mb-4" id="section-5">
                            <div class="card-body">
                                <h5 class="mb-4"><?php echo e(localize('SEO Meta Configuration')); ?></h5>

                                <div class="mb-4">
                                    <label for="global_meta_title"
                                        class="form-label"><?php echo e(localize('Meta Title')); ?></label>
                                    <input type="hidden" name="types[]" value="global_meta_title">
                                    <input type="text" name="global_meta_title" id="global_meta_title"
                                        placeholder="<?php echo e(localize('Type meta title')); ?>" class="form-control"
                                        value="<?php echo e(getSetting('global_meta_title')); ?>">
                                    <span class="fs-sm text-muted">
                                        <?php echo e(localize('Set a meta tag title. Recommended to be simple and unique.')); ?>

                                    </span>
                                </div>

                                <div class="mb-4">
                                    <label for="global_meta_description"
                                        class="form-label"><?php echo e(localize('Meta Description')); ?></label>
                                    <input type="hidden" name="types[]" value="global_meta_description">
                                    <textarea class="form-control" name="global_meta_description" id="global_meta_description" rows="4"
                                        placeholder="<?php echo e(localize('Type your meta description')); ?>"><?php echo e(getSetting('global_meta_description')); ?></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="global_meta_keywords"
                                        class="form-label"><?php echo e(localize('Meta Keywords')); ?></label>

                                    <input type="hidden" name="types[]" value="global_meta_keywords">
                                    <textarea class="form-control" name="global_meta_keywords" id="global_meta_keywords" placeholder="Keyword, Keyword"><?php echo e(getSetting('global_meta_keywords')); ?></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label"><?php echo e(localize('Meta Image')); ?></label>
                                    <input type="hidden" name="types[]" value="global_meta_image">
                                    <div class="tt-image-drop rounded">
                                        <span class="fw-semibold"><?php echo e(localize('Choose Meta Image')); ?></span>
                                        <!-- choose media -->
                                        <div class="tt-product-thumb show-selected-files mt-3">
                                            <div class="avatar avatar-xl cursor-pointer choose-media"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                                                onclick="showMediaManager(this)" data-selection="single">
                                                <input type="hidden" name="global_meta_image"
                                                    value="<?php echo e(getSetting('global_meta_image')); ?>">
                                                <div class="no-avatar rounded-circle">
                                                    <span><i data-feather="plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- choose media -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--seo meta description end-->

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i data-feather="save" class="me-1"></i> <?php echo e(localize('Save Configuration')); ?>

                            </button>
                        </div>
                    </form>
                </div>

                <!--right sidebar-->
                <div class="col-xl-3 order-1 order-md-1 order-lg-1 order-xl-2">
                    <div class="card tt-sticky-sidebar">
                        <div class="card-body">
                            <h5 class="mb-4"><?php echo e(localize('Configure General Settings')); ?></h5>
                            <div class="tt-vertical-step">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#section-1" class="active"><?php echo e(localize('General Information')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-3"><?php echo e(localize('Dashborad Logo & Favicon')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-4"><?php echo e(localize('Maintenance Mode')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#section-5"><?php echo e(localize('SEO Configuration')); ?></a>
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
            getChosenFilesCount();
            showSelectedFilePreviewOnLoad();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/pages/systemSettings/general.blade.php ENDPATH**/ ?>