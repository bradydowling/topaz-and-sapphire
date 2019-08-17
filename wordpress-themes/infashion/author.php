<?php
/**
 * Template for displaying author.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

global $infashion_option;

get_header(); 

$author_ID = $author;			
$display_name = get_the_author_meta( 'display_name', $author_ID );
$description = get_the_author_meta( 'description', $author_ID );
?>

<section id="primary" class="content-area site-main" role="main">
	<section id="about-site" class="homepage-widget">
		<div class="inner">
			<div class="thumbnail">
				<?php echo get_avatar( get_the_author_meta('user_email'), '100' ); ?>
			</div>	
			<div class="detail">
				<h1><?php echo $display_name; ?></h1>
				<?php echo wpautop( $description ); ?>
				
				<?php get_template_part( 'includes/user-profile' ); ?>
			</div>
		</div>	
	</section>

	<div id="post-list">
		<?php
		// The loop
		if ( have_posts() ) {
			get_template_part( 'includes/breadcrumb' ); // display breadcrumb
			while ( have_posts() ) {
				the_post();
				get_template_part( 'content', get_post_format() ); // get content template
			}
			get_template_part( 'includes/pagination' );
		}
		?>
	</div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>