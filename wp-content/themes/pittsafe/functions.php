<?php
/**
 * Charitas functions and definitions
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Content Width
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 790; /* pixels */

/*-----------------------------------------------------------------------------------*/
/*	Include Option Tree
/*-----------------------------------------------------------------------------------*/

	/*-----------------------------------------------------------
		Optional: set 'ot_show_pages' filter to false.
		This will hide the settings & documentation pages.
	-----------------------------------------------------------*/

	add_filter( 'ot_show_pages', '__return_false' );


	/*-----------------------------------------------------------
		Optional: set 'ot_show_new_layout' filter to false.
		This will hide the "New Layout" section on the Theme Options page.
	-----------------------------------------------------------*/

	add_filter( 'ot_show_new_layout', '__return_false' );


	/*-----------------------------------------------------------
		Required: set 'ot_theme_mode' filter to true.
	-----------------------------------------------------------*/

	add_filter( 'ot_theme_mode', '__return_true' );


	/*-----------------------------------------------------------
		Required: include OptionTree.
	-----------------------------------------------------------*/

	include_once( get_template_directory() . '/option-tree/ot-loader.php' );
	include_once( get_template_directory() . '/inc/theme-options.php' );


	/*-----------------------------------------------------------
		Filters the Theme Options ID
	-----------------------------------------------------------*/

	function wplook_filter_demo_options_id() {
	  return 'demo_option_tree';
	}
	add_filter( 'ot_options_id', 'wplook_filter_demo_options_id' );


/*-----------------------------------------------------------------------------------*/
/*	Theme setup
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_setup' ) ) :

function charitas_setup() {


	/*-----------------------------------------------------------
		Make theme available for translation
	-----------------------------------------------------------*/

	load_theme_textdomain( 'charitas', get_template_directory() . '/languages' );


	/*-----------------------------------------------------------
		Theme style for the visual editor
	-----------------------------------------------------------*/
	
	add_editor_style( 'css/editor-style.css' );

	/*-----------------------------------------------------------
		Add default posts and comments RSS feed links to head
	-----------------------------------------------------------*/
	
	add_theme_support( 'automatic-feed-links' );
	

	/*-----------------------------------------------------------
		Enable support for Title Tag
	-----------------------------------------------------------*/
	
	add_theme_support( 'title-tag' );


	/*-----------------------------------------------------------
		Enable support for Post Thumbnails on posts and pages
	-----------------------------------------------------------*/
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'charitas-lite-small-thumb', 272, 150, true );
	add_image_size( 'charitas-lite-medium-thumb', 500, 277, true );
	add_image_size( 'charitas-lite-big-thumb', 1200, 661, true );
	
	/*-----------------------------------------------------------
		Register menu
	-----------------------------------------------------------*/
	
	function register_my_menus() {
		register_nav_menus(
				array(
					'primary' => __( 'Main Menu', 'charitas' ),
					'language' => __( 'Language Menu', 'charitas' ),
				) 
		);
	}
		
	add_action( 'init', 'register_my_menus' );
	wp_create_nav_menu( 'Main Menu', array( 'slug' => 'primary' ) );
	wp_create_nav_menu( 'Language Menu', array( 'slug' => 'language' ) );
	
	/*-----------------------------------------------------------
		Enable support for Post Formats
	-----------------------------------------------------------*/
	
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'status' ) );


	/*-----------------------------------------------------------
		Add theme Support Custom Background
	-----------------------------------------------------------*/
	
	add_theme_support( 'custom-background' );


	/*-----------------------------------------------------------
		Add theme Support  Custom Header
	-----------------------------------------------------------*/
	
	add_theme_support( 'custom-header' );

}
endif; // charitas_setup
add_action( 'after_setup_theme', 'charitas_setup' );



