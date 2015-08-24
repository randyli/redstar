<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>注册成功</title>
    
    <link href="<?php  echo $_W['siteroot'];?>app/resource/css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
       
        <img class="reg-success" src="<?php  echo $_W['siteroot'];?>app/resource/img/reg_success.gif">
        <img class="hongdou-tip center-block" src="<?php  echo $_W['siteroot'];?>app/resource/img/100_hongdou.gif">

        <div class="center-block suc-button-group top-20">
          <a class="suc-button" href="./index.php?c=rshongdou&i=2&t=2" >进入我的红豆帮</a>
          <a class="sub-button" href="#">还没有关注家居帮？</a>
        </div>

        <div class="suc-slogan top-20">您离更好的家居生活 只剩动动手指的距离</div>
    </div>
  </body>
</html>
