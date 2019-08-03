<!DOCTYPE html>
<!--// OPEN HTML //-->
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php
	$options = get_option('imic_options');
	global $vestige_allowed_tags;
	/** Theme layout design * */
	$bodyClass = (isset($options['site_layout']) && $options['site_layout'] == 'boxed') ? ' boxed' : '';
	$style = '';
	if (isset($options['site_layout']) && $options['site_layout'] == 'boxed') {
		if (!empty($options['upload-repeatable-bg-image']['id'])) {
			$style = ' style="background-image:url(' . $options['upload-repeatable-bg-image']['url'] . '); background-repeat:repeat; background-size:auto;"';
		} else if (!empty($options['full-screen-bg-image']['id'])) {
			$style = ' style="background-image:url(' . $options['full-screen-bg-image']['url'] . '); background-repeat: no-repeat; background-size:cover;"';
		} else if (!empty($options['repeatable-bg-image'])) {
			$style = ' style="background-image:url(' . get_template_directory_uri() . '/assets/images/patterns/' . $options['repeatable-bg-image'] . '); background-repeat:repeat; background-size:auto;"';
		}
	}
	?>
	<!--// SITE META //-->
	<meta charset="<?php bloginfo('charset'); ?>" />
	<!-- Mobile Specific Metas
    ================================================== -->
	<?php if (isset($options['switch-responsive']) && $options['switch-responsive'] == 1) {
		$switch_zoom_pinch = (isset($options['switch-zoom-pinch'])) ? $options['switch-zoom-pinch'] : ''; ?>
		<?php if ($switch_zoom_pinch == 1) { ?>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php } else { ?>
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
		<?php } ?>
	<?php } ?>
	<!--// PINGBACK & FAVICON //-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if (function_exists('wp_site_icon') && has_site_icon()) {
		echo '<link rel="shortcut icon" href="' . get_site_icon_url() . '" />';
	} else {
		if (isset($options['custom_favicon']) && $options['custom_favicon'] != "") { ?>
			<link rel="shortcut icon" href="<?php echo esc_url($options['custom_favicon']['url']); ?>" /><?php
																									}
																								}
																								if (isset($options['iphone_icon']) && $options['iphone_icon'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($options['iphone_icon']['url']); ?>"><?php
																										}
																										if (isset($options['iphone_icon_retina']) && $options['iphone_icon_retina'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url($options['iphone_icon_retina']['url']); ?>"><?php
																																}
																																if (isset($options['ipad_icon']) && $options['ipad_icon'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url($options['ipad_icon']['url']); ?>"><?php
																													}
																													if (isset($options['ipad_icon_retina']) && $options['ipad_icon_retina'] != "") { ?>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url($options['ipad_icon_retina']['url']); ?>"><?php
																															}
																															$header_style = (isset($options['header_layout'])) ? $options['header_layout'] : 'header-style1';
																															?>
	<?php //  WORDPRESS HEAD HOOK 
	wp_head(); ?>
	<?php
	$space_before_head = (isset($options['space-before-head'])) ? $options['space-before-head'] : '';
	$SpaceBeforeHead = $space_before_head;
	echo '' . $SpaceBeforeHead;
	?>
</head>
<!--// CLOSE HEAD //-->

<body <?php body_class($bodyClass . ' ' . $header_style);
		echo '' . $style;  ?>>
	<?php
	// Page Style Options
	if (is_home()) {
		$id = get_option('page_for_posts');
	} else {
		$id = get_the_ID();
	}
	$content_top_padding = get_post_meta($id, 'imic_content_padding_top', true);
	$content_bottom_padding = get_post_meta($id, 'imic_content_padding_bottom', true);
	$content_width = get_post_meta($id, 'imic_content_width', true);
	$page_header_show = get_post_meta($id, 'imic_page_header_show_hide', true);
	$page_title_show = get_post_meta($id, 'imic_page_title_show_hide', true);
	$page_social_show = get_post_meta($id, 'imic_pages_social_show', true);
	$page_breadcrumb_show = get_post_meta($id, 'imic_pages_breadcrumb_show', true);
	$page_body_bg_color = get_post_meta($id, 'imic_pages_body_bg_color', true);
	$page_body_bg_image = get_post_meta($id, 'imic_pages_body_bg_image', true);
	$page_body_bg_image_src = wp_get_attachment_image_src($page_body_bg_image, 'full', '', array());
	$page_body_bg_size = get_post_meta($id, 'imic_pages_body_bg_wide', true);
	if ($page_body_bg_size == 0) {
		$page_body_bg_size_result = 'auto';
		$page_body_bg_size_attachment = 'scroll';
	} else {
		$page_body_bg_size_result = 'cover';
		$page_body_bg_size_attachment = 'fixed';
	}
	$page_body_bg_repeat = get_post_meta($id, 'imic_pages_body_bg_repeat', true);
	$page_content_bg_color = get_post_meta($id, 'imic_pages_content_bg_color', true);
	$page_content_bg_image = get_post_meta($id, 'imic_pages_content_bg_image', true);
	$page_content_bg_image_src = wp_get_attachment_image_src($page_content_bg_image, 'full', '', array());
	$page_content_bg_size = get_post_meta($id, 'imic_pages_content_bg_wide', true);
	if ($page_content_bg_size == 0) {
		$page_content_bg_size_result = 'auto';
		$page_content_bg_size_attachment = 'scroll';
	} else {
		$page_content_bg_size_result = 'cover';
		$page_content_bg_size_attachment = 'fixed';
	}
	$page_content_bg_repeat = get_post_meta($id, 'imic_pages_content_bg_repeat', true);

	echo '<style type="text/css">';
	if ($page_header_show == 2) {
		echo '.hero-area{display:none;}';
	} else {
		echo '.hero-area{display:block;}';
	}
	if ($page_title_show == 2) {
		echo '.header-style1 .page-header > div > div > span, .header-style2 .page-header > div > div > span, .header-style3 .page-header > div > div > span{display:none;}';
	} else {
		echo '.header-style1 .page-header > div > div > span, .header-style2 .page-header > div > div > span, .header-style3 .page-header > div > div > span{display:inline-block;}';
	}
	if ($page_social_show == 2) {
		echo '.social-share-bar{display:none;}';
	} else {
		echo '.social-share-bar{display:block;}';
	}
	if ($page_breadcrumb_show == 2) {
		echo '.notice-bar{display:none;}';
	} else {
		echo '.notice-bar{display:block;}';
	}
	echo '.content{';
	if ($content_top_padding != '') {
		echo 'padding-top:' . esc_attr($content_top_padding) . 'px;';
	}
	if ($content_bottom_padding != '') {
		echo 'padding-bottom:' . esc_attr($content_bottom_padding) . 'px;';
	}
	echo '}';
	if ($content_width != '') {
		echo '
		.content .container{
			width:' . esc_attr($content_width) . ';
		}';
	}
	echo 'body{';
	if ($page_body_bg_color != '') {
		echo 'background-color:' . esc_attr($page_body_bg_color) . ';';
	}
	if ($page_body_bg_image != '') {
		echo 'background-image:url(' . esc_attr($page_body_bg_image_src[0]) . ')!important;';
	}
	if ($page_body_bg_image != '') {
		echo 'background-size:' . esc_attr($page_body_bg_size_result) . '!important;';
	}
	if ($page_body_bg_image != '') {
		echo 'background-repeat:' . esc_attr($page_body_bg_repeat) . '!important;';
	}
	if ($page_body_bg_image != '') {
		echo 'background-attachment:' . esc_attr($page_body_bg_size_attachment) . '!important;';
	}
	echo '}
		.content{';
	if ($page_content_bg_color != '') {
		echo 'background-color:' . esc_attr($page_content_bg_color) . ';';
	}
	if ($page_content_bg_image != '') {
		echo 'background-image:url(' . esc_attr($page_content_bg_image_src[0]) . ');';
	}
	if ($page_content_bg_image != '') {
		echo 'background-size:' . esc_attr($page_content_bg_size_result) . ';';
	}
	if ($page_content_bg_image != '') {
		echo 'background-repeat:' . esc_attr($page_content_bg_repeat) . ';';
	}
	if ($page_content_bg_image != '') {
		echo 'background-attachment:' . esc_attr($page_content_bg_size_attachment) . ';';
	}
	echo '}';
	echo '</style>';
	?>
	<div class="body">
		<?php $menu_locations = get_nav_menu_locations();
		if (isset($options['enable_topbar']) && $options['enable_topbar'] == 1) {
			$topbar_text = $options['topbar_left']; ?>
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-md-6  col-sm-6">
							<p><?php echo wp_kses($topbar_text, $vestige_allowed_tags); ?></p>
						</div>
						<div class="col-md-6 col-sm-6">
							<ul class="pull-right social-icons-colored">
								<?php
								$socialSites = $options['header_social_links'];
								foreach ($socialSites as $key => $value) {
									$string = substr($key, 3);
									if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
										echo '<li class="' . $string . '"><a href="mailto:' . $value . '"><i class="fa ' . $key . '"></i></a></li>';
									}
									if (filter_var($value, FILTER_VALIDATE_URL)) {
										echo '<li class="' . $string . '"><a href="' . esc_url($value) . '" target="_blank"><i class="fa ' . $key . '"></i></a></li>';
									} elseif ($key == 'fa-skype' && $value != '' && $value != 'Enter Skype ID') {
										echo '<li class="' . $string . '"><a href="skype:' . $value . '?call"><i class="fa ' . $key . '"></i></a></li>';
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<!-- Start Site Header -->
		<div class="site-header-wrapper">
			<header class="site-header">
				<div class="container sp-cont">
					<div class="site-logo">
						<h1>
							<?php
							if (isset($options['logo_upload']) && !empty($options['logo_upload']['url'])) {
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . get_bloginfo('name') . '" class="default-logo"><img src="' . $options['logo_upload']['url'] . '" alt="' . get_bloginfo('name') . '"></a>';
							} else {
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . get_bloginfo('name') . '" class="default-logo theme-blogname">' . get_bloginfo('name') . '</a>';
							}
							?>
							<?php
							$retina_logo_width = (isset($options['retina_logo_width'])) ? $options['retina_logo_width'] : '';
							$retina_logo_height = (isset($options['retina_logo_height'])) ? $options['retina_logo_height'] : '';

							if (isset($options['retina_logo_upload']) && !empty($options['retina_logo_upload']['url'])) {
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $options['retina_logo_upload']['url'] . '" alt="' . get_bloginfo('name') . '" width="' . $retina_logo_width . '" height="' . $retina_logo_height . '"></a>';
							} elseif (isset($options['logo_upload']) && !empty($options['logo_upload']['url'])) {
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . get_bloginfo('name') . '" class="retina-logo"><img src="' . $options['logo_upload']['url'] . '" alt="' . get_bloginfo('name') . '" width="' . $retina_logo_width . '" height="' . $retina_logo_height . '"></a>';
							} else {
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . get_bloginfo('name') . '" class="retina-logo theme-blogname">' . get_bloginfo('name') . '</a>';
							} ?>
						</h1>
					</div>
					<?php if ($header_style == "header-style3") {
						$header_text_btn1 = $options['header_text_btn1'];
						$header_url_btn1 = $options['header_url_btn1'];
						$header_style_btn1 = $options['header_style_btn1'];
						$header_text_btn2 = $options['header_text_btn2'];
						$header_url_btn2 = $options['header_url_btn2'];
						$header_style_btn2 = $options['header_style_btn2'];
						$header_text_btn3 = $options['header_text_btn3'];
						$header_url_btn3 = $options['header_url_btn3'];
						$header_style_btn3 = $options['header_style_btn3'];
						if ($header_text_btn1 != "") {
							echo '<a href="' . esc_url($header_url_btn1) . '" class="btn ' . esc_attr($header_style_btn1) . ' pull-right push-top hidden-xs hidden-sm">' . esc_attr($header_text_btn1) . '</a>';
						};
						if ($header_text_btn2 != "") {
							echo '<a href="' . esc_url($header_url_btn2) . '" class="btn ' . esc_attr($header_style_btn2) . ' pull-right push-top hidden-xs hidden-sm">' . esc_attr($header_text_btn2) . '</a>';
						};
						if ($header_text_btn3 != "") {
							echo '<a href="' . esc_url($header_url_btn3) . '" class="btn ' . esc_attr($header_style_btn3) . ' pull-right push-top hidden-xs hidden-sm">' . esc_attr($header_text_btn3) . '</a>';
						};
						?>
					<?php } ?>
					<a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
					<?php if ($header_style == "header-style3") { ?>
					</div>
				</header><?php } ?>
			<!-- Main Navigation -->
			<?php if ($header_style == "header-style3") { ?><div class="main-navbar">
					<div class="container"><?php } ?>
					<?php if (isset($options['enable-search']) && $options['enable-search'] == 1) {
						imic_search_button_header();
					} ?>
					<?php if (isset($options['enable-cart']) && $options['enable-cart'] == 1) {
						echo imic_cart_button_header();
					} ?>
					<?php if (!empty($menu_locations['primary-menu'])) {
						echo '<nav class="main-navigation dd-menu toggle-menu" role="navigation">';

						wp_nav_menu(array('theme_location' => 'primary-menu', 'container' => '', 'items_wrap' => '<ul id="%1$s" class="sf-menu">%3$s</ul>', 'walker' => new imic_mega_menu_walker));
						echo '</nav>';
					} ?>
					<?php if ($header_style == "header-style3") { ?></div>
				</div><?php } ?>
			<?php if ($header_style != "header-style3") { ?>
			</div>
			</header><?php } ?>
		<!-- End Site Header -->
	</div>