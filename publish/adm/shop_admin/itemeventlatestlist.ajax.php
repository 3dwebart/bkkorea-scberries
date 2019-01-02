<?php
include_once('./_common.php');
$ev_latest_list_id = $_POST['ev_latest_list_id'];
if (empty($ev_latest_list_id)) {
	$ev_list = 0;
	$where_in = "ev_id NOT IN(".$ev_list.")";
} else {
	$tmp_arr = explode(',', $ev_latest_list_id);
	$ev_list = '';
	for ($i=1; $i < count($tmp_arr); $i++){
		$ev_list .= $tmp_arr[$i].($i == 1) ? '' : ',';
	}
	$where_in = "ev_id NOT IN(".$ev_latest_list_id.")";
}
$sql = " SELECT ev_id, ev_subject FROM {$g5['g5_shop_event_table']} WHERE ev_use = 1 ";
$res = sql_query($sql);
$cnt = sql_num_rows($res);
$latest_arr = array();
if($cnt > 0) {
	for($i = 0; $row = sql_fetch_array($res); $i++) {
		$latest_arr[$i] = array(
			'ev_id' => $row['ev_id'],
			'ev_subject' => $row['ev_subject'],
			'test1' => $where_in,
			'test2' => $ev_latest_list_id,
			'test3' => $tmp_arr[0]
		);
	}
} else {
	$latest_arr[0] = array(
		'ev_id' => 0,
		'ev_subject' => '',
		'test' => $where_in,
		'test2' => $ev_latest_list_id
	);
}

echo json_encode($latest_arr,JSON_UNESCAPED_UNICODE);
?>