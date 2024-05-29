<ul class="tt-side-nav">

    <!-- dashboard -->
    <li class="side-nav-item nav-item">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="side-nav-link">
            <span class="tt-nav-link-icon"><i data-feather="pie-chart"></i></span>
            <span class="tt-nav-link-text"><?php echo e(localize('Dashboard')); ?></span>
        </a>
    </li>

    <!-- products -->
    <?php
        $productsActiveRoutes = ['admin.brands.index', 'admin.brands.edit', 'admin.units.index', 'admin.units.edit', 'admin.variations.index', 'admin.variations.edit', 'admin.variationValues.index', 'admin.variationValues.edit', 'admin.taxes.index', 'admin.taxes.edit', 'admin.categories.index', 'admin.categories.create', 'admin.categories.edit', 'admin.products.index', 'admin.products.create', 'admin.products.edit'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['products', 'categories', 'variations', 'brands', 'units', 'taxes'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($productsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#sidebarProducts"
                aria-expanded="<?php echo e(areActiveRoutes($productsActiveRoutes, 'true')); ?>" aria-controls="sidebarProducts"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="shopping-bag"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Products')); ?></span>
            </a>

            <div class="collapse <?php echo e(areActiveRoutes($productsActiveRoutes, 'show')); ?>" id="sidebarProducts">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.products.index', 'admin.products.create', 'admin.products.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.products.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.products.index', 'admin.products.create', 'admin.products.edit'])); ?>"><?php echo e(localize('All Products')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.categories.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.categories.index', 'admin.categories.create', 'admin.categories.edit'])); ?>"><?php echo e(localize('All Categories')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(
                                ['admin.variations.index', 'admin.variations.edit', 'admin.variationValues.index', 'admin.variationValues.edit'],
                                'tt-menu-item-active',
                            )); ?>">
                            <a href="<?php echo e(route('admin.variations.index')); ?>"
                                class="<?php echo e(areActiveRoutes([
                                    'admin.variations.index',
                                    'admin.variations.edit',
                                    'admin.variationValues.index',
                                    'admin.variationValues.edit',
                                ])); ?>"><?php echo e(localize('All Variations')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brands')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.brands.index', 'admin.brands.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.brands.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.brands.index', 'admin.brands.edit'])); ?>"><?php echo e(localize('All Brands')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('units')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.units.index', 'admin.units.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.units.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.units.index'])); ?>"><?php echo e(localize('All Units')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('taxes')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.taxes.index', 'admin.taxes.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.taxes.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.taxes.index'])); ?>"><?php echo e(localize('All Taxes')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- pos -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['pos'])): ?>
        <li class="side-nav-item nav-item">
            <a href="<?php echo e(route('admin.pos.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="table"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Pos System')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- orders -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.orders.index', 'admin.orders.show'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.orders.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes(['admin.orders.index', 'admin.orders.show'])); ?>">
                <span class="tt-nav-link-icon"><i data-feather="shopping-cart"></i></span>
                <span class="tt-nav-link-text">
                    <span><?php echo e(localize('Orders')); ?></span>

                    <?php
                        $newOrdersCount = \App\Models\Order::isPlaced()->count();
                    ?>

                    <?php if($newOrdersCount > 0): ?>
                        <small class="badge bg-danger"><?php echo e(localize('New')); ?></small>
                    <?php endif; ?>
                </span>
            </a>
        </li>
    <?php endif; ?>

    <!-- stock -->
    <?php
        $stockActiveRoutes = ['admin.stocks.create', 'admin.locations.index', 'admin.locations.create', 'admin.locations.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['add_stock', 'show_locations'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($stockActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#manageStock"
                aria-expanded="<?php echo e(areActiveRoutes($stockActiveRoutes, 'true')); ?>" aria-controls="manageStock"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="database"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Stocks')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($stockActiveRoutes, 'show')); ?>" id="manageStock">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_stock')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.stocks.create'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.stocks.create')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.stocks.create'])); ?>"><?php echo e(localize('Add Stock')); ?></a>
                        </li>
                        <li class="<?php echo e(areActiveRoutes(['admin.stocks.monitoring'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.stocks.monitoring')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.stocks.monitoring'])); ?>">Monitoring Stock</a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_locations')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.locations.index', 'admin.locations.create', 'admin.locations.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.locations.index')); ?>"><?php echo e(localize('All Locations')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Refunds -->
    <?php
        $refundsActiveRoutes = ['admin.refund.configurations', 'admin.refund.requests', 'admin.refund.refunded', 'admin.refund.rejected'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['refund_configurations', 'refund_requests', 'approved_refunds', 'rejected_refunds'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($refundsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#manageRefunds"
                aria-expanded="<?php echo e(areActiveRoutes($refundsActiveRoutes, 'true')); ?>" aria-controls="manageRefunds"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="corner-up-left"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Refunds')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($refundsActiveRoutes, 'show')); ?>" id="manageRefunds">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('refund_configurations')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.refund.configurations'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.refund.configurations')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.refund.configurations'])); ?>"><?php echo e(localize('Refund Configurations')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('refund_requests')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.refund.requests'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.refund.requests')); ?>"><?php echo e(localize('Refund Requests')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('approved_refunds')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.refund.refunded'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.refund.refunded')); ?>"><?php echo e(localize('Approved Refunds')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('rejected_refunds')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.refund.rejected'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.refund.rejected')); ?>"><?php echo e(localize('Rejected Refunds')); ?></a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Rewards & Wallet -->
    <?php
        $rewardsActiveRoutes = ['admin.rewards.configurations', 'admin.rewards.setPoints', 'admin.wallet.configurations'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['reward_configurations', 'set_reward_points'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($rewardsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#manageRewards"
                aria-expanded="<?php echo e(areActiveRoutes($rewardsActiveRoutes, 'true')); ?>" aria-controls="manageRewards"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="award"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Rewards & Wallet')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($rewardsActiveRoutes, 'show')); ?>" id="manageRewards">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reward_configurations')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.rewards.configurations'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.rewards.configurations')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.rewards.configurations'])); ?>"><?php echo e(localize('Reward Configurations')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('set_reward_points')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.rewards.setPoints'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.rewards.setPoints')); ?>"><?php echo e(localize('Set Reward Points')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallet_configurations')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.wallet.configurations'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.wallet.configurations')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.wallet.configurations'])); ?>"><?php echo e(localize('Wallet Configurations')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['customers', 'staffs'])): ?>
    <!-- Users -->
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Users')); ?></span>
    </li>
    <?php endif; ?>

    <!-- customers -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customers')): ?>
        <li class="side-nav-item nav-item">
            <a href="<?php echo e(route('admin.customers.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="users"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Customers')); ?></span>
            </a>
        </li>
        <li class="side-nav-item nav-item">
            <a href="<?php echo e(route('admin.customers.testimoni')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="message-circle"></i></span>
                <span class="tt-nav-link-text">Testimoni</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- staffs -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staffs')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.staffs.index', 'admin.staffs.create', 'admin.staffs.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.staffs.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="user-check"></i></span>
                <span class="tt-nav-link-text">Person</span>
            </a>
        </li>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.staffs.mitra', 'admin.staffs.createmitra', 'admin.staffs.editmitra'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.staffs.mitra')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="user-check"></i></span>
                <span class="tt-nav-link-text">Mitra</span>
            </a>
        </li>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.staffs.dokter', 'admin.staffs.createdokter', 'admin.staffs.editdokter'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.staffs.dokter')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="user-check"></i></span>
                <span class="tt-nav-link-text">Dokter</span>
            </a>
        </li>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.staffs.klinik', 'admin.staffs.createklinik', 'admin.staffs.editklinik'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.staffs.klinik')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="user-check"></i></span>
                <span class="tt-nav-link-text">Klinik</span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['partner'])): ?>
    <!-- Partner -->
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Partners')); ?></span>
    </li>
    <?php endif; ?>
    <!-- Pages -->
    <?php
        $partnerPagesActiveRoutes = ['admin.partner.index','admin.partner.create','admin.partner.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('partner_pages')): ?>
        <li class="side-nav-item nav-item">
            <a href="<?php echo e(route('admin.partner.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes($partnerPagesActiveRoutes, 'tt-menu-item-active')); ?>">
                <span class="tt-nav-link-icon"> <i data-feather="file-text"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Partner Pages')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Join Us -->
    <?php
        $joinUsActiveRoutes = ['admin.join.influencer','admin.join.partner','admin.join.community'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['join_influencer', 'join_partner','join_community'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($joinUsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#partnerSystem"
                aria-expanded="<?php echo e(areActiveRoutes($joinUsActiveRoutes, 'true')); ?>" aria-controls="partnerSystem"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="users"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Join Us')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($joinUsActiveRoutes, 'show')); ?>" id="partnerSystem">
                <ul class="side-nav-second-level">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('join_influencer')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.join.influencer','admin.join.influencer_create','admin.join.influencer_edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.join.influencer')); ?>"><?php echo e(localize('Join Influencer')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('join_partner')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.join.partner','admin.join.partner_create','admin.join.partner_edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.join.partner')); ?>"><?php echo e(localize('Join Partner')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('join_community')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.join.community', 'admin.join.community_create','admin.join.community_edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.join.community')); ?>"><?php echo e(localize('Join Community')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Contents -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['tags', 'pages', 'blogs', 'blog_categories', 'media_manager'])): ?>
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Contents')); ?></span>
    </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['tags', 'pages', 'blogs', 'blog_categories', 'media_manager'])): ?>
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text">Nano Academy</span>
    </li>
    <?php endif; ?>

    <!-- tags -->
    <?php
        $tagsActiveRoutes = ['admin.tags.index', 'admin.tags.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tags')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($tagsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.tags.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="tag"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Tags')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- pages -->
    <?php
        $pagesActiveRoutes = ['admin.pages.index', 'admin.pages.create', 'admin.pages.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($pagesActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.pages.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="copy"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Pages')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Blog Systems -->
    <?php
        $blogActiveRoutes = ['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit', 'admin.blogCategories.index', 'admin.blogCategories.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['blogs', 'blog_categories'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($blogActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#blogSystem"
                aria-expanded="<?php echo e(areActiveRoutes($blogActiveRoutes, 'true')); ?>" aria-controls="blogSystem"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="file-text"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Blogs')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($blogActiveRoutes, 'show')); ?>" id="blogSystem">
                <ul class="side-nav-second-level">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.blogs.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.blogs.index', 'admin.blogs.create', 'admin.blogs.edit'])); ?>"><?php echo e(localize('All Blogs')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog_categories')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.blogCategories.index', 'admin.blogCategories.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.blogCategories.index')); ?>"><?php echo e(localize('Categories')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- media manager -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('media_manager')): ?>
        <li class="side-nav-item">
            <a href="<?php echo e(route('admin.mediaManager.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="folder"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Media Manager')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Promotions -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletters', 'subscribers','coupons','campaigns'])): ?>
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Promotions')); ?></span>
    </li>
    <?php endif; ?>

    <!-- newsletter -->
    <?php
        $newsletterActiveRoutes = ['admin.newsletters.index', 'admin.subscribers.index'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['newsletters', 'subscribers'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($newsletterActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#newsletter"
                aria-expanded="<?php echo e(areActiveRoutes($newsletterActiveRoutes, 'true')); ?>" aria-controls="newsletter"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="map"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Newsletters')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($newsletterActiveRoutes, 'show')); ?>" id="newsletter">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletters')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.newsletters.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.newsletters.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.newsletters.index'])); ?>"><?php echo e(localize('Bulk Emails')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscribers')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.subscribers.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.subscribers.index')); ?>"
                                lass="<?php echo e(areActiveRoutes(['admin.newsletters.index'])); ?>"><?php echo e(localize('Subscribers')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>

    <!-- Coupons -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.coupons.index', 'admin.coupons.create', 'admin.coupons.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.coupons.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes(['admin.coupons.index', 'admin.coupons.create', 'admin.coupons.edit'])); ?>">
                <span class="tt-nav-link-icon"> <i data-feather="scissors"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Coupons')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- campaigns -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('campaigns')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.campaigns.index', 'admin.campaigns.create', 'admin.campaigns.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.campaigns.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"> <i data-feather="zap"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Campaigns')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['logistics', 'shipping_zones'])): ?>
    <!-- Fulfillment -->
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Fulfillment')); ?></span>
    </li>
    <?php endif; ?>

    <!-- Logistics -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('logistics')): ?>
        <li
            class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.logistics.index', 'admin.logistics.create', 'admin.logistics.edit'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.logistics.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="cpu"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Logistics')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <!-- shipping zones -->
    <?php
        $logisticZoneActiveRoutes = ['admin.logisticZones.index', 'admin.logisticZones.create', 'admin.logisticZones.edit', 'admin.countries.index', 'admin.states.index', 'admin.states.create', 'admin.states.edit', 'admin.cities.index', 'admin.cities.create', 'admin.cities.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping_zones')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($logisticZoneActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.logisticZones.index')); ?>" class="side-nav-link">
                <i class="uil-ship"></i>
                <span class="tt-nav-link-icon"><i data-feather="truck"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Shipping Zones')); ?></span>
            </a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['order_reports', 'product_sale_reports', 'category_sale_reports', 'sales_amount_reports',
        'delivery_status_reports', ])): ?>
    <!-- Reports -->
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Reports')); ?></span>
    </li>
    <?php endif; ?>

    <!-- reports -->
    <?php
        $reportActiveRoutes = ['admin.reports.orders', 'admin.reports.sales', 'admin.reports.categorySales', 'admin.reports.salesAmount', 'admin.reports.deliveryStatus'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['order_reports', 'product_sale_reports', 'category_sale_reports', 'sales_amount_reports',
        'delivery_status_reports'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($reportActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#reports"
                aria-expanded="<?php echo e(areActiveRoutes($reportActiveRoutes, 'true')); ?>" aria-controls="reports"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="bar-chart"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Reports')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($reportActiveRoutes, 'show')); ?>" id="reports">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.orders'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.orders')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.orders'])); ?>"><?php echo e(localize('Orders Report')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_sale_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.sales'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.sales')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.sales'])); ?>"><?php echo e(localize('Product Sales')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_sale_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.categorySales'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.categorySales')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.categorySales'])); ?>"><?php echo e(localize('Category Wise Sales')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sales_amount_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.salesAmount'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.salesAmount')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.salesAmount'])); ?>"><?php echo e(localize('Sales Amount Report')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delivery_status_reports')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.reports.deliveryStatus'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.reports.deliveryStatus')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.reports.deliveryStatus'])); ?>"><?php echo e(localize('Delivery Status Report')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Support -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['contact_us_messages'])): ?>
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Support')); ?></span>
    </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contact_us_messages')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes(['admin.queries.index'], 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.queries.index')); ?>"
                class="side-nav-link <?php echo e(areActiveRoutes(['admin.queries.index'])); ?>">
                <span class="tt-nav-link-icon"><i data-feather="hash"></i></span>
                <span class="tt-nav-link-text">
                    <span><?php echo e(localize('Queries')); ?></span>

                    <?php
                        $newMsgCount = \App\Models\ContactUsMessage::where('is_seen', 0)->count();
                    ?>

                    <?php if($newMsgCount > 0): ?>
                        <small class="badge bg-danger"><?php echo e(localize('New')); ?></small>
                    <?php endif; ?>
                </span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Settings -->
    <li class="side-nav-title side-nav-item nav-item mt-3">
        <span class="tt-nav-title-text"><?php echo e(localize('Settings')); ?></span>
    </li>


    <!-- affiliateSystem -->
    <!-- <?php
        $affiliateSystemActiveRoutes = ['affiliate'];
    ?>

    <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($affiliateSystemActiveRoutes, 'tt-menu-item-active')); ?>">
        <a data-bs-toggle="collapse" href="#affiliateSystem"
            aria-expanded="<?php echo e(areActiveRoutes($affiliateSystemActiveRoutes, 'true')); ?>"
            aria-controls="affiliateSystem" class="side-nav-link tt-menu-toggle">
            <span class="tt-nav-link-icon"><i data-feather="percent"></i></span>
            <span class="tt-nav-link-text"><?php echo e(localize('Affiliate System')); ?></span>
        </a>
        <div class="collapse <?php echo e(areActiveRoutes($affiliateSystemActiveRoutes, 'show')); ?>" id="affiliateSystem">
            <ul class="side-nav-second-level">
                <li class="<?php echo e(areActiveRoutes(['admin.affiliate.configurations'], 'tt-menu-item-active')); ?>">
                    <a href="<?php echo e(route('admin.affiliate.configurations')); ?>"
                        class="<?php echo e(areActiveRoutes(['admin.affiliate.configurations'])); ?>"><?php echo e(localize('Configurations')); ?></a>
                </li>

                <li class="<?php echo e(areActiveRoutes(['affiliate.withdraw.index'], 'tt-menu-item-active')); ?>">
                    <a href="<?php echo e(route('affiliate.withdraw.index')); ?>"
                        lass="<?php echo e(areActiveRoutes(['affiliate.withdraw.index'])); ?>"><?php echo e(localize('Withdraw Request')); ?></a>
                </li>

                <li class="<?php echo e(areActiveRoutes(['affiliate.withdraw.index'], 'tt-menu-item-active')); ?>">
                    <a href="<?php echo e(route('affiliate.withdraw.index')); ?>"
                        lass="<?php echo e(areActiveRoutes(['affiliate.withdraw.index'])); ?>"><?php echo e(localize('Earning Histories')); ?></a>
                </li>

                <li class="<?php echo e(areActiveRoutes(['affiliate.withdraw.index'], 'tt-menu-item-active')); ?>">
                    <a href="<?php echo e(route('affiliate.withdraw.index')); ?>"
                        lass="<?php echo e(areActiveRoutes(['affiliate.withdraw.index'])); ?>"><?php echo e(localize('Payment Histories')); ?></a>
                </li>
            </ul>
        </div>
    </li> -->


    <!-- Appearance -->
    <?php
        $appearanceActiveRoutes = ['admin.appearance.header', 'admin.appearance.homepage.hero', 'admin.appearance.homepage.editHero', 'admin.appearance.homepage.topCategories', 'admin.appearance.homepage.topTrendingProducts', 'admin.appearance.homepage.featuredProducts', 'admin.appearance.homepage.bannerOne', 'admin.appearance.homepage.editBannerOne', 'admin.appearance.homepage.bestDeals', 'admin.appearance.homepage.bannerTwo', 'admin.appearance.homepage.clientFeedback', 'admin.appearance.homepage.editClientFeedback', 'admin.appearance.homepage.bestSelling', 'admin.appearance.homepage.customProductsSection', 'admin.appearance.products.index', 'admin.appearance.products.details', 'admin.appearance.products.details.editWidget', 'admin.appearance.about-us.popularBrands', 'admin.appearance.about-us.features', 'admin.appearance.about-us.editFeatures', 'admin.appearance.about-us.whyChooseUs', 'admin.appearance.about-us.editWhyChooseUs'];
        $homepageActiveRoutes = ['admin.appearance.homepage.hero', 'admin.appearance.homepage.editHero', 'admin.appearance.homepage.topCategories', 'admin.appearance.homepage.topTrendingProducts', 'admin.appearance.homepage.featuredProducts', 'admin.appearance.homepage.bannerOne', 'admin.appearance.homepage.editBannerOne', 'admin.appearance.homepage.bestDeals', 'admin.appearance.homepage.bannerTwo', 'admin.appearance.homepage.clientFeedback', 'admin.appearance.homepage.editClientFeedback', 'admin.appearance.homepage.bestSelling', 'admin.appearance.homepage.customProductsSection'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['homepage', 'product_page', 'product_details_page', 'about_us_page', 'header', 'footer'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($appearanceActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#Appearance"
                aria-expanded="<?php echo e(areActiveRoutes($appearanceActiveRoutes, 'true')); ?>" aria-controls="Appearance"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="layout"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Appearance')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($appearanceActiveRoutes, 'show')); ?>" id="Appearance">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('homepage')): ?>
                        <li class="<?php echo e(areActiveRoutes($homepageActiveRoutes, 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.homepage.hero')); ?>"
                                class="<?php echo e(areActiveRoutes($homepageActiveRoutes)); ?>"><?php echo e(localize('Homepage')); ?></a>
                        </li>
                    <?php endif; ?>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_page')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.appearance.products.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.products.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.products.index'])); ?>"><?php echo e(localize('Products Page')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_details_page')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.appearance.products.details', 'admin.appearance.products.details.editWidget'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.products.details')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.products.details'])); ?>"><?php echo e(localize('Product Details')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('about_us_page')): ?>
                        <?php
                            $aboutUsActiveRoutes = ['admin.appearance.about-us.index', 'admin.appearance.about-us.popularBrands', 'admin.appearance.about-us.features', 'admin.appearance.about-us.editFeatures', 'admin.appearance.about-us.whyChooseUs', 'admin.appearance.about-us.editWhyChooseUs'];
                        ?>

                        <li class="<?php echo e(areActiveRoutes($aboutUsActiveRoutes, 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.about-us.index')); ?>"
                                class="<?php echo e(areActiveRoutes($aboutUsActiveRoutes)); ?>"><?php echo e(localize('About Us')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('header')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.appearance.header'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.header')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.header'])); ?>"><?php echo e(localize('Header')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('footer')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.appearance.footer'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.appearance.footer')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.appearance.footer'])); ?>"><?php echo e(localize('Footer')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>


    <!-- Roles & Permission -->
    <?php
        $rolesActiveRoutes = ['admin.roles.index', 'admin.roles.create', 'admin.roles.edit'];
    ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles_and_permissions')): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($rolesActiveRoutes, 'tt-menu-item-active')); ?>">
            <a href="<?php echo e(route('admin.roles.index')); ?>" class="side-nav-link">
                <span class="tt-nav-link-icon"><i data-feather="unlock"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('Roles & Permissions')); ?></span>
            </a>
        </li>
    <?php endif; ?>


    <!-- system settings -->
    <?php
        $settingsActiveRoutes = ['admin.generalSettings', 'admin.orderSettings', 'admin.timeslot.edit', 'admin.languages.index', 'admin.languages.edit', 'admin.currencies.index', 'admin.currencies.edit', 'admin.languages.localizations', 'admin.jadwalDokter.index'];
    ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['smtp_settings', 'general_settings', 'currency_settings', 'language_settings', 'jadwal_dokter'])): ?>
        <li class="side-nav-item nav-item <?php echo e(areActiveRoutes($settingsActiveRoutes, 'tt-menu-item-active')); ?>">
            <a data-bs-toggle="collapse" href="#systemSetting"
                aria-expanded="<?php echo e(areActiveRoutes($settingsActiveRoutes, 'true')); ?>" aria-controls="systemSetting"
                class="side-nav-link tt-menu-toggle">
                <span class="tt-nav-link-icon"><i data-feather="settings"></i></span>
                <span class="tt-nav-link-text"><?php echo e(localize('System Settings')); ?></span>
            </a>
            <div class="collapse <?php echo e(areActiveRoutes($settingsActiveRoutes, 'show')); ?>" id="systemSetting">
                <ul class="side-nav-second-level">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('auth_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.settings.authSettings'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.settings.authSettings')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.settings.authSettings'])); ?>"><?php echo e(localize('Auth Settings')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('otp_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.settings.otpSettings'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.settings.otpSettings')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.settings.otpSettings'])); ?>"><?php echo e(localize('OTP Settings')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_settings')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(['admin.orderSettings', 'admin.timeslot.edit'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.orderSettings')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.generalSettings'])); ?>"><?php echo e(localize('Order Settings')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('jadwal_dokter')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.jadwalDokter.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.jadwalDokter.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.jadwalDokter.index'])); ?>">Jadwal Dokter</a>
                        </li>
                    <?php endif; ?>

                    <li class="d-none <?php echo e(areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active')); ?>">
                        <a href="<?php echo e(route('admin.smtpSettings.index')); ?>"
                            class="<?php echo e(areActiveRoutes(['admin.smtpSettings.index'])); ?>"><?php echo e(localize('Admin Store')); ?></a>
                    </li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('smtp_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.smtpSettings.index'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.smtpSettings.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.smtpSettings.index'])); ?>"><?php echo e(localize('SMTP Settings')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('general_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.generalSettings'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.generalSettings')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.generalSettings'])); ?>"><?php echo e(localize('General Settings')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.settings.paymentMethods'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.settings.paymentMethods')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.settings.paymentMethods'])); ?>"><?php echo e(localize('Payment Methods')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('social_login_settings')): ?>
                        <li class="<?php echo e(areActiveRoutes(['admin.settings.socialLogin'], 'tt-menu-item-active')); ?>">
                            <a href="<?php echo e(route('admin.settings.socialLogin')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.settings.socialLogin'])); ?>"><?php echo e(localize('Social Media Login')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_settings')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(
                                ['admin.languages.index', 'admin.languages.edit', 'admin.languages.localizations'],
                                'tt-menu-item-active',
                            )); ?>">
                            <a href="<?php echo e(route('admin.languages.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.languages.index', 'admin.languages.edit', 'admin.languages.localizations'])); ?>"><?php echo e(localize('Multilingual Settings')); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency_settings')): ?>
                        <li
                            class="<?php echo e(areActiveRoutes(
                                ['admin.currencies.index', 'admin.currencies.edit', 'admin.currencies.localizations'],
                                'tt-menu-item-active',
                            )); ?>">
                            <a href="<?php echo e(route('admin.currencies.index')); ?>"
                                class="<?php echo e(areActiveRoutes(['admin.currencies.index', 'admin.currencies.edit', 'admin.currencies.localizations'])); ?>"><?php echo e(localize('Multi Currency Settings')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>
</ul>
<?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/inc/sidebarMenus.blade.php ENDPATH**/ ?>