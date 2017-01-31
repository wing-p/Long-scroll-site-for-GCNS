<?php
/**
 * Genesis Sample.
 *
 * This file adds the landing page template to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

//* Template Name: Home landing page

//remove post content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

//define own loop 
add_action( 'genesis_entry_content', 'home_acf_loop' ); 
function home_acf_loop() {
	
	//**start before fold
	//define post content and hook back
	$content = get_the_content();
	
	echo '<div class="home-cover">'; 
	$value = get_field( "hme_cover_image" );
	if( $value ){
		echo '<div class="bxslider cover">'; 
		 echo $value; 
		echo '</div>'; 
	}
	 echo '<div class="cover-wrap">';
	  echo '<div class="coverimg-overlay">'; 
	   echo $content;
	  echo '</div>'; 
	echo '</div>';
	
	//hook ACF value: sponsors logo before fold
	$value = get_field( "sponsors_abovefold" );
	if( $value ) {
		echo '<div class="sponsors-abovefold" id="sponsors" style="text-align:center">';
		 echo '<div class="hmecontent-wrap">';  
		  echo $value;
		 echo '</div>'; 
		echo'</div>'; 	
	} 
	else {
		echo '';
    }
	echo '</div>';
	echo '</section>';
	//**end before fold
	
	//**Start second row, right below fold event info row, brief event info
	//hook ACF value: intro on event
	$value = get_field( "hme_event_intro" );
	if( $value ) {
		echo '<div class="evnt-intro" id="brief-intro">';
		 echo '<div class="hmecontent-wrap">';  
		  echo $value; 
		 echo '</div>';
		echo '</div>'; 	
	} 
	else {
		echo '';
	}
	
    //hook segment for background 
	echo '<div class="evnt-benefits">';  
	//hook ACF value: visual benefits of events with icons
	$value = get_field( "hme_about" );
	if( $value ) {
		echo '<div class="evnt-icons">';  
		  echo $value;
		echo '</div>'; 
	} 
	else {
		echo '';
	}
		
	//hook ACF value: feature of event 
	$value = get_field( "hme_event_feature" );
	if( $value ) {
		echo '<div class="whitebg-box" id="about">';
		  echo $value;
		echo'</div>'; 	
	} 
	else {
		echo '';
	}
	echo '</div>'; //end background segment
	//**End second row
	
	//Start third row, speakers writeup and speakers profile, speakers
	//hook ACF value: Speakers intro
	echo '<div class="speakers-row" id="speakers">';
     echo '<div class="hmecontent-wrap">'; 
		//*hook intro
		$value = get_field( "hme_speakers_intro" );
			if( $value ) {
				echo $value;
			} 
			else {
				echo '';
			}
		
		//*hook speakers slider
		$value = get_field( "hme_speakers_details" );
		if( $value ) {
			echo '<div class="bxslider speakers-info">';
			 echo $value; 
			echo '</div>'; 
		} else {
			echo '';
		}
		
	 echo '</div>';  //end hmecontent-wrap
	echo '</div>';  //end speakers row
	//**end third row
	
	//Start fourth row, event agenda
	echo '<div class="agenda-row" id="agenda">';
	 echo '<div class="hmecontent-wrap">';  
	
	//hook date tab
	echo '<div class="tabs">'; 

		$value = get_field( "date_1" );  //hook day 1 date
		if( $value ) {
			echo '<a id="tab1" class="day-btn" href="#/">'; 
			echo $value;
			echo '</a>'; 
		} 
		else {
			echo '';
		}
		
		$value = get_field( "date_2" );  //hook day 2 date
		if( $value ) {
			echo '<a id="tab2" class="day-btn" href="#/">'; 
			echo $value;
			echo '</a>'; 
		} 
		else {
			echo '';
		}
		
		$value = get_field( "date_3" ); //hook day 3 date
		if( $value ) {
			echo '<a id="tab3" class="day-btn" href="#/">'; 
			echo $value;
			echo '</a>'; 
		} 
		else {
			echo '';
		}
		
	echo '</div>'; 
	//end date hook 
	
	//hook individual date info 
	echo '<div class="tabs-info">'; 
	
	  //hook ACF value for 1st day 
	  echo '<div id="tab1c">';    
		$value = get_field( "brief_day1" );   //hook text area
		if( $value ) {
			echo '<p class="first-col">'; 
			echo $value;
			echo '</p>'; 
		} 
		else {
			echo '';
		}
		
		$value = get_field( "agenda_day1" );   //hook timeline
		if( $value ) {
			echo '<section class="second-col">'; 
			echo $value;
			echo '</section>'; 
		} 
		else {
			echo '';
		}
	  echo '</div>'; 
      //end 1st day 	  

	  //hook ACF value for 2nd day 
	  echo '<div id="tab2c">';    
		$value = get_field( "brief_day2" );   //hook text area
		if( $value ) {
			echo '<p class="first-col">'; 
			echo $value;
			echo '</p>'; 
		} 
		else {
			echo '';
		}
		
		$value = get_field( "agenda_day2" );   //hook timeline
		if( $value ) {
			echo '<section class="second-col">'; 
			echo $value;
			echo '</section>'; 
		} 
		else {
			echo '';
		}
	  echo '</div>'; 
      //end 2nd day 

	  //hook ACF value for 3rd day 
	  echo '<div id="tab3c">';    
		$value = get_field( "brief_day3" );   //hook text area
		if( $value ) {
			echo '<p class="first-col">'; 
			echo $value;
			echo '</p>'; 
		} 
		else {
			echo '';
		}
		
		$value = get_field( "agenda_day3" );   //hook timeline
		if( $value ) {
			echo '<section class="second-col">'; 
			echo $value;
			echo '</section>'; 
		} 
		else {
			echo '';
		}
	  echo '</div>'; 
      //end 3rd day 
	  
	  echo '</div>';  // close tab-info
	 echo '</div>';	 //end hmecontent-wrap
	echo '</div>'; 	//end agenda-row
	//**end fourth row
	
	//**Start fifth row, event call to action, exhibitors and registration 
	//hook ACF value: about sponsors and exhibitors
	$value = get_field( "hme_exhibitors" );
	if( $value ) {
		echo '<div class="vendors" id="exhibitors">';
		 echo '<div class="hmecontent-wrap">';
		  echo $value;
		 echo '</div>'; 
		echo '</div>'; 
	} 
	else {
		echo '';
    }
	
	//hook ACF value: registration 
	$value = get_field( "hme_registration" );
	if( $value ) {
		echo '<div class=" registration">';
		 echo '<div class="one-whole parallax">';
		  echo '<div class="hmecontent-wrap">';
		   echo $value;
		  echo '</div>'; 
		 echo '</div>'; 
		echo '</div>'; 
	} 
	else {
		echo '';
    }
	
	//hook ACF value: social media link
	$value = get_field( "hme_social_media" );
	if( $value ) {
		echo '<div class="hme-social-media" id="gcns-socialmeda">';
		 echo '<div class="hmecontent-wrap">'; 
		 echo $value;
		 echo '</div>';
		echo '</div>'; 
	} 
	else {
		echo '';
    }
	
	//hook ACF value: partners logo
	$value = get_field( "partners_logo" );
	if( $value ) {
			echo '<div class="partners-row" id="partners">';
			 echo '<div class="hmecontent-wrap fadeInBlock">'; 
			  echo $value;
			 echo '</div>';
			echo '</div>'; 
	} 
	else {
		echo '';
    }
}

genesis(); 