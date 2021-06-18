<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nityaa
 */

$theme_options  = nityaa_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
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

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading', 'nityaa').'<span class="screen-reader-text"> "%s"</span>' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nityaa' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php if( 1 === $theme_options['enable_post_meta'] ) { ?>
	<div class="entry-footer">
		<?php nityaa_entry_footer(); ?>
	</div><!-- .entry-footer -->
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
