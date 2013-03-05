<?php
/******************************
 * $File: borrow.install.php
 * $Description: ������װ
 * $Author: ahui 
 * $Time:2010-06-06
 * $Update:Ahui
 * $UpdateDate:2012-06-10  
 * Copyright(c) 2010 - 2012 by deayou.com. All rights reserved
******************************/


if (!defined('ROOT_PATH'))  die('���ܷ���');//��ֱֹ�ӷ���

$sql = "
CREATE TABLE IF NOT EXISTS `{borrow}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '�û�����',
  `name` varchar(255) DEFAULT NULL COMMENT '����',
  `status` int(2) DEFAULT '0' COMMENT '״̬',
  `order` int(11) DEFAULT '0' COMMENT '����',
  `hits` int(11) DEFAULT '0' COMMENT '�������',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `litpic` varchar(255) DEFAULT NULL COMMENT '����ͼ',
  `flag` varchar(50) DEFAULT NULL COMMENT '����',
  `type` varchar(50) NOT NULL,
  `view_type` varchar(50) NOT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  `cash_status` int(2) NOT NULL,
  `forst_account` varchar(50) DEFAULT '0',
  `account` decimal(11,2) DEFAULT '0.00' COMMENT '����ܽ��',
  `other_web_status` int(2) NOT NULL,
  `account_contents` longtext NOT NULL COMMENT '������Ϣ',
  `borrow_type` varchar(100) NOT NULL COMMENT '�������',
  `borrow_flag` varchar(100) NOT NULL COMMENT '�������',
  `borrow_status` int(2) NOT NULL COMMENT '�Ƿ���Խ��н��',
  `borrow_full_status` int(2) NOT NULL COMMENT '�������״̬',
  `borrow_nid` varchar(50) DEFAULT NULL COMMENT '����ʶ����',
  `borrow_account_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�ѽ赽�Ľ��',
  `borrow_account_wait` decimal(11,2) NOT NULL DEFAULT '0.00',
  `borrow_account_scale` decimal(11,0) DEFAULT '0' COMMENT '����������',
  `borrow_use` varchar(100) DEFAULT '0' COMMENT '��;',
  `borrow_style` int(10) DEFAULT '0' COMMENT '���ʽ',
  `borrow_period` int(10) DEFAULT '0' COMMENT '�������',
  `borrow_apr` int(10) DEFAULT '0' COMMENT '�������',
  `borrow_contents` text COMMENT '��������',
  `borrow_frost_account` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '������',
  `borrow_frost_` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '������',
  `borrow_valid_time` int(20) DEFAULT '0' COMMENT '�����Чʱ��',
  `borrow_success_time` int(20) DEFAULT '0' COMMENT '���ɹ�ʱ��',
  `borrow_end_time` varchar(100) NOT NULL COMMENT '����ʱ��',
  `borrow_part_status` int(2) NOT NULL COMMENT '�Ƿ񲿷ֽ��',
  `cancel_status` int(2) NOT NULL COMMENT '�Ƿ���',
  `cancel_time` varchar(50) NOT NULL COMMENT '����ʱ��',
  `cancel_remark` varchar(200) NOT NULL COMMENT '��������',
  `tender_account_min` int(11) DEFAULT '0' COMMENT '��С��Ͷ�ʶ�',
  `tender_account_max` int(11) DEFAULT '0' COMMENT '����Ͷ�ʶ�',
  `tender_times` int(11) DEFAULT '0' COMMENT 'Ͷ��Ĵ���',
  `tender_last_time` varchar(50) NOT NULL COMMENT '���Ͷ��ʱ��',
  `repay_account_all` decimal(11,2) DEFAULT '0.00' COMMENT 'Ӧ�����ܶ�',
  `repay_account_interest` decimal(11,2) DEFAULT '0.00' COMMENT '�ܻ�����Ϣ',
  `repay_account_capital` decimal(11,2) DEFAULT '0.00' COMMENT '�ܻ����',
  `repay_account_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�ѻ����ܶ�',
  `repay_account_interest_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�ѻ�����Ϣ',
  `repay_account_capital_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�ѻ����',
  `repay_account_wait` decimal(11,2) DEFAULT '0.00' COMMENT 'δ�����ܶ�',
  `repay_account_interest_wait` decimal(11,2) DEFAULT '0.00' COMMENT 'δ������Ϣ',
  `repay_account_capital_wait` decimal(11,2) DEFAULT '0.00' COMMENT 'δ�����',
  `repay_account_times` int(5) DEFAULT '0' COMMENT '����Ĵ���',
  `repay_month_account` int(5) DEFAULT '0' COMMENT 'ÿ�»�����',
  `repay_last_time` varchar(50) NOT NULL COMMENT '��󻹿�ʱ��',
  `repay_each_time` varchar(250) DEFAULT '' COMMENT 'ÿ�λ����ʱ��',
  `repay_next_time` int(20) DEFAULT '0' COMMENT '��һ�ʻ���ʱ��',
  `repay_next_account` decimal(11,2) DEFAULT '0.00' COMMENT '��һ�ʻ�����',
  `repay_times` int(11) NOT NULL COMMENT '�������',
  `late_interest` decimal(11,2) NOT NULL COMMENT '������Ϣ',
  `late_forfeit` decimal(11,2) NOT NULL COMMENT '���ڴ߽ɷ�',
  `vouch_status` int(2) NOT NULL COMMENT '�Ƿ��ǵ���',
  `vouch_advance_status` int(2) NOT NULL DEFAULT '0',
  `vouch_user_status` int(2) NOT NULL COMMENT '�����˵���״̬',
  `vouch_users` varchar(100) NOT NULL COMMENT '�������б�',
  `vouch_account` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '�ܵ����Ľ��',
  `vouch_account_yes` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '�ѵ����Ľ��',
  `vouch_account_wait` decimal(11,2) NOT NULL DEFAULT '0.00',
  `vouch_account_scale` decimal(11,0) NOT NULL DEFAULT '0' COMMENT '�ѵ����ı���',
  `vouch_times` int(5) NOT NULL DEFAULT '0' COMMENT '��������',
  `vouch_award_status` int(2) NOT NULL DEFAULT '0' COMMENT '�Ƿ����õ�������',
  `vouch_award_scale` decimal(11,2) NOT NULL COMMENT '��������',
  `vouch_award_account` decimal(11,2) DEFAULT '0.00' COMMENT '�ܸ����ĵ�������',
  `fast_status` int(2) NOT NULL,
  `vouchstatus` int(2) NOT NULL,
  `group_status` int(2) NOT NULL COMMENT '1Ȧ��,0ȫ��',
  `group_id` int(30) NOT NULL COMMENT 'Ȧ�ӱ��',
  `award_status` int(2) DEFAULT '0' COMMENT '�Ƿ���',
  `award_false` int(2) DEFAULT '0' COMMENT 'Ͷ��ʧ���Ƿ�Ҳ����',
  `award_account` decimal(11,2) DEFAULT NULL COMMENT '�������',
  `award_scale` decimal(11,2) DEFAULT NULL COMMENT '����������',
  `award_account_all` decimal(11,2) DEFAULT '0.00' COMMENT 'Ͷ�꽱���ܶ�',
  `open_account` int(2) DEFAULT '0' COMMENT '�����ҵ��ʻ��ʽ����',
  `open_borrow` int(2) DEFAULT '0' COMMENT '�����ҵĽ���ʽ����',
  `open_tender` int(2) DEFAULT '0' COMMENT '�����ҵ�Ͷ���ʽ����',
  `open_credit` int(2) DEFAULT '0' COMMENT '�����ҵ����ö�����',
  `comment_staus` int(2) NOT NULL COMMENT '�Ƿ��������',
  `comment_times` int(11) NOT NULL COMMENT '���۴���',
  `comment_usertype` varchar(50) NOT NULL COMMENT '�����۵��û�',
  `verify_userid` varchar(11) DEFAULT '0' COMMENT '�����',
  `verify_time` varchar(50) DEFAULT '0' COMMENT '���ʱ��',
  `verify_remark` varchar(255) DEFAULT '',
  `reverify_userid` varchar(11) DEFAULT '0' COMMENT '�����',
  `reverify_time` varchar(50) DEFAULT '0' COMMENT '���ʱ��',
  `reverify_remark` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  KEY `flag` (`flag`),
  KEY `name` (`name`),
  KEY `status` (`status`),
  KEY `borrow_apr` (`borrow_apr`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `borrow_1` (`user_id`,`type`,`borrow_nid`,`borrow_apr`,`status`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{borrow_amount}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amounts` longtext NOT NULL,
  `borrow` decimal(11,2) NOT NULL,
  `borrow_add` decimal(11,2) NOT NULL,
  `borrow_reduce` decimal(11,2) NOT NULL,
  `borrow_use` decimal(11,2) NOT NULL,
  `vouch_borrow` decimal(11,2) NOT NULL,
  `vouch_borrow_add` decimal(11,2) NOT NULL,
  `vouch_borrow_reduce` decimal(11,2) NOT NULL,
  `vouch_borrow_use` decimal(11,2) NOT NULL,
  `vouch_tender` decimal(11,2) NOT NULL,
  `vouch_tender_add` decimal(11,2) NOT NULL,
  `vouch_tender_reduce` decimal(11,2) NOT NULL,
  `vouch_tender_use` decimal(11,2) NOT NULL,
  `update_time` varchar(50) NOT NULL,
  `update_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{borrow_amount_apply}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `amount_type` varchar(100) NOT NULL,
  `oprate` varchar(50) NOT NULL COMMENT '����������add������reduce',
  `amount_account` decimal(11,2) NOT NULL DEFAULT '0.00',
  `account` decimal(11,2) NOT NULL COMMENT '���˶��',
  `status` int(11) DEFAULT '0',
  `content` text NOT NULL,
  `remark` varchar(200) NOT NULL,
  `verify_remark` varchar(255) DEFAULT NULL,
  `verify_time` varchar(10) DEFAULT NULL,
  `verify_user` int(11) DEFAULT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `nid` (`nid`),
  KEY `amount_type` (`amount_type`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{borrow_amount_log}` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(11) NOT NULL COMMENT '�û�',
  `amount_type` varchar(100) NOT NULL COMMENT '�������',
  `oprate` varchar(50) NOT NULL COMMENT '����',
  `type` varchar(100) NOT NULL COMMENT '��������',
  `nid` varchar(100) NOT NULL COMMENT '�����ʶ����Ψһ',
  `account_return` decimal(11,2) NOT NULL COMMENT '����',
  `account_add` decimal(11,2) NOT NULL COMMENT '���Ӷ��',
  `account_frost` decimal(11,2) NOT NULL COMMENT '������',
  `account_reduce` decimal(11,2) NOT NULL COMMENT '���ٶ��',
  `account` decimal(11,2) NOT NULL COMMENT 'ͨ�����',
  `account_use` decimal(11,2) NOT NULL COMMENT '���ö��',
  `account_all` decimal(11,2) NOT NULL COMMENT '�ܶ��',
  `remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `nid` (`nid`),
  KEY `amount_type` (`amount_type`)
) ENGINE=MyISAM   ;

CREATE TABLE IF NOT EXISTS `{borrow_amount_type}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `amount_type` varchar(100) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `default` decimal(11,2) NOT NULL,
  `credit_nid` varchar(100) NOT NULL,
  `multiples` varchar(10) NOT NULL COMMENT '����',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `updatetime` varchar(50) NOT NULL,
  `updateip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `amount_type` (`amount_type`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM ;

CREATE TABLE IF NOT EXISTS `{borrow_auto}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `tender_type` int(2) NOT NULL COMMENT 'Ͷ������',
  `tender_account` int(50) NOT NULL,
  `tender_scale` int(50) NOT NULL,
  `order` int(11) NOT NULL,
  `account_min` decimal(11,2) NOT NULL,
  `first_date` int(50) NOT NULL,
  `last_date` int(50) NOT NULL,
  `account_min_status` int(2) NOT NULL,
  `date_status` int(2) NOT NULL,
  `account_use_status` int(2) NOT NULL,
  `account_use` decimal(11,2) NOT NULL,
  `video_status` int(10) NOT NULL,
  `realname_status` int(10) NOT NULL,
  `phone_status` int(10) NOT NULL,
  `my_friend` int(10) NOT NULL,
  `not_black` int(10) NOT NULL,
  `late_status` int(10) NOT NULL,
  `late_times` int(10) NOT NULL,
  `dianfu_status` int(10) NOT NULL,
  `dianfu_times` int(10) NOT NULL,
  `black_status` int(10) NOT NULL,
  `black_user` int(10) NOT NULL,
  `black_times` int(10) NOT NULL,
  `not_late_black` int(10) NOT NULL,
  `borrow_credit_status` int(10) NOT NULL,
  `borrow_credit_first` int(10) NOT NULL,
  `borrow_credit_last` int(10) NOT NULL,
  `tender_credit_status` int(10) NOT NULL,
  `tender_credit_first` int(10) NOT NULL,
  `tender_credit_last` int(10) NOT NULL,
  `user_rank` int(10) NOT NULL,
  `first_credit` int(10) NOT NULL,
  `last_credit` int(10) NOT NULL,
  `webpay_statis` int(10) NOT NULL,
  `webpay_times` int(10) NOT NULL,
  `borrow_style` int(10) NOT NULL,
  `timelimit_status` int(10) NOT NULL,
  `timelimit_month_first` int(10) NOT NULL,
  `timelimit_month_last` int(10) NOT NULL,
  `timelimit_day_first` int(10) NOT NULL,
  `timelimit_day_last` int(10) NOT NULL,
  `apr_status` int(10) NOT NULL,
  `apr_first` int(10) NOT NULL,
  `apr_last` int(10) NOT NULL,
  `award_status` int(10) NOT NULL,
  `award_first` int(10) NOT NULL,
  `award_last` int(10) NOT NULL,
  `vouch_status` int(10) NOT NULL,
  `tuijian_status` int(10) NOT NULL,
  `updatetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{borrow_autolog}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `account` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `remark` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM   ;





CREATE TABLE IF NOT EXISTS `{borrow_count}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tender_times` int(11) NOT NULL,
  `tender_success_times` int(11) NOT NULL,
  `tender_account` decimal(11,2) NOT NULL,
  `tender_success_account` decimal(11,2) NOT NULL,
  `tender_recover_account` decimal(11,2) NOT NULL,
  `tender_frost_account` decimal(11,2) NOT NULL,
  `tender_recover_yes` decimal(11,2) NOT NULL,
  `tender_recover_times` int(11) NOT NULL,
  `tender_recover_times_yes` int(11) NOT NULL,
  `tender_recover_times_wait` int(11) NOT NULL,
  `tender_recover_wait` decimal(11,2) NOT NULL,
  `tender_capital_account` decimal(11,2) NOT NULL,
  `tender_capital_yes` decimal(11,2) NOT NULL,
  `tender_capital_wait` decimal(11,2) NOT NULL,
  `tender_interest_account` decimal(11,2) NOT NULL,
  `tender_interest_yes` decimal(11,2) NOT NULL,
  `tender_interest_wait` decimal(11,2) NOT NULL,
  `interest_scale` decimal(11,2) NOT NULL COMMENT '��Ȩ������',
  `web_dianfu_acccount` decimal(11,2) NOT NULL,
  `late_add_account` decimal(11,2) NOT NULL,
  `interest_reduce_account` decimal(11,2) NOT NULL,
  `borrow_times` int(11) NOT NULL,
  `borrow_vouch_times` int(11) NOT NULL,
  `borrow_success_times` int(11) NOT NULL,
  `borrow_repay_times` int(11) NOT NULL,
  `borrow_repay_yes_times` int(11) NOT NULL,
  `borrow_repay_wait_times` int(11) NOT NULL,
  `borrow_account` decimal(11,2) NOT NULL,
  `borrow_repay_account` decimal(11,2) NOT NULL,
  `borrow_repay_yes` decimal(11,2) NOT NULL,
  `borrow_repay_wait` decimal(11,2) NOT NULL,
  `borrow_repay_interest` decimal(11,2) NOT NULL,
  `borrow_repay_interest_yes` decimal(11,2) NOT NULL,
  `borrow_repay_interest_wait` decimal(11,2) NOT NULL,
  `borrow_repay_capital` decimal(11,2) NOT NULL,
  `borrow_repay_capital_yes` decimal(11,2) NOT NULL,
  `borrow_repay_capital_wait` decimal(11,2) NOT NULL,
  `fee_account` decimal(11,2) NOT NULL,
  `fee_recharge_account` decimal(11,2) NOT NULL,
  `fee_cash_account` decimal(11,2) NOT NULL,
  `fee_borrow_account` decimal(11,2) NOT NULL,
  `fee_tender_account` decimal(11,2) NOT NULL,
  `bad_account` decimal(11,2) NOT NULL,
  `weiyue` decimal(11,2) NOT NULL COMMENT 'ΥԼ��',
  `advance_repay_times` int(11) NOT NULL COMMENT '��ǰ�������',
  `borrow_weiyue` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

CREATE TABLE IF NOT EXISTS `{borrow_credit}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `nid` varchar(30) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `repay_period` int(2) NOT NULL,
  `borrow_apr` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM ;



