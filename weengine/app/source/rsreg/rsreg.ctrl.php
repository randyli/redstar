<?php
/**
 * 
 * reg for redstar
 */
defined('IN_IA') or exit('Access Denied');
$do = in_array($do, array('index', 'reg', 'reg_success')) ? $do : 'index';
load()->model('redstar');
if($do == "index"){
   $openid = $_W['openid'];
   if(rs_check($openid)){
	header("Location: "."./index.php?c=rshongdou&do=index&i=2&t=2");
	exit;
   }
   template('rs_reg/reg');
}

if($do == "reg"){
   $openid = trim($_GPC['openid']) ? trim($_GPC['openid']) : message('openid不能为空！', '', 'error');
   $user = trim($_GPC['user']) ? trim($_GPC['user']) : message('请填写姓名！', '', 'error');
   $mobile = trim($_GPC['mobile']) ? trim($_GPC['mobile']) : message('请填写手机号！', '', 'error'); 
   $sex = trim($_GPC['sex']) ? trim($_GPC['sex']) : message('请选择性别！', '', 'error'); 
   
   $u = array(
      "openid"=>$openid, 
      "user"=>$user, 
      "mobile"=>$mobile, 
      "sex"=>$sex, 
   );
   rs_reg($u);
   message('成功', './index.php?c=rsreg&do=reg_success&i=2&t=2&openid='.$openid, 'ok');
}

if($do == "reg_success"){
   template('rs_reg/reg_success');
}
