<?php
$sub_menu = '300700';
include_once('./_common.php');

if ($w == "u" || $w == "d")
    check_demo();

if ($w == 'd')
    auth_check($auth[$sub_menu], "d");
else
    auth_check($auth[$sub_menu], "w");

check_admin_token();

$sql_common = " fa_subject = '$fa_subject',
                fa_content = '$fa_content',
                fa_order = '$fa_order' ";

if ($w == "")
{
    $sql = " INSERT {$g5['faq_table']}
                SET fm_id ='$fm_id',
                    $sql_common ";
    sql_query($sql);

    $fa_id = sql_insert_id();
}
else if ($w == "u")
{
    $sql = " UPDATE {$g5['faq_table']}
                SET $sql_common
              WHERE fa_id = '$fa_id' ";
    sql_query($sql);
}
else if ($w == "d")
{
	$sql = " DELETE FROM {$g5['faq_table']} WHERE fa_id = '$fa_id' ";
    sql_query($sql);
}

if ($w == 'd')
    goto_url("./faqlist.php?fm_id=$fm_id");
else
    goto_url("./faqform.php?w=u&amp;fm_id=$fm_id&amp;fa_id=$fa_id");
?>
