<?php
/**
 * Provides an options page for the theme.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'admin_menu', function() {
	add_options_page(
		'MMHC Settings',
		'MMHC Settings',
		'manage_options',
		'mmhc-settings',
		'_mmhc_page_mmhc_settings_output'
	);
});

function _mmhc_page_mmhc_settings_output() {

	// Include template
	include_once __DIR__ . '/views/html-mmhc-settings.php';
}

// Register settings
add_action( 'admin_init', function() {

	register_setting( 'mmhc-settings', '_mmhc_phone' );
	register_setting( 'mmhc-settings', '_mmhc_fax' );
	register_setting( 'mmhc-settings', '_mmhc_hours_office' );
	register_setting( 'mmhc-settings', '_mmhc_hours_lab' );
	register_setting( 'mmhc-settings', '_mmhc_hours_condensed' );
});