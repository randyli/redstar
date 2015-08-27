<?php
	//载入ucpass类	
	require_once('lib/Ucpaas.class.php');	
	//初始化必填
	function sendCode($mobile, $code) {
		$options['accountsid']='8bd7e8279a0390eb9beaaf5063b4cdec';
		$options['token']='3b3cdd3c9e4170697fc823a7913701f5';
		//初始化 $options必填
		$ucpass = new Ucpaas($options);	
		//开发者账号信息查询默认为json或xml	
		$ucpass->getDevinfo('xml');
		$appId = "5c5f239bfb97495d84cce1ddf9ea1d36";
		$templateId = "10990";
		$param="$code,2";	
		$ucpass->templateSMS($appId,$mobile,$templateId,$param);
	}
?>