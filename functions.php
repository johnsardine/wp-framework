<?php

/*-----------------------------------------------------------------------------------*/
/* Include FW Modules
/*-----------------------------------------------------------------------------------*/

/* Meta Boxes */
include_once 'includes/meta-box/meta-box.class.php';
include 'includes/meta-box.php';

/* Custom Post Types */
include_once 'includes/custom-post-type.php';

/* Admin Modifiers */
include_once 'includes/shortcodes.php';

/* Admin Modifiers */
include_once 'includes/admin-modifiers.php';

/* Custom Widgets */
include_once 'includes/widgets/display-post.php';
include_once 'includes/widgets/twitter.php';
include_once 'includes/widgets/portfolio-filter.php';
include_once 'includes/widgets/post-thumb-title.php';

/* Hello Bar */
include_once 'includes/hello-bar.php';
/* call using <?php js_hello_bar(); ?> */

/* Modal Window */
include_once 'includes/modal-window.php';
/* call using <?php js_modal_window(); ?> */

/*-----------------------------------------------------------------------------------*/
/* Define Max Image Width
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 940;

/*-----------------------------------------------------------------------------------*/
/* Remove WPHEAD Elements
/*-----------------------------------------------------------------------------------*/
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );

/*-----------------------------------------------------------------------------------*/
/* Register Scripts
/*-----------------------------------------------------------------------------------*/

function js_scripts() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, false);
		wp_register_script('modernizr', get_template_directory_uri() . '/js/libs/modernizr.min.js', false, '2.0.6', false);
		wp_register_script('cookie', get_template_directory_uri() . '/js/libs/jquery.cookie.js', 'jquery', '1.0', true);
		wp_register_script('superfish', get_template_directory_uri() . '/js/libs/jquery.superfish.js', 'jquery', '1.4.8', true);
		wp_register_script('slides', get_template_directory_uri() . '/js/libs/jquery.slides.js', 'jquery', '1.1.6', true);
		wp_register_script('fancybox', get_template_directory_uri() . '/js/libs/jquery.fancybox.all.js', 'jquery', '1.3.4', true);
		wp_register_script('quicksand', get_template_directory_uri() . '/js/libs/jquery.quicksand.js', 'jquery', '1.2.2', true);
		wp_register_script('placeholder', get_template_directory_uri() . '/js/libs/jquery.placeholder.js', 'jquery', '1.0', true);
		wp_register_script('validate', get_template_directory_uri() . '/js/libs/jquery.validate.js', 'jquery', '1.8.1', true);
		wp_register_script('twitter', get_template_directory_uri() . '/js/libs/jquery.twitter.js', 'jquery', '1.5', true);
		wp_register_script('custom', get_template_directory_uri() . '/js/script.js', 'jquery', '1.0', true);
		
		wp_enqueue_script('modernizr');
		wp_enqueue_script('jquery');
		wp_enqueue_script('cookie');
		wp_enqueue_script('superfish');
		wp_enqueue_script('fancybox');
		wp_enqueue_script('twitter');
	}
}
add_action('init', 'js_scripts');


/* Remove DL Monitor Style in frontend */
function dl_monitor_remove() {
	if (function_exists('wp_register_style') && function_exists('wp_enqueue_style') && !is_admin()) {
	    
	    wp_deregister_style('wp_dlmp_styles');
    }
}
add_action('wp_print_styles', 'dl_monitor_remove');

/* Load Filtering and Slides Script on Works */
function js_portfolio_script() {
	if (is_page_template('template-portfolio.php')) {
			wp_enqueue_script('quicksand'); 
		}
	if (get_post_type() == 'js_portfolio') {
		wp_enqueue_script('slides');
	}	
}
add_action('wp_print_scripts', 'js_portfolio_script');

/* Load placeholder script on contact page and single page */
function js_contact_script() {
	if (is_page_template('template-contact.php') || is_single() ) {
			wp_enqueue_script('validate'); 
			wp_enqueue_script('placeholder'); 
	}	
}
add_action('wp_print_scripts', 'js_contact_script');

