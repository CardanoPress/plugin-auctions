<?php

/**
 * Page template for displaying all auctions.
 *
 * This can be overridden by copying it to yourtheme/archive-auction.php.
 *
 * @package ThemePlate
 * @since   0.1.0
 */

cardanoPress()->compatibleHeader();

?>

<div class="container py-5">
    <ul>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <li class="my-3">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<?php

cardanoPress()->compatibleFooter();
