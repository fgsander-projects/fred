<?php
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly
/*
 *
 * 	imic Framework Theme Functions
 * 	------------------------------------------------
 * 	Copyright imithemes  2018 - http://www.imithemes.com/
 * 	imic_theme_activation()
 *	imic_maintenance_mode()
 *	imic_custom_login_logo()
 *	imic_add_nofollow_cat()
 *	imic_custom_styles()
 *	imic_custom_script()
 *	imic_content_filter()
 *	imic_register_sidebars()
 *	imic_custom_taxonomies_terms_links()
 *	imic_event_time_columns()
 *	imic_event_time_column_content()
 *	imic_sortable_event_column()
 *	imic_dateDiff()
 *	imic_afterSavePost()
 *	imic_add_nav_menu_meta_boxes()
 *	imic_nav_menu_link()
 *	imic_get_all_types()
 *	imic_get_cat_list()
 *	imic_widget_titles()
 *	imic_month_translate()
 *	imic_short_month_translate()
 *	imic_day_translate()
 *	imic_RevSliderShortCode()
 *	imic_layerslidershortcode()
 *	imic_query_arg()
 *	imic_query_arg_exhibition()
 *	imicAddQueryVarsFilter()
 *	ImicConvertDate()
 *	imic_cat_count_flag()
 *	imic_recur_events()
 *	imic_get_all_sidebars()
 *	imic_register_meta_box()
 *	imic_gallery_flexslider()
 *	imic_social_staff_icon()
 *	imic_share_buttons()
 *	imic_custom_excerpt_length()
 *	imic_contact_event_manager()
 *	imic_get_template_url()
 *	imic_exhibition_schedule()
 *	imic_wp_get_attachment()
 *	imic_get_event_date_format()
 *	imic_get_event_time_format()
 *	imic_get_post_content()
 */
/* THEME ACTIVATION
  ================================================== */
if (!function_exists('imic_theme_activation')) {
	function imic_theme_activation()
	{
		global $pagenow;
		if (is_admin() && 'themes.php' == $pagenow && isset($_GET['activated'])) {
			#provide hook so themes can execute theme specific functions on activation
			do_action('imic_theme_activation');
		}
	}
	add_action('admin_init', 'imic_theme_activation');
}
/* MAINTENANCE MODE
  ================================================== */
if (!function_exists('imic_maintenance_mode')) {
	function imic_maintenance_mode()
	{
		$options = get_option('imic_options');
		$custom_logo = $custom_logo_output = $maintenance_mode = "";
		if ((isset($options['custom_admin_login_logo'])) && (isset($options['custom_admin_login_logo']['url']))) {
			$custom_logo = $options['custom_admin_login_logo']['url'];
		}
		$custom_logo_output = '<img src="' . $custom_logo . '" alt="maintenance" style="height: 62px!important;margin: 0 auto; display: block;" />';
		if (isset($options['enable_maintenance'])) {
			$maintenance_mode = $options['enable_maintenance'];
		} else {
			$maintenance_mode = false;
		}
		if ($maintenance_mode) {
			if (!current_user_can('edit_themes') || !is_user_logged_in()) {
				wp_die($custom_logo_output . '<p style="text-align:center">' . esc_html__('We are currently in maintenance mode, please check back shortly.', 'vestige') . '</p>', esc_html__('Maintenance Mode', 'vestige'));
			}
		}
	}
	add_action('get_header', 'imic_maintenance_mode');
}
/* CUSTOM LOGIN LOGO
  ================================================== */
if (!function_exists('imic_custom_login_logo')) {
	function imic_custom_login_logo()
	{
		$options = get_option('imic_options');
		$custom_logo = "";
		if (isset($options['custom_admin_login_logo'])) {
			$custom_logo = $options['custom_admin_login_logo'];
		}
		echo '<style type="text/css">
			    .login h1 a { background-image:url(' . $custom_logo['url'] . ') !important; background-size: auto !important; width: auto !important; height: 95px !important; }
			</style>';
	}
	add_action('login_head', 'imic_custom_login_logo');
}
/* CATEGORY REL FIX
  ================================================== */
if (!function_exists('imic_add_nofollow_cat')) {
	function imic_add_nofollow_cat($text)
	{
		$text = str_replace('rel="category tag"', "", $text);
		return $text;
	}
	add_filter('the_category', 'imic_add_nofollow_cat');
}
/* CUSTOM CSS OUTPUT
  ================================================== */
