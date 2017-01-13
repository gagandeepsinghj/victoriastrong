<?php
/*
Description: VC Blog Feeds
Theme: DECA
*/

// Block Class 
class unBlogFeeds extends WPBakeryShortCode {
    
	// Class Init
	function __construct() {
        add_action( 'init', array( $this, 'un_blog_feeds_map' ) );
        add_shortcode( 'un_blog_feeds', array( $this, 'un_blog_feeds_short' ) );
    }
 	
	// Block Map
    public function un_blog_feeds_map() {	
        
		// Stop all if VC is not enabled
		if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
		
		// Map the block with vc_map()
		vc_map( 
			array(
				'name' => esc_html__('Blog Feeds', 'deca'),
				'base' => 'un_blog_feeds',
				'description' => esc_html__('A list of posts (no images)', 'deca'),
				'category' => esc_html__('DECA', 'deca'),
				'weight' => 9999,
				'icon' => UN_THEME_URI.'assets/img/icon.jpg',				
				'params' => array(
				
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
	public function un_blog_feeds_short( $atts ) {
		
		extract(
			shortcode_atts(
				array(
					'limit'     => '',
					'order_by'	=> '',	
					'order' => '',
				), 
				$atts
			)
		);
	
				
		$html = '';
		
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
		);
		
		// The Query
		$blog_query = new WP_Query( $args );
		
				
		// The Loop
		if ( $blog_query->have_posts() ) {
		
		$html .= '<div class="un-feeds-w">';
			
			$html .= '<div class="un-feeds-l">';
			
				while ( $blog_query->have_posts() ) {
					$blog_query->the_post();

                    // Author Metas
                    $author_name = get_the_author_meta( 'display_name' );
                    $author_id = get_the_author_meta( 'ID' );
									
					$html .= '<div class="un-feed-p">';
					
						$html .= '<h2 class="un-feed-t"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
						
						$html .= '<div class="un-feed-m">
						
									<span class="un-feed-a"><a href="'.get_author_posts_url( $author_id, $author_name ).'">'.get_the_author().'</a></span>
										<span class="un-slh">/</span>
										
									<span class="un-feed-d">'.get_the_date().'</span>
										<span class="un-slh">/</span>
										
									<span class="un-feed-c">'.un_post_terms_list( get_the_ID(), 'category', 'name', ', ' , true ).'</span>
									
								 </div>';
								 
						$html .= '<div class="un-feed-e">'.get_the_excerpt().'</div>';
										
					$html .= '</div>';
					
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
new unBlogFeeds();			