<?php
/**
 * The template for displaying header part.
 *
 * @package WordPress
 * @subpackage inFashion
 * @since inFashion 1.0.0
 */

global $infashion_option;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo ( $infashion_option['favicon']['url'] ? esc_url( $infashion_option['favicon']['url'] ) : get_template_directory_uri().'/images/favicon.png' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class( 'homepage' ); ?>>
	<header id="masthead" class="site-header">
		<div class="header-main">
			<div class="container">
				<nav id="main-menu" class="site-navigation primary-navigation" role="navigation">
					<?php
					// Display Main menu section
					if ( has_nav_menu( 'main-menu' ) ) {
						wp_nav_menu( array ( 'theme_location' => 'main-menu', 'container' => null, 'menu_class' => 'main-menu', 'depth' => 5 ) );
					}
					?>
					<a class="menu-trigger"></a>
				</nav>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	
	<?php get_template_part( 'includes/slider' ); // display post slider ?>

	<!-- Start: Logo -->
	<div id="logo">
		<?php if( $infashion_option['logo_type'] == '1' ) : ?>
			<div class="box">
				<h2 class="site-title"><a href="<?php echo get_home_url(); ?>"><?php echo bloginfo('name'); ?></a></h2>
			</div>
			<h4 class="site-desc"><?php echo bloginfo('description'); ?></h4>
		<?php else: ?>
			<a href="<?php echo home_url('/'); ?>"><img src="<?php echo ( $infashion_option['logo_image'] ? esc_url( $infashion_option['logo_image']['url'] ) : get_template_directory_uri().'/images/logo.png' ); ?>" alt="<?php get_bloginfo('name'); ?>" /></a>
		<?php endif; ?>
	</div>
	<!-- End: Logo -->

	<!-- Start: Main Content -->
	<div id="main-content">
		<div class="container">
		