<?php
// Register Custom Post Type vacancy
function create_vacancy_cpt() {

	$labels = array(
		'name' => _x( 'vacancies', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'vacancy', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Vacancies', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'vacancy', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'vacancy Archives', 'textdomain' ),
		'attributes' => __( 'vacancy Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent vacancy:', 'textdomain' ),
		'all_items' => __( 'All vacancies', 'textdomain' ),
		'add_new_item' => __( 'Add New vacancy', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New vacancy', 'textdomain' ),
		'edit_item' => __( 'Edit vacancy', 'textdomain' ),
		'update_item' => __( 'Update vacancy', 'textdomain' ),
		'view_item' => __( 'View vacancy', 'textdomain' ),
		'view_items' => __( 'View vacancies', 'textdomain' ),
		'search_items' => __( 'Search vacancy', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into vacancy', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this vacancy', 'textdomain' ),
		'items_list' => __( 'vacancies list', 'textdomain' ),
		'items_list_navigation' => __( 'vacancies list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter vacancies list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'vacancy', 'textdomain' ),
		'description' => __( 'vacancies', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-megaphone',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'vacancies', $args );

}
add_action( 'init', 'create_vacancy_cpt', 0 );





function create_process_cpt() {
	$labels = array(
		'name' => _x( 'Processes', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Process', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Processes', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Process', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Process Archives', 'textdomain' ),
		'attributes' => __( 'Process Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Process:', 'textdomain' ),
		'all_items' => __( 'All Processes', 'textdomain' ),
		'add_new_item' => __( 'Add New Process', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Process', 'textdomain' ),
		'edit_item' => __( 'Edit Process', 'textdomain' ),
		'update_item' => __( 'Update Process', 'textdomain' ),
		'view_item' => __( 'View Process', 'textdomain' ),
		'view_items' => __( 'View Processes', 'textdomain' ),
		'search_items' => __( 'Search Process', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Process', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Process', 'textdomain' ),
		'items_list' => __( 'Processes list', 'textdomain' ),
		'items_list_navigation' => __( 'Processes list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Processes list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Process', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-tools',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'post-formats'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'has_archive' => false,
		'hierarchical' => false,
		'rewrite' => array('slug' => '/')
	);
	register_post_type( 'process', $args );

}
add_action( 'init', 'create_process_cpt', 0 );
function create_news_cpt() {

	$labels = array(
        'rewrite' => array("slug" => "news", "with_front" => false),
		'name' => _x( 'news', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'news', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'news', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'news', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'news Archives', 'textdomain' ),
		'attributes' => __( 'news Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent news:', 'textdomain' ),
		'all_items' => __( 'All news', 'textdomain' ),
		'add_new_item' => __( 'Add New news', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New news', 'textdomain' ),
		'edit_item' => __( 'Edit news', 'textdomain' ),
		'update_item' => __( 'Update news', 'textdomain' ),
		'view_item' => __( 'View news', 'textdomain' ),
		'view_items' => __( 'View news', 'textdomain' ),
		'search_items' => __( 'Search news', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into news', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this news', 'textdomain' ),
		'items_list' => __( 'news list', 'textdomain' ),
		'items_list_navigation' => __( 'news list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter news list', 'textdomain' ),
	);
	$args = array(
        'rewrite' => array("slug" => "news", "with_front" => false),
		'label' => __( 'news', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-megaphone',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'page-attributes', 'categories'),
		'taxonomies' => array('category' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'create_news_cpt', 0 );


?>