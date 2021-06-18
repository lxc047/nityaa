<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nityaa
 */

$theme_options  = nityaa_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php if( 1 === $theme_options['enable_post_date'] ) {
				nityaa_posted_on();
			}elseif( 1 === $theme_options['enable_post_author'] ){
				nityaa_posted_by();
			}else{ }
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-header -->

	<?php nityaa_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php if( 1 === $theme_options['enable_post_meta'] ) { ?>
	<div class="entry-footer">
		<?php nityaa_entry_footer(); ?>
	</div><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
