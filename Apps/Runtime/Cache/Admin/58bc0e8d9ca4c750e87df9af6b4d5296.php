<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>附件管理中心</title>
<link href="/Public/attachment/css/reset.css" rel="stylesheet" type="text/css" />
<link href="/Public/attachment/css/zh-cn-system.css" rel="stylesheet" type="text/css" />
<link href="/Public/attachment/css/table_form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/Public/Plugin/jquery-1.9.min.js"></script>
<style type="text/css">
	html{_overflow-y:scroll}
</style>
<link href="/Public/Plugin/swfupload/swfupload.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript" src="/Public/Plugin/swfupload/swfupload.js"></script>
<script language="JavaScript" type="text/javascript" src="/Public/Plugin/swfupload/fileprogress.js"></script>
<script language="JavaScript" type="text/javascript" src="/Public/Plugin/swfupload/handlers.js"></script>
<script type="text/javascript">
var swfu = '';
		$(document).ready(function(){
		swfu = new SWFUpload({
			flash_url:"/Public/Plugin/swfupload/swfupload.swf?"+Math.random(),
			upload_url:"<?php echo U('Attachment/edit',array('module'=>$module));?>",
			file_post_name : "Filedata",
			//post_params:{"SWFUPLOADSESSID":"1432020279","module":"content","catid":"11","userid":"1","siteid":"1","dosubmit":"1","thumb_width":"0","thumb_height":"0","watermark_enable":"1","filetype_post":"gif|jpg|jpeg|png|bmp","swf_auth_key":"e4c4aa8103c2f2b4ede02b6648390cc1","isadmin":"1","groupid":"8","userid_flash":"7f72TAhN-zjGFR52DROonNlcWEiawqyWggDTe6QG"},
			file_size_limit:"<?php echo ($size); ?>",
			file_types:"<?php echo ($ext); ?>",
			file_types_description:"All Files",
			file_upload_limit:"<?php echo ($num); ?>",
			custom_settings : {progressTarget : "fsUploadProgress",cancelButtonId : "btnCancel"},
			button_image_url: "",
			button_width: 75,
			button_height: 28,

			button_placeholder_id: "buttonPlaceHolder",

			button_text_style: "",
			button_text_top_padding: 3,
			button_text_left_padding: 12,
			button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
			button_cursor: SWFUpload.CURSOR.HAND,

			file_dialog_start_handler : fileDialogStart,
			file_queued_handler : fileQueued,
			file_queue_error_handler:fileQueueError,
			file_dialog_complete_handler:fileDialogComplete,
			upload_progress_handler:uploadProgress,
			upload_error_handler:uploadError,
			upload_success_handler:uploadSuccess,
			upload_complete_handler:uploadComplete
			});
		})</script>
<div class="pad-10">
    <div class="col-tab">
        <ul class="tabBut cu-li">
            <li id="tab_swf_1"  class="on" onclick="SwapTab('swf','on','',5,1);">上传附件</li>
            <li id="tab_swf_2" onclick="SwapTab('swf','on','',5,2);">网络文件</li>
            <li id="tab_swf_3" onclick="SwapTab('swf','on','',5,3);set_iframe('album_list','<?php echo U('search',array('num'=>$num,'size'=>$sizes,'ext'=>$exty,'module'=>$module));?>');">数据库</li>
        </ul>

         <div id="div_swf_1" class="content pad-10 ">
        	<div>
				<div class="addnew" id="addnew">
					<span id="buttonPlaceHolder"></span>
				</div>
				<input type="button" id="btupload" value="开始上传" onClick="swfu.startUpload();" />
                <div id="nameTip" class="onShow">最多上传<font color="red"> <?php echo ($num); ?></font> 个附件,单文件最大 <font color="red"><?php echo ($sizes); ?> MB</font></div>
                <div class="bk3"></div>
				
                <div class="lh24">支持 <font style="font-family: Arial, Helvetica, sans-serif"><?php echo ($exts); ?></font> 格式。</div>
				</div> 	
    		<div class="bk10"></div>
        	<fieldset class="blue pad-10" id="swfupload">
        	<legend>列表</legend>
        	<ul class="attachment-list"  id="fsUploadProgress">    
        	</ul>
    		</fieldset>
    	</div>
		
        <div id="div_swf_2" class="contentList pad-10 hidden">
        <div class="bk10"></div>
        	请输入网络地址<div class="bk3"></div><input type="text" name="info[filename]" class="input-text" value=""  style="width:350px;"  onblur="addonlinefile(this)">
		<div class="bk10"></div>
        </div>    	
		
    	<div id="div_swf_3" class="contentList pad-10 hidden">
            <ul class="attachment-list">
        	 <iframe name="album-list" src="#" frameborder="false" scrolling="no" style="overflow-x:hidden;border:none" width="100%" height="345" allowtransparency="true" id="album_list"></iframe>
        	</ul>
        </div>
               
               
    <div id="att-status" class="hidden"></div>
    <div id="att-status-del" class="hidden"></div>
    <div id="att-name" class="hidden"></div>
                         
</div>
</body>
<script type="text/javascript">
function imgWrap(obj){
	$(obj).hasClass('on') ? $(obj).removeClass("on") : $(obj).addClass("on");
}

function SwapTab(name,cls_show,cls_hide,cnt,cur) {
    for(i=1;i<=cnt;i++){
		if(i==cur){
			 $('#div_'+name+'_'+i).show();
			 $('#tab_'+name+'_'+i).addClass(cls_show);
			 $('#tab_'+name+'_'+i).removeClass(cls_hide);
		}else{
			 $('#div_'+name+'_'+i).hide();
			 $('#tab_'+name+'_'+i).removeClass(cls_show);
			 $('#tab_'+name+'_'+i).addClass(cls_hide);
		}
	}
}

function addonlinefile(obj) {
	var strs = $(obj).val() ? '|'+ $(obj).val() :'';
	$('#att-status').html(strs);
}

function change_params(){
	if($('#watermark_enable').attr('checked')) {
		swfu.addPostParam('watermark_enable', '1');
	} else {
		swfu.removePostParam('watermark_enable');
	}
}
function set_iframe(id,src){
	$("#"+id).attr("src",src); 
}

function album_cancel(obj,id,source){
	var src = $(obj).children("img").attr("path");
	var filename = $(obj).attr('title');
	if($(obj).hasClass('on')){
		$(obj).removeClass("on");
		var imgstr = $("#att-status").html();
		var length = $("a[class='on']").children("img").length;
		var strs = filenames = '';
		//$.get('<?php echo U('Attachment/edit',array('module'=>0));?>?aid='+id+'&src='+source+'&filename='+filename);
		for(var i=0;i<length;i++){
			strs += '|'+$("a[class='on']").children("img").eq(i).attr('path');
			filenames += '|'+$("a[class='on']").children("img").eq(i).attr('title');
		}
		$('#att-status').html(strs);
		$('#att-status').html(filenames);
	} else {
		var num = $('#att-status').html().split('|').length;
		var file_upload_limit = '<?php echo ($num); ?>';
		if(num > file_upload_limit) {alert('不能选择超过'+file_upload_limit+'个附件'); return false;}
		$(obj).addClass("on");
		//$.get('<?php echo U('Attachment/edit',array('module'=>0));?>?aid='+id+'&src='+source+'&filename='+filename);
		$('#att-status').append('|'+src);
		$('#att-name').append('|'+filename);
	}
}

</script>
</html>