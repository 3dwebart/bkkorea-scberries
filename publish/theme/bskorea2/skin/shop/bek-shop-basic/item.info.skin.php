<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_CSS_URL.'/style.css">', 0);
?>
<style>
#sit_rel .bx-wrapper { max-width: 100% !important; }
#sit_rel .bx-wrapper ul li.sct_li { width: calc((1068px - 60px) / 4) !important; }
#sit_rel .bx-wrapper ul li.sct_li .sct_txt { font-size: 1.2rem; width: 100%; padding: 0 5px; text-align: left; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
#sit_rel .bx-wrapper ul li.sct_li .sct_cost { font-size: 1.2rem; padding: 0 5px; }
</style>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<?php
	if ($default['de_rel_list_use']) {

		$sql = " SELECT COUNT(b.it_id) AS cnt FROM {$g5['g5_shop_item_relation_table']} a 
					LEFT JOIN {$g5['g5_shop_item_table']} b ON (a.it_id2=b.it_id) 
					WHERE a.it_id = '{$it['it_id']}' AND b.it_use='1' ";
		$row = sql_fetch($sql);
		$cntRelItem = $row['cnt'];
		if($cntRelItem > 0) {
?>
<!-- 관련상품 시작 { -->
<div class="container">
	<section id="sit_rel">
	    <h2>관련상품</h2>
	    <?php
	    $rel_skin_file = $skin_dir.'/'.$default['de_rel_list_skin'];
	    if(!is_file($rel_skin_file)) {
	        $rel_skin_file = G5_SHOP_SKIN_PATH.'/'.$default['de_rel_list_skin'];
	    }
	
	    $sql = " SELECT b.* FROM {$g5['g5_shop_item_relation_table']} a 
	    			LEFT JOIN {$g5['g5_shop_item_table']} b ON (a.it_id2=b.it_id) 
	    			WHERE a.it_id = '{$it['it_id']}' AND b.it_use='1' ";
	    $list = new item_list($rel_skin_file, $default['de_rel_list_mod'], 0, $default['de_rel_img_width'], $default['de_rel_img_height']);
	    $list->set_query($sql);
	    echo $list->run();
	    ?>
	</section>
</div>
<!-- } 관련상품 끝 -->
<?php
		}
	}
?>

<!-- 상품 정보 시작 { -->
<section id="sit_inf">
    <h2>상품 정보</h2>
    <?php echo pg_anchor('inf'); ?>

    <?php if ($it['it_basic']) { // 상품 기본설명 ?>
    <h3>상품 기본설명</h3>
    <div id="sit_inf_basic">
         <?php echo $it['it_basic']; ?>
    </div>
    <?php } ?>

    <?php if ($it['it_explan']) { // 상품 상세설명 ?>
    <h3>상품 상세설명</h3>
    <div id="sit_inf_explan">
        <?php echo conv_content($it['it_explan'], 1); ?>
    </div>
    <!--
    <div class="chk-point tm-3 mb-3 text-center">
	    <img src="<?php echo G5_SHOP_SKIN_URL ?>/img/ico/chk_point.png" alt="check point" />
    </div>
    -->
    <?php } ?>
</section>
<!-- } 상품 정보 끝 -->

<section id="sit_deep_info">
	 <h2>상세 정보</h2>
	<?php echo pg_anchor('deep_info'); ?>
	<?php
    if ($it['it_info_value']) { // 상품 정보 고시
        $info_data = unserialize(stripslashes($it['it_info_value']));
        if(is_array($info_data)) {
            $gubun = $it['it_info_gubun'];
            $info_array = $item_info[$gubun]['article'];
    ?>
    <h3>상품 정보 고시</h3>
    <table id="sit_inf_open">
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
    <?php
		    foreach($info_data as $key=>$val) {
		        $ii_title = $info_array[$key][0];
		        $ii_value = $val;
    ?>
    <tr>
        <th scope="row"><?php echo $ii_title; ?></th>
        <td><?php echo $ii_value; ?></td>
    </tr>
    <?php
		    } //foreach
	?>
    </tbody>
    </table>
    <!-- 상품정보고시 end -->
    <?php
        } else {
            if($is_admin) {
                echo '<p>상품 정보 고시 정보가 올바르게 저장되지 않았습니다.<br>config.php 파일의 G5_ESCAPE_FUNCTION 설정을 addslashes 로<br>변경하신 후 관리자 &gt; 상품정보 수정에서 상품 정보를 다시 저장해주세요. </p>';
            }
        }
    } //if
    ?>
</section>

<!-- 사용후기 시작 { -->
<section id="sit_use">
    <h2>고객후기</h2>
    <?php echo pg_anchor('use'); ?>

    <div id="itemuse"><?php include_once(G5_SHOP_PATH.'/itemuse.php'); ?></div>
</section>
<!-- } 사용후기 끝 -->

<!-- 상품문의 시작 { -->
<section id="sit_qa">
    <h2>상품문의</h2>
    <?php echo pg_anchor('qa'); ?>

    <div id="itemqa"><?php include_once(G5_SHOP_PATH.'/itemqa.php'); ?></div>
</section>
<!-- } 상품문의 끝 -->


<?php /* 숨김

<?php if ($default['de_baesong_content']) { // 배송정보 내용이 있다면 ?>
<!-- 배송정보 시작 { -->
<section id="sit_dvr" class="text-center">
    <h2>배송정보</h2>
    <?php echo pg_anchor('dvr'); ?>
	<div class="w-900 align-center">
		<div class="row">
			<div class="col-4 text-center">
				<img src="<?php echo G5_SHOP_SKIN_URL ?>/img/ico/ico_delevery1.png" alt="" style="width: 30%;" />
				<span class="d-block mt-3 font-1rem">택배배송<br />20시 주문마감</span>
			</div>
			<div class="col-4 text-center">
				<img src="<?php echo G5_SHOP_SKIN_URL ?>/img/ico/ico_delevery2.png" alt="" style="width: 30%;" />
				<span class="d-block mt-3 font-1rem">물류창고에서<br />주문 상품 개별 포장</span>
			</div>
			<div class="col-4 text-center">
				<img src="<?php echo G5_SHOP_SKIN_URL ?>/img/ico/ico_delevery3.png" alt="" style="width: 30%;" />
				<span class="d-block mt-3 font-1rem">택배배송</span>
			</div>
		</div>
	</div>
    <?php // echo conv_content($default['de_baesong_content'], 1); ?>
</section>
<!-- } 배송정보 끝 -->
<?php } ?>


<?php if ($default['de_change_content']) { // 교환/반품 내용이 있다면 ?>
<!-- 교환/반품 시작 { -->
<section id="sit_ex">
    <h2>교환/반품</h2>
    <?php echo pg_anchor('ex'); ?>

    <?php echo conv_content($default['de_change_content'], 1); ?>
</section>
<!-- } 교환/반품 끝 -->
<?php } ?>

// 숨김
*/ ?>

<script>
$(window).on("load", function() {
    $("#sit_inf_explan").viewimageresize2();
});
$(document).ready(function() {
    $('.sanchor li a').click(function() {
        var tabLinkId = $(this).attr('href');
        var linkPos = $(tabLinkId).offset().top - 46;
        $("html, body").animate({ scrollTop: linkPos }, 600);
        return false;
    });
});
</script>