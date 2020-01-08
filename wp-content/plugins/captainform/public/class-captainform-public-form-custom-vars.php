<?php

/**
 * The class that handles the custom variables
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/public
 */

/**
 * The custom variables class
 *
 * Gets all the custom variables (shortcode, URL) and returns them in a string format.
 *
 * @package    Captainform
 * @subpackage Captainform/public
 * @author     captainform <team@captainform.com>
 */
class Captainform_FormCustomVars {

    /**
     * The form options.
     *
     * @since    2.0.0
     * @access   private
     * @var      array    $version    An array containing all the form options.
     */
    private $shortcodeOptions;

	/**
	 * Get Custom options for Wordpress Logged In users
	 *
	 * @since 2.1.6
	 * @access private
	 * @var array Options and identifier for $current_user
	 */
	private $wordpressShortcodeOptions = array(
		'WORDPRESS_USERNAME' => 'user_login' ,
		'WORDPRESS_EMAIL' => 'user_email',
		'WORDPRESS_FIRSTNAME' => 'user_firstname',
		'WORDPRESS_LASTNAME' => 'user_lastname',
		'WORDPRESS_DISPLAYNAME' =>'display_name',
		'WORDPRESS_URL' => 'user_url',
		'WORDPRESS_USERID' => 'ID',
        'CAPTAINFORMREQUEST' ,
	);

    /**
     * Custom vars identifier.
     *
     * @since    2.0.0
     * @access   private
     * @var      array    $version    A string to recognize the form custom variables.
     */
    private $customVarIdentifier = 'cf_custom_var';

    /**
     * Captainform_FormCustomVars constructor.
     *
     * @since    2.0.0
     * @access   public
     * @param    array    $shortcodeOptions
     */
    public function __construct(array $shortcodeOptions) {
        $this->shortcodeOptions = $shortcodeOptions;
    }

    /**
     * The method that gets the custom variables from the shortcode
     *
     * @since    2.0.0
     * @access   private
     * @return   string
     */
    private function get_custom_vars_from_shortcode()
    {
        $custom_vars_string = '';
	    $current_user = wp_get_current_user();

        foreach($this->shortcodeOptions as $option => $value){
            if(strpos($option, $this->customVarIdentifier) !== false){
	            if(array_key_exists($value,$this->wordpressShortcodeOptions))
	            {
                    if(isset($current_user->{$this->wordpressShortcodeOptions[$value]})){
		                $value = $current_user->{$this->wordpressShortcodeOptions[$value]};
                    }
                    else
                        $value = "";
	            }
	            else if(strpos($value, 'CAPTAINFORMREQUEST_') !== false)
	            {
                    if(isset($_REQUEST[substr($value,strlen('CAPTAINFORMREQUEST_'))]))
                        $value = $_REQUEST[substr($value,strlen('CAPTAINFORMREQUEST_'))];
                    else
                        $value = "";
                }

				$custom_vars_string .= '&control' . ltrim($option, $this->customVarIdentifier) . '=' . str_replace('+',' ',urlencode($value));
            }
        }

        return $custom_vars_string;
    }

    /**
     * The method that gets the custom variables from the URL
     *
     * @since    2.0.0
     * @access   private
     * @return   string
     */
    private function get_custom_vars_from_url() {
        $custom_vars_string = '';

        foreach ($_GET as $key => $value) {
            if (strpos($key, 'control') !== false) {
                $custom_vars_string .= '&' . $key . '=' . $value;
            }
        }

        return $custom_vars_string;
    }

    /**
     * This method returns all the custom variables in a string format, ready to be appended to the form URL
     *
     * @since    2.0.0
     * @access   public
     * @param    string     $extra_vars
     * @return   string
     */
	public function get_custom_vars($extra_vars = ''){
        $custom_vars_string = '';
        $custom_vars_string .= $this->get_custom_vars_from_shortcode();
        $custom_vars_string .= $this->get_custom_vars_from_url();
        if (gettype($extra_vars) == "array" && count($extra_vars)) {
            foreach ($extra_vars as $key => $value)
                $custom_vars_string .= '&' . $key . '=' . $value;
        } elseif (strlen($extra_vars))
            $custom_vars_string .= $extra_vars;

        if(strlen($custom_vars_string))
            $custom_vars_string .= '&embeddingCustomVars=true';

        return $custom_vars_string;
    }
}