if (!function_exists('imic_custom_styles')) {
	function imic_custom_styles()
	{
		$options = get_option('imic_options');

		// OPEN STYLE TAG
		echo '<style type="text/css">' . "\n";
		// Custom CSS
		$custom_css = (isset($options['custom_css'])) ? $options['custom_css'] : '';
		if (isset($options['theme_color_type'][0]) && $options['theme_color_type'][0] == 1) {
			$primaryColor = $options['primary_theme_color'];
			echo 'a, .text-primary, .btn-primary .badge, .btn-link,a.list-group-item.active > .badge,.nav-pills > .active > a > .badge, p.drop-caps:first-letter, .accent-color, .nav-np .next:hover, .nav-np .prev:hover, .basic-link, .pagination > li > a:hover,.pagination > li > span:hover,.pagination > li > a:focus,.pagination > li > span:focus, .accordion-heading:hover .accordion-toggle, .accordion-heading:hover .accordion-toggle.inactive, .accordion-heading:hover .accordion-toggle i, .accordion-heading .accordion-toggle.active, .accordion-heading .accordion-toggle.active, .accordion-heading .accordion-toggle.active i, .top-navigation li a:hover, .icon-box-inline span, .pricing-column h3, .post .post-title a:hover, a, .post-actions .comment-count a:hover, .pricing-column .features a:hover, a:hover, .widget a:hover, .nav-tabs > li > a:hover, .list-group-item a:hover, .icon-box.ibox-plain .ibox-icon i, .icon-box.ibox-border .ibox-icon i, .icon-box.ibox-plain .ibox-icon span, .icon-box.ibox-border .ibox-icon span, .top-header .sf-menu > li:hover > a, .main-navigation > ul > li > a:hover, .featured-block h3 a, address strong, .staff-item .meta-data, ul.checks > li > i, ul.angles > li > i, ul.carets > li > i, ul.chevrons > li > i, ul.icons > li > i, .grid-item h4 a, .sidebar-widget .widget-title, .exhibition-time, .widget li .meta-data a:hover, .sort-source li.active a, #menu-toggle:hover, .sidebar-widget .widgettitle{
	color:' . esc_attr($primaryColor) . ';
}
.basic-link:hover, .continue-reading:hover, .grid-item h4 a:hover{
	opacity:.8;
}
p.drop-caps.secondary:first-letter, .accent-bg, .btn-primary,.btn-primary.disabled,.btn-primary[disabled],fieldset[disabled] .btn-primary,.btn-primary.disabled:hover,.btn-primary[disabled]:hover,fieldset[disabled] .btn-primary:hover,.btn-primary.disabled:focus,.btn-primary[disabled]:focus,fieldset[disabled] .btn-primary:focus,.btn-primary.disabled:active,
.btn-primary[disabled]:active,fieldset[disabled] .btn-primary:active,.btn-primary.disabled.active,.btn-primary[disabled].active,fieldset[disabled] .btn-primary.active,.dropdown-menu > .active > a,.dropdown-menu > .active > a:hover,.dropdown-menu > .active > a:focus,.nav-pills > li.active > a,.nav-pills > li.active > a:hover,.nav-pills > li.active > a:focus,.pagination > .active > a,.pagination > .active > span,.pagination > .active > a:hover,.pagination > .active > span:hover,
.pagination > .active > a:focus,.pagination > .active > span:focus,.label-primary,.progress-bar-primary,a.list-group-item.active,a.list-group-item.active:hover,a.list-group-item.active:focus,
.panel-primary > .panel-heading, .carousel-indicators .active, .flex-control-nav a:hover, .flex-control-nav a.flex-active, .media-box .media-box-wrapper, .media-box .zoom .icon, .media-box .expand .icon, .icon-box.icon-box-style1:hover .ico, .owl-theme .owl-page.active span, .owl-theme .owl-controls.clickable .owl-page:hover span, .ibox-effect.ibox-dark .ibox-icon i:hover,.ibox-effect.ibox-dark:hover .ibox-icon i,.ibox-border.ibox-effect.ibox-dark .ibox-icon i:after, .icon-box .ibox-icon i,.icon-box .ibox-icon img, .icon-box .ibox-icon i,.icon-box .ibox-icon img, .icon-box.ibox-dark.ibox-outline:hover .ibox-icon i, .ibox-effect.ibox-dark .ibox-icon span:hover,.ibox-effect.ibox-dark:hover .ibox-icon span,.ibox-border.ibox-effect.ibox-dark .ibox-icon span:after, .icon-box .ibox-icon span, .icon-box .ibox-icon span, .icon-box.ibox-dark.ibox-outline:hover .ibox-icon span, .skewed-title-bar,  .grid-item-date, .fc-event, .events-grid .grid-item .event-time, .pricing-column.highlight h3, #bbpress-forums div.bbp-topic-tags a:hover, .bbp-search-form input[type="submit"]:hover, .bbp-topic-pagination .current, .share-buttons-tc a, .event-ticket .ticket-cost{
  background-color: ' . esc_attr($primaryColor) . ';
}
.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open .dropdown-toggle.btn-primary, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active, .woocommerce #respond input#submit.alt:active, .woocommerce #content input.button.alt:active, .woocommerce-page a.button.alt:active, .woocommerce-page button.button.alt:active, .woocommerce-page input.button.alt:active, .woocommerce-page #respond input#submit.alt:active, .woocommerce-page #content input.button.alt:active, .wpcf7-form .wpcf7-submit{
  background: ' . esc_attr($primaryColor) . ';
  opacity:.9
}
p.demo_store, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page #content input.button.alt, .woocommerce span.onsale, .woocommerce-page span.onsale, .wpcf7-form .wpcf7-submit, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_layered_nav ul li.chosen a, .woocommerce-page .widget_layered_nav ul li.chosen a{
	background: ' . esc_attr($primaryColor) . ';
}
.nav .open > a,.nav .open > a:hover,.nav .open > a:focus,.pagination > .active > a,.pagination > .active > span,.pagination > .active > a:hover,.pagination > .active > span:hover,.pagination > .active > a:focus,.pagination > .active > span:focus,a.thumbnail:hover,a.thumbnail:focus,a.thumbnail.active,a.list-group-item.active,a.list-group-item.active:hover,a.list-group-item.active:focus,.panel-primary,.panel-primary > .panel-heading, .flexslider .flex-prev:hover, .flexslider .flex-next:hover, .btn-primary.btn-transparent, .counter .timer-col #days, .event-list-item:hover .event-list-item-date .event-date, .icon-box.icon-box-style1 .ico, .event-prog .timeline-stone, .event-ticket-left .ticket-handle, .bbp-topic-pagination .current, .icon-box.icon-box-style1 .ico, .icon-box-inline span, .icon-box.ibox-border .ibox-icon, .icon-box.ibox-outline .ibox-icon, .icon-box.ibox-dark.ibox-outline:hover .ibox-icon{
	border-color:' . esc_attr($primaryColor) . ';
}
.panel-primary > .panel-heading + .panel-collapse .panel-body, .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus, .widget_special_events .event-item, .woocommerce .woocommerce-info, .woocommerce-page .woocommerce-info, .woocommerce .woocommerce-message, .woocommerce-page .woocommerce-message{
	border-top-color:' . esc_attr($primaryColor) . ';
}
.panel-primary > .panel-footer + .panel-collapse .panel-body{
	border-bottom-color:' . esc_attr($primaryColor) . ';
}
.search-find-results, .dd-menu > ul > li > ul li:hover, .flex-caption{
	border-left-color:' . esc_attr($primaryColor) . ';
}
.ibox-border.ibox-effect.ibox-dark .ibox-icon i:hover,.ibox-border.ibox-effect.ibox-dark:hover .ibox-icon i, .ibox-border.ibox-effect.ibox-dark .ibox-icon span:hover,.ibox-border.ibox-effect.ibox-dark:hover .ibox-icon span {
	box-shadow:0 0 0 1px ' . esc_attr($primaryColor) . ';
}
.ibox-effect.ibox-dark .ibox-icon i:after, .ibox-effect.ibox-dark .ibox-icon span:after {
	box-shadow:0 0 0 2px ' . esc_attr($primaryColor) . ';
}';
		}
		$site_width = (isset($options['site_width'])) ? $options['site_width'] : '1080';
		$site_width = !empty($site_width) ? $site_width : 1080;
		$site_width_spaced = !empty($site_width) ? $site_width + 40 : 1120;
		$SiteMinHeight = (isset($options['content_min_height'])) ? $options['content_min_height'] : '400';
		$InPageHeight = (isset($options['inner_header_height'])) ? $options['inner_header_height'] : '';
		$NavItemSpacing = (isset($options['nav_items_spacing'])) ? $options['nav_items_spacing'] : '';
		$ddBackground = (isset($options['dd_background']['background-color'])) ? $options['dd_background']['background-color'] : '';
		$mmBackground = (isset($options['mm_background']['background-color'])) ? $options['mm_background']['background-color'] : '';
		$mmLinkNormal = (isset($options['mm_item_link_color']['regular'])) ? $options['mm_item_link_color']['regular'] : '';
		$mmLinkHover = (isset($options['mm_item_link_color']['hover'])) ? $options['mm_item_link_color']['hover'] : '';
		$mmLinkActive = (isset($options['mm_item_link_color']['active'])) ? $options['mm_item_link_color']['active'] : '';
		$ddRadius = (isset($options['dd_border_radius'])) ? $options['dd_border_radius'] : '';
		$paddition_top = (isset($options['logo_spacing']['padding-top'])) ? $options['logo_spacing']['padding-top'] : '';
		$paddition_bottom = (isset($options['logo_spacing']['padding-bottom'])) ? $options['logo_spacing']['padding-bottom'] : '';
		$logoHeight = (isset($options['logo_upload']['height'])) ? $options['logo_upload']['height'] : '';
		$logoHeightNew = str_replace('px', '', $logoHeight);
		$paddition_top_new = str_replace('px', '', $paddition_top);
		$paddition_bottom_new = str_replace('px', '', $paddition_bottom);
		if (isset($options['logo_upload']['height']) && !empty($options['logo_upload']['url'])) {
			$DropDownLevel = intval($logoHeightNew) + intval($paddition_top_new) + intval($paddition_bottom_new);
		} else {
			$DropDownLevel = 40 + intval($paddition_top_new) + intval($paddition_bottom_new);
		}
		$PushTop = intval($DropDownLevel) / 2 - 20;

		echo '.header-style2 .main-navigation > ul > li > a, .header-style2 .search-module-trigger, .header-style2 .cart-module-trigger{line-height:' . esc_attr($DropDownLevel) . 'px}
		@media only screen and (max-width: 992px){
		.header-style2 .dd-menu, .header-style2 .search-module-opened, .header-style2 .cart-module-opened{
			top:' . esc_attr($DropDownLevel) . 'px
		}
		.header-style2 #menu-toggle{
			line-height:' . esc_attr($DropDownLevel) . 'px
		}
		.header-style3 #menu-toggle{
			line-height:' . esc_attr($DropDownLevel) . 'px
		}
		.dd-menu{
			background:' . $mmBackground . '
		}
		.main-navigation > ul > li > a{
			color:' . $mmLinkNormal . '
		}
		.main-navigation > ul > li > a:hover{
			color:' . $mmLinkHover . '
		}
		.main-navigation > ul > li > a:active{
			color:' . $mmLinkActive . '
		}
		}
		.site-header .push-top{margin-top:' . esc_attr($PushTop) . 'px}';
		echo '@media (min-width:1200px){.container{width:' . $site_width . 'px;}}
		body.boxed .body{max-width:' . $site_width_spaced . 'px}
		@media (min-width: 1200px) {body.boxed .body .site-header, body.boxed .body .topbar{width:' . $site_width_spaced . 'px;}}';
		$footer_wide_width = (isset($options['footer_wide_width'])) ? $options['footer_wide_width'] : '';
		if ($footer_wide_width == 1) {
			echo '.site-footer > .container{width:100%;}';
		}
		if (isset($options['content_wide_width']) && $options['content_wide_width'] == 1) {
			echo '.content .container{width:100%;}';
		}
		if ($SiteMinHeight !== '') {
			echo '.content{min-height:' . esc_attr($SiteMinHeight) . 'px}';
		}
		if ($InPageHeight !== '') {
			echo '.page-header > div{height:' . esc_attr($InPageHeight) . 'px}.hero-area{min-height:' . esc_attr($InPageHeight) . 'px}';
		}
		if (isset($options['full_width_header']) && $options['full_width_header'] == 1) {
			echo '.site-header .container, .topbar .container{width:100%;}';
		}
		if (isset($options['enable-header-stick']) && $options['enable-header-stick'] == 0) {
			echo '@media only screen and (min-width: 992px){.header-style1 .site-header, .header-style2 .site-header, .header-style3 .main-navbar{position:relative!important;}}';
		}
		if (isset($options['header-stick-tablets']) && $options['header-stick-tablets'] == 0) {
			echo '@media only screen and (max-width: 992px) and (min-width: 767px) {.header-style1 .site-header, .header-style2 .site-header, .header-style3 .main-navbar{position:relative!important;}}';
		}
		if (isset($options['header-stick-mobiles']) && $options['header-stick-mobiles'] == 0) {
			echo '@media only screen and (max-width: 767px) {.header-style1 .site-header, .header-style2 .site-header, .header-style3 .main-navbar{position:relative!important;}}';
		}
		if (isset($options['show_page_title']) && $options['show_page_title'] == 0) {
			echo '.header-style1 .page-header > div > div > span, .header-style2 .page-header > div > div > span, .header-style3 .page-header > div > div > span{display:none!important}';
		}
		if (isset($options['full_width_footer']) && $options['full_width_footer'] == 1) {
			echo '.site-footer .container, .site-footer-bottom .container{width:100%;}';
		}
		if (isset($options['footer_bottom_enable']) && $options['footer_bottom_enable'] == 0) {
			echo '.site-footer-bottom{display:none;}';
		}
		if (isset($options['sidebar_position']) && $options['sidebar_position'] == 2) {
			echo ' #content-col, #sidebar-col{float:right;}';
		}
		if (isset($options['sidebar_widget_title_border_highlight']) && $options['sidebar_widget_title_border_highlight'] != '') {
			echo '.widget-title::before, .widgettitle::before{background:' . $options['sidebar_widget_title_border_highlight'] . ';}';
		}
		if (isset($options['share_show_text']) && $options['share_show_text'] == 0) {
			echo '.social-share-bar h4{display:none;}';
		}
		if (isset($options['nav_directions_arrows']) && $options['nav_directions_arrows'] == 0) {
			echo '.dd-menu > ul > li.menu-item-has-children a:after, .dd-menu > ul > li.menu-item-has-children a:before{display:none;}';
		}
		if ($NavItemSpacing != '') {
			echo '.main-navigation > ul > li{margin-left:' . esc_attr($NavItemSpacing) . 'px;}';
		}
		if (isset($options['dd_background']['background-color']) && $options['dd_background']['background-color'] !== '') {
			echo '.main-navigation > ul > li ul li ul:before{border-right-color:' . esc_attr($ddBackground) . ';}.main-navigation > ul > li ul:before{border-bottom-color:' . esc_attr($ddBackground) . ';}';
		}
		if (isset($options['dd_arrows']) && $options['dd_arrows'] == 0) {
			echo '.main-navigation > ul > li ul:before, .main-navigation > ul > li ul li ul:before{display:none;}';
		}
		if (isset($options['dd_dropshadow']) && $options['dd_dropshadow'] == 0) {
			echo '.dd-menu > ul > li ul{-webkit-box-shadow:none; -moz-box-shadow:none; box-shadow:none;}';
		}
		if ($ddRadius !== '') {
			echo '.dd-menu > ul > li ul{border-radius:' . esc_attr($ddRadius) . 'px;}.dd-menu > ul > li > ul li ul{border-radius:' . esc_attr($ddRadius) . 'px;}';
		}




		// USER STYLES
		if ($custom_css) {
			echo "\n" . '/*========== User Custom CSS Styles ==========*/' . "\n" . $custom_css;
		}
		// CLOSE STYLE TAG
		echo "</style>" . "\n";
	}
	add_action('wp_head', 'imic_custom_styles');
}
/* CUSTOM JS OUTPUT
  ================================================== */
