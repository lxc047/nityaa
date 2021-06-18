<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nityaa
 */

$theme_options = nityaa_theme_options();
 
$sidebar_names = array('footer-1', 'footer-2', 'footer-3', 'footer-4' );
$widget_count = nityaa_widget_count( $sidebar_names );
if( 0 < $widget_count ):

?>
	<footer>
      	<div class="container">
        	<div class="row">
        		<?php 
	            $column_class = '';

	            if( 1  === $widget_count ){
	                $column_class = 'col-md-12 col-sm-12';
	            } elseif( 2  === $widget_count ){
	                $column_class = 'col-md-6 col-sm-6';
	            } elseif( 3  === $widget_count ){
	                $column_class = 'col-md-4 col-sm-4';
	            }elseif( 4  === $widget_count ){
	                $column_class = 'col-md-3 col-sm-3';
	            } 
	        	foreach ($sidebar_names as $key => $value) {

	            	if( is_active_sidebar( $value ) ){ 
	            ?>
	          	<div class="col-xs-12 <?php echo esc_attr( $column_class ); ?> footer-item">
	            	<?php dynamic_sidebar( $value ); ?>
	          	</div>
	          	<?php } } ?>
        	</div>
      	</div>
    </footer>

<?php endif; ?>
    
    <div class="sub-footer">
      	<div class="container">
        	<div class="row">
          		<div class="col-md-12">
          			<p><?php echo esc_html( $theme_options['copyright_text'] ); 
					if(!empty( $theme_options['copyright_text'] )) { 
						echo ' - ';
					}
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'nityaa' ), 'Nityaa', '<a href="https://dhaulagiriit.com.np/" target="_blank">Laxman Chhetri</a>' );
					?>
					</p>
          		</div>
        	</div>
      	</div>
    </div>

    <?php if( 1 === $theme_options['enable_scroll_top'] ){ ?>
		<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>
	<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
