<?php

/*
Widget Name: imithemes - Gallery Grid Widget
Description: A widget to show Gallery items grid view.
Author: imithemes
Author URI: http://imithemes.com
*/

class Gallery_Grid_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'gallery-grid-widget',
			esc_html__('imithemes - Gallery Grid Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show Gallery items grid view.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-format-gallery',
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
					'label' => esc_html__('Categories (Enter comma separated gallery category slugs)', 'vestige'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of Gallery Items to show', 'vestige' ),
					'default' => 3,
					'min' => 1,
					'max' => 100,
					'integer' => true,
				),
				'show_pagination' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Show pagination for posts per page? This will work on separate pages only and not on homepages.', 'vestige'),
				),
				'show_post_meta' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Show gallery item titles', 'vestige'),
				),
				'filters' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Show categories filter', 'vestige'),
				),
				'listing_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Layout', 'vestige' ),
					'hide' => false,
					'description' => esc_html__( 'Choose listing layout.', 'vestige' ),
					'fields' => array(
						'grid_column' => array(
							'type' => 'select',
							'state_name' => '4',
							'prompt' => esc_html__( 'Choose Column', 'vestige' ),
							'options' => array(
								'6' => esc_html__( 'Two', 'vestige' ),
								'4' => esc_html__( 'Three', 'vestige' ),
								'3' => esc_html__( 'Four', 'vestige' ),
							),
						),
						'carousel_mode' => array(
							'type' => 'checkbox',
							'label' => esc_html__('Show as carousel', 'vestige'),
						),
						'carousel_pagi' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__('Enable carousel pagination', 'vestige'),
						),
						'carousel_nav' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__('Enable carousel Next/prev arrows', 'vestige'),
						),
						'carousel_auto' => array(
							'type' => 'number',
							'default' => '',
							'label' => esc_html__('Enter time interval for Auto Carousel. 1000 = 1 second. Leave blank for no AutoPlay.', 'vestige'),
						),
					),
				)
				
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_variables( $instance, $args ) {
		$layout = $instance['listing_layout'];
		return array(
				'layout_type' => array(
					'column'  => (!empty($layout['grid_column']))? $layout['grid_column'] : 4
				)
			);
	}
	
	function get_template_name( $instance ) {
		return 'grid-view';
	}

	function get_style_name($instance) {
		return false;
	}

	function get_less_variables($instance){
		return false;
	}


}

siteorigin_widget_register('gallery-grid-widget', __FILE__, 'Gallery_Grid_Widget');