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
	return get_option( '_mmhc_hours_condensed', '' );
}