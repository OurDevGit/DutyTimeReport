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
 * The class that displays the forms
 *
 * @package    Captainform
 * @subpackage Captainform/public
 * @author     captainform <team@captainform.com>
 */
class Captainform_FormEmbedding
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * The form options.
     *
     * @since    2.0.0
     * @access   private
     * @var      array $version An array containing all the form options.
     */
    private $shortcodeOptions;

    /**
     * The embedding options to be replaced in the form resources scripts.
     *
     * @since    2.0.0
     * @access   private
     * @var      array $version An array containing all the embedding options.
     */
    private $embeddingOptions;

    /**
     * An instance of the class that loads the scripts needed to display the form
     *
     * @since   2.0.0
     * @access  private
     * @var Captainform_FormResourceLoader $resourceLoader
     */
    private $resourceLoader;

    /**
     * Initialize the class and set its properties.
     *
     * @since   2.0.0
     *
     * @param   array    $options        The form options extracted from the shortcode.
     * @param   string   $plugin_name    The name of the plugin.
     * @param   string   $version        The version of this plugin.
     */
    public function __construct($options, $plugin_name, $version)
    {

        $this->shortcodeOptions = $options;
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->resourceLoader = new Captainform_FormResourceLoader(array(), $this->version);

        if ($this->is_theme_preview())
            $this->enqueue_theme_preview_scripts();
    }

    /**
     * Checks whether we are previewing a theme or not
     *
     * @since   2.0.0
     * @access  private
     * @return  bool
     */
    private function is_theme_preview()
    {
        return isset($_GET['captainform_theme_style']);
    }

    /**
     * Register the JavaScript for the public-facing side of the site when we are in theme preview.
     *
     * @since   2.0.0
     * @access  private
     */
    private function enqueue_theme_preview_scripts()
    {

        wp_enqueue_script('captainform_iframe_resizer_win', plugin_dir_url(__FILE__) . '../admin/js/iframeResizer.contentWindow.min.js', array(), '3.5', false);
        wp_enqueue_script('nolink', plugin_dir_url(__FILE__) . '../admin/js/nolink.js', array(), $this->version, false);

    }

    /**
     * @return  string
     */
    public function run()
    {
        $this->set_form_id();

        if ($this->is_preview_mode())
            return $this->show_preview_message();

        return $this->display_form();
    }

    /**
     * Sets the real ID for the form that is being displayed
     *
     * @since   2.0.0
     * @access  private
     */
    private function set_form_id()
    {
        $form_id = 0;
        if (isset($this->shortcodeOptions['id'])) {
            if (is_numeric($this->shortcodeOptions['id']))
                $form_id = intval($this->shortcodeOptions['id']);
            elseif ($this->shortcodeOptions['id'] == '{cf_form_id}')
                if (isset($_GET['cf_form_id']) && intval($_GET['cf_form_id']))
                    $form_id = intval($_GET['cf_form_id']);
        } elseif (isset($this->shortcodeOptions[0])) {
            $form_id = intval(trim($this->shortcodeOptions[0], 'i'));
            unset($this->shortcodeOptions[0]);
        }

        $this->shortcodeOptions['id'] = $form_id;
    }

    /**
     * Checks whether we are in preview mode or not.
     * @since   2.0.0
     * @access  private
     * @return  bool
     */
    private function is_preview_mode()
    {
        return
            isset($_GET['cf_form_id']) &&
            isset($_GET['captainform_theme_style']) &&
            intval($_GET['cf_form_id']) &&
            is_numeric($this->shortcodeOptions['id']) &&
            intval($_GET['cf_form_id']) !== intval($this->shortcodeOptions['id']);
    }

    /**
     * Shows the message that is displayed instead of the other forms on the page during form preview.
     *
     * @since   2.0.0
     * @access  private
     * @return  string
     */
    private function show_preview_message()
    {
        return 'Form hidden in preview mode.';
    }

    /**
     *
     * @since   2.0.0
     * @access  private
     * @return  string
     */
    private function display_form()
    {
        if (!$this->shortcodeOptions['id'])
            return '';

        $embedding_type = $this->get_embedding_type();
        $this->set_embedding_options($embedding_type);

        return $this->resourceLoader->run($embedding_type, $this->embeddingOptions);
    }

    /**
     * Gets the embedding type.
     *
     * @since   2.0.0
     * @access  private
     * @return  mixed|string
     */
    private function get_embedding_type()
    {
        if (isset($this->shortcodeOptions['lightbox']) && $this->shortcodeOptions['lightbox'] == 1)
            if ($this->is_preview_as_popup())
                return 'auto-popup';
            elseif (isset($this->shortcodeOptions['type']))
                return $this->shortcodeOptions['type'];

        return 'normal_embedding';
    }

    /**
     * Checks whether we are previewing the form as a popup or not.
     *
     * @since   2.0.0
     * @access   private
     * @return  bool
     */
    private function is_preview_as_popup()
    {
        return isset($_GET['captainform_preview_as_lightbox']);
    }

    /**
     * Sets all the embedding options based on the options from the shortcode
     *
     * @since   2.0.0
     * @access  private
     * @param   $embedding_type
     */
    private function set_embedding_options($embedding_type)
    {
        $custom_vars = new Captainform_FormCustomVars($this->shortcodeOptions);
        $this->embeddingOptions = array(
            'id' => $this->shortcodeOptions['id'],
            'content' => 'Contact Us',
            'miliseconds' => $this->is_preview_as_popup() ? 1000 : 3000,
            'customVars' => $custom_vars->get_custom_vars(),
            'style' => $this->get_theme_preview_style(),
            'lightbox_type' => '',
            'position_class' => '',
        );

        if (isset($this->shortcodeOptions['lightbox']) && $this->shortcodeOptions['lightbox'] == 1) {
            if (isset($this->shortcodeOptions['text_content']) && strlen(trim($this->shortcodeOptions['text_content'])))
                $this->embeddingOptions['content'] = urldecode($this->shortcodeOptions['text_content']);
            elseif (isset($this->shortcodeOptions['content']) && strlen(trim($this->shortcodeOptions['content'])))
                $this->embeddingOptions['content'] = urldecode($this->shortcodeOptions['content']);
        }

        switch ($embedding_type) {
            case 'text':
                break;
            case 'image':
                if (isset($this->shortcodeOptions['url']) && strlen(trim($this->shortcodeOptions['url']))) {
                    $this->embeddingOptions['content'] = '<img border="0" src="' . $this->shortcodeOptions['url'] . '" />';
                }
                $this->embeddingOptions['lightbox_type'] = 'image';
                break;
            case 'floating-button':
                $this->embeddingOptions['position'] = 1;
                $this->embeddingOptions['position_class'] = 'default';
                if (isset($this->shortcodeOptions['position'])) {
                    if ($this->shortcodeOptions['position'] == 'right') {
                        $this->embeddingOptions['position'] = 2;
                        $this->embeddingOptions['position_class'] = 'right';
                    } elseif ($this->shortcodeOptions['position'] == 'left') {
                        $this->embeddingOptions['position'] = 1;
                        $this->embeddingOptions['position_class'] = 'left';
                    } elseif ($this->shortcodeOptions['position'] == 'bottom') {
                        $this->embeddingOptions['position'] = 3;
                        $this->embeddingOptions['position_class'] = 'bottom';
                    }
                }

                $this->embeddingOptions['text_color'] = isset($this->shortcodeOptions['text_color']) ? $this->shortcodeOptions['text_color'] : '';
                $this->embeddingOptions['bg_color'] = isset($this->shortcodeOptions['bg_color']) ? $this->shortcodeOptions['bg_color'] : '';
                $this->embeddingOptions['lightbox_type'] = 'floating';
                break;
            case 'auto-popup':
                if (isset($this->shortcodeOptions['miliseconds']))
                    $this->embeddingOptions['miliseconds'] = intval($this->shortcodeOptions['miliseconds']);
                break;
			default:
				break;
        }

    }

    /**
     * This method returns the style that is sent via URL during theme preview.
     *
     * @since   2.0.0
     * @access  private
     * @return  string
     */
    private function get_theme_preview_style()
    {
        return isset($_GET['captainform_theme_style']) ? '&style=' . $_GET['captainform_theme_style'] : '';
    }
}
