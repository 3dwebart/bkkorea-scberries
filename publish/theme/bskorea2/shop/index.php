<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/index.php');
	return;
}

define("_INDEX_", TRUE);
include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/index-custom.css" title="index css" type="text/css" media="screen" charset="utf-8">
<script type="text/javascript" src="<?php echo G5_JS_URL ?>/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/jquery.simplyscroll.css" media="all" type="text/css">
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="<?php echo G5_SHOP_SKIN_PATH ?>/css/ie-only.css" />
<![endif]-->
<?php
	if(ExactBrowserName() == 'Internet Explorer') {
?>
<link rel="stylesheet" type="text/css" href="<?php echo G5_SHOP_SKIN_URL ?>/css/ie-only.css" />
<?php
	}
?>
<script>
(function($) {  
	var tocken = "9181215499.ae7ab29.d1db77cf18a64b1c99e6a2af362300a4"; /* Access Tocken 입력 */  
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
	
	var fullWidth = 0;
	var calc = 0;
	function carouselSize() {
		fullWidth = $(window).width();
		calc = (fullWidth / 35) * 12;
		//$('.carousel-item').height(calc);
	}
	carouselSize();
	$(window).resize(function() {
		carouselSize();
	});
})(jQuery);
</script>
<script src="<?php echo(G5_URL); ?>/js/shop.js"></script>
<!--********** BIGIN :: Carousel **********-->
<div id="sc_slide" class="carousel slide" data-ride="carousel">
	<!-- BIGIN :: Indicators -->
	<ul class="carousel-indicators">
		<li data-target="#sc_slide" data-slide-to="0" class="active"></li>
		<li data-target="#sc_slide" data-slide-to="1"></li>
		<li data-target="#sc_slide" data-slide-to="2"></li>
		<li data-target="#sc_slide" data-slide-to="3"></li>
		<li data-target="#sc_slide" data-slide-to="4"></li>
	</ul>
	<!-- END :: Indicators -->
	<!-- BIGIN :: The slideshow -->
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="/img/main-slide/01.png" alt="slide1">
		</div>
		<div class="carousel-item">
			<img src="/img/main-slide/02.png" alt="slide2">
		</div>
		<div class="carousel-item">
			<img src="/img/main-slide/03.png" alt="slide3">
		</div>
		<div class="carousel-item">
			<img src="/img/main-slide/04.png" alt="slide4">
		</div>
		<div class="carousel-item">
			<img src="/img/main-slide/05.png" alt="slide5">
		</div>
	</div>
	<!-- END :: The slideshow -->
	<!-- BIGIN :: Left and right controls -->
	<a class="carousel-control-prev" href="#sc_slide" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	</a>
	<a class="carousel-control-next" href="#sc_slide" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	</a>
	<!-- END :: Left and right controls -->
</div>
<!--********** END :: Carousel **********-->
<?php
//include_once(G5_THEME_SHOP_PATH.'/shop.main.side.php');
?>
<div class="container">
<!-- 메인이미지 시작 { -->
<?php //echo display_banner('메인', 'mainbanner.10.skin.php'); ?>
<!-- } 메인이미지 끝 -->

