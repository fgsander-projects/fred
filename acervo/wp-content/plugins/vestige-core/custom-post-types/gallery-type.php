<?php
/* ==================================================
  Gallery Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'imic_gallery_register');
function imic_gallery_register() {
	$args_c = array(
    "label" => __('Gallery Categories', "vestige-core"),
    "singular_label" => __('Gallery Category', "vestige-core"),
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_nav_menus' => true,
    'rewrite' => true,
    'query_var' => true,
	'show_admin_column' => true,
);
register_taxonomy('gallery-category', 'gallery', $args_c);
    $labels = array(
        'name' => __('Gallery', 'vestige-core'),
        'singular_name' => __('Gallery Item', 'vestige-core'),
        'add_new' => __('Add New', 'vestige-core'),
        'all_items'=> __('Gallery items', 'vestige-core'),
        'add_new_item' => __('Add New Gallery Item', 'vestige-core'),
        'edit_item' => __('Edit Gallery Item', 'vestige-core'),
        'new_item' => __('New Gallery Item', 'vestige-core'),
        'view_item' => __('View Gallery Item', 'vestige-core'),
        'search_items' => __('Search Gallery', 'vestige-core'),
        'not_found' => __('No gallery items have been added yet', 'vestige-core'),
        'not_found_in_trash' => __('Nothing found in Trash', 'vestige-core'),
        'parent_item_colon' => '',
    );
   $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'thumbnail','editor','author','post-formats'),
        'has_archive' => true,
		'menu_icon' => 'dashicons-format-gallery',
       );
    register_post_type('gallery', $args);
	register_taxonomy_for_object_type('gallery-category','gallery');
}
?>