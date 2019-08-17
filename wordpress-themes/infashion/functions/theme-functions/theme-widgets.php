<?php
/**
 * Function to register widget areas
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'warrior_register_sidebars' ) ) {
	function warrior_register_sidebars(){
		// Footer Widget
		if ( function_exists('register_sidebar') ) {
			register_sidebar(array(
				'name' => __('Sidebar', 'infashion'),
				'before_widget' => '<div id="widget-%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>',
			));
		}	
	}
}

/**
 * Function to remove default widgets after theme switch
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'warrior_removed_default_widgets' ) ) {
	function warrior_removed_default_widgets(){
		global $wp_registered_sidebars;
		$widgets = get_option('sidebars_widgets');
		foreach ($wp_registered_sidebars as $sidebar=>$value) {
			unset($widgets[$sidebar]);
		}
		update_option('sidebars_widgets', $widgets);
	}
}

if ( is_admin() && $pagenow == 'themes.php' && isset($_GET['activated'] ) )
	add_action( 'admin_init', 'warrior_removed_default_widgets' );


// Load Custom Widgets
include_once( get_template_directory() . '/includes/widgets/warrior-about-author.php' );
include_once( get_template_directory() . '/includes/widgets/warrior-recent-posts.php' );
include_once( get_template_directory() . '/includes/widgets/warrior-twitter.php' );
?>