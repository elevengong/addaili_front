<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}-移动广告营销平台</title>
    <meta name="keywords" content="{{isset($commonSetting['keywords'])?$commonSetting['keywords']:''}}">
    <meta name="description" content="{{isset($commonSetting['description'])?$commonSetting['description']:''}}">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/swiper.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/iconfont.css") ?>">
    <link rel="shortcut icon" href="<?php echo asset( "/resources/views/frontend/pc/images/bitbug_favicon.ico") ?>" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/mobliemenu.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/pc/css/jquery.fullpage.min.css") ?>" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/all.css?ver=1.0") ?>">
    <script src="<?php echo asset( "/resources/views/frontend/pc/js/jquery-1.12.4.min.js") ?>"></script>
</head>
<body>
<div class="header">
    <div class="head">
        <div class="menu-button"><i class="iconfont icon-msnui-menu"></i></div>
        <a href="/" class="mb-logo"><img src="{{url('/resources/views/frontend/pc/images/mb-logo.png')}}" alt=""></a>
        <a href="/login.html" class="online-ex"><i class="fa fa-desktop"></i>登录</a>
    </div>
    <ul class="header-menu">
        <li class="active"><a href="/index.html">首页</a></li>
        <li ><a href="/advance.html">产品优势</a></li>
        <li ><a href="/lists_notice.html">公告中心</a></li>
        <li ><a href="/help.html">帮助中心</a></li>
        <li ><a href="/about.html">关于我们</a></li>
        <li ><a href="/contact.html">联系我们</a></li>
    </ul>
</div>
<div class="mb-bg"></div>
<div class="top-area">
    <a href="/" class="logo"><img src="{{url('/resources/views/frontend/pc/images/logo.png')}}" alt=""></a>
    <ul class="menu">
        <li class="active"><a href="/index.html">首页</a></li>
        <li ><a href="/advance.html">产品优势</a></li>
        <li ><a href="/lists_notice.html">公告中心</a></li>
        <li ><a href="/help.html">帮助中心</a></li>
        <li ><a href="/about.html">关于我们</a></li>
        <li ><a href="/contact.html">联系我们</a></li>
    </ul>
    <ul class="login-area">
        <li>&nbsp;</li>
        <li><a href="/login.html" class="login">登录</a></li>
        <li><a href="/register.html" class="register">注册</a></li>
    </ul>
</div>
@yield('content')
<p class="alone-copy">©2018 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}} 版权所有    <a href="http://www.miitbeian.gov.cn" target="_blank" style="color:white">{{isset($commonSetting['icp'])?$commonSetting['icp']:''}}</a> 服务热线：{{isset($commonSetting['contact_number'])?$commonSetting['contact_number']:''}}</p>
<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="<?php echo asset( "/resources/views/frontend/pc/js/tether.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/bootstrap.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/jqthumb.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/swiper.jquery.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/frontend/pc/js/scrolloverflow.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/frontend/pc/js/jquery.fullpage.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/mobliemenu.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/all.js") ?>"></script>
</body>
</html>