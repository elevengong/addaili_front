<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>有盟移动-移动广告营销平台</title>
    <meta name="keywords" content="有盟,有盟移动,手机广告,手机应用推广,手机广告平台,APP推广,移动广告平台,移动营销平台,移动互联网广告,移动广告联盟">
    <meta name="description" content="有盟移动是智能化的移动广告交易平台，通过与手机应用APP、DSP平台以及广告交易平台合作，能使广告主的投放效果得到显著提升、开发者降低广告管理成本并大幅提升广告收入。">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/swiper.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/iconfont.css") ?>">
    <link rel="shortcut icon" href="<?php echo asset( "/resources/views/frontend/pc/images/bitbug_favicon.ico") ?>" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/mobliemenu.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo asset( "/resources/views/frontend/pc/css/jquery.fullpage.min.css") ?>" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/all.css") ?>">
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
    </ul>
    <ul class="login-area">
        <li>400-700-2276</li>
        <li><a href="/login.html" class="login">登录</a></li>
        <li><a href="/register.html" class="register">注册</a></li>
    </ul>
</div>
@yield('content')
<p class="alone-copy">©2017 17un.com  有盟网络 版权所有    <a href="http://www.miitbeian.gov.cn" target="_blank" style="color:white">粤ICP备11080449号-17</a> 服务热线：400-700-2276</p>
<!-- jQuery first, then Tether, then Bootstrap JS. -->

<script src="<?php echo asset( "/resources/views/frontend/pc/js/tether.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/bootstrap.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/qthumb.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/swiper.jquery.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/frontend/pc/js/scrolloverflow.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/frontend/pc/js/jquery.fullpage.min.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/mobliemenu.js") ?>"></script>
<script src="<?php echo asset( "/resources/views/frontend/pc/js/all.js") ?>"></script>
</body>
</html>