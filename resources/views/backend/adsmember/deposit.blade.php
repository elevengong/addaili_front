@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 账户充值</p>
        <!--position-->

        <div class="ads-stat ads-payment-insert">
            <h5 class="head-title">账户充值</h5>
            <div class="tips">
                <p>充值方式</p>
                <p>1、请将广告款汇入我公司以下指定的银行帐号，非以下帐号的收款，我公司概不负责确认！</p>
            </div>
        </div>
        <div class="ads-stat ads-payment-insert">
            <h5 class="head-title">账户充值</h5>
            <div class="con-area">
                <div class="nav-area">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">账号充值</a></li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form id="form_insert" method="post">
                            {{csrf_field()}}
                            <div class="con">
                                <div class="form-ti fff">账户信息：</div>
                                <div class="form_row jtab1 row">

                                    @foreach($depositInfo as $deposit)
                                    <div class="form-det col-lg-6 col-12 col-xl-6 jchoose_bank_number">
                                        <label>
                                            <div class="list jbank_number_item">
                                                <p>开户名：{{$deposit['username']}}</p>
                                                <p>开户银行：{{isset($deposit['bank_name'])?$deposit['bank_name']:''}}</p>
                                                <p>账号：<input type="radio" value="{{$deposit['deposit_info_id']}}" name="account_number">{{$deposit['account_number']}}</p>
                                            </div>
                                        </label>
                                    </div>
                                    @endforeach

                                </div>


                                <div class="form_row jtab1">
                                    <div class="form-ti">充值金额：</div>
                                    <div class="form_cont">
                                        <input type="text" class="ipt w150" name="amount_raw" id="amount_raw" onkeyup="value=value.replace(/[^\d\.]/g,'')">
                                        <span class="tip"><i>*</i>提交后请及时联系财务，QQ:{{isset($commonSetting['qq'])?$commonSetting['qq']:''}}</span>
                                    </div>
                                </div>
                                <div class="form_row jtab1">
                                    <div class="form-ti">充值日期：</div>
                                    <div class="form_cont">
                                        <ul class="date">
                                            <li><input id="rtime" type="text" value="{{date('Y-m-d',time())}}" name="rtime" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                                        </ul>
                                        <span class="tip"><i>*</i>请认真填写，财务部会核对</span>
                                    </div>
                                </div>
                                <div class="form_row jtab1">
                                    <div class="form-ti">汇款单位或个人：</div>
                                    <div class="form_cont">
                                        <input type="text" class="ipt w150 search-input" name="remit_user" id="remit_user">
                                        <span class="tip"><i>*</i>请认真填写，财务部会核对</span>
                                    </div>
                                </div>
                            </div>
                            <div class="button">
                                <input type="button" value="保存" class="button-1 jbtn_save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo asset( "/resources/views/backend/js/laydate.js") ?>" type="text/javascript"></script>
        <script src="<?php echo asset( "/resources/views/frontend/pc/js/baseCheck.js?ver=1.0") ?>" type="text/javascript"></script>
        <script>
            laydate.render({
                elem: '#rtime'
            });
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(5).addClass('active');
            $('.mb-menu li').eq(5).addClass('active');

            $('.jbtn_save').click(function () {
                var deposit_info_id = $('input[name="account_number"]:checked').val();
                var money = $.trim( $('#amount_raw').val() );
                var rtime = $.trim( $('#rtime').val() );
                var remit_user = $.trim( $('#remit_user').val() );
                if(deposit_info_id == undefined || deposit_info_id == '')
                {
                    alert('请选择存款帐户!');
                    return false;
                }
                if(money === undefined || money == '')
                {
                    alert('存款金额不能为空!');
                    return false;
                }
                if(money < 100)
                {
                    alert('存款金额不得少于100元!');
                    return false;
                }
                if(!valimoney(money))
                {
                    alert('存款金额格式错误!');
                    return false;
                }
                if(rtime === undefined || rtime == '')
                {
                    alert('存款时间不能为空!');
                    return false;
                }
                if(remit_user === undefined || remit_user == '')
                {
                    alert('汇款单位或个人不能为空!');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:"/adsmember/account/depositprocess",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'deposit_info_id':deposit_info_id,'money':money,'rtime':rtime,'remit_user':remit_user},
                    success:function(data){
                        if(data.status == 0)
                        {
                            alert(data.msg);
                        }else{
                            alert(data.msg);
                            window.location = '/adsmember/account/info';
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });

            });
        </script>



@endsection