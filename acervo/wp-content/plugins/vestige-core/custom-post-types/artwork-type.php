<?php
/* ==================================================
  Artwork Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'imic_artwork_register');
function imic_artwork_register() {
	$listing_permalinks = get_option('artwork_structure');
   $listing_permalink = empty($listing_permalinks) ? _x('artwork', 'slug', 'imic-framework-admin') : $listing_permalinks;
	$args_c = array(
		"label" => __('Artwork Categories', "vestige-core"),
		"singular_label" => __('Artwork Category', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => false,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('artwork-category', 'artwork', $args_c);
	$labels_t = array(
			'name' => __('Artwork Tags', 'vestige-core'),
			'singular_name' => __('Artwork Tag', 'vestige-core'),
			'add_new' => __('Add New Artwork Tag', 'vestige-core'),
			'all_items'=> __('Artwork Tags', 'vestige-core'),
			'add_new_item' => __('Add New Tag', 'vestige-core'),
			'edit_item' => __('Edit Artwork Tag', 'vestige-core'),
			'new_item' => __('New Artwork Tag', 'vestige-core'),
			'view_item' => __('View Artwork Tag', 'vestige-core'),
			'search_items' => __('Search Artwork Tags', 'vestige-core'),
			'not_found' => __('Nothing found', 'vestige-core'),
			'not_found_in_trash' => __('Nothing found in Trash', 'vestige-core'),
	);
	$args_t = array(
		"labels" => $labels_t,
		'public' => true,
		'hierarchical' => false,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'args' => array('orderby' => 'term_order'),
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('artwork-tags', 'artwork', $args_t);
	$labels_a = array(
			'name' => __('Artists', 'vestige-core'),
			'singular_name' => __('Artist', 'vestige-core'),
			'add_new' => __('Add New Artist', 'vestige-core'),
			'all_items'=> __('Artists', 'vestige-core'),
			'add_new_item' => __('Add New Artist', 'vestige-core'),
			'edit_item' => __('Edit Artist', 'vestige-core'),
			'new_item' => __('New Artist', 'vestige-core'),
			'view_item' => __('View Artist', 'vestige-core'),
			'search_items' => __('Search Artists', 'vestige-core'),
			'not_found' => __('Nothing found', 'vestige-core'),
			'not_found_in_trash' => __('Nothing found in Trash', 'vestige-core'),
	);
	$args_a = array(
		"labels" => $labels_a,
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'args' => array('orderby' => 'term_order'),
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('artwork-artists', 'artwork', $args_a);
		$labels = array(
			'name' => __('Artworks', 'vestige-core'),
			'singular_name' => __('Artwork', 'vestige-core'),
			'add_new' => __('Add New Artwork', 'vestige-core'),
			'all_items'=> __('Artworks', 'vestige-core'),
			'add_new_item' => __('Add New Artwork', 'vestige-core'),
			'edit_item' => __('Edit Artwork', 'vestige-core'),
			'new_item' => __('New Artwork', 'vestige-core'),
			'view_item' => __('View Artwork', 'vestige-core'),
			'search_items' => __('Search Artwork', 'vestige-core'),
			'not_found' => __('Nothing found', 'vestige-core'),
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
			'rewrite' => $listing_permalink != "artwork" ? array(
            'slug' => untrailingslashit($listing_permalink),
            'with_front' => true,
            'feeds' => true) : true,
			'supports' => array('title', 'thumbnail','editor','author','comments'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-images-alt2',
		   );
		register_post_type('artwork', $args);
		register_taxonomy_for_object_type('artwork-category','artwork');
		register_taxonomy_for_object_type('artwork-tags','artwork');
		register_taxonomy_for_object_type('artwork-artists','artwork');
}
?>