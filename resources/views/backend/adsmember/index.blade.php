@extends("backend.layout.adslayout")
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
                    <p>{{$adsmember}}（用户ID：{{$ads_id}}）</p>

                    <p>上次登录时间：{{$member['lastlogined_at']}}</p>

                    <p>账户总额：<span>{{isset($memberBalance[0]['balance'])?$memberBalance[0]['balance']:'Error!'}}</span></p>

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
                    <h5>{{$countAds}}</h5>
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

            {{--<div class="curve-area" id="container">--}}
            {{--</div>--}}
            <div class="curve-area" id="jlist_amount" style="height:350px;"></div>

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

    <script src="<?php echo asset( "/resources/views/backend/js/echarts.min.js") ?>" type="text/javascript"></script>
    <script>
        var dom = document.getElementById("jlist_amount");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['广告消耗']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['12-03','12-04','12-05','12-06','12-07','12-08','12-09']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'广告消耗',
                    type:'line',
                    stack: '总量',
                    itemStyle : {
                        normal : {
                            color:'#92b8ff',
                            lineStyle:{
                                color:'#92b8ff'
                            }
                        }
                    },
                    data:[0, 0, 0, 0, 0, 0, 0]
                }
            ]
        };
        ;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }

    </script>
    @endsection