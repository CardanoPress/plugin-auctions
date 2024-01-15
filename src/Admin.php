<?php

/**
 * @package ThemePlate
 * @since   0.1.0
 */

namespace CardanoPress\Auctions;

use CardanoPress\Auctions\Dependencies\ThemePlate\CPT\PostType;
use CardanoPress\Dependencies\ThemePlate\Meta\PostMeta;
use CardanoPress\Foundation\AbstractAdmin;

class Admin extends AbstractAdmin
{
    public const OPTION_KEY = 'cp-auctions';

    protected function initialize(): void
    {
    }

    public function setupHooks(): void
    {
        $this->registerPostType();
        $this->auctionSettingsMetaBox();

        add_action(Installer::DATA_PREFIX . 'activating', [$this, 'pluginActivating']);
    }

    public function pluginActivating(): void
    {
        $this->registerPostType();
        flush_rewrite_rules();
    }

    private function registerPostType(): void
    {
        $postType = new PostType('auction', [
            'menu_position' => 5,
            'menu_icon' => 'dashicons-hammer',
            'supports' => ['title', 'editor'],
            'has_archive' => true,
        ]);

        $postType->register();
    }

    private function auctionSettingsMetaBox(): void
    {
        $postMeta = new PostMeta(__('Auction Settings', 'cardanopress-auctions'), [
            'data_prefix' => 'auction_',
        ]);

        $postMeta->fields([
            'address' => [
                'title' => __('Wallet Address', 'cardanopress-auctions'),
                'type' => 'text',
            ],
            'amount' => [
                'title' => __('Amount in ADA', 'cardanopress'),
                'type' => 'number',
                'default' => 1,
                'options' => [
                    'min' => 0.1,
                    'step' => 0.1,
                ],
            ],
        ]);

        $postMeta->location('auction')->create();
    }
}
