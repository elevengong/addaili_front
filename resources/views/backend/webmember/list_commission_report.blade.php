@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 佣金报表</p>
    <!--position-->

    <div class="list-amount-web">
        <div class="top search-area">
            <div class="input">
                <form id="ajax_search">
                    <ul class="date">
                        <li><input type="text" placeholder="开始时间" id="stime" name="stime" value="" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                        <li>至</li>
                        <li><input type="text" placeholder="结束时间" id="etime" name="etime" value="" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                    </ul>

                    <select id="mobile_advert_type_id" name="adstype">
                        <option value="0" selected="selected">选择广告类型</option>
                        @foreach($adsTypeArray as $adsType)
                            <option value="{{$adsType['set_id']}}">{{$adsType['remark']}}</option>
                        @endforeach
                    </select>
                    <select id="mobile_charge_type_id" name="counttype">
                        <option value="0" selected="selected">选择计费模式</option>
                        @foreach($countTypeArray as $countType)
                            <option value="{{$countType['set_id']}}">{{$countType['remark']}}</option>
                        @endforeach
                    </select>
                    <select id="mobile_domain_id" name="domain">
                        <option value="0" selected="selected">选择域名</option>
                        @foreach($domainArray as $domain)
                            <option value="{{$domain['web_id']}}">{{$domain['domain']}}</option>
                        @endforeach
                    </select>
                    <input type="text" class="search-input" placeholder="广告位ID" name="adsid" value="" id="mobile_space_id">
                    <input type="submit" value="查询" class="check check-h">
                    <div class="bottom">
                        <input class="sm_btn check" type="submit" value="查 询">
                        <input type="button" value="关闭" class="check close-bt">
                    </div>
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
                <tr scope="row">
                    <td colspan="2">暂无数据！</td>
                </tr>
                </tbody>
            </table>

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

    @endsection