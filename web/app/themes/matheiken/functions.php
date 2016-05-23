<?php
/**
 * Matheiken Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Matheiken_Theme
 */

if ( ! function_exists( 'matheiken_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function matheiken_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Matheiken Theme, use a find and replace
	 * to change 'matheiken' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'matheiken', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'matheiken' ),
		'social' => esc_html__( 'Social', 'matheiken' ),
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

}
endif;
add_action( 'after_setup_theme', 'matheiken_setup' );

add_action( 'after_setup_theme', function() {
	$GLOBALS['content_width'] = apply_filters( 'matheiken_content_width', 640 );
}, 0 );

add_filter('excerpt_length', function($length) {
    return 15;
});

add_filter('excerpt_more', function($more) {
    return "...";
});

add_filter( 'get_the_archive_title', function ( $title ) {
	return (is_category()) ? single_cat_title("", false) : $title;
});

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function matheiken_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'matheiken' ),
		'id'            => 'primary_sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'About Template Widgets', 'matheiken' ),
		'id'            => 'about_sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="sidebar__widget clearfix widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="sidebar__heading widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'matheiken_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function matheiken_scripts() {
	wp_enqueue_style( 'matheiken-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'matheiken_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';