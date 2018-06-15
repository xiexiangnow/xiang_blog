<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if !IE]>
  <html class="no-js non-ie" lang="zh-CN"> <![endif]-->
<!--[if IE 7 ]>
  <html class="no-js ie7" lang="zh-CN"> <![endif]-->
<!--[if IE 8 ]>
  <html class="no-js ie8" lang="zh-CN"> <![endif]-->
<!--[if IE 9 ]>
  <html class="no-js ie9" lang="zh-CN"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="zh-CN">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>" />
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" />
<link rel="icon" sizes="192x192" href="/Public/Index/icon.png">
<title>
<?php if(!empty($doc_title)): echo ($doc_title); ?> -<?php endif; ?> 
<?php if(!empty($navinfo['title'])): echo ($navinfo['title']); ?>-<?php endif; ?> <?php echo C('SITE_NAME');?>
</title>
<script type="text/javascript">
      // window._wpemojiSettings = {"baseUrl":"http://s.w.org/images/core/emoji/72x72/","ext":".png","source":{"concatemoji":"http://www.lilonghe.net/wp-includes/js/wp-emoji-release.min.js?ver=4.2.3"}};
      // !function(a,b,c){function d(a){var c=b.createElement("canvas"),d=c.getContext&&c.getContext("2d");return d&&d.fillText?(d.textBaseline="top",d.font="600 32px Arial","flag"===a?(d.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),c.toDataURL().length>3e3):(d.fillText(String.fromCharCode(55357,56835),0,0),0!==d.getImageData(16,16,1,1).data[0])):!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g;c.supports={simple:d("simple"),flag:d("flag")},c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.simple&&c.supports.flag||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
    </script>
<link rel='stylesheet' id='sparkling-bootstrap-css' href='/Public/Index/css/bootstrap.min.css?ver=4.2.3' type='text/css' media='all' />
<link rel="stylesheet" href="/Public/Index/css/bootstrap-theme.min.css?ver=4.2.3">
<link rel='stylesheet' id='sparkling-icons-css' href='/Public/Index/css/font-awesomes.min.css?ver=4.2.3' type='text/css' media='all' />
<link rel='stylesheet' id='sparkling-style-css' href='/Public/Index/css/style.css?ver=4.2.3' type='text/css' media='all' />
  <script type='text/javascript' src='/Public/Index/js/jquery-1.9.min.js?ver=1.11.2'></script>
<script type='text/javascript' src='/Public/Index/js/jquery-migrate.min.js?ver=1.2.1'></script>
<script type='text/javascript' src='/Public/Index/js/modernizr.min.js?ver=4.2.3'></script>
<script type='text/javascript' src='/Public/Index/js/bootstrap.min.js?ver=4.2.3'></script>
<script type='text/javascript' src='/Public/Index/js/functions.min.js?ver=4.2.3'></script>
<meta name="generator" content="WordPress 4.2.3" />

</head>
<body class="home blog">
  <div id="page" class="hfeed site">

    <header id="masthead" class="site-header" role="banner">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="row">
            <div class="site-navigation-inner col-sm-12">
              <div class="navbar-header">
                 <button type="button" class="btn navbar-toggle"
                  data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              <!--logo-->
                <div id="logo">
                  <span class="site-name">
                    <a class="navbar-brand" href="/"
                      title="回到首页" rel="home"><span class="name">
                      <span class="glyphicon glyphicon-home"></span>  
                      谢翔 <span class="glyphicon glyphicon-leaf"></span> Blog<p style="font-size:12px;margin-left:80px;"> &minus; &clubs; 学无止境 &clubs;</p></span></a>
                  </span>
                </div>
                <!-- end of #logo -->
              </div>
            <!--导航区域-->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="menu-about" class="nav navbar-nav">
                      <li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27" >
                        <a title="Home" href="/" >首页</a>
                      </li>

                     <?php if(is_array($menu_list)): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mu): $mod = ($k % 2 );++$k;?><li id="menu-item-69"  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69" >
                          <a title="Blog" href="<?php echo U('news/'.$mu['id']);?>"><?php echo ($mu['title']); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </li>

                    <?php
 if($_SESSION['I_username']){ ?>
                      <li id="menu-item-69"  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69" style="float:right;">
                         <a title="Home" href="javascript:void(0)" onclick="login_out()"> <button type="button" class="btn btn-default btn-xs">退出</button></a>
                     </li>
                    <li id="menu-item-69"  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69" style="float:right;">
                        <a title="Home" href="#" > <button type="button" class="btn btn-default btn-xs">发布</button></a>
                    </li>
                    <?php
 } ?>


                    <li id="menu-item-69"  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69" style="float:right;">
                   <?php
 if($_SESSION['I_username']){ ?>
                        <a>欢迎您，<?php echo (session('I_username')); ?></a>
                   <?php
 }else{ ?>
                        <a title="Home" href="<?php echo U('Login/index');?>" > <button type="button" class="btn btn-default btn-xs">登录</button></a>
                   <?php
 } ?>
                    </li>
                </ul> 
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- .site-navigation -->
    </header>
    <!-- #masthead -->


      <script type="text/javascript" src="/Public/Plugin/layer/layer1.9/layer.js"></script>
      <script type="text/javascript">
        //退出的js操作
          function login_out(){
              $.get("<?php echo U('Login/login_out');?>",'',function(e){
                  //alert(e);
                  if(1==e){
                      layer.msg('成功退出！',{offset: 400, shift: 1});
                      window/setTimeout("window.location=\"<?php echo U('Index/index');?>\"",1000);
                  }
              })
          }
      </script>
