@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 财务结算</p>
    <!--position-->


    <div class="lists_withdrawal">
        <ul class="top">
            <li>
                <h5>@if(isset($memberBalance)) {{$memberBalance[0]['balance']}} @else 0.00 @endif<span>元</span></h5>

                <p>账户总额</p>
            </li>

            <li>
                <h5>@if(isset($memberBalance)) {{$memberBalance[0]['balance']}} @else 0.00 @endif<span>元</span></h5>

                <p>可提现金额</p>
            </li>

            <li>
                <h5>{{$webmaster['frozen']}}<span>元</span></h5>

                <p>待支付金额</p>
            </li>

            <li>
                <h5>0.00<span>元</span></h5>

                <p>待结算金额</p>
            </li>

            <li>
                <i class="iconfont icon-qian4"></i>

                <a href="/webmember/money/withdraw/record" target="_blank">提现记录</a>
            </li>
        </ul>

        <div class="apply-withdrawal">
            <h5 class="head-title">申请提现</h5>
            <form id="form_insert">
                {{csrf_field()}}
                <div class="con">
                    <div class="input">
                        <span>选择收款帐号：</span>
                        <select name="bankinfo" id="bankinfo">
                            <option value="0" selected="selected">请选择收款帐号</option>
                            @foreach($withdrawInfo as $info)
                            <option value="{{$info['withdraw_info_id']}}">{{$info['bank_name']}}-{{$info['bank_number']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input">
                        <span>你提现的金额：</span>
                        <input name="amount" id="amount" type="text" class="search-input" value="" placeholder="可转出金额￥0.00" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d.dd]/g,''))" maxlength="7">
                    </div>
                    @if(!isset($memberBalance) or $memberBalance[0]['balance'] < 100)
                    <input type="button" value="申请提现" class="apply-bt-dis">
                    @else
                    <input type="button" value="申请提现" class="apply-bt">
                    @endif

                </div>
            </form>
        </div>
        <!--apply-withdrawal-->

        <div class="tips">
            <h5 class="head-title">注意事项</h5>

            <p>1、佣金结算时间为每周周一的十二点；</p>

            <p>2、佣金支付时间为每周周三（节假日顺延至工作日）；</p>

            <p>3、账户余额满100元即可申请提现。</p>
        </div>

    </div>
    <script>
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(6).addClass('active');
        $('.mb-menu li').eq(6).addClass('active');

        $('.apply-bt').click(function () {
            var bankinfo = $("#bankinfo  option:selected").val();
            var amount = $.trim( $("#amount").val() );
            if(bankinfo === undefined || bankinfo==0)
            {
                alert('请选择收款帐号,如没有,请到基本设置里添加提款信息!');
                return false;
            }
            if(amount === undefined || amount == 0 || amount<100)
            {
                alert('提款金额不得少于100元!');
                return false;
            }
            $.ajax({
                type:"post",
                url:"/webmember/money/withdraw",
                dataType:'json',
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                data:{'bankinfo':bankinfo,'amount':amount},
                success:function(data){
                    if(data.status == 0)
                    {
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                        window.location.reload();
                    }
                },
                error:function (data) {
                    layer.msg(data.msg);
                }
            });


        });
        $('.apply-bt-dis').click(function () {
            alert('可提现金额不足100!');
        });
    </script>
@endsection