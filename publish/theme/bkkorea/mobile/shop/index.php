<?php
include_once('./_common.php');

define("_INDEX_", TRUE);

include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
?>

<script src="<?php echo G5_JS_URL; ?>/swipe.js"></script>
<script src="<?php echo G5_JS_URL; ?>/shop.mobile.main.js"></script>
<!--
<script src="<?php echo G5_THEME_MSHOP_URL; ?>/js/bootstrap-swipe-carousel.min.js"></script>

<script src="<?php echo G5_THEME_MSHOP_URL; ?>/js/jquery.mobile.min.js"></script>
-->
<!--
<div id="cafeMarketCarousel" class="carousel slide my-carousel" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#cafeMarketCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#cafeMarketCarousel" data-slide-to="1"></li>
        <li data-target="#cafeMarketCarousel" data-slide-to="2"></li>
        <li data-target="#cafeMarketCarousel" data-slide-to="3"></li>
        <li data-target="#cafeMarketCarousel" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/1.png'; ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/2.png'; ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/3.png'; ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/4.png'; ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/5.png'; ?>" alt="Second slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#cafeMarketCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#cafeMarketCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
-->
<!-- Swiper -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/1.png'; ?>" alt="First slide">
        </div>
        <div class="swiper-slide">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/2.png'; ?>" alt="Second slide">
        </div>
        <div class="swiper-slide">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/3.png'; ?>" alt="Third slide">
        </div>
        <div class="swiper-slide">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/4.png'; ?>" alt="Fourth slide">
        </div>
        <div class="swiper-slide">
            <img class="d-block w-100" src="<?php echo G5_IMG_URL.'/main-slide/mobile/5.png'; ?>" alt="Fifth slide">
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<!-- Swiper JS -->
<script src="<?php echo G5_JS_URL; ?>/swiper.min.js"></script>
<script>
var swiper = new Swiper('.swiper-container', {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
</script>
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
        main_deco_banner(3,0,'mobile');

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
<script>
/*
(function() {
    $(".carousel-inner").swiperight(function() {  
        $(this).parent().carousel('prev');  
    });  
    $(".carousel-inner").swipeleft(function() {  
        $(this).parent().carousel('next');  
    });
})(jQuery);
*/
new Swiper( '.my-carousel' );
/*
const carouselEl = $('.my-carousel');
// Bootstrap carousel needs to be loaded first
carouselEl.carousel().swipeCarousel({
    sensitivity: 'high' // low, medium or high
});
*/
</script>
<?php
include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
?>