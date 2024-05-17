<div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>


            <nav class="mobile-nav">
                <ul class="mobile-menu">
                        <?php if(!is_null(getSetting('header_menu_labels'))): ?>
                            <?php
                                $labels = json_decode(getSetting('header_menu_labels')) ?? [];
                                $menus = json_decode(getSetting('header_menu_links')) ?? [];
                            ?>

                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuKey => $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="<?php if($menuItem==localize($labels[$menuKey])){ "active"; } ?>" >
                                    <a href="<?php echo e($menuItem); ?>"><?php echo e(localize($labels[$menuKey])); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li><a href="<?php echo e(route('home')); ?>"><?php echo e(localize('Home')); ?></a></li>
                            <li><a href="<?php echo e(route('products.index')); ?>"><?php echo e(localize('Products')); ?></a></li>
                            <li><a href="<?php echo e(route('home.campaigns')); ?>"><?php echo e(localize('Campaigns')); ?></a>
                            </li>
                            <li><a href="<?php echo e(route('home.coupons')); ?>"><?php echo e(localize('Coupons')); ?></a>
                            </li>
                        <?php endif; ?>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="<?php echo e(getSetting('facebook_link')); ?>" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="<?php echo e(getSetting('twitter_link')); ?>" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="<?php echo e(getSetting('linkedin_link')); ?>" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="<?php echo e(getSetting('youtube_link')); ?>" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper --><?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/frontend/skinoasis/inc/navMobile.blade.php ENDPATH**/ ?>