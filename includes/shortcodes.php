<?php

/*-----------------------------------------------------------------------------------*/
/* Add next page button in tiny mce
/*-----------------------------------------------------------------------------------*/
function js_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"href" => 'http://',
		"class" => '',
		"popup" => '',
	), $atts));
	if ($popup == true) {
		$popup = 'target="_blank"';
	}
	return '<a href="'.$href.'" class="button '.$class.'" '.$popup.'>'.$content.'</a>';
}
add_shortcode("button", "js_button");

?>