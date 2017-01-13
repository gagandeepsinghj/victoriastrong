<?php
/*
Description: Visual Composer Row Customization
Theme: DECA
*/


/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_height
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 
 * unCommons vars
 * @var $container
 * @var $overlay
 * @var $text_color
 * @var $onepage_menu
 * @var $bg_position
 */
 
 
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

$wrapper_attributes = array();

$data_attr = '';

// build attributes for wrapper

if ( ! empty( $el_id ) ) {
	if ( ! empty( $onepage_menu ) ) {
		$wrapper_attributes[] = 'id="' . un_sanitize_string( $onepage_menu ) . '"';
		$css_classes[] = ' un-onepage';
		$data_attr = ' data-onepage-label="'.$onepage_menu.'"';
	}
	else {
		$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
	}
}
else {
	if ( ! empty( $onepage_menu ) ) {
		$wrapper_attributes[] = 'id="' . un_sanitize_string( $onepage_menu ) . '"';
		$css_classes[] = ' un-onepage';
		$data_attr = ' data-onepage-label="'.$onepage_menu.'"';
	}	
}

if ( ! empty( $bg_position) ) {
	
		$wrapper_attributes[] = 'style="background-position: '.esc_attr($bg_position).'"';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = ' vc_row-o-full-height';
	if ( ! empty( $content_placement ) ) {
		$css_classes[] = ' vc_row-o-content-' . $content_placement;
	}
}

if ( ! empty( $overlay ) ) {
	$css_classes[] = ' '.$overlay;
}

if ( ! empty( $text_color ) ) {
	$css_classes[] = ' '.$text_color;
}

// use default video if user checked video, but didn't choose url
if ( ! empty( $video_bg ) && empty( $video_bg_url ) ) {
	$video_bg_url = 'https://www.youtube.com/watch?v=lMJXxhRFO1k';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_image = $video_bg_url;
	$css_classes[] = ' vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="1.5"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( strpos( $parallax, 'fade' ) !== false ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( strpos( $parallax, 'fixed' ) !== false ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty ( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

// Woocommerce Custom CSS fix
if( un_is_woocommerce() ){
	$output .= '<style>'.$css.'</style>';
}

$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' '.$data_attr.'>';

if ( $container ==  '1' ) {
	$output .= '<div class="un-box">';
}

$output .= wpb_js_remove_wpautop( $content );

if ( $container ==  '1' ) {
	$output .= '</div>';
}

$output .= '</div>';
$output .= $after_output;
$output .= $this->endBlockComment( $this->getShortcode() );

un_echo( $output, 'full' );