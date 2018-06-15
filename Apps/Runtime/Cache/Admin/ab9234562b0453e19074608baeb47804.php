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
<script language="JavaScript" charset="utf-8" type="text/javascript" src="/Public/Plugin/jquery-1.9.min.js"></script>
<link rel='stylesheet' type='text/css' href='/Public/Plugin/ztree/css/zTreeStyle/zTreeStyle.css'>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="/Public/Plugin/ztree/js/jquery.ztree.core-3.5.js"></script>
<script language="JavaScript" charset="utf-8" type="text/javascript" src="/Public/Plugin/ztree/js/jquery.ztree.excheck-3.5.js"></script>
<script type="text/javascript">
<!--
var setting = {
	data: {
		simpleData: {
			enable: true
		}
	},
	callback: {
		beforeClick: beforeClick
	}
};

var zNodes =[
             <?php if(is_array($tree)): $k = 0; $__LIST__ = $tree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>{id:<?php echo ($vo["id"]); ?>, pId:<?php echo ($vo["pid"]); ?>, name:"<?php echo ($vo["title"]); ?>", open:true}<?php echo empty($tree[$k])?'':','; endforeach; endif; else: echo "" ;endif; ?>
          ];

function beforeClick(treeId, treeNode) {
	if (treeNode.isParent) {
		return true;
	} else {
		<?php
 if($cat){ ?>
		parent.changeCat(treeNode.id,treeNode.name);
		parent.layer.closeAll();
		<?php
 }else{ ?>
		var url = "<?php echo U('Doc/add');?>";
		parent.location.href=url+'?id='+treeNode.id;
		return false;
		<?php
 } ?>
	}
}

$(document).ready(function(){
	$.fn.zTree.init($("#treeDemo"), setting, zNodes);
});
//-->
</script>
</head>
<body>

<div class="pad_lr_10" >
    <table width="100%" cellspacing="0">
        <tbody>
			<tr>
				<td>
					<div class="content_wrap">
						<div class="zTreeDemoBackground left">
							<ul id="treeDemo" class="ztree"></ul>
						</div>
					</div>
				</td>
			</tr>
        </tbody>
    </table>
</div>

</body>
</html>