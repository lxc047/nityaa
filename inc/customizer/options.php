<?php
/**
 * Theme Options.
 *
 * @package Nityaa
 */

$default = nityaa_default_theme_options();

/*----------- Option Panel -----------*/
$wp_customize->add_panel(
    'nityaa_basic_panel', 
    array(
        'title'             => __( 'Theme Options', 'nityaa' ),
        'priority'          => 200, 
    )
);

/*----------- Header Setting - start -----------*/
$wp_customize->add_section(
    'nityaa_header', 
    array(    
        'title'             => __( 'Header', 'nityaa' ),
        'panel'             => 'nityaa_basic_panel', 
    )
);

/* Top header */
$wp_customize->add_setting(
    'nityaa[top_header]',
    array(
        'default'           => $default['top_header'],       
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[top_header]',
    array(
        'label'             => __( 'Enable top header', 'nityaa' ),
        'section'           => 'nityaa_header',   
        'settings'          => 'nityaa[top_header]',     
        'type'              => 'checkbox',
    )
);

$wp_customize->add_setting(
    'nityaa[top_header_phone]',
    array(
        'default'           => $default['top_header_phone'],       
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'nityaa[top_header_phone]',
    array(
        'label'             => __( 'Header Phone Number', 'nityaa' ),
        'section'           => 'nityaa_header',   
        'settings'          => 'nityaa[top_header_phone]',     
        'type'              => 'text',
    )
);

$wp_customize->add_setting(
    'nityaa[top_header_email]',
    array(
        'default'           => $default['top_header_email'],       
        'sanitize_callback' => 'sanitize_email'
    )
);

$wp_customize->add_control(
    'nityaa[top_header_email]',
    array(
        'label'             => __( 'Header Email', 'nityaa' ),
        'section'           => 'nityaa_header',   
        'settings'          => 'nityaa[top_header_email]',     
        'type'              => 'email',
    )
);

/* Sticky header */
$wp_customize->add_setting(
    'nityaa[sticky_header]',
    array(
        'default'           => $default['sticky_header'],       
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[sticky_header]', 
    array(
        'label'             => __( 'Enable sticky header', 'nityaa' ),
        'section'           => 'nityaa_header',   
        'settings'          => 'nityaa[sticky_header]',     
        'type'              => 'checkbox',
    )
);

/*----------- Header Setting - end -----------*/

/*----------- Slider Settings - start -----------*/
$wp_customize->add_section(
    'nityaa_slider', 
    array(    
        'title'             => __( 'Slider', 'nityaa' ),
        'panel'             => 'nityaa_basic_panel'    
    )
);    

/* Enable/Disable Slider */
$wp_customize->add_setting(
    'nityaa[slider_enable]', 
    array(
        'default'           => $default['slider_enable'],       
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[slider_enable]', 
    array(
        'label'             => __( 'Enable slider OR banner image', 'nityaa' ),
        'section'           => 'nityaa_slider',   
        'settings'          => 'nityaa[slider_enable]',     
        'type'              => 'checkbox'
    )
);  

/* Show/Hide slider excerpt */
$wp_customize->add_setting(
    'nityaa[slider_excerpt_enable]', 
    array(
        'default'           => $default['slider_excerpt_enable'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[slider_excerpt_enable]', 
    array(
        'label'             => __( 'Display excerpt', 'nityaa' ),
        'section'           => 'nityaa_slider',   
        'settings'          => 'nityaa[slider_excerpt_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'nityaa_main_slider',
    )
);

/* Show/Hide slider button */
$wp_customize->add_setting(
    'nityaa[slider_btn_enable]', 
    array(
        'default'           => $default['slider_btn_enable'],       
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[slider_btn_enable]', 
    array(
        'label'             => __( 'Display read button', 'nityaa' ),
        'section'           => 'nityaa_slider',   
        'settings'          => 'nityaa[slider_btn_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'nityaa_main_slider',
    )
);

/* Slider type */
$wp_customize->add_setting(
    'nityaa[main_slider_type]', 
    array(
        'default'           => $default['main_slider_type'],
        'sanitize_callback' => 'nityaa_sanitize_select'
    )
);

$wp_customize->add_control(
    'nityaa[main_slider_type]', 
    array(
        'label'             => __( 'Select slider type', 'nityaa' ),
        'section'           => 'nityaa_slider',
        'settings'          => 'nityaa[main_slider_type]',
        'type'              => 'radio',
        'choices'           => array(
            'slider'        => __( 'Slider', 'nityaa' ),
            'banner-image'  => __( 'Banner image', 'nityaa' ),
        ),
        'active_callback'   => 'nityaa_main_slider',
    )
);  

/* Slider category */
$wp_customize->add_setting(
    'nityaa[slider_cat]', 
    array(
        'default'           => $default['slider_cat'],
        'sanitize_callback' => 'nityaa_sanitize_number'
    )
);

$wp_customize->add_control(
    new nityaa_Customize_Category_Control(
        $wp_customize,
        'nityaa[slider_cat]',
        array(
            'label'         => __( 'Category for slider', 'nityaa'  ),
            'description'   => __( 'Posts of selected category will be used as sliders', 'nityaa'  ),
            'settings'      => 'nityaa[slider_cat]',
            'section'       => 'nityaa_slider',
            'active_callback'   => 'nityaa_slider_category',
        )
    )
);

/* Banner image */
$wp_customize->add_setting(
    'nityaa[banner_image]',
    array(
        'default'           => $default['banner_image'],
        'sanitize_callback' => 'nityaa_sanitize_number',
    )
);

$wp_customize->add_control(
    'nityaa[banner_image]',
    array(
        'label'             => __( 'Banner image', 'nityaa' ),
        'description'       => __( 'Enter the ID of post to use as a banner image.', 'nityaa' ),
        'settings'          => 'nityaa[banner_image]',
        'section'           => 'nityaa_slider',
        'type'              => 'text',
        'active_callback'   => 'nityaa_banner_category',
    )
);
/*----------- Slider Settings - end -----------*/


/*----------- Home Section - start -----------*/
$wp_customize->add_section(
    'nityaa_home',
    array(
        'title'       => __( 'Home Sections', 'nityaa' ),
        'panel'       => 'nityaa_basic_panel'
    )
);

/* Show home page content */
$wp_customize->add_setting(
    'nityaa[home_content]',
    array(
        'default'           => $default['home_content'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[home_content]', 
    array(
        'label'       => __( 'Show home content', 'nityaa' ),
        'description' => __( 'Check this box to show page content in home page', 'nityaa' ),
        'section'     => 'nityaa_home',
        'settings'    => 'nityaa[home_content]',
        'type'        => 'checkbox'
    )
);

/* About us */
$wp_customize->add_setting(
    'nityaa[about_us]',
    array(
        'default'           => $default['about_us'],
        'sanitize_callback' => 'nityaa_sanitize_number',
    )
);

$wp_customize->add_control(
    'nityaa[about_us]', 
    array(
        'label'             => __( 'About us', 'nityaa' ),   
        'description'       => __( 'Leave blank to hide this section', 'nityaa'  ), 
        'settings'          => 'nityaa[about_us]',
        'section'           => 'nityaa_home',
        'type'              => 'dropdown-pages',
    )
);

/* Our services */
$wp_customize->add_setting(
    'nityaa[our_services]', 
    array(
        'default'           => $default['our_services'],
        'sanitize_callback' => 'nityaa_sanitize_number'
    )
);

$wp_customize->add_control(
    new nityaa_Customize_Category_Control(
        $wp_customize,
        'nityaa[our_services]',
        array(
            'label'       => __( 'Our services', 'nityaa' ),
            'description' => __( 'Leave blank to hide this section', 'nityaa' ),
            'settings'    => 'nityaa[our_services]',
            'section'     => 'nityaa_home',
        )
    )
);

/* Testimonial */
$wp_customize->add_setting(
    'nityaa[nityaa_testi]', 
    array(
        'default'           => $default['nityaa_testi'],
        'sanitize_callback' => 'nityaa_sanitize_number'
    )
);

$wp_customize->add_control(
    new nityaa_Customize_Category_Control(
        $wp_customize,
        'nityaa[nityaa_testi]',
        array(
            'label'       => __( 'Testimonial', 'nityaa' ),
            'description' => __( 'Leave blank to hide this section', 'nityaa' ),
            'settings'    => 'nityaa[nityaa_testi]',
            'section'     => 'nityaa_home',
        )
    )
);

/* Clients */
$wp_customize->add_setting(
    'nityaa[our_clients]', 
    array(
        'default'           => $default['our_clients'],      
        'sanitize_callback' => 'nityaa_sanitize_number'
    )
);

$wp_customize->add_control(
    new nityaa_Customize_Category_Control(
        $wp_customize,
        'nityaa[our_clients]',
        array(
            'label'       => __( 'Our Clients', 'nityaa' ),
            'description' => __( 'Leave blank to hide this section', 'nityaa' ),
            'settings'    => 'nityaa[our_clients]',
            'section'     => 'nityaa_home',
        )
    )
);
/*----------- Home Section - end -----------*/

/*----------- Enable/Disable - social media -----------*/ 
$wp_customize->add_setting(
    'nityaa[enable_social_media]',
    array(
        'default'           => $default['enable_social_media'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[enable_social_media]',
    array(
        'label'       => __( 'Enable social media', 'nityaa' ),
        'settings'    => 'nityaa[enable_social_media]',
        'section'     => 'nityaa_header',
        'type'        => 'checkbox',
    )
);

/*----------- Social Media Options - start -----------*/
$wp_customize->add_section(
    'nityaa_social',
    array(   
        'title'       => __( 'Social Media', 'nityaa' ),
        'panel'       => 'nityaa_basic_panel'    
    )
);

/*----------- Social link text field -----------*/
$social_options = array('facebook', 'twitter', 'instagram', 'linkedin', 'pinterest', 'youtube', 'vimeo', 'flickr', 'behance', 'dribbble', 'tumblr', 'github' );

foreach($social_options as $social) {

    $social_name = ucwords(str_replace('_', ' ', $social));
    $label = '';

    switch ($social) {
        case 'facebook':
        $label = __('Facebook', 'nityaa' );
        break;

        case 'twitter':
        $label = __( 'Twitter', 'nityaa'  );
        break;

        case 'instagram':
        $label = __( 'Instagram', 'nityaa'  );
        break;

        case 'linkedin':
        $label = __( 'LinkedIn', 'nityaa'  );
        break;

        case 'pinterest':
        $label = __( 'Pinterest', 'nityaa'  );
        break;

        case 'youtube':
        $label = __( 'Youtube', 'nityaa'  );
        break;

        case 'vimeo':
        $label = __( 'vimeo', 'nityaa'  );
        break;

        case 'flickr':
        $label = __( 'Flickr', 'nityaa'  );
        break;

        case 'behance':
        $label = __( 'Behance', 'nityaa'  );
        break;

        case 'dribbble':
        $label = __( 'Dribbble', 'nityaa'  );
        break;

        case 'tumblr':
        $label = __( 'Tumblr', 'nityaa'  );
        break;

        case 'github':
        $label = __( 'Github', 'nityaa'  );
        break;
    }

    $wp_customize->add_setting( 'nityaa['.$social.']', array(
        'sanitize_callback'     => 'esc_url_raw',
        'sanitize_js_callback'  =>  'esc_url_raw'
        ));

    $wp_customize->add_control( 'nityaa['.$social.']', array(
        'label'     => $label,
        'type'      => 'text',
        'section'   => 'nityaa_social',
        'settings'  => 'nityaa['.$social.']'
        ));
}
/*----------- Social Media Options - end -----------*/

/*----------- General setting - start -----------*/
$wp_customize->add_section(
    'nityaa_general', 
    array(    
        'title'       => __('General Setting', 'nityaa' ),
        'panel'       => 'nityaa_basic_panel'
    )
);

/* Page layout */
$wp_customize->add_setting(
    'nityaa[sidebar]',
    array(
        'default'           => $default['sidebar'],
        'sanitize_callback' => 'nityaa_sanitize_select',
    )
);

$wp_customize->add_control( 'nityaa[sidebar]',
    array(
        'label'       => esc_html__( 'Page layout', 'nityaa'  ),
        'section'     => 'nityaa_general',   
        'settings'    => 'nityaa[sidebar]',
        'type'        => 'radio',
        'choices'     => array(
            'right'     => esc_html__( 'Right sidebar', 'nityaa'  ),
            'left'      => esc_html__( 'Left sidebar', 'nityaa'  ),
            'no_side'   => esc_html__( 'No sidebar', 'nityaa'  ),
            )
    )
);

/* Enable/Disable - post date */
$wp_customize->add_setting(
    'nityaa[enable_post_date]', 
    array(
        'default'           => $default['enable_post_date'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[enable_post_date]',
    array(
        'label'       => __('Enable post date', 'nityaa' ),
        'settings'    => 'nityaa[enable_post_date]',
        'section'     => 'nityaa_general',
        'type'        => 'checkbox',
    )
);
/* Enable/Disable - post author */

$wp_customize->add_setting(
    'nityaa[enable_post_author]',
    array(
        'default'           => $default['enable_post_author'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[enable_post_author]',
    array(
        'label'       => __('Enable post author', 'nityaa' ),
        'settings'    => 'nityaa[enable_post_author]',
        'section'     => 'nityaa_general',
        'type'        => 'checkbox',
    )
);
/* Enable/Disable - post meta */

$wp_customize->add_setting(
    'nityaa[enable_post_meta]',
    array(
        'default'           => $default['enable_post_meta'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[enable_post_meta]',
    array(
        'label'       => __('Enable post meta', 'nityaa' ),
        'settings'    => 'nityaa[enable_post_meta]',
        'section'     => 'nityaa_general',
        'type'        => 'checkbox',
    )
);
/*----------- General setting - end -----------*/


/*----------- Footer Options - start -----------*/
$wp_customize->add_section(
    'nityaa_footer',
    array(
        'title'       => __( 'Footer', 'nityaa' ),
        'panel'       => 'nityaa_basic_panel'
    )
);

/* Copyright text */
$wp_customize->add_setting(
    'nityaa[copyright_text]',
    array(
      'default'           => $default['copyright_text'],
      'sanitize_callback' => 'sanitize_textarea_field',
    )
);

$wp_customize->add_control(
    'nityaa[copyright_text]',
        array(
        'label'       => __( 'Copyright text', 'nityaa' ),
        'settings'    => 'nityaa[copyright_text]',
        'section'     => 'nityaa_footer',
        'type'        => 'textarea'
    )
);
/* Enable/Disable - scroll to top */

$wp_customize->add_setting(
    'nityaa[enable_scroll_top]',
    array(
        'default'           => $default['enable_scroll_top'],
        'sanitize_callback' => 'nityaa_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'nityaa[enable_scroll_top]', 
    array(
        'label'       => __( 'Enable scroll to top', 'nityaa' ),
        'settings'    => 'nityaa[enable_scroll_top]',
        'section'     => 'nityaa_footer',
        'type'        => 'checkbox'
    )
);
/*----------- Footer Options - end -----------*/