
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}-用户登陆</title>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/iconfont.css") ?>">
    <<link rel="shortcut icon" href="<?php echo asset( "/resources/views/frontend/pc/images/bitbug_favicon.ico") ?>" />
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/mobliemenu.css") ?>">
    <link rel="stylesheet" href="<?php echo asset( "/resources/views/frontend/pc/css/all.css") ?>">
    <script src="<?php echo asset( "/resources/views/frontend/pc/js/jquery-1.12.4.min.js") ?>"></script>
    <script type="text/javascript" src="<?php echo asset( "/resources/views/frontend/pc/js/baseCheck.js");?>"></script>
</head>
<body class="login-page">
<div class="logo">
    <a href="/"><img src="{{url('/resources/views/frontend/pc/images/login-logo.png')}}" alt=""></a>
</div>
<!--logo-->
<div class="con">
    <div class="top">
        <h5>用户登录</h5>
        <form id="form_login">
            {{csrf_field()}}
            <div class="check">
                <div class="form_cont">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="user_role" value="2" checked="checked" class="custom-control-input" />
                        <label class="custom-control-label" for="customRadioInline1">网站主</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="user_role" value="1" class="custom-control-input" />
                        <label class="custom-control-label" for="customRadioInline2">广告主</label>
                    </div>
                </div>
                <div class="input">
                    <div class="list">
                        <p>用户名</p>
                        <input type="text" id="username" name="username" placeholder="请输入用户名" />
                    </div>
                    <div class="list">
                        <p>密码</p>
                        <input type="password" name="pwd" id="pwd" placeholder="请输入密码" />
                        <i class="pbt" id="pbt_password"></i>
                    </div>
                    <div class="list code">
                        <p>验证码</p>
                        <input type="text" name="auth_code" id="auth_code" placeholder="请输入验证码" />
                        <div id="v_container" class="yzm"><img id="jauth_code" src="/backend/code" onclick="javascript:this.src='/backend/code?'+Math.random()" title="如果不显示请刷新" /></div>
                    </div>
                    <input type="button" class="log jbtn_login" value="登录" />
                    <p class="tip">如有账户疑问请联系客服专员</p>
                </div>
            </div>
        </form>
    </div>
    <div class="bottom">
        <p>还没注册帐号？<a href="/register.html">立即注册</a></p>
    </div>
</div>
<!--con-->
<p class="copy">&copy;2018 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}} 版权所有 服务热线：{{isset($commonSetting['contact_number'])?$commonSetting['contact_number']:''}} </p></p>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script>
    $(function(){
        $(".jbtn_login").click( function(){
            var username = $("#username").val();
            var pwd = $("#pwd").val();
            var auth_code = $("#auth_code").val();
            if( !isEmail(username) ){
                alert("邮箱格式不正确");
                $('#username').focus();
                return false;
            }
            if( !isUname(pwd) || !( pwd.length >= 5 && pwd.length <= 20 ) ){
                alert("请输入字母、数字组成的5-20位的密码");
                $('#pwd').focus();
                return false;
            }
            if( auth_code.length != 4 ){
                alert("验证码只能是4位数");
                $('#auth_code').focus();
                return false;
            }
            $.ajax({
                type:"post",
                url:"/login.html",
                dataType:'json',
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                data:$('#form_login').serialize(),
                success:function(data){
                    if(data.status == 0)
                    {
                        alert(data.msg);
                        return false;
                    }else{
                        window.location.href = data.url;
                    }

                    return false;
                },
                error:function (data) {
                    return false;

                }

            });

        });
    });

</script>
</body>
</html>