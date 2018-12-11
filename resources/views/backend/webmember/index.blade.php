@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 管理首页</p>
        <!--position-->

        <div class="index-news">
            <a href="#">
                <p>最新消息： 通知！</p>
                <span>2018-12-05 19:36</span>
            </a>
        </div>
        <!--index-news-->

        <div class="row-con">
            <div class="index-person-data">
                <h5 class="head-title">账户信息</h5>
                <div class="con">
                    <figure><img src="{{url('/resources/views/backend/images/touxiang.png')}}" alt=""></figure>
                    <div class="data"><p>{{$webmember}}</p><p>上次登录时间：{{$webmaster['lastlogined_at']}}</p>
                    </div>
                </div>
                <!--person-data-->
                <div class="link-rule">
                    <a href="javascript:void(false);" data-toggle="modal" data-target="#exampleModal">获取推广链接</a>

                    <a href="javascript:void(false);" data-toggle="modal" data-target="#exampleModal-2">查看推广规则</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">您的专属推广链接</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <span id="url">http://www.17un.com/vip/667?token=WGNTYVI4UjQBb1IwXWQEZQ==</span>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">复制代码</button>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel-2">媒介主发展下线规则</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <p>1、通过您专属的推广链接注册成功的网站主账号，该账号2个月内（自然月）产生的媒体佣金的2%将作为您的奖励，每月结算一次；</p>

                                    <p>2、每个WAP网站主或团队拥有多个有盟账户，账户之间相互推荐，则无法领取推荐奖励。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="index-income">
                <h5 class="head-title">收入状况</h5>

                <ul>
                    <li>
                        <h5>@if(isset($memberBalance)) {{$memberBalance[0]['balance']}} @else 0.00 @endif<span>元</span></h5>

                        <p>账户总额</p>
                    </li>

                    <li>
                        <h5>0.00<span>元</span></h5>

                        <p>今日收入</p>
                    </li>

                    <li>
                        <h5>0.00<span>元</span></h5>

                        <p>本月收入</p>
                    </li>

                    <li>
                        <h5>0<span>元</span></h5>

                        <p>上月奖励金额</p>
                    </li>
                </ul>
            </div>
            <!--income-->
        </div>

        <div class="curve">
            <div class="top">
                <h5 class="head-title">收入曲线</h5>
                <form id="form_index">
                    <div class="input">
                        <input class="search-input mobile_space_id" type="text" name="mobile_space_id" placeholder="广告位ID">

                        <select class="select mobile_advert_type_id" name="mobile_advert_type_id">
                            <option value="">选择广告类型</option>
                            <option value="1">横幅</option>
                            <option value="11">网摘</option>
                            <option value="19">小图标</option>
                        </select>
                        <input type="hidden" value="2018-12-04" name="stime" id="stime">
                        <input type="hidden" value="2018-12-10" name="etime" id="etime">
                        <select class="select" id="cycle_time">
                            <option value="2018-12-10 - 2018-12-10">今天</option>
                            <option value="2018-12-09 - 2018-12-09">昨天</option>
                            <option value="2018-12-04 - 2018-12-10" selected="selected">最近7天</option>
                            <option value="2018-11-26 - 2018-12-10">最近15天</option>
                        </select>
                    </div>
                </form></div>

            <div class="curve-area" id="jlist_amount"><div id="div_render" class="char" style="width: 100%; height: 320px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1544378621320"><div style="position: relative; overflow: hidden; width: 1153px; height: 320px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="1153" height="320" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 1153px; height: 320px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px/21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 442.767px; top: 91px;">12-06<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#43939F"></span>广告收入 : 0</div></div>
                <script src="<?php echo asset( "/resources/views/backend/js/echarts.min.js") ?>" type="text/javascript"></script>
                <script type="text/javascript">
                    //基于准备好的dom，初始化echarts实例
                    var myChart = echarts.init(document.getElementById('div_render'));
                    var chart_data = [{"date":"12-04","value":0},{"date":"12-05","value":0},{"date":"12-06","value":0},{"date":"12-07","value":0},{"date":"12-08","value":0},{"date":"12-09","value":0},{"date":"12-10","value":0}];
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
                </script></div>

            <p class="slide-tip">可左右滑动浏览</p>
        </div>
        <!--curve-->

        <div class="index-income-detail">
            <h5 class="head-title">收入明细</h5>

            <div class="mb-table" id="income_data"><div class="tab_box mb-table">
                    <table class="table">
                        <thead>
                        <tr class="thead_bg">
                            <th scope="col">日期</th>
                            <!-- <th scope="col" class="pc-hide">收入小计</th> -->
                            <th scope="col">横幅收入</th>
                            <th scope="col">网摘收入</th>
                            <th scope="col">小图标收入</th>
                            <th scope="col">奖励收入</th>
                            <th scope="col" class="mb-hide">收入小计</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="7">暂无数据</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <p class="slide-tip">可左右滑动浏览</p>
            </div>

        </div>
        <!--index-income-detail-->


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