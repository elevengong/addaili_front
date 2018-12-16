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
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/all.css") ?>">
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
        <li>&nbsp;</li>
        <li><a href="/login.html" class="login">登录</a></li>
        <li><a href="/register.html" class="register">注册</a></li>
    </ul>
</div>
    <div id="fullpage">
        <div class="section page-1">
            <div class="swiper-container" id="index-banner">
                <div class="swiper-wrapper" style="transition-duration: 0ms;"><div class="swiper-slide img-fluid slide-4 swiper-slide-duplicate swiper-no-swiping swiper-slide-prev" style="background-image: url('{{url('/resources/views/frontend/pc/images/index-banner-4.jpg')}}'); background-position: 50% 100%; width: 1920px; transition-duration: 0ms; opacity: 1; transform: translate3d(0px, 0px, 0px);" data-swiper-slide-index="3">
                        <h5>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}<span>广告主、媒介主</span>管理后台小程序正式上线</h5>
                        <h6>无需下载APP打开微信即可操作</h6>
                        <figure class="img-1">
                            <img src="{{url('/resources/views/frontend/pc/images/index-banner-4-1.png')}}" alt="">
                        </figure>
                        <figure class="img-2">
                            <img src="{{url('/resources/views/frontend/pc/images/index-banner-4-2.png')}}" alt="">
                        </figure>
                    </div>
                    <div class="swiper-slide img-fluid slide-1 swiper-no-swiping swiper-slide-active" style="background-image: url('{{url('/resources/views/frontend/pc/images/index-banner-1.jpg')}}'); background-position: 50% 100%; width: 1920px; transition-duration: 0ms; opacity: 1; transform: translate3d(-1920px, 0px, 0px);" data-swiper-slide-index="0">
                        <h5>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}网络汇聚移动广告创新力量</h5>
                        <h6>提供专业优质的无线营销整合服务</h6>
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/index-banner-1-img.png')}}" alt=""> </figure>
                    </div>
                    <div class="swiper-slide img-fluid slide-2 swiper-no-swiping swiper-slide-next" style="background-image: url('{{url('/resources/views/frontend/pc/images/index-banner-2.jpg')}}'); background-position: 50% 50%; width: 1920px; transition-duration: 0ms; opacity: 0; transform: translate3d(-3840px, 0px, 0px);" data-swiper-slide-index="1">
                        <h5>高效的推广形式、更大化的广告效果</h5>
                        <h6>网站主更信赖的<span>流量变现专家</span></h6>
                        <h6>广告主更亲睐的<span>品牌营销平台</span></h6>
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/index-banner-2-img.png')}}" alt=""> </figure>
                    </div>
                    <div class="swiper-slide img-fluid slide-3 swiper-no-swiping" style="background-image: url('{{url('/resources/views/frontend/pc/images/index-banner-3.jpg')}}'); background-position: 50% 100%; width: 1920px; transition-duration: 0ms; opacity: 0; transform: translate3d(-5760px, 0px, 0px);" data-swiper-slide-index="2">
                        <h5>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}数据</h5>
                        <h6>拥有<span>3万多个</span>广告主及媒介主</h6>
                        <h6>日曝光PV量<span>10亿+</span>次</h6>
                        <h6>覆盖多至<span>3.6亿</span>智能手机用户</h6>
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/index-banner-3-img.png')}}" alt=""> </figure>
                    </div>
                    <div class="swiper-slide img-fluid slide-1 swiper-slide-duplicate swiper-no-swiping swiper-slide-duplicate-active" style="background-image: url('{{url('/resources/views/frontend/pc/images/index-banner-1.jpg')}}'); background-position: 50% 100%; width: 1920px; transition-duration: 0ms; opacity: 0; transform: translate3d(-9600px, 0px, 0px);" data-swiper-slide-index="0">
                        <h5>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}网络汇聚移动广告创新力量</h5>
                        <h6>提供专业优质的无线营销整合服务</h6>
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/index-banner-1-img.png')}}" alt=""> </figure>
                    </div></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"><i class="iconfont icon-fanhui"></i></div>
                <div class="swiper-button-next"><i class="iconfont icon-gengduo"></i></div>
            </div>
            <span class="f-page">01</span> </div>
        <div class="section page-2" style="background: url('{{url('/resources/views/frontend/pc/images/page-2.jpg')}}');">
            <h5 class="sj-head">产品<span>优势</span></h5>
            <h6 class="sm-head">Product Advantage</h6>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-6 list">
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/flip01.jpg')}}" alt=""> </figure>
                        <p>覆盖全国海量用户</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6 list">
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/flip02.jpg')}}" alt=""> </figure>
                        <p>多重广告解决方案</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6 list">
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/flip03.jpg')}}" alt=""> </figure>
                        <p>广告资源丰富</p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-6 list">
                        <figure> <img src="{{url('/resources/views/frontend/pc/images/flip04.jpg')}}" alt=""> </figure>
                        <p>精准定位到用户行为投放</p>
                    </div>
                </div>
                <a href="http://www.17un.com/advert.html" class="more">了解更多</a> </div>
            <span class="f-page">02</span> </div>
        <div class="section page-3" style="background: url('{{url('/resources/views/frontend/pc/images/page-3.jpg')}}');">
            <h5 class="sj-head">广告<span>形式</span></h5>

            <h6 class="sm-head">Advertising Type</h6>

            <div class="container">
                <div class="swiper-container" id="type-left">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-no-swiping">
                            <div class="con">
                                <h6>固定位广告</h6>

                                <p>固定位广告以固定形式显示在网页相应的广告位，使用图片、图文等形式来表现广告创意，吸引用户眼球，是一种主流的广告形式。极大的提高了用户在浏览网页时对广告的关注度，大大提升广告效果。</p>
                            </div>
                        </div>

                        <div class="swiper-slide swiper-no-swiping">
                            <div class="con">
                                <h6>插屏广告</h6>

                                <p>插屏广告是以图片的形式在应用操作暂停或结束时半屏弹出广告创意，能充分利用用户等待的时间，提升广告效果。</p>
                            </div>
                        </div>

                        <div class="swiper-slide swiper-no-swiping">
                            <div class="con">
                                <h6>横幅广告</h6>

                                <p>横幅广告也称Banner广告，将精彩的广告创意以图片的形式展现在手机页面底部，广告尺寸与网页高度融合，创意展现效果好，大大提高用户关注度。</p>
                            </div>
                        </div>

                        <div class="swiper-slide swiper-no-swiping">
                            <div class="con">
                                <h6>信息流广告</h6>

                                <p>信息流广告是指一种依据社交群体属性对用户喜好和特点进行智能推广的广告形式。其主要展现形式是穿插在信息之中。</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="swiper-container" id="type-banner">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide img-fluid slide-1 swiper-no-swiping" id="slide-1">
                            <figure>
                                <img src="{{url('/resources/views/frontend/pc/images/type-1.jpg')}}" alt="">
                            </figure>
                        </div>

                        <div class="swiper-slide img-fluid slide-2 swiper-no-swiping" id="slide-2">
                            <figure>
                                <img src="{{url('/resources/views/frontend/pc/images/type-2.jpg')}}" alt="">
                            </figure>
                        </div>

                        <div class="swiper-slide img-fluid slide-3 swiper-no-swiping" id="slide-3">
                            <figure>
                                <img src="{{url('/resources/views/frontend/pc/images/type-3.jpg')}}" alt="">
                            </figure>
                        </div>

                        <div class="swiper-slide img-fluid slide-4 swiper-no-swiping" id="slide-4">
                            <figure>
                                <img src="{{url('/resources/views/frontend/pc/images/type-4.jpg')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination ts-nav"></div>

                <div class="swiper-button-prev ts-prev"><i class="iconfont icon-fanhui"></i></div>
                <div class="swiper-button-next ts-next"><i class="iconfont icon-gengduo"></i></div>
            </div>

            <span class="f-page">03</span>
        </div>

        <div class="section page-4">
            <h5 class="sj-head">公告<span>中心</span></h5>
            <h6 class="sm-head">Announcement</h6>
            <div class="en-font">NEWS</div>
            <figure><img src="{{url('/resources/views/frontend/pc/images/news-cf.jpg')}}" alt=""></figure>
            <div class="left-con">
                <h6 class="page-head">{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}} <br>
                    <span>最新动态</span></h6>
                <div class="border"></div>
                <p>关注最新的动态，了解最新的公告，对{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}消息一网打尽。</p>
                <div class="line"></div>
            </div>
            <ul class="news-list">
                @foreach($lastThreeMessageArray as $message)
                <li>
                    <a href="/notice/{{$message['msg_id']}}.html">
                        <h6>{{$message['message_title']}}</h6>
                        <h5>{{mb_substr($message['message_content'] , 0 , 40)}}...</h5>
                        <span>{{$message['created_at']}}</span>
                    </a>
                </li>
                @endforeach

            </ul>
            <a href="/lists_notice" class="more">了解更多</a> <span class="f-page">04</span> </div>
        <div class="section page-5" style="background: url('{{url('/resources/views/frontend/pc/images/page-5.jpg')}}');">
            <h5 class="sj-head">关于<span>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}</span></h5>
            <h6 class="sm-head">About</h6>
            <div class="container">
                <p class="jj">{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}，整合了智能手机领域大量优质媒体及广告资源，构建起一个公平、诚信、高效的广告营销服务平台，为广告主提供精准，高效的产品、品牌推广服务，同时为媒介主创造丰厚的广告收益。</p>
                <h6 class="title">{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}合作伙伴</h6>
                <ul class="co-list">
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-01.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-02.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-03.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-04.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-05.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-06.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-07.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-08.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-09.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-10.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-11.jpg')}}" alt=""></figure>
                    </li>
                    <li>
                        <figure><img src="{{url('/resources/views/frontend/pc/images/client-12.jpg')}}" alt=""></figure>
                    </li>
                </ul>
                <div class="swiper-container" id="index-partner">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-01.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-02.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-03.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-04.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-05.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-06.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-07.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-08.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-09.jpg')}}" alt=""> </div>
                        </div>
                        <div class="swiper-slide">
                            <div> <img src="{{url('/resources/views/frontend/pc/images/client-10.jpg')}}" alt=""> </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
                <!--index-partner-->

                <a href="" class="more">了解更多</a> </div>
            <span class="f-page">05</span> </div>
        <div class="section page-6" style="background: url('{{url('/resources/views/frontend/pc/images/page-6.jpg')}}');">
            <h5 class="sj-head">客服<span>中心</span></h5>
            <h6 class="sm-head">Customer Service</h6>
            <div class="container">
                <div class="con">
                    <div class="top">
                        <h6>媒体合作</h6>
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2810047601&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小叶 <i class="iconfont icon-qq"></i> 2810047601</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=3492914467&amp;site=有盟客服专员&amp;menu=yes" target="_blank">老三 <i class="iconfont icon-qq"></i> 3492914467</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2915651606&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小赵 <i class="iconfont icon-qq"></i> 2915651606</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2461456393&amp;site=有盟客服专员&amp;menu=yes" target="_blank">心水 <i class="iconfont icon-qq"></i> 2461456393</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1151964031&amp;site=有盟客服专员&amp;menu=yes" target="_blank">五个六斋 <i class="iconfont icon-qq"></i> 1151964031</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=3512119390&amp;site=有盟客服专员&amp;menu=yes" target="_blank">阿健 <i class="iconfont icon-qq"></i> 3512119390</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=632379257&amp;site=有盟客服专员&amp;menu=yes" target="_blank">老许 <i class="iconfont icon-qq"></i> 632379257</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=3072386917&amp;site=有盟客服专员&amp;menu=yes" target="_blank">冰冰 <i class="iconfont icon-qq"></i> 3072386917</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=837121505&amp;site=有盟客服专员&amp;menu=yes" target="_blank">收益 <i class="iconfont icon-qq"></i> 837121505</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1906780702&amp;site=有盟客服专员&amp;menu=yes" target="_blank">指尖 <i class="iconfont icon-qq"></i> 1906780702</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2725431255&amp;site=有盟客服专员&amp;menu=yes" target="_blank">大拇哥儿 <i class="iconfont icon-qq"></i> 2725431255</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=3409155061&amp;site=有盟客服专员&amp;menu=yes" target="_blank">凯凯 <i class="iconfont icon-qq"></i> 3409155061</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2148283340&amp;site=有盟客服专员&amp;menu=yes" target="_blank">国鹏 <i class="iconfont icon-qq"></i> 2148283340</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1723846115&amp;site=有盟客服专员&amp;menu=yes" target="_blank">丁丁 <i class="iconfont icon-qq"></i> 1723846115</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=3454244726&amp;site=有盟客服专员&amp;menu=yes" target="_blank">提莫 <i class="iconfont icon-qq"></i> 3454244726</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1736868188&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小陈 <i class="iconfont icon-qq"></i> 1736868188</a>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2269488774&amp;site=有盟客服专员&amp;menu=yes" target="_blank">啊俊 <i class="iconfont icon-qq"></i> 2269488774</a>
                            </div>
                        </div>
                    </div>
                    <div class="top">
                        <h6>商务合作</h6>
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1841656220&amp;site=有盟客服专员&amp;menu=yes" target="_blank">啊鹏 <i class="iconfont icon-qq"></i> 1841656220</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657064&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小陈 <i class="iconfont icon-qq"></i> 2355657064</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=3125142228&amp;site=有盟客服专员&amp;menu=yes" target="_blank">文臻 <i class="iconfont icon-qq"></i> 3125142228</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657063&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小盟 <i class="iconfont icon-qq"></i> 2355657063</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1993298108&amp;site=有盟客服专员&amp;menu=yes" target="_blank">姣姣 <i class="iconfont icon-qq"></i> 1993298108</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1622659581&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小元 <i class="iconfont icon-qq"></i> 1622659581</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=918197512&amp;site=有盟客服专员&amp;menu=yes" target="_blank">晓晓 <i class="iconfont icon-qq"></i> 918197512</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2996235585&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小娴 <i class="iconfont icon-qq"></i> 2996235585</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=1482353318&amp;site=有盟客服专员&amp;menu=yes" target="_blank">子翔 <i class="iconfont icon-qq"></i> 1482353318</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=869168049&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小景 <i class="iconfont icon-qq"></i> 869168049</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657056&amp;site=有盟客服专员&amp;menu=yes" target="_blank">谭谭 <i class="iconfont icon-qq"></i> 2355657056</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657053&amp;site=有盟客服专员&amp;menu=yes" target="_blank">晓胜 <i class="iconfont icon-qq"></i> 2355657053</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657048&amp;site=有盟客服专员&amp;menu=yes" target="_blank">linda <i class="iconfont icon-qq"></i> 2355657048</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=647998129&amp;site=有盟客服专员&amp;menu=yes" target="_blank">小仪 <i class="iconfont icon-qq"></i> 647998129</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=446254641&amp;site=有盟客服专员&amp;menu=yes" target="_blank">认真的人 <i class="iconfont icon-qq"></i> 446254641</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657057&amp;site=有盟客服专员&amp;menu=yes" target="_blank">笑笑 <i class="iconfont icon-qq"></i> 2355657057</a> </div>
                            <div class="col-xl-2 col-lg-2 col-12 list"> <a href="http://wpa.qq.com/msgrd?v=1&amp;uin=2355657055&amp;site=有盟客服专员&amp;menu=yes" target="_blank">静静 <i class="iconfont icon-qq"></i> 2355657055</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="f-page">06</span> </div>
        <div class="section page-7" style="background: url('{{url('/resources/views/frontend/pc/images/page-7.jpg')}}');">
            <h5 class="sj-head">联系<span>我们</span></h5>
            <h6 class="sm-head">Customer Service</h6>
            <div class="con">
                <figure class="map"><img src="{{url('/resources/views/frontend/pc/images/about-img.jpg')}}" alt=""></figure>
                <div class="line"></div>
            </div>
            <div class="detail">
                <p>免费热线：{{isset($commonSetting['contact_number'])?$commonSetting['contact_number']:''}} <br>
                    投诉建议：{{isset($commonSetting['contact_email'])?$commonSetting['contact_email']:''}}</p>
            </div>
            <p class="copy">&copy;2018 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}} 版权所有    <a href="http://www.miitbeian.gov.cn" target="_blank" style="color:white">{{isset($commonSetting['icp'])?$commonSetting['icp']:''}}</a> 服务热线：{{isset($commonSetting['contact_number'])?$commonSetting['contact_number']:''}} </p>
            <span class="f-page">07</span> </div>
    </div>
        <script src="<?php echo asset( "/resources/views/frontend/pc/js/jquery-1.12.4.min.js") ?>"></script>
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
