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
			<div class="columns small-12 medium-4 text-right small-only-text-center">

				<div class="show-for-large-up">
					<span class="home-welcome-icon icon-effect-huge-light">
						<span class="flaticon-<?php echo $welcome_blurb_icon; ?>"></span>
					</span>
				</div>

				<div class="hide-for-large-up">
					<span class="home-welcome-icon icon-effect-large-light">
						<span class="flaticon-<?php echo $welcome_blurb_icon; ?>"></span>
					</span>
				</div>
			</div>

			<div class="home-welcome-blurb columns small-12 medium-8">
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

				<div class="home-about-image">
					<?php dynamic_sidebar( 'home-about-image' ); ?>
				</div>

				<div class="home-about-content row">
					<div class="columns small-12 medium-4 text-center medium-text-right">
						<span class="home-about-icon icon-effect-large-light">
							<span class="flaticon-<?php echo $about_us_blurb_icon; ?>"></span>
						</span>
					</div>

					<div class="home-about-blurb columns small-12 medium-8">
						<div class="home-about-copy">
							<?php echo apply_filters( 'the_content', $about_us_blurb_copy ); ?>
						</div>
					</div>
				</div>

			</div>
		</div>

	</section>

<?php
endif;

get_footer();