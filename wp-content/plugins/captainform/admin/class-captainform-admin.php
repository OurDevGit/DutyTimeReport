<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Captainform
 * @subpackage Captainform/admin
 * @author     captainform <team@captainform.com>
 */
class Captainform_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      2.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function add_menu_items() {
		if (current_user_can('manage_options')) {
			add_menu_page('CaptainForm', 'CaptainForm', 'manage_options', 'CaptainForm', array($this, 'admin_page_handler'), plugins_url('/images/captainform-18.png', __FILE__), '6.000000000000000000123123123123123123123'
			);
			add_submenu_page('CaptainForm', 'CaptainForm', 'My Forms', 'manage_options', 'CaptainForm', array($this, 'admin_page_handler'));
			add_submenu_page('CaptainForm', 'NewForm', 'New Form', 'manage_options', 'CaptainForm-NewForm', array($this, 'admin_page_handler'));
			add_submenu_page('CaptainForm', 'MyAccount', 'My Account', 'manage_options', 'CaptainForm-MyAccount', array($this, 'admin_page_handler'));
			add_submenu_page('CaptainForm', 'ChangePlan', 'Change Plan', 'manage_options', 'CaptainForm-ChangePlan', array($this, 'admin_page_handler'));
			add_submenu_page('CaptainForm', 'Support', 'Support', 'manage_options', 'CaptainForm-Support', array($this, 'admin_page_handler'));
			
			add_options_page('CaptainForm Options', 'CaptainForm', 'manage_options', 'CaptainFormOptions', array($this, 'admin_page_handler'));
		}
		