if (!function_exists('imic_custom_script')) {
	function imic_custom_script()
	{
		$options = get_option('imic_options');
		$custom_js = (isset($options['custom_js'])) ? $options['custom_js'] : '';
		if ($custom_js) {
			echo '<script type ="text/javascript">' . $custom_js;
			echo '</script>';
		}
	}
	add_action('wp_footer', 'imic_custom_script');
}
/* SHORTCODE FIX
  ================================================== */
if (!function_exists('imic_content_filter')) {
	function imic_content_filter($content)
	{
		// array of custom shortcodes requiring the fix 
		$block = join("|", array("imic_button", "icon", "iconbox", "imic_image", "anchor", "paragraph", "divider", "heading", "alert", "blockquote", "dropcap", "code", "label", "container", "spacer", "span", "one_full", "one_half", "one_third", "one_fourth", "one_sixth", "two_third", "progress_bar", "imic_count", "imic_tooltip", "imic_video", "htable", "thead", "tbody", "trow", "thcol", "tcol", "pricing_table", "pt_column", "pt_package", "pt_button", "pt_details", "pt_price", "list", "list_item", "list_item_dt", "list_item_dd", "accordions", "accgroup", "acchead", "accbody", "toggles", "togglegroup", "togglehead", "togglebody", "tabs", "tabh", "tab", "tabc", "tabrow", "section", "page_first", "page_last", "page", "modal_box", "imic_form", "fullcalendar", "staff", "fullscreenvideo"));
		// opening tag
		$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content);
		// closing tag
		$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $rep);
		return $rep;
	}
	add_filter("the_content", "imic_content_filter");
}
/* REGISTER SIDEBARS
  ================================================== */
