<?php

/* ==================================================
	
	SHORTCODES OUTPUT
	
	================================================== */

/* 
	/* PRICING TABLE SHORTCODE
	================================================== */
function imic_pricing_table($atts, $content = null)
{
	extract(shortcode_atts(array(
		'column' => '',
	), $atts));
	$output = '';
	$column = ($column == 4) ? 'four' : 'three';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<div class="pricing-table ' . $column . '-cols margin-40">' . $shortcode_content . '</div>';
	return $output;
}
add_shortcode('pricingtable', 'imic_pricing_table');

function imic_pricing_table_heading($atts, $content = null)
{
	extract(shortcode_atts(array(
		'active' => '',
	), $atts));
	$output = '';
	$active_class = '';
	if ($active != '') {
		$active_class = ' highlight accent-color';
	}
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<div class="pricing-column ' . $active_class . '"><h3>' . $shortcode_content;
	return $output;
}
add_shortcode('headingss', 'imic_pricing_table_heading');
function imic_pricing_table_reason($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<span class="highlight-reason">' . $shortcode_content . '</span>';
	return $output;
}
add_shortcode('reason', 'imic_pricing_table_reason');
function imic_pricing_table_price($atts, $content = null)
{
	extract(shortcode_atts(array(
		'currency' => '',
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '</h3><div class="pricing-column-content"><h4> <span class="dollar-sign">' . $currency . ' </span> ' . $shortcode_content;
	return $output;
}
add_shortcode('price', 'imic_pricing_table_price');

function imic_pricing_table_interval($atts, $content = null)
{
	$output = '</h4><span class="interval">';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output .= $shortcode_content . '</span><ul class="features" style="height: 157px;">';

	return $output;
}
add_shortcode('interval', 'imic_pricing_table_interval');
function imic_pricing_table_row($atts, $content = null)
{
	$output = '<li>';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output .= $shortcode_content . '</li>';

	return $output;
}
add_shortcode('row', 'imic_pricing_table_row');
function imic_pricing_table_url($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '</ul><a class="btn btn-primary" href="' . $shortcode_content . '">' . esc_html__('Sign up now!', 'vestige') . '</a></div></div>';

	return $output;
}
add_shortcode('url', 'imic_pricing_table_url');

/* BUTTON SHORTCODE
	================================================== */

function imic_button($atts, $content = null)
{
	extract(shortcode_atts(array(
		"colour"		=> "",
		"type"			=> "",
		"link" 			=> "#",
		"target"		=> '_self',
		"size"		=> '',
		"extraclass"   => ''
	), $atts));

	$button_output = "";
	$button_class = 'btn ' . $colour . ' ' . $extraclass . ' ' . $size;
	$buttonType = ($type == 'disabled') ? 'disabled="disabled"' : '';

	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$button_output .= '<a class="' . $button_class . '" href="' . $link . '" target="' . $target . '" ' . $buttonType . '>' . $shortcode_content . '</a>';
	return $button_output;
}
add_shortcode('imic_button', 'imic_button');


/* ICON SHORTCODE
	================================================== */

function imic_icon($atts, $content = null)
{
	extract(shortcode_atts(array(
		"image"			=> ""
	), $atts));

	return '<i class="fa ' . $image . '"></i>';
}
add_shortcode('icon', 'imic_icon');

/* VIDEO SHORTCODE
	================================================== */

function imic_video($atts, $content = null)
{
	extract(shortcode_atts(array(
		"url"			=> "",
		"width" => "",
		"height" => "",
		"full" => ""
	), $atts));
	$video_code = imic_video_embed($url, $width, $height);
	if ($full == 0) {
		return $video_code;
	} else {
		return '<div class="fw-video">' . $video_code . '</div>';
	}
}
add_shortcode('video', 'imic_video');

/* GOOGLE MAP SHORTCODE
	================================================== */

function imic_gmap($atts, $content = null)
{
	extract(shortcode_atts(array(
		"address"			=> '',
	), $atts));

	$output = '';
	wp_enqueue_script('imic_google_map');
	wp_enqueue_script('imic_gmap');
	wp_localize_script('imic_gmap', 'gmap', array('address' => $address));
	$output .= '<div id="googleMap"></div><div class="spacer-20"></div>';
	return $output;
}
add_shortcode('gmap', 'imic_gmap');

/* ICON BOX SHORTCODE
	================================================== */

function imic_icon_box($atts, $content = null)
{
	extract(shortcode_atts(array(
		"icon_image"	=> "",
		"line_icon" => "",
		"title"			=> "",
		"description"	=> "",
		"link" => "",
		"type" => "",
		"shade" => "",
		"outline" => "",
		"effect" => "",
		"box" => "",
		//"icon_box" => ""
	), $atts));
	$output = '<div class="icon-box ' . $type . ' ' . $shade . ' ' . $outline . ' ' . $effect . ' ' . $box . '">';
	if ($link != '') {
		$output .= '<a href="' . $link . '"><div class="ibox-icon">';
		if ($icon_image != '') {
			$output .= '<i class="fa ' . $icon_image . '"></i></div>';
		} else {
			$output .= '<i class="' . $line_icon . '"></i></div>';
		}
		$output .= '<h3>' . $title . '</h3></a>';
	} else {
		$output .= '<div class="ibox-icon">';
		if ($icon_image != '') {
			$output .= '<i class="fa ' . $icon_image . '"></i></div>';
		} else {
			$output .= '<i class="' . $line_icon . '"></i></div>';
		}
		$output .= '<h3>' . $title . '</h3>';
	}
	$output .= '<p>' . $description . '</p>
					</div>';
	return $output;
}
add_shortcode('icon_box', 'imic_icon_box');
/* COLUMN SHORTCODES
	================================================== */
function imic_one_full($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => '',
	), $atts));
	$animation = (!empty($anim)) ? 'data-appear-animation="' . $anim . '"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="col-md-12 ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('one_full', 'imic_one_full');

function imic_one_half($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => '',
	), $atts));
	$animation = ($anim != 0) ? 'data-appear-animation="bounceInRight"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="col-md-6 ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('one_half', 'imic_one_half');

