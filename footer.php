<div class="clear"></div>

<footer id="footer">
	<p class="inside">
	<?php if (js_get_option('footer_left')) { ?>
		<?php echo js_get_option('footer_left'); ?>
	<?php } else { ?>
		Copyright <a href="<?php home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> <?php echo '&copy; '; $copyYear = 2010; $curYear = date('Y'); echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '') ?>
	<?php } ?>
	
	<span>
	<?php if (js_get_option('footer_right')) { ?>
		<?php echo js_get_option('footer_right'); ?>
	<?php } else { ?>
		Theme By <a href="http://johnsardine.com/" target="_blank" title="JohnSardine">JohnSardine</a> | <a href="<?php if (js_get_option('feedburner')) {echo js_get_option('feedburner');} else { bloginfo('rss2_url'); } ?>" title="<?php bloginfo('name'); ?> RSS" target="_blank">RSS</a>
	<?php } ?>
	</span>
	
	</p>
	<span></span>
</footer>

	<p id="jquery-test" class="info">jQuery is not loaded.</p>
	
	<!-- wp_footer -->
	<?php wp_footer(); ?>
	<!-- wp_footer -->

</body>
</html>