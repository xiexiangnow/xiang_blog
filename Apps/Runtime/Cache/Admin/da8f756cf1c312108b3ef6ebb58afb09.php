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
<script src="/Public/Plugin/jquery-1.9.min.js"></script>
<script type="text/javascript">
/*排序*/
function setSort() {
	$('#myform').attr('action', "<?php echo U('sort');?>" );	
	$('#myform').submit();	
}
</script>
</head>
<body>	


<div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	     <?php if(is_array($nav_menu)): $i = 0; $__LIST__ = $nav_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo['url']); ?>" <?php if(($navk) == $vo['navk']): ?>class="on"<?php else: ?>class=""<?php endif; ?>><em><?php echo ($vo['title']); ?></em></a>
    	         <span>|</span><?php endforeach; endif; else: echo "" ;endif; ?> 
    </div>
</div>

<div class="pad_lr_10">
    <div class="J_tablelist table_list">
        <form action="" id="myform">
        <table width="100%" cellspacing="0">
        
            <thead>
	            <tr>                        
					<th>编号</th>
					<th align="left">栏目名称</th>					
					<th align="left">栏目类型</th>
					<th align="left">所属模型</th>					
					<th>是否导航显示</th>
					<th>排序</th>
					<th>操作</th>
	            </tr>
            </thead>
            <?php
 $color = array(2=>'blue','red'); ?>
    	    <tbody>
				<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
						<td align="center"><?php echo ($vo['id']); ?></td>
						<td>
						    <?php
 $level = $vo['level']-1; if($level){ echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;",$level).($list[$k]['level']==$vo['level']?"├─":"└─"); } ?>
						    <?php echo ($vo['title']); ?>
						</td>						
						<td>
						    <font color="<?php echo ($color[$vo['type']]); ?>"><?php echo ($type_ary[$vo['type']]); ?><font>
						</td>
						<td><?php if(($vo['type']) == "1"): echo ($doc_type[$vo['module']]); endif; ?></td>						
						<td align="center">
						  <?php if($vo['is_nav'] == 1): ?><img data-tdtype="toggle" data-field="status" data-id="1" data-value="1" src="/Public/Admin/img/toggle_enabled.gif" />
						  <?php else: ?>
						      <img data-tdtype="toggle" data-field="status" data-id="1" data-value="1" src="/Public/Admin/img/toggle_disabled.gif" /><?php endif; ?>				
						</td>
						<td align="center"><input type="text" class="input-text" style="text-align:center;" name="sort[<?php echo ($vo['id']); ?>]" value="<?php echo ($vo['sort']); ?>" size="8"></td>
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
        <input type="button" class="btn"onclick="setSort();" value="排序" />        
    </div>
     
</div>


</body>
</html>