function imic_one_third($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => ''
	), $atts));
	$animation = ($anim != 0) ? 'data-appear-animation="bounceInRight"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="col-md-4 ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('one_third', 'imic_one_third');
function imic_one_fourth($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => ''
	), $atts));
	$animation = ($anim != 0) ? 'data-appear-animation="bounceInRight"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="col-md-3 ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('one_fourth', 'imic_one_fourth');
function imic_one_sixth($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => ''
	), $atts));
	$animation = ($anim != 0) ? 'data-appear-animation="bounceInRight"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="col-md-2 ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('one_sixth', 'imic_one_sixth');

function imic_two_third($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => ''
	), $atts));
	$animation = ($anim != 0) ? 'data-appear-animation="bounceInRight"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="col-md-8 ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('two_third', 'imic_two_third');

function imic_custom($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
		"anim" => ''
	), $atts));
	$animation = ($anim != 0) ? 'data-appear-animation="bounceInRight"' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class=" ' . $extra . '" ' . $animation . '>' . $shortcode_content . '</div>';
}
add_shortcode('custom', 'imic_custom');
/* TABLE SHORTCODES
	================================================= */
function imic_table_wrap($atts, $content = null)
{
	extract(shortcode_atts(array(
		"type" => ''
	), $atts));
	$output = '<table class="table ' . $type . '">';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output .= $shortcode_content . '</table>';

	return $output;
}
add_shortcode('htable', 'imic_table_wrap');
function imic_table_headtag($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<thead>' . $shortcode_content . '</thead>';
	return $output;
}
add_shortcode('thead', 'imic_table_headtag');
function imic_table_body($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<tbody>' . $shortcode_content . '</tbody>';
	return $output;
}
add_shortcode('tbody', 'imic_table_body');

function imic_table_row($atts, $content = null)
{
	$output = '<tr>';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output .= $shortcode_content . '</tr>';

	return $output;
}
add_shortcode('trow', 'imic_table_row');

function imic_table_column($atts, $content = null)
{

	$output = '<td>';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output .= $shortcode_content . '</td>';

	return $output;
}
add_shortcode('tcol', 'imic_table_column');
function imic_table_head($atts, $content = null)
{
	$output = '<th>';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output .= $shortcode_content . '</th>';

	return $output;
}
add_shortcode('thcol', 'imic_table_head');

