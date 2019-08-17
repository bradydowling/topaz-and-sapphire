<?php
/**
 * The template for displaying posts in Page.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<?php global $infashion_option; ?>

<article <?php post_class('blog-post post-detail'); ?>>
	<header class="entry-header">
		<div class="post-icon"><i class="icon icon-align-left"></i></div>
		<h1 class="post-title"><?php the_title(); ?></h1>
	</header>

	<?php if ( has_post_thumbnail() ) : // check if the post has featured image ?>
		<div class="thumbnail">
			<?php
			// Get featured image
			the_post_thumbnail( 'blog-image' );
			?>
		</div>
	<?php endif; ?>

	<div class="inner">
		<div class="entry-content">
			<?php
			// Displat full content on single post
			the_content();

			// Display post pagination
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'infashion' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div>
		
		<?php	
		// Display share buttons
		if( $infashion_option['share_buttons_page'] ) {
			// get_template_part('includes/share-buttons'); 
		}
		?>
	</div>
</article>