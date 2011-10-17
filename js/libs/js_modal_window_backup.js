/*---------------------------*/
/*	Modal Window - On Load
/*---------------------------*/

//<div class="modal">
//<span class="close alignright">X</span>
//content goes here
//</div>
//<div class="overlay"></div>

jQuery(document).ready(function(){

	//Settings
	var $js_display_modal = true;
	var $js_display_overlay = true;//display overlay true/false
	var $js_modal_overlay_click = true;//Close modal on overlay click
	var $js_modal_fade = 500;//fadein speed in miliseconds

	//Elements
	var $js_modal = jQuery('.modal');//Define the modal inner div id/class/selector
	var $js_modal_close = jQuery('.modal .close');//Define the close id/class
	var $js_modal_overlay = jQuery('.overlay');//Define the modal overlay id/class

	//if $js_display_modal = true, display modal window
	if ($js_display_modal === true) {
	
		if (jQuery.cookie('js_modal') === 'clodsed') {
		    $js_modal.hide();
		    $js_modal_overlay.hide();
		} else {
			$js_modal.fadeIn($js_modal_fade);
			if ($js_display_overlay === true) {
				$js_modal_overlay.fadeIn($js_modal_fade);
			}
			$js_modal.css({'margin-top' : -$js_modal.outerHeight()/2, 'margin-left' : -$js_modal.outerWidth()/2});//Center div according to height of the content
		}
		
		//Close modal on close click	
		$js_modal_close.click( function () {
			$js_modal.fadeOut($js_modal_fade, function () {
				$js_modal.hide();
			});
			$js_modal_overlay.fadeOut($js_modal_fade, function () {
				$js_modal_overlay.hide();
			});
			jQuery.cookie('js_modal', 'closed', { path: '/'});
			return false;
		});
		
		if ($js_display_overlay === true && $js_modal_overlay_click === true) {
		//Close modal on close click	
		$js_modal_overlay.click( function () {
			$js_modal.fadeOut($js_modal_fade, function () {
				$js_modal.hide();
			});
			$js_modal_overlay.fadeOut($js_modal_fade, function () {
				$js_modal_overlay.hide();
			});
			jQuery.cookie('js_modal', 'closed', { path: '/'});
			return false;
		});
		}
	
	}
			
});