<?php

/*
Widget Name: imithemes - Skewed Title Widget
Description: A widget to add a skewed title bar
Author: imithemes
Author URI: http://imithemes.com
*/

class Skewed_Title_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'skewed-title-widget',
			esc_html__('imithemes - Skewed Title Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to add a skewed title bar', 'vestige'),
				'panels_icon' => 'dashicons dashicons-editor-textcolor',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'default'=> '',
					'label' => esc_html__('Enter title', 'vestige'),
				),
				'title_bg' => array(
					'type' => 'color',
					'label' => esc_html__('Custom background color for title', 'vestige'),
					'default' => '',
				),
				'title_color' => array(
					'type' => 'color',
					'label' => esc_html__('Custom text color for title', 'vestige'),
					'default' => '',
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

siteorigin_widget_register('skewed-title-widget', __FILE__, 'Skewed_Title_Widget');