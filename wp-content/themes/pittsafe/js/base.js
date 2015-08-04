jQuery(document).ready(function(){
	"use strict";

	/* Mobile Menu */
	jQuery(document).ready(function () {
		jQuery('header nav.site-navigation').meanmenu();
	});

	/* FitVids */
	jQuery(document).ready(function(){
		// Target your .container, .wrapper, .post, etc.
		jQuery(".WPlookLatestNews .image, iframe").fitVids();
	});
	
	/* Slick slide */
	jQuery('.slides').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		cssEase: 'linear',
		autoplay: true,
		pauseOnHover: false,
		autoplaySpeed: 7000,
		infinite: true,
		dots: true
	});

	jQuery('.project-slides').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		fade: true,
		cssEase: 'linear',
		autoplay: false,
		infinite: true,
		dots: false
	});

	jQuery('.flex-prev').click(function(){
		jQuery('.home .slick-prev')[0].click();
	}); 
	jQuery('.flex-next').click(function(){
		jQuery('.home .slick-next')[0].click();
	});

	/* Stick the menu */   
	jQuery(function() {
		// grab the initial top offset of the navigation 
		var sticky_navigation_offset_top = jQuery('#sticky_navigation').offset().top+40;
		
		// our function that decides weather the navigation bar should have "fixed" css position or not.
		var sticky_navigation = function(){
			var scroll_top = jQuery(document).scrollTop(); // our current vertical position from the top
			
			// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
			if (scroll_top > sticky_navigation_offset_top) { 
				jQuery('#sticky_navigation').stop(true).animate({ 'padding':'30px 0 25px 0;','min-height':'60px','opacity' : 0.99 }, 500);
				jQuery('#sticky_navigation').css({'position': 'fixed', 'top':0, 'left':0 });
			} else {
				jQuery('#sticky_navigation').stop(true).animate({ 'padding':'20px 0;','min-height':'60px', 'opacity' : 1}, 100);
				jQuery('#sticky_navigation').css({ 'position': 'relative' }); 
			}
		};
		
		sticky_navigation();

		jQuery(window).scroll(function() {
			sticky_navigation();
		});

	});


});