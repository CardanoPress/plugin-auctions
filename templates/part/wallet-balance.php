<?php

/**
 * The template for displaying the auction wallet balance.
 *
 * This can be overridden by copying it to yourtheme/cardanopress/auctions/part/wallet-balance.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

if (empty($address)) {
    return;
}

if (empty($unit)) {
    $unit = 'lovelace';
}

$attributes = 'address="' . $address . '" unit="' . $unit . '"';

?>

<span><?php echo do_shortcode('[cardanopress_wallet_balance ' . $attributes . ']'); ?></span>
