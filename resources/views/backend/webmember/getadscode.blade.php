@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 获取代码</p>
    <!--position-->

    <script type="text/javascript" src="/js/gallery/Clipboard/2.0.1/clipboard.js"></script>
    <div class="create-carousel-code get-code">
        <h5 class="head-title">获取代码</h5>
        <div class="text-tip">
            <span class="left-text"><i>*</i> 温馨提示：</span> <span class="right-text">加载广告时，请勿使用任何包含"ad"等与广告有关字眼的js目录、js文件名称、样式层变量名称和js函数方法。</span>
        </div>

        <p class="text-tip">
            <span class="left-text">广告位id：</span>{{$adsInfo[0]['webmaster_ads_id']}}</p>

        <p class="text-tip">
            <span class="left-text">广告位名称：</span>{{$adsInfo[0]['name']}}</p>

        <p class="text-tip">
            <span class="left-text">广告位类型：</span>{{isset($adsTypeArray[$adsInfo[0]['ads_type']])?$adsTypeArray[$adsInfo[0]['ads_type']]:$adsInfo[0]['ads_type']}}
        </p>
        <p class="text-tip">
            <span class="left-text">广告计费类型：</span>{{isset($adsTypeArray[$adsInfo[0]['ads_count_type']])?$adsTypeArray[$adsInfo[0]['ads_count_type']]:$adsInfo[0]['ads_count_type']}}
        </p>

        <div class="form-row">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">HTML版：</li>
                <li class="nav-item"><a class="nav-link https_html active" href="javascript:void(0)">HTTPS</a></li>

                <li class="nav-item"><a class="nav-link http_html" href="javascript:void(0)">HTTP</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-home-1" role="tabpanel" aria-labelledby="pills-home-tab">

                    <textarea rows="7" cols="120" class="txtarea" id="jcontent_html_https"><script>;(function(){var m = document.createElement("script");var url = "http://test2.com/fei";m.src = url + "/{{$adsInfo[0]['webmaster_ads_id']}}?" + Math.round(Math.random() * 10000);var ss = document.getElementsByTagName("script")[0];ss.parentNode.insertBefore(m, ss);})();</script>
</textarea>
                    <textarea rows="7" cols="120" class="txtarea" id="jcontent_html_http" style="display: none;"><script>;(function(){var m = document.createElement("script");var url = "http://test2.com/fei";m.src = url + "/{{$adsInfo[0]['webmaster_ads_id']}}?" + Math.round(Math.random() * 10000);var ss = document.getElementsByTagName("script")[0];ss.parentNode.insertBefore(m, ss);})();</script>
</textarea>

                    <div class="button">
                        <input type="button" value="获取代码" class="bt-1 jbtn_html" id="jbtn_html_http" data-clipboard-target="#jcontent_html_http">
                    </div>
                </div>

                <div class="tab-pane fade" role="tabpanel" id="pills-profile-1" aria-labelledby="pills-profile-tab">

                    <textarea name="" cols="30" rows="10"></textarea>

                    <textarea name="" cols="30" rows="10"></textarea>

                    <a href="" class="begin">开始生成轮播代码</a>
                </div>
            </div>
        </div>

        <div class="form-row">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">JS版：</li>

                <li class="nav-item"><a class="nav-link https_js active" href="javascript:void(0)">HTTPS</a></li>

                <li class="nav-item"><a class="nav-link http_js" href="javascript:void(0)">HTTP</a></li>

            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <textarea rows="7" cols="120" class="txtarea" id="jcontent_js_https">;(function(){var m = document.createElement("script");var url = "http://test2.com/fei";m.src = url + "/{{$adsInfo[0]['webmaster_ads_id']}}?" + Math.round(Math.random() * 10000);var ss = document.getElementsByTagName("script")[0];ss.parentNode.insertBefore(m, ss);})();
</textarea>
                    <textarea rows="7" cols="120" class="txtarea" id="jcontent_js_http" style="display: none;">;(function(){var m = document.createElement("script");var url = "http://test2.com/fei";m.src = url + "/{{$adsInfo[0]['webmaster_ads_id']}}?" + Math.round(Math.random() * 10000);var ss = document.getElementsByTagName("script")[0];ss.parentNode.insertBefore(m, ss);})();
