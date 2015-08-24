<?php defined('IN_IA') or exit('Access Denied');?><style>
	.quick{padding:0 .5em ;position:fixed;bottom:.3em; height:50px;}
	.quick a{text-decoration:none;}
	.quick.quick-default{font-size:3em;}
	.quick.quick-default .dropdown-menu{bottom:2.5em;left:1.5em;top:initial;}
	.quick.quick-default .dropdown-menu i{ display:inline-block; width:14px; height:14px;}
	.quick.quick-default .dropdown-menu.fadeInUp{display:block;}
</style>

<div class="quick quick-default">
	<a href="javascript:;" class="quick-handle" data-toggle="dropdown"><i class="fa fa-plus-circle"></i></a>
	<ul class="dropdown-menu animated">
		<?php  if(is_array($_W['quickmenu']['menus'])) { foreach($_W['quickmenu']['menus'] as $nav) { ?>
		<li>
			<a href="<?php  echo $nav['url'];?>">
				<?php  if(!empty($nav['icon'])) { ?>
				<i style="background:url(<?php  echo $nav['icon'];?>) no-repeat;background-size:cover; <?php  echo $nav['css']['icon']['style'];?>"></i>
				<?php  } else { ?>
				<i class="fa fa-fw <?php  echo $nav['css']['icon']['icon'];?>" style="<?php  echo $nav['css']['icon']['style'];?>"></i>
				<?php  } ?>
				<?php  echo $nav['name'];?>
			</a>
		</li>
		<?php  } } ?>
	</ul>
</div>
<script>
	require(['bootstrap'], function($){
		$('.quick.quick-default').on('show.bs.dropdown', function(e){
			$(this).find('.quick-handle i').addClass('fa-minus-circle').removeClass('fa-plus-circle');
			$(this).find('ul').removeClass('fadeOutDown');
			$(this).find('ul').addClass('fadeInUp');
		});
		$('.quick.quick-default').on('hide.bs.dropdown', function(e){
			if(!e.target.animated) {
				$(this).find('.quick-handle i').removeClass('fa-minus-circle').addClass('fa-plus-circle');
				$(e.target).find('ul').removeClass('fadeInUp');
				$(e.target).find('ul').addClass('fadeOutDown');
				e.preventDefault();
				e.target.animated = true;
				setTimeout(function(){
					$(e.target).find('.quick-handle').dropdown('toggle');
					e.target.animated = false;
				}, 1000);
			}
		});
	})
</script>
