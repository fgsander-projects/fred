<?php

/*
Widget Name: imithemes - Upcoming Events Widget
Description: A widget to show upcoming events.
Author: imithemes
Author URI: http://imithemes.com
*/

class Vestige_Upcoming_Events_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'vestige-upcoming-events-widget',
			esc_html__('imithemes - Upcoming Events Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show upcoming events.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Title', 'vestige'),
				),
				'title_position' => array(
					'type' => 'select',
					'state_name' => 'grid',
					'prompt' => esc_html__( 'Widget Title Alignment', 'vestige' ),
					'options' => array(
						'left' => esc_html__( 'Left', 'vestige' ),
						'center' => esc_html__( 'Center', 'vestige' ),
						'right' => esc_html__( 'Right', 'vestige' ),
					)
				),
				'custom_color' => array(
					'type' => 'color',
					'label' => esc_html__('Custom title color', 'vestige'),
					'default' => '',
				),
				'categories' => array(
					'type' => 'text',
					'label' => esc_html__('Categories (Enter comma separated events category slugs)', 'vestige'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of events to show', 'vestige' ),
					'default' => 4,
					'min' => 1,
					'max' => 25,
					'integer' => true,
				),
			),
			plugin_dir_path(__FILE__)
		);
	}


	
	function get_template_name($instance) {
		return 'template';
	}

	function get_style_name($instance) {
		return false;
	}

	function get_less_variables($instance){
		return array();
	}
	function modify_instance($instance){
		return $instance;
	}


}

siteorigin_widget_register('vestige-upcoming-events-widget', __FILE__, 'Vestige_Upcoming_Events_Widget');