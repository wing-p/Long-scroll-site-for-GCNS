/** Format team member page
**/ 

jQuery(document).ready(function($){ 
	
//add incremental number to images
 
var i = 1; 
$('.image-block img').each(function(){
	$(this).addClass('team team-pic-'+ i++);
});

var j = 1; 
$('.individual-details p').each(function(){
	$(this).addClass('identity team-name-'+ j++);
});



});