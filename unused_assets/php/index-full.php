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
	
		<a id="logo" href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/johnsardine-logo.png" alt="JohnSardine" title="JohnSardine Portfolio" height="110" width="110" /></a>
		
		<nav id="navigation">
		<?php js_get_menu('primary-menu', 'menu'); ?>
		</nav>
			
	<div class="clear"></div>
	</div>
	
</header>
<!-- end header -->

<div class="clear"></div>

<div id="welcome" class="inside cf">
	<img class="alignleft" src="<?php bloginfo('template_directory'); ?>/images/joao-sardinha.jpg" alt=""/>
	<h2 class="spacing">Hey, I’m João, a front-end and WordPress developer based in Portugal.</h2>
	<p>I create custom WordPress themes that suit your specific needs, whether is a <strong>blog/website/shop</strong>,  a project with custom features or if you just need your design coded into beautiful and valid HTML/CSS, i´ve got you covered.<br/>Besides that, i also design websites, logos, create email newsletters, custom facebook pages and make a great chocolate cake.</p>
	<p>You can tweet me <a href="http://twitter.com/johnsardine" title="">@JohnSardine</a>.</p>
	<a href="#" title="" class="button space">View My Work</a> <a href="#" title="" class="button neutral">Contact-me</a>
</div>

<!-- Home - Portfolio Items -->
<section id="home-portfolio-items" class="stripes">
	
	<div class="inside">
	
	<h3>Latest Work</h3>	
	
		<!-- items list -->
		<ul class="items-list zoom">
			<!-- image -->
			<li>
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/1.jpg" alt=""/></a>
				<h4><a href="#" title="">NYC Owl</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/2.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/3.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/4.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
	<div class="clear"></div>
	</div>
</section>
<!-- end Home - Portfolio Items -->

<section id="end-zone" class="inside">
	
	<div class="block-2">
	<h3 class="small"><a href="#" title="">From Blog</a></h3>
	<hr/>

		<!-- items list -->
		<ul class="items-list">
			<!-- image -->
			<li>
				<h4><a href="#" title="">NYC Owl</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
				<a href="#" title="" class="more">Read More</a>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
				<a href="#" title="" class="more">Read More</a>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->

	</div>
	<div class="block-1">
	<h3 class="small"><a href="#" title="">Twitter</a></h3>
	<hr/>
	
		<!-- items list -->
		<ul class="items-list">
			<!-- image -->
			<li>
				<p><a href="#" title="">@Lorem ipsum</a> dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa… <a href="#" title="">#</a></p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<p><a href="#" title="">@Lorem ipsum</a> dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa… <a href="#" title="">#</a></p>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
	
	</div>
	<div class="block-1 last">
	<h3 class="small"><a href="#" title="">Downloads</a></h3>
	<hr/>
		<!-- items list -->
		<ul class="items-list align-title zoom">
			<!-- image -->
			<li>
				<a href="#" title="" class="alignleft"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/5.jpg" alt="" title="" height="" width=""/></a>
				<h4><a href="#" title="">Night Sky</a></h4>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<a href="#" title="" class="alignleft"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/8.jpg" alt="" title="" height="" width=""/></a>
				<h4><a href="#" title="">Skylight</a></h4>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
	</div>
	
<div class="clear"></div>
</section>

<div class="clear"></div>
<!-- BEGIN SECTION WITH SIDEBAR -->

<h1 class="page-title">
	<span>Portfolio</span>
</h1>

