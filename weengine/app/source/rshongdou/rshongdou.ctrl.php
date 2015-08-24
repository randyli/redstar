<?php
/**
 * 
 * reg for redstar
 */
defined('IN_IA') or exit('Access Denied');

load()->model('redstar');
$openid = $_W['openid'];
$user = rs_user($openid);
template('rs_hongdou/hongdoubang');
