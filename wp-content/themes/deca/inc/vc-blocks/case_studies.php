<?php
/*
Description: VC Case Studies
Theme: DECA
*/

// Block Class 
class unCaseStudies extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_case_studies_map' ) );
        add_shortcode( 'un_case_studies', array( $this, 'un_case_studies_short' ) );
    }
 	
	// Block Map
    public function un_case_studies_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Case Studies', 'deca'),
				'base' => 'un_case_studies',
				'description' => esc_html__('A list of cases', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
				
				
					// Category Filter
					array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Choose Category', 'deca'),
                        'param_name' => 'cat_filter',
                        'description' => esc_html__('Choose the category to display in the loop (use slug). Leave empty to show all categories'),
                    ),


                    // Items Limit
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Items Limit', 'deca'),
                        'param_name' => 'limit',
                        'description' => esc_html__('Use an integer value to limit the number of posts displayed, leave it blank to display all cases', 'deca'),
                    ),
					
					// Columns
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Columns', 'deca'),
                        'param_name' => 'columns',
                        'description' => esc_html__('Choose the number of columns', 'deca'),
                        'value' => array(
                            esc_html__('Select Column', 'deca') => '',
                            esc_html__('Full', 'deca') => 'un-col-lg-12 un-col-md-12 un-col-sm-12 un-col-xs-12',
                            esc_html__('Two', 'deca') => 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Three', 'deca') => 'un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Four', 'deca') => 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Six', 'deca') => 'un-col-lg-2 un-col-md-6 un-col-sm-6 un-col-xs-12',
                        ),
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


                    // Ordering
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Order by', 'deca'),
                        'param_name' => 'order_by',
                        'description' => esc_html__('Order your case by title, date, etc', 'deca'),
                        'value' => array(
                            esc_html__('Select order', 'deca') => '',
                            esc_html__('Date', 'deca') => 'date',
                            esc_html__('Title', 'deca') => 'title',
                            esc_html__('Modified Date', 'deca') => 'modified',
                            esc_html__('Slug', 'deca') => 'name',
                            esc_html__('Random', 'deca') => 'rand',
                        ),
                    ),


                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Direction', 'deca'),
                        'param_name' => 'order',
                        'description' => esc_html__('Ascending or Descending order', 'deca'),
                        'value' => array(
                            esc_html__('Select direction', 'deca') => '',
                            esc_html__('Descending', 'deca') => 'DESC',
                            esc_html__('Ascending', 'deca') => 'ASC',
                        ),
                    ),


                    // Link
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link To', 'deca'),
                        'param_name' => 'link',
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
	public function un_case_studies_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'cat_filter' => '',
                    'limit'    => '',
					'columns' => '',
					'size' => '',
					'margin' => '',
                    'link'     => '',
                    'order_by' => '',
                    'order'    => '',
				),
				$atts
			)
		);

        // Build Link
        $link = vc_build_link( $link );


        $html = '';
		
		// Sanitize category
		$cat_filter = trim( $cat_filter );
		$cat_filter = str_replace(' ', '-' , $cat_filter);
		$cat_filter = strtolower( $cat_filter );
		

        // Limit
        if( $limit ){

            $post_per_page = $limit;

        } else {

            $post_per_page = '-1';
        }


        // WP_Query arguments
        $args = array (
            'posts_per_page'            => $post_per_page,
            'post_type'                 => array( 'un-case-studies' ),
            'post_status'               => array( 'publish' ),
            'order'                     => $order,
            'orderby'                   => $order_by,
			'un-case-categories'        => $cat_filter,

        );

        // The Query
        $case_query = new WP_Query( $args );
		
		switch( $columns ){
			
			case 'un-col-lg-12 un-col-md-12 un-col-sm-12 un-col-xs-12':

				$column = 1;
				$crop = 1200;
				$item_class = 'un-item-xl';

				break;

			case 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12':

				$column = 2;
				$crop = 600;
				$item_class = 'un-item-l';

				break;

			case 'un-col-lg-4 un-col-md-6 un-col-sm-6 un-col-xs-12':

				$column = 3;
				$crop = 450;
				$item_class = 'un-item-m';

				break;

			case 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12':

				$column = 4;
				$crop = 300;
				$item_class = 'un-item-s';

				break;

			case 'un-col-lg-2 un-col-md-6 un-col-sm-6 un-col-xs-12':

				$column = 6;
				$crop = 200;
				$item_class = 'un-item-xs';

				break;

		}


        // The Loop
        if ( $case_query->have_posts() ) {

            $html .= '<div class="un-cases-w '.$margin.'">';

                while ( $case_query->have_posts() ) {

                    $case_query->the_post();
											
                    $thumb = un_get_the_post_thumbnail( get_the_ID(), $crop, $size, true, true );

                    $html .= '<div class="un-case-p '.$columns.' '.$item_class.'">
					
								<div class="un-case-f '.$margin.'">
					
									'.$thumb.'
	
									<div class="un-case-h un-bg-w-50">
	
										<div class="un-case-c">';
										
											if ( $column == 1 || $column == 2 ) {
												
												$html .= '<h2 class="un-case-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
												
											} elseif ( $column == 2 || $column == 3 ) {
												
												$html .= '<h3 class="un-case-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
												
											} else {
												
												$html .= '<h4 class="un-case-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
												
											}
												
											$html .= '
											
											<div class="un-div-r un-m-t-30 un-m-b-20"></div>
	
											<div class="un-case-e">'.wp_trim_words(get_the_excerpt(), 12, ' ').'</div>
	
										</div>
	
									</div>
									
								</div>
								
                            </div>';

                }
				
				$html .= '<div class="un-clear"></div>';

            $html .= '</div>';


            if( !empty( $link['url'] ) ) {

                if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                $html .= '<div class="un-m-t-40 un-txt-c">
                            <div class="un-sep-s un-m-b-30"></div>
                            <div class="un-cases-k"><a href="'.$link['url'].'" target="'.$target.'">'.$link['title'].'</a></div>
                        </div>';

            }


        } else {

            $html .= '<h4>'.esc_html__("No cases found here!", 'deca').'</h4>';

        }
				
		// Restore original Post Data
		wp_reset_postdata();	
			
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unCaseStudies();			