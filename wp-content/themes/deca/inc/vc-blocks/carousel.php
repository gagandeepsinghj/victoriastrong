<?php
/*
Description: VC Carousel
Theme: DECA
*/

// Block Class 
class unCarousel extends WPBakeryShortCode {

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_carousel_map' ) );
        add_shortcode( 'un_carousel', array( $this, 'un_carousel_short' ) );
    }

	// Block Map
    public function un_carousel_map() {

		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

		// Map the block with vc_map()
		vc_map(
			array(
				'name' => esc_html__('Carousel', 'deca'),
				'base' => 'un_carousel',
				'description' => esc_html__('Add multiple images in carousel mode', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(


                    // Columns
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Images for row', 'deca'),
                        'param_name' => 'items',
                        'description' => esc_html__('Choose the number of images to show in a row', 'deca'),
                        'value' => array(
                            esc_html__('Select number', 'deca') => '',
                            esc_html__('Full', 'deca') => 1,
                            esc_html__('Two', 'deca') => 2,
                            esc_html__('Three', 'deca') => 3,
                            esc_html__('Four', 'deca') => 4,
                            esc_html__('Five', 'deca') => 5,
                        ),
                    ),


                    // Height
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Height', 'deca'),
                        'param_name' => 'height',
                        'description' => esc_html__('Choose the number of images to show in a row, not works in full height mode', 'deca'),
                        'value' => array(
                            esc_html__('Select size', 'deca') => '',
                            esc_html__('XS', 'deca') => 'un-h-xs',
                            esc_html__('S', 'deca') => 'un-h-s',
                            esc_html__('M', 'deca') => 'un-h-m',
                            esc_html__('L', 'deca') => 'un-h-l',
                            esc_html__('XL', 'deca') => 'un-h-xl',
                        ),
                    ),


                    // Autoplay
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Full Height', 'deca'),
                        'param_name' => 'full',
                        'description' => esc_html__('Enable full height size', 'deca'),
                    ),


                    // More
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('More', 'deca'),
                        'param_name' => 'more',
                    ),


                    // Loop
                    array(
                        'type' => 'param_group',
                        'heading' => esc_html__('Thumbnails', 'deca'),
                        'param_name' => 'thumbs',
                        'description' => esc_html__('Set your gallery thumbnails', 'deca'),
                        'params' => array(


                            // Multiple Images
                            array(
                                'type' => 'attach_image',
                                'heading' => esc_html__('Upload', 'deca'),
                                'param_name' => 'thumb',
                                'description' => esc_html__('Upload your image', 'deca'),

                            ),


                            // Title
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Title', 'deca'),
                                'param_name' => 'title',
                                'description' => esc_html__('Add a title for your image', 'deca'),
                            ),


                            // Categories
                            array(
                                'type' => 'textfield',
                                'heading' => esc_html__('Category, Tags', 'deca'),
                                'param_name' => 'tags',
                                'description' => esc_html__('Add one or more tags comma separated', 'deca'),

                            ),


                            // Link
                            array(
                                'type' => 'vc_link',
                                'heading' => esc_html__('Link', 'deca'),
                                'param_name' => 'url',
                                'description' => esc_html__('if you use an external link you disable the lightbox on this image', 'deca'),
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

    } // End Block Map


	// Block Shortcode
	public function un_carousel_short( $atts ) {

		extract(
			shortcode_atts(
				array(
                    'items' => '',
                    'height' => '',
                    'speed' => '',
                    'full' => '',
                    'more' => '',
                    'thumbs' => '',
				),
				$atts
			)
		);


        $thumbs = json_decode( urldecode( $thumbs ) );

        if( !$thumbs || count( $thumbs ) == 0 ) { return; }

        $html = '';

        if ( $items == 1 ){ $crs_class = 'un-crs-one'; } else { $crs_class = 'un-crs-multi'; }

        $html .= '<div class="un-crs-w un-crs-s '.$crs_class.'" data-items="'.$items.'">';

                    foreach ( $thumbs as $thumb ) {

                        $html .= '<div class="un-item">';

                                if( $full == true ) { $item_class = 'un-full'; } else { $item_class = $height; }

                                    $html .= '<div class="un-crs-p '.$item_class.'" style="background-image: url('.wp_get_attachment_url( $thumb->thumb ).')">

                                    <div class="un-crs-h un-bg-b-90">';

                                    // Build Link
                                    if( isset( $thumb->url ) ) {
                                        $link = vc_build_link($thumb->url);
                                    }

                                        if( empty( $link['url'] ) ) {

                                            $html .= '<div class="un-crs-i">
                                                        <a class="un-lb" href="'.wp_get_attachment_url( $thumb->thumb ).'"><i class="un-l-icon-uniE048"></i></a>
                                                      </div>';

                                        }

                                        $html .= '<div class="un-crs-c un-p-l-30 un-p-r-30 un-txt-c">';


                                            if( !empty( $link['url'] ) ) {

                                                if ( isset( $thumb->title ) ) {

                                                    if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                                                    $html .= '<h4 class="un-crs-t un-m-b-10"><a href ="'.$link['url'].'"target ="'.$target.'">'.$thumb->title.'</a></h4>';

                                                }

                                            } else {

                                                if ( isset( $thumb->title ) ) {

                                                    $html .= '<h4 class="un-crs-t un-m-b-10">'.$thumb->title.'</h4>';

                                                }

                                            }

                                            if (isset($thumb->tags)) {

                                                $html .= '<div class="un-crs-g">'.$thumb->tags.'</div>';

                                            }

                                        $html .= '</div>

                                    </div>

                                </div>

                            </div>';

                        }

                $html .= '</div>';

                // Build Link
                $more = vc_build_link( $more );

                if( !empty( $more['url'] ) ) {

                    if( $more['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                    $html .= '<div class="un-m-t-40 un-txt-c">
                                    <div class="un-sep-s un-m-b-30"></div>
                                    <div class="un-crs-k"><a href="'.$more['url'].'" target="'.$target.'">'.$more['title'].'</a></div>
                            </div>';

                }



		return $html;

	} // End Block Shortcode

} // End Block Class


// Block Init
new unCarousel();