<div class="inside content right">
	<section class="main">
		<!-- items list -->
		<ul id="portfolio-holder" class="items-list margin-adjust">
			<!-- image -->
			<li data-id="id-1" data-type="web" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/1.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/1.jpg" alt=""/></a>
				<h4><a href="#" title="">NYC Owl</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-2" data-type="illustration" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/2.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/2.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-3" data-type="photography" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/3.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/3.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-4" data-type="illustration" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/4.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/4.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-5" data-type="illustration" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/8.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/8.jpg" alt=""/></a>
				<h4><a href="#" title="">Bokeh</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-6" data-type="web illustration" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/11.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/11.jpg" alt=""/></a>
				<h4><a href="#" title="">Clouds</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-7" data-type="web" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/12.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/12.jpg" alt=""/></a>
				<h4><a href="#" title="">Clouds</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li data-id="id-8" data-type="web" class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/7.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/7.jpg" alt=""/></a>
				<h4><a href="#" title="">Clouds</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
		
	</section>
	
	<section class="sidebar">
		<h3>Sidebar</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
		<ul id="portfolio-filter" class="vert-menu">
			<li class="current"><a href="#" title="" data-type="all">All</a></li>
			<li><a href="#" title="" data-type="web">Web</a></li>
			<li><a href="#" title="" data-type="illustration">Illustration</a></li>
			<li><a href="#" title="" data-type="photography">Photography</a></li>
		</ul>
	</section>
</div>
<!-- end inside content right -->

	<div class="inside">
		<div class="block-4">
			<h3>Latest Thoughts</h3>
			<hr/>
			<!-- items list -->
			<ul class="items-list">
				<!-- image -->
				<li class="zoom">
					<h4><a href="#" title="">NYC Owl</a></h4>
					<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
					<a href="#" title="" class="more">Read More</a>
				</li>
				<!-- image -->
				
				<!-- image -->
				<li class="zoom">
					<h4><a href="#" title="">Simple Little Table Download</a></h4>
					<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
					<a href="#" title="" class="more">Read More</a>
				</li>
				<!-- image -->
				
				<!-- image -->
				<li class="zoom">
					<h4><a href="#" title="">Coming Soon Page Download</a></h4>
					<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
					<a href="#" title="" class="more">Read More</a>
				</li>
				<!-- image -->
				
				<!-- image -->
				<li class="zoom">
					<h4><a href="#" title="">Simple Little Calendar Download</a></h4>
					<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
					<a href="#" title="" class="more">Read More</a>
				</li>
				<!-- image -->
			</ul>
			<!-- end items-list -->
			
		</div>
	</div>
	<!-- end portfolio footer blocks -->

<!-- BEGIN SECTION WITH SIDEBAR -->
<div class="clear"></div>

<!-- PORTFOLIO -  INDIVIDUAL ITEM -->
<!-- PORTFOLIO -  INDIVIDUAL ITEM -->

<h1 class="page-title">
	<span>Portfolio</span>
</h1>

<section id="individual-item" class="inside">

	<div id="item-gallery">
		<div class="slides_container">
			<img src="<?php bloginfo('template_directory'); ?>/images/big/3.jpg" height="345" width="560" alt="Image">
			<img src="<?php bloginfo('template_directory'); ?>/images/big/2.jpg" height="747" width="560" alt="Image">
			<img src="<?php bloginfo('template_directory'); ?>/images/big/4.jpg" height="345" width="560" alt="Image">
			<img src="http://placehold.it/900" alt=""/>
			<img src="<?php bloginfo('template_directory'); ?>/images/big/iphone4.png" height="744" width="560" alt="Image">
		</div>
	</div>
	
	<div id="item-info">
		<h2>Titulo</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<a href="#" title="">View Website <span class="symb">&rarr;</span></a>
		<ul class="pagination thumbs zoom">
			<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/3.jpg" width="50" alt="thumb"></a></li>
			<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/2.jpg" width="50" alt="thumb"></a></li>
			<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/4.jpg" width="50" alt="thumb"></a></li>
			<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/4.jpg" width="50" alt="thumb"></a></li>
			<li><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/iphone4.png" width="50" alt="thumb"></a></li>
		</ul>
		
		<ul class="skills">
			<li>Design<span></span></li>
			<li>HTML/CSS<span></span></li>
			<li>Wordpress</li>
		</ul>
		
		<a href="#" title="" class=""><span class="symb">&larr;</span> Back to portfolio</a>
		
	</div>
	
	<div class="clear"></div>

</section>

	<div class="inside">
		<h3>Latest Work</h3>
		<hr/>

		<!-- items list -->
		<ul class="items-list">
			<!-- image -->
			<li class="zoom">
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/1.jpg" alt=""/></a>
				<h4><a href="#" title="">NYC Owl</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/2.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/3.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/4.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
				<p>Lorem ipsum dolor sit amet, penatibus adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa…</p>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
		
	<div class="clear"></div>
	</div>

