<?php
/**
 * Function to load JS & CSS files
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

if ( ! function_exists( 'warrior_enqueue_scripts' ) ) {
	function warrior_enqueue_scripts() {
		global $pagenow;
		
		// Only load these scripts on frontend
		if( !is_admin() && $pagenow != 'wp-login.php' ) {

			// Load all Javascript files
			wp_enqueue_script('jquery');

			if ( is_singular() ) {
				wp_enqueue_script( 'comment-reply' );
			}

			wp_enqueue_script('nprogress', get_template_directory_uri() .'/js/nprogress.js', '', null, true);
			wp_enqueue_script('wow', get_template_directory_uri() .'/js/wow.min.js', '', '0.1.6', true);
			wp_enqueue_script('flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', '', '2.2.2', true);
			wp_enqueue_script('mobilemenu', get_template_directory_uri() .'/js/jquery.mobilemenu.js', '', '1.1', true);
			wp_enqueue_script('fitvids', get_template_directory_uri() .'/js/jquery.fitvids.js', '', '1.1', true);
			wp_enqueue_script('jrespond', get_template_directory_uri() .'/js/jrespond.min.js', '', ' 0.10', true);
			wp_enqueue_script('jquery-floating-placeholder', get_template_directory_uri() .'/js/jquery-floating-placeholder.min.js', '', null, true);
			wp_enqueue_script('justifiedGallery', get_template_directory_uri() .'/js/jquery.justifiedGallery.min.js', '', '3.5.1', true);
			wp_enqueue_script('functions', get_template_directory_uri() .'/js/functions.js', '', null, true);

			// Localize script
			wp_localize_script('functions', '_warrior', array(
			));

			// Load all CSS files
			wp_enqueue_style('reset', get_template_directory_uri() .'/css/reset.css', array(), false, 'all');
			wp_enqueue_style('nprogress', get_template_directory_uri() .'/css/nprogress.css', array(), false, 'all');
			wp_enqueue_style('icomoon', get_template_directory_uri() .'/fonts/icomoon/style.css', array(), false, 'all');
			wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css', array(), null, 'all' );
			wp_enqueue_style('justifiedGallery', get_template_directory_uri() .'/css/justifiedGallery.min.css', array(), false, 'all');
			wp_enqueue_style('flexslider', get_template_directory_uri() .'/css/flexslider.css', array(), false, 'all');
			wp_enqueue_style('style', get_template_directory_uri() .'/style.css', array(), false, 'all');
			wp_enqueue_style('responsive', get_template_directory_uri() .'/css/responsive.css', array(), false, 'all');

			// Load custom CSS file
			wp_enqueue_style('custom', get_template_directory_uri() .'/custom.css', array(), false, 'screen');
		}
	}
}
add_action( 'wp_print_styles', 'warrior_enqueue_scripts' );


/**
 * Function to load JS & CSS files on init
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */
if ( ! function_exists( 'warrior_init_styles' ) ) {
	function warrior_init_styles () {
		add_editor_style( 'css/editor-style.css' );
	}
}
add_action( 'init', 'warrior_init_styles' );
?>