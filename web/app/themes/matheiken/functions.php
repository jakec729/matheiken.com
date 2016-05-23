<?php
/**
 * Matheiken Theme functions and definitions.
 */

if ( ! function_exists( 'matheiken_setup' ) ) {

	/*
	 * Theme Setup
	 */
	function matheiken_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'matheiken' ),
			'social' => esc_html__( 'Social', 'matheiken' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
}
add_action( 'after_setup_theme', 'matheiken_setup' );


/*
 * Theme Actions and Filters -- Adjustments
 */
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
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style( 'matheiken-style', get_stylesheet_uri() );
});

/**
 * Custom fields tags for this theme.
 */
// require get_template_directory() . '/inc/acf.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';