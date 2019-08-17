<?php
/**
 * The template for displaying posts in the Chat post format.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<?php global $infashion_option; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('chat post-detail blog-post hentry'); ?>>
	<header class="entry-header">
		<div class="post-icon"><i class="icon icon-umbrella"></i></div>
		<?php if( ! is_single() ) : ?>
			<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php else: ?>
			<h1 class="post-title"><?php the_title(); ?></h1>
		<?php endif; ?>	
	</header>

	<?php warrior_post_meta(); ?>

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
			preg_match_all('%^(<p[^>]*>.*?</p>)$%im', wpautop( get_the_content() ), $chat);
			$content = '';
			if ( $chat && isset($chat[1]) && count($chat[1]) ) :
				$i = 0;
				foreach ($chat[1] as $chat_content) :
					$chat_content	= preg_replace('/<p>(.*?)<\/p>/s', '$1', strip_tags($chat_content));
					$chat_data		= explode(':', $chat_content);
					$chat_author	= count($chat_data) > 1 ? '<label>' . $chat_data[0] . ':</label>' : '';
					$chat_status	= count($chat_data) > 1 ? implode(':', array_slice($chat_data, 1)) : $chat_data[0];
					$line[] = '<li class="' . (++$i%2 ? 'odd' : 'even') . '">' . $chat_author . $chat_status . '</li>';
				endforeach;
				$content = '<ul class="chat">' . implode('', $line) . '</ul>';
			endif;
			echo apply_filters('the_content', $content);

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
		// Display elements on single post page
		if ( is_single() ) {
			echo warrior_tag_hashtag(); // display post tags
			
			// Display share buttons
			if( $infashion_option['share_buttons_post'] ) {
				get_template_part('includes/share-buttons'); 
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