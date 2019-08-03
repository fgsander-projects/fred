<?php

/*
Widget Name: imithemes - Toggle/Accordion Widget
Description: A widget to add Toggle/Accordion to your pages.
Author: imithemes
Author URI: http://imithemes.com
*/

class Toggle_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'toggle-widget',
			esc_html__('imithemes - Toggle/Accordion Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to add Toggle/Accordion to your pages.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'tab_id' => array(
					'type' => 'text',
					'label' => esc_html__('Toggle Name', 'vestige'),
					'description' => esc_html__('Keep it unique if adding multiple tabs in a single page.(No spaces in name)', 'vestige'),
					
				),
				'tabs' => array(
					'type' => 'repeater',
					'label' => esc_html__('Toggles', 'vestige'),
					'item_name' => esc_html__('Toggle', 'vestige'),
					'item_label' => array(
						'selector' => "[id*='tab_nav_title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(

						'tab_nav_title' => array(
							'type' => 'text',
							'label' => esc_html__('Toggle title', 'vestige'),
						),

						'tab_nav_content' => array(
							'type' => 'textarea',
							'label' => esc_html__('Toggle Content', 'vestige'),
						),

					),
				),
				'display_type' => array(
					'type' => 'select',
					'state_name' => 'togglize',
					'label' => esc_html__( 'Choose Type', 'vestige' ),
					'prompt' => esc_html__( 'Choose Type', 'vestige' ),
					'options' => array(
						'togglize' => esc_html__( 'Toggles', 'vestige' ),
						'accordionize' => esc_html__( 'Accordions', 'vestige' ),
					)
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	
	
	function get_template_name( $instance ) {
		return $instance['display_type'] == 'togglize' ? 'toggles' : 'accordions';
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

siteorigin_widget_register('toggle-widget', __FILE__, 'Toggle_Widget');