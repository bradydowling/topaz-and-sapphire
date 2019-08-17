<?php
/**
 * The template for displaying posts in the Standard post format.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<?php global $infashion_option; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post post-detail hentry'); ?>>
	<header class="entry-header">
		<div class="post-icon"><i class="icon icon-align-left"></i></div>
		<?php if( ! is_single() ) : ?>
			<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php else: ?>
			<h1 class="post-title"><?php the_title(); ?></h1>
		<?php endif; ?>
	</header>

	<?php warrior_post_meta(); ?>

	<?php if ( has_post_thumbnail() && !is_single() ) : // check if the post has featured image ?>
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
			if ( is_single() ) {
				// Displat full content on single post
				the_content();

				// Display post pagination
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'infashion' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			} else {
				// Display excerpt on archive pages
				the_excerpt();
			}
			?>
		</div>
		
		<?php
		// Display elements on single post page
		if ( is_single() ) {
			echo warrior_tag_hashtag(); // display post tags
			
			// Display share buttons
			if( $infashion_option['share_buttons_post'] ) {
				get_template_part('includes/share-buttons'); 
			}

			// Display related posts
			if ( function_exists('related_posts') ) {
				related_posts();
			}
		} else {
			// Lets display read more button on non-single-post page
			if ( $infashion_option['display_continue_reading'] ) {
				echo '<div class="read-more"><a href="'. get_the_permalink() .'" class="button small">'. __( 'Continue Reading', 'infashion' ) .'</a></div>';
			}
		}
		?>
	</div>
</article>