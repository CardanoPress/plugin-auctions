<?php

/**
 * The template for displaying the wallet details for the auction.
 *
 * This can be overridden by copying it to yourtheme/cardanopress/auctions/wallet-details.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

if (empty($address)) {
    return;
}

$data = compact('address');

?>

<div class="row align-items-center">
    <p class="fs-5 col-sm-auto col-form-label">Address</p>

    <div class="col-sm">
        <span class="input-group" x-data="<?php echo esc_attr(json_encode($data)); ?>">
            <input x-bind:value="address" type="text" class="form-control" readonly disabled>
            <button class="btn btn-outline-secondary" @click.prevent="clipboardValue(address)">Copy</button>
        </span>
    </div>
</div>

<div class="row align-items-center">
    <p class="fs-5 col-sm-auto col-form-label">Balance:</p>

    <div class="col-sm fs-6 italic">
        <?php cPAuctions()->template('part/wallet-balance', $data + array('unit' => 'ada')); ?> ADA
        (<?php cPAuctions()->template('part/wallet-balance', $data); ?> Lovelace)
    </div>
</div>
