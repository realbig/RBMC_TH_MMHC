<?php
/**
 * The theme's header file that appears on EVERY page.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/vendor/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<header id="site-header">

		<div class="header-top row">
			<div class="columns small-12">

				<div class="site-logo left">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header-logo.png" width="300"
					     height="95"/>
				</div>

				<div class="right">

					<div class="line">
						<div class="search">
							<?php get_search_form(); ?>
						</div>

						<nav class="top-nav">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'top',
								'container'      => false,
							) );
							?>
						</nav>
					</div>

					<p class="phone">
						<?php echo wp_is_mobile() ? '<a href="tel:' . _mmhc_sc_phone() . '">' : ''; ?>
						<span class="mmhcicon-iphone26"></span><?php echo _mmhc_sc_phone(); ?>
						<?php echo wp_is_mobile() ? '</a>' : ''; ?>
					</p>

					<p class="hours">
						<?php echo _mmhc_sc_hours_condensed(); ?>
					</p>
				</div>

			</div>
		</div>

		<nav id="site-nav">
			<div class="row">
				<div class="columns small-12">

					<?php
					global $_mmhc_primary_nav_count;
					$primary_nav = wp_get_nav_menu_object( 'primary' );
					$_mmhc_primary_nav_count = $primary_nav->count;

					require_once __DIR__ . '/includes/primary-nav-walker.php';

					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'walker' => new MMHC_Walker_PrimaryNav,
					) );
					?>
				</div>
			</div>
		</nav>

	</header>

	<section id="site-content">