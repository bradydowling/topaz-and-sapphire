<?php
/**
 * About Author Widget
 *
 * @package WordPress
 * @subpackage Grateful
 * @since Grateful 1.0.0
 */

// Widgets
add_action( 'widgets_init', 'warrior_about_author_widget' );

// Register our widget
function warrior_about_author_widget() {
	register_widget( 'warrior_about_author' );
}

// Warrior Abou the Couple Widget
class warrior_about_author extends WP_Widget {

	//  Setting up the widget
	function warrior_about_author() {
		$widget_ops  = array( 'classname' => 'about_author', 'description' => __('Display a author description, avatar and social network icons.', 'grateful') );
		$control_ops = array( 'id_base' => 'warrior_about_author' );

		$this->WP_Widget( 'warrior_about_author', __('Warrior About Author', 'grateful'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $infashion_option;

		extract( $args );

		$warrior_about_author_title	= apply_filters('widget_title', $instance['warrior_about_author_title']);
		
		echo $before_widget;
?>
        <?php echo $before_title . $warrior_about_author_title . $after_title; ?>
        
		<div class="blocks site-info">
			<?php if ( $infashion_option['author_description'] || $infashion_option['author_photo'] ) : ?>
				<div class="info">
					<?php if( $infashion_option['author_avatar'] ) : ?>
						<p><img src="<?php echo $infashion_option['author_avatar']['url']; ?>" alt="" /></p>
					<?php endif; ?>

					<?php echo wpautop( esc_attr( $infashion_option['author_description'] ) ); ?>
				</div>
			<?php endif; ?>

			<div class="social">
				<?php if ( $infashion_option['url_facebook'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_facebook'] ); ?>" target="_blank"><i class="icon icon-social-facebook"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_twitter'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_twitter'] ); ?>" target="_blank"><i class="icon icon-social-twitter"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_instagram'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_instagram'] ); ?>" target="_blank"><i class="icon icon-social-instagram"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_gplus'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_gplus'] ); ?>" target="_blank"><i class="icon icon-social-googleplus"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_pinterest'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_pinterest'] ); ?>" target="_blank"><i class="icon icon-social-pinterest"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_linkedin'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_linkedin'] ); ?>" target="_blank"><i class="icon icon-social-linkedin"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_youtube'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_youtube'] ); ?>" target="_blank"><i class="icon icon-social-youtube"></i></a>
				<?php endif; ?>
				<?php if ( $infashion_option['url_vimeo'] ) : ?>
					<a href="<?php echo esc_url( $infashion_option['url_vimeo'] ); ?>" target="_blank"><i class="icon icon-social-vimeo"></i></a>
				<?php endif; ?>
			</div>
		</div>
<?php
	echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		global $shortname;

		$instance = $old_instance;

		$instance['warrior_about_author_title']	= esc_attr( $new_instance['warrior_about_author_title'] );

		return $instance;
	}

	function form( $instance ) {
		global $shortname;

		$instance = wp_parse_args( (array) $instance, array('warrior_about_author_title' => __('About Me', 'grateful') ) );
	?>
        <p>
            <label for="<?php echo $this->get_field_id( 'warrior_about_author_title' ); ?>"><?php _e('Widget Title:', 'grateful'); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( 'warrior_about_author_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'warrior_about_author_title' ); ?>" value="<?php echo $instance['warrior_about_author_title']; ?>" />
        </p>
		<p><?php printf( __('The data taken from <a href="%s" target="_blank">Theme Options</a>.', 'infashion'), admin_url('admin.php?page=warriorpanel&tab=4') ); ?></p>
	<?php
	}
}
?>