<?php
include_once('./_common.php');

define("_INDEX_", TRUE);

include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
?>

<script src="<?php echo G5_JS_URL; ?>/swipe.js"></script>
<script src="<?php echo G5_JS_URL; ?>/shop.mobile.main.js"></script>

<?php echo display_banner('메인', 'mainbanner.20.skin.php'); ?>
<?php echo display_banner('왼쪽', 'boxbanner.skin.php'); ?>


	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="cate1-tab" data-toggle="tab" href="#cate1" role="tab" aria-controls="cate1" aria-selected="true">Cate1</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="cate2-tab" data-toggle="tab" href="#cate2" role="tab" aria-controls="cate2" aria-selected="false">Cate2</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="cate3-tab" data-toggle="tab" href="#cate3" role="tab" aria-controls="cate3" aria-selected="false">Cate3</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="cate1" role="tabpanel" aria-labelledby="cate1-tab">
			<?php
			    $list = new item_list();
			    $list->set_category('10', 1);
			    $list->set_list_mod(3);
			    $list->set_list_row(1);
			    $list->set_img_size(230, 230);
			    $list->set_list_skin(G5_SHOP_SKIN_PATH.'/list.10.skin.php');
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
		</div>
		<div class="tab-pane fade" id="cate2" role="tabpanel" aria-labelledby="cate2-tab">
			<?php
			    $list = new item_list();
			    $list->set_category('20', 1);
			    $list->set_list_mod(3);
			    $list->set_list_row(1);
			    $list->set_img_size(230, 230);
			    $list->set_list_skin(G5_SHOP_SKIN_PATH.'/list.10.skin.php');
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
		</div>
		<div class="tab-pane fade" id="cate3" role="tabpanel" aria-labelledby="cate3-tab">
			<?php
			    $list = new item_list();
			    $list->set_category('30', 1);
			    $list->set_list_mod(2);
			    $list->set_list_row(2);
			    $list->set_img_size(620, 620);
			    $list->set_list_skin(G5_MSHOP_SKIN_PATH.'/main.31.skin.php');
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
		</div>
	</div>

	<div class="sct_wrap">
		<div class="row-8 m-0">
			<div class="col-6">
				<a href="#"><img src="<?php echo G5_IMG_URL ?>/main/1_m.png" alt="event 1" class="img-fluid" /></a>
			</div>
			<div class="col-6">
				<a href="#"><img src="<?php echo G5_IMG_URL ?>/main/2_m.png" alt="event 2" class="img-fluid" /></a>
			</div>
			<div class="col-6 mt-3">
				<a href="#"><img src="<?php echo G5_IMG_URL ?>/main/3_m.png" alt="event 3" class="img-fluid" /></a>
			</div>
			<div class="col-6 mt-3">
				<a href="#"><img src="<?php echo G5_IMG_URL ?>/main/4_m.png" alt="event 4" class="img-fluid" /></a>
			</div>
		</div>
	</div>


    <?php /* if($default['de_mobile_type1_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">히트상품</a></h2>
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



    <?php if($default['de_mobile_type2_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=2">추천상품</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(2);
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


    <?php if($default['de_mobile_type3_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신상품</a></h2>
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

    <?php if($default['de_mobile_type4_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기상품</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(4);
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

    <?php if($default['de_mobile_type5_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">할인상품</a></h2>
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
    <?php } */ ?>

    <?php // include_once(G5_MSHOP_SKIN_PATH.'/main.event.skin.php'); // 이벤트 ?>

    <!-- 커뮤니티 최신글 시작 { -->
    <section id="sidx_lat">
        <?php echo latest('theme/shop_basic', 'notice', 3, 30); ?>
    </section>
<?php
include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
?>