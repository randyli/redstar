<?php 
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

require_once "../../framework/bootstrap.inc.php";
require_once "../../app/common/template.func.php";
require_once "../../app/common/common.func.php";
//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

function orderId() {
    $order_id = WxPayConfig::MCHID.date("YmdHis");
    $order_id .= sprintf("%04d", rand(0, 10000));
    return $order_id; 
}

function cardNo() {
	$n1 = rand(1000, 9999);
	$n2 = rand(0, 9999);
	$n3 = ( $n1 * $n2 ) % 97;

	return sprintf("%04d%04d%02d", $n1, $n2, $n3);
}



//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();


$order_id = orderId();
$card_no = cardNo();

$sql = 'SELECT * FROM ' . tablename('redstar_order') . " WHERE `card_no` = :card_no";
$card = pdo_fetch($sql, array(':card_no' => $card_no));
if($card){
	message('服务器内部错误');
	exit();
}

$order = array(
    'order_id' => $order_id,
    'open_id' =>$openId,
    'card_no' => $card_no,
    'price' => 1
);

pdo_insert('redstar_order', $order);

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("通汇卡（置家大礼包）");
$input->SetAttach("通汇卡（置家大礼包）");
$input->SetOut_trade_no($order_id);
$input->SetTotal_fee("1");
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("hxyyhd.mmall.com/weengine/payment/wechat/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);

$jsApiParameters = $tools->GetJsApiParameters($order);

?>

<html>
<head>
    <script type="text/javascript">
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				if(res.err_msg == "get_brand_wcpay_request:cancel") {
					window.history.back(-1);
					//window.location.href = "http://hxyyhd.mmall.com/weengine/app/index.php?i=2&c=rsactivity&do=order";
				}else if(res.err_msg == "get_brand_wcpay_request:ok") {
					window.location.href = "http://hxyyhd.mmall.com/weengine/app/index.php?i=2&c=rsactivity&do=success02&card=<?php echo $card_no;?>";
				}
				//alert(res.err_code+res.err_desc+res.err_msg);
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	callpay();
	</script>
</head>
</html>