<!-- PORTFOLIO -  INDIVIDUAL ITEM -->
<!-- PORTFOLIO -  INDIVIDUAL ITEM -->

<div class="clear"></div>

<!-- DOWNLOADS -->
<!-- DOWNLOADS -->

<h1 class="page-title">
	<span>Free Stuff</span>
</h1>

<div class="inside content right">
	<section class="main">
		<!-- items list -->
		<ul class="items-list margin-adjust zoom">
			<!-- image -->
			<li class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/1.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/1.jpg" alt=""/></a>
				<h4><a href="#" title="">NYC Owl</a></h4>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/2.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/2.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/3.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/3.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/4.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/4.jpg" alt=""/></a>
				<h4><a href="#" title="">Title</a></h4>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li class="zoom">
				<a href="<?php bloginfo('template_directory'); ?>/images/big/8.jpg" class="fancybox" title="" rel="gallery"><img src="<?php bloginfo('template_directory'); ?>/images/pic/8.jpg" alt=""/></a>
				<h4><a href="#" title="">Bokeh</a></h4>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
		
	</section>
	
	<section class="sidebar">
		<h3>What's This?</h3>
		<p>In this area you can download a couple of free stuff i've coded and made available to everyone.</p>
		<p><small>If the design was created by <a href="#" title="">someone</a> it will be mentioned in the demo page.</small></p>
	</section>
</div>
<!-- end inside content right -->

<!-- DOWNLOADS -->
<!-- DOWNLOADS -->

<div class="clear"></div>

<h1 class="page-title">
	<span>Page</span>
</h1>

<div class="inside content right">
	<section class="main">
		<h2>Titulo</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<img src="<?php bloginfo('template_directory'); ?>/images/pic/5.jpg" class="alignleft" alt="" title="" height="" width="" />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<a href="#" title="" class="alignright"><img src="<?php bloginfo('template_directory'); ?>/images/pic/9.jpg" alt="" title="" height="" width="" /></a>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<img src="<?php bloginfo('template_directory'); ?>/images/big/11.jpg" class="alignleft" alt="" title="" height="" width="" />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
 	   <form action="#" class="cf">
 	     <fieldset>
 	     	<legend>Form</legend>
 	
 			<label for="form-name">Your Name</label><br/>
 			<input id="form-name" type="text" />
 			
 			<p class="attention">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <a href="#" title="">lorem</a> cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 			
 			<p class="valid">Lorem ipsum dolor sit amet, <a href="#" title="">consectetur</a> adipisicing elit</p>
 			<p class="attention">Lorem <a href="#" title="">ipsum dolor</a> sit amet, consectetur adipisicing elit</p>
 			<p class="error">Lorem <a href="#" title="">ipsum dolor</a> sit amet, consectetur adipisicing elit</p>
 			
 			<div class="clear"></div>
 			
 			<p>
 			<label for="form-email">Your Email</label><br/>
 			<input id="form-email" type="email" />
 			<span class="form-desc">eg. example@domain.com</span>
 			</p>
 			
 			<p>
 			<label for="form-tel">Your Telephone Number</label><br/>
 			<input id="form-tel" type="tel" />
 			<span class="form-desc">eg. +342 234 456</span>
 			</p>
 			
 			<p>
 			<label for="form-url">Your Website</label><br/>
 			<input id="form-url" type="url" />
 			</p>
 			
 			<p>
 			<label for="form-password">Choose Your Password</label><br/>
 			<input id="form-password" type="password" />
 			</p>
 			
 			<p>
 			<label for="form-password-confirm">Confirm Your Password</label><br/>
 			<input id="form-password-confirm" type="password" />
 			</p>
 	
 			<p>
 			<label for="form-textarea">Your Comment</label><br/>
 			<textarea id="form-textarea"></textarea>
 			</p>
 			
 			<input type="submit" class="full neutral" value="Submit"> 			
 	     </fieldset>
 	   </form>
    
		<img src="<?php bloginfo('template_directory'); ?>/images/thumb/5.jpg" class="alignright" alt="" title="" height="" width="" />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</section>
	
	<section class="sidebar">
		<h3>Sidebar</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
		<ul class="vert-menu">
			<li><a href="#" title="">All</a></li>
			<li><a href="#" title="">Web</a></li>
			<li class="current"><a href="#" title="">Illustration</a></li>
			<li><a href="#" title="">Photography</a></li>
		</ul>
	</section>

