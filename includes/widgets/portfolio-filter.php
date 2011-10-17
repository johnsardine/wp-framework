<?php

/*-----------------------------------------------------------------------------------*/
/* Twitter Widget
/*-----------------------------------------------------------------------------------*/
class js_portfolio_filter extends WP_Widget {
	function js_portfolio_filter() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Portfolio Filter', array(
			'description' => 'Display the portfolio filter.'
		));
	}
 
	function widget($args, $instance) {
			// outputs the content of the widget
			global $post;
			
			if (is_page_template('template-portfolio.php')) {
				echo '<ul id="portfolio-filter" class="vert-menu">';
				echo '<li class="current"><a href="#" title="" data-type="all">All</a></li>';
				if (have_posts()) : while (have_posts()) : the_post();
					wp_list_categories(array('title_li' => '', 'taxonomy' => 'js_portfolio_categories', 'walker' => new Walker_Category_Filter()));
				endwhile; endif;
				echo '</ul>';			
			}
			
	}
 
	function update($new_instance, $old_instance) {
		// processes widget options to be saved
		return $new_instance;
	}
 
	function form($instance) {
		// outputs the options form on admin
 
		?>
			<p>This will output the filter for the portfolio, therefore place only in the portfolio sidebar.</p>
		<?php
	}
}
 
// register widget
register_widget('js_portfolio_filter');

?>