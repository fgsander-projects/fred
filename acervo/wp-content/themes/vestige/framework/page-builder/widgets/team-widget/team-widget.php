<?php

/*
Widget Name: imithemes - Team Grid/Carousel
Description: A widget to show team/staff members in a grid or carousel
Author: imithemes
Author URI: http://imithemes.com
*/

class Team_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'team-widget',
			esc_html__('imithemes - Team Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show team/staff members in a grid or carousel', 'vestige'),
				'panels_icon' => 'dashicons dashicons-groups',
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
					'label' => esc_html__('Categories (Enter comma separated team category slugs)', 'vestige'),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of team members to show', 'vestige' ),
					'default' => 4,
					'min' => 1,
					'max' => 100,
					'integer' => true,
				),
				'linked_title' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Link thumbnail and title to single team page', 'vestige'),
					'default' => 0
				),
				'listing_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Layout', 'vestige' ),
					'hide' => false,
					'description' => esc_html__( 'Choose listing layout.', 'vestige' ),
					'fields' => array(
						'grid_column' => array(
							'type' => 'select',
							'state_name' => 'grid',
							'prompt' => esc_html__( 'Choose Grid View Column', 'vestige' ),
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
							'label' => esc_html__('Enbale carousel pagination', 'vestige'),
						),
						'carousel_nav' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__('Enbale carousel Next/prev arrows', 'vestige'),
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

siteorigin_widget_register('team-widget', __FILE__, 'Team_Widget');