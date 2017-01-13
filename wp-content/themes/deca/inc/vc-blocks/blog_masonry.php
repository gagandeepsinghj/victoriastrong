<?php
/*
Description: VC Blog Masonry
Theme: DECA
*/

// Block Class 
class unBlogMasonry extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_blog_masonry_map' ) );
        add_shortcode( 'un_blog_masonry', array( $this, 'un_blog_masonry_short' ) );
    }
 	
	// Block Map
    public function un_blog_masonry_map() {
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Blog Masonry', 'deca'),
				'base' => 'un_blog_masonry',
				'description' => esc_html__('A Grid Masonry Posts', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
				
					// Title
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'deca'),
                        'param_name' => 'title',
                        'description' => esc_html__('Add a title at your portfolio', 'deca'),
                    ),
					
				
					// Category Filter
					array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Choose Category', 'deca'),
                        'param_name' => 'cat_filter',
                        'description' => esc_html__('Choose the category to display in the loop (use slug). Leave empty to show all categories'),
                    ),
					
					
					// Filter
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Filter', 'deca'),
                        'param_name' => 'filter',
                        'description' => esc_html__('Add a filter by category, disable it if you are showing only one category', 'deca'),
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
					
					
					// Overlay
                    array(
                        'type' => 'checkbox',
                        'heading' => esc_html__('Only Title', 'deca'),
                        'param_name' => 'only',
                        'description' => esc_html__('If you check this option, you will show only title on overlay. Other elements will be not shown', 'deca'),
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
	public function un_blog_masonry_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'title'    => '',
					'cat_filter' => '',
					'filter' => '',
					'limit'     => '',
					'columns' => '',
					'margin' => '',
					'only' => false,
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
						
			if ( $title || $filter ) {

                $html .= '
				
				<div class="un-m-b-100">';

					if ( $title ) {

						$html .= '
						
						<div class="un-col-lg-4 un-col-md-12">

							<h2 class="un-hd-work">'.$title.'</h2>

						</div>';

					}

					if ( $filter && !$cat_filter ) {

						if ( $title ) { $col_class = 'un-col-lg-8 un-col-md-12'; } else { $col_class = 'un-col-lg-12'; }

						$html .= '<div class="'.$col_class.' un-txt-c">

									<ul class="un-flt un-flt-blog un-m-t-20">

										<li><a href="#" data-filter="*" class="current">'. esc_html__('All', 'deca').'</a></li>';

										$filters = un_get_terms_array();

										foreach ( $filters as $filter ) {

											$html .= '<li><a href="#" data-filter=".'.$filter['slug'].'">'.$filter['name'].'</a></li>';

										}

						$html .= '</ul>

							</div>';

					}

				$html .= '<div class="un-clear"></div>

			</div>';

            }
			
			if ( $margin == 'un-m-15' ) { $margin_class = 'un-narrow'; } else { $margin_class = 'un-large'; }
			
			$html .= '
			
			<div class="un-masonry-w un-iso '.$margin_class.'">';
			
				while ( $posts_args->have_posts() ) {
					
					$posts_args->the_post();

					// Author Metas
					$author_name = get_the_author_meta( 'display_name' );
					$author_id = get_the_author_meta( 'ID' );
				
					$format = get_post_format( get_the_ID() );
					
					if ( $filter == true ) { $category = un_post_single_term( get_the_ID(), '', 'slug', false ); } else { $category = $cat_filter; }
					
					switch ( $format ){
						
						case 'link':
						
						if ( $only == true ) { 
						
							$html .= '<div class="un-item un-masonry-st '.$columns.' '.$category.'">';
						
							$html .= '<div class="un-masonry-g '.$margin.'">';
																					
							$html .= '<div class="un-masonry-p un-masonry-o">';
							
								$html .= '<div class="un-masonry-img">';
								
									$html .= '<div class="un-masonry-y un-hov"><h4 class="un-masonry-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4></div>
									
										'.un_get_the_post_thumbnail( get_the_ID(), '', '', false, true ).'</div></div></div></div>';
						
						} else {
						
							$html .= '<div class="un-item un-masonry-lk '.$columns.' '.$category.'">';
							
								$html .= '<div class="un-masonry-g '.$margin.'">';
								
								$html .= '<div class="un-masonry-p">';
												
								$html .= '<h4 class="un-masonry-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
								
								$html .= '<div class="un-sep-r"></div>';
										 
								$html .= '<div class="un-masonry-e">'.wp_trim_words(get_the_excerpt(), 15, ' ').'</div>';
								
								$html .= '<div class="un-masonry-f">
											<span class="un-masonry-r"><a href="'.get_the_permalink().'">'.esc_html__('read more', 'deca').'</a></span>
											<span class="un-masonry-s"><a href="https://twitter.com/home?status=">'.esc_html__('share', 'deca').'</a></span>
										</div>';
												
							$html .= '</div></div></div>'; 
						
						}
						
						break;
						
						case 'video':
						
						$html .= '<div class="un-item '.$columns.' '.$category.'">';
						
							$html .= '<div class="un-masonry-g '.$margin.'">';
																					
							if ( $only == true ) { 
							
								$html .= '<div class="un-masonry-p un-masonry-o">';
							
								$html .= '<div class="un-masonry-img">';
								
									$html .= '<div class="un-masonry-y un-hov"><h4 class="un-masonry-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4></div>
									
										'.un_get_the_post_thumbnail( get_the_ID(), '', '', false, true ).'</div>';
											
							}
							
							else {
								
								$html .= '<div class="un-masonry-p">';
					
								$html .= '<div class="un-masonry-img">
								
											<a class="un-masonry-i un-bg-b-30" href="'.get_the_permalink().'"><i class="un-l-icon-uni1A1"></i></a>
											'.un_get_the_post_thumbnail( get_the_ID(), '', '', false, true ).'</div>';
							
								$html .= '<h4 class="un-masonry-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
								
								$html .= '<div class="un-masonry-m">
								
											<span class="un-masonry-a"><a href="'.get_author_posts_url( $author_id, $author_name ).'">'.get_the_author().'</a></span>
												<span class="un-slh">/</span>
												
											<span class="un-masonry-d">'.get_the_date().'</span>
												<span class="un-slh">/</span>
												
											<span class="un-masonry-c">'.$category.'</span>
											
										 </div>';
										 
								$html .= '<div class="un-masonry-e">'.wp_trim_words(get_the_excerpt(), 15, ' ').'</div>';
								
								$html .= '<div class="un-masonry-f">
											<span class="un-masonry-r"><a href="'.get_the_permalink().'">'.esc_html__('read more', 'deca').'</a></span>
											<span class="un-masonry-s"><a href="https://twitter.com/home?status=">'.esc_html__('share', 'deca').'</a></span>
										</div>';
									
							}
											
						$html .= '</div></div></div>';
						break;
						
						default:
						
						$html .= '<div class="un-item un-masonry-st '.$columns.' '.$category.'">';
						
							$html .= '<div class="un-masonry-g '.$margin.'">';
														
							if ( $only == true ) { 
							
							$html .= '<div class="un-masonry-p un-masonry-o">';
							
								$html .= '<div class="un-masonry-img">';
								
									$html .= '<div class="un-masonry-y un-hov"><h4 class="un-masonry-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4></div>
									
										'.un_get_the_post_thumbnail( get_the_ID(), '', '', false, true ).'</div>';
											
							} else {
								
								$html .= '<div class="un-masonry-p">';

								$html .= '<div class="un-masonry-img">
											<a class="un-masonry-i un-bg-b-30" href="'.get_the_permalink().'"><i class="un-l-icon-uniE093"></i></a>
											'.un_get_the_post_thumbnail( get_the_ID(), '', '', false, true ).'</div>';
							
								$html .= '<h4 class="un-masonry-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
								
								$html .= '<div class="un-masonry-m">
								
											<span class="un-masonry-a"><a href="'.get_author_posts_url( $author_id, $author_name ).'">'.get_the_author().'</a></span>
												<span class="un-slh">/</span>
												
											<span class="un-masonry-d">'.get_the_date().'</span>
												<span class="un-slh">/</span>
												
											<span class="un-masonry-c">'.$category.'</span>
											
										 </div>';
										 
								$html .= '<div class="un-masonry-e">'.wp_trim_words(get_the_excerpt(), 15, ' ').'</div>';
								
								$html .= '<div class="un-masonry-f">
											<span class="un-masonry-r"><a href="'.get_the_permalink().'">'.esc_html__('read more', 'deca').'</a></span>
											<span class="un-masonry-s"><a href="https://twitter.com/home?status=">'.esc_html__('share', 'deca').'</a></span>
										</div>';
									
							}
											
							$html .= '</div></div></div>';
												
					}
												
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
new unBlogMasonry();			