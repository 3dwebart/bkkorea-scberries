<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
    return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
        </div>
    </div><!-- END :: #container -->
    <!-- } 콘텐츠 끝 -->
<!-- 하단 시작 { -->
</div>

<div id="ft" class="pc">
    <div class="ft_wr">
        <div class="ft_menu">
            <div class="container">
                <ul class="ft_ul">
                    <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a></li><!--/* 임시로 링크,를 막음 : 2019-01-02 */-->
                    <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a></li>
                    <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a></li>
                    <li><a href="<?php echo get_device_change_url(); ?>">모바일버전</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <a href="<?php echo G5_SHOP_URL; ?>/" id="ft_logo"><img src="<?php echo G5_DATA_URL; ?>/common/logo_img2" alt="처음으로" class="img-fluid"></a>
                </div>
                <div class="col-6">
                    <div class="ft_info">
                        <span><strong>회사명</strong> <?php echo $default['de_admin_company_name']; ?></span>
                        <span><strong>주소</strong> <?php echo $default['de_admin_company_addr']; ?></span><br>
                        <span><strong>사업자 등록번호</strong> <?php echo $default['de_admin_company_saupja_no']; ?></span>
                        <span><strong>대표</strong> <?php echo $default['de_admin_company_owner']; ?></span><br>
                        <span><strong>전화</strong> <?php echo $default['de_admin_company_tel']; ?></span>
                        <span><strong>팩스</strong> <?php echo $default['de_admin_company_fax']; ?></span><br>
                        <!-- <span><strong>운영자</strong> <?php echo $admin['mb_name']; ?></span><br> -->
                        <span><strong>통신판매업신고번호</strong> <?php echo $default['de_admin_tongsin_no']; ?></span>
                        <span><strong>개인정보 보호책임자</strong> <?php echo $default['de_admin_info_name']; ?></span>

                        <?php // if ($default['de_admin_buga_no']) echo '<span><strong>부가통신사업신고번호</strong>'.$default['de_admin_buga_no'].'</span>'; ?><br>
                        Copyright &copy; 2001-2013 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.
                    </div>
                </div>
                <div class="col-3">
                    <div class="ft_cs">
                        <h2>고객센터</h2>
                        <strong><?php echo $default['de_admin_company_tel']; ?></strong>
                        <p>월-금 am 9:00 - pm 05:00<br>점심시간 : am 12:00 - pm 01:00</p>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
        <script>
        
        $(function() {
            $("#top_btn").on("click", function() {
                $("html, body").animate({scrollTop:0}, '500');
                return false;
            });
        });
        </script>
    </div>


</div>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<!-- } 하단 끝 -->

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
