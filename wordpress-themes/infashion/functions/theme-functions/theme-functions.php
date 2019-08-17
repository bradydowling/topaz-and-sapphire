<?php

/**
 * Function to collect the title of the current page
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'warrior_archive_title' ) ) {
	function warrior_archive_title() {
		global $wp_query;

		$title = '';
		if ( is_category() ) :
			$title = sprintf( __( '%s <span>Category Archives</span>', 'guru' ), single_cat_title( '', false ) );
		elseif ( is_tag() ) :
			$title = sprintf( __( '%s <span>Tag Archives</span>', 'guru' ), single_tag_title( '', false ) );
		elseif ( is_tax() ) :
			$title = sprintf( __( '%s <span>Taxonomy Archives</span>', 'guru' ), __('Category', 'guru') );
		elseif ( is_day() ) :
			$title = sprintf( __( '%s <span>Daily Archives</span>', 'guru' ), date_i18n() );
		elseif ( is_month() ) :
			$title = sprintf( __( '%s <span>Monthly Archives</span>', 'guru' ), date_i18n( 'F Y' ) );
		elseif ( is_year() ) :
			$title = sprintf( __( '%s <span>Yearly Archives</span>', 'guru' ), date_i18n( 'Y' ) );
		elseif ( is_author() ) :
			$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
			$title = sprintf( __( '%s <span>Author Archives</span>', 'guru' ), get_the_author_meta( 'display_name', $author->ID ) );
		elseif ( is_search() ) :
			if ( $wp_query->found_posts ) {
				$title = sprintf( __( 'Search Results for: "%s"', 'guru' ), esc_attr( get_search_query() ) );
			} else {
				$title = sprintf( __( 'No Results for: "%s"', 'guru' ), esc_attr( get_search_query() ) );
			}
		elseif ( is_404() ) :
			$title = __( 'Not Found', 'guru' );
		elseif ( is_home() || is_front_page() || is_single() ) :
			$title = '';
		else :
			$title = __( 'Blog', 'guru' );
		endif;
		
		return $title;
	}
}

/**
 * Function to load comment list
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'warrior_comment_list' ) ) {
	function warrior_comment_list($comment, $args, $depth) {
		global $post;
		$author_post_id = $post->post_author;
		$GLOBALS['comment'] = $comment;

		// Allowed html tags will be display
		$allowed_html = array(
			'a' => array( 'href' => array(), 'title' => array() ),
			'abbr' => array( 'title' => array() ),
			'acronym' => array( 'title' => array() ),
			'strong' => array(),
			'b' => array(),
			'blockquote' => array( 'cite' => array() ),
			'cite' => array(),
			'code' => array(),
			'del' => array( 'datetime' => array() ),
			'em' => array(),
			'i' => array(),
			'q' => array( 'cite' => array() ),
			'strike' => array(),
			'ul' => array(),
			'ol' => array(),
			'li' => array()
		);
		
		switch ( $comment->comment_type ) :
			case '' :
	?>
		<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
		
			<div class="main-comment">
				<div class="thumbnail"><a href="#"><?php echo get_avatar( $comment, 60 ); ?></a></div><!-- .comment-author -->
				<div class="detail">
					<h5><?php comment_author_link(); ?></h5>
					<div class="entry-meta"><span><?php echo get_comment_date('F d, Y h.i a'); ?></span></div>

					<?php if ($comment->comment_approved == '0') : ?>
						<p class="moderate"><?php _e('Your comment is now awaiting moderation before it will appear on this post.', 'infashion');?></p>
					<?php endif; ?>
					<?php echo apply_filters('comment_text', wp_kses( get_comment_text(), $allowed_html ) );  ?>

					<div class="reply">
					<?php echo comment_reply_link(array('reply_text' => '<i class="fa fa-comment-o"></i> '. __('Reply', 'infashion'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ));  ?>&nbsp;	
					<span class="edit-link"><?php edit_comment_link(__('<i class="fa fa-edit"></i> Edit', 'infashion'), '', ''); ?></span>
					</div><!-- .reply -->
				</div>
			</div><!-- .comment-metadata --><!-- .comment-content -->

		</li><!-- #comment-## -->
	<?php
			break;
			case 'pingback'  :
			case 'trackback' :
	?>
				<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
					<div class="comment-box clearfix">
						<div class="author">
							<a href="<?php comment_author_url()?>"><?php _e('Pingback', 'infashion'); ?></a>
						</div>
						<div class="comment-body">
							<?php comment_author(); ?>
						</div>
						<div class="meta">
							<?php comment_date(); echo ' - '; comment_time(); ?>
							<span class="edit-link"><?php edit_comment_link(__('<i class="fa fa-edit"></i> Edit Comment', 'infashion'), '', ''); ?></span>
						</div>
					</div>
				</li>	
	<?php
			break;
		endswitch;
	}
}


if ( ! function_exists( 'warrior_comment_form_top' ) ) {
	function warrior_comment_form_top() {
	?>
	
	<?php
	}
	add_action( 'comment_form_top', 'warrior_comment_form_top' );

	function warrior_comment_form_bottom() {
	?>

	
	<?php
	}
}
add_action( 'comment_form', 'warrior_comment_form_bottom', 1 );


/**
 * Add class on posts prev & next
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

if ( ! function_exists( 'next_posts_link_class' ) ) {
	function next_posts_link_class() {
	    return 'class="next"';
	}
}
add_filter('next_posts_link_attributes', 'next_posts_link_class');


if ( ! function_exists( 'previous_posts_link_class' ) ) {
	function previous_posts_link_class() {
	    return 'class="prev"';
	}
}
add_filter('previous_posts_link_attributes', 'previous_posts_link_class');


/**
 * Function to get the first link from a post. Based on the codes from WP Recipes 
 * http://www.wprecipes.com/wordpress-tip-how-to-get-the-first-link-in-post
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'get_link_url' ) ) {
	function get_link_url() {
	    $content = get_the_content();
	    $has_url = get_url_in_content( $content );

	    return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}
}

/**
 * Warrior gallery slider function
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

if ( ! function_exists( 'warrior_gallery' ) ) {
	function warrior_gallery($content, $attr) {
		// Call WordPress thickbox library
		add_thickbox();

		if ( get_post_format() == 'gallery' ) {
			$post = get_post();
			static $instance = 0;
			$instance++;
			
			if ( isset( $attr['orderby'] ) ) :
				$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
				if ( !$attr['orderby'] )
					unset( $attr['orderby'] );
			endif;

			extract(shortcode_atts(array(
				'order'      => 'ASC',
				'orderby'    => 'menu_order ID',
				'id'         => $post ? $post->ID : 0,
				'size'       => 'small-thumb-1',
				'include'    => '',
				'exclude'    => ''
			), $attr));

			$id = intval( $id );
			if ( 'RAND' == $order )
				$orderby = 'none';

			if ( !empty( $include ) ) {
				$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

				$attachments = array();
				foreach ( $_attachments as $key => $val ) {
					$attachments[ $val->ID ] = $_attachments[ $key ];
				}
			} elseif ( !empty( $exclude ) ) {
				$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
			} else {
				$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
			}

			$size = 'small-thumb-1';

			if ( empty( $attachments ) )
				return '';

			if ( is_feed() ) {
				$output = "\n";
				foreach ( $attachments as $att_id => $attachment )
					$output .= wp_get_attachment_image( $att_id, $size ) . "\n";
				return $output;
			}

			$output = "<div id='gallery-{$instance}' class='warrior-gallery galleryid-{$id}'>";

			$i = 0;
			foreach ( $attachments as $id => $attachment ) {
				if ( ! empty( $attr['link'] ) && 'file' === $attr['link'] )
					$image_output = wp_get_attachment_link( $id, $size );
				elseif ( ! empty( $attr['link'] ) && 'none' === $attr['link'] )
					$image_output = wp_get_attachment_link( $id, $size );
				else
					$image_output = wp_get_attachment_link( $id, $size );

				$image_meta  = wp_get_attachment_metadata( $id );

				$output .= "\n";
				$output .= "$image_output";
				$output .= "\n";
			}
			$output .= "</div>";

			return $output;
		}
	}
}
add_filter( 'post_gallery', 'warrior_gallery', 10, 2 );


/**
 * Function to display post meta
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'warrior_post_meta' ) ) {
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
			<span><?php echo date_i18n('F d, Y'); ?></span>
		</div>
<?php
	}
}


/**
 * Change default excerpt more text
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if( !function_exists( 'warrior_excerpt_more ') ) {
	function warrior_excerpt_more( ) {
		return ' ...';
	}
}
add_filter( 'excerpt_more', 'warrior_excerpt_more', 999 );


/**
 * Change default excerpt length
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if( ! function_exists( 'warrior_excerpt_length ') ) {
	function warrior_excerpt_length( $length ) {
		global $infashion_option;

		return $infashion_option['post_excerpt_length'];
	}
}
add_filter( 'excerpt_length', 'warrior_excerpt_length', 999 );


/**
 * Add hashtag in front of tag
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if( ! function_exists( 'warrior_tag_hashtag ') ) {
	function warrior_tag_hashtag() {
		if( $tags = get_the_tags() ) {
		    echo '<div class="post-tags">';
		    foreach( $tags as $tag ) {
		        $sep = ( $tag === end( $tags ) ) ? '' : ' ';
		        echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a>' . $sep;
		    }
		    echo '</div>';
		}
	}
}
add_filter( 'excerpt_length', 'warrior_excerpt_length', 999 );

/**
 * Remove unwanted CSS / JS files
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
add_action('wp_print_styles','warrior_remove_header_styles');
if ( ! function_exists('warrior_remove_header_styles') ) {
	function warrior_remove_header_styles() {
		wp_dequeue_style('yarppWidgetCss');
	}
}

add_action('get_footer','warrior_remove_footer_styles');
if ( ! function_exists('warrior_remove_footer_styles') ) {
	function warrior_remove_footer_styles() {
		wp_dequeue_style('yarppRelatedCss');
	}
}