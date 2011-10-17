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
			$title = apply_filters('widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base);
			$include = (!empty($instance['include']) ? explode(',', $instance['include']) : '');
			$category = (is_numeric($instance['category']) ? (int)$instance['category'] : '');
			$offset = $instance['offset'];
			$post_nr = $instance['post_nr'];
			$random = $instance['random'] ? '1' : '0';
			$link_title = $instance['link_title'] ? '1' : '0';
			if ($random) {
				$order_by = 'rand';
			} else {
				$order_by = 'asc';
			}
 
			// Set up query for posts with the provided filters
			query_posts(array(
				'post_type' => 'post',
				'post__in' => $include,
				'post__not_in' => array($post->ID),
				'cat' => $category,
				'post_status' => 'publish',
				'meta_value' => '',
				'meta_compare' => '!=',
				'offset' 		=> $offset,
				'order' => 'desc',
				'orderby' => $order_by,
				'posts_per_page' => $post_nr
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
			if ( $category && have_posts() ) :
				echo '<ul class="items-list">';
				while ( have_posts() ) : the_post();


				echo '<li>
					<h4><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h4>
					<p>'.excerpt(20, false).'</p>
					<a href="'.get_permalink().'" title="'.__('Read ', 'js').get_the_title().'" class="more">'.__('Read More', 'js').'</a>
					</li>';
							 
				endwhile;
				echo '</ul>';
			else:
				echo '<p>You must choose a category.</p>';
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
		$offset = $instance['offset'];
		$post_nr = $instance['post_nr'];
		$random = isset($instance['random']) ? (bool) $instance['random'] :false;
		$link_title = isset($instance['link_title']) ? (bool) $instance['link_title'] :false;
		
		/* Defining defaults */
		if (!$post_nr) {
		    $post_nr = '1';
		}
		
		if (!$offset) {
		    $offset = '0';
		}
		 
		// Get the existing categories and build a simple select dropdown for the user.
		$categories = get_categories();
 
		$cat_options = array();
		$cat_options[] = '<option value="BLANK">Select one...</option>';
 
		foreach ($categories as $cat) {
			$selected = $category === $cat->cat_ID ? ' selected="selected"' : '';
			$cat_options[] = '<option value="' . $cat->cat_ID .'"' . $selected . '>' . $cat->name . '</option>';
		}
 
		?>
			<p>You can combine multiple instances of this widget to show another post horizontally instead of increasing the number of posts with appear vertically.</p>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<?php _e('Widget Title:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('title'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
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
				<label for="<?php echo $this->get_field_id('include'); ?>">
					<?php _e('Include post IDs (optional):'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('include'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('include'); ?>" value="<?php echo $include; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('post_rn'); ?>">
					<?php _e('Number of Posts:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('post_nr'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('post_nr'); ?>" value="<?php echo $post_nr; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('offset'); ?>">
					<?php _e('Offset Posts:'); ?>
				</label>
				<input id="<?php echo $this->get_field_id('offset'); ?>" class="widefat" type="text" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $offset; ?>" />
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
register_widget('js_display_posts_widget');

?>