<!doctype html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
	<!-- create better function for various pages -->

	<meta name="description" content="<?php bloginfo('description'); ?>">
	<link type="text/plain" rel="author" href="<?php echo get_template_directory_uri() ?>/humans.txt">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!-- wp_head -->
	<?php wp_head(); ?>
	<!-- wp_head -->

</head>
<body <?php body_class('custom-class another'); ?>>

<!-- wrapper -->
<div class="inside">

	<!-- header -->
	<header id="header">
	
		<a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php js_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
		
		<nav id="navigation">
			<?php js_get_menu('primary-menu', 'pages'); ?>
		</nav>
	
	</header>
	<!-- header -->
	
	<!-- main -->
	<div id="main" class="layout-left">
	
		<!-- content -->
		<section id="content" class="main full">
		
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class('custom-class'); ?>>
	
		<h2 class="alpha colorfix"><a href="<?php the_permalink(); ?>" title="View <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		
		<?php the_content(); ?>
				
	</article>
	<hr/>

<?php endwhile; ?>

	<div class="post-navigation cf">
	    <span class="btn"><?php previous_posts_link(); ?></span>
	    <span class="btn alignright"><?php next_posts_link(); ?></span>
	</div>

<?php else : ?>

	<?php js_404_page(); ?>

<?php endif; ?>
				
		</section>
		<!-- content -->
		
		<!-- sidebar -->
		<aside class="sidebar right">
			<?php get_sidebar(); ?>
		</aside>
		<!-- sidebar -->

	</div>
	<!-- main -->
	
	<!-- footer -->
	<footer id="footer" class="footer">
		<?php if (js_get_option('footer_left')) { ?>
			<?php echo js_get_option('footer_left'); ?>
		<?php } else { ?>
			Copyright <a href="<?php home_url('/'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> <?php echo '&copy; '; $copyYear = 2010; $curYear = date('Y'); echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '') ?>
		<?php } ?>
	</footer>
	<!-- footer -->
	
</div>
<!-- wrapper -->

<p id="jquery-test" class="info">jQuery is not loaded (http://localhost/ needed)</p>

	<!-- wp_footer -->
	<?php wp_footer(); ?>
	<!-- wp_footer -->

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->

</body>
</html>