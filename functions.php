<?php
/**
 * smartpixel_s functions and definitions
 *
 * @package smartpixel_s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'smartpixel_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function smartpixel_s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on smartpixel_s, use a find and replace
	 * to change 'smartpixel_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'smartpixel_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'smartpixel_s' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'smartpixel_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // smartpixel_s_setup
add_action( 'after_setup_theme', 'smartpixel_s_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function smartpixel_s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'smartpixel_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'smartpixel_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function smartpixel_s_scripts() {
	wp_enqueue_style( 'smartpixel_s-style', get_template_directory_uri() . '/styles/css/style.css');

	wp_enqueue_script( 'smartpixel_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'smartpixel_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
   // deregister the jquery version bundled with wordpress
   // wp_deregister_script( 'jquery' );
   // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/src/js/jquery/dist/jquery.min.js', array(), '2.1.0', false );
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/src/js/modernizr/modernizr.min.js', array(), '2.7.2', false );
    
    wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/src/js/fastclick/fastclick.min.js', array(), '1.0.1', false );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '5.2.22', true );
    wp_enqueue_script( 'foundation-extra', get_template_directory_uri() . '/src/js/foundation/js/foundation/foundation.tab.js', array('foundation'), '5.2.22', true ); 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'smartpixel_s_scripts' );

function init_foundation() {
  
}
add_action ('wp_enqueue_scripts', 'init_foundation');
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
