jQuery(document).ready(function()
{
	jQuery("#kpfttc_chat_enabled").click(function()
	{
		if( jQuery("#kpfttc_chat_enabled").attr("value") == "yes" )
		{ jQuery("#kpfttc_chat_enabled").attr("value","no"); }
		else
		{ jQuery("#kpfttc_chat_enabled").attr("value","yes"); }
	});

	jQuery("#kpfttc_admin_disabled").click(function()
	{
		if( jQuery("#kpfttc_admin_disabled").attr("value") == "yes" )
		{ jQuery("#kpfttc_admin_disabled").attr("value",'no'); }
		else
		{ jQuery("#kpfttc_admin_disabled").attr("value","yes"); }
	});

	jQuery("#kpfttc-activate").click(function()
	{		
		kpajaxlink = kpfttc_vars.kpfttc_ajax_link;
		kpajaxdata = {
				action: "kpfttc_delete_transients",
				kpnotice: "kpfttc-activate"
			}
		jQuery.post( kpajaxlink, kpajaxdata );
    });
	
});