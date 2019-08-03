<?php

/*
Widget Name: imithemes - Progress Bar Widget
Description: A widget to add Progress bar to your pages.
Author: imithemes
Author URI: http://imithemes.com
*/

class Progressbar_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'progressbar-widget',
			esc_html__('imithemes - Progress Bar Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to add Progress bar to your pages.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Title', 'vestige'),
					'description' => esc_html__('Title to show above the progress bar.', 'vestige'),
					
				),
				'percentile' => array(
					'type' => 'text',
					'label' => esc_html__('Progress Percentile', 'vestige'),
					'description' => esc_html__('Enter the progress percentile without %. For ex: 90', 'vestige'),
					
				),
				
				'type' => array(
					'type' => 'select',
					'state_name' => 'primary',
					'label' => esc_html__( 'Choose Color Style', 'vestige' ),
					'prompt' => esc_html__( 'Choose Color Style', 'vestige' ),
					'options' => array(
						'primary' => esc_html__( 'Primary', 'vestige' ),
						'warning' => esc_html__( 'Warning', 'vestige' ),
						'info' => esc_html__( 'Info', 'vestige' ),
						'danger' => esc_html__( 'Danger', 'vestige' ),
						'success' => esc_html__( 'Success', 'vestige' ),
					)
				),
				'custom_color' => array(
					'type' => 'color',
					'label' => esc_html__('Custom progress bar color', 'vestige'),
					'default' => '',
				),
				'stripped' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Use stripped background animation', 'vestige'),
					'default' => false,
				),
				'tootltip' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Show progress percentile tooltip', 'vestige'),
					'default' => false,
				),
				'animation' => array(
					'type' => 'text',
					'default' => 200,
					'label' => esc_html__('Delay animation', 'vestige'),
					'description' => esc_html__('Enter the delay animation time. 100 means 1 sec. Leave blank for no animation', 'vestige'),
					
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

siteorigin_widget_register('progressbar-widget', __FILE__, 'Progressbar_Widget');