<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
/* BIGIN :: Custom CSS */
html, body { height: 100%; margin: 0; padding: 0; }
body {  }
.mb-login-wrap { background-color: #3e3a39; background-image: url(<?php echo $member_skin_url; ?>/img/login-bg.png); background-repeat: no-repeat; background-size: 100%; background-position: center; height: 100%; }
#mb_login { background-color: rgba(255,255,255,.6); }
#mb_login #login_info { background-color: rgba(230,230,230,.0); padding: 0; }
#mb_login #login_info a { padding: 25px 0; font-weight: 500; background-image: url(<?php echo $member_skin_url; ?>/img/embos-glass.png); transition: all .5s ease; }
#mb_login #login_info a:hover { background-color: rgba(230,230,255,.6); transition: all .5s ease; }
input[type="text"],input[type="password"] { background-color: rgba(255,255,255,.6); }
input[type="text"]:focus,input[type="password"]:focus { box-shadow: 0 0 0; }
/* END :: Custom CSS */
</style>
<!-- 로그인 시작 { -->
<div class="mb-login-wrap">
    <div id="mb_login" class="mbskin">
        <h1><?php echo $g5['title'] ?></h1>
        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">

        <fieldset id="login_fs">
            <legend>회원로그인</legend>
            <label for="login_id" class="sound_only">회원아이디<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="mb_id" id="login_id" required class="frm_input required" size="20" maxLength="20" placeholder="아이디">
            <label for="login_pw" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
            <input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20" maxLength="20" placeholder="비밀번호">
            <input type="submit" value="로그인" class="btn_submit">
            <!--
            <input type="checkbox" name="auto_login" id="login_auto_login">
            <label for="login_auto_login">자동로그인</label>
            -->
            <label for="login_auto_login" class="custom-checkbox">
                <input type="checkbox" name="auto_login" id="login_auto_login">
                <span class="box"></span>
                <span class="text">자동로그인</span>
            </label>
        </fieldset>

        <?php
        // 소셜로그인 사용시 소셜로그인 버튼
        @include_once(get_social_skin_path().'/social_login.skin.php');
        ?>

        <aside id="login_info">
            <h2>회원로그인 안내</h2>
            <div>
                <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">아이디 비밀번호 찾기</a>
                <a href="./register.php">회원 가입</a>
            </div>
        </aside>

        </form>

        
        <?php // 쇼핑몰 사용시 여기부터 ?>
        <?php if ($default['de_level_sell'] == 1) { // 상품구입 권한 ?>

            <!-- 주문하기, 신청하기 -->
            <?php if (preg_match("/orderform.php/", $url)) { ?>

        <section id="mb_login_notmb">
            <h2>비회원 구매</h2>

            <p>
                비회원으로 주문하시는 경우 포인트는 지급하지 않습니다.
            </p>

            <div id="guest_privacy">
                <?php echo $default['de_guest_privacy']; ?>
            </div>

            <label for="agree">개인정보수집에 대한 내용을 읽었으며 이에 동의합니다.</label>
            <input type="checkbox" id="agree" value="1">

            <div class="btn_confirm">
                <a href="javascript:guest_submit(document.flogin);" class="btn_submit">비회원으로 구매하기</a>
            </div>

            <script>
            function guest_submit(f)
            {
                if (document.getElementById('agree')) {
                    if (!document.getElementById('agree').checked) {
                        alert("개인정보수집에 대한 내용을 읽고 이에 동의하셔야 합니다.");
                        return;
                    }
                }

                f.url.value = "<?php echo $url; ?>";
                f.action = "<?php echo $url; ?>";
                f.submit();
            }
            </script>
        </section>

        <?php } else if (preg_match("/orderinquiry.php$/", $url)) { ?>
        <div id="mb_login_od_wr">
            <h2>비회원 주문조회 </h2>

            <fieldset id="mb_login_od">
                <legend>비회원 주문조회</legend>

                <form name="forderinquiry" method="post" action="<?php echo urldecode($url); ?>" autocomplete="off">

                <label for="od_id" class="od_id sound_only">주문서번호<strong class="sound_only"> 필수</strong></label>
                <input type="text" name="od_id" value="<?php echo $od_id; ?>" id="od_id" required class="frm_input required" size="20" placeholder="주문서번호">
                <label for="id_pwd" class="od_pwd sound_only" >비밀번호<strong class="sound_only"> 필수</strong></label>
                <input type="password" name="od_pwd" size="20" id="od_pwd" required class="frm_input required" placeholder="비밀번호">
                <input type="submit" value="확인" class="btn_submit">

                </form>
            </fieldset>

            <section id="mb_login_odinfo">
                <p>메일로 발송해드린 주문서의 <strong>주문번호</strong> 및 주문 시 입력하신 <strong>비밀번호</strong>를 정확히 입력해주십시오.</p>
            </section>

        </div>
        <?php } ?>

        <?php } ?>
        <?php // 쇼핑몰 사용시 여기까지 반드시 복사해 넣으세요 ?>

        </form>
    </div>
</div>
<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
<!-- } 로그인 끝 -->
