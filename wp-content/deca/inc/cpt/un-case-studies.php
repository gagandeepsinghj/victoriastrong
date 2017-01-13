<?php
/*
Description: Case Studies CPT
Theme: DECA
*/

// CPT Registration

$labels = array(
	'name'               => __('Case Studies', UN),
	'singular_name'      => __('Case Study', UN),
	'add_new'            => __('Add New', UN),
	'add_new_item'       => __('Add New Case', UN),
	'edit_item'          => __('Edit Case', UN),
	'new_item'           => __('New Case', UN),
	'all_items'          => __('All Cases', UN),
	'view_item'          => __('View Cases', UN),
	'search_items'       => __('Search Cases', UN),
	'not_found'          => __('No Case found', UN),
	'not_found_in_trash' => __('No Case found in Trash', UN),
	'parent_item_colon'  => '',
	'menu_name'          => __('Case Studies', UN)
  );

  $args = array(
	'labels'             => $labels,
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'show_in_nav_menus'  => true,
	'query_var'          => true,
	'rewrite'            => array( 'slug' => 'un-case-studies' ),
	'capability_type'    => 'post',
	'has_archive'        => false,
	'hierarchical'       => false,
	'menu_position'      => null,
	'menu_icon'          => 'dashicons-welcome-widgets-menus',
	'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
  );

  register_post_type( 'un-case-studies', $args );


// CPT Custom messages
add_filter( 'post_updated_messages', 'un_case_studies_messages' );

function un_case_studies_messages( $messages ) {
	
  global $post, $post_ID;

  $messages['un-case-studies'] = array(
    0 => '',
    1 => sprintf( __('Case updated. <a href="%s">View Case</a>', UN), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.', UN),
    3 => __('Custom field deleted.', UN),
    4 => __('Case updated.', UN),
    5 => isset($_GET['revision']) ? __('Case restored to revision from %s', UN) : false,
    6 => __('Case published.', UN),
    7 => __('Case saved.', UN),
    8 => __('Case submitted.', UN),
    9 => __('Case scheduled.', UN),
  );

  return $messages;
  
} 