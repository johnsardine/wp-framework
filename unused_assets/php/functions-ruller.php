<?php
	
	$themename = "Ruller";  
	$shortname = "rl";  
	
	add_action('admin_init', 'mytheme_add_init');
	add_action('admin_menu', 'mytheme_add_admin');
	
	add_theme_support( 'menus' );

	function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
	
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu - 1 level only' )
		)
	);
};

if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

//Widgets
if ( function_exists('register_sidebar') ) {

 	register_sidebar(array(
 	'name' 			=> 'Sidebar',
 	'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
 	'after_widget'  => '</div></li>',
 	'before_title'  => '<h2 class="widgettitle">',
 	'after_title'	=> '</h2>'));
	
 	register_sidebar(array(
 	'name' 			=> 'Footer - Left',
 	'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
 	'after_widget'  => '</div></li>',
 	'before_title'  => '<h2 class="widgettitle">',
 	'after_title'	=> '</h2>'));
	
 	register_sidebar(array(
 	'name' 			=> 'Footer - Center Left',
 	'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
 	'after_widget'  => '</div></li>',
 	'before_title'  => '<h2 class="widgettitle">',
 	'after_title'	=> '</h2>'));
	
 	register_sidebar(array(
 	'name' 			=> 'Footer - Center Right',
 	'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
 	'after_widget'  => '</div></li>',
 	'before_title'  => '<h2 class="widgettitle">',
 	'after_title'	=> '</h2>'));
	
 	register_sidebar(array(
 	'name' 			=> 'Footer - Right',
 	'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
 	'after_widget'  => '</div></li>',
 	'before_title'  => '<h2 class="widgettitle">',
 	'after_title'	=> '</h2>'));
}

//thumbs
add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 214, 156, true );//Portfolio image
add_image_size( 'slider-image', 634, 248, true ); // Slider image



function get_thumb_urlfull ($postID) {

$image_id = get_post_thumbnail_id($post);  

$image_url = wp_get_attachment_image_src($image_id,'original');  

$image_url = $image_url[0]; 

return $image_url;

}

//pagination

if (!function_exists('dark_pagenav')) {

	function dark_pagenav() { 

		if (function_exists('wp_pagenavi') ) { ?>

		<?php wp_pagenavi(); ?>

		<?php } else { ?>    

		<?php if ( get_next_posts_link() || get_previous_posts_link() ) { ?>
	            <div class="nav-entries">
					<div class="nav-prev fl"><?php previous_posts_link(__('&laquo; Mais Recente ', 'ruller')) ?></div>
	                <div class="nav-next fr"><?php next_posts_link(__(' Mais Antigo &raquo;', 'ruller')) ?></div>
	                <div class="fix"></div>
	            </div>
		<?php } ?>

		<?php }   

	} 

}

//Breadrumbs
function the_breadcrumb() {

global $wp_query;
$category = $wp_query->get_queried_object();

		echo '<ul class="crumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '"><b>';
		echo _e('Home');
		echo "</b></a></li>";
		if (is_category()) {
			echo '<li>';
			if( $category->parent ) { echo get_the_category_by_ID($category->parent); } echo' » '; single_cat_title();
			echo '</li>';
			echo '<li>» ';
			echo __('Page') . ' ' . get_query_var('paged');
			echo '</li>';
		} elseif (is_single()) {
			echo '<li>» ';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>» ";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}

	echo '</ul>';
}


/*******************************
   SLIDESHOW CUSTOM POST TYPES
********************************/
register_post_type( 'slideshow',
    array(
      'labels' => array(
        'name' => __( 'Slider Items' ), //this name will be used when will will call the investments in our theme
        'singular_name' => __( 'Slider Item' ),
		'add_new' => _x('Add New', 'slideshow'),
		'add_new_item' => __('Add New Slider Item'), //custom name to show up instead of Add New Post. Same for the following
		'edit_item' => __('Edit Slider Item'),
		'new_item' => __('New Slider Item'),
		'view_item' => __('View Slider Item'),
      ),
      'public' => true,
	  'show_ui' => true,
	  'exclude_from_search' => true,
	  'hierarchical' => false, //it means we cannot have parent and sub pages
	  'capability_type' => 'post', //will act like a normal post
	  'rewrite' => false, //this is used for rewriting the permalinks
	  'query_var' => false,
	  'supports' => array( 'title',	'thumbnail'), //the editing regions that will support
	  'menu_position' => 100
    )
  );
  
/*******************************
   SLIDESHOW CUSTOM META
********************************/
 
add_action('admin_init','slideshow_meta_init');
 
function slideshow_meta_init()
{

	// add a meta box for each of the wordpress page types: posts and pages
	add_meta_box('slideshow_all_meta', 'Silder Item Settings', 'slideshow_meta_setup', 'slideshow', 'normal', 'high');
 
	// add a callback function to save any data a user enters in
	add_action('save_post','slideshow_meta_save');
}
 
function slideshow_meta_setup()
{
	global $post;
 
	// using an underscore, prevents the meta variable
	// from showing up in the custom fields section
	$meta = get_post_meta($post->ID,'_slideshow_meta',TRUE);
 
	echo '<div class="my_meta_control">
 
	<p style="margin:6px 0 8px;">Set the caption text and the link of the slider item. The image should be set as <strong>Featured Image</strong> of the item. For proper display use images  634px X 248px or higher.</p>
	<br/>
	
	<label>Slider Item Caption Text</label>
 
	<p style="margin:6px 0 8px;">
		<textarea name="_slideshow_meta[caption]" rows="3" cols="40">';?><?php if(!empty($meta['caption'])) echo $meta['caption']; ?><?php echo '</textarea>
	</p>
 
	<label>Linking to (optional) <small>e.g. http://www.yourwebsite.com</small></label>
 
	<p style="margin:6px 0 8px;">
		<textarea name="_slideshow_meta[linkto]" rows="2" cols="40">';?><?php if(!empty($meta['linkto'])) echo $meta['linkto']; ?><?php echo '</textarea>
	</p>
 
	
 
</div>';
 
	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="slideshow_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
 
function slideshow_meta_save($post_id) 
{
	// authentication checks
 
	// make sure data came from our meta box
	if (!wp_verify_nonce($_POST['slideshow_meta_noncename'],__FILE__)) return $post_id;
 
	// check user permissions
	if ($_POST['post_type'] == 'slideshow') 
	{
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	else 
	{
		if (!current_user_can('edit_post', $post_id)) return $post_id;
	}
 
	// authentication passed, save data
 
	// var types
	// single: _my_meta[var]
	// array: _my_meta[var][]
	// grouped array: _my_meta[var_group][0][var_1], _my_meta[var_group][0][var_2]
 
	$current_data = get_post_meta($post_id, '_slideshow_meta', TRUE);	
 
	$new_data = $_POST['_slideshow_meta'];
 
	slideshow_meta_clean($new_data);
 
	if ($current_data) 
	{
		if (is_null($new_data)) delete_post_meta($post_id,'_slideshow_meta');
		else update_post_meta($post_id,'_slideshow_meta',$new_data);
	}
	elseif (!is_null($new_data))
	{
		add_post_meta($post_id,'_slideshow_meta',$new_data,TRUE);
	}
 
	return $post_id;
}
 
function slideshow_meta_clean(&$arr)
{
	if (is_array($arr))
	{
		foreach ($arr as $i => $v)
		{
			if (is_array($arr[$i])) 
			{
				slideshow_meta_clean($arr[$i]);
 
				if (!count($arr[$i])) 
				{
					unset($arr[$i]);
				}
			}
			else 
			{
				if (trim($arr[$i]) == '') 
				{
					unset($arr[$i]);
				}
			}
		}
 
		if (!count($arr)) 
		{
			$arr = NULL;
		}
	}
}
 
 function edit_slideshow_columns($slideshow_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Slider Item Title', 'column name' ),
		"caption" => __('Caption Text' ),
		"link" => __('Link'),
		"thumbnail" => __('Thumbnail')
	);

	return $columns;
}
add_filter('manage_edit-slideshow_columns', 'edit_slideshow_columns');

function manage_slideshow_columns($column) {
	global $post;
	$slideshow_meta = get_post_meta($post->ID,'_slideshow_meta',TRUE);
	if ($post->post_type == "slideshow") {
		switch($column){
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
			case 'caption':
				echo $slideshow_meta['caption'];
				break;
			case 'link':
				echo '<a href="'.$slideshow_meta['linkto'].'">'.$slideshow_meta['linkto'].'</a>';
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_slideshow_columns', 10, 2);

//Portfolio necessary funcion
function post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

//comments
if ( ! function_exists( 'twentyten_comment' ) ) :

/**
 * Template for comments and pingbacks.
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 * Used as a callback by wp_list_comments() for displaying the comments.
 * @since Twenty Ten 1.0
**/

function twentyten_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div id="comment-<?php comment_ID(); ?>">

		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 50 ); ?>
			<?php printf( __( '%s', 'twentyten' ), sprintf( '%s', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'O seu coment&aacute;rio aguarda modera�&atilde;o.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s &agrave;s %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(editar)', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/*******************************
Theme Options
********************************/
//Get Categories in dropdown
$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");

//The options
$options = array (

array( "name" => $themename." Options",
	"type" => "title"),

array( "name" => "General",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Logo URL",
	"desc" => "Enter the link to your logo image. 265 pixels by 65 pixels please.",
	"id" => $shortname."_logo",
	"type" => "text",
	"std" => get_bloginfo('template_directory') ."/images/logo.png"),

array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => get_bloginfo('template_directory') ."/images/favicon.ico"),	

array( "name" => "Feedburner URL",
	"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website",
	"id" => $shortname."_feedburner",
	"type" => "text",
	"std" => get_bloginfo('rss2_url')),

array( "name" => "Custom CSS",
	"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
	"id" => $shortname."_custom_css",
	"type" => "textarea",
	"std" => ""),		

array( "type" => "close"),
array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

//Box Left
array( "name" => "Text Box Title",
	"desc" => "Enter the title of the box on the left.",
	"id" => $shortname."_box_1_title",
	"type" => "text",
	"std" => "Box Left"),
array( "name" => "Text Box Content",
	"desc" => "Enter the content of the box on the left. It can be HTML.",
	"id" => $shortname."_box_1",
	"type" => "textarea",
	"std" => "It was a humorously perilous business for both of us. For, before we proceed further, it must be said that the monkey-rope was fast at both ends; fast to Queequeg's broad canvas belt, and fast to my narrow leather one."),

array( "name" => "Visit Portfolio Text",
	"desc" => "Enter the intended text.",
	"id" => $shortname."_visit_port",
	"type" => "text",
	"std" => "Visit Portfolio"),
	
array( "name" => "Portfolio Category",
	"desc" => "Choose a category from which portfolio posts are drawn",
	"id" => $shortname."_portfolio",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"),

array( "name" => "Blog Category",
	"desc" => "Choose a category from which blog posts are drawn",
	"id" => $shortname."_blog",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"),

array( "name" => "Downloads Category",
	"desc" => "Choose a category from which downloads are drawn",
	"id" => $shortname."_down",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"),

array( "type" => "close"),
array( "name" => "Social",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Deviantart",
	"desc" => "Enter your DeviantArt username. eg: subzero123",
	"id" => $shortname."_deviant",
	"type" => "text",
	"std" => ""),

array( "name" => "Twitter",
	"desc" => "Enter your Twitter username. eg: johnsardine",
	"id" => $shortname."_twitter",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Facebook",
	"desc" => "Enter your Facebook URL. eg: http://www.facebook.com/johnsardine",
	"id" => $shortname."_facebook",
	"type" => "text",
	"std" => ""),

//Contact
array( "type" => "close"),
array( "name" => "Contact",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Email",
	"desc" => "Your contact mail.",
	"id" => $shortname."_cont_mail",
	"type" => "text",
	"std" => ""),

array( "name" => "Message",
	"desc" => "Write the message you want your visitors to read while at the contact page",
	"id" => $shortname."_cont_text",
	"type" => "textarea",
	"std" => ""),
	
array( "type" => "close"),
array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Footer copyright text",
	"desc" => "Enter text used in the right side of the footer. It can be HTML",
	"id" => $shortname."_footer_text",
	"type" => "text",
	"std" => "CopyRight&#169; <?php bloginfo('name'); ?>"),

array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),

array( "type" => "close")

);

//Functions for updating options and adding a menu page
function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

	if ( 'save' == $_REQUEST['action'] ) {

		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=functions.php&saved=true");
die;

}
else if( 'reset' == $_REQUEST['action'] ) {

	foreach ($options as $value) {
		delete_option( $value['id'] ); }

	header("Location: admin.php?page=functions.php&reset=true");
die;

}
}

add_theme_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/theme-options/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/theme-options/options.js", false, "1.0");
}


function mytheme_admin() {

global $themename, $shortname, $options;
$i=0;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>

<div class="rm_opts">
<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>

<?php break;

case "close":
?>

</div>
</div>
<br />

<?php break;

case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

<?php break;

case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>
<?php
break;

case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>

 </div>

<?php
break;

case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;

case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>

<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break;
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

<?php break;

}
}
?>

<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
 </div> 

<?php
}

?>