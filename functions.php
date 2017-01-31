<?php
/***Generic customisation across web 
***/ 
add_action( 'genesis_setup','child_theme_setup', 15 );
//set up child theme
function child_theme_setup() {
	define( 'CHILD_THEME_NAME', 'inspire' );
	define( 'CHILD_THEME_URL', 'http://www.mysantosh.com' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );	
	} 

//enable HTML5 
add_theme_support( 'html5');
add_theme_support( 'genesis-responsive-viewport' );
add_theme_support( 'genesis-footer-widgets', 1 ); 

//* Remove the entry title (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

//Load custom.css
add_action( 'wp_enqueue_scripts', 'custom_load_custom_style_sheet' );
function custom_load_custom_style_sheet() {
	wp_enqueue_style( 'custom-stylesheet', CHILD_URL . '/custom.css', array(), PARENT_THEME_VERSION );
	wp_enqueue_script('jquery');
	}

//customise genesis wrap 
add_theme_support( 'genesis-structural-wraps', array( 'header', 'entry-content', 'site-inner', 'footer-widgets', 'footer' ) );

//customised site footer 
function gcns_footer_creds_text () {
	$copyright = '<div class="creds"><p> ' . date('Y') . ' &middot; An initiative by <a href="http://www.csrsingapore.org/" target="_blank">Global Compact Network Singapore</a> &middot; </p></div>';
	return $copyright;
 }
add_filter( 'genesis_footer_creds_text', 'gcns_footer_creds_text' );

//Hook/unhook navigation bar and hook/unhook site header 
add_action( 'get_header', 'gcns_change_header' );
function gcns_change_header() {
	if (is_page_template('homepage.php')) {
		//hook site header and unhook navigation bar 
		remove_action ('genesis_after_header', 'genesis_do_nav');
	} else {
		remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
		remove_action( 'genesis_header', 'genesis_do_header' );
		remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
		add_action ('genesis_after_header', 'genesis_do_nav');
	} 
}

//Enqueue scroll animation on homepage
add_action( 'wp_enqueue_scripts', 'sds_enqueue_scroll_scripts' );
function sds_enqueue_scroll_scripts() {
	if (is_page_template('homepage.php')) {
		wp_enqueue_script( 'scroll-effects', get_stylesheet_directory_uri() . '/js/scrollEffects.js', array( 'jquery' ), '1.0' );
	}
}

//Enqueue carousel animation 
add_action( 'wp_enqueue_scripts', 'sds_enqueue_bxslider_scripts' );
function sds_enqueue_bxslider_scripts() {
	wp_enqueue_script( 'bxslider', get_stylesheet_directory_uri() . '/js/bxslider/jquery.bxslider.min.js', array( 'jquery' ), '1.0' );
	wp_enqueue_style( 'bxslider-style', get_stylesheet_directory_uri() . '/js/bxslider/jquery.bxslider.css', array());
	}
	
//* Enqueue actual bxslider file	
add_action( 'wp_enqueue_scripts', 'sds_enqueue_hmebxslider_scripts' );
function sds_enqueue_hmebxslider_scripts() {
	wp_enqueue_script( 'hme-bxslider', get_stylesheet_directory_uri() . '/js/enqueuebxslider.js', array( 'jquery' ), '1.0' );
}

//Equeue topnav jump to section
//* Enqueu actual bxslider file	
add_action( 'wp_enqueue_scripts', 'sds_enqueue_navtosection_scripts' );
function sds_enqueue_navtosection_scripts() {
	if (is_front_page() && is_page(83)) {
		wp_enqueue_script( 'navtosection', get_stylesheet_directory_uri() . '/js/navToSection.js', array( 'jquery' ), '1.0' );
	}
}

//Enqueue click on day animation
add_action( 'wp_enqueue_scripts', 'sds_enqueue_clickdaycontent_scripts' );
function sds_enqueue_clickdaycontent_scripts() {
	wp_enqueue_script( 'clickdaycontent', get_stylesheet_directory_uri() . '/js/clickDayContent.js', array( 'jquery' ), '1.0' );
}

//Hook team page ACF
add_action( 'genesis_entry_content', 'gcns_teampage', 20 ); 
function gcns_teampage() {
	if (is_page(28)) {
	
	echo '<div class="youth-team">';
	
	$value = get_field( "youth_team" );
		if( $value ) {
			 echo '<div class="image-block">';
				echo $value;
			 echo '</div>';
		} 
		else {
			echo '';
		}
		
	$value = get_field( "teammates_name" );
		if( $value ) {
			 echo '<div class="individual-details">';
				echo $value;
			 echo '</div>';
		} 
		else {
			echo '';
		}
	
	echo '</div>'; 	
	}	
}
add_action( 'wp_enqueue_scripts', 'gcns_youth_team_pg' );
function gcns_youth_team_pg() {
	if (is_page('the-team')) {
		wp_enqueue_script( 'youth-team-info', get_stylesheet_directory_uri() . '/js/teamPage.js', array( 'jquery' ), '1.0' );
	}
}