<div class="clear"></div>
</div>

<h1 class="page-title">
	<span>Full Page</span>
</h1>

<div class="inside content full">
	<section class="main">
		<h2>Titulo</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<img src="<?php bloginfo('template_directory'); ?>/images/pic/5.jpg" class="alignleft" alt="" title="" height="" width="" />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<a href="#" title="" class="alignright"><img src="<?php bloginfo('template_directory'); ?>/images/pic/9.jpg" alt="" title="" height="" width="" /></a>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<img src="<?php bloginfo('template_directory'); ?>/images/big/11.jpg" class="alignleft" alt="" title="" height="" width="" />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<div style="width: 534px" class="wp-caption alignnone" id="attachment_1369"><img width="524" height="203" alt="" src="http://johnsardine.com/wp-content/uploads/2011/01/johnsardine-novo-1.png" title="johnsardine-novo-1" class="size-full wp-image-1369  "><p class="wp-caption-text">Cabeçalho (Menu com categorias e sub-categorias)</p></div>
		<img src="<?php bloginfo('template_directory'); ?>/images/thumb/5.jpg" class="alignright" alt="" title="" height="" width="" />
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</section>
	
	<section class="sidebar">
		<h3>Sidebar</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
		<ul class="vert-menu">
			<li><a href="#" title="">All</a></li>
			<li><a href="#" title="">Web</a></li>
			<li class="current"><a href="#" title="">Illustration</a></li>
			<li><a href="#" title="">Photography</a></li>
		</ul>
	</section>

<div class="clear"></div>
</div>


<h1 class="page-title">
	<span>Blog</span>
</h1>

<div class="inside content left">
	<section class="main blog">
		
		<article>
			<header>
			<h2 class="title"><a href="#" title="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</a></h2>
			
			<section class="meta">
				<p>Posted by <a href="#" title="">Admin</a><br/>
				on <a href="#" title="">May 22nd</a><br/>
				in <a href="#" title="">Blog</a></p>

				<p><a href="#" title="">Post a Comment</a></p>
			</section>
			<!-- end aside.meta -->
			
			</header>
			<!-- end article header -->
			
			<div class="post">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <strong>veniam, quis nostrud exercitation ullamco</strong> laboris nisi ut aliquip ex ea <a href="#" title="">commodo</a> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<img src="<?php bloginfo('template_directory'); ?>/images/blog-img.jpg" alt="" title="" height="" width="" />
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis <em>nostrud exercitation</em> ullamco laboris nisi ut aliquip ex ea <u>commodo</u> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<blockquote>
					<p>I am not one who was born in the possession of knowledge; I am one who is fond of antiquity, and earnest in seeking it there.</p>
				</blockquote>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<p><cite><a href="/">Confucius, The Confucian Analects</a></cite>,  (551 BC - 479 BC)</p>
				<img src="<?php bloginfo('template_directory'); ?>/images/pic/5.jpg" class="alignright" alt="" title="" height="" width="" />
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<ol>
					<li>Unus</li>
					<li>Duo</li>
					<li>Tres</li>
					<li>Quattuor</li>
				</ol>
				
				<h3>Codez</h3>
<pre><code>#projects{
	padding: 0;
	margin: 0;
	margin-left: -30px;
	color: #575757;
}
#projects li{
	margin: 0;
	list-style: none;
	width: 200px;
	display: inline-block;
	margin-left: 30px;
}
#projects img{
	padding: 3px;
	background: #fff;
	border: 1px solid #adadad;
	
	-webkit-box-shadow: 0 0 3px rgba(0,0,0,0.25);
	   -moz-box-shadow: 0 0 3px rgba(0,0,0,0.25);
			box-shadow: 0 0 3px rgba(0,0,0,0.25);
}
#projects a:hover img{
	border-radius: 2px;
}

