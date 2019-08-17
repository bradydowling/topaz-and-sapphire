<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package WordPress
 * @subpackage Poris
 * @since Poris 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post hentry'); ?>>
	<div class="inner">
		<header class="entry-header">
			<div class="post-icon">
				<i class="icon icon-ribbon"></i>
			</div>
		</header>

		<div class="entry-content">
			<blockquote>
				<?php echo strip_shortcodes( the_content() ); ?>	
				<cite><?php echo strip_shortcodes( the_title() ); ?></cite>
			</blockquote>
		</div>
	</div>
</article>