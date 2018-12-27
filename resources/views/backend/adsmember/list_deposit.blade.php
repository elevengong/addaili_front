@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 充值列表</p>
        <!--position-->

        <div class="list-amount-web ads-stat ads-payment-record">
            <div class="top search-area">
                <form action="/adsmember/account/deposit/lists" method="post">
                    {{csrf_field()}}
                    <div class="input">
                        <ul class="date">
                            <li><input type="text" name="stime" value="" id="stime" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                            <li>至</li>
                            <li><input type="text" name="etime" value="" id="etime" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                        </ul>

                        <input type="submit" value="查询" class="check check-h">

                    </div>
                </form>
            </div>

            <div class="search-area-bg"></div>

            <div class="mb-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">订单编号</th>
                        <th scope="col">记账日期</th>
                        <th scope="col">存款类型</th>
                        <th scope="col">存款金额</th>
                        <th scope="col">状态</th>
                        <th scope="col">备注</th>
                        <th scope="col">创建日期</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($depositArray as $deposit)
                    <tr>
                        <td>{{$deposit['order_no']}}</td>
                        <td>{{date('Y-m-d',strtotime($deposit['deposit_time']))}}</td>
                        <td>@if($deposit['type']==1)银行转帐@elseif($deposit['type']==2)支付宝转帐@else微信转帐@endif</td>
                        <td>{{$deposit['money']}}</td>
                        <td>@if($deposit['status']==0)审核中@elseif($deposit['status']==1)处理成功@elseif($deposit['status']==2)用户未充值@else关闭订单@endif</td>
                        <td>{{$deposit['remark']}}</td>
                        <td>{{$deposit['created_at']}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                {{$depositArray->links()}}
            </div>


            <p class="slide-tip">可左右滑动浏览</p>
        </div>
        <script src="<?php echo asset( "/resources/views/backend/js/laydate.js") ?>" type="text/javascript"></script>
        <script src="<?php echo asset( "/resources/views/frontend/pc/js/baseCheck.js?ver=1.0") ?>" type="text/javascript"></script>
        <script>
            laydate.render({
                elem: '#stime'
            });
            laydate.render({
                elem: '#etime'
            });

            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(5).addClass('active');
            $('.mb-menu li').eq(5).addClass('active');
        </script>

@endsection