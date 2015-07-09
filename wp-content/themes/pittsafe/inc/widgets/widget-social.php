<?php
/*
 * Plugin Name: Social Widget
 * Plugin URI: https://www.wplook.com
 * Description: This is a widget to display Social Media
 * Author: Victor Tihai	
 * Version: 1.0.0
 * @since: Charitas Lite
 * Author URI: http://wplook.com
*/

add_action('widgets_init', create_function('', 'return register_widget("WPlooksocial");'));
class WPlooksocial extends WP_Widget {

	/*-----------------------------------------------------------------------------------*/
	/*	Widget actual processes
	/*-----------------------------------------------------------------------------------*/
	
	public function __construct() {
		parent::__construct(
			'WPlooksocial',
			'WPlook Social',
			array( 'description' => __( 'A widget for displaying Social Networking', 'charitas' ), )
		);
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Outputs the options form on admin
	/*-----------------------------------------------------------------------------------*/
	
	public function form( $instance ) {
	// outputs the options form on admin

		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}

		else {
			$title = __( '', 'charitas' );
		} 

		if ( $instance ) {
			$twitter = esc_attr( $instance[ 'twitter' ] );
		}
		else {
			$twitter = __( '', 'charitas' );
		} 

		if ( $instance ) {
			$facebook = esc_attr( $instance[ 'facebook' ] );
		}
		else {
			$facebook = __( '', 'charitas' );
		} 
		if ( $instance ) {
			$rss = esc_attr( $instance[ 'rss' ] );
		}
		else {
			$rss = __( '', 'charitas' );
		} 
		if ( $instance ) {
			$googleplus = esc_attr( $instance[ 'googleplus' ] );
		}
		else {
			$googleplus = __( '', 'charitas' );
		} 
		if ( $instance ) {
			$youtube = esc_attr( $instance[ 'youtube' ] );
		}
		else {
			$youtube = __( '', 'charitas' );
		}
		
		if ( $instance ) {
			$vimeo = esc_attr( $instance[ 'vimeo' ] );
		}
		else {
			$vimeo = __( '', 'charitas' );
		}
		if ( $instance ) {
			$soundcloud = esc_attr( $instance[ 'soundcloud' ] );
		}
		else {
			$soundcloud = __( '', 'charitas' );
		} 
		if ( $instance ) {
			$lastfm = esc_attr( $instance[ 'lastfm' ] );
		}
		else {
			$lastfm = __( '', 'charitas' );
		} 
		if ( $instance ) {
			$pinterest = esc_attr( $instance[ 'pinterest' ] );
		}
		else {
			$pinterest = __( '', 'charitas' );
		}
		if ( $instance ) {
			$flickr = esc_attr( $instance[ 'flickr' ] );
		}
		else {
			$flickr = __( '', 'charitas' );
		}
		if ( $instance ) {
			$linked = esc_attr( $instance[ 'linked' ] );
		}
		else {
			$linked = __( '', 'charitas' );
		}

		if ( $instance ) {
			$instagram = esc_attr( $instance[ 'instagram' ] );
		}
		else {
			$instagram = __( '', 'charitas' );
		}

		?>
		<!-- Title-->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<!-- Twitter-->
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>">
				<?php _e('Twitter:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Twitter profile.', 'charitas'); ?>
			</p>
		</p>
		
		<!-- Facebook-->
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>">
				<?php _e('Facebook:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Facebook profile, page or group.', 'charitas'); ?>
			</p>
		</p>
		
		<!-- RSS-->
		<p>
			<label for="<?php echo $this->get_field_id('rss'); ?>">
				<?php _e('RSS:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo $rss; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the Url of your RSS. You may include your RSS from Feedburner.', 'charitas'); ?>
			</p>
		</p>
		
		<!-- Google Plus-->
		<p>
			<label for="<?php echo $this->get_field_id('googleplus'); ?>">
				<?php _e('Google Plus:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $googleplus; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Google Plus profile', 'charitas'); ?>
			</p>
		</p>
		
		<!-- You Tube-->
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>">
				<?php _e('You Tube:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $youtube; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your YouTube profile.', 'charitas'); ?>
			</p>
		</p>
		
		<!-- vimeo-->
		<p>
			<label for="<?php echo $this->get_field_id('vimeo'); ?>">
				<?php _e('Vimeo:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo $vimeo; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your vimeo profile.', 'charitas'); ?>
			</p>
		</p>
		
		<!-- lastfm-->
		<p>
			<label for="<?php echo $this->get_field_id('lastfm'); ?>">
				<?php _e('Lastfm:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" name="<?php echo $this->get_field_name('lastfm'); ?>" type="text" value="<?php echo $lastfm; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your lastfm profile.', 'charitas'); ?>
			</p>
		</p>

		<!-- soundcloud -->
		<p>
			<label for="<?php echo $this->get_field_id('soundcloud'); ?>">
				<?php _e('Soundcloud:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" name="<?php echo $this->get_field_name('soundcloud'); ?>" type="text" value="<?php echo $soundcloud; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your soundcloud profile.', 'charitas'); ?>
			</p>
		</p>
		
		<!--Pinterest-->
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>">
				<?php _e('Pinterest:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $pinterest; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Pinterest profile.', 'charitas'); ?>
			</p>
		</p>

		<!--Flickr-->
		<p>
			<label for="<?php echo $this->get_field_id('flickr'); ?>">
				<?php _e('Flickr:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $flickr; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Flickr profile.', 'charitas'); ?>
			</p>
		</p>
		
		<!--Linkedin-->
		<p>
			<label for="<?php echo $this->get_field_id('linked'); ?>">
				<?php _e('Linkedin:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('linked'); ?>" name="<?php echo $this->get_field_name('linked'); ?>" type="text" value="<?php echo $linked; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Linkedin profile.', 'charitas'); ?>
			</p>
		</p>

		<!--Instagram-->
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>">
				<?php _e('Instagram:', 'charitas'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instagram; ?>" />
			<p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Instagram profile.', 'charitas'); ?>
			</p>
		</p>

<?php 

	} 

function update($new_instance, $old_instance) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		$instance['twitter'] = sanitize_text_field($new_instance['twitter']);
		$instance['facebook'] = $new_instance['facebook'];
		$instance['rss'] = $new_instance['rss'];
		$instance['googleplus'] = $new_instance['googleplus'];
		$instance['youtube'] = $new_instance['youtube'];
		$instance['vimeo'] = $new_instance['vimeo'];
		$instance['lastfm'] = $new_instance['lastfm'];
		$instance['soundcloud'] = $new_instance['soundcloud'];
		$instance['pinterest'] = $new_instance['pinterest'];
		$instance['flickr'] = $new_instance['flickr'];
		$instance['linked'] = $new_instance['linked'];
		$instance['instagram'] = $new_instance['instagram'];

	return $instance;
	}

function widget($args, $instance) {
		// outputs the content of the widget
		 extract( $args );
			$title = apply_filters('widget_title', $instance['title']);
			$twitter = apply_filters('widget_twitter', $instance['twitter']);
			$facebook = apply_filters('widget_facebook', $instance['facebook']);
			$rss = apply_filters('widget_rss', $instance['rss']);
			$googleplus = apply_filters('widget_googleplus', $instance['googleplus']);
			$youtube = apply_filters('widget_youtube', $instance['youtube']);
			$vimeo = apply_filters('widget_vimeo', $instance['vimeo']);
			$lastfm = apply_filters('widget_lastfm', $instance['lastfm']);
			$soundcloud = apply_filters('widget_soundcloud', $instance['soundcloud']);
			$pinterest = apply_filters('widget_pinterest', $instance['pinterest']);
			$flickr = apply_filters('widget_flickr', $instance['flickr']);
			$linked = apply_filters('widget_linked', $instance['linked']);
			$instagram = apply_filters('widget_instagram', $instance['instagram']);

			?>
<?php if ($title=="") $title = "Social Widget"; ?>
<?php echo $before_widget; ?>
<?php if ( $title )
		echo $before_title . $title . $after_title; 
		echo "<div class='social-widget-body'><div class='social-widget-margin'>";
			// Twitter
			if ($twitter != "") {
				echo "<div class='social-item-twitter'>"."<a href='$twitter' target='_blank'><i class='icon-twitter'></i></a>"."</div>";
			}
			// Facebook
			if ($facebook != "") {
				echo "<div class='social-item-facebook'>"."<a href='$facebook' target='_blank'><i class='icon-facebook'></i></a>" ."</div>";
			}		
			// RSS
			if ($rss != "") {
				echo "<div class='social-item-rss'>"."<a href='$rss' target='_blank'><i class='icon-feed'></i></a>" ."</div>";
			}
			// Google Plus
			if ($googleplus != "") {
				echo "<div class='social-item-gplus'>"."<a href='$googleplus' target='_blank'><i class='icon-google-plus'></i></a>" ."</div>";
			}
			// You Tube
			if ($youtube != "") {
				echo "<div class='social-item-youtube'>"."<a href='$youtube' target='_blank'><i class='icon-youtube'></i></a>" ."</div>";
			}
			// vimeo
			if ($vimeo != "") {
				echo "<div class='social-item-vimeo'>"."<a href='$vimeo' target='_blank'><i class='icon-vimeo'></i></a>" ."</div>";
			}
			// lastfm
			if ($lastfm != "") {
				echo "<div class='social-item-lastfm'>"."<a href='$lastfm' target='_blank'><i class='icon-lastfm'></i></a>" ."</div>";
			}
			// soundcloud
			if ($soundcloud != "") {
				echo "<div class='social-item-soundcloud'>"."<a href='$soundcloud' target='_blank'><i class='icon-soundcloud'></i></a>" ."</div>";
			}
			// Pinterest
			if ($pinterest != "") {
				echo "<div class='social-item-pinterest'>"."<a href='$pinterest' target='_blank'><i class='icon-pinterest'></i></a>" ."</div>";
			}
			// Flickr
			if ($flickr != "") {
				echo "<div class='social-item-flickr'>"."<a href='$flickr' target='_blank'><i class='icon-flickr'></i></a>" ."</div>";
			}
			// Linkedin
			if ($linked != "") {
				echo "<div class='social-item-linkedin'>"."<a href='$linked' target='_blank'><i class='icon-linkedin'></i></a>" ."</div>";
			}
			// Instagram
			if ($instagram != "") {
				echo "<div class='social-item-instagram'>"."<a href='$instagram' target='_blank'><i class='icon-instagram'></i></a>" ."</div>";
			}
		echo "<div class='clear'></div></div></div>";
	 	echo $after_widget; ?>
<?php
	}
}
?>