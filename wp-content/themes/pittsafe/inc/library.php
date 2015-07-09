<?php
/**
 * Custom Functions
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */

/*-----------------------------------------------------------
	Custom Tag cloud Widget
-----------------------------------------------------------*/

if ( ! function_exists( 'charitas_tag_cloud_widget' ) ) {

	function charitas_tag_cloud_widget($args) {
		$args['largest'] = 14;
		$args['smallest'] = 14;
		$args['unit'] = 'px';
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'charitas_tag_cloud_widget' );

}


/*-----------------------------------------------------------
	Get Date
-----------------------------------------------------------*/

if ( ! function_exists( 'charitas_get_date' ) ) {

	function charitas_get_date() {
		the_time(get_option('date_format'));
	}

}


/*-----------------------------------------------------------------------------------*/
/*  Add a container for video
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_custom_oembed_filter' ) ) {

	add_filter( 'embed_oembed_html', 'charitas_custom_oembed_filter', 10, 4 ) ;

	function charitas_custom_oembed_filter($html, $url, $attr, $post_ID) {
		$return = '<div class="video-container">'.$html.'</div>';
	    return $return;
	}
}


/*-----------------------------------------------------------
	Get Time
-----------------------------------------------------------*/

if ( ! function_exists( 'charitas_get_time' ) ) {

	function charitas_get_time() {
		the_time(get_option('time_format'));
	}

}


/*-----------------------------------------------------------
	Get Date and Time
-----------------------------------------------------------*/

if ( ! function_exists( 'charitas_get_date_time' ) ) {

	function charitas_get_date_time() {
		the_time(get_option('date_format')); 
		_e( ' at ', 'charitas');
		the_time(get_option('time_format'));
	}

}


/*-----------------------------------------------------------
	Display Navigation for post, pages, search
-----------------------------------------------------------*/

if ( ! function_exists( 'charitas_content_navigation' ) ) {

	function charitas_content_navigation( $nav_id ) {
		global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav id="<?php echo $nav_id; ?>">
				<div class="nav-previous"><?php previous_posts_link( __( '<span>&larr;</span>  <span class="mobile-nav">Newer</span>', 'charitas' ) ); ?></div>
				<div class="nav-next"><?php next_posts_link( __( '<span class="mobile-nav">Older</span> <span>&rarr;</span>', 'charitas' ) ); ?></div>
				<div class="clear"></div>
			</nav><!-- #nav -->
		<?php endif;
	}

}


/*-----------------------------------------------------------
	Breadcrumbs
-----------------------------------------------------------*/

if ( ! function_exists( 'charitas_breadcrumbs' ) ) {

	function charitas_breadcrumbs() {
		$showOnHome 	= '0'; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter 	= '>'; // delimiter between crumbs
		
		$showCurrent 	= '1'; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$before 		= '<span class="current">'; // tag before the current crumb
		$after 		= '</span>'; // tag after the current crumb
		
		$text['home'] = __('Home','charitas'); // text for the 'Home' link
		$text['category'] = __('Archive for %s','charitas'); // text for a category page
		$text['search'] = __('Search results for: %s','charitas'); // text for a search results page
		$text['tag'] = __('Posts tagged %s','charitas'); // text for a tag page
		$text['author'] = __('Posts by %s','charitas'); // text for an author page
		$text['404'] = __('Error 404','charitas'); // text for the 404 page
		
		global $post;
		$homeLink = home_url( '/' );
		
		if (is_home() || is_front_page()) {

			if ($showOnHome == 1) echo '<a href="' . $homeLink . '">' . $text['home'] . '</a>';

  		} else {

			echo '<a href="' . $homeLink . '">' . $text['home'] . '</a> ' . $delimiter . ' ';

			if ( is_category() ) {
				global $wp_query;
				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category($thisCat);
				$parentCat = get_category($thisCat->parent);
				if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
				echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf($text['search'], get_search_query()) . $after;

			} elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo $before . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
					if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					if ($showCurrent == 0) $cats = preg_replace("/^(.+)\s$delimiter\s$/", "$1", $cats);
					echo $cats;
					
					if ($showCurrent == 1 ) {
						if ( get_the_title() ) {
							echo $before . get_the_title() . $after;
						} else {
							echo $before . get_the_date() . $after;
						}
						
					} 
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post($post->post_parent);
				//$cat = get_the_category($parent->ID); $cat = $cat[0];
				//echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
				}
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo $before . sprintf($text['author'], $userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo ' ' . $delimiter . ' '; echo __('Page', 'charitas') . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}
		}

	} // end breadcrumbs()
}


