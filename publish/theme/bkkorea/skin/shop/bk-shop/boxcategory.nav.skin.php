<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
?>

<!-- 쇼핑몰 카테고리 시작 { -->
<nav id="gnb">
	<h2 class="sr_only">쇼핑몰 카테고리</h2>
	<div class="row m-0">
		<?php
		// 1단계 분류 판매 가능한 것만
		$ca1_id = array();
		$ca2_id = array();
		$ca2_link = array();
		$hsql = " SELECT ca_id, ca_name, ca_1 
					FROM {$g5['g5_shop_category_table']} 
					WHERE length(ca_id) = '2' 
					AND ca_use = '1' 
					ORDER BY ca_order, ca_id ";
		$hresult = sql_query($hsql);
		$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
		echo '<div class="nav flex-column nav-pills col-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">';
		for ($i=0; $row=sql_fetch_array($hresult); $i++) {
			$gnb_zindex -= 1; // html 구조에서 앞선 gnb_1dli 에 더 높은 z-index 값 부여
			// 2단계 분류 판매 가능한 것만
			$sql2 = " SELECT ca_id, ca_name 
						FROM {$g5['g5_shop_category_table']} 
						WHERE LENGTH(ca_id) = '4' 
						AND SUBSTRING(ca_id,1,2) = '{$row['ca_id']}' 
						AND ca_use = '1' 
						ORDER BY ca_order, ca_id ";
			$result2 = sql_query($sql2);
			$count = sql_num_rows($result2);
			//if($count > 0) {
			$link_tag_class = ' class="nav-link gnb_1da gnb_1dam"';
			$ca2_link[$i] = array(
				'ca_id' => $row['ca_id'],
				'target_id' => 'v-pills-'.$i.'-tab',
				'target_link' => 'v-pills-'.$i,
				'aria_selected' => 'false',
				'link' => G5_SHOP_URL.'/list.php?ca_id='.$row['ca_id']
			);
			echo '<a '.$link_tag_class.' id="'.$ca2_link[$i]['target_id'].'" data-toggle="pill" href="#'.$ca2_link[$i]['target_link'].'" role="tab" aria-controls="'.$ca2_link[$i]['target_link'].'" aria-selected="'.$ca2_link[$i]['aria_selected'].'" data-link="'.$ca2_link[$i]['link'].'" data-id="'.$ca2_link[$i]['ca_id'].'">';
			echo $row['ca_name'];
			echo '</a>';
			// } else {
			// 	$link_tag_class = ' class="gnb_1da"';
			// 	echo '<a href="'.G5_SHOP_URL.'/list.php?ca_id='.$row['ca_id'].'"'.$link_tag_class.' data-id="'.$row['ca_id'].'">';
			// 	echo $row['ca_name'];
			// 	echo '</a>';
			// }
			//if($count > 0) {
			if(!empty($row['ca_1'])) {
				$bgImg = ' style="background-image:url('.G5_DATA_URL.'/'.$row['ca_1'].')"';
				$bgImg = ''; // 이미지 배경으로 안씀
			} else {
				$bgImg = '';
			}
			$ca2_id[$i] = '<div class="tab-pane fade" id="'.$ca2_link[$i]['target_link'].'" role="tabpanel" aria-labelledby="'.$ca2_link[$i]['target_id'].'">';
			$ca2_id[$i] .= '<div class="row-8">';
			$ca2_id[$i] .= '<div class="col-8">';
			$ca2_id[$i] .= '<div class="row-8 sub-nav-group">';
			if($count > 0) {
				$ca2_id[$i] .= '<div class="col-4">';
				$ca2_id[$i] .= '<a href="'.G5_SHOP_URL.'/list.php?ca_id='.$row['ca_id'].'">';
				$ca2_id[$i] .= '전체상품보기';
				$ca2_id[$i] .= '</a>';
				$ca2_id[$i] .= '</div>';
				for ($j=0; $row2=sql_fetch_array($result2); $j++) {
					//if ($j==0) echo '<ul class="sub-nav1 col-9">';
					$ca2_id[$i] .= '<div class="col-4">';
					$ca2_id[$i] .= '<a href="'.G5_SHOP_URL.'/list.php?ca_id='.$row2['ca_id'].'">';
					$ca2_id[$i] .= $row2['ca_name'];
					$ca2_id[$i] .= '</a>';
					$ca2_id[$i] .= '</div>';
				} // END for(SUB - Step 2)
			}
			$ca2_id[$i] .= '</div>'; // END :: row
			$ca2_id[$i] .= '</div>'; // END :: col-8
			$ca2_id[$i] .= '<div class="col-4 img-area" '.$bgImg.'>';
			$ca2_id[$i] .= '</div>';
			$ca2_id[$i] .= '</div>'; // END row
			$ca2_id[$i] .= '</div>'; // END tab-pane
			//} // END if
		} // } END for
		echo '</div>';
		echo '<div class="tab-content col-9" id="v-pills-tabContent">';
		for ($i=0; $i < count($ca2_id); $i++) { 
			echo $ca2_id[$i];
		}
		echo '</div>';
		?>
		
	</div>
</nav>
<script>
(function($) {
	/* BIGIN :: Main tab menus of all menu */
	jQuery('#v-pills-tab > a').hover(function() {
		var nameID = jQuery(this).attr('href');
		var imgBG = '<?php echo G5_DATA_URL.'/mainimg/' ?>' + jQuery(this).data('id');

		jQuery(this).addClass('active');
		jQuery(this).siblings().removeClass('active');
		jQuery('#v-pills-tabContent')
			.find(nameID)
			.addClass('show active');
		jQuery('#v-pills-tabContent')
			.find(nameID)
			.siblings().removeClass('show active');

	}, function() {
		jQuery('.tab-content').on('mouseover', function() {})
	});
	jQuery('#v-pills-tab > a').on('click', function() {
		var link = jQuery(this).data('link');
		window.location.href = link;
	});
	/* END :: Main tab menus of all menu */
})(jQuery);
</script>
<!-- } 쇼핑몰 카테고리 끝 -->