if (!function_exists('imic_register_sidebars')) {
	function imic_register_sidebars()
	{
		if (function_exists('register_sidebar')) {
			$options = get_option('imic_options');
			$footer_class = (isset($options["footer_layout"])) ? $options["footer_layout"] : '4';
			register_sidebar(array(
				'name' => esc_html__('Post Sidebar', 'vestige'),
				'id' => 'post-sidebar',
				'description' => '',
				'class' => '',
				'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name' => esc_html__('Page Sidebar', 'vestige'),
				'id' => 'page-sidebar',
				'description' => '',
				'class' => '',
				'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name' => esc_html__('Event Sidebar', 'vestige'),
				'id' => 'event-sidebar',
				'description' => '',
				'class' => '',
				'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name' => esc_html__('Product Sidebar', 'vestige'),
				'id' => 'product-sidebar',
				'description' => '',
				'class' => '',
				'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			));
			register_sidebar(array(
				'name' => esc_html__('Footer Widgets', 'vestige'),
				'id' => 'footer-sidebar',
				'description' => '',
				'class' => '',
				'before_widget' => '<div class="col-md-' . $footer_class . ' col-sm-' . $footer_class . ' widget footer-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			));
		}
	}
	add_action('init', 'imic_register_sidebars', 35);
}
// get taxonomies terms links
if (!function_exists('imic_custom_taxonomies_terms_links')) {
	function imic_custom_taxonomies_terms_links($id)
	{
		global $post;
		$out = '';
		// get post by post id
		$post = get_post($id);
		// get post type by post
		$post_type = $post->post_type;
		// get post type taxonomies
		$taxonomies = get_object_taxonomies($post_type);
		foreach ($taxonomies as $taxonomy) {
			// get the terms related to post
			$terms = get_the_terms($post->ID, $taxonomy);
			if (!empty($terms)) {
				foreach ($terms as $term) {
					$out = $term->name;
				}
			}
		}
		return $out;
	}
}
//Manage Custom Columns for Event Post Type 
if (!function_exists('imic_event_time_columns')) {
	add_filter('manage_edit-event_columns', 'imic_event_time_columns');
	function imic_event_time_columns($columns)
	{
		$columns['Event'] = esc_html__('Event', 'vestige');
		return $columns;
	}
}
if (!function_exists('imic_event_time_column_content')) {
	add_action('manage_event_posts_custom_column', 'imic_event_time_column_content', 10, 2);
	function imic_event_time_column_content($column_name, $post_id)
	{
		switch ($column_name) {
			case 'Event':
				$sdate = get_post_meta($post_id, 'imic_event_start_dt', true);
				$stime = get_post_meta($post_id, 'imic_event_start_tm', true);
				$edate = get_post_meta($post_id, 'imic_event_end_dt', true);
				$etime = get_post_meta($post_id, 'imic_event_end_tm', true);
				echo '<abbr title="' . $sdate . ' ' . $stime . '">' . $sdate . '</abbr><br title="' . $edate . ' ' . $etime . '">' . $edate;
				break;
			case 'Recurring':
				$frequency = get_post_meta($post_id, 'imic_event_frequency', true);
				$frequency_count = get_post_meta($post_id, 'imic_event_frequency_count', true);
				if ($frequency == 1) {
					$sent = "Every Day";
				} elseif ($frequency == 2) {
					$sent = "Every 2nd Day";
				} elseif ($frequency == 3) {
					$sent = "Every 3rd Day";
				} elseif ($frequency == 4) {
					$sent = "Every 4th Day";
				} elseif ($frequency == 5) {
					$sent = "Every 5th Day";
				} elseif ($frequency == 6) {
					$sent = "Every 6th Day";
				} elseif ($frequency == 30) {
					$sent = "Every Month";
				} else {
					$sent = "Every week";
				}
				if ($frequency > 0) {
					echo '<abbr title="' . $sent . ' ' . $sent . '">' . $sent . '</abbr><br>' . $frequency_count . ' time';
				}
				break;
		}
	}
}
if (!function_exists('imic_sortable_event_column')) {
	add_filter('manage_edit-event_sortable_columns', 'imic_sortable_event_column');
	function imic_sortable_event_column($columns)
	{
		$columns['Event'] = 'event';
		return $columns;
	}
}

function vestige_sort_event_column_datewise($vars)
{
	if (isset($vars['orderby']) && 'event' == $vars['orderby']) {
		$vars = array_merge($vars, array(
			'meta_key' => 'imic_event_start_dt',
			'orderby' => 'meta_value'
		));
	}

	return $vars;
}
add_filter('request', 'vestige_sort_event_column_datewise');

if (!function_exists('imic_dateDiff')) {
	function imic_dateDiff($start, $end)
	{
		$start_ts = strtotime($start);
		$end_ts = strtotime($end);
		$diff = $end_ts - $start_ts;
		return round($diff / 86400);
	}
}
//Event Recurring Date/Time
function imic_afterSavePost()
{
	if (isset($_GET['post'])) {
		$postId = $_GET['post'];
		$post_type = get_post_type($postId);
		if ($post_type == 'event') {

			$sdate = get_post_meta($postId, 'imic_event_start_dt', true);
			$end_event_date = get_post_meta($postId, 'imic_event_end_dt', true);
			if ($end_event_date == '') {
				update_post_meta($postId, 'imic_event_end_dt', $sdate);
			}
			$frequency = get_post_meta($postId, 'imic_event_frequency', true);
			$frequency_count = get_post_meta($postId, 'imic_event_frequency_count', true);
			$value = strtotime($sdate);
			if ($frequency == 30) {
				$svalue = strtotime("+" . $frequency_count . " month", $value);
				$suvalue = date_i18n('Y-m-d', $svalue);
			} else {
				$svalue = $frequency * $frequency_count * 86400;
				$suvalue = $svalue + $value;
				$suvalue = date_i18n('Y-m-d', $suvalue);
			}
			$days = imic_dateDiff($sdate, $end_event_date);
			if ($days > 0) {
				$suvalue = $end_event_date;
			}
			update_post_meta($postId, 'imic_event_frequency_end', $suvalue);
		}
	}
}
imic_afterSavePost();

//Get All Post Types
if (!function_exists('imic_get_all_types')) {
	add_action('wp_loaded', 'imic_get_all_types');
	function imic_get_all_types()
	{
		$args = array(
			'public'   => true,
		);
		$output = 'names'; // names or objects, note names is the default
		return $post_types = get_post_types($args, $output);
	}
}
/* -------------------------------------------------------------------------------------
  Get Cat List.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_get_cat_list')) {
	function imic_get_cat_list()
	{
		$amp_categories_obj = get_categories('exclude=1');

		$amp_categories = array();
		if (count($amp_categories_obj) > 0) {
			foreach ($amp_categories_obj as $amp_cat) {
				$amp_categories[$amp_cat->cat_ID] = $amp_cat->name;
			}
		}
		return $amp_categories;
	}
}
/* -------------------------------------------------------------------------------------
  Filter the Widget Title.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_widget_titles')) {
	add_filter('dynamic_sidebar_params', 'imic_widget_titles', 20);
	function imic_widget_titles(array $params)
	{
		// $params will ordinarily be an array of 2 elements, we're only interested in the first element
		$widget = &$params[0];
		$id = $params[0]['id'];
		if ($id == 'footer-sidebar') {
			$widget['before_title'] = '<h4 class="widgettitle">';
			$widget['after_title'] = '</h4>';
		} else {
			$widget['before_title'] = '<h3 class="widgettitle">';
			$widget['after_title'] = '</h3>';
		}
		return $params;
	}
}
/* -------------------------------------------------------------------------------------
  Filter the Widget Text.
  ----------------------------------------------------------------------------------- */
add_filter('widget_text', 'do_shortcode');
/* -------------------------------------------------------------------------------------
Month Translate in Default.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_month_translate')) {
	function imic_month_translate($str)
	{

		$options = get_option('imic_options');
		$months = (isset($options["calendar_month_name"])) ? $options["calendar_month_name"] : '';
		$months = explode(',', $months);
		if (count($months) <= 1) {
			$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		}
		$sb = array();
		foreach ($months as $month) {
			$sb[] = $month;
		}
		$engMonth = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$trMonth = $sb;
		$converted = str_replace($engMonth, $trMonth, $str);
		return $converted;
	}
	/* -------------------------------------------------------------------------------------
  Filter the  Month name of Post.
  ----------------------------------------------------------------------------------- */
	add_filter('get_the_time', 'imic_month_translate');
	add_filter('the_date', 'imic_month_translate');
	add_filter('get_the_date', 'imic_month_translate');
	add_filter('comments_number', 'imic_month_translate');
	add_filter('get_comment_date', 'imic_month_translate');
	add_filter('get_comment_time', 'imic_month_translate');
	add_filter('date_i18n', 'imic_month_translate');
}
/* -------------------------------------------------------------------------------------
  Short Month Translate in Default.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_short_month_translate')) {
	function imic_short_month_translate($str)
	{

		$options = get_option('imic_options');
		$months = (isset($options["calendar_month_name_short"])) ? $options["calendar_month_name_short"] : '';
		$months = explode(',', $months);
		if (count($months) <= 1) {
			$months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		}
		$sb = array();
		foreach ($months as $month) {
			$sb[] = $month;
		}
		$engMonth = array("/\bJan\b/", "/\bFeb\b/", "/\bMar\b/", "/\bApr\b/", "/\bMay\b/", "/\bJun\b/", "/\bJul\b/", "/\bAug\b/", "/\bSep\b/", "/\bOct\b/", "/\bNov\b/", "/\bDec\b/");
		$trMonth = $sb;
		$converted = preg_replace($engMonth, $trMonth, $str);
		return $converted;
	}
	/* -------------------------------------------------------------------------------------
  Filter the  Sort Month name of Post.
  ----------------------------------------------------------------------------------- */
	add_filter('get_the_time', 'imic_short_month_translate');
	add_filter('the_date', 'imic_short_month_translate');
	add_filter('get_the_date', 'imic_short_month_translate');
	add_filter('comments_number', 'imic_short_month_translate');
	add_filter('get_comment_date', 'imic_short_month_translate');
	add_filter('get_comment_time', 'imic_short_month_translate');
	add_filter('date_i18n', 'imic_short_month_translate');
}
if (!function_exists('imic_day_translate')) {
	function imic_day_translate($str)
	{
		$options = get_option('imic_options');
		$days = (isset($options["calendar_day_name"])) ? $options["calendar_day_name"] : '';
		$days = explode(',', $days);
		if (count($days) <= 1) {
			$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		}
		$sb = array();
		foreach ($days as $month) {
			$sb[] = $month;
		}
		$engDay = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		$trDay = $sb;
		$converted = str_replace($engDay, $trDay, $str);
		return $converted;
	}
	/* -------------------------------------------------------------------------------------
  Filter the  Day name of Post.
  ----------------------------------------------------------------------------------- */
	add_filter('date_i18n', 'imic_day_translate');
}
/* -------------------------------------------------------------------------------------
  RevSlider ShortCode
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_RevSliderShortCode')) {
	function imic_RevSliderShortCode()
	{
		$slidernames = array();
		if (class_exists('RevSlider')) {
			$sld = new RevSlider();
			$sliders = $sld->getArrSliders();
			if (!empty($sliders)) {

				foreach ($sliders as $slider) {
					$title = $slider->getParam('title', 'false');
					$shortcode = $slider->getParam('shortcode', 'false');
					$slidernames[esc_attr($shortcode)] = $title;
				}
			}
		}
		return $slidernames;
	}
}

if (!function_exists('imic_layerslidershortcode')) {
	function imic_layerslidershortcode()
	{
		$layersliders = array();
		if (class_exists('LS_Sliders')) {
			$filters = array('page' => 1, 'limit' => 100);
			// Find sliders
			$sliders = LS_Sliders::find($filters);
			if (!empty($sliders)) :
				foreach ($sliders as $key => $item) :
					$name = !empty($item['slug']) ? $item['slug'] : $item['id'];
					$layersliders['[layerslider id=&quot;' . $name . '&quot;]'] = '[layerslider id=&quot;' . $name . '&quot;]';
				endforeach;
			endif;
		}
		return $layersliders;
	}
}
/** -------------------------------------------------------------------------------------
 * Add Query Arg
 * @param  ID,param1,param2 of current Post.
 * @return  Url with Query arg which is passed default is event_date.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_query_arg')) {
	function imic_query_arg($date_converted, $id)
	{
		$custom_event_url = add_query_arg('event_date', $date_converted, get_permalink($id));
		return $custom_event_url;
	}
}
/** -------------------------------------------------------------------------------------
 * Add Query Arg
 * @param  ID,param1,param2 of current Post.
 * @return  Url with Query arg which is passed default is exhibition_date.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_query_arg_exhibition')) {
	function imic_query_arg_exhibition($date_converted, $id)
	{
		$custom_event_url = add_query_arg('exhibition_date', $date_converted, get_permalink($id));
		return $custom_event_url;
	}
}
/** -------------------------------------------------------------------------------------
 * Query Var Filter
 * @description event_date parameter is added to query_vars filter
----------------------------------------------------------------------------------- */
if (!function_exists('imicAddQueryVarsFilter')) {
	function imicAddQueryVarsFilter($vars)
	{
		$vars[] = "event_date";
		$vars[] = "event_cat";
		$vars[] = "pg";
		$vars[] = "speakers";
		$vars[] = "reg";
		$vars[] = "exhibition_date";
		$vars[] = "registrant";
		return $vars;
	}
	add_filter('query_vars', 'imicAddQueryVarsFilter');
}
/** -------------------------------------------------------------------------------------
 * Convert the Format String from php to fullcalender
 * @see http://arshaw.com/fullcalendar/docs/utilities/formatDate/
 * @param $format
----------------------------------------------------------------------------------- */
if (!function_exists('ImicConvertDate')) {
	function ImicConvertDate($format)
	{
		$format_rules = array(
			'a' => 't',
			'A' => 'T',
			'B' => '',
			'c' => 'u',
			'd' => 'dd',
			'D' => 'ddd',
			'F' => 'MMMM',
			'g' => 'h',
			'G' => 'H',
			'h' => 'hh',
			'H' => 'HH',
			'i' => 'mm',
			'I' => '',
			'j' => 'd',
			'l' => 'dddd',
			'L' => '',
			'm' => 'MM',
			'M' => 'MMM',
			'n' => 'M',
			'O' => '',
			'r' => '',
			's' => 'ss',
			'S' => 'S',
			't' => '',
			'T' => '',
			'U' => '',
			'w' => '',
			'W' => '',
			'y' => 'yy',
			'Y' => 'yyyy',
			'z' => '',
			'Z' => ''
		);
		$ret = '';
		for ($i = 0; $i < strlen($format); $i++) {
			if (isset($format_rules[$format[$i]])) {
				$ret .= $format_rules[$format[$i]];
			} else {
				$ret .= $format[$i];
			}
		}
		return $ret;
	}
}
/** -------------------------------------------------------------------------------------
 * Return 0 if category have any post
 ----------------------------------------------------------------------------------- */
if (!function_exists('imic_cat_count_flag')) {
	function imic_cat_count_flag()
	{
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		$flag = 1;
		if (!empty($term)) {
			$flag = $output = ($term->count == 0) ? 0 : 1;
		}
		global $cat;
		if (!empty($cat)) {
			$cat_data = get_category($cat);
			$flag = ($cat_data->count == 0) ? 0 : 1;
		}
		return $flag;
	}
}

//Event Global Function
if (!function_exists('imic_recur_events')) {
	function imic_recur_events($status, $featured = "nos", $term = '', $term_tag = '', $month = '')
	{
		$imic_options = get_option('imic_options');
		$show_event = (isset($imic_options['event_show_until'])) ? $imic_options['event_show_until'] : '1';
		$featured = ($featured == "yes") ? "no" : "nos";
		$today = date_i18n('Y-m-d');
		if ($month != "") {
			$stop_date = $month;
			$curr_month = date_i18n('Y-m-t 23:59', strtotime('-1 month', strtotime($stop_date)));
			$current_end_date = date_i18n('Y-m-d H:i:s', strtotime($stop_date . ' + 1 day'));
			$previous_month_end = strtotime(date_i18n('Y-m-d 00:01', strtotime($stop_date)));
			$next_month_start = strtotime(date_i18n('Y-m-d 00:01', strtotime('+1 month', strtotime($stop_date))));
			$events_args = array('post_type' => 'event', 'suppress_filters' => true, 'event-category' => $term, 'event-tag' => $term_tag, 'meta_key' => 'imic_event_start_dt', 'meta_query' => array('relation' => 'AND', array('key' => 'imic_event_frequency_end', 'value' => $curr_month, 'compare' => '>'), array('key' => 'imic_event_start_dt', 'value' => date_i18n('Y-m-t 23:59', strtotime($stop_date)), 'compare' => '<')), 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1);
		} else {
			if ($status == 'future') {
				$events_args = array('post_type' => 'event', 'suppress_filters' => true, 'event-category' => $term, 'event-tag' => $term_tag, 'meta_key' => 'imic_event_start_dt', 'meta_query' => array(array('key' => 'imic_event_frequency_end', 'value' => $today, 'compare' => '>=')), 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1);
			} else {
				$events_args = array('post_type' => 'event', 'suppress_filters' => true, 'event-category' => $term, 'event-tag' => $term_tag, 'meta_key' => 'imic_event_start_dt', 'orderby' => 'meta_value', 'order' => 'ASC', 'posts_per_page' => -1);
			}
		}
		$event_add = array();
		$sinc = 1;
		$events_listings = new WP_Query($events_args);
		if ($events_listings->have_posts()) :
			while ($events_listings->have_posts()) : $events_listings->the_post();
				$eventDate = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
				$frequency = get_post_meta(get_the_ID(), 'imic_event_frequency', true);
				$frequency_count = get_post_meta(get_the_ID(), 'imic_event_frequency_count', true);
				$frequency_active = get_post_meta(get_the_ID(), 'imic_event_frequency_type', true);
				$frequency_type = get_post_meta(get_the_ID(), 'imic_event_frequency_type', true);
				$frequency_month_day = get_post_meta(get_the_ID(), 'imic_event_day_month', true);
				$frequency_week_day = get_post_meta(get_the_ID(), 'imic_event_week_day', true);
				if ($frequency_active > 0) {
					$frequency_count = $frequency_count;
				} else {
					$frequency_count = 0;
				}
				$seconds = $frequency * 86400;
				$fr_repeat = 0;
				while ($fr_repeat <= $frequency_count) {
					$eventDate = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
					$eventEndDate = get_post_meta(get_the_ID(), 'imic_event_end_dt', true);
					$inc = '';
					$eventEndDate = strtotime($eventEndDate);
					$eventDate = strtotime($eventDate);
					$diff_start = date_i18n('Y-m-d', $eventDate);
					$diff_end = date_i18n('Y-m-d', $eventEndDate);
					$days_extra = imic_dateDiff($diff_start, $diff_end);
					if ($days_extra > 0) {
						$start_day = 0;
						while ($start_day <= $days_extra) {
							$diff_sec = 86400 * $start_day;
							$new_date = $eventDate + $diff_sec;
							$str_only_date = date_i18n('Y-m-d', $new_date);
							if ($show_event == 0) {
								$en_only_time = date_i18n("G:i", $eventDate);
								$new_date_dt = date_i18n('Y-m-d', $new_date);
								$new_date = strtotime(date_i18n($new_date_dt . ' ' . $en_only_time));
							} else {
								$en_only_time = date_i18n("G:i", $eventEndDate);
								$new_date_dt = date_i18n('Y-m-d', $new_date);
								$new_date = strtotime(date_i18n($new_date_dt . ' ' . $en_only_time));
							}
							$start_dt_tm = strtotime($str_only_date . ' ' . $en_only_time);
							if ($start_dt_tm > date_i18n('U')) {
								$eventDate = $new_date;
								break;
							}
							$start_day++;
						}
					}
					if ($days_extra < 1) {
						if ($frequency_type == 1 || $frequency_type == 0) {
							if ($frequency == 30) {
								$eventDate = strtotime("+" . $fr_repeat . " month", $eventDate);
								$eventEndDate = strtotime("+" . $fr_repeat . " month", $eventEndDate);
							} else {
								$new_date = $seconds * $fr_repeat;
								$eventDate = $eventDate + $new_date;
								$eventEndDate = $eventEndDate + $new_date;
							}
						} else {
							$eventTime = date_i18n('G:i', $eventDate);
							$eventDate = strtotime(date_i18n('Y-m-01', $eventDate));
							if ($fr_repeat == 0) {
								$fr_repeat = $fr_repeat + 1;
							}
							$eventDate = strtotime("+" . $fr_repeat . " month", $eventDate);
							$next_month = date_i18n('F', $eventDate);
							$next_event_year = date_i18n('Y', $eventDate);
							$eventDate = date_i18n('Y-m-d ' . $eventTime, strtotime($frequency_month_day . ' ' . $frequency_week_day . ' of ' . $next_month . ' ' . $next_event_year));
							$eventDate = strtotime($eventDate);
						}
					}
					$st_dt = date_i18n('Y-m-d', $eventDate);
					if ($show_event == 1) {
						$en_tm = date_i18n("G:i", $eventEndDate);
					} else {
						$en_tm = date_i18n("G:i", $eventDate);
					}
					$dt_tm = strtotime($st_dt . ' ' . $en_tm);
					if ($month != '') {
						if (($dt_tm > $previous_month_end) && ($dt_tm < $next_month_start)) {
							$event_add[$dt_tm + intval($sinc) + intval($inc)] = get_the_ID();
							$sinc++;
						}
					} else {
						if ($status == "future") {
							if ($dt_tm >= date_i18n('U')) {
								$event_add[$dt_tm + intval($sinc) + intval($inc)] = get_the_ID();
								$sinc++;
							}
						} else {
							if ($dt_tm <= date_i18n('U')) {
								$event_add[$dt_tm + intval($sinc) + intval($inc)] = get_the_ID();
								$sinc++;
							}
						}
					}
					if ($days_extra < 1) {
						$fr_repeat++;
					} else {
						$fr_repeat = 1000000;
					}
				}
			endwhile;
		endif;
		wp_reset_postdata();
		return $event_add;
	}
}
//Get all Sidebars
if (!function_exists('imic_get_all_sidebars')) {
	function imic_get_all_sidebars()
	{
		$all_sidebars = array();
		global $wp_registered_sidebars;
		$all_sidebars = array('' => '');
		foreach ($wp_registered_sidebars as $sidebar) {
			$all_sidebars[$sidebar['id']] = $sidebar['name'];
		}
		return $all_sidebars;
	}
}
//Meta Box for Sidebar on all Posts/Page
if (!function_exists('imic_register_meta_box')) {
	add_action('admin_init', 'imic_register_meta_box');
	function imic_register_meta_box()
	{
		// Check if plugin is activated or included in theme
		if (!class_exists('RW_Meta_Box'))
			return;
		$prefix = 'imic_';
		$meta_box = array(
			'id' => 'template-sidebar1',
			'title' => esc_html__("Select Sidebar", 'vestige'),
			'pages' => array('post', 'page', 'event', 'team', 'product', 'exhibition', 'artwork', 'gallery'),
			'context' => 'normal',
			'fields' => array(
				array(
					'name' => 'Select Sidebar from list',
					'id' => $prefix . 'select_sidebar_from_list',
					'desc' => esc_html__("Select Sidebar from list, if using page builder then please add sidebar from element only.", 'vestige'),
					'type' => 'select',
					'options' => imic_get_all_sidebars(),
				),
				array(
					'name' => 'Show no sidebar',
					'id' => $prefix . 'strict_no_sidebar',
					'desc' => esc_html__("This will not dishonour page sidebar chosen at Theme Options as well.", 'vestige'),
					'type' => 'checkbox',
					'default' => 0
				),
				array(
					'name' => 'Select Sidebar Position',
					'id' => $prefix . 'select_sidebar_position',
					'desc' => esc_html__("Select Sidebar Postion", 'vestige'),
					'type' => 'radio',
					'options' => array(
						'2' => 'Left',
						'1' => 'Right'
					),
					'default' => '1'
				),
				array(
					'name' => esc_html__('Columns Layout', 'vestige'),
					'id' => $prefix . 'sidebar_columns_layout',
					'desc' => esc_html__("Select Columns Layout .", 'vestige'),
					'type' => 'select',
					'options' => array(
						'3' => esc_html__('One Fourth', 'vestige'),
						'4' => esc_html__('One Third', 'vestige'),
						'6' => esc_html__('Half', 'vestige'),
					),
					'std' => 4,
				),
			)
		);
		new RW_Meta_Box($meta_box);
	}
}
/** -------------------------------------------------------------------------------------
 * Gallery Flexslider
 * @param ID of current Post.
 * @return Div with flexslider parameter.
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_gallery_flexslider')) {
	function imic_gallery_flexslider($id)
	{
		$speed = (get_post_meta(get_the_ID(), 'imic_gallery_slider_speed', true) != '') ? get_post_meta(get_the_ID(), 'imic_gallery_slider_speed', true) : 5000;
		$pagination = get_post_meta(get_the_ID(), 'imic_gallery_slider_pagination', true);
		$auto_slide = get_post_meta(get_the_ID(), 'imic_gallery_slider_auto_slide', true);
		$direction = get_post_meta(get_the_ID(), 'imic_gallery_slider_direction_arrows', true);
		$effect = get_post_meta(get_the_ID(), 'imic_gallery_slider_effects', true);
		$pagination = !empty($pagination) ? $pagination : 'yes';
		$auto_slide = !empty($auto_slide) ? $auto_slide : 'yes';
		$direction = !empty($direction) ? $direction : 'yes';
		$effect = !empty($effect) ? $effect : 'slide';
		return '<div class="flexslider galleryflex" data-autoplay="' . $auto_slide . '" data-pagination="' . $pagination . '" data-arrows="' . $direction . '" data-style="' . $effect . '" data-pause="yes" data-speed=' . $speed . '>';
	}
}
if (!function_exists('imic_social_staff_icon')) {
	function imic_social_staff_icon()
	{
		$output = '';
		$staff_icons = get_post_meta(get_the_ID(), 'imic_social_icon_list', false);
		if (!empty($staff_icons[0]) || get_post_meta(get_the_ID(), 'imic_staff_member_email', true) != '') {
			$output .= '<ul class="social-icons-colored">';
			if (!empty($staff_icons[0])) {
				foreach ($staff_icons[0] as $list => $values) {
					if (!empty($values[1])) {
						$className = preg_replace('/\s+/', '-', strtolower($values[0]));
						$className = 'fa fa-' . $className;
						$output .= '<li class="' . $values[0] . '"><a href="' . $values[1] . '" target ="_blank"><i class="' . $className . '"></i></a></li>';
					}
				}
			}
			if (get_post_meta(get_the_ID(), 'imic_staff_member_email', true) != '') {
				$output .= '<li class="email"><a href="mailto:' . get_post_meta(get_the_ID(), 'imic_staff_member_email', true) . '"><i class="fa fa-envelope"></i></a></li>';
			}
			$output .= '</ul>';
		}
		return $output;
	}
}
/**
 * IMIC SHARE BUTTONS
 */
if (!function_exists('imic_share_buttons')) {
	function imic_share_buttons()
	{
		$posttitle = get_the_title();
		$postpermalink = get_permalink();
		$posttype = get_post_type(get_the_ID());
		if ($posttype == 'event') {
			$date = get_query_var('event_date');
			if (empty($date)) {
				$date = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
			}
			$date = strtotime($date);
			$date = date_i18n('Y-m-d', $date);
			$postpermalink = esc_url(imic_query_arg($date, get_the_ID()));
		}
		$postexcerpt = get_the_excerpt();
		$imic_options = get_option('imic_options');
		$facebook_share_alt = (isset($imic_options['facebook_share_alt'])) ? $imic_options['facebook_share_alt'] : '';
		$twitter_share_alt = (isset($imic_options['twitter_share_alt'])) ? $imic_options['twitter_share_alt'] : '';
		$google_share_alt = (isset($imic_options['google_share_alt'])) ? $imic_options['google_share_alt'] : '';
		$tumblr_share_alt = (isset($imic_options['tumblr_share_alt'])) ? $imic_options['tumblr_share_alt'] : '';
		$pinterest_share_alt = (isset($imic_options['pinterest_share_alt'])) ? $imic_options['pinterest_share_alt'] : '';
		$reddit_share_alt = (isset($imic_options['reddit_share_alt'])) ? $imic_options['reddit_share_alt'] : '';
		$linkedin_share_alt = (isset($imic_options['linkedin_share_alt'])) ? $imic_options['linkedin_share_alt'] : '';
		$email_share_alt = (isset($imic_options['email_share_alt'])) ? $imic_options['email_share_alt'] : '';
		$vk_share_alt = (isset($imic_options['vk_share_alt'])) ? $imic_options['vk_share_alt'] : '';

		echo '<div class="social-share-bar">';
		if (isset($imic_options['sharing_style']) && $imic_options['sharing_style'] == '0') {
			if ($imic_options['sharing_color'] == '0') {
				echo '<h4><i class="fa fa-share-alt"></i> ' . esc_html__('Share', 'vestige') . '</h4>';
				echo '<ul class="social-icons-colored share-buttons-bc">';
			} elseif (isset($imic_options['sharing_color']) && $imic_options['sharing_color'] == '1') {
				echo '<h4><i class="fa fa-share-alt"></i> ' . esc_html__('Share', 'vestige') . '</h4>';
				echo '<ul class="social-icons-colored share-buttons-tc">';
			} elseif (isset($imic_options['sharing_color']) && $imic_options['sharing_color'] == '2') {
				echo '<h4><i class="fa fa-share-alt"></i> ' . esc_html__('Share', 'vestige') . '</h4>';
				echo '<ul class="social-icons-colored share-buttons-gs">';
			}
		} elseif (isset($imic_options['sharing_style']) && $imic_options['sharing_style'] == '1') {
			if (isset($imic_options['sharing_color']) && $imic_options['sharing_color'] == '0') {
				echo '<h4><i class="fa fa-share-alt"></i> ' . esc_html__('Share', 'vestige') . '</h4>';
				echo '<ul class="social-icons-colored share-buttons-bc share-buttons-squared">';
			} elseif (isset($imic_options['sharing_color']) && $imic_options['sharing_color'] == '1') {
				echo '<h4><i class="fa fa-share-alt"></i> ' . esc_html__('Share', 'vestige') . '</h4>';
				echo '<ul class="social-icons-colored share-buttons-tc share-buttons-squared">';
			} elseif (isset($imic_options['sharing_color']) && $imic_options['sharing_color'] == '2') {
				echo '<h4><i class="fa fa-share-alt"></i> ' . esc_html__('Share', 'vestige') . '</h4>';
				echo '<ul class="social-icons-colored share-buttons-gs share-buttons-squared">';
			}
		};
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['1'] == 1) {
			echo '<li class="facebook-share"><a href="https://www.facebook.com/sharer/sharer.php?u=' . $postpermalink . '&amp;t=' . $posttitle . '" target="_blank" title="' . $facebook_share_alt . '"><i class="fa fa-facebook"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['2'] == 1) {
			echo '<li class="twitter-share"><a href="https://twitter.com/intent/tweet?source=' . $postpermalink . '&amp;text=' . $posttitle . ':' . $postpermalink . '" target="_blank" title="' . $twitter_share_alt . '"><i class="fa fa-twitter"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['3'] == 1) {
			echo '<li class="google-share"><a href="https://plus.google.com/share?url=' . $postpermalink . '" target="_blank" title="' . $google_share_alt . '"><i class="fa fa-google-plus"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['4'] == 1) {
			echo '<li class="tumblr-share"><a href="http://www.tumblr.com/share?v=3&amp;u=' . $postpermalink . '&amp;t=' . $posttitle . '&amp;s=" target="_blank" title="' . $tumblr_share_alt . '"><i class="fa fa-tumblr"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['5'] == 1) {
			echo '<li class="pinterest-share"><a href="http://pinterest.com/pin/create/button/?url=' . $postpermalink . '&amp;description=' . $postexcerpt . '" target="_blank" title="' . $pinterest_share_alt . '"><i class="fa fa-pinterest"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['6'] == 1) {
			echo '<li class="reddit-share"><a href="http://www.reddit.com/submit?url=' . $postpermalink . '&amp;title=' . $posttitle . '" target="_blank" title="' . $reddit_share_alt . '"><i class="fa fa-reddit"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['7'] == 1) {
			echo '<li class="linkedin-share"><a href="http://www.linkedin.com/shareArticle?mini=true&url=' . $postpermalink . '&amp;title=' . $posttitle . '&amp;summary=' . $postexcerpt . '&amp;source=' . $postpermalink . '" target="_blank" title="' . $linkedin_share_alt . '"><i class="fa fa-linkedin"></i></a></li>';
		}
		if (isset($imic_options['share_icon']) && $imic_options['share_icon']['8'] == 1) {
			echo '<li class="email-share"><a href="mailto:?subject=' . $posttitle . '&amp;body=' . $postexcerpt . ':' . $postpermalink . '" target="_blank" title="' . $email_share_alt . '"><i class="fa fa-envelope"></i></a></li>';
		}
		if (isset($imic_options['share_icon']['9']) && $imic_options['share_icon']['9'] == 1) {
			echo '<li class="vk-share"><a href="http://vk.com/share.php?url=' . $postpermalink . '" target="_blank" title="' . $vk_share_alt . '"><i class="fa fa-vk"></i></a></li>';
		}
		echo '</ul>
            </div>';
	}
}
/*======================
Change Excerpt Length*/
if (!function_exists('imic_custom_excerpt_length')) {
	function imic_custom_excerpt_length($length)
	{
		return 520;
	}
	add_filter('excerpt_length', 'imic_custom_excerpt_length', 999);
}
//Contact Event Manager
if (!function_exists('imic_contact_event_manager')) {
	function imic_contact_event_manager()
	{
		$event_id = $_POST['itemnumber'];
		$post_type = get_post_type($event_id);
		$event_date = $_POST['event_date'];
		$exhibition_time = (isset($_POST['exhibition_time'])) ? $_POST['exhibition_time'] : '';
		$cost = (isset($_POST['costs']) && $_POST['costs'] != 0) ? $_POST['costs'] : esc_html__('Free', 'vestige');
		$name = $_POST['name'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$notes = $_POST['notes'];
		$exhibition_date = (isset($_POST['exhibition_date'])) ? $_POST['exhibition_date'] : '';
		$ticket_details = (isset($_POST['ticket_details'])) ? $_POST['ticket_details'] : array();
		$event_title = get_the_title($event_id);
		$registration_number = get_post_meta($event_id, 'imic_event_registration_number', true);
		$registration_number = ($registration_number == '') ? 0 : $registration_number + 1;
		$reg_post_type = ($post_type == 'event') ? 'event_registrants' : 'exhibition_reg';
		$registrant = array(
			'post_title'    => $name . ' ' . $lname,
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type' => $reg_post_type
		);

		// Insert the registrant into the database
		$registrant_id = wp_insert_post($registrant);
		if ($post_type == 'event') {
			wp_set_object_terms($registrant_id, get_the_title($event_id), 'registrant-event');
		} elseif ($post_type == 'exhibition') {
			wp_set_object_terms($registrant_id, get_the_title($event_id), 'registrant-exhibition');
		}
		$ticket_registered = '';
		$tickets_type_event = get_post_meta($event_id, 'tickets_type', true);
		if (!empty($ticket_details)) {
			$ticket_info = array();
			foreach ($ticket_details as $key => $value) {
				$ticket_info[$key] = $value;
				if (!empty($tickets_type_event)) {
					$tickets_type_event = get_post_meta($event_id, 'tickets_type', true);
					$tickets_type = array();
					foreach ($tickets_type_event as $tickets) {
						if ($tickets[0] != $key) {
							$tickets_type[]  = array($tickets[0], $tickets[1], $tickets[2], $tickets[3]);
						} else {
							$available = $tickets[1];
							$booked_tickets = $tickets[2];
							$new_booked_updated = $booked_tickets + $value;
							$new_available_updated = $available - $value;
							$tickets_type[]  = array($tickets[0], $tickets[1], $new_booked_updated, $tickets[3]);
							$ticket_registered .= $key . ': ' . $value;
						}
					}
					delete_post_meta($event_id, 'tickets_type');
					update_post_meta($event_id, 'tickets_type', $tickets_type);
				}
			}
			update_post_meta($registrant_id, 'imic_registrant_ticket_type', $ticket_info);
		}
		update_post_meta($registrant_id, 'imic_registrant_email', esc_attr($email));
		update_post_meta($registrant_id, 'imic_registrant_phone', esc_attr($phone));
		update_post_meta($registrant_id, 'imic_registrant_address', esc_attr($address));
		update_post_meta($registrant_id, 'imic_registrant_additional_notes', esc_attr($notes));
		update_post_meta($registrant_id, 'imic_registrant_event_date', $exhibition_time);
		update_post_meta($registrant_id, 'imic_registrant_registration_number', esc_attr($event_id . '-' . $registration_number));
		update_post_meta($event_id, 'imic_event_registration_number', $registration_number);
		if ($post_type == "exhibition") {
			update_post_meta($registrant_id, 'imic_registrant_exhibition_time', $exhibition_time);
			update_post_meta($registrant_id, 'imic_registrant_event_date', $exhibition_date);
		}
		$event_manager_email = get_post_meta($event_id, 'imic_event_manager_email', true);
		$manager_email = esc_attr($event_manager_email);
		$manager_email = ($manager_email != '') ? $manager_email : get_option('admin_email');
		if ($post_type == "event") {
			$e_subject = esc_html__('Registration for Event', 'vestige');
		} else {
			$e_subject = esc_html__('Registration for Exhibition', 'vestige');
		}
		$result['regid'] = esc_attr($event_id . '-' . $registration_number);
		$result['reguser'] = esc_attr($name) . '<br/>' . esc_attr($lname);
		$result['cost'] = esc_attr($cost);
		$result['registrant'] = esc_attr($registrant_id);
		$result = json_encode($result);
		echo '' . $result;
		$e_body = $name . ' ' . esc_html__("has been registered for:", "vestige") . ' ' . $event_title . PHP_EOL . PHP_EOL;
		$body = esc_html__("Your information has been delivered to Manager for:", "vestige") . ' ' . $event_title . PHP_EOL . PHP_EOL;
		$e_content = '';
		$e_content .= esc_html__("Registration Number:", "vestige") . ' ' . $event_id . '-' . $registration_number . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Date:", "vestige") . ' ' . $event_date . PHP_EOL . PHP_EOL;
		if ($post_type != "event") {
			$e_content .= esc_html__("Time:", "vestige") . ' ' . $exhibition_time . PHP_EOL . PHP_EOL;
		}
		$e_content .= esc_html__("Name:", "vestige") . ' ' . esc_attr($name) . ' ' . esc_attr($lname) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Email:", "vestige") . ' ' . esc_attr($email) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Phone:", "vestige") . ' ' . esc_attr($phone) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Notes:", "vestige") . ' ' . esc_attr($notes) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Address:", "vestige") . ' ' . esc_attr($address) . PHP_EOL . PHP_EOL;
		$e_content .= esc_html__("Tickets:", "vestige") . ' ' . esc_attr($ticket_registered) . PHP_EOL . PHP_EOL;
		$e_reply = esc_html__("You can contact ", "vestige") . " " . esc_attr($name) . " " . esc_html__("via email", "vestige") . ', ' . esc_attr($email);
		$reply = esc_html__("You can contact manager via email", "vestige") . ', ' . $manager_email;
		$msg = wordwrap($e_body . $e_content . $e_reply, 70);
		$user_msg = wordwrap($body . $e_content . $reply, 70);
		$headers = "From: $email" . PHP_EOL;
		$headers .= "Reply-To: $email" . PHP_EOL;
		$headers .= "MIME-Version: 1.0" . PHP_EOL;
		$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
		$user_headers = "From: $manager_email" . PHP_EOL;
		$user_headers .= "Reply-To: $email" . PHP_EOL;
		$user_headers .= "MIME-Version: 1.0" . PHP_EOL;
		$user_headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
		$user_headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
		if (mail($manager_email, $e_subject, $msg, $headers) && mail($email, $e_subject, $user_msg, $user_headers)) {
			if ($post_type == "event") {
				//echo "<p>".esc_html__("An Email has been send to you with Event Registration Number", "vestige")."</p>";
			} else {
				//echo "<p>".esc_html__("An Email has been send to you with Exhibition Registration Number", "vestige")."</p>";
			}
		} else {
			echo '<div class="alert alert-error">ERROR!</div>';
		}
		die();
	}
	add_action('wp_ajax_nopriv_imic_contact_event_manager', 'imic_contact_event_manager');
	add_action('wp_ajax_imic_contact_event_manager', 'imic_contact_event_manager');
}
/* GET TEMPLATE URL
   ================================================*/
