<?php if (is_category_or_sub(js_get_option('special_cat'))) { ?>

	<?php get_template_part('block', 'category') ?>

<?php } else { ?>

	<?php get_header(); ?>
	
	<h1 class="page-title">
		<span><?php single_cat_title(); ?></span>
	</h1>
	
	<div class="inside content left">
		<section class="main blog">
		
		<?php
		//count post number on page
		$count = 0;
		$ppp = get_query_var('posts_per_page'); //posts per page
		?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<?php $count++; ?>
			
			<article <?php post_class(); ?>>
				<?php if ($count > 1) echo '<hr class="stripes"/>'; ?>
				<header>
				<h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php _e('Read', 'js'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<section class="meta">
					<p><?php _e('Posted by','js'); ?> <?php js_author(); ?><br/>
					<?php _e('on', 'js'); ?> <?php the_date('j \d\e F \d\e Y'); ?><br/>
					<?php _e('in', 'js'); ?> <?php the_category(', '); ?></p>
					
					<?php if(comments_open()) { ?>
					<p><a href="<?php the_permalink(); ?>#respond" title=""><?php _e('Post a Comment','js'); ?></a></p>
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
	
		<?php endwhile; ?>
			
				<div class="post-navigation cf">
				    <hr class="stripes"/>
					<span class="button"><?php previous_posts_link(); ?></span>
					<span class="button alignright"><?php next_posts_link(); ?></span>
				</div>
	
		<?php else : ?>
	
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php js_404_page(); ?>
			</div>
	
		<?php endif; ?>
			
		</section>
		<!-- end .main .blog -->
	
		<?php get_sidebar(); ?>
		
	</div>
	
		<?php get_template_part('footer', 'widgets') ?>
	
	<?php get_footer(); ?>

<?php } ?>