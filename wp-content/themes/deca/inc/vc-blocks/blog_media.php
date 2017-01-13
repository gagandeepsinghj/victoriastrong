<?php
/*
Description: VC Blog media
Theme: DECA
*/

// Block Class 
class unBlogMedia extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_blog_media_map' ) );
        add_shortcode( 'un_blog_media', array( $this, 'un_blog_media_short' ) );
    }
 	
	// Block Map
    public function un_blog_media_map() {	
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Blog Media', 'deca'),
				'base' => 'un_blog_media',
				'description' => esc_html__('A list of posts with preview)', 'deca'),
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
    /**
     * @param $atts
     * @return string
     */
    public function un_blog_media_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'cat_filter' => '',
					'limit'     => '',
					'order_by'	=> '',	
					'order' => '',
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
		
		// Paged Value
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		
		// WP_Query arguments
		$args = array (
			'post_status'            => array( 'publish' ),
			'pagination'             => true,
			'posts_per_page'         => $post_per_page,
			'paged'                  => $paged,
			'order'                  => $order,
			'orderby'                => $order_by,
			'category_name'          => $cat_filter,
		);
		
		// The Query
		$blog_query = new WP_Query( $args );
		
				
		// The Loop
		if ( $blog_query->have_posts() ) {
			
		// Author Metas
		$author_name = get_the_author_meta( 'display_name' );
		$author_id = get_the_author_meta( 'ID' );
			
		$html .= '<div class="un-blog-w">';
		
			$html .= '<div class="un-blog-l">';
			
				while ( $blog_query->have_posts() ) {
					$blog_query->the_post();
					
					$thumb_w = '770';
					$thumb_h = '470';
					
					$format = get_post_format( get_the_ID() );
					
					switch ( $format ){
						
						case 'link':
						
						$html .= '<div class="un-blog-p un-blog-lk">';
											
							$html .= '<h4 class="un-blog-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
							
							$html .= '<div class="un-sep-r"></div>';
									 
							$html .= '<div class="un-blog-e">'.get_the_excerpt().'</div>';
							
							$html .= '<div class="un-blog-f">
										<span class="un-blog-r"><a href="'.get_the_permalink().'">'.esc_html__('read more', 'deca').'</a></span>
										<span class="un-blog-s"><a href="https://twitter.com/home?status=">'.esc_html__('share', 'deca').'</a></span>
									</div>';
											
						$html .= '</div>';
						
						break;
						
						case 'video':
						
						$html .= '<div class="un-blog-p">';
					
							$html .= '<div class="un-blog-m">
                                        <a class="un-blog-i un-bg-b-30" href="'.get_the_permalink().'"><i class="un-l-icon-uni1A1"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'</div>';
						
							$html .= '<h4 class="un-blog-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
							
							$html .= '<div class="un-blog-m">
							
										<span class="un-blog-a"><a href="'.get_author_posts_url( $author_id, $author_name ).'">'.get_the_author().'</a></span>
											<span class="un-slh">/</span>
											
										<span class="un-blog-d">'.get_the_date().'</span>
											<span class="un-slh">/</span>
											
										<span class="un-blog-c">'.un_post_terms_list( get_the_ID(), 'category', 'name', ', ' , true ).'</span>
										
									 </div>';
									 
							$html .= '<div class="un-blog-e">'.get_the_excerpt().'</div>';
							
							$html .= '<div class="un-blog-f">
										<span class="un-blog-r"><a href="'.get_the_permalink().'">'.esc_html__('read more', 'deca').'</a></span>
										<span class="un-blog-s"><a href="https://twitter.com/home?status=">'.esc_html__('share', 'deca').'</a></span>
									</div>';
											
						$html .= '</div>';
						break;
						
						default:
						
						$html .= '<div class="un-blog-p un-blog-st">';

                            $html .= '<div class="un-blog-m">
                                        <a class="un-blog-i un-bg-b-30" href="'.get_the_permalink().'"><i class="un-l-icon-uniE093"></i></a>
										'.un_get_the_post_thumbnail( get_the_ID(), $thumb_w, $thumb_h, true, true ).'</div>';
						
							$html .= '<h4 class="un-blog-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
							
							$html .= '<div class="un-blog-m">
							
										<span class="un-blog-a"><a href="'.get_author_posts_url( $author_id, $author_name ).'">'.get_the_author().'</a></span>
											<span class="un-slh">/</span>
											
										<span class="un-blog-d">'.get_the_date().'</span>
											<span class="un-slh">/</span>
											
										<span class="un-blog-c">'.un_post_terms_list( get_the_ID(), 'category', 'name', ', ' , true ).'</span>
										
									 </div>';
									 
							$html .= '<div class="un-blog-e">'.get_the_excerpt().'</div>';
							
							$html .= '<div class="un-blog-f">
										<span class="un-blog-r"><a href="'.get_the_permalink().'">'.esc_html__('read more', 'deca').'</a></span>
										<span class="un-blog-s"><a href="https://twitter.com/home?status=">'.esc_html__('share', 'deca').'</a></span>
									</div>';
											
						$html .= '</div>';
												
					}
					
					
				}
				
			$html .= '</div>';
				
			$html .= un_pagination($blog_query);
		
		$html .= '</div>';

        } else {

            $html .= '<h4>'.esc_html__("No posts found here!", 'deca').'</h4>';

        }

		// Restore original Post Data
		wp_reset_postdata();
			
	
		return $html;
		
	} // End Block Shortcode
	
} // End Block Class


// Block Init
new unBlogMedia();			