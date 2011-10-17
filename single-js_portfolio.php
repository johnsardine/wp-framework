<?php get_header(); ?>
<?php
$prefix = 'js_';
$count = 0;
$skills = get_post_meta($post->ID, $prefix . 'skill_used');
$portfolio_page = js_get_option('portfolio_page_id');
$portfolio_title = get_post($portfolio_page);
$portfolio_title = $portfolio_title->post_title;
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h1 class="page-title">
	<span><?php echo $portfolio_title ?></span>
</h1>

<?php $curr_post_id = $post->ID; ?>

<?php
	$args = array(
	    'post_type' => 'attachment',
	    'orderby' => 'menu_order',
	    'order' => ASC,
	    'numberposts' => -1,
	    'post_status' => null,
	    'post_parent' => $post->ID,
	    'exclude' => get_post_thumbnail_id()
	);
	$attachments = get_posts($args);
	$attachments_count = count($attachments);
?>

<section id="individual-item" class="inside">

	<div id="item-gallery" class="cf">
		<div class="slides_container">
		
		<?php
			if ( $attachments ):
				foreach ( $attachments as $attachment ):
					$large_image = wp_get_attachment_image_src($attachment->ID, 'large');
					if ($attachment->post_content) {
						echo '<div>'.$attachment->post_content.'</div>';
					} else {
						echo '<div style="height:'. $large_image[2] .'px;width:'. $large_image[1] .'px;">'.
						 	'<img height="'. $large_image[2] .'" width="'. $large_image[1] .'" src="'. $large_image[0] .'" style="height:'. $large_image[2] .'px;width:'. $large_image[1] .'px;"/>'.
						 	'</div>';
					}
				endforeach;
			endif;
		?>
		
		</div>
	</div>
		
	<div id="item-info">
		<h2><?php the_title(); ?></h2>
		
		<?php the_content(); ?>
		
		<?php if (get_post_meta($post->ID, $prefix . 'project_link', true)) { ?>
			<a href="<?php echo get_post_meta($post->ID, $prefix . 'project_link', true); ?>" title="<?php _e('View ','js') . the_title(); ?>" target="_blank">View Project <span class="symb">&rarr;</span></a>		
		<?php } ?>

		<?php
		    if ( $attachments_count > 1 ):
		    	echo '<ul class="pagination thumbs zoom">';
		    	foreach ( $attachments as $attachment ):
		    		echo '<li><a href="#">';
		    		echo wp_get_attachment_image($attachment->ID, 'small-thumb');
		    		echo '</a></li>';
		    	endforeach;
		    	echo '</ul>';
		    endif;
		?>
		
		<?php
		$skills = get_the_terms( $post->ID, 'js_portfolio_categories');
		$skills_count = count($skills);
		$count = 0;
		if ($skills) {
			echo '<div class="clear"></div><span><strong>Skills used:</strong></span><ul class="skills">';
				foreach ($skills as $skill) {
					$count++;
					echo '<li>';
					echo $skill->name;
					if ($count != $skills_count) {echo '<span></span>';}
					echo '</li>';
				}
			echo '</ul>';
		}
		?>
		
		<div class="clear"></div>
		<?php if (js_get_option('portfolio_page_id')) { ?>
			<a href="<?php echo get_page_link($portfolio_page); ?>" title="<?php _e('Back to portfolio', 'js'); ?>"><span class="symb">&larr;</span> <?php _e('Back to ', 'js'); ?><?php echo $portfolio_title ?></a>
		<?php } ?>
		
	</div>
	
	<div class="clear"></div>

</section>

<?php endwhile; endif; ?>

<div class="inside">
<div class="block top-space">

    <div class="block-4">
    	<h3 class="small">Other Work</h3>
    	<hr/>
		<?php
		//begin query
		$query = new WP_Query(array(
			'post_type' => 'js_portfolio',
			'posts_per_page' => '4',
			'orderby' => 'rand',
			'order' => 'desc',
			'post__not_in' => array($post->ID)
		));
		if ($query->have_posts()) : 
		?>
		<!-- items list -->
		<ul class="items-list">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
			
			<!-- item -->
			<li class="zoom">
				<a href="<?php the_permalink(); ?>"><?php js_post_thumbnail(); ?></a>
				<h4><a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'js') ?>"><?php the_title(); ?></a></h4>
				<p><?php excerpt(10); ?></p>
			</li>
			<!-- item -->
			
		<?php endwhile; ?>
		</ul>
		<!-- end items-list -->
		<?php endif; ?>
    </div>
    <!-- end block-4 -->

</div>
</div>
<!-- end portfolio footer blocks -->

<?php get_footer(); ?>