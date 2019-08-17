<?php
/**
 * The template for displaying posts in the Standard post format.
 *
  * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<?php
// Get social media profile value
$author_id = get_the_author_meta( 'ID' );

$url_facebook = get_field('facebook_url', 'user_'. $author_id );
$url_twitter = get_field('twitter_url', 'user_'. $author_id );
$url_instagram = get_field('instagram_url', 'user_'. $author_id );
$url_gplus = get_field('google_plus_url', 'user_'. $author_id );
$url_pinterest = get_field('pinterest_url', 'user_'. $author_id );
$url_youtube = get_field('youtube_url', 'user_'. $author_id );
$url_vimeo = get_field('vimeo_url', 'user_'. $author_id );
$url_linkedin = get_field('linkedin_url', 'user_'. $author_id );
?>
 
<div class="social">
	<ul>
		<?php if( $url_facebook ) : ?>
			<li><a href="<?php echo esc_url( $url_facebook ); ?>" target="_blank"><i class="icon icon-social-facebook"></i></a></li>
		<?php endif; ?>
	 
		<?php if( $url_twitter ) : ?>
			<li><a href="<?php echo esc_url( $url_twitter ); ?>" target="_blank"><i class="icon icon-social-twitter"></i></a></li>
		<?php endif; ?>

		<?php if( $url_gplus ) : ?>
			<li><a href="<?php echo esc_url( $url_gplus ); ?>" target="_blank"><i class="icon icon-social-googleplus"></i></a></li>
		<?php endif; ?>

		<?php if( $url_instagram ) : ?>
			<li><a href="<?php echo esc_url( $url_instagram ); ?>" target="_blank"><i class="icon icon-social-instagram"></i></a></li>
		<?php endif; ?>

		<?php if( $url_linkedin ) : ?>
			<li><a href="<?php echo esc_url( $url_linkedin ); ?>" target="_blank"><i class="icon icon-social-linkedin"></i></a></li>
		<?php endif; ?>

		<?php if( $url_pinterest ) : ?>
			<li><a href="<?php echo esc_url( $url_pinterest ); ?>" target="_blank"><i class="icon icon-social-pinterest"></i></a></li>
		<?php endif; ?>

		<?php if( $url_youtube ) : ?>
			<li><a href="<?php echo esc_url( $url_youtube ); ?>" target="_blank"><i class="icon icon-social-youtube"></i></a></li>
		<?php endif; ?>

		<?php if( $url_vimeo ) : ?>
			<li><a href="<?php echo esc_url( $url_vimeo ); ?>" target="_blank"><i class="icon icon-social-vimeo"></i></a></li>
		<?php endif; ?>
	</ul>
</div>