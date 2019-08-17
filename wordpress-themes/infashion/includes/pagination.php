<?php
/**
 * The Template for displaying pagination
 *
 * @package WordPress
 * @subpackage Poris
 * @since Poris 1.0.0
 */
?>


<?php global $wp_query, $infashion_option; if( $wp_query->max_num_pages > 1 ) : ?>
<!-- Start: Pagination -->
<div id="post-pagination" class="pagination" >
	<?php
	// Check if WP Page-Navi plugin is installed and activated
	if( function_exists( 'wp_pagenavi' ) ) {
		wp_pagenavi();
	} else {
		previous_posts_link('<span class="prev"><i class="icon icon-arrow-left"></i>'. __( 'Previous Posts', 'infashion' ) .'</span>');
		next_posts_link('<span class="next">'. __( 'Next Posts', 'infashion' ) .'<i class="icon icon-arrow-right"></i></span>');
	}
	?>
</div>
<!-- End: Pagination -->
<?php endif; ?>