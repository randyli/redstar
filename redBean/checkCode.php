<?php
	//载入ucpass类	
	require_once('lib/Ucpaas.class.php');	
	//初始化必填
	$options['accountsid']='8bd7e8279a0390eb9beaaf5063b4cdec';
	$options['token']='3b3cdd3c9e4170697fc823a7913701f5';
	//初始化 $options必填
	$ucpass = new Ucpaas($options);	
	//开发者账号信息查询默认为json或xml	
	$ucpass->getDevinfo('xml');
	$appId = "5c5f239bfb97495d84cce1ddf9ea1d36";
	$to = $_POST["phone"];
	$templateId = "10990";
	
	$arr=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9"];
	$code="";
	for($i=0;$i<6;$i++){
		$code.=$arr[rand(0,count($arr))];
	}
	
	$param="$code,2";	
	$ucpass->templateSMS($appId,$to,$templateId,$param);
	echo $code;
?>