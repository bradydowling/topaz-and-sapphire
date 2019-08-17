<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage inFashion 
 * @since inFashion 1.0.0
 */

  global $infashion_option;
?>

<!-- Start: Sidebar -->
<section id="sidebar" class="site-header">
	<?php
	// Load sidebar widgets
	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Sidebar' ) ) {
		echo '<div class="container"><p class="no-widget">';
		_e('There\'s no widget assigned. You can start assigning widgets to "Sidebar" widget area from the <a href="'. admin_url('/widgets.php') .'">Widgets</a> page.', 'infashion');
		echo '</p></div>';
	}
	?>
</section>
<!-- End: Sidebar -->