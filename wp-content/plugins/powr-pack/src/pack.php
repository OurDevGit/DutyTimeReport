<?php
//For local mode (testing)
if(!function_exists('powr_local_mode')){
  function powr_local_mode(){
    return false;
  }
}

if(!function_exists('powr_base_url')){
  function powr_base_url(){
    return 'www.powr.io';
  }
}

if(!function_exists('app_standalone_url')){
  function app_standalone_url($app_type, $label) {
    return 'https://'. powr_base_url() . '/plugins/' . $app_type . '/standalone?unique_label=' . $label . '&demo_mode=false';
  }
}

//Generates an instance key
if(!function_exists('generate_powr_instance')){
  function generate_powr_instance() {
    $alphabet = 'abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; // Put the length -1 in cache.
    for ($i = 0; $i < 10; $i++) { // Add 10 random characters.
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    $pass_string = implode($pass) . time(); // Add the current time to avoid duplicate keys.
    return $pass_string; // Turn the array into a string.
  }
}
//Adds script to the header if necessary
if(!function_exists('initialize_powr_js')){
  function initialize_powr_js(){
    //No matter what we want the javascript in the header:
    add_option( 'powr_token', generate_powr_instance(), '', 'yes' );	//Add a global powr token: (This will do nothing if the option already exists)
    $powr_token = get_option('powr_token'); //Get the global powr_token
    if(powr_local_mode()){//Determine JS url:
      $js_url = '//localhost:3000/powr_local.js?external-type=wordpress';
    }else{
      $js_url = '//www.powr.io/powr.js?external-type=wordpress';
    }
    ?>
    <script>
    (function(d){
      var js, id = 'powr-js', ref = d.getElementsByTagName('script')[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement('script'); js.id = id; js.async = true;
      js.src = '<?php echo $js_url; ?>';
      js.setAttribute('powr-token','<?php echo $powr_token; ?>');
      ref.parentNode.insertBefore(js, ref);
    }(document));
    </script>
    <?php
  }
  //CALL INITIALIZE
  add_action( 'wp_enqueue_scripts', 'initialize_powr_js' );
}
//////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////Create POWr Pack widget/////////////////////////////////
class Powr_Powr_Pack extends WP_Widget{
  public $plugin;
  //Create the widget
  public function __construct(){
    parent::__construct( 'powr_powr_pack',
    __( 'POWr Plugins' ),
    array( 'description' => __( 'Add any Plugin from POWr.io') )
  );
  if ( is_active_widget( false, false, $this->id_base ) ) {
    add_action( 'wp_head', array( $this, 'css' ) );
  }
}
//This prints the div
public function widget( $args, $instance ){
  $label = $instance['label'];
  $plugin = $instance['title'];
  ?>
  <div class='widget <?php echo $plugin; ?>' label='<?php echo $label; ?>'></div>
  <?php
}
public function update( $new_instance, $old_instance ){
  $instance = $old_instance;
  //If no label, then set a label
  if( empty($instance['label']) ){
    $instance['label'] = 'wordpress_'.time();
  }
  $instance['title'] = strip_tags( $new_instance['title'] );
  return $instance;
}
public function form( $instance ){
  if ( $instance ) {
    $title          = $instance['title'];
    $label          = $instance['label'];
    $app_type       = str_replace('powr-', '', $title);
    $app_namespace  = ucwords(str_replace('-', ' ', $app_type));
    $standalone_url = app_standalone_url($app_type, $label);
  }

  echo "<label
  for=".$this->get_field_id('title').">Select your POWr Plugin:
    </label>";
    echo "<input type='hidden'
    class='widefat'
    id=".$this->get_field_id('title')."
    name=".$this->get_field_name('title')."
    value=".esc_attr( $title )." />";
    echo "<select
    class='widefat'
    id=".$this->get_field_id('title')."
    name=".$this->get_field_name('title').">
    <option selected disabled>Choose Plugin</option>
    <option value=powr-about-us> About Us</option>
    <option value=powr-banner-slider> Banner Slider</option>
    <option value=powr-button> Button</option>
    <option value=powr-chat> Chat</option>
    <option value=powr-comments> Comments</option>
    <option value=powr-contact-form> Contact Form</option>
    <option value=powr-countdown-timer> Countdown Timer</option>
    <option value=powr-count-up-timer> Count Up Timer</option>
    <option value=powr-digital-download> Digital Download</option>
    <option value=powr-ecommerce> Ecommerce</option>
    <option value=powr-event-gallery> Event Gallery</option>
    <option value=powr-event-slider> Event Slider</option>
    <option value=powr-facebook-feed> Facebook Feed</option>
    <option value=powr-faq> FAQ</option>
    <option value=powr-file-embed> File Embed</option>
    <option value=powr-flickr-gallery> Flickr Gallery</option>
    <option value=powr-form-builder> Form Builder</option>
    <option value=powr-graph> Graph</option>
    <option value=powr-hit-counter> Hit Counter</option>
    <option value=powr-holiday-countdown> Holiday Countdown</option>
    <option value=powr-image-resizer> Image Resizer</option>
    <option value=powr-image-slider> Image Slider</option>
    <option value=powr-instagram-feed> Instagram Feed</option>
    <option value=powr-job-board> Job Board</option>
    <option value=powr-mailing-list> Mailing List</option>
    <option value=powr-map> Map</option>
    <option value=powr-media-gallery> Media Gallery</option>
    <option value=powr-menu> Menu</option>
    <option value=powr-microblog> Microblog</option>
    <option value=powr-multi-slider> Multi Slider</option>
    <option value=powr-music-player> Music Player</option>
    <option value=powr-notification-bar> Notification Bar</option>
    <option value=powr-order-form> Order Form</option>
    <option value=powr-paypal-button> PayPal Button</option>
    <option value=powr-photo-editor> Photo Editor</option>
    <option value=powr-photo-filter> Photo Filter</option>
    <option value=powr-photo-gallery> Photo Gallery</option>
    <option value=powr-photo-watermark> Photo Watermark</option>
    <option value=powr-pinterest-feed> Pinterest Feed</option>
    <option value=powr-plan-comparison> Plan Comparison</option>
    <option value=powr-poll> Poll</option>
    <option value=powr-popup> Popup</option>
    <option value=powr-price-table> Price Table</option>
    <option value=powr-resume> Resume</option>
    <option value=powr-reviews> Reviews</option>
    <option value=powr-rss-feed> RSS Feed</option>
    <option value=powr-social-feed> Social Feed</option>
    <option value=powr-social-media-icons> Social Media Icons</option>
    <option value=powr-survey> Survey</option>
    <option value=powr-tabs> Tabs</option>
    <option value=powr-tumblr-feed> Tumblr Feed</option>
    <option value=powr-twitter-feed> Twitter Feed</option>
    <option value=powr-video-gallery> Video Gallery</option>
    <option value=powr-video-slider> Video Slider</option>
    <option value=powr-vimeo-gallery> Vimeo Gallery</option>
    <option value=powr-weather> Weather</option>
    <option value=powr-youtube-gallery> YouTube Gallery</option>
    </select></br></br>" ;
    $this->plugin = $title;
    ?>
      <?php if (strlen($app_type) > 0) { ?>
        <center>
          <a class='button button-primary'
            href='<?php echo $standalone_url ?>'
            target='_blank'
            style='margin: 30px 0 20px; height: auto; padding: 10px; font-size: 16px'>
            <span class='dashicons dashicons-edit'></span> <?php esc_html_e( 'Edit this ' . $app_namespace, $title ); ?>
          </a>
        </center>
      <?php } ?>
    <?php
  }
}
//Register Widget With WordPress
function register_powr_powr_pack() {
  register_widget( 'Powr_Powr_Pack' );
}
//Use widgets_init action hook to execute custom function
add_action( 'widgets_init', 'register_powr_powr_pack' );
//Create short codes for adding plugins anywhere:
function powr_powr_pack_shortcode( $atts ){
  if(isset($atts['id'])){
    $id = $atts['id'];
    return "<div class='powr-powr-pack' id='$id'></div>";
  }else if(isset($atts['label'])){
    $label = $atts['label'];
    return "<div class='powr-powr-pack' label='$label'></div>";
  }else{
    "<div class='powr-powr-pack'></div>";
  }
}
add_shortcode( 'powr-powr-pack', 'powr_powr_pack_shortcode' );

/* Add POWr Plug to tiny MCE */
if( !function_exists('powr_tinymce_button') ){
  add_action( 'admin_init', 'powr_tinymce_button' ); //This calls the function below

  function powr_tinymce_button() {
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
      add_filter( 'mce_buttons', 'powr_register_tinymce_button' );
      add_filter( 'mce_external_plugins', 'powr_add_tinymce_button' );
    }
  }
  function powr_register_tinymce_button( $buttons ) {
    array_push( $buttons, 'powr');
    return $buttons;
  }
  function powr_add_tinymce_button( $plugin_array ) {
    $plugin_array['powr'] = plugins_url( '/tinymce/powr.tinymce.js', __FILE__ ) ;
    return $plugin_array;
  }
  //CSS For icon
  function powr_tinymce_css() {
    wp_enqueue_style('powr_tinymce', plugins_url('/tinymce/powr.tinymce.css', __FILE__));
  }
  add_action('admin_enqueue_scripts', 'powr_tinymce_css');
}
//ADD MENUS
add_action( 'admin_menu', 'powr_powr_pack_menu' );
function powr_powr_pack_menu() {
  add_menu_page( 'POWr Plugins', 'POWr Plugins', 'manage_options', 'powr-powr-pack-settings', 'powr_powr_pack_options', plugins_url('/images/powr-icon.png',__FILE__));
}
function powr_powr_pack_options() {
  if(powr_local_mode()){//Determine JS url:
    $redirect_url = 'https://localhost:3000/wp-create/powr-pack';
  }else{
    $redirect_url = 'https://www.powr.io/wp-create/powr-pack';
  }
  echo '<br><br><br><br><center><h2>Redirecting to POWr Dashboard...</h2></center>';
  echo '<script>';
  echo "window.location.assign('$redirect_url')";
  echo '</script>';
}
  if( !function_exists('admin_handle_powr_ext_urls') ){
  add_action('in_admin_footer', 'admin_handle_powr_ext_urls');
  function admin_handle_powr_ext_urls(){
    echo '<script>';
    echo 'if( document.querySelector("a[class*=page_powr-]") ){ ';
      echo 'document.querySelector("a[class*=page_powr-]").target = "_blank"';
      echo '}';
      echo '</script>';
    }
  }
  //Redirecting to landing page when plugin is activated
  register_activation_hook(__FILE__, 'powr_powr_pack_plugin_activate');
  add_action('admin_init', 'powr_powr_pack_plugin_redirect');

  function powr_powr_pack_plugin_activate() {
    add_option('powr_powr_pack_plugin_do_activation_redirect', true);
  }

  $current_date = new DateTime();
  $current_timestamp = $current_date->format('U');
  add_option('powr_install_time', $current_timestamp, '', 'yes' );	//Add a global powr oauth token: (This will do nothing if the option already exists)

  function powr_powr_pack_plugin_redirect() {
    if (get_option('powr_powr_pack_plugin_do_activation_redirect', false)) {
      delete_option('powr_powr_pack_plugin_do_activation_redirect');
      if(!isset($_GET['activate-multi']))
      {
        wp_redirect( get_admin_url().'?platform=wordpress&page=powr-powr-pack-settings&' );
      }
    }
  }
?>
