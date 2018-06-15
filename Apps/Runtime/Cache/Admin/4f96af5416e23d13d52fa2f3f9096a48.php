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
</head>
<body>


<div class="subnav">
    <h1 class="title_2 line_x"><?php echo 'add'==$act?'添加':'修改'?>菜单</h1>
</div>

<div class="pad_lr_10" >
	<form action="<?php echo U('/Admin/Menu/addmenu');?>" method="post">
	<input type="hidden" name="id" value="<?php echo ($info['id']); ?>">
	<input type="hidden" name="pid" value="<?php echo ($info['pid']); ?>">
    <table width="100%" cellspacing="0" class="table_form">
        <tbody>
			<tr>
				<th width="100" class="rt">上级目录：</th>
				<td>
				  <select name="pid"  class="J_cate_select mr10">
				  <option value="0">根目录</option>
				   <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if($vo['id'] == $info['pid']): ?>selected<?php endif; ?>><?php echo branch_level($vo['level']); echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				  </select>					
				</td>
			</tr>
			<tr>
				<th>名称：</th>
				<td>
					<input name="title" type="text" value="<?php echo ($info['title']); ?>" class="input-text" size="50"> <font color="red">*</font>
				</td>
			</tr>
			<tr>
				<th>路径：</th>
				<td>
					<input name="path" type="text" value="<?php echo ($info['path']); ?>"  class="input-text" size="50"> 
					<span class="gray ml10">目录结构 无需链接（1、2级），页面和操作需要（3、4级），请使用参数"method=xx"区分同一个方法的不同权限</span>					
				</td>
			</tr>
			<tr>
				<th>显示：</th>
				<td>
					<label><input name="is_show" type="radio" value="1" <?php if($info['is_show'] == 1): ?>checked<?php endif; ?>>显示</label>&nbsp;&nbsp;  
					<label><input name="is_show" type="radio" value="0" <?php if($info['is_show'] == 0): ?>checked<?php endif; ?>>隐藏</label>
				</td>
			</tr>			
			<tr>
				<th>排序：</th>
				<td>
					<input name="sort" type="text" value="<?php echo ($info['sort']); ?>"  class="input-text" size="50"> 
					<span class="gray ml10">必须是整数，越大越靠前</span> 
				</td>
			</tr>
			<tr>
				<th width="120">&nbsp;</th>
                <td valign="bottom">
					<input class="smt  mr10" type="submit" name="submit" value="<?php echo 'add'==$act?'添加':'修改'?>" />&nbsp;&nbsp;
					<a class="smt" href="<?php echo U('index',array('pid'=>$info['pid']));?>">返回列表</a>
				</td>
			</tr>
        </tbody>
    </table>
    </form>
</div>


</body>
</html>