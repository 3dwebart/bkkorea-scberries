<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
/*
$json_file = "http://api.manana.kr/exchange.json";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $json_file);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
﻿//$output = curl_exec($ch);
curl_close($ch);

// $data = json_decode($output,true);
// print_pre($data['ar_no']);
// print_pre($data);

function print_pre($tmp) {
	echo "<pre>";
	print_r($tmp);
	echo "</pre>";
}
*/
$url = "http://api.manana.kr/exchange.json";
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, '`http://scberries.cafe24.com`');

$json = curl_exec($curl_handle);
curl_close($curl_handle);

$data = json_decode($json,true);

for($i = 0; $i < count($data); $i++) {
	if($data[$i]['name'] == 'USD/KRW') {
		echo($data[$i]['price']);
	}
}

//print_r($data[18]);
?>
