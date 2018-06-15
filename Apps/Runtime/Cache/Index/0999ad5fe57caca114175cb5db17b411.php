<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
    <title>谢翔Blog-登录</title>
	<link rel="stylesheet" type="text/css" href="/Public/Index/Login/css/default.css?v=23">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css?v=23">
	<script type="text/javascript" src="/Public/Index/js/jquery-1.9.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
	<style type="text/css">
	html,
	body {
	    height: 100%;
        background-color: #363636;
	}
	html {
	    display: table;
	    margin: auto;
	}
	body {
	    display: table-cell;
	    vertical-align: middle;
	}

	.margin {
	  margin: 0 !important;
	}
	</style>
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body class="">
	<div id="login-page" class="row">
	    <div class="col s12 z-depth-6 card-panel">
	      <form class="login-form" action="" method="post" id="login_form">
	        <div class="row">
	          <div class="input-field col s12 center">
	            <img src="/Public/Index/login/css/logo.png" width="120" height="150" alt="" class="responsive-img valign profile-image-login">
                  <h5 align="center">欢迎登录</h5>
                  <p class="center login-form-text">人一辈子，有时就靠一次疯狂的举动扭转乾坤!</p>
	          
	          </div>
	        </div>
	        <div class="row margin">
	          <div class="input-field col s12">
	            <i class="mdi-social-person-outline prefix"></i>
	            <input class="validate" id="username"  type="email" name="username">
	            <label for="username" data-error="wrong" data-success="right" class="center-align">Username</label>
	          </div>
	        </div>
	        <div class="row margin">
	          <div class="input-field col s12">
	            <i class="mdi-action-lock-outline prefix"></i>
	            <input id="password" name="password" type="password">
	            <label for="password">Password</label>
	          </div>
	        </div>
              <div class="row margin">
                  <div class="mdi-action-verify-outline prefix">
                      <input type="text" name="code" value=""  id="code" style="width:80px;margin-left:55px;"><img src="<?php echo U('Login/verify');?>" onclick="this.src=this.src+'?'+Math.random()" alt="点击图片刷新" style="cursor: pointer;margin-bottom: -10px;margin-right: 2px;"><span style="font-size: 12px;">点击刷新</span>
                  </div>
              </div>
	        <div class="row">          
	          <div class="input-field col s12 m12 l12  login-text">
	              <input type="checkbox" id="remember-me" />
	              <label for="remember-me">记住我</label>
	          </div>
	        </div>
	        <div class="row">
	          <div class="input-field col s12">
	            <a href="javascript:void(0);" id="submit" onclick="sub();" class="btn waves-effect waves-light col s12" style="background-color: #DA4453;">登　录</a>
	          </div>
	        </div>
	        <div class="row">
	          <div class="input-field col s6 m6 l6">
	            <p class="margin medium-small" style="font-size: 12px;"><a href="<?php echo U('Login/regiter');?>">现在注册></a></p>
	          </div>
	          <div class="input-field col s6 m6 l6">
	              <p class="margin right-align medium-small" style="font-size: 12px;"><a href="forgot-password.html">忘记密码?</a></p>
	          </div>          

	      </form>
	    </div>
	  </div>
	  </div>
	  <link rel="stylesheet" type="text/css" href="/Public/Plugin/sweetalert/sweetalert.css">
	 <script src="/Public/Plugin/sweetalert/sweetalert.min.js"></script>
      <script type="text/javascript">
           $(function(){
           	   // swal("Good!", "弹出了一个操作成功的提示框", "success");
                $('#submit').click(function(){
                	var username = $.trim($('#username').val());
                	var password = $.trim($('#password').val());
                    var code     = $.trim($('#code').val());
                	if(username==''){
                        swal("用户名不能为空!", "", "error");
                        return false;
                	}
                	if(password=='' ){
                        swal("密码不能为空!", "", "error");
                        return false;
                	}
                	if(code==''){
                		swal("验证码不能为空!", "", "error");
                        return false;
                	}
                    
                    $.post("<?php echo U('Login/login_check');?>",$('#login_form').serialize(),function(e) {
                        //alert(e);
                        if(2==e){
                        	swal("验证码错误!", "", "error");
                            return false;
                        }else if(3==e){
                            swal("用户名或者密码错误!", "", "error");
                            return false;
                        }else if(1==e){
                            swal("恭喜，登陆成功！", "", "success");
                            window/setTimeout("window.location=\"<?php echo U('Index/index');?>\"",1000);
                            return false;
                        }

                    })
                })
           })
      </script>
	
</body>
</html>