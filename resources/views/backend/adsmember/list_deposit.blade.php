@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 充值列表</p>
        <!--position-->

        <div class="list-amount-web ads-stat ads-payment-record">
            <div class="top search-area">
                <form action="/adsmember/account/deposit/lists" method="post">
                    <div class="input">
                        <ul class="date">
                            <li><input type="text" name="stime" value="" id="stime" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                            <li>至</li>
                            <li><input type="text" name="etime" value="" id="etime" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                        </ul>

                        <input type="submit" value="查询" class="check check-h">

                        <div class="bottom">
                            <input type="submit" value="查询" class="check">
                            <input type="button" value="关闭" class="check close-bt">
                        </div>
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
                        <th scope="col">帐务类型</th>
                        <th scope="col">财务金额</th>
                        <th scope="col">账户余额</th>
                        <th scope="col">备注</th>
                        <th scope="col">创建日期</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($depositArray as $deposit)
                    <tr>
                        <td>{{$deposit['order_no']}}</td>
                        <td>{{date('Y-m-d',strtotime($deposit['deposit_time']))}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                {{$depositArray->links()}}
            </div>


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
            $('.menu li').eq(5).addClass('active');
            $('.mb-menu li').eq(5).addClass('active');
        </script>

@endsection