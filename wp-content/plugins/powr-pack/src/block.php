<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since 2.0
 * @package POWr
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Define helper functions/methods if they have not been define already.
 *
 * @since 2.0
*/

if(!function_exists('powr_base_url')){
  function powr_base_url(){
    return 'www.powr.io';
  }
}

if(!function_exists('powr_js_script')){
  function powr_js_script() {
    return '//'. powr_base_url() . '/powr.js?external-type=wordpress';
  }
}

if(!function_exists('enqueue_powr_js_script')){
  function enqueue_powr_js_script() { // phpcs:ignore
    // Scripts.
    wp_enqueue_script(
      'powr-js', // Handle.
      powr_js_script(), // POWr.js: We register our core powr.js script here.
      array(),
      false // Enqueue the script in the header.
    );
  }
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @uses {wp-editor} for WP editor styles.
 * @since 2.0
 */
function powrful_pack_block_assets() { // phpcs:ignore
  // Styles.
  wp_enqueue_style(
    'powrful_pack-style-css', // Handle.
    plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
    array( 'wp-editor' ) // Dependency to include the CSS after it.
    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
  );
}

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'powrful_pack_block_assets' );
add_action( 'enqueue_block_assets', 'enqueue_powr_js_script' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 2.0
 */
function powrful_pack_editor_assets() { // phpcs:ignore
  // Scripts.
  wp_enqueue_script(
    'powrful_pack-block-js', // Handle.
    plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
    array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
    true // Enqueue the script in the footer.
  );

  // Scripts.
  wp_enqueue_script(
    'powrful_pack-block-js', // Handle.
    plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
    array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
    true // Enqueue the script in the footer.
  );

  // Styles.
  wp_enqueue_style(
    'powrful_pack-block-editor-css', // Handle.
    plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
    array( 'wp-edit-blocks' ) // Dependency to include the CSS after it.
    // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
  );
}

// Hook: Editor assets.
add_action( 'enqueue_block_assets', 'enqueue_powr_js_script' );
add_action( 'enqueue_block_editor_assets', 'powrful_pack_editor_assets' );

/**
 * Register POWr Block Category
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#managing-block-categories
 * @since 2.0
 */
function register_powr_block_category( $categories, $post ) {
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'powrful-plugins',
        'title' => __( 'POWr Plugins', 'powr-plugins' ),
        'icon'  => 'welcome-widgets-menus',
      ),
    )
  );
}

add_filter( 'block_categories', 'register_powr_block_category', 10, 2 );
