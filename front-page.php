<?php
/**
 * The theme's front-page file use for displaying the home page.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

$welcome_blurb_title = get_post_meta( get_the_ID(), '_mmhc_home_welcome_blurb_title', true );
$welcome_blurb_icon  = get_post_meta( get_the_ID(), '_mmhc_home_welcome_blurb_icon', true );
$welcome_blurb_copy  = get_post_meta( get_the_ID(), '_mmhc_home_welcome_blurb_copy', true );
$about_us_blurb_icon = get_post_meta( get_the_ID(), '_mmhc_home_about_us_blurb_icon', true );
$about_us_blurb_copy = get_post_meta( get_the_ID(), '_mmhc_home_about_us_blurb_copy', true );

if ( ! empty( $welcome_blurb_copy ) && ! empty( $welcome_blurb_title ) && ! empty( $welcome_blurb_icon ) ) :
	?>

	<section class="home-section home-welcome">

		<div class="row">
			<div class="columns small-12 large-4">
				<span class="home-welcome-icon icon-effect-huge-light vertical-center">
					<span class="mmhcicon-<?php echo $welcome_blurb_icon; ?>"></span>
				</span>
			</div>

			<div class="home-welcome-blurb columns small-12 large-8">
				<h1 class="home-welcome-title">
					<?php echo $welcome_blurb_title; ?>
				</h1>

				<div class="home-welcome-copy">
					<?php echo apply_filters( 'the_content', $welcome_blurb_copy ); ?>
				</div>
			</div>
		</div>

	</section>

	<?php
	global $_wp_sidebars_widgets;

	if ( empty( $_wp_sidebars_widgets ) ) {
		$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
	};

	$widget_count = 0;
	if ( isset( $_wp_sidebars_widgets['home-features'] ) ) {
		$widget_count = count( $_wp_sidebars_widgets['home-features'] );
	}
	?>
	<section class="home-section home-features row text-center">
		<ul class="columns small-12 small-block-grid-1 medium-block-grid-<?php echo $widget_count; ?>">
			<?php dynamic_sidebar( 'home-features' ); ?>
		</ul>
	</section>

	<section class="home-section home-about">

		<div class="row">
			<div class="columns small-12">

				<h2 class="home-about-title text-center">About Us</h2>

				<?php dynamic_sidebar( 'home-about' ); ?>

			</div>
		</div>

	</section>

<?php
endif;

get_footer();