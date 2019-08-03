<?php

/*
Widget Name: imithemes - Custom Grid/List Widget
Description: A widget to show custom content in Grid/List style
Author: imithemes
Author URI: http://imithemes.com
*/

class Custom_grid_list_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'custom-grid-list-widget',
			esc_html__('imithemes - Custom Grid/List Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show custom content in Grid/List style', 'vestige'),
				'panels_icon' => 'dashicons dashicons-star-filled',
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
					'prompt' => esc_html__( 'Title Alignment', 'vestige' ),
					'options' => array(
						'left' => esc_html__( 'Left', 'vestige' ),
						'center' => esc_html__( 'Center', 'vestige' ),
						'right' => esc_html__( 'Right', 'vestige' ),
					)
				),
				'title_url' => array(
					'type' => 'link',
					'label' => esc_html__('Title URL', 'vestige'),
				),
				'stitle' => array(
					'type' => 'text',
					'label' => esc_html__('Sub Title', 'vestige'),
				),
				'stitle_position' => array(
					'type' => 'select',
					'state_name' => 'grid',
					'prompt' => esc_html__( 'Sub Title Alignment', 'vestige' ),
					'options' => array(
						'left' => esc_html__( 'Left', 'vestige' ),
						'center' => esc_html__( 'Center', 'vestige' ),
						'right' => esc_html__( 'Right', 'vestige' ),
					)
				),
				'stitle_url' => array(
					'type' => 'link',
					'label' => esc_html__('Sub Title URL', 'vestige'),
				),
				'item_image' => array(
					'type' => 'media',
					'label' => esc_html__('Image file', 'vestige'),
					'library' => 'image',
					'fallback' => true,
				),

				'item_size' => array(
					'type' => 'select',
					'label' => esc_html__('Image size', 'vestige'),
					'options' => array(
						'full' => esc_html__('Full', 'vestige'),
						'large' => esc_html__('Large', 'vestige'),
						'medium' => esc_html__('Medium', 'vestige'),
						'thumb' => esc_html__('Thumbnail', 'vestige'),
					),
				),
				'image_lightbox' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => esc_html__('Open full size image in lighbox', 'vestige'),
				),
				'item_text' => array(
					'type' => 'textarea',
					'label' => esc_html__('Content', 'vestige'),
				),
				'item_footer' => array(
					'type' => 'text',
					'label' => esc_html__('Footer text', 'vestige'),
				),
				'read_more_text' => array(
					'type' => 'text',
					'default' => 'Read more',
					'label' => esc_html__('Read More button text, Leave blank to hide button - Default is Read More will be linked to URL that is for Title URL', 'vestige'),
				),
				'layout_type'    => array(
					'type'    => 'radio',
					'default' => 'grid',
					'label'   => esc_html__( 'Layout Type', 'vestige' ),
					'options' => array(
						'grid'      => esc_html__( 'Grid View', 'vestige' ),
						'list' => esc_html__( 'List View', 'vestige' ),
					),
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
	
	function get_template_name( $instance ) {
		return $instance['layout_type'] == 'list' ? 'list-view' : 'grid-view';
	}


}

siteorigin_widget_register('custom-grid-list-widget', __FILE__, 'Custom_Grid_list_Widget');