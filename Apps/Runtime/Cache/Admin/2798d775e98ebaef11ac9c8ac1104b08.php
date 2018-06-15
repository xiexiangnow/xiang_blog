<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo C('SYS_TITLE');?>管理系统</title>
<script type="text/javascript" charset="utf-8" src="/Public/Plugin/jquery-1.9.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/js/login.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Plugin/layer/layer1.9/layer.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/login.css">
</head>

<body>
	<div class="login">
		<div class="logo_box" style="padding-top: 214px;">
			<h1><?php echo C('SYS_TITLE');?>管理系统</h1>
			<p><?php echo C('WEB_SITE_URL');?></p>
		</div>
	</div>
	<div class="login_db">
		<div class="login_db">
			<div class="login_main" id="login_main">
				<form action="<?php echo U('Public/login');?>" method="post">										
							<table width="100%" height="70" border="0" cellpadding="0"
								cellspacing="0" style="margin-top: 20px;">
								<tr>
									<td width="28%" height="39">
										<div class="label_box">
											<label>请输入管理员帐号</label>
											<input type="text" class="srk" size="24" name="username" autocomplete="off" />
										</div>
									</td>
									<td width="28%" align="left">
										<div class="label_box">
											<label>请输入管理员密码</label>
											<input type="password" class="srk" size="24" name="password" />
										</div>
									</td>
									<td>
										<div class="label_box">
											<label style="width: 102px;">请输入验证码</label>
											<input type="text" class="srk" size="12" style="float: left;" auto_code="true" maxlength="4" name="auth_code" autocomplete="off" />
											<span class="auth_code" style="display: none;">
												<img id="auth_code_img" src="" alt="验证码" style="cursor: pointer;" width="115px;"/>
												<p style="margin-top: 4px">
													看不清，<a href="javascript:;" onclick="$('#auth_code_img').click();return false;" style="border-bottom: 1px solid;">点击换一张</a>
												</p>
											</span>
											<input type="hidden" id="verify_url" value="<?php echo U('Public/verify');?>" />
										</div>
										<input type="submit" value="&nbsp;" class="login_tijiao" />
									</td>
								</tr>
							</table>
				</form>
				<div style="width: 100%; float: left; font-size: 12px; font-family: Verdana, Arial, Helvetica, sans-serif; padding-top: 50px; color: #666666; text-align: center;">
					Powered by <?php echo C('SYS_TITLE');?>
					<small><?php echo C('SYS_VERSION');?></small>
					Copyright &copy;2015-2018
				</div>
			</div>
		</div>
	</div>
</body>
</html>