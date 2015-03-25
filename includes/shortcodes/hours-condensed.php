<?php
/**
 * Shortcode: Hours Condensed.
 *
 * Displays the office condensed.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'hours_condensed', '_mmhc_sc_hours_condensed' );
} );

function _mmhc_sc_hours_condensed() {

	return '<strong>Office / Lab Hours:</strong> 9am - 5pm | M - F';
}