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
<script type="text/javascript" src="/Public/Plugin/kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.tools.min.js"></script>
<script type="text/javascript" src="/Public/Plugin/my97/wdatepicker.js"></script>
<script type="text/javascript" src="/Public/Plugin/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/Public/Plugin/artDialog/plugins/iframeTools.source.js"></script>
<script type="text/javascript" src="/Public/Admin/js/attachment.js"></script>
<script>	
	$(function(){
		$('ul.J_tabs').tabs('div.J_panes > div');
  
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				width: '900px',
				height: '400px',
				allowFileManager : false,
				allowFlashUpload:true,
				uploadJson : '<?php echo U('Public/editupload');?>'							
			});
		});		
			
		$('#changeCat').click(function(){
			  art.dialog.open("<?php echo U('Navigate/cats',array('module'=>$module,''));?>",{title: '请选择内容栏目',id:'cats',width:350,height: 420,lock: true});	
		 });			  
	})
	
			
	function changeCat(module,title){
		$('#category_id').val(module);
		$('#changeCat').html(title);
		art.dialog({id:'cats'}).close();
	}
	
</script>
</head>
<body>


	<div class="subnav">
		<div class="content_menu ib_a blue line_x">
			<a href="<?php echo U('index');?>">
				<em>内容管理</em>
			</a>
			<span>|</span>
			<a href="javascript:;" class="on">
				<em>编辑内容</em>
			</a>			
		</div>
	</div>

			<form action="<?php if(!empty($info)): echo U('edit'); else: echo U('add'); endif; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo ($info['id']); ?>">	
            <input type="hidden" id="category_id" name="category_id" value="<?php echo ($catid); ?>">
            <input type="hidden" name="type" value="<?php echo ($type); ?>">
            <input type="hidden"  name="module" value="<?php echo ($module); ?>">
	<div class="pad_lr_10">
		<div class="col_tab">
			<ul class="J_tabs tab_but cu_li">
				<li class="current">基本信息</li>
				<li>扩展信息</li>
			</ul>
			<div class="J_panes">
				<div class="content_list pad_10">
					<table width="100%" cellspacing="0" class="table_form">
						<tr>
							<th width="120">所属栏目 :</th>
							<td>
							    <strong><a href="javascript:;" id="changeCat" title="点击修改分类"><?php echo ($title); ?></a></strong>							     
							</td>
						</tr>
						<tr>
							<th><font color="red">*</font> 标题 :</th>
							<td>
								<input type="text" name="title" class="input-text" size="100" value="<?php echo ($info['title']); ?>">
							</td>
						</tr>
                       <?php if($catid == 2 || $catid == 3 || $catid == 4 || $catid == 5 ): ?><tr>
                            <th> 文章标签 :</th>
                            <td>
                                <select name="article_type" id="">
                                    <?php $_result=C('ARTICLE_TYPE');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo); ?>" <?php if($info['article_type'] == $vo): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <span style="color:red">注意：请选取文章的所属分类</span>
                            </td>
                        </tr><?php endif; ?>
						<tr>
							<th width="120">封面图片 :</th>
							<td>
							    <div style="margin-bottom:5px;">
							       <input type="hidden" name="coverimg" id="thumb" value="<?php echo ($info['coverimg']); ?>">
							       <?php if(!empty($info['coverimg'])): ?><img height="113" src="<?php echo ($info['coverimg']); ?>" id="thumb_preview" style="cursor:hand">
							       <?php else: ?>
							       <img height="113" src="/Public/Admin/img/upload-pic.png" id="thumb_preview" style="cursor:hand"><?php endif; ?>
							       <a href="javascript:;" onclick="removeImg('thumb');">移除</a>
							    </div>
								<input type="button" onclick="javascript:flashupload(0,'图片上传',1,'jpg|jpeg|png|bmp|gif',10,'thumb',thumb_images)" class="btn" value="上传封面图片">
								在详情页中显示<label><input type="radio" name="coverimg_show" value="1" <?php if(($info['coverimg_show']) == "1"): ?>checked="checked"<?php endif; ?>>是</label>&nbsp;&nbsp;
								<label><input type="radio" name="coverimg_show" value="0" <?php if(($info['coverimg_show']) == "0"): ?>checked="checked"<?php endif; ?>>否</label>
				                <span style="color:red;"></span>
                			</td>
						</tr>						
						<tr>
							<th><font color="red">*</font> 内容 :</th>
							<td>
								<textarea id="content" name="content"><?php echo ($info['content']); ?></textarea>
							</td>
						</tr>
						<tr>
							<th>关键词 :</th>
							<td>
								<input type="text" name="keywords" class="input-text" size="115" value="<?php echo ($info['keywords']); ?>">
								<span class="gray ml10">用于内容搜索</span>
							</td>
						</tr>																		
						<tr>
							<th>摘要 :</th>
							<td>
								<textarea name='description' style="width: 700px; height: 65px;" title="留空则自动截取内容前140个字符"><?php echo ($info['description']); ?></textarea>
							</td>
						</tr>							
						<tr>
							<th>是否推荐 :</th>
							<td>
							    <label>
									<input type="radio" name="top" class="radio_style" value="1"  <?php if(($info['top']) == "1"): ?>checked="checked"<?php endif; ?>>是
								</label>
								&nbsp;&nbsp;
								<label>
									<input type="radio" name="top" class="radio_style" value="0"  <?php if(($info['top']) == "0"): ?>checked="checked"<?php endif; ?>>
									否
								</label>
							</td>
						</tr>
						<tr>
							<th>排序 :</th>
							<td>
								<input type="text" name="sort" class="input-text" size="25" value="<?php echo ($info['sort']); ?>">
								<span class="gray ml10">必须是整数，越大越靠前</span>
							</td>
						</tr>	
						<tr>
							<th>发布 :</th>
							<td>
								<label>
									<input type="radio" name="state" class="radio_style" value="1" <?php if(($info['state']) == "1"): ?>checked="checked"<?php endif; ?>>是
								</label>
								&nbsp;&nbsp;
								<label>
									<input type="radio" name="state" class="radio_style" value="2" <?php if(($info['state']) == "2"): ?>checked="checked"<?php endif; ?>>否
								</label>
							</td>
						</tr>																	
					</table>
				</div>
				<div class="content_list pad_10 hidden">
					<table width="100%" cellspacing="0" class="table_form">
						<tr>
							<th>作者 :</th>
							<td>
								<input type="text" name="writer" class="input-text" size="60" value="<?php echo ($info['writer']); ?>">
							</td>
						</tr>
						<tr>
							<th>阅读数 :</th>
							<td>
								<input type="text" name="view" class="input-text" size="60" value="<?php echo ($info['view']); ?>">
							</td>
						</tr>
                        <tr>
                            <th>发布时间 :</th>
                            <td>
                                <input type="text" name="time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" class="input-text Wdate" size="25" value="<?php if(!empty($info["time"])): echo (date('Y-m-d H:i:s',$info['time'])); endif; ?>" readonly>
                            </td>
                        </tr>
                    </table>
				</div>
			</div>
			<div class="mt10">
				<input type="submit" value="确定" id="dosubmit" name="dosubmit" class="smt mr10" style="margin: 0 0 10px 100px;">
				<br />
				<br />
				<br />
			</div>
		</div>

    </div>

    </form>


	</body>
</html>