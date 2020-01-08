<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      2.0.0
 * @package    Captainform
 * @subpackage Captainform/includes
 * @author     captainform <team@captainform.com>
 */
class Captainform {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      Captainform_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;
	
	/**
	 * The class that's responsible for maintaining and registering all account settings
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      Captainform_Account    $account	Maintains and registers all account settings for the plugin.
	 */
	protected $account;
	
	/**
	 * The class responsible for defining all actions that occur in the admin area.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      Captainform_Account    $account	Maintains and registers all admin functionality.
	 */
	protected $admin;
	
	/**
	 * The class that's responsible for maintaining and registering the captainform widget
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      Captainform_Widget    $widget		Maintains and registers the widget for this plugin.
	 */
	protected $widget;
	
	/**
	 * The class that's responsible for captainform utilities
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      Captainform_Widget    $utils		Maintains and registers some utilities needed for this plugin.
	 */
	protected $utils;
	
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;
	
	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    2.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'captainform';
		$this->version = '2.5.3';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_general_hooks();
		
		if(defined( 'DOING_AJAX' ) && DOING_AJAX)
            $this->define_ajax_hooks();
		elseif ( is_admin() )
			$this->define_admin_hooks();
		else
			$this->define_public_hooks();

        $this->define_shortcodes();
    }

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Captainform_Loader. Orchestrates the hooks of the plugin.
	 * - Captainform_i18n. Defines internationalization functionality.
     * - Captainform_Widget. Handles the widgets
     * - Captainform_Shortcodes. Handles the shortcodes for the public side of the site.
     * - Captainform_Utils. Various functions needed
     * - Captainform_Encrypt. Handles the encryption of the params.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-captainform-loader.php';
		
		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-captainform-i18n.php';
		
		/**
		 * The class responsible for captainform widget.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-captainform-widget.php';

        /**
         * The class responsible for defining all shortcodes
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-captainform-shortcodes.php';

		/**
		 * The class responsible for captainform widget.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-captainform-utils.php';

        /**
         * The class responsible for encrypting strings
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/encryption/class-captainform-encrypt.php';

        if (!function_exists('is_plugin_active_for_network') && file_exists(ABSPATH . '/wp-admin/includes/plugin.php'))
            require_once( ABSPATH . '/wp-admin/includes/plugin.php');

        if($this->isForgeEnabled()) {
            /**
             * The class responsible for captainform forge element
             */
            require_once plugin_dir_path(dirname(__FILE__)) . 'includes/integrations/class-captainform-integration-forge-element.php';
        }

        if(defined( 'DOING_AJAX' ) && DOING_AJAX)
            $this->load_ajax_dependencies();
		elseif( is_admin() )
			$this->load_admin_dependencies();
		else
			$this->load_public_dependencies();

		$this->loader = new Captainform_Loader();
		$this->widget = new Captainform_Widget();
		$this->utils = new Captainform_Utils();
		
	}

    /**
     * Load the required dependencies for the ajax functionality of the plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Captainform_Integrations_Handler.
     * - Captainform_WP_Users
     * - Captainform_WP_Posts
     * - Captainform_WP_Submissions
     *
     * @since    2.0.0
     * @access   private
     */
    private function load_ajax_dependencies() {

        /**
         * The class responsible for maintaining and registering all account settings
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/integrations/class-captainform-integration-handler.php';

        /**
         * The class responsible for the WordPress posts integration
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/integrations/class-captainform-integration-posts.php';

        /**
         * The class responsible for the WordPress users integration
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/integrations/class-captainform-integration-users.php';

        /**
         * The class responsible for the WordPress Submissions integration
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/integrations/class-captainform-integration-submissions.php';
    }

	/**
	 * Load the required dependencies for the admin area functionality of the plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Captainform_Admin. Defines all hooks for the admin area.
	 * - Captainform_Account. Maintains and registers all account settings.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function load_admin_dependencies() {
		
		/**
		 * The class responsible for maintaining and registering all account settings
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-captainform-account.php';
		
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-captainform-admin.php';
		
		$this->admin = new Captainform_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->account = new Captainform_Account( $this->get_plugin_name(), $this->get_version() );
		
	}
	
	/**
	 * Load the required dependencies for the public-facing functionality of the plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Captainform_Public. Defines all hooks for the public side of the site.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function load_public_dependencies() {
		
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-captainform-public.php';

	}
	
	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Captainform_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Captainform_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
		
	}
	
	/**
	 * Register all of the hooks related both to the public-facing functionality and the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_general_hooks() {
		
		$php_version = phpversion();
		if ($php_version >= 5.3) {
			$this->loader->add_action( 'widgets_init', $this->widget, 'register_widget' );
		} else if ($php_version >= 5.2) {
			add_action(
				'widgets_init',
				create_function('', 'return register_widget("Captainform_Widget");')
			);
		}
		
		$this->loader->add_action( 'init', $this->utils, 'register_post_type' );
		$this->loader->add_action( 'init', $this->utils, 'session_start' );
		$this->loader->add_action( 'init', $this->utils, 'add_jquery' );

        if($this->isForgeEnabled()){
            $forge = new Captainform_ForgeElement($this->get_plugin_name(), $this->get_version());
            $this->loader->add_action( 'wp_enqueue_scripts', $forge, 'enqueue_styles' );
            $this->loader->add_filter( 'forge_elements', $forge, 'forge_element_metadata' );
        }

        $this->loader->add_action( 'admin_print_scripts-widgets.php', $this->widget, 'enqueue_styles' );
        $this->loader->add_action( 'admin_print_scripts-widgets.php', $this->widget, 'enqueue_scripts' );

        $this->loader->add_filter('autoptimize_filter_js_exclude', $this->utils, 'autoptimize_override_js_exclude');
	}
	
	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		
		$this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $this->admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $this->admin, 'add_menu_items' );
		$this->loader->add_action( 'admin_menu', $this->admin, 'register_settings' );
		
		$this->loader->add_action( 'init', $this->utils, 'ob_start' );
		
		$this->loader->add_action( 'wp_ajax_captainform_insert_dialog', $this->admin, 'mce_insert_dialog' );

		if (in_array($this->plugin_name . '/' . $this->plugin_name . '.php', get_option('active_plugins')) ||
            (function_exists('is_plugin_active_for_network') && is_plugin_active_for_network($this->plugin_name . '/' . $this->plugin_name . '.php'))) {

            	$this->loader->add_action('media_buttons', $this->admin, 'add_captainform_media_button');
            	$this->loader->add_filter('wp_enqueue_media', $this->admin, 'register_media_scripts');
            }
	    $this->loader->add_action( 'init', $this->account, 'check_account_settings' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Captainform_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		$this->loader->add_filter( 'widget_text', $this->widget, 'text_widget' );
	}
	
	/**
	 * Register all of the hooks related to WordPress ajax
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_ajax_hooks() {
		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-captainform-admin.php';
		
		$this->admin = new Captainform_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_ajax_captainform_insert_dialog', $this->admin, 'mce_insert_dialog' );

        foreach(Captainform_WP_Posts::get_integration_hooks() as $hook => $action){
            add_action('wp_ajax_' . $hook, array('Captainform_WP_Posts', $action));
            add_action('wp_ajax_nopriv_' . $hook, array('Captainform_WP_Posts', $action));
        }

        foreach(Captainform_WP_Users::get_integration_hooks() as $hook => $action){
            add_action('wp_ajax_' . $hook, array('Captainform_WP_Users', $action));
            add_action('wp_ajax_nopriv_' . $hook, array('Captainform_WP_Users', $action));
        }

        foreach(Captainform_WP_Submissions::get_integration_hooks() as $hook => $action){
            add_action('wp_ajax_' . $hook, array('Captainform_WP_Submissions', $action));
            add_action('wp_ajax_nopriv_' . $hook, array('Captainform_WP_Submissions', $action));
        }
	}
	
	/**
	 * Register all the shortcodes
	 * of the plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 */
	private function define_shortcodes() {
		
		$plugin_shortcodes = new Captainform_Shortcodes( $this->get_plugin_name(), $this->get_version() );
		
		$this->loader->add_shortcode( 'captainform', $plugin_shortcodes, 'evaluate' );
		$this->loader->add_shortcode( 'captain-form', $plugin_shortcodes, 'evaluate' );
        $this->loader->add_filter( 'the_excerpt', $plugin_shortcodes, 'evaluate_excerpt' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    2.0.0
	 */
	public function run() {
		$this->loader->run();
	}

    /**
     * Check whether or not Forge plugin is enabled
     *
     * @since     2.0.0
     * @return bool
     */
	private function isForgeEnabled(){
	    return
            in_array('forge/forge.php', get_option('active_plugins')) ||
            (function_exists('is_plugin_active_for_network') && is_plugin_active_for_network('forge/forge.php'));
    }

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     2.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     2.0.0
	 * @return    Captainform_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     2.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
