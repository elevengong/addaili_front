@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 佣金报表</p>
    <!--position-->

    <div class="list-amount-web">
        <div class="top search-area">
            <div class="input">
                <form id="ajax_search" action="/webmember/money/report" name="form_search" id="form_list" method="post">
                    {{csrf_field()}}
                    <ul class="date">
                        <li><input type="text" placeholder="开始时间" id="stime" name="stime" value="{{$stime}}" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                        <li>至</li>
                        <li><input type="text" placeholder="结束时间" id="etime" name="etime" value="{{$etime}}" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                    </ul>

                    <select id="mobile_advert_type_id" name="adstype">
                        <option value="0" @if($adstype == 0)selected="selected"@endif>选择广告类型</option>
                        @foreach($adsTypeArray as $adsType)
                            <option value="{{$adsType['set_id']}}" @if($adstype == $adsType['set_id'])selected="selected"@endif>{{$adsType['remark']}}</option>
                        @endforeach
                    </select>
                    <select id="mobile_charge_type_id" name="counttype">
                        <option value="0" @if($counttype == 0)selected="selected"@endif>选择计费模式</option>
                        @foreach($countTypeArray as $countType)
                            <option value="{{$countType['set_id']}}" @if($counttype == $countType['set_id'])selected="selected"@endif>{{$countType['remark']}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="search-input" placeholder="广告位ID" name="space_id" value="{{$space_id}}" id="space_id">
                    <input type="submit" value="查询" class="check check-h">
                </form>
            </div>
        </div>
        <div class="search-area-bg"></div>

        <div class="mb-table">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">日期</th>
                    <th scope="col">佣金</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($commissionArray))
                    @foreach($commissionArray as $commission)
                    <tr scope="row">
                        <td colspan="1">{{$commission['date']}}</td>
                        <td colspan="1">{{$commission['earn']}}</td>
                    </tr>
                    @endforeach
                @else
                <tr scope="row">
                    <td colspan="2">暂无数据！</td>
                </tr>
                 @endif
                </tbody>
            </table>
            {!! $commissionArray->appends(array('stime'=>$stime,'etime'=>$etime,'adstype'=>$adstype,'counttype'=>$counttype,'space_id'=>$space_id))->render() !!}
        <p class="slide-tip">可左右滑动浏览</p>


    </div>
    <script src="<?php echo asset( "/resources/views/backend/js/laydate.js") ?>" type="text/javascript"></script>
    <script>
        //执行一个laydate实例
        laydate.render({
            elem: '#stime' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#etime' //指定元素
        });
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(5).addClass('active');
        $('.mb-menu li').eq(5).addClass('active');
    </script>
    </div>
    @endsection
