<?php
/*
Description: Visual Composer Setup
Theme: DECA
*/


// Theme Integration
add_action( 'vc_before_init', 'un_vc_theme_integration' );

function un_vc_theme_integration() {
	
    if( function_exists('vc_set_as_theme') ){ 
		vc_set_as_theme(true); 
	}
	
	if( function_exists('vc_set_shortcodes_templates_dir') ){ 
		vc_set_shortcodes_templates_dir( UN_THEME_DIR . 'inc/vc-blocks/defaults' );
	}
	
}

/*************/
/* REMAPPING */
/*************/

// VC ROW
vc_remove_param( 'vc_row', 'full_width' );
vc_remove_param( 'vc_row', 'columns_placement' );
vc_remove_param( 'vc_row', 'content_placement' );

$vc_row_attr = array(

	// Boxed Container
	array(
		'type' => 'checkbox',
		'heading' => esc_html__( 'Boxed Container', 'deca'),
		'param_name' => 'container',
		'value' => array( esc_html__( 'Enable', 'deca') => true ),
		'weight' => 1,
	),
		
	// Overlay Effect
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Overlay Effect', 'deca'),
		'param_name' => 'overlay',
		'description' => esc_html__('Add an overlay effect on your row', 'deca'),	
		'value' => array( 
			esc_html__('None', 'deca') => '', 
			esc_html__('Light 90%', 'deca') => 'un-bg-w-90',
			esc_html__('Light 80%', 'deca') => 'un-bg-w-80',
			esc_html__('Light 70%', 'deca') => 'un-bg-w-70',
			esc_html__('Light 60%', 'deca') => 'un-bg-w-60',
			esc_html__('Light 50%', 'deca') => 'un-bg-w-50',
			esc_html__('Light 40%', 'deca') => 'un-bg-w-40',
			esc_html__('Light 30%', 'deca') => 'un-bg-w-30',
			esc_html__('Light 20%', 'deca') => 'un-bg-w-20',
			esc_html__('Light 10%', 'deca') => 'un-bg-w-10',
			esc_html__('Dark 90%', 'deca') => 'un-bg-b-90',
			esc_html__('Dark 80%', 'deca') => 'un-bg-b-80',
			esc_html__('Dark 70%', 'deca') => 'un-bg-b-70',
			esc_html__('Dark 60%', 'deca') => 'un-bg-b-60',
			esc_html__('Dark 50%', 'deca') => 'un-bg-b-50',
			esc_html__('Dark 40%', 'deca') => 'un-bg-b-40',
			esc_html__('Dark 30%', 'deca') => 'un-bg-b-30',
			esc_html__('Dark 20%', 'deca') => 'un-bg-b-20',
			esc_html__('Dark 10%', 'deca') => 'un-bg-b-10',
			
		),
	),
	
	// Text Color
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Text Color', 'deca'),
		'param_name' => 'text_color',
		'description' => esc_html__('Choose the color text inside', 'deca'),	
		'value' => array( 
			esc_html__('Default', 'deca') => '', 
			esc_html__('Light', 'deca') => 'un-txt-w',
			esc_html__('Dark', 'deca') => 'un-txt-b',
		),
	),
		
	// Onepage Menu
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Onepage Menu', 'deca'),
		'param_name' => 'onepage_menu',	
		'description' => esc_html__('Choose a menu label if you want to link this row to a onepage menu button', 'deca'),
	),
	
	// Gap
	array(
		'type' => 'dropdown',
		'heading' => __( 'Columns gap', 'deca' ),
		'param_name' => 'gap',
		'value' => array(
			'0px' => '0',
			'1px' => '1',
			'2px' => '2',
			'3px' => '3',
			'4px' => '4',
			'5px' => '5',
			'10px' => '10',
			'15px' => '15',
			'20px' => '20',
			'25px' => '25',
			'30px' => '30',
			'35px' => '35',
		),
		'std' => '30',
		'description' => __( 'Select gap between columns in row.', 'deca' ),
	),
	
	// Row ID	
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Row ID', 'deca'),
		'param_name' => 'el_id',	
		'description' => wp_kses(__('Enter row ID (Note: make sure it is unique and valid according to <a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'deca'), wp_kses_allowed_html( 'post')),	
		'weight' => -1,
			   
	),
	
	// Extra Class
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Extra class name', 'deca'),
		'param_name' => 'el_class',	
		'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'deca'),	
		'weight' => -1,
	),
	
	// BG Position
	array(
		'type' => 'textfield',
		'heading' => esc_html__('BG Position', 'deca'),
		'param_name' => 'bg_position',	
		'description' => esc_html__('Set the position of background', 'deca'),	
		'weight' => -1,
		'group' => esc_html__('Design Options', 'deca'),
	),
	
	
);

vc_add_params( 'vc_row', $vc_row_attr ); 


