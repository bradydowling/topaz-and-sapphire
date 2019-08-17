<?php
/**
 * The template for displaying footer section.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

global $infashion_option;
?>
		
	</div> <!-- End: Class container-->

	<?php
	// Instagram Feed
	if( $infashion_option['display_instagram_feed'] ) {
		if ( shortcode_exists( 'instagram-feed' ) ) {
			echo '<div id="instagram-feed">';
		    echo do_shortcode( '[instagram-feed]' ); // load instagram feed using shortcode
		    echo '</div>';
		}
	}
	?>

	<!-- Start: Footer -->
	<footer id="colophone">
		<div class="container">
			<div id="backtotop">
				<i class="icon icon-arrow-up"></i>
			</div>

			<div class="social">
		        <ul>
					<?php if ( $infashion_option['url_facebook'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_facebook']; ?>" target="_blank"><i class="icon icon-social-facebook"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_twitter'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_twitter']; ?>" target="_blank"><i class="icon icon-social-twitter"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_instagram'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_instagram']; ?>" target="_blank"><i class="icon icon-social-instagram"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_gplus'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_gplus']; ?>" target="_blank"><i class="icon icon-social-googleplus"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_linkedin'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_linkedin']; ?>" target="_blank"><i class="icon icon-social-linkedin"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_pinterest'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_pinterest']; ?>" target="_blank"><i class="icon icon-social-pinterest"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_flickr'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_flickr']; ?>" target="_blank"><i class="icon icon-social-flickr"></i></a></li>
					<?php endif; ?>
					<?php if ( $infashion_option['url_youtube'] ) : ?>
						<li><a href="<?php echo $infashion_option['url_youtube']; ?>" target="_blank"><i class="icon icon-social-youtube"></i></a></li>
					<?php endif; ?>
	            </ul>
	        </div><br>

			 <span class="author"><?php printf( __( 'Powered by %1$s. Designed by %2$s', 'infashion' ), '<a href="http://wordpress.org">'. __( 'WordPress', 'infashion' ) .'</a>','<a href="http://www.themewarrior.com">Themewarrior</a>' ); ?></span>
		</div> 
	</footer>
	<!-- End: Footer -->

</div>
<!-- End: Main Content -->

<?php
// Load custom CSS from theme options
if( isset( $grateful_option['custom_css'] ) ) {
    echo '<style type="text/css">';
    echo $grateful_option['custom_css'];
    echo '</style>';
}
?>

<?php wp_footer(); ?>
</body>
</html>