<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

function kpfttc_script_inject_frontend()
{
	
	$kpfttc_chat_enabled = get_option('kpfttc_chat_enabled');
	$kpfttc_chat_link = get_option('kpfttc_chat_link');
	$kpfttc_delay_time = get_option('kpfttc_delay_time');
	$kpfttc_excluded_pages = explode( ",", get_option('kpfttc_excluded_pages'));
	$kpfttc_admin_disabled = get_option('kpfttc_admin_disabled');
	
	if( $kpfttc_admin_disabled =="yes" AND is_user_logged_in() )
	{
		exit();
	}
	
	if ( $kpfttc_chat_enabled == "yes" AND isset($kpfttc_chat_link) AND !(is_page($kpfttc_excluded_pages)) )
	{
	?>
<script>
setTimeout(function(){
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='<?php echo $kpfttc_chat_link; ?>';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
},<?php echo $kpfttc_delay_time; ?>);
</script>
		<?php
	}
}
add_action( 'wp_print_footer_scripts', 'kpfttc_script_inject_frontend');