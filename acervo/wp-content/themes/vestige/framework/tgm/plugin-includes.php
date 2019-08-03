<?php
require_once get_template_directory() . '/framework/tgm/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'vestige_register_required_plugins');

function vestige_register_required_plugins()
{
	$plugins_path = get_template_directory() . '/framework/tgm/plugins/';
	$plugins = array(
		array(
			'name' 					=> esc_html__('Breadcrumb NavXT', 'vestige'),
			'slug' 					=> 'breadcrumb-navxt',
			'required' 				=> true,
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-navxt.png',
		),
		array(
			'name' 					=> esc_html__('Pojo Sidebars', 'vestige'),
			'slug' 					=> 'pojo-sidebars',
			'required' 				=> false,
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-pojo.png',
		),
		array(
			'name' 					=> esc_html__('The GDPR Framework', 'vestige'),
			'slug' 					=> 'gdpr-framework',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-gdpr.png',
		),
		array(
			'name' 					=> esc_html__('Loco Translate', 'vestige'),
			'slug' 					=> 'loco-translate',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-loco.png',
		),
		array(
			'name' 					=> esc_html__('WooCommerce', 'vestige'),
			'slug' 					=> 'woocommerce',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-woo.png',
		),
		array(
			'name' 					=> esc_html__('Contact Form 7', 'vestige'),
			'slug' 					=> 'contact-form-7',
			'required' 				=> false,
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-cf7.png',
		),
		array(
			'name' 					=> esc_html__('Simple Twitter Tweets', 'vestige'),
			'slug' 					=> 'simple-twitter-tweets',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-twitter.png',
		),
		array(
			'name' 					=> esc_html__('Give - WordPress Donation Plugin', 'vestige'),
			'slug' 					=> 'give',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-give.png',
		),
		array(
			'name' 					=> esc_html__('Regenerate Thumbnails', 'vestige'),
			'slug' 					=> 'regenerate-thumbnails',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-regen.png',
		),
		array(
			'name' 					=> esc_html__('Page Builder by SiteOrigin', 'vestige'),
			'slug' 					=> 'siteorigin-panels',
			'required' 				=> true,
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-siteorigin.png',
		),
		array(
			'name' 					=> esc_html__('SiteOrigin Widgets Bundle', 'vestige'),
			'slug' 					=> 'so-widgets-bundle',
			'required' 				=> true,
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-widgetbundle.png',
		),
		array(
			'name' 					=> esc_html__('Black Studio TinyMCE Widget', 'vestige'),
			'slug' 					=> 'black-studio-tinymce-widget',
			'required' 				=> true,
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-blackstudio.png',
		),
        array(
			'name' 					=> esc_html__('Best Contact Forms', 'vestige'),
			'slug' 					=> 'wpforms-lite',
			'required' 				=> false,
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-wpforms.png',
		),
		array(
			'name'               	=> esc_html__('Revolution Slider', 'vestige'),
			'slug'               	=> 'revslider',
			'source'             	=> $plugins_path . 'revslider.zip',
			'required'           	=> true,
			'version' 			 	=> '5.4.8.3',
			'force_activation'   	=> false,
			'force_deactivation' 	=> false,
			'external_url'       	=> '',
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-revslider.png',
		),
		array(
			'name'               	=> esc_html__('A Core Plugin', 'vestige'),
			'slug'               	=> 'vestige-core',
			'source'             	=> $plugins_path . 'vestige-core.zip',
			'required'           	=> true,
			'version'            	=> '1.5.1',
			'force_activation'   	=> false,
			'force_deactivation' 	=> false,
			'external_url'       	=> '',
			'type'					=> 'Required',
			'image_src'				=> get_template_directory_uri() . '/framework/tgm/images/plugin-core.png',
		),

	);

	$config = array(
		'id'			=> 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',						// Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins',	// Menu slug.
		'parent_slug'	=> 'themes.php',			// Parent menu slug.
		'capability'	=> 'edit_theme_options',	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	=> false,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> true,					// Automatically activate plugins after installation or not.
		'message'		=> '',						// Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
}
if (function_exists('vc_set_as_theme')) vc_set_as_theme($disable_updater = true);