#projects span{
	display: block;
	text-align: center;
	font-weight: bold;
}
</code></pre>

<p>Now you add something and something…</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

<pre><code>#projects a{
	display: inline-block;
	position: relative;
	text-decoration: none;
	color: #575757;
}
#projects a:before{
	opacity: 0;
			
	position: absolute;
	border: 3px solid #33bae5;
	margin-left: 1px;
	margin-top: 1px;
	border-radius: 2px;
	content: '';
	display: block;
	height: 145px;
	width: 200px;
	
	-webkit-box-shadow:inset 0 0 6px rgba(0,0,0,0.9), 0px 0px 0px 1px #2da0c5, inset 0px 0px 100px 100px rgba(0,0,0,0.1), 0 0 2px rgba(0,0,0,0.25);
	   -moz-box-shadow:inset 0 0 6px rgba(0,0,0,0.9), 0px 0px 0px 1px #2da0c5, inset 0px 0px 100px 100px rgba(0,0,0,0.1), 0 0 2px rgba(0,0,0,0.25);
			box-shadow:inset 0 0 6px rgba(0,0,0,0.9), 0px 0px 0px 1px #2da0c5, inset 0px 0px 100px 100px rgba(0,0,0,0.1), 0 0 2px rgba(0,0,0,0.25);


	-webkit-transition: opacity .3s ease-in-out;
 	   -moz-transition: opacity .3s ease-in-out;
			transition: opacity .3s ease-in-out;
}
#projects a:hover:before{
	opacity: 1;
}
#projects a:after{
	opacity: 0;
	font-weight: bold;
	position: absolute;
	top: 65px;
	left: 27%;
	display: block;
	content: 'View Project';
	color: #fff;
	background: rgba(0,0,0,0.7);
	padding: 6px 12px;
	border-radius: 15px;
	
	-webkit-transition: opacity .3s ease-in-out;
 	   -moz-transition: opacity .3s ease-in-out;
			transition: opacity .3s ease-in-out;
}
#projects a:hover:after{
	opacity: 1;
}
</code></pre>

				<dl>
				<dt>Definition list</dt>
				<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
      aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
      commodo consequat.</dd>
				<dt>Lorem ipsum dolor sit amet</dt>
				<dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
      aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
      commodo consequat.</dd>
				</dl>
	
				<table summary="Jimi Hendrix albums">
				<caption>Jimi Hendrix - albums</caption>
				<thead>
				<tr>
				<th>Album</th>
				<th>Year</th>
				<th>Price</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
				<td>Album</td>
				<td>Year</td>
				<td>Price</td>
				</tr>
				</tfoot>
				<tbody>
				<tr>
				<td>Are You Experienced </td>
				<td>1967</td>
				<td>$10.00</td>
				</tr>
				<tr>
				<td>Axis: Bold as Love</td>
				<td>1967</td>
				<td>$12.00</td>
				</tr>
				<tr>
				<td>Electric Ladyland</td>
				<td>1968</td>
				<td>$10.00</td>
				</tr>
				<tr>
				<td>Band of Gypsys</td>
				<td>1970</td>
				<td>$12.00</td>
				</tr>
				<tr>
				<td>Axis: Bold as Love</td>
				<td>1967</td>
				<td>$12.00</td>
				</tr>
				</tbody>
				</table>
      
    <form action="#">
      <fieldset>
      	<legend>Form</legend>

		<label for="form-name">Your Name</label><br/>
		<input id="form-name" type="text" />
		
		<p class="attention">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat <a href="#" title="">lorem</a> cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
		<p class="valid">Lorem ipsum dolor sit amet, <a href="#" title="">consectetur</a> adipisicing elit</p>
		<p class="attention">Lorem <a href="#" title="">ipsum dolor</a> sit amet, consectetur adipisicing elit</p>
		<p class="error">Lorem <a href="#" title="">ipsum dolor</a> sit amet, consectetur adipisicing elit</p>
		
		<div class="clear"></div>
		
		<p>
		<label for="form-email">Your Email</label><br/>
		<input id="form-email" type="email" />
		</p>
		
		<p>
		<label for="form-tel">Your Telephone Number</label><br/>
		<input id="form-tel" type="tel" />
		
		<p>
		<label for="form-url">Your Website</label><br/>
		<input id="form-url" type="url" />
		</p>
		
		<p>
		<label for="form-password">Choose Your Password</label><br/>
		<input id="form-password" type="password" />
		</p>
		
		<p>
		<label for="form-password-confirm">Confirm Your Password</label><br/>
		<input id="form-password-confirm" type="password" />
		</p>

		<p>
		<label for="form-textarea">Your Comment</label><br/>
		<textarea id="form-textarea"></textarea>
		</p>
		
		<a href="#" title="" class="button full neutral">Go Now</a>
		
      </fieldset>
      
      <div class="cf">
      	<a href="#" title="" class="button half">Demo</a>
      	<a href="#" title="" class="button half">Download</a>
      </div>
      
    </form>
    
    	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    	
		<h3>Download This Awesome File</h3>
    	<a href="#" title=""><img src="<?php bloginfo('template_directory'); ?>/images/pic/5.jpg" alt="" class="alignright"/></a>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		
			<div class="box attention alignleft half pull-left">
				<h4>Download Now</h4>
				<img src="<?php bloginfo('template_directory'); ?>/images/thumb/1.jpg" class="alignleft" alt="" title="" height="" width="" />
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<a href="#" title="" class="button">Download Thumbnail Hover Style</a>
			</div>
		
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>			
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		</div>
		<!-- end .post -->
		<div class="clear"></div>
		</article>
		<!-- end article -->
				
		<div class="post-navigation">
			<hr class="stripes"/>
			<a href="#" title="" class="button">&laquo; previous post</a>
			<a href="#" title="" class="button alignright">next post &raquo;</a>
		</div>
		
		<div id="comments">
		
			<header>
				<hr/>
				<h3>3 Comments on Spaceship Crashes in Middle Air and a Small Dog Dies Killed by Batman</h3>
			</header>
			
			<ul>

				<!-- comment -->
				<li>
					<div class="comment-content">
						<h4>Title</h4>
						<small><a href="#" title="">28th May 2011</a> | <a href="#" title="">reply</a></small>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<!-- comment-content -->
					<div class="comment-thumb">
						<img src="<?php bloginfo('template_directory'); ?>/images/thumb/1.jpg" alt="" title="" height="50" width="50" class="alignright"/>
					</div>
					<!-- end .comment-thumb -->		
					
					<ul>
					
						<!-- 2nd level comment -->
						<li>
							<div class="comment-content">
								<h4>Title</h4>
								<small><a href="#" title="">28th May 2011</a> | <a href="#" title="">reply</a></small>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>
							<!-- comment-content -->
							<div class="comment-thumb">
								<img src="<?php bloginfo('template_directory'); ?>/images/thumb/3.jpg" alt="" title="" height="50" width="50" class="alignright"/>
							</div>
							
							<ul>
							
								<!-- 3rd level comment -->
								<li>
									<div class="comment-content">
										<h4>Title</h4>
										<small><a href="#" title="">28th May 2011</a> | <a href="#" title="">reply</a></small>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>
									<!-- comment-content -->
									<div class="comment-thumb">
										<img src="<?php bloginfo('template_directory'); ?>/images/thumb/4.jpg" alt="" title="" height="50" width="50" class="alignright"/>
									</div>
									<!-- end .comment-thumb -->
									
								</li>
								<!-- 3rd level comment -->
								
								<!-- 3th level comment -->
								<li>
									<div class="comment-content">
										<h4><a href="#" title="">Title</a></h4>
										<small><a href="#" title="">28th May 2011</a> | <a href="#" title="">reply</a></small>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										
									</div>
									<!-- comment-content -->
									<div class="comment-thumb">
										<img src="<?php bloginfo('template_directory'); ?>/images/thumb/7.jpg" alt="" title="" height="50" width="50" class="alignright"/>
									</div>
									<!-- end .comment-thumb -->
								
								</li>
								<!-- 3th level comment -->
								
							</ul>
							
							<!-- end .comment-thumb -->
						</li>
						<!-- 2nd level comment -->
						
					</ul>
				</li>
				<!-- comment -->
				
				<!-- comment -->
				<li>
					<div class="comment-content">
						<h4>Title</h4>
						<small><a href="#" title="">28th May 2011</a> | <a href="#" title="">reply</a></small>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>
					<!-- comment-content -->
					<div class="comment-thumb">
						<img src="<?php bloginfo('template_directory'); ?>/images/thumb/2.jpg" alt="" title="" height="50" width="50" class="alignright"/>
					</div>
					<!-- end .comment-thumb -->			
				</li>
				<!-- comment -->
				
			</ul>
			
		</div>
		<!-- end #comments -->
		
		<!-- comment form -->
		<div id="respond">
		<div class="clear"></div>
		
		<form class="form fluid" action="">
			
			<h3>Comment</h3>
				<p class="caption">Small Text</p>
			<hr/>
			
			<div class="form-fix">

				<div class="input-container cf">
					<input class="third" type="text" tabindex="1" placeholder="Your Name" />
					<input class="third" type="text" tabindex="2" placeholder="Your Email" />
					<input class="third" type="text" tabindex="3" placeholder="Your Website" />
				</div>
					
				<div class="input-container cf">
					<textarea rows="6" placeholder="Your Comment" tabindex="4"></textarea>
				</div>
			
			</div>
			
				
			<input type="submit" value="Send" tabindex="5" class="button alignright" />
					
			<p class="attention fluid fade">Your comment has been sent. Thank you.</p>
			
		</form>
		
		</div>
		<!-- comment form -->
		
	</section>

	<section class="sidebar">
