<?php

/*
Widget Name: imithemes - Animated Counter Widget
Description: A widget to add Animated Numbers Counter to your pages.
Author: imithemes
Author URI: http://imithemes.com
*/

class Counter_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'counter-widget',
			esc_html__('imithemes - Animated Counter Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to add Animated Numbers Counter to your pages.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'icon' => array(
					'type' => 'icon',
					'label' => esc_html__('Icon', 'vestige'),
				),
				'icon_color' => array(
					'type' => 'color',
					'label' => esc_html__('Icon color', 'vestige'),
					'default' => '#999999',
				),
  				'icon_size' => array(
					'type' => 'number',
					'label' => __('Icon size', 'vestige'),
					'default' =>48,
				),
				'icon_image' => array(
					'type' => 'media',
					'library' => 'image',
					'label' => esc_html__('Icon image', 'vestige'),
					'description' => esc_html__('Use your own icon image.', 'vestige'),
				),
				'number' => array(
					'type' => 'number',
					'label' => esc_html__('Number (To count to)', 'vestige'),
				),
				'number_color' => array(
					'type' => 'color',
					'label' => esc_html__('Number Color', 'vestige'),
					'default' => '#333333',
				),
				'text' => array(
					'type' => 'text',
					'label' => esc_html__('Text to show below number', 'vestige'),
				),
				'text_color' => array(
					'type' => 'color',
					'label' => esc_html__('Text Color', 'vestige'),
					'default' => '#999999',
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

siteorigin_widget_register('counter-widget', __FILE__, 'Counter_Widget');