if (!function_exists('imic_get_template_url')) {
	function imic_get_template_url($TEMPLATE_NAME)
	{
		$url;
		$pages = get_pages(array(
			'meta_key' => '_wp_page_template',
			'meta_value' => $TEMPLATE_NAME,
			'sort_order' => 'desc',
		));
		if (!empty($pages)) {
			$url = get_permalink($pages[0]->ID);
			return $url;
		}
	}
}
if (!function_exists("imic_exhibition_schedule")) {
	function imic_exhibition_schedule($terms = '', $terms_tag = '', $calendar = '')
	{
		$exhibition_date_result = array();
		if ($terms != '') {
			$terms = explode(',', $terms);
			$exhibition_args = array(
				'post_type' => 'exhibition', 'tax_query' => array(array(
					'taxonomy' => 'exhibition-category',
					'field' => 'slug',
					'terms' => $terms,
					'operator' => 'IN'
				)),
				'posts_per_page' => -1, 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'compare' => '>=', 'value' => date_i18n('Y-m-d')))
			);
		} elseif ($terms_tag != '') {
			$exhibition_args = array(
				'post_type' => 'exhibition', 'tax_query' => array(array(
					'taxonomy' => 'exhibition-tag',
					'field' => 'slug',
					'terms' => $terms_tag,
					'operator' => 'IN'
				)),
				'posts_per_page' => -1, 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'compare' => '>=', 'value' => date_i18n('Y-m-d')))
			);
		} else {
			$exhibition_args = array('post_type' => 'exhibition', 'posts_per_page' => -1, 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'compare' => '>=', 'value' => date_i18n('Y-m-d'))));
		}
		$exhibition_listing = new WP_Query($exhibition_args);
		if ($exhibition_listing->have_posts()) :
			while ($exhibition_listing->have_posts()) :
				$start_index_inc = 1;
				$exhibition_listing->the_post();
				$exhibition_start_date = get_post_meta(get_the_ID(), 'imic_exhibition_start_dt', true);
				$exhibition_end_date = get_post_meta(get_the_ID(), 'imic_exhibition_end_dt', true);
				$difference_date = imic_dateDiff($exhibition_start_date, $exhibition_end_date);
				$exhibition_timing = get_post_meta(get_the_ID(), 'feat_data', true);
				if (!empty($exhibition_timing)) {
					$exhibition_timings = $exhibition_timing;
				}
				if ($difference_date >= 0) {
					$start_date = 0;
					while ($start_date <= $difference_date) {
						$exhibition_date = date_i18n('Y-m-d', strtotime($exhibition_start_date . ' + ' . $start_date . ' days'));
						if (!empty($exhibition_timing)) {
							$start_index_inc = 1;
							foreach ($exhibition_timings as $key => $value) {
								if ($key != "00") {
									$exhibition_start_time = date_i18n("G:i", $key);
									$result_exhibition_start = strtotime($exhibition_date . ' ' . $exhibition_start_time);
									if ($value != "00") {
										$result_exhibition_end = strtotime($exhibition_date . ' ' . date_i18n('G:i', $value));
									} else {
										$result_exhibition_end = "00";
									}
									if ($result_exhibition_end > date_i18n('U') || $calendar != '') {
										if (array_key_exists($result_exhibition_start, $exhibition_date_result) && !empty($exhibition_date_result)) {
											$result_exhibition_start_unique = wp_rand(10, 1000000000000000000000000000000000);
											$start_index_inc++;
										} else {
											$result_exhibition_start_unique = wp_rand(10, 1000000000000000000000000000000000);
										}
										$exhibition_date_result[$result_exhibition_start_unique] = get_the_ID() . '|' . $result_exhibition_start . '|' . $result_exhibition_end;
									}
								} else {
									if (array_key_exists($result_exhibition_start, $exhibition_date_result) && !empty($exhibition_date_result)) {
										$result_exhibition_start_unique = wp_rand(10, 1000000000000000000000000000000000);
										$start_index_inc++;
									} else {
										$result_exhibition_start_unique = wp_rand(10, 1000000000000000000000000000000000);
									}
									$result_exhibition_start = strtotime($exhibition_date . ' 23:59');
									$exhibition_date_result[$result_exhibition_start_unique] = get_the_ID() . '|' . $result_exhibition_start . '|00';
								}
							}
						} else {
							$result_exhibition_start = strtotime($exhibition_date . ' 23:59');
							$allday = '1';
							if ($result_exhibition_start > date_i18n('U') || $calendar != '') {
								if (array_key_exists($result_exhibition_start, $exhibition_date_result) && !empty($exhibition_date_result)) {
									$result_exhibition_start_unique = wp_rand(10, 1000000000000000000000000000000000);
									$start_index_inc++;
								} else {
									$result_exhibition_start_unique = wp_rand(10, 1000000000000000000000000000000000);
								}
								$exhibition_date_result[$result_exhibition_start_unique] = get_the_ID() . '|' . $result_exhibition_start . '|' . $result_exhibition_start . '|' . $allday;
							}
						}
						$start_date++;
					}
				}
			endwhile;
		endif;
		wp_reset_postdata();
		return $exhibition_date_result;
	}
}
if (!function_exists("imic_exhibition_schedule_past")) {
	function imic_exhibition_schedule_past($terms = '', $terms_tag = '')
	{
		$exhibition_date_result = array();
		if ($terms != '') {
			$exhibition_args = array(
				'post_type' => 'exhibition', 'tax_query' => array(array(
					'taxonomy' => 'exhibition-category',
					'field' => 'slug',
					'terms' => $terms,
					'operator' => 'IN'
				)),
				'posts_per_page' => -1
			);
		} elseif ($terms_tag != '') {
			$exhibition_args = array(
				'post_type' => 'exhibition', 'tax_query' => array(array(
					'taxonomy' => 'exhibition-tag',
					'field' => 'slug',
					'terms' => $terms_tag,
					'operator' => 'IN'
				)),
				'posts_per_page' => -1
			);
		} else {
			$exhibition_args = array('post_type' => 'exhibition', 'posts_per_page' => -1);
		}
		$exhibition_listing = new WP_Query($exhibition_args);
		if ($exhibition_listing->have_posts()) :
			while ($exhibition_listing->have_posts()) :
				$exhibition_listing->the_post();
				$exhibition_start_date = get_post_meta(get_the_ID(), 'imic_exhibition_start_dt', true);
				$exhibition_end_date = get_post_meta(get_the_ID(), 'imic_exhibition_end_dt', true);
				$difference_date = imic_dateDiff($exhibition_start_date, $exhibition_end_date);
				$exhibition_timing = get_post_meta(get_the_ID(), 'feat_data', true);
				if (!empty($exhibition_timing)) {
					$exhibition_timings = $exhibition_timing;
				}
				if ($difference_date >= 0) {
					$start_date = 0;
					while ($start_date <= $difference_date) {
						$exhibition_date = date_i18n('Y-m-d', strtotime($exhibition_start_date . ' + ' . $start_date . ' days'));
						if (!empty($exhibition_timing)) {
							$start_index_inc = 1;
							foreach ($exhibition_timings as $key => $value) {
								if ($key != "00") {
									$exhibition_start_time = date_i18n("G:i", $key);
									$result_exhibition_start = strtotime($exhibition_date . ' ' . $exhibition_start_time);
									if ($value != "00") {
										$result_exhibition_end = strtotime($exhibition_date . ' ' . date_i18n('G:i', $value));
									} else {
										$result_exhibition_end = "00";
									}
									if ($result_exhibition_end < date_i18n('U')) {
										if (array_key_exists($result_exhibition_start, $exhibition_date_result) && !empty($exhibition_date_result)) {
											$result_exhibition_start_unique = $result_exhibition_start + $start_index_inc;
											$start_index_inc++;
										} else {
											$result_exhibition_start_unique = $result_exhibition_start;
										}
										$exhibition_date_result[$result_exhibition_start_unique] = get_the_ID() . '|' . $result_exhibition_start . '|' . $result_exhibition_end;
									}
								} else {
									if (array_key_exists($result_exhibition_start, $exhibition_date_result) && !empty($exhibition_date_result)) {
										$result_exhibition_start_unique = $result_exhibition_start + $start_index_inc;
										$start_index_inc++;
									} else {
										$result_exhibition_start_unique = $result_exhibition_start;
									}
									$result_exhibition_start = strtotime($exhibition_date . ' 23:59');
									$exhibition_date_result[$result_exhibition_start_unique] = get_the_ID() . '|' . $result_exhibition_start . '|00';
								}
							}
						} else {
							$result_exhibition_start = strtotime($exhibition_date . ' 23:59');
							if ($result_exhibition_start < date_i18n('U')) {
								if (array_key_exists($result_exhibition_start, $exhibition_date_result) && !empty($exhibition_date_result)) {
									$result_exhibition_start_unique = $result_exhibition_start + $start_index_inc;
									$start_index_inc++;
								} else {
									$result_exhibition_start_unique = $result_exhibition_start;
								}
								$exhibition_date_result[$result_exhibition_start_unique] = get_the_ID() . '|' . $result_exhibition_start . '|00';
							}
						}
						$start_date++;
					}
				}
			endwhile;
		endif;
		wp_reset_postdata();
		return $exhibition_date_result;
	}
}
//Get Attachment details
if (!function_exists('imic_wp_get_attachment')) {
	function imic_wp_get_attachment($attachment_id)
	{
		$attachment = get_post($attachment_id);
		if (!empty($attachment)) {
			return array(
				'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => get_permalink($attachment->ID),
				'src' => $attachment->guid,
				'title' => $attachment->post_title,
				'url' => $attachment->meta_link
			);
		}
	}
}
if (!function_exists('imic_get_event_datetime_format')) {
	function imic_get_event_date_format($id, $key)
	{
		$print_date = '';
		$imic_options = get_option('imic_options');
		$date_format = (isset($imic_options['event_dt_opt'])) ? $imic_options['event_dt_opt'] : 0;
		$event_start_date = get_post_meta($id, 'imic_event_start_dt', true);
		$event_end_date = get_post_meta($id, 'imic_event_end_dt', true);
		$days_difference = imic_dateDiff($event_start_date, $event_end_date);
		$event_start_date = strtotime($event_start_date);
		$event_end_date = strtotime($event_end_date);
		switch ($date_format) {
			case 0:
				$print_date .= date_i18n(get_option('date_format'), $key);
				break;
			case 1:
				if ($days_difference > 0) {
					$print_date .= date_i18n(get_option('date_format'), $event_end_date);
				} else {
					$print_date .= date_i18n(get_option('date_format'), $key);
				}
				break;
			case 2:
				if ($days_difference > 0) {
					$print_date .= date_i18n(get_option('date_format'), $event_start_date);
					$print_date .= ' - ' . date_i18n(get_option('date_format'), $event_end_date);
				} else {
					$print_date .= date_i18n(get_option('date_format'), $key);
				}
				break;
		}
		return $print_date;
	}
}
if (!function_exists('imic_get_event_time_format')) {
	function imic_get_event_time_format($id, $key, $layout = "list")
	{
		$print_time = '';
		$imic_options = get_option('imic_options');
		$date_format = (isset($imic_options['event_tm_opt'])) ? $imic_options['event_tm_opt'] : 0;
		$event_start_date = get_post_meta($id, 'imic_event_start_dt', true);
		$event_end_date = get_post_meta($id, 'imic_event_end_dt', true);
		$event_all_day = get_post_meta($id, 'imic_event_all_day', true);
		$days_difference = imic_dateDiff($event_start_date, $event_end_date);
		$event_start_date = strtotime($event_start_date);
		$event_end_date = strtotime($event_end_date);
		$event_day = ($layout == "grid") ? date_i18n('l', $key) . ', ' : '';
		if ($event_all_day != '1') {
			switch ($date_format) {
				case 0:
					$print_time .= $event_day . date_i18n(get_option('time_format'), $event_start_date);
					break;
				case 1:
					if ($event_end_date != '') {
						$print_time .= $event_day . date_i18n(get_option('time_format'), $event_end_date);
					} else {
						$print_time .= $event_day . date_i18n(get_option('time_format'), $event_start_date);
					}
					break;
				case 2:
					if ($event_end_date != '') {
						$print_time .= $event_day . date_i18n(get_option('time_format'), $event_start_date);
						$print_time .= ' - ' . date_i18n(get_option('time_format'), $event_end_date);
					} else {
						$print_time .= $event_day . date_i18n(get_option('time_format'), $event_start_date);
					}
					break;
			}
		}
		return $print_time;
	}
}
if (!function_exists('imic_get_post_content')) {
	function imic_get_post_content($update_id, $filter = '', $limit = '25')
	{
		$post_id = get_post($update_id);
		$content = $post_id->post_content;
		if ($filter == '1') {
			$excerpt = apply_filters('the_content', $content);
		} else {
			$excerpt = wp_trim_words($content, $limit);
		}
		return $excerpt;
	}
}
if (!function_exists('imic_validate_payment') && !class_exists('Vestige_Core_Features')) {
	function imic_validate_payment($tx)
	{ }
}
/**
 * IMIC SIDEBAR POSITION
 */
