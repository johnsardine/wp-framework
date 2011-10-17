<?php get_header(); ?>

<h1 class="page-title">
	<span>	<!-- Current top-parent category name -->
	<?php
		$category = get_the_category();
		//$cat_tree = get_category_parents($category[0]->term_id, FALSE, ':', false);
		//$top_cat = split(':',$cat_tree);
		//$parent = $top_cat[0];
		//echo $parent;
		echo $category[0]->cat_name;
	?>
	<!-- Current top-parent category name --></span>
</h1>

<div class="inside content left">
	<section class="main blog">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		
		<article <?php post_class(); ?>>
			<header>
			<h2 class="title"><?php the_title(); ?></h2>
			
			<section class="meta">
				<p><?php _e('Posted by','js'); ?> <?php js_author(); ?><br/>
				<?php _e('on', 'js'); ?> <?php the_date('j \d\e F \d\e Y'); ?><br/>
				<?php _e('in', 'js'); ?> <?php the_category(', '); ?></p>

				<?php if(comments_open()) { ?>
				<p><a href="#respond" title=""><?php _e('Post a Comment','js'); ?></a></p>
				<?php } ?>
			</section>
			<!-- end section.meta -->
			
			</header>
			<!-- end article header -->
			
			<div class="post-content">
				<?php the_content(); ?>
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Page:', 'js' ), 'after' => '</div>' ) ); ?>
			</div>
			<!-- end .post -->
		<div class="clear"></div>
		</article>
		<!-- end article -->

	<?php endwhile; endif; ?>
		
			<div class="post-navigation cf">
			    <hr class="stripes"/>
				<span class="button"><?php next_post_link('%link', '&laquo; Previous in category', TRUE); ?></span>
				<span class="button alignright"><?php previous_post_link('%link', 'Previous in category &raquo;', TRUE); ?></span>
			</div>
			
			<?php comments_template(); ?>
		
	</section>
	<!-- end .main .blog -->

	<?php get_sidebar(); ?>
	
</div>

	<?php get_template_part('footer', 'widgets') ?>

<?php get_footer(); ?>