<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
get_header();
?>

<main id="site-content" role="main">

	<?php
	global $post;
		$post_slug = $post->post_name;
	    $totalhrs = 0;
	    if($post_slug == "question-page")
	    {
	    	$wpcf7s = get_posts(array(
	    		'post_type' => 'wpcf7s',
	    		'posts_per_page' =>1
	    	));
	    	
	    	foreach ($wpcf7s as $metas) {
	    		$postmetas = get_post_meta($metas->ID);
	    		if($postmetas['user_id'][0] == get_current_user_id())
				{
					if($postmetas['wpcf7s_posted-date'][0] > date("Y-m"."-01") && $postmetas['wpcf7s_posted-date'][0] < date("Y-m")."-31")
					{
						$totalhrs += $postmetas['wpcf7s_posted-Hours'][0];
					}
											
				}
	    	}
	    	echo "<h3 style='text-align:center'>Total Hours : <span id='totalspan'>".$totalhrs."</span>hrs(".date("Y-m").")</h3>";
	    }
    ?>

    <?php
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
