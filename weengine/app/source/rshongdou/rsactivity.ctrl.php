<?php
/**
 * 
 * activity for redstar
 */
defined('IN_IA') or exit('Access Denied');

$do = in_array($do, array('index', 'order')) ? $do : 'index';
load()->model('redstar');
if($do == "index"){
   template('rs_hongdou/activity');
}

if($do == "order"){
   template("rs_hongdou/order");
}

if($do == "reg_success"){
   template('rs_reg/reg_success');
}
