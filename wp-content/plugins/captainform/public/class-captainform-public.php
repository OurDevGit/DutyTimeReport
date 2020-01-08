<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Captainform
 * @subpackage Captainform/public
 * @author     captainform <team@captainform.com>
 */
class Captainform_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private static $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private static $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      2.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version = $version;

	}
	
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_styles() {
        //We moved this in FORM-RESOURCES-LOADER so it's loaded only if we have a form on the page
		//wp_enqueue_style( 'captainform_public_css', plugin_dir_url( __FILE__ ) . 'css/captainform-public.css', array(), self::$version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_scripts() {

		//wp_enqueue_script( 'captainform_public_js', plugin_dir_url( __FILE__ ) . 'js/captainform-public.js', array( 'jquery' ), self::$version, false );

	}

}
