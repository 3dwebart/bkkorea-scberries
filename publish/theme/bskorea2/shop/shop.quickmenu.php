<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if(G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
	return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_PATH.'/language/language-control.php');
$languagePack = G5_URL.'/language/frontend/common/top-search-logo/'.$_COOKIE['selLanguage'].'.php';
?>
<link rel="stylesheet" href="/css/magnific-popup.css" />
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Noto+Sans+KR" rel="stylesheet">
<style class="js-control-nav">
.cate-main-nav > li > ul > li:first-child::after { top: 0px; }
</style>
<script src="/js/jquery.magnific-popup.js"></script>
<script>
$(function () {
	$(".btn_sidemenu_cl").on("click", function() {
		$(".side_menu_wr").toggle();
		$(".fa-outdent").toggleClass("fa-indent")
	});

	$(".btn_side_shop").on("click", function() {
		$(this).next(".op_area").slideToggle(300).siblings(".op_area").slideUp();
	});

	$('.select-language > a').on('mouseover', function() {
		$(this).parent().find('ul').addClass('active');
	});

	/*
		== Category menus ==
		subTop : 각 메뉴의 서브메뉴의 top 값
		subCnt(Sub menu count) : 서브메뉴(ul)가 있는지 확인 - 0이면 없음
	*/
	var mainNav = $('.cate-main-nav > li');
	var subTop = 0;
	var navPosCSS = '';
	var enter = '\n\r';

	var i = 0;
	var mainCnt = 0;
	mainNav.each(function() {
		subTop = (i * 38) * -1;
		subAfterTop = (i * 38);
		subCnt = $(this).find('ul').length;
		mainCnt = i + 1;

		if(subCnt > 0) {
			$(this).find('.cate-sub-nav').css({
				top: subTop
			});
			navPosCSS += '.cate-main-nav > li:nth-child(' + (i + 1) + ') > ul > li:first-child::after { top: ' + subAfterTop + 'px; }';
			// it at last style sheet do not enter key
			if(mainNav.length > mainCnt) {
				navPosCSS += enter;
			}
			
		}
		$('.js-control-nav').text(navPosCSS);
		i++;
	});

	$(document).on('keydown', function(e) {
		var key = e.keyCode;
		var target = $('.cate-nav');
		if(target.hasClass('on') == true) {
			if(key == 27) {
				target.removeClass('on');
			}
		}
	});

	var x = 0;
	$(document).on('click', '.nav-in-search a', function() {
		$(this).parent().find('#hd_sch').toggle();
		x = (x - 1) * -1;
		if(x == 1) {
			$(this).find('i').removeClass('fa-search');
			$(this).find('i').addClass('fa-close');
		} else {
			$(this).find('i').removeClass('fa-close');
			$(this).find('i').addClass('fa-search');
		}
	});
});
</script>
<!-- 상단 시작 { -->
<!-- BIGIN :: top -->
<input type="hidden" value="" class="lang">

<div id="quick">
	<?php
		if(defined('_INDEX_')) { // index에서만 실행
			include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
		}
	?>
	
	<div id="quick_menu">
		<div class="card">
			<div class="card-header" id="today">
				<h5 class="mb-0">
					<button class="btn btn-secondary btn-block" data-toggle="collapse" data-target="#todayMenu" aria-expanded="true" aria-controls="todayMenu">
						<span class="today">오늘본상품</span>
						<span class="count"><?php echo get_view_today_items_count(); ?></span>
					</button>
				</h5>
			</div>
			<div id="todayMenu" class="collapse show" aria-labelledby="today" data-parent="#quick_menu">
				<div class="card-body">
					<?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php'); // 오늘 본 상품 ?>
				</div>
			</div>
		</div>
		
		<div class="card">
			<div class="card-header" id="basket">
				<h5 class="mb-0">
					<button class="btn btn-secondary btn-block collapsed" data-toggle="collapse" data-target="#basketMenu" aria-expanded="false" aria-controls="basketMenu">
						<span class="shoppingBasket">장바구니</span>
						<span class="count"><?php echo get_boxcart_datas_count(); ?></span>
					</button>
				</h5>
			</div>
			<div id="basketMenu" class="collapse" aria-labelledby="basket" data-parent="#quick_menu">
				<div class="card-body">
					<?php include_once(G5_SHOP_SKIN_PATH.'/boxcart.skin.php'); // 장바구니 ?>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header" id="wishlist">
				<h5 class="mb-0">
					<button class="btn btn-secondary btn-block collapsed" data-toggle="collapse" data-target="#wishlistMenu" aria-expanded="false" aria-controls="wishlistMenu">
						<span class="wishList">위시리스트</span>
						<span class="count"><?php echo get_wishlist_datas_count(); ?></span>
					</button>
				</h5>
			</div>
			<div id="wishlistMenu" class="collapse" aria-labelledby="wishlist" data-parent="#quick_menu">
				<div class="card-body">
					<?php include_once(G5_SHOP_SKIN_PATH.'/boxwish.skin.php'); // 위시리스트 ?>
				</div>
			</div>
		</div>
	</div>
</div>
