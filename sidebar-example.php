<section class="sidebar">
<?php if (is_page() && dynamic_sidebar('page-sidebar')) : ?>
<?php elseif ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('default-sidebar') ) : ?>
<h3>Sidebar</h3>
<p>This widget area is empty. Fill it with widget awesomeness by clicking <a href="<?php home_url('/'); ?>wp-admin/widgets.php" title="">here</a> and adding widgets to "<?php if (is_page()) { echo 'Pages Sidebar'; } else { echo 'Sidebar'; } ?>".</p>
<?php endif; ?>
</section>
<!-- end .sidebar -->