		remove_menu_page('edit.php?post_type=' . 'captainform_post');
	}
	
	public function admin_page_handler()
	{
		$credentials_check = Captainform_Account::check_credentials_error();
		if (!$credentials_check) return false;
		
		$installation_id = get_site_option('captainform_installation_id');
		$installation_key = get_site_option('captainform_installation_key');
		$site = get_site_option("siteurl");
		$site_real = get_option("siteurl");
		
		$current_user = wp_get_current_user();
		$display_name = $current_user->data->display_name;
		
		$page_protocol = parse_url(site_url(), 0);
		$unique_id = current(explode('.', $installation_id));
		if(!strlen($unique_id))
			$unique_id = uniqid('unique_') . '_' . md5(uniqid('', true));

		$iframe_domain = strtolower('wp-' . $unique_id . '.app.captainform.com');
		
		$iframe_url = strtolower($page_protocol) . '://' . $iframe_domain . "/fh-connect.php?" .
			"inst=" . Captainform_Encrypt::encrypt($installation_id) .
			"&key=" . Captainform_Encrypt::encrypt($installation_key) .
			"&site=" . Captainform_Encrypt::encrypt($site) .
			"&site_real=" . Captainform_Encrypt::encrypt($site_real) .
			"&display_name=" . Captainform_Encrypt::encrypt($display_name) .
			"&page=" . $_GET['page'] .
			"&is_multisite=" . var_export(is_multisite(), true) .
			"&wp_version=" . Captainform_Encrypt::encrypt($this->version) .
			"&wp_php=" . Captainform_Encrypt::encrypt(phpversion()) .
            "&admin_url=" . Captainform_Encrypt::encrypt(get_admin_url()) .
			$this->get_referer_param();
		
		if(gettype($credentials_check) == 'string')
			$iframe_url .= '&wp_url_changed=true';
		
		switch ($_GET['page']) {
			case "CaptainForm":
			case 'CaptainForm-NewForm':
			case 'CaptainForm-MyAccount':
			case 'CaptainForm-ChangePlan':
			case 'CaptainForm-Support':
				if (isset($_GET['cf_form_id'])) {
					ob_end_clean();
					require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-captainform-preview.php';
					Captainform_Preview::preview_form();
				}
				$this->enqueue_admin_page_styles();
				$this->enqueue_admin_page_scripts();
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/captainform-admin-display.php';
				break;
			case "Captainform-Preview":
				break;
			case "CaptainFormOptions":
				$this->options_page();
				break;
			default:
				break;
		}
	}
	
	private function options_page() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/captainform-admin-plugin-options.php';
	}
	
	private function get_referer_param() {
		$plugin_referer = '';
		$myref = plugin_dir_url( __FILE__ ) . '/referer.php';
		if (file_exists($myref)) {
			require_once($myref);
			$plugin_referer = '&plugin_referer=' . $captainform_referer;
		}
		return $plugin_referer;
	}
	
	public function enqueue_admin_page_styles(){
		wp_enqueue_style('captainform_iframe_popup', plugin_dir_url( __FILE__ ) . 'css/iframe_popup.css', false, $this->version);
		wp_enqueue_style('captainform_form_popup', plugin_dir_url( __FILE__ ) . 'css/form_popup.css', false, $this->version);
		wp_enqueue_style('captainform_review_css', plugin_dir_url( __FILE__ ) . 'css/review.css', false, $this->version);
		if (strpos(getenv("HTTP_USER_AGENT"), "Mac") !== FALSE) {
			wp_enqueue_style('captainform_iframe_popup', plugin_dir_url( __FILE__ ) . 'css/wp_captainform_os.css', false, $this->version);
		}
	}
	
	private function enqueue_admin_page_scripts(){
		wp_enqueue_script('captainform_form_popup', plugin_dir_url( __FILE__ ) . 'js/captainform-form-popup.js', array('jquery'), $this->version, false);
		wp_enqueue_script('captainform_iframe_resizer', plugin_dir_url( __FILE__ ) . 'js/iframeResizer.min.js', array(), '3.5', false);
		wp_enqueue_script('captainform_main_js', plugin_dir_url( __FILE__ ) . 'js/captainform-main.js', array(), $this->version, false);
		wp_enqueue_script('captainform_reviews_js', plugin_dir_url( __FILE__ ) . 'js/review.js', array(), $this->version, false);
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_styles() {
		
		wp_enqueue_style( 'captainform_admin_css', plugin_dir_url( __FILE__ ) . 'css/captainform-admin.css', array(), $this->version, 'all' );
		
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'captainform_admin_js', plugin_dir_url( __FILE__ ) . 'js/captainform-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register the settings for captainform.
	 *
	 * @since    2.0.0
	 */
	public function register_settings() {
		register_setting('cf_wpp_settings_group', 'cf_wpp_settings');
	}
	
	/**
	 * Register the external plugins needed for tinymce to display the captainform popup
	 *
	 * @since    2.0.0
	 */
	public function register_mce_external_plugins($plugin_array) {
		$plugin_path = plugin_dir_url(plugin_dir_path(__FILE__));

		$plugin_array['captainform_chosen'] = $plugin_path . 'admin/js/chosen.jquery.js';
		$plugin_array['captainform_jscolor'] = $plugin_path . 'admin/js/jscolor/jscolor.js';
		$plugin_array['captainform_widget_js'] = $plugin_path . 'admin/js/widget.js';
		
		return $plugin_array;
		array_push($buttons, 'separator', 'captainform');
		return $buttons;
	}
	
	/**
	 * Register the scripts for the media button
	 *
	 * @since    2.2.1
	 */
	public function register_media_scripts() {
		wp_enqueue_style('cf-widget-css', plugin_dir_url( __FILE__ ) . 'css/widget.css', array(), $this->version);
		wp_enqueue_style('', plugin_dir_url( __FILE__ ) . 'css/publish_lightbox_posts.css', array(), $this->version);
		wp_enqueue_style('captainform_admin_css', plugin_dir_url( __FILE__ ) . 'css/chosen/chosen.css', array(), $this->version);
		wp_enqueue_style('captainform_iframe_popup', plugin_dir_url( __FILE__ ) . 'css/iframe_popup.css', array(), $this->version);

		wp_enqueue_script( 'cf_widget_js', plugin_dir_url( __FILE__ ) . 'js/widget.js', array(), $this->version, false );
		wp_enqueue_script( 'captainform_admin_js', plugin_dir_url( __FILE__ ) . 'js/wp-editor-captainform-media-button.js', array(), $this->version, false );
		wp_enqueue_script( 'cf_chosen_js', plugin_dir_url( __FILE__ ) . 'js/chosen.jquery.js', array(), $this->version, false );
		wp_enqueue_script( 'cf_color_picker_js', plugin_dir_url( __FILE__ ) . 'js/jscolor/jscolor.js', array(), $this->version, false );
		wp_enqueue_script('thickbox',null,array('jquery'));
		wp_enqueue_style( 'thickbox' );

	}

    /**
     * Add the media button for the CaptainForm plugin
     *
     * @since    2.2.1
     */
	function add_captainform_media_button() {
		?>
			<a id="captainform-123" class="button thickbox" onclick="captainformShowThickBox()">
				<img src="<?=plugin_dir_url(plugin_dir_path(__FILE__))?>admin/images/captainform-18.png"> CaptainForm
			</a>
		<?php
	}

	function mce_insert_dialog() {
		$response = Captainform_Utils::get_remote_forms('page_or_post');
		$captainform_forms_controls = isset($response->controls) ? $response->controls :  array();
		$captainform_display_as_lightbox_name = "cf_display_as_lightbox_name";
		$captainform_use_custom_vars_name = "cf_use_custom_vars_name";
		$captainform_trigger_option_name = "cf_trigger_option_name";
		$captainform_selected_trigger = 0;
		$captainform_trigger_0_name = "cf_trigger_0_name";
		$captainform_trigger_0_text = "Contact Us";
		$captainform_trigger_1_name = "cf_trigger_1_name";
		$captainform_trigger_1_url = plugins_url('/public/images/publish_lighbox_default_image_v2.png', dirname(__FILE__));
		$captainform_trigger_2_text_name = "cf_trigger_2_text_name";
		$captainform_trigger_2_text = "Contact us";
		$captainform_trigger_2_position_name = "cf_trigger_2_position_name";
		$captainform_trigger_2_position = 1;
		$captainform_trigger_2_background_name = "cf_trigger_2_background_name";
		$captainform_trigger_2_background = "FF0000";
		$captainform_trigger_2_color_name = "cf_trigger_2_color_name";
		$captainform_trigger_2_color = "FFFFFF";
		$captainform_trigger_3_after_name = "cf_trigger_3_after_name";
		$captainform_trigger_3_after = 3;

		$captainform_auto_popup_trigger_option_name = 'captainform_auto_popup_trigger';
		$captainform_auto_popup_selected_trigger = 1;
		?>
		<script type="text/javascript">
			var pluginUrlPath = '<?=plugin_dir_url(plugin_dir_path(__FILE__))?>';
			var captainform_forms_controls = <?php echo json_encode($captainform_forms_controls);?>;
			captainformBindPagePostWidget(pluginUrlPath);
		</script>
		<?php
		if ($response->status == 'ok') {
			$captainform_publish_code_value = "";
			?>
			<div class="captainform_widget_container">
				<div class="captainform_space">
				<b>Select the form you want to embed:</b>
				<br>
				<select name="captainform_form_toembed"
						id="captainform_form_toembed"
						class="captainform_widget_select">
					<?php
					$first_form_id = null;
					foreach ($response->forms as $form) {
						if ($captainform_publish_code_value == "")
							$captainform_publish_code_value = '[captainform id="' . $form->f_id . '"]';
						?>
						<option value="<?php echo $form->f_id; ?>"><?php echo $form->f_name; ?></option>
						<?php
					}
					?>
				</select>
				<div id="captainform_publish_lightbox_main_container">
					<?php
					require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/captainform-admin-publish-options.php';
					?>
					<br/>
					<input type="hidden" id="captainform_publish_code"
						   name="<?php if (isset($captainform_lightbox_publish_code_name)) echo $captainform_lightbox_publish_code_name; ?>"
						   class="cf_generated_code" value='<?php echo $captainform_publish_code_value; ?>'/>
					<input type="hidden" id="captainform_custom_vars_code" class="captainform_custom_vars_code" value=''/>
					<div class="clear"></div>
				</div>
			</div>
			</div>
			<div class="clear"></div>
			<div class="footer-button">
				<button id="captainform-button-insert"  class="button button-primary captainform-insert" value="Insert form" onclick="captainformInsertShortcode();">Insert form</button>
				<button id="captainform-button-cancel" class="button" value="Cancel" onclick="captainformRemoveThickBox();">Cancel</button>
			</div>
			<?php
		} else {
			if ($response->error_message) {
				if (isset($response->error_code) && $response->error_code == 2) {
					echo "Create a form and return here to publish it";
				} elseif (isset($response->error_code) && $response->error_code == 1) {
					echo "Please activate your account first! Go to the CaptainForm tab and enter your license key or activate your free account. Create a form and return here to publish it.";
				} else
					echo $response->error_message;
			} else
				echo 'Fatal error - ' . $response->status;
		}
		exit();
	}
}