CREATE TABLE IF NOT EXISTS `{borrow_recover}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT '0' COMMENT '����վ��',
  `status` int(2) DEFAULT '0',
  `user_id` int(11) DEFAULT '0' COMMENT '����վ��',
  `borrow_nid` varchar(50) DEFAULT '' COMMENT '���id',
  `borrow_userid` int(11) DEFAULT '0' COMMENT '���id',
  `tender_id` int(11) DEFAULT '0' COMMENT 'Ͷ��id',
  `recover_status` int(2) NOT NULL,
  `recover_period` int(2) DEFAULT NULL COMMENT '��������',
  `recover_time` varchar(50) DEFAULT NULL COMMENT '���ƻ���ʱ��',
  `recover_yestime` varchar(50) DEFAULT NULL COMMENT '�Ѿ�����ʱ��',
  `recover_account` decimal(11,2) DEFAULT '0.00' COMMENT 'Ԥ�����',
  `recover_interest` decimal(11,2) DEFAULT '0.00' COMMENT 'ʵ�����',
  `recover_capital` decimal(11,2) DEFAULT '0.00' COMMENT 'ʵ�����',
  `recover_account_yes` decimal(11,2) DEFAULT '0.00' COMMENT 'Ԥ�����',
  `recover_interest_yes` decimal(11,2) DEFAULT '0.00' COMMENT 'ʵ�����',
  `recover_capital_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�ѻ����',
  `recover_web` int(2) DEFAULT '0' COMMENT '��վ����',
  `recover_vouch` int(2) DEFAULT '0' COMMENT '�����˻���',
  `advance_status` int(2) NOT NULL,
  `late_days` int(11) NOT NULL DEFAULT '0' COMMENT '��������',
  `late_interest` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '������Ϣ',
  `late_forfeit` decimal(11,2) DEFAULT '0.00' COMMENT '�������ɽ�',
  `late_reminder` decimal(11,2) DEFAULT '0.00' COMMENT '���ڴ��շ�',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{borrow_repay}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(2) DEFAULT '0',
  `user_id` int(11) DEFAULT '0' COMMENT '����վ��',
  `borrow_nid` varchar(50) DEFAULT '0' COMMENT '���id',
  `repay_status` int(2) NOT NULL COMMENT '����״̬',
  `repay_period` int(2) DEFAULT NULL COMMENT '��������',
  `repay_time` varchar(50) DEFAULT NULL COMMENT '���ƻ���ʱ��',
  `repay_yestime` varchar(50) DEFAULT NULL COMMENT '�Ѿ�����ʱ��',
  `repay_account` decimal(11,2) DEFAULT '0.00' COMMENT 'Ԥ�����',
  `repay_interest` decimal(11,2) DEFAULT '0.00' COMMENT 'ʵ�����',
  `repay_capital` decimal(11,2) DEFAULT '0.00' COMMENT 'ʵ�����',
  `repay_account_yes` decimal(11,2) DEFAULT '0.00' COMMENT 'Ԥ�����',
  `repay_interest_yes` decimal(11,2) DEFAULT '0.00' COMMENT 'ʵ�����',
  `repay_capital_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�ѻ����',
  `repay_web` int(2) DEFAULT '0' COMMENT '��վ����',
  `repay_vouch` int(2) DEFAULT '0' COMMENT '�����˻���',
  `late_repay_status` int(2) NOT NULL COMMENT '�Ƿ����ڻ���',
  `late_days` int(11) NOT NULL DEFAULT '0' COMMENT '��������',
  `late_interest` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '������Ϣ',
  `late_forfeit` decimal(11,2) DEFAULT '0.00' COMMENT '�������ɽ�',
  `late_reminder` decimal(11,2) DEFAULT '0.00' COMMENT '���ڴ��շ�',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{borrow_tender}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '�û�����',
  `status` int(2) DEFAULT '0' COMMENT '״̬',
  `borrow_nid` varchar(50) DEFAULT '0',
  `nid` varchar(100) NOT NULL,
  `account_tender` decimal(11,2) DEFAULT '0.00',
  `account` decimal(11,2) DEFAULT '0.00',
  `change_status` int(2) NOT NULL COMMENT 'ծȨת��',
  `change_userid` int(11) NOT NULL COMMENT 'ת����',
  `tender_status` int(2) NOT NULL COMMENT 'Ͷ��״̬',
  `tender_nid` varchar(50) NOT NULL,
  `recover_account_all` decimal(11,2) DEFAULT '0.00' COMMENT '�տ��ܶ�',
  `recover_account_interest` decimal(11,2) DEFAULT '0.00' COMMENT '�տ�����Ϣ',
  `recover_account_yes` decimal(11,2) DEFAULT '0.00' COMMENT '�����ܶ�',
  `recover_account_interest_yes` decimal(11,2) DEFAULT '0.00' COMMENT '������Ϣ',
  `recover_account_capital_yes` decimal(11,2) DEFAULT '0.00' COMMENT '���ձ���',
  `recover_account_wait` decimal(11,2) DEFAULT '0.00' COMMENT '�����ܶ�',
  `recover_account_interest_wait` decimal(11,2) DEFAULT '0.00' COMMENT '������Ϣ',
  `recover_account_capital_wait` decimal(11,2) DEFAULT '0.00' COMMENT '���ձ���',
  `recover_times` int(10) DEFAULT '0' COMMENT '��������',
  `contents` varchar(250) NOT NULL,
  `auto_status` int(2) NOT NULL DEFAULT '0',
  `web_status` int(2) NOT NULL COMMENT '��վͶ��',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{borrow_tender_auto}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `tender_type` int(2) NOT NULL COMMENT 'Ͷ������',
  `tender_account` int(50) NOT NULL,
  `tender_scale` int(50) NOT NULL,
  `order` int(11) NOT NULL,
  `account_min` decimal(11,2) NOT NULL,
  `first_date` int(50) NOT NULL,
  `last_date` int(50) NOT NULL,
  `account_min_status` int(2) NOT NULL,
  `date_status` int(2) NOT NULL,
  `account_use_status` int(2) NOT NULL,
  `account_use` decimal(11,2) NOT NULL,
  `video_status` int(10) NOT NULL,
  `realname_status` int(10) NOT NULL,
  `phone_status` int(10) NOT NULL,
  `my_friend` int(10) NOT NULL,
  `not_black` int(10) NOT NULL,
  `late_status` int(10) NOT NULL,
  `late_times` int(10) NOT NULL,
  `dianfu_status` int(10) NOT NULL,
  `dianfu_times` int(10) NOT NULL,
  `black_status` int(10) NOT NULL,
  `black_user` int(10) NOT NULL,
  `black_times` int(10) NOT NULL,
  `not_late_black` int(10) NOT NULL,
  `borrow_credit_status` int(10) NOT NULL,
  `borrow_credit_first` int(10) NOT NULL,
  `borrow_credit_last` int(10) NOT NULL,
  `tender_credit_status` int(10) NOT NULL,
  `tender_credit_first` int(10) NOT NULL,
  `tender_credit_last` int(10) NOT NULL,
  `user_rank` int(10) NOT NULL,
  `first_credit` int(10) NOT NULL,
  `last_credit` int(10) NOT NULL,
  `webpay_statis` int(10) NOT NULL,
  `webpay_times` int(10) NOT NULL,
  `borrow_style` int(10) NOT NULL,
  `timelimit_status` int(10) NOT NULL,
  `timelimit_month_first` int(10) NOT NULL,
  `timelimit_month_last` int(10) NOT NULL,
  `timelimit_day_first` int(10) NOT NULL,
  `timelimit_day_last` int(10) NOT NULL,
  `apr_status` int(10) NOT NULL,
  `apr_first` int(10) NOT NULL,
  `apr_last` int(10) NOT NULL,
  `award_status` int(10) NOT NULL,
  `award_first` int(10) NOT NULL,
  `award_last` int(10) NOT NULL,
  `vouch_status` int(10) NOT NULL,
  `tuijian_status` int(10) NOT NULL,
  `updatetime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{borrow_tender_autolog}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `account` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `remark` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM  ;



