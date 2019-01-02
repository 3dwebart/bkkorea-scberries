<?php
$sub_menu = '500300';
include_once('./_common.php');

if ($w == "u" || $w == "d") {
    check_demo();
}

if ($w == 'd') {
    auth_check($auth[$sub_menu], "d");
} else {
    auth_check($auth[$sub_menu], "w");
}

check_admin_token();

@mkdir(G5_DATA_PATH."/event", G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH."/event", G5_DIR_PERMISSION);

if ($ev_mimg_del)  @unlink(G5_DATA_PATH."/event/{$ev_id}_m");
if ($ev_himg_del)  @unlink(G5_DATA_PATH."/event/{$ev_id}_h");
if ($ev_timg_del)  @unlink(G5_DATA_PATH."/event/{$ev_id}_t");

$skin_regex_patten = "^list.[0-9]+\.skin\.php";

$ev_use                = $_POST['ev_use'];
$ev_latest_col         = $_POST['ev_latest_col'];
$ev_latest_row         = $_POST['ev_latest_row'];
$ev_latest_list_id_arr = $_POST['ev_latest_list_id'];
$ev_latest_list_id     = '';
for ($i=0; $i < count($ev_latest_list_id_arr); $i++) {
    $comma = ($i < 2) ? '' : ',';
    $ev_latest_list_id .= $comma.$ev_latest_list_id_arr[$i];
}

//print_r($ev_latest_list_id_arr);
//die('<h1>'.$ev_latest_list_id.'</h1>');

// $ev_skin = (preg_match("/$pattern/", $ev_skin) && G5_SHOP_SKIN_PATH.'/'.file_exists($ev_skin)) ? $ev_skin : ''; 
// $ev_mobile_skin = (preg_match("/$pattern/", $ev_mobile_skin) && G5_MSHOP_SKIN_PATH.'/'.file_exists($ev_mobile_skin)) ? $ev_mobile_skin : ''; 



$sql_common = " SET ev_use              = '$ev_use',
                    ev_latest_col       = '$ev_latest_col',
                    ev_latest_row       = '$ev_latest_row',
                    ev_latest_list_id   = '$ev_latest_list_id'
                    ";
if ($w == "") {
    $ev_id = G5_SERVER_TIME;

    $sql = " INSERT INTO {$g5['g5_shop_event_latest_table']}
                (
                    ev_id,
                    ev_use,
                    ev_latest_col,
                    ev_latest_row,
                    ev_latest_list_id
                ) VALUES (
                    '$ev_id',
                    '$ev_use',
                    '$ev_latest_col',
                    '$ev_latest_row',
                    '$ev_latest_list_id'
                ) ";
    sql_query($sql);
} else if ($w == "u") {
    $sql = " UPDATE {$g5['g5_shop_event_latest_table']}
                SET ev_use              = '$ev_use',
                    ev_latest_col       = '$ev_latest_col',
                    ev_latest_row       = '$ev_latest_row',
                    ev_latest_list_id   = '$ev_latest_list_id'
              WHERE ev_id = '$ev_id' ";
    sql_query($sql);
} else if ($w == "d") {
    $sql = " DELETE FROM {$g5['g5_shop_event_latest_table']} WHERE ev_id = '$ev_id' ";
    sql_query($sql);
}

if ($w == "" || $w == "u") {
    goto_url("./itemeventlatestform.php?w=u&amp;ev_id=$ev_id");
} else {
    goto_url("./itemeventlatest.php");
}
?>
