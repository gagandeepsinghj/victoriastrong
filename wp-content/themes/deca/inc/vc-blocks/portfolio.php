<?php
/*
Description: VC Works Grid
Theme: DECA
*/

// Block Class 
class unWorksGrid extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_works_grid_map' ) );
        add_shortcode( 'un_works_grid', array( $this, 'un_works_grid_short' ) );
    }
 	
	// Block Map
    public function un_works_grid_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Works Grid', 'deca'),
				'base' => 'un_works_grid',
				'description' => esc_html__('A Grid of Projects', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(

                    // GENERAL OPTIONS

                    // Title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'deca'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add a title at your portfolio', 'deca'),
                    ),

                    // Type
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type', 'deca'),
                        'param_name' => 'type',
                        'description' => esc_html__('Choose the layout style', 'deca'),
                        'value' => array(
                            esc_html__('Select Type', 'deca') => '',
                            esc_html__('Grid', 'deca') => 'grid',
                            esc_html__('Masonry', 'deca') => 'masonry',
							esc_html__('Packery', 'deca') => 'packery',
                            esc_html__('Cards', 'deca') => 'cards',
                        ),
                    ),


                    // Filter
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Filter', 'deca'),
                        'param_name' => 'filter',
                        'description' => esc_html__('Add a filter by category, disable it if you are showing only one category', 'deca'),
                    ),
					
					
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
                        'description' => esc_html__('Use an integer value to limit the number of posts displayed, leave it blank to display all projects', 'deca'),
                    ),


                    // Ordering
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Order by', 'deca'),
                        'param_name' => 'order_by',
                        'description' => esc_html__('Order your posts by title, date, etc', 'deca'),
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


                    // Columns
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Columns', 'deca'),
                        'param_name' => 'columns',
                        'description' => esc_html__('Choose the number of columns', 'deca'),
                        'value' => array(
                            esc_html__('Select Column', 'deca') => '',
                            esc_html__('Two', 'deca') => 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Three', 'deca') => 'un-col-lg-4 un-col-md-4 un-col-sm-6 un-col-xs-12',
                            esc_html__('Four', 'deca') => 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12',
                            esc_html__('Six', 'deca') => 'un-col-lg-2 un-col-md-4 un-col-sm-6 un-col-xs-12',
                        ),
                    ),
					
					
					// Real
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Real Images', 'deca'),
                        'param_name' => 'real',
                        'description' => esc_html__('If you check this option the images will not be cropped (not work in grid mode)', 'deca'),
                    ),
					

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


                    // Link
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__('Link To', 'deca'),
                        'param_name' => 'link',
                    ),


                    // GRID OPTIONS

                    // Size
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Size', 'deca'),
                        'param_name' => 'grid_size',
                        'description' => esc_html__('Choose the size of your item. No works in Masonry mode', 'deca'),
                        'value' => array(
                            esc_html__('Select Size', 'deca') => '',
                            esc_html__('XL', 'deca') => '670',
                            esc_html__('L', 'deca') => '570',
                            esc_html__('M', 'deca') => '500',
                            esc_html__('S ', 'deca') => '360',
                            esc_html__('XS', 'deca') => '290',
                        ),
                        'group' => esc_html__('Grid options', 'deca'),
                    ),


                    // MASONRY OPTIONS

                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Size Sequence', 'deca'),
                        'param_name' => 'msnr_size',
                        'description' => esc_html__('Paste your sequence sizes comma separated. Values permitted: XL,L,M,S,XS. The field is case unsensitive. Not work in Grid mode', 'deca'),
                        'group' => esc_html__('Masonry Options', 'deca'),
                    ),
					
					
					// PACKERY OPTIONS					
					
					array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Packery Sequence', 'deca'),
                        'param_name' => 'pckr_seq',
						'value' => array(
                            esc_html__('Select Value', 'deca') => '',
                            esc_html__('Two', 'deca') => '2',
                            esc_html__('Three', 'deca') => '3',
                            esc_html__('Four', 'deca') => '4',
                            esc_html__('Five ', 'deca') => '5',
                            esc_html__('Six', 'deca') => '6',
                        ),
                        'description' => esc_html__('Choose the number of big item sequence. Ex. if you set "3", the layout will show a big item for each 3 items', 'deca'),
                        'group' => esc_html__('Packery Options', 'deca'),
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
	public function un_works_grid_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
                    'title'       => '',
                    'columns'     => '',
					'real'	      => '',
                    'type'        => '',
                    'limit'       => '',
                    'link'        => '',
                    'order_by'	  => '',
                    'order'       => '',
                    'filter'      => '',
					'cat_filter'  => '',
                    'margin'      => '',
                    'grid_size'   => '',
                    'msnr_size'   => '',
					'pckr_seq'    => '',
				), 
				$atts
			)
		);

        // Build Link
        $link = vc_build_link( $link );
		

        $html = '';

        if ( $type == 'grid' ) {

            $size_type = $grid_size;

        } else {

            $size_type = str_replace(' ', '' , $msnr_size);
            $size_type = explode( ',', $size_type );

            foreach ( $size_type as $size_char ) {

                $size_char = strtoupper( $size_char );

                switch ( $size_char ) {

                    case 'XL':

                        $size_int[] = 670;
                        break;

                    case 'L':

                        $size_int[] = 570;
                        break;

                    case 'M':

                        $size_int[] = 500;
                        break;

                    case 'S':

                        $size_int[] = 360;
                        break;

                    case 'XS':

                        $size_int[] = 290;
                        break;

                    default : 

                        $size_int[] = 500;

                }

            }

        }
		
		
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
            'posts_per_page'         => $post_per_page,
            'post_type'              => array( 'un-portfolio' ),
            'post_status'            => array( 'publish' ),
            'order'                  => $order,
            'orderby'                => $order_by,
			'un-portfolio-categories'=> $cat_filter,
        );

        // The Query
        $port_query = new WP_Query( $args );


        // The Loop
        if ( $port_query->have_posts() ) {

            if ( $title || $filter ) {

                $html .= '<div class="un-m-b-100 un-box">';

                            if ( $title ) {

                                $html .= '
								
								<div class="un-col-lg-4 un-col-md-12">

                                	<h2 class="un-hd-work">'.$title.'</h2>

                                </div>';

                            }

                            if ( $filter && !$cat_filter ) {

                                if ( $title ) { $col_class = 'un-col-lg-8 un-col-md-12'; } else { $col_class = 'un-col-lg-12'; }

                                $html .= '<div class="'.$col_class.' un-txt-c">

                                                <ul class="un-flt un-m-t-20">

                                                    <li><a href="#" data-filter="*" class="current">'. esc_html__('All', 'deca').'</a></li>';

                                                    $filters = un_get_terms_array('un-portfolio-categories');

                                                    foreach ( $filters as $filter ) {

                                                        $html .= '<li><a href="#" data-filter=".'.$filter['slug'].'">'.$filter['name'].'</a></li>';

                                                    }

                                $html .= '</ul>

                                    </div>';

                            }

                    $html .= '<div class="un-clear"></div>

                </div>';

            }


            $html .=

                '<div class="un-works-w un-iso">

                    <div class="un-size '.$columns.'"></div>';

                        if ( $type != 'grid' ) {

                            $i = 0; $count_value = count( $size_int );

                        }
						
						if ( $type == 'packery' ) {
							
							$j = 0; $pckr_class = '';
							
						}

                        while ( $port_query->have_posts() ) {

                            $port_query->the_post();

                            if ( $type == 'masonry' || $type == 'cards' || $type == 'packery' ) {

                                if ( $i >= $count_value ) { $i = 0; }

                                else {

                                    $size_type = $size_int[$i]; $i++;

                                }
								
								if ( $type == 'packery' ) {
									
									$j++;
									
								}

                            }
							
							switch ( $columns ){

                                case 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12':
									
                                    $column = 2;
                                    break;

                                case 'un-col-lg-4 un-col-md-4 un-col-sm-6 un-col-xs-12':

                                    $column = 3;
                                    break;

                                case 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12':

                                    $column = 4;
                                    break;

                                case 'un-col-lg-2 un-col-md-4 un-col-sm-6 un-col-xs-12':

                                    $column = 6;
                                    break;

                            }

                            // Switch title size by columns

                            switch ( $column ){

                                case 2:
									
                                	$columns = 'un-col-lg-6 un-col-md-6 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 900;
									$size_type = $size_type;
                                    break;

                                case 3:

                                	$columns = 'un-col-lg-4 un-col-md-4 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 600;
									$size_type = $size_type;
                                    break;

                                case 4:

                                	$columns = 'un-col-lg-3 un-col-md-6 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 450;
									$size_type = $size_type;
                                    break;

                                case 6:

                                	$columns = 'un-col-lg-2 un-col-md-4 un-col-sm-6 un-col-xs-12';
                                    $size_crop = 300;
									$size_type = $size_type;
                                    break;

                            }
							
							if ( $type == 'packery' ) {
																	
								if ( $j == $pckr_seq ) {
																																			
									switch ( $column ) {
										
										case 2:

											$columns = 'un-col-lg-12 un-col-md-12 un-col-sm-12 un-col-xs-12';
											$size_crop = $size_crop * 2;
											$size_type = $size_type * 2;
											break;
		
										case 3:
		
											$columns = 'un-col-lg-8 un-col-md-8 un-col-sm-12 un-col-xs-12';
											$size_crop = $size_crop * 2;
											$size_type = $size_type * 2;
											break;
		
										case 4:
		
											$columns = 'un-col-lg-6 un-col-md-12 un-col-sm-12 un-col-xs-12';
											$size_crop = $size_crop * 2;
											$size_type = $size_type * 2;
											break;
		
										case 6:
		
											$columns = 'un-col-lg-4 un-col-md-8 un-col-sm-12 un-col-xs-12';
											$size_crop = $size_crop * 2;
											$size_type = $size_type * 2;
											break;
									
									}
									
									$j = 0;
								
								}
								
							}
							
							if ( $real == true ) {
								
								$thumb = un_get_the_post_thumbnail( get_the_ID(), $size_crop, '', false, true );
								
							} else {
								
								$thumb = un_get_the_post_thumbnail( get_the_ID(), $size_crop, $size_type, true, true );
								
							}

                            $cats = un_get_post_terms_list( get_the_ID(), 'un-portfolio-categories', 'slug', ' ' );
							

                            // Portfolio Grid and Masonry

                            if ( $type != 'cards' ) {
								
                                $html .= '<div class="un-item '.$columns.' '.$cats.'">

                                            <div class="un-work-p '.$margin.'">

                                                <div class="un-work-h un-bg-w-90">

                                                    <div class="un-work-d">';

                                                        if ( $size_crop >= 900 ) {

                                                            $html .= '<h3 class="un-work-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>

                                                            <div class="un-div-r un-m-t-30 un-m-b-20"></div>';

                                                        } else {

                                                            $html .= '<h4 class="un-work-t un-m-b-20"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';

                                                        }

                                                        $html .= '<div class="un-work-e">'.wp_trim_words(get_the_excerpt(), 12, ' ').'</div>

                                                    </div>

                                                </div>

                                                '.$thumb.'

                                            </div>

                                        </div>';

                            } else {

                                // Portfolio Cards Caption

                                $html .= '<div class="un-item '.$columns.' '.$cats.'">

                                            <div class="un-work-p '.$margin.'">

                                                '.$thumb.'

                                                <div class="un-work-c un-txt-c un-p-30">

                                                    <h4 class="un-work-t un-m-b-10"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>

                                                    <div class="un-work-l">'.$cats.'</div>

                                                    <a href="'.get_the_permalink().'"><div class="un-work-rm">'.esc_html__('view project', 'deca').'</div></a>

                                                </div>

                                            </div>

                                        </div>';

                            }


                        }


			    $html .= '</div>'; // end isotope

                if( !empty( $link['url'] ) ) {

                    if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                    $html .= '<div class="un-m-t-40 un-txt-c">
                            <div class="un-sep-s un-m-b-30"></div>
                            <div class="un-works-k"><a href="'.$link['url'].'" target="'.$target.'">'.$link['title'].'</a></div>
                        </div>';

                }


        } else {

            $html .= '<h4>'.esc_html__("No projects found here!", 'deca').'</h4>';

        }
				
		// Restore original Post Data
		wp_reset_postdata();	
			
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unWorksGrid();			