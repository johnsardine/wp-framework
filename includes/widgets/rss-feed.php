<?php

/*-----------------------------------------------------------------------------------*/
/* Testing
/*-----------------------------------------------------------------------------------*/
	
/*
 * Custom mini-post widget
 */
class js_display_posts_widget extends WP_Widget {
	function js_display_posts_widget() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Show Posts', array(
			'description' => 'Display posts from a selected category.'
		));
	}
 
	function widget($args, $instance) {
			// outputs the content of the widget
			global $post;
 
			extract( $args );
			$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Posts' ) : $instance['title'], $instance, $this->id_base);
			$type = $instance['type'];
			$include = (!empty($instance['include']) ? explode(',', $instance['include']) : '');
			$category = (is_numeric($instance['category']) ? (int)$instance['category'] : '');
			$random = $instance['random'] ? '1' : '0';
			if ($random) {
				$order_by = 'rand';
			} else {
				$order_by = 'asc';
			}
 
			// Set up query for posts with the provided filters
			query_posts(array(
				'post_type' => $type,
				'post__in' => $include,
				'post__not_in' => array($post->ID),
				'cat' => $category,
				'post_status' => 'publish',
				'meta_value' => '',
				'meta_compare' => '!=',
				'orderby' => $order_by,
				'posts_per_page' => '1'
			));
 
			echo $before_widget;
 
 			if ( $title ) {
				echo $before_title . $title . $after_title;
 			}
            // Output widget, if a post exists that matches our query
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					$post_meta = get_post_custom($post->ID);
					echo (!empty($post_meta['image_value'][0]) ? '<a href="' . get_page_link() . '">' .
							 '<img alt="image" src="' . get_bloginfo('template_url') . '/scripts/timthumb.php?src=' . htmlentities($post_meta['image_value'][0]) . '&h=62&w=180&zc=1" />' .
							 '</a>' : '') .
							 '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>' .
							 '<p>' . htmlentities($post_meta['teaser_value'][0]) . '</p>' .
							 '<p><a class="learn-more" href="' . get_permalink() . '">learn more</a></p>';
				endwhile;
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
		$type = esc_attr($instance['type']);
		$include = esc_attr($instance['include']);
		$category = esc_attr($instance['category']);
		$random = isset($instance['random']) ? (bool) $instance['random'] :false;
 
		// Get the existing categories and build a simple select dropdown for the user.
		$categories = get_categories();
 
		$cat_options = array();
		$cat_options[] = '<option value="BLANK">Select one...</option>';
 
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
				<label for="<?php echo $this->get_field_id('type'); ?>">
					<?php _e('Content type:'); ?>
				</label>
				<select id="<?php echo $this->get_field_id('type'); ?>" class="widefat" name="<?php echo $this->get_field_name('type'); ?>">
					<option value="post"<?php echo ($type === 'post' ? ' selected="selected"' : ''); ?>>Post</option>
					<option value="page"<?php echo ($type === 'page' ? ' selected="selected"' : ''); ?>>Page</option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('include'); ?>">
					<?php _e('Include post IDs (optional):'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('include'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('include'); ?>" value="<?php echo $include; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('category'); ?>">
					<?php _e('Include category (optional):'); ?>
				</label>
				<select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
					<?php echo implode('', $cat_options); ?>
				</select>
			</p>
			<p>
			<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('random'); ?>" name="<?php echo $this->get_field_name('random'); ?>"<?php checked( $random ); ?> />
			<label for="<?php echo $this->get_field_id('random'); ?>"><?php _e( 'Random' ); ?></label><br />
			</p>
		<?php
	}
}
 
// register widget
register_widget('js_display_posts_widget');

?>