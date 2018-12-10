@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 基本设置</p>
        <!--position-->

        <div class="person-data">
            <h5 class="head-title">账户信息</h5>

            <div class="con">
                <figure><img src="{{url('/resources/views/backend/images/touxiang.png')}}" alt=""></figure>

                <div class="data">
                    <p>{{$webmember}}</p>

                    <p>上次登录时间：{{$memberInfo['lastlogined_at']}}</p>

                    <p>账户收款人：-</p>
                </div>
            </div>
        </div>
        <!--person-data-->
        {{csrf_field()}}
        <div class="person-mod">
            <div class="modify">
                <div class="top">
                    <p>登录密码：<span>********</span></p>

                    <a href="javascript:void(0);" id="mdbt-1"><i class="iconfont icon-xiugai-copy"></i>修改</a>
                </div>
                <form id="update_pwd">
                    <ul class="input-list fade-toggle-1">
                        <li>
                            <span>原密码：</span>

                            <input type="password" placeholder="输入原密码" class="search-input" name="original_password" id="original_password">
                        </li>

                        <li>
                            <span>新密码：</span>

                            <input type="password" placeholder="输入新密码" class="search-input" name="password" id="password">
                        </li>

                        <li>
                            <span>确认新密码：</span>

                            <input type="password" placeholder="再次输入新密码" class="search-input" name="password_confirm" id="password_confirm">
                        </li>

                        <li>
                            <input type="hidden" value="93519" name="id">
                            <a href="javascript:void(0);" class="confirm update_pwd_btn">确定</a>
                            <a href="javascript:void(0);" class="cancel">取消</a>
                        </li>

                        <li class="tip"><span>*</span>6-15个英文字母或数字的组合字符</li>
                    </ul>
                </form>
            </div>

            <div class="modify">
                <div class="top">
                    <p>手机号码：<span id="_phone">{{$memberInfo['mobile']}}</span></p>

                    <a href="javascript:void(0);" id="mdbt-2"><i class="iconfont icon-xiugai-copy"></i>修改</a>
                </div>
                <form id="update_phone">
                    <ul class="input-list fade-toggle-2">
                        <li>
                            <span>输入新手机号码：</span>

                            <input type="text" placeholder="输入新手机号码" class="search-input" name="phone" id="mobile">
                        </li>

                        <li class="con-can">
                            <input type="hidden" value="93519" name="id">
                            <a href="javascript:void(0);" class="confirm update_phone_btn">修改</a>
                            <a href="javascript:void(0);" class="cancel">取消</a>
                        </li>
                    </ul>
                </form>
            </div>

            <div class="modify">
                <div class="top">
                    <p>常用QQ：<span id="qq">{{$memberInfo['qq']}}</span></p>

                    <a href="javascript:void(0);" id="mdbt-3"><i class="iconfont icon-xiugai-copy"></i>修改</a>
                </div>
                <form id="update_qq">
                    <ul class="input-list fade-toggle-3">
                        <li>
                            <span>输入新QQ：</span>

                            <input type="text" placeholder="输入新QQ" class="search-input" name="qq" id="newqq">
                        </li>

                        <li>
                            <input type="hidden" value="93519" name="id">
                            <a href="javascript:void(0);" class="confirm update_qq_btn">修改</a>
                            <a href="javascript:void(0);" class="cancel">取消</a>
                        </li>
                    </ul>
                </form>
            </div>

            <div class="bank">
                <ul>
                    <li>收款信息：</li>
                    <li>开户人：-@if(!empty($withdrawInfo)) {{$withdrawInfo[0]['account_name']}}@endif</li>
                    <li>开户银行：-@if(!empty($withdrawInfo)) {{$withdrawInfo[0]['bank_name']}}@endif</li>
                    <li>银行卡号：-@if(!empty($withdrawInfo)) {{$withdrawInfo[0]['bank_number']}}@endif</li>
                </ul>

                <div class="right">
                    <a href="javascript:void(0);" class="detail">详情信息</a>
                    <a href="javascript:void(0);" class="add">添加银行卡</a>
                </div>
            </div>

            <div class="bank-table">
                <div class="mb-table">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">编号</th>
                            <th scope="col">开户银行</th>
                            <th scope="col">支行</th>
                            <th scope="col">开户人</th>
                            <th scope="col">银行卡号</th>
                            <th scope="col">省份</th>
                            <th scope="col" class="mb-hide">创建时间</th>
                            <th scope="col" class="mb-hide">修改时间</th>
                            <th scope="col">操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($withdrawInfo as $info)
                        <tr>
                            {{--<td colspan="13">没有数据信息</td>--}}
                            <td>{{$info['withdraw_info_id']}}</td>
                            <td>{{$info['bank_name']}}</td>
                            <td>{{$info['bank_branch']}}</td>
                            <td>{{$info['account_name']}}</td>
                            <td>{{$info['bank_number']}}</td>
                            <td>{{$info['remark']}}</td>
                            <td>{{$info['created_at']}}</td>
                            <td>{{$info['updated_at']}}</td>
                            <td><a href="javascript:void(false)" onclick="del('{{$info['withdraw_info_id']}}');" title="刪除" class="icoOpr jajax_delete">刪除</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <form id="ajax_form">
                <div class="add-bankcard">
                    <h5 class="head-title">银行卡信息</h5>

                    <div class="input">
                        <span>银行名称：</span>

                        <select id="bank_id" name="bank_id">
                            <option value="0" selected="selected">请选择银行名称</option>
                            @foreach($allBank as $bank)
                            <option value="{{$bank['bank_id']}}">{{$bank['bank_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input">
                        <span>支行名称：</span>

                        <input class="ipt w300" type="text" name="bank_branch" id="bank_branch">
                    </div>

                    <div class="input">
                        <span>开户人：</span>

                        <input class="ipt w300" type="text" name="account_name" id="account_name">
                    </div>

                    <div class="input">
                        <span>银行卡号：</span>

                        <input class="ipt w300" type="text" name="bank_number" id="bank_number">
                    </div>

                    <div class="input">
                        <span>开户地区：</span>

                        <div class="select">
                            <select id="province_id" name="province_id">
                                <option value="0" selected="selected">请选择省份</option>
                                @foreach($allProvince as $province)
                                <option value="{{$province['id']}}">{{$province['remark']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="button">
                        <input type="button" value="保存" class="button-1 save_btn">
                        <input type="button" value="取消" class="button-2 cancel">
                    </div>
                </div>
            </form>
        </div>
        <!--person-mod-->
        <script src="<?php echo asset( "/resources/views/frontend/pc/js/baseCheck.js") ?>"></script>
        <script type="text/javascript">
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(1).addClass('active');
            $('.mb-menu li').eq(1).addClass('active');

            function del(id) {
                var msg = "您真的确定要删除吗？\n\n请确认！";
                if (confirm(msg)==true){
                    $.ajax({
                        type:"delete",
                        url:"/webmember/setting/addbankinfo/del/"+id,
                        dataType:'json',
                        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                        data:{},
                        // data:$("#form_insert").serialize(),
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

                }else{
                    return false;
                }
            }
            
            $('.save_btn').click(function () {
                var bank_id = $("#bank_id  option:selected").val();
                var bank_branch = $.trim( $("#bank_branch").val() );
                var account_name = $.trim( $("#account_name").val() );
                var bank_number = $.trim( $("#bank_number").val() );
                var province_id = $("#province_id  option:selected").val();

                if(bank_id == '' || bank_id == 0)
                {
                    alert('请选择银行名称!');
                    return false;
                }
                if(bank_branch == '')
                {
                    alert('请输入支行名称!');
                    return false;
                }
                if(account_name == '')
                {
                    alert('请输入开户人!');
                    return false;
                }
                if(bank_number == '')
                {
                    alert('请输入卡号!');
                    return false;
                }
                if(province_id == '' || province_id == 0)
                {
                    alert('请选择开户地区!');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:"/webmember/setting/addbankinfo",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'bank_id':bank_id,'bank_branch':bank_branch,'account_name':account_name,'bank_number':bank_number,'province_id':province_id},
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
            
            $('.update_phone_btn').click(function () {
                var mobile = $.trim( $("#mobile").val() );
                if(!isTel(mobile) || mobile == '')
                {
                    alert('手机号码格式不正确!');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:"/webmember/setting/updatemobile",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'mobile':mobile},
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

            $('.update_qq_btn').click(function () {
                var qq = $.trim( $("#newqq").val() );
                if(!isQQ(qq) || qq == '')
                {
                    alert('QQ格式不正确！');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:"/webmember/setting/updateqq",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'qq':qq},
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

            $('.update_pwd_btn').click(function () {
                var old_password = $.trim( $("#original_password").val() );
                var password = $.trim( $("#password").val() );
                var confirm_password = $.trim( $("#password_confirm").val() );

                if(old_password=='' || password=='' || confirm_password=='')
                {
                    alert('密码不能为空！');
                    return false;
                }
                if(password != confirm_password)
                {
                    alert('两次密码不相同！');
                    return false;
                }
                if(!isUname_(password) || password.length < 7 || password.length > 16)
                {
                    alert('密码格式不正确！');
                    return false;
                }

                $.ajax({
                    type:"post",
                    url:"/webmember/setting/updatepwd",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'old_password':old_password,'password':password,'confirm_password':confirm_password},
                    success:function(data){
                        if(data.status == 0)
                        {
                            alert(data.msg);
                        }else{
                            alert(data.msg);
                            window.location.href = '/logout.html';
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });


            });

            if($('.person-mod').length>0){
                $("#mdbt-1").click(function(){
                    $(".fade-toggle-1").fadeToggle(500);
                });

                $("#mdbt-2").click(function(){
                    $(".fade-toggle-2").fadeToggle(500);
                });

                $("#mdbt-3").click(function(){
                    $(".fade-toggle-3").fadeToggle(500);
                });

                $(".bank .detail").click(function(){
                    $(".bank-table").fadeToggle(500);
                    $(".add-bankcard").hide();
                });

                $(".bank .add").click(function(){
                    $(".add-bankcard").fadeToggle(500);
                    $(".bank-table").hide();
                });
            }
        </script>
@endsection