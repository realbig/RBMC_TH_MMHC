<?php
/**
 * MMHC Settings page HTML.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<div class="wrap">

	<h2>MMHC Settings</h2>

	<form method="post" action="options.php">

		<?php settings_fields( 'mmhc-settings' ); ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="_mmhc_phone">
						Phone
					</label>
				</th>
				<td>
					<input type="text" name="_mmhc_phone" id="_mmhc_phone"
					       value="<?php echo esc_attr( get_option('_mmhc_phone') ); ?>" />

					<p class="description">
						<strong>Preferred Format:</strong> 555.555.5555
					</p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="_mmhc_fax">
						Fax
					</label>
				</th>
				<td>
					<input type="text" name="_mmhc_fax" id="_mmhc_fax"
					       value="<?php echo esc_attr( get_option('_mmhc_fax') ); ?>" />

					<p class="description">
						<strong>Preferred Format:</strong> 555.555.5555
					</p>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="_mmhc_hours_condensed">
						Hours (condensed)
					</label>
				</th>
				<td>
					<input type="text" name="_mmhc_hours_condensed" id="_mmhc_hours_condensed"
					       style="max-width: 100%; width: 300px;"
					       value="<?php echo esc_attr( get_option('_mmhc_hours_condensed') ); ?>" />
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="_mmhc_hours_office">
						Office Hours
					</label>
				</th>
				<td>
					<div style="max-width: 100%; width:400px;">
						<?php
						wp_editor( get_option('_mmhc_hours_office'), '_mmhc_hours_office', array(
							'teeny' => true,
							'media_buttons' => false,
							'textarea_rows' => 6,
							'textarea_name' => '_mmhc_hours_office',
						));
						?>
					</div>
				</td>
			</tr>

			<tr valign="top">
				<th scope="row">
					<label for="_mmhc_hours_lab">
						Lab Hours
					</label>
				</th>
				<td>
					<div style="max-width: 100%; width:400px;">
						<?php
						wp_editor( get_option('_mmhc_hours_lab'), '_mmhc_hours_lab', array(
							'teeny' => true,
							'media_buttons' => false,
							'textarea_rows' => 6,
							'textarea_name' => '_mmhc_hours_lab',
						));
						?>
					</div>
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>

	</form>

</div>