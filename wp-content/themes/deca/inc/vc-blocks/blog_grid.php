<?php
/*
Description: VC Blog Grid
Theme: DECA
*/

// Block Class 
class unBlogGrid extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_blog_grid_map' ) );
        add_shortcode( 'un_blog_grid', array( $this, 'un_blog_grid_short' ) );
    }
 	
	// Block Map
    public function un_blog_grid_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Blog Grid', 'deca'),
				'base' => 'un_blog_grid',
				'description' => esc_html__('A Grid of Posts', 'deca'),
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
						'description' => esc_html__('Use an integer value to limit the number of posts displayed (leave in blank to display all posts)', 'deca'),	
					),

					
					// Ordering
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order by', 'deca'),
						'param_name' => 'order_by',
						'description' => esc_html__('Order your posts by title, date, etc', 'deca'),	
						'value' => array(
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
	public function un_blog_grid_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'cat_filter' => '',
					'limit'     => '',
					'order_by'	=> '',	
					'order' => '',
                    'link' => '',
				), 
				$atts
			)
		);
		
		$html = '';		
		
		
		// Sanitize category
		$cat_filter = trim( $cat_filter );
		$cat_filter = str_replace(' ', '-' , $cat_filter);
		$cat_filter = strtolower( $cat_filter );
		

		// Limit
		if($limit){
			$post_per_page = $limit;
		}else{
			$post_per_page = '-1';
		}
		 
		// Posts Query Arguments
		$posts_args = array (
			'post_status'            => 'publish',
			'posts_per_page'         => $post_per_page,
			'order'                  => $order,
			'orderby'                => $order_by,
			'category_name'          => $cat_filter,
		);
		
		// Posts Query
		$posts_args = new WP_Query( $posts_args );
		
		// The Posts Loop
		if ( $posts_args->have_posts() ) {
			
			$i = 1;
			
			$html .= '<div class="un-grid-w un-iso">
				
				<!-- GRID SIZER -->
				<div class="un-size un-col-lg-4 un-col-md-6 un-col-sm-12 un-col-xs-12"></div>';
			
					while ( $posts_args->have_posts() ) {
						
						$posts_args->the_post();
						
						$thumb_w = '360';
						$thumb_h = '360';
						
						// Author Metas
						$author_name = get_the_author_meta( 'display_name' );
						$author_id = get_the_author_meta( 'ID' );
						
						if( $i == 5 ){ $i = 1; }
						
						$rand_shape = $i;
							
						switch ( $rand_shape ){
						
							case 1:
							
							$html .= 
							'<!-- POST HORIZONTAL -->	
							<div class="un-grid-h un-item un-col-lg-8 un-col-md-12 un-col-xs-12">
							
								<div class="un-grid-d">
									
									<div class="un-ang-t-r"></div>
								
									<div class="un-grid-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>
									<div class="un-grid-e">By <span class="un-grid-a">'.$author_name.'</span>, <span class="un-grid-c">'.get_the_date('d F').'</span></div>
									<div class="un-grid-k">
										<span class="un-grid-r"><a href="'.get_the_permalink().'">'.esc_html__('Read More', 'deca').'</a></span>
										<span class="un-grid-s"><a href="https://twitter.com/home?status=">'.esc_html__('Share', 'deca').'</a></span>
									</div>
									
								</div>';
								
								if ( get_post_format( get_the_ID() ) == 'video' ) {
									
									$html .= '<div class="un-grid-m">
										<a class="un-grid-p un-grid-bg-b un-bg-b-30" href="'.get_the_permalink().'"><i class="un-fa-icon-play"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'
									</div>';
								
								} else {
								
									$html .= '<div class="un-grid-m">
									    <a class="un-grid-p un-grid-bg-w un-bg-w-30" href="'.get_the_permalink().'"><i class="un-fa-icon-newspaper-o"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'
									</div>';
								
								}
							
							$html .= '</div>';
							
							break;
							
							case 2:
							
							$html .= 
							'<!-- POST VERTICAL -->	
							<div class="un-grid-v un-item un-col-lg-4 un-col-md-6 un-col-sm-12 un-col-xs-12">
							
								<div class="un-grid-d">
									
									<div class="un-ang-b-r"></div>
								
									<div class="un-grid-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>
									<div class="un-grid-e">By <span class="un-grid-a">'.$author_name.'</span>, <span class="un-grid-c">'.get_the_date('d F').'</span></div>
									<div class="un-grid-k">
										<span class="un-grid-r"><a href="'.get_the_permalink().'">'.esc_html__('Read More', 'deca').'</a></span>
										<span class="un-grid-s"><a href="https://twitter.com/home?status=">'.esc_html__('Share', 'deca').'</a></span>
									</div>
									
								</div>';
								
								if ( get_post_format( get_the_ID() ) == 'video' ) {
									
									$html .= '<div class="un-grid-m">
										<a class="un-grid-p un-grid-bg-b un-bg-b-30" href="'.get_the_permalink().'"><i class="un-fa-icon-play"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'
									</div>';
								
								} else {
								
									$html .= '<div class="un-grid-m">
										<a class="un-grid-p un-grid-bg-w un-bg-w-30" href="'.get_the_permalink().'"><i class="un-fa-icon-newspaper-o"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'
									</div>';
								
								}
							
							$html .= '</div>';
							
							break;
							
							case 3:
							
							$html .= 
							'<!-- POST SQUARE MEDIA -->	
							<div class="un-grid-q un-item un-col-lg-4 un-col-md-6 un-col-sm-12 un-col-xs-12">';
								
								if ( get_post_format( get_the_ID() ) == 'video' ) {
									
									$html .= '<div class="un-grid-m">
										<a class="un-grid-p un-grid-bg-b un-bg-b-30" href="'.get_the_permalink().'"><i class="un-fa-icon-play"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'
									</div>';
								
								} else {
								
									$html .= '<div class="un-grid-m">
										<a class="un-grid-p un-grid-bg-w un-bg-w-30" href="'.get_the_permalink().'"><i class="un-fa-icon-newspaper-o"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'
									</div>';
								
								}
							
							$html .= '</div>';
							
							break;
							
							case 4:
							
							$html .= 
							'<!-- POST SQUARE CAPTION -->	
							<div class="un-grid-q un-item un-col-lg-4 un-col-md-6 un-col-sm-12 un-col-xs-12">
							
								<div class="un-grid-d">
																	
									<div class="un-grid-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>
									<div class="un-grid-e">By <span class="un-grid-a">'.$author_name.'</span>, <span class="un-grid-c">'.get_the_date('d F').'</span></div>
									<div class="un-grid-k">
										<span class="un-grid-r"><a href="'.get_the_permalink().'">'.esc_html__('Read More', 'deca').'</a></span>
										<span class="un-grid-s"><a href="https://twitter.com/home?status=">'.esc_html__('Share', 'deca').'</a></span>
									</div>
									
								</div>
							
							</div>';
							
							break;
								
						}
						
						$i++;
													
					}
			
				$html .= '<div class="un-clear"></div></div>';

                // Build Link
                $link = vc_build_link( $link );

                if( !empty( $link['url'] ) ) {

                    if( $link['target'] == true ) { $target = '_blank'; } else { $target = '_self'; }

                    $html .= '<div class="un-m-t-10 un-txt-c"><div class="un-sep-s un-m-b-30"></div>';
                    $html .= '<div class="un-blog-k"><a href="'.$link['url'].'" target="'.$target.'">'.$link['title'].'</a></div></div>';

                }

        } else {

            $html .= '<h4>'.esc_html__("No posts found here!", 'deca').'</h4>';

        }
				
		// Restore original Post Data
		wp_reset_postdata();	
			
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unBlogGrid();			