if (!function_exists('imic_sidebar_position_module')) {
	function imic_sidebar_position_module()
	{
		$sidebar_position = get_post_meta(get_the_ID(), 'imic_select_sidebar_position', true);
		if (is_home()) {
			$id = get_option('page_for_posts');
			$sidebar_position = get_post_meta($id, 'imic_select_sidebar_position', true);
		}
		if ($sidebar_position == 2) {
			echo ' <style type="text/css">#content-col, #sidebar-col{float:right;}</style>';
		} elseif ($sidebar_position == 1) {
			echo ' <style type="text/css">#content-col, #sidebar-col{float:left;}</style>';
		}
	}
}

/**
 * IMIC SEARCH BUTTON
 */
if (!function_exists('imic_search_button_header')) {
	function imic_search_button_header()
	{
		$imic_options = get_option('imic_options');

		echo '<div class="search-module">
                	<a href="#" class="search-module-trigger"><i class="fa fa-search"></i></a>
                    <div class="search-module-opened">
                    	 <form method="get" id="searchform" action="' . home_url('/') . '">
                        	<div class="input-group input-group-sm">
                        		<input type="text" name="s" id="s" class="form-control input-sm">
                            	<span class="input-group-btn"><button type="submit" class="btn btn-lg btn-primary"><i class="fa fa-search"></i></button></span>
                       		</div>
                        </form>
                    </div>
                </div>';
	}
}
/**
 * IMIC CART BUTTON
 */

