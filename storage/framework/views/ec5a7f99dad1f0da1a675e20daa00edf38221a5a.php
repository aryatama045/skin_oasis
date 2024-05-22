<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(localize('INVOICE')); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <style type="text/css">
        @import  url('https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500&family=Hanuman:wght@300;400;700&family=Hind+Siliguri:wght@400;500&family=Kanit:wght@400;500&family=Open+Sans:wght@400;500&family=Roboto:wght@400;500&display=swap');

        * {
            box-sizing: border-box;
            font-family: '<?php echo $font_family; ?>';
        }

        pre,
        p {
            padding: 0;
            margin: 0;
            font-family: '<?php echo $font_family; ?>';
        }

        table {
            width: 100%;
            border-collapse: collapse;
            padding: 1px;
            font-family: '<?php echo $font_family; ?>';
        }

        td,
        th {
            text-align: left;
            font-family: '<?php echo $font_family; ?>';
        }

        .visibleMobile {
            display: none;
            font-family: '<?php echo $font_family; ?>';
        }

        .hiddenMobile {
            display: block;
            font-family: '<?php echo $font_family; ?>';
        }

        .text-left {
            text-align: <?php echo $default_text_align; ?>;
            font-family: '<?php echo $font_family; ?>';
        }

        .text-right {
            text-align: <?php echo $reverse_text_align; ?>;
            font-family: '<?php echo $font_family; ?>';
        }
    </style>
</head>

