<?php
/**
 * Template to display sharing buttons
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<!-- Start: Share Buttons -->
<div class="social social-sharing">
	<ul>
		<li class="facebook">
			<a title="<?php _e('Facebook Share', 'infashion'); ?>" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&amp;t=<?php echo str_replace( ' ', '%20', get_the_title() ); ?>"><i class="icon icon-social-facebook"></i> <?php _e('Facebook', 'infashion'); ?></a>
		</li>
		<li class="twitter">
			<a title="<?php _e('Twitter Share', 'infashion'); ?>" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( get_permalink( $post->ID ) ); ?>&amp;shortened_url=<?php echo get_home_url() .'/?p='. $post->ID; ?>&amp;text=<?php echo str_replace( ' ', '%20', get_the_title() ); ?>"><i class="icon icon-social-twitter"></i> <?php _e('Twitter', 'infashion'); ?></a>
		</li>
		<li class="googleplus">
			<a title="<?php _e('Google+ Share', 'infashion'); ?>" target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="icon icon-social-googleplus"></i> <?php _e('Google+', 'infashion'); ?></a>
		</li>
		<li class="pinterest">
			<a title="<?php _e('Pinterest Share', 'infashion'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?source_url=<?php echo urlencode( get_permalink( $post->ID ) ); ?>"><i class="icon icon-social-pinterest"></i> <?php _e('Pinterest', 'infashion'); ?></a>
		</li>
	</ul>
</div>
<!-- End: Share Buttons -->