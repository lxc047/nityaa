<?php
/**
 * The default template for displaying content on page builders templates.
 *
 * Used for page builder full width and page builder blank.
 *
 * @package Nityaa
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</article>
