@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 提现记录</p>
    <!--position-->


    <div class="lists_withdrawal">
        <form id="form_insert">
            <div class="record" id="record">
                <div class="top">
                    <h5 class="head-title">提现记录</h5>
                    <input type="hidden" name="state">
                    <div class="input">
                        <select class="select state">
                            <option value="">状态</option>
                            <option value="apply">待付款</option>
                            <option value="pass">已付款</option>
                            <option value="refuse">付款不通过</option>
                        </select>
                    </div>
                </div>

                <div class="mb-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">申请日期</th>
                            <th scope="col">银行卡号</th>
                            <th scope="col">开户人</th>
                            <th scope="col">申请金额</th>
                            <th scope="col">审批日期</th>
                            <th scope="col">备注</th>
                            <th scope="col">状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderArray as $order)
                         <tr>
                            <td scope="row">{{$order['created_at']}}</td>
                            <td scope="row">{{$order['bank_number']}}</td>
                            <td scope="row">{{$order['account_name']}}</td>
                            <td scope="row">{{$order['money']}}</td>
                            <td scope="row">{{$order['updated_at']}}</td>
                            <td scope="row">{{$order['remark']}}</td>
                            <td scope="row">@if($order['status']==0)审核中@elseif($order['status']==1)已审核@elseif($order['status']==2)审核不通过@endif</td>
                         </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="loading" style="display: none;"><i class="iconfont icon-loading"></i><span>加载数据...</span></div></div>

                <ul class="pagination"></ul>
            </div></form>
        <!--curve-->
    </div>
    <script>
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(6).addClass('active');
        $('.mb-menu li').eq(6).addClass('active');
    </script>
@endsection