<?php
/*
Description: VC Image Caption
Theme: DECA
*/

// Block Class 
class unImageFrame extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_image_frame_map' ) );
        add_shortcode( 'un_image_frame', array( $this, 'un_image_frame_short' ) );
    }
 	
	// Block Map
    public function un_image_frame_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Image Frame', 'deca'),
				'base' => 'un_image_frame',
				'description' => esc_html__('Add an image with frame', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(	
					
					// Image									
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image', 'deca'),
						'param_name' => 'image',	
						'description' => esc_html__('Upload your image', 'deca'),		   
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
					
					array(
						'type' => '',
						'heading' => esc_html__('Customize the Image', 'deca'),
						'description' => esc_html__('Leave the fields in blank to use the full image size', 'deca'),		
						'param_name' => 'design_head',	
						'group' => esc_html__('Design Options', 'deca'),
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Image Width', 'deca'),
						'param_name' => 'width',	
						'description' => esc_html__('Use an integer value (es. 800), it will be converted in pixels', 'deca'),	
						'group' => esc_html__('Design Options', 'deca'),
					),
					
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Image Height', 'deca'),
						'param_name' => 'height',	
						'description' => esc_html__('Use an integer value (es. 800), it will be converted in pixels', 'deca'),	
						'group' => esc_html__('Design Options', 'deca'),
					),	
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Frame Image', 'deca'),
						'param_name' => 'frame',	
						'description' => esc_html__('Add a border frame to image', 'deca'),	
					),
					
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Image Crop', 'deca'),
						'param_name' => 'crop',	
						'description' => esc_html__('To crop the image to your sizes (you have to compile both sizes)', 'deca'),	
						'group' => esc_html__('Design Options', 'deca'),
					),	
					
					// Caption
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',	
						'description' => esc_html__('The caption title', 'deca'),	
						'holder' => 'div',	   
					),	
										
					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Caption Color', 'deca'),
						'param_name' => 'color',
						'value' => array( esc_html__( 'Dark', 'deca') => '',  esc_html__('Light', 'deca') => 'un-txt-w' ),
						'description' => esc_html__( 'You could need to change the caption color on the base of your image.', 'deca'),
					),
					
					// Special Features
					array(
						'type' => '',
						'param_name' => 'info_special',	
						'description' => wp_kses(__('<i class="fa fa-info-circle"></i> To manage special section features like the overlay, the full-height and bg you have to edit the <b>Row Options</b>', 'deca'), wp_kses_allowed_html( 'post')),	
						'group' => esc_html__('Special Features', 'deca'),		   
					),
				),
			)
		);					  			  
	   
    } // End Block Map
	
	
	// Block Shortcode
	public function un_image_frame_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'image'	=> '',
					'overlay' => '',
					'frame' => false,
					'width' => '',	
					'height' => '',	
					'crop' => false,	
					'title'     => '',
					'color' => '',	
				), 
				$atts
			)
		);
		
		
		$html = '';
		
		// Build Image
		if ( $image > 0 ) {
			
			// Build Image Shape
			if( !$width || !$height ){
				$crop = false;
			}
			
			if($width || $height) {
				$image_html = un_get_the_attachment( $image, $width, $height, $crop, true );
			}else{
				$thumbnail_obj = wpb_getImageBySize( array(
					'attach_id' => $image,
					'thumb_size' => 'full',
				) );
				
				$image_html = $thumbnail_obj['thumbnail'];
			}
			
			if( $title || $subtitle ){
				
				$html .= '
				
				<div class="un-img-w '.$color.'">
					
					<div class="un-img-f '.$overlay.'" style="width:'.$width.'px; height:'.$height.'px">
						<div class="un-img-t">'.$title.'</div>';
					
						if ( $frame == true ) {
							$html .= '<div class="un-img-b" style="width:'.$width.'px; height:'.$height.'px"></div>';
							$html .= $image_html;
						}
						
						else {
							$html .= $image_html;
						}
						
					$html .= '</div>
				</div>';
				
			}else{
				
				$html .= $image_html;
								
			}
		
			return $html;
			
		} else {
			
			return;
			
		}		
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unImageFrame();			