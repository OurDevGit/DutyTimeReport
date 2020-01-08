<?php

/**
 * The file that defines the function call
 *
 * This function can be used in any file of the website
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

if (!function_exists('captain_form')) {
	
	function captain_form($id, $custom_options = array())
	{
		$custom_vars = isset($custom_options['custom_vars']) ? $custom_options['custom_vars'] : array();
		
		$shortcode_final = '[captainform id="' . $id . '" ';
		$shortcode_final .= (isset($custom_options['lightbox'])) ? "lightbox='{$custom_options['lightbox']}' " : '';
		$shortcode_final .= (isset($custom_options['type'])) ? "type='{$custom_options['type']}' " : '';
		$shortcode_final .= (isset($custom_options['url'])) ? "url='{$custom_options['url']}' " : '';
		if (isset($custom_options['text_content']))
			$shortcode_final .= "text_content='" . $custom_options['text_content'] . "' ";
		else
			$shortcode_final .= (isset($custom_options['content'])) ? "content='{$custom_options['content']}' " : '';
		$shortcode_final .= (isset($custom_options['miliseconds'])) ? "miliseconds='{$custom_options['miliseconds']}' " : '';
		$shortcode_final .= (isset($custom_options['text_color'])) ? "text_color='{$custom_options['text_color']}' " : '';
		$shortcode_final .= (isset($custom_options['bg_color'])) ? "bg_color='{$custom_options['bg_color']}' " : '';
		$shortcode_final .= (isset($custom_options['position'])) ? "position='{$custom_options['position']}' " : '';
		
		foreach($custom_vars as $key => $value) {
			if(strpos($key, 'cf_custom_var') !== false)
				$shortcode_final .= $key . '=' . (strpos($value, '"') !== false ? "'" . $value . "' " : '"' . $value . '" ');
		}
		
		$shortcode_final .= ']';
		
		return do_shortcode($shortcode_final);
	}
	
}