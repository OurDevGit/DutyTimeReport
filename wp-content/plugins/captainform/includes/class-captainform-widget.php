<?php

/**
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

/**
 * This class is responsible for the captainform widget.
 *
 * @since      2.0.0
 * @package    Captainform
 * @subpackage Captainform/includes
 * @author     captainform <team@captainform.com>
 */
class Captainform_Widget extends WP_Widget
{
	
	/**
	 * @since	2.0.0
	 * @access	private
	 * @var		string	$publish_type
	 */
	private $publish_type = 'widget';
	
	/**
	 * The number of captainform widgets.
	 *
	 * @since	2.0.0
	 * @access	private
	 * @var		int		$widget_count
	 */
	private static $widget_count = 0;

	/**
	 * Captainform_Widget constructor.
	 *
	 * @since    2.0.0
	 */
	public function __construct()
	{
		parent::__construct(
			false,
			__('CaptainForm', 'captainform'),
			array(
				'description' => __('Add a form to the sidebar', 'captainform'),
			)
		);
	}
	
	/**
	 * @since	2.0.0
	 * @param	array	$instance
	 *
	 * @return	string|void
	 */
	public function form($instance)
	{
		$embeded_form = isset($instance['captainform_form_id']) ? esc_attr($instance['captainform_form_id']) : '';
		$response = Captainform_Utils::get_remote_forms($this->publish_type, ++self::$widget_count);
		
		$captainform_display_as_lightbox_name = $this->get_field_name('captainform_display_as_lightbox');
		$captainform_trigger_option_name = $this->get_field_name('captainform_selected_trigger');
		$captainform_lightbox_publish_code_name = $this->get_field_name('captainform_lightbox_publish_code');
		
		//Text
		$captainform_trigger_0_name = $this->get_field_name('captainform_trigger_0_text');
		$captainform_trigger_0_text = (isset($instance['captainform_trigger_0_text']) ? esc_attr($instance['captainform_trigger_0_text']) : "Contact us");
		
		//click on image
		$captainform_trigger_1_name = $this->get_field_name('captainform_trigger_1_url');
		$captainform_trigger_1_url = isset($instance['captainform_trigger_1_url']) ? esc_attr($instance['captainform_trigger_1_url']) : '';
		if ($captainform_trigger_1_url == "")
			$captainform_trigger_1_url = plugin_dir_url( __FILE__ ) . '../public/images/publish_lighbox_default_image_v2.png';
		
		//floating button
		$captainform_trigger_2_text_name = $this->get_field_name('captainform_trigger_2_text');
		$captainform_trigger_2_text = (isset($instance['captainform_trigger_2_text']) ? esc_attr($instance['captainform_trigger_2_text']) : "Contact us");
		$captainform_trigger_2_position_name = $this->get_field_name('captainform_trigger_2_position');
		$captainform_trigger_2_position = (isset($instance['captainform_trigger_2_position']) ? ($instance['captainform_trigger_2_position'] != '' ? esc_attr($instance['captainform_trigger_2_position']) : 1) : 1);
		$captainform_trigger_2_background_name = $this->get_field_name('captainform_trigger_2_background');
		$captainform_trigger_2_background = (isset($instance['captainform_trigger_2_background']) ? esc_attr($instance['captainform_trigger_2_background']) : '');
		if ($captainform_trigger_2_background == '')
			$captainform_trigger_2_background = "FF0000";
		$captainform_trigger_2_color_name = $this->get_field_name('captainform_trigger_2_color');
		$captainform_trigger_2_color = (isset($instance['captainform_trigger_2_color']) ? esc_attr($instance['captainform_trigger_2_color']) : '');
		if ($captainform_trigger_2_color == '')
			$captainform_trigger_2_color = "FFFFFF";
		
		//Auto popup
		$captainform_trigger_3_after_name = $this->get_field_name('captainform_trigger_3_after');
		$captainform_trigger_3_after = (isset($instance['captainform_trigger_3_after']) ? esc_attr($instance['captainform_trigger_3_after']) : 5);

		$captainform_publish_code_value = isset($instance['captainform_lightbox_publish_code']) ? esc_attr($instance['captainform_lightbox_publish_code']) : '';
		$display_as_lightbox = (isset($instance['captainform_display_as_lightbox']) ? esc_attr($instance['captainform_display_as_lightbox']) : 3);
		$captainform_selected_trigger = (isset($instance['captainform_selected_trigger']) && $display_as_lightbox == 1 ? esc_attr($instance['captainform_selected_trigger']) : 3);

		$captainform_auto_popup_trigger_option_name = $this->get_field_name('captainform_auto_popup_trigger');
		$captainform_auto_popup_selected_trigger = isset($instance['captainform_auto_popup_trigger']) ? esc_attr($instance['captainform_auto_popup_trigger']) : 1;

		$captainform_custom_vars_name = $this->get_field_name('captainform_custom_vars_name');
		$captainform_custom_vars_code =  isset($instance['captainform_custom_vars_name']) ? esc_attr($instance['captainform_custom_vars_name']) : '';

		$captainform_form_controls = $response->controls;
		?>
		<script type="text/javascript">
			var captainform_forms_controls = <?php echo json_encode($captainform_form_controls);?>;
		</script>
		<?php
		if ($response->status == 'ok') {
			?>
			<div class="captainform_widget_container">
				<p>
					<label for="<?php echo $this->get_field_id('captainform_form_id'); ?>">
						Select the form you want to embed:
					</label>
				</p>
				<div>
					<select name="<?php echo $this->get_field_name('captainform_form_id'); ?>"
							class="captainform_widget_select"
							id="<?php echo $this->get_field_id('captainform_form_id'); ?>">
						<?php foreach ($response->forms as $form): ?>
							<option value="<?php echo $form->f_id; ?>" <?php echo ($form->f_id == $embeded_form) ? 'selected' : '' ?> >
								<?php echo $form->f_name; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<?php
					require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/captainform-admin-publish-options.php';
				?>
				<input type="hidden" class='cf_generated_code'
					   name="<?php echo $captainform_lightbox_publish_code_name; ?>"
					   value="<?php echo $captainform_publish_code_value; ?>"/>

				<input type="hidden" name="<?php echo $captainform_custom_vars_name ;?>" class="captainform_custom_vars_code"  value="<?php echo $captainform_custom_vars_code;?>"/>
			</div>
			<?php
		} else {
			?>
			<div class="error_message_container">
				<?php
				if ($response->error_message) {
					if (isset($response->error_code) && $response->error_code == 2) {
						echo sprintf("%sCreate a form%s and return here to publish it in your sidebar.", '<a href="admin.php?page=CaptainForm-NewForm">', "</a>");
					} elseif (isset($response->error_code) && $response->error_code == 1) {
						echo sprintf("Please activate your account first! Go to the CaptainForm tab and enter your license key or activate your free account. %sCreate a form%s and return here to publish it.", '<a href="admin.php?page=CaptainForm-NewForm">', "</a>");
					} else
						echo $response->error_message;
				} else
					echo __('There was an error. Pleas contact us!', 'captainform');
				?>
			</div>
			<?php
		}
	}
	
