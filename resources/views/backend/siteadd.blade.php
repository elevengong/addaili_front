<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link href="<?php echo asset( "/resources/views/backend/static/h-ui/css/H-ui.min.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/h-ui.admin/css/H-ui.login.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/h-ui.admin/css/style.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/Hui-iconfont/1.0.8/iconfont.css") ?>" rel="stylesheet" type="text/css" />

    <title>添加网站</title>
    <meta name="keywords" content="添加网站">
    <meta name="description" content="添加网站">
</head>
<body>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/jquery.min.1.9.1.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/My97DatePicker/4.8/WdatePicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/layer/layer.js") ?>"></script>

<div id="frm_account" class="col-xs-12" style="text-align: center;">
    <form class="form form-horizontal" id="form1">
        {{csrf_field()}}
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">网站名：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="web_name" name="web_name" />
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">网址：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="web_url" name="web_url" />
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">网站类型：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="webtype" style="float:left;" id="webtype">
                    <option value="1" selected="selected">普通站</option>
                    <option value="0">视频站</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 row cl" style="text-align: center;">
            <div class="formControls col-xs-12 col-sm-12">
                <input type="button" onclick="siteadd();" class="btn btn-primary" value="添加网站" id="btn_add_ok" />
            </div>
        </div>

    </form>
</div>

<script>
    function siteadd() {
        $.ajax({
            type:"post",
            url:"/backend/website/siteadd",
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:$("#form1").serialize(),
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );
                }else{
                    layer.msg( data.msg ,function () {
                        window.parent.location.reload();
                        window.location.close();
                    });
                }
            },
            error:function (data) {
                layer.msg(data.msg);
            }
        });
    }

</script>



</body>
</html>
