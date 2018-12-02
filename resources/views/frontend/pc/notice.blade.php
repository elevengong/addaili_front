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
                <h6>有盟18年1月29日-18年2月4日的媒体佣金已支付，预计到账时间为1-2个工作日，请各网站主查收核实</h6>

                <p>发布日期：2018-02-08</p>
            </div>

            <div class="con-con">
                <span style="color: rgb(51, 51, 51); font-family: arial, Tahoma, Verdana; text-align: center; white-space: nowrap; background-color: rgb(246, 246, 246);">有盟18年1月29日-18年2月4日的媒体佣金已支付，预计到账时间为1-2个工作日，请各网站主查收核实</span><br />                </div>

            <div class="foot">
                <p>有盟网络</p>

                <p>2018-02-08</p>
            </div>
        </div>

        <div class="foot-page">
            <li>
                <span class="np">上一篇：</span><a href="http://www.17un.com/notice/1837.html" title="有盟18年1月22日-18年1月28日的媒体佣金已支付，预计到账时间为1-2个工作日，请各网站主查收核实">有盟18年1月22日-18年1月28日的媒体佣金已支付，预计到账时间为1-2个工作日，请各网站主查收核实 </a>				</li>
            <li>
                <span class="np">上一篇：</span><a href="http://www.17un.com/notice/1845.html" title="有盟网络2018年春节放假相关公告">有盟网络2018年春节放假相关公告 </a>                </li>
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