<?php
/* ==================================================
  Testimonial Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'testimonial_register');
function testimonial_register() {
	$args_c = array(
		"label" => __('Testimonial Categories', "vestige-core"),
		"singular_label" => __('Testimonial Categroy', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('testimonial-category', 'team', $args_c);
    $labels = array(
        'name' => __('Testimonials', 'vestige-core'),
        'singular_name' => __('Testimonial', 'vestige-core'),
        'add_new' => __('Add New', 'vestige-core'),
        'add_new_item' => __('Add New Testimonial', 'vestige-core'),
        'edit_item' => __('Edit Testimonial', 'vestige-core'),
        'new_item' => __('New Testimonial', 'vestige-core'),
        'view_item' => __('View Testimonial', 'vestige-core'),
        'search_items' => __('Search Testimonial', 'vestige-core'),
        'not_found' => __('No testimonials found', 'vestige-core'),
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
        'rewrite' => true,
        'supports' => array('title', 'editor'),
        'has_archive' => true,
		'menu_icon' => 'dashicons-editor-quote',
	
    );
    register_post_type('testimonial', $args);
	register_taxonomy_for_object_type('testimonial-category','testimonial');
}
?>