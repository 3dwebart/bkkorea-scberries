<?php
include_once('./_common.php');
$now_ymd = $_POST['attend_date'];
$tmp_attend_date = explode('-', $now_ymd);
$attend_year = $tmp_attend_date[0];
$attend_month = $tmp_attend_date[1];
$attend_date = $tmp_attend_date[2];
error_reporting(E_ALL);

ini_set("display_errors", 1);
// $current_date_ymd = date("Ymd");
// $current_date_y = 
// $current_date_m = 
// $current_date_d = 
//$week = array("일","월","화","수","목","금","토");
$week = array(0,1,2,3,4,5,6);
$week_attend = array();
$mb_id = $_POST['mb_id'];
echo "<h1>attend_date : ".$attend_date."</h1>";
echo "<h1>member ID : ".$mb_id."</h1>";

$sql = "SELECT count(attend_id) AS cnt 
		FROM {$g5['g5_shop_attendance_table']} 
		WHERE attend_year = '$attend_year' 
		AND attend_month = '$attend_month' 
		AND attend_date = '$attend_date' 
		AND mb_id = '$mb_id'";
$row = sql_fetch($sql);
$cnt = $row['cnt'];

if($cnt > 0) { // 이미 출석체크를 했음 - 중복 방지
	//die('Go back~!!');
	echo "<h1>이미 출석하심~!</h1>";
} else {
	$sql = "INSERT INTO {$g5['g5_shop_attendance_table']} 
				(attend_year, attend_month, attend_date, mb_id) 
			VALUES 
				('$attend_year', '$attend_month', '$attend_date', '$mb_id')";
	sql_query($sql);

	$attend_id = sql_insert_id();
	echo('Insert complete !!');
}

/*
	개요 정리 
	1. 월요일을 찾는다.
	2. if(월요일이 저번달이면 : 1일이 월요일이 아니면) {
		이번달의 첫째날부터 일요일까지의 날짜 수를 구한다. var : tot_date
		-> tot_date : 7이 아닐 경우임
		-> 저번달 마지막 날짜 - (7 - tot_date)
	}
	3. 월요일 ~ 일요일까지의 날짜를 배열(저장소)에 담는다.
		1번의 경우라면 저번달과 이번달의 경우로 두번에 계산한다.(** 중요 **)
		배열의 개수는 0 ~ 6 까지 7개를 갖는다.
		0:일,1:월,2:화,3:수,4:목,5:금,6:토
	3. 달력에서 출석한 날짜를 찾는다.
		일요일 ~ 월요일까지 역으로 추척하여 출석한 날짜만 배열에 담는다.
	4. 2 번의 배열과 3번의 배열을 비교한다.
		일치하는 값이 하나라도 없으면 꽝
		전부 일치하면(카운트값이 7이면) 쿠폰을 증정한다.
*/

$now_date = $_POST['attend_date'];
$last_date = date("t", mktime(0, 0, 0, $attend_month, $attend_date, $attend_year));
$now_week = $week[date('w', strtotime($now_date))];
/* 월요일 추척 */
$total_attendance = 0;
$attend_date_calc = $attend_date;


/* BIGIN :: 개발용 임시값 */
$now_ymd = '2018-12-02';
$tmp_attend_date = explode('-', $now_ymd);
$attend_year = '2018';
$attend_month = '12';
$attend_date = '02';
$last_date = date("t", mktime(0, 0, 0, $attend_month, $attend_date, $attend_year));
$now_week = $week[date('w', strtotime($now_ymd))];
$attend_date_calc = $attend_date;
$day_count = $attend_date_calc;
// 여기까지 삭제

// 일요일인 경우에 일요일 포함 토~월 까지 출석일수를 계산한다.
// 카운터값 0 으로 초기화
$week_attend_count = 0;
$switch = 1;
$before_month_date = 0;
if($now_week == 0) {
	// 일요일값 별도 추가한 후 토 ~ 월 게산
	$tmp_date = str_replace('-', '', $now_ymd);
	$now_week = 6;
	$week_attend[0] = $tmp_date;
	for ($i=$now_week; $i > 0; $i--) { // 1보다 크거나 같을 떄 까지 마이너스로 ...
		$day_count--;
		if ($day_count == 0) {
			$switch = 0;
		}
		if($switch == 1) {
			// 월이 바뀌면 1일이 아니어도 이 if 문이 아니라 else 문으로 가야 한다.
			$week_attend_count++; // 1일까지의 날자 수
			$attend_date_calc--; // 날짜
			$week_attend[$i] = $attend_year.$attend_month.sprintf("%02d", $attend_date_calc);
		} else {
			// 1일 이전이므로 저번달을 계산
			// 전달의 마지막날짜
			// if( 이번달이 1월인 경우 ) {
			// 연도 = 이번연도 - 1
			// 월 = 12월
			// 마지막 날짜 = 31
			// } else 1월이 아닌경우 {
			// 연도 = 이번연도
			// 월 = 이번 월 - 1
			// 마지막 날짜 = 월의 마지막 날짜
			// }
			// 0이면 전달부터 계산한다.
			if(sprintf("%02d", $attend_month) == '01') {
				$attend_month_calc = '12';
				$attend_year_calc = $attend_year - 1;
			} else {
				$attend_month_calc = $attend_month - 1;
				$attend_year_calc = $attend_year;
			}
			$last_date = date("t", mktime(0, 0, 0, $attend_month_calc, 1, $attend_year_calc));
			$attend_date_calc = $last_date - $before_month_date;
			$week_attend[$i] = $attend_year_calc.sprintf("%02d", $attend_month_calc).sprintf("%02d", $attend_date_calc);
			$before_month_date++;
		}
	}
}
/* END :: 개발용 임시값 */

foreach ($week_attend as $key => $value) {
	echo $key.' :: '.$value.'<br />';
}

die('stop !!');

for ($i=$now_week; $i > 0; $i--) { 
	echo "<h4>Find week :: ".$i."</h4>";
	echo "<h5>Find date :: ".$attend_date_calc.'</h5>';
	$total_attendance++;
	$attend_date_calc--;
	if($attend_date_calc == 1) {
		break;
	}
}

echo "총 출석일 : ".$total_attendance.'<br />';
echo "오늘 날짜 : ".$now_date.'<br />';
echo "오늘의 요일 : ".$now_week.'<br />';
echo "이번달 마지막 날짜 : ".$last_date;
?>
