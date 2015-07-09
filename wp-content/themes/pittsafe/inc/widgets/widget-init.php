<?php 
/**
 * Register widget areas.
 *
 * @package WPlook
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */


/*-----------------------------------------------------------
	Include Widgets
-----------------------------------------------------------*/
get_template_part( '/inc/widgets/widget', 'featurednews' );
get_template_part( '/inc/widgets/widget', 'quote' );
get_template_part( '/inc/widgets/widget', 'address' );
get_template_part( '/inc/widgets/widget', 'posts' );
get_template_part( '/inc/widgets/widget', 'social' );
get_template_part( '/inc/widgets/widget', 'page' );

function wplook_widgets_init() {

	/*-----------------------------------------------------------
		Home page Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'First Home Page Widget area', 'charitas' ),
		'id' => 'front-1',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Second Home Page Widget area', 'charitas' ),
		'id' => 'front-2',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Third Home Page Widget area', 'charitas' ),
		'id' => 'front-3',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );

	register_sidebar( array(
		'name' => __( 'Fourth Home Page Widget area', 'charitas' ),
		'id' => 'front-4',
		'description' => __('Widgets in this area will be shown only on the Home Page Template.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Pages widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Page Widget area', 'charitas' ),
		'id' => 'page-1',
		'description' => __('Widgets in this area will be shown on all Pages.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );
	

	/*-----------------------------------------------------------
		Posts Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Press/Blog Widget area', 'charitas' ),
		'id' => 'post-1',
		'description' => __('Widgets in this area will be shown on all Posts.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Contact page Widget area
	-----------------------------------------------------------*/
	
	register_sidebar( array(
		'name' => __( 'Contact Page Widget area', 'charitas' ),
		'id' => 'contact-1',
		'description' => __('Widgets in this area will be shown on Contact Pages.','charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3><div class="clear"></div></div>'
	) );


	/*-----------------------------------------------------------
		Footer Widget area
	-----------------------------------------------------------*/

	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'charitas' ),
		'id' => 'f1-widgets',
		'description' => __( 'The first footer widget area', 'charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );


	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'charitas' ),
		'id' => 'f2-widgets',
		'description' => __( 'The second footer widget area', 'charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );


	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'charitas' ),
		'id' => 'f3-widgets',
		'description' => __( 'The Third footer widget area', 'charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );

	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'charitas' ),
		'id' => 'f4-widgets',
		'description' => __( 'The Forth footer widget area', 'charitas' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	) );
}
/** Register sidebars */
add_action( 'widgets_init', 'wplook_widgets_init' );
?>