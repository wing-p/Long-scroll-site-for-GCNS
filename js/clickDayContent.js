/*** 
* This is the script for toggling the programs content for the various days throuh the clicking of the day button
Find out more at http://codepen.io/Ahmar/pen/Ajxml
***/ 

var j = jQuery.noConflict();
j(document).ready(function(){
	
	j('#tab2c, #tab3c').hide();
		// define if tab 1 (button) is click, show tab1c (tab 1 content) and hide tab2c and tab3c (tab 2 and 3 content)
		j('#tab1').click(function(){
		j('#tab1c').fadeIn();
		j('#tab1').addClass('active-tab');
		j('#tab2, #tab3').removeClass('active-tab');	
		j('#tab2c, #tab3c').hide();					  
		});
		
		j('#tab2').click(function(){
		j('#tab2c').fadeIn();
		j('#tab2').addClass('active-tab');	
		j('#tab1, #tab3').removeClass('active-tab');		
		j('#tab1c, #tab3c').hide();						  
		});
		
		j('#tab3').click(function(){
		j('#tab3c').fadeIn();
		j('#tab3').addClass('active-tab');
		j('#tab1, #tab2').removeClass('active-tab');		
		j('#tab1c, #tab2c').hide();						  
        });							 			  
});

function fadeIn( elementToFade ) {
    var element = document.getElementById(elementToFade);
	//define fading properties
    element.style.opacity += 0.1;
    if(element.style.opacity > 1.0) {
        element.style.opacity = 1.0;
    } else {
        setTimeout("fadeIn(\"" + elementToFade + "\")", 100);
    }
}