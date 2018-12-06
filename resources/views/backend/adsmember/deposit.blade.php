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
                <p>2、到本公司付款（珠海市香洲区明珠南路金嘉创意谷第6栋第1层C102，C103，C104，C105号房 邮编：519000）</p>
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
                            <input type="hidden" value="1" name="ajax_do">
                            <input type="hidden" value="1" id="repeat_submit_today" name="repeat_submit_today">
                            <div class="con">
                                <div class="form-ti fff">账户信息：</div>
                                <div class="form_row jtab1 row">
                                    <div class="form-det col-lg-6 col-12 col-xl-6 jchoose_bank_number">
                                        <label>
                                            <div class="list jbank_number_item 							active							">
                                                <p>开户名：吴军复</p>
                                                <p>开户银行：微信</p>
                                                <p>银行账号：<input type="radio" checked="" value="wxid_hd5tsy4z6w4a22" name="bank_number">wxid_hd5tsy4z6w4a22</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-det col-lg-6 col-12 col-xl-6 jchoose_bank_number">
                                        <label>
                                            <div class="list jbank_number_item 														">
                                                <p>开户名：ads8</p>
                                                <p>开户银行：微信</p>
                                                <p>银行账号：<input type="radio" value="wxid_v0rkzkhqpdx822" name="bank_number">wxid_v0rkzkhqpdx822</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-det col-lg-6 col-12 col-xl-6 jchoose_bank_number">
                                        <label>
                                            <div class="list jbank_number_item 														">
                                                <p>开户名：陈立姣</p>
                                                <p>开户银行：支付宝</p>
                                                <p>银行账号：<input type="radio" value="13726278369" name="bank_number">13726278369</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-det col-lg-6 col-12 col-xl-6 jchoose_bank_number">
                                        <label>
                                            <div class="list jbank_number_item 														">
                                                <p>开户名：沈成安</p>
                                                <p>开户银行：招商银行珠海支行凤凰北支行</p>
                                                <p>银行账号：<input type="radio" value="6214856562206775" name="bank_number">6214856562206775</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="form_row jtab1">
                                    <div class="form-ti">充值金额：</div>
                                    <div class="form_cont">
                                        <input type="text" class="ipt w150" name="amount_raw" id="amount_raw" onkeyup="value=value.replace(/[^\d\.]/g,'')">
                                        <span class="tip"><i>*</i>提交后请及时联系财务，电话：0756-3252933</span>
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
        <script>
            laydate.render({
                elem: '#rtime'
            });

            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(5).addClass('active');
            $('.mb-menu li').eq(5).addClass('active');
        </script>



@endsection