<!--++++++++++++++++++++个人简历页面++++++++++++++++++++++++++-->
    <div id="content" class="site-content">
           
      <div> 
              <!--路径导航-->
                <ol class="breadcrumb">
                  <li><a href="/"><span class="glyphicon glyphicon-home"> 首页</span></a></li>
                   <li><a href="<?php echo U('news/'.$navinfo['id']);?>"><?php echo ($navinfo['title']); ?></a></li>
                  <li class="active"><?php echo ($muinfo['title']); ?></li>
                </ol>
               <!--路径导航-->
      </div>
            <div style="text-align:center;">
            <!--二级导航-->
                <ul class="nav nav-pills" style="max-width:1130px;margin:0 auto;">
                   <?php if(is_array($snvlist)): $i = 0; $__LIST__ = $snvlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$smu): $mod = ($i % 2 );++$i; if($smu['is_nav'] == 1): ?><!--后台让其显示才显示-->
                          <li role="presentation" <?php if($smu['id'] == $param['mu']): ?>class="active"<?php endif; ?>>
                          <a href="<?php echo U('news/'.$navinfo['id'].'-'.$smu['id']);?>"><?php echo ($smu['title']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>

            </div>  <!--二级导航-->

      <div class="top-section" ></div>

      <div class="container main-content-area" >
        <div class="row">
          <div class="main-content-inner col-sm-12 col-md-8 pull-left">

            <div id="primary" class="content-area">
              <main id="main" class="site-main" role="main">
      <!--正文部分-->
              <article id="post-62" class="post-62 post type-post status-publish format-standard hentry category-note tag-nginx tag-php">
                 <div class="post-inner-content">
                 <header class="entry-header page-header">

                <h2 class="entry-title "><span class="glyphicon glyphicon-share-alt"></span> <?php echo ($muinfo['title']); ?></h2>




                <div class="entry-meta">
                  <!--在 “关于我们” 中不需要显示  时间 和浏览量  -->
                  

                </div><!-- .entry-meta -->
                  </header><!-- .entry-header -->

                <div class="entry-content">
                <!--文章内容-->
                     <table class="table table-bordered">
                     <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-user"> 基本信息</span></button>
                          <tr>
                          	<td width="15%">姓名：</td>
                          	<td><?php echo ($re_info['name']); ?></td>
                          	<td width="15%">出生日期：</td>
                          	<td><?php echo ($re_info['birthday']); ?></td>
                          </tr>
                          <tr>
                          	<td>性别：</td>
                          	<td>
                            <?php
 echo $re_info['sex']==1?'男':'女'; ?>
                            </td>
                          	<td>民族：</td>
                          	<td><?php echo ($re_info['nation']); ?></td>
                          </tr>
                          <tr>
                          	<td>学历：</td>
                          	<td><?php echo ($re_info['xueli']); ?></td>
                          	<td>籍贯：</td>
                          	<td><?php echo ($re_info['native']); ?></td>
                          </tr>
                          <tr>
                          	<td>专业：</td>
                          	<td><?php echo ($re_info['specialty']); ?></td>
                          	<td>毕业院校：</td>
                          	<td><?php echo ($re_info['school']); ?></td>
                          </tr>
                          <tr>
                          	<td>Tel：</td>
                          	<td><?php echo ($re_info['tel']); ?></td>
                          	<td>E-mail：</td>
                          	<td><?php echo ($re_info['email']); ?></td>
                          </tr>
                          <tr>
                          	 <td colspan="4" align="right" style="padding-right:20px;">想看照片可以点击右边的“关于我” |  或者“相册”栏目 <span class="glyphicon glyphicon-hand-right"></span> </td>
                          </tr>
					</table>
					<table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-book"> 教育背景</span></button>
							<tr>
								<td><?php echo ($re_info['education']); ?></td>
							</tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-send"> 求职意向</span></button>
							<tr>
								<td><?php echo ($re_info['job']); ?></td>
							</tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-open"> 专业技能</span></button>
                            <tr>
                               <td>
								<?php echo htmlspecialchars_decode($re_info['technical_skill']);?>
                               </td>
                            </tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-folder-close"> 开发工具</span></button>
							<tr>
								<td><?php echo ($re_info['tools']); ?></td>
							</tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-facetime-video"> 工作经历</span></button>
							<?php echo htmlspecialchars_decode($re_info['work_experience']);?>

				    </table>
				     <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-th-list"> 实战项目</span></button>
							<tr>
								<td>
									<table class="table table-bordered">
									    <tr>
									    	<th>项目名称</th>
									    	<th>正式域名</th>
									    	<th>开发框架</th>
									    	<th align="center">是否带手机站</th>
									    </tr>
                                        <?php if(is_array($pro_list)): $i = 0; $__LIST__ = $pro_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                                            <td><?php echo ($vo['pro_name']); ?></td>
                                            <td><a href="http://<?php echo ($vo['pro_web']); ?>" target="_blank" title="点击预览"><?php echo ($vo['pro_web']); ?></a></td>
                                            <td><?php echo ($vo['pro_jia']); ?></td>
                                            <td align="center">
                                                <?php
 if($vo['is_mobile']==1){ echo "是"; }elseif($vo['is_mobile']==2){ echo "否"; }elseif($vo['is_mobile']==3){ echo "自适应"; } ?>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
									</table>
                  <table class="table table-bordered">
                     <tr>
                       <td width="50%">项目名称</td>
                       <td>微信公众号</td>
                     </tr>
                     <tr>
                       <td>香港购物城（在建项目）</td>
                       <td><span style="color:#DA4453">NEWHK-023</span></td>
                     </tr>
                     <tr>
                       <td>韩国SOW新品</td>
                       <td><span style="color:#DA4453">NEW-SOW</span></td>
                     </tr>
                  </table>
								</td>
							</tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-bookmark"> 技术鉴定</span></button>
							<tr>
								<td><?php echo ($re_info['technical']); ?></td>
							</tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-headphones"> 兴趣爱好</span></button>
							<tr>
								<td><?php echo ($re_info['interest']); ?></td>
							</tr>
				    </table>
				    <table class="table table-condensed">
					<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-comment"> 自我评价</span></button>
							<tr>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($re_info['self_assessment']); ?></td>
							</tr>
				    </table>
				    <p><span class="glyphicon glyphicon-random">（支持网页打印）</span></p>
                </div><!-- .entry-content -->

                <footer class="entry-meta">

                            <!-- tags -->
                      <div class="tagcloud">

                          <a href=""><?php echo ($muinfo['title']); ?></a> 
                      </div>
                      <!-- end tags -->
                      
                </footer><!-- .entry-meta -->
              </div>
            </article><!-- #post-## -->


            
<style type="text/css">
  .footerbtn{ border:0; display:inline-block; padding:9px 5px; width:120px; text-align:center; background-color:#E26440; color:#FFFFFF; cursor:pointer; border-radius: 3px;}
  .footerbtn:hover{ background-color:#666666;color:#F7E7B6;}
</style>

<div style="width:100%; margin-top:10px; margin:0 auto; margin-left:10px; display:table;min-line:150px;">
<table  border="0" cellpadding="0" cellspacing="0" style="padding:10px;width:100%;">
 <!-- 
  <tr>
     <td colspan="5" style="border-top:1px solid #dfdfdf; padding-bottom:10px;">
       <p style="font-size:12px; line-height:23px;color:#DF6773;">
       <span class="glyphicon glyphicon-phone-alt"></span>  
       Tel：18502368717<br/>
       <span class="glyphicon glyphicon-envelope"></span> 
       E-mail：524414842@qq.com<br/>
       <span class="glyphicon glyphicon-tag"></span> 
       地址：重庆市江北区观音桥<br/>
       <span class="glyphicon glyphicon-leaf"></span>  
        每一个成功者都有一个开始，勇于开始，才能找到成功的路！
       </p> 
       </td>
    </tr>
 -->
    <tr>
    <!--
       <td width="30%" align="center" style="padding:10px;">
         <a href="<?php echo U('News/13-18');?>" title="点击留言">
              <input type="but" class="footerbtn" value="给我留言" />
         </a>          
       </td>
       -->
       <td width="20%" style="padding:10px;"><!--分享--> <h1 style="font-size:12px; line-height:23px;">分享一下：</h1>
           <div class="bdsharebuttonbox">
                <a href="#" class="bds_more" data-cmd="more"></a>
                <a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
              
           </div>       
     </td>
       <td width="10%" align="right" style="padding:10px;"><div >
           <?php
 $url= curPageURL(); ?>
              <!--二维码区域-->
             <img src="<?php echo U('News/qrcode', "url=".base64_encode($url));?>" style="width:100%;"/>      
       </td>
       <td width="40%" style="padding:10px;max-width:370px;">

           <div style="font-size:12px;max-width:370px;" class="evm">
              <h1 style="font-size:12px; line-height:23px;">用微信转发：</h1>
              <font style="line-height:30px;">扫一扫，分享该页面！</font>
          </div>
      </td>
    </tr>
 </table>
</div>
<script>
      window._bd_share_config={
          "common":{
              "bdSnsKey":{},
              "bdText":"",
              "bdMini":"2",
              "bdMiniList":false,
              "bdPic":"",
              "bdStyle":"0",
              "bdSize":"16"
          },
          "share":{}
      };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
  </script>
<!--分享底部-->

           <div id="comments" class="comments-area">
               <!-- <h2 class="comments-title">
                One thought on &ldquo;<span><?php echo ($base['title']); ?></span>&rdquo;</h2>-->
         
         <!--友言评论-->
                <!-- UY BEGIN -->
                <!--<div id="uyan_frame"></div>
                <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>-->
                <!-- UY END -->
          <!--友言评论-->
          <!--多说评论-->
                 <?php
 $url = curPageURL(); ?>

 <!-- 多说评论框 start --> <div class="ds-thread" data-thread-key="<?php echo $url;?>" data-title="请替换成文章的标题" data-url="请替换成文章的网址"></div> <!-- 多说评论框 end --> <!-- 多说公共JS代码 start (一个网页只需插入一次) --> <script type="text/javascript"> var duoshuoQuery = {short_name:"cqxiangblog"}; (function() { var ds = document.createElement('script'); ds.type = 'text/javascript';ds.async = true; ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js'; ds.charset = 'UTF-8'; (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds); })(); </script> <!-- 多说公共JS代码 end --> 

          <!--多说评论-->
                        
              <!-- #post-## --> </main>
              <!-- #main -->
            </div>
            <!-- #primary -->
          </div>

 <div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
            <div class="well">
            <h4 align="center" style="font-family:Microsoft YaHei;">ABOUT ME</h4>

            <table class="table table-striped">
                           <tr>
                              <td width="100"><span class="glyphicon glyphicon-user"> 姓名：</td>
                              <td>谢 翔</td>
                            </tr>
                            <tr>
                              <td><span class="glyphicon glyphicon-briefcase"> 职业：</td>
                              <td>PHP Coder</td>
                            </tr>
                            <tr>
                              <td><span class="glyphicon glyphicon-phone-alt"> 电话：</td>
                              <td>18502368717</td>
                            </tr>
                            <tr>
                              <td><span class="glyphicon glyphicon-envelope"> 邮箱：</td>
                              <td>524414842@qq.com</td>
                            </tr>
                            <tr>
                              <td><span class="glyphicon glyphicon-facetime-video"> 散句：</td>
                              <td>叶的离去，是风的追求，还是树的未曾挽留!</td>
                            </tr>
                            <tr>

                              <td colspan="2" style="text-align:right;">
                                 更多资料 <span class="glyphicon glyphicon-share-alt"></span> 
                                  <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" title="查看更多">more-关于我</button>

                  
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel">我的档案 　</h4>
                        </div>

                        <div class="modal-body">
                           <table class="table table-striped" style="text-align:left;">
                             <tr >
                              <td width="60"><span class="glyphicon glyphicon-user"> 姓名：</span></td>
                              <td>谢 翔</td>
                              <td rowspan="4" style="text-align:left;width:40px;">
                                <img src="/Public/Index/images/ren.png" style="max-width:120px;"  />
                              </td>
                             </tr>
                             <tr>
                              <td><span class="glyphicon glyphicon-briefcase"> 职业：</span></td>
                              <td>PHP Coder</td>
                              
                             </tr>
                              <tr>
                              <td><span class="glyphicon glyphicon-eye-open"> 年龄：</span></td>
                              <td>26</td>
                            
                             </tr>
                             <tr>
                              <td><span class="glyphicon glyphicon-pushpin"> 籍贯：</span></td>
                              <td colspan="2">重庆-忠县</td>
                             </tr>
                             <tr>
                              <td><span class="glyphicon glyphicon-phone-alt"> Tel：</span></td>
                              <td colspan="2">18502368717</td>
                             </tr>
                             <tr>
                              <td><span class="glyphicon glyphicon-leaf"> QQ：</span></td>
                              <td colspan="2">524414842</td>
                             </tr>
                             <tr>
                                        <td><span class="glyphicon glyphicon-envelope"> 邮箱：</td>
                                        <td>524414842@qq.com</td>
                                      </tr>
                             <tr>
                              <td><span class="glyphicon glyphicon-tag"> 地址：</span></td>
                              <td colspan="2">重庆市江北区观音桥</td>
                             </tr>
                             <tr>
                              <td><span class="glyphicon glyphicon-facetime-video"> 简介：</span></td>
                              <td colspan="2">一个80末90初还在继续追梦的的程序员，生活的压抑让我更有信心面对自己的未来，不管自己曾经遇到过怎样的挫折，或者经历过怎样的伤痛，忘掉不愉快，用百倍的努力去证明自己；我坚信，未来就在脚下。人生就是一个得与失的过程，而我却是一个幸运者，得到的要比失去的多，所以还得更加努力！</td>
                             </tr>
                             <tr>
                              <td width="150"><span class="glyphicon glyphicon-time"> 网站创作时间：</span></td>
                              <td colspan="2">2015-07-28</td>
                             </tr>
                             <tr>
                              <td width="150"><span class="glyphicon glyphicon-pencil"> 网站作者：</span></td>
                              <td colspan="2">Xie_xiang</td>
                             </tr>
                           </table>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                          <a href="<?php echo U('news/13-18');?>"><button type="button" class="btn btn-default btn-xs">Send message</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                              </td>
                            </tr>
                        </table>
                        <script>
              $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) 
                var recipient = button.data('whatever') 
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
              })
            </script>
           <!--我的文档 table end-->  

    
             
               <button class="btn btn-danger" type="button" style="margin-bottom:20px;">
                <?php echo date('Y年m月d日',time())."--星期"?>
               <span class="badge"><?php echo get_week();?></span>
               </button>

                <!--search搜索区域-->
                <form action="<?php echo U('Com/lis');?>" method="post" id="ser_form">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="博文搜索..." name="keywords" id="keywords">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button" id="search_go">Go!</button>
                              </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                </form>

                <script type="text/javascript">
                   $(function(){
                       $('#search_go').click(function(){
                           var s_keywords = $.trim($('#keywords').val());

                           if(s_keywords==''){
                               layer.msg('注意：请输入搜索关键词！',{offset: 400, shift: 6});
                               return false;
                           }
                           $('#ser_form').submit();
                       })
                   })
                </script>
                <br/>
                <!--search搜索区域-->
                <!-- 搜索区域 -->

              <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h3 class="widget-title"><span class="glyphicon glyphicon-tags"> <b>近期文章</b></span></h3>
                    <div>
                      <!--tab标签下面的文正列表-->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" >
                          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="color:#999;">技术篇</a></li>
                          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="color:#999;">散文篇</a></li>
                          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" style="color:#999;">生活篇</a></li>
                          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" style="color:#999;">日志篇</a></li>
                        </ul>
                 <style type="text/css">
                       #secondary .widget a.list_show{color:#6B6B6B;}
                       #secondary .widget a.list_show:hover{color:#DA4453;}         
                 </style>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane active" id="home">
                          <!--技术篇文章列表-->
                           <?php if($jishu_list != null): ?><ul>
                                   <?php if(is_array($jishu_list)): $i = 0; $__LIST__ = $jishu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('news/show',array('id'=>$vo['id']));?>" title="<?php echo ($vo['title']); ?>" target="_blank"  class="list_show"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                               </ul>
                            <?php else: ?>
                               <p align="center" style="color:#999;">暂无文章</p><?php endif; ?>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="profile">
                           <!--散文篇文章列表-->
                            <?php if($sanwen_list != null): ?><ul>
                                    <?php if(is_array($sanwen_list)): $i = 0; $__LIST__ = $sanwen_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('news/show',array('id'=>$vo['id']));?>" title="<?php echo ($vo['title']); ?>" target="_blank" class="list_show" ><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                               </ul>
                            <?php else: ?>
                              <p align="center" style="color:#999;">暂无文章</p><?php endif; ?>
                          </div>
                          <div role="tabpanel" class="tab-pane" id="messages">
                           <!--生活篇文章列表-->
                            <?php if($sheng_list != null): ?><ul>
                                  <?php if(is_array($sheng_list)): $i = 0; $__LIST__ = $sheng_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('news/show',array('id'=>$vo['id']));?>" title="<?php echo ($vo['title']); ?>" target="_blank" class="list_show"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                             </ul>
                             <?php else: ?>
                                <p align="center" style="color:#999;">暂无文章</p><?php endif; ?>
                          </div>
                          <!--日志篇列表-->
                             <div role="tabpanel" class="tab-pane" id="settings">
                                <?php if($rizhi_list != null): ?><ul>
                                    <?php if(is_array($rizhi_list)): $i = 0; $__LIST__ = $rizhi_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('news/show',array('id'=>$vo['id']));?>" title="<?php echo ($vo['title']); ?>" target="_blank" class="list_show"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                 </ul>
                                <?php else: ?>
                                   <p align="center" style="color:#999;margin-top:10px;">暂无文章</p><?php endif; ?>
                             </div>
                        </div>
                      </div>
                      <!--tab标签下面的文正列表  end-->

                    <!--<button type="button" class="btn btn-default btn-xs" style="text-align:right;">更多文章</button>-->
                    <!-- Button trigger modal -->
                          <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" title="查看更多文章" style="float:right;">更多文章</button>

                          <!-- Modal 更多文章的弹出层-->
                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">更多文章&nbsp;&nbsp;</h4>
                                </div>
                                <div class="modal-body">
                                <!--列表-->
                                 <h5 align="left"><span class="glyphicon glyphicon-list"></span> 文章列表</h5>
                                    <div class="list-group">
                                    <!--点击出来更多的文章列表-->
                                       <?php if(is_array($dian_more_list)): $i = 0; $__LIST__ = $dian_more_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('news/show',array('id'=>$vo['id']));?>" title="<?php echo ($vo['title']); ?>" target="_blank" class="list-group-item" style="color:#6B6B6B;"><?php echo subs($vo['title'],40);?>
                                            <span style="float:right;"><?php echo date('Y-m-d',$vo['time'])?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                    <!--点击出来更多的文章列表-->
                                    </div>
                                <!--列表end-->
                                <?php if($snvlist != null): ?><h5 align="left"><span class="glyphicon glyphicon-tasks"></span>  或者您可以选择一下栏目</h5>
                                   <div style="text-align:center;">
            <!--二级导航-->
                <ul class="nav nav-pills" style="max-width:1130px;margin:0 auto;">
                   <?php if(is_array($snvlist)): $i = 0; $__LIST__ = $snvlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$smu): $mod = ($i % 2 );++$i; if($smu['is_nav'] == 1): ?><!--后台让其显示才显示-->
                          <li role="presentation" <?php if($smu['id'] == $param['mu']): ?>class="active"<?php endif; ?>>
                          <a href="<?php echo U('news/'.$navinfo['id'].'-'.$smu['id']);?>"><?php echo ($smu['title']); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>

            </div>  <!--二级导航--><?php endif; ?>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>
                                  <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- Modal 更多文章的弹出层-->
                  </li>
                </ul>

              </aside>

              <aside id="tag_cloud-4" class="widget widget_tag_cloud">
                <h3 class="widget-title">标签</h3>
                <div class="tagcloud">
                     <?php $_result=C('ARTICLE_TYPE');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Typelist/index',array('article_type'=>$vo,'nv'=>'1','mu'=>'2'));?>" class='tag-link-5' title='<?php echo ($vo); ?>' style='font-size: 8px;'><?php echo ($vo); ?></a>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
              </aside>

              <aside id="categories-2" class="widget widget_categories">
                <h3 class="widget-title">分类目录</h3>
                <ul>
                  <li class="cat-item cat-item-1">
                    <a
                      href="">PHP</a>
                    (2)
                  </li>
                  <li class="cat-item cat-item-8">
                    <a href="">MySQL</a>
                    (2)
                  </li>
                </ul>
                
              </aside>
              
              <aside id="text-3" class="widget widget_text">
                <div class="textwidget" style="color:#999;">行路难，行路难，多歧路，今安在。</div>
              </aside>
              <aside id="linkcat-13" class="widget widget_links">
                <h3 class="widget-title">
                <span class="glyphicon glyphicon-screenshot"></span> 
                友情链接</h3>
                <ul class='xoxo blogroll'>
                  <li>
                   <!--友情链接列表-->
                     <?php if(is_array($link_list)): $i = 0; $__LIST__ = $link_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['url']); ?>" title="点击跳转" target="_blank" style="color:#999;"><?php echo ($vo['title']); ?></a> &nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                  </li>


                </ul>
              </aside>
            </div>
          </div>
          <!-- #secondary -->
        </div>
        <!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
      </div>
      <!-- close .row -->
    </div>
    <!-- close .container -->
  </div>
  <!-- close .site-content -->

  <div id="footer-area">
    <div class="container footer-inner">
      <div class="row"></div>
    </div>    <!--加载右边区域-->


    <footer id="colophon" class="site-footer" role="contentinfo">
      <div class="site-info container">
        <div class="row">
          <div class="social-icons">
           <!-- <a href="" title="Follow us on GitHub"
              class="github" target="_blank">
              <i class="social_icon fa fa-github"></i>
            </a>-->
          </div>
          <nav role="navigation" class="col-md-6">
            <ul id="menu-about-1" class="nav footer-nav clearfix">
              <li
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                <a href="<?php echo U('news/1-2');?>" title="博客">Blog</a>
              </li>
              <li
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                <a href="<?php echo U('news/6-7');?>" title="网站作品">Works</a>
              </li>
              <li
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69">
                <a href="<?php echo U('news/10-11');?>" title="相册">Photo</a>
              </li>
              <li
                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27">
                <a href="<?php echo U('news/13-14');?>" title="关于我">About</a>
              </li>
            </ul>

          </nav>
<!-- UJian Button BEGIN -->
  <link href="/Public/Index/to-top/css/lrtk.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="/Public/Index/to-top/js/backtop.js"></script>

<!-- UJian Button END -->

          <div class="copyright col-md-6">
            <a href="/" title="谢翔的Blog">谢翔 的Blog</a>
            Powered by Yii Framework 2.0.5. 渝ICP备15007127号
            <!--CNZZ-->
                    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256042879'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1256042879%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
              <!--CNZZ-->
          </div>
        </div>
      </div>
        
      <!-- .site-info -->
      <div class="scroll-to-top">
        <i class="fa fa-angle-up"></i>
      </div>
      <!-- .scroll-to-top -->

    </footer>
    <!-- #colophon -->
  </div>
  </div>
  <!-- #page -->

</body>
</html>
<!-- Dynamic page generated in 0.280 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2015-07-24 09:07:13 -->