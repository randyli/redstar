<?php
/**
 * 
 * reg for redstar
 */
defined('IN_IA') or exit('Access Denied');

load()->model('redstar');
$openid = $_W['openid'];
$user = rs_user($openid);

$openid = $_W['openid'];
$sql = 'SELECT card_no FROM ' . tablename('redstar_order') . " WHERE `open_id` = :open_id and status=1 limit 1";
$is_buy = pdo_fetch($sql, array(':open_id' => $openid));
if($is_buy) {
	$is_buy = true;
}else{
	$is_buy = false;
}

template('rs_hongdou/hongdoubang');
