<?php

/*
Widget Name: imithemes - Venues Widget
Description: A widget to show Venues Taxonomy in list/grid/carousel layout
Author: imithemes
Author URI: http://imithemes.com
*/

class Venues_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'venues-widget',
			esc_html__('imithemes - Venues Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget to show Venues Taxonomy in list/grid/carousel layout', 'vestige'),
				'panels_icon' => 'dashicons dashicons-archive',
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
					'prompt' => esc_html__( 'Widget title alignment', 'vestige' ),
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
				'number_of_posts' => array(
					'type' => 'slider',
					'label' => esc_html__( 'Number of venues to show', 'vestige' ),
					'default' => 3,
					'min' => 1,
					'max' => 500,
					'integer' => true,
				),
				'include' => array(
					'type' => 'text',
					'label' => esc_html__('Include Venues', 'vestige'),
					'description' => esc_html__( 'Venue taxonomy IDs can be inserted in this field to show some selected venues only. See a little guide here: http://bit.ly/2ascMX0 about how to get the IDs for your venues category/taxonomy.', 'vestige' ),
				),
				'exclude' => array(
					'type' => 'text',
					'label' => esc_html__('Exclude Venues', 'vestige'),
					'description' => esc_html__( 'Venue taxonomy IDs can be inserted in this field to hide some selected venues. See a little guide here: http://bit.ly/2ascMX0 about how to get the IDs for your venues category/taxonomy. If include field is non-empty, exclude is ignored', 'vestige' ),
				),
				'orderby' => array(
					'type' => 'select',
					'prompt' => esc_html__( 'Order venues by', 'vestige' ),
					'default' => 'name',
					'options' => array(
						'name' => esc_html__( 'Name', 'vestige' ),
						'slug' => esc_html__( 'Slug', 'vestige' ),
						'term_id' => esc_html__( 'Term ID', 'vestige' ),
						'id' => esc_html__( 'ID', 'vestige' ),
						'count' => esc_html__( 'Count', 'vestige' ),
					)
				),
				'order' => array(
					'type' => 'select',
					'prompt' => esc_html__( 'Venues Order', 'vestige' ),
					'default' => 'ASC',
					'options' => array(
						'ASC' => esc_html__( 'Ascending', 'vestige' ),
						'DESC' => esc_html__( 'Descending', 'vestige' ),
					)
				),
				'shuffle' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Shuffle Venues', 'vestige'),
					'description' => esc_html__( 'Shuffle venues list/grid every time page is loaded or refreshed.', 'vestige' ),
				),
				'excerpt_length' => array(
					'type' => 'text',
					'default' => 25,
					'label' => esc_html__('Show Venue description excerpt. Enter the number of words to show, leave blank to not show. Default value is: 25', 'vestige'),
				),
				'read_more_text' => array(
					'type' => 'text',
					'default' => 'Read more',
					'label' => esc_html__('Full details button text, Leave blank to hide button - Default is Read More', 'vestige'),
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
								'12' => esc_html__( 'One', 'vestige' ),
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
							'default' => true,
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


siteorigin_widget_register('venues-widget', __FILE__, 'Venues_Widget');