// VC COLUMN 
$vc_column_attr = array(
	
	// Text Align
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Text Align', 'deca'),
		'param_name' => 'txt_align',	
		'value' => array( 
			esc_html__('Auto', 'deca') => '', 
			esc_html__('Left', 'deca') => 'un-txt-l', 
			esc_html__('Center', 'deca') => 'un-txt-c',
			esc_html__('Right', 'deca') => 'un-txt-r',  
			esc_html__('Justified', 'deca') => 'un-txt-j', 
		),	
		'weight' => 10,	   
	),
	
	// CSS Animation
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('CSS Animation', 'deca'),
		'param_name' => 'css_animation',	
		'value' => array( 
			esc_html__('No', 'deca') => '', 
			esc_html__('Top to bottom', 'deca') => 'top-to-bottom', 
			esc_html__('Bottom to top', 'deca') => 'bottom-to-top',
			esc_html__('Left to right', 'deca') => 'left-to-right',  
			esc_html__('Right to left', 'deca') => 'right-to-left', 
			esc_html__('Appear from center', 'deca') => 'appear', 
		),	
		'weight' => 9,	   
	),
	
);

vc_add_params( 'vc_column', $vc_column_attr );



/***************************/
/* DEFAULT BLOCKS REMOVING */
/***************************/

vc_remove_element( 'vc_separator' );
vc_remove_element( 'vc_text_separator' );
vc_remove_element( 'vc_basic_grid' );
vc_remove_element( 'vc_teaser_grid' );
vc_remove_element( 'vc_toggle' );
vc_remove_element( 'vc_toggle_old' );
vc_remove_element( 'vc_accordion' );
vc_remove_element( 'vc_tabs' );
vc_remove_element( 'vc_tour' );
vc_remove_element( 'vc_gallery' );
vc_remove_element( 'vc_posts_grid' );
vc_remove_element( 'vc_posts_slider' );
vc_remove_element( 'vc_pie' );
vc_remove_element( 'vc_video' );
vc_remove_element( 'vc_wp_search' );
vc_remove_element( 'vc_wp_calendar' );
vc_remove_element( 'vc_wp_categories' );
vc_remove_element( 'vc_images_carousel' );
vc_remove_element( 'vc_widget_sidebar' );
vc_remove_element( 'vc_flickr' );
vc_remove_element( 'vc_media_grid' );
vc_remove_element( 'vc_masonry_grid' );
vc_remove_element( 'vc_masonry_media_grid' );
vc_remove_element( 'vc_button' );
vc_remove_element( 'vc_button2' );
vc_remove_element( 'vc_cta' );
vc_remove_element( 'vc_cta_button' );
vc_remove_element( 'vc_cta_button2' );
vc_remove_element( 'vc_round_chart' );
vc_remove_element( 'vc_progress_bar' );
vc_remove_element( 'vc_line_chart' );
vc_remove_element( 'vc_message' );
vc_remove_element( 'vc_custom_heading' );
vc_remove_element( 'vc_gmaps' );


/****************/
/* THEME BLOCKS */
/****************/

// Hero Heading 1
if( !class_exists('unHeroHead1') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/hero_head_1.php' );
}

// Hero Heading 2
if( !class_exists('unHeroHead2') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/hero_head_2.php' );
}

// Service Standard
if( !class_exists('unService1') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/service_1.php' );
}

// Service label Rotator
if( !class_exists('unService2') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/service_2.php' );
}

// Service with Icon
if( !class_exists('unService3') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/service_3.php' );
}

// Service with Background
if( !class_exists('unService4') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/service_4.php' );
}

// Separator
if( !class_exists('unSeparator') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/separator.php' );
}

// Quotes Carousel
if( !class_exists('unQuotes') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/quotes.php' );
}

// Team Members
if( !class_exists('unTeamMember') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/team.php' );
}

// Pricing Tables
if( !class_exists('unPricing') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/pricing.php' );
}

// Callout
if( !class_exists('unCallout') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/callout.php' );
}

// Clients
if( !class_exists('unClients') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/clients.php' );
}

// Image
if( !class_exists('unImageFrame') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/image_frame.php' );
}

// Page Heading
if( !class_exists('unPageHead') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/page_head.php' );
}

// Blog
if( !class_exists('unBlogGrid') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/blog_grid.php' );
}

// Blog Feeds
if( !class_exists('unBlogFeeds') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/blog_feeds.php' );
}

// Blog Media
if( !class_exists('unBlogMedia') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/blog_media.php' );
}

// Blog Masonry
if( !class_exists('unBlogMasonry') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/blog_masonry.php' );
}

// Portfolio
if( !class_exists('unWorksGrid') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/portfolio.php' );
}

// Case Studies
if( !class_exists('unCaseStudies') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/case_studies.php' );
}

// Case List
if( !class_exists('unCaseList') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/case_list.php' );
}

// Case Study
if( !class_exists('unCase') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/case_study.php' );
}

// Item Gallery
if( !class_exists('unItemGall') ) {
	require_once( UN_THEME_DIR.'inc/vc-blocks/item_gall.php' );
}

// Gallery
if( !class_exists('unGallery') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/gallery.php' );
}

// Carousel
if( !class_exists('unCarousel') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/carousel.php' );
}

// Slider
if( !class_exists('unSlider') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/slider.php' );
}

// Case Studies
if( !class_exists('unSidebar') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/sidebar.php' );
}

// Banner
if( !class_exists('unBanner') ) {
    require_once( UN_THEME_DIR.'inc/vc-blocks/banner.php' );
}