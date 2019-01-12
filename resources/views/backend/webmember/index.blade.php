@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 管理首页</p>
        <!--position-->

        <div class="index-news">
            <a href="/webmember/message/lists">
                <p>最新消息： {{$lastestMessage[0]['message_title']}}</p>
                <span>{{$lastestMessage[0]['created_at']}}</span>
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
                    <a href="javascript:void(false);" id="exampleModal_1">获取推广链接</a>

                    <a href="javascript:void(false);" id="exampleModal_2">查看推广规则</a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">您的专属推广链接</h5>
                                <button type="button" id="close1" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <span id="url">{{isset($commonSetting['website_domain'])?$commonSetting['website_domain'].'webdaili/'.$webmaster['member_id']:''}}</span>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">复制代码</button>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel-2">媒介主发展下线规则</h5>
                                    <button type="button" id="close2" class="close" data-dismiss="modal" aria-label="Close">
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
                        <h5>{{isset($webmasterTodayEarn)?$webmasterTodayEarn:0}}<span>元</span></h5>

                        <p>今天目前收入</p>
                    </li>

                    <li>
                        <h5>{{$thisMonthSumEarn}}<span>元</span></h5>

                        <p>本月收入</p>
                    </li>

                    <li>
                        <h5>0<span>元</span></h5>

                        <p>昨天推广提成</p>
                    </li>
                </ul>
            </div>
            <!--income-->
        </div>

        <div class="curve">
            <div class="top">
                <h5 class="head-title">收入曲线</h5>
                <form method="post" action="/webmember/service/index" name="form_search" id="form_index">
                    {{csrf_field()}}
                    <div class="input">
                        <input class="search-input mobile_space_id" type="text" name="ads_space_id" placeholder="广告位ID" value="{{$ads_space_id}}">

                        <select class="select mobile_advert_type_id" name="ads_type">
                            <option value="0">选择广告类型</option>
                            @foreach($adsTypeArray as $type)
                            <option value="{{$type['set_id']}}" @if($ads_type == $type['set_id'])selected="selected"@endif>{{$type['remark']}}</option>
                            @endforeach
                        </select>
                        <select class="select" id="cycle_time" name="cycle_time">
                            {{--<option value="2018-12-10 - 2018-12-10">今天</option>--}}
                            {{--<option value="2018-12-09 - 2018-12-09">昨天</option>--}}
                            <option value="7" @if($cycle_time==7)selected="selected"@endif>最近7天</option>
                            <option value="15" @if($cycle_time==15)selected="selected"@endif>最近15天</option>
                        </select>
                        <input type="submit" value="查询" class="check check-h">
                    </div>
                </form></div>

            <div class="curve-area" id="jlist_amount"><div id="div_render" class="char" style="width: 100%; height: 320px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative; background: transparent;" _echarts_instance_="ec_1544378621320"><div style="position: relative; overflow: hidden; width: 1153px; height: 320px; padding: 0px; margin: 0px; border-width: 0px; cursor: default;"><canvas width="1153" height="320" data-zr-dom-id="zr_0" style="position: absolute; left: 0px; top: 0px; width: 1153px; height: 320px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div style="position: absolute; display: none; border-style: solid; white-space: nowrap; z-index: 9999999; transition: left 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s, top 0.4s cubic-bezier(0.23, 1, 0.32, 1) 0s; background-color: rgba(50, 50, 50, 0.7); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); font: 14px/21px &quot;Microsoft YaHei&quot;; padding: 5px; left: 442.767px; top: 91px;">12-06<br><span style="display:inline-block;margin-right:5px;border-radius:10px;width:9px;height:9px;background-color:#43939F"></span>广告收入 : 0</div></div>
                <script src="<?php echo asset( "/resources/views/backend/js/echarts.min.js") ?>" type="text/javascript"></script>
                <script type="text/javascript">
                    //基于准备好的dom，初始化echarts实例
                    var myChart = echarts.init(document.getElementById('div_render'));
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
                </script></div>

            <p class="slide-tip">可左右滑动浏览</p>
        </div>
        <!--curve-->

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
        <div class="" id="backgroudcolor"></div>
        <script src="<?php echo asset( "/resources/views/backend/js/clipboard.js") ?>"></script>
        <script>
            $(".btn-primary").click(function () {
                $(".btn-primary").attr('data-clipboard-target','#url');
                var clipboard = new ClipboardJS('.btn-primary');
                clipboard.on('success', function(e) {
                    alert("复制成功");
                    e.clearSelection();
                });
            });


            $('#exampleModal_1').click(function () {
                $('#exampleModal1').css('display','block');
                $('#exampleModal1').addClass(' show');
                $('#backgroudcolor').addClass('modal-backdrop fade show');
            });
            $('#exampleModal_2').click(function () {
                $('#exampleModal2').css('display','block');
                $('#exampleModal2').addClass(' show');
                $('#backgroudcolor').addClass('modal-backdrop fade show');
            });

            $('#close1').click(function () {
                $('#backgroudcolor').removeClass('modal-backdrop fade show')
                $('#exampleModal1').css('display','none');
                $('#exampleModal1').removeClass(' show');
            });
            $('#close2').click(function () {
                $('#backgroudcolor').removeClass('modal-backdrop fade show')
                $('#exampleModal2').css('display','none');
                $('#exampleModal2').removeClass(' show');
            });

            $('#backgroudcolor').click(function () {
                $('#backgroudcolor').removeClass('modal-backdrop fade show')
                $('#exampleModal1').css('display','none');
                $('#exampleModal1').removeClass(' show');
                $('#exampleModal2').css('display','none');
                $('#exampleModal2').removeClass(' show');
            });
        </script>
@endsection