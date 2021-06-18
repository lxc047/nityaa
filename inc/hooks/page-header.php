<?php
/**
 * Page header for our theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nityaa
 */

if ( ! function_exists( 'nityaa_page_header_section' ) ) :

function nityaa_page_header_section(){
    
    $bg_image_url = get_header_image();

    if ( (is_page() || is_single()) && !is_front_page()) { ?>

    <section class="page-heading header-text" <?php if(has_header_image()){ echo 'style="background-image: url('.esc_url($bg_image_url).')"';  } ?> >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    } elseif( is_archive() || is_category() || is_tag()){ ?>

    <section class="page-heading header-text" <?php if(has_header_image()){ echo 'style="background-image: url('.esc_url($bg_image_url).')"';  } ?> >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php the_archive_title( '<h1 class="page-title">', '</h1>' );
                  the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
                </div>
            </div>
        </div>
    </section>

    <?php  } elseif(is_search()){ ?>

    <section class="page-heading header-text" <?php if(has_header_image()){ echo 'style="background-image: url('.esc_url($bg_image_url).')"';  } ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">
                      <?php
                      /* translators: %s: search query. */
                      printf( esc_html__( 'Search Results for: %s', 'nityaa' ), '<span>' . get_search_query() . '</span>' );
                      ?>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    
    <?php }elseif(is_front_page() && !(is_page() || is_single())){ ?>

    <section class="page-heading header-text" <?php if(has_header_image()){ echo 'style="background-image: url('.esc_url($bg_image_url).')"';  } ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title"><?php bloginfo( 'name' ); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <?php  }elseif(!is_front_page()){ ?>

      <section class="page-heading header-text" <?php if(has_header_image()){ echo 'style="background-image: url('.esc_url($bg_image_url).')"';  } ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                </div>
            </div>
        </div>
      </section>
   
   <?php }else{

    }
}
endif;

add_action( 'nityaa_page_header', 'nityaa_page_header_section', 10 );
