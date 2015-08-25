<?php
/**
 * 
 * activity for redstar
 */
defined('IN_IA') or exit('Access Denied');

$do = in_array($do, array('index', 'order','payed', 'success','success02', 'detail','fail')) ? $do : 'index';
load()->model('redstar');
if($do == "index"){
   template('rs_hongdou/activity');
}

if($do == "order"){
   template("rs_hongdou/order");
}

if($do == "payed"){
   template('rs_hongdou/payed');
}

if($do == "success"){
   $card = $_GPC['card'];
   template('rs_hongdou/success');
}


if($do == "success02"){
   template('rs_hongdou/success02');
}

if($do == "detail"){
   template('rs_hongdou/detail');
}


if($do == "fail"){
   template('rs_hongdou/fail');
}