if (!function_exists('imic_cart_button_header')) {
	function imic_cart_button_header()
	{
		if (class_exists('Woocommerce')) :
			$wcurrency = get_woocommerce_currency_symbol();
			?>
			<div class="cart-module header-equaler">
				<div>
					<div>
						<a href="#" class="cart-module-trigger" id="cart-module-trigger"><i class="fa fa-shopping-cart"></i><span class="cart-tquant">

								<span class="cart-contents">
								</span>
							</span></a>
						<div class="cart-module-opened">
							<div class="cart-module-items">

								<div class="header-quickcart"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif;
}
}

$default_attribs = array('data-toggle' => array(), 'data-skin' => array(), 'data-layout' => array(), 'name' => array(), 'action' => array(), 'method' => array(), 'type' => array(), 'placeholder' => array(), 'data-padding' => array(), 'data-margin' => array(), 'data-autoplay-timeout' => array(), 'data-loop' => array(), 'data-rtl' => array(), 'data-auto-height' => array(), 'data-displayinput' => array(), 'data-readonly' => array(), 'value' => array(), 'data-fgcolor' => array(), 'data-bgcolor' => array(), 'data-thickness' => array(), 'data-linecap' => array(), 'data-option-value' => array(), 'data-style' => array(), 'data-pause' => array(), 'data-speed' => array(), 'data-option-key' => array(), 'data-sort-id' => array(), 'href' => array(), 'rel' => array(), 'data-appear-progress-animation' => array(), 'data-appear-animation-delay' => array(), 'target' => array('_blank', '_self', '_top'), 'data-items-mobile' => array(), 'data-items-tablet' => array(), 'data-items-desktop-small' => array(), 'data-items-desktop' => array(), 'data-single-item' => array(), 'data-arrows' => array(), 'data-pagination' => array(), 'data-autoplay' => array(), 'data-columns' => array(), 'data-columns-tab' => array(), 'data-columns-mobile' => array(), 'width' => array(), 'data-srcset' => array(), 'height' => array(), 'src' => array(), 'id' => array(), 'class' => array(), 'title' => array(), 'style' => array(), 'alt' => array(), 'data' => array(), 'data-mce-id' => array(), 'data-mce-style' => array(), 'data-mce-bogus' => array());