CREATE TABLE IF NOT EXISTS `{borrow_tender_web}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `borrow_nid` int(11) NOT NULL,
  `account` decimal(11,2) NOT NULL,
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(250) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `dw_borrow_vouch` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `account` varchar(20) NOT NULL,
  `account_vouch` decimal(11,2) NOT NULL,
  `contents` text NOT NULL,
  `award_scale` varchar(10) NOT NULL,
  `award_account` decimal(11,2) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{borrow_vouch_recover}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(2) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `borrow_userid` int(11) NOT NULL,
  `order` int(2) DEFAULT NULL,
  `vouch_id` int(11) DEFAULT '0' COMMENT '���id',
  `advance_status` int(2) NOT NULL DEFAULT '0',
  `advance_time` varchar(50) NOT NULL,
  `repay_time` varchar(50) DEFAULT NULL COMMENT '���ƻ���ʱ��',
  `repay_yestime` varchar(50) DEFAULT NULL COMMENT '�Ѿ�����ʱ��',
  `repay_account` varchar(50) DEFAULT '0' COMMENT 'Ԥ�����',
  `repay_capital` decimal(11,2) NOT NULL,
  `repay_interest` decimal(11,2) NOT NULL,
  `repay_yesaccount` varchar(50) DEFAULT '0' COMMENT 'ʵ�����',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{borrow_vouch_repay}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(2) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50) NOT NULL,
  `order` int(2) DEFAULT NULL,
  `repay_time` varchar(50) DEFAULT NULL COMMENT '���ƻ���ʱ��',
  `repay_yestime` varchar(50) DEFAULT NULL COMMENT '�Ѿ�����ʱ��',
  `repay_account` varchar(50) DEFAULT '0' COMMENT 'Ԥ�����',
  `repay_yesaccount` varchar(50) DEFAULT '0' COMMENT 'ʵ�����',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM  ;



CREATE TABLE IF NOT EXISTS `{borrow_care}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `borrow_nid` varchar(50)   NOT NULL,
  `remark` varchar(30)  NOT NULL,
  `addtime` varchar(30)  NOT NULL,
  `addip` varchar(30)   NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_nid` (`borrow_nid`),
  KEY `userid_borrownid` (`user_id`,`borrow_nid`)
) ENGINE=MyISAM ;
";

$mysql->db_querys($sql);