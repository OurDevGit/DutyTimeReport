<?php

/**
 * Fired during form preview
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/includes
 */

/**
 * The form preview class
 *
 * This class defines all code necessary to run during the form preview
 *
 * @since      2.0.0
 * @package    Captainform
 * @subpackage Captainform/includes
 * @author     captainform <team@captainform.com>
 */
class Captainform_Preview {
	
	/**
     * @since    2.0.0
     * @access   private
	 * @var      string
	 */
	private static $shortcode = '[captainform id="{cf_form_id}"]';
	
	/**
     * @since    2.0.0
     * @access   private
	 * @var      string
	 */
	private static $post_type = 'captainform_post';
	
	/**
     * @since    2.0.0
     * @access   private
	 * @var      int
	 */
	private static $post_id;
	
	/**
     * @since    2.0.0
	 * @param    bool   $redirect
	 * @return   string
	 */
	public static function preview_form($redirect = true)
	{
		$post_exists = false;
		$post_content = '';
		
		//search for the preview post
		$query1 = new WP_Query('post_type=' . self::getPostType());
		
		if ($query1->have_posts())
			while ($query1->have_posts()) {
				self::setPostId($query1->post->ID);
				$query1->the_post();
				$post_content = get_the_content();
				$post_exists = true;
				break;
			}
		wp_reset_postdata();
		
		if ( ! $post_exists) {
			self::setPostId(self::create_post());
		} else if ($post_exists === true && strpos($post_content, self::getShortcode()) === false && self::getPostId() != null) {
			
			$replace_old_shortcodes = self::replace_old_shortcodes($post_content);
			
			if($replace_old_shortcodes['replaced'] === true)
				$post_content = $replace_old_shortcodes['content'];
			
			self::update_post(array(
				'post_content' => $post_content . self::getShortcode(),
			));
		}
		elseif($post_exists === true && strpos($post_content, self::getShortcode()) !== false && self::getPostId() != null )
		{
			$replace_old_shortcodes = self::replace_old_shortcodes($post_content);
			if($replace_old_shortcodes['replaced'] === true) {
				self::update_post(array(
					'post_content' => $replace_old_shortcodes['content'],
				));
			}
		}
		
		if ($redirect === true) {
			wp_redirect(self::get_preview_url());
			exit();
		} else
			return self::get_preview_url();
	}
	
	/**
     * @since    2.0.0
     * @access   private
	 * @return   string
	 */
	private static function get_preview_url() {
		
		$url = add_query_arg('cf_form_id', self::get_form_id(), get_permalink(self::getPostId()));
		
		if (isset($_GET['captainform_theme_style']))
			$url = add_query_arg('captainform_theme_style', $_GET['captainform_theme_style'], $url);
		
		if (isset($_GET['captainform_preview_as_lightbox']))
			$url = add_query_arg('captainform_preview_as_lightbox', $_GET['captainform_preview_as_lightbox'], $url);

		return $url;
		
	}
	
	/**
     * @since    2.0.0
     * @access   private
	 * @param    string     $content    Remove old shortcodes from content
	 * @return   array
	 */
	private static function replace_old_shortcodes($content)
	{
		$old_shortcodes = array(
			'[captainform i{cf_form_id}]'
		);
		
		$old_shortcode_found = false;
		foreach($old_shortcodes as $old_code)
		{
			if(strpos($content, $old_code) !== false)
			{
				$content = str_replace ($old_code, "", $content);
				$old_shortcode_found = true;
			}
		}
		
		return array(
			'content' => $content,
			'replaced' => $old_shortcode_found
		);
	}
	
	/**
     * @since    2.0.0
     * @access   private
	 * @return   int
	 */
	private static function get_form_id() {
		
		return isset($_GET['cf_form_id']) ? intval($_GET['cf_form_id']) : 726633;
		
	}
	
	/**
     * @since    2.0.0
	 * @return   string
	 */
	public static function getShortcode()
	{
		return self::$shortcode;
	}
	
	/**
     * @since    2.0.0
	 * @return   string
	 */
	public static function getPostType()
	{
		return self::$post_type;
	}
	
	/**
     * @since    2.0.0
     * @access   private
	 * @param    array $post_data
	 */
	private static function update_post($post_data) {
		
		$post_data['ID'] = self::getPostId();
		$post_data['post_excerpt'] = self::getShortcode();
		
		wp_update_post($post_data);
		
	}
	
	/**
     * @since    2.0.0
     * @access   private
	 * @return   int|WP_Error
	 */
	private static function create_post()
	{
		$post = array(
			'post_content' => self::getShortcode(),
			'post_name'    => "CaptainForm_form_preview",
			'post_title'   => "CaptainForm Preview",
			'post_status'  => 'draft',
			'post_type'    => self::getPostType(),
			'post_excerpt' => self::getShortcode(),
		);
		
		return wp_insert_post($post);
	}
	
	/**
     * @since    2.0.0
	 * @return   mixed
	 */
	public static function getPostId()
	{
		return self::$post_id;
	}
	
	/**
     * @since    2.0.0
	 * @param    mixed $post_id
	 */
	public static function setPostId($post_id)
	{
		self::$post_id = $post_id;
	}
	
}
