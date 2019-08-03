<?php

/*
Widget Name: imithemes - Horizontal Line Widget
Description: A widget to add full width horizontal line
Author: imithemes
Author URI: http://imithemes.com
*/

class Hr_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'hr-widget',
			esc_html__('imithemes - Horizontal Line Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to add full width horizontal line', 'vestige'),
				'panels_icon' => 'dashicons dashicons-minus',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'height' => array(
					'type' => 'text',
					'default'=> '1px',
					'label' => esc_html__('Border width. Example: 1px', 'vestige'),
				),
				'custom_color' => array(
					'type' => 'color',
					'label' => esc_html__('Border color', 'vestige'),
					'default' => '',
				),
				'margint' => array(
					'type' => 'text',
					'default'=> '30px',
					'label' => esc_html__('Margin from Top. Example: 30px', 'vestige'),
				),
				'marginb' => array(
					'type' => 'text',
					'default'=> '30px',
					'label' => esc_html__('Margin from Bottom. Example: 30px', 'vestige'),
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	
	
	function get_template_name( $instance ) {
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

siteorigin_widget_register('hr-widget', __FILE__, 'Hr_Widget');