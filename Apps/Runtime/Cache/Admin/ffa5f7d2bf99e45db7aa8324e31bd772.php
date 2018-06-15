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
<script type="text/javascript">
/*设置状态*/
function setStatus(id, status) {
	if(2==status){
		if(!confirm('确定执行删除操作吗?')){
			return false;
		}
	}
	
	if (!id || id.length == 0) {
		return alert("请选择一条记录");	
	}
	2==status?$('#myform').attr('action', "<?php echo U('del');?>"):$('#myform').attr('action', "<?php echo U('state');?>" );	
	$('#state').val(status);
	$('#myform').submit();	
}	
	/*排序*/
	function setSort() {
		$('#myform').attr('action', "<?php echo U('Talk/sort');?>");
		$('#myform').submit();
	}
</script>
</head>
<body>

	<div class="subnav">
		<div class="content_menu ib_a blue line_x">
			<a class="add fb J_showdialog" href="<?php echo U('add');?>">
			   <em>添加说说</em>
			</a>
		</div>
	</div>

	<div class="pad_lr_10">


		<div class="J_tablelist table_list">
			<form action="<?php echo U('Doc/index');?>" id="myform">
				<input type="hidden" name="state" id="state" value="1">
				<table width="100%" cellspacing="0">

					<thead>
						<tr>
							<th width="40"><input type="checkbox" name="checkall" class="J_checkall"></th>							
							<th align="left">说说标题</th>
							<th align="left">发表时间</th>
							<th align="left">内容</th>
							<th>图片</th>
							<th>排序</th>
							<th>操作</th>
						</tr>
					</thead>


					<tbody>

				    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td align="center"><input type="checkbox" name='id[]' class="J_checkitem" value="<?php echo ($vo['id']); ?>"></td>						
							<td>
								 <?php echo ($vo['title']); ?>
							</td>
							<td>
							     <?php echo date('Y-m-d H:i:s',$vo['time']);?>
							</td>
							<td width="520">
							     <?php echo ($vo['content']); ?>
							</td>
							<td align="center">
							    <?php if($vo['imgurl'] != null): ?><img src="/Uploads<?php echo ($vo['imgurl']); ?>" width="140" height="30">
							     <?php else: ?>
							         该说说没有图片<?php endif; ?>
							</td>
							<td align="center">
								<input type="text" style="text-align: center;" class="input-text" size="8" name="sort[<?php echo ($vo['id']); ?>]" value="<?php echo ($vo['sort']); ?>">
							</td>
								
							<td align="center">
								
							    <a href="<?php echo U('Talk/edit',array('id'=>$vo['id']));?>" title="点击修改">修改</a>
								|
								<?php if($vo['state'] == 1): ?><a href="<?php echo U('Talk/hide',array('id'=>$vo['id'],'state'=>0));?>" title="点击隐藏">显示</a>
								<?php else: ?> 
								  <a href="<?php echo U('Talk/hide',array('id'=>$vo['id'],'state'=>1));?>" title="点击显示"><font color="red">隐藏</font></a><?php endif; ?> |
								<a href="<?php echo U('Talk/del',array('id'=>$vo['id']));?>" title="点击删除" onclick="javascript:return confirm('确定删除吗？');">删除</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
       
					</tbody>
				</table>
				</form>
		</div>

		<div class="btn_wrap_fixed">
            <label class="select_all mr10"><input type="checkbox" name="checkall" class="J_checkall">全选/取消</label>
            <input type="button" value="批量显示" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 1)"/>  
            <input type="button" value="批量隐藏" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 0)"/>
            <input type="button" value="批量删除" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 2)"/>	                        			
			<input type="button" value="排序"  title="排序中置顶优先，其次手动排序，再次id desc" class="btn" onclick="setSort()" />
            <style>
                #pages ul li{float:left;}
            </style>
			<div id="pages"><?php echo ($page); ?></div>
		</div>


</body>
</html>
<script type="text/javascript" src="/Public/Admin/js/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
</script>