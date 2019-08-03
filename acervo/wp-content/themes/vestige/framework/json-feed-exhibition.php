<?php
// - standalone json feed -
header('Content-Type:application/json');
// - grab wp load, wherever it's hiding -
if (!defined(ABSPATH)) {
    $pagePath = explode('/wp-content/', dirname(__FILE__));
    include_once(str_replace('wp-content/', '', $pagePath[0] . '/wp-load.php'));
}
// - grab date barrier -
$today = date_i18n('Y-m-d');
$jsonexhibitions = array();
// - loop -
$exhibitions_future = imic_exhibition_schedule('', '', '1');
//$exhibitions_past = imic_exhibition_schedule_past();
$exhibitions = $exhibitions_future;
ksort($exhibitions);
if (!empty($exhibitions)) {
    foreach ($exhibitions as $key => $value) {
        $etime = '';
        $exhibition_id = explode("|", $value);
        $exhibition_url = imic_query_arg_exhibition(date_i18n('Y-m-d', $exhibition_id[1]), $exhibition_id[0]);
        $stime = date_i18n('c', $exhibition_id[1]);
        if (!isset($exhibition_id[3])) {
            $etime = date_i18n('c', $exhibition_id[2]);
        }
        // - json items -
        $jsonexhibitions[] = array(
            'title' => esc_attr(get_the_title($exhibition_id[0])),
            'allDay' => ($etime == '') ? true : false, // <- true by default with FullCalendar
            'start' => $stime,
            'end' => $etime,
            'url' => $exhibition_url,
        );
    }
}
// - fire away -
echo json_encode($jsonexhibitions);
