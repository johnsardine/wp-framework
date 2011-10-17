<?php get_header(); ?>

<div class="inside content
	<?php
		if (is_page_template('template-page-right.php')) {
			echo 'right';
		} elseif (is_page_template('template-page-full.php')) {
			echo 'full';
		} else {
			echo 'left';
		}
		?>">
	<section class="main page">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<header>
		<h2 class="title"><?php the_title(); ?></h2>
	</header>
	
	<article> 
	
		<?php the_content(); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Page:', 'js' ), 'after' => '</div>' ) ); ?>
	
	</article>
	<!-- end page content -->

	<?php endwhile; ?>

	<?php else : ?>

		<?php js_404_page(); ?>

	<?php endif; ?>
		
	</section>
	<!-- end .main .blog -->
	
	<?php if (!is_page_template('template-page-full.php')) { ?>
	
	<?php get_sidebar(); ?>
	
	<?php } ?>
	
</div>

	<?php get_template_part('footer', 'widgets') ?>

<?php get_footer(); ?>