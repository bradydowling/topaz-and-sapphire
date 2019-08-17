<?php
/**
 * Template for displaying Page post type.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<?php 
get_header();
get_sidebar(); 

global $infashion_option; 
?>

<section id="primary" <?php post_class('content-area site-main post-detail'); ?> role="main">
	<div id="post-list">
		<article class="blog-post hentry">
			<header class="entry-header">
				<h1 class="post-title"><?php _e('Page Not Found', 'infashion'); ?></h1>
			</header>
			
			<div class="inner">
				<div class="entry-content">
					<p><?php _e('The page you are looking for is not available. The page may have been deleted or unpublished', 'infashion'); ?></p>
				</div>
			</div>
		</article>
	</div>
</section>

<?php get_footer(); ?>