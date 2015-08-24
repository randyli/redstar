<?php defined('IN_IA') or exit('Access Denied');?><div class="panel panel-default">
	<div class="panel-heading">
		回复内容
	</div>
	<ul class="list-group">
		<li class="list-group-item" id="append-list">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">图片标题</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="添加图片消息的标题" name="title" value="<?php  echo $replies['title'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">上传图片</label>
				<div class="col-sm-9 col-xs-12">
					<?php  echo tpl_form_field_image('mediaid', $replies['mediaid'], '', array('tabs'=>array('remote'=>'active')));?>
					<span class="help-block">请上传触发关键字时所要回复的图片，上传图片必须是JPG类型</span>
					<?php  if((!empty($rid)) && (time() - $replies['createtime'] > 259200) ) { ?>
						<div class="alert alert-danger" role="alert">该回复已过期 [有效期为3天]，请及时上传新的回复图片。</div>
					<?php  } ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">图片描述</label>
				<div class="col-sm-9 col-xs-12">
					<textarea style="height:80px;" class="form-control" cols="70" name="description" placeholder="添加图片的简短描述" ><?php  echo $replies['description'];?></textarea>
					<span class="help-block">描述内容将出现在图片名称下方，建议控制在20个汉字以内最佳</span>
				</div>
			</div>
		</li>
	</ul>
</div>
