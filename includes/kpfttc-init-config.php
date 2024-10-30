<?php


// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}


// Register Settings Menu
function kpfttc_register_settings_menu()
{
    add_options_page('KP Fastest Tawk.to Chat', 'KP Tawk.to Chat', 'manage_options', 'kpfttc', 'kpfttc_settings_page');
}
add_action('admin_menu', 'kpfttc_register_settings_menu');


// Set Default Config on Plugin Activation
function kpfttc_set_default_config() {

    if (KPFTTC_VERSION !== get_option('KPFTTC_VERSION')) {
		
		$kpfttc_chat_link = "https://embed.tawk.to/5bc5cbf2d7591466c708ee95/1eudgt3dq";

		if (get_option('kpfttc_chat_enabled') === false)
            update_option('kpfttc_chat_enabled', "yes");
        if (get_option('kpfttc_chat_link') === false)
            update_option('kpfttc_chat_link', $kpfttc_chat_link);
		if (get_option('kpfttc_delay_time') === false)
            update_option('kpfttc_delay_time', 10000);
		if (get_option('kpfttc_excluded_pages') === false)
			update_option('kpfttc_excluded_pages', '0');
		if (get_option('kpfttc_admin_disabled') === false)
            update_option('kpfttc_admin_disabled', "no");

        update_option('KPFTTC_VERSION', KPFTTC_VERSION);
    }

}
add_action('plugins_loaded', 'kpfttc_set_default_config');


//Set Transients on Plugin Activation
function kpfttc_admin_notice_transient()
{
    set_transient( 'kpfttc-admin-notice-activation', true, 60*60*24 );
}


//Display Message on Plugin Activation
function kpfttc_admin_notice_activation()
{
    if( get_transient('kpfttc-admin-notice-activation') )
	{
    ?>
		<div id="kpfttc-activate" class="notice notice-success is-dismissible">
            <p>Thank you for using <strong>KP Fastest Tawk.to Chat</strong> plugin! If you like our plugin, please provide us your feedback <a href="https://wordpress.org/support/plugin/kp-fastest-tawk-to-chat/reviews/#new-post" target="_blank" style="font-size:14px;"><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></a> on WordPress.org</p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'kpfttc_admin_notice_activation' );


//Delete Plugin Settings Upon Plugin Deletion
function kpfttc_delete_settings()
{
	delete_option('kpfttc_chat_enabled');
    delete_option('kpfttc_chat_link');
	delete_option('kpfttc_delay_time');
	delete_option('kpfttc_excluded_pages');
	delete_option('kpfttc_admin_disabled');
	delete_option('KPFTTC_VERSION');
	delete_transient('kpfttc-admin-notice-activation');
}


//Delete Transients if Dismissed
function kpfttc_delete_transients()
{
	if($_REQUEST['kpnotice'] == 'kpfttc-activate')
		delete_transient( 'kpfttc-admin-notice-activation' );
}
add_action("wp_ajax_kpfttc_delete_transients", "kpfttc_delete_transients");
