<?php
/**
 * Template for displaying post carousel slider.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

global $infashion_option;
?>

<!-- Start carousel slider -->
<div id="slider-header" class="carousel flexslider">
	<ul class="slides">
		<?php
		$args = array(
		  	'post_type' 			=> 'post',
			'post_status' 			=> 'publish',
			'tax_query' => array(
			    array(
			      'taxonomy' => 'post_format',
			      'field' => 'slug',
			      'terms' => 'post-format-quote',
			      'operator' => 'NOT IN'
			    )
			 ),
			'orderby' 				=> 'rand',
			'ignore_sticky_posts' 	=> 1,
		);
		$the_loop = new WP_Query( $args );
		if ( $the_loop->have_posts() ) : while ( $the_loop->have_posts() ) : $the_loop->the_post();
		?>
		<li>
			<div class="overlay">
				<div class="detail">
					<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<div class="entry-meta">
						<span><?php the_category(', ') ?></span>
					</div>
				</div>
			</div>
			<div class="thumbnail">
				<?php
				// Get featured image
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumb-slider' );
				}
				?>
			</div>
		</li>
	<?php endwhile; endif; ?>
	</ul>
</div>
<!-- End carousel slider -->