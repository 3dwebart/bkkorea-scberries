<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
</div><!-- container End -->

<div id="ft">
    <h2><?php echo $config['cf_title']; ?> 정보</h2>
    <div id="ft_company">
        <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
        <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보</a>
        <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">이용약관</a>
        <?php
        if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
        <a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전</a>
        <?php
        }

        if ($config['cf_analytics']) {
            echo $config['cf_analytics'];
        }
        ?>
    </div>
    <div id="ft_logo"><a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/mobile_logo_img2" alt="<?php echo $config['cf_title']; ?> 메인"></a></div>
    <p class="company-info">
        <span class="d-block"><strong>회사명</strong> <span><?php echo $default['de_admin_company_name']; ?></span></span>
        <span class="d-block"><strong>주소</strong> <span><?php echo $default['de_admin_company_addr']; ?></span></span>
        <span class="d-block"><strong>사업자 등록번호</strong> <span><?php echo $default['de_admin_company_saupja_no']; ?></span></span>
        <span class="d-block"><strong>대표</strong> <span><?php echo $default['de_admin_company_owner']; ?></span></span>
        <span class="d-block"><strong>전화</strong> <a href="tel:<?php echo str_replace('-', '', $default['de_admin_company_tel']); ?>"><span><?php echo $default['de_admin_company_tel']; ?></span> <i class="fa fa-phone" aria-hidden="true"></i></a></span>
        <span class="d-block"><strong>팩스</strong> <span><?php echo $default['de_admin_company_fax']; ?> <i class="fa fa-fax" aria-hidden="true"></i></span></span>
        <span class="d-block"><strong>이메일</strong> <a href="mailto:<?php echo $default['de_admin_info_email']; ?>"><span><?php echo $default['de_admin_info_email']; ?></span> <i class="fa fa-envelope-open" aria-hidden="true"></i></a></span>
        <!-- <span><strong>운영자</strong> <?php echo $admin['mb_name']; ?></span><br> -->
        <span class="d-block"><strong>통신판매업신고번호</strong> <span><?php echo $default['de_admin_tongsin_no']; ?></span></span>
        <span class="d-block"><strong>개인정보 보호책임자</strong> <span><?php echo $default['de_admin_info_name']; ?></span></span>

        <span class="d-block mt-3">Copyright &copy; 2001-2013 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.</span>
    </p>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<script src="<?php echo G5_THEME_MSHOP_URL; ?>/js/mobile-custom.js"></script>

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
