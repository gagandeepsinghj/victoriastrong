<?php
/*
Description: VC Gallery
Theme: DECA
*/

// Block Class 
class unGallery extends WPBakeryShortCode {

	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_gallery_map' ) );
        add_shortcode( 'un_gallery', array( $this, 'un_gallery_short' ) );
    }

	// Block Map
    public function un_gallery_map() {

		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }

		// Map the block with vc_map()
		vc_map(
			array(
				'name' => esc_html__('Gallery', 'deca'),
				'base' => 'un_gallery',
				'description' => esc_html__('Add multiple images', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',
				'params' => array(


                    // Columns
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Columns', 'deca'),
                        'param_name' => 'columns',
                        'description' => esc_html__('Choose the number of columns', 'deca'),
                        'value' => array(
                            esc_html__('Select Column', 'deca') => '',
                            esc_html__('Two', 'deca') => 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Three', 'deca') => 'un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Four', 'deca') => 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Six', 'deca') => 'un-col-lg-2 un-col-md-6 un-col-sm-6 un-col-xs-12',
                        ),
                    ),
					
					
					// Real
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Real Images', 'deca'),
                        'param_name' => 'real',
                        'description' => esc_html__('If you check this option the images will not be cropped', 'deca'),
                    ),


                    // Size
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Margin', 'deca'),
                        'param_name' => 'margin',
                        'description' => esc_html__('Choose a margin between items', 'deca'),
                        'value' => array(
                            esc_html__('No Margin', 'deca') => '',
                            esc_html__('Narrow', 'deca') => 'un-m-15',
                            esc_html__('Large', 'deca') => 'un-m-30',
                        ),
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


                            // Size
                            array(
                                'type' => 'dropdown',
                                'heading' => esc_html__('Size', 'deca'),
                                'param_name' => 'size',
                                'description' => esc_html__('Choose the size of your item', 'deca'),
                                'value' => array(
                                    esc_html__('Select Size', 'deca') => '',
                                    esc_html__('XL', 'deca') => '670',
                                    esc_html__('L', 'deca') => '570',
                                    esc_html__('M', 'deca') => '500',
                                    esc_html__('S ', 'deca') => '400',
                                    esc_html__('XS', 'deca') => '300',
                                ),
                            ),


                            array(
                                'type' => 'checkbox',
                                'heading' => esc_html__('Double Size', 'deca'),
                                'param_name' => 'double',
                                'description' => esc_html__('Set the item double', 'deca'),
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
	public function un_gallery_short( $atts ) {

		extract(
			shortcode_atts(
				array(
                    'columns' => '',
					'real' => '',
                    'margin' => '',
                    'thumbs' => '',
                    'more'   => '',
				),
				$atts
			)
		);


        $thumbs = json_decode( urldecode( $thumbs ) );

        if( !$thumbs || count( $thumbs ) == 0 ) { return; }


        $html = '';

        $html .= '<div class="un-pics-w un-iso">

                    <div class="un-size '.$columns.'"></div>';

                    foreach( $thumbs as $thumb ){

                        // switch columns

                        switch( $columns ){

                            case 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12':

                                $column = 2;
                                $size_crop = 900;
                                $crop = $columns;

                                break;

                            case 'un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12':

                                $column = 3;
                                $size_crop = 600;
                                $crop = $columns;

                                break;

                            case 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12':

                                $column = 4;
                                $size_crop = 450;
                                $crop = $columns;

                                break;

                            case 'un-col-lg-2 un-col-md-6 un-col-sm-6 un-col-xs-12':

                                $column = 6;
                                $size_crop = 300;
                                $crop = $columns;

                                break;

                        }


                        if( isset( $thumb->double ) ){

                            // Switch columns if double

                            switch ( $column ){

                                case 2:

                                    $crop = 'un-col-lg-12 un-col-md-6 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 1800;
                                    break;

                                case 3:

                                    $crop = 'un-col-lg-8 un-col-md-6 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 1200;
                                    break;

                                case 4:

                                    $crop = 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 900;
                                    break;

                                case 6:

                                    $crop = 'un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 600;
                                    break;

                            }

                        }

							if ( $real == true ) {
								
								$image_crop = un_get_the_attachment( $thumb->thumb, $size_crop, '', false, true );
								
							} else {
								
                            	$image_crop = un_get_the_attachment( $thumb->thumb, $size_crop, $thumb->size, true, true );
							
							}

                                $html .= '<div class="un-item '.$crop.'">

                                            <div class="un-pic-p '.$margin.'">

                                                '.$image_crop.'

                                                <div class="un-pic-h un-bg-b-90">';

                                                // Build Link
                                                $link = vc_build_link( $thumb->url );

                                                    if( empty( $link['url'] ) ) {

                                                        $html .= '<div class="un-pic-i">
                                                                    <a class="un-lb" href="'.wp_get_attachment_url( $thumb->thumb ).'"><i class="un-l-icon-uniE048"></i></a>
                                                                  </div>';

                                                    }

                                                    $html .= '<div class="un-pic-c">';


                                                        if( !empty( $link['url'] ) ) {

                                                            if ( isset( $thumb->title ) ) {

                                                                if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                                                                $html .= '<h4 class="un-pic-t un-m-b-10"><a href ="'.$link['url'].'" target ="'.$target.'">'.$thumb->title.'</a></h4>';

                                                            }

                                                        } else {

                                                            if ( isset( $thumb->title ) ) {

                                                                $html .= '<h4 class="un-pic-t un-m-b-10">'.$thumb->title.'</h4>';

                                                            }

                                                        }

                                                        if (isset( $thumb->tags ) ) {

                                                            $html .= '<div class="un-pic-g">'.$thumb->tags.'</div>';

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
                                <div class="un-pics-k"><a href="'.$more['url'].'" target="'.$target.'">'.$more['title'].'</a></div>
                            </div>';

                }

		return $html;

	} // End Block Shortcode

} // End Block Class


// Block Init
new unGallery();