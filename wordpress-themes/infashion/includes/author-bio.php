<?php
/**
 * Template for displaying author bio.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<?php global $infashion_option; ?>
<?php if( $infashion_option['display_author_'] ) : ?>
<div class="widgets about-author">
	<div class="inner">
			<div class="thumbnail">
				<?php echo get_avatar( $post->post_author, '100' ); ?>
			</div>

			<div class="detail">
				<i><?php _e( 'Written by', 'infashion' ); ?></i>
				<h4><?php the_author_posts_link(); ?></h4>
				<?php echo wpautop( get_the_author_meta( 'description', $post->post_author ) ); ?>
				<?php get_template_part( 'includes/user-profile' ); ?>
			</div>
		<div class="clearfix"></div>
	</div>
</div>
<?php endif; ?>