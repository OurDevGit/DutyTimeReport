<?php
/**
 * Template Name: Full Width Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */
// wp_redirect( get_home_url()."/log-in" );
global $post;
$post_slug = $post->post_name;
if(!is_user_logged_in()){
	if($post_slug == "question-page"){
		wp_redirect( get_home_url()."/log-in" );
	}
}else{
	if($post_slug == "log-in"){
		wp_redirect(get_home_url()."/question-page");
	}
}

get_template_part( 'singular' );

