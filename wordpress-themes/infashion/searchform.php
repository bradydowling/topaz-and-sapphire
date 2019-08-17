<?php
/**
 * The template for displaying search form.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
?>

<!-- Start : Search Form Widgets -->
<div class="blocks widgets search-widget">
	<div class="wrapper">
		<form class="block-form float-label search-form" method="get" action="<?php echo home_url('/'); ?>">
			<div class="form-group block">
				<input type="text" id="search_widget" class="input" name="s" value="<?php the_search_query(); ?>" placeholder="Type your search..."/>
				<button type="submit" class="searchbutton" onclick="jQuery('#search-form').submit();"><i class="icon icon-search"></i></button>
			</div>
		</form>
	</div>
</div>
<!-- End : Search Form Widgets -->