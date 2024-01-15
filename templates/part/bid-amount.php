<?php

/**
 * The template for displaying the bid amount field.
 *
 * This can be overridden by copying it to yourtheme/cardanopress/auctions/part/bid-amount.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

?>

<div class="row">
    <label for="payment-quantity" class="col-sm-auto col-form-label">Amount</label>

    <div class="col-sm">
        <?php echo do_shortcode('[cardanopress_template name="part/payment-quantity"]'); ?>
    </div>
</div>
