<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="/Public/Admin/css/style.css" rel="stylesheet"/>
	<title><?php echo C('SYS_TITLE');?></title>	
</head>

<body>


<div class="pad_10">
	<div class="clearfix">

        <?php if(!empty($info)): ?><div class="col-2 fl mr10" style="width:48%">
			<h6>我的个人信息</h6>
			<div class="content">
				您好，<b style="color:#06C"> <?php echo ($info['account']); ?></b><br/>
				登录次数：<b style="color:#06C"> <?php echo ($info['logincount']); ?></b> 次<br/>
				上次登录： <?php echo ($info['lastlogin']); ?><br />
				<div class="bk20 hr"><hr /></div>
			</div>
		</div><?php endif; ?>

		<div class="col-2 fl mr10" style="width:48%">
			<h6>系统信息</h6>
			<div class="content">				
			           主机名 (IP端口)：<?php echo $_SERVER['SERVER_NAME'].'('.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'].')' ?><br/>
				服务器操作系统：<?php echo PHP_OS ?><br />
				Web 服务器：<?php echo $_SERVER['SERVER_SOFTWARE'] ?><br />
				PHP 版本：<?php echo PHP_VERSION ?><br />
				PHP 运行方式：<?php echo PHP_SAPI ?><br />
				MySQL 版本：<?php if (function_exists("mysql_close")){ echo mysql_get_client_info(); }else{ echo '不支持'; } ?><br />
				最大上传限制：<?php if (ini_get('file_uploads')) { echo ini_get('upload_max_filesize'); }else{ echo '<span style="color: red">Disabled</span>'; } ?><br/>
				最大执行时间：<?php echo ini_get('max_execution_time') ?>秒<br />
				<br />
			</div>
		</div>
                  
	</div>
</div>


</body>
</html>