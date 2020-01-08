<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://captainform.com
 * @since             2.0.0
 * @package           Captainform
 *
 * @wordpress-plugin
 * Plugin Name:       CaptainForm
 * Plugin URI:        http://captainform.com
 * Description:       CaptainForm is a fully-featured WordPress form plugin created for web designers, developers, and also for non-tech savvy users.
 * Version:           2.5.3
 * Author:            captainform
 * Author URI:        https://profiles.wordpress.org/captainform
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       captainform
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-captainform-activator.php
 */
function activate_captainform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-captainform-activator.php';
	Captainform_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-captainform-deactivator.php
 */
function deactivate_captainform() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-captainform-deactivator.php';
	Captainform_Deactivator::deactivate();
}

/**
 * The code that runs during plugin uninstall.
 */
function uninstall_captainform() {
}

register_activation_hook( __FILE__, 'activate_captainform' );
register_deactivation_hook( __FILE__, 'deactivate_captainform' );
register_uninstall_hook(__FILE__, 'uninstall_captainform');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-captainform.php';

/**
 * The file that contains the function call for the plugin
 */
require plugin_dir_path( __FILE__ ) . 'includes/captainform-function-call.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.0
 */
function run_captainform() {

	$plugin = new Captainform();
	$plugin->run();

}
run_captainform();

/**
 * Block Initializer.
 */
global $wp_version;
if ( version_compare( $wp_version, '5.0', '>=' ) ) {
	include plugin_dir_path( __FILE__ ) . 'admin/gutenberg/init.php';
}
