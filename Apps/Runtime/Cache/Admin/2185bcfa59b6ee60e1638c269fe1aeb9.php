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
            var editor1 = K.create('textarea[name="technical_skill"]', {
                width: '900px',
                height: '220px',
                allowFileManager : false,
                allowFlashUpload:true,
                uploadJson : '<?php echo U('Public/editupload');?>'
        });
        var editor2 = K.create('textarea[name="work_experience"]', {
            width: '900px',
            height: '220px',
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
        <a>
            <em>简历修改</em>
        </a>
    </div>
</div>

<form action="<?php echo U('edit');?>" method="post">

    <div class="pad_lr_10">
        <div class="col_tab">
            <ul class="J_tabs tab_but cu_li">
                <li class="current">基本信息</li>
            </ul>
            <div class="J_panes">
                <div class="content_list pad_10">
                    <table width="100%" cellspacing="0" class="table_form" >

                        <tr>
                            <th><font color="red">*</font> 姓名 :</th>
                            <td>
                                <input type="text" name="name" class="input-text" size="20" value="<?php echo ($info['name']); ?>">
                            </td>
                            <th><font color="red">*</font> 出生日期 :</th>
                            <td>
                                <input type="text" name="birthday" class="input-text" size="20" value="<?php echo ($info['birthday']); ?>">
                                <span style="color:#ccc;">格式：1989-09-15</span>
                            </td>
                        </tr>

                        <tr>
                            <th><font color="red">*</font> 性别 :</th>
                            <td>
                                <label><input type="radio" name="sex" value="1" <?php echo $info['sex']==1?"checked='checked'":''?>/>男</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="sex" value="0" <?php echo $info['sex']==0?"checked='checked'":''?>/>女</label>
                            </td>
                            <th><font color="red">*</font>民族 :</th>
                            <td>
                                <input type="text" name="nation" class="input-text" size="20" value="<?php echo ($info['nation']); ?>">
                            </td>
                        </tr>

                        <tr>
                            <th><font color="red">*</font> 学历 :</th>
                            <td>
                                <input type="text" name="xueli" class="input-text" size="20" value="<?php echo ($info['xueli']); ?>">
                            </td>
                            <th><font color="red">*</font> 籍贯 :</th>
                            <td>
                                <input type="text" name="native" class="input-text" size="20" value="<?php echo ($info['native']); ?>">
                            </td>

                        <tr>
                            <th><font color="red">*</font> 专业 :</th>
                            <td>
                                <input type="text" name="specialty" class="input-text" size="20" value="<?php echo ($info['specialty']); ?>">
                            </td>
                            <th><font color="red">*</font> 毕业院校 :</th>
                            <td>
                                <input type="text" name="school" class="input-text" size="20" value="<?php echo ($info['school']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font> Tel :</th>
                            <td>
                                <input type="text" name="tel" class="input-text" size="20" value="<?php echo ($info['tel']); ?>">
                                <span style="color:#ccc;">联系电话</span>
                            </td>
                            <th><font color="red">*</font> E-mail :</th>
                            <td>
                                <input type="text" name="email" class="input-text" size="20" value="<?php echo ($info['email']); ?>">
                                <span style="color:#ccc;">邮箱格式</span>
                            </td>
                        </tr>

                        <tr >
                            <th><font color="red">*</font> 教育背景 :</th>
                            <td colspan="4">
                                <input type="text" name="education" class="input-text" size="100" value="<?php echo ($info['education']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font> 求职意向 :</th>
                            <td colspan="4">
                                <input type="text" name="job" class="input-text" size="100" value="<?php echo ($info['job']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font>开发工具 :</th>
                            <td colspan="4">
                                <input type="text" name="tools" class="input-text" size="100" value="<?php echo ($info['tools']); ?>">

                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font> 技术鉴定 :</th>
                            <td colspan="4">
                                <input type="text" name="technical" class="input-text" size="100" value="<?php echo ($info['technical']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font> 兴趣爱好 :</th>
                            <td colspan="4">
                                <input type="text" name="interest" class="input-text" size="100" value="<?php echo ($info['interest']); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font> 专业技能 :</th>
                            <td colspan="4">
                                <textarea  name="technical_skill" ><?php echo ($info['technical_skill']); ?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <th><font color="red">*</font> 工作经历 :</th>
                            <td colspan="4">
                                <textarea  name="work_experience" ><?php echo ($info['work_experience']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><font color="red">*</font>自我评价 :</th>
                            <td colspan="4">
                                <textarea name='self_assessment' style="width: 890px; height: 65px;" title="留空则自动截取内容前140个字符"><?php echo ($info['self_assessment']); ?></textarea>
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