<?php
/**
 * Widget: Home Feature.
 *
 * @since   1.0.0
 * @package MMHC
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'widgets_init', function () {
	register_widget( 'MMHC_Widget_HomeFeature' );
} );

/**
 * Class MMHC_Widget_HomeFeature
 *
 * Widget for showing Text boxes with an Icon in the title.
 *
 * @since 1.0.0
 */
class MMHC_Widget_HomeFeature extends WP_Widget {

	public function __construct() {

		// Build the widget
		parent::__construct(
			'mmhc_homefeature',
			'Home Feature',
			array(
				'description' => 'For use in the MMHC home page feature section.',
			)
		);
	}

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		$link = ! empty( $instance['link'] ) ? get_permalink( $instance['link'] ) : false;

		if ( ! empty( $instance['icon'] ) ) {
			echo $link ? "<a href=\"$link\">" : '';
			?>
			<div class="home-feature-icon icon-effect-large">
				<span class="flaticon-<?php echo $instance['icon']; ?>"></span>
			</div>
			<?php
			echo ! empty( $instance['link'] ) ? '</a>' : '';
		}

		if ( ! empty( $instance['title'] ) ) {
			?>
			<h2 class="home-feature-title">
				<?php
				echo $link ? "<a href=\"$link\">" : '';
				echo apply_filters( 'widget_title', $instance['title'] );
				echo ! empty( $instance['link'] ) ? '</a>' : '';
				?>
			</h2>
			<?php
		}

		if ( ! empty( $instance['text'] ) ) {
			?>
			<div class="home-feature-copy text-left">
				<?php echo apply_filters( 'the_content', $instance['text'] ); ?>
			</div>
		<?php
		}

		echo $args['after_widget'];
	}

	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$icon  = ! empty( $instance['icon'] ) ? $instance['icon'] : '';
		$text  = ! empty( $instance['text'] ) ? $instance['text'] : '';
		$link  = ! empty( $instance['link'] ) ? $instance['link'] : 0;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>"
			       name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text"
			       value="<?php echo esc_attr( $icon ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" rows="10"
			          name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_attr( $text ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e( 'Link:' ); ?></label>
			<?php
			wp_dropdown_pages( array(
				'selected'          => $link,
				'name'              => $this->get_field_name( 'link' ),
				'id'                => $this->get_field_id( 'link' ),
				'show_option_none'  => 'Select a page',
				'option_none_value' => 0,
			) );
			?>
		</p>
	<?php
	}
}