<?php
/**
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

/**
 * This class contains some utilities needed for the plugin.
 *
 * @since      2.0.0
 * @package    Captainform
 * @subpackage Captainform/includes
 * @author     captainform <team@captainform.com>
 */
class Captainform_Utils
{
	/**
	 * Get the forms from the remote host.
	 *
	 * @since      2.0.0
	 *
	 * @param      string $publish_method The name of this plugin.
	 * @param      int    $count          The version of this plugin.
	 *
	 * @return array|bool|mixed|object
	 */
	public static function get_remote_forms($publish_method, $count = 2)
	{
		$remote_url = 'http://app.captainform.com/wp_dispatcher.php?' .
			'app_id=' . urlencode(get_site_option('captainform_installation_id')) .
			'&app_key=' . urlencode(get_site_option('captainform_installation_key'));
		
		if ($publish_method && $count == 2)
			$remote_url .= '&publish_method=' . $publish_method;
		
		$result = wp_remote_fopen($remote_url);
		if ($result === false)
			return false;
		
		return json_decode($result);
	}
	
	/**
	 * Starts the session if it's not started already
	 *
	 * @since      2.0.0
	 */
	public function session_start() {
		if (!session_id())
			@session_start(array('cookie_lifetime' => 86400));
	}
	
	/**
	 * Starts the output buffer so we can display the form preview
	 *
	 * @since      2.0.0
	 */
	public function ob_start() {
		ob_start();
	}
	
	/**
	 * Adds jQuery to WordPress
	 * BugFix for WP4.4.2 + Twenty Ten Theme
	 *
	 * @since      2.0.0
	 */
	public function add_jquery() {
		wp_enqueue_script('jquery');
	}
	
	/**
	 * Register the captainform custom post type.
	 *
	 * @since    2.0.0
	 */
	public function register_post_type() {
		register_post_type('captainform_post', array(
			'public' => true,
			'show_in_nav_menus' => false,
			'exclude_from_search' => true,
			'show_ui' => false,
		));
	}

    /**
     * JS optimization exclude strings, as configured in admin page.
     *
     * @since   2.1.3
     * @param   $exclude : comma-separated list of exclude strings
     * @return  string : comma-seperated list of exclude strings
     */
    public function autoptimize_override_js_exclude($exclude) {
        return $exclude . ', captainform-form-popup, captainform-main, iframeResizer.min';
    }

    /**
     * @since    2.0.0
     * @param    string $param
     * @return   string
     */
    private static function get_referer_params($param = '') {
        $file_exists = false;
        $file = plugin_dir_path(dirname(__FILE__)) . 'referer.php';
        if (file_exists($file)) {
            require_once($file);
            $file_exists = true;
        }
        if ($param == 'unique_id') {
            if ($file_exists && isset($captainform_unique_id) && $captainform_unique_id) {
                return $captainform_unique_id;
            }
            return 'captainform_' . substr(md5(get_site_url()),-12);
        }
        if ($param == 'source') {
            if ($file_exists && isset($captainform_referer) && $captainform_referer) {
                return $captainform_referer;
            }
            return 'plugin_directory';
        }
        return '';
    }
	
}
