<?php
/**
 * The template for displaying single posts
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

get_header();
?>

<section id="primary" class="content-area site-main" role="main">
	<?php
	// The loop
	if ( have_posts() ) { //check if there is a post
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_format() );// get content template
			get_template_part( 'includes/author-bio' ); // display author description
			comments_template( '', true ); // display comments
		}
	} else {
		get_template_part( 'content', 'none' );
	}
	?>		
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>