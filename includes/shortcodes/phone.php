<?php
/**
 * Shortcode: Phone.
 *
 * Displays company phone number.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'phone', '_mmhc_sc_phone' );
} );

function _mmhc_sc_phone() {

	$phone = get_option( '_mmhc_phone', '' );
	return wp_is_mobile() ? "<a href=\"tel:$phone\">$phone</a>" : $phone;
}