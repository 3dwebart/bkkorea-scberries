<?php
/* 테스트 URL */
$pp_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";      
$recv_mail = "scberries.cafe@gmail.com";
/*
좀 전에 비지니스 계정 넣으세요. pp_url에 sandbox가 붙으면 테스트 계정이라 보시면 됩니다.
# 상용 URL
# $pp_url = "https://www.paypal.com/cgi-bin/webscr";
# $recv_mail = "; :: 상용일 때 실제 계정..
*/
$usd_api = shell_exec("curl -k https://api.manana.kr/exchange/rate/KRW/USD.json");
// 실시간 환율 적용
// echo $use_api."\n";
$usd_arr = json_decode($usd_api, true);
?>
<form method="post" action="<?php echo $pp_url; ?>">
	<input type="hidden" name="cmd" value="_xclick">
	<!-- 계정 -->
	<input type="hidden" name="business" value="<?=$recv_mail?>">
	<!-- 상품 이름 -->
	<input type="hidden" name="item_name" value="<?php echo $it_name;?>">
	<!-- 상품 아이디 -->
	<input type="hidden" name="item_number" value="<?php echo $od_id;?>">
	<!--  -->
	<input type="hidden" name="currency_code" value="USD">
	<!--  상품가격 / 환율 -->
	<input type="hidden" name="amount" value="<?php echo ($tot_sell_price/$paypal_usd);?>">
	<input type="hidden" name="charset" value="UTF-8">
	<!--
	<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">  
	-->
</form> 