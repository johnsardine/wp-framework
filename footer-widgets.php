<div class="clear"></div>
<div class="inside widgets">
	<div class="block cf">

	<?php if (is_front_page()) { ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homepage-widgets') ) : ?>
			<div class="block-4">
			<h3 class="small">Homepage Widgets</h3>
			<hr/>
			<p>This widget area is empty. Fill it with widget awesomeness by clicking <a href="<?php home_url('/'); ?>wp-admin/widgets.php" title="">here</a> and adding widgets to "Homepage Footer".</p>
			</div>
		<?php endif; ?>
	<?php } elseif (is_page_template('template-portfolio.php')) { ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('portfolio-widgets') ) : ?>
			<div class="block-4">
			<h3 class="small">Portfolio Widgets</h3>
			<hr/>
			<p>This widget area is empty. Fill it with widget awesomeness by clicking <a href="<?php home_url('/'); ?>wp-admin/widgets.php" title="">here</a> and adding widgets to "Portfolio Footer".</p>
			</div>
		<?php endif; ?>
	<?php } else { ?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widgets') ) : ?>
			<div class="block-4">
			<h3 class="small">Footer Widgets</h3>
			<hr/>
			<p>This widget area is empty. Fill it with widget awesomeness by clicking <a href="<?php home_url('/'); ?>wp-admin/widgets.php" title="">here</a> and adding widgets to "Footer".</p>
			</div>
		<?php endif; ?>
	<?php } ?>
	</div>
</div>
<!-- end footer widgets -->