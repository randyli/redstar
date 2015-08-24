$(function(){
	var h=$(window).height();
	$(".shadow,.shadow-bg").height(h);
	$(".close").click(function(){
		$(".shadow").hide();
	});
});