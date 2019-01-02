<?php
$sub_menu = '500310';
include_once('./_common.php');

auth_check($auth[$sub_menu], "w");

$ev_id = preg_replace('/[^0-9]/', '', $ev_id);

$html_title = "이벤트최근게시물";
$g5['title'] = $html_title.' 관리';

if ($w == "u") {
	$html_title .= " 수정";
	$readonly = " readonly";

	$sql = " SELECT * FROM {$g5['g5_shop_event_latest_table']} WHERE ev_id = '$ev_id' ";
	$ev = sql_fetch($sql);
	if (!$ev['ev_id'])
		alert("등록된 자료가 없습니다.");
} else {
	$html_title .= " 입력";
	$ev['ev_use'] = 1;
	$ev['ev_latest_col'] = 1;
	$ev['ev_latest_row'] = 1;
	$ev['ev_latest_list_id'] = '';
}

include_once (G5_ADMIN_PATH.'/admin.head.php');
?>
<style>
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -7px;
    margin-left: -7px;
}
.row *[class^="col-"] {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 7px;
    padding-left: 7px;
}
.col-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
}
.col-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
}

.img-fluid {
    max-width: 100%;
}
.choice {
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}
.choice label {
	display: block;
	padding: 10px 0;
}
.choice img {
	margin-top: 10px;
}
</style>
<form name="feventform" action="./itemeventlatestformupdate.php" onsubmit="return feventform_check(this);" method="post" enctype="MULTIPART/FORM-DATA">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="ev_id" value="<?php echo $ev_id; ?>">

<div class="tbl_frm01 tbl_wrap">
	<table>
		<caption><?php echo $g5['title']; ?></caption>
		<colgroup>
			<col class="grid_4">
			<col>
		</colgroup>
		<tbody>
			<?php if ($w == "u") { ?>
			<tr>
				<th>이벤트번호</th>
				<td>
					<span class="frm_ev_id"><?php echo $ev_id; ?></span>
					<a href="<?php echo G5_SHOP_URL; ?>/event.php?ev_id=<?php echo $ev['ev_id']; ?>" class="btn_frmline">이벤트바로가기</a>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<th scope="row"><label for="ev_latest_col">사용여부</label></th>
				<td>
					<input type="radio" name="ev_use" id="ev_use1" value="1" <?php echo ($ev['ev_use'] == 1) ? 'checked' : ''; ?>> <label for="ev_use1">사용</label>
					<input type="radio" name="ev_use" id="ev_use2" value="0" <?php echo ($ev['ev_use'] == 0) ? 'checked' : ''; ?>> <label for="ev_use2">비사용</label>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ev_latest_col">한 줄당 개수</label></th>
				<td>
					<select name="ev_latest_col" id="ev_latest_col">
						<option value="1" <?php echo ($ev['ev_latest_col'] == 1) ? 'selected' : ''; ?>>1</option>
						<option value="2" <?php echo ($ev['ev_latest_col'] == 2) ? 'selected' : ''; ?>>2</option>
						<option value="3" <?php echo ($ev['ev_latest_col'] == 3) ? 'selected' : ''; ?>>3</option>
						<option value="4" <?php echo ($ev['ev_latest_col'] == 4) ? 'selected' : ''; ?>>4</option>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ev_latest_row">라인 수</label></th>
				<td>
					<input type="text" name="ev_latest_row" value="<?php echo $ev['ev_latest_row']; ?>" id="ev_latest_row" required class="required frm_input" size="30">
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="ev_latest_list_id">이벤트 종류</label></th>
				<td>
					<div class="ev_latest_list_id">
						<span class="ev_latest_list_value"><span><?php echo $ev['ev_latest_list_id']; ?></span></span>
						<input type="hidden" id="ev_latest_list_id" name="ev_latest_list_id[]" value="<?php echo $ev['ev_latest_list_id']; ?>">
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="btn_fixed_top">
	<a href="./itemevent.php" class="btn btn_02">목록</a>
	<input type="submit" value="확인" class="btn_submit btn" accesskey="s">
</div>
</form>
<script>
(function($) {
	function call_ajax(values) {
		$.ajax({
			url: "./itemeventlatestlist.ajax.php",
			type: "post",
			data: 
				{
					ev_latest_list_id : values
				},
			dataType: "json",
			cache: false,
			timeout: 30000,
			success: function(data) {
				//debugger;
				console.log(data);
				var html = '';
				html += '<div class="row">';
				for(var i = 0; i < data.length; i++) {
					html += '<div class="col-2 text-center choice">';
					html += '<label for="ev_latest_list_select_' + i + '">';
					html += '<input type="checkbox" name="ev_latest_list_id[]" class="ev_latest_list_select" value=' + data[i].ev_id + ' id="ev_latest_list_select_' + i + '" /> ';
					html += '<img src="<?php echo G5_DATA_URL; ?>/event/' + data[i].ev_id + '_m" alt="' + data[i].ev_subject + '" class="img-fluid" />';
					html += '</label>';
					html += '<label for="ev_latest_list_select_' + i + '">';
					html += data[i].ev_subject;
					html += '</label>';
					html += '</div>';
				}
				html += '</div>';
				/*
				html += '<select name="ev_latest_list_id[]" class="ev_latest_list_select">';
				html += '<option value="">이벤트 선택</option>';
				for(var i = 0; i < data.length; i++) {
					html += '<option value=' + data[i].ev_id + '>' + data[i].ev_subject + '</option>';
				}
				//for()
				html += '</select>';
				*/
				jQuery('.ev_latest_list_id').append(html);
			},
			error: function(xhr, textStatus, errorThrown) {
				$("div").html("<div>" + textStatus + " (HTTP-" + xhr.status + " / " + errorThrown + ")</div>" );
			}
		});
	}
	v = jQuery('#ev_latest_list_id').val();
	call_ajax(v);
	jQuery(document).on('change', '.ev_latest_list_select', function() {
		//
		call_ajax(full_value);
	});
})(jQuery);
/* document.feventform.ev_subject.focus(); 포커스해제*/
</script>
<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
