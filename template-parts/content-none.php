<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nityaa
 */
?>

<section class="no-results not-found">
	<div class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'nityaa' ); ?></h1>
	</div><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>'
					/* translators: 1: link to WP admin new post page. */
					esc_html_e( 'Ready to publish your first post?', 'nityaa'). '<a href="%1$s">'. esc_html_e( 'Get started here.', 'nityaa').'</a>.' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				. '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nityaa' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nityaa' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
