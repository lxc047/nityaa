<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nityaa
 */

get_header();

$theme_options  = nityaa_theme_options();
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

					<?php if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</div>
          	</div>
          	<?php get_sidebar(); ?>
        </div>
  	</div>
</section>

<?php
get_footer();
