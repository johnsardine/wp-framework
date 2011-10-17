<?php

/*-----------------------------------------------------------------------------------*/
/* Testing
/*-----------------------------------------------------------------------------------*/
	
/*
 * Custom mini-post widget
 */
class js_display_thumb_widget extends WP_Widget {
	function js_display_thumb_widget() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Thumb and Title', array(
			'description' => 'Display small thumbnail and title of the post.'
		));
	}
 
	function widget($args, $instance) {
			// outputs the content of the widget
			global $post;
 
			extract( $args );
			$title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base);
			$include = (!empty($instance['include']) ? explode(',', $instance['include']) : '');
			$category = (is_numeric($instance['category']) ? (int)$instance['category'] : '');
			$display_num = $instance['display_num'];
			$random = $instance['random'] ? '1' : '0';
			$link_title = $instance['link_title'] ? '1' : '0';

			if ($random) {
				$order_by = 'rand';
			} else {
				$order_by = 'asc';
			}
 
			// Set up query for posts with the provided filters
			query_posts(array(
				'post__in' => $include,
				'post__not_in' => array($post->ID),
				'cat' => $category,
				'post_status' => 'publish',
				'meta_value' => '',
				'meta_compare' => '!=',
				'orderby' => $order_by,
				'posts_per_page' => $display_num
			));
 
			echo $before_widget;
 
 			if ( $title ) {
				echo $before_title;
				if ($link_title) {
					echo '<a href="'.get_category_link( $category ).'" title="'.__('View All ').$title.'">'.$title.'</a>';
				} else {
					echo $title;
				}
				echo $after_title;
 			} else {
 				echo '<span class="filltitle"></span><hr/>';
 			}
            // Output widget, if a post exists that matches our query
			if ( have_posts() ) :
				echo '<ul class="items-list align-title zoom">';
				while ( have_posts() ) : the_post();
					echo '<li>';
					echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="alignleft">';
					js_post_thumbnail('small-thumb');
					echo '</a>';
					
					echo '<h4><a href="' .get_permalink().'" title="">'.get_the_title().'</a></h4>';
					
					echo '</li><!-- image -->';

				endwhile;
				echo '</ul>';
			else:
				echo '<p>No posts found.</p>';
			endif;
 
                        // Very important to reset the query here.
			wp_reset_query();
 
			echo $after_widget;
	}
 
	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		return $new_instance;
	}
 
	function form($instance) {
		// outputs the options form on admin
		$title = esc_attr($instance['title']);
		$include = esc_attr($instance['include']);
		$category = esc_attr($instance['category']);
		$display_num = esc_attr($instance['display_num']);
		$random = isset($instance['random']) ? (bool) $instance['random'] :false;
		$link_title = isset($instance['link_title']) ? (bool) $instance['link_title'] :false;
 
		// Get the existing categories and build a simple select dropdown for the user.
		$categories = get_categories();
 
		$cat_options = array();
		$cat_options[] = '<option value="BLANK">Select one...</option>';
		
		if (!$display_num) {
			$display_num = 2;
		}
 
		foreach ($categories as $cat) {
			$selected = $category === $cat->cat_ID ? ' selected="selected"' : '';
			$cat_options[] = '<option value="' . $cat->cat_ID .'"' . $selected . '>' . $cat->name . '</option>';
		}
 
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php _e('Widget Title:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>">
					<?php _e('From category…'); ?>
				</label>
				<select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
					<?php echo implode('', $cat_options); ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('include'); ?>">
					<?php _e('Include post IDs (optional):'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('include'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('include'); ?>" value="<?php echo $include; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('display_num'); ?>">
					<?php _e('Number of posts to display:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('display_num'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('display_num'); ?>" value="<?php echo $display_num; ?>" />
			</p>
			<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('link_title'); ?>" name="<?php echo $this->get_field_name('link_title'); ?>"<?php checked( $link_title ); ?> />
			<label for="<?php echo $this->get_field_id('link_title'); ?>"><?php _e( 'Title links to category' ); ?></label><br />
			</p>
			<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('random'); ?>" name="<?php echo $this->get_field_name('random'); ?>"<?php checked( $random ); ?> />
			<label for="<?php echo $this->get_field_id('random'); ?>"><?php _e( 'Random' ); ?></label><br />
			</p>
		<?php
	}
}
 
// register widget
register_widget('js_display_thumb_widget');

?>