<body>
    
    <table style="width: 100%; table-layout: fixed">
        <tr>
            <td colspan="4"
                style="border-right: 1px solid #e4e4e4; width: 300px; color: #323232; line-height: 1.5; vertical-align: top;">
                <p style="font-size: 15px; color: #5b5b5b; font-weight: bold; line-height: 1; vertical-align: top; ">
                    <?php echo e(localize('INVOICE')); ?></p>
                <br>
                <p style="font-size: 12px; color: #5b5b5b; line-height: 24px; vertical-align: top;">
                    <?php echo e(localize('Invoice No')); ?> : <?php echo e(getSetting('order_code_prefix')); ?>

                    <?php echo e($order->orderGroup->order_code); ?><br>
                    <?php echo e(localize('Order Date')); ?> : <?php echo e(date('d M, Y', strtotime($order->created_at))); ?>

                </p>

                <?php if($order->location_id != null): ?>
                    <p>
                        <?php echo e(optional($order->location)->name); ?>

                    </p>
                <?php endif; ?>
            </td>
            <td colspan="4" align="right"
                style="width: 300px; text-align: right; padding-left: 50px; line-height: 1.5; color: #323232;">
                <img src="https://skinoasis.solusiitkreasi.com/public/frontend/skinoasis/assets/images/logo-black.png?v=v1.0.0" alt="logo" border="0" style="width: 100px; float: right" /><br>
                <p style="font-size: 12px;font-weight: bold; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                    <?php echo e(getSetting('system_title')); ?></p>
                <p style="font-size: 12px; color: #5b5b5b; line-height: 24px; vertical-align: top;">
                    <?php echo e(getSetting('topbar_location')); ?><br>
                    <?php echo e(localize('Phone')); ?>: <?php echo e(getSetting('navbar_contact_number')); ?>

                </p>
            </td>
        </tr>
        <tr class="visibleMobile">
            <td height="10"></td>
        </tr>
        <tr>
            <td colspan="10" style="border-bottom:1px solid #e4e4e4"></td>
        </tr>
    </table>
    

    
    <table class="table" style="width: 100%;">
        <tbody style="display: table-header-group">
            <tr class="visibleMobile">
                <td height="20"></td>
            </tr>
            <tr style=" margin: 0;">
                <td colspan="4" style="width: 300px;">
                    <p
                        style="font-size: 12px; font-weight: bold; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                        <?php echo e(localize('SHIPPING INFORMATION')); ?></p>

                    <?php
                        $shippingAddress = $order->orderGroup->shippingAddress;
                    ?>
                    <p style="font-size: 12px; color: #5b5b5b; line-height: 24px; vertical-align: top;">

                        <?php if($order->orderGroup->is_pos_order): ?>
                            <?php echo e($order->orderGroup->pos_order_address); ?>

                        <?php else: ?>
                            <?php echo e(optional($shippingAddress)->address); ?>,
                            <?php echo e(optional(optional($shippingAddress)->city)->name); ?>,
                            <?php echo e(optional(optional($shippingAddress)->state)->name); ?>,<br>
                            <?php echo e(optional(optional($shippingAddress)->country)->name); ?><br>
                        <?php endif; ?>
                        <?php if($order->orderGroup->alternative_phone_no): ?>
                            <br>
                            <?php echo e(localize('Alternative Phone')); ?>: <?php echo e($order->orderGroup->alternative_phone_no); ?>

                        <?php endif; ?>
                        <br>
                        <?php echo e(localize('Logistic')); ?>: <?php echo e($order->logistic_name); ?>

                        <br>
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
                    </p>

                </td>


                <?php if(!$order->orderGroup->is_pos_order): ?>
                    <td colspan="4" style="width: 300px;">
                        <p
                            style="font-size: 11px; font-weight: bold; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                            <?php echo e(localize('BILLING INFORMATION')); ?></p>
                        <?php
                            $billingAddress = $order->orderGroup->billingAddress;
                        ?>
                        <p style="font-size: 12px; color: #5b5b5b; line-height: 24px; vertical-align: top;">
                            <?php echo e(optional($billingAddress)->address); ?>,
                            <?php echo e(optional(optional($billingAddress)->city)->name); ?>,
                            <?php echo e(optional(optional($billingAddress)->state)->name); ?>,<br>
                            <?php echo e(optional(optional($billingAddress)->country)->name); ?>

                        </p>
                    </td>
                <?php endif; ?>


            </tr>

        </tbody>
    </table>
    

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="#ffffff">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                        class="fullTable" bgcolor="#ffffff">
                        <tbody>
                            <tr class="visibleMobile">
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <th style="font-size: 12px; color: #000000; font-weight: normal;
                  line-height: 1; vertical-align: top; padding: 0 10px 7px 0;"
                                                    width="52%" align="left">
                                                    <?php echo e(localize('Item')); ?>

                                                </th>
                                                <th style="font-size: 12px; color: #000000; font-weight: normal;
                  line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="left">
                                                    <?php echo e(localize('Price')); ?>

                                                </th>
                                                <th style="font-size: 12px; color: #000000; font-weight: normal;
                  line-height: 1; vertical-align: top; padding: 0 0 7px; text-align: center; "
                                                    align="center">
                                                    <?php echo e(localize('Qty')); ?>

                                                </th>
                                                <th style="font-size: 12px; color: #000000; font-weight:
                  normal; line-height: 1; vertical-align: top; padding: 0 0 7px; text-align: right; "
                                                    align="right">
                                                    <?php echo e(localize('Subtotal')); ?>

                                                </th>
                                            </tr>
                                            <tr>
                                                <td height="1" style="background: #e4e4e4;" colspan="4"></td>
                                            </tr>

                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $product = $item->product_variation->product;
                                                ?>
                                                <tr>
                                                    <td style="font-size: 12px; color: #5b5b5b;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                        class="article">
                                                        <div><?php echo e($product->collectLocalization('name')); ?></div>
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
                                                    </td>
                                                    <td
                                                        style="font-size: 12px; color: #646a6e;  line-height:
              18px;  vertical-align: top; padding:10px 0;">
                                                        <?php echo e(formatPrice($item->unit_price)); ?></td>
                                                    <td style="font-size: 12px; color: #646a6e;  line-height:
              18px;  vertical-align: top; padding:10px 0; text-align: center;"
                                                        align="center"><?php echo e($item->qty); ?></td>
                                                    <td style="font-size: 12px; color: #1e2b33;  line-height:
              18px;  vertical-align: top; padding:10px 0; text-transform: capitalize !important;"
                                                        align="right">
                                                        <?php if($item->refundRequest && $item->refundRequest->refund_status == 'refunded'): ?>
                                                            (<?php echo e($item->refundRequest->refund_status); ?>)
                                                        <?php endif; ?>
                                                        <strong><?php echo e(formatPrice($item->total_price)); ?>

                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" style="background: #e4e4e4;" colspan="4"></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="#ffffff">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                        class="fullTable" bgcolor="#ffffff">
                        <tbody>
                            <tr>
                                <td>
                                    <!-- Table Total -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                        align="center" class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <?php echo e(localize('Subtotal')); ?>

                                                </td>
                                                <td style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;"
                                                    width="80">
                                                    <?php echo e(formatPrice($order->orderGroup->sub_total_amount)); ?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <?php echo e(localize('Tips')); ?>

                                                </td>
                                                <td style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;"
                                                    width="80">
                                                    <?php echo e(formatPrice($order->orderGroup->total_tips_amount)); ?>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td
                                                    style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <?php echo e(localize('Shipping Cost')); ?>

                                                </td>
                                                <td
                                                    style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <?php echo e(formatPrice($order->orderGroup->total_shipping_cost)); ?>

                                                </td>
                                            </tr>

                                            <?php if($order->orderGroup->total_coupon_discount_amount > 0): ?>
                                                <tr>
                                                    <td
                                                        style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <?php echo e(localize('Coupon Discount')); ?>

                                                    </td>
                                                    <td
                                                        style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <?php echo e(formatPrice($order->orderGroup->total_coupon_discount_amount)); ?>

                                                    </td>
                                                </tr>
                                            <?php endif; ?>

                                            <tr>
                                                <td
                                                    style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <?php echo e(localize('Tax')); ?>

                                                </td>
                                                <td
                                                    style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <?php echo e(formatPrice($order->orderGroup->total_tax_amount)); ?>

                                                </td>
                                            </tr>

                                            <?php if($order->orderGroup->is_pos_order): ?>
                                                <tr>
                                                    <td
                                                        style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <?php echo e(localize('Discount')); ?>

                                                    </td>
                                                    <td
                                                        style="font-size: 12px; color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; ">
                                                        <?php echo e(formatPrice($order->orderGroup->total_discount_amount)); ?>

                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td
                                                    style="font-size: 12px; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <strong><?php echo e(localize('Grand Total')); ?></strong>
                                                </td>
                                                <td
                                                    style="font-size: 12px; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                                                    <strong><?php echo e(formatPrice($order->orderGroup->grand_total_amount)); ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /Table Total -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    

    
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
        bgcolor="#ffffff">

        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                    class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                    <tr>
                    <tr class="hiddenMobile">
                        <td height="30"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="20"></td>
                    </tr>
                    <td>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                            class="fullPadding">
                            <tbody>
                                <tr>
                                    <td
                                        style="font-size: 12px; color: #5b5b5b; line-height: 18px; vertical-align: top; text-align: left;">
                                        <p
                                            style="font-size: 12px; color: #5b5b5b; line-height: 18px; vertical-align: top; text-align: left;">
                                            <?php echo e(localize('Hello')); ?>

                                            <strong><?php echo e(optional($order->user)->name); ?>,</strong>
                                            <br>
                                            <?php echo e(getSetting('invoice_thanksgiving')); ?>

                                        </p>
                                        <br><br>
                                        <p
                                            style="font-size: 12px; color: #5b5b5b; line-height: 18px; vertical-align: top; text-align: left;">
                                            <?php echo e(localize('Best Regards')); ?>,
                                            <br><?php echo e(getSetting('system_title')); ?> <br>
                                            <?php echo e(localize('Email')); ?>: <?php echo e(getSetting('topbar_email')); ?><br>
                                            <?php echo e(localize('Website')); ?>: <?php echo e(env('APP_URL')); ?>

                                        </p>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
    
</body>

</html>
<?php /**PATH C:\xampp\htdocs\skin_oasis\resources\views/backend/pages/orders/invoice.blade.php ENDPATH**/ ?>