<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

include('kpfttc-scripts-enqueue.php');


// Settings Page Initialization
function kpfttc_settings_page()
{
	// Validate nonce
	if (isset($_POST['kpfttc_submit']) && !wp_verify_nonce($_POST['kpfttc-settings-form'], 'kpfttc'))
	{
		echo '<div class="notice notice-error"><p>Nonce verification failed</p></div>';
		exit;
	}

	// Double Check For User Capabilities
	if ( !current_user_can('manage_options') )
		return;
	
	?>

	<h1 class="admin-title"><img src="<?php echo KPFTTC_DIR_URL.'/assets/images/kreativo-pro.png';?>" class="admin-img"> KP Fastest Tawk.to Chat<br></h1>

	<div class="kpfttc-desc"><b>Kreativo Pro Fastest Tawk.to Chat</b> is the fastest Tawk.to Chat plugin for WordPress. If you are worried about Tawk.to Chat slowing down your website speed, then this plugin will <a href="https://www.kreativopro.com/plans/">speed up your website</a>.<br><b>Created by:</b> <a href="https://www.kreativopro.com/" target="_blank">Kreativo Pro</a> | <b>Tutorial:</b> <a href="https://www.youtube.com/watch?v=QW2LTeXsLkY" target="_blank">YouTube Video</a></p></div>

	<?php
		
		include('kpfttc-admin-settings-fileds.php');

		if (isset($_POST['kpfttc_submit']))
		{
			echo '<div class="notice notice-success is-dismissible"><p><b>KP Fastest Tawk.to Chat</b> plugin settings have been saved! Please clear cache if you are using any caching plugin.</p></div>';
		}

		kpfttc_settings_view();

}