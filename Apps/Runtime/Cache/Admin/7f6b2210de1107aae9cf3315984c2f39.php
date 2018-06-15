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
	if (!id || id.length == 0) {
		return alert("请选择一篇文章");	
	}
	if(0==status){
	    $('#myform').attr('action', "<?php echo U('Doc/del');?>" );
	}else{
		$('#myform').attr('action', "<?php echo U('Doc/state');?>" );
	}
	$('#state').val(status);
	$('#myform').submit();	
}
</script>
</head>
<body>


  <div class="pad_lr_10" style="margin-top:20px;">

  <form action="/Admin/Doc/recycle">
			<table width="100%" cellspacing="0" class="search_form">
				<tbody>
					<tr>
						<td>
							<div class="explain_col">
								标题或关键词
								<input name="keywords" type="text" class="input-text" size="30" value="<?php echo ($keywords); ?>">													
								<input type="submit" name="search" class="btn" value="搜索" />
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</form>

		<div class="J_tablelist table_list">
		<form action="/Admin/Doc/recycle" id="myform" method="get">
		<input type="hidden" name="dis" id="state" value="-1">
				<table width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="40"><input type="checkbox" name="checkall" class="J_checkall"></th>							
							<th align="left">标题</th>
							<th>分类</th>
							<th>添加时间</th>
							<th>操作</th>
						</tr>
					</thead>

					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td align="center"><input type="checkbox" name='id[]' class="J_checkitem" value="<?php echo ($vo['id']); ?>"></td>							
							<td>
								<a href="<?php echo U('Doc/info',array('id'=>$vo['id']));?>" target="_blank" title="点击阅读内容"><?php echo ($vo['title']); ?></a>
							</td>
							<td align="center"><?php echo ($ary[$vo['category_id']]); ?></td>
							<td align="center"><?php echo (date("Y-m-d H:i",$vo['time'])); ?></td>
							<td align="center">
				                <a href="<?php echo U('doc/del',array('id'=>$vo['id']));?>" onclick="javascript:return confirm('确认要删除?删除后不可恢复！ ')" title="点击删除">删除</a> | 
				                <a href="<?php echo U('doc/state',array('id'=>$vo['id'],'dis'=>1));?>" title="点击还原">还原</a>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>				
		  </form>
		</div>

		<div class="btn_wrap_fixed">
            <label class="select_all mr10"><input type="checkbox" name="checkall" class="J_checkall">全选/取消</label>
		        <input type="button" value="批量删除" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 0)"/>        
		        <input type="button" value="批量还原" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 1)"/>		
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