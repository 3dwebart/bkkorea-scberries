<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$pp_hostname = "www.sandbox.paypal.com";
$auth_token = "uJT32rTAPdkkZUIvIDmMdifL9fyWxXEJdgat0ikrRXQ74l1yUZNTTml-kgO"; // token 넣어주세요. 
/*
	상용 서버
	$pp_hostname = "www.paypal.com";
	$auth_token = "";
*/
$req = 'cmd=_notify-synch';
$tx_token = $_REQUEST['tx'];
$req .= "&tx=$tx_token&at=$auth_token";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 0 error 시 1로 변경하세요.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_VERBOSE, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
$res = curl_exec($ch);
curl_close($ch);

if(!$res) {
	//HTTP ERROR
	echo "Paypal 서버 연동 오류가 발생했습니다.";
	exit;
} else {
	$keyarray = array();
	if (strcmp ($lines[0], "SUCCESS") == 0)  {
		for ($i=1; $i<count($lines);$i++) {
			list($key,$val) = explode("=", $lines[$i]);
			$keyarray[urldecode($key)] = urldecode($val);
			fwrite($fp, urldecode($key).":".urldecode($val)."\n");
		}

		$firstname = $keyarray['first_name'];
		$lastname = $keyarray['last_name'];
		$itemnumber = $keyarray['item_number'];
		$itemname = $keyarray['item_name'];		
		$amount = $keyarray['payment_gross'];
	} else if (strcmp ($lines[0], "FAIL") == 0) {
		echo ("<p><h3>결제오류가 발생했습니다!</h3></p>");
	}
	goto_url(G5_SHOP_URL.'/orderinquiryview.php?od_id='.$_REQUEST["item_number"]); // 상품 정보
}
?>