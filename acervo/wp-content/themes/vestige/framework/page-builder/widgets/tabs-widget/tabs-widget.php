<?php

/*
Widget Name: imithemes - Tabs Widget
Description: A widget to add tabs to your pages.
Author: imithemes
Author URI: http://imithemes.com
*/

class Tabs_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'tabs-widget',
			esc_html__('imithemes - Tabs Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to add tabs to your pages.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'tab_id' => array(
					'type' => 'number',
					'label' => esc_html__('Tabs ID', 'vestige'),
					'description' => esc_html__('Numeric only. Keep it unique if adding multiple tabs in a single page.', 'vestige'),
					
				),
				'tabs' => array(
					'type' => 'repeater',
					'label' => esc_html__('Tabs', 'vestige'),
					'item_name' => esc_html__('Tab', 'vestige'),
					'item_label' => array(
						'selector' => "[id*='tab_nav_title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(

						'tab_nav_title' => array(
							'type' => 'text',
							'label' => esc_html__('Tab title', 'vestige'),
						),

						'tab_nav_content' => array(
							'type' => 'textarea',
							'label' => esc_html__('Tab Content', 'vestige'),
						),

					),
				),
				'display_type' => array(
					'type' => 'select',
					'state_name' => 'vertical',
					'label' => esc_html__( 'Choose View', 'vestige' ),
					'prompt' => esc_html__( 'Choose Display Style', 'vestige' ),
					'options' => array(
						'horizontal' => esc_html__( 'Horizontal', 'vestige' ),
						'vertical' => esc_html__( 'Vertical', 'vestige' ),
					)
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	
	
	function get_template_name( $instance ) {
		return $instance['display_type'] == 'vertical' ? 'vertical-view' : 'horizontal-view';
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

siteorigin_widget_register('tabs-widget', __FILE__, 'Tabs_Widget');