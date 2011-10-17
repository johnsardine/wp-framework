/*---------------------------*/
/*	Jquery Scripts
/*---------------------------*/

jQuery(document).ready(function(){

	jQuery('#jquery-test').hide();
	
	jQuery('#item-gallery .slides_container').fadeIn('slow');
		
	if (jQuery().validate) {
		jQuery("#contact-form").validate({
		errorElement: "span",
		errorClass: "invalid",
		validClass: "success"
		});
	}
		
	//Hide Div after certain time
	setTimeout(function(){
		jQuery(".fade").fadeOut("slow", function () {
			jQuery(".fade").hide();
		});
	}, 4000);
	
	/* Superfish Menu */
	if (jQuery().superfish) {
		jQuery('ul.menu').superfish();
	}
	
	/* Add magnifiying glass to images with hyperlink */
	//jQuery('.zoom img').parents('a').addClass('inline-block hover').prepend('<span></span>');
	
	//Add fancybox to each image in .post with hyperlink
	var $thumbnails = 'a:has(img)[href$=".bmp"],a:has(img)[href$=".gif"],a:has(img)[href$=".jpg"],a:has(img)[href$=".jpeg"],a:has(img)[href$=".png"],a:has(img)[href$=".BMP"],a:has(img)[href$=".GIF"],a:has(img)[href$=".JPG"],a:has(img)[href$=".JPEG"],a:has(img)[href$=".PNG"]';

	
	var $posts = jQuery('.post, #portfolio-holder');

	$posts.each(function() {
	    jQuery(this).find($thumbnails).addClass("fancybox").attr('rel','fancybox'+$posts.index(this))
	});
	
	/* Single Portfolio Gallery */
	if (jQuery().slides) {
		jQuery('#individual-item').slides({
			autoHeight: true,
			preload: false,
			effect: 'fade',
			slideSpeed: 350,
			fadeSpeed: 250,
			crossfade: false,
			bigTarget: true,
			autoHeightSpeed: 300,
			paginationClass: 'thumbs',
			generateNextPrev: false,
			generatePagination: false
		});	
	}
	
	if (jQuery().fancybox) {
		/* Load Fancybox*/
		jQuery(".fancybox").fancybox({
			'padding' : 10,
			'modal' : false,
			'opacity' : true,
			
			'overlayShow' : true,
			'overlayOpacity' : 0.3,
			'overlayColor' : '#fff',
			
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic',
			
			'easingIn' : 'swing',
			'easingOut' : 'swing',
			
			'autoScale' : false,
			'autoDimensions' : false,
			'centerOnScroll' : false,
			
			'hideOnOverlayClick' : true,
			'hideOnContentClick' : true,
			
			'showCloseButton'	 : true,
			'showNavArrows' : true,
			'enableEscapeButton' : true,
			'enableKeyboardNav' : true
		});
	}
		
	if (jQuery().quicksand) {
	
		/* Load QuickSand Filtering */
			
		// get the action filter option item on page load
		var $filterType = jQuery('#portfolio-filter li.current a').attr('class');
		
		// get and assign the ourHolder element to the
		// $holder varible for use later
		var $holder = jQuery('#portfolio-holder');
		
		// clone all items within the pre-assigned $holder element
		var $data = $holder.clone();
		
		// attempt to call Quicksand when a filter option
		// item is clicked
		jQuery('#portfolio-filter li a').click(function(e) {
		// reset the active class on all the buttons
		jQuery('#portfolio-filter li').removeClass('current');
		
		// assign the class of the clicked filter option
		// element to our $filterType variable
		var $filterType = jQuery(this).attr('data-type');
		jQuery(this).parent().addClass('current');
		if ($filterType == 'all') {
			// assign all li items to the $filteredData var when
			// the 'All' filter option is clicked
			var $filteredData = $data.find('li');
		}
		else {
			// find all li elements that have our required $filterType
			// values for the data-type element
			var $filteredData = $data.find('li[data-type~=' + $filterType + ']');
		}
		
		// call quicksand and assign transition parameters
		$holder.quicksand($filteredData, {
			duration: 500,
			adjustHeight: 'false'
			
		},function() {	// callback function		
			jQuery(".fancybox").fancybox({
				'padding' : 10,
				'modal' : false,
				'opacity' : true,
				
				'overlayShow' : false,
				'overlayOpacity' : 0.7,
				'overlayColor' : '#777',
				
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				
				'easingIn' : 'swing',
				'easingOut' : 'swing',
				
				'autoScale' : false,
				'autoDimensions' : false,
				'centerOnScroll' : false,
				
				'hideOnOverlayClick' : true,
				'hideOnContentClick' : true,
				
				'showCloseButton'	 : true,
				'showNavArrows' : true,
				'enableEscapeButton' : true,
				'enableKeyboardNav' : true
			});
		},function constantHeight() {
			//get element height and applly in order to be constant
			jQuery('#portfolio-holder').css('height', jQuery('#portfolio-holder').parent('.main').outerHeight());
		}
		
		);
		return false;
		});
	
	}
});       
       
/*---------------------------*/
/*	Modal Window (wp only) - On Load
/*---------------------------*/
jQuery(document).ready(function(){

	//Settings
	var $js_modal_fade = 500;//fadein speed in miliseconds

	//Elements
	var $js_modal = jQuery('.modal');//Define the modal inner div id/class/selector
	var $js_modal_close = jQuery('.modal .close');//Define the close id/class
	var $js_modal_overlay = jQuery('.overlay');//Define the modal overlay id/class

	//if $js_modal element exists, display modal window
	if ($js_modal.length) {
	
		if (jQuery.cookie('js_modal') === 'closed') {
		    $js_modal.hide();
		    $js_modal_overlay.hide();
		} else {
			$js_modal.fadeIn($js_modal_fade);
			if ($js_modal_overlay.length) {
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
		
		if ($js_modal_overlay.length && $js_modal_overlay.hasClass('close')) {
		//if overlay exists and has class .close
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

/*---------------------------*/
/*	Hello bar
/*---------------------------*/
	
jQuery(document).ready(function() {

if (jQuery('#hello_bar').length) {

	if(closeDate != null) {
		
		if (closeDate < today)
		{
			//Do not display if it's after the close date
			jQuery('#hello_bar').hide();
			jQuery('#open_hello_bar').hide();
		}
		
		jQuery('#hello_bar .close').click( function () {
		
			jQuery('#hello_bar').animate({marginTop: -40}, 200, function() {
				
				jQuery('#open_hello_bar').animate({marginTop: 0}, 200).animate({marginTop: 0}, 90);
				
				jQuery.cookie("helloBar", "close", { path: '/' });
				
			});
			
			return false;
			
		});
		
		jQuery('#open_hello_bar').click( function () {
		
			jQuery(this).animate({marginTop: -100}, 400, '', function () {
				
				jQuery('#hello_bar').animate({marginTop: 0}, 200).animate({marginTop: 0}, 90)
				
				jQuery.cookie("helloBar", "open", { path: '/' });
				
			});
			
			return false;
	
		});
		
		if(jQuery.cookie("helloBar") === 'close')
		{
			jQuery('#hello_bar').css("marginTop", -40);
			jQuery('#open_hello_bar').css("marginTop", 0);
		}
		else
		{
			jQuery('#hello_bar').css("marginTop", 0);
			jQuery('#open_hello_bar').css("marginTop", -100);
		}
	}

}

});