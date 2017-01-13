<?php
/*
Description: Theme Functions
Theme: DECA
*/

/*************/
/* BASIC SEO */ 
/*************/

add_filter( 'wp_title', 'un_wp_title', 10, 2 );

function un_wp_title( $title, $sep ) {
	
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;
	
	$sep = ' - ';
	
	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= $sep . sprintf( esc_html__( 'Page %s', 'deca'), max( $paged, $page ) );
	}
	
	return $title;
	
}

/**************/
/* PAGINATION */ 
/**************/

function un_pagination($custom_query = null, $range = 1) {  
     
	$showitems = ($range * 2)+1;  
	
	$html = '';

	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($custom_query == ''){
		
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		
		if(!$pages){
			$pages = 1;
		}
		
	} else{
		
		$pages = $custom_query->max_num_pages;
		
		if(!$pages){
			$pages = 1;
		}
		
	}

     if(1 != $pages){	
	 						 
		$html .= '<div class="un-pag-k">';
			
			if($paged > 1 && $showitems < $pages) { 
				$html .= '<div class="un-pag-a un-pag-al"><a href="'.get_pagenum_link($paged - 1).'"><i class="un-l-icon-uniE066"></i></a></div>'; 
			}
			
			$html .= '<div class="un-pag-n">
						<ul>';
			
				for ($i=1; $i <= $pages; $i++) {
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
						$html .= ($paged == $i)? '<li class="active"><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
					}
				}
			
				$html .= '</ul>
					</div>';
			
			if($paged < $pages && $showitems < $pages) { 
				$html .= '<div class="un-pag-a un-pag-ar"><a href="'.get_pagenum_link($paged + 1).'"><i class="un-l-icon-uniE068"></i></a></div>'; 
			}

		$html .= '</div>';
		
     }
	 
	 return $html;
	 
}

/***********/
/* HELPERS */ 
/***********/


// Sanitize HTML
function un_sanitize_html($string, $post_capability = false) {

    if($post_capability == false) {

        return wp_kses($string, array());

    }else{

        $tags = wp_kses_allowed_html( 'post' );

        // script
        $tags['script'] = array(
            'language' => 1,
            'src'      => 1,
            'type'     => 1
        );

        // iframe
        $tags['iframe'] = array(
            'src'             => array(),
            'height'          => array(),
            'width'           => array(),
            'frameborder'     => array(),
            'allowfullscreen' => array(),
        );

        // form fields - input
        $tags['input'] = array(
            'class' => array(),
            'id'    => array(),
            'name'  => array(),
            'value' => array(),
            'type'  => array(),
        );

        // select
        $tags['select'] = array(
            'class'  => array(),
            'id'     => array(),
            'name'   => array(),
            'value'  => array(),
            'type'   => array(),
        );

        // select options
        $tags['option'] = array(
            'selected' => array(),
        );

        // style
        $tags['style'] = array(
            'types' => array(),
        );

        return wp_kses($string, $tags);

    }

}


// A secure and valid ECHO function
function un_echo($data, $context=null, $tags=array()){

    switch( $context ){

        case 'html':
            echo un_sanitize_html( $data, true );
            break;

        case 'string':
            echo wp_kses( $data, array() );
            break;

        case 'sanitize':
            echo un_sanitize_string( wp_kses($data, array()) );
            break;

        case 'attr':
            echo esc_attr( $data );
            break;

        case 'js':
            echo esc_js( $data );
            break;

        case 'url':
            echo esc_url( $data );
            break;

        case 'custom':
            echo wp_kses( $data, $tags );
            break;

        case 'full':
            echo ''.$data;
            break;

        default:
            echo un_sanitize_html( $data, true );
            break;

    }

}


// Get post terms as list
function un_post_terms_list( $post_id, $taxonomy=null, $label='name', $sep=',', $link=false ) {
	
	if( !$taxonomy ){ $taxonomy = 'category'; }
	
	$terms = wp_get_post_terms( $post_id, $taxonomy );

	$result = '';
	
	$start_sep = '';
	
	foreach( $terms as $term ){
		
		if( $link ){
			
			$term_output = '<a href="'.esc_url(get_term_link( $term->slug, $taxonomy )).'">'.$term->$label.'</a>';
						
		}else{
			
			$term_output = $term->$label;
			
		}
		
		$result .= $start_sep.$term_output;
		
		$start_sep = $sep;
		
	}
	
	return $result;
	
}

