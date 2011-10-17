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
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="johnsardine.com">
	
	<?php if (is_home() || is_front_page()) { ?>
    <meta property="og:title" content="<?php wp_title(); ?>" />
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/johnsardine-logo.png" />	
	<?php } ?>
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		
	<!-- wp_head -->
	<?php wp_head(); ?>
	<!-- wp_head -->
		
</head>
<body <?php body_class(); ?>>

<?php js_hello_bar(); ?>

<div id="top"></div>

<!-- header -->
<header id="header">
	
	<div class="inside">
	
		<a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="JohnSardine" title="JohnSardine Portfolio" height="110" width="110" /></a>
		
		<nav id="navigation">
		<?php js_get_menu('primary-menu', 'pages'); ?>
		</nav>
			
	<div class="clear"></div>
	</div>
	
</header>
<!-- end header -->

<div class="clear"></div>