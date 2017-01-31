jQuery(function ($) {
	$('.site-header .genesis-nav-menu a').addClass("white-font");
    $(window).scroll(function(){
		
		if($(this).scrollTop()>500 && $(this).width() >= 581 ){     //if window is bigger than 581 and scroll more than 500
			$('.site-header .title-area').removeClass("hidden");   //show logo 
			$('.site-header .title-area').addClass("expand");      
			$('.site-header').addClass("black-font");              //create white background with black font
			$('.site-header .genesis-nav-menu a').removeClass("white-font");
			$('.site-header .genesis-nav-menu a').addClass("black-font");
		} else {
			$('.site-header .title-area').removeClass("expand");  
			$('.site-header .title-area').addClass("hidden");
			$('.site-header').removeClass("black-font");           //create white font 
			$('.site-header .genesis-nav-menu a').removeClass("black-font");
			$('.site-header .genesis-nav-menu a').addClass("white-font");
		}
		
		$('.fadeInBlock').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* Adjust the "200" to either have a delay or that the content starts fading a bit before you reach it  */
            bottom_of_window = bottom_of_window + 0;  
          
            if( bottom_of_window > bottom_of_object ){
				$(this).animate({'opacity':'1'},500);
			}
		});   
	});	
});