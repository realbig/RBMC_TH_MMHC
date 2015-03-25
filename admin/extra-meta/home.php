<?php
/**
 * Home extra meta.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'add_meta_boxes', '_mmhc_add_metaboxes_home' );
add_action( 'save_post', '_mmhc_save_metaboxes_home' );

function _mmhc_add_metaboxes_home() {

	global $post;

	if ( $post->post_name != 'home' ) {
		return;
	}

	// Disable editor
	remove_post_type_support( 'page', 'editor' );

	add_meta_box(
		'mmhc_mb_home_extra',
		__( 'Home Information', 'KidNiche' ),
		'_mmhc_mb_home_extra_callback',
		'page'
	);
}

function _mmhc_mb_home_extra_callback() {

	global $post;

	wp_nonce_field( __FILE__, 'mmhc_mb_home_extra_nonce' );

	$welcome_blurb_title = get_post_meta( $post->ID, '_mmhc_home_welcome_blurb_title', true );
	$welcome_blurb_icon = get_post_meta( $post->ID, '_mmhc_home_welcome_blurb_icon', true );
	$welcome_blurb_copy       = get_post_meta( $post->ID, '_mmhc_home_welcome_blurb_copy', true );
	$about_us_blurb_icon       = get_post_meta( $post->ID, '_mmhc_home_about_us_blurb_icon', true );
	$about_us_blurb_copy       = get_post_meta( $post->ID, '_mmhc_home_about_us_blurb_copy', true );
	?>

	<h2>Welcome Blurb</h2>

	<p>
		<label>
			Welcome blurb title:
			<br/>
			<input type="text" class="widefat" name="_mmhc_home_welcome_blurb_title"
			       value="<?php echo $welcome_blurb_title; ?>"/>
		</label>
	</p>

	<p>
		<label>
			Welcome blurb icon:
			<br/>
			<input type="text" name="_mmhc_home_welcome_blurb_icon"
			       value="<?php echo $welcome_blurb_icon; ?>"/>
		</label>
	</p>
	<p>
		<label>
			Welcome blurb copy:
			<br/>
			<textarea class="widefat" rows="3"
			          name="_mmhc_home_welcome_blurb_copy"><?php echo $welcome_blurb_copy; ?></textarea>
		</label>
	</p>

	<h2>About Us</h2>

	<p>
		<label>
			About us icon:
			<br/>
			<input type="text" name="_mmhc_home_about_us_blurb_icon"
			       value="<?php echo $about_us_blurb_icon; ?>"/>
		</label>
	</p>

	<p>
		<label>
			About us copy:
			<br/>
			<textarea class="widefat" rows="3"
			          name="_mmhc_home_about_us_blurb_copy"><?php echo $about_us_blurb_copy; ?></textarea>
		</label>
	</p>
<?php
}

function _mmhc_save_metaboxes_home( $post_ID ) {

	if ( ! isset( $_POST['mmhc_mb_home_extra_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['mmhc_mb_home_extra_nonce'], __FILE__ ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_ID ) ) {
		return;
	}

	$options = array(
		'_mmhc_home_welcome_blurb_title',
		'_mmhc_home_welcome_blurb_icon',
		'_mmhc_home_welcome_blurb_copy',
		'_mmhc_home_about_us_blurb_icon',
		'_mmhc_home_about_us_blurb_copy',
	);

	foreach ( $options as $option ) {

		if ( ! isset( $_POST[ $option ] ) || empty( $_POST[ $option ] ) ) {
			delete_post_meta( $post_ID, $option );
		}

		update_post_meta( $post_ID, $option, $_POST[ $option ] );
	}
}