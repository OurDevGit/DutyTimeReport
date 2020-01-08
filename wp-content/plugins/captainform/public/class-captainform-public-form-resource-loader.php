<?php

/**
 * Fired when a form is displayed
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/public
 */

/**
 * The form resource loader class
 *
 * Loads the resources for all the embedding types.
 *
 * @package    Captainform
 * @subpackage Captainform/public
 * @author     captainform <team@captainform.com>
 */
class Captainform_FormResourceLoader {

    /**
     * The version of this plugin.
     *
     * @since    2.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

	/**
	 * The form options.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      array    $version    An array containing all the form options.
	 */
	private $options;

    /**
     * Initialize the class and set its properties.
     *
     * @since    2.0.0
     * @param    array      $options    The form options extracted from the shortcode.
     * @param    $version
     */
	public function __construct( array $options = array(), $version ) {

	    $this->version = $version;

		$this->options = array_merge(
		    array(
                'captainform_servicedomain' => 'app.captainform.com',
                'captainform_plugin_dir' => plugin_dir_url(dirname(__FILE__)),
                'embedding_type' => '',
            ),
            $options
        );
		
	}

    /**
     * Replace data into scripts that have variables.
     *
     * @since    2.0.0
     * @access   private
     * @param    string	    $string
     * @param    array		$data 		associate array - key is pattern, value is string for replace pattern
     * @return   string
     **/
    private function replace_data_in_scripts($string, $data = null) {
        if ($data)
            if (is_array($data)) {
                foreach ($data as $k => $v)
                    if ($k)
                        $string = str_replace('{{' . strtoupper($k) . '}}', $v, $string);
            }
        return $string;
    }

	/**
	 * Loads the files that contains the embedding scripts.
     *
     * @since    2.0.0
     * @access   private
	 * @param    string	   $resource	resource file
	 * @return   string
	 **/
	function load_form_resource($resource) {
        $this->enqueue_public_styles();
		if (count($this->options))
			foreach ($this->options as $key => $val)
				$$key = $val;
		
		ob_start();
		include 'partials/form-resources/captainform-' . $resource . '.php';
		return ob_get_clean();
	}

    /**
     * Adds the scripts and the styles for the popup.
     *
     * @since    2.0.0
     * @access   private
     */
    private function add_tinybox_resources() {
        $this->enqueue_popup_scripts();
        $this->enqueue_popup_styles();
    }

    /**
     * Returns the global variables for the form scripts.
     *
     * @since    2.0.0
     * @access   private
     * @return   string
     */
	private function load_captainform_global_vars() {
		return $this->load_form_resource('global-vars');
	}

    /**
     * Returns the scripts for the normal embedding.
     *
     * @since    2.0.0
     * @access   private
     * @return   string
     */
	private function load_normal_embedding_resources() {
		return
            $this->load_captainform_global_vars() .
            $this->load_form_resource('normal-embedding');
	}

	/**
	 * Returns the scripts for the popup embedding.
	 *
	 * @since    2.0.0
	 * @access   private
	 *
	 * @param string $popupType
	 *
	 * @return string
	 */
	private function load_popup_embedding_resources($popupType = '') {
		if(!empty($popupType))
			$popupType .= '-';

        $this->add_tinybox_resources();

		return
			$this->load_captainform_global_vars() .
			$this->load_form_resource('lightbox-' . $popupType . 'embedding');
	}

    /**
     * Returns the required embedding scripts based on the embedding type.
     *
     * @since    2.0.0
     * @access   private
     * @param    $embedding_type
     * @return   string
     */
	private function get_form_resources($embedding_type){
        switch($embedding_type){
            case 'normal_embedding':
                return $this->load_normal_embedding_resources();
                break;
            case 'text':
            case 'image':
            case 'floating-button':
                return $this->load_popup_embedding_resources();
                break;
            case 'auto-popup':
				return $this->load_popup_embedding_resources('auto');
			case 'window-leave':
				return $this->load_popup_embedding_resources('window-leave');
        }
    }

    /**
     * Register the styles for the public-facing side of the site.
     *
     * @since   2.1.3
     * @access  private
     */
    private function enqueue_public_styles(){
        wp_enqueue_style( 'captainform_public_css', plugin_dir_url( __FILE__ ) . 'css/captainform-public.css', array(), $this->version, 'all' );
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    2.0.0
     */
    public function enqueue_popup_styles() {

        wp_enqueue_style('captainform_form_popup_style', plugin_dir_url( __FILE__ ) . '../admin/css/form_popup.css', array(), $this->version, 'all');
        if (strpos(getenv("HTTP_USER_AGENT"), "Mac") !== FALSE) {
            //wp_enqueue_style('captainform_form_popup_style', plugin_dir_url( __FILE__ ) . '../admin/css/wp_captainform_os.css', array(), $this->version, 'all');
        }

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    2.0.0
     */
    public function enqueue_popup_scripts() {

        wp_enqueue_script('captainform_form_popup', plugin_dir_url( __FILE__ ) . '../admin/js/captainform-form-popup.js', array('jquery'), $this->version, false);
        wp_enqueue_script('captainform_ires35', plugin_dir_url( __FILE__ ) . '../admin/js/iframeResizer.min.js', array(), $this->version, false);

    }

    /**
     * @since    2.0.0
     * @param    $embedding_type
     * @param    $options
     * @return   string
     */
	public function run($embedding_type, $options) {
        $this->options['embedding_type'] = $embedding_type;

        return $this->replace_data_in_scripts($this->get_form_resources($embedding_type), $options);
	}
}
