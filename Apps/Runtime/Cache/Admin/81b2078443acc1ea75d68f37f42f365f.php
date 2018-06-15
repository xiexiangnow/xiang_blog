<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="off">
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" />
<title><?php echo C('SYS_TITLE');?></title>
<script src="/Public/Plugin/jquery-1.7.2.min.js"></script>
<script src="/Public/Plugin/layer/layer1.9/layer.js"></script>
<script src="/Public/Admin/js/index.js?cmd=1"></script>
<script type="text/javascript">
	var lang = new Object();
</script>
</head>
<body scroll="no">
	<div id="header">
		<div class="logo">
			<a href="/index.php" title="<?php echo C('SYS_TITLE');?>"></a>
		</div>
		<div class="fr">
			<div class="cut_line admin_info tr">
				您好！
				<b><a href="javascript:;" data-uri="<?php echo U('Admin/info');?>" class="tbat" data-id="-1" title="修改账号信息"><?php echo ($userinfo['account']); ?></a></b>
				&nbsp;&nbsp;
				<a href="javascript:;" data-uri="<?php echo U('Public/logout');?>" id="logout">[退出]</a>
				&nbsp;
				<a href="/" target="_blank">[网站首页]</a>
			</div>
		</div>

		<ul class="nav white" id="J_tmenu">
		  <?php if(is_array($menu_top)): $k = 0; $__LIST__ = $menu_top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="top_menu <?php if(($k) == "1"): ?>on<?php endif; ?>">
				<a href="javascript:;" data-id="<?php echo ($vo['id']); ?>" hidefocus="true" style="outline: none;"><?php echo ($vo['title']); ?></a>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>

	</div>

	<div id="content">
		<div class="left_menu fl">
			<div id="J_lmenu" class="J_lmenu" data-uri="<?php echo U('Desktop/left',array('top'=>$menu_top[0]['id']));?>">

			</div>
			<a href="javascript:;" id="J_lmoc" style="outline-style: none; outline-color: invert; outline-width: medium;" hidefocus="true" class="open" title="展开或关闭"></a>
		</div>

		<div class="right_main">
			<div class="crumbs">
				<div class="options">
					<a href="javascript:;" title="刷新页面" id="J_refresh" class="refresh" hidefocus="true">刷新页面</a>
					<a href="javascript:;" title="全屏" id="J_full_screen" class="admin_full" hidefocus="true">全屏</a>
				</div>
				<div id="J_mtab" class="mtab">
					<a href="javascript:;" id="J_prev" class="mtab_pre fl" title="上一页">上一页</a>
					<a href="javascript:;" id="J_next" class="mtab_next fr" title="下一页">下一页</a>
					<div class="mtab_p">
						<div class="mtab_b">
							<ul id="J_mtab_h" class="mtab_h">
								<li class="current" data-id="0">
									<span>
										<a>后台首页</a>
									</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="J_rframe" class="rframe_b">
				<iframe id="rframe_0" src="<?php echo U('sys/info');?>" frameborder="0" scrolling="auto" style="height: 100%; width: 100%;"></iframe>
			</div>
		</div>
	</div>
</body>
</html>