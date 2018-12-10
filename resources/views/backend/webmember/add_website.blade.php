@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 添加新网站</p>
        <!--position-->

        <form id="form_insert">
            <div class="insert">
                <h5 class="head-title">添加新网站</h5>
                <input type="hidden" value="1" name="ajax_do">
                <input type="hidden" value="" name="domain_check" id="domain_check">
                <input type="hidden" value="" name="domain" id="domain">
                <input type="hidden" value="1" name="check_domain" id="check_domain">
                <p class="warning"><i class="iconfont icon-jingshi"></i>禁止淫秽、色情、赌博、暴力或者教唆犯罪等违反国家法律、法规的网站投放本联盟代码，一经发现，将立即做封号处理。</p>

                <div class="input-list">
                    <div class="input">
                        <span>网站名称：</span>

                        <input type="text" class="search-input" name="name" id="name">
                    </div>

                    <div class="input">
                        <span>域名：</span>

                        <input type="text" class="search-input" name="domain_temp" id="domain_temp">
                        <input type="button" id="jcheck_domain" value="域名验证" class="sm-button">
                    </div>

                    <div class="check-hide" id="jcheck_info" style="display:none;">
                        <div class="form_cont">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input jt" type="radio" name="verify_type" id="t0" value="file" checked="checked">
                                <label class="form-check-label jt" for="t0">验证方式一：文件验证</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input jt" type="radio" name="verify_type" id="t1" value="html">
                                <label class="form-check-label jt" for="t1">验证方式二：HTML标签验证</label>
                            </div>
                        </div>

                        <div class="check-1" id="jt0" style="display:none;">
                            <p class="tip">1.请点击“<a href="" id="jfile">下载验证文件</a>”获取验证文件；</p>
                            <p class="tip">2.请将验证文件放置于您所配置域名（如<span class="num" id="youSite">www.yoursite.com</span>）的根目录下；</p>
                            <p class="tip">3.点击“完成验证”按钮；</p>
                        </div>

                        <div class="check-2" id="jt1" style="display:none;">
                            <textarea name="" cols="30" rows="10" id="jhtml" readonly=""></textarea>

                            <p class="tip tip-2">将以上代码添加到您网站首页HTML代码的标签与标签之间，并点击"完成验证"按钮。</p>
                        </div>

                        <input type="button" value="完成验证" class="finished jbtn_csave">

                        <input type="button" value="取消" class="cancel grayBtn" id="jcinfo">
                    </div>

                    <div class="input">
                        <span>网站备案号：</span>

                        <input type="text" class="search-input" name="icp" id="icp">
                    </div>

                    <div class="input">
                        <span>网站类型：</span>
                        <select name="mobile_domain_category_id" id="mobile_domain_category_id">
                            <option value="1">综合门户</option>
                            <option value="3">新闻资讯</option>
                            <option value="5">体育竞技</option>
                            <option value="7">图片网站</option>
                            <option value="9">明星八卦</option>
                            <option value="11">小说B</option>
                            <option value="13">聊天社区</option>
                            <option value="15">动漫漫画</option>
                            <option value="17">游戏娱乐</option>
                            <option value="19">女性时尚</option>
                            <option value="21">美食购物</option>
                            <option value="23">生活旅游</option>
                            <option value="25">行业相关</option>
                            <option value="27">电脑软件</option>
                            <option value="29">银行金融</option>
                            <option value="31">教育教学</option>
                            <option value="33">婚恋交友</option>
                            <option value="35">其他网站</option>
                            <option value="37">政治军事</option>
                            <option value="39">言情小说</option>
                            <option value="41">美女微拍</option>
                            <option value="43">微信小说</option>
                            <option value="53">玄幻小说</option>
                            <option value="55">小说劫持</option>
                            <option value="61">影视类</option>
                            <option value="57">影视劫持</option>
                        </select>
                    </div>
                    <div class="button">
                        <input class="big_btn subBtn jbtn_save" type="button" value="保 存">
                        <input class="big_btn grayBtn jbtn_cancel" type="button" value="取 消">
                    </div>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(2).addClass('active');
            $('.mb-menu li').eq(2).addClass('active');
        </script>

@endsection