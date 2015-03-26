<?php
/**
 * The theme's functions file that loads on EVERY page, used for uniform functionality.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Make sure PHP version is correct
if ( ! version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
	wp_die( 'ERROR in MMHC theme: PHP version 5.3 or greater is required.' );
}

// Make sure no theme constants are already defined (realistically, there should be no conflicts)
if ( defined( 'THEME_VERSION' ) || defined( 'THEME_ID' ) || isset( $theme_fonts ) ) {
	wp_die( 'ERROR in MMHC theme: There is a conflicting constant. Please either find the conflict or rename the constant.' );
}

/**
 * The theme's current version (make sure to keep this up to date!)
 */
define( 'THEME_VERSION', '1.0.0' );

/**
 * The theme's ID (used in handlers).
 */
define( 'THEME_ID', 'mmhc' );

/**
 * Fonts for the theme. Must be hosted font (Google fonts for example).
 */
$theme_fonts = array(
	'pt_sans_oswald' => 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|Oswald',
);

/**
 * Setup theme properties and stuff.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', function() {

	// Add theme support
	require_once __DIR__ . '/includes/theme-support.php';

	// Allow shortcodes in text widget
	add_filter('widget_text', 'do_shortcode');
});

/**
 * Register theme files.
 *
 * @since 1.0.0
 */
add_action( 'init', function () {

	global $theme_fonts;

	// Theme styles
	wp_register_style(
		THEME_ID,
		get_template_directory_uri() . '/style.css',
		null,
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION
	);

	// Theme script
	wp_register_script(
		THEME_ID,
		get_template_directory_uri() . '/script.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

	// Admin script
	wp_register_script(
		THEME_ID . '-admin',
		get_template_directory_uri() . '/admin.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

	// Theme fonts
	if ( ! empty( $theme_fonts ) ) {
		foreach ( $theme_fonts as $ID => $link ) {
			wp_register_style(
				THEME_ID . "-font-$ID",
				$link
			);
		}
	}
} );

/**
 * Enqueue theme files.
 *
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', function () {

	global $theme_fonts;

	// Theme styles
	wp_enqueue_style( THEME_ID );

	// Theme script
	wp_enqueue_script( THEME_ID );

	// Theme fonts
	if ( ! empty( $theme_fonts ) ) {
		foreach ( $theme_fonts as $ID => $link ) {
			wp_enqueue_style( THEME_ID . "-font-$ID" );
		}
	}
} );

/**
 * Enqueue admin files.
 *
 * @since 1.0.0
 */
add_action( 'admin_enqueue_scripts', function () {

	global $theme_fonts;

	// Admin script
	wp_enqueue_script( THEME_ID . '-admin' );

	// For image widget
	if ( get_current_screen()->base == 'widgets' ) {
		wp_enqueue_media();
	}

	// Theme fonts
	if ( ! empty( $theme_fonts ) ) {
		foreach ( $theme_fonts as $ID => $link ) {
			wp_enqueue_style( THEME_ID . "-font-$ID" );
		}
	}
} );

/**
 * Register nav menus.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', function () {

	register_nav_menu( 'primary', 'Primary' );
	register_nav_menu( 'top', 'Top' );
	register_nav_menu( 'footer', 'Footer' );
	register_nav_menu( 'error_404', '404 Page' );
} );

/**
 * Register sidebars.
 *
 * @since 1.0.0
 */
add_action( 'widgets_init', function () {

	// Page
	register_sidebar( array(
		'name' => 'Page',
		'id' => 'page',
		'description' => 'Displays on all pages.',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Home Features
	register_sidebar( array(
		'name' => 'Home Features',
		'id' => 'home-features',
		'description' => 'Displays on the home page.',
	));

	// Home About
	register_sidebar( array(
		'name' => 'Home About Image',
		'id' => 'home-about-image',
		'description' => 'Displays on the home page about us section.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));
} );

// Include other static files
require_once __DIR__ . '/admin/admin.php';

// Widgets
require_once __DIR__ . '/includes/widgets/image.php';
require_once __DIR__ . '/includes/widgets/text-icon.php';
require_once __DIR__ . '/includes/widgets/home-feature.php';

// Shortcodes
require_once __DIR__ . '/includes/shortcodes/hours-office.php';
require_once __DIR__ . '/includes/shortcodes/hours-lab.php';
require_once __DIR__ . '/includes/shortcodes/hours-condensed.php';
require_once __DIR__ . '/includes/shortcodes/phone.php';
require_once __DIR__ . '/includes/shortcodes/fax.php';