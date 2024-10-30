<?php
/*
Plugin Name: KP Fastest Tawk.to Chat
Description: The fastest way to implement Tawk.to chat in your WordPress website.
Version: 1.1.1
Contributors: kreativopro
Author: Kreativo Pro
Author URI: https://www.kreativopro.com/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: kp-fastest-tawkto-chat
Domain Path:  /languages
*/


// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}


// Define Constants
define('KPFTTC_VERSION', '1.1.1');
define('KPFTTC_FILE_BASENAME', basename(__FILE__) );
define( 'KPFTTC_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'KPFTTC_PLUGIN_BASENAME', plugin_basename(__FILE__) );


//Register Plugin Activation/Deactivation Hook
register_activation_hook( __FILE__, 'kpfttc_admin_notice_transient' );
register_uninstall_hook( __FILE__, 'kpfttc_delete_settings' );


//include Frontend Plugin Files
include('includes/kpfttc-init-config.php');
include('includes/kpfttc-frontend.php');
include('includes/kpfttc-shortcuts.php');


//include Backend Plugin Files
include('includes/admin/kpfttc-admin-settings-init.php');