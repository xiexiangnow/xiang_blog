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
</head>
<body>


<div class="subnav">
    <h1 class="title_2 line_x"><?php if(empty($info)): ?>添加<?php else: ?>修改<?php endif; ?>实战项目</h1>
</div>

<div class="pad_lr_10" >
    <form action="<?php if(empty($info)): echo U('pro_add_data'); else: echo U('pro_edit'); endif; ?>" method="post" >
        <input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
        <table width="100%" cellspacing="0" class="table_form">
            <tbody>
            <tr>
                <th>项目名称<font color="red">*</font>：</th>
                <td>
                    <input name="pro_name" type="text"  class="input-text" size="50" value="<?php echo ($info['pro_name']); ?>">
                    <span class="gray ml10"></span>
                </td>
            </tr>
            <tr>
                <th>域名地址<font color="red">*</font>：</th>
                <td>
                    <input name="pro_web" type="text"  class="input-text" size="50" value="<?php echo ($info['pro_web']); ?>">
                    <span class="gray ml10">例：www.98huoguo.com</span>
                </td>
            </tr>
            <tr>
                <th>所用框架<font color="red">*</font>：</th>
                <td>
                    <input name="pro_jia" type="text"  class="input-text" size="20" value="<?php echo ($info['pro_jia']); ?>">
                    <span class="gray ml10">所用开发框架</span>
                </td>
            </tr>

            <tr>
                <th>是否带有手机站<font color="red">*</font>：</th>
                <td>
                    <label><input type="radio" name="is_mobile" value="1" <?php echo $info['is_mobile']==1?"checked='checked'":''?>/>是</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="is_mobile" value="2" <?php echo $info['is_mobile']==2?"checked='checked'":''?>/>否</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <label><input type="radio" name="is_mobile" value="3" <?php echo $info['is_mobile']==3?"checked='checked'":''?>/>自适应</label>
                </td>
            </tr>
            <tr>
                <th width="120">&nbsp;</th>
                <td valign="bottom">
                    <input class="smt  mr10" type="submit" name="submit" value="提交" />&nbsp;&nbsp;
                    <a class="smt" href="<?php echo U('pro_index');?>">返回列表</a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>


</body>
</html>