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

     <!--banner图strat-->
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/Public/Index/images/nav_6.jpg" alt="..." >
            <div class="carousel-caption">
              <!--描述区-->
            </div>
          </div>
          <div class="item">
            <img src="/Public/Index/images/nav_5.jpg" alt="..." >
            <div class="carousel-caption">
              <!--描述区-->
            </div>
          </div>
             <div class="item">
            <img src="/Public/Index/images/nav_4.jpg" alt="..." >
            <div class="carousel-caption">
              <!--描述区-->
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
       <!--banner图end-->
  <!--巨幕-->
    <div class="jumbotron" style="text-align:center;">
      <h1>All the time,Keep in mind!</h1>
      <p>每一个成功者都有一个开始，勇于开始，才能找到成功的路！</p>
    </div>
   <!--巨幕-->
    <div id="content" class="site-content">
      <div style="max-width:1145px; margin:0 auto"> 
            <!--效果-->
        <!--
             <div class="pdt">
              <ul>
              <style type="text/css">
                  .float_pdt a:hover{color:#AF251B;}
              </style>
                   <li>
                      <div class="float_wz"><a href="<?php echo U('News/1-2');?>"><?php echo ($bo_info['info']); ?></a></div>
                      <div class="float_pdt"><span>博文</span><a href="<?php echo U('News/1-2');?>" title="查看更多" target="_blank">more</a></div>
                      <?php if($bo_info['img'] != null): ?><img src="<?php echo ($bo_info['img']); ?>" width="320" height="227" />
                       <?php else: ?>
                          <img src="/Public/Index/images/show_01.png"/><?php endif; ?>
                    </li>

                    <li class="li_one">
                      <div class="float_wz"><a href="<?php echo U('News/6-7');?>"><?php echo ($zuo_info['info']); ?></a></div>
                      <div class="float_pdt"><span>作品</span><a href="<?php echo U('News/6-7');?>" title="查看更多" target="_blank">more</a></div>
                       <?php if($zuo_info['img'] != null): ?><img src="<?php echo ($zuo_info['img']); ?>" width="320" height="227"/>
                       <?php else: ?>
                           <img src="/Public/Index/images/2.jpg"/><?php endif; ?>
                    </li>

                    <li>
                      <div class="float_wz"><a href="<?php echo U('News/10-11');?>"><?php echo ($ce_info['info']); ?></a></div>
                      <div class="float_pdt"><span>相册</span><a href="<?php echo U('News/10-11');?>" title="查看更多" target="_blank">more</a></div>
                       <?php if($ce_info['img'] != null): ?><img src="<?php echo ($ce_info['img']); ?>" width="320" height="227"/>
                        <?php else: ?>
                           <img src="/Public/Index/images/3.jpg"/><?php endif; ?>
                    </li>
                </ul>
            </div>
        -->
            <!--效果-->
      </div>
      <div class="top-section" ></div>
      <div class="container main-content-area" >
        <div class="row">
          <div class="main-content-inner col-sm-12 col-md-8 pull-left">
            <div id="primary" class="content-area">
              <main id="main" class="site-main" role="main">
       <!--文章列表-->
         <?php if(is_array($doc_list)): $i = 0; $__LIST__ = $doc_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article id="post-62"
                class="post-62 post type-post status-publish format-standard hentry category-note tag-nginx tag-php">
                <div class="blog-item-wrap">
                  <a href=" " title="nginx + php"> </a>
                  <div class="post-inner-content">
                    <header class="entry-header page-header">

                      <h3 class="entry-title">
                        <a href="<?php echo U('news/show',array('id'=>$vo['id']));?>" rel="bookmark" title="<?php echo ($vo['title']); ?>" target="_blank"><?php echo ($vo['title']); ?></a>
                      </h3>

                      <div class="entry-meta">
                        <span class="posted-on">
                          <i class="fa fa-calendar"></i>
                              <span class="glyphicon glyphicon-time"></span><?php echo date('Y-m-d',$vo['time'])?></time>
                        </span>
                        <span class="comments-link">
                          <i class="fa fa-comment-o"></i>
                            浏览：<?php echo ($vo['view']); ?> <br/> <span class="glyphicon glyphicon-tag"></span><span class="label label-default"><?php echo $vo['article_type']?$vo['article_type']:'未填写'?></span>
                        </span>

                      </div>
                      <!-- .entry-meta -->
                    </header>
                    <!-- .entry-header -->

                    <div class="entry-content" style="border:1px dashed #DADADA;padding:5px;margin-bottom:15px;">
                      <span class="glyphicon glyphicon-bookmark"></span>
                            <?php echo ($vo['description']); ?>              
                     </div>
                    <!-- .entry-content -->
                      <a href="<?php echo U('news/1-2');?>" target="_blank">
                         <button type="button" class="btn btn-default btn-sm" style="float:right;">read more</button>
                      </a>
                  </div>
                </div>
              </article>
              <!-- #post-## --><?php endforeach; endif; else: echo "" ;endif; ?>
              
 <!--文章列表-->

              <!-- #post-## -->
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