/*-----------------------------------------------------------------------------------*/
/*	Open Graph
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_open_graph' ) ) {

	function charitas_open_graph() {
		if ( is_single() || is_page() ) {
			global $wp_query;
			$wplook_postid = $wp_query->post->ID;
			$wplook_title = single_post_title('', false);
			$wplook_url = get_permalink($wplook_postid);
			$wplook_blogname = get_bloginfo('name');
				echo "\n<meta property='og:title' content='$wplook_title' />",			
					"\n<meta property='og:site_name' content='$wplook_blogname' />",				
					"\n<meta property='og:url' content='$wplook_url' />",				
					"\n<meta property='og:type' content='article' />";
		}
	}
	add_action('wp_head', 'charitas_open_graph');

}


if ( ! function_exists( 'charitas_fb_thumb' ) ) {

	function charitas_fb_thumb() {
	if ( is_single() || is_page() ) {
			if (has_post_thumbnail()) {
				$fbthumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'charitas-lite-medium-thumb');
				$fbthumburl = $fbthumb[0];
				echo "\n<meta property='og:image' content='$fbthumburl' />\n";
			}
		}
	}
	add_action( 'wp_head', 'charitas_fb_thumb' );

}


/*-----------------------------------------------------------------------------------*/
/*	Include the thumbnail in the RSS feed
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_featuredtoRSS' ) ) {
	
	function charitas_featuredtoRSS($content) {

		global $post;

		if ( has_post_thumbnail( $post->ID ) ){
			$content = '' . get_the_post_thumbnail( $post->ID, 'charitas-lite-medium-thumb', array( 'style' => 'float:left; margin:0 15px 15px 0;' ) ) . '' . $content;
		}
		return $content;
	}
	add_filter('the_excerpt_rss', 'charitas_featuredtoRSS');
	add_filter('the_content_feed', 'charitas_featuredtoRSS');

}


/*-----------------------------------------------------------
	Add custom Colors to the theme
-----------------------------------------------------------*/

