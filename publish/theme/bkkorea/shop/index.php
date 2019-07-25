<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/index.php');
	return;
}
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
define("_INDEX_", TRUE);
include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>
<style class="banner-bg">
.banner { width: 100%; height: 240px; background-repeat: no-repeat; background-attachment: fixed; background-size: cover; background-position: center center; background-color: #fcfcfc; }
#banner1 { background-image: url('../img/index/banner1.jpeg'); }
#banner2 { background-image: url('../img/index/banner2.jpeg'); }
</style>
<!--
<h2>
	DELIVERY COMPANY = 
	<?php echo G5_DELIVERY_COMPANY; ?>
</h2>
-->
<!-- 메인이미지 시작 { -->
<?php //echo display_banner('메인', 'mainbanner.10.skin.php'); ?>
<!-- } 메인이미지 끝 -->
<h3>DEVICE :: <?php echo $device; ?></h3>
<div><?php print_r($_COOKIE); ?></div>
<div><?php echo G5_IS_MOBILE; ?></div>
<div class="row mb-4">
	<div class="col-6">
		<?php echo event_latest('1543996122'); ?>
	</div>
	<div class="col-6">
		<?php echo event_latest('1543996066'); ?>
	</div>
</div>
<div class="row mb-4">
	<div class="col-3">
		<?php echo event_latest('1544688534'); ?>
	</div>
	<div class="col-3">
		<?php echo event_latest('1544688493'); ?>
	</div>
	<div class="col-3">
		<?php echo event_latest('1544688421'); ?>
	</div>
	<div class="col-3">
		<?php echo event_latest('1544688298'); ?>
	</div>
</div>
<!--
	main_deco_banner(param)
	** 링크 관련
	1. : 링크여부
	2. : 메인 노출 타입
	-- 0) 타입 없음
	-- 1) 히트
	-- 2) 추천
	-- 3) 신상품
	-- 4) 인기
	-- 5) 할인
	3. : 카테고리 번호 : 위 타입이 0일 때 사용
	-- 기본값은 0
-->
<!-- <div class="banner" id="banner1"></div> -->
<?php if($default['de_type3_list_use']) { ?>
<!-- 최신상품 시작 { -->
<section class="sct_wrap">
	<header class="cate-title d-flex space-between">
		<h2>최신상품</h2>
		<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3" class="more"><i class="fa fa-plus"></i> more</a>
	</header>
	<?php
		main_deco_banner(3, 0, 'pc');

		$list = new item_list();
		$list->set_type(3);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
	?>
</section>
<!-- } 최신상품 끝 -->
<?php } ?>

<!-- <div class="banner" id="banner2"></div> -->
<?php if($default['de_type5_list_use']) { ?>
<!-- 할인상품 시작 { -->
<section class="sct_wrap">
	<header class="cate-title d-flex space-between">
		<h2>할인상품</h2>
		<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5" class="more"><i class="fa fa-plus"></i> more</a>
	</header>
	<?php
		main_deco_banner(5, 0, 'pc');

		$list = new item_list();
		$list->set_type(5);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
	?>
</section>
<!-- } 할인상품 끝 -->
<?php } ?>

<?php if($default['de_type1_list_use']) { ?>
<!-- 히트상품 시작 { -->
<section class="sct_wrap">
	<header class="cate-title d-flex space-between">
		<h2>히트상품</h2>
		<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1" class="more"><i class="fa fa-plus"></i> more</a>
	</header>
	<?php
		main_deco_banner(1, 0, 'pc');

		$list = new item_list();
		$list->set_type(1);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
	?>
</section>
<!-- } 히트상품 끝 -->
<?php } ?>

<?php // include_once(G5_SHOP_SKIN_PATH.'/boxevent.skin.php'); // 이벤트 ?>

<?php /* if($default['de_type2_list_use']) { ?>
<!-- 추천상품 시작 { -->
<section class="sct_wrap">
	<header class="cate-title d-flex space-between">
		<h2>추천상품</h2>
		<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2" class="more"><i class="fa fa-plus"></i> more</a>
	</header>
	<?php
		main_deco_banner(2, 0);
		$list = new item_list();
		$list->set_type(2);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
		*/
		/*
	?>
</section>
<!-- } 추천상품 끝 -->
<?php } */ ?>

<?php //main_deco_banner(0, 10); ?>

<!-- 일반 카테고리 시작 { -->
<!--
<section class="sct_wrap">
	<header class="cate-title d-flex space-between">
		<h2>특산품</h2>
		<a href="<?php echo G5_SHOP_URL; ?>/list.php?ca_id=10" class="more"><i class="fa fa-plus"></i> more</a>
	</header>
-->
	<?php
		/*
		main_deco_banner(0, 10);

		$list = new item_list();
		$list->set_category('10', 1);
		$list->set_list_mod(4);
		$list->set_list_row(1);
		$list->set_img_size(640, 640);
		$list->set_list_skin(G5_SHOP_SKIN_PATH.'/main.11.skin.php');
		$list->set_view('it_img', true);
		//$list->set_view('it_id', true);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', true);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', true);
		echo $list->run();
		*/
	?>
<!--
</section>
-->
<!-- } 일반 카테고리 끝 -->
<!--
	client id : ae7ab29bf89b4450929103416fbc7602
	token : 9181215499.e12d512.8fc79151fb9b4e1c958bd2f73540b718
-->
<!-- js 파일 로드 -->
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/index-custom.css" title="index css" type="text/css" media="screen" charset="utf-8">
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.simplyscroll.css" media="all" type="text/css">
<script>
(function($) {  
	var tocken = "9181215499.e12d512.8fc79151fb9b4e1c958bd2f73540b718"; /* Access Tocken 입력 */  
	var count = "9";  
	$.ajax({  
		type: "GET",
		dataType: "jsonp",
		cache: false,
		url: "https://api.instagram.com/v1/users/self/media/recent/?access_token=" + tocken + "&count=" + count,
		success: function(response) {
			if ( response.data.length > 0 ) {
				for(var i = 0; i < response.data.length; i++) {
					var insta = '<div class="insta-box">';
					insta += "<a target='_blank' href='" + response.data[i].link + "'>";
					insta += "<div class'image-layer'>";
					//insta += "<img src='" + response.data[i].images.thumbnail.url + "'>";
					/*
						thumbnail : 150 X 150 
						low_resolution : 320 X 320
						standard_resolution : 640 X 640
						상세 내용 API : response.data[i].caption.text
						LINK Count : response.data[i].likes.count
					*/
					insta += '<img src="' + response.data[i].images.low_resolution.url + '" class="img-fluid">';
					insta += "</div>";
					insta += "</a>";
					insta += "</div>";
					$("#scroller").append(insta);
				} // END for
			}
			$("#scroller").simplyScroll({frameRate:60});
		}
	});
})(jQuery);
</script>
<section class="sct_wrap">
<?php
main_deco_banner(0, 20, 'pc');

$list = new item_list();
$list->set_category('20', 1);
$list->set_list_mod(4);
$list->set_list_row(1);
$list->set_img_size(560, 560);
$list->set_list_skin(G5_SHOP_SKIN_PATH.'/list.11.skin.php');
$list->set_view('it_img', true);
$list->set_view('it_id', true);
$list->set_view('it_name', true);
$list->set_view('it_basic', true);
$list->set_view('it_cust_price', true);
$list->set_view('it_price', true);
$list->set_view('it_icon', true);
$list->set_view('sns', true);
echo $list->run();
?>
</section>
<div class="sct_wrap">
	<header class="cate-title d-flex space-between">
		<h2>INSTAGRAM</h2>
		<a href="https://www.instagram.com/scberries_24/" target="_blank" class="more"><i class="fa fa-plus"></i> more</a>
	</header>
	<div class="mb-4">
		<img src="<?php echo G5_IMG_URL; ?>/index/instagram-title.png" alt="Instagram" />
	</div>
	<div class="container">
		<div id="scroller"></div>
	</div>
</div>
<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>