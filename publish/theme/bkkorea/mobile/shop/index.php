<?php
include_once('./_common.php');

define("_INDEX_", TRUE);

include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
?>

<script src="<?php echo G5_JS_URL; ?>/swipe.js"></script>
<script src="<?php echo G5_JS_URL; ?>/shop.mobile.main.js"></script>
<script src="<?php echo G5_THEME_MSHOP_URL; ?>/js/bootstrap-swipe-carousel.min.js"></script>
<img src="<?php echo G5_IMG_URL; ?>/main-slide/mobile/1.png" alt="" class="img-fluid" />

<div id="carouselExampleIndicators" class="carousel slide my-carousel" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="d-block w-100" src="https://picsum.photos/1920/1080/?random" alt="First slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="https://picsum.photos/1921/1080/?random" alt="Second slide">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="https://picsum.photos/1922/1080/?random" alt="Third slide">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<?php echo display_banner('메인', 'mainbanner.10.skin.php'); ?>
<?php echo display_banner('왼쪽', 'boxbanner.skin.php'); ?>
	<?php if($default['de_mobile_type3_list_use']) { ?>
    <div class="sct_wrap">
        <h2>
	        <a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">
		        <img src="<?php echo G5_IMG_URL.'/index/mobile/1.png' ?>" alt="신상 타이틀 이미지" class="img-fluid" />
	        </a>
        </h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(3);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
        ?>
    </div>
    <?php } ?>

    <?php if($default['de_mobile_type5_list_use']) { ?>
    <div class="sct_wrap">
        	<a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">
		        <img src="<?php echo G5_IMG_URL.'/index/mobile/2.png' ?>" alt="할인상품 타이틀 이미지" class="img-fluid" />
	        </a>
        </h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(5);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', false);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', false);
        $list->set_view('sns', false);
        echo $list->run();
        ?>
    </div>
    <?php } ?>

    <?php if($default['de_mobile_type1_list_use']) { ?>
    <div class="sct_wrap">
        <h2>
	        <a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">
		        <img src="<?php echo G5_IMG_URL.'/index/mobile/3.png' ?>" alt="히트상품 타이틀 이미지" class="img-fluid" />
	        </a>
        </h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(1);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
        ?>
    </div>
    <?php } ?>

    <?php // include_once(G5_MSHOP_SKIN_PATH.'/main.event.skin.php'); // 이벤트 ?>

    <!-- 커뮤니티 최신글 시작 { -->
    <!--
    <section id="sidx_lat">
        <?php echo latest('theme/shop_basic', 'notice', 3, 30); ?>
    </section>
    -->
<?php
include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
?>