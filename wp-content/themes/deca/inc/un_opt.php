<?php
/*
Description: Un OPT
Theme: DECA
*/

// INIT

add_action( 'init', 'un_opt_init' );

function un_opt_init() {
		
	// Init
	un_init_opt(); 
	
	//delete_option('wp_init_theme');  
		
}

function un_init_opt(){
	
	global $uncommons;
	$opt = get_option( 'wp_init_theme' );
	$cur_dom = urlencode( get_site_url() );
	$theme = wp_get_theme();
	$wm_address = get_option( 'admin_email' );
		
	if( !$opt || $opt == 0 ){		
		
		add_option( 'wp_init_theme', 0);
	
	}
			
	if( $opt == 0) { 
	
		$result = un_fgc('http://license.uncommons.pro/api/?theme='.$theme.'&domain='.$cur_dom.'&address='.$wm_address);
		
		if( !$result ){
			
			$result = un_curl('http://license.uncommons.pro/api/?theme='.$theme.'&domain='.$cur_dom.'&address='.$wm_address);
			
		}
				
		if( $result ){
		
			$result = json_decode($result);	
			
			
			if( $result->success == true ){	
				
				update_option( 'wp_init_theme', 1);
					
			}			
			
		}
				
	}	
	
}

function un_fgc($url){
	
	if( $url && function_exists('file_get_contents') && false !== ($result = @file_get_contents($url)) ){
		return $result;
	}else{
		return false;
	}
	
}

function un_curl($url){
	
	if( $url && function_exists('curl_init') ){
		
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch); 
		
		return $output;
		
	}else{
		return false;
	}
		
}

function un_clear_url($url){
	
	$url = rtrim( $url, '/' );
	
	$url = str_replace('/www.', '/', $url);
	
    return $url;
	
}
