<?php

/*
Widget Name: imithemes - Icon Box Widget
Description: A widget for multiple type Icon Box Styles
Author: imithemes
Author URI: http://imithemes.com
*/

class Iconbox_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'iconbox-widget',
			esc_html__('imithemes - Icon Box Widget', 'vestige'),
			array(
				'description' => esc_html__('A widget for multiple type Icon Box Styles', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'icon' => array(
					'type' => 'icon',
					'label' => esc_html__('Icon', 'vestige'),
				),
				'icon_image' => array(
					'type' => 'media',
					'library' => 'image',
					'label' => esc_html__('Icon image', 'vestige'),
					'description' => esc_html__('Use your own icon image.', 'vestige'),
				),
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Icon Box Title', 'vestige'),
					'description' => esc_html__('Enter Icon Box Title', 'vestige'),
					
				),
				'content' => array(
					'type' => 'textarea',
					'label' => esc_html__('Icon Box Content', 'vestige'),
					'description' => esc_html__('Enter Icon Box Content', 'vestige'),
					
				),
				'link' => array(
					'type' => 'link',
					'label' => esc_html__('Icon Box Destination URL', 'vestige'),
				),
				'link_new_window' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => esc_html__('Open in new window', 'vestige'),
				),
				'align' => array(
					'type' => 'select',
					'state_name' => 'standard',
					'label' => esc_html__( 'Icon Box Align', 'vestige' ),
					'prompt' => esc_html__( 'Choose Alignment', 'vestige' ),
					'options' => array(
						'standard' => esc_html__( 'Default(Left)', 'vestige' ),
						'ibox-center' => esc_html__( 'Centered', 'vestige' ),
					)
				),
				'type' => array(
					'type' => 'select',
					'state_name' => 'default',
					'label' => esc_html__( 'Icon Box Type', 'vestige' ),
					'prompt' => esc_html__( 'Choose Type', 'vestige' ),
					'options' => array(
						'default' => __( 'Default', 'vestige' ),
						'ibox-outline' => esc_html__( 'Outline', 'vestige' ),
						'ibox-border' => esc_html__( 'Thin Border', 'vestige' ),
						'ibox-plain' => esc_html__( 'Plain', 'vestige' ),
					)
				),
				'style' => array(
					'type' => 'select',
					'state_name' => 'standard',
					'label' => esc_html__( 'Icon Box Theme', 'vestige' ),
					'prompt' => esc_html__( 'Choose Theme', 'vestige' ),
					'options' => array(
						'standard' => esc_html__( 'Default', 'vestige' ),
						'ibox-light' => esc_html__( 'Light', 'vestige' ),
						'ibox-dark' => esc_html__( 'Dark', 'vestige' ),
					)
				),
				'circle' => array(
					'type' => 'select',
					'state_name' => 'standard',
					'label' => esc_html__( 'Icon Box Style', 'vestige' ),
					'prompt' => esc_html__( 'Choose Style', 'vestige' ),
					'options' => array(
						'standard' => esc_html__( 'Default(Circle)', 'vestige' ),
						'ibox-rounded' => __( 'Rounded', 'vestige' ),
					)
				),
				'custom_color' => array(
					'type' => 'color',
					'label' => esc_html__('Custom background & border color', 'vestige'),
					'default' => '',
				),
				'custom_tcolor' => array(
					'type' => 'color',
					'label' => esc_html__('Custom icon color', 'vestige'),
					'default' => '',
				),
				'animation' => array(
					'type' => 'select',
					'state_name' => 'fadeIn',
					'label' => esc_html__( 'Choose animation', 'vestige' ),
					'prompt' => esc_html__( 'Choose animation', 'vestige' ),
					'options' => array(
						'flash' => esc_html__( 'Flash', 'vestige' ),
						'shake' => esc_html__( 'Shake', 'vestige' ),
						'bounce' => esc_html__( 'Bounce', 'vestige' ),
						'tada' => esc_html__( 'Tada', 'vestige' ),
						'swing' => esc_html__( 'Swing', 'vestige' ),
						'wobble' => esc_html__( 'Wobble', 'vestige' ),
						'wiggle' => esc_html__( 'Wiggle', 'vestige' ),
						'pulse' => esc_html__( 'Pulse', 'vestige' ),
						'fadeIn' => esc_html__( 'FadeIn', 'vestige' ),
						'fadeInUp' => esc_html__( 'FadeInUp', 'vestige' ),
						'fadeInLeft' => esc_html__( 'FadeInLeft', 'vestige' ),
						'fadeInRight' => esc_html__( 'FadeInRight', 'vestige' ),
						'fadeInUpBig' => esc_html__( 'FadeInUpBig', 'vestige' ),
						'fadeInDownBig' => esc_html__( 'FadeInDownBig', 'vestige' ),
						'fadeInLeftBig' => esc_html__( 'FadeInDownBig', 'vestige' ),
						'fadeInRightBig' => esc_html__( 'FadeInRightBig', 'vestige' ),
						'bounceIn' => esc_html__( 'BounceIn', 'vestige' ),
						'bounceInUp' => esc_html__( 'BounceInUp', 'vestige' ),
						'bounceInDown' => esc_html__( 'BounceInDown', 'vestige' ),
						'bounceInLeft' => esc_html__( 'BounceInLeft', 'vestige' ),
						'bounceInRight' => esc_html__( 'BounceInRight', 'vestige' ),
						'rotateIn' => esc_html__( 'RotateIn', 'vestige' ),
						'rotateInUpLeft' => esc_html__( 'RotateInUpLeft', 'vestige' ),
						'rotateInDownLeft' => esc_html__( 'RotateInDownLeft', 'vestige' ),
						'rotateInUpRight' => esc_html__( 'RotateInUpRight', 'vestige' ),
						'rotateInDownRight' => esc_html__( 'RotateInDownRight', 'vestige' ),
					)
				),
			),
			plugin_dir_path(__FILE__)
		);
	}
	
	
	function get_template_name( $instance ) {
		return 'template';
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

siteorigin_widget_register('iconbox-widget', __FILE__, 'Iconbox_Widget');