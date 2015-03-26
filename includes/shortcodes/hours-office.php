<?php
/**
 * Shortcode: Hours Office.
 *
 * Displays the office hours, formatted with line-breaks.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
add_action( 'init', function () {
	add_shortcode( 'hours_office', '_mmhc_sc_hours_office' );
} );

function _mmhc_sc_hours_office() {
	return wpautop( do_shortcode( get_option( '_mmhc_hours_office', '' ) ) );
}