<ul class="wp_sidebar">
	<li><div class="widget widget_search" id="search-5"><h3 class="widgettitle">Text Widget</h3>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div></li>
	<li>
	<div class="widget widget_thumbs">
		<h3>Downloads</h3>
		<!-- items list -->
		<ul class="items-list align-title zoom">
			<!-- image -->
			<li>
				<a href="#" title="" class="alignleft"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/5.jpg" alt="" title="" height="" width=""/></a>
				<h4><a href="#" title="">Night Sky</a></h4>
			</li>
			<!-- image -->
			
			<!-- image -->
			<li>
				<a href="#" title="" class="alignleft"><img src="<?php bloginfo('template_directory'); ?>/images/thumb/8.jpg" alt="" title="" height="" width=""/></a>
				<h4><a href="#" title="">Skylight</a></h4>
			</li>
			<!-- image -->
		</ul>
		<!-- end items-list -->
	</div>
	</li>
	<li><div class="widget widget_search" id="search-5"><h3 class="widgettitle">Procurar</h3>			<form action="http://johnsardine.com/" id="searchform" method="get"><p>
			<input type="text" placeholder="Search" size="20" id="s" name="s" value="Procura...">
			<input type="submit" class="search" value="»" id="search_submit"></p>
			</form></div></li><li><div class="widget widget_text" id="text-3"><h3 class="widgettitle">Downloads</h3>			<div class="textwidget"><a title="Coming Soon Page CSS3 Download" href="http://johnsardine.com/download/dl-html-css/coming-soon-page-in-css3/"><img src="http://johnsardine.com/wp-content/uploads/2011/05/sidebar-coming-soon-page.png" alt="Coming Soon Page CSS3 Download" style="background-color: rgb(51, 51, 51);"></a>

