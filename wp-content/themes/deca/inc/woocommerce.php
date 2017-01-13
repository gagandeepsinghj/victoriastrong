<?php
/*
Description: WooCommerce Setup
Theme: Deca
*/


// Removing Default CSS 
define('WOOCOMMERCE_USE_CSS', false);


// Define the default thumb sizes
add_action( 'after_switch_theme', 'un_woocommerce_image_dimensions', 1 );

function un_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}

  	$catalog = array(
		'width' 	=> '600',	// px
		'height'	=> '800',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '800',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '200',	// px
		'height'	=> '270',	// px
		'crop'		=> 1 		// true
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}


//Remove prettyPhoto lightbox
add_action( 'wp_enqueue_scripts', 'un_remove_woo_lightbox', 99 );
function un_remove_woo_lightbox() {
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
	}
}

// Shop Menu Location
add_action( 'after_setup_theme', 'un_shop_menu_location' );
function un_shop_menu_location() {
  register_nav_menu( 'shop-location', esc_html__( 'Shop Menu', 'deca' ) );
}
