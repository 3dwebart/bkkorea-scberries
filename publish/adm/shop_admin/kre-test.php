<?php
$exchange_url="http://api.fixer.io/latest?base=HKD";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $exchange_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1000);
$rt = curl_exec($ch);
curl_close($ch);
// var_dump(json_decode($rt));
$hwan_api = json_decode($rt);
$hwan_krw = $hwan_api->rates->KRW;

echo '<h1>통화 = ' . $hwan_krw . '</h1>';
?>