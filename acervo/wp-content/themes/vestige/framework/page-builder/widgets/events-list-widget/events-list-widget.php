<?php

/*
Widget Name: imithemes - Events List/Grid Widget
Description: A widget to show special events list/grid view.
Author: imithemes
Author URI: http://imithemes.com
*/

class Events_List_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'events-list-widget',
			esc_html__('imithemes - Events List/Grid Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show special events list/grid view.', 'vestige'),
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
				'categories' => array(
					'type' => 'text',
					'label' => esc_html__('Categories (Enter comma separated events category slugs)', 'vestige'),
				),
				'event_type'    => array(
					'type'    => 'radio',
					'default' => 'future',
					'label'   => esc_html__( 'Event Type', 'vestige' ),
					'options' => array(
						'future' => esc_html__( 'Future Events', 'vestige' ),
						'past'      => esc_html__( 'Past Events', 'vestige' ),
					),
				),
				'event_order'    => array(
					'type'    => 'radio',
					'default' => 'asc',
					'label'   => esc_html__( 'Order', 'vestige' ),
					'options' => array(
						'asc' => esc_html__( 'Ascending', 'vestige' ),
						'desc'      => esc_html__( 'Descending', 'vestige' ),
					),
				),
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of events to show per page', 'vestige' ),
					'default' => 4,
					'min' => 1,
					'max' => 100,
					'integer' => true,
				),
				'show_pagination' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Show pagination for events per page? This will work on separate pages only and not on homepages.', 'vestige'),
				),
				'show_post_meta' => array(
					'type' => 'checkbox',
					'default' => true,
					'label' => esc_html__('Show post meta like event date/time, venue?', 'vestige'),
				),
				'excerpt_length' => array(
					'type' => 'text',
					'default' => 25,
					'label' => esc_html__('Show content excerpt. Enter the number of words to show, leave blank to not show. Default value is: 25', 'vestige'),
				),
				'read_more_text' => array(
					'type' => 'text',
					'default' => 'Read more',
					'label' => esc_html__('Full details button text, Leave blank to hide button - Default is Details', 'vestige'),
				),
				'listing_layout' => array(
					'type' => 'section',
					'label' => esc_html__( 'Layout', 'vestige' ),
					'hide' => false,
					'description' => esc_html__( 'Choose listing layout.', 'vestige' ),
					'fields' => array(
						'layout_type'    => array(
							'type'    => 'radio',
							'default' => 'list',
							'label'   => esc_html__( 'Layout Type', 'vestige' ),
							'options' => array(
								'list' => esc_html__( 'List View', 'vestige' ),
								'grid'      => esc_html__( 'Grid View', 'vestige' ),
							),
							'state_emitter' => array(
								'callback' => 'select',
								'args' => array( 'layout_type' )
							),
						),
						'grid_column' => array(
							'type' => 'select',
							'state_name' => 'grid',
							'prompt' => esc_html__( 'Choose Grid View Column', 'vestige' ),
							'options' => array(
								'6' => esc_html__( 'Two', 'vestige' ),
								'4' => esc_html__( 'Three', 'vestige' ),
								'3' => esc_html__( 'Four', 'vestige' ),
							),
							'state_handler' => array(
								'layout_type[grid]' => array('show'),
								'layout_type[list]' => array('hide'),
							),
						),
						'carousel_mode' => array(
							'type' => 'checkbox',
							'label' => esc_html__('Show as carousel (Only for Grid View)', 'vestige'),
							'state_handler' => array(
								'layout_type[grid]' => array('show'),
								'layout_type[list]' => array('hide'),
							),
						),
						'carousel_pagi' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__('Enbale carousel pagination', 'vestige'),
							'state_handler' => array(
								'layout_type[grid]' => array('show'),
								'layout_type[list]' => array('hide'),
							),
						),
						'carousel_nav' => array(
							'type' => 'checkbox',
							'default' => false,
							'label' => esc_html__('Enbale carousel Next/prev arrows', 'vestige'),
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
		return $instance['listing_layout']['layout_type'] == 'list' ? 'list-view' : 'grid-view';
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

siteorigin_widget_register('events-list-widget', __FILE__, 'Events_List_Widget');