// Custom print_r
function un_print($array){
	
	echo '<pre>';
	print_r($array);
	echo '</pre>';

}


// Live Resize of Post Thumbnail
function un_get_the_post_thumbnail( $id=null, $width=null, $height=null, $crop=false, $html=true ){
	
	// Check ID
	if(!$id || empty($id) || !isset($id)) {
		$id = get_the_ID();
	}
	
	// Check Sizes
	if(!$width || empty($width) || !isset($width)) {
		$width = $height;
	}
	
	if(!$height || empty($height) || !isset($height)) {
		$height = $width;
	}
	
	// Get Original URL
	$original_url = wp_get_attachment_url( get_post_thumbnail_id($id) );	
		
	// Generate New URL
	$new_url = aq_resize( $original_url, $width, $height, $crop, true, true );
	
	
	// If no original put a placeholder
	if( !$original_url ){
		$new_url = UN_THEME_URI.'assets/img/placeholder_s.png';
	}
	
	// If no new image put the default
	if( $original_url && !$new_url ){
		$new_url = $original_url;
	}
	
	if($html == true){
		
		return '<img alt="" src="'.$new_url.'">';
		
	}else{
		
		return $new_url;
		
	}
		
}

// Post Thumbnail SRC
function un_get_the_post_thumbnail_src( $id=null ){
	
	// Check ID
	if(!$id || empty($id) || !isset($id)) {
		$id = get_the_ID();
	}
	
	// Get Original URL
	$url = wp_get_attachment_url( get_post_thumbnail_id($id) );	
		
	return $url;
		
}


// Live Resize of Attachment
function un_get_the_attachment( $att_id, $width=null, $height=null, $crop=false, $html=true ){
	
	// Check Sizes
	if(!$width || empty($width) || !isset($width)) {
		$width = $height;
	}
	
	if(!$height || empty($height) || !isset($height)) {
		$height = $width;
	}
	
	// Get Original URL
	$original_url = wp_get_attachment_url( $att_id );
	
	// Generate New URL
	$new_url = aq_resize( $original_url, $width, $height, $crop, true, true );
	
	// If no image put a placeholder
	if( !$new_url ){
		$new_url = UN_THEME_URI.'assets/img/noimage.jpg';
	}
	
	if($html == true){
		
		return '<img alt="" src="'.$new_url.'">';
		
	}else{
		
		return $new_url;
		
	}
		
}


// Build the term HTML
function un_get_the_term($term_id, $taxonomy, $echo){
	
	// Get the term data
	$term = get_term($term_id, $taxonomy);
	
	// Check the data
	if ( is_object( $term ) && count($term) > 0 ) { 
		
		$url = esc_url(get_term_link( $term->slug, $taxonomy ));
		$name = $term->name;
		
	}else{

		return;
		
	}	
	
	// Check the return type
	if($echo == true){
		
		echo '<a href="'.$url.'" title="'.$term->name.'">'.$term->name.'</a>';
		
	}else{

		return '<a href="'.$url.'" title="'.$term->name.'">'.$term->name.'</a>';
		
	}

}

// Related Posts Query 
function un_related_posts_query_args( $post_id, $taxonomy='category', $n = 4 ){
	
	// Check Post Type
	$post_type = get_post_type( $post_id );
	
	// Get the terms of the post
	$terms = wp_get_post_terms( $post_id, $taxonomy );
	
	// Build an ids array
	if( $terms && count($terms) > 0 ) {
		
    	$terms_ids = array();
		
   		foreach($terms as $term){
			$terms_ids[] = $term->term_id;
		}

	}else{
		
		return;
		
	}
	
	// Build Query Args
	$args = array(
		'post_type'		 => $post_type,
		'post_status'	 => 'publish',
		'pagination'	 => false,
		'posts_per_page' => $n,
		'order'          => 'ASC',
		'orderby'        => 'title',
		'post__not_in'   => array($post_id),
		'tax_query'      => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => $terms_ids,
			),
		)
	);
	
	// Return the $args
	return $args;
	
}


