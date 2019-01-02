<?php
/* PHP 샘플 코드 */
$Key = 'u2%2FaCHm%2FQgvvNj7OMRLWiFsGju2NISwVe03saRAcz5S%2BqY2qM%2FXsfKWzATMWP3J%2BorCCi6JtS%2BfIvMuJmMyeig%3D%3D';

$url = 'http://apis.data.go.kr/B090041/openapi/service/SpcdeInfoService/getRestDeInfo';

$year  = $_POST['year'];
$month = $_POST['month'];
$year  = array('2018', '2019', '2019');
$month = array('12', '01', '02');
$result = '';
echo "[";
for ($i=0; $i < count($year); $i++) {
	$ch[$i] = curl_init();
	echo ($i == 0) ? '' : ',';
	$queryParams = '?' . urlencode('ServiceKey') . '=' . $Key; /*Service Key*/
	$queryParams .= '&' . urlencode('solYear') . '=' . urlencode($year[$i]); /*연*/
	$queryParams .= '&' . urlencode('solMonth') . '=' . urlencode($month[$i]); /*월*/
	$queryParams .= '&' . urlencode('_type') . '=' . urlencode('json'); /*Type*/
	$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
	$queryParams .= '&' . urlencode('totalCount') . '=' . urlencode('16'); /**/

	curl_setopt($ch[$i], CURLOPT_URL, $url . $queryParams);
	curl_setopt($ch[$i], CURLOPT_RETURNTRANSFER, FALSE);
	curl_setopt($ch[$i], CURLOPT_HEADER, FALSE);
	curl_setopt($ch[$i], CURLOPT_CUSTOMREQUEST, 'GET');
	$response = curl_exec($ch[$i]);

	$result[$i] = preg_replace('}}}1', '}}}', $response);
	curl_close($ch[$i]);
}
echo "]";
//var_dump($response);

?>