<?php
// Display Yoast breadcrumb
if ( function_exists( 'yoast_breadcrumb' ) && ! is_home() && ! is_front_page() ) {
	yoast_breadcrumb('<div id="breadcrumb">','</div>');
}
?>