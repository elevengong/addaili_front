@extends("backend.layout.layout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 > 管理首页</p>
    <!--position-->

    <div class="row-con">
        <div class="index-person-data">
            <h5 class="head-title">账户信息</h5>

            <div class="con">
                <figure><img src="{{url('/resources/views/backend/images/touxiang.png')}}" alt=""></figure>

                <div class="data" style="float:left;">
                    <p>2580@qq.com（用户ID：34129）</p>

                    <p>上次登录时间：2018-12-01 16:18:56</p>

                    <p>账户总额：<span>0.00</span></p>

                    <p>信用额度：<span>0</span></p>
                </div>
            </div>
        </div>
        <!--person-data-->

        <div class="index-income">
            <h5 class="head-title">消耗状况</h5>
            <ul>
                <li>
                    <h5>0.00<span>元</span></h5>
                    <p>今日消耗</p>
                </li>
                <li>
                    <h5>0.00<span>元</span></h5>
                    <p>昨日消耗</p>

                </li>
                <li>
                    <h5>0.00<span>元</span></h5>
                    <p>本月消耗</p>
                </li>
                <li>
                    <h5>0</h5>
                    <p>在投广告数</p>
                </li>
            </ul>
        </div>
        <!--income-->
    </div>
    <!--row-con-->
    <form id="form_index">
        <div class="curve">
            <div class="top">
                <h5 class="head-title">消耗曲线</h5>

                <div class="input">
                    <input type="hidden" value="2018-11-26" name="stime" id="stime" />
                    <input type="hidden" value="2018-12-02" name="etime" id="etime" />
                    <input type="hidden" name="response" value=""  />
                    <select name="mobile_advert_type_id" class="select" id="mobile_advert_type_id">
                        <option value="">广告类型</option>
                        <option value="1">横幅</option>
                        <option value="11">网摘</option>
                        <option value="13">横幅（微信）</option>
                        <option value="15">网摘（微信）</option>
                    </select>

                    <select class="select" id="cycle_time">
                        <option value="2018-12-02 - 2018-12-02"  >今天</option>
                        <option value="2018-12-01 - 2018-12-01"  >昨天</option>
                        <option value="2018-11-26 - 2018-12-02"  selected="selected">最近7天</option>
                        <option value="2018-11-18 - 2018-12-02"  >最近15天</option>
                    </select>
                </div>
            </div>

            <div class="curve-area" id="jlist_amount">
            </div>

            <p class="slide-tip">可左右滑动浏览</p>
        </div>
        <!--curve-->

        <div class="index-income-detail">
            <h5 class="head-title">消耗明细</h5>
            <div class="mb-table"><div id="income_data"></div>
            </div>

            <p class="slide-tip">可左右滑动浏览</p>

        </div>
        <!--index-income-detail-->

    </form>
    <div class="advertisers">
        <h5 class="head-title">优质广告主</h5>

        <div class="swiper-container" id="partner">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-01.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-02.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-03.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-04.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-05.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-06.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-07.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-08.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-09.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-10.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-11.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-12.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-13.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-14.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-15.jpg')}}" alt=""></div>
                <div class="swiper-slide"><img src="{{url('/resources/views/backend/images/tjggz-16.jpg')}}" alt=""></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <ul class="adver-list">
            <li><img src="{{url('/resources/views/backend/images/tjggz-01.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-02.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-03.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-04.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-05.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-06.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-07.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-08.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-09.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-10.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-11.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-12.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-13.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-14.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-15.jpg')}}" alt=""></li>
            <li><img src="{{url('/resources/views/backend/images/tjggz-16.jpg')}}" alt=""></li>
        </ul>
    </div>

    @endsection