	/**
	 * @since	2.0.0
	 * @param	array	$new_instance
	 * @param	array	$old_instance
	 *
	 * @return	array
	 */
	public function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['captainform_form_id'] = intval($new_instance['captainform_form_id']);
		$display_as_lightbox = intval($new_instance['captainform_display_as_lightbox']);
		$instance['captainform_display_as_lightbox'] = $display_as_lightbox;
		$instance['captainform_selected_trigger'] = ($display_as_lightbox == 1 ? intval($new_instance['captainform_selected_trigger']) : 0);
		$instance['captainform_trigger_0_text'] = ($display_as_lightbox == 1 ? $new_instance['captainform_trigger_0_text'] : '');
		$instance['captainform_trigger_1_url'] = ($display_as_lightbox == 1 ? $new_instance['captainform_trigger_1_url'] : '');
		$instance['captainform_trigger_2_text'] = ($display_as_lightbox == 1 ? $new_instance['captainform_trigger_2_text'] : '');
		$instance['captainform_trigger_2_position'] = ($display_as_lightbox == 1 ? $new_instance['captainform_trigger_2_position'] : '');
		$instance['captainform_trigger_2_background'] = ($display_as_lightbox == 1 ? $new_instance['captainform_trigger_2_background'] : '');
		$instance['captainform_trigger_2_color'] = ($display_as_lightbox == 1 ? $new_instance['captainform_trigger_2_color'] : '');
		$instance['captainform_trigger_3_after'] = ($display_as_lightbox == 1 ? (intval($new_instance['captainform_trigger_3_after']) > 0 ? intval($new_instance['captainform_trigger_3_after']) : 3) : 3);
        $instance['captainform_custom_vars_name'] = $new_instance['captainform_custom_vars_name'];
		$instance['captainform_lightbox_publish_code'] = $new_instance['captainform_lightbox_publish_code'];
        $instance['captainform_auto_popup_trigger'] = $new_instance['captainform_auto_popup_trigger'];

