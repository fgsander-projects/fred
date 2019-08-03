<?php
/* ==================================================
  Team Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'imic_team_register');
function imic_team_register() {
	$listing_permalinks = get_option('team_structure');
   	$listing_permalink = empty($listing_permalinks) ? _x('team', 'slug', 'imic-framework-admin') : $listing_permalinks;
	$args_c = array(
		"label" => __('Team Categories', "vestige-core"),
		"singular_label" => __('Team Categroy', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('team-category', 'team', $args_c);
		$labels = array(
			'name' => __('Team', 'vestige-core'),
			'singular_name' => __('Team', 'vestige-core'),
			'add_new' => __('Add New Member', 'vestige-core'),
			'all_items'=> __('Team', 'vestige-core'),
			'add_new_item' => __('Add New Member', 'vestige-core'),
			'edit_item' => __('Edit Team Member', 'vestige-core'),
			'new_item' => __('New Team Member', 'vestige-core'),
			'view_item' => __('View Team Member', 'vestige-core'),
			'search_items' => __('Search Team', 'vestige-core'),
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
			'rewrite' => $listing_permalink != "team" ? array(
            'slug' => untrailingslashit($listing_permalink),
            'with_front' => true,
            'feeds' => true) : true,
			'supports' => array('title', 'thumbnail','editor','author'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-groups',
		   );
		register_post_type('team', $args);
		register_taxonomy_for_object_type('team-category','team');
}
?>