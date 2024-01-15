<?php

/**
 * Page template for displaying an auction.
 *
 * This can be overridden by copying it to yourtheme/single-auction.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

$postId = get_the_ID();
$address = get_post_meta($postId, 'auction_address', true);
$amount = get_post_meta($postId, 'auction_amount', true);

get_header();

?>

<div id="auction-<?php echo esc_attr($postId); ?>" class="py-5">
    <div class="container">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <h2><?php the_title(); ?></h2>

            <div class="py-6">
                <?php the_content(); ?>
            </div>

            <?php if ($address && $amount) : ?>
                <div class="py-6">
                    <?php cPAuctions()->template('wallet-details', compact('address')); ?>
                </div>

                <hr style="color: #47525e;">

                <div class="py-6">
                    <h3 class="fs-3">Make a Bid</h3>

                    <?php cPAuctions()->template('bid-form', compact('address', 'amount')); ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</div>

<?php

get_footer();
