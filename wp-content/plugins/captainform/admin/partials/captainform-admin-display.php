<?php

/**
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://captainform.com
 * @since      2.0.0
 *
 * @package    Captainform
 * @subpackage Captainform/admin/partials
 */
?>
	<script>
		var version                = '<?php echo $this->version; ?>';
		var chost                  = '<?php echo $iframe_domain; ?>';
		var chostp                 = '<?php echo $page_protocol . '://' . $iframe_domain; ?>';
		var parent_site_url        = '<?php echo site_url(); ?>';
		var captainform_plugin_dir = '<?php echo plugins_url('', __DIR__); ?>';
	</script>
		
	<?php 
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/captainform-support-chat.php';
	?>
	
	<iframe 
		id="captainform_iframe" 
		src="<?php print $iframe_url . (!empty($hideChatButton) ? '&hideChatButton=true' : ''); ?>" 
		style="width:99%; background: transparent; min-height: 700px;" scrolling="no">
	</iframe>

<?php
