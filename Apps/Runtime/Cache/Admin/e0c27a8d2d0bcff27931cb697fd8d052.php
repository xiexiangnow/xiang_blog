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
<script type="text/javascript" src="/Public/Plugin/my97/wdatepicker.js"></script>
<script type="text/javascript" src="/Public/Plugin/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/Plugin/artDialog/plugins/iframeTools.source.js"></script>
<script type="text/javascript">
/*设置状态*/
function setStatus(id, status) {
	if(-1==status){
		if(!confirm('确定执行删除操作吗?')){
			return false;
		}
	}
	
	if (!id || id.length == 0) {
		return alert("请选择一条记录");	
	}
	
	$('#myform').attr('action', "<?php echo U('state');?>");	
	$('#state').val(status);
	$('#myform').submit();	
}	
	/*排序*/
	function setSort() {
		$('#myform').attr('action', "<?php echo U('Doc/sort');?>");
		$('#myform').submit();
	}
</script>
</head>
<body>

	<div class="subnav">
		<div class="content_menu ib_a blue line_x">
			<a class="add fb J_showdialog" href="javascript:;" id="selected">
			   <em>添加</em>
			</a>
		</div>
	</div>

	<div class="pad_lr_10">

		<form action="<?php echo U('index');?>" method="get">
			<table width="100%" cellspacing="0" class="search_form">
				<tbody>
					<tr>
						<td>
							<div class="explain_col">
								标题或关键词
								<input name="keywords" type="text" class="input-text" size="30" value="<?php echo ($keywords); ?>">
                                发布时间
								<input name="starttime" type="text" size="13" id="d4311" onfocus="WdatePicker({maxDate:'#F{ $dp.$D(\'d4312\')}'})" class="input-text Wdate" value="<?php echo ($starttime); ?>" readonly>
								至
								<input name="endtime" type="text" size="13" id="d4312" onfocus="WdatePicker({minDate:'#F{ $dp.$D(\'d4311\')}'})" class="input-text Wdate" value="<?php echo ($endtime); ?>" readonly>
								顺序
								<select name='show' class='select'>
									<?php $_result=C('DOC_SORT_TYPE');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($key); ?>' <?php if($show == $key): ?>selected<?php endif; ?>>
									  <?php echo ($vo); ?>
									</option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								分类
								<select name="category_id">
									<option value="0">请选择</option>
                                    <?php echo ($menu); ?>
								</select>								
								<input type="submit" name="search" class="btn" value="搜索" />
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</form>

		<div class="J_tablelist table_list">
			<form action="<?php echo U('Doc/index');?>" id="myform">	
			<input type="hidden" name="state" value="1" id="state">			
				<table width="100%" cellspacing="0">

					<thead>
						<tr>
							<th width="40"><input type="checkbox" name="checkall" class="J_checkall"></th>							
							<th align="left">标题</th>
                            <th align="center">标签</th>
							<th align="left">分类</th>
							<th>发布时间</th>
							<th>排序</th>
							<th>操作</th>
						</tr>
					</thead>


					<tbody>
                        
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td align="center"><input type="checkbox" name='id[]' class="J_checkitem" value="<?php echo ($vo['id']); ?>"></td>							
							<td>
							    <?php if($vo['top'] == 1): ?><font color="red">(推荐)</font><?php endif; ?>
								<a href="<?php echo U('Doc/info',array('id'=>$vo['id']));?>" target="_blank" title="点击阅读内容"><?php echo ($vo['title']); ?></a>
							</td>
                            <td align="center"><?php echo ($vo['article_type']); ?></td>
							<td align="left"><?php echo ($ary[$vo['category_id']]); ?></td>
							<td align="center"><?php echo (date("Y-m-d H:i",$vo['time'])); ?></td>
							<td align="center">
								<input type="text" style="text-align: center;" class="input-text" size="8" name="sort[<?php echo ($vo['id']); ?>]" value="<?php echo ($vo['sort']); ?>">
							</td>
							<td align="center">
								<a href="<?php echo U('doc/edit',array('id'=>$vo['id']));?>" title="点击修改">修改</a>
								|
								<?php if($vo['state'] == 1): ?><a href="<?php echo U('doc/state',array('id'=>$vo['id'],'state'=>0));?>" title="点击禁用">启用</a>
								<?php else: ?> 
								  <a href="<?php echo U('doc/state',array('id'=>$vo['id'],'state'=>1));?>" title="点击启用"><font color="red">禁用</font></a><?php endif; ?>
								|
								<a href="<?php echo U('doc/state',array('id'=>$vo['id'],'state'=>-1));?>" onclick="javascript:return confirm('确认删除该记录吗?');" title="点击删除">删除</a>															
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						
						<?php if(empty($list)): ?><tr>
							<td colspan="6" align="center">暂无数据 !</td>							
						</tr><?php endif; ?>

					</tbody>
				</table>
				</form>
		</div>

		<div class="btn_wrap_fixed">
            <label class="select_all mr10"><input type="checkbox" name="checkall" class="J_checkall">全选/取消</label>
            <input type="button" value="批量启用" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 1)"/>  
            <input type="button" value="批量禁用" class="btn" onclick="setStatus($.checkBoxValue('id[]'), 0)"/>
            <input type="button" value="批量删除" class="btn" onclick="setStatus($.checkBoxValue('id[]'), -1)"/>	
			
			<input type="button" value="排序" class="btn" onclick="setSort()" />
			<style>
			    #pages ul li{float:left;}
			</style>
			<div id="pages" ><?php echo ($page); ?></div>
		</div>


</body>
</html>
<script type="text/javascript" src="/Public/Admin/js/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
$(function(){
	$('#selected').click(function(){
		art.dialog.open("<?php echo U('Navigate/tree');?>",{title: '请选择内容栏目',width:350,height: 420,lock: true});	
	})
})
</script>