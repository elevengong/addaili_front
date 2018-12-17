@extends("frontend.pc.layout.layout")
@section("content")

    <div class="page-banner about-banner" style="background-image: url('{{url('/resources/views/frontend/pc/images/page-banner-5.jpg')}}')">
        <h5>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}</h5>

        <h6>更值得信赖的移动平台</h6>
    </div>

    <!--about-page-->

    <div class="page-6 kefu-page" style="background: url('{{url('/resources/views/frontend/pc/images/page-6.jpg')}}');">
        <h5 class="sj-head">联系<span>我们</span></h5>

        <h6 class="sm-head">Contact Us</h6>

        <div class="container">
            <div class="con">
                <div class="top">
                    <h6>客服QQ</h6>

                    <div class="row">

                        @foreach($qqGroup as $qq)
                        <div class="col-xl-2 col-lg-2 col-12 list">
                            <a href="http://wpa.qq.com/msgrd?v=1&amp;uin={{$qq['value']}}&amp;site={{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客服专员&amp;menu=yes" target="_blank"><i class="iconfont icon-qq"></i> {{$qq['value']}}</a>
                        </div>
                        @endforeach
                        @foreach($qqGroup as $qq)
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin={{$qq['value']}}&amp;site={{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客服专员&amp;menu=yes" target="_blank"><i class="iconfont icon-qq"></i> {{$qq['value']}}</a>
                            </div>
                        @endforeach
                        @foreach($qqGroup as $qq)
                            <div class="col-xl-2 col-lg-2 col-12 list">
                                <a href="http://wpa.qq.com/msgrd?v=1&amp;uin={{$qq['value']}}&amp;site={{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客服专员&amp;menu=yes" target="_blank"><i class="iconfont icon-qq"></i> {{$qq['value']}}</a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--kefu-page-->



        <script>
            $('.header-menu li').removeClass('active');
            $('.menu li').removeClass('active');
            $('.menu li:eq(5)').addClass('active');
            $('.header-menu li:eq(5)').addClass('active');
        </script>

@endsection