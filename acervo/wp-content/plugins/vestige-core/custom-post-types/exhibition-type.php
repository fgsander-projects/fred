<?php
/* ==================================================
  Exhibition Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'imic_exhibition_register');
add_action( 'init', 'exhibition_registrants' );
function exhibition_registrants()
{
	$labels = array(
        'name' => __('Registrants', 'vestige-core'),
        'singular_name' => __('Registrant','vestige-core'),
        'add_new' => __('Add New', 'vestige-core'),
        'add_new_item' => __('Add New Registrant', 'vestige-core'),
        'edit_item' => __('Edit Registrant', 'vestige-core'),
        'new_item' => __('New Registrant', 'vestige-core'),
        'view_item' => __('View Registrant', 'vestige-core'),
        'search_items' => __('Search Registrant', 'vestige-core'),
        'not_found' => __('No registrant have been added yet', 'vestige-core'),
        'not_found_in_trash' => __('Nothing found in Trash', 'vestige-core'),
        'parent_item_colon' => '',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => 'edit.php?post_type=exhibition',
        'show_in_nav_menus' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title'),
        'has_archive' => true,
		'menu_icon' => 'dashicons-editor-ul',
    );
	$args_d = array(
		"label" => __('Registered Exhibition', "vestige-core"),
		"singular_label" => __('Registered Exhibition', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('registrant-exhibition', 'exhibition_reg', $args_d);
    register_post_type('exhibition_reg', $args);
	register_taxonomy_for_object_type('registrant-exhibition','exhibition_reg');
}
function imic_exhibition_register() {
	$listing_permalinks = get_option('exhibition_structure');
   $listing_permalink = empty($listing_permalinks) ? _x('exhibition', 'slug', 'imic-framework-admin') : $listing_permalinks;
	$args_c = array(
		"label" => __('Venues', "vestige-core"),
		"singular_label" => __('Venue', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('venue', 'exhibition', $args_c);
	$args_d = array(
		"label" => __('Exhibition Categories', "vestige-core"),
		"singular_label" => __('Exhibition Categroy', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('exhibition-category', 'exhibition', $args_d);
	$tags = array(
		"label" => __('Exhibition Tags','vestige-core'),
		"singular_label" => __('Exhibition Tag','vestige-core'),
		'public' => true,
		'hierarchical' => false,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
	   'query_var' => true,
	   'show_admin_column' => true,
	);
	register_taxonomy('exhibition-tag', 'exhibition',$tags);
		$labels = array(
			'name' => __('Exhibitions', 'vestige-core'),
			'singular_name' => __('Exhibition', 'vestige-core'),
			'add_new' => __('Add New', 'vestige-core'),
			'all_items'=> __('All Exhibitions', 'vestige-core'),
			'add_new_item' => __('Add New Exhibition', 'vestige-core'),
			'edit_item' => __('Edit Exhibition', 'vestige-core'),
			'new_item' => __('New Exhibition', 'vestige-core'),
			'view_item' => __('View Exhibition', 'vestige-core'),
			'search_items' => __('Search Exhibitions', 'vestige-core'),
			'not_found' => __('No Exhibitions found', 'vestige-core'),
			'not_found_in_trash' => __('Nothing found in Trash', 'vestige-core'),
			'parent_item_colon' => '',
		);
	   $args = array(
			'labels' => $labels,
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'hierarchical' => false,
			'rewrite' => $listing_permalink != "exhibition" ? array(
            'slug' => untrailingslashit($listing_permalink),
            'with_front' => true,
            'feeds' => true) : true,
			'supports' => array('title', 'thumbnail','editor','author'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-megaphone',
		   );
		register_post_type('exhibition', $args);
		register_taxonomy_for_object_type('venue','exhibition');
		register_taxonomy_for_object_type('exhibition-category','exhibition');
		register_taxonomy_for_object_type('exhibition-tag','exhibition');
}
?>