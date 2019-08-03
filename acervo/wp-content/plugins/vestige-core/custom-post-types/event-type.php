<?php
/* ==================================================
  Event Post Type Functions
  ================================================== */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('init', 'imic_event_register');
add_action( 'init', 'event_registrants' );
function event_registrants()
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
        'show_in_menu' => 'edit.php?post_type=event',
        'show_in_nav_menus' => true,
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title'),
        'has_archive' => true,
		'menu_icon' => 'dashicons-editor-ul',
    );
	$args_d = array(
		"label" => __('Registered Event', "vestige-core"),
		"singular_label" => __('Registered Event', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => false,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('registrant-event', 'event_registrants', $args_d);
    register_post_type('event_registrants', $args);
	register_taxonomy_for_object_type('registrant-event','event_registrants');
}
function imic_event_register() {
	$listing_permalinks = get_option('event_structure');
   	$listing_permalink = empty($listing_permalinks) ? _x('event', 'slug', 'imic-framework-admin') : $listing_permalinks;
		$labels = array(
			'name' => __('Events', 'vestige-core'),
			'singular_name' => __('Event', 'vestige-core'),
			'add_new' => __('Add New', 'vestige-core'),
			'all_items'=> __('All Events', 'vestige-core'),
			'add_new_item' => __('Add New Event', 'vestige-core'),
			'edit_item' => __('Edit Event', 'vestige-core'),
			'new_item' => __('New Event', 'vestige-core'),
			'view_item' => __('View Event', 'vestige-core'),
			'search_items' => __('Search Events', 'vestige-core'),
			'not_found' => __('No Events found', 'vestige-core'),
			'not_found_in_trash' => __('Nothing found in Trash', 'vestige-core'),
			'parent_item_colon' => '',
		);
	$args_d = array(
		"label" => __('Event Categories', "vestige-core"),
		"singular_label" => __('Event Categroy', "vestige-core"),
		'public' => true,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
		'query_var' => true,
		'show_admin_column' => true,
	);
	register_taxonomy('event-category', 'event', $args_d);
	$tags = array(
		"label" => __('Event Tags','vestige-core'),
		"singular_label" => __('Event Tag','vestige-core'),
		'public' => true,
		'hierarchical' => false,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'rewrite' => true,
	   	'query_var' => true,
	   	'show_admin_column' => true,
	);
	register_taxonomy('event-tag', 'event',$tags);
   	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'hierarchical' => false,
		'rewrite' => $listing_permalink != "event" ? array(
		'slug' => untrailingslashit($listing_permalink),
		'with_front' => true,
		'feeds' => true) : true,
		'supports' => array('title', 'thumbnail','editor','author'),
		'has_archive' => true,
		'menu_icon' => 'dashicons-format-chat',
	);
	register_post_type('event', $args);
	register_taxonomy_for_object_type('event-category','event');
	register_taxonomy_for_object_type('event-tag','event');
	register_taxonomy_for_object_type('venue','event');
}
?>