<?php
/**
 * smpl functions and definitions
 *
 * @package smpl
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'smpl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function smpl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on smpl, use a find and replace
	 * to change 'smpl' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'smpl', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('post-thumb', 900, 330, true);
	add_image_size('index-thumb', 900, 150, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'smpl' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'smpl_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // smpl_setup
add_action( 'after_setup_theme', 'smpl_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function smpl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'smpl' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'smpl' ),
		'id'            => 'sidebar-footer-widgets',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'smpl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function smpl_scripts() {

	wp_enqueue_script( 'smpl-jquery', get_template_directory_uri() . '/js/jquery.js', array(), '20140401', true );

	wp_enqueue_style( 'smpl-style-Noto-Serif', 'http://fonts.googleapis.com/css?family=Noto+Serif:400,700,400italic,700italic' );
	
	wp_enqueue_style( 'smpl-style-font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'smpl-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_style( 'smpl-style', get_stylesheet_uri() );

	wp_enqueue_script( 'smpl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/*wp_enqueue_script( 'smpl-masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry', 'jQuery'), '20130115', true );*/

	wp_enqueue_script( 'smpl-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry', 'smpl-jquery'), '20140401', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	};
};

add_action( 'wp_enqueue_scripts', 'smpl_scripts' );

/**
 * Implement the Custom Header feature.
 */
/*require get_template_directory() . '/inc/custom-header.php';

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

function themeslug_theme_customizer( $wp_customize ) {
$wp_customize->add_section( 'themeslug_logo_section' , array(
'title' => __( 'Logo', 'themeslug' ),
'priority' => 30,
'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
'label' => __( 'Logo', 'themeslug' ),
'section' => 'themeslug_logo_section',
'settings' => 'themeslug_logo',
) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');