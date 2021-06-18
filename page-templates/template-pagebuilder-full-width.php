<?php
/**
 * Template Name: Page Builder Full Width
 *
 * The template for the page builder full-width.
 *
 * It contains header, footer and 100% content width.
 *
 * @package Nityaa
 */

get_header(); ?>

<section class="content-wrapper">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'pagebuilder' );
		endwhile;
	endif;
	?>
</section>

<?php get_footer(); ?>
