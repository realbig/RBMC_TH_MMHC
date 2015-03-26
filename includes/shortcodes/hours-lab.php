<?php
/**
 * Shortcode: Hours Lab.
 *
 * Displays the lab hours, formatted with line-breaks.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'hours_lab', '_mmhc_sc_hours_lab' );
} );

function _mmhc_sc_hours_lab() {
	return wpautop( do_shortcode( get_option( '_mmhc_hours_lab', '' ) ) );
}