<?php
defined('ABSPATH') or die('No direct access!');
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
	Captainform_Account::generate_new_credentials();
	?>
	<script>window.location.href = 'options-general.php?page=CaptainFormOptions'</script>
	<?php
}
$installation_id = get_site_option('captainform_installation_id');
$installation_key = get_site_option('captainform_installation_key');
$site_url = get_site_option('captainform_site_url');
ob_start();
?>
	<div class="wrap">
		<h1><?php echo __('CaptainForm Settings') ?></h1>
		<h2><?php echo __('Disconnect Account') ?></h2>
		<div>
			<div>
				<p><?php echo __('If you disconnect your CaptainForm account, your website will no longer be associated with it and you will need to activate a new CaptainForm account.', 'capatinform')?></p>
				<p><?php echo __('Normally, you should not need to disconnect your account. Please do this only when our Support team asks you to do so.')?></p>
			</div>
			<table class="form-table">
				<tr valign="top">
					<td><?php echo __('Support Key')?></td>
					<td><code><?php echo $installation_id ?></code></td>
				</tr>
				<tr valign="top">
					<td><?php echo __('Installation ID') ?></td>
					<td><code><?php echo $installation_key ?></code></td>
				</tr>
				<tr valign="top">
					<td><?php echo __('Site URL') ?></td>
					<td><code><?php echo $site_url ?></code></td>
				</tr>
				<tr valign="top">
					<td></td>
					<td>
						<a onclick="if(!confirm('Are you sure you want to do this? Please hit OK only after talking with our Support team (support@captainform.com).')) return false;"
						   href="options-general.php?page=CaptainFormOptions&reset=true">
							<button class="button button-primary"><?php echo __('Disconnect Account') ?></button>
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
<?php
echo ob_get_clean();
