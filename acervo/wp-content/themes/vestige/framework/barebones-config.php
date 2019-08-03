<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "imic_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'vestige' ),
        'page_title'           => esc_html__( 'Theme Options', 'vestige' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'imi-admin-welcome',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

	$ext_path = get_template_directory() . '/framework/imi-admin/theme-options/extensions/';
    Redux::setExtensions( $opt_name, $ext_path );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/imithemes',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/imithemes',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        
    } else {
        
    }

    Redux::setArgs( $opt_name, $args );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'vestige' );
    Redux::setHelpSidebar( $opt_name, $content );

	$defaultAdminLogo = get_template_directory_uri().'/assets/images/logo@2x.png';
	$defaultBannerImages = get_template_directory_uri().'/assets/images/page-header1.jpg';
	$default_logo = get_template_directory_uri() . '/assets/images/logo.png';
	$default_favicon = get_template_directory_uri() . '/assets/images/favicon.ico';
	$default_iphone = get_template_directory_uri() . '/assets/images/apple-iphone.png';
	$default_iphone_retina = get_template_directory_uri() . '/assets/images/apple-iphone-retina.png';
	$default_ipad = get_template_directory_uri() . '/assets/images/apple-ipad.png';
	$default_ipad_retina = get_template_directory_uri() . '/assets/images/apple-ipad-retina.png';


    // -> START Basic Fields
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => esc_html__('General', 'vestige'),
    'fields' => array(
        array(
            'id' => 'enable_maintenance',
            'type' => 'switch',
            'title' => esc_html__('Enable Maintenance', 'vestige'),
            'subtitle' => esc_html__('Enable the themes in maintenance mode.', 'vestige'),
            "default" => 'off',
            'on' => esc_html__('Enabled', 'vestige'),
            'off' => esc_html__('Disabled', 'vestige'),
        ),
        array(
            'id' => 'enable_backtotop',
            'type' => 'switch',
            'title' => esc_html__('Enable Back To Top', 'vestige'),
            'subtitle' => esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'vestige'),
            "default" => 1,
        ),
       array(
            'id' => 'space-before-head',
            'type' => 'ace_editor',
            'title' => __('Space before closing head tag', 'vestige'),
            'subtitle' => __('Add your code before closing head tag', 'vestige'),
			'default' => '',
        ),
       array(
            'id' => 'space-before-body',
            'type' => 'ace_editor',
            'title' => __('Space before closing body tag', 'vestige'),
            'subtitle' => __('Add your code before closing body tag', 'vestige'),
			'default' => '',
        ),
    )
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-website',
    'title' => esc_html__('Responsive', 'vestige'),
    'fields' => array(
        array(
            'id' => 'switch-responsive',
            'type' => 'switch',
            'title' => __('Enable Responsive', 'vestige'),
            'subtitle' => __('Enable/Disable the responsive behaviour of the theme', 'vestige'),
            "default" => 1,
        ),
        array(
            'id' => 'switch-zoom-pinch',
            'type' => 'switch',
            'title' => __('Enable Zoom on mobile devices', 'vestige'),
            'subtitle' => __('Enable/Disable zoom pinch behaviour on touch devices', 'vestige'),
            "default" => 0,
        ),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-screen',
    'title' => esc_html__('Layout', 'vestige'),
    'fields' => array(
        array(
			'id'=>'site_layout',
			'type' => 'image_select',
			'compiler'=>true,
			'title' => esc_html__('Page Layout', 'vestige'), 
			'subtitle' => esc_html__('Select the page layout type', 'vestige'),
			'options' => array(
					'wide' => array('alt' => 'Wide', 'img' => get_template_directory_uri().'/assets/images/wide.png'),
					'boxed' => array('alt' => 'Boxed', 'img' => get_template_directory_uri().'/assets/images/boxed.png')
				),
			'default' => 'wide',
			),
		array(
			'id'=>'repeatable-bg-image',
			'type' => 'image_select',
			'required' => array('site_layout','equals','boxed'),
			'title' => esc_html__('Repeatable Background Images', 'vestige'), 
			'subtitle' => esc_html__('Select image to set in background.', 'vestige'),
			'options' => array(
				'pt1.png' => array('alt' => 'pt1', 'img' => get_template_directory_uri().'/assets/images/patterns/pt1.png'),
				'pt2.png' => array('alt' => 'pt2', 'img' => get_template_directory_uri().'/assets/images/patterns/pt2.png'),
				'pt3.png' => array('alt' => 'pt3', 'img' => get_template_directory_uri().'/assets/images/patterns/pt3.png'),
				'pt4.png' => array('alt' => 'pt4', 'img' => get_template_directory_uri().'/assets/images/patterns/pt4.png'),
				'pt5.png' => array('alt' => 'pt5', 'img' => get_template_directory_uri().'/assets/images/patterns/pt5.png'),
				'pt6.png' => array('alt' => 'pt6', 'img' => get_template_directory_uri().'/assets/images/patterns/pt6.png'),
				'pt7.png' => array('alt' => 'pt7', 'img' => get_template_directory_uri().'/assets/images/patterns/pt7.png'),
				'pt8.png' => array('alt' => 'pt8', 'img' => get_template_directory_uri().'/assets/images/patterns/pt8.png'),
				'pt9.png' => array('alt' => 'pt9', 'img' => get_template_directory_uri().'/assets/images/patterns/pt9.png'),
				'pt10.png' => array('alt' => 'pt10', 'img' => get_template_directory_uri().'/assets/images/patterns/pt10.png'),
				'pt11.jpg' => array('alt' => 'pt11', 'img' => get_template_directory_uri().'/assets/images/patterns/pt11.png'),
				'pt12.jpg' => array('alt' => 'pt12', 'img' => get_template_directory_uri().'/assets/images/patterns/pt12.png'),
				'pt13.jpg' => array('alt' => 'pt13', 'img' => get_template_directory_uri().'/assets/images/patterns/pt13.png'),
				'pt14.jpg' => array('alt' => 'pt14', 'img' => get_template_directory_uri().'/assets/images/patterns/pt14.png'),
				'pt15.jpg' => array('alt' => 'pt15', 'img' => get_template_directory_uri().'/assets/images/patterns/pt15.png'),
				'pt16.png' => array('alt' => 'pt16', 'img' => get_template_directory_uri().'/assets/images/patterns/pt16.png'),
				'pt17.png' => array('alt' => 'pt17', 'img' => get_template_directory_uri().'/assets/images/patterns/pt17.png'),
				'pt18.png' => array('alt' => 'pt18', 'img' => get_template_directory_uri().'/assets/images/patterns/pt18.png'),
				'pt19.png' => array('alt' => 'pt19', 'img' => get_template_directory_uri().'/assets/images/patterns/pt19.png'),
				'pt20.png' => array('alt' => 'pt20', 'img' => get_template_directory_uri().'/assets/images/patterns/pt20.png'),
				'pt21.png' => array('alt' => 'pt21', 'img' => get_template_directory_uri().'/assets/images/patterns/pt21.png'),
				'pt22.png' => array('alt' => 'pt22', 'img' => get_template_directory_uri().'/assets/images/patterns/pt22.png'),
				'pt23.png' => array('alt' => 'pt23', 'img' => get_template_directory_uri().'/assets/images/patterns/pt23.png'),
				'pt24.png' => array('alt' => 'pt24', 'img' => get_template_directory_uri().'/assets/images/patterns/pt24.png'),
				'pt25.png' => array('alt' => 'pt25', 'img' => get_template_directory_uri().'/assets/images/patterns/pt25.png'),
				'pt26.png' => array('alt' => 'pt26', 'img' => get_template_directory_uri().'/assets/images/patterns/pt26.png'),
				'pt27.png' => array('alt' => 'pt27', 'img' => get_template_directory_uri().'/assets/images/patterns/pt27.png'),
				'pt28.png' => array('alt' => 'pt28', 'img' => get_template_directory_uri().'/assets/images/patterns/pt28.png'),
				'pt29.png' => array('alt' => 'pt29', 'img' => get_template_directory_uri().'/assets/images/patterns/pt29.png'),
				'pt30.png' => array('alt' => 'pt30', 'img' => get_template_directory_uri().'/assets/images/patterns/pt30.png')
				)
			),	
		array(
			'id'=>'upload-repeatable-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload Repeatable Background Image', 'vestige')
			),
		array(
			'id'=>'full-screen-bg-image',
			'compiler'=>true,
			'required' => array('site_layout','equals','boxed'),
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload Full Screen Background Image', 'vestige')
		),
        array(
			'id'=>'site_width',
			'type' => 'text',
			'compiler'=>true,
			'title' => esc_html__('Site width in pixels. DO NOT PUT px HERE', 'vestige'), 
			'subtitle' => esc_html__('Width of the site container.', 'vestige'),
			'default' => '1080',
		),	
		
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Content', 'vestige'),
	'subsection' => true,
    'fields' => array(
		array(  'id' => 'content_background',
				'type' => 'background',
				'background-color'=> true,
				'output' => array('.content'),
				'title' => __('Content area Background', 'vestige'),
    			'subtitle' => __('Background color or image for the content area. This works for both boxed or wide layouts.', 'vestige'),
				'default' => array(
					'background-color' => '#ffffff'
				)
		),
		array(
			'id'       => 'content_padding',
			'type'     => 'spacing',
			'units'    => array('px'),
			'mode'	   => 'padding',
			'left'	   => false,
			'right'	   => false,
			'output'   => array('.content'),
			'title'    => __('Top and Bottom padding for content area', 'vestige'),
			'subtitle' => __('Enter top and bottom padding for content area. Default is 50px/50px', 'vestige'),
			'default'            => array(
			'padding-top'     => '50px',
			'padding-bottom'  => '50px',
			'units'          => 'px',
			),
		),
		array(
			'id'       => 'content_min_height',
			'type'     => 'text',
			'title'    => __('Minimum Height for Content area', 'vestige'),
			'subtitle' => __('Enter minimum height for the page content area. DO NOT PUT px HERE. Default is 400', 'vestige'),
			'default'  => '400'
		),
        array(
			'id'=>'content_wide_width',
			'type' => 'checkbox',
			'compiler'=>true,
			'title' => __('100% Content Width', 'vestige'), 
			'subtitle' => __('Check this box to set the content area to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'vestige'),
			'default' => '0',
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-chevron-up',
    'title' => esc_html__('Header', 'vestige'),
    'desc' => esc_html__('These are the options for the header.', 'vestige'),
    'fields' => array(
		array(
    		'id' => 'header_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Header Layout','vestige'), 
			'subtitle' => esc_html__('Select the Header layout', 'vestige'),
			'options' => array(
				'header-style1' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-style1.png'),
				'header-style2' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-style2.png'),
				'header-style3' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/headerLayout/header-style3.png'),
			),
    		'default' => 'header-style1'
    	),
		array(  'id' => 'header_background_alpha',
				'type' => 'color_rgba',
				'output' => array('background-color' => '.site-header, .header-style2 .site-header, .header-style3 .site-header'),
				'title' => __('Header Translucent Background Color', 'vestige'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
		),
		array(  'id' => 'header_background',
				'type' => 'background',
				'background-color'=> false,
				'output' => array('.site-header, .header-style2 .site-header, .header-style3 .site-header'),
				'title' => __('Header Background Image', 'vestige'),
    			'subtitle' => __('Background image for the header.', 'vestige')
		),
        array(
            'id' => 'full_width_header',
            'type' => 'checkbox',
            'title' => __('100% Header Width', 'vestige'),
            'subtitle' => __('Check this box to set header width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'vestige'),
            "default" => 0,
        ),
		array(
            'id' => 'header_text_btn1',
            'type' => 'text',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button1 Label', 'vestige'),
            'subtitle' => esc_html__('Enter button text for the first button to show at the right of Header Style 3', 'vestige'),
            'default' => ''
        ),
		array(
            'id' => 'header_url_btn1',
            'type' => 'text',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button1 URL', 'vestige'),
            'subtitle' => esc_html__('Enter button URL for the first button to show at the right of Header Style 3', 'vestige'),
            'default' => ''
        ),
		array(
            'id' => 'header_style_btn1',
            'type' => 'select',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button1 Style', 'vestige'),
            'subtitle' => esc_html__('Choose style of the button1 to show at the right of Header Style 3', 'vestige'),
			'options' => array(
				'btn-primary' => esc_html__('Primary Color','vestige'),
				'btn-danger' => esc_html__('Red','vestige'),
				'btn-info' => esc_html__('Blue','vestige'),
				'btn-warning' => esc_html__('Yellow','vestige'),
				'btn-success' => esc_html__('Green','vestige'),
			),
            'default' => ''
        ),
		array(
            'id' => 'header_text_btn2',
            'type' => 'text',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button2 Label', 'vestige'),
            'subtitle' => esc_html__('Enter button text for the button2 to show at the right of Header Style 3', 'vestige'),
            'default' => ''
        ),
		array(
            'id' => 'header_url_btn2',
            'type' => 'text',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button2 URL', 'vestige'),
            'subtitle' => esc_html__('Enter button URL for first button2 to show at the right of Header Style 3', 'vestige'),
            'default' => ''
        ),
		array(
            'id' => 'header_style_btn2',
            'type' => 'select',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button2 Style', 'vestige'),
            'subtitle' => esc_html__('Choose style of the button2 to show at the right of Header Style 3', 'vestige'),
			'options' => array(
				'btn-primary' => esc_html__('Primary Color','vestige'),
				'btn-danger' => esc_html__('Red','vestige'),
				'btn-info' => esc_html__('Blue','vestige'),
				'btn-warning' => esc_html__('Yellow','vestige'),
				'btn-success' => esc_html__('Green','vestige'),
			),
            'default' => ''
        ),
		array(
            'id' => 'header_text_btn3',
            'type' => 'text',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button3 Label', 'vestige'),
            'subtitle' => esc_html__('Enter button text for the button3 to show at the right of Header Style 3', 'vestige'),
            'default' => ''
        ),
		array(
            'id' => 'header_url_btn3',
            'type' => 'text',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button3 URL', 'vestige'),
            'subtitle' => esc_html__('Enter button URL for the button3 to show at the right of Header Style 3', 'vestige'),
            'default' => ''
        ),
		array(
            'id' => 'header_style_btn3',
            'type' => 'select',
			'required' => array('header_layout','equals','header-style3'),
            'title' => esc_html__('Button3 Style', 'vestige'),
            'subtitle' => esc_html__('Choose style of the button3 to show at the right of Header Style 3', 'vestige'),
			'options' => array(
				'btn-primary' => esc_html__('Primary Color','vestige'),
				'btn-danger' => esc_html__('Red','vestige'),
				'btn-info' => esc_html__('Blue','vestige'),
				'btn-warning' => esc_html__('Yellow','vestige'),
				'btn-success' => esc_html__('Green','vestige'),
			),
            'default' => ''
        ),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Sticky Header', 'vestige'),
    'desc' => esc_html__('These are the options for the header.', 'vestige'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable-header-stick',
            'type' => 'switch',
            'title' => __('Enable Sticky Header', 'vestige'),
            'subtitle' => __('Enable/Disable Sticky header behaviour of the theme', 'vestige'),
            "default" => 1,
        ),
        array(
            'id' => 'header-stick-tablets',
            'type' => 'switch',
			'required' => array('enable-header-stick','=','1'),
            'title' => __('Enable Sticky Header on Tablets', 'vestige'),
            'subtitle' => __('Enable/Disable Sticky header on scroll on Tablets', 'vestige'),
            "default" => 1,
        ),
        array(
            'id' => 'header-stick-mobiles',
            'type' => 'switch',
			'required' => array('enable-header-stick','=','1'),
            'title' => __('Enable Sticky Header on Mobiles', 'vestige'),
            'subtitle' => __('Enable/Disable Sticky header on scroll on Mobiles', 'vestige'),
            "default" => 1,
        ),
		array(  'id' => 'sticky_header_background_alpha',
				'type' => 'color_rgba',
				'output' => array('background-color' => '.header-style1 .is-sticky .site-header, .header-style2 .is-sticky .site-header, .header-style3 .is-sticky .main-navbar'),
				'title' => __('Sticky Header Translucent Background Color', 'vestige'),
				'options'       => array(
					'show_input'                => true,
					'show_initial'              => true,
					'show_alpha'                => true,
					'show_palette'              => false,
					'show_palette_only'         => false,
					'show_selection_palette'    => true,
					'max_palette_size'          => 10,
					'allow_empty'               => true,
					'clickout_fires_change'     => false,
					'choose_text'               => 'Choose',
					'cancel_text'               => 'Cancel',
					'show_buttons'              => true,
					'use_extended_classes'      => true,
					'palette'                   => null,  // show default
					'input_text'                => 'Select Color'
				),
		),
		array(  'id' => 'sticky_header_background',
				'type' => 'background',
				'background-color'=> false,
				'output' => array('.header-style1 .is-sticky .site-header, .header-style2 .is-sticky .site-header, .header-style3 .is-sticky .main-navbar'),
				'title' => __('Sticky Header(Logo Area) Background Image', 'vestige'),
    			'subtitle' => __('Background color or image for the header.', 'vestige')
		),
		array(
			'id'       => 'sticky_link_color',
			'type'     => 'link_color',
			'required' => array('header_layout','!=','header-style3'),
			'title'    => __('Sticky Header Link Color', 'vestige'),
			'desc'     => __('Set the sticky header/menu links color, hover, active.', 'vestige'),
			'output'   => array('html .is-sticky .site-header .main-navigation > ul > li > a'),
		),
		array(
			'id'       => 'sticky_link_color_h3',
			'type'     => 'link_color',
			'required' => array('header_layout','=','header-style3'),
			'title'    => __('Sticky Header Link Color', 'vestige'),
			'desc'     => __('Set the sticky header/menu links color, hover, active.', 'vestige'),
			'output'   => array('.header-style3 .is-sticky > .main-navbar .main-navigation > ul > li > a'),
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Topbar', 'vestige'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'enable_topbar',
            'type' => 'switch',
            'title' => esc_html__('Enable TopBar', 'vestige'),
            'subtitle' => esc_html__('Enable the global TopBar for the website.', 'vestige'),
            "default" => 1,
        ),
		array(
            'id' => 'topbar_left',
            'type' => 'text',
			'required' => array('enable_topbar','equals','1'),
            'title' => esc_html__('Text for the TopBar left column', 'vestige'),
            'subtitle' => esc_html__('Enter short and sweet text for the TopBar left side.', 'vestige'),
            'default' => ''
        ),
        array(
			'id' => 'header_social_links',
			'type' => 'sortable',
			'label' => true,
			'compiler'=>true,
			'title' => esc_html__('Social Links', 'vestige'),
			'desc' => esc_html__('Enter the social links and sort to active and display according to sequence in Header topBar.', 'vestige'),
			'options' => array(
				'fa-facebook' => 'facebook',
				'fa-twitter' => 'twitter',
				'fa-pinterest' => 'pinterest',
				'fa-google-plus' => 'google',
				'fa-youtube' => 'youtube',
				'fa-instagram' => 'instagram',
				'fa-vimeo-square' => 'vimeo',
				'fa-rss' => 'rss',
				'fa-dribbble' => 'dribbble',
				'fa-dropbox' => 'dropbox',
				'fa-bitbucket' => 'bitbucket',
				'fa-flickr' => 'flickr',
				'fa-foursquare' => 'foursquare',
				'fa-github' => 'github',
				'fa-gittip' => 'gittip',
				'fa-linkedin' => 'linkedin',
				'fa-pagelines' => 'pagelines',
				'fa-skype' => 'Enter Skype ID',
				'fa-envelope' => 'Enter Email Address',
				'fa-tumblr' => 'tumblr',
				'fa-tripadvisor' => 'tripadvisor',
				'fa-vk' => 'vk',
				'fa-yelp' => 'yelp'
			),
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Inner Page Header', 'vestige'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'header_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Header Image', 'vestige'),
            'desc' => esc_html__('Default header image for post types.', 'vestige'),
            'subtitle' => esc_html__('Set this image as default header image for all Pages/Posts.', 'vestige'),
            'default' => array('url' => ''),
        ),
		array(
            'id' => 'inner_header_height',
            'type' => 'text',
            'title' => esc_html__('Height of inner pages header', 'vestige'),
            'subtitle' => esc_html__('This can be overridden by the page/post banner options. Default is 260', 'vestige'),
            'desc' => esc_html__('DO NOT PUT px HERE', 'vestige'),
        ),
        array(
            'id' => 'show_page_title',
            'type' => 'checkbox',
            'title' => __('Show page title in page header', 'vestige'),
            'subtitle' => __('Check this box to show page/post title in the page header area. Uncheck to hide(This will override the individual page setting for page title)', 'vestige'),
            "default" => 1,
        ),
		array(
			'id'=>'show_page_title_typo',
			'required' => array('show_page_title','equals',1),
			'type' => 'typography',
			'google'      => true,
			'font-family' => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => false,
			'letter-spacing' => true,
			'text-transform' => true,
			'preview' => true,
			'output' => array('.page-header > div > div > span'),
			'title' => esc_html__('Inner page header title typography', 'vestige'),
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-upload',
    'title' => esc_html__('Logo', 'vestige'),
    'fields' => array(
		array(
            'id' => 'h1_logo_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'required' 	=> array('header_layout','equals','header-style1'),
			'output' => array('.header-style1 .site-logo'),
            'title' => __('Background color for the Logo', 'vestige'),
            'desc' => __('Background color set for the logo block on Header Style 1', 'vestige'),
        ),
        array(
            'id' => 'logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo', 'vestige'),
            'subtitle' => esc_html__('Upload site logo to display in header.', 'vestige'),
            'default' => array(
				'url' => $default_logo,
				'height' => 50
			),
        ),
        array(
            'id' => 'retina_logo_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo for Retina Devices', 'vestige'),
            'desc' => esc_html__('Retina Display is a marketing term developed by Apple to refer to devices and monitors that have a resolution and pixel density so high – roughly 300 or more pixels per inch', 'vestige'),
            'subtitle' => esc_html__('Upload site logo to display in header.', 'vestige'),
            'default' => array(
				'url' => $defaultAdminLogo
			),
        ),
		array(
            'id' => 'retina_logo_width',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Width for Retina Logo', 'vestige'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version width, do not enter the retina logo width.', 'vestige'),
            'default' => 113
        ),
		array(
            'id' => 'retina_logo_height',
            'type' => 'text',
            'title' => esc_html__('Standard Logo Height for Retina Logo', 'vestige'),
            'subtitle' => esc_html__('If retina logo is uploaded, enter the standard logo (1x) version height, do not enter the retina logo height.', 'vestige'),
            'default' => 50
        ),
		array(
			'id'       => 'logo_spacing',
			'type'     => 'spacing',
			'units'    => array('px'),
			'mode'	   => 'padding',
			'left'	   => false,
			'right'	   => false,
			'output'   => array('.site-logo h1'),
			'title'    => __('Top and Bottom spacing for logo', 'vestige'),
			'subtitle' => __('Enter top and bottom spacing for logo. Default is 17px/17px', 'vestige'),
			'default'            => array(
			'padding-top'     => '17px',
			'padding-bottom'  => '17px',
			'units'          => 'px',
			),
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Admin Logo', 'vestige'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_admin_login_logo',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Custom admin login logo', 'vestige'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => esc_html__('Upload a 254 x 95px image here to replace the default wordpress login logo.', 'vestige'),
            'subtitle' => esc_html__('', 'vestige'),
            'default' => array('url' => $defaultAdminLogo),
        ),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Favicon Options', 'vestige'),
	'subsection' => true,
    'fields' => array(
        array(
            'id' => 'custom_favicon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Custom favicon', 'vestige'),
            'desc' => __('Upload a image that will represent your website favicon', 'vestige'),
            'default' => array('url' => $default_favicon),
        ),
        array(
            'id' => 'iphone_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPhone Icon', 'vestige'),
            'desc' => __('Upload Favicon for Apple iPhone (57px x 57px)', 'vestige'),
            'default' => array('url' => $default_iphone),
        ),
        array(
            'id' => 'iphone_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPhone Retina Icon', 'vestige'),
            'desc' => __('Upload Favicon for Apple iPhone Retina Version (114px x 114px)', 'vestige'),
            'default' => array('url' => $default_iphone_retina),
        ),
        array(
            'id' => 'ipad_icon',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPad Icon', 'vestige'),
            'desc' => __('Upload Favicon for Apple iPad (72px x 72px)', 'vestige'),
            'default' => array('url' => $default_ipad),
        ),
        array(
            'id' => 'ipad_icon_retina',
            'type' => 'media',
            'compiler' => 'true',
            'title' => __('Apple iPad Retina Icon Upload', 'vestige'),
            'desc' => __('Upload Favicon for Apple iPad Retina Version (144px x 144px)', 'vestige'),
            'default' => array('url' => $default_ipad_retina),
        ),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-lines',
    'title' => esc_html__('Menu', 'vestige'),
    'desc' => __('These are the options for the menu.', 'vestige'),
    'fields' => array(
        array(
            'id' => 'enable-search',
            'type' => 'switch',
            'title' => __('Enable search with menu', 'vestige'),
            'subtitle' => __('Enable/Disable search icon next to your main menu to open search form', 'vestige'),
            "default" => 0,
        ),
        array(
            'id' => 'enable-cart',
            'type' => 'switch',
            'title' => __('Enable cart with menu', 'vestige'),
            'subtitle' => __('Enable/Disable cart icon next to your main menu to open cart', 'vestige'),
            "default" => 0,
        ),
        array(
            'id' => 'nav_directions_arrows',
            'type' => 'checkbox',
            'title' => __('Direction arrows with menu label', 'vestige'),
            'subtitle' => __('Uncheck to disable arrows that appear with menu text which is having dropdown. Check to enable.', 'vestige'),
            "default" => 1,
        ),
        array(
            'id' => 'nav_items_spacing',
            'type' => 'text',
            'title' => __('Space between nav items', 'vestige'),
            'subtitle' => __('Enter space between each nav item. DO NOT PUT px HERE. Default is 30', 'vestige'),
        ),
		array(
			'id'       => 'main_nav_link_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'color' => false,
			'line-height' => false,
			'text-align' => false,
			'title'    => __('Main Navigation Links Typography', 'vestige'),
			'output'   => array('.main-navigation > ul > li > a, .search-module-trigger, .cart-module-trigger')
		),
		array(
			'id'       => 'main_nav_link',
			'type'     => 'link_color',
			'title'    => __('Main Navigation Link Color', 'vestige'),
			'required' 	=> array('header_layout','equals','header-style1'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'vestige'),
			'output'   => array('.main-navigation > ul > li > a, .search-module-trigger, .cart-module-trigger'),
		),
		array(
			'id'       => 'main_nav_link2',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','equals','header-style2'),
			'title'    => __('Main Navigation Link Color', 'vestige'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'vestige'),
			'output'   => array('.header-style2 .main-navigation > ul > li > a, .header-style2 .search-module-trigger, .header-style2 .cart-module-trigger'),
		),
		array(
			'id'       => 'main_nav_link3',
			'type'     => 'link_color',
			'required' 	=> array('header_layout','equals','header-style3'),
			'title'    => __('Main Navigation Link Color', 'vestige'),
			'desc'     => __('Set the Main Navigation links color, hover, active.', 'vestige'),
			'output'   => array('.header-style3 .main-navigation > ul > li > a, .header-style3 .search-module-trigger, .header-style3 .cart-module-trigger'),
		),
		array(
            'id' => 'fw_menu_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'required' 	=> array('header_layout','equals','header-style3'),
			'output' => array('.main-navbar'),
            'title' => __('Background color the navigation bar', 'vestige'),
            'desc' => __('Background color set for the full width main navigation in header style 3.', 'vestige'),
        ),
		array(
            'id' => 'dd_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output' => array('.dd-menu > ul > li ul'),
            'title' => __('Background color for dropdown menus', 'vestige'),
            'desc' => __('Background color set for the dropdowns of main navigation.', 'vestige'),
        ),
        array(
            'id' => 'dd_arrows',
            'type' => 'checkbox',
            'title' => __('Arrow on Dropdowns', 'vestige'),
            'subtitle' => __('Uncheck to disable arrow that appear in top of DropDown div.  Check to enable.', 'vestige'),
            "default" => 1,
        ),
        array(
            'id' => 'dd_dropshadow',
            'type' => 'checkbox',
            'title' => __('Dropdowns Drop Shadow', 'vestige'),
            'subtitle' => __('Uncheck to disable drop shadow on dropdown div. Check to enable.', 'vestige'),
            "default" => 1,
        ),
		array(
            'id' => 'dd_border_radius',
            'type' => 'text',
            'title' => __('Dropdowns Border Radius', 'vestige'),
			'subtitle' => __('Enter the value for border radius on dropdowns div bottom.', 'vestige'),
            'desc' => __('DO NOT PUT px HERE. Ex: 4', 'vestige'),
        ),
		array(
			'id'       => 'dd_item_border',
			'type'     => 'border',
			'title'    => __('Dropdown links border bottom', 'vestige'),
			'output'   => array('.dd-menu > ul > li > ul li > a'),
			'top' 	   => false,
			'left' 	   => false,
			'right' 	   => false,
			'bottom' 	=> true
		),
		array(
			'id'       => 'dd_item_border_left',
			'type'     => 'border',
			'title'    => __('Dropdown links border left', 'vestige'),
			'output'   => array('.dd-menu > ul > li > ul li'),
			'top' 	   => false,
			'left' 	   => true,
			'right' 	   => false,
			'bottom' 	=> false
		),
		array(
			'id'       => 'dd_item_spacing',
			'type'     => 'spacing',
			'title'    => __('Dropdown links spacing', 'vestige'),
			'output'   => array('.dd-menu > ul > li > ul li > a'),
			'mode' 	   => 'padding',
			'units'    => array('px'),
			'default'  => array(
						'padding-top'     => '12', 
						'padding-right'   => '20', 
						'padding-bottom'  => '12', 
						'padding-left'    => '20',
						'units'          => 'px', 
					)
		),
		array(
            'id' => 'dd_item_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output' => array('.dd-menu > ul > li > ul li > a:hover'),
            'title' => __('Background color for dropdown menus links hover', 'vestige'),
        ),
		array(
			'id'       => 'dd_item_link_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'color' => false,
			'line-height' => false,
			'text-align' => false,
			'title'    => __('Main Navigation Links Typography', 'vestige'),
			'output'   => array('.dd-menu > ul > li > ul li > a')
		),
		array(
			'id'       => 'dd_item_link_color',
			'type'     => 'link_color',
			'title'    => __('Dropdown links color', 'vestige'),
			'output'   => array('.dd-menu > ul > li > ul li > a')
		),
		array(
            'id' => 'mm_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
			'output' => array('.dd-menu > ul > li.megamenu > ul'),
            'title' => __('Megamenu Background color', 'vestige'),
        ),
		array(
			'id'       => 'mm_title_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'title'    => __('Megamenu Column Title Typography', 'vestige'),
			'output'   => array('.dd-menu .megamenu-container .megamenu-sub-title')
		),
		array(
			'id'       => 'mm_content_typo',
			'type'     => 'typography',
			'text-transform' => true,
			'title'    => __('Megamenu Content Typography', 'vestige'),
			'output'   => array('.dd-menu .megamenu-container')
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('Mobile Menu', 'vestige'),
	'subsection' => true,
    'fields' => array(
		array(
            'id' => 'mm_background',
            'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-size' => false,
			'background-position' => false,
			'background-attachment' => false,
			'preview' => false,
			'transparent' => false,
            'title' => __('Background color for mobile menu', 'vestige'),
        ),
		array(
			'id'       => 'mm_item_link_color',
			'type'     => 'link_color',
			'title'    => __('Mobile menu links color', 'vestige')
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-chevron-down',
    'title' => esc_html__('Footer', 'vestige'),
    'desc' => esc_html__('These are the options for the footer.', 'vestige'),
    'fields' => array(
        array(
            'id' => 'full_width_footer',
            'type' => 'checkbox',
            'title' => __('100% Footer Width', 'vestige'),
            'subtitle' => __('Check this box to set footer width to 100% of the browser width. Uncheck to follow site width. Only works with wide layout mode.', 'vestige'),
            "default" => 0,
        ),
        array(
            'id' => 'footer_top_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Footer Widgets Area', 'vestige'),
        ),
		array(
    		'id' => 'footer_layout',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => esc_html__('Footer Layout', 'vestige'), 
			'subtitle' => esc_html__('Select the footer layout for widgeted area', 'vestige'),
    			'options' => array(
					'12' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-1.png'),
    				'6' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-2.png'),
    				'4' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-3.png'),
    				'3' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-4.png'),
					'2' => array('title' => '', 'img' => get_template_directory_uri().'/assets/images/footerColumns/footer-5.png'),
    							),
    		'default' => '4'
    	),
        array(
			'id'          => 'tfooter_bg',
			'type'        => 'background',
			'title'       => __('Footer widget area background', 'vestige'),
			'subtitle'    => __('Default: #F9F8F5', 'vestige'),
			'output'      => array('.site-footer'),
		),
		array(
			'id'       => 'footer_top_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Footer widgets area Top/Bottom padding', 'vestige'),
            'desc' => __('Enter top and bottom spacing for the footer widget area. DO NOT ENTER px HERE.', 'vestige'),
			'mode' 	   => 'padding',
			'output' => array('.site-footer'),
			'units'    => array('px'),
			'default'  => array(
				'padding-top'     => '50', 
				'padding-bottom'  => '50', 
				'units'          => 'px', 
			)
		),
        array(
			'id'          => 'tfooter_border',
			'type'        => 'border',
			'title'       => __('Footer widgets area border top', 'vestige'),
			'subtitle'    => __('Default: 1px solid #eeeeee;', 'vestige'),
			'left' => false,
			'right' => false,
			'bottom' => false,
			'top' => true,
			'output'      => array('.site-footer'),
		),
        array(
			'id'          => 'widgettitle_typo',
			'type'        => 'typography',
			'text-transform' => true,
			'title'       => __('Footer widgets title typography', 'vestige'),
			'output'      => array('.footer-widget .widgettitle, .footer-widget .widget-title'),
		),
        array(
			'id'          => 'tfwidget_typo',
			'type'        => 'typography',
			'text-transform' => true,
			'title'       => __('Footer widgets area text typography', 'vestige'),
			'output'      => array('.site-footer'),
		),
        array(
			'id'          => 'tfooter_link_color',
			'type'        => 'link_color',
			'title'       => __('Footer widgets area links color', 'vestige'),
			'subtitle'    => __('Default: #cccccc', 'vestige'),
			'output'      => array('.site-footer a'),
		),
        array(
            'id' => 'footer_bottom_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Footer Copyrights Area', 'vestige'),
        ),
        array(
            'id' => 'footer_bottom_enable',
            'type' => 'checkbox',
            'title' => __('Enable Footer copyrights area', 'vestige'),
            'desc' => __('Uncheck to disabled footer copyrights area that shows below the footer widgets area.', 'vestige'),
			'default' => 1
        ),
        array(
            'id' => 'footer_copyright_text',
            'type' => 'text',
            'title' => esc_html__('Footer Copyright Text', 'vestige'),
            'subtitle' => esc_html__(' Enter Copyright Text', 'vestige'),
            'default' => esc_html__('All Rights Reserved', 'vestige')
        ),
        array(
			'id'          => 'bfooter_bg',
			'type'        => 'background',
			'title'       => __('Footer copyrights area background', 'vestige'),
			'subtitle'    => __('Default: #ffffff', 'vestige'),
			'output'      => array('.site-footer-bottom'),
		),
		array(
			'id'       => 'footer_bottom_spacing',
			'type'     => 'spacing',
			'left' => false,
			'right' => false,
			'title'    => __('Footer copyrights area Top/Bottom padding', 'vestige'),
            'desc' => __('Enter top and bottom spacing for the footer copyrights area. DO NOT ENTER px HERE.', 'vestige'),
			'mode' 	   => 'padding',
			'output' => array('.site-footer-bottom'),
			'units'    => array('px'),
			'default'  => array(
				  'padding-top'     => '20', 
				  'padding-bottom'  => '20', 
				  'units'          => 'px', 
			  )
		),
        array(
			'id'          => 'bfooter_border',
			'type'        => 'border',
			'title'       => __('Footer copyrights area border top', 'vestige'),
			'subtitle'    => __('Default: 1 solid #eeeeee', 'vestige'),
			'left' => false,
			'right' => false,
			'bottom' => false,
			'top' => true,
			'output'      => array('.site-footer-bottom'),
		),
        array(
			'id'          => 'bfwidget_typo',
			'type'        => 'typography',
			'text-transform' => true,
			'title'       => __('Footer copyrights area text typography', 'vestige'),
			'output'      => array('.site-footer-bottom'),
		),
        array(
			'id'          => 'bfooter_link_color',
			'type'        => 'link_color',
			'title'       => __('Footer copyrights area links color', 'vestige'),
			'subtitle'    => __('Default: #cccccc', 'vestige'),
			'output'      => array('.site-footer-bottom a'),
		),
		array(
			'id' => 'footer_social_links',
			'type' => 'sortable',
			'label' => true,
			'compiler'=>true,
			'title' => esc_html__('Social Links', 'vestige'),
			'desc' => esc_html__('Insert Social URL in their respective fields and sort as your desired order.', 'vestige'),
			'options' => array(
				'fa-facebook' => 'facebook',
				'fa-twitter' => 'twitter',
				'fa-pinterest' => 'pinterest',
				'fa-google-plus' => 'gplus',
				'fa-youtube' => 'youtube',
				'fa-instagram' => 'instagram',
				'fa-vimeo-square' => 'vimeo',
				'fa-rss' => 'rss',
				'fa-dribbble' => 'dribbble',
				'fa-dropbox' => 'dropbox',
				'fa-bitbucket' => 'bitbucket',
				'fa-flickr' => 'flickr',
				'fa-foursquare' => 'foursquare',
				'fa-github' => 'github',
				'fa-gittip' => 'gittip',
				'fa-linkedin' => 'linkedin',
				'fa-pagelines' => 'pagelines',
				'fa-skype' => 'Enter Skype ID',
				'fa-envelope' => 'Enter Email Address',
				'fa-tumblr' => 'tumblr',
				'fa-tripadvisor' => 'tripadvisor',
				'fa-vk' => 'vk',
				'fa-yelp' => 'yelp'
			),
		),
		array(
			'id'=>'footer_bottom_icons',
			'type' => 'typography',
			'google'      => false,
			'font-family'      => false,
			'font-backup' => false,
			'subsets' 	  => false,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => true,
            'word-spacing'=>false,
			'line-height' => true,
			'letter-spacing' => false,
			'text-transform' => false,
			'preview' => false,
			'output' => array('.site-footer-bottom .social-icons-colored li a'),
			'title' => esc_html__('Social icons size and color for Site Footer Bottom Social icons', 'vestige'),
			'default' => array(
				'font-size' => '14px',
				'line-height' => '28px'
			)
		),
		array(
			'id'=>'footer_bottom_icons_link_color',
			'compiler'=>true,
			'type' => 'link_color',
			'output' => array('.site-footer-bottom .social-icons-colored li a'),
			'title' => esc_html__('Link, Hover, Active Color sets for Site Footer Bottom Social icons', 'vestige'),
			'default' => array(
				'regular' => '#666666',
				'hover' => '#ffffff'
			)
		),
		array(
			'id'=>'footer_bottom_icons_bg',
			'compiler'=>true,
			'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'preview' => false,
			'output' => array('.site-footer-bottom .social-icons-colored li a'),
			'title' => esc_html__('Background color for Site Footer Bottom Social icons', 'vestige'),
			'default' => array(
				'background-color' => '#eeeeee'
			)
		),
		array(
			'id'       => 'footer_bottom_icons_dimension',
			'type'     => 'dimensions',
			'units'    => 'px',
			'output' => array('.site-footer-bottom .social-icons-colored li a'),
			'title'    => __('Width/Height for Site Footer Bottom Social icons', 'vestige'),
			'default'  => array(
				'width'   => '28px', 
				'height'  => '28px'
			),
		),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-lines',
    'title' => __('Sidebars', 'vestige'),
    'fields' => array(
        array(
    		'id' => 'sidebar_position',
    		'type' => 'image_select',
    		'compiler'=>true,
			'title' => __('Sidebar position','vestige'), 
			'subtitle' => __('Select the Global Sidebar Position. Can be overridden by page sidebar settings.', 'vestige'),
    			'options' => array(
    				'2' => array('title' => 'Left', 'img' => get_template_directory_uri().'/assets/images/2cl.png'),
					'1' => array('title' => 'Right', 'img' => get_template_directory_uri().'/assets/images/2cr.png')
    				),
    		'default' => '1'
    	),
		array(
			'id'       => 'posts_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Post', 'vestige'), 
			'desc'     => esc_html__('Default sidebar for single post pages', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'pages_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Page', 'vestige'), 
			'desc'     => esc_html__('Default sidebar for all pages', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'events_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Event', 'vestige'), 
			'desc'     => esc_html__('Default sidebar for single event pages', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'exhibitions_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Exhibition', 'vestige'), 
			'desc'     => esc_html__('Default sidebar for single exhibition pages', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'team_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Team Member', 'vestige'), 
			'desc'     => esc_html__('Default sidebar for single tem member pages', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'artworks_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Artwork', 'vestige'), 
			'desc'     => esc_html__('Default sidebar for single artwork pages', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'venue_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Venue', 'vestige'), 
			'desc'     => esc_html__('Single Venue Category Page Sidebar', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'artists_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Single Artist', 'vestige'), 
			'desc'     => esc_html__('Single Artist Page Sidebar', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'event_term_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Event Archive Sidebar', 'vestige'), 
			'desc'     => esc_html__('Select sidebar for archive page of Event.', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'exhibition_term_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Exhibition Archive Sidebar', 'vestige'), 
			'desc'     => esc_html__('Select sidebar for archive page of Exhibition.', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'artwork_term_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Artwork Archive Sidebar', 'vestige'), 
			'desc'     => esc_html__('Select sidebar for archive page of Artwork.', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'shop_term_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Shop Archive Sidebar', 'vestige'), 
			'desc'     => esc_html__('Select sidebar for archive page of Shop.', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
		array(
			'id'       => 'search_sidebar',
			'type'     => 'select',
			'title'    => esc_html__('Search Page Sidebar', 'vestige'), 
			'desc'     => esc_html__('Select sidebar for search page.', 'vestige'),
			'data'  => 'sidebars',
			'default'  => '',
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => __('Sidebar Widgets', 'vestige'),
	'subsection' => true,
    'fields' => array(
		array(
			'id'=>'sidebar_widget_bg',
			'compiler'=>true,
			'type' => 'background',
			'background-image' => false,
			'background-repeat' => false,
			'background-position' => false,
			'background-attachment' => false,
			'background-size' => false,
			'preview' => false,
			'output' => array('#sidebar-col .widget'),
			'title' => esc_html__('Background color for sidebar widgets', 'vestige')
		),
        array(
			'id'      	=> 'sidebar_widget_border',
			'type'    	=> 'border',
			'all' 		=> true,
			'title'    	=> __('Sidebar widgets border color', 'vestige'),
			'subtitle'  	=> __('Default: 5px solid #F9F8F5', 'vestige'),
			'output'   	=> array('#sidebar-col .widget'),
		),
		array(
			'id'=>'sidebar_widget_text',
			'type' => 'typography',
			'output' => array('#sidebar-col .widget'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'title' => esc_html__('Typography for sidebar widgets', 'vestige')
		),
		array(
			'id'=>'sidebar_widget_links',
			'type' => 'link_color',
			'output' => array('#sidebar-col .widget a'),
			'title' => esc_html__('Link colors set for sidebar widgets', 'vestige')
		),
        array(
            'id' => 'sidebar_font_typography',
            'type'        => 'typography',
			'title'       => __('Sidebar widgets title typography', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('#sidebar-col .widgettitle, #sidebar-col .widget-title'),
			'units'       =>'px',
            'default' => array(
            	'font-family' => 'Roboto Condensed',
				'google' => true,
				'font-weight' => '700',
				'text-transform' => 'uppercase',
				'font-size' => '20px',
				'line-height' => '28px',
				'word-spacing' => '0px',
				'letter-spacing' => '2px',
				'text-align' => 'left',
				'color' => '#222222',
               ),
        ),
		array( 
			'id'       => 'sidebar_widget_title_border',
			'type'     => 'border',
			'title'    => __('Sidebar widget title border bottom', 'vestige'),
			'output'   => array('#sidebar-col .widgettitle, #sidebar-col .widget-title'),
			'left'     => false,
			'right'     => false,
			'bottom'     => true,
			'top'     => false,
			'default' => array(
				'border-style'  => 'solid',
				'border-bottom'   => '1px',
				'border-color'   => '#eeeeee'
			)
		),
		array( 
			'id'       => 'sidebar_widget_title_border_highlight',
			'type'     => 'color',
			'title'    => __('Sidebar widget title half border bottom color', 'vestige'),
		),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-brush',
    'title' => esc_html__('Color Scheme', 'vestige'),
    'fields' => array(
		 array(
			'id'=>'theme_color_type',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Color scheme', 'vestige'), 
			'subtitle' => esc_html__('Select the global color scheme type', 'vestige'),
			'options' => array(
					'0' => esc_html__('Pre-Defined Color Schemes','vestige'),
					'1' => esc_html__('Custom Color','vestige')
				),
			'default' => '0',
			),
        array(
            'id' => 'theme_color_scheme',
            'type' => 'select',
			'required' => array('theme_color_type','equals','0'),
            'title' => esc_html__('Predefined Color Schemes', 'vestige'),
            'subtitle' => esc_html__('Select your themes alternative color scheme.', 'vestige'),
            'options' => array('color1.css' => 'color1.css', 'color2.css' => 'color2.css', 'color3.css' => 'color3.css', 'color4.css' => 'color4.css', 'color5.css' => 'color5.css', 'color6.css' => 'color6.css', 'color7.css' => 'color7.css', 'color8.css' => 'color8.css', 'color9.css' => 'color9.css', 'color10.css' => 'color10.css','color11.css' => 'color11.css','color12.css' => 'color12.css'),
            'default' => 'color1.css',
        ),	
		array(
			'id'=>'primary_theme_color',
			'type' => 'color',
			'required' => array('theme_color_type','equals','1'),
			'title' => esc_html__('Custom Theme Color', 'vestige'), 
			'subtitle' => esc_html__('Pick a global custom color for the template.', 'vestige'),
			'validate' => 'color',
			'transparent' => false,
			),
    ),
));
	Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-share',
    'title' => esc_html__('Share Options', 'vestige'),
    'fields' => array(
        array(
            'id' => 'switch_sharing',
            'type' => 'switch',
            'title' => esc_html__('Social Sharing', 'vestige'),
            'subtitle' => esc_html__('Enable/Disable theme default social sharing buttons for posts/events/sermons single pages', 'vestige'	
			),
            "default" => 1,
       		),
		 array(
			'id'=>'sharing_style',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Share Buttons Style', 'vestige'), 
			'subtitle' => esc_html__('Choose the style of share button icons', 'vestige'),
			'options' => array(
					'0' => esc_html__('Rounded','vestige'),
					'1' => esc_html__('Squared','vestige'),
				),
			'default' => '0',
			),
		 array(
			'id'=>'sharing_color',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Share Buttons Color', 'vestige'), 
			'subtitle' => esc_html__('Choose the color scheme of the share button icons', 'vestige'),
			'options' => array(
					'0' => esc_html__('Brand Colors','vestige'),
					'1' => esc_html__('Theme Color','vestige'),
					'2' => esc_html__('GrayScale','vestige')
				),
			'default' => '0',
			),
		array(
			'id'       => 'share_icon',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => esc_html__('Social share options', 'vestige'),
			'subtitle' => esc_html__('Click on the buttons to disable/enable share buttons', 'vestige'),
			'options'  => array(
				'1' => 'Facebook',
				'2' => 'Twitter',
				'3' => 'Google',
				'4' => 'Tumblr',
				'5' => 'Pinterest',
				'6' => 'Reddit',
				'7' => 'Linkedin',
				'8' => 'Email',
				'9' => 'VKontakte'
			),
			'default' => array(
				'1' => 1,
				'2' => 1,
				'3' => 1,
				'4' => 1,
				'5' => 1,
				'6' => 1,
				'7' => 1,
				'8' => 1,
				'9' => 0
			)
		),
		array(
			'id'       => 'share_post_types',
			'type'     => 'checkbox',
			'required' => array('switch_sharing','equals','1'),
			'title'    => esc_html__('Select share buttons for post types', 'vestige'),
			'subtitle'     => esc_html__('Uncheck to disable for any type', 'vestige'),
			'options'  => array(
				'1' => 'Posts',
				'2' => 'Pages',
				'3' => 'Exhibitions',
				'4' => 'Special Events',
				'5' => 'Staff',
				'6' => 'Artwork',
				'7' => 'Gallery',
			),
			'default' => array(
				'1' => 1,
				'2' => 1,
				'3' => 1,
				'4' => 1,
				'5' => 1,
				'6' => 1,
				'7' => 0
			)
		),
		array(
			'id'       => 'share_links_alt',
			'type'     => 'section',
			'indent' => true,
			'title'    => __('Sharing links alt/title text', 'vestige'),
		),
		array(
            'id' => 'facebook_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Facebook share icon', 'vestige'),
            'subtitle' => __('Text for the Facebook share icon browser tooltip.', 'vestige'),
            'default' => 'Share on Facebook'
        ),
		array(
            'id' => 'twitter_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Twitter share icon', 'vestige'),
            'subtitle' => __('Text for the Twitter share icon browser tooltip.', 'vestige'),
            'default' => 'Tweet'
        ),
		array(
            'id' => 'google_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Google Plus share icon', 'vestige'),
            'subtitle' => __('Text for the Google Plus share icon browser tooltip.', 'vestige'),
            'default' => 'Share on Google+'
        ),
		array(
            'id' => 'tumblr_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Tumblr share icon', 'vestige'),
            'subtitle' => __('Text for the Tumblr share icon browser tooltip.', 'vestige'),
            'default' => 'Post to Tumblr'
        ),
		array(
            'id' => 'pinterest_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Pinterest share icon', 'vestige'),
            'subtitle' => __('Text for the Pinterest share icon browser tooltip.', 'vestige'),
            'default' => 'Pin it'
        ),
		array(
            'id' => 'reddit_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Reddit share icon', 'vestige'),
            'subtitle' => __('Text for the Reddit share icon browser tooltip.', 'vestige'),
            'default' => 'Submit to Reddit'
        ),
		array(
            'id' => 'linkedin_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Linkedin share icon', 'vestige'),
            'subtitle' => __('Text for the Linkedin share icon browser tooltip.', 'vestige'),
            'default' => 'Share on Linkedin'
        ),
		array(
            'id' => 'email_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for Email share icon', 'vestige'),
            'subtitle' => __('Text for the Email share icon browser tooltip.', 'vestige'),
            'default' => 'Email'
        ),
		array(
            'id' => 'vk_share_alt',
            'type' => 'text',
            'title' => __('Tooltip text for vk share icon', 'vestige'),
            'subtitle' => __('Text for the vk share icon browser tooltip.', 'vestige'),
            'default' => 'Share on vk'
        ),
		array(
			'id'       => 'share_links_styling',
			'type'     => 'section',
			'indent' => true,
			'title'    => __('Sharing icons styling', 'vestige'),
		),
		array(
			'id'       => 'share_show_text',
			'type'     => 'checkbox',
			'title'    => __('Show share text and icon. Uncheck to hide.', 'vestige'),
			'default' => 1
		),
		array(
			'id'       => 'share_icons_box_size',
			'type'     => 'dimensions',
			'title'    => __('Share icons box size', 'vestige'),
			'output'   => array('.social-share-bar .social-icons-colored li a'),
			'default' => array(
				'height' => '28px',
				'width' => '28px'
			)
		),
		array(
			'id'       => 'share_icons_font_size',
			'type'     => 'typography',
			'title'    => __('Share icons font size', 'vestige'),
			'desc'    => __('Keep line height same as height of icon boxes set above', 'vestige'),
			'font-weight' => false,
			'font-family' => false,
			'font-style' => false,
			'text-align' => false,
			'preview' => false,
			'color' => false,
			'output'   => array('.social-share-bar .social-icons-colored li a'),
			'default' => array(
				'line-height' => '28px',
				'font-size' => '14px'
			)
		),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-zoom-in',
    'title' => __('Lightbox Options', 'vestige'),
    'fields' => array(
        array(
            'id' => 'switch_lightbox',
            'type' => 'button_set',
            'title' => __('Lightbox Plugin', 'vestige'),
            'subtitle' => __('Choose the plugin for the Lightbox Popup for theme.', 'vestige'	
			),
			'options' => array(
				'0' => __('PrettyPhoto','vestige'),
				'1' => __('Magnific Popup','vestige')
			),
            "default" => 1,
       	),
		array(
			'id'       => 'prettyphoto_theme',
			'type'     => 'select',
			'required' => array('switch_lightbox','equals','0'),
			'title'    => __('Theme Style', 'vestige'), 
			'desc'     => __('Select style for the prettyPhoto Lightbox', 'vestige'),
			'options'  => array(
				'pp_default' => __('Default','vestige'),
				'light_rounded' => __('Light Rounded','vestige'),
				'dark_rounded' => __('Dark Rounded','vestige'),
				'light_square' => __('Light Square','vestige'),
				'dark_square' => __('Dark Square','vestige'),
				'facebook' => __('Facebook','vestige'),
			),
			'default'  => 'pp_default',
		),
		array(
			'id' => 'prettyphoto_opacity',
			'required' => array('switch_lightbox','equals','0'),
			'type' => 'slider',
			'title' => __('Overlay Opacity', 'vestige'),
			'desc' => __('Enter values between 0.1 to 1. Default is 0.5', 'vestige'),
			"default" => .5,
			"min" => 0,
			"step" => .1,
			"max" => 1,
			'resolution' => 0.1,
			'display_value' => 'text'
		),
        array(
            'id' => 'prettyphoto_title',
			'required' => array('switch_lightbox','equals','0'),
            'type' => 'button_set',
            'title' => __('Show Image Title', 'vestige'),
			'options' => array(
				'0' => __('Yes','vestige'),
				'1' => __('No','vestige')
			),
            "default" => 0,
       	),
	)
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-bookmark',
    'title' => esc_html__('Page Headers', 'vestige'),
    'desc' => esc_html__('Header Banners for taxonomies', 'vestige'),
    'fields' => array(
		array(
			'id'=>'venue-bg-image',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload page header image for Venues Single Taxonomy page', 'vestige'),
            'default' => array('url' => ''),
		),
		array(
			'id'=>'events-bg-image',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload page header image for Events Single Category/Tag page', 'vestige'),
            'default' => array('url' => ''),
		),
		array(
			'id'=>'exhibitions-bg-image',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload page header image for Exhibitions Single Category/Tag page', 'vestige'),
            'default' => array('url' => ''),
		),
		array(
			'id'=>'artists-bg-image',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload page header image for Artists Single Taxonomy page', 'vestige'),
            'default' => array('url' => ''),
		),	
		array(
			'id'=>'artworks-bg-image',
			'type' => 'media', 
			'url'=> true,
			'title' => esc_html__('Upload page header image for Artworks Single Category/Tag page', 'vestige'),
            'default' => array('url' => ''),
		),
        array(
            'id' => 'page_title_sec',
            'type' => 'section',
			'indent' => true,
            'title' => __('Archive Page Titles', 'vestige'),
        ),
		array(
            'id' => 'events_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Events Archive', 'vestige'),
            'subtitle' => esc_html__('Enter title of the page for the Events post type.', 'vestige'),
            'default' => 'Events'
        ),
		array(
            'id' => 'blog_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Blog Archive', 'vestige'),
            'subtitle' => esc_html__('Enter title of the page for the Blog post type.', 'vestige'),
            'default' => 'Blog'
        ),
		array(
            'id' => 'exhibitions_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Exhibitions Archive', 'vestige'),
            'subtitle' => esc_html__('Enter title of the page for the Exhibitions post type.', 'vestige'),
            'default' => 'Exhibitions'
        ),
		array(
            'id' => 'team_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Team Archive', 'vestige'),
            'subtitle' => esc_html__('Enter title of the page for the Team post type.', 'vestige'),
            'default' => 'Team'
        ),
		array(
            'id' => 'shop_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Shop Archive', 'vestige'),
            'subtitle' => esc_html__('Enter title of the page for the Products/Shop post type.', 'vestige'),
            'default' => 'Products'
        ),
		array(
            'id' => 'artwork_archive_title',
            'type' => 'text',
            'title' => esc_html__('Title for Artworks Archive', 'vestige'),
            'subtitle' => esc_html__('Enter title of the page for the Artworks post type.', 'vestige'),
            'default' => 'Artworks'
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-font',
    'title' => esc_html__('Typography', 'vestige'),
    'subtitle' => esc_html__('Make sure you set these options only if you have knowledge about every property to avoid disturbing the whole layout. If something went wrong just reset this section to reset all fields in Typography Options or click the small cross signs in each select field/delete text from input fields to reset them.', 'vestige'),
    'fields' => array(
        array(
            'id' => 'heading_font_typography',
            'type'        => 'typography',
			'title'       => __('Heading/Secondary font', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('h1,h2,h3,h4,h5,h6,blockquote p'),
			'units'       =>'px',
            'subtitle' => esc_html__('Please Enter Heading Font', 'vestige'),
            'default' => array(
            	'font-family' => 'Playfair Display',
				'font-backup' => '',
               ),
        ),
        array(
            'id' => 'body_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Body/Primary font', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('body, h1 .label, h2 .label, h3 .label, h4 .label, h5 .label, h6 .label, h4, .selectpicker.btn-default, body, .main-navigation, .skewed-title-bar h4, .widget-title, .sidebar-widget .widgettitle, .icon-box h3, .btn-default'),
			'units'       =>'px',
	    	'subtitle' => esc_html__('Please Enter Body Font.', 'vestige'),
            'default' => array(
             	'font-family' => 'Roboto',
              ),
        ),
        array(
            'id' => 'button_font_typography',
            'type'        => 'typography',
			'title'       => esc_html__('Buttons/Condensed font', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => false,
			'text-align'	  => false,
            'font-weight' => false,
            'font-style' => false,
			'font-size'	  => false,
            'word-spacing'=>false,
			'line-height' => false,
			'letter-spacing' => false,
			'output'      => array('.btn, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce input.button, .wpcf7-form .wpcf7-submit, .noticebar .ow-button-base a'),
			'units'       =>'px',
            'subtitle' => esc_html__('Please Enter Heading Font', 'vestige'),
            'default' => array(
            	'font-family' => 'Roboto Condensed',
				'font-backup' => '',
               ),
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-ok',
    'title' => esc_html__('More Typography Options', 'vestige'),
	'subsection' => true,
    'subtitle' => esc_html__('Make sure you set these options only if you have knowledge about every property to avoid disturbing the whole layout. If something went wrong just reset this section to reset all fields in Typography Options or click the small cross signs in each select field/delete text from input fields to reset them.', 'vestige'),
    'fields' => array(
        array(
            'id' => 'h1_font_typography',
            'type'        => 'typography',
			'title'       => __('H1 Tag', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('h1'),
			'units'       =>'px',
        ),
        array(
            'id' => 'h2_font_typography',
            'type'        => 'typography',
			'title'       => __('H2 Tag', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('h2'),
			'units'       =>'px',
        ),
        array(
            'id' => 'h3_font_typography',
            'type'        => 'typography',
			'title'       => __('H3 Tag', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('h3'),
			'units'       =>'px',
        ),
        array(
            'id' => 'h4_font_typography',
            'type'        => 'typography',
			'title'       => __('H4 Tag', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('h4'),
			'units'       =>'px',
        ),
        array(
            'id' => 'h5_font_typography',
            'type'        => 'typography',
			'title'       => __('H5 Tag', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('h5'),
			'units'       =>'px',
        ),
        array(
            'id' => 'h6_font_typography',
            'type'        => 'typography',
			'title'       => __('H6 Tag', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('h6'),
			'units'       =>'px',
        ),
        array(
            'id' => 'body_unique_font_typography',
            'type'        => 'typography',
			'title'       => __('Body', 'vestige'),
			'google'      => true,
			'font-backup' => true,
			'subsets' 	  => true,
			'color' 		  => true,
			'text-align'	  => true,
            'font-weight' => true,
            'font-style' => true,
			'font-size'	  => true,
            'word-spacing'=>true,
			'line-height' => true,
			'letter-spacing' => true,
			'text-transform' => true,
			'output'      => array('body'),
			'units'       =>'px',
        ),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-bullhorn',
    'title' => esc_html__('Events', 'vestige'),
    'fields' => array(
        array(
          'id'=>'event_switch',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Enable Event', 'vestige'), 
			'subtitle' => esc_html__('Enable or disable event style/scripts loading from theme. This will disabled loading of stylesheets and javascripts for event functions like calendar from the theme.', 'vestige'),
			'options' => array(
					'1' => esc_html__('Enable','vestige'),
					'0' => esc_html__('Disable','vestige'),
				),
			'default' => '1',
			),
		array(
          'id'=>'event_tm_opt',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Show Event Time', 'vestige'), 
			'subtitle' => esc_html__('Show event time of events in listing, grid, calender layouts.', 'vestige'),
			'options' => array(
					'0' => esc_html__('Start Time','vestige'),
					'1' => esc_html__('End Time','vestige'),
					'2' => esc_html__('Both','vestige')
				),
			'default' => '0',
			),
		array(
          'id'=>'event_dt_opt',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Show Event Date', 'vestige'), 
			'subtitle' => esc_html__('Show event date of events in listing, grid, calender layouts.', 'vestige'),
			'options' => array(
					'0' => esc_html__('Start Date','vestige'),
					'1' => esc_html__('End Date','vestige'),
					'2' => esc_html__('Both','vestige')
				),
			'default' => '0',
			),
			array(
          'id'=>'event_show_until',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Show Event Until', 'vestige'), 
			'subtitle' => esc_html__('Show event until start time or end time.', 'vestige'),
			'options' => array(
					'0' => esc_html__('Start Time','vestige'),
					'1' => esc_html__('End Time','vestige'),
				),
			'default' => '0',
			),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-video-chat',
    'title' => esc_html__('Exhibitions', 'vestige'),
    'fields' => array(
		array(
          'id'=>'exhibition_view',
			'type' => 'button_set',
			'compiler'=>true,
			'title' => esc_html__('Exhibitions View', 'vestige'), 
			'subtitle' => esc_html__('Select exhibitions view type.', 'vestige'),
			'desc' => esc_html__('Multiple View option will show multiple instances of individual exhibition for each day for the active period and Single View will show each exhibition as a single post block along with start and end date.', 'vestige'),
			'options' => array(
					'0' => esc_html__('Multiple View','vestige'),
					'1' => esc_html__('Single View','vestige'),
				),
			'default' => '0',
			),
	),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-credit-card',
    'icon_class' => 'icon-large',
    'title' => __('Paypal Configuration', 'vestige'),
	'desc' => esc_html__('These settings are for the events and exhibitions tickets payment.', 'vestige'),
    'fields' => array(
		array(
			'id'       => 'paypal_email',
			'type'     => 'text',
			'title'    => __('Paypal Email Address', 'vestige'), 
			'desc'     => __('Enter Paypal Business Email Address.', 'vestige'),
			'default'  => '',
		),
		array(
			'id'       => 'paypal_token',
			'type'     => 'text',
			'title'    => __('Paypal Token', 'vestige'), 
			'desc'     => __('Enter Paypal Token ID.', 'vestige'),
			'default'  => '',
		),
		array(
            'id' => 'paypal_site',
            'type' => 'select',
            'title' => __('Paypal Site', 'vestige'),
            'subtitle' => __('Select paypal site.', 'vestige'),
            'options' => array('0' => 'Sandbox', '1' => 'Live'),
            'default' => '1',
        ),	
		array(
            'id' => 'paypal_currency',
            'type' => 'select',
            'title' => __('Payment Currency', 'vestige'),
            'subtitle' => __('Select payment currency.', 'vestige'),
            'options' => array('USD' => 'U.S. Dollar', 'AUD' => 'Australian Dollar', 'BRL' => 'Brazilian Real', 'CAD' => 'Canadian Dollar', 'CZK' => 'Czech Koruna', 'DKK' => 'Danish Krone', 'EUR' => 'Euro', 'HKD' => 'Hong Kong Dollar', 'HUF' => 'Hungarian Forint', 'ILS' => 'Israeli New Sheqel', 'JPY' => 'Japanese Yen', 'MYR' => 'Malaysian Ringgit', 'MXN' => 'Mexican Peso', 'NOK' => 'Norwegian Krone', 'NZD' => 'New Zealand Dollar', 'PHP' => 'Philippine Peso', 'PLN' => 'Polish Zloty', 'GBP' => 'Pound Sterling', 'SGD' => 'Singapore Dollar', 'SEK' => 'Swedish Krona', 'CHF' => 'Swiss Franc', 'TWD' => 'Taiwan New Dollar', 'THB' => 'Thai Baht', 'TRY' => 'Turkish Lira'),
            'default' => 'USD',
        ),	
    )
));
	Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-calendar',
    'title' => esc_html__('Calendar', 'vestige'),
    'fields' => array(
        array(
            'id' => 'calendar_month_name',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Month Name', 'vestige'),
            'desc' => esc_html__('Insert month name in local language by comma seperated to display on event calender like: January,February,March,April,May,June,July,August,September,October,November,December', 'vestige'),
			'default' => 'January,February,March,April,May,June,July,August,September,October,November,December',
        ),
		array(
            'id' => 'calendar_month_name_short',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Month Name Short', 'vestige'),
            'desc' => esc_html__('Insert month name short in local language by comma seperated to display on event calender like: Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec', 'vestige'),
			'default' => 'Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec',
        ),
		array(
            'id' => 'calendar_day_name',
            'type' => 'textarea',	
			'rows' => 2,
            'title' => esc_html__('Calendar Day Name', 'vestige'),
            'desc' => esc_html__('Insert day name in local language by comma seperated to display on event calender like: Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday', 'vestige'),
			'default' => 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ),
		array(
            'id' => 'calendar_day_name_short',
            'type' => 'textarea',
			'rows' => 2,	
            'title' => esc_html__('Calendar Day Name Short', 'vestige'),
            'desc' => esc_html__('Insert day name short in local language by comma seperated to display on event calender like: Sun,Mon,Tue,Wed,Thu,Fri,Sat', 'vestige'),
			'default' => 'Sun,Mon,Tue,Wed,Thu,Fri,Sat',
        ),
		array(
    'id'       => 'event_feeds',
    'type'     => 'checkbox',
    'title'    => esc_html__('Show WP Events', 'vestige'),
    'desc'     => esc_html__('Check if you wants to show WP Events in Calendar.', 'vestige'),
    'default'  => '1'// 1 = on | 0 = off
),
		array(
            'id' => 'google_feed_key',
            'type' => 'text',	
            'title' => esc_html__('Google Calendar API Key', 'vestige'),
            'desc' => esc_html__('Enter Google Calendar Feed API Key.', 'vestige'),
			'default' => '',
        ),
		array(
            'id' => 'google_feed_id',
            'type' => 'text',	
            'title' => esc_html__('Google Calendar ID', 'vestige'),
            'desc' => esc_html__('Enter Google Calendar ID.', 'vestige'),
			'default' => '',
        ),
		array(
			'id'=>'event_default_color',
			'type' => 'color',
			'title' => esc_html__('Event Color', 'vestige'), 
			'subtitle' => esc_html__('Pick a default color for Events.', 'vestige'),
			'validate' => 'color',
			'transparent' => false,
			'default' => ''
			),
			array(
			'id'=>'recurring_event_color',
			'type' => 'color',
			'title' => esc_html__('Recurring Event Color', 'vestige'), 
			'subtitle' => esc_html__('Pick a color for recurring Events.', 'vestige'),
			'validate' => 'color',
			'transparent' => false,
			'default' => ''
			),
    ),
));
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-map-marker',
    'title' => __('Map API', 'vestige'),
    'fields' => array(
		array(
			'id'       => 'google_map_api',
			'type'     => 'text',
			'title'    => __('Google Maps API Key', 'vestige'), 
			'desc'     => __('Enter your Google Maps API key in here. This will be used for all maps in the theme i.e. Map banner, Event maps. <a href="https://support.imithemes.com/forums/topic/how-to-get-google-maps-api/" target="_blank">See Guide about how to get your API Key</a>', 'vestige'),
		),
	)
));
	Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-edit',
    'title' => esc_html__('Custom CSS/JS', 'vestige'),
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            //'required' => array('layout','equals','1'),	
            'title' => esc_html__('CSS Code', 'vestige'),
            'subtitle' => esc_html__('Paste your CSS code here.', 'vestige'),
            'mode' => 'css',
            'theme' => 'monokai',
            'desc' => '',
            'default' => "#header{\nmargin: 0 auto;\n}"
        ),
        array(
            'id' => 'custom_js',
            'type' => 'ace_editor',
            //'required' => array('layout','equals','1'),	
            'title' => esc_html__('JS Code', 'vestige'),
            'subtitle' => esc_html__('Paste your JS code here.', 'vestige'),
            'mode' => 'javascript',
            'theme' => 'chrome',
            'desc' => '',
            'default' => "jQuery(document).ready(function(){\n\n});"
        )
    ),
));
	Redux::setSection( $opt_name, array(
                'title' => esc_html__('Import / Export', 'vestige'),
                'desc' => esc_html__('Import and Export your Theme Framework settings from file, text or URL.', 'vestige'),
                'icon' => 'el-icon-refresh',
                'fields' => array(
                    array(
                        'id' => 'opt-import-export',
                        'type' => 'import_export',
                       'title' => __('Import Export','vestige'),
                        'subtitle' => __('Save and restore your Theme options','vestige'),
                        'full_width' => false,
                    ),
                ),
));

    /*
     * <--- END SECTIONS
     */
