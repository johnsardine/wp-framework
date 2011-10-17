<?php

/*-----------------------------------------------------------------------------------*/
/* Twitter Widget
/*-----------------------------------------------------------------------------------*/
class js_twitter extends WP_Widget {
	function js_twitter() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Twitter', array(
			'description' => 'Display your latest tweets.'
		));
	}
 
	function widget($args, $instance) {
			// outputs the content of the widget
			global $post;
 
			extract( $args );
			$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Twitter' ) : $instance['title'], $instance, $this->id_base);
			$username = $instance['username'];
			$tweets = $instance['tweets'];
			$timestamp = $instance['timestamp'] ? 'true' : 'false';
			$profile_link = $instance['profile_link'] ? 'true' : 'false';
			$link_title = $instance['link_title'] ? '1' : '0';
			
			if (!$username) {
				$username = 'twitter';
			}
			
			if (!$timestamp) {
				$timestamp = 'true';
			}
			
			if (!$profile_link) {
				$profile_link = 'true';
			}
			if(!$tweets) {
				$tweets = '3';
			}

			echo $before_widget;
 
 			if ( $title ) {
				if ($link_title) {
 					echo $before_title . '<a href="http://twitter.com/#!/'.$username.'" title="Visit '.$username.' on twitter" target="_blank">' . $title . '</a>' . $after_title;
 				} else {
					echo $before_title . $title . $after_title;
 				}
 			}
			echo '<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery("#twitter").getTwitter({
						userName: "'.$username.'",
						numTweets: '.$tweets.',
						loaderText: "Loading tweets...",
						slideIn: true,
						slideDuration: 750,
						showHeading: false,
						headingText: "Latest Tweets",
						showProfileLink: '.$profile_link.',
						showTimestamp: '.$timestamp.'
					});
				});
				</script>';
			echo '<div id="twitter"></div>';
 
			echo $after_widget;
	}
 
	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		return $new_instance;
	}
 
	function form($instance) {
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
		$username = esc_attr($instance['username']);
		$tweets = esc_attr($instance['tweets']);
		$timestamp = isset($instance['timestamp']) ? (bool) $instance['timestamp'] :false;
		$profile_link = isset($instance['profile_link']) ? (bool) $instance['profile_link'] :false;
		$link_title = isset($instance['link_title']) ? (bool) $instance['link_title'] :false;
 
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php _e('Widget Title:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('username'); ?>">
					<?php _e('Username:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('username'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo $username; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('tweets'); ?>">
					<?php _e('Number of Tweets:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('tweets'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('tweets'); ?>" value="<?php echo $tweets; ?>" />
			</p>
			<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('timestamp'); ?>" name="<?php echo $this->get_field_name('timestamp'); ?>"<?php checked( $timestamp ); ?> />
			<label for="<?php echo $this->get_field_id('timestamp'); ?>"><?php _e( 'Display Timestamp' ); ?></label><br />
			</p>
			<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('profile_link'); ?>" name="<?php echo $this->get_field_name('profile_link'); ?>"<?php checked( $profile_link ); ?> />
			<label for="<?php echo $this->get_field_id('profile_link'); ?>"><?php _e( 'Display Profile Link' ); ?></label><br />
			</p>
			<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('link_title'); ?>" name="<?php echo $this->get_field_name('link_title'); ?>"<?php checked( $link_title ); ?> />
			<label for="<?php echo $this->get_field_id('link_title'); ?>"><?php _e( 'Profile Link in Widget Title' ); ?></label><br />
			</p>
		<?php
	}
}
 
// register widget
register_widget('js_twitter');

?>