$vestige_allowed_tags = array(
	'div'           => $default_attribs,
	'span'          => $default_attribs,
	'small'          => $default_attribs,
	'p'             => $default_attribs,
	'a'             => $default_attribs,
	'u'             => $default_attribs,
	'i'             => $default_attribs,
	'q'             => $default_attribs,
	'b'             => $default_attribs,
	'ul'            => $default_attribs,
	'ol'            => $default_attribs,
	'li'            => $default_attribs,
	'br'            => $default_attribs,
	'hr'            => $default_attribs,
	'strong'        => $default_attribs,
	'blockquote'    => $default_attribs,
	'del'           => $default_attribs,
	'strike'        => $default_attribs,
	'em'            => $default_attribs,
	'code'          => $default_attribs,
	'h1'            => $default_attribs,
	'h2'            => $default_attribs,
	'h3'            => $default_attribs,
	'h4'            => $default_attribs,
	'h5'            => $default_attribs,
	'h6'            => $default_attribs,
	'cite'          => $default_attribs,
	'img'           => $default_attribs,
	'section'       => $default_attribs,
	'iframe'        => $default_attribs,
	'input'         => $default_attribs,
	'label'         => $default_attribs,
	'canvas'        => $default_attribs,
	'form'        	=> $default_attribs,
	'sub'        	=> $default_attribs,
	'sup'        	=> $default_attribs,
);
?>