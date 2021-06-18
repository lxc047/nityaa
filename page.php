<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nityaa
 */

get_header();

$theme_options  = nityaa_theme_options();

if (( 1 == $theme_options['home_content']) || (is_page() && !is_front_page() )) {
?>

<section class="content-wrapper">
  	<div id="content" class="container">
        <div class="row">

        	<?php if( 'left' == $theme_options['sidebar'] ) { ?>

            <div id="primary" class="col-xs-12 col-sm-9 col-md-9 primary-wrapper left-sidebar">

            <?php } elseif( 'no_side' == $theme_options['sidebar'] ) { ?>

            <div id="primary" class="col-xs-12 col-sm-12 col-md-12 primary-wrapper">
			
			<?php } else { ?>

			<div id="primary" class="col-xs-12 col-sm-9 col-md-9 primary-wrapper">

            <?php } ?>
	            <div id="main" class="site-main" role="main">
	              	<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
	            </div>
          	</div>
          	<?php get_sidebar(); ?>
        </div>
  	</div>
</section>

<?php
}
get_footer();
