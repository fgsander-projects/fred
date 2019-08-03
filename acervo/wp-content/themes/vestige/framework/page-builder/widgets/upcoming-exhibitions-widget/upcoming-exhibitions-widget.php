<?php

/*
Widget Name: imithemes - Upcoming Exhibitions Widget
Description: A widget to show upcoming exhibitions.
Author: imithemes
Author URI: http://imithemes.com
*/

class Upcoming_Exhibitions_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'upcoming-exhibitions-widget',
			esc_html__('imithemes - Upcoming Exhibitions Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show upcoming exhibitions.', 'vestige'),
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
				'custom_color' => array(
					'type' => 'color',
					'label' => esc_html__('Custom title color', 'vestige'),
					'default' => '',
				),
				'categories' => array(
					'type' => 'text',
					'label' => esc_html__('Categories (Enter comma separated exhibitions category slugs)', 'vestige'),
				),
				'number_of_days' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Show exhibitions for how many days', 'vestige' ),
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

siteorigin_widget_register('upcoming-exhibitions-widget', __FILE__, 'Upcoming_Exhibitions_Widget');