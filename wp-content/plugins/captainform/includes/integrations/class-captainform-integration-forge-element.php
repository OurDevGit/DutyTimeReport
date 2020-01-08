<?php

/**
 * Class Captainform_ForgeElement
 */
class Captainform_ForgeElement
{

    /**
     * The ID of this plugin.
     *
     * @since    2.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private static $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    2.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private static $version;

    /**
     * Captainform_ForgeElement constructor.
     * @param $plugin_name
     * @param $version
     */
    public function __construct($plugin_name, $version)
    {
        self::$plugin_name = $plugin_name;
        self::$version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    2.0.0
     */
    public function enqueue_styles()
    {

        wp_enqueue_style('captainform_forge_element_css', plugin_dir_url(__FILE__) . '../../public/css/captainform-forge-element.css', array(), self::$version, 'all');

    }

    public function forge_element_metadata($data)
    {

        $fields = array();

        $selectField = array(
            'type' => "list",
            'name' => "form_id",
            'label' => __('Select Form', self::$plugin_name),
            'default' => "none",
            'choices' => array('none' => __('Please select...', self::$plugin_name)),
        );

        $fields['select'] = $selectField;

        $response = Captainform_Utils::get_remote_forms('page_or_post');
        if ($response->status == "ok") {
            foreach ($response->forms as $form) {
                $fields['select']['choices'][$form->f_id] = $form->f_name;
            }
            $fields['my_forms'] = $this->get_forge_button("My Forms", admin_url("admin.php?page=CaptainForm"), "_captainFormTab");
        } else {
            $fields['select']['choices']['none'] = __('No forms available', 'captainform');
            $fields['select']['description'] = __('There are no forms available, please create one by clicking the button below.', self::$plugin_name);
            $fields['create'] = $this->get_forge_button("New Form", admin_url("admin.php?page=CaptainForm-NewForm"), "_captainFormTab");
        }

        $data['captainform'] = array(
            'title' => __('CaptainForm', 'captainform'),
            'description' => __('User-friendly form builder', self::$plugin_name),
            'featured' => 50,
            'group' => 'forms',
            'callback' => 'captainform_forge_element',
            'fields' => $fields,
        );

        return $data;
    }



    private function get_forge_button($text = "null", $url = "null", $target = "_blank")
    {

        return array(
            'type' => "captainform_button",
            'name' => "selector",
            'default' => "none",
            'text' => __($text, self::$plugin_name),
            'url' => $url,
            'target' => $target,
        );

    }
}

function captainform_forge_element($atts, $content)
{
    if ($atts['form_id'] != "none") {
        $container_id = md5($atts['form_id'] + time());
        $container = "<div id='{$container_id}'>%s</div>";
        return sprintf($container, captain_form($atts['form_id']));
    } else {
        return '<div class="forge-captainform-form-placeholder"></div>';
    }
}
