<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>红豆帮</title>
    
    <link href="<?php  echo $_W['siteroot'];?>app/resource/css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
       
        <div class="user-info">
          <img class='avatar' src="<?php  echo $_W['siteroot'];?>app/resource/img/female_head.gif">
          <div class='info'>
            <div class="user-id">红豆帮ID:<?php  echo $user['id'];?></div>
            <a class="forum-button" href="#comming">进入红豆社区</a>
          </div>
        </div>

        <div class="hongdou">
            <div class="row">
                <div class="left large-font">红豆钱包</div>
                <div class="right1">
                  <span class="tag">红豆</span><span class="num">100个</span>
                </div>
            </div>
            
            <a  href="#comming" class="row">
               <div class="left large-font">红豆特权</div>
               <img class="right2" src="<?php  echo $_W['siteroot'];?>app/resource/img/down.gif" width="30" height="30">
            </a>

            <a href="#comming" class="row">
               <div class="left">完善个人信息，获得更多特权</div>
               <img class="right3" src="<?php  echo $_W['siteroot'];?>app/resource/img/right.gif" width="10" height="14">
            </a>
            <a  href="#comming" class="row">
               <div class="left">玩转红豆</div>
                <img class="right3" src="<?php  echo $_W['siteroot'];?>app/resource/img/right.gif" width="10" height="14">
            </a>
            <img src="<?php  echo $_W['siteroot'];?>app/resource/img/bottom_slogan.gif" class="center-block top-20">
        </div>
        
        <div id="comming" class="comming-soon">
            <div class="tooltip">
              <a class="close" href="#page"><img src="<?php  echo $_W['siteroot'];?>app/resource/img/close.gif" width="22" height="22"></a>
              <img class="cont" src="<?php  echo $_W['siteroot'];?>app/resource/img/comming.gif" width="210" height="115">
            </div>
        </div>

    </div>
  </body>
</html>
