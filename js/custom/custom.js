// [MASTER JAVASCRIPT]
//	Project     :	FITNESS BLOG Page
//	Version     :	1.0
//	Last Change : 	01/11/2017
//	Primary Use :   FITNESS BLOG HTML Page


$(document).on('ready', function() { 	
	"use strict"; //Start of Use Strict
	var menu_bg = $('.menu-bg');
	if(menu_bg.length) {
		var menu_bar= $('.navbar-default');
		var top_nav=$('#top-nav');
		
		//After Scroll Menu Created, Menu Bgcolor and Text Color
		var x = top_nav.offset().top
		if (x > 0) {
			menu_bar.fadeIn().css({"background-color": "#000000", "color": "#ffffff", "box-shadow": "0px 0px 5px rgba(0,0,0,0.3)"});		
		}
		else {
			menu_bar.css({"background-color": "rgba(0, 0, 0, 0.5)", "color": "#ffffff", "box-shadow": "none" });
		}

		
		$(document).on('scroll',function() {	
			var y = $(this).scrollTop();   
			if (y > 50) {
				menu_bar.fadeIn().css({"background-color": "#000000", "color": "#666666", "box-shadow": "0px 0px 5px rgba(0,0,0,0.3)"});	
			}
			else {
				menu_bar.css({"background-color": "rgba(0, 0, 0, 0.5)", "color": "#ffffff", "box-shadow": "none"});
			}
		});	
	}
	
	return false;
	// End of use strict

});

