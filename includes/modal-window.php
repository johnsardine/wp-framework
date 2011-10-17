<?php
function js_modal_window() {

	if (js_get_option('mw_display', 0) && js_get_option('mw_content')) {
	
		echo '<div class="modal">';
		echo '<span class="close alignright">X</span>';
		
		js_get_content(js_get_option('mw_content'));
		
		echo '</div>';
		
		//If open display overlay = true display overlay
		if (js_get_option('mw_overlay', 1)) {
			echo '<div class="overlay';
			
			//if on overlay click close echo class close
			if (js_get_option('mw_overlay_click', 0)) {
				echo ' close';
			}
			
			echo'"></div>';		
		}

	}
	
}

add_action('wp_footer','js_modal_window');

?>