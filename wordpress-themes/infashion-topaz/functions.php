<?php
/**
 * Function to display post meta
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

function warrior_post_meta() {
	global $post;
	$author = '<a href="' . get_author_posts_url($post->post_author) . '">' . get_the_author() . '</a>';
	//$time = sprintf( __('%s ago', 'infashion'), human_time_diff( get_the_time('U'), current_time('timestamp') ) ) ;
	
?>
	<div class="entry-meta">
		<span><?php _e( 'Written by', 'infashion') ?> <?php echo $author; ?></span>
		<?php if( ! is_search() ) : ?>
			<span> / </span>
			<span><?php the_category(', ') ?></span>
		<?php endif; ?>
		<span> / </span>
		<span><?php echo the_date('F d, Y'); ?></span>
	</div>
<?php
}

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );