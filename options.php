<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$test_array = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
	
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	$options_categories[''] = 'Select a category:';
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
	
	// Pull all the posts into an array
	$options_posts = array();  
	$options_posts_obj = get_posts('numberposts=99999');
	$options_posts[''] = 'Select a post:';
	foreach ($options_posts_obj as $post) {
    	$options_posts[$post->ID] = $post->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/includes/admin/images/ ';
		
	$options = array();
	
	/*-----------------------------------------------------------------------------------*/
	/* General Stuff
	/*-----------------------------------------------------------------------------------*/
	
	$options[] = array( "name" => "General",
						"type" => "heading");
						
	$options[] = array( "name" => "What do I do?",
						"desc" => "This is the theme options panel, here you can customize several aspects of it and activate/deactivate certain functions, feel free to explore and to experiment the options.<br/><br/>In this screen you will define a couple of general aspects of the site.",
						"type" => "info");
						
	$options[] = array( "name" => "Logo",
						"desc" => "Upload your logo here.",
						"id" => "logo",
						"type" => "upload");
						
	$options[] = array( "name" => "Favicon",
						"desc" => "Upload your favicon here. Recomended size: 16px x 16px",
						"id" => "favicon",
						"type" => "upload");

	$options[] = array( "name" => "Feedburner",
						"desc" => 'If you have a <a target="_blank" href="http://feedburner.google.com/" title="Go to FeedBurner">FeedBurner</a> account you can paste your feed url here and it will override the default feed.',
						"id" => "feedburner",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "Analytics",
						"desc" => 'Paste your <a target="_blank" href="http://www.google.com/analytics/" title="Go to Google Analytics">Google Analytics</a> site tracking ID here. eg. UA-12345678-9. <br/> The code will not appear to admins, that way you won\'t influence your statistics.',
						"id" => "analytics",
						"std" => "",
						"class" => "mini",
						"type" => "text");
		
	/*-----------------------------------------------------------------------------------*/
	/* Example Options
	/*-----------------------------------------------------------------------------------*/
		
	$options[] = array( "name" => "Example Options",
						"type" => "heading");
						
	$options[] = array( "name" => "Information Area",
						"desc" => "This is the description. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
						"type" => "info");
							
	$options[] = array( "name" => "Input Text Mini",
						"desc" => "A mini text input field.",
						"id" => "example_text_mini",
						"std" => "Default",
						"class" => "mini",
						"type" => "text");
								
	$options[] = array( "name" => "Input Text",
						"desc" => "A text input field.",
						"id" => "example_text",
						"std" => "Default Value",
						"type" => "text");
							
	$options[] = array( "name" => "Textarea",
						"desc" => "Textarea description.",
						"id" => "example_textarea",
						"std" => "Default Text",
						"type" => "textarea");
						
	$options[] = array( "name" => "Raw Textarea",
						"desc" => 'Everything you insert here will not be stripped out by WordPress. Useful for analytics and such.',
						"id" => "raw_text",
						"std" => "",
						"type" => "rawtextarea");
						
	$options[] = array( "name" => "Input Select Small",
						"desc" => "Small Select Box.",
						"id" => "example_select",
						"std" => "three",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => $test_array);			 
						
	$options[] = array( "name" => "Input Select Wide",
						"desc" => "A wider select box.",
						"id" => "example_select_wide",
						"std" => "two",
						"type" => "select",
						"options" => $test_array);
						
	$options[] = array( "name" => "Select a Category",
						"desc" => "Passed an array of categories with cat_ID and cat_name",
						"id" => "example_select_categories",
						"type" => "select",
						"options" => $options_categories);
						
	$options[] = array( "name" => "Select a Page",
						"desc" => "Passed an pages with ID and post_title",
						"id" => "example_select_pages",
						"type" => "select",
						"options" => $options_pages);
						
	$options[] = array( "name" => "Select a Post",
						"desc" => "Passed an array of posts with ID and post_title",
						"id" => "example_select_posts",
						"type" => "select",
						"options" => $options_posts);
						
	$options[] = array( "name" => "Input Radio (one)",
						"desc" => "Radio select with default options 'one'.",
						"id" => "example_radio",
						"std" => "one",
						"type" => "radio",
						"options" => $test_array);
							
	$options[] = array( "name" => "Example Info",
						"desc" => "This is just some example information you can put in the panel.",
						"type" => "info");
											
	$options[] = array( "name" => "Input Checkbox",
						"desc" => "Example checkbox, defaults to true.",
						"id" => "example_checkbox",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Check to Show a Hidden Text Input",
						"desc" => "Click here and see what happens.",
						"id" => "example_showhidden",
						"type" => "checkbox");
	
	$options[] = array( "name" => "Hidden Text Input",
						"desc" => "This option is hidden unless activated by a checkbox click.",
						"id" => "example_text_hidden",
						"std" => "Hello",
						"class" => "hidden",
						"type" => "text");
						
	$options[] = array( "name" => "Uploader Test",
						"desc" => "This creates a full size uploader that previews the image.",
						"id" => "example_uploader",
						"type" => "upload");
						
	$options[] = array( "name" => "Example Image Selector",
						"desc" => "Images for layout.",
						"id" => "example_images",
						"std" => "2c-l-fixed",
						"type" => "images",
						"options" => array(
							'1col-fixed' => $imagepath . '1col.png',
							'2c-l-fixed' => $imagepath . '2cl.png',
							'2c-r-fixed' => $imagepath . '2cr.png')
						);
						
	$options[] = array( "name" =>  "Example Background",
						"desc" => "Change the background CSS.",
						"id" => "example_background",
						"std" => $background_defaults, 
						"type" => "background");
								
	$options[] = array( "name" => "Multicheck",
						"desc" => "Multicheck description.",
						"id" => "example_multicheck",
						"std" => $multicheck_defaults, // These items get checked by default
						"type" => "multicheck",
						"options" => $multicheck_array);
							
	$options[] = array( "name" => "Colorpicker",
						"desc" => "No color selected by default.",
						"id" => "example_colorpicker",
						"std" => "",
						"type" => "color");
						
	$options[] = array( "name" => "Typography",
						"desc" => "Example typography.",
						"id" => "example_typography",
						"std" => array('size' => '12px','face' => 'verdana','style' => 'bold italic','color' => '#123456'),
						"type" => "typography");

	/*-----------------------------------------------------------------------------------*/
	/* Footer
	/*-----------------------------------------------------------------------------------*/
						
	$options[] = array( "name" => "Footer",
						"type" => "heading");
						
	$options[] = array( "name" => "Text Left",
						"desc" => "Textarea description.",
						"id" => "footer_left",
						"std" => "",
						"type" => "textareasmall");
						
	$options[] = array( "name" => "Text Right",
						"desc" => "Textarea description.",
						"id" => "footer_right",
						"std" => '',
						"type" => "textareasmall");
						
	/*-----------------------------------------------------------------------------------*/
	/* Hello Bar Section
	/*-----------------------------------------------------------------------------------*/
						
	$options[] = array( "name" => "Hello Bar",
						"type" => "heading");
						
	$options[] = array( "name" => "What is this?",
						"desc" => "The Hello Bar is a bar on top of the screen that can be used to display a message to your visitors.",
						"type" => "info");
						
	$options[] = array( "name" => "Display Hello Bar",
						"desc" => "Check to display the hello bar on top of the screen.",
						"id" => "hb_display",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Hello Bar Text",
						"desc" => "Write here a message to your visitors.",
						"id" => "hb_message",
						"std" => 'This is the content of the hello bar, can be anything in html. <a title="" href="'.home_url( '/' ).'wp-admin/themes.php?page=options-framework">Change in the options pannel</a>',
						"class" => "hidden",
						"type" => "text");
						
	$options[] = array( "name" => "Display Until…",
						"desc" => "Write the date in the diplayed format but remove one number to the month and to the day. <br> For example, to display until August(08) 29, 2011 you should write 2011,07,28",
						"id" => "hb_date",
						"std" => "2011,07,28",
						"class" => "mini hidden",
						"type" => "text");
						
	/*-----------------------------------------------------------------------------------*/
	/* Modal Window
	/*-----------------------------------------------------------------------------------*/
						
	$options[] = array( "name" => "Modal Window",
						"type" => "heading");
						
	$options[] = array( "name" => "What is this?",
						"desc" => "This modal window can pop-up on page load to show important information or other content to your users.",
						"type" => "info");
						
	$options[] = array( "name" => "Display Modal Window",
						"desc" => "Check to display the modal window to your users.",
						"id" => "mw_display",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Select a Page",
						"desc" => "The content of the selected page will show up inside the modal window.",
						"id" => "mw_content",
						"type" => "select",
						"class" => "hidden",
						"options" => $options_pages);
						
	$options[] = array( "name" => "Show Page Overlay",
						"desc" => "If checked a semiopaque element will cover the whole page.",
						"id" => "mw_overlay",
						"std" => "1",
						"class" => "hidden",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Click Overlay to Close",
						"desc" => "If checked, clicking the overlay will make the modal window go away.",
						"id" => "mw_overlay_click",
						"std" => "0",
						"class" => "hidden",
						"type" => "checkbox");

	return $options;
}