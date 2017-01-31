/**Defining the bxslider on page
For more information read documentation on /js/bxslider/readme.md
**/ 

jQuery(document).ready(function($){
	
	//on cover of homepage, hero image
	$('.bxslider.cover').bxSlider({
	speed: 300,
    minSlides: 1,
    maxSlides: 1,
	moveSlides: 1,
	auto: true
	});
	
	//speakers carousel, with images and writeup of speakers
	$('.bxslider.speakers-info').bxSlider({
	slideWidth:300, 
    minSlides: 2,
    maxSlides: 4,
	moveSlides: 2,
    slideMargin: 10,
	auto: true
	});
}); 

