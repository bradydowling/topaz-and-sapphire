<?php 
/**
 * The template for displaying comments
 *
 * @package WordPress
 * @subpackage Poris
 * @since Poris 1.0.0
 */
?>

<?php get_header(); ?>

<section id="primary" class="content-area site-main" role="main">
	<div id="post-list">
		<?php
		// The loop
		if ( have_posts() ) {
			get_template_part( 'includes/breadcrumb' ); // display breadcrumb
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content-page' ); // get content template
			}

		} else {
			get_template_part( 'content', 'none' );
		}
		?>
	</div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
