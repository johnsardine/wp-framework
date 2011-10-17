<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="welcome" class="inside cf">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php if (get_the_content()) { ?>
			<?php the_content(); ?>
		<?php } else { ?>
			<h2 class="textcenter">What Have You Doneeeee????!!!!!</h2>
			<p class="textcenter">Don't worry, i'm joking, what happens is that the content of the page you selected as homepage is empty,<br/> write something about you, insert an image and a couple hyperlinks and should be good.</p>
		<?php } ?>

	<?php endwhile; endif; ?>

</div>

<!-- Home - Portfolio Items -->
<section id="home-portfolio-items" class="stripes">
	
	<div class="inside">
	
	<h3>Latest Work</h3>
	
		<?php
		//begin query
		$query = new WP_Query(); $query->query('post_type=js_portfolio&posts_per_page=4&orderby=rand');
		if ($query->have_posts()) : 
		?>
		<!-- items list -->
		<ul class="items-list">
		<?php while ($query->have_posts()) : $query->the_post(); ?>			
			<!-- item -->
			<li class="zoom">
				<a href="<?php the_permalink(); ?>" title="<?php _e('View '); ?><?php the_title(); ?>"><?php js_post_thumbnail('thumbnail'); ?></a>
				<h4><a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'js') ?>"><?php the_title(); ?></a></h4>
				<p><?php excerpt(18); ?></p>
			</li>
			<!-- item -->
		<?php endwhile; ?>
		</ul>
		<!-- end items-list -->
		<?php else : ?>
		<p>Currently you have 0 portfolio items, add them in <a href="<?php echo home_url( '/' ); ?>wp-admin/post-new.php?post_type=js_portfolio" title="">here</a> and after that, beautiful thumbnails will fly to this area.</p>
		<?php endif; ?>
	<div class="clear"></div>
	</div>
</section>
<!-- end Home - Portfolio Items -->

	<?php get_template_part('footer', 'widgets') ?>

<?php get_footer(); ?>