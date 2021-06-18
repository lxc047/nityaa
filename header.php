<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nityaa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php

	$theme_options  = nityaa_theme_options();

?>

<body <?php body_class(); ?>>

	<?php if( 1 === $theme_options['top_header'] ){ ?>
	<!-- Header -->
    <div class="sub-header">
      	<div class="container">
        	<div class="row">
          		<div class="col-md-6 col-xs-12">
		            <ul class="left-info">
		            	<?php if(!empty( $theme_options['top_header_email'] )) { ?>
		              	<li><a href="mailto:<?php echo esc_html( $theme_options['top_header_email'] ); ?>"><i class="fas fa-envelope-square"></i><?php echo esc_html( $theme_options['top_header_email'] ); ?></a></li>
		            	<?php } if(!empty( $theme_options['top_header_phone'] )) { ?>
		              	<li><a href="tell:<?php echo esc_html( $theme_options['top_header_phone'] ); ?>"><i class="fas fa-phone-square-alt"></i><?php echo esc_html( $theme_options['top_header_phone'] ); ?></a></li>
		            	<?php } ?>
		            </ul>
          		</div>
	          	<div class="col-md-6">
	          		<?php if( 1 === $theme_options['enable_social_media'] ){
						do_action( 'nityaa_social_media' );
					} ?>
	          	</div>
        	</div>
      	</div>
    </div>
   	<?php } ?>

    <header class="">
      	<nav class="navbar navbar-expand-lg">
	        <div class="container">
	        	<?php if ( has_custom_logo() ) { ?> 

	        	<div class="site-logo-img">
			        <?php
			          the_custom_logo();
			        ?> 
			     </div><!-- site-branding -->

	        	<?php } else { ?>
	        	<div class="site-logo-img">
		          	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><h2><?php bloginfo( 'name' ); ?></h2></a>
		          	<?php
			        $description = get_bloginfo( 'description', 'display' );
			        if ( $description || is_customize_preview() ) : ?>
			        </br><p class="site-description"><?php echo $description; ?></p>
			        <?php
			        endif; ?>
		    	</div>
	          	<?php } ?>
	          	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	            <i class="fas fa-align-justify"></i>
	          	</button>
	          	<?php
                if ( has_nav_menu( 'primary' ) ) {

                    wp_nav_menu( array(
                      'theme_location'  => 'primary',
                      'depth'             => 2,
                      'container'       => 'div',
                      'container_class' => 'collapse navbar-collapse',
                      'container_id'    => 'navbarResponsive',
                      'menu_class'      => 'nav navbar-nav ml-auto',
                      'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'          => new WP_Bootstrap_Navwalker(),
                    ) );

                } else {

                    wp_nav_menu( array(
                      'theme_location'  => 'primary',
                      'depth'           => 1,
                      'container'       => 'ul',
                      'menu_class'      => 'nav navbar-nav ml-au',
                      'fallback_cb'     => 'wp_page_menu',
                    ) );

                }
                ?>
	        </div>
      	</nav>
    </header>

    <?php

  	$theme_options  = nityaa_theme_options();

  	if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {
    	do_action( 'nityaa_action_home_content' );
  	}
  	$bg_image_url = get_header_image();

  	if ( 'page' == get_option( 'show_on_front' ) && is_front_page() ) {

	    if ( 1 === $theme_options['home_content'] ) {
	      	do_action( 'nityaa_page_header' );
	    }

  	} else { 
    	do_action( 'nityaa_page_header' );
	}
