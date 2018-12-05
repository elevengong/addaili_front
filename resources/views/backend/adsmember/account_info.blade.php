@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 账户管理</p>
        <!--position-->

        <div class="person-data ads-update">
            <h5 class="head-title">账户信息</h5>

            <div class="con">
                <figure><img src="{{url('/resources/views/backend/images/touxiang.png')}}" alt=""></figure>

                <div class="data">
                    <p>{{$adsmember}}</p>
                    <p>注册时间：{{$member['created_at']}}</p>
                    <p>上次登录时间：{{$member['lastlogined_at']}}</p>
                </div>

                <div class="payment-cz">
                    <a href="/adsmember/account/deposit" class="pay">账户充值</a>
                    <a href="/adsmember/account/deposit/lists" class="record">充值记录</a>
                </div>
            </div>
        </div>
        <!--person-data-->
        {{csrf_field()}}
        <div class="person-mod">
            <div class="modify">
                <div class="top">
                    <p>登录密码：<span>********</span></p>

                    <a href="#" id="mdbt-1"><i class="iconfont icon-xiugai-copy"></i>修改</a>
                </div>

                <ul id="update_password" class="input-list fade-toggle-1">
                    <li>
                        <span>原密码：</span>

                        <input name="old_password" id="old_password" type="text" placeholder="输入原密码" class="search-input">
                    </li>

                    <li>
                        <span>新密码：</span>

                        <input name="password" id="password" type="text" placeholder="输入新密码" class="search-input">
                    </li>

                    <li>
                        <span>确认新密码：</span>

                        <input name="confirm_password" id="confirm_password" type="text" placeholder="再次输入新密码" class="search-input">
                    </li>

                    <li>
                        <a href="" class="confirm update_password">确定</a>
                        <a href="" class="cancel cancel_password">取消</a>
                    </li>

                    <li class="tip"><span>*</span>6-15个英文字母或数字的组合字符</li>
                </ul>
            </div>

            <div class="modify">
                <div class="top">
                    <p>手机号码：<span>{{substr($member['mobile'], 0, -3)}}***</span></p>
                </div>
            </div>

            <div class="modify">
                <div class="top">
                    <p>常用QQ：<span>{{substr($member['qq'], 0, -3)}}***</span></p>

                    <a href="#" id="mdbt-3"><i class="iconfont icon-xiugai-copy"></i>修改</a>
                </div>

                <ul id="update_qq" class="input-list fade-toggle-3">
                    <li>
                        <span>输入新QQ：</span>

                        <input name="qq" id="qq" type="text" placeholder="输入新QQ" class="search-input">
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="confirm update_qq">修改</a>
                        <a href="javascript:void(0);" class="cancel cancel_qq">取消</a>
                    </li>
                </ul>
            </div>
        </div>

        <script src="<?php echo asset( "/resources/views/frontend/pc/js/baseCheck.js") ?>"></script>
        <script>
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(5).addClass('active');
            $('.mb-menu li').eq(5).addClass('active');

            $('.update_password').click(function () {
                var old_password = $.trim( $("#old_password").val() );
                var password = $.trim( $("#password").val() );
                var confirm_password = $.trim( $("#confirm_password").val() );

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
                    url:"/adsmember/account/updatepwd",
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
            
            $('.update_qq').click(function () {
                var qq = $.trim( $("#qq").val() );
                if(!isQQ(qq) || qq == '')
                {
                    alert('QQ格式不正确！');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:"/adsmember/account/updateqq",
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