add_action( 'customize_register', 'charitas_color_customize_register' );
function charitas_color_customize_register($wp_customize) {
	$colors = array();
	$colors[] = array( 'slug'=>'wpl_link_color', 'default' => '#e53b51', 'label' => __( 'Link color', 'charitas' ) );
	$colors[] = array( 'slug'=>'wpl_hover_link_color', 'default' => '#c9253a', 'label' => __( 'Hover link color', 'charitas' ) );
	$colors[] = array( 'slug'=>'wpl_accent_color', 'default' => '#e53b51', 'label' => __( 'Accent Color', 'charitas' ) );
	$colors[] = array( 'slug'=>'wpl_toolbar_color', 'default' => '#000000', 'label' => __( 'Toolbar Color', 'charitas' ) );


	foreach($colors as $color) {
		// SETTINGS
		$wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color', ));

		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'] )));
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Print Custom Color Styles
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_print_custom_color_style' ) ) {

	function charitas_print_custom_color_style() { ?>
		<?php
			$link_color = get_option('wpl_link_color');
			$hover_link_color = get_option('wpl_hover_link_color');
			$accent_color = get_option('wpl_accent_color');
			$toolbar_color = get_option('wpl_toolbar_color');
		?>
		<style>
			a, a:visited { color: <?php echo esc_html($link_color); ?>;}

			a:focus, a:active, a:hover { color: <?php echo esc_html($hover_link_color); ?>; }

			.teaser-page-list, #footer-widget-area, .short-content .buttons, .buttons-download, .event-info, .teaser-page-404, .announce-body, .teaser-page, .tagcloud a, .widget ul li:hover, #searchform #searchsubmit, .nav-next a:hover, .nav-previous a:hover, .progress-percent, .progress-money, .progress-percent .arrow, .progress-money .arrow, .donate_now_bt, .toggle-content-donation, .widget-title .viewall a:hover, .flexslider-news .flex-button-red a:hover, .entry-header-comments .reply a:hover, .share-buttons, #flexslider-gallery-carousel, .menu-language-menu-container ul li a:hover, .menu-language-menu-container ul .current a, ul.nav-menu ul a:hover, .nav-menu ul ul a:hover, #toolbar .tb-list .search-items, #toolbar .tb-list .search a:hover, #toolbar .tb-list .search:hover { background:  <?php echo esc_html($accent_color); ?>;}

			h1,h2,h3,h4,h5,h6, .candidate .name, figure:hover .mask-square, .nav-menu .current_page_item > a, .nav-menu .current_page_ancestor > a, .nav-menu .current-menu-item > a, .nav-menu .current-menu-ancestor > a {color:  <?php echo esc_html($accent_color); ?>;}

			.tagcloud a:hover {color: <?php echo esc_html($hover_link_color); ?>!important;}

			.nav-next a:hover, .nav-previous a:hover, .toggle-content-donation, .widget-title .viewall a:hover, .flexslider-news .flex-button-red a, .entry-header-comments .reply a:hover {border: 1px solid <?php echo esc_html($accent_color); ?>!important;}

			.flex-active {border-top: 3px solid <?php echo esc_html($accent_color); ?>;}

			.flex-content .flex-button a:hover {background:<?php echo esc_html($accent_color); ?>; }

			.latestnews-body .flex-direction-nav a {background-color: <?php echo esc_html($accent_color); ?>;}

			.entry-content blockquote {border-left: 3px solid <?php echo esc_html($accent_color); ?>;}
			#toolbar, .site-info, #flexslider-gallery-carousel .flex-active-slide, .mean-container .mean-bar, .social-widget-margin a, .social-widget-margin a:visited  {	background: <?php echo esc_html($toolbar_color); ?>; }
			.flickr-widget-body a:hover {border: 1px solid <?php echo esc_html($toolbar_color); ?>;}
		</style>
	<?php }
	add_action( 'wp_head', 'charitas_print_custom_color_style' );
}


/*-----------------------------------------------------------------------------------*/
/*	Custom CSS
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_custom_css' ) ) {
	function charitas_custom_css() {
		$charitas_css = ot_get_option('charitas_css');
		echo "<style>";
		echo esc_html($charitas_css);
		echo "</style>";
	}
	add_action( 'wp_head', 'charitas_custom_css' );

}


/*-----------------------------------------------------------------------------------*/
/*	BE Dashbord Widget
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_dashboard_widgets' ) ) {

	function charitas_dashboard_widgets() {
		global $wp_meta_boxes;
		unset(
			$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
		);
			wp_add_dashboard_widget( 'dashboard_custom_feed', '<a href="https://wplook.com?utm_source=Our-Themes&utm_medium=rss&utm_campaign=Charitas-Lite">WPlook News</a>' , 'charitas_dashboard_custom_feed_output' );
	}
	add_action('wp_dashboard_setup', 'charitas_dashboard_widgets');

}


if ( ! function_exists( 'charitas_dashboard_custom_feed_output' ) ) {

	function charitas_dashboard_custom_feed_output() {
		echo '<div class="rss-widget rss-wplook">';
		wp_widget_rss_output(array(
			'url' => 'http://feeds.feedburner.com/wplook',
			'title' => '',
			'items' => 5,
			'show_summary' => 1,
			'show_author' => 0,
			'show_date' => 1
			));
		echo '</div>';
	}

}

if ( ! function_exists( 'charitas_bar_menu' ) ):

	function charitas_bar_menu() {
		global $wp_admin_bar;
		if ( !is_super_admin() || !is_admin_bar_showing() )
			return;
		$admin_dir = get_admin_url();

/*
		$wp_admin_bar->add_menu( 
			array(
				'id' => 'custom_menu',
				'title' => __( 'WPlook Panel', 'charitas' ),
				'href' => FALSE,
				'meta' => array('title' => 'WPlook Options Panel', 'class' => 'wplookpanel') 
			) 
		);
*/

		$wp_admin_bar->add_menu(
			array(
				'id' => 'wpl_to',
				'parent' => 'custom_menu',
				'title' => __( 'Theme Options', 'charitas' ),
				'href' => $admin_dir .'themes.php?page=ot-theme-options',
				'meta' => array('title' => 'Theme Option') 
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'wpl_sp',
				'parent' => 'custom_menu',
				'title' => __( 'Support', 'charitas' ),
				'href' => 'https://wplook.com/help/?utm_source=Support&utm_medium=link&utm_campaign=Charitas-Lite',
				'meta' => array('title' => 'Support') 
			)
		);


		$wp_admin_bar->add_menu(
			array(
				'id' => 'wpl_wt',
				'parent' => 'custom_menu',
				'title' => __( 'Our Themes', 'charitas' ),
				'href' => 'https://wplook.com/wordpress/themes/?utm_source=Our-Themes&utm_medium=link&utm_campaign=Charitas-Lite',
				'meta' => array('title' => 'Our Themes')
				)
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'wpl_fb',
				'parent' => 'custom_menu',
				'title' => __( 'Become our fan on Facebook', 'charitas' ),
				'href' => 'http://www.facebook.com/wplookthemes',
				'meta' => array('target' => 'blank', 'title' => 'Become our fan on Facebook') 
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'wpl_tw',
				'parent' => 'custom_menu',
				'title' => __( 'Follow us on Twitter', 'charitas' ),
				'href' => 'http://twitter.com/#!/wplook',
				'meta' => array('target' => 'blank', 'title' => 'Follow us on Twitter')
			)
		);
	}
	add_action('admin_bar_menu', 'charitas_bar_menu', '1000');

endif;


/*-----------------------------------------------------------------------------------*/
/*	Pro Version
/*-----------------------------------------------------------------------------------*/

function charitas_buy_menu() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
				
/*
	$wp_admin_bar->add_menu( array(
	'id' => 'custom_buymenu',
	'title' => __( 'Charitas - Full Version', 'charitas' ),
	'href' => 'https://wplook.com/theme/charitas/?utm_source=Buy-Full&utm_medium=link&utm_campaign=Charitas-Lite',
	'meta' => array('title' => 'Learn more about Charitas', 'class' => 'wplookbuy') ) );
*/
	
}
add_action('admin_bar_menu', 'charitas_buy_menu', '1000');


/*-----------------------------------------------------------------------------------*/
/*	Trim excerpt
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'charitas_short_excerpt' ) ) {

	function charitas_short_excerpt($limit = 40) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}	
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

}