/* TYPOGRAPHY SHORTCODES
	================================================= */
// Anchor tag
function imic_anchor($atts, $content = null)
{
	extract(shortcode_atts(array(
		"href"			=> '',
		"extra"			=> ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<a href="' . $href . '" class="' . $extra . '" >' . $shortcode_content . ' </a>';
}
add_shortcode('anchor', 'imic_anchor');
// Div tag
function imic_div($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra"			=> ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="' . $extra . '">' . $shortcode_content . ' </div>';
}
add_shortcode('div', 'imic_div');
// Section tag
function imic_section($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra"			=> ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<section class="' . $extra . '">' . $shortcode_content . ' </section>';
}
add_shortcode('section', 'imic_section');
// Spacer tag
function imic_spacer($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra"			=> '',
		"size" => '',
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="' . $size . ' ' . $extra . '">' . $shortcode_content . ' </div>';
}
add_shortcode('spacer', 'imic_spacer');
// Alert tag
function imic_alert($atts, $content = null)
{
	extract(shortcode_atts(array(
		"type"			=> '',
		"close"			=> ''
	), $atts));
	$closeButton = ($close == 'true') ? '<a class="close" data-dismiss="alert" href="#">&times;</a>' : '';
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="alert ' . $type . ' fade in">  ' . $closeButton . $shortcode_content . ' </div>';
}
add_shortcode('alert', 'imic_alert');

// Heading Tag
function imic_heading_tag($atts, $content = null)
{
	extract(shortcode_atts(array(
		"size" => '',
		"extra" => '',
		"icon" => '',
		"type" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	if ($icon != '') {
		$output = '<' . $size . ' class="' . $extra . '"><i class="fa ' . $icon . '"></i> ' . $shortcode_content . '</' . $size . '>';
	} else {
		$output = '<' . $size . ' class="' . $extra . '">' . $shortcode_content . '</' . $size . '>';
	}
	return $output;
}
add_shortcode("heading", "imic_heading_tag");

// Divider Tag
function imic_divider_tag($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
	), $atts));

	return '<hr class="' . $extra . '">';
}
add_shortcode("divider", "imic_divider_tag");

// Paragraph type 
function imic_paragraph($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
	), $atts));

	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<p class="' . $extra . '">' . $shortcode_content . '</p>';
}
add_shortcode("paragraph", "imic_paragraph");

// Span type 
function imic_span($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
	), $atts));

	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<span class="' . $extra . '">' . $shortcode_content . '</span>';
}
add_shortcode("span", "imic_span");

// Container type 
function imic_container($atts, $content = null)
{
	extract(shortcode_atts(array(
		"extra" => '',
	), $atts));

	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="' . $extra . '">' . $shortcode_content . '</div>';
}
add_shortcode("container", "imic_container");

// Dropcap type 
function imic_dropcap($atts, $content = null)
{
	extract(shortcode_atts(array(
		"type" => '',
	), $atts));

	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<p class="drop-caps ' . $type . '">' . $shortcode_content . '</p>';
}
add_shortcode("dropcap", "imic_dropcap");

