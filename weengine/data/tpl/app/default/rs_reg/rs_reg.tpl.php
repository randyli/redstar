<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>注册</title>
    
    <link href="<?php  echo $_W['siteroot'];?>app/resource/css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="wrapper">
       
        <img class="center-block logo top-20" src="<?php  echo $_W['siteroot'];?>app/resource/img/logo.gif">
        <img class="center-block slogan top-20" src="<?php  echo $_W['siteroot'];?>app/resource/img/text.gif">
        
        <div class="reg-form top-20">
            <div class="input-group">
              <span class="input-label">姓名</span>
              <input type="text" class="reg-text">
            </div>
            <div class="input-group top-10">
              <span class="input-label">手机号</span>
              <input type="number" class="reg-text">
            </div>

            <div id="sex-group" class="input-group">
              <input type="radio" id="male" checked="checked" name="sex" value="male">
              <label name="male" class="sex-male checked" data='sex' for="male">男</label>
              <input type="radio" id="female" name="sex" value="female">
              <label name="female" class="sex-female" for="female" data='sex'>女</label>
            </div>
          <div class="accept-slim">
              <div class="inner center-block">
                <input type="checkbox" id="is_accept">
                <label for="is_accept">我愿意接收家居帮发布的消息</label>
             </div>
          </div>
        </div>

        <button class="reg-button center-block">马上注册 送100红豆</button>


    </div>
    <script type="text/javascript" src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/zepto.min.js"></script>
    <script>
      $(function() {
       $('[data="sex"]').click(function(){
         var radioId = $(this).attr('name');
         $('[data="sex"]').removeClass('checked');
         $(this).addClass('checked');
         $('input[type="radio"]').removeAttr('checked') && $('#' + radioId).attr('checked', 'checked');
      });
      });
    </script>
  </body>
</html>
