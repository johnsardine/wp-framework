<?php get_header(); ?>

	<h1 class="page-title">
		<span><?php single_cat_title(); ?></span>
	</h1>

<div class="inside content right">
	<section class="main">
		<!-- items list -->
		<ul class="items-list margin-adjust">

		<?php $query = new WP_Query(); $query->query('cat='.$cat.'&nopaging=true'); ?>
		<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
		
			<!-- item -->
			<li>
				<a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'js'); ?><?php the_title(); ?>"><?php js_post_thumbnail(); ?></a>
				<h4><a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'js'); ?><?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<p><?php excerpt(10); ?></p>
			</li>
			<!-- item -->
			
			<?php endwhile; endif; ?>
			
		</ul>
		<!-- end items-list -->
		
	</section>
	
	<section class="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('special-sidebar') ) : ?>
		<h3>Sidebar</h3>
		<p>This widget area is empty. Fill it with widget awesomeness by clicking <a href="<?php home_url('/'); ?>wp-admin/widgets.php" title="">here</a> and adding widgets to "Special Cat Sidebar".</p>
		<?php endif; ?>
	</section>
</div>
<!-- end inside content right -->

	<?php get_template_part('footer', 'widgets') ?>

</div>
</div>
<!-- end portfolio footer blocks -->

<?php get_footer(); ?>