		return $instance;
	}
	
	/**
	 * @since	2.0.0
	 * @param 	array	$args
	 * @param 	array	$instance
	 */
	public function widget($args, $instance)
	{
		global $post;
		extract($args);
		$shortcode = '[captainform id="' . $instance['captainform_form_id'] . '"]';
		if (isset($instance['captainform_lightbox_publish_code']) && $instance['captainform_lightbox_publish_code'] != '')
			$shortcode = $instance['captainform_lightbox_publish_code'];
		
	        if(!empty($instance['captainform_custom_vars_name']))
	            $shortcode = substr($shortcode,0, strlen($shortcode) -1) . ' '. $instance['captainform_custom_vars_name']. "]";
		$is_lightbox_pattern = '/\[[^\[]*captain-?form.*lightbox=[\',"]{1}([a-zA-Z0-9\/\-_\.\s]+)[\',"]{1}[^\]]*\]/';
		$is_lighbox = preg_match($is_lightbox_pattern, $shortcode) ? true : false;
		
		$type_pattern = '/\[[^\[]*captain-?form.*type=[\',"]{1}([a-zA-Z0-9\/\-_\.\s]+)[\',"]{1}[^\]]*\]/';
		preg_match($type_pattern, $shortcode, $matches_type);
		$shortcode_option_type = isset($matches_type[1]) ? $matches_type[1] : null;
		
		$show_widget_area = ($is_lighbox && in_array($shortcode_option_type, array('floating-button', 'auto-popup', 'window-leave'))) ? false : true;
		
		if ($show_widget_area && isset($before_title) && isset($before_widget) && isset($after_title)) {
			echo $before_widget . $before_title . $after_title;
		}
		
		echo do_shortcode($shortcode);
		
		wp_reset_query();
		
		if ($show_widget_area && isset($after_widget))
			echo $after_widget;
	}
	
	/**
	 * Register the stylesheets for the widgets area.
	 *
	 * @since	2.0.0
	 */
	public function enqueue_styles() {
		
		wp_register_style('cf-widget-css', plugin_dir_url( __FILE__ ) . '../admin/css/widget.css', false, false);
		wp_enqueue_style('cf-widget-css');
		wp_register_style('cf-chosen-css', plugin_dir_url( __FILE__ ) . '../admin/css/chosen/chosen.css', false, false);
		wp_enqueue_style('cf-chosen-css');
		
	}
	
	/**
	 * Register the JavaScript for the widgets area.
	 *
	 * @since	2.0.0
	 */
	public function enqueue_scripts() {
		
		wp_register_script('cf_color_picker_js', plugin_dir_url( __FILE__ ) . '../admin/js/jscolor/jscolor.js', array('jquery'), false, true);
		wp_enqueue_script('cf_widget_js', plugin_dir_url( __FILE__ ) . '../admin/js/widget.js', array('cf_color_picker_js'), false, true);
		wp_enqueue_script('cf_chosen_js', plugin_dir_url( __FILE__ ) . '../admin/js/chosen.jquery.js', array('cf_widget_js'), false, false);
		wp_enqueue_script('jquery');
		wp_enqueue_script('cf_color_picker_js');
		wp_enqueue_script('cf_widget_js');
		wp_enqueue_script('cf_chosen_js');
		
	}
	
	/**
	 * Register the widget into WordPress.
	 *
	 * @since	2.0.0
	 */
	public function register_widget() {
		
		register_widget('Captainform_Widget');
		
	}
	
	/**
	 * Evaluates the captainform shortcode if the text widget contains one
	 *
	 * @param	$content	string	Text widget content
	 * @return	string
	 */
	public function text_widget($content) {
		
		if(has_shortcode( $content, 'captainform' ) || has_shortcode( $content, 'captain-form' ))
			return do_shortcode($content);
		
		return $content;
		
	}
	
}
