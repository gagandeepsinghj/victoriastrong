<?php
/*
Description: unCommons News & Notices loader
Theme: Deca
*/

// Theme Name (folder in uncommons.pro)
define( 'UN_NEWS_THEME', 'deca' );

// Display unCommons Notices
add_action('admin_notices', 'un_notices_display');

function un_notices_display() {
	
	// User Data
	global $current_user;
    $user_id = $current_user->ID;
	$content = '';
	$hide_option = un_redux_opt(UN, 'opt-adv-unCommons-hide');
	
	$f_get_contents = 'file_'.'get_contents';

	if ( !get_user_meta($user_id, 'un_notices_ignore') && $hide_option != '1' ) {
		
		
		// Data Url
		$xml_url = 'http://www.uncommons.pro/envato/'.UN_NEWS_THEME.'/notices.json';  
		
		// Get Data
		if(function_exists($f_get_contents) && ini_get('allow_url_fopen')) {

			$content = @$f_get_contents($xml_url);
	
		}else{
			
			/* Next Update
			Include the CURL Feature
			*/
			
		}
		
		// Content decode
		$content = json_decode($content, true);
		$html = '';
		
		if($content) {
			
			// News Loop
			foreach($content as $news){
			
				if($news['enabled'] == 1) {
					$html .= '<div class="updated un-notice-bg">';	
					$html .= '<h3>'.$news['title'].'</h3>';
					$html .= '<p>'.$news['message'].'</p>';
					$html .= '<p><a class="disable-news" href="?un_notices=0">Hide Notices</a></p>';
					$html .= '</div>';
				}
			
			}
		
		}
		
		// Print Notice
		if($html){
			un_echo( $html, 'html' );
		}
		
	
	} // IF Not Ignored and Not Disabled by Theme Options

}


// Ignore unCommons Notices
add_action('admin_init', 'un_notices_ignore');

function un_notices_ignore() {
	global $current_user;
	$user_id = $current_user->ID;
	
	/* If user clicks to ignore the notice, add that to their user meta */
	if ( isset($_GET['un_notices']) && '0' == $_GET['un_notices'] ) {
		 add_user_meta($user_id, 'un_notices_ignore', 'true', true);
		 add_user_meta($user_id, 'un_notices_ignore_data', time(), true);
	}
	
	$data = get_user_meta($user_id, 'un_notices_ignore_data');
	
	
	if ($data){
		$days = time() - $data[0];	
	}else{
		$days = time();
	}
	
	// Expire after 1 month
	if ( get_user_meta($user_id, 'un_notices_ignore_data') AND $days > 2629743 ) {
		delete_user_meta($user_id, 'un_notices_ignore');
		delete_user_meta($user_id, 'un_notices_ignore_data');
	}
	
} 


// unCommons News
add_action( 'wp_dashboard_setup', 'un_news' );

function un_news() {
	

	
	$hide_option = un_redux_opt(UN, 'opt-adv-unCommons-hide');
	
	if ( $hide_option != '1' ) {
		
		// Remove other WP Widgets
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
		
		// Add Widget
		wp_add_dashboard_widget( 'un_news', 'unCommons News', 'un_news_display' );
		
		// Get Normal Dashboard
		global $wp_meta_boxes;
		$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
		
		// Backup and delete our new dashboard widget from the end of the array 
		$un_news_backup = array( 'un_news' => $normal_dashboard['un_news'] );
		unset( $normal_dashboard['un_news'] );
	 
		// Merge the two arrays together so our widget is at the beginning 
		$sorted_dashboard = array_merge( $un_news_backup, $normal_dashboard );
	 
		// Save the sorted array back into the original metaboxes  
		$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
		
	} // IF Not Disabled by Theme Options
	
} 


// unCommons News Display
function un_news_display() {
	
		// Data Url
		$xml_url = 'http://www.uncommons.pro/envato/news.json'; 
		$f_get_contents = 'file_'.'get_contents';
		
		// Get Data
		if(function_exists($f_get_contents) && ini_get('allow_url_fopen')) {
			 
			$content = $f_get_contents($xml_url);
		
		}else{
		
			/* Next Update
			Include the CURL Feature
			*/
			
		}
		
		// Content decode
		$content = json_decode($content, true);
		$html = '';
		$atleastone = '';
		
		if ($content) {
			
			$html .= '<ul class="un-news-list">';
			
			// News Loop
			foreach($content as $news){
			
				if($news['enabled'] == 1) {
					
					$atleastone = 1;
					
					$html .= '<li>';
					$html .= '<div class="un-news-title">'.$news['title'].'</div>';
					$html .= '<div class="un-news-date">'.$news['date'].'</div>';
					$html .= '<div class="un-news-message">'.$news['message'].'</div>';
					$html .= '</li>';
					
				}
			
			}
			
			if($atleastone != 1) {
					$html .= '<li>';
					$html .= '<div class="un-news-message">'.esc_html__('No news found', 'deca').'</div>';
					$html .= '</li>';
			}
			
			$html .= '</ul>';
		
		
		}else{
			
			$html .= '<div class="un-news-message">'.esc_html__('No news found', 'deca').'</div>';
			
		}
		
		// Print Notice
		if($html){
			un_echo( $html, 'html' );
		}else{
			esc_html_e('No news from unCommons Team', 'deca');
		}
		
	
}