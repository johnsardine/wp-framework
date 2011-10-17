<?php

function js_hello_bar() {

	//if display hellobar true
	if (js_get_option('hb_display') && js_get_option('hb_message') && js_get_option('hb_date')) {

		echo '<script type="text/javascript">';
		echo 'closeDate = new Date();';
		//This date represents the day you wish to disable the hello bar. You need to set it a day before you want it hidden.
		//Change the date value (YEAR, MONTH, DAY). NOTE: The months start at 0. January = 0 so that means November would be 10 and December 11.
		//If you wanted to hide it on the 6th Feb, you would change the value to: 2011,1,5
		echo 'closeDate.setFullYear('. js_get_option('hb_date', '2011,07,28') .');';
		echo 'var today = new Date();';
		echo '</script>';
		
		echo '<div id="hello_bar">' .
				'<div class="hello-container">' .
					'<p>' . 
					js_get_option('hb_message') .
					'</p>' . 
					'<div class="close"><a href="#">X</a></div>' .
				'</div><!-- hello-container -->' .
			'</div>';
		
		echo '<div class="hello-container">'.
				'<div id="open_hello_bar"><a href="#">&darr;</a></div><!--open_hello_bar-->'.
			'</div><!--hello-container-->';
	}

}

?>