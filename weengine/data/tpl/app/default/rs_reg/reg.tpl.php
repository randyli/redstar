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
       
        <img class="center-block logo top-30" src="<?php  echo $_W['siteroot'];?>app/resource/img/logo.gif">
        <img class="center-block slogan top-30" src="<?php  echo $_W['siteroot'];?>app/resource/img/text.gif">
        <input type="hidden" id="openid" value="<?php  echo $openid;?>">
        
        <div class="reg-form top-20">
            <div class="input-group">
              <span class="input-label">姓名</span>
              <input type="text" id="user" class="reg-text">
	      <a href="javascript:;" id="qd_user" title="清空" class="quickdelete" style="top: 0px; right: 0px;"></a>
            </div>
            <div class="input-group top-10">
              <span class="input-label">手机号</span>
              <input type="number" id="mobile" class="reg-text">
	      <a href="javascript:;" id="qd_mobile" title="清空" class="quickdelete" style="top: 0px; right: 0px;"></a>
            </div>

            <div id="sex-group" class="input-group">
              <input type="radio" id="male" checked="checked" name="sex" value="male">
              <label name="male" class="sex-male checked" data='sex' for="male">男</label>
              <input type="radio" id="female" name="sex" value="female">
              <label name="female" class="sex-female" for="female" data='sex'>女</label>
            </div>
          <div class="accept-slim">
              <div class="inner center-block">
                <input type="checkbox" id="is_accept" checked="checked">
                <label for="is_accept" id="accept_label">我愿意接收家居帮发布的消息</label>
             </div>
          </div>
        </div>

        <button id="btn-reg" class="reg-button center-block">马上注册 送100红豆</button>


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

       $('#btn-reg').click(function(){
          var o = $('#openid').val();
          var u = $('#user').val();
	  var m = $('#mobile').val();
	  var s = $('[name="sex"]:checked').val();
	  var c = 1;
	  if($("#is_accept").attr("checked")!=true){
		c = 0;
	  }
	  if(u == ''){
		alert("请输入您的姓名");
		return;
	  }
	  if(m == ''){
		alert("请输入您的手机号");
		return;
	  }

	  $.ajax(
		 {
		   url:'./index.php?c=rsreg&do=reg&i=2&t=2', 
		   data: { openid:o, user: u, mobile:m, sex:s,accept:c},
	           dataType: 'json',
                   success: function(response){ 
		              console.log(response);
	                      if(response.type == "success"){
		                 location.href = response.redirect;
	                      }else{
				alert(response.message);
			      }
	                   }
       	  });
      });


       $('#qd_user').click(function(){
		       $('#user').val('');
		       $('#qd_user').hide();
		       });
       $('#qd_mobile').click(function(){
		       $('#mobile').val('');
		       $('#qd_mobile').hide();
		       });

       $('#user').on("input", function(){
		       if($('#user').val() == ''){
		       $("#qd_user").hide();
		       }else{
		       $("#qd_user").show();
		       }

		       });

       $('#mobile').on("input", function(){
		       if($('#mobile').val == ''){
		       $("#qd_mobile").hide();
		       }else{
		       $("#qd_mobile").show();
		       }
		       });

    });
    </script>
  </body>
</html>
