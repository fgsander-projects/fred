<?php
// - standalone json feed -
header('Content-Type:application/json');
// - grab wp load, wherever it's hiding -
if (!defined(ABSPATH)) {
	$pagePath = explode('/wp-content/', dirname(__FILE__));
	include_once(str_replace('wp-content/', '', $pagePath[0] . '/wp-load.php'));
}
$imic_options = get_option('imic_options');
// - grab date barrier -
//$today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
$today = date_i18n('Y-m-d');
if (class_exists('SitePress')) {
	global $sitepress;
	$current_lang = $sitepress->get_current_language(); //save current language
	$sitepress->switch_lang($_POST['lang']);
}
$jsonevents = array();
// - loop -
$event_cat_id = '';
$month_event = $_POST['month_event'];
if (isset($_POST['event_cat_id']) && !empty($_POST['event_cat_id'])) {
	$event_cat_id = $_POST['event_cat_id'];
	$term_data = get_term_by('id', $event_cat_id, 'event-category', '', '');
	$event_cat_id = $term_data->slug;
}
$events = imic_recur_events('', '', $event_cat_id, '', $month_event);
ksort($events);
if (!empty($events)) {
	foreach ($events as $key => $value) {
		$frequency = get_post_meta($value, 'imic_event_frequency', true);
		$cat_id = wp_get_post_terms($value, 'event-category', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all'));
		$event_color = '';
		if (!empty($cat_id)) {
			$cat_id = $cat_id[0]->term_id;
			$cat_data = get_option("category_" . $cat_id);
			$event_cat_color = $cat_data['catBG'];
			$event_default_color = (isset($imic_options['event_default_color'])) ? $imic_options['event_default_color'] : '';
			$event_color = ($cat_data['catBG'] != '') ? $cat_data['catBG'] : $event_default_color;
		}
		$frequency_count = '';
		$frequency_count = get_post_meta($value, 'imic_event_frequency_count', true);
		if ($frequency_count > 0) {
			$recurring_event_color = (isset($imic_options['recurring_event_color'])) ? $imic_options['recurring_event_color'] : '';
			$color = ($event_cat_color != '') ? $event_cat_color : $recurring_event_color;
			$frequency_count = $frequency_count;
		} else {
			$frequency_count = 0;
			$color = $event_color;
		}
		$start_date = get_post_meta($value, 'imic_event_start_dt', true);
		$end_date = get_post_meta($value, 'imic_event_end_dt', true);
		$start_date_u = strtotime($start_date);
		$end_date_u = strtotime($end_date);
		$start_date_time = date_i18n("G:i", $start_date_u);
		$end_date_time = date_i18n("G:i", $end_date_u);
		$new_end_date = date_i18n("Y-m-d", $key);
		$insert_start_date = strtotime($new_end_date . ' ' . $start_date_time);
		$insert_end_date = strtotime($new_end_date . ' ' . $end_date_time);
		$days_difference = imic_dateDiff($start_date, $end_date);
		if ($days_difference > 0) {
			$stime = date_i18n('c', $start_date_u);
			$etime = date_i18n('c', $end_date_u);
		} else {
			$stime = date_i18n('c', $insert_start_date);
			$etime = date_i18n('c', $insert_end_date);
		}
		// - json items -
		$jsonevents[] = array(
			//'id' => $value.'|'.$start,
			'title' => esc_attr(get_the_title($value)),
			'allDay' => false, // <- true by default with FullCalendar
			'start' => $stime,
			'end' => $etime,
			'url' => imic_query_arg(date('Y-m-d', $key), $value),
			'backgroundColor' => $color,
			'borderColor' => $color
		);
	}
}
// - fire away -
$events_feeds = $imic_options['event_feeds'];
if ($events_feeds == 1) {
	echo json_encode($jsonevents);
}
