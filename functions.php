<?php
/**
 * nityaa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nityaa
 */

if ( ! function_exists( 'nityaa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nityaa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nityaa, use a find and replace
		 * to change 'nityaa' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nityaa', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'nityaa-blog', 370,  250, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'nityaa' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'nityaa_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );


		// Theme Activation Notice
		global $pagenow;
		
		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', 'nityaa_theme_activation_notice' );
		}
	}
endif;
add_action( 'after_setup_theme', 'nityaa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nityaa_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'nityaa_content_width', 640 );
}
add_action( 'after_setup_theme', 'nityaa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nityaa_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nityaa' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nityaa' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'nityaa' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widget here. This is used for first footer item.', 'nityaa' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'nityaa' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widget here. This is used for second footer item.', 'nityaa' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'nityaa' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widget here. This is used for third footer item.', 'nityaa' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'nityaa' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widget here. This is used for fourth footer item.', 'nityaa' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'nityaa_widgets_init' );


if ( ! function_exists( 'nityaa_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function nityaa_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Muli, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Muli', 'nityaa' ) ) {
			$fonts[] = 'Muli:200,300,400,500,600,700,800,900';
		}		

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

/**
 * Enqueue scripts and styles.
 */
function nityaa_scripts() {

	$theme_options  = nityaa_theme_options();

	wp_enqueue_style( 'nityaa-style', get_stylesheet_uri() );

	/* Bootstrap core CSS */
	wp_enqueue_style( 'nityaa-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', true, '4.4.1' );

	/* Fontawesome core CSS */
	wp_enqueue_style( 'nityaa-fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome/css/all.min.css', true, '5.12' );

	/* Load Fonts */
	wp_enqueue_style( 'nityaa-fonts', nityaa_fonts_url() );

	/* nityaa main CSS */
	wp_enqueue_style( 'nityaa-main', get_template_directory_uri() . '/assets/css/main.css' );

	/* Owl Carousel main CSS */
	wp_enqueue_style( 'nityaa-owl', get_template_directory_uri() . '/assets/css/owl.css', true, '2.3.4' );

	wp_enqueue_script( 'nityaa-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), '4.4.1', true );

	wp_enqueue_script( 'nityaa-customjs', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true );

	if( 1 === $theme_options['sticky_header'] ){
		wp_enqueue_script( 'wacko-sticky-header', get_template_directory_uri() . '/assets/js/stickyheader.js', array('jquery'), '20200125', true );
	}

	wp_enqueue_script( 'nityaa-owljs', get_template_directory_uri() . '/assets/js/owl.js', array('jquery'), '2.3.4', true );

	wp_enqueue_script( 'nityaa-slickjs', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.8.0', true );

	wp_enqueue_script( 'nityaa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20200125', true );

	wp_enqueue_script( 'nityaa-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20200125', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nityaa_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Include default theme options
 */
require_once get_template_directory() . '/inc/customizer/default.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Hook for page header
 */
require get_template_directory() . '/inc/hooks/page-header.php';

/**
 * Hook for home page content
 */
require get_template_directory() . '/inc/hooks/home-content.php';

/**
 * Hook for footer social media
 */
require get_template_directory() . '/inc/hooks/social-media.php';

/**
 * bootstrap navigation
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Theme page
 */

if ( is_admin() ) {

    // Load About nityaa Info.
    require_once get_template_directory() . '/inc/about-nityaa/about-nityaa.php';

}

/**
 * welcome message
 */

function nityaa_theme_activation_notice() {
    echo '<div class="notice notice-success is-dismissible">';
        echo '<p>'. esc_html__( 'Thank you for choosing Nityaa ! Now you can visit our welcome page.', 'nityaa' ) .'</p>';
        echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=about-nityaa' ) ) .'" class="button button-primary">'. esc_html__( 'Get Started with Nityaa', 'nityaa' ) .'</a></p>';
    echo '</div>';
}

/**
 * Function to check widget status
 */
 if ( ! function_exists( 'nityaa_widget_count' ) ) :

 function nityaa_widget_count( $sidebar_names ){

    $status = 0;

    foreach ($sidebar_names as $sidebar) {
      
        if( is_active_sidebar( $sidebar )){
            $status = $status+1;
        }
    }

    return $status;        
 }

endif;

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function nityaa_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'nityaa_excerpt_more' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function nityaa_custom_excerpt_length( $length ) {
    return 28;
}
if ( ! is_admin() ) {
    add_filter( 'excerpt_length', 'nityaa_custom_excerpt_length', 999 );
}

function nityaa_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'nityaa_add_editor_styles' );


if ( ! function_exists( 'nityaa_no_content_get_header' ) ) {
	/**
	 * Header for page builder blank template
	 *
	 * @since  1.0.3
	 * @access public
	 */
	function nityaa_no_content_get_header() {

		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?> class="no-js">
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php wp_head(); ?>
		</head>

		<body <?php body_class(); ?>>
		<?php
	}
}


if ( ! function_exists( 'nityaa_no_content_get_footer' ) ) {
	/**
	 * Footer for page builder blank template
	 *
	 * @since  1.0.3
	 * @access public
	 */
	function nityaa_no_content_get_footer() {
		wp_footer();
		?>
		</body>
		</html>
		<?php
	}
}

