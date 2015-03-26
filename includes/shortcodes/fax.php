<?php
/**
 * Shortcode: Fax.
 *
 * Displays company fax number.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'fax', '_mmhc_sc_fax' );
} );

function _mmhc_sc_fax() {
	return wp_is_mobile() ? '<a href="tel:517.784.9657">517.784.9657</a>' : '517.784.9657';
}