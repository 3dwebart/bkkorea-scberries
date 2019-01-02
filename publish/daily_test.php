<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/LunarToSola.lib.php');
$mb_id = $_SESSION['ss_mb_id'];
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
$sql = "SELECT mb_name FROM g5_member WHERE mb_id = '$mb_id'";
$row = sql_fetch($sql);
$mb_name = $row['mb_name'];
$attendance = array();
if(!empty($mb_id)) {
	$y = date('Y');
	$m = date('m');
	$d = date('d');
	/* 어제의 년도 */
	if($m == 1) {
		$yy = $y - 1;
	} else {
		$yy = $y;
	}
	/* 어제의 월 */
	if($d == 1) {
		if($m == 1) {
			$ym = 12;
		} else {
			$ym = $m - 1;
		}
	} else {
		$ym = $m;
	}
	/* 어제 날짜 */
	if($d == 1) {
		$yd = date("t", mktime(0, 0, 0, $ym, 1, $yy));
	} else {
		$yd = $d - 1;
	}

	$to_y = date('Y');
	$to_m = date('m');
	echo 'Yesterday :: '.$yy.'-'.$ym.'-'.$yd;
	echo "<br />";
	echo "회원 ID : ".$mb_id;
	echo "<br />회원이름 : ".$mb_name;

	/*
	$sql = "SELECT attend_id, attend_year, attend_month, attend_date, mb_id FROM g5_shop_attendance WHERE mb_id = '$mb_id'";
	$res = sql_query($sql);
	$cnt = sql_num_rows($res);
	$attend_date_arr = array();
	if($cnt > 0) {
		while ($row = sql_fetch_array($res)) {
			$attend_date_arr[] = $row['attend_date'];
		}
	} else {
		echo '<h1>글이 없습니다.</h1>';
	}
	*/
	/****************************** 
	달력 
	******************************/ 
	/********** 사용자 설정값 **********/ 
	$startYear       = date( "Y" ) - 10;
	$endYear         = date( "Y" ) + 11;

	/********** 입력값 **********/ 
	$year            = ( $_GET['toYear'] )? $_GET['toYear'] : date( "Y" ); 
	$month           = ( $_GET['toMonth'] )? $_GET['toMonth'] : date( "m" ); 
	$doms            = array( "일", "월", "화", "수", "목", "금", "토" ); 

	/********** 계산값 **********/ 
	$mktime          = mktime( 0, 0, 0, $month, 1, $year );      // 입력된 값으로 년-월-01을 만든다 
	$days            = date( "t", $mktime );                        // 현재의 year와 month로 현재 달의 일수 구해오기 
	$startDay        = date( "w", $mktime );                        // 시작요일 알아내기 

	/* BIGIN :: 오늘 기준 월의 마지막 날짜 구하기 */
	$today           = time();
	$endDay          = date( "t",  $today);
	/* END :: 오늘 기준 월의 마지막 날짜 구하기 */

	// 지난달 일수 구하기 
	$prevDayCount    = date( "t", mktime( 0, 0, 0, $month, 0, $year ) ) - $startDay + 1; 

	$nowDayCount     = 1;                                            // 이번달 일자 카운팅 
	$nextDayCount    = 1;                                          // 다음달 일자 카운팅 

	// 이전, 다음 만들기 
	$prevYear        = ( $month == 1 )? ( $year - 1 ) : $year; 
	$prevMonth       = ( $month == 1 )? 12 : ( $month - 1 ); 
	$nextYear        = ( $month == 12 )? ( $year + 1 ) : $year; 
	$nextMonth       = ( $month == 12 )? 1 : ( $month + 1 ); 

	// 출력행 계산 
	$setRows	= ceil( ( $startDay + $days ) / 7 ); 

	// 휴일 체크

	// 오늘 날짜 체크
	$toDay = explode('-', date("Y-m-d"));
	$attend_date = date("Y-m-d");
?>
<!---------- 달력 출력 ----------> 
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./js/font-awesome/css/font-awesome.min.css">
<style>
table { border-collapse:collapse; }
td, th { border-width:1px;border-style:solid; }
.daily-table td { width: 120px; height: 120px; vertical-align: top; text-align: left; }
.p6 { padding: 6px; }
.p10 { padding:10px; }
.red { color: rgba(255,0,0,1); }
.blue { color: rgba(0,0,255,1); }
.gray { color: rgba(128,128,128,1); }
.prev-date, .next-date { opacity: .5; }
.today { background-color: rgba(200,200,255,.5); }
.no-login { display: flex; width: 100%; height: 100%; align-items: center; justify-content: center; }
.no-login span { font-size: 18px; }
.daily-wrap table { margin: 0 auto; }
.holiday { font-size: 13px; }
.date-name { font-size: 12px; align-self: flex-end; }
.daily-table td .daily-box { display: flex; width: 100%; height: 100%; flex-direction: column; justify-content: space-between; font-weight: bold; position: relative; }
.daily-table td .daily-box .stamp { display: block; width: 85px; height: 85px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-image: url('/img/stamp.png'); background-repeat: no-repeat; background-position: center center; }
</style>
<script src="./js/jquery-3.3.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
	<div class="daily-wrap">
		<!-- BIGIN :: 전체 연도 + 월 오류로 인해 숨김처리 -->
		<table style="display: none;">
			<tr> 
				<td class="p10">
				<select name="toYear" onchange="submit();"> 
				<?php for( $i = $startYear; $i < $endYear; $i++ ) { ?> 
				<option value="<?php echo $i; ?>" <?php echo ($i==$year)?"selected":""; ?>><?php echo $i; ?></option> 
				<?php } ?> 
				</select>년 
				<select name="toMonth" onchange="submit();"> 
				<?php for( $i = 1; $i <= 12; $i++ ) { ?> 
				<option value="<?php echo $i; ?>" <?php echo ($i==$month)?"selected":""; ?>><?php echo $i; ?></option> 
				<?php } ?>
				</select>월 
				</td>
			</tr>
		</table> 
		<!-- END :: 전체 연도 + 월 오류로 인해 숨김처리 -->
		<table> 
			<tr> 
				<td class="p10">
					<div class="input-group">
						<button type="button" class="btn btn-warning" onclick="location.href='<?php echo $_SERVER['PHP_SELF']; ?>?toYear=<?php echo $prevYear; ?>&toMonth=<?php echo $prevMonth; ?>'"><i class="fa fa-arrow-left"></i></button>
						<span class="input-group-addon">
							<?php echo $year; ?>년 <?php echo $month; ?>월 
						</span>
						<button type="button" class="btn btn-warning" onclick="location.href='<?php echo $_SERVER['PHP_SELF']; ?>?toYear=<?php echo $nextYear; ?>&toMonth=<?php echo $nextMonth; ?>'"><i class="fa fa-arrow-right"></i></button>
					</div>
				</td> 
			</tr>
		</table>
		<br>

		<table cellpadding="0" cellspacing="0" class="daily-table">
			<thead>
				<tr>
					<?php for( $i = 0; $i < count( $doms ); $i++ ) { ?>
					<th class="p6 week" align="center"><?php echo $doms[$i]; ?>요일</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<? for( $rows = 0; $rows < $setRows; $rows++ ) { ?> 
				<tr> 
					<?php
					for( $cols = 0; $cols < 7; $cols++ ) 
					{ 
						// 셀 인덱스 만들자 
						$cellIndex    = ( 7 * $rows ) + $cols;
						/*
							개발 계획 : 
							----------------------------------------------------------------
							30일 이전~30일 이후까지의 범위 값을 구한다.
							또는 현제 달력에 나온 전월 남은일과 후월 첫주 내용까지가 범위
							해당 값이 있으면 출석 없으면 미출석
							값의 규칙 : $tmpData = explode(',', date(Y,m,d))
							$tmpData[0] : Y
							$tmpData[1] : m
							$tmpData[2] : d
							DB 에서 조회한 값이 위의 세 가지가 모두 만족하면 출석이 된다.
							이전달에서도 조회가 되어야 한다.
							
							**********************************************************
							도장(출석)이 7개 연속일 경우 개근으로 한다.
							- 1) 월요일인 날짜값을 체크
							- 2) 월요일인 날짜의 월에 해당하는 마지막 날짜 수집
							---- 예) 
							-------- 2월 : 28일 또는 29일 
							-------- 1,3,5,7,8,10,12월 31일 
							-------- 4,6,9,11월 30일
							- 3) 월요일 이후의 토요일 날짜값을 구한다.
							공식 : 월요일 날짜인 달의 마지막 날짜 - 월요일 날짜 
							-------- lastday - monday-date > 
							- 3) 월요일 이후의 일요일 날짜값을 구한다.
							**********************************************************

							로그인 시 개근일 경우 자동으로 쿠폰 지급
							- g5_shop_coupon 테이블 연동(DB Insert)
						*/
						// 이번달이라면 
						// 오늘 날짜에 배경 적용
						if ( $startDay <= $cellIndex && $nowDayCount <= $days ) {
							$toDayClass = ($toDay[0] == $year && $toDay[1] == $month && $toDay[2] == $nowDayCount) ? ' today' : '';
					?> 
						<td class="p6<?php echo $toDayClass; ?>" align="center">
							<input type="hidden" id="daily_<?php echo $year.sprintf("%02d", $month).sprintf("%02d", $nowDayCount); ?>" value="<?php echo $year.sprintf("%02d", $month).sprintf("%02d", $nowDayCount); ?>">
							<input type="hidden" class="week" value="<?php echo($doms[$cols]); ?>">
							<input type="hidden" class="week-num" value="<?php echo($cols); ?>">
							<div class="daily-box">
							<?php
								if ( date( "w", mktime( 0, 0, 0, $month, $nowDayCount, $year ) ) == 6 ) {
									echo '<span class="daily blue">';
									echo $nowDayCount++;
									echo '</span>';
								} else if ( date( "w", mktime( 0, 0, 0, $month, $nowDayCount, $year ) ) == 0 ) {
									echo '<span class="daily red">';
									echo $nowDayCount++;
									echo '</span>';
								} else {
									echo '<span class="daily">';
									echo $nowDayCount++;
									echo '</span>';
								}
							?>
							</div>
						</td>
					<?php
						// 이전달이라면 
						} else if ( $cellIndex < $startDay ) {
					?> 
						<td class="p6" align="center">
							<?php
								if(sprintf('%02d', $month) == '01') {
									$prev_year = $year - 1;
								} else {
									$prev_year = $year;
								}
								if($month == '01') {
									$prev_month = '12';
								} else {
									$prev_month = $month - 1;
								}
								$tmpPrevDayCount = sprintf("%02d", $prevDayCount);

								$prevDateTime = $prev_year.sprintf("%02d", $prev_month).$tmpPrevDayCount;
							?>
							<input type="hidden" id="daily_<?php echo $prevDateTime; ?>" value="<?php echo $prevDateTime; ?>">
							<input type="hidden" class="week" value="<?php echo($doms[$cols]); ?>">
							<input type="hidden" class="week-num" value="<?php echo($cols); ?>">
							<div class="daily-box">
								<!-- <?php echo $month; ?> -->
								<span class="prev-date daily"><?php echo $prevDayCount++; ?></span>
							</div>
						</td> 	
					<?php
						// 다음달 이라면 
						} else if ( $cellIndex >= $days ) {
					?>
						<td class="p6" align="center">
							<?php
								if($month == '12') {
									$next_year = $year + 1;
								} else {
									$next_year = $year;
								}
								if($month == '12') {
									$next_month = '01';
								} else {
									$next_month = $month + 1;
								}
								$tmpNextDayCount = sprintf("%02d", $nextDayCount);

								$nextDateTime = $next_year.sprintf("%02d", $next_month).sprintf("%02d", $tmpNextDayCount);
							?>
							<input type="hidden" id="daily_<?php echo $nextDateTime; ?>" value="<?php echo $nextDateTime; ?>">
							<input type="hidden" class="week" value="<?php echo($doms[$cols]); ?>">
							<input type="hidden" class="week-num" value="<?php echo($cols); ?>">
							<div class="daily-box">
								<span class="next-date daily"><?php echo $nextDayCount++; ?></span>
							</div>
						</td> 
					<?php
						} 
					} // END for $cols
					?>
				</tr>
				<?php
				} // END for $rows
				?>
			</tbody>
		</table>
	</div>

<?php
	$sql = "SELECT CONCAT(attend_year, '-', attend_month, '-', attend_date) AS attend_day FROM {$g5['g5_shop_attendance_table']} WHERE CONCAT(attend_year, '-', attend_month, '-', attend_date) = '$attend_date' AND mb_id = '$mb_id'";
	$row = sql_fetch($sql);
	if($toDay[1] == $month) {
		if(!empty($row)) {
			//$disabled = ' disabled="disabled"';
		}
?>
<div class="container">
	<form method="post" action="attendance_update.php">
		<input type="hidden" name="attend_date" value="<?php echo $attend_date; ?>">
		<input type="hidden" name="mb_id" value="<?php echo $mb_id; ?>">
		<div class="form-group">
			<div class="input-group text-center">
				<div class="btn-group ml-auto mr-auto mt-4">
					<button type="submit" class="btn btn-primary"<?php echo $disabled; ?>>출석하기</button>
				</div>
			</div>
		</div>
		
		<?php // echo "//".$row['attend_day']; ?>
	</form>
</div>

<?php
	}
?>
<div>
	개발 기획안
	<ol>
		<li>
			출석하기 버튼을 노출 여부는?
			<ul>
				<li>
					오늘 날짜가 포함된 월일때만 출석하기 버튼을 노출할 것인가?
				</li>
				<li>
					오늘 날짜가 아닌 월에도 버튼을 노출할 것인가?
					<ul>
						<li>
							버튼 노출시 활성화 할 것인가?
						</li>
						<li>
							버튼 노출시 비 활성화 할 것인가?
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<li>
			주별로 개근 체크를 하는가?
			<ul>
				<li>
					개근 체크시 시작 주는 언제로 할 것인가?
				</li>
				<li>
					개근은 전체 7일을 전부 개근해야 한다.
				</li>
				<li>
					개근은 전체 7일중 일요일을 제외한 6일을 개근해야 한다.(시작주는 일요일 또는 월요일)
				</li>
				<li>
					개근은 전체 7일중 토요일, 일요일을 제외한 5일을 개근해야 한다.(시작주는 일요일 또는 월요일)
				</li>
			</ul>
		</li>
		<li>
			월별로 개근 체크를 하는가?
			<ul>
				<li>
					개근일을 해당 월 전체 날짜로 한다.
				</li>
				<li>
					개근일을 해당 월 전체 날짜중 몇일이상 개근시로 한다.
				</li>
			</ul>
		</li>
		<li>
			연별로 개근 체크를 하는가?
			<ul>
				<li>
					365일 전부 개근해야 개근이다.
				</li>
				<li>
					한다면 365일중 몇일을 기준 개근하면 개근이다.( 예 : 300일 )
				</li>
			</ul>
		</li>
	</ol>
</div>
<?php
$sql = "SELECT attend_id, attend_year, attend_month, attend_date, mb_id 
			FROM g5_shop_attendance 
			WHERE 
				(attend_year = '$to_y' AND attend_month = '$to_m') 
				OR 
				(attend_year = '$yy' AND attend_month = '$ym') 
				AND 
				mb_id = '$mb_id'";
$res = sql_query($sql);
$cnt = sql_num_rows($res);
$attend_date_arr = array();
if($cnt > 0) {
	while ($row = sql_fetch_array($res)) {
		$attendance_days = $row['attend_year'].$row['attend_month'].$row['attend_date'];
		echo '<input type="hidden" class="temp_attendance" value="'.$attendance_days.'" />';
	}
} else {
	echo '<h1>글이 없습니다.</h1>';
}
//print_r($attend_date_arr);
?>

<script>
(function($) {
	jQuery('.prev-date, .next-date').closest('td').find('.week').each(function() {
		if(jQuery(this).val() == '일') {
			jQuery(this).closest('td').find('.prev-date,.next-date').addClass('red');
		} else if(jQuery(this).val() == '토') {
			jQuery(this).closest('td').find('.prev-date,.next-date').addClass('blue');
		} else {
			jQuery(this).addClass('gray');
		}
	});
	var year = new Array(
		'<?php echo $prev_year; ?>',
		'<?php echo $year; ?>',
		'<?php echo $next_year; ?>'
	);
	var month = new Array(
		'<?php echo sprintf("%02d", $prev_month); ?>',
		'<?php echo sprintf("%02d", $month); ?>',
		'<?php echo sprintf("%02d", $next_month); ?>'
	);

	$.ajax({
		url: "./daily-json.php",
		type: "post",
		data: 
		{
			year : year,
			month : month
		},
		dataType: "json",
		cache: false,
		timeout: 30000,
		success: function(data) {
			//debugger;
			console.log(data);
			console.log(data.length);
			for(var i = 0; i < data.length; i++) {
				if(data[i].response.body.totalCount > 0) {
					var jsonItem = data[i].response.body.items.item;
					var jsonItemCount = data[i].response.body.totalCount;

 					jQuery('.daily-table').find('input[id^="daily_"]').each(function() {
						var dateCompare = jQuery(this).val();
						var holidate = jQuery(this).val().substring(4);
						console.log('holidate :: ' + holidate);
						/* BIGIN :: totalCount 가 1 이면 단일객체 처리 */
						if(jsonItemCount == 1) {
							if(dateCompare == jsonItem.locdate) {
								jQuery(this).parent().find('.daily').addClass('red');
								jQuery(this).parent().find('.daily').parent().append('<span class="date-name red">(' + jsonItem.dateName + ')<span>');
								jQuery('.date-name').each(function() {
									var dailyNum = jQuery(this).parent().find('.daily');
									if(dailyNum.hasClass('prev-date') == true) {
										jQuery(this).addClass('prev-date');
									}
									if(dailyNum.hasClass('next-date') == true) {
										jQuery(this).addClass('next-date');
									}
								});
							}
						/* END :: totalCount 가 1 이면 단일객체 처리 */
						/* BIGIN :: totalCount 가 1 보다 크면 배열객체 처리 */
						} else if(jsonItemCount > 1) {
							for(var i = 0; i < jsonItemCount; i++) {
								if(dateCompare == jsonItem[i].locdate) {
									jQuery(this).parent().find('.daily').removeClass('blue').addClass('red');
									jQuery(this).parent().find('.daily').parent().append('<span class="date-name red">(' + jsonItem[i].dateName + ')<span>');
									jQuery('.date-name').each(function() {
										var dailyNum = jQuery(this).parent().find('.daily');
										if(dailyNum.hasClass('prev-date') == true) {
											jQuery(this).addClass('prev-date');
										}
										if(dailyNum.hasClass('next-date') == true) {
											jQuery(this).addClass('next-date');
										}
									});
								}
							}
						}
						/* END :: totalCount 가 1 보다 크면 배열객체 처리 */
						/* BIGIN :: Change of the holidate name */
						switch(holidate) {
							case '1225' : 
								// *** passing value : 기독탄신일 => (christmas) 로 변경 ***
								jQuery(this).closest('td').find('.date-name').text('(Christmas)');
							break;
							case '0101' : 
								// *** passing value : 1월1일 => (신정) 으로 변경 ***
								jQuery(this).closest('td').find('.date-name').text('(신정)');
							break;
							default : 
								// 
							break;
						}
						/* END :: Change of the holidate name */
					});
				}
			}
		},
		error: function(xhr, textStatus, errorThrown) {
			$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
		}
	});
	/* BIGIN :: Create arrendance stamp */
	var attendance_spamp = '<span class="stamp"></span>';
	jQuery('.temp_attendance').each(function() {
		var temp_value = jQuery(this).val();
		jQuery('.daily-table').find('input[id^="daily_"]').each(function() {
			var daily_value = jQuery(this).val();
			if(temp_value == daily_value) {
				jQuery(this).closest('td').find('.daily-box').append(attendance_spamp);
			}
		});
	});
	/* END :: Create arrendance stamp */
})(jQuery);
</script>
<?php
} else {
?>
<div class="no-login">
	<span>로그인 또는 회원가입후 출석체크가 가능합니다.</span>
</div>
<?php
}
?>
