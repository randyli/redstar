<?php
/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
define('ALIPAY_GATEWAY', 'http://wappaygw.alipay.com/service/rest.htm');

function alipay_build($params, $alipay = array()) {
	global $_W;
	$tid = $_W['uniacid'] . ':' . $params['tid'];
	$set = array();
	$set['service'] = 'alipay.wap.trade.create.direct';
	$set['format'] = 'xml';
	$set['v'] = '2.0';
	$set['partner'] = $alipay['partner'];
	$set['req_id'] = $tid;
	$set['sec_id'] = 'MD5';
	$callback = $_W['siteroot'] . 'payment/alipay/return.php';
	$notify = $_W['siteroot'] . 'payment/alipay/notify.php';
	$merchant = $_W['siteroot'] . 'payment/alipay/merchant.php';
	$expire = 10;
	$set['req_data'] = "<direct_trade_create_req><subject>{$params['title']}</subject><out_trade_no>{$tid}</out_trade_no><total_fee>{$params['fee']}</total_fee><seller_account_name>{$alipay['account']}</seller_account_name><call_back_url>{$callback}</call_back_url><notify_url>{$notify}</notify_url><out_user>{$params['user']}</out_user><merchant_url>{$merchant}</merchant_url><pay_expire>{$expire}</pay_expire></direct_trade_create_req>";
	$prepares = array();
	foreach($set as $key => $value) {
		if($key != 'sign') {
			$prepares[] = "{$key}={$value}";
		}
	}
	sort($prepares);
function wechat_build($params, $wechat) {
		$package['trade_type'] = 'JSAPI';
		ksort($package, SORT_STRING);