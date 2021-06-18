<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nityaa
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$theme_options  = nityaa_theme_options();

if( 'no_side' == $theme_options['sidebar'] ) {
	return;
}
?>

<div id="secondary" class="widget-area col-xs-12 col-sm-3 col-md-3">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
