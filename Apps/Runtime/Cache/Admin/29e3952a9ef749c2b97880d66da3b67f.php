<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link href="/Public/Admin/css/style.css?c=7" rel="stylesheet"/>
    <title>
        <?php if(!empty($page_title)): echo ($page_title); ?>_<?php endif; ?>
        <?php echo C('SYS_TITLE');?>
    </title>
<script type="text/javascript" src="/Public/Plugin/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/Public/Plugin/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/Plugin/artDialog/plugins/iframeTools.source.js"></script>
<script language="javascript" type="text/javascript" src="/Public/Admin/js/attachment.js"></script>
<script src="/Public/Index/js/uploadPreview.js"></script>
</head>
<body>  


<div class="subnav">
    <h1 class="title_2 line_x"><?php if(empty($info)): ?>添加<?php else: ?>修改<?php endif; ?>说说</h1>
</div>

<div class="pad_lr_10" >
<form action="<?php echo U('upload');?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
    <table width="100%" cellspacing="0" class="table_form">
        <tbody>
      <tr>
        <th>说说标题<font color="red">*</font>：</th>
        <td>
          <input name="title" type="text"  class="input-text" size="50" value="">
          <span class="gray ml10"></span>
        </td>
      </tr>
      
      <tr>
        <th>图片<font color="red">*</font>：</td>
        <td>			    
			   <!-- <input type="file" name="file" /> -->
         <ul id="warp">
           <li>
          <input type="file" id="up_img_WU_FILE_0" name="file"/>
          <img id="imgShow_WU_FILE_0" width="200" height="80" />
         注：只能上传jpg, gif, png, jpeg格式 　　　  <span style="color:red;">＊　文件大小不能超过1M</span>
          </li>
          </ul>
        </td>
      </tr> 
      <tr>
        <th>内容：</th>
      	<td><textarea name="content"  cols="70" rows="10"></textarea></td>
      </tr>        
      <tr >
        <th>是否置顶：</th>
        <td><input name="top" type="radio" <?php echo $info['top']==1?"checked='checked'":'';?> class="input-text" size="50" value="1" />是&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="top" type="radio" <?php echo $info['top']==0?"checked='checked'":'';?> class="input-text" size="50" value="0" />否
        </td>
      </tr>        
           
      <tr>
        <th width="120">&nbsp;</th>
                <td valign="bottom">
          <input class="smt  mr10" type="submit" name="submit" value="提交" />&nbsp;&nbsp;
          <a class="smt" href="<?php echo U('index');?>">返回列表</a>
        </td>
      </tr>
        </tbody>
    </table>
    </form>
</div>


</body>
</html>