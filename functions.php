<?php
/**
 * ysgoltrewen functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package ysgoltrewen
 */

if ( ! function_exists( 'theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function theme_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add post formats to posts
	add_theme_support( 'post-formats', array( 'image', 'link', 'status', 'video' ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => 'Primary',
		'footer' => 'Footer',
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

	/*
	 * Add internationlization
	 * See http://code.tutsplus.com/articles/how-to-internationalize-wordpress-themes-and-plugins--wp-22779
	 */
	// Retrieve the directory for the internationalization files
	// $lang_dir = get_template_directory() . '/lang');

	// Set the theme's text domain using the unique identifier from above
	// load_theme_textdomain('ysgoltrewen', $lang_dir);

}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function ysgoltrewen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ysgoltrewen_content_width', 640 );
}
add_action( 'after_setup_theme', 'ysgoltrewen_content_width', 0 );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ysgoltrewen_widgets_init() {
	register_sidebar( array(
		'name'          => 'ysgoltrewen',
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget--title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ysgoltrewen_widgets_init' );

/**
 * Add ACF global page
 */

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
			'page_title'	=> 'Global',
			'menu_title'	=> 'Global',
			'menu_slug'		=> 'global',
			'capability'	=> '',
			'parent_slug'	=> '',
			'position'		=> '30.1',
			'icon_url'		=> false,
			'redirect'		=> false
		));

	acf_add_options_sub_page(array(
			'page_title'	=> 'School details',
			'menu_title'	=> 'School details',
			'menu_slug'		=> 'global-school-details',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'global',
			'position'		=> false,
			'icon_url'		=> false,
		));

	acf_add_options_sub_page(array(
			'page_title'	=> 'Term dates',
			'menu_title'	=> 'Term dates',
			'menu_slug'		=> 'global-term-dates',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'global',
			'position'		=> false,
			'icon_url'		=> false,
		));

	acf_add_options_sub_page(array(
			'page_title'	=> 'Footer',
			'menu_title'	=> 'Footer',
			'menu_slug'		=> 'global-footer',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'global',
			'position'		=> false,
			'icon_url'		=> false,
		));


}

/**
 * Custom School details widget using info from ACF options page
 * http://codex.wordpress.org/Widgets_API
 */

class school_widget extends WP_Widget {

	/**
	 * Setup widget name & description
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'school_widget',
			'description' => 'Displays ACF global school details',
		);
		parent::__construct( 'school_widget', 'School details', $widget_ops );
	}

	/**
	 * Outputs widget content
	 */
	public function widget( $args, $instance ) {
		echo '<h2>School details</h2>';
		echo the_field('address', 'option');
		echo '<dl class="deflist">';
		echo '<dt>Telephone:</dt>';
		echo '<dd><a href="', the_field('tel_no', 'option') , '">' , the_field('tel_display', 'option') , '</a></dd><br>';
		echo '<dt>Email:</dt>';
		echo '<dd><a href="mailto:', the_field('email', 'option') , '">' , the_field('email', 'option') , '</a></dd><br>';
		echo '<dt>Headteacher:</dt>';
		echo '<dd>' , the_field('head_teacher', 'option') , '</dd><br>';
		echo '<dt>Language:</dt>';
		echo '<dd>' , the_field('language', 'option') , '</dd><br>';
		echo '<dt>Age range:</dt>';
		echo '<dd>' , the_field('age_range', 'option') , '</dd><br>';
		echo '<dt>Number of pupils: </dt>';
		echo '<dd>' , the_field('number_pupils', 'option') , '</dd><br>';
		echo '</dl>';
	}
}

add_action( 'widgets_init', function(){
	register_widget( 'school_widget' );
});

/**
 * Enqueue scripts and styles.
 */
function ysgoltrewen_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ysgoltrewen_scripts' );
