<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<input type="hidden" name="pl_item_number"  value="<?php echo $od_id; ?>">
<input type="hidden" name="pl_item_name"    value="<?php echo $goods; ?>">
<input type="hidden" name="pl_amount"       value="<?php echo $tot_price; ?>">

<input type="hidden" name="wz_cart_id"      value="<?php echo $s_cart_id;?>">
<input type="hidden" name="wz_mb_id"        value="<?php echo $member['mb_id'];?>">
<input type="hidden" name="wz_user_ip"      value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
<input type="hidden" name="wz_is_mobile"    value="<?php echo is_mobile();?>">