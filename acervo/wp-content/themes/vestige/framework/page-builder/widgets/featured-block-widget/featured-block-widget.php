<?php

/*
Widget Name: imithemes - Featured Block Widget
Description: A widget to show featured block to redirect users to some page.
Author: imithemes
Author URI: http://imithemes.com
*/

class Featured_Block_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'featured-block-widget',
			esc_html__('imithemes - Featured Block Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show featured block to redirect users to some page.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-star-filled',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'featured_image' => array(
					'type' => 'media',
					'label' => esc_html__('Image file', 'vestige'),
					'library' => 'image',
					'fallback' => true,
				),

				'featured_size' => array(
					'type' => 'select',
					'label' => esc_html__('Image size', 'vestige'),
					'options' => array(
						'full' => esc_html__('Full', 'vestige'),
						'large' => esc_html__('Large', 'vestige'),
						'medium' => esc_html__('Medium', 'vestige'),
						'thumbnail' => esc_html__('Thumbnail', 'vestige'),
					),
				),

				'featured_title' => array(
					'type' => 'text',
					'label' => esc_html__('Title text', 'vestige'),
				),
				'featured_text' => array(
					'type' => 'textarea',
					'label' => esc_html__('Featured Box Text', 'vestige'),
				),
				'featured_link_text' => array(
					'type' => 'text',
					'label' => esc_html__('Featured Box Link Text', 'vestige'),
				),
				'featured_url' => array(
					'type' => 'link',
					'label' => esc_html__('Destination URL', 'vestige'),
				),
				'featured_new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Open in new window', 'vestige'),
				),
				'hover_effect' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => esc_html__('Zoom Hover Effect on Images', 'vestige'),
				),

				'featured_bound' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => esc_html__('Bound', 'vestige'),
					'description' => esc_html__("Make sure the image doesn't extend beyond its container.", 'vestige'),
				),
				'featured_full_width' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Full Width', 'vestige'),
					'description' => esc_html__("Resize image to fit its container.", 'vestige'),
				),

			),
			plugin_dir_path(__FILE__)
		);
	}


	function get_style_hash($instance) {
		return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
	}

	function get_style_name($instance) {
		return false;
	}

	function get_less_variables($instance){
		return array();
	}
	
	function get_template_name($instance) {
		return 'featured-block-widget-template';
	}


}

siteorigin_widget_register('featured-block-widget', __FILE__, 'Featured_Block_Widget');