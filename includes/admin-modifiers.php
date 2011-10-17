<?php

//	/** 
//	 * Filter TinyMCE Buttons
//	 *
//	 * Here we are filtering the TinyMCE buttons and adding a button
//	 * to it. In this case, we are looking to add a style select 
//	 * box (button) which is referenced as "styleselect". In this 
//	 * example we are looking to add the select box to the second
//	 * row of the visual editor, as defined by the number 2 in the
//	 * mce_buttons_2 hook.
//	 */
//	function themeit_mce_buttons_2( $buttons ) {
//	  array_unshift( $buttons, 'styleselect' );
//	  return $buttons;
//	}
//	add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );
//	
//	/**
//	 * Add Style Options
//	 *
//	 * First we provide available formats for the style format drop down.
//	 * This should contain a comma separated list of formats that 
//	 * will be available in the format drop down list.
//	 *
//	 * Next, we provide our style options by adding them to an array.
//	 * Each option requires at least a "title" value. If only a "title"
//	 * is provided, that title will be used as a divider heading in the
//	 * styles drop down. This is useful for creating "groups" of options.
//	 *
//	 * After the title, we set what type of element it is and how it should
//	 * be displayed. We can then provide class and style attributes for that
//	 * element. The example below shows a variety of options.
//	 *
//	 * Lastly, we encode the array for use by TinyMCE editor
//	 *
//	 * {@link http://tinymce.moxiecode.com/examples/example_24.php }
//	 */
//	function themeit_tiny_mce_before_init( $settings ) {
//		$settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr,';
//	
//		$style_formats = array(
//			array( 'title' => 'Button',         'inline' => 'span',  'classes' => 'button' ),
//	      
//			array( 'title' => 'Other Options' ),
//			array( 'title' => '&frac12; Col.',      'block'    => 'div',  'classes' => 'one-half' ),
//			array( 'title' => '&frac12; Col. Last', 'block'    => 'div',  'classes' => 'one-half last' ),
//			array( 'title' => 'Callout Box',        'block'    => 'div',  'classes' => 'callout-box' ),
//			array( 'title' => 'Highlight',          'inline'   => 'span', 'classes' => 'highlight' )
//		);
//	
//		$settings['style_formats'] = json_encode( $style_formats );
//		return $settings;
//	}
//	add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );

/**
 * Add Editor Style
 *
 * This provides the theme with the functionality to add a custom
 * TinyMCE editor stylesheet. By default, the add_editor_style() will
 * look for a stylesheet named editor-style.css in your theme. Here
 * we have chosen to define our own stylesheet name, style-editor.css.
 * This stylesheet can be named whatever you want, just be sure it is
 * defined in the function below and included in your theme files.
 *
 *{@link http://codex.wordpress.org/Function_Reference/add_editor_style }
 */
 
function js_editor_style() {
	add_editor_style( 'css/editor.css' );
}
add_action( 'after_setup_theme', 'js_editor_style' );

/*-----------------------------------------------------------------------------------*/
/* Admin Custom Logo
/*-----------------------------------------------------------------------------------*/

add_action('admin_head', 'js_custom_dashboard_logo');

