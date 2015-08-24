<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Notify.php';
require_once 'log.php';

define(DB_HOST, '10.4.8.164'); 
define(DB_USER, 'root'); 
define(DB_PASS, 'Redstar#@2015'); 
define(DB_DATABASENAME, 'redstar'); 
  
//mysql_connect  
//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		/*
		$data = array(
			'transaction_id' => '123',
			'time_end' => 'abc',
			'out_order_no' => 'bcd'
		);
		*/
		$conn = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("connect failed" . mysql_error());  
		mysql_select_db(DB_DATABASENAME, $conn); 

		$transaction_id = mysql_real_escape_string($data['transaction_id']);
		$time_end = mysql_real_escape_string($data['time_end']);
		$order_id = mysql_real_escape_string($data['out_trade_no']);

		$sql = "update ims_redstar_order set transaction_id='%s', status=1, time_end='%s' ";
		$sql .= " where order_id = '%s'";
		$sql = sprintf($sql, $transaction_id, $time_end, $order_id);
		Log::DEBUG('order:'.$sql);
		mysql_query($sql);
		mysql_close();
		return true;
	}
}

Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
