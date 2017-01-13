<?php
/*
Description: Theme Metaboxes
Theme: Deca
*/

if ( ! function_exists( 'un_metaboxes' ) ){

function un_metaboxes( $metaboxes ) {
	
//**************//
//     PAGE     //
//**************//	

if ( class_exists( 'WooCommerce' ) ) {
	$page_general_title = esc_html__( 'General Settings (not available for WooCommerce pages)', 'deca');
}else{
	$page_general_title = esc_html__( 'General Settings', 'deca');
}

$page_general[] = array(

	'fields' => array(	

		// Header Type
        array(
            'id'       => 'meta-header-type',
            'type'     => 'select',
            'title'    => esc_html__('Header Type', 'deca'),
            'options'  => array(
                'border' => esc_html__('Border', 'deca'),
                'top' => esc_html__('Top', 'deca'),
            ),
            'default'  => '',
        ),
		
		// Top Header Settings
        array(
            'id'       => 'meta-header-top-type',
            'type'     => 'select',
            'title'    => esc_html__('Header Background', 'deca'),
            'options'  => array(
                'white' => esc_html__('White', 'deca'),
                'black' => esc_html__('Black', 'deca'),
				'transp_white' => esc_html__('Transparent (Menu White)', 'deca'),
                'transp_black' => esc_html__('Transparent (Menu black)', 'deca'),
            ),
            'default'  => 'white',
			'required' => array('meta-header-type','equals','top'),
        ),

        // Header Title
        array(
            'id'       => 'meta-header-title',
            'type'     => 'switch',
            'title'    => esc_html__('Header Title', 'deca'),
			'subtitle' => esc_html__('Not available for the "Visual Composer Page" template'),
            'default'  => true,            
        ),

        // Footer Widgets
        array(
            'id'       => 'meta-footer-widgets',
            'type'     => 'switch',
            'title'    => esc_html__('Footer Widgets', 'deca'),
            'default'  => true,
        ),
		
	),
);

$metaboxes[] = array(

	'id' => 'page_general_settings',

	'title' => $page_general_title,

	'post_types' => array( 'page' ),

	'position' => 'normal',

	'priority' => 'hight',

	'sidebar' => false,

	'sections' => $page_general,

);


// RETURN METAS
return $metaboxes;

}

add_action( 'redux/metaboxes/' . UN . '/boxes', 'un_metaboxes' );

} 
