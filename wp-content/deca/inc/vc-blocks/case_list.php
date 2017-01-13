<?php
/*
Description: VC Case List
Theme: DECA
*/

// Block Class 
class unCaseList extends WPBakeryShortCode {

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_case_list_map' ) );
        add_shortcode( 'un_case_list', array( $this, 'un_case_list_short' ) );
    }

	// Block Map
    public function un_case_list_map() {
		
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Case List', 'deca'),
				'base' => 'un_case_list',
				'description' => esc_html__('Case with list of features', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(


                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Text Right', 'deca'),
                        'param_name' => 'txt_right',
                        'description' => esc_html__('Enable text on the right, leave empty to set text on the left', 'deca'),
                    ),


					array(
						'type' => 'textarea',
						'heading' => esc_html__('Excerpt', 'deca'),
						'param_name' => 'excerpt',
						'description' => esc_html__('The excerpt', 'deca'),
						'holder' => 'div',
					),


                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin Right', 'deca'),
                        'param_name' => 'marg_right',
                        'description' => esc_html__('The space on the right of the text block', 'deca'),
                        'value' => array(
                            esc_html__('No Spacing', 'deca') => '',
                            esc_html__('10 Pixels', 'deca') => 'un-m-r-10',
                            esc_html__('20 Pixels', 'deca') => 'un-m-r-20',
                            esc_html__('30 Pixels', 'deca') => 'un-m-r-30',
                            esc_html__('40 Pixels', 'deca') => 'un-m-r-40',
                            esc_html__('50 Pixels', 'deca') => 'un-m-r-50',
                            esc_html__('60 Pixels', 'deca') => 'un-m-r-60',
                            esc_html__('70 Pixels', 'deca') => 'un-m-r-70',
                            esc_html__('80 Pixels', 'deca') => 'un-m-r-80',
                            esc_html__('90 Pixels', 'deca') => 'un-m-r-90',
                            esc_html__('100 Pixels', 'deca') => 'un-m-r-100',
                        ),
                    ),


                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin Left', 'deca'),
                        'param_name' => 'marg_left',
                        'description' => esc_html__('The space on the left of the text block', 'deca'),
                        'value' => array(
                            esc_html__('No Spacing', 'deca') => '',
                            esc_html__('10 Pixels', 'deca') => 'un-m-l-10',
                            esc_html__('20 Pixels', 'deca') => 'un-m-l-20',
                            esc_html__('30 Pixels', 'deca') => 'un-m-l-30',
                            esc_html__('40 Pixels', 'deca') => 'un-m-l-40',
                            esc_html__('50 Pixels', 'deca') => 'un-m-l-50',
                            esc_html__('60 Pixels', 'deca') => 'un-m-l-60',
                            esc_html__('70 Pixels', 'deca') => 'un-m-l-70',
                            esc_html__('80 Pixels', 'deca') => 'un-m-l-80',
                            esc_html__('90 Pixels', 'deca') => 'un-m-l-90',
                            esc_html__('100 Pixels', 'deca') => 'un-m-l-100',
                        ),
                    ),


                    // Loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Images', 'deca'),
                        'param_name' => 'images',
                        'description' => esc_html__('Add and manage multiple images', 'deca'),
                        'params' => array(


                            // Image
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Image', 'deca'),
                                'param_name' => 'image',
                                'description' => esc_html__('Upload your image', 'deca'),
                            ),


                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Height', 'deca'),
                                'param_name' => 'height',
                                'description' => esc_html__('The height size (px), only integer value allow', 'deca'),
                                'holder' => 'div',
                            ),


                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Width', 'deca'),
                                'param_name' => 'width',
                                'description' => esc_html__('The width size (px), only integer value allow', 'deca'),
                                'holder' => 'div',
                            ),


                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Top Position', 'deca'),
                                'param_name' => 'top',
                                'description' => esc_html__('The top position (px) compared to the container, only integer (+/-) value allow, leave empty if you have just set the bottom position', 'deca'),
                                'holder' => 'div',
                            ),


                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Left Position', 'deca'),
                                'param_name' => 'left',
                                'description' => esc_html__('The left position (px) compared to the container, only integer (+/-) value allow, leave empty if you have just set the right position', 'deca'),
                                'holder' => 'div',
                            ),


                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Right Position', 'deca'),
                                'param_name' => 'right',
                                'description' => esc_html__('The right position (px) compared to the container, only integer (+/-) value allow, leave empty if you have just set the left position', 'deca'),
                                'holder' => 'div',
                            ),


                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Bottom Position', 'deca'),
                                'param_name' => 'bottom',
                                'description' => esc_html__('The bottom position (px) compared to the container, only integer (+/-) value allow, leave empty if you have just set the top position', 'deca'),
                                'holder' => 'div',
                            )
                        )

                    ),

										
					// Loop									
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Features', 'deca'),
						'param_name' => 'features',	
						'description' => esc_html__('Add and sort multiple main features', 'deca'),
						'params' => array(						
					
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Feature', 'deca'),
								'param_name' => 'feature',	
								'description' => esc_html__('A main feature', 'deca'),	
								'holder' => 'div',
							),

                            // Link
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Link', 'deca'),
                                'param_name' => 'url',
                                'description' => esc_html__('add a link on your feature', 'deca'),
                            ),
														
							
						),
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
		
	}	// End Block Map
	
	// Block Shortcode
	public function un_case_list_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(

					'right' => '',
                    'marg_right' => '',
                    'marg_left' => '',
					'excerpt' => '',
					'images'	=> '',
					'features' => '',
				), 
				$atts
			)
		);
		
		$html = '';
        $case_class = '';
        $img_style = '';


        $html .=

            '<div class="un-cs-w">';

                if ( $right == true ) {

                    $case_class .= 'un-txt-r';
                    $title_class = 'un-txt-r';

                } else {

                    $case_class .= 'un-txt-l';
                    $title_class = 'un-txt-l';

                }

        $html .= '

            <div class="un-cs-b '.$case_class.' '.$marg_left.' '.$marg_right.'">

                <div class="un-cs-e">'.wp_trim_words( $excerpt, 20, ' ' ).'</div>';

                if( $features ){

                    $html .= '

                    <ul class="un-cs-l">';

                        // Setup Details
                        $features = json_decode( urldecode( $features ) );
                        if( !$features || count( $features ) == 0 ) { return; }

                        foreach( $features as $feature ){

                            // Build Link
                            if ( isset ( $feature->url) ) {

                                $link = vc_build_link( $feature->url );

                            } if ( !isset( $link['url'] ) ) {

                                $html .= '<li>'.$feature->feature.'</li>';

                            } else {

                                if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                                $html .= '<li><a href ="'.$link['url'].'" target ="'.$target.'">'.$feature->feature.'</a></li>';

                            }

                        }

                    $html .= '</ul>';

                }

                    $html .= '

                    <div class="un-clear"></div>

                </div>';

                if( $images ) {

                    // Setup Image
                    $images = json_decode( urldecode( $images ) );
                    if( !$images || count( $images ) == 0 ) { return; }

                    foreach ($images as $image) {

                        $image_html = un_get_the_attachment($image->image, $image->width, $image->height, true, true);

                        if ( isset ( $image->top ) ) {

                            $img_style .= 'top: '.$image->top.'px; ';

                        } if ( isset ( $image->left ) ) {

                            $img_style .= 'left: '.$image->left.'px; ';

                        } if ( isset ( $image->right ) ) {

                            $img_style .= 'right: '.$image->right.'px; ';

                        } if ( isset ( $image->bottom ) ) {

                            $img_style .= 'bottom: '.$image->bottom.'px;';

                        }

                        $html .= '<div class="un-cs-img" style="'.$img_style.'"><a class="un-lb" href="'.wp_get_attachment_url( $image->image ).'">'.$image_html.'</a></div>';

                    }

                }

            $html .= '</div>';


        return $html;
				

	} // End Block Shortcode
	
}

// Block Init
new unCaseList();