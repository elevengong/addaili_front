
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}-用户注册</title>
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
<div class="con register">
    <div class="top">
        <h5>用户注册</h5>
        <form id="form_register">
            <input type="hidden" name="parent_webmaster_id" value="{{isset($webdaili_id)?$webdaili_id:0}}">
            {{csrf_field()}}
            <div class="check">
                <div class="form_cont">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="user_type" value="2" class="custom-control-input web juser_type" checked="checked">
                        <label class="custom-control-label" for="customRadioInline1">网站主</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="user_type" value="1" class="custom-control-input advert juser_type">
                        <label class="custom-control-label" for="customRadioInline2">广告主</label>
                    </div>
                </div>
                <div class="input">
                    <div class="list">
                        <p>邮箱</p>
                        <input type="text" name="email" placeholder="请输入常用邮箱" id="email">
                    </div>
                    <div class="list">
                        <p>密码</p>
                        <input type="password" name="pwd" placeholder="请输入6-15个英文字母或数字的组合字符" id="pwd">
                    </div>
                    <div class="list">
                        <p>确认密码</p>
                        <input type="password" name="pwd_confirm" placeholder="请再输入一次密码" id="pwd_confirm">
                    </div>
                    <div class="list">
                        <p>QQ</p>
                        <input type="text" name="qq" onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入常用QQ号码，找回密码需要" id="qq">
                    </div>
                    <div class="list">
                        <p>手机号码</p>
                        <input type="text" name="phone" onkeyup="value=value.replace(/[^\d]/g,'')" placeholder="请输入常用手机号，方便及时与您联系" id="phone">
                    </div>
                    <div class="ty">
                        <input type="checkbox" name="regProtocol" id="regProtocol">
                        <p>我已经认真阅读并同意<a href="/protocol.html" target="_blank"><{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}广告平台服务协议></a></p>
                    </div>
                    <input type="button" class="log jbtn_register" value="注 册" />
                </div>
            </div>
        </form>
    </div>
    <div class="bottom">
        <p>已有账号？<a href="/login.html">立即登录</a></p>
    </div>
</div>
<!--con-->
<p class="copy">&copy;2018 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}} 版权所有 服务热线：{{isset($commonSetting['contact_number'])?$commonSetting['contact_number']:''}} </p>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script>
    $(function(){
        $(".jbtn_register").click( function(){
            var email = $("#email").val();
            var pwd = $("#pwd").val();
            var pwd_confirm = $("#pwd_confirm").val();
            var qq = $("#qq").val();
            var phone = $("#phone").val();
            var user_type = $('input:radio[name="user_type"]:checked').val();
            var protocol = $("input[type='checkbox']").is(':checked');
            if( !isEmail(email) ){
                alert("邮箱格式不正确");
                $('#email').focus();
                return false;
            }
            if( !isUname(pwd) || !( pwd.length >= 5 && pwd.length <= 20 ) ){
                alert("请输入字母、数字组成的5-20位的密码");
                $('#pwd').focus();
                return false;
            }
            if(pwd != pwd_confirm){
                alert("两次密码不相同");
                $('#pwd').focus();
                return false;
            }
            if(!isQQ(qq)){
                alert("QQ格式错误");
                $('#qq').focus();
                return false;
            }
            if(!isTel(phone)){
                alert("电话格式错误");
                $('#phone').focus();
                return false;
            }
            if(protocol != true)
            {
                alert("请认真阅读并同意广告协议");
                return false;
            }

            $.ajax({
                type:"post",
                url:"/register.html",
                dataType:'json',
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                data:$('#form_register').serialize(),
                success:function(data){
                    if(data.status == 0)
                    {
                        alert(data.msg);
                        return false;
                    }else{
                        alert(data.msg);
                        window.location.href = '/login.html';
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