<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/custom-style.css">', 0);
?>
<!-- 상품진열 10 시작 { -->
<?php
for ($i=1; $row=sql_fetch_array($result); $i++) {
	if ($this->list_mod >= 2) { // 1줄 이미지 : 2개 이상
		if ($i%$this->list_mod == 0) $sct_last = 'sct_last'; // 줄 마지막
		else if ($i%$this->list_mod == 1) $sct_last = 'sct_clear'; // 줄 첫번째
		else $sct_last = '';
	} else { // 1줄 이미지 : 1개
		$sct_last = 'sct_clear';
	}

	if ($i == 1) {
		/*
		if ($this->css) {
			echo "<ul class=\"{$this->css}\">\n";
		} else {
			echo "<ul class=\"sct sct_10 sct_60\">\n";
		}
		*/
		echo '<div class="row-8 sct_10">';
	}
	
	switch($this->list_mod) {
		case 1 : $colClass = 'col-12';
		break;
		case 2 : $colClass = 'col-6';
		break;
		case 3 : $colClass = 'col-4';
		break;
		case 4 : $colClass = 'col-3';
		break;
		case 6 : $colClass = 'col-2';
		break;
		case 12 : $colClass = 'col-1';
		break;
		default : $colClass = 'col';
		break;
	}
	
	

	//echo "<li class=\"sct_li border-box {$sct_last}\" style=\"width:{$this->img_width}px\">\n";
	echo '<div class="'.$colClass.'">'.PHP_EOL;
	echo "<div class=\"border-box\">\n";

	echo "<div class=\"sct_img\">\n";

	if ($this->href) {
		echo "<a href=\"{$this->href}{$row['it_id']}\">\n";
	}

	if ($this->view_it_img) {
		echo get_it_image_responsive($row['it_id'], $this->img_width, $this->img_height, '', '', stripslashes($row['it_name']))."\n";
	}

	if ($this->href) {
		echo "</a>\n";
	}

	echo '<div class="img-mask"></div>';

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
		echo "<div class=\"sct_txt\"><a href=\"{$this->href}{$row['it_id']}\">\n";
	}


	if ($this->view_it_name) {
		echo stripslashes($row['it_name'])."\n";
	}

	if ($this->href) {
		echo "</a></div>\n";
	}

	if ($this->view_it_basic && $row['it_basic']) {
		// 간단설명
		//echo "<div class=\"sct_basic\">".stripslashes($row['it_basic'])."</div>\n";
	}

	if ($this->view_it_cust_price || $this->view_it_price) {
		echo "<div class=\"sct_cost\">\n";
		if ($this->view_it_cust_price && $row['it_cust_price']) {
			// 시중 판매가
			//echo "<span class=\"sct_discount\">".display_price($row['it_cust_price'])."</span>\n";
		}
		if ($this->view_it_price) {
			// 판매가
			echo display_price(get_price($row), $row['it_tel_inq'])."\n";
		}
		echo "</div>\n";
	}

	if ($this->view_it_icon) {
		//echo "<div class=\"sct_icon\">".item_icon($row)."</div>\n";
	}


	
	//echo "</li>\n";
	echo "</div>\n";
	echo "</div>\n";
}

//if ($i > 1) echo "</ul>\n";
if ($i > 1) echo "</div><!-- END :: row-8 -->\n"; // /row-8

if($i == 1) echo "<p class=\"sct_noitem\">등록된 상품이 없습니다.</p>\n";
?>
<!-- } 상품진열 10 끝 -->
<script>
(function($) {
    $('.sct_10 .col-4 .sct_img').each(function() {
        $(this).on('mouseenter', function() {
            $(this).find('.img-mask').addClass('on');
        });
        $(this).on('mouseleave', function() {
            $(this).find('.img-mask').removeClass('on');
        });
        $(this).find('.img-mask').on('click', function() {
            var link = $(this).parent().find('a').attr('href');
            $(location).attr('href', link);
        });
    });
})(jQuery);	
</script>