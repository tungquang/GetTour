(function($) {

	"use strict";

	// Cache Selectors
	var mainWindow		= $(window),
		myBody			= $('body'),
		mainSlider		=$('.flexslider');


	// Flex Slider
	mainWindow.on('load', function(){
		mainSlider.flexslider({
			animation: "slide",
			start: function(slider){
			  	myBody.removeClass('loading');
			},
			customDirectionNav: $('.flex-direction-nav'),
			controlNav: "thumbnails",
		});
	});

})(jQuery);
