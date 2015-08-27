<?php
/**
 * 
 * reg for redstar
 */
defined('IN_IA') or exit('Access Denied');
$do = in_array($do, array('index', 'reg', 'reg2', 'reg2post', 'reg_success', 'checkcode')) ? $do : 'index';
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


if($do == 'reg2') {
   $openid = $_W['openid'];
   //$openid = 'adlkasldfad';
   template("rs_reg/register");
}

if($do == 'reg2post') {
   $openid = trim($_GPC['openid']) ? trim($_GPC['openid']) : message('openid不能为空！', '', 'error');   
   $mobile = trim($_GPC['phone']) ? trim($_GPC['phone']) : message('请填写手机号！', '', 'error'); 
   $code = trim($_GPC['checkCode']) ? trim($_GPC['checkCode']) : message('请填写验证码！', '', 'error'); 

   if(!isset($_SESSION['sms']) || $code != $_SESSION['sms']['code']) {
      message('请填写正确验证码！', '', 'error');
   }
   $u = array(
      "openid"=>$openid,
      "mobile"=>$mobile,  
   );
   rs_reg($u);
   
   header('Location:' . url('rsactivity', array('do'=>'order')));
   exit;
}

if($do == "checkcode") {
   $mobile = trim($_GPC['phone']);
   if(!$mobile) {
      message('手机号不能为空', '', 'error');
   }
   $sms = $_SESSION['sms'];
   $code = rand(1000, 9999);
   if($sms) {
      if(time() - $sms['time'] < 90) {
         message('发送验证码小于90秒', '', 'error');
      }
      if(time() - $sms['time'] < 600) {
         $code = $sms['code'];
      }
   }

   require IA_ROOT . "/framework/library/sms/checkCode.php";
   
   sendCode($mobile, $code);
   $_SESSION['sms'] = array('code' => $code,  'mobile'=> $mobile, 'time'=>time());
   echo $code;
   exit();
}