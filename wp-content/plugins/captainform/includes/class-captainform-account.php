<?php
/**
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

/**
 * This class responsible for maintaining and registering all account settings.
 *
 * @since      2.0.0
 * @package    Captainform
 * @subpackage Captainform/includes
 * @author     captainform <team@captainform.com>
 */
class Captainform_Account
{
	
	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string     $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected static $plugin_name;
	
	/**
	 * The current version of the plugin.
	 *
	 * @since    2.0.0
	 * @access   protected
	 * @var      string     $version    The current version of the plugin.
	 */
	protected static $version;
	
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since   2.0.0
	 * @param   string  $plugin_name  The name of this plugin.
	 * @param   string  $version      The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		
		self::$plugin_name = $plugin_name;
		self::$version = $version;
		
	}
	
	/**
     * The method that generates the installation ID option for the captainform plugin
     *
     * @since    2.0.0
	 * @return   string
	 */
	public static function generate_installation_id()
	{
		$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		
		$admin_email = get_site_option("admin_email");
		$timestamp = dechex(time());
		
		$neededChars = 13 - strlen($timestamp);
		$rand = substr(str_shuffle($alphanum), 0, $neededChars);
		
		$computedId = $timestamp . $rand . "." . $admin_email;
		
		if (strlen($computedId) >= 58)
			$computedId = substr($computedId, -58);
		
		return $computedId;
	}
	
	/**
     * The method that generates the installation key option for the captainform plugin
     *
     * @since   2.0.0
	 * @return  string
	 */
	public static function generate_installation_key()
	{
		$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$installation_key = md5(substr(str_shuffle($alphanum), 0, 15));
		
		return $installation_key;
	}
	
	/**
     * The method that updates the URL of the website when it has changed
     *
	 * @since   2.0.0
	 */
	public static function update_website_url()
	{
		update_site_option('captainform_site_url', get_site_option("siteurl"));
	}
	
	/**
     * The method that generates a new set of credentials for the captainform plugin
     *
	 * @since   2.0.0
	 */
	public static function generate_new_credentials()
	{
		$installation_id = self::generate_installation_id();
		update_site_option('captainform_installation_id', $installation_id);
		
		$installation_key = self::generate_installation_key();
		update_site_option('captainform_installation_key', $installation_key);
		
		self::update_website_url();
	}
	
	/**
     * This method checks if the credentials for the plugin are good and displays the error message if needed
     *
     * @since   2.0.0
	 * @return  bool|mixed
	 */
	public static function check_credentials_error()
	{
		$site_url = get_site_option('captainform_site_url');
        $site_url = str_replace(array('https://www.', 'http://www.', 'https://', 'http://', 'www.'), '', $site_url);
		$site = get_site_option("siteurl");
        $site = str_replace(array('https://www.', 'http://www.', 'https://', 'http://', 'www.'), '', $site);
		
		if (!empty($site_url) && $site_url != $site) {
			if (isset($_POST['captainform_reset_keys'])) {
				if (intval($_POST['captainform_reset_keys']) == 1)
					self::generate_new_credentials();
				else {
					self::update_website_url();
					
					return $site;
				}
				
				return true;
			}
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/captainform-admin-plugin-credentials-error.php';
			
			return false;
		}
		
		return true;
	}
	
	/**
     * The method that sets the options for the plugin if they are not set
     *
	 * @since    2.0.0
	 */
	public function check_account_settings()
	{
		if (get_site_option('captainform_installation_id') == '') {
			add_site_option('captainform_installation_id', self::generate_installation_id());
		}
		
		if (get_site_option('captainform_installation_key') == '') {
			add_site_option('captainform_installation_key', self::generate_installation_key());
		}
		
		if (get_site_option('captainform_site_url') == '') {
			add_site_option('captainform_site_url', get_site_option("siteurl"));
		}
	}
}
