<?php
/**
 * 
 * reg for redstar
 */
defined('IN_IA') or exit('Access Denied');
$do = in_array($do, array('index', 'ci', 'succ')) ? $do : 'index';
load()->model('redstar');

if($do == "index"){
   $openid = $_W['openid'];
   template('rs_ibeacon/ibeacon_1');
}

if($do == "ci"){
   $openid = trim($_GPC['openid']) ? trim($_GPC['openid']) : message('openid不能为空！', '', 'error');
   $q1 = trim($_GPC['q1']) ? trim($_GPC['q1']) : message('请填写第一题答案！', '', 'error');
   $q2 = trim($_GPC['q2']) ? trim($_GPC['q2']) : message('请填写第二题答案！', '', 'error');
   
   $u = array(
      "openid"=>$openid, 
      "q1"=>$q1, 
      "q2"=>$q2, 
   );
   rs_ibeacon_ans($u);
   message('成功', './index.php?c=rsibeacon&do=succ&i=2&t=2', 'ok');
}

if($do == "succ"){
   template('rs_ibeacon/ibeacon_2');
}
