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
<script src="/Public/Plugin/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
/*排序*/
function setSort() {
	$('#myform').attr('action', "<?php echo U('Menu/sort');?>" );	
	$('#myform').submit();	
}
</script>
</head>
<body>	


<div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	<a class="add fb J_showdialog" href="<?php echo U('addmenu',array('pid'=>$top['id']));?>" data-title="添加管理员"><em>添加菜单</em></a>　            
    </div>
</div>

<div class="pad_lr_10">
    <div class="J_tablelist table_list">
        <form action="" id="myform">
        <table width="100%" cellspacing="0">
            <thead>
            <tr>                        
				<th width="60">编号</th>
				<th align="left">名称<?php if(($top) > "1"): ?>&nbsp;<a href="<?php echo U('index',array('pid'=>$top['pid']));?>" title="返回到上级目录">(返回上级 <?php echo ($top['title']); ?>)</a><?php endif; ?></th>
				<th align="left">路径</th>
				<th width="200">等级</th>
				<th>状态</th>
				<th width="150">排序</th>
				<th width="120">操作</th>
            </tr>
            </thead>
            
    	    <tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>	
						<td align="center"><?php echo ($vo['id']); ?></td>
						<td><a href="<?php echo U('index',array('pid'=>$vo['id']));?>" title="点击查看下级目录"><?php echo ($vo['title']); ?></a></td>
						<td><?php echo ($vo['path']); ?></td>
						<td align="center"><?php echo ($vo['level']); ?></td>
						<td align="center">
						  <?php if($vo['is_show'] == 1): ?><img data-tdtype="toggle" data-field="status" data-id="1" data-value="1" src="/Public/Admin/img/toggle_enabled.gif" />
						  <?php else: ?>
						     <img data-tdtype="toggle" data-field="status" data-id="1" data-value="1" src="/Public/Admin/img/toggle_disabled.gif" /><?php endif; ?>				
						</td>
						<td align="center"><input type="text" style="text-align:center;" class="input-text" name="sort[<?php echo ($vo['id']); ?>]" value="<?php echo ($vo['sort']); ?>" size="8"></td>
						<td align="center">
							<a href="<?php echo U('edit',array('id'=>$vo['id']));?>">修改</a>					|
							<a href="<?php echo U('del',array('id'=>$vo['id']));?>" onClick="javascript:return confirm('确认删除该栏目及子栏目吗?');">删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        </form>
    </div>

     
    <div class="btn_wrap_fixed">
        <input type="button" class="btn" onclick="setSort();" value="排序" />
    </div>
     
</div>



</body>
</html>