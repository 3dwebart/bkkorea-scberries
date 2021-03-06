<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$begin_time = get_microtime();

if (!isset($g5['title'])) {
	$g5['title'] = $config['cf_title'];
	$g5_head_title = $g5['title'];
}
else {
	$g5_head_title = $g5['title']; // 상태바에 표시될 제목
	$g5_head_title .= " | ".$config['cf_title'];
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
	$g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<?php
if (G5_IS_MOBILE) {
	echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
	echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
	echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
} else {
	echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.PHP_EOL;
}

if($config['cf_add_meta'])
	echo $config['cf_add_meta'].PHP_EOL;
?>
<title><?php echo $g5_head_title; ?></title>
<?php
$shop_css = '';
if (defined('_SHOP_')) $shop_css = '_shop';
echo '<link rel="stylesheet" href="'.G5_THEME_CSS_URL.'/'.(G5_IS_MOBILE?'mobile':'default').$shop_css.'.css?ver='.G5_CSS_VER.'">'.PHP_EOL;
?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/bootstrap.min.css">
<link href="<?php echo G5_CSS_URL ?>/nanumbarungothic.css" rel="stylesheet" type="text/css">
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
</script>
<!--
<script src="<?php echo G5_JS_URL ?>/jquery-1.8.3.min.js"></script>
-->
<script
  src="<?php echo G5_JS_URL ?>/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="<?php echo G5_JS_URL ?>/popper.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/bootstrap.min.js"></script>
<?php
if (defined('_SHOP_')) {
	if(!G5_IS_MOBILE) {
?>
<script src="<?php echo G5_JS_URL ?>/jquery.shop.menu.js?ver=<?php echo G5_JS_VER; ?>"></script>
<?php
	}
} else {
?>
<script src="<?php echo G5_JS_URL ?>/jquery.menu.js?ver=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>
<script src="<?php echo G5_JS_URL ?>/common.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/placeholders.min.js"></script>
<link rel="stylesheet" href="<?php echo G5_JS_URL ?>/font-awesome/css/font-awesome.min.css">
<!-- BIGIN :: OWL Carousel Stylesheet -->
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/owl.theme.green.min.css">
<!-- END :: OWL Carousel Stylesheet -->
<!-- BIGIN :: OWL Carousel JavaScript -->
<script src="<?php echo G5_JS_URL ?>/owl.carousel.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/owl-tube.min.js"></script>
<!-- END :: OWL Carousel JavaScript -->
<?php if(G5_IS_MOBILE && defined('_INDEX_')) { ?>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/swiper.min.css">
<?php } ?>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/custom.css">
<?php if(G5_IS_MOBILE) { ?>
<link rel="stylesheet" href="<?php echo G5_CSS_URL ?>/custom_mobile.css">
<?php } ?>
<?php
if(defined('_INDEX_')) { // index에서만 실행
	echo '<link rel="stylesheet" href="'.G5_CSS_URL.'/index/index.css">'.PHP_EOL;
}

/* BIGIN :: IE private CSS */
$userAgent = $_SERVER["HTTP_USER_AGENT"];

if ( preg_match("/MSIE*/", $userAgent) || ( preg_match("/Trident*/", $userAgent) && preg_match("/rv:11.0*/", $userAgent) &&  preg_match("/Gecko*/", $userAgent) ) ) {
	echo '<link rel="stylesheet" href="'.G5_CSS_URL.'/ie.css">'.PHP_EOL;
	$img_mine = '.png';
} else {
	$img_mine = '';
}
/* END :: IE private CSS */
if(G5_IS_MOBILE) {
	echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
	echo $config['cf_add_script'];
?>
</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>
<script>
	var userAgent = "<?php echo $userAgent; ?>";
	console.log();
</script>
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
	$sr_admin_msg = '';
	if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
	else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
	else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

	echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
	echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}
?>