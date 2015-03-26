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
	return wp_is_mobile() ? '<a href="tel:517.784.9189">517.784.9189</a>' : '517.784.9189';
}