<a title="Pretty Little Calendar CSS3 Download" href="http://johnsardine.com/download/dl-html-css/pretty-little-calendar-css3/"><img src="http://johnsardine.com/wp-content/uploads/2011/04/sidebar-calendar.png" alt="Pretty Little Calendar CSS3 Download" style="background-color: rgb(51, 51, 51);"></a>

<a title="Dark Button Navigation Download" href="http://johnsardine.com/download/dl-html-css/dark-button-navigation-css3-download/"><img src="http://johnsardine.com/wp-content/uploads/2011/01/sidebar-dark-navigation.png" alt="Dark Button Navigation Download" style="background-color: rgb(51, 51, 51);"></a>

<a title="Simple Little Table Download" href="http://johnsardine.com/download/dl-html-css/simple-little-tab/"><img src="http://johnsardine.com/wp-content/uploads/2011/01/sidebar-simple-table.png" alt="Simple Little Table Download" style="background-color: rgb(51, 51, 51);"></a></div>
		</div></li>		<li><div class="widget widget_recent_entries" id="recent-posts-3">		<h3 class="widgettitle">Artigos recentes</h3>		<ul>
				<li><a title="Jobboard Mobile" href="http://johnsardine.com/portfolio/web/jobboard-mobile/">Jobboard Mobile</a></li>
				<li><a title="Coming Soon Page in CSS3" href="http://johnsardine.com/download/dl-html-css/coming-soon-page-in-css3/">Coming Soon Page in CSS3</a></li>
				<li><a title="Pretty Little Calendar CSS3" href="http://johnsardine.com/download/dl-html-css/pretty-little-calendar-css3/">Pretty Little Calendar CSS3</a></li>
				<li><a title="Mês da Juventude Évora 2011" href="http://johnsardine.com/portfolio/cartaz/mes-da-juventude-evora-2011/">Mês da Juventude Évora 2011</a></li>
				<li><a title="Dark Button Navigation CSS3 Download" href="http://johnsardine.com/download/dl-html-css/dark-button-navigation-css3-download/">Dark Button Navigation CSS3 Download</a></li>
				</ul>
		</div></li><li><div class="widget widget_archive" id="archives-2"><h3 class="widgettitle">Arquivo</h3>		<ul>
			<li><a title="Maio 2011" href="http://johnsardine.com/2011/05/">Maio 2011</a>&nbsp;(2)</li>
	<li><a title="Abril 2011" href="http://johnsardine.com/2011/04/">Abril 2011</a>&nbsp;(1)</li>
	<li><a title="Março 2011" href="http://johnsardine.com/2011/03/">Março 2011</a>&nbsp;(1)</li>
	<li><a title="Janeiro 2011" href="http://johnsardine.com/2011/01/">Janeiro 2011</a>&nbsp;(4)</li>
	<li><a title="Dezembro 2010" href="http://johnsardine.com/2010/12/">Dezembro 2010</a>&nbsp;(3)</li>
	<li><a title="Novembro 2010" href="http://johnsardine.com/2010/11/">Novembro 2010</a>&nbsp;(3)</li>
	<li><a title="Setembro 2010" href="http://johnsardine.com/2010/09/">Setembro 2010</a>&nbsp;(2)</li>
	<li><a title="Agosto 2010" href="http://johnsardine.com/2010/08/">Agosto 2010</a>&nbsp;(2)</li>
	<li><a title="Julho 2010" href="http://johnsardine.com/2010/07/">Julho 2010</a>&nbsp;(1)</li>
	<li><a title="Maio 2010" href="http://johnsardine.com/2010/05/">Maio 2010</a>&nbsp;(2)</li>
	<li><a title="Abril 2010" href="http://johnsardine.com/2010/04/">Abril 2010</a>&nbsp;(4)</li>
	<li><a title="Março 2010" href="http://johnsardine.com/2010/03/">Março 2010</a>&nbsp;(4)</li>
	<li><a title="Fevereiro 2010" href="http://johnsardine.com/2010/02/">Fevereiro 2010</a>&nbsp;(3)</li>
	<li><a title="Janeiro 2010" href="http://johnsardine.com/2010/01/">Janeiro 2010</a>&nbsp;(3)</li>
		</ul>
</div></li>	</ul>
			
	</section>
	
</div>


<div class="clear"></div>

<footer id="footer">
	<p class="inside">
	
	© Copyright <a href="#" title="">JohnSardine</a> 2011
	
	<span>Theme By Johnsardine</span>
	
	</p>
	<span></span>
</footer>

	<p id="jquery-test" class="info">jQuery is not loaded (http://localhost/ needed)</p>
	
	<!-- wp_footer -->
	<?php wp_footer(); ?>
	<!-- wp_footer -->
	
</body>
</html>