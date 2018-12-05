
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>有盟移动管理后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/swiper.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/iconfont.css") ?>">
    <link rel="shortcut icon" href="<?php echo asset( "/resources/views/backend/images/bitbug_favicon.ico") ?>" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/mobliemenu.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/admin_2016.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/common.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/backend/css/all.css") ?>">
    <script language="javascript" type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/WdatePicker.js") ?>"></script>
    <script src="<?php echo asset( "/resources/views/backend/js/jquery-1.10.2.js") ?>" type="text/javascript"></script>
    <script src="<?php echo asset( "/resources/views/backend/js/jquery.ui.core.js") ?>" type="text/javascript"></script>
    <script src="<?php echo asset( "/resources/views/backend/js/jquery.ui.widget.js") ?>" type="text/javascript"></script>
    <script src="<?php echo asset( "/resources/views/backend/js/jquery.ui.datepicker.js") ?>" type="text/javascript"></script>
</head>
<body>
<!--mb-menu-->
<div id="mb-menu">
    <div class="menu-area">
        <a href="javascript:void(false);" class="menu-button"><i class="iconfont icon-msnui-menu"></i></a>

        <a href="/adsmember/service/index" class="logo"><img src="{{url('/resources/views/backend/images/logo.png')}}" alt=""></a>
    </div>

    <div class="menu-con">
        <ul class="mb-menu">
            <figure class="mb-logo"><img src="{{url('/resources/views/backend/images/logo.png')}}" alt=""></figure>

            <div class="service">
                <figure><img src="{{url('/resources/views/backend/images/kefu.jpg')}}" alt=""></figure>
                <a href="http://wpa.qq.com/msgrd?v=1&uin=918197512&site=有盟移动客服专员&menu=yes" target="_blank"><i class="iconfont icon-kefu"></i>我的客服：918197512</a>
            </div>
            <li class="active">
                <a href="/adsmember/service/index"><i class="iconfont icon-home"></i>管理首页</a>
            </li>
            <li >
                <a href="/adsmember/service/material"><i class="iconfont icon-shezhi"></i>素材包管理</a>
            </li>
            <li>
                <a href="/adsmember/service/material_update"><i class="iconfont icon-shezhi"></i>创意素材管理</a>
            </li>

            <li >
                <a href="/adsmember/ads/lists"><i class="iconfont icon-diannaodianqi"></i>广告管理</a>
            </li>
            <li >
                <a href="/adsmember/service/report"><i class="iconfont icon-baobiao"></i>数据报表</a>
            </li>
            <li >
                <a href="/adsmember/account/info"><i class="iconfont icon-iconset0178"></i>账户管理</a>
            </li>
            <li >
                <a href="/adsmember/message/lists"><i class="iconfont icon-xiaoxi"></i>消息中心</a>
            </li>
        </ul>

        <div id="user-area">
            <a href="#" class="user">
                <i class="iconfont icon-yonghu"></i>
                <div class="con">
                    <p>Hi!</p>

                    <p>{{$adsmember}}</p>
                </div>
            </a>
            <a href="/logout.html" class="out">退出</a>
        </div>

        <a href="javascript:void(false)" id="close-bt"><i class="iconfont icon-guanbi"></i></a>
    </div>
</div>
<!--mb-menu-->
<!--top-area-->
<div class="top-area">
    <figure class="logo"><img src="{{url('/resources/views/backend/images/logo.png')}}" alt=""></figure>

    <span class="name">管理后台</span>

    <div class="right">
        <a href="javascript:void(0);" class="user">
            <figure><img src="{{url('/resources/views/backend/images/touxiang.png')}}" alt=""></figure>

            <p>{{$adsmember}}</p>
        </a>

        <a href="/logout.html" class="out">退出</a>
    </div>
</div>
<!--top-area-->

<div class="body-area">
    <div class="left-area">
        <div class="service">
            <figure><img src="{{url('/resources/views/backend/images/kefu.jpg')}}" alt=""></figure>
            <a href="http://wpa.qq.com/msgrd?v=1&uin=918197512&site=有盟移动客服专员&menu=yes" target="_blank"><i class="iconfont icon-kefu"></i>我的客服：918197512</a>
        </div>

        <ul class="menu">
            <li class="active">
                <a href="/adsmember/service/index"><i class="iconfont icon-home"></i>管理首页</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>
            <li >
                <a href="/adsmember/service/material"><i class="iconfont icon-shezhi"></i>素材包管理</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>
            <li>
                <a href="/adsmember/service/material_update"><i class="iconfont icon-shezhi"></i>创意素材管理</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>

            <li >
                <a href="/adsmember/ads/lists"><i class="iconfont icon-diannaodianqi"></i>广告管理</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>
            <li >
                <a href="/adsmember/service/report"><i class="iconfont icon-baobiao"></i>数据报表</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>
            <li >
                <a href="/adsmember/account/info"><i class="iconfont icon-iconset0178"></i>账户管理</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>
            <li >
                <a href="/adsmember/message/lists"><i class="iconfont icon-xiaoxi"></i>消息中心</a>

                <span class="iconfont icon-sanjiaoxing"></span>

            </li>
        </ul>
    </div>
    <!--left-area-->
    <div class="ddd ddd-dd"></div>
    @yield('content')
    <div class="copy">
        <p>©2018 17un.com 版权所有 粤ICP备11080449号-17 <br> 服务热线：400-700-2276 我的客服：<a target="_blank" href="http://wpa.qq.com/msgrd?v=1&uin=918197512&site=有盟客服专员&menu=yes">QQ:918197512</a></p>
    </div>
</div>
    <!--right-area-->
</div>
<!--body-area-->


</body>
</html>