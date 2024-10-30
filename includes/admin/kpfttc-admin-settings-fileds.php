<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

function kpfttc_settings_view()
{

    if (isset($_POST['kpfttc_submit'])){
    update_option('kpfttc_chat_enabled', $_POST['kpfttc_chat_enabled']);
	update_option('kpfttc_chat_link', $_POST['kpfttc_chat_link']);
	update_option('kpfttc_delay_time', $_POST['kpfttc_delay_time']);
	update_option('kpfttc_excluded_pages', $_POST['kpfttc_excluded_pages']);
	update_option('kpfttc_admin_disabled', $_POST['kpfttc_admin_disabled']);
    }

    $kpfttc_chat_enabled = get_option('kpfttc_chat_enabled');
	$kpfttc_chat_link = get_option('kpfttc_chat_link');
	$kpfttc_delay_time = get_option('kpfttc_delay_time');
	$kpfttc_excluded_pages = get_option('kpfttc_excluded_pages');
	$kpfttc_admin_disabled = get_option('kpfttc_admin_disabled');
	
    ?>
	<form method="POST">
		<?php wp_nonce_field('kpfttc', 'kpfttc-settings-form'); ?>
		<table class="form-table" role="presentation">
		<tbody>
			<tr>
				<th scope="row"><label>Enable Plugin</label></th>
				<td>
					<input type="hidden" name="kpfttc_chat_enabled" value="no">
					<input type="checkbox" id="kpfttc_chat_enabled" name="kpfttc_chat_enabled" <?php if($kpfttc_chat_enabled == "yes") { echo "checked"; } ?> value="<?php if($kpfttc_chat_enabled == "yes") { echo "yes"; } else { echo "no"; } ?>"><label for="kpfttc_chat_enabled">Enable/Disable Plugin Without Actually Deactivating</label><br>
					
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Tawk.to Chat ID</label></th>
				<td>
					<input type="text" id="kpfttc_chat_link" name="kpfttc_chat_link" style="width:350px;" value="<?php echo $kpfttc_chat_link; ?>"><br>
					<small class="description">Tawk.to Chat Code with Your Chat ID written in <code>src=""</code> field.</small><br>
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Delay Time</label></th>
				<td>
					<input type="text" id="kpfttc_delay_time" name="kpfttc_delay_time" style="width:350px;" value="<?php echo $kpfttc_delay_time; ?>"><br>
					<small class="description">Delay in Milliseconds. Example: 10 Seconds = 10000 Milliseconds</small><br>
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Pages to Exclude</label></th>
				<td>
					<input type="text" id="kpfttc_excluded_pages" name="kpfttc_excluded_pages" style="width:350px;" value="<?php echo $kpfttc_excluded_pages; ?>"><br>
					<small class="description">Page IDs to Exclude Chat. Example: 520 or 523,526,563</small><br>
				</td>
			</tr>
			<tr>
				<th scope="row"><label>Disable for Admins</label></th>
				<td>
					<input type="hidden" name="kpfttc_admin_disabled" value="no">
					<input type="checkbox" id="kpfttc_admin_disabled" name="kpfttc_admin_disabled" <?php if($kpfttc_admin_disabled == "yes") { echo "checked"; } ?> value="<?php echo $kpfttc_admin_disabled; ?>"><label for="kpfttc_admin_disabled">Enable/Disable for Logged-in WordPress users.</label><br>
				</td>
			</tr>
		</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="kpfttc_submit" id="kpfttc_submit" class="button button-primary" value="Save Changes">
		</p>
	</form>
	<?php
}