@extends("frontend.pc.layout.layout")
@section("content")
    <div class="page-banner" style="background-image: url('{{url('/resources/views/frontend/pc/images/page-banner-3.jpg')}}')">
    <h5>公告中心</h5>

    <h6>announcement</h6>
</div>
<!--page-banner-->

<div class="news-page news-detail">
    <div class="container">
        <div class="con-area">
            <div class="top">
                <h6>{{$message[0]['message_title']}}</h6>

                <p>发布日期：{{$message[0]['created_at']}}</p>
            </div>

            <div class="con-con">
                <span style="color: rgb(51, 51, 51); font-family: arial, Tahoma, Verdana; text-align: center; white-space: nowrap; background-color: rgb(246, 246, 246);">{{$message[0]['message_content']}}</span><br />                </div>

            <div class="foot">
                <p>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}</p>

                <p>{{$message[0]['created_at']}}</p>
            </div>
        </div>

        <div class="foot-page">
            <li>
                <span class="np">上一篇：</span>@if(!empty($messagePrv))<a href="/notice/{{$messagePrv[0]['msg_id']}}.html" title="{{$messagePrv[0]['message_title']}}">{{$messagePrv[0]['message_title']}}</a>@else 无 @endif</li>
            <li>
                <span class="np">上一篇：</span>@if(!empty($messageNext))<a href="/notice/{{$messageNext[0]['msg_id']}}.html" title="{{$messageNext[0]['message_title']}}">{{$messageNext[0]['message_title']}}</a>@else 无 @endif</li>
        </div>
    </div>
</div>
<!--news-page-->
    <script>
        $('.header-menu li').removeClass('active');
        $('.menu li').removeClass('active');
        $('.menu li:eq(2)').addClass('active');
        $('.header-menu li:eq(2)').addClass('active');
    </script>
@endsection