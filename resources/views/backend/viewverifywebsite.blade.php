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

    <title>审核网站</title>
    <meta name="keywords" content="审核网站">
    <meta name="description" content="审核网站">
</head>
<body>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/jquery.min.1.9.1.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/My97DatePicker/4.8/WdatePicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/layer/layer.js") ?>"></script>

<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/website.js?ver=1.1"); ?>"></script>
<div id="frm_account" class="col-xs-12" style="text-align: center;">
    <form class="form form-horizontal" id="form1">
        {{csrf_field()}}
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">站长：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$WebsiteDetail[0]['name']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">网站名：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$WebsiteDetail[0]['web_name']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">网址：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                <a href="{{$WebsiteDetail[0]['web_url']}}" target="_blank">{{$WebsiteDetail[0]['web_url']}}</a>
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">网站类型：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$WebsiteDetail[0]['webtype']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">允许广告类型：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$WebsiteDetail[0]['allow_ads_type']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">允许广告计费类型：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$WebsiteDetail[0]['allow_ads_count']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">申请时间：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$WebsiteDetail[0]['created_at']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3" style="color: red;">网站状态*：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="status" style="float:left;" id="status">
                    <option value="0" selected="selected">等待审核</option>
                    <option value="1">通过审核</option>
                    <option value="2" >审核不通过</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 row cl" style="text-align: center;">
            <div class="formControls col-xs-12 col-sm-12">
                <input type="button" onclick="updatewebsitestatus({{$WebsiteDetail[0]['web_id']}})" class="btn btn-primary" value="审核网站" id="btn_add_ok" />
            </div>
        </div>

    </form>
</div>

<script>


</script>



</body>
</html>
