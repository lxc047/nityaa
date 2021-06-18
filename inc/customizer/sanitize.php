<?php 
/**
 * Sanitization
 *
 * @package Nityaa
 */

/**=========== Select/radio santitization ===========**/
if ( ! function_exists( 'nityaa_sanitize_select' ) ) :
    function nityaa_sanitize_select( $input, $setting ) {
        $input = esc_attr( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

/**=========== Checkbox santitization ===========**/
if ( ! function_exists( 'nityaa_sanitize_checkbox' ) ) :
    function nityaa_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }
endif;

/**=========== Integer number sanitization ===========**/
if ( ! function_exists( 'nityaa_sanitize_number' ) ) :
    function nityaa_sanitize_number( $input, $setting ) {
        $input = absint( $input );
        return ( $input ? $input : $setting->default );
    }
endif;

/**=========== Active callback for slider ===========**/
if ( ! function_exists( 'nityaa_main_slider' ) ) :
    function nityaa_main_slider( $control ) { 
        if( 1 == $control->manager->get_setting( 'nityaa[slider_enable]' )->value() ){
            return true;
        } else {
            return false;
        }
    }
endif;

/**=========== Active callback for type of slider ===========**/
if ( ! function_exists( 'nityaa_slider_category' ) ) :
    function nityaa_slider_category( $control ) { 
        if( 'slider' == $control->manager->get_setting( 'nityaa[main_slider_type]' )->value() && 1 == $control->manager->get_setting( 'nityaa[slider_enable]' )->value() ){
            return true;
        } else {
            return false;
        }
    }
endif;

/**=========== Active callback for type of banner ===========**/
if ( ! function_exists( 'nityaa_banner_category' ) ) :
    function nityaa_banner_category( $control ) {     
        if( 'banner-image' == $control->manager->get_setting( 'nityaa[main_slider_type]' )->value() && 1 == $control->manager->get_setting( 'nityaa[slider_enable]' )->value() ){
            return true;
        } else {
            return false;
        }
    }
endif;

/**=========== Sanitize number range ===========**/
if ( ! function_exists( 'nityaa_sanitize_number_range' ) ) :
    function nityaa_sanitize_number_range( $input, $setting ) {
        // Ensure input is an absolute integer.
        $input = absint( $input );

        // Get the input attributes associated with the setting.
        $atts = $setting->manager->get_control( $setting->id )->input_attrs;

        // Get min.
        $min = ( isset( $atts['min'] ) ? $atts['min'] : $input );

        // Get max.
        $max = ( isset( $atts['max'] ) ? $atts['max'] : $input );

        // Get Step.
        $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

        // If the input is within the valid range, return it; otherwise, return the default.
        return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );
    }
endif;