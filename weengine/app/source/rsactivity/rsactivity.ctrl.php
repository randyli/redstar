<?php
/**
 * 
 * activity for redstar
 */
defined('IN_IA') or exit('Access Denied');

$do = in_array($do, array('index', 'order','payed', 'success','package','success02', 'detail','fail')) ? $do : 'index';
load()->model('redstar');
if($do == "index"){
	//是否已经购买过
	$openid = $_W['openid'];
	$sql = 'SELECT card_no FROM ' . tablename('redstar_order') . " WHERE `open_id` = :open_id and status=1 limit 1";
	$is_buy = pdo_fetch($sql, array(':open_id' => $openid));
	
	if($is_buy) {
		$is_buy = true;
	}else{
		$is_buy = false;
	}

	$sql = 'SELECT reserve_num FROM ' . tablename('redstar_reserve') . " WHERE `reserve_type` = '大礼包卡'";
	$reserve = pdo_fetch($sql);
	if($reserve) {
		$reserve = $reserve['reserve_num'];
	}
   template('rs_hongdou/activity');
}

if($do == "order"){
	$openid = $_W['openid'];
	//是否注册
	$sql = 'SELECT * FROM ' . tablename('redstar_user') . " WHERE `openid` = :open_id";
	$user = pdo_fetch($sql, array(':open_id' => $openid));
	if(!$user) {
		header('Location:' . url('rsreg', array('do'=>'reg2')));
		exit();
	}

	$sql = 'SELECT card_no FROM ' . tablename('redstar_order') . " WHERE `open_id` = :open_id and status=1 limit 1";
	$is_buy = pdo_fetch($sql, array(':open_id' => $openid));
	
	if($is_buy) {
		$is_buy = true;
		template('rs_hongdou/activity');
		die;
	}
   template("rs_hongdou/order");
}

if($do == "payed"){
   template('rs_hongdou/payed');
}

if($do == "success"){
   $card = $_GPC['card'];
   template('rs_hongdou/success');
}

if($do == 'package') {
	template('rs_hongdou/package');
}

if($do == "success02"){
	$card = $_GPC['card'];
	$openid = $_W['openid'];
	//var_dump($_W);
	//die;
	$sql = 'SELECT follow FROM ' . tablename('mc_mapping_fans') . " WHERE `openid` = :openid limit 1";
	$follow = pdo_fetch($sql, array(':openid' => $openid));

	if($follow && $follow['follow'] == 1) {
		$follow = true;
	}else{
		$follow = false;
	}
    template('rs_hongdou/success02');
}

if($do == "detail"){
	$openid = $_W['openid'];
	//var_dump($_W);
	//die;
	$sql = 'SELECT card_no FROM ' . tablename('redstar_order') . " WHERE `open_id` = :openid limit 1";
	$card = pdo_fetch($sql, array(':open_id' => $openid));
	if($card) {
		$card = $card['card_no'];
	}
   	template('rs_hongdou/detail');
}


if($do == "fail"){
   template('rs_hongdou/fail');
}

