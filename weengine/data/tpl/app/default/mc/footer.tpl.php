<?php defined('IN_IA') or exit('Access Denied');?>	</div>
<?php  if(empty($_W['off_bardown'])) { ?>
<ul class="nav nav-bardown nav-justified" style="z-index:10;">
	<?php  if($cardstatus['status'] == 1) { ?>
		<li><a href="<?php  echo url('mc/bond/card');?>" <?php  if($do == 'card') { ?>class="active"<?php  } ?>><i class="fa fa-credit-card"></i> <span>会员卡</span></a></li>
	<?php  } ?>
	<li><a href="<?php  echo url('activity/coupon/display');?>"><i class="fa fa-money"></i> <span>兑换</span></a></li>
	<li><a href="javascript:;" data-toggle="modal" data-target="#scan"><i class="fa fa-qrcode"></i> <span>付款</span></a></li>
	<li><a href="<?php  echo url('mc');?>" <?php  if($do != 'card') { ?>class="active"<?php  } ?>><i class="fa fa-user"></i> <span>我的</span></a></li>
</ul>
<?php  } ?>

<!-- 条形码、二维码模态框 -->
<style>
.modal-code{margin:0 auto; top:8%;}
.modal-code .tip{padding:0 0 15px 0;}
.modal-code .code-img{background:#FFF; width:90%; padding-bottom:10px; margin:0 5%;}
.modal-code .bar{border-bottom:1px dashed #CCC; padding:30px 10px;}
.modal-code .bar img{width:100%; min-height:100px;}
.modal-code .qr img{}
</style>
<div class="modal fade modal-code" id="scan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="code-img text-center" data-dismiss="modal">
		<div class="bar">
			<img style="-webkit-user-select: none" src="<?php  echo url('mc/bond/barcode', array('cardsn' => $mcard['cardsn']));?>">
		</div>
		<div class="qr">
			<img style="-webkit-user-select: none" src="<?php  echo url('mc/bond/qrcode', array('cardsn' => $mcard['cardsn']));?>">
		</div>
		<div class="text-center tip">付款或者充值时请交给店员扫一扫</div>
	</div>
</div>