<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="page-title">
		<span><?php the_title(); ?></span>
	</h1>
<?php endwhile; endif; ?>

<div class="inside content right">
	<section class="main">
		
		<?php
		//set count
		$nr = 0;
		//begin query
		$query = new WP_Query(); $query->query('post_type=js_portfolio&posts_per_page=-1'); ?>
		<?php
		if ($query->have_posts()) : ?>
		
		<!-- items list -->
		<ul id="portfolio-holder" class="items-list margin-adjust">
		
			<?php while ($query->have_posts()) : $query->the_post();
			$skills = get_the_terms( get_the_ID(), 'js_portfolio_categories' );
			$nr++;
			?>
		
			<!-- item -->
			<li data-id="id-<?php echo $nr; ?>" data-type="<?php foreach ($skills as $skill) { echo strtolower(preg_replace('/\s+/', '-', $skill->slug)). ' '; } ?>" class="zoom">
				<?php //define if the image links to it self or the post ?>
				<?php if (get_post_meta($post->ID, $prefix . 'lightbox', true)) { ?>
				<?php //define if the lightbox image size is the large or original ?>
				<a href="<?php js_thumb_urlfull(get_post_meta($post->ID, $prefix . 'lightbox_size', true)); ?>"><?php js_post_thumbnail(); ?></a>
				<?php } else { ?>
				<a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'js'); ?><?php the_title(); ?>"><?php js_post_thumbnail(); ?></a>
				<?php } ?>
				
				<h4><a href="<?php the_permalink(); ?>" title="<?php _e('View ', 'js'); ?><?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<p><?php excerpt(10); ?></p>
			</li>
			<!-- item -->
			
			<?php endwhile; ?>
			
		</ul>
		<!-- end items-list -->
			
			<?php else :?>
			
			<h1 class="textcenter">No Portfolio Items Found.</h1>
			<p class="textcenter">You have no items in the portfolio, you can add the by clicking <a href="<?php echo home_url('/') ?>wp-admin/edit.php?post_type=js_portfolio" title="Add portfolio items">here</a> or going to the dashboard and clickind "Portfolio".</p>
			
		<?php endif; ?>
		
	</section>
	
	<section class="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("portfolio-sidebar") ) : ?>
		<h3>Sidebar</h3>
		<p>This widget area is empty. Fill it with widget awesomeness by clicking <a href="<?php home_url('/'); ?>wp-admin/widgets.php" title="">here</a> and adding widgets to "Portfolio Sidebar".</p>
		<p>Also, don't forget to add the widget "Portfolio Filter" to this sidebar.</p>
		<?php endif; ?>
	</section>
</div>
<!-- end inside content right -->

		<?php get_template_part('footer', 'widgets') ?>

<?php get_footer(); ?>