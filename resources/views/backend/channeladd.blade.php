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

    <title>添加静态属性</title>
    <meta name="keywords" content="添加广告渠道">
    <meta name="description" content="添加广告渠道">
</head>
<body>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/jquery.min.1.9.1.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/My97DatePicker/4.8/WdatePicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/layer/layer.js") ?>"></script>

<div id="frm_account" class="col-xs-12" style="text-align: center;">
    <form class="form form-horizontal" id="form1">
        {{csrf_field()}}
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告渠道名：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="ads_name" name="ads_name" />
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告链接：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="ads_link" name="ads_link" />
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告计费方式：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="ads_count_type" style="float:left;" id="ads_count_type">
                    <option value="1" selected="selected">CPV</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">PC/手机：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="ismobile" style="float:left;" id="ismobile">
                    <option value="0">PC</option>
                    <option value="1" selected="selected">手机</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告类型：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="ads_type" style="float:left;" id="ads_type">
                    <option value="1" selected="selected">横幅</option>
                    <option value="2">竖幅</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告图片：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="button" value="上传图片" onclick="photo1.click()" style="float:left;margin-top:10px;" class="btn_mouseout"/>
                <p><input type="file" id="photo1" name="photo1" onchange="upload(this);" style="display:none" /></p>
                <div id="show" style="float:left;padding-left:7px;"></div>
                <input type="hidden" id="ads_photo" name="ads_photo" value="">
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告金额：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="ads_balance" name="ads_balance" />
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告单价：</label>
            <div class="col-xs-9 col-sm-9">
                <input type="text" class="input-text" value="" id="ads_per_cost" name="ads_per_cost" />
            </div>
        </div>



        <div class="col-xs-12 row cl" style="text-align: center;">
            <div class="formControls col-xs-12 col-sm-12">
                <input type="button" onclick="channeladd();" class="btn btn-primary" value="添加广告渠道" id="btn_add_ok" />
            </div>
        </div>

    </form>
</div>

<script>
    function channeladd() {
        $.ajax({
            type:"post",
            url:"/backend/ads/channeladd",
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




    function upload(obj){
        var id = $(obj).attr("id");
        var animateimg = $(obj).val();//获取上传的图片名 带//
        var imgarr=animateimg.split('\\'); //分割
        var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
        var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
        var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

        var file = $(obj).get(0).files[0]; //获取上传的文件
        var fileSize = file.size;           //获取上传的文件大小
        var maxSize = 1048576;              //最大1MB
        if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
            layer.msg('文件类型错误,请上传图片类型');
            return false;
        }else if(parseInt(fileSize) >= parseInt(maxSize)){
            layer.msg('上传的文件不能超过1MB');
            return false;
        }else{
            var data = new FormData($('#form1')[0]);

            $.ajax({
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                url: "/backend/uploadphoto/"+id,
                type: 'POST',
                data: data,
                //data:{'data':data, 'id':id},
                dataType: 'JSON',
                cache: false,
                processData: false,
                contentType: false,
                success:function(data){
                    if(data.status == 0)
                    {
                        layer.msg( data.msg );

                    }else{
                        //window.location.reload();
                        var result = '<img id="img" src="'+data.pic+'" width="80">';
                        $('#show').html(result);
                        $('#ads_photo').val(data.pic);

                    }

                },
                error:function (data) {
                    layer.msg(data.msg);

                }
            });
            return false;
        }
    }
</script>



</body>
</html>