// load single scripts only on single pages
function js_single_script() {
	if(is_singular() || is_page()) {
	wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_print_scripts', 'js_single_script');

/* Load custom scripts */
function js_custom_script() {
		wp_enqueue_script('custom');
}
add_action('wp_print_scripts', 'js_custom_script');

/*-----------------------------------------------------------------------------------*/
/* Add Multilanguage Support Support
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain( 'js' );

/*-----------------------------------------------------------------------------------*/
/* Add Menu Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'menus' );

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Main Navigation', 'js' ),
		)
	);
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

function js_get_menu($location = null, $source = 'categories', $menu_class = 'menu') {
	$menu = '';
	
	if (!$location) {
		echo '<p>You need to provide a menu location.</p>';
	} else {
	
		if (function_exists('wp_nav_menu')) {
		    $menu = wp_nav_menu( array( 
		    	'theme_location' => $location,
		    	'container' => '',
		    	'fallback_cb' => '',
		    	'menu_class' => $menu_class,
		    	'echo' => false 
		    ));
		}
		if ($menu == '') {
		    echo '<ul class="'. $menu_class .'">';
		    if ($source == 'categories') {
		    	wp_list_categories('title_li=&depth=3');
		    } else {
		    	wp_list_pages('title_li=&depth=3');
		    }
		    echo '</ul>';
		} else {
			echo($menu);
		}
	
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio - Single Images (Just for reference)
/*-----------------------------------------------------------------------------------*/
//Echoes the attached images, the small thumbnail, the large image and the full link
//$args = array(
//    'post_type' => 'attachment',
//    'orderby' => 'menu_order',
//    'order' => ASC,
//    'numberposts' => -1,
//    'post_status' => null,
//    'post_parent' => $post->ID,
//    'exclude' => get_post_thumbnail_id()
//);
//$attachments = get_posts($args);
//if ( $attachments ):
//    foreach ( $attachments as $attachment ):
//    	echo wp_get_attachment_URL($attachment->ID);
//    	echo '<br/>';
//    	$arrach = wp_get_attachment_image_src($attachment->ID, 'large');
//    	echo '<img src="'. $arrach[0] .'" width="'. $arrach[1] .'" height="'. $arrach[2] .'">';
//    	echo '<br/>';
//    	echo wp_get_attachment_image($attachment->ID, 'small-thumb');
//    	echo '<hr/>';
//    endforeach;
//endif;
function js_post_thumbnail($thumb_size = null, $fallback_size = null) {
if (!$fallback_size) {
	$fallback_size = '50';
}
if (!$thumb_size) {
	$thumb_size = 'thumbnail';
}
$thumb_attr = array('title'	=> __('View ') . get_the_title());
	if (has_post_thumbnail()) {
		the_post_thumbnail($thumb_size, $thumb_attr);
	} else {
		echo '<img src="http://placehold.it/'.$fallback_size.'" alt=""/>';
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Get featured image url
/*-----------------------------------------------------------------------------------*/

function js_thumb_urlfull($img_size) {
	$image_id = get_post_thumbnail_id($post->ID);
	$image_url = wp_get_attachment_image_src($image_id,$img_size);
	$image_url = $image_url[0];

	echo $image_url;
}

/*-----------------------------------------------------------------------------------*/
/* Define Image Sizes
/*-----------------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');
//default sizes
update_option('thumbnail_size_w', 220);
update_option('thumbnail_size_h', 136);
update_option('medium_size_w', 400);
update_option('medium_size_h', 9999);
update_option('large_size_w', 580);
update_option('large_size_h', 9999);
//custom sizes
add_image_size( 'small-thumb', 50, 50, true ); // name, width, height, crop

/*-----------------------------------------------------------------------------------*/
/*	Register Widger Areas/Sidebars
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') ) {

	register_sidebar(array(
	'id'			=> 'default-sidebar',
	'name' 			=> 'Sidebar',
	'description'	=> 'This is the default sidebar for posts and pages.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'	=> '</h3>'));
	
	register_sidebar(array(
	'id'			=> 'page-sidebar',
	'name' 			=> 'Pages Sidebar',
	'description'	=> 'This is the default sidebar for pages.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'	=> '</h3>'));
	
	register_sidebar(array(
	'id'			=> 'special-sidebar',
	'name' 			=> 'Special Cat Sidebar',
	'description'	=> 'This sidebar will appear in the selected special category in the theme options.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'	=> '</h3>'));

	register_sidebar(array(
	'id'			=> 'portfolio-sidebar',
	'name' 			=> 'Portfolio Sidebar',
	'description'	=> 'This sidebar is displayed in the portfolio page only, add the widget "Portfolio Filter" and other widgets of your preference.',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'	=> '</h3>'));
	
	register_sidebar(array(
	'id'			=> 'portfolio-widgets',
	'name' 			=> 'Portfolio Footer',
	'description'	=> 'These widgets will appear in the portfolio page.',
	'before_widget' => '<div id="%1$s" class="block-1 widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle small">',
	'after_title'	=> '</h3><hr/>'));
	
	register_sidebar(array(
	'id'			=> 'footer-widgets',
	'name' 			=> 'Footer',
	'description'	=> 'These widgets will appear in the bottom the website.',
	'before_widget' => '<div id="%1$s" class="block-1 widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle small">',
	'after_title'	=> '</h3><hr/>'));

	register_sidebar(array(
	'id'			=> 'homepage-widgets',
	'name' 			=> 'Homepage Footer',
	'description'	=> 'These widgets will appear in the homepage.',
	'before_widget' => '<div id="%1$s" class="block-1 widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle small">',
	'after_title'	=> '</h3><hr/>'));
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Gravatar Support
/*-----------------------------------------------------------------------------------*/

function js_custom_gravatar( $avatar_defaults ) {
    $js_avatar = get_template_directory_uri() . '/images/admin/gravatar.png';
    $avatar_defaults[$js_avatar] = 'Custom Gravatar (/images/admin/gravatar.png)';
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'js_custom_gravatar' );

/*-----------------------------------------------------------------------------------*/
/*	Custom Excerpt - <?php echo excerpt(15); ?>
/*-----------------------------------------------------------------------------------*/

function excerpt($limit, $echo_excerpt = true) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	
	if ($echo_excerpt == true) {
		echo $excerpt;
	} else {
		return $excerpt;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Is Category or sub category of the entered id by http://valendesigns.com/
/*-----------------------------------------------------------------------------------*/
if (!function_exists('is_category_or_sub')) {
	function is_category_or_sub($cat_id = 0) {
	    foreach (get_the_category() as $cat) {
	    	if ($cat_id == $cat->cat_ID || cat_is_ancestor_of($cat_id, $cat)) return true;
	    }
	    return false;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Is page or sub page of the entered id/name by http://valendesigns.com/
/*-----------------------------------------------------------------------------------*/
if (!function_exists('is_page_or_sub')) {
    function is_page_or_sub($my_page) {
        global $post, $wpdb;
	$grand_parent = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$post->post_parent."' AND post_type = 'page'");
	// If you pass in a string, get the page ID of $my_page to use below
	if (is_numeric($my_page)==false) {
            $my_page = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$my_page."' AND post_type = 'page'");
	}
	// If this is $my_page or the child or grandchild of $my_page return true 
	if ( is_page($my_page) || $post->post_parent == $my_page || $grand_parent == $my_page ) {
	    return true;
	} 
	// Else return false
        return false;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Get Post/Page Content
/*-----------------------------------------------------------------------------------*/
function js_get_content($the_id) {

	$item_id = get_post($the_id);
	$content = $item_id->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]>', $content);
	echo $content;

}

/*-----------------------------------------------------------------------------------*/
/*	Get Category ID
/*-----------------------------------------------------------------------------------*/

function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

/*-----------------------------------------------------------------------------------*/
/*	Get Page ID
/*-----------------------------------------------------------------------------------*/

function get_page_id($page_name){
	global $wpdb;
	$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name;
}

/*-----------------------------------------------------------------------------------*/
/*	Get author posts link
/*	possible args for name display: nickname, display_name, first_name, last_name, user_nicename
/*-----------------------------------------------------------------------------------*/

function js_author($author_meta = 'nickname') {
	$curr_author = get_the_author_meta('ID');
	$curr_author_posts = get_author_posts_url($curr_author);
	
	echo '<a href="'. $curr_author_posts .'" title="'. __('View author posts', 'js') .'">'. get_the_author_meta($author_meta) .'</a>';
}

/*-----------------------------------------------------------------------------------*/
/*	Add class to body in special situations
/*-----------------------------------------------------------------------------------*/

//add_filter( 'body_class', 'my_neat_body_class');
//function my_neat_body_class( $classes ) {
//     if ( is_page(7) || is_category(5) || is_tag('neat') )
//          $classes[] = 'neat-stuff';
//
//     return $classes; 
//}

/*-----------------------------------------------------------------------------------*/
/* 404 Message
/*-----------------------------------------------------------------------------------*/
function js_404_page() {
	echo '<div class="error-404">';
		echo '<h2 class="textcenter">404</h2>';
		echo '<h3 class="textcenter">'. __('The content you requested was not found.', 'js') .'</h3>';
		echo '<p class="textcenter">'. __('I don\'t know what happened, but you can try to find what you are looking for using the menu on top or the search form below.', 'js') .'</p>';
		echo '<div class="aligncenter" style="width:195px;">';
		get_template_part('searchform');
		echo '</div>';
	echo '</div>';
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Walker Class
/*-----------------------------------------------------------------------------------*/

class Walker_Category_Filter extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {

      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_slug = esc_attr( $category->slug);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
      $link = '<a href="#" data-type="'.strtolower(preg_replace('/\s+/', '-', $cat_slug)).'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf(__( 'View all posts filed under %s' ), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a>';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a>';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= '<li class="segment-'.rand(2, 99).'"';
          $class = 'cat-item cat-item-'.$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $class .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $class .=  ' current-cat-parent';
          $output .=  '';
          $output .= ">$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}

/*-----------------------------------------------------------------------------------*/
/* Comments
/*-----------------------------------------------------------------------------------*/
function js_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post ping back">
		<p><?php _e( 'Pingback:', 'twenty eleven' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'twenty eleven' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-content">
			    <h4><?php echo get_comment_author_link(); ?></h4>
			    <small>
			    	<?php echo get_comment_date(); ?>
			   	 	<?php
			   	 		$comment_reply = get_comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply ', 'js' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
			   	 		if ($comment_reply) {
			   	 			echo '| ';
			   	 			echo $comment_reply;
			   	 		}
			   	 	?>
			   	 	<?php edit_comment_link( __( 'Edit', 'js' ), '| ', '' ); ?>
			   	 </small>
			    <?php comment_text(); ?>
				<?php if ( $comment->comment_approved == '0' ) : ?>
				    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twenty eleven' ); ?></em>
				    <br />
				<?php endif; ?>
			</div>
			<!-- comment-content -->
			<div class="comment-thumb">
				<?php
				    $avatar_size = 50;
				    echo get_avatar( $comment, $avatar_size );
				?>
			</div>
			<!-- end .comment-thumb -->
		</div>

	<?php
			break;
	endswitch;
}

/*-----------------------------------------------------------------------------------*/
/* Comment Form
/*-----------------------------------------------------------------------------------*/

function js_comment_form( $args = array(), $post_id = null ) {
	global $user_identity, $id;

	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
		            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	$required_text = sprintf( ' ' . __('Required fields are marked %s'), '<span class="required">*</span>' );
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	?>
		<?php if ( comments_open() ) : ?>			
			<!-- comment form -->
			<div id="respond">
			<div class="clear"></div>
			
			<form class="form fluid" action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
				
				<h3><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?></h3>
				<small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
					<?php if (js_get_option('comments_message')) { ?>
					<p class="caption"><?php echo js_get_option('comments_message'); ?></p>
					<?php } ?>
				<hr/>
				<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
					<?php echo $args['must_log_in']; ?>
					<?php do_action( 'comment_form_must_log_in_after' ); ?>
				<?php else : ?>
				<div class="form-fix">
				
				<?php if ( is_user_logged_in() ) : ?>
				
				<p><?php printf(__('Logged in as %1$s. %2$sLog out &raquo;%3$s', 'framework'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'.__('Log out of this account', 'framework').'">', '</a>') ?></p>
				
				<?php else : ?>
				
					<div class="input-container cf">
						<input name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" class="third" type="text" tabindex="1" placeholder="Your Name" />
						<input name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" class="third" type="text" tabindex="2" placeholder="Your Email" />
						<input name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" class="third" type="text" tabindex="3" placeholder="Your Website" />
					</div>
				
				<?php endif; ?>

					<div class="input-container cf">
						<textarea name="comment" id="comment" rows="6" placeholder="Your Comment" tabindex="4"></textarea>
					</div>
				
				</div>
				
					
				<input name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php _e('Send','js'); ?>" tabindex="5" class="button alignright" />
				<?php comment_id_fields( $post_id ); ?>
				
				<?php do_action( 'comment_form', $post_id ); ?>
				
				<?php endif; ?>
				
			</form>
			
			</div>
			<!-- comment form -->

			<?php do_action( 'comment_form_after' ); ?>
		<?php else : ?>
			<?php do_action( 'comment_form_comments_closed' ); ?>
		<?php endif; ?>
	<?php
}


/*-----------------------------------------------------------------------------------*/
/* Load Options Framework
/*-----------------------------------------------------------------------------------*/

if ( !function_exists( 'optionsframework_init' ) ) {
		
	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */
	
	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/');
	}
	
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}

	/* 
	 * This is an example of how to add custom scripts to the options panel.
	 * This one shows/hides the an option when a checkbox is clicked.
	 */
	
	add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
	
	function optionsframework_custom_scripts() { ?>
	
	<script type="text/javascript">
	jQuery(document).ready(function() {
	
		jQuery('#example_showhidden').click(function() {
	  		jQuery('#section-example_text_hidden').fadeToggle(400);
		});
		
		if (jQuery('#example_showhidden:checked').val() !== undefined) {
			jQuery('#section-example_text_hidden').show();
		}
		
		//Hello Bar
		jQuery('#hb_display').click(function() {
	  		jQuery('#section-hb_message, #section-hb_date').fadeToggle(400);
		});
		
		if (jQuery('#hb_display:checked').val() !== undefined) {
			jQuery('#section-hb_message, #section-hb_date').show();
		}
		
		//Modal Window
		jQuery('#mw_display').click(function() {
	  		jQuery('#section-mw_content, #section-mw_overlay, #section-mw_overlay_click').fadeToggle(400);
		});
		
		if (jQuery('#mw_display:checked').val() !== undefined) {
			jQuery('#section-mw_content, #section-mw_overlay, #section-mw_overlay_click').show();
		}
		
	});
	</script>
<?php }

/*-----------------------------------------------------------------------------------*/
/* Theme Options WP_Head and WP_Footer Output
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/

function js_favicon() {
		if (js_get_option('favicon') != '') {
	        echo '<link rel="shortcut icon" href="'. js_get_option('favicon')  .'"/>'."\n";
	    }
		else {
			echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicon.ico" />';
		}
}
add_action('wp_head', 'js_favicon');

/*-----------------------------------------------------------------------------------*/
/* Add Feedburner feed with rss fallback
/*-----------------------------------------------------------------------------------*/

function js_feedburner() {
	if (js_get_option('feedburner')) {
		echo '<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="'.js_get_option('feedburner').'" />';
	} else {
	 echo '<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="';
	 bloginfo('rss2_url');
	 echo '" />';
	}
}
add_action('wp_head', 'js_feedburner');

/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/

function js_analytics(){
	//if is admin
	if (!current_user_can('administrator')) {
	
		$output = js_get_option('analytics');
		if ( $output <> "" ) {
			echo stripslashes($output) . "\n";
		}
	
	} else {
		echo '<!-- analytics is hidden because you are admin -->';
	}
}
add_action('wp_footer','js_analytics');

?>