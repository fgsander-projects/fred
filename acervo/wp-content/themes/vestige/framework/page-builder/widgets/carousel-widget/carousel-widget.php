<?php

/*
Widget Name: imithemes - Image Carousel Widget
Description: A widget to show a carousel or list of images/logos.
Author: imithemes
Author URI: http://imithemes.com
*/

class Carousel_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'carousel-widget',
			esc_html__('imithemes - Image Carousel Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show a carousel or list of images/logos.', 'vestige'),
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
				'allpostsbtn' => array(
					'type' => 'text',
					'label' => esc_html__('Button Text', 'vestige'),
					'default' => esc_html__('Button', 'vestige'),
					'description' => esc_html__('This button will be displayed only if the widget has title.', 'vestige'),
				),

				'allpostsurl' => array(
					'type' => 'link',
					'label' => esc_html__('Button URL', 'vestige'),
					'description' => esc_html__('This button will be displayed only if the widget has title.', 'vestige'),
				),
				'images' => array(
					'type' => 'repeater',
					'label' => esc_html__('Images', 'vestige'),
					'item_name' => esc_html__('Image', 'vestige'),
					'item_label' => array(
						'selector' => "[id*='image-title']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(

						'icon_image' => array(
							'type' => 'media',
							'library' => 'image',
							'label' => esc_html__('Upload image', 'vestige'),
						),

						'icon_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title text to show under the image', 'vestige'),
						),

						'more_url' => array(
							'type' => 'link',
							'label' => esc_html__('Image URL', 'vestige'),
						),
						'new_window' => array(
							'type' => 'checkbox',
							'label' => esc_html__('Open URL in a new window', 'vestige'),
							'default' => false,
						),
					),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of images/logos to show in a row', 'vestige' ),
					'default' => 4,
					'min' => 1,
					'max' => 5,
					'integer' => true,
				),
				'autoplay' => array(
					'type' => 'select',
					'state_name' => 'list',
					'label' => esc_html__( 'Autoplay Carousel', 'vestige' ),
					'prompt' => esc_html__( 'Autoplay Carousel', 'vestige' ),
					'options' => array(
						'yes' => esc_html__( 'Yes', 'vestige' ),
						'no' => esc_html__( 'No', 'vestige' ),
					)
				),
				'navigation' => array(
					'type' => 'select',
					'state_name' => 'list',
					'label' => esc_html__( 'Carousel Navigation', 'vestige' ),
					'prompt' => esc_html__( 'Show Carousel Navigation', 'vestige' ),
					'options' => array(
						'yes' => esc_html__( 'Yes', 'vestige' ),
						'no' => esc_html__( 'No', 'vestige' ),
					)
				),
				'pagination' => array(
					'type' => 'select',
					'state_name' => 'list',
					'label' => esc_html__( 'Carousel Pagination', 'vestige' ),
					'prompt' => esc_html__( 'Show Carousel Pagination', 'vestige' ),
					'options' => array(
						'yes' => esc_html__( 'Yes', 'vestige' ),
						'no' => esc_html__( 'No', 'vestige' ),
					)
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	
	function get_template_name( $instance ) {
		return 'carousel-view';
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

siteorigin_widget_register('carousel-widget', __FILE__, 'Carousel_Widget');