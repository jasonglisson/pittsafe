<?php
/**
 * The default Theme Options
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */


/*-----------------------------------------------------------------------------------*/
/*	Initialize the options before anything else. 
/*-----------------------------------------------------------------------------------*/

add_action( 'admin_init', 'charitas_theme_options' );


/*-----------------------------------------------------------------------------------*/
/*	Build the custom settings & update OptionTree.
/*-----------------------------------------------------------------------------------*/
if (!function_exists('charitas_theme_options')) {
	function charitas_theme_options() {
	
		/*-----------------------------------------------------------
			OptionTree is not loaded yet, or this is not an admin request
		-----------------------------------------------------------*/
	
		if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
		return false;

		/*-----------------------------------------------------------
			Get a copy of the saved settings array.
		-----------------------------------------------------------*/

		$saved_settings = get_option( ot_settings_id(), array() );

		/*-----------------------------------------------------------
			Custom settings array that will eventually be  passes 
			to the OptionTree Settings API Class.
		-----------------------------------------------------------*/

		$custom_settings = array(
			
			'sections'        => array(


				/*-----------------------------------------------------------
					Welcome Settings
				-----------------------------------------------------------*/
				
				array(
					'title'       => __('Welcome', 'charitas'),
					'id'          => 'welcome_settings'
				),

				/*-----------------------------------------------------------
					General Settings
				-----------------------------------------------------------*/
				
				array(
					'title'       => __('General Setting', 'charitas'),
					'id'          => 'general_settings'
				),


				/*-----------------------------------------------------------
					Toolbar Settings
				-----------------------------------------------------------*/
				
				array(
					'title'       => __('Toolbar settings', 'charitas'),
					'id'          => 'toolbar'
				),


				/*-----------------------------------------------------------
					Slider Settings
				-----------------------------------------------------------*/

				array(
					'title'       => __('Slider settings', 'charitas'),
					'id'          => 'slider_settings'
				),


				/*-----------------------------------------------------------
					Home Page Settings
				-----------------------------------------------------------*/

				array(
					'title'       => __('Home page settings', 'charitas'),
					'id'          => 'home_page_settings'
				),


				/*-----------------------------------------------------------
					Blog settings
				-----------------------------------------------------------*/

				array(
					'title'       => __('Blog settings', 'charitas'),
					'id'          => 'blog_settings'
				),
				
			),

			'settings'        => array(

				/*-----------------------------------------------------------
					Welcome Settings
				-----------------------------------------------------------*/
				
				array(
					'label'       => __('Welcome!', 'charitas'),
					'id'          => 'welcome-message',
					'type'        => 'textblock-titled',
					'desc'        => __('First of all thank you for choosing one of WPlook Themes namely <strong>Charitas Lite</strong>, your choice is greatly appreciated! This is a very good start for your organization.<br /> <br /> Don\'t limit your Organization - Go with <a target="_blank" href="https://wplook.com/theme/charitas-charity-nonprofit-wordpress-theme/?utm_source=Buy-Full&utm_medium=link&utm_campaign=Charitas-Lite">Full Version</a>', 'charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'welcome_settings'
				),

/*
				array(
					'label'       => __('Charitas - Full Version', 'charitas'),
					'id'          => 'welcome-message-2',
					'type'        => 'textblock-titled',
					'desc'        => __('Charitas is a unique Premium Charity WordPress Theme built for Charity Organizations, Non Profit Associations, Foundations, Political Organizations or Churches.', 'charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'welcome_settings'
				),
*/

				array(
					'label'       => __('Used by over 2,200 Non Profit Organizations', 'charitas'),
					'id'          => 'welcome-message-3',
					'type'        => 'textblock-titled',
					'desc'        => __('Charitas will help you to Grow your Organization, to Fundraise money for any cause, to Build trust and credibility, to Bring your organization to the next level.', 'charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'welcome_settings'
				),

				array(
					'label'       => __('Upgrade Nowto full version and get 10% off!', 'charitas'),
					'id'          => 'welcome-message-4',
					'type'        => 'textblock-titled',
					'desc'        => __('Use the coupon code "charitas-lite". <br /> <br /><a target="_blank" href="https://wplook.com/theme/charitas-charity-nonprofit-wordpress-theme/?utm_source=Buy-Full&utm_medium=link&utm_campaign=Charitas-Lite">Start Now!</a>', 'charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'welcome_settings'
				),


				/*-----------------------------------------------------------˜†
					General Settings
				-----------------------------------------------------------*/

				array(
					'label'       => __('Logo Image', 'charitas'),
					'id'          => 'charitas_logo',
					'type'        => 'upload',
					'desc'        => __('Upload your logo.', 'charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => __('Copyright', 'charitas'),
					'id'          => 'charitas_copyright',
					'type'        => 'text',
					'desc'        => __('Enter your Copyright notice displayed in the footer of the website.','charitas'),
					'std'         => 'Copyright &copy; 2015. All Rights reserved.',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => __('Custom Cascading Style Sheets','charitas'),
					'id'          => 'charitas_css',
					'type'        => 'css',
					'desc'        => __('Add custom CSS to your theme.','charitas'),
					'std'         => '',
					'rows'        => '10',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => __('Breadcrumb','charitas'),
					'id'          => 'charitas_breadcrumbs',
					'type'        => 'on-off',
					'desc'        => __('Activate or deactivate the breadcrumbs.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),

				array(
					'label'       => __('Contact Form Email','charitas'),
					'id'          => 'charitas_contact_form_email',
					'type'        => 'text',
					'desc'        => __('Add the default emaild address for contact form.','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'general_settings'
				),
				
				/*-----------------------------------------------------------
					Toolbar Settings
				-----------------------------------------------------------*/

				array(
					'label'       => __('Phone Number','charitas'),
					'id'          => 'charitas_phone_number',
					'type'        => 'text',
					'desc'        => __('Add the phone number.','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => __('RSS Link','charitas'),
					'id'          => 'charitas_rss_link',
					'type'        => 'text',
					'desc'        => __('Add the RSS link or Feedburner RSS Link','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => __('Contact page Link','charitas'),
					'id'          => 'charitas_contact_page_link',
					'type'        => 'custom-post-type-select',
					'desc'        => __('Select the contact page','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => 'page',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => __('Contact Email','charitas'),
					'id'          => 'charitas_contact_email',
					'type'        => 'text',
					'desc'        => __('Add an email address. <strong>NOTE*</strong> Keep this field blank if you selected the contact page.','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => __('Social Network Navigation','charitas'),
					'id'          => 'charitas_toolbar_share',
					'type'        => 'list-item',
					'desc'        => __('Press the <strong>Add New</strong> button in order to add social media links.','charitas'),
					'settings'    => array(
						array(
							'label'       => __('Service Name','charitas'),
							'id'          => 'charitas_share_item_name',
							'type'        => 'text',
							'desc'        => __('The name of the social network site, for example: "Facebook"','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'taxonomy'    => '',
							'class'       => '',
							'section'     => ''
						),
						array(
							'label'       => __('URL','charitas'),
							'id'          => 'charitas_share_item_url',
							'type'        => 'text',
							'desc'        => __('Enter the URL of the social network site, for example: http://www.facebook.com/wplookthemes','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'taxonomy'    => '',
							'class'       => '',
							'section'     => ''
						), 
						array(
							'label'       => __('Icon','charitas'),
							'id'          => 'charitas_share_item_icon',
							'type'        => 'text',
							'desc'        => __('<strong>NOTICE</strong>: Choose one item from tne next list: <br />icon-facebook, <br />icon-github, <br />icon-twitter, <br />icon-pinterest, <br />icon-linkedin, <br />icon-google-plus, <br />icon-youtube, <br />icon-skype, <br />icon-vk, <br />icon-vimeo','charitas'),
							'std'         => 'icon-',
							'rows'        => '',
							'post_type'   => '',
							'taxonomy'    => '',
							'class'       => '',
							'section'     => ''
						), 
					),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),
				
				array(
					'label'       => __('Group Social buttons','charitas'),
					'id'          => 'charitas_group_icons',
					'type'        => 'on-off',
					'desc'        => __('Group/Ungroup Social buttons.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),


				array(
					'label'       => __('Search form','charitas'),
					'id'          => 'charitas_search_form',
					'type'        => 'on-off',
					'desc'        => __('Activate or deactivate the search form.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),

				array(
					'label'       => __('Donate Link','charitas'),
					'id'          => 'charitas_donete_link',
					'type'        => 'text',
					'desc'        => __('Add the donate link','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'toolbar'
				),


				/*-----------------------------------------------------------
					Slider Settings
				-----------------------------------------------------------*/

				array(
					'label'       => __('Slides','charitas'),
					'id'          => 'wpl_sliders',
					'type'        => 'list-item',
					'desc'        => __('Press the <strong>Add New</strong> button in order to add a new slider.','charitas'),
					'settings'    => array(
						array(
							'label'       => __('Slider Image','charitas'),
							'id'          => 'charitas_slider_item_image',
							'type'        => 'upload',
							'desc'        => __('<strong>Recommended image size:</strong> 1920x714px.','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'class'       => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slider Thumbnail','charitas'),
							'id'          => 'charitas_slider_item_thumbnail',
							'type'        => 'upload',
							'desc'        => __('<strong>Recommended image size:</strong> 272x150px','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slide Title','charitas'),
							'id'          => 'charitas_slider_item_title',
							'type'        => 'text',
							'desc'        => __('Enter a slide Title.','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slide Title color','charitas'),
							'id'          => 'charitas_slider_item_title_color',
							'type'        => 'colorpicker',
							'desc'        => __('Select a color for slider title.','charitas'),
							'std'         => '#FFFFFF',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),


						array(
							'label'       => __('Slide Description','charitas'),
							'id'          => 'charitas_slider_item_description',
							'type'        => 'textarea',
							'desc'        => __('Enter a slide Title.','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slide Description color','charitas'),
							'id'          => 'charitas_slider_item_description_color',
							'type'        => 'colorpicker',
							'desc'        => __('Select a color for slider description.','charitas'),
							'std'         => '#FFFFFF',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slide Buton Text','charitas'),
							'id'          => 'charitas_slider_item_button_text',
							'type'        => 'text',
							'desc'        => __('Enter the text you want to display on button, for examle: read more','charitas'),
							'std'         => 'Read more',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slide URL','charitas'),
							'id'          => 'charitas_slider_item_url',
							'type'        => 'text',
							'desc'        => __('Enter the slider URL','charitas'),
							'std'         => '',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),

						array(
							'label'       => __('Slide Button color','charitas'),
							'id'          => 'charitas_slider_item_button_color',
							'type'        => 'colorpicker',
							'desc'        => __('Select a color for the button.','charitas'),
							'std'         => '#FFFFFF',
							'rows'        => '',
							'post_type'   => '',
							'class'       => '',
							'taxonomy'    => '',
							'section'     => ''
						),
					),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'slider_settings'
				),

				array(
					'label'       => __('Revolution Slider Alias','charitas'),
					'id'          => 'charitas_slider_revolution',
					'type'        => 'text',
					'desc'        => __('<strong>Use Revolution Slider instead of displaing the base slider (FlexSlider).</strong> If you have installed the revolution slider Plugin, add the Slider Alias here. From this example [rev_slider test1] you need to add only the test1. If you do not have the plugin you can buy it from here: http://bit.ly/1eD7aE1','charitas'),
					'std'         => '',
					'rows'        => '',
					'post_type'   => '',
					'class'       => '',
					'taxonomy'    => '',
					'section'     => 'slider_settings'
				),


				/*-----------------------------------------------------------
					Home Page Settings
				-----------------------------------------------------------*/

				array(
					'label'       => __('First home page widget area','charitas'),
					'id'          => 'charitas_first_front_widget_size',
					'type'        => 'select',
					'desc'        => __('Set the size for first home page widget area','charitas'),
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_12',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => __('Second home page widget area','charitas'),
					'id'          => 'charitas_second_front_widget_size',
					'type'        => 'select',
					'desc'        => __('Set the size for second home page widget area','charitas'),
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_4',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => __('Third home page widget area','charitas'),
					'id'          => 'charitas_third_front_widget_size',
					'type'        => 'select',
					'desc'        => __('Set the size for third home page widget area','charitas'),
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_16',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),

				array(
					'label'       => __('Forth home page widget area','charitas'),
					'id'          => 'charitas_forth_front_widget_size',
					'type'        => 'select',
					'desc'        => __('Set the size for forth home page widget area','charitas'),
					'choices'     => array(
						array(
							'label'       => '25%',
							'value'       => 'grid_4'
						),
						array(
							'label'       => '50%',
							'value'       => 'grid_8'
						),
						array(
							'label'       => '75%',
							'value'       => 'grid_12'
						),
						array(
							'label'       => '100%',
							'value'       => 'grid_16'
						),
					),
					'std'         => 'grid_16',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'home_page_settings'
				),


				/*-----------------------------------------------------------
					Blog settings
				-----------------------------------------------------------*/

				/* List Posts */
				array(
					'label'       => __('Date on Blog/Archive template','charitas'),
					'id'          => 'charitas_date_blog_post',
					'type'        => 'on-off',
					'desc'        => __('Activate/Deactivated the date on Blog/Archive template.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'blog_settings'
				),

				array(
					'label'       => __('Author on Blog/Archive template','charitas'),
					'id'          => 'charitas_author_blog_post',
					'type'        => 'on-off',
					'desc'        => __('Activate/Deactivated the author on Blog/Archive template.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'blog_settings'
				),

				/* Single Post */
				array(
					'label'       => __('Date on single post','charitas'),
					'id'          => 'charitas_date_single_post',
					'type'        => 'on-off',
					'desc'        => __('Activate/Deactivated the date on single post.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'blog_settings'
				),

				array(
					'label'       => __('Author on single post','charitas'),
					'id'          => 'charitas_author_single_post',
					'type'        => 'on-off',
					'desc'        => __('Activate/Deactivated the author on single post.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'blog_settings'
				),

				array(
					'label'       => __('Category on single post','charitas'),
					'id'          => 'charitas_category_single_post',
					'type'        => 'on-off',
					'desc'        => __('Activate/Deactivated the category on single post.','charitas'),
					'std'         => 'on',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'section'     => 'blog_settings'
				),
				
			)
		);

		/* allow settings to be filtered before saving */
		$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

		if ( $saved_settings !== $custom_settings ) {
			update_option( ot_settings_id(), $custom_settings ); 
		}
		
	}
}

