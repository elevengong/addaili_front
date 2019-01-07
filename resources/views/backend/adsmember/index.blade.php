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
                    <h5>{{$adsmemberTodaySpent}}<span>元</span></h5>
                    <p>今日消耗</p>
                </li>
                <li>
                    <h5>{{$yesterdaySpent}}<span>元</span></h5>
                    <p>昨日消耗</p>

                </li>
                <li>
                    <h5>{{$thisMonthTotalSpent}}<span>元</span></h5>
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
    <form method="post" action="/adsmember/service/index" name="form_search" id="form_index">
        {{csrf_field()}}
        <div class="curve">
            <div class="top">
                <h5 class="head-title">消耗曲线</h5>

                <div class="input">
                    <select class="select" id="ads_count_type" name="ads_count_type">
                        <option value="0">广告计费类型</option>
                        @foreach($adsCountTypeArray as $type)
                        <option value="{{$type['set_id']}}" @if($ads_count_type == $type['set_id'])selected="selected"@endif>{{$type['remark']}}</option>
                        @endforeach
                    </select>

                    <select class="select" id="cycle_time" name="cycle_time">
                        <option value="7" @if($cycle_time==7)selected="selected"@endif>最近7天</option>
                        <option value="15" @if($cycle_time==15)selected="selected"@endif>最近15天</option>
                    </select>
                    <input type="submit" value="查询" class="check check-h">
                </div>
            </div>

            {{--<div class="curve-area" id="container">--}}
            {{--</div>--}}
            <div class="curve-area" id="jlist_amount" style="height:350px;">
                <script src="<?php echo asset( "/resources/views/backend/js/echarts.min.js") ?>" type="text/javascript"></script>
                <script type="text/javascript">
                    //基于准备好的dom，初始化echarts实例
                    var myChart = echarts.init(document.getElementById('jlist_amount'));
                    //var chart_data = [{"date":"12-04","value":0},{"date":"12-05","value":0},{"date":"12-06","value":0},{"date":"12-07","value":0},{"date":"12-08","value":0},{"date":"12-09","value":0},{"date":"12-10","value":0}];
                    //alert(json_data);
                    var chart_data = {!! $recentDateJson !!};
                    var xAxis_data = [];
                    var series_data = [];
                    $.each(chart_data,function(index,row){
                        xAxis_data.push(row.date);
                        series_data.push(row.value);
                    });
                    // 指定图表的配置项和数据
                    var option = {
                        title: {
                            text: ''
                        },
                        tooltip: {
                            show : true,
                            trigger: 'axis'
                        },
                        xAxis: {
                            type : 'category',
                            boundaryGap : false,
                            data: xAxis_data
                        },
                        yAxis: {},
                        series: [{
                            name: '广告收入',
                            type: 'line',
                            smooth:true,
                            sampling: 'average',
                            itemStyle: {
                                normal: {
                                    color: '#43939F'
                                }
                            },
                            label: {
                                normal: {
                                    show: true,
                                    position: 'right',
                                    offset : [0,-20]
                                }
                            },
                            areaStyle: {
                                normal: {
                                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                                        offset: 0,
                                        color: '#D9EEF0'
                                    }, {
                                        offset: 1,
                                        color: '#43939F'
                                    }])
                                }
                            },
                            data: series_data
                        }]
                    };
                    // 使用刚指定的配置项和数据显示图表。
                    myChart.setOption(option);

                    window.onresize = function(){
                        myChart.resize();
                    };
                </script>

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