// Get post terms
function un_get_post_terms_array( $term_id, $taxonomy='category' ) {
	
	$terms = wp_get_post_terms( $term_id, $taxonomy );
	
	$result = array();
	
	foreach( $terms as $term ){
		
		$result[] = array(
			'name' => $term->name, 
			'slug' => $term->slug,
			'id'   => $term->term_id,
		);		
		
	}
	
	return $result;
	
}

// Get post terms as list
function un_get_post_terms_list( $term_id, $taxonomy='category', $value='slug', $sep=',' ) {
	
	$terms = wp_get_post_terms( $term_id, $taxonomy );
	
	$result = '';
	
	$start_sep = '';
	
	foreach( $terms as $term ){
		
		$result .= $start_sep.$term->$value;
		
		$start_sep = $sep;
		
	}
	
	return $result;
	
}


// Get taxonomy terms as array
function un_get_terms_array( $taxonomies=array('category') ) {
	
	$terms = get_terms( $taxonomies );
	
	$result = array();
	
	foreach( $terms as $term ){
		
		$result[] = array(
			'name' => $term->name, 
			'slug' => $term->slug,
			'id'   => $term->term_id,
		);		
		
	}
	
	return $result;
	
}


// Sanitize String
function un_sanitize_string( $string ) {
	
	// Remove special accented characters
	$clean_string = strtr($string, 'ŠŽšžŸÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïñòóôõöøùúûüýÿ', 'SZszYAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy');
	
	$clean_string = strtr($clean_string, array('Þ' => 'TH', 'þ' => 'th', 'Ð' => 'DH', 'ð' => 'dh', 'ß' => 'ss', 'Œ' => 'OE', 'œ' => 'oe', 'Æ' => 'AE', 'æ' => 'ae', 'µ' => 'u'));
	
	$clean_string = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array(',', ''), $clean_string);
	
	$clean_string = strtolower($clean_string);
	
	return $clean_string;
	
}


// Check if is_woocommerce 
function un_is_woocommerce() {
	
	if( (function_exists('is_woocommerce') && is_woocommerce()) || 
		(function_exists('is_cart') && is_cart()) || 
		(function_exists('is_checkout') && is_checkout()) || 
		(function_exists('is_account_page') && is_account_page()) ||
		(function_exists('is_add_payment_method_page') && is_add_payment_method_page()) ||   
		(function_exists('is_checkout_pay_page') && is_checkout_pay_page()) ||   
		(function_exists('is_order_received_page') && is_order_received_page()) ||   
		(function_exists('is_view_order_page') && is_view_order_page()) ||   
		(function_exists('is_checkout') && is_checkout())		
		) {
		return true;
	}else{
		return false;
	}
	
}


// Sanitize String
function un_sanitize($string, $html = false) {
	
	if($html == false) {
		
		return wp_kses($string, array());
		
	}else{
		
		$tags = wp_kses_allowed_html( 'post' );
		
		$tags['script'] = array(
			'language' => 1,
			'src'      => 1,
			'type'     => 1  
		);
			
		return wp_kses($string, $tags);
		
	}
	
}

// Redux get_option
function un_redux_opt($opt_name, $opt_id, $default=null){
	
	// Get Global Var
	global ${$opt_name};
	$options = ${$opt_name};
	
	if( isset($options[$opt_id]) ){
		return $options[$opt_id];
	}else{
		return $default;
	}
	
}

// Basic WP Function
function un_basic_wp_functions() {
	
	paginate_comments_links();
	next_comments_link();
	previous_comments_link();
	posts_nav_link();
	wp_link_pages();
	post_class();
	get_the_tags();
	add_theme_support( 'custom-header', array() );
	add_theme_support( 'custom-background', array() );
	wp_enqueue_script( "comment-reply" );
	
}