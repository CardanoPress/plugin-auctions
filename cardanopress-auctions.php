<?php

/**
 * Plugin Name: CardanoPress - Auctions
 * Plugin URI:  https://github.com/CardanoPress/plugin-auctions
 * Author:      Gene Alyson Fortunado Torcende
 * Author URI:  https://cardanopress.io
 * Description: A CardanoPress extension for auctions.
 * Version:     0.1.0
 * License:     GPL-2.0-only
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: cardanopress-auctions
 *
 * Requires at least: 5.9
 * Requires PHP:      7.4
 *
 * Requires Plugins: cardanopress
 *
 * @package ThemePlate
 * @since   0.1.0
 */

// Accessed directly
if (! defined('ABSPATH')) {
    exit;
}

use CardanoPress\Auctions\Application;
use CardanoPress\Auctions\Installer;

/* ==================================================
Global constants
================================================== */

if (! defined('CP_AUCTIONS_FILE')) {
    define('CP_AUCTIONS_FILE', __FILE__);
}

// Load the main plugin class
require_once plugin_dir_path(CP_AUCTIONS_FILE) . 'dependencies/vendor/autoload_packages.php';

// Instantiate the updater
EUM_Handler::run(CP_AUCTIONS_FILE, 'https://raw.githubusercontent.com/CardanoPress/plugin-auctions/main/update-data.json');

function cpAuctions(): Application
{
    static $application;

    if (null === $application) {
        $application = new Application(CP_AUCTIONS_FILE);
    }

    return $application;
}

// Instantiate
cpAuctions()->setupHooks();
(new Installer(cpAuctions()))->setupHooks();
