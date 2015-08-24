<?php
/**
 * this is for redstar
 * 
 */
defined('IN_IA') or exit('Access Denied');


function rs_reg($user) {
	if (empty($user) || !is_array($user)) {
		return 0;
	}
	pdo_insert('redstar_user', $user);
	return 0;
}


function rs_check($openid) {
	$where = " WHERE openid= '$openid'";
	$sql = 'SELECT * FROM ' . tablename('redstar_user') . "$where LIMIT 1";
	$record = pdo_fetch($sql, $params);
	if(empty($record)) {
		return false;
	}
	return true;
}


function rs_user($openid) {
	$where = " WHERE openid= '$openid'";
	$sql = 'SELECT * FROM ' . tablename('redstar_user') . "$where LIMIT 1";
	$record = pdo_fetch($sql, $params);
	return $record;
}

function rs_ibeacon_ans($ans){
	$openid = $ans['openid'];
	
	$where = " WHERE openid= '$openid'";
	$sql = 'DELETE FROM ' . tablename('redstar_ibeacon') . "$where";
	pdo_query($sql);
	$ans['openid'] = $openid;
	pdo_insert('redstar_ibeacon', $ans);
}