/*-----------------------------------------------------------------------------------*/
/*	Include Theme specific functionality
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_initiate_files' ) ) {

	function charitas_initiate_files() {
		include_once( get_template_directory() . '/inc/widgets/widget-init.php' );				// Initiate all widgets
		include_once( get_template_directory() . '/inc/headerdata.php' );						// Include header data
		include_once( get_template_directory() . '/inc/library.php' );							// Include other functions
		require_once (get_template_directory() . '/inc/' . 'comment.php');						// Comments
	}
	add_action( 'after_setup_theme', 'charitas_initiate_files' );

}

/*-----------------------------------------------------------------------------------*/
/*	Redirect After the theme is activated
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_redirect_after_theme_activation' ) ) {

	function charitas_redirect_after_theme_activation (){
		$redirectTo = admin_url().'themes.php?page=ot-theme-options';
		wp_redirect($redirectTo);
	}

	add_action("after_switch_theme", "charitas_redirect_after_theme_activation");

}

/*-----------------------------------------------------------------------------------*/
/*	Adding 
/*-----------------------------------------------------------------------------------*/

if (!is_admin()) {
    wp_enqueue_script('slick_script', get_template_directory_uri() . '/slick/slick.js', array(), false, true);
    //wp_enqueue_script('custom_scripts', get_template_directory_uri() . '/js/scripts.js', array(), false, true);
    wp_enqueue_style('slick_style', get_template_directory_uri() . '/slick/slick.css');
    wp_enqueue_style('slick_theme', get_template_directory_uri() . '/slick/slick-theme.css');  
    wp_enqueue_style('pittsafe_styles', get_template_directory_uri() . '/css/pittsafe.css');     
}    


/*-----------------------------------------------------------------------------------*/
/*	Flush Rewrite after the theme is activated
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_rewrite_flush' ) ) {

	function charitas_rewrite_flush() {
		flush_rewrite_rules();
	}

	add_action( 'after_switch_theme', 'charitas_rewrite_flush' );

}

/*-----------------------------------------------------------------------------------*/
/*	Custom Background
/*-----------------------------------------------------------------------------------*/


add_theme_support( 'custom-background', apply_filters( 'charitas_custom_background_args', array(
	'default-color'          => 'ffffff',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
	) ) );

/*-----------------------------------------------------------
	Custom Header
-----------------------------------------------------------*/

$custom_header = array(
	'default-image'          => get_template_directory_uri() . '/images/church.jpg',
	'random-default'         => false,
	'width'                  => '1920',
	'height'                 => '714',
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header );


function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------
	Slug Rewrite
-----------------------------------------------------------*/

add_action('init', 'custom_rewrite_basic');
function custom_rewrite_basic() {
    global $wp_post_types;
    foreach ($wp_post_types as $wp_post_type) {
        if ($wp_post_type->_builtin) continue;
        if (!$wp_post_type->has_archive && isset($wp_post_type->rewrite) && isset($wp_post_type->rewrite['with_front']) && !$wp_post_type->rewrite['with_front']) {
            $slug = (isset($wp_post_type->rewrite['slug']) ? $wp_post_type->rewrite['slug'] : $wp_post_type->name);
            $page = get_page_by_slug($slug);
            if ($page) add_rewrite_rule('^' .$slug .'/page/([0-9]+)/?', 'index.php?page_id=' .$page->ID .'&paged=$matches[1]', 'top');
        }
    }
}

function get_page_by_slug($page_slug, $output = OBJECT, $post_type = 'page' ) {
    global $wpdb;

    $page = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_name = %s AND post_type= %s AND post_status = 'publish'", $page_slug, $post_type ) );

    return ($page ? get_post($page, $output) : NULL);
}

class Excerpt {

  // Default length (by WordPress)
  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'short' => 25,
      'regular' => 55,
      'long' => 100
    );

  /**
   * Sets the length for the excerpt,
   * then it adds the WP filter
   * And automatically calls the_excerpt();
   *
   * @param string $new_length 
   * @return void
   * @author Baylor Rae'
   */
  public static function length($new_length = 55) {
    Excerpt::$length = $new_length;

    add_filter('excerpt_length', 'Excerpt::new_length');

    Excerpt::output();
  }

  // Tells WP the new length
  public static function new_length() {
    if( isset(Excerpt::$types[Excerpt::$length]) )
      return Excerpt::$types[Excerpt::$length];
    else
      return Excerpt::$length;
  }

  // Echoes out the excerpt
  public static function output() {
    the_excerpt();
  }

}

// An alias to the class
function my_excerpt($length = 55) {
  Excerpt::length($length);
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);