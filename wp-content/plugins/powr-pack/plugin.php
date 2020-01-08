<?php
/**
 * Plugin Name: POWr Pack
 * Plugin URI: https://www.powr.io/plugins
 * Description: Free tools to grow any business or blog. Expand your mailing list, capture more leads, and get more shares on Facebook, Instagram, Twitter & more. Drop the widget anywhere in your theme. Or use the POWr icon in your WP text editor to add to a page or post. Edit on your live page by clicking the settings icon. More plugins and tutorials at POWr.io.
 * Author: POWr.io
 * Author URI: https://www.powr.io
 * Version: 2.0
 * License: All Rights Reserved
 *
 * @package POWr
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Glutenberg Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/block.php';

/**
 * POWr Pack Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/pack.php';
