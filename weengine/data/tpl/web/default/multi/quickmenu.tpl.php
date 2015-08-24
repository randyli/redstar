<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo url('site/nav/shortcut', array('m' => $m, 'mtid' => $_GPC['mtid'], 'f' => $_GPC['f']));?>">快捷菜单</a></li>
	<li><a href="<?php  echo url('site/nav/shortcut', array('foo' => 'post', 'mtid' => $_GPC['mtid'], 'f' => $_GPC['f']));?>"><i class="fa fa-plus"></i> 添加条目</a></li>
	<li class="active"><a href="<?php  echo url('site/multi/quickmenu', array('mtid' => $_GPC['mtid'], 'f' => $_GPC['f']));?>">快捷菜单风格</a></li>
</ul>
<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="f" value="<?php  echo $_GPC['f'];?>"/>
<div class="main">
	<div class="alert alert-info">
		设置微站底部的快捷菜单显示的模板与风格，并可以定制快捷菜单在模块中是否显示。
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">快捷菜单风格模板</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择模板</label>
				<div class="col-sm-9 col-xs-12">
					<select class="form-control" name="template" onchange="preview($(this).val());">
						<?php  if(is_array($template)) { foreach($template as $path) { ?>
						<option value="<?php  echo $path;?>" <?php  if($quickmenu['template'] == $path) { ?> selected<?php  } ?>><?php  echo $path;?></option>
						<?php  } } ?>
					</select>
					<div class="help-block">选择微站底部快捷菜单的风格模板，选择后可通过下方的模板预览进得查看。</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">启用显示模块</label>
				<div class="col-sm-9 col-xs-12">
					<?php  if(is_array($modules)) { foreach($modules as $item) { ?>
					<label class="checkbox-inline">
						<input type="checkbox" name="module[]" value="<?php  echo $item['name'];?>" <?php  if(!empty($quickmenu['enablemodule']) && is_array($quickmenu['enablemodule']) && in_array($item['name'], (array)$quickmenu['enablemodule'])) { ?> checked<?php  } ?> /> <?php  echo $item['title'];?>
					</label>
					<?php  } } ?>
					<span class="help-block">注意：如果模块未提供微站页面，则勾选无效。</span>
					<span class="help-block">微站底部快捷菜单只在勾选上的模块中显示，未勾选则不显示快捷菜单。</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-9 col-xs-12">
					<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
					<input type="submit" class="btn btn-primary" name="submit" value="提交" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">模板预览</label>
				<div class="col-sm-9 col-xs-12">
					<iframe scrolling="yes" allowtransparency="true" src="../app/<?php echo murl('utility/preview/shortcut', array('file' => !empty($quickmenu['template']) ? $quickmenu['template'] : 'default', 't' => $id))?>" id="preview" style="width: 320px; height: 480px; border:1px solid #eee;"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	function preview(name) {
		var id = "<?php  echo $id;?>";
		var url = "../app/<?php  echo murl('utility/preview/shortcut')?>file=" + name + '&t=' + id;
		$('#preview').attr('src', url);
	}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>