<?php

/**
 * The template for displaying the bid form.
 *
 * This can be overridden by copying it to yourtheme/cardanopress/auctions/bid-form.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

if (empty($address)) {
    return;
}

if (empty($amount)) {
    $amount = 1;
}

$attributes = 'data-address=' . esc_attr($address) . ' data-amount=' . esc_attr($amount);

?>

<form x-data="paymentForm" <?php echo esc_html($attributes); ?>>
    <div class="my-3">
        <?php cPAuctions()->template('part/bid-amount'); ?>
    </div>

    <div class="my-3">
        <?php echo do_shortcode('[cardanopress_template name="part/payment-button" variables="text=Submit"]'); ?>
    </div>

    <div class="my-3">
        <?php echo do_shortcode('[cardanopress_template name="part/payment-output" if="transactionHash"]'); ?>
    </div>
</form>
