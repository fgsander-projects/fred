<?php

/*
Widget Name: imithemes - Alert Box Widget
Description: A widget to add Alert Boxes to your pages.
Author: imithemes
Author URI: http://imithemes.com
*/

class Alert_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'alert-widget',
			__('imithemes - Alert Box Widget', 'vestige'),
			array(
				'description' => __('A widget to add Alert Boxes to your pages.', 'vestige'),
				'panels_icon' => 'dashicons dashicons-list-view',
				'panels_groups' => array('framework')
			),
			array(

			),
			array(
				'content' => array(
					'type' => 'textarea',
					'label' => __('Alert Box Content', 'vestige'),
					'description' => esc_html__('HTML tags are allowed in this.', 'vestige'),
					
				),
				'type' => array(
					'type' => 'select',
					'state_name' => 'standard',
					'label' => esc_html__( 'Choose Color Style', 'vestige' ),
					'prompt' => esc_html__( 'Choose Color Style', 'vestige' ),
					'options' => array(
						'standard' => esc_html__( 'Standard', 'vestige' ),
						'warning' => esc_html__( 'Warning', 'vestige' ),
						'error' => esc_html__( 'Error', 'vestige' ),
						'info' => esc_html__( 'Info', 'vestige' ),
						'success' => esc_html__( 'Success', 'vestige' ),
					)
				),
				'custom_color' => array(
					'type' => 'color',
					'label' => esc_html__('Custom background color', 'vestige'),
					'default' => '',
				),
				'custom_bcolor' => array(
					'type' => 'color',
					'label' => esc_html__('Custom border color', 'vestige'),
					'default' => '',
				),
				'custom_tcolor' => array(
					'type' => 'color',
					'label' => esc_html__('Custom text color', 'vestige'),
					'default' => '',
				),
				'close' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Show close button', 'vestige'),
					'default' => true,
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
						'rotateIn' => __( 'RotateIn', 'vestige' ),
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

siteorigin_widget_register('alert-widget', __FILE__, 'Alert_Widget');