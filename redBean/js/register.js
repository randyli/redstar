var code="";
jQuery.validator.addMethod("phone", function(value,element,param) {
	var length = value.length;
	var phone = /^\d{11}$/;
	return this.optional(element) || (length == 11 && phone.test(value));
}, "请正确填写您的电话号码！");
$(function(){		
	$("#registerForm").validate({
		rules:{
			phone:{
				required:true, 
				phone:true	
			},
			checkCode:{
				required:true
			}
			
		},
		messages:{
			phone:{
				required:"手机号码必须输入！", 
				phone:"手机号码格式错误！"
			},
			checkCode:{
				required:"验证码错误！"
			}
		}
	});
	$("#phone").keyup(function(){
		var phone = /^\d{11}$/,
			index=$(this).get(0).selectionStart;
		$(".point").show().css({"left":index*10});			
		if(phone.exec($(this).val())){
			$("#sendCode").attr("disabled",false);
		}else{
			$("#sendCode").attr("disabled",true);
		}			
	}).focusout(function(){
		$(".point").hide();
	});
			
	$("#sendCode").click(function(){
		var total=60,$this=$(this);			
		$.post("/micro/redBean/checkCode.php",{phone:$("#phone").val()},function(data){
			console.log(data)
			code=data;
		});
		var intv=setInterval(function(){
			$this.val(total--+"秒后重新发送").attr("disabled",true);
			if(total==-1){
				clearInterval(intv);
				$this.val("获取短信验证码").attr("disabled",false);
			}
		},1000);
	});
});
function check(){	
	if($("#checkCode").val()!=""&&code==$("#checkCode").val()){
		return true;
	}else{
		$(".wrong").show();
		return false;
	}
}