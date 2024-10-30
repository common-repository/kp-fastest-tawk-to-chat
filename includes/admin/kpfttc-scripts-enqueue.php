<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

// Load CSS & JS on Plugin Setting Page
function kpfttc_admin_scripts( $hook )
{	
	// Define KPFTTC_PLUGIN_SLUG as a PHP Constant
	define ( 'KPFTTC_PLUGIN_SLUG', $hook );
	
	wp_register_style( 'kpfttc-admin-css', KPFTTC_DIR_URL . 'assets/css/kpfttc-backend.css');
	wp_register_script( 'kpfttc-admin-js', KPFTTC_DIR_URL . 'assets/js/kpfttc-backend.js');
	
	if( 'settings_page_kpfttc' == KPFTTC_PLUGIN_SLUG )
		wp_enqueue_style( 'kpfttc-admin-css' );
	
	wp_enqueue_script( 'kpfttc-admin-js' );
	wp_localize_script('kpfttc-admin-js', 'kpfttc_vars', array(
			'kpfttc_ajax_link' => admin_url('admin-ajax.php')
		)
	);
	
}
add_action( 'admin_enqueue_scripts', 'kpfttc_admin_scripts' );