function js_custom_dashboard_logo() {
	echo '
	<style type="text/css">
	#header-logo { background-image: url('.get_template_directory_uri().'/images/admin/dashboard.png) !important; }
	</style>
	';
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Login Logo Support
/*-----------------------------------------------------------------------------------*/

function js_custom_login_logo() {
	echo '<style type="text/css">
		h1 a { background-image:url('.get_template_directory_uri().'/images/admin/login.png) !important; }
	</style>';
}
function js_wp_login_url() {
	echo home_url();
}
function js_wp_login_title() {
	echo get_option('blogname');
}

add_action('login_head', 'js_custom_login_logo');
add_filter('login_headerurl', 'js_wp_login_url');
add_filter('login_headertitle', 'js_wp_login_title');

/*-----------------------------------------------------------------------------------*/
/*	Custom Admin Footer Text
/*-----------------------------------------------------------------------------------*/

function js_custom_admin_footer() {
	echo "Framework";
}
add_filter('admin_footer_text', 'js_custom_admin_footer');

/*-----------------------------------------------------------------------------------*/
/*	Custom Admin CSS
/*-----------------------------------------------------------------------------------*/
function js_custom_admin_css() {
	echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/admin.css" type="text/css" media="all" />';
}

add_action('admin_head', 'js_custom_admin_css');

/*-----------------------------------------------------------------------------------*/
/* Remove Dashboard Admin Menus
/*-----------------------------------------------------------------------------------*/

function remove_menus() {
		//remove_menu_page('index.php'); // Dashboard
		//remove_menu_page('edit.php'); // Posts
		//remove_menu_page('upload.php'); // Media
		//remove_menu_page('link-manager.php'); // Links
		//remove_menu_page('edit.php?post_type=page'); // Pages
		//remove_menu_page('edit-comments.php'); // Comments
		//remove_menu_page('themes.php'); // Appearance
		//remove_menu_page('plugins.php'); // Plugins
		//remove_menu_page('users.php'); // Users
		//remove_menu_page('tools.php'); // Tools
		//remove_menu_page('options-general.php'); // Settings
		//remove_submenu_page('themes.php','themes.php'); // Themes
		//remove_submenu_page('themes.php','widgets.php'); // Widgets
		//remove_submenu_page('options-general.php','options-writing.php'); // Writing Options
}
add_action( 'admin_menu', 'remove_menus' );

/*-----------------------------------------------------------------------------------*/
/* Update notice to admin only
/*-----------------------------------------------------------------------------------*/
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins 
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

/*-----------------------------------------------------------------------------------*/
/* Make Custom Post Types Searchable
/*-----------------------------------------------------------------------------------*/
function searchAll( $query ) {
	if ( $query->is_search ) { $query->set( 'post_type', array( 'js_portfolio' )); } 
	return $query;
}
add_filter( 'the_search_query', 'searchAll' );

/*-----------------------------------------------------------------------------------*/
/* Add Custom Post Types to RSS Feed
/*-----------------------------------------------------------------------------------*/
function custom_feed_request( $vars ) {
	if (isset($vars['feed']) && !isset($vars['post_type']))
		$vars['post_type'] = array( 'post', 'js_portfolio');
	return $vars;
}
add_filter( 'request', 'custom_feed_request' );

/*-----------------------------------------------------------------------------------*/
/* Add Custom Post Types to the Right Now Dashboard Widget
/*-----------------------------------------------------------------------------------*/
function wph_right_now_content_table_end() {
 $args = array(
  'public' => true ,
  '_builtin' => false
 );
 $output = 'object';
 $operator = 'and';

 $post_types = get_post_types( $args , $output , $operator );
 foreach( $post_types as $post_type ) {
  $num_posts = wp_count_posts( $post_type->name );
  $num = number_format_i18n( $num_posts->publish );
  $text = _n( $post_type->labels->singular_name, $post_type->labels->name , intval( $num_posts->publish ) );
  if ( current_user_can( 'edit_posts' ) ) {
   $num = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
   $text = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
  }
  echo '<tr><td class="first b b-' . $post_type->name . '">' . $num . '</td>';
  echo '<td class="t ' . $post_type->name . '">' . $text . '</td></tr>';
 }
 $taxonomies = get_taxonomies( $args , $output , $operator ); 
 foreach( $taxonomies as $taxonomy ) {
  $num_terms  = wp_count_terms( $taxonomy->name );
  $num = number_format_i18n( $num_terms );
  $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name , intval( $num_terms ));
  if ( current_user_can( 'manage_categories' ) ) {
   $num = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$num</a>";
   $text = "<a href='edit-tags.php?taxonomy=$taxonomy->name'>$text</a>";
  }
  echo '<tr><td class="first b b-' . $taxonomy->name . '">' . $num . '</td>';
  echo '<td class="t ' . $taxonomy->name . '">' . $text . '</td></tr>';
 }
}
add_action( 'right_now_content_table_end' , 'wph_right_now_content_table_end' );

/*-----------------------------------------------------------------------------------*/
/* Add Custom Dashboard Widget
/*-----------------------------------------------------------------------------------*/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {
   global $wp_meta_boxes;
   wp_add_dashboard_widget('custom_help_widget', 'Help and Support', 'custom_dashboard_help');
}
 function custom_dashboard_help() {
    echo '<p>Lorum ipsum delor sit amet et nunc</p>';
}

/*-----------------------------------------------------------------------------------*/
/* Remove pings to self
/*-----------------------------------------------------------------------------------*/
function no_self_ping( &$links ) {
    $home = home_url();
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

/*-----------------------------------------------------------------------------------*/
/* Display current page resource consumption in footer
/*-----------------------------------------------------------------------------------*/
function performance( $visible = false ) {

    $stat = sprintf(  '%d queries in %.3f seconds, using %.2fMB memory',
        get_num_queries(),
        timer_stop( 0, 3 ),
        memory_get_peak_usage() / 1024 / 1024
        );

    echo $visible ? $stat : "<!-- {$stat} -->" ;
}
add_action( 'wp_footer', 'performance', 20 );

/*-----------------------------------------------------------------------------------*/
/* Remove the read more hash that cause page jump
/*-----------------------------------------------------------------------------------*/
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

/*-----------------------------------------------------------------------------------*/
/* Make TinyMCE Accept iFrames
/*-----------------------------------------------------------------------------------*/
add_filter('tiny_mce_before_init', create_function( '$a',
'$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;') );

/*-----------------------------------------------------------------------------------*/
/* Add next page button in tiny mce
/*-----------------------------------------------------------------------------------*/
add_filter('mce_buttons','wysiwyg_editor');
function wysiwyg_editor($mce_buttons) {
    $pos = array_search('wp_more',$mce_buttons,true);
    if ($pos !== false) {
        $tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
        $tmp_buttons[] = 'wp_page';
        $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
    }
    return $mce_buttons;
}

?>