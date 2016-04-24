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

	/*
	 * Add custom small image size
	 */
	add_image_size ( 'small', 480, 480, FALSE );

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
	 * See http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
  load_theme_textdomain('ysgoltrewen', get_template_directory() . '/lang');

}
endif;
add_action( 'after_setup_theme', 'theme_setup' );

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
 * Remove emoji from the header
 */
function disable_emoji_dequeue_script() {
    wp_dequeue_script( 'emoji' );
}
add_action( 'wp_print_scripts', 'disable_emoji_dequeue_script', 100 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );



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
		echo '<h2>' , _e( 'School details', 'ysgoltrewen' ) , '</h2>';
		echo the_field('address', 'option');
		echo '<dl class="deflist">';
		echo '<dt>' , _e( 'Telephone', 'ysgoltrewen' )  , ':</dt>';
		echo '<dd><a href="', the_field('tel_no', 'option') , '">' , the_field('tel_display', 'option') , '</a></dd><br>';
		echo '<dt>' , _e( 'Email', 'ysgoltrewen' ) , ':</dt>';
		echo '<dd><a href="mailto:', the_field('email', 'option') , '">' , the_field('email', 'option') , '</a></dd><br>';
		echo '<dt>' , _e( 'Headteacher', 'ysgoltrewen' ) , ':</dt>';
		echo '<dd>' , the_field('head_teacher', 'option') , '</dd><br>';
		echo '<dt>' , _e( 'Language', 'ysgoltrewen' ) , ':</dt>';
		echo '<dd>' , the_field('language', 'option') , '</dd><br>';
		echo '<dt>' , _e( 'Age range', 'ysgoltrewen' ) , ':</dt>';
		echo '<dd>' , the_field('age_range', 'option') , '</dd><br>';
		echo '<dt>' , _e( 'Number of pupils', 'ysgoltrewen' ) , ': </dt>';
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
