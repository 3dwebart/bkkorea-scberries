<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?>

<header id="hd">
    <?php if ((!$bo_table || $w == 's' ) && defined('_INDEX_')) { ?><h1><?php echo $config['cf_title'] ?></h1><?php } ?>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>
<!--
    <ul id="hd_mb">
        <li><a href="<?php echo G5_URL; ?>/">커뮤니티</a></li>
        <?php if ($is_member) { ?>
        <?php if ($is_admin) {  ?>
        <li><a href="<?php echo G5_ADMIN_URL ?>/shop_admin/"><b>관리자</b></a></li>
        <?php } else { ?>
        <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">정보수정</a></li>
        <?php } ?>
        <li><a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop">로그아웃</a></li>
        <?php } else { ?>
        <li><a href="<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo $urlencode; ?>">로그인</a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/register.php" id="snb_join">회원가입</a></li>
        <?php } ?>
        <li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">마이페이지</a></li>
    </ul>
-->
    <div id="hd_wr" class="mobile-header fixed">
	    <button type="button" id="btn_hdcate"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">분류</span></button>
        <div id="logo"><a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/mobile_logo_img" alt="<?php echo $config['cf_title']; ?> 메인"></a></div>
        <div>
	        <a href="#" class="mobile-search"><i class="fa fa-search"></i></a>
        	<a href="<?php echo G5_SHOP_URL; ?>/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sound_only">장바구니</span> <span class="cart-count"><?php echo get_boxcart_datas_count() != 0 ? get_boxcart_datas_count() : '' ; ?></span></a>
        </div>
        <form name="frmsearch1" action="http://scberries.cafe24.com/shop/search.php" onsubmit="return search_submit(this);" style="display: none;" class="hidden-search">
	        <aside id="hd_sch2">
	            <div class="sch_inner">
	                <h2>상품 검색</h2>
	                <label for="sch_str" class="sound_only">상품명<strong class="sound_only"> 필수</strong></label>
	                <input type="text" name="q" value="베리" id="sch_str2" required="" class="frm_input" placeholder="검색어를 입력해주세요">
	                <button type="submit" value="검색" class="sch_submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	            </div>
	        </aside>
        </form>
    </div>
    <?php include_once(G5_THEME_MSHOP_PATH.'/category.php'); // 분류 ?>

    <script>
    $( document ).ready( function() {
        var jbOffset = $( '#hd_wr' ).offset();
        $( window ).scroll( function() {
            if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '#hd_wr' ).addClass( 'fixed' );
            }
            else {
                $( '#hd_wr' ).removeClass( 'fixed' );
            }
        });
    });
   </script>
</header>
<div class="type-cate-nav">
	<a href="<?php echo ''.G5_SHOP_URL.'/listtype.php?type=3'; ?>"<?php echo $type == 3 ? ' class="on"' : ''; ?>>신상품</a>
	<a href="<?php echo ''.G5_SHOP_URL.'/listtype.php?type=5'; ?>"<?php echo $type == 5 ? ' class="on"' : ''; ?>>할인상품</a>
	<a href="<?php echo ''.G5_SHOP_URL.'/listtype.php?type=1'; ?>"<?php echo $type == 1 ? ' class="on"' : ''; ?>>히트상품</a>
</div>
<div id="container">
    <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_') && empty($type)) { ?>
    <h1 id="container_title"><?php echo $g5['title'] ?></h1>
    <?php } ?>
