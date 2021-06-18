<?php
/**
 * Default theme options.
 *
 * @package Nityaa
 */

if ( ! function_exists( 'nityaa_default_theme_options' ) ) :
    /**
     * Default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */

    function nityaa_default_theme_options() {

        $defaults = array();
        $defaults['sticky_header']                  = 1;
        $defaults['top_header']                     = 1;
        $defaults['top_header_phone']               = '';
        $defaults['top_header_email']               = '';
        $defaults['enable_social_media']            = 1;        
        $defaults['slider_enable']                  = 1;
        $defaults['slider_excerpt_enable']          = 1;
        $defaults['slider_btn_enable']              = 1;
        $defaults['main_slider_type']               = 'slider';
        $defaults['slider_cat']                     = '';
        $defaults['banner_image']                   = '';
        $defaults['home_content']                   = 1;
        $defaults['our_services']                   = '';
        $defaults['about_us']                       = '';
        $defaults['info_sec']                       = '';
        $defaults['our_clients']                    = '';
        $defaults['nityaa_testi']                   = '';
        $defaults['sidebar']                        = 'right';
        $defaults['enable_post_date']               = 1;
        $defaults['enable_post_author']             = 1;
        $defaults['enable_post_meta']               = 1;
        $defaults['enable_scroll_top']              = 1;
        $defaults['facebook']                       = '';
        $defaults['twitter']                        = '';
        $defaults['google_plus']                    = '';
        $defaults['instagram']                      = '';
        $defaults['linkedin']                       = '';
        $defaults['pinterest']                      = '';
        $defaults['youtube']                        = '';
        $defaults['vimeo']                          = '';
        $defaults['flickr']                         = '';
        $defaults['behance']                        = '';
        $defaults['dribbble']                       = '';
        $defaults['tumblr']                         = '';
        $defaults['github']                         = '';
        $defaults['copyright_text']                 = __( 'Copyright 2020. All rights reserved', 'nityaa' );

        // Pass through filter.
        return apply_filters( 'nityaa_defaults', $defaults );
    }

endif;

/**
*  Get theme options
*/

if ( !function_exists('nityaa_theme_options') ) :

    function nityaa_theme_options() {

        $nityaa_defaults = nityaa_default_theme_options();

        $nityaa_option_values = get_theme_mod( 'nityaa' );

        if( is_array($nityaa_option_values )){

            return array_merge( $nityaa_defaults, $nityaa_option_values );

        }else{

            return $nityaa_defaults;
            
        }
    }

endif;