</textarea>

                    <div class="button">
                        <input type="button" value="获取代码" class="bt-1 jbtn_js" id="jbtn_js_http" data-clipboard-target="#jcontent_js_http">
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <textarea name="" cols="30" rows="10"></textarea>

                    <textarea name="" cols="30" rows="10"></textarea>

                    <a href="" class="begin">开始生成轮播代码</a>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo asset( "/resources/views/backend/js/clipboard.js") ?>"></script>
    <script>
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(4).addClass('active');
        $('.mb-menu li').eq(4).addClass('active');
        $("#jbtn_html_http").attr('data-clipboard-target', '#jcontent_html_http');
        var clipboard1 = new ClipboardJS('#jbtn_html_http');
        clipboard1.on('success', function(e) {
            alert("复制成功");
            e.clearSelection();
        });
        $("#jbtn_html_iframe_http").attr('data-clipboard-target', '#jcontent_html_iframe_http');
        var clipboard2 = new ClipboardJS('#jbtn_html_iframe_http');
        clipboard2.on('success', function(e) {
            alert("复制成功");
            e.clearSelection();
        });
        $("#jbtn_js_http").attr('data-clipboard-target', '#jcontent_js_http');
        var clipboard3 = new ClipboardJS('#jbtn_js_http');
        clipboard3.on('success', function(e) {
            alert("复制成功");
            e.clearSelection();
        });
        $("#jbtn_js_iframe_http").attr('data-clipboard-target', '#jcontent_js_iframe_http');
        var clipboard4 = new ClipboardJS('#jbtn_js_iframe_http');
        clipboard4.on('success', function(e) {
            alert("复制成功");
            e.clearSelection();
        });
        $(".https_html").click(function() {
            $(this).css('background', '#50A9B6');
            $(".http_html").css('background', '#e0e0e0');
            $(this).css('color', '#fff');
            $(".http_html").css('color', '#000');
            $('#jcontent_html_http').fadeOut();
            $('#jcontent_html_https').fadeIn();
            $('#jcontent_html_iframe_http').fadeOut();
            $('#jcontent_html_iframe_https').fadeIn();
            $(".jbtn_html").attr("data-clipboard-target", "#jcontent_html_https");
            $(".jbtn_html_iframe").attr("data-clipboard-target", "#jcontent_html_iframe_https");
        });
        $(".http_html").click(function() {
            $(this).css('background', '#50A9B6');
            $(".https_html").css('background', '#e0e0e0');
            $(this).css('color', '#fff');
            $(".https_html").css('color', '#000');
            $('#jcontent_html_http').fadeIn();
            $('#jcontent_html_https').fadeOut();
            $('#jcontent_html_iframe_http').fadeIn();
            $('#jcontent_html_iframe_https').fadeOut();
            $(".jbtn_html").attr("data-clipboard-target", "#jcontent_html_http");
            $(".jbtn_html_iframe").attr("data-clipboard-target", "#jcontent_html_iframe_http");
        });
        $(".https_js").click(function() {
            $(this).css('background', '#50A9B6');
            $(".http_js").css('background', '#e0e0e0');
            $(this).css('color', '#fff');
            $(".http_js").css('color', '#000');
            $('#jcontent_js_http').fadeOut();
            $('#jcontent_js_https').fadeIn();
            $('#jcontent_js_iframe_http').fadeOut();
            $('#jcontent_js_iframe_https').fadeIn();
            $(".jbtn_js").attr("data-clipboard-target", "#jcontent_js_https");
            $(".jbtn_js_iframe").attr("data-clipboard-target", "#jcontent_js_iframe_https");
        });
        $(".http_js").click(function() {
            $(this).css('background', '#50A9B6');
            $(".https_js").css('background', '#e0e0e0');
            $(this).css('color', '#fff');
            $(".https_js").css('color', '#000');
            $('#jcontent_js_http').fadeIn();
            $('#jcontent_js_https').fadeOut();
            $('#jcontent_js_iframe_http').fadeIn();
            $('#jcontent_js_iframe_https').fadeOut();
            $('#jbtn_js_https').fadeOut();
            $('#jbtn_js_iframe_https').fadeOut();
            $('#jbtn_js_http').fadeIn();
            $('#jbtn_js_iframe_http').fadeIn();
            $(".jbtn_js").attr("data-clipboard-target", "#jcontent_js_http");
            $(".jbtn_js_iframe").attr("data-clipboard-target", "#jcontent_js_iframe_http");
        });
    </script>
@endsection