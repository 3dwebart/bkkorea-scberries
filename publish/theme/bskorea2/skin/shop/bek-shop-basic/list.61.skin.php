<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/custom-style.css">', 0);
?>

<!-- 상품진열 50 시작 { -->
<style>
.sct.sct_10.cate-list.sct_60 li.sct_li {
	width: <?php echo $this->img_width; ?>px;
}
</style>
<?php
$type = $_GET['type'];
echo '<div class="list-wrap">';
echo '<div class="container">';
if(!empty($type)) {
	echo('<h3 class="list-title">'.$g5['title'].'</h3>');
}
echo '<div class="row-8">';
for ($i=1; $row=sql_fetch_array($result); $i++) {
	/*
	if ($this->list_mod >= 2) { // 1줄 이미지 : 2개 이상
		if ($i%$this->list_mod == 0) $sct_last = 'sct_last'; // 줄 마지막
		else if ($i%$this->list_mod == 1) $sct_last = 'sct_clear'; // 줄 첫번째
		else $sct_last = '';
	} else { // 1줄 이미지 : 1개
		$sct_last = 'sct_clear';
	}

	if ($i == 1) {
		if ($this->css) {
			echo "<ul class=\"{$this->css}\">\n";
		} else {
			echo "<ul class=\"sct sct_10 cate-list sct_60\">\n";
		}
	}
	*/
	switch($this->list_mod) {
		case 1 : $colCLass = 'col-12';
		break;
		case 2 : $colCLass = 'col-6';
		break;
		case 3 : $colCLass = 'col-4';
		break;
		case 4 : $colCLass = 'col-3';
		break;
		case 6 : $colCLass = 'col-2';
		break;
		case 12 : $colCLass = 'col-1';
		break;
		default : $colCLass = 'col';
		break;
	}

	echo '<div class="'.$colCLass.'">'.PHP_EOL;

	echo "<div class=\"sct_img\">\n";

	if ($this->href) {
		echo "<a href=\"{$this->href}{$row['it_id']}\">\n";// data-toggle=\"tooltip\" title=\"{$row['it_name']}\"
	}

	if ($this->view_it_img) {
		echo get_it_image_responsive($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
	}

	if ($this->href) {
		echo "</a>\n";
	}

	/*
	if ($this->view_sns) {
		$sns_top = $this->img_height + 10;
		$sns_url  = G5_SHOP_URL.'/item.php?it_id='.$row['it_id'];
		$sns_title = get_text($row['it_name']).' | '.get_text($config['cf_title']);
		echo "<div class=\"sct_sns\">";
		echo get_sns_share_link('facebook', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/facebook.png');
		echo get_sns_share_link('twitter', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/twitter.png');
		echo get_sns_share_link('googleplus', $sns_url, $sns_title, G5_SHOP_SKIN_URL.'/img/gplus.png');
		echo "</div>\n";
	}
	*/

	echo "</div>\n";

	if ($this->view_it_id) {
		echo "<div class=\"sct_id\">&lt;".stripslashes($row['it_id'])."&gt;</div>\n";
	}

	if ($this->href) {
		echo "<div class=\"sct_txt\"><a href=\"{$this->href}{$row['it_id']}\">\n";// data-toggle=\"tooltip\" title=\"{$row['it_name']}\"
	}

	if ($this->view_it_name) {
		echo stripslashes($row['it_name'])."\n";
	}

	if ($this->href) {
		echo "</a></div>\n";
	}

	if ($this->view_it_cust_price || $this->view_it_price) {

		echo "<div class=\"sct_cost\">\n";

		if ($this->view_it_cust_price && $row['it_cust_price']) {
			echo "<span class=\"sct_discount\">".display_price($row['it_cust_price'])."</span>\n";
		}

		if ($this->view_it_price) {
			echo display_price(get_price($row), $row['it_tel_inq'])."\n";
		}

		echo "</div>\n";

	}

	if ($this->view_it_basic && $row['it_basic']) {
		echo "<div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
	}

	if ($this->view_it_icon) {
		//echo "<div class=\"sct_icon\">".item_icon($row)."</div>\n";
	}


	
	echo "</div>\n";
}

//if ($i > 1) echo "</ul>\n";

if($i == 1) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
echo "</div>"; // END of row
echo "</div>"; // END of container
echo "</div>"; // END of list-wrap
?>
<!-- } 상품진열 10 끝 -->
<script>
(function($) {
	$('[data-toggle="tooltip"]').tooltip();
})(jQuery);
</script>