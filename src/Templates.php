<?php

/**
 * @package ThemePlate
 * @since   0.1.0
 */

namespace CardanoPress\Auctions;

use CardanoPress\Foundation\AbstractTemplates;

class Templates extends AbstractTemplates
{
    public const OVERRIDES_PREFIX = 'cardanopress/auctions/';

    protected function initialize(): void
    {
    }

    protected function getLoaderFile(): string
    {
        $template = '';

        if (is_singular('auction')) {
            $template = 'single-auction.php';
        } elseif (is_post_type_archive('auction')) {
            $template = 'archive-auction.php';
        }

        return $template;
    }
}
