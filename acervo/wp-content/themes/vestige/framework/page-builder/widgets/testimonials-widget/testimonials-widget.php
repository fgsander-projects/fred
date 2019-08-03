<?php

/*
Widget Name: imithemes - Testimonials Carousel
Description: A widget to show testimonials carousel
Author: imithemes
Author URI: http://imithemes.com
*/

class Testimonials_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'testimonials-widget',
			esc_html__('imithemes - Testimonials Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show testimonials carousel', 'vestige'),
				'panels_icon' => 'dashicons dashicons-editor-quote',
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
					'label' => esc_html__('Categories (Enter comma separated testimonial category slugs)', 'vestige'),
				),
				
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of testimonials to show', 'vestige' ),
					'default' => 4,
					'min' => 1,
					'max' => 100,
					'integer' => true,
				),
				'grid_column' => array(
					'type' => 'select',
					'state_name' => 'grid',
					'prompt' => esc_html__( 'Choose Grid View Column', 'vestige' ),
					'options' => array(
						'12' => esc_html__( 'One', 'vestige' ),
						'6' => esc_html__( 'Two', 'vestige' ),
						'4' => esc_html__( 'Three', 'vestige' ),
						'3' => esc_html__( 'Four', 'vestige' ),
					),
				),
				'carousel_pagi' => array(
					'type' => 'checkbox',
					'default' => 0,
					'label' => esc_html__('Enable carousel pagination', 'vestige'),
					'state_handler' => array(
						'layout_type[grid]' => array('show'),
						'layout_type[list]' => array('hide'),
					),
				),
				'carousel_nav' => array(
					'type' => 'checkbox',
					'default' => 1,
					'label' => esc_html__('Enable carousel Next/prev arrows', 'vestige'),
					'state_handler' => array(
						'layout_type[grid]' => array('show'),
						'layout_type[list]' => array('hide'),
					),
				),
				'carousel_auto' => array(
					'type' => 'number',
					'default' => '',
					'label' => esc_html__('Enter time interval for Auto Carousel. 1000 = 1 second. Leave blank for no AutoPlay.', 'vestige'),
					'state_handler' => array(
						'layout_type[grid]' => array('show'),
						'layout_type[list]' => array('hide'),
					),
				),
			),
			plugin_dir_path(__FILE__)
		);
	}


	
	function get_template_name( $instance ) {
		return 'grid-view';
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

siteorigin_widget_register('testimonials-widget', __FILE__, 'Testimonials_Widget');