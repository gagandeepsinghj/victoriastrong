<?php
/*
Description: Assets Setup
Theme: DECA
*/

/* *************** */
/*       CSS       */
/* *************** */


// FRONTEND
add_action( 'wp_enqueue_scripts', 'un_styles' );

function un_styles() {
	
	// Bootstrapp
	wp_enqueue_style( 'un-bootstrap',  UN_THEME_URI . 'assets/css/bootstrap.css' );
	
	// Builder
	wp_enqueue_style( 'un-builder',  UN_THEME_URI . 'assets/css/builder.css' );
	
	// Icons
	wp_enqueue_style( 'un-icons',  UN_THEME_URI . 'assets/css/fonts.css' );

    // Animate
    wp_enqueue_style( 'un-animate',  UN_THEME_URI . 'assets/css/animate.css' );

	// Plugins 
	wp_enqueue_style( 'un-owl-carousel',  UN_THEME_URI . 'assets/css/owl.carousel.css' );
	wp_enqueue_style( 'un-owl-carousel-trans',  UN_THEME_URI . 'assets/css/owl.transitions.css' );
    wp_enqueue_style( 'un-magnific-popup',  UN_THEME_URI . 'assets/css/magnific-popup.css' );
    wp_enqueue_style( 'un-custom-scrollbar',  UN_THEME_URI . 'assets/css/jquery.mCustomScrollbar.css' );

	// Reset HTML
    wp_enqueue_style( 'un-reset',  UN_THEME_URI . 'assets/css/reset.css' );

    // Main
    wp_enqueue_style( 'un-main',  UN_THEME_URI . 'assets/css/main.css' );
	
	// Woocommerce
    wp_enqueue_style( 'un-woocommerce',  UN_THEME_URI . 'assets/css/woocommerce.css' );

    // Responsive
    wp_enqueue_style( 'un-responsive',  UN_THEME_URI . 'assets/css/responsive.css' );	

    // Custom CSS Code
    $custom_css = un_redux_opt( UN, 'opt-adv-custom-css' );
    wp_add_inline_style( 'un-main', $custom_css );
	
}

// BACKEND
add_action( 'admin_enqueue_scripts', 'un_backend_styles' );

function un_backend_styles() {
	
	// Backend
	wp_enqueue_style( 'un-backend',  UN_THEME_URI . 'assets/css/backend.css' );

    // Icons
    wp_enqueue_style( 'un-be-icons',  UN_THEME_URI . 'assets/css/fonts.css' );

}


/* *************** */
/*       JS        */
/* *************** */


// FRONTEND
add_action('wp_enqueue_scripts', 'un_scripts');

function un_scripts() {
		
	// Load WP jQuery UI if not included
	wp_enqueue_script('jquery-ui-core');	
	
	// Libraries
	wp_enqueue_script( 'un-owl-carousel',  UN_THEME_URI . 'assets/js/owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'un-isotope',  UN_THEME_URI . 'assets/js/isotope.pkgd.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'un-magnific-popup',  UN_THEME_URI . 'assets/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'un-custom-scrollbar',  UN_THEME_URI . 'assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), '', true );

    // GreenSock
	wp_enqueue_script( 'un-tweenmax',  UN_THEME_URI . 'assets/js/TweenMax.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'un-tweenmax-css',  UN_THEME_URI . 'assets/js/CSSPlugin.min.js', array('un-tweenmax'), '', true );
	wp_enqueue_script( 'un-tweenmax-scroll',  UN_THEME_URI . 'assets/js/ScrollToPlugin.min.js', array('un-tweenmax'), '', true );
	
	// Theme Scripts
	wp_enqueue_script( 'un-scripts',  UN_THEME_URI . 'assets/js/scripts.js', array( 'jquery' ), '', true );

}


// BACKEND
add_action( 'admin_enqueue_scripts', 'un_backend_scripts', 1 );

function un_backend_scripts() {
	
	wp_enqueue_script( 'un-backend-script',  UN_THEME_URI . 'assets/js/backend.js', array( 'jquery' ) );
	
}