<?php if($default['de_type1_list_use']) { ?>
	<!-- 히트상품 시작 { -->
	<section class="sct_wrap">
		<!--
		<header>
			<h2>
				<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1" class="lang-change"  data-first-upper="1">${hit} ${item}</a>
			</h2>
		</header>
		-->
		<header>
			<h2>
				<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">MD 추천</a>
			</h2>
		</header>
		<?php
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
			$list->set_view('it_star_score', true); // 별점 보이기
			echo $list->run();
		?>
	</section>
	<!-- } 히트상품 끝 -->
	<?php } ?>
	<div class="row-8">
		<div class="col-6">
			<?php if($default['de_type2_list_use']) { ?>
			<!-- 추천상품 시작 { -->
			<section class="sct_wrap">
				<header>
					<h2 class="title"><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2">추천</a></h2>
				</header>
				<?php
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
				?>
			</section>
			<!-- } 추천상품 끝 -->
			<?php } ?>
		</div>
		<div class="col-6">
			<?php if($default['de_type3_list_use']) { ?>
			<!-- 최신상품 시작 { -->
			<section class="sct_wrap">
				<header>
					<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">신상품</a></h2>
				</header>
				<?php
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
		</div>
	</div>
</div>
<div class="eve-info">
	<div class="container">
		<div class="row-8">
			<div class="col-6">
				<img src="<?php echo G5_IMG_URL ?>/main/1.png" alt="1" class="img-fluid" />
			</div>
			<div class="col-2">
				<img src="<?php echo G5_IMG_URL ?>/main/2.png" alt="1" class="img-fluid" />
			</div>
			<div class="col-2">
				<img src="<?php echo G5_IMG_URL ?>/main/3.png" alt="1" class="img-fluid" />
			</div>
			<div class="col-2">
				<img src="<?php echo G5_IMG_URL ?>/main/4.png" alt="1" class="img-fluid" />
			</div>
		</div>
	</div>
</div>
<div class="container">
	<!--
	<div class="row-8">
		<div class="col-6">
			<div class="border-box">sdfsdfsdf</div>
		</div>
		<div class="col-2">
			<div class="border-box">1111</div>
		</div>
		<div class="col-2">
			<div class="border-box">2222</div>
		</div>
		<div class="col-2">
			<div class="border-box">3333</div>
		</div>
	</div>
	-->
	<?php if($default['de_type4_list_use']) { ?>
	<!-- 히트상품 시작 { -->
	<section class="sct_wrap">
		<!--
		<header>
			<h2>
				<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1" class="lang-change"  data-first-upper="1">${hit} ${item}</a>
			</h2>
		</header>
		-->
		<header>
			<h2>
				<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">Best 상품</a>
			</h2>
		</header>
		<?php
			$list = new item_list();
			$list->set_type(4);
			$list->set_view('it_img', true);
			$list->set_view('it_id', false);
			$list->set_view('it_name', true);
			$list->set_view('it_basic', true);
			$list->set_view('it_cust_price', true);
			$list->set_view('it_price', true);
			$list->set_view('it_icon', true);
			$list->set_view('sns', true);
			$list->set_view('it_star_score', true); // 별점 보이기
			echo $list->run();
		?>
	</section>
	<!-- } 히트상품 끝 -->
	<?php } ?>
	<!-- BIGIN :: Recipe -->
	<section class="sct_wrap">
		<!--
		<header>
			<h2>
				<a href="#" class="none-event">Docter Recipe</a>
			</h2>
		</header>
		-->
		<!--
		<div class="row-8 partners-wrap">
			<div class="col-3">
				<div class="border-box">
					<a href="http://www.barskorea.com/ko/" target="_blank">
						<img src="<?php echo(G5_IMG_URL); ?>/logo/logo_nh_hanaro_mart.png" alt="" />
					</a>
				</div>
			</div>
		</div>
		-->
		<!-- <?php echo latest('color_box_slider', '게시판아이디', 출력개수, 글자수);?> -->
		<?php echo latest('basic', 'doctor_recipe', 3, 16); ?>
	</section>
	<!-- END :: Recipe -->
	<!-- BIGIN :: Partners -->
	<section class="sct_wrap">
		<header>
			<h2>
				<a href="#" class="none-event">Partnership</a>
			</h2>
		</header>
		<div class="row-8 partners-wrap">
			<div class="col-3">
				<div class="border-box">
					<a href="http://www.barskorea.com/ko/" target="_blank">
						<img src="<?php echo(G5_IMG_URL); ?>/logo/logo_nh_hanaro_mart.png" alt="" />
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="http://bekkorea.com/" target="_blank">
						<img src="<?php echo(G5_IMG_URL); ?>/logo/logo_emart.png" alt="" />
					</a>
				</div>
			</div>
			
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<img src="<?php echo(G5_IMG_URL); ?>/logo/logo_lotte_mart.png" alt="" />
					</a>
				</div>
			</div>
			
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<img src="<?php echo(G5_IMG_URL); ?>/logo/logo_homeplus.png" alt="" />
					</a>
				</div>
			</div>
		</div>
		<?php /* ?>
		<div class="row-8 partners-wrap">
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/barskorea-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/bek-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/barskorea-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/bek-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
		</div>
		<div class="row-8 partners-wrap">
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/barskorea-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/bek-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/barskorea-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<div class="col-3">
				<div class="border-box">
					<a href="#">
						<!--<img src="<?php echo(G5_IMG_URL); ?>/logo/bek-logo.png" alt="" />-->
						준비중
					</a>
				</div>
			</div>
			<?php */ ?>
		</div>
	</section>
	
	<div class="sct_wrap">
		<div class="container">
			<div id="scroller"></div>
		</div>
	</div>
	<!-- END :: Partners -->
	<?php /*
	<?php include_once(G5_SHOP_SKIN_PATH.'/boxevent.skin.php'); // 이벤트 ?>
	
	<?php if($default['de_type5_list_use']) { ?>
	<!-- 할인상품 시작 { -->
	<section class="sct_wrap">
		<header>
			<h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5" class="lang-change"  data-first-upper="1">${sale}${item}</a></h2>
		</header>
		<?php
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
	*/ ?>
</div>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>