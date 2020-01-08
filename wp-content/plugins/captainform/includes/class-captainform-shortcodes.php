<?php

/**
 * Register all shortcodes for the plugin
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

/**
 * Register all shortcodes for the plugin.
 *
 * Maintain a list of all shortcodes that are registered throughout
 * the plugin, and register them with the WordPress API.
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 * @author     captainform <team@captainform.com>
 */
class Captainform_Shortcodes {

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
	 * The array of actions registered with WordPress.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      array    $shortcodes    The shortcodes registered with WordPress to fire when the plugin loads.
	 */
	protected $shortcodes;

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
	 * A utility function that is used to register the shortcodes into a single collection.
	 *
	 * @since   2.0.0
	 * @access  private
	 *
	 * @param   array   $atts   The collection of hooks that is being registered (that is, actions or filters).
	 *
	 * @return  string
	 */
	public function evaluate( $atts ) {

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-captainform-public-form-embedding.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-captainform-public-form-resource-loader.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-captainform-public-form-custom-vars.php';

        $form_embedding = new Captainform_FormEmbedding($atts, self::$plugin_name, self::$version);
        return $form_embedding->run();

	}

    /**
     * @since    2.0.0
     * @access   private
     * @return   string
     */
	private function remove_shortcode(){
        return '';
    }

    /**
     * @since   2.0.0
     * @param   $content
     * @return  string
     */
	public function evaluate_excerpt($content){
        $pattern = '/\[[^\[]*captain-?form[^\]]*\]/';
	    return preg_replace_callback($pattern, array($this, 'remove_shortcode'), $content);
    }

}
