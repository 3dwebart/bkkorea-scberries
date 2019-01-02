attendance
-- --------------------------------------------------------
--
-- Table structure for table `g5_shop_attendance`
-- 출석체크 테이블
--

DROP TABLE IF EXISTS `g5_shop_attendance`;
CREATE TABLE IF NOT EXISTS `g5_shop_attendance` (
  `attend_id` INT(11) NOT NULL AUTO_INCREMENT,
  `addend_date` VARCHAR(255) NOT NULL DEFAULT '',
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`attend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- --------------------------------------------------------
--
-- Table structure for table `g5_shop_banner`
--

DROP TABLE IF EXISTS `g5_shop_banner`;
CREATE TABLE IF NOT EXISTS `g5_shop_banner` (
  `bn_id` INT(11) NOT NULL AUTO_INCREMENT,
  `bn_alt` VARCHAR(255) NOT NULL DEFAULT '',
  `bn_url` VARCHAR(255) NOT NULL DEFAULT '',
  `bn_device` VARCHAR(10) NOT NULL DEFAULT '',
  `bn_position` VARCHAR(255) NOT NULL DEFAULT '',
  `bn_item_type` INT(11) NOT NULL DEFAULT 0,
  `bn_item_cate` VARCHAR(255) NOT NULL DEFAULT '',
  `bn_border` TINYINT(4) NOT NULL DEFAULT '0',
  `bn_new_win` TINYINT(4) NOT NULL DEFAULT '0',
  `bn_begin_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_end_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bn_hit` INT(11) NOT NULL DEFAULT '0',
  `bn_order` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bn_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_cart`
--

DROP TABLE IF EXISTS `g5_shop_cart`;
CREATE TABLE IF NOT EXISTS `g5_shop_cart` (
  `ct_id` INT(11) NOT NULL AUTO_INCREMENT,
  `od_id` bigINT(20) unsigned NOT NULL,
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  `it_name` VARCHAR(255) NOT NULL DEFAULT '',
  `it_sc_type` TINYINT(4) NOT NULL DEFAULT '0',
  `it_sc_method` TINYINT(4) NOT NULL DEFAULT '0',
  `it_sc_price` INT(11) NOT NULL DEFAULT '0',
  `it_sc_minimum` INT(11) NOT NULL DEFAULT '0',
  `it_sc_qty` INT(11) NOT NULL DEFAULT '0',
  `ct_status` VARCHAR(255) NOT NULL DEFAULT '',
  `ct_history` TEXT NOT NULL,
  `ct_price` INT(11) NOT NULL DEFAULT '0',
  `ct_poINT` INT(11) NOT NULL DEFAULT '0',
  `cp_price` INT(11) NOT NULL DEFAULT '0',
  `ct_poINT_use` TINYINT(4) NOT NULL DEFAULT '0',
  `ct_stock_use` TINYINT(4) NOT NULL DEFAULT '0',
  `ct_option` VARCHAR(255) NOT NULL DEFAULT '',
  `ct_qty` INT(11) NOT NULL DEFAULT '0',
  `ct_notax` TINYINT(4) NOT NULL DEFAULT '0',
  `io_id` VARCHAR(255) NOT NULL DEFAULT '',
  `io_type` TINYINT(4) NOT NULL DEFAULT '0',
  `io_price` INT(11) NOT NULL DEFAULT '0',
  `ct_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ct_ip` VARCHAR(25) NOT NULL DEFAULT '',
  `ct_send_cost` TINYINT(4) NOT NULL DEFAULT '0',
  `ct_direct` TINYINT(4) NOT NULL DEFAULT '0',
  `ct_select` TINYINT(4) NOT NULL DEFAULT '0',
  `ct_select_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ct_id`),
  KEY `od_id` (`od_id`),
  KEY `it_id` (`it_id`),
  KEY `ct_status` (`ct_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_category`
--

DROP TABLE IF EXISTS `g5_shop_category`;
CREATE TABLE IF NOT EXISTS `g5_shop_category` (
  `ca_id` VARCHAR(10) NOT NULL DEFAULT '0',  
  `ca_name` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_order` INT(11) NOT NULL DEFAULT '0',
  `ca_skin_dir` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_mobile_skin_dir` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_mobile_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_img_width` INT(11) NOT NULL DEFAULT '0',
  `ca_img_height` INT(11) NOT NULL DEFAULT '0',
  `ca_mobile_img_width` INT(11) NOT NULL DEFAULT '0',
  `ca_mobile_img_height` INT(11) NOT NULL DEFAULT '0',
  `ca_sell_email` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_use` TINYINT(4) NOT NULL DEFAULT '0',
  `ca_stock_qty` INT(11) NOT NULL DEFAULT '0',
  `ca_explan_html` TINYINT(4) NOT NULL DEFAULT '0',
  `ca_head_html` TEXT NOT NULL,
  `ca_tail_html` TEXT NOT NULL,
  `ca_mobile_head_html` TEXT NOT NULL,
  `ca_mobile_tail_html` TEXT NOT NULL,
  `ca_list_mod` INT(11) NOT NULL DEFAULT '0',
  `ca_list_row` INT(11) NOT NULL DEFAULT '0',
  `ca_mobile_list_mod` INT(11) NOT NULL DEFAULT '0',
  `ca_mobile_list_row` INT(11) NOT NULL DEFAULT '0',
  `ca_include_head` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_include_tail` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_cert_use` TINYINT(4) NOT NULL DEFAULT '0',
  `ca_adult_use` TINYINT(4) NOT NULL DEFAULT '0',
  `ca_nocoupon` TINYINT(4) NOT NULL DEFAULT '0',
  `ca_1_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_2_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_3_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_4_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_5_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_6_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_7_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_8_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_9_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_10_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_1` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_2` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_3` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_4` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_5` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_6` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_7` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_8` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_9` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_10` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ca_id`),
  KEY `ca_order` (`ca_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_coupon`
--

DROP TABLE IF EXISTS `g5_shop_coupon`;
CREATE TABLE IF NOT EXISTS `g5_shop_coupon` (
  `cp_no` INT(11) NOT NULL AUTO_INCREMENT,
  `cp_id` VARCHAR(255) NOT NULL DEFAULT '',
  `cp_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `cp_method` TINYINT(4) NOT NULL DEFAULT '0',  
  `cp_target` VARCHAR(255) NOT NULL DEFAULT '',
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `cz_id` INT(11) NOT NULL DEFAULT '0',
  `cp_start` DATE NOT NULL DEFAULT '0000-00-00',
  `cp_end` DATE NOT NULL DEFAULT '0000-00-00',
  `cp_price` INT(11) NOT NULL DEFAULT '0',
  `cp_type` TINYINT(4) NOT NULL DEFAULT '0',
  `cp_trunc` INT(11) NOT NULL DEFAULT '0',
  `cp_minimum` INT(11) NOT NULL DEFAULT '0',
  `cp_maximum` INT(11) NOT NULL DEFAULT '0',
  `od_id` bigINT(20) unsigned NOT NULL,
  `cp_datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cp_no`),
  UNIQUE KEY `cp_id` (`cp_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_coupon_log`
--

DROP TABLE IF EXISTS `g5_shop_coupon_log`;
CREATE TABLE IF NOT EXISTS `g5_shop_coupon_log` (
  `cl_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cp_id` VARCHAR(255) NOT NULL DEFAULT '',
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `od_id` bigINT(20) NOT NULL,
  `cp_price` INT(11) NOT NULL DEFAULT '0',
  `cl_datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cl_id`),
  KEY `mb_id` (`mb_id`),
  KEY `od_id` (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_coupon_zone`
--

DROP TABLE IF EXISTS `g5_shop_coupon_zone`;
CREATE TABLE IF NOT EXISTS `g5_shop_coupon_zone` (
  `cz_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cz_type` TINYINT(4) NOT NULL DEFAULT '0',
  `cz_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `cz_start` DATE NOT NULL DEFAULT '0000-00-00',
  `cz_end` DATE NOT NULL DEFAULT '0000-00-00',
  `cz_file` VARCHAR(255) NOT NULL DEFAULT '',
  `cz_period` INT(11) NOT NULL DEFAULT '0',
  `cz_poINT` INT(11) NOT NULL DEFAULT '0',
  `cp_method` TINYINT(4) NOT NULL DEFAULT '0',
  `cp_target` VARCHAR(255) NOT NULL DEFAULT '',
  `cp_price` INT(11) NOT NULL DEFAULT '0',
  `cp_type` TINYINT(4) NOT NULL DEFAULT '0',
  `cp_trunc` INT(11) NOT NULL DEFAULT '0',
  `cp_minimum` INT(11) NOT NULL DEFAULT '0',
  `cp_maximum` INT(11) NOT NULL DEFAULT '0',
  `cz_download` INT(11) NOT NULL DEFAULT '0',
  `cz_datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`cz_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_default`
--

DROP TABLE IF EXISTS `g5_shop_default`;
CREATE TABLE IF NOT EXISTS `g5_shop_default` (
  `de_admin_company_owner` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_company_name` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_company_saupja_no` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_company_tel` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_company_fax` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_tongsin_no` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_company_zip` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_company_addr` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_info_name` VARCHAR(255) NOT NULL DEFAULT '',
  `de_admin_info_email` VARCHAR(255) NOT NULL DEFAULT '',
  `de_shop_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_shop_mobile_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_type1_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_type1_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_type1_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_type1_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_type1_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_type1_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_type2_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_type2_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_type2_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_type2_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_type2_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_type2_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_type3_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_type3_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_type3_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_type3_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_type3_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_type3_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_type4_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_type4_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_type4_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_type4_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_type4_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_type4_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_type5_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_type5_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_type5_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_type5_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_type5_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_type5_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_mobile_type1_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_type1_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type1_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_mobile_type2_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_type2_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type2_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_mobile_type3_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_type3_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type3_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_mobile_type4_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_type4_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type4_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_mobile_type5_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_type5_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_type5_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_rel_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_rel_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_rel_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_rel_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_rel_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_rel_list_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_mobile_rel_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_rel_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_rel_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_rel_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_search_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_search_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_search_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_search_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_search_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_search_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_search_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_search_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_search_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_search_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_listtype_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_listtype_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_listtype_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_listtype_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_listtype_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_list_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `de_mobile_listtype_list_mod` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_list_row` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_img_width` INT(11) NOT NULL DEFAULT '0',
  `de_mobile_listtype_img_height` INT(11) NOT NULL DEFAULT '0',
  `de_bank_use` INT(11) NOT NULL DEFAULT '0',
  `de_bank_account` TEXT NOT NULL,
  `de_card_test` INT(11) NOT NULL DEFAULT '0',
  `de_card_use` INT(11) NOT NULL DEFAULT '0',
  `de_card_noINT_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_card_poINT` INT(11) NOT NULL DEFAULT '0',
  `de_settle_min_poINT` INT(11) NOT NULL DEFAULT '0',
  `de_settle_max_poINT` INT(11) NOT NULL DEFAULT '0',
  `de_settle_poINT_unit` INT(11) NOT NULL DEFAULT '0',
  `de_level_sell` INT(11) NOT NULL DEFAULT '0',
  `de_delivery_company` VARCHAR(255) NOT NULL DEFAULT '',
  `de_send_cost_case` VARCHAR(255) NOT NULL DEFAULT '',
  `de_send_cost_limit` VARCHAR(255) NOT NULL DEFAULT '',
  `de_send_cost_list` VARCHAR(255) NOT NULL DEFAULT '',
  `de_hope_date_use` INT(11) NOT NULL DEFAULT '0',
  `de_hope_date_after` INT(11) NOT NULL DEFAULT '0',
  `de_baesong_content` TEXT NOT NULL,
  `de_change_content` TEXT NOT NULL,
  `de_poINT_days` INT(11) NOT NULL DEFAULT '0',
  `de_simg_width` INT(11) NOT NULL DEFAULT '0',
  `de_simg_height` INT(11) NOT NULL DEFAULT '0',
  `de_mimg_width` INT(11) NOT NULL DEFAULT '0',
  `de_mimg_height` INT(11) NOT NULL DEFAULT '0',
  `de_sms_cont1` TEXT NOT NULL,
  `de_sms_cont2` TEXT NOT NULL,
  `de_sms_cont3` TEXT NOT NULL,
  `de_sms_cont4` TEXT NOT NULL,
  `de_sms_cont5` TEXT NOT NULL,
  `de_sms_use1` TINYINT(4) NOT NULL DEFAULT '0',
  `de_sms_use2` TINYINT(4) NOT NULL DEFAULT '0',
  `de_sms_use3` TINYINT(4) NOT NULL DEFAULT '0',
  `de_sms_use4` TINYINT(4) NOT NULL DEFAULT '0',
  `de_sms_use5` TINYINT(4) NOT NULL DEFAULT '0',
  `de_sms_hp` VARCHAR(255) NOT NULL DEFAULT '',
  `de_pg_service` VARCHAR(255) NOT NULL DEFAULT '',
  `de_kcp_mid` VARCHAR(255) NOT NULL DEFAULT '',
  `de_kcp_site_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_inicis_mid` VARCHAR(255) NOT NULL DEFAULT '',
  `de_inicis_admin_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_inicis_sign_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_iche_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_easy_pay_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_samsung_pay_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_inicis_lpay_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_inicis_cartpoINT_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_item_use_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_item_use_write` TINYINT(4) NOT NULL DEFAULT '0',
  `de_code_dup_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_cart_keep_term` INT(11) NOT NULL DEFAULT '0',
  `de_guest_cart_use` TINYINT(4) NOT NULL DEFAULT '0',  
  `de_admin_buga_no` VARCHAR(255) NOT NULL DEFAULT '',  
  `de_vbank_use` VARCHAR(255) NOT NULL DEFAULT '',
  `de_taxsave_use` TINYINT(4) NOT NULL,
  `de_guest_privacy` TEXT NOT NULL,
  `de_hp_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_escrow_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_tax_flag_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_kakaopay_mid` VARCHAR(255) NOT NULL DEFAULT '',
  `de_kakaopay_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_kakaopay_enckey` VARCHAR(255) NOT NULL DEFAULT '',
  `de_kakaopay_hashkey` VARCHAR(255) NOT NULL DEFAULT '',
  `de_kakaopay_cancelpwd` VARCHAR(255) NOT NULL DEFAULT '',
  `de_naverpay_mid` VARCHAR(255) NOT NULL DEFAULT '',
  `de_naverpay_cert_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_naverpay_button_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_naverpay_test` TINYINT(4) NOT NULL DEFAULT '0',
  `de_naverpay_mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `de_naverpay_sendcost` VARCHAR(255) NOT NULL DEFAULT '',
  `de_member_reg_coupon_use` TINYINT(4) NOT NULL DEFAULT '0',
  `de_member_reg_coupon_term` INT(11) NOT NULL DEFAULT '0',
  `de_member_reg_coupon_price` INT(11) NOT NULL DEFAULT '0',
  `de_member_reg_coupon_minimum` INT(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_event_latest`
--

DROP TABLE IF EXISTS `g5_shop_event_latest`;
CREATE TABLE IF NOT EXISTS `g5_shop_event_latest` (
  `ev_id` INT(11) NOT NULL AUTO_INCREMENT,
  `ev_latest_col` INT(11) NOT NULL DEFAULT '1',
  `ev_latest_row` INT(11) NOT NULL DEFAULT '1',
  `ev_latest_list_id` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ev_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_event`
--

DROP TABLE IF EXISTS `g5_shop_event`;
CREATE TABLE IF NOT EXISTS `g5_shop_event` (
  `ev_id` INT(11) NOT NULL AUTO_INCREMENT,
  `ev_type` TINYINT(4) NOT NULL DEFAULT '',
  `ev_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `ev_mobile_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `ev_img_width` INT(11) NOT NULL DEFAULT '0',
  `ev_img_height` INT(11) NOT NULL DEFAULT '0',
  `ev_list_mod` INT(11) NOT NULL DEFAULT '0',
  `ev_list_row` INT(11) NOT NULL DEFAULT '0',
  `ev_mobile_img_width` INT(11) NOT NULL DEFAULT '0',
  `ev_mobile_img_height` INT(11) NOT NULL DEFAULT '0',
  `ev_mobile_list_mod` INT(11) NOT NULL DEFAULT '0',
  `ev_mobile_list_row` INT(11) NOT NULL DEFAULT '0',
  `ev_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `ev_subject_strong` TINYINT(4) NOT NULL DEFAULT '0',
  `ev_head_html` TEXT NOT NULL,
  `ev_tail_html` TEXT NOT NULL,
  `ev_use` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ev_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_event_item`
--

DROP TABLE IF EXISTS `g5_shop_event_item`;
CREATE TABLE IF NOT EXISTS `g5_shop_event_item` (
  `ev_id` INT(11) NOT NULL DEFAULT '0',
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`ev_id`,`it_id`),
  KEY `it_id` (`it_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_item`
--

DROP TABLE IF EXISTS `g5_shop_item`;
CREATE TABLE IF NOT EXISTS `g5_shop_item` (
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  `ca_id` VARCHAR(10) NOT NULL DEFAULT '0',
  `ca_id2` VARCHAR(255) NOT NULL DEFAULT '',
  `ca_id3` VARCHAR(255) NOT NULL DEFAULT '',
  `it_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `it_mobile_skin` VARCHAR(255) NOT NULL DEFAULT '',
  `it_name` VARCHAR(255) NOT NULL DEFAULT '',
  `it_maker` VARCHAR(255) NOT NULL DEFAULT '',
  `it_origin` VARCHAR(255) NOT NULL DEFAULT '',
  `it_brand` VARCHAR(255) NOT NULL DEFAULT '',
  `it_model` VARCHAR(255) NOT NULL DEFAULT '',
  `it_option_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `it_supply_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `it_type1` TINYINT(4) NOT NULL DEFAULT '0',
  `it_type2` TINYINT(4) NOT NULL DEFAULT '0',
  `it_type3` TINYINT(4) NOT NULL DEFAULT '0',
  `it_type4` TINYINT(4) NOT NULL DEFAULT '0',
  `it_type5` TINYINT(4) NOT NULL DEFAULT '0',
  `it_basic` TEXT NOT NULL,
  `it_explan` mediumtext NOT NULL,
  `it_explan2` mediumtext NOT NULL,
  `it_mobile_explan` mediumtext NOT NULL,
  `it_cust_price` INT(11) NOT NULL DEFAULT '0',
  `it_price` INT(11) NOT NULL DEFAULT '0',
  `it_poINT` INT(11) NOT NULL DEFAULT '0',
  `it_poINT_type` TINYINT(4) NOT NULL DEFAULT '0',
  `it_supply_poINT` INT(11) NOT NULL DEFAULT '0',
  `it_notax` TINYINT(4) NOT NULL DEFAULT '0',
  `it_sell_email` VARCHAR(255) NOT NULL DEFAULT '',
  `it_use` TINYINT(4) NOT NULL DEFAULT '0',
  `it_nocoupon` TINYINT(4) NOT NULL DEFAULT '0',
  `it_soldout` TINYINT(4) NOT NULL DEFAULT '0',
  `it_stock_qty` INT(11) NOT NULL DEFAULT '0',
  `it_stock_sms` TINYINT(4) NOT NULL DEFAULT '0',
  `it_noti_qty` INT(11) NOT NULL DEFAULT '0',
  `it_sc_type` TINYINT(4) NOT NULL DEFAULT '0',
  `it_sc_method` TINYINT(4) NOT NULL DEFAULT '0',
  `it_sc_price` INT(11) NOT NULL DEFAULT '0',
  `it_sc_minimum` INT(11) NOT NULL DEFAULT '0',
  `it_sc_qty` INT(11) NOT NULL DEFAULT '0',
  `it_buy_min_qty` INT(11) NOT NULL DEFAULT '0',
  `it_buy_max_qty` INT(11) NOT NULL DEFAULT '0',
  `it_head_html` TEXT NOT NULL,
  `it_tail_html` TEXT NOT NULL,
  `it_mobile_head_html` TEXT NOT NULL,
  `it_mobile_tail_html` TEXT NOT NULL,
  `it_hit` INT(11) NOT NULL DEFAULT '0',
  `it_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `it_update_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `it_ip` VARCHAR(25) NOT NULL DEFAULT '',
  `it_order` INT(11) NOT NULL DEFAULT '0',
  `it_tel_inq` TINYINT(4) NOT NULL DEFAULT '0',
  `it_info_gubun` VARCHAR(50) NOT NULL DEFAULT '',
  `it_info_value` TEXT NOT NULL,
  `it_sum_qty` INT(11) NOT NULL DEFAULT '0',
  `it_use_cnt` INT(11) NOT NULL DEFAULT '0',
  `it_use_avg` DECIMAL(2,1) NOT NULL,
  `it_shop_memo` TEXT NOT NULL,
  `ec_mall_pid` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img1` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img2` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img3` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img4` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img5` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img6` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img7` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img8` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img9` VARCHAR(255) NOT NULL DEFAULT '',
  `it_img10` VARCHAR(255) NOT NULL DEFAULT '',
  `it_1_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_2_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_3_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_4_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_5_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_6_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_7_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_8_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_9_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_10_subj` VARCHAR(255) NOT NULL DEFAULT '',
  `it_1` VARCHAR(255) NOT NULL DEFAULT '',
  `it_2` VARCHAR(255) NOT NULL DEFAULT '',
  `it_3` VARCHAR(255) NOT NULL DEFAULT '',
  `it_4` VARCHAR(255) NOT NULL DEFAULT '',
  `it_5` VARCHAR(255) NOT NULL DEFAULT '',
  `it_6` VARCHAR(255) NOT NULL DEFAULT '',
  `it_7` VARCHAR(255) NOT NULL DEFAULT '',
  `it_8` VARCHAR(255) NOT NULL DEFAULT '',
  `it_9` VARCHAR(255) NOT NULL DEFAULT '',
  `it_10` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`it_id`),
  KEY `ca_id` (`ca_id`),
  KEY `it_name` (`it_name`),
  KEY `it_order` (`it_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_item_option`
--

DROP TABLE IF EXISTS `g5_shop_item_option`;
CREATE TABLE IF NOT EXISTS `g5_shop_item_option` (
  `io_no` INT(11) NOT NULL AUTO_INCREMENT,
  `io_id` VARCHAR(255) NOT NULL DEFAULT '0',
  `io_type` TINYINT(4) NOT NULL DEFAULT '0',                    
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  `io_price` INT(11) NOT NULL DEFAULT '0',
  `io_stock_qty` INT(11) NOT NULL DEFAULT '0',
  `io_noti_qty` INT(11) NOT NULL DEFAULT '0',
  `io_use` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`io_no`),
  KEY `io_id` (`io_id`),
  KEY `it_id` (`it_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_item_use`
--

DROP TABLE IF EXISTS `g5_shop_item_use`;
CREATE TABLE IF NOT EXISTS `g5_shop_item_use` (
  `is_id` INT(11) NOT NULL AUTO_INCREMENT,
  `it_id` VARCHAR(20) NOT NULL DEFAULT '0',
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `is_name` VARCHAR(255) NOT NULL DEFAULT '',
  `is_password` VARCHAR(255) NOT NULL DEFAULT '',
  `is_score` TINYINT(4) NOT NULL DEFAULT '0',
  `is_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `is_content` TEXT NOT NULL,
  `is_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_ip` VARCHAR(25) NOT NULL DEFAULT '',
  `is_confirm` TINYINT(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`is_id`),
  KEY `index1` (`it_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_item_qa`
--

DROP TABLE IF EXISTS `g5_shop_item_qa`;
CREATE TABLE IF NOT EXISTS `g5_shop_item_qa` (
  `iq_id` INT(11) NOT NULL AUTO_INCREMENT,
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `iq_secret` TINYINT(4) NOT NULL DEFAULT '0',
  `iq_name` VARCHAR(255) NOT NULL DEFAULT '',
  `iq_email` VARCHAR(255) NOT NULL DEFAULT '',
  `iq_hp` VARCHAR(255) NOT NULL DEFAULT '',
  `iq_password` VARCHAR(255) NOT NULL DEFAULT '',
  `iq_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `iq_question` TEXT NOT NULL,
  `iq_answer` TEXT NOT NULL,
  `iq_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iq_ip` VARCHAR(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`iq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_item_relation`
--

DROP TABLE IF EXISTS `g5_shop_item_relation`;
CREATE TABLE IF NOT EXISTS `g5_shop_item_relation` (
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  `it_id2` VARCHAR(20) NOT NULL DEFAULT '',
  `ir_no` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`it_id`,`it_id2`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_order`
--

DROP TABLE IF EXISTS `g5_shop_order`;
CREATE TABLE IF NOT EXISTS `g5_shop_order` (
  `od_id` bigINT(20) unsigned NOT NULL,
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',  
  `od_name` VARCHAR(20) NOT NULL DEFAULT '',
  `od_email` VARCHAR(100) NOT NULL DEFAULT '',
  `od_tel` VARCHAR(20) NOT NULL DEFAULT '',
  `od_hp` VARCHAR(20) NOT NULL DEFAULT '',
  `od_zip1` char(3) NOT NULL DEFAULT '',
  `od_zip2` char(3) NOT NULL DEFAULT '',
  `od_addr1` VARCHAR(100) NOT NULL DEFAULT '',
  `od_addr2` VARCHAR(100) NOT NULL DEFAULT '',
  `od_addr3` VARCHAR(255) NOT NULL DEFAULT '',
  `od_addr_jibeon` VARCHAR(255) NOT NULL DEFAULT '',
  `od_deposit_name` VARCHAR(20) NOT NULL DEFAULT '',
  `od_b_name` VARCHAR(20) NOT NULL DEFAULT '',
  `od_b_tel` VARCHAR(20) NOT NULL DEFAULT '',
  `od_b_hp` VARCHAR(20) NOT NULL DEFAULT '',
  `od_b_zip1` char(3) NOT NULL DEFAULT '',
  `od_b_zip2` char(3) NOT NULL DEFAULT '',
  `od_b_addr1` VARCHAR(100) NOT NULL DEFAULT '',
  `od_b_addr2` VARCHAR(100) NOT NULL DEFAULT '',
  `od_b_addr3` VARCHAR(255) NOT NULL DEFAULT '',
  `od_b_addr_jibeon` VARCHAR(255) NOT NULL DEFAULT '',
  `od_memo` TEXT NOT NULL,
  `od_cart_count` INT(11) NOT NULL DEFAULT '0',
  `od_cart_price` INT(11) NOT NULL DEFAULT '0',
  `od_cart_coupon` INT(11) NOT NULL DEFAULT '0',
  `od_send_cost` INT(11) NOT NULL DEFAULT '0',
  `od_send_cost2` INT(11) NOT NULL DEFAULT '0',
  `od_send_coupon` INT(11) NOT NULL DEFAULT '0',  
  `od_receipt_price` INT(11) NOT NULL DEFAULT '0',
  `od_cancel_price` INT(11) NOT NULL DEFAULT '0',
  `od_receipt_poINT` INT(11) NOT NULL DEFAULT '0',
  `od_refund_price` INT(11) NOT NULL DEFAULT '0',
  `od_bank_account` VARCHAR(255) NOT NULL DEFAULT '',
  `od_receipt_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_coupon` INT(11) NOT NULL DEFAULT '0',
  `od_misu` INT(11) NOT NULL DEFAULT '0',
  `od_shop_memo` TEXT NOT NULL,
  `od_mod_history` TEXT NOT NULL,
  `od_status` VARCHAR(255) NOT NULL DEFAULT '',  
  `od_hope_date` date NOT NULL DEFAULT '0000-00-00',  
  `od_settle_case` VARCHAR(255) NOT NULL DEFAULT '',
  `od_test` TINYINT(4) NOT NULL DEFAULT '0',
  `od_mobile` TINYINT(4) NOT NULL DEFAULT '0',
  `od_pg` VARCHAR(255) NOT NULL DEFAULT '',
  `od_tno` VARCHAR(255) NOT NULL DEFAULT '',
  `od_app_no` VARCHAR(20) NOT NULL DEFAULT '',
  `od_escrow` TINYINT(4) NOT NULL DEFAULT '0',
  `od_casseqno` VARCHAR(255) NOT NULL DEFAULT '',
  `od_tax_flag` TINYINT(4) NOT NULL DEFAULT '0',
  `od_tax_mny` INT(11) NOT NULL DEFAULT '0',
  `od_vat_mny` INT(11) NOT NULL DEFAULT '0',
  `od_free_mny` INT(11) NOT NULL DEFAULT '0',
  `od_delivery_company` VARCHAR(255) NOT NULL DEFAULT '0',
  `od_invoice` VARCHAR(255) NOT NULL DEFAULT '',
  `od_invoice_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `od_cash` TINYINT(4) NOT NULL,
  `od_cash_no` VARCHAR(255) NOT NULL,
  `od_cash_info` TEXT NOT NULL, 
  `od_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',  
  `od_pwd` VARCHAR(255) NOT NULL DEFAULT '',
  `od_ip` VARCHAR(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`od_id`),
  KEY `index2` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_order_address`
--

DROP TABLE IF EXISTS `g5_shop_order_address`;
CREATE TABLE IF NOT EXISTS `g5_shop_order_address` (
  `ad_id` INT(11) NOT NULL AUTO_INCREMENT,
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_subject` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_default` TINYINT(4) NOT NULL DEFAULT '0',
  `ad_name` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_tel` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_hp` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_zip1` char(3) NOT NULL DEFAULT '',
  `ad_zip2` char(3) NOT NULL DEFAULT '',
  `ad_addr1` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_addr2` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_addr3` VARCHAR(255) NOT NULL DEFAULT '',
  `ad_jibeon` VARCHAR(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`ad_id`),
  KEY `mb_id` (`mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_order_data`
--

DROP TABLE IF EXISTS `g5_shop_order_data`;
CREATE TABLE IF NOT EXISTS `g5_shop_order_data` (
  `od_id` bigINT(20) unsigned NOT NULL,
  `cart_id` bigINT(20) unsigned NOT NULL,
  `mb_id` VARCHAR(20) NOT NULL DEFAULT '',
  `dt_pg` VARCHAR(255) NOT NULL DEFAULT '',
  `dt_data` TEXT NOT NULL,
  `dt_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `od_id` (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_order_delete`
--

DROP TABLE IF EXISTS `g5_shop_order_delete`;
CREATE TABLE IF NOT EXISTS `g5_shop_order_delete` (
  `de_id` INT(11) NOT NULL AUTO_INCREMENT,
  `de_key` VARCHAR(255) NOT NULL DEFAULT '',
  `de_data` longtext NOT NULL,
  `mb_id` VARCHAR(20) NOT NULL DEFAULT '',
  `de_ip` VARCHAR(255) NOT NULL DEFAULT '',
  `de_datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`de_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Table structure for table `g5_shop_personalpay`
--

DROP TABLE IF EXISTS `g5_shop_personalpay`;
CREATE TABLE IF NOT EXISTS `g5_shop_personalpay` (
  `pp_id` BIGINT(20) unsigned NOT NULL,
  `od_id` BIGINT(20) unsigned NOT NULL,  
  `pp_name` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_email` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_hp` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_content` TEXT NOT NULL,
  `pp_use` TINYINT(4) NOT NULL DEFAULT '0',
  `pp_price` INT(11) NOT NULL DEFAULT '0',
  `pp_pg` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_tno` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_app_no` VARCHAR(20) NOT NULL DEFAULT '',
  `pp_casseqno` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_receipt_price` INT(11) NOT NULL DEFAULT '0',
  `pp_settle_case` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_bank_account` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_deposit_name` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_receipt_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pp_receipt_ip` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_shop_memo` TEXT NOT NULL,
  `pp_cash` TINYINT(4) NOT NULL DEFAULT '0',
  `pp_cash_no` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_cash_info` TEXT NOT NULL,
  `pp_ip` VARCHAR(255) NOT NULL DEFAULT '',
  `pp_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pp_id`),
  KEY `od_id` (`od_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_sendcost`
--

DROP TABLE IF EXISTS `g5_shop_sendcost`;
CREATE TABLE IF NOT EXISTS `g5_shop_sendcost` (
  `sc_id` INT(11) NOT NULL AUTO_INCREMENT,
  `sc_name` VARCHAR(255) NOT NULL DEFAULT '',
  `sc_zip1` VARCHAR(10) NOT NULL DEFAULT '',
  `sc_zip2` VARCHAR(10) NOT NULL DEFAULT '',
  `sc_price` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sc_id`),
  KEY `sc_zip1` (`sc_zip1`),
  KEY `sc_zip2` (`sc_zip2`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_wish`
--

DROP TABLE IF EXISTS `g5_shop_wish`;
CREATE TABLE IF NOT EXISTS `g5_shop_wish` (
  `wi_id` INT(11) NOT NULL AUTO_INCREMENT,
  `mb_id` VARCHAR(255) NOT NULL DEFAULT '',
  `it_id` VARCHAR(20) NOT NULL DEFAULT '0',
  `wi_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wi_ip` VARCHAR(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`wi_id`),
  KEY `index1` (`mb_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_item_stocksms`
--

DROP TABLE IF EXISTS `g5_shop_item_stocksms`;
CREATE TABLE IF NOT EXISTS `g5_shop_item_stocksms` (
  `ss_id` INT(11) NOT NULL AUTO_INCREMENT,
  `it_id` VARCHAR(20) NOT NULL DEFAULT '',
  `ss_hp` VARCHAR(255) NOT NULL DEFAULT '',
  `ss_send` TINYINT(4) NOT NULL DEFAULT '0',
  `ss_send_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ss_datetime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ss_ip` VARCHAR(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`ss_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5_shop_inicis_log`
--

DROP TABLE IF EXISTS `g5_shop_inicis_log`;
CREATE TABLE IF NOT EXISTS `g5_shop_inicis_log` (
  `oid` bigINT(20) unsigned NOT NULL,
  `P_TID` VARCHAR(255) NOT NULL DEFAULT '',
  `P_MID` VARCHAR(255) NOT NULL DEFAULT '',
  `P_AUTH_DT` VARCHAR(255) NOT NULL DEFAULT '',
  `P_STATUS` VARCHAR(255) NOT NULL DEFAULT '',
  `P_TYPE` VARCHAR(255) NOT NULL DEFAULT '',
  `P_OID` VARCHAR(255) NOT NULL DEFAULT '',
  `P_FN_NM` VARCHAR(255) NOT NULL DEFAULT '',
  `P_AUTH_NO` VARCHAR(255) NOT NULL DEFAULT '',
  `P_AMT` INT(11) NOT NULL DEFAULT '0',
  `P_RMESG1` VARCHAR(255) NOT NULL DEFAULT '',
  `post_data` TEXT NOT NULL,
  `is_mail_send` TINYINT(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