// Blockquote type
function imic_blockquote($atts, $content = null)
{
	extract(shortcode_atts(array(
		"name" => '',
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	if (!empty($name)) {
		$authorName = '<cite>- ' . $name . '</cite>';
	} else {
		$authorName = '';
	}
	return '<blockquote><p>' . $shortcode_content . '</p>' . $authorName . '</blockquote>';
}
add_shortcode("blockquote", "imic_blockquote");

// Code type
function imic_code($atts, $content = null)
{
	extract(shortcode_atts(array(
		"type" => '',
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	if ($type == 'inline') {
		return '<code>' . $shortcode_content . '</code>';
	} else {
		return '<pre>' . $shortcode_content . '</pre>';
	}
}
add_shortcode("code", "imic_code");

// Label Tag
function imic_label_tag($atts, $content = null)
{
	extract(shortcode_atts(array(
		"type" => '',
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<span class="label ' . $type . '">' . $shortcode_content . '</span>';

	return $output;
}
add_shortcode("label", "imic_label_tag");


/* LISTS SHORTCODES
	================================================= */
function imic_list($atts, $content = null)
{
	extract(shortcode_atts(array(
		"type" => '',
		"extra" => '',
		"icon" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	if ($type == 'ordered') {
		$output = '<ol>' . $shortcode_content . '</ol>';
	} else if ($type == 'desc') {
		$output = '<dl>' . $shortcode_content . '</dl>';
	} else {
		$output = '<ul class="' . $type . ' ' . $extra . '">' . $shortcode_content . '</ul>';
	}

	return $output;
}
add_shortcode('list', 'imic_list');

function imic_list_item($atts, $content = null)
{
	extract(shortcode_atts(array(
		"icon" => '',
		"type" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	if (($type == 'icon') || ($type == 'inline')) {
		$output = '<li><i class="fa ' . $icon . '"></i> ' . $shortcode_content . '</li>';
	} else {
		$output = '<li>' . $shortcode_content . '</li>';
	}
	return $output;
}
add_shortcode('list_item', 'imic_list_item');

function imic_list_item_dt($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<dt>' . $shortcode_content . '</dt>';

	return $output;
}
add_shortcode('list_item_dt', 'imic_list_item_dt');

function imic_list_item_dd($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	$output = '<dd>' . $shortcode_content . '</dd>';

	return $output;
}
add_shortcode('list_item_dd', 'imic_list_item_dd');
function imic_page_first($atts, $content = null)
{
	return '<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>';
}
add_shortcode('page_first', 'imic_page_first');

function imic_page_last($atts, $content = null)
{
	return '<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>';
}
add_shortcode('page_last', 'imic_page_last');

function imic_page($atts, $content = null)
{
	extract(shortcode_atts(array(
		"class" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	return '<li class="' . $class . '"><a href="#">' . $shortcode_content . ' </a></li>';
}
add_shortcode('page', 'imic_page');

/* TABS SHORTCODES
	================================================= */
function imic_tabs($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="tabs">' . $shortcode_content . '</div>';
}
add_shortcode('tabs', 'imic_tabs');

function imic_tabh($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<ul class="nav nav-tabs">' . $shortcode_content . '</ul>';
}
add_shortcode('tabh', 'imic_tabh');

function imic_tab($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id" => '',
		"class" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	return '<li class="' . $class . '"> <a data-toggle="tab" href="#' . $id . '"> ' . $shortcode_content . ' </a> </li>';
}
add_shortcode('tab', 'imic_tab');

function imic_tabc($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="tab-content">' . $shortcode_content . '</div>';
}
add_shortcode('tabc', 'imic_tabc');

function imic_tabrow($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id" => '',
		"class" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	$output = '<div id="' . $id . '" class="tab-pane ' . $class . '">' . $shortcode_content . '</div>';

	return $output;
}
add_shortcode('tabrow', 'imic_tabrow');
/* ACCORDION SHORTCODES
	================================================= */
function imic_accordions($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	return '<div class="accordion" id="accordion' . $id . '">' . $shortcode_content . '</div>';
}
add_shortcode('accordions', 'imic_accordions');

function imic_accgroup($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="accordion-group panel">' . $shortcode_content . '</div>';
}
add_shortcode('accgroup', 'imic_accgroup');

function imic_acchead($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id" => '',
		"class" => '',
		"tab_id" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	$output = '<div class="accordion-heading accordionize"> <a class="accordion-toggle ' . $class . '" data-toggle="collapse" data-parent="#accordion' . $id . '" href="#' . $tab_id . '"> ' . $shortcode_content . ' <i class="fa fa-angle-down"></i> </a> </div>';

	return $output;
}
add_shortcode('acchead', 'imic_acchead');

function imic_accbody($atts, $content = null)
{
	extract(shortcode_atts(array(
		"tab_id" => '',
		"in" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	$output = '<div id="' . $tab_id . '" class="accordion-body ' . $in . ' collapse">
					  <div class="accordion-inner"> ' . $shortcode_content . ' </div>
					</div>';

	return $output;
}
add_shortcode('accbody', 'imic_accbody');
/* TOGGLE SHORTCODES
	================================================= */
function imic_toggles($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	return '<div class="accordion" id="toggle' . $id . '">' . $shortcode_content . '</div>';
}
add_shortcode('toggles', 'imic_toggles');

function imic_togglegroup($atts, $content = null)
{
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));
	return '<div class="accordion-group panel">' . $shortcode_content . '</div>';
}
add_shortcode('togglegroup', 'imic_togglegroup');

function imic_togglehead($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id" => '',
		"tab_id" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	$output = '<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#' . $tab_id . '"> ' . $shortcode_content . ' <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>';

	return $output;
}
add_shortcode('togglehead', 'imic_togglehead');

function imic_togglebody($atts, $content = null)
{
	extract(shortcode_atts(array(
		"tab_id" => ''
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	$output = '<div id="' . $tab_id . '" class="accordion-body collapse">
              <div class="accordion-inner"> ' . $shortcode_content . '  </div>
            </div>';

	return $output;
}
add_shortcode('togglebody', 'imic_togglebody');
/* PROGRESS BAR SHORTCODE
	================================================= */
function imic_progress_bar($atts)
{
	extract(shortcode_atts(array(
		"percentage" => '',
		"name" => '',
		"type" => '',
		"value" => '',
		"colour" => ''
	), $atts));

	if ($type == 'progress-striped') {
		$typeClass = $type;
	} else {
		$typeClass = "";
	}
	if ($colour == 'progress-bar-warning') {
		$warningText = '(warning)';
	} else {
		$warningText = "";
	}

	$service_bar_output = '';
	$progress_text = '';
	if ($name != '') {
		$service_bar_output = '<div class="progress-label"> <span>' . $name . '</span> </div>';
	}
	$service_bar_output .= '<div class="progress ' . $typeClass . '">';

	if ($type == 'progress-striped') {
		$service_bar_output .= '<div class="progress-bar ' . $colour . '" style="width: ' . $value . '%">';
		$service_bar_output .= '<span class="sr-only">' . $value . '% Complete (success)</span>';
		$service_bar_output .= '</div>';
	} else if ($type == 'colored') {
		if (!empty($warningText)) {
			$spanClass = '';
			$progress_text = $value . '% Complete ' . $warningText;
		} else {
			$spanClass = 'sr-only';
			$progress_text = '';
		}
		$service_bar_output .= '<div class="progress-bar ' . $colour . '" style="width: ' . $value . '%"> <span class="' . $spanClass . '">' . $progress_text . '</span> </div>';
	} else {
		$service_bar_output .= '<div class="progress-bar progress-bar-primary" data-appear-progress-animation="' . $value . '%"> <span class="progress-bar-tooltip">' . $value . '%</span> </div>';
	}
	$service_bar_output .= '</div>';

	return $service_bar_output;
}

add_shortcode('progress_bar', 'imic_progress_bar');


/* TOOLTIP SHORTCODE
	================================================= */
function imic_tooltip($atts, $content = null)
{
	extract(shortcode_atts(array(
		"title" => '',
		"link" => '#',
		"direction" => 'top'
	), $atts));
	$shortcode_content = preg_replace("/(<br\s\/>)/", "", do_shortcode($content));

	$tooltip_output = '<a href="' . $link . '" rel="tooltip" data-toggle="tooltip" data-original-title="' . $title . '" data-placement="' . $direction . '">' . $shortcode_content . '</a>';
	return $tooltip_output;
}

add_shortcode('imic_tooltip', 'imic_tooltip');
/* WORDPRESS LINK SHORTCODE
	================================================= */
function imic_wordpress_link()
{
	return '<a href="http://wordpress.org/" target="_blank">WordPress</a>';
}
add_shortcode('wp-link', 'imic_wordpress_link');

/* COUNT SHORTCODE
	================================================= */
function imic_count($atts)
{
	extract(shortcode_atts(array(
		"speed" => '2000',
		"to" => '',
		"icon" => '',
		"subject" => '',
		"textstyle" => ''
	), $atts));

	$count_output = '';
	if ($speed == "") {
		$speed = '2000';
	}
	$count_output .= '<div class="col-lg-3 col-md-3 col-sm-3 cust-counter">';
	$count_output .= '<div class="fact-ico"> <i class="fa ' . $icon . ' fa-4x"></i> </div>';
	$count_output .= '<div class="clearfix"></div>';
	$count_output .= '<div class="timer" data-perc="' . $speed . '"> <span class="count">' . $to . '</span></div>';
	$count_output .= '<div class="clearfix"></div>';
	if ($textstyle == "h3") {
		$count_output .= '<h3>' . $subject . '</h3></div>';
	} else if ($textstyle == "h6") {
		$count_output .= '<h6>' . $subject . '</h6></div>';
	} else {
		$count_output .= '<span class="fact">' . $subject . '</span></div>';
	}

	return $count_output;
}

add_shortcode('imic_count', 'imic_count');

/* MODAL BOX SHORTCODE
	================================================== */
function imic_modal_box($atts, $content = null)
{
	extract(shortcode_atts(array(
		"id"			=> "",
		"title" 	=> "",
		"text"	=> "",
		"button" => ""
	), $atts));

	$modalBox = '<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#' . $id . '">' . $button . '</button>
            <div class="modal fade" id="' . $id . '" tabindex="-1" role="dialog" aria-labelledby="' . $id . 'Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="' . $id . 'Label">' . $title . '</h4>
                  </div>
                  <div class="modal-body"> ' . $text . ' </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default inverted" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>';

	return $modalBox;
}
add_shortcode('modal_box', 'imic_modal_box');

/* FORM SHORTCODE
	================================================== */
function imic_form_code($atts, $content = null)
{
	extract(shortcode_atts(array(
		"form_email" => '',
		"form_title" => '',
	), $atts));
	if (!empty($form_email)) {
		$admin_email = $form_email;
	} else {
		$admin_email = get_option('admin_email');
	}
	$contact_title = '';
	if (!empty($form_title)) {
		$contact_title = '<h2>' . $form_title . '</h2>';
	}
	$formCode = '<form action="' . IMIC_THEME_PATH . '/mail/contact.php" type="post" class="contact-form clearfix" id="contactform">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<input type="text" id="fname" name="fname"  class="form-control input-lg" placeholder="' . esc_html__('Name', 'vestige') . ' *">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" id="lname" name="Last Name"  class="form-control input-lg" placeholder="' . esc_html__('Last name', 'vestige') . '">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="email" id="email" name="email"  class="form-control input-lg" placeholder="' . esc_html__('Email', 'vestige') . ' *">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="text" id="phone" name="phone" class="form-control input-lg" placeholder="' . esc_html__('Phone', 'vestige') . '">
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<textarea cols="6" rows="7" id="comments" name="comments" class="form-control input-lg" placeholder="' . esc_html__('Message', 'vestige') . '"></textarea>
<input type ="hidden" name ="image_path" id="image_path" value ="' . IMIC_THEME_PATH . '">
<input type ="hidden" name ="recipients" id="recipients" value ="">
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<input id="submit" name="submit" type="submit" class="btn btn-primary btn-lg btn-block" value="' . esc_html__('Submit', 'vestige') . '">
</div>
</div>
<div class="clearfix"></div>
</form><div id="message"></div>';
	return $formCode;
}
add_shortcode('imic_form', 'imic_form_code');
/* Event Calendar SHORTCODE
  ================================================= */
function event_calendar($atts)
{
	extract(shortcode_atts(array(), $atts));
	wp_enqueue_style('imic_fullcalendar_css');
	wp_enqueue_style('imic_fullcalendar_print');
	$imic_options = get_option('imic_options');
	//$google_feeds = $imic_options['google_feed'];
	$google_api_key = (isset($imic_options['google_feed_key'])) ? $imic_options['google_feed_key'] : '';
	$google_calendar_id = (isset($imic_options['google_feed_id'])) ? $imic_options['google_feed_id'] : '';
	$monthNamesValue = (isset($imic_options['calendar_month_name'])) ? $imic_options['calendar_month_name'] : '';
	$monthNames = (empty($monthNamesValue)) ? array() : explode(',', trim($monthNamesValue));
	$monthNamesShortValue = (isset($imic_options['calendar_month_name_short'])) ? $imic_options['calendar_month_name_short'] : '';
	$monthNamesShort = (empty($monthNamesShortValue)) ? array() : explode(',', trim($monthNamesShortValue));
	$dayNamesValue = (isset($imic_options['calendar_day_name'])) ? $imic_options['calendar_day_name'] : '';
	$dayNames = (empty($dayNamesValue)) ? array() : explode(',', trim($dayNamesValue));
	$dayNamesShortValue = (isset($imic_options['calendar_day_name_short'])) ? $imic_options['calendar_day_name_short'] : '';
	$dayNamesShort = (empty($dayNamesShortValue)) ? array() : explode(',', trim($dayNamesShortValue));
	wp_enqueue_script('imic_fullcalendar');
	wp_enqueue_script('imic_gcal');
	wp_enqueue_script('imic_calender_events');
	$format = ImicConvertDate(get_option('time_format'));
	if (class_exists('SitePress')) {
		wp_localize_script('imic_calender_events', 'calenderEvents', array('homeurl' => get_template_directory_uri(), 'monthNames' => $monthNames, 'monthNamesShort' => $monthNamesShort, 'dayNames' => $dayNames, 'dayNamesShort' => $dayNamesShort, 'time_format' => $format, 'language' => ICL_LANGUAGE_CODE, 'start_of_week' => get_option('start_of_week'), 'googlekey' => $google_api_key, 'googlecalid' => $google_calendar_id, 'ajaxurl' => admin_url('admin-ajax.php')));
	} else {
		wp_localize_script('imic_calender_events', 'calenderEvents', array('homeurl' => get_template_directory_uri(), 'monthNames' => $monthNames, 'monthNamesShort' => $monthNamesShort, 'dayNames' => $dayNames, 'dayNamesShort' => $dayNamesShort, 'time_format' => $format, 'language' => '', 'start_of_week' => get_option('start_of_week'), 'googlekey' => $google_api_key, 'googlecalid' => $google_calendar_id, 'ajaxurl' => admin_url('admin-ajax.php')));
	}
	return '<div id="calendar"><div id ="" class ="event_calendar calendar"></div></div>';
}
add_shortcode('event_calendar', 'event_calendar');

/* Event Calendar SHORTCODE
  ================================================= */
function exhibition_calendar($atts)
{
	extract(shortcode_atts(array(), $atts));
	wp_enqueue_style('imic_fullcalendar_css');
	wp_enqueue_style('imic_fullcalendar_print');
	$imic_options = get_option('imic_options');
	//$google_feeds = $imic_options['google_feed'];
	$google_api_key = (isset($imic_options['google_feed_key'])) ? $imic_options['google_feed_key'] : '';
	$google_calendar_id = (isset($imic_options['google_feed_id'])) ? $imic_options['google_feed_id'] : '';
	$monthNamesValue = (isset($imic_options['calendar_month_name'])) ? $imic_options['calendar_month_name'] : '';
	$monthNames = (empty($monthNamesValue)) ? array() : explode(',', trim($monthNamesValue));
	$monthNamesShortValue = (isset($imic_options['calendar_month_name_short'])) ? $imic_options['calendar_month_name_short'] : '';
	$monthNamesShort = (empty($monthNamesShortValue)) ? array() : explode(',', trim($monthNamesShortValue));
	$dayNamesValue = (isset($imic_options['calendar_day_name'])) ? $imic_options['calendar_day_name'] : '';
	$dayNames = (empty($dayNamesValue)) ? array() : explode(',', trim($dayNamesValue));
	$dayNamesShortValue = (isset($imic_options['calendar_day_name_short'])) ? $imic_options['calendar_day_name_short'] : '';
	$dayNamesShort = (empty($dayNamesShortValue)) ? array() : explode(',', trim($dayNamesShortValue));
	wp_enqueue_script('imic_fullcalendar');
	wp_enqueue_script('imic_gcal');
	wp_enqueue_script('imic_calender_exhibitions');
	$format = ImicConvertDate(get_option('time_format'));
	wp_localize_script('imic_calender_exhibitions', 'calenderExhibitions', array('homeurl' => get_template_directory_uri(), 'monthNames' => $monthNames, 'monthNamesShort' => $monthNamesShort, 'dayNames' => $dayNames, 'dayNamesShort' => $dayNamesShort, 'time_format' => $format, 'start_of_week' => get_option('start_of_week'), 'googlekey' => $google_api_key, 'googlecalid' => $google_calendar_id, 'ajaxurl' => admin_url('admin-ajax.php')));
	return '<div id="calendar"><div id ="" class ="event_calendar calendar"></div></div>';
}
add_shortcode('exhibition_calendar', 'exhibition_calendar');
