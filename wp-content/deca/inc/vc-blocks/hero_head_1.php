<?php
/*
Description: VC Hero Heading 1
Theme: DECA
*/

// Block Class 
class unHeroHead1 extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_hero_head_1_map' ) );
        add_shortcode( 'un_hero_head_1', array( $this, 'un_hero_head_1_short' ) );
    }
 	
	// Block Map
    public function un_hero_head_1_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Hero Head 1', 'deca'),
				'base' => 'un_hero_head_1',
				'description' => esc_html__('Hero Heading with Description', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(	
				
					// Size	
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Size', 'deca'),
						'param_name' => 'size',	
						'value' => array(
                            esc_html__('Select size', 'deca') => '',
                            esc_html__('Extra Large Head', 'deca') => 'un-hd-xl',
                            esc_html__('Large Head', 'deca') => 'un-hd-l',
                            esc_html__('H1', 'deca') => 'h1',
							esc_html__('H2', 'deca') => 'h2',
							esc_html__('H3', 'deca') => 'h3',
							esc_html__('H5', 'deca') => 'h4',
							esc_html__('H4', 'deca') => 'h5',
							esc_html__('H6', 'deca') => 'h6',
						),
					),


					// Title
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title', 'deca'),
						'param_name' => 'title',		   
					),


                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Separator', 'deca'),
                        'param_name' => 'separator',
                        'description' => esc_html__('Add a red line separator', 'deca'),
                    ),
					

					// Description	
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Description', 'deca'),
						'param_name' => 'description',		   
					),


                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Use Icon', 'deca'),
                        'param_name' => 'use_icon',
                        'description' => esc_html__('check to use add an icon', 'deca'),
                    ),



                    // Icon
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__( 'Icon', 'deca'),
                        'param_name' => 'icon',
                        'description' => esc_html__( 'Select the icon (do not work if you uncheck the control above)', 'deca'),
                        'settings' => array(
                            'emptyIcon' => false,
                            'type' => 'linea',
                            'iconsPerPage' => 100,
                        ),
                    ),


                    // Link
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link Icon', 'deca'),
                        'param_name' => 'url',
                        'description' => esc_html__('Add an url for your icon', 'deca'),
                    ),


                    // Label
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Label', 'deca'),
                        'param_name' => 'label',
                        'description' => esc_html__('Add a corner label', 'deca'),
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
	public function un_hero_head_1_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'size' => '',
					'title'	=> '',
					'separator' => '',
					'description' => '',
                    'use_icon' => '',
                    'icon' => '',
                    'url' => '',
                    'label' => '',
				), 
				$atts
			)
		);

				
		$html = '';
		
		$html .= '

		<div class="un-hd-w">';
		
			if( $title ) {

                if ( $size == 'un-hd-xl' || $size == 'un-hd-l' ) {

                    $html .= '<div class="'.$size.' un-hd-t un-m-b-20">'.$title.'</div>';

                } else {

                    $html .= '<'.$size.' class="un-hd-t un-m-b-20">'.$title.'</'.$size.'>';

                }

			}

            if( $separator ){

                $html .= '<div class="un-div-r un-m-t-20 un-m-b-20"></div>';

            }
			
			if( $description ) {

                if( $use_icon == true ) {

                    $html .= '<span class="un-dsc">'.$description.'</span>';

                } else {

                    $html .= '<div class="un-dsc">'.$description.'</div>';

                }
			}


            // Build Link
            $link_icon = vc_build_link( $url );

            if( !empty( $link_icon['url'] ) ) {

                if ( $icon ) {

                    if( $link_icon['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                    $html .= '<div class="un-ico un-m-t-30"><a href ="'.$link_icon['url'].'" target ="'.$target.'">
                                <i class="'.$icon.'"></i></a></div>';

                }

            }

            if ( $label ) {

                $html .= '<div class="un-lbl un-vrt">'.$label.'</div>';

            }

		
		$html .= '</div>';
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unHeroHead1();			