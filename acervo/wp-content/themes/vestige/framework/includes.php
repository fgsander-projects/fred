<?php
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly
define('ImicFrameworkPath', get_template_directory() . '/framework');
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
/*
* Here you include files which is required by theme
*/
require_once(ImicFrameworkPath . '/theme-functions.php');
/* PLUGIN INCLUDES
================================================== */
require_once(ImicFrameworkPath . '/tgm/plugin-includes.php');
require_once ImicFrameworkPath . '/theme_options_css.php';
/* LOAD Page Builder Widgets/Prebuilt Pages
  ================================================== */
require_once(ImicFrameworkPath . '/page-builder/page-builder.php');
/* SHORTCODES
 ================================================== */
if (!class_exists('Vestige_Core_Features')) {
	require_once ImicFrameworkPath . '/shortcodes.php';
}
require_once (ImicFrameworkPath . '/meta-boxes.php');
require_once IMIC_FILEPATH . '/welcome.php';
/* MEGA MENU
	================================================== */
require_once(ImicFrameworkPath . '/megamenu/megamenu.php');
/* WIDGETS INCLUDES
================================================== */
if (!class_exists('Vestige_Core_Features')) {
	require_once(ImicFrameworkPath . '/widgets/upcoming_events.php');
	require_once(ImicFrameworkPath . '/widgets/selected_post.php');
	require_once(ImicFrameworkPath . '/widgets/custom_category.php');
	require_once(ImicFrameworkPath . '/widgets/upcoming_exhibitions.php');
}
/* LOAD STYLESHEETS
================================================== */
if (!function_exists('imic_enqueue_styles')) {
	function imic_enqueue_styles()
	{
		$imic_options = get_option('imic_options');
		$theme_info = wp_get_theme();
		$event_switch = (isset($imic_options['event_switch']) && $imic_options['event_switch'] != '') ? $imic_options['event_switch'] : '1';
		$theme_color_scheme = (isset($imic_options['theme_color_scheme'])) ? $imic_options['theme_color_scheme'] : 'color1.css';
		wp_register_style('imic_bootstrap', IMIC_THEME_PATH . '/assets/css/bootstrap.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_bootstrap_theme', IMIC_THEME_PATH . '/assets/css/bootstrap-theme.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_main', get_stylesheet_uri(), array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_fontawesome', IMIC_THEME_PATH . '/assets/css/font-awesome.min.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_animations', IMIC_THEME_PATH . '/assets/css/animations.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_lineicons', IMIC_THEME_PATH . '/assets/css/line-icons.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_owl1', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/css/owl.carousel.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_magnific', IMIC_THEME_PATH . '/assets/vendor/magnific/magnific-popup.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_owl2', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/css/owl.theme.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_nivo_default', IMIC_THEME_PATH . '/assets/vendor/nivoslider/themes/default/default.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_nivo_slider', IMIC_THEME_PATH . '/assets/vendor/nivoslider/nivo-slider.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_prettyPhoto', IMIC_THEME_PATH . '/assets/vendor/prettyphoto/css/prettyPhoto.css', array(), $theme_info->get('Version'), 'all');
		wp_register_style('imic_colors', IMIC_THEME_PATH . '/assets/colors/' . $theme_color_scheme, array(), $theme_info->get('Version'), 'all');
		if ($event_switch != '0') {
			wp_register_style('imic_fullcalendar_css', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/fullcalendar.css', array(), $theme_info->get('Version'), 'all');
			wp_register_style('imic_fullcalendar_print', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/fullcalendar.print.css', array(), $theme_info->get('Version'), 'print');
		}
		//**Enqueue STYLESHEETPATH**//
		wp_enqueue_style('imic_bootstrap');
		wp_enqueue_style('imic_bootstrap_theme');
		wp_enqueue_style('imic_fontawesome');
		wp_enqueue_style('imic_animations');
		wp_enqueue_style('imic_lineicons');
		wp_enqueue_style('imic_main');
		if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
			wp_enqueue_style('imic_prettyPhoto');
		} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
			wp_enqueue_style('imic_magnific');
		}
		wp_enqueue_style('imic_owl1');
		wp_enqueue_style('imic_owl2');
		if (isset($imic_options['theme_color_scheme']) && $imic_options['theme_color_type'][0] == 0) {
			wp_enqueue_style('imic_colors');
		}
		//**End Enqueue STYLESHEETPATH**//
	}
	add_action('wp_enqueue_scripts', 'imic_enqueue_styles', 99);
}
if (!function_exists('imic_enqueue_scripts')) {
	function imic_enqueue_scripts()
	{
		$imic_options = get_option('imic_options');
		$event_switch = (isset($imic_options['event_switch']) && $imic_options['event_switch'] != '') ? $imic_options['event_switch'] : '1';
		$gmap_api_key = (isset($imic_options['google_map_api'])) ? $imic_options['google_map_api'] : '';
		$sticky_menu = (isset($imic_options['enable-header-stick'])) ? $imic_options['enable-header-stick'] : '1';
		$theme_info = wp_get_theme();
		$facebook = (isset($imic_options['share_icon'][1])) ? $imic_options['share_icon'][1] : '';
		$twitter = (isset($imic_options['share_icon'][2])) ? $imic_options['share_icon'][2] : '';
		$google = (isset($imic_options['share_icon'][3])) ? $imic_options['share_icon'][3] : '';
		$tumblr = (isset($imic_options['share_icon'][4])) ? $imic_options['share_icon'][4] : '';
		$pinterest = (isset($imic_options['share_icon'][5])) ? $imic_options['share_icon'][5] : '';
		$reddit = (isset($imic_options['share_icon'][6])) ? $imic_options['share_icon'][6] : '';
		$linkedin = (isset($imic_options['share_icon'][7])) ? $imic_options['share_icon'][7] : '';
		$email_share = (isset($imic_options['share_icon'][8])) ? $imic_options['share_icon'][8] : '';
		$site_width = (isset($imic_options['site_width'])) ? $imic_options['site_width'] : '1080';
		//**register script**//
		wp_register_script('imic_jquery_modernizr', IMIC_THEME_PATH . '/assets/js/modernizr.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_prettyphoto', IMIC_THEME_PATH . '/assets/vendor/prettyphoto/js/prettyphoto.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_magnific', IMIC_THEME_PATH . '/assets/vendor/magnific/jquery.magnific-popup.min.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_helper_plugins', IMIC_THEME_PATH . '/assets/js/helper-plugins.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_ui_plugins', IMIC_THEME_PATH . '/assets/js/ui-plugins.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_bootstrap', IMIC_THEME_PATH . '/assets/js/bootstrap.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_init', IMIC_THEME_PATH . '/assets/js/init.js', array('imic_jquery_flexslider'), $theme_info->get('Version'), true);
		wp_register_script('imic_google_map', 'https://maps.googleapis.com/maps/api/js?key=' . $gmap_api_key, array(), $theme_info->get('Version'), true);
		wp_register_script('imic_jquery_flexslider', IMIC_THEME_PATH . '/assets/vendor/flexslider/js/jquery.flexslider.js', array(), $theme_info->get('Version'), true);
		if ($event_switch != '0') {
			wp_register_script('imic_fullcalendar', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/fullcalendar.min.js', array(), $theme_info->get('Version'), true);
			wp_register_script('imic_gcal', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/gcal.js', array(), $theme_info->get('Version'), true);
			wp_register_script('imic_calender_events', IMIC_THEME_PATH . '/assets/js/calender_events.js', array(), $theme_info->get('Version'), true);
			wp_register_script('imic_calender_updated', IMIC_THEME_PATH . '/assets/vendor/fullcalendar/lib/moment.min.js', array(), $theme_info->get('Version'), false);
		}

		wp_register_script('imic_owlc', IMIC_THEME_PATH . '/assets/vendor/owl-carousel/js/owl.carousel.min.js', array(), $theme_info->get('Version'), true);

		wp_register_script('imic_calender_exhibitions', IMIC_THEME_PATH . '/assets/js/calendar_exhibition.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_nivo_slider', IMIC_THEME_PATH . '/assets/vendor/nivoslider/jquery.nivo.slider.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_event_register_validation', IMIC_THEME_PATH . '/assets/js/event-register-validation.js', array(), $theme_info->get('Version'), true);
		wp_register_script('imic_contact_map', IMIC_THEME_PATH . '/assets/js/contact-map.js', array(), $theme_info->get('Version'), true);

		wp_register_script('imic_gmap', IMIC_THEME_PATH . '/assets/js/googleMap.js', array(), '', true);
		wp_register_script('imic_event_pay', IMIC_THEME_PATH . '/assets/js/event_pay.js', array(), '', true);
		//**End register script**//
		//**Enqueue script**//
		wp_enqueue_script('imic_calender_updated');
		wp_enqueue_script('imic_jquery_modernizr');
		wp_enqueue_script('jquery');
		if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
			wp_enqueue_script('imic_jquery_prettyphoto');
		} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
			wp_enqueue_script('imic_jquery_magnific');
		}
		wp_enqueue_script('imic_jquery_helper_plugins');
		wp_enqueue_script('imic_jquery_ui_plugins');
		wp_enqueue_script('imic_jquery_bootstrap');
		wp_enqueue_script('imic_owlc');
		wp_enqueue_script('imic_jquery_init');
		wp_enqueue_script('imic_google_map');
		wp_localize_script('imic_jquery_init', 'urlajax_gaea', array('siteWidth' => $site_width, 'sticky' => $sticky_menu, 'facebook' => $facebook, 'twitter' => $twitter, 'google' => $google, 'tumblr' => $tumblr, 'pinterest' => $pinterest, 'reddit' => $reddit, 'linkedin' => $linkedin, 'email' => $email_share));
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
		//**End Enqueue script**//
	}
	add_action('wp_enqueue_scripts', 'imic_enqueue_scripts');
}
/* LOAD BACKEND SCRIPTS
  ================================================== */
function imic_admin_scripts()
{
	wp_register_script('imic-admin-functions', IMIC_THEME_PATH . '/assets/js/imic_admin.js', 'jquery', NULL, TRUE);
	wp_enqueue_script('imic-admin-functions');
	if (isset($_REQUEST['taxonomy'])) {
		wp_register_script('imic-upload', IMIC_THEME_PATH . '/assets/js/imic-upload.js', 'jquery', NULL, TRUE);
		wp_enqueue_media();
		wp_enqueue_script('imic-upload');
	}
	wp_enqueue_script('imic-admin-scripts-new', IMIC_THEME_PATH . '/assets/js/imi-plugins.js', 'jquery', null, true);
	wp_localize_script('imic-admin-scripts-new', 'vals', array('siteurl' => esc_url(site_url('wp-admin/admin.php?page=imi-admin-welcome'))));
	wp_enqueue_style('adorechurch-admin-style', IMIC_THEME_PATH . '/assets/css/admin-pages.css', array(), '1.0', 'all');
}
add_action('admin_enqueue_scripts', 'imic_admin_scripts');
/* LOAD BACKEND STYLE
  ================================================== */
function imic_admin_styles()
{
	add_editor_style(IMIC_THEME_PATH . '/assets/css/editor-style.css');
	add_editor_style(IMIC_THEME_PATH . '/assets/css/font-awesome.min.css');
	echo '<style>.imic-image-select-repeatable-bg-image{width:50px;}#upload_category_button,#upload_category_button_remove{width:auto !important;}</style>';
}
add_action('admin_head', 'imic_admin_styles');
