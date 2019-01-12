@extends("backend.layout.adslayout")
@section("content")

    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 数据报表</p>
        <!--position-->

        <div class="list-amount-web ads-stat">
            <div class="top search-area">
                <form action="/adsmember/service/report" method="post" id="form_list">
                    {{csrf_field()}}
                    <div class="input">
                        <ul class="date">
                            <li><input name="stime" type="text" value="{{$stime}}" placeholder="" id="stime" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                            <li>至</li>
                            <li><input name="etime" type="text" value="{{$etime}}" placeholder="" id="etime" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                        </ul>

                        <input type="text" class="search-input" placeholder="广告ID" name="keyword" value="">

                        <div class="date">
                            <select id="mobile_advert_type_id" name="adstype">
                                <option value="0" selected="selected">请选择广告类型</option>
                                @foreach($adsTypeArray as $adsType)
                                    <option value="{{$adsType['set_id']}}" @if($adstype == $adsType['set_id'])selected="selected"@endif>{{$adsType['remark']}}</option>
                                @endforeach
                            </select>
                            <select id="mobile_charge_type_id" name="counttype">
                                <option value="0" selected="selected">请选择计费类型</option>
                                @foreach($countTypeArray as $countType)
                                    <option value="{{$countType['set_id']}}" @if($counttype == $countType['set_id'])selected="selected"@endif>{{$countType['remark']}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" value="查询" class="check check-h">
                    </div>
                </form>
            </div>

            <div class="search-area-bg"></div>
            <div class="mb-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">广告ID</th>
                        <th scope="col">广告名称</th>
                        <th scope="col">广告类型</th>
                        <th scope="col">计费类型</th>
                        <th scope="col">消耗广告金额</th>
                        <th scope="col">日期</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($commissionArray as $commission)
                        <tr class="">
                            <td>{{$commission['ads_id']}}</td>
                            <td>{{$commission['ads_name']}}</td>
                            <td>{{$settingArray[$commission['ads_type']]}}</td>
                            <td>{{$settingArray[$commission['ads_count_type']]}}</td>
                            <td>￥{{$commission['spant']}}</td>
                            <td>{{$commission['date']}}</td>
                        </tr>
                    @endforeach

                    <tr class="">
                        <td colspan="4" scope="row"><strong>当前页面合计：</strong></td>
                        <td><strong>￥{{$totalSpent}}</strong></td>
                        <td>&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {!! $commissionArray->appends(array('stime'=>$stime,'etime'=>$etime,'adstype'=>$adstype,'counttype'=>$counttype,'keyword'=>$keyword))->render() !!}
            <p class="slide-tip">可左右滑动浏览</p>
        </div>

        <script src="<?php echo asset( "/resources/views/backend/js/laydate.js") ?>" type="text/javascript"></script>
        <script>
            laydate.render({
                elem: '#stime'
            });

            laydate.render({
                elem: '#etime'
            });

            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(4).addClass('active');
            $('.mb-menu li').eq(4).addClass('active');
        </script>


@endsection