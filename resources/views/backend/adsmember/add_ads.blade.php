@extends("backend.layout.adslayout")
@section("content")

    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 发布广告</p>
        <!--position-->

        <link rel="stylesheet" type="text/css" href="/js/webuploader/webuploader.css">
        <link rel="stylesheet" type="text/css" href="/js/webuploader/demo.css">
        <script type="text/javascript" src="/js/webuploader/webuploader.min.js"></script>
        <form id="form_insert" method="post">
            <div class="insert-app ads-advert-update">
                <h5 class="head-title">新建广告</h5>
                <input type="hidden" value="1" name="ajax_do">
                <input type="hidden" name="response" value="">
                <div class="con">
                    <div class="form_row">
                        <span class="form-ti">广告名称：</span>

                        <input type="text" class="search-input" value="" name="name" id="name">

                        <p class="tips mb-hide"><i>*</i>该名称方便您在我们的系统识别该广告，手机用户是看不到这个名称。</p>
                    </div>

                    <div class="form_row">
                        <span class="form-ti">计费类型：</span>
                        <div class="form_cont">
                            <span class="form_group w150"> <label> <input type="radio" name="mobile_charge_type_id" value="1" id="cti_1" checked="checked">CPM</label> </span>
                            <span class="form_group w150"> <label> <input type="radio" name="mobile_charge_type_id" value="3" id="cti_3">CPC</label> </span>
                        </div>
                    </div>
                    <div class="form_row">
                        <span class="form-ti">广告类型：</span>
                        <div class="form_cont">
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(1)" value="1" id="ati_1" checked="checked"> 横幅</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(11)" value="11" id="ati_11"> 网摘</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(13)" value="13" id="ati_13"> 横幅（微信）</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(15)" value="15" id="ati_15"> 网摘（微信）</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(19)" value="19" id="ati_19"> 小图标</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(23)" value="23" id="ati_23"> 富媒体（PC）</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(25)" value="25" id="ati_25"> 弹窗（PC）</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(29)" value="29" id="ati_29"> 开屏（APP）</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(31)" value="31" id="ati_31"> 视频</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(33)" value="33" id="ati_33"> 网摘双图</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(35)" value="35" id="ati_35"> 横幅双图</label></span>
                            <span class="form_group w150" style=""> <label> <input type="radio" name="mobile_advert_type_id" onclick="change_suite_url(37)" value="37" id="ati_37"> 六星横幅</label></span>
                        </div>
                    </div>

                    <div class="form_row" id="os">
                        <div class="form-ti">投放设备系统：</div>

                        <div class="form_cont">
                            <span class="form_group w100"> <label> <input type="checkbox" name="os[]" value="android"> Android</label></span>
                            <span class="form_group w100"> <label> <input type="checkbox" name="os[]" value="ios"> IOS</label></span>
                            <p class="tips mb-hide"><i>*</i>全不选，默认两种都投放。横幅CPM只能选择一种投放系统</p>
                        </div>
                    </div>

                    <div class="form_row">
                        <span class="form-ti">推广链接：</span>

                        <input type="text" class="search-input" name="site_url" id="site_url">
                    </div>

                    <div class="form_row" id="material_bag">
                        <span class="form-ti">选择创意包：</span>

                        <div class="form_cont">
                            <div class="form-border form-border-no d_material_choose clearfix" id="creative_suite_li">
                            </div>

                            <div class="form-border">

                                <div class="input">
                                    <input type="text" class="search-input" name="keyword">

                                    <input type="button" value="查询" class="check check-h btnsearch">

                                    <span class="refresh"><i class="iconfont icon-shuaxin btnsearch"></i></span>

                                    <a href="/service/business/mobile/creative/suite/action/insert.html" target="_blank" class="right add_btn">+ 添加创意包</a>
                                </div>

                                <div class="search-area-bg"></div>
                                <div class="tab_block clearfix" id="creative_suite"><div class="tab_box mb-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="mb-hide">ID</th>
                                                <th scope="col">名称</th>
                                                <th scope="col" class="mb-hide">广告投放类型</th>
                                                <th scope="col" class="mb-hide">状态</th>
                                                <th scope="col" class="long-table">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="bgWhite">
                                                <td scope="row" class="mb-hide">61017</td>
                                                <td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/10/0/1540525988386.gif" class="img_material">test4</div></td>
                                                <td class="mb-hide">横幅</td>
                                                <td class="mb-hide">审核中</td>
                                                <td class="long-table"><div class="opr"><a id="s_61017" href="javascript:void(0)" class="'' " onclick="MobileAdvert.event_add_creative_suite({&quot;id&quot;:&quot;61017&quot;,&quot;name&quot;:&quot;test4&quot;,&quot;cover&quot;:&quot;2018\/10\/0\/1540525988386.gif&quot;,&quot;type_name&quot;:&quot;\u624b\u673a\u6e38\u620f&quot;,&quot;advert_type_name&quot;:&quot;\u6a2a\u5e45&quot;,&quot;cover_str&quot;:&quot;http:\/\/img1.gtmpekda1.cn\/union\/mobile\/creative\/slave\/2018\/10\/0\/1540525988386.gif&quot;,&quot;state&quot;:&quot;\u5ba1\u6838\u4e2d&quot;})" title="选择素材包"><i class="iconfont icon-xuanze"></i>选择素材包</a><a target="_blank" class="btnView" title="查看" href="/service/business/mobile/creative/suite/action/update/61017"><i class="iconfont icon-yulan"></i>查看创意</a></div></td>
                                            </tr>
                                            <tr class="bggray">
                                                <td scope="row" class="mb-hide">60989</td>
                                                <td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2014/07/1/1404892989435.gif" class="img_material">test2</div></td>
                                                <td class="mb-hide">横幅</td>
                                                <td class="mb-hide">审核中</td>
                                                <td class="long-table"><div class="opr"><a id="s_60989" href="javascript:void(0)" class="'' " onclick="MobileAdvert.event_add_creative_suite({&quot;id&quot;:&quot;60989&quot;,&quot;name&quot;:&quot;test2&quot;,&quot;cover&quot;:&quot;2014\/07\/1\/1404892989435.gif&quot;,&quot;type_name&quot;:&quot;\u7f51\u8d5a&quot;,&quot;advert_type_name&quot;:&quot;\u6a2a\u5e45&quot;,&quot;cover_str&quot;:&quot;http:\/\/img1.gtmpekda1.cn\/union\/mobile\/creative\/slave\/2014\/07\/1\/1404892989435.gif&quot;,&quot;state&quot;:&quot;\u5ba1\u6838\u4e2d&quot;})" title="选择素材包"><i class="iconfont icon-xuanze"></i>选择素材包</a><a target="_blank" class="btnView" title="查看" href="/service/business/mobile/creative/suite/action/update/60989"><i class="iconfont icon-yulan"></i>查看创意</a></div></td>
                                            </tr>
                                            <tr class="bgWhite">
                                                <td scope="row" class="mb-hide">60473</td>
                                                <td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2014/07/1/1404892989435.gif" class="img_material">test3</div></td>
                                                <td class="mb-hide">横幅</td>
                                                <td class="mb-hide">审核中</td>
                                                <td class="long-table"><div class="opr"><a id="s_60473" href="javascript:void(0)" class="'' " onclick="MobileAdvert.event_add_creative_suite({&quot;id&quot;:&quot;60473&quot;,&quot;name&quot;:&quot;test3&quot;,&quot;cover&quot;:&quot;2014\/07\/1\/1404892989435.gif&quot;,&quot;type_name&quot;:&quot;\u5c0f\u8bf4&quot;,&quot;advert_type_name&quot;:&quot;\u6a2a\u5e45&quot;,&quot;cover_str&quot;:&quot;http:\/\/img1.gtmpekda1.cn\/union\/mobile\/creative\/slave\/2014\/07\/1\/1404892989435.gif&quot;,&quot;state&quot;:&quot;\u5ba1\u6838\u4e2d&quot;})" title="选择素材包"><i class="iconfont icon-xuanze"></i>选择素材包</a><a target="_blank" class="btnView" title="查看" href="/service/business/mobile/creative/suite/action/update/60473"><i class="iconfont icon-yulan"></i>查看创意</a></div></td>
                                            </tr>
                                            <tr class="bggray">
                                                <td scope="row" class="mb-hide">60387</td>
                                                <td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/10/0/1539769270301.gif" class="img_material">test</div></td>
                                                <td class="mb-hide">横幅</td>
                                                <td class="mb-hide">审核中</td>
                                                <td class="long-table"><div class="opr"><a id="s_60387" href="javascript:void(0)" class="'' " onclick="MobileAdvert.event_add_creative_suite({&quot;id&quot;:&quot;60387&quot;,&quot;name&quot;:&quot;test&quot;,&quot;cover&quot;:&quot;2018\/10\/0\/1539769270301.gif&quot;,&quot;type_name&quot;:&quot;\u6b63\u89c4\u4ea4\u53cb&quot;,&quot;advert_type_name&quot;:&quot;\u6a2a\u5e45&quot;,&quot;cover_str&quot;:&quot;http:\/\/img1.gtmpekda1.cn\/union\/mobile\/creative\/slave\/2018\/10\/0\/1539769270301.gif&quot;,&quot;state&quot;:&quot;\u5ba1\u6838\u4e2d&quot;})" title="选择素材包"><i class="iconfont icon-xuanze"></i>选择素材包</a><a target="_blank" class="btnView" title="查看" href="/service/business/mobile/creative/suite/action/update/60387"><i class="iconfont icon-yulan"></i>查看创意</a></div></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <ul class="pagination"><li>总共 <span>4</span> 条信息，每页显示 <span>10</span> 条</li><li class="active"><a>1</a></li></ul>
                                    <script type="text/Javascript" src="/js/image_preview.js"></script>
                                    <script type="text/javascript">
                                        <!--
                                            $(document).ready(function(){
                                                imagePreview();
                                            });
                                    </script></div>

                                <p class="slide-tip">可左右滑动浏览</p>

                            </div>
                        </div>
                    </div>
                    <div class="tab_block clearfix" id="creative_suite_slave" style="display:none;"><div class="form_row">
                            <div class="form_tit">互动广告名称：</div>
                            <div class="form_cont">
                                <input type="text" class="ipt w300" name="interact_title" id="title">
                            </div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">互动广告类型：</div>
                            <div class="form_cont">
                                <span class="form_group w150"> <label> <input type="radio" name="interact_type" value="kickback" checked="">大转盘</label></span>
                            </div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">互动广告图片：</div>
                            <div class="form_cont" id="pic_table"><div class="d_material_choose clearfix" id="pic_material"></div><div class="ad_material_box"><div class="bar_material"><div class="search_box"><input name="keyword_pic" type="text" class="ipt ipt200"><input class="sm_btn greenBtn btnsearch_pic" type="button" value="查 询"></div></div><div class="tab_block clearfix"><div class="tab_box"><table width="100%" border="0" cellspacing="0" cellpadding="0"><thead><tr class="thead_bg"><th>ID</th><th>名称</th><th class="nor">操作</th></tr></thead><tbody><tr><td>155875</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522294920008.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522294920008.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522294920008.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522294920008.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>155809</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522228635362.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522228635362.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522228635362.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522228635362.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>155867</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522288742199.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522288742199.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522288742199.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522288742199.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>155863</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522290944696.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522290944696.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522290944696.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522290944696.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>156059</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391441528.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522391441528.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391441528.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391441528.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>156065</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391334822.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522391334822.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391334822.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391334822.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>156063</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391335172.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522391335172.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391335172.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522391335172.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>155873</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522288741847.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522288741847.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522288741847.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522288741847.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>156007</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522378592666.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522378592666.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522378592666.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522378592666.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>155811</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522228635544.gif" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="pic" data-value="2018/03/0/1522228635544.gif" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522228635544.gif" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/03/0/1522228635544.gif"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr></tbody></table><input hidden="" name="interact_pic_url" value=""></div><div class="page"><li>总共 <span>30</span> 条信息，每页显示 <span>10</span> 条</li><li class="active"><a>1</a></li><li><a href="javascript:void(0)" onclick="MobileCreativeSuiteSlave.ajax_page_lists_advert_interact('http://www.17un.com/service/business/mobile/creative/suite/slave/action/json_lists_advert_interact/10.html?type=pic','pic')">2</a></li><li><a href="javascript:void(0)" onclick="MobileCreativeSuiteSlave.ajax_page_lists_advert_interact('http://www.17un.com/service/business/mobile/creative/suite/slave/action/json_lists_advert_interact/20.html?type=pic','pic')">3</a></li><li><a href="javascript:void(0)" onclick="MobileCreativeSuiteSlave.ajax_page_lists_advert_interact('http://www.17un.com/service/business/mobile/creative/suite/slave/action/json_lists_advert_interact/10.html?type=pic','pic')"><i class="iconfont icon-right"></i></a></li></div></div></div><br></div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">互动广告小图标：</div>
                            <div class="form_cont" id="ico_table"><div class="d_material_choose clearfix" id="ico_material"></div><div class="ad_material_box"><div class="bar_material"><div class="search_box"><input name="keyword_ico" type="text" class="ipt ipt200"><input class="sm_btn greenBtn btnsearch_ico" type="button" value="查 询"></div></div><div class="tab_block clearfix"><div class="tab_box"><table width="100%" border="0" cellspacing="0" cellpadding="0"><thead><tr class="thead_bg"><th>ID</th><th>名称</th><th class="nor">操作</th></tr></thead><tbody><tr><td>157383</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415339415.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523415339415.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415339415.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415339415.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157385</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415364053.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523415364053.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415364053.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415364053.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157885</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994643.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523586994643.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994643.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994643.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157883</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994540.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523586994540.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994540.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994540.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157881</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994438.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523586994438.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994438.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994438.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157879</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994088.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523586994088.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994088.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994088.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157887</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994735.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523586994735.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994735.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994735.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157889</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994844.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico" data-value="2018/04/0/1523586994844.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994844.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994844.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr></tbody></table><input hidden="" name="interact_ico_url" value=""></div><div class="page"><li>总共 <span>8</span> 条信息，每页显示 <span>10</span> 条</li><li class="active"><a>1</a></li></div></div></div><br></div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">互动广告描述：</div>
                            <div class="form_cont">
                                <textarea cols="80" rows="10" name="interact_describe" id="describe" class="txtarea"></textarea>
                            </div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">互动广告按钮名称：</div>
                            <div class="form_cont">
                                <input type="text" class="ipt w300" name="interact_button_name" id="button_name">
                            </div>
                        </div>
                        <script type="text/Javascript" src="/js/business/service/business/mobile/mobile_creative_suite_slave.js?1543995123"></script>
                        <script type="text/javascript">
                            MobileCreativeSuiteSlave.event_lists_advert_interact();
                        </script></div>
                    <div class="tab_block clearfix" id="creative_suite_video" style="display:none;"><div class="form_row">
                            <div class="form_tit">视频广告名称：</div>
                            <div class="form_cont">
                                <input type="text" class="ipt w300" name="interact_title" id="title">
                            </div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">视频广告小图标：</div>
                            <div class="form_cont" id="ico_video_table"><div class="d_material_choose clearfix" id="ico_video_material"></div><div class="ad_material_box"><div class="bar_material"><div class="search_box"><input name="keyword_ico_video" type="text" class="ipt ipt200"><input class="sm_btn greenBtn btnsearch_ico_video" type="button" value="查 询"></div></div><div class="tab_block clearfix"><div class="tab_box"><table width="100%" border="0" cellspacing="0" cellpadding="0"><thead><tr class="thead_bg"><th>ID</th><th>名称</th><th class="nor">操作</th></tr></thead><tbody><tr><td>157383</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415339415.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523415339415.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415339415.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415339415.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157385</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415364053.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523415364053.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415364053.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523415364053.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157885</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994643.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523586994643.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994643.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994643.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157883</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994540.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523586994540.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994540.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994540.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157881</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994438.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523586994438.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994438.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994438.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157879</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994088.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523586994088.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994088.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994088.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157887</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994735.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523586994735.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994735.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994735.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr><tr><td>157889</td><td><div class="tdpic"><img src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994844.png" class="img_material"></div></td><td><div class="opr"><a href="javascript:void(0)" class="sel_slave " data-type="ico_video" data-value="2018/04/0/1523586994844.png" data-src="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994844.png" title="选择素材"><i class="iconfont icon-xuanze"></i>选择素材</a><a target="_blank" class="btnView" title="查看" href="http://img1.gtmpekda1.cn/union/mobile/creative/slave/2018/04/0/1523586994844.png"><i class="iconfont icon-yulan"></i>查看创意</a></div></td></tr></tbody></table><input hidden="" name="interact_ico_video_url" value=""></div><div class="page"><li>总共 <span>8</span> 条信息，每页显示 <span>10</span> 条</li><li class="active"><a>1</a></li></div></div></div><br></div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">视频广告描述：</div>
                            <div class="form_cont">
                                <textarea cols="80" rows="10" name="interact_describe" id="describe" class="txtarea"></textarea>
                            </div>
                        </div>
                        <div class="form_row">
                            <div class="form_tit">视频广告按钮名称：</div>
                            <div class="form_cont">
                                <input type="text" class="ipt w300" name="interact_button_name" id="button_name">
                            </div>
                        </div>
                        <script type="text/Javascript" src="/js/business/service/business/mobile/mobile_creative_suite_slave.js?1543995123"></script>
                        <script type="text/javascript">
                            MobileCreativeSuiteSlave.event_lists_advert_interact_video();
                        </script></div>
                    <div class="form_row">
                        <span class="form-ti">投放日期：</span>

                        <div class="form_cont">
                            <ul class="date">
                                <li><input type="text" name="stime" value="2018-12-05" onclick="WdatePicker()"><i class="iconfont icon-gongdantubiao-"></i></li>
                                <li>至</li>
                                <li><input type="text" name="etime" value="2018-12-12" onclick="WdatePicker()"><i class="iconfont icon-gongdantubiao-"></i></li>
                            </ul>

                            <p class="tips"><i>*</i>投放结束时间不填则为不限制投放</p>
                        </div>
                    </div>

                    <div class="form_row fff">
                        <span class="form-ti">单价：</span>
                        <div class="form_cont">
                            <input type="text" class="search-input" name="price" value="">

                            <p class="tips">元</p>

                            <p class="tips"><i>*</i>1000次价格</p>
                        </div>
                    </div>

                    <div class="form_row">
                        <span class="form-ti">总预算：</span>

                        <div class="form_cont">
                            <input type="text" class="search-input" id="budget" name="budget" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">

                            <p class="tips"><i>*</i>广告的总消费, 0表示不限总预算</p>
                        </div>
                    </div>

                    <div class="form_row">
                        <span class="form-ti">每日预算：</span>
                        <div class="form_cont">
                            <input type="text" class="search-input" name="budget_daily" id="budget_daily" onkeyup="value=value.replace(/[^\d]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))">

                            <p class="tips"><i>*</i>推广期间的每日广告预算，0表示不限每日预算</p>
                        </div>
                    </div>

                    <div class="step_content" id="step_content3" style="">
                        <div class="form_row">
                            <div class="form-ti">日程设置：</div>
                            <div class="form_cont">
					<span class="form_group w100"> <label> <input type="radio" name="time" value="0" class="time_choose" id="zdlx01" checked="checked">不限时间
					</label>
					</span> <span class="form_group w100"> <label> <input type="radio" name="time" value="1" class="time_choose" id="zdlx02"> 制定时间
					</label>
					</span>
                                <div class="table_Box M_tableBox" id="time_choose" style="display:none">

                                    &nbsp;&nbsp;&nbsp;快速选择：
                                    <span style="cursor: pointer;margin-left: 10px;" class="querk_choose_time" jid="1">00:00-07:59</span><span style="padding-left: 20px; cursor: pointer;" class="querk_choose_time" jid="2">08:00-23:59</span><span style="padding-left: 20px;" class="sds"><input type="text" class="ipt w100" style="width: 50px;" id="check_stime" value="0"> - <input type="text" style="width: 50px;" class="ipt w100" id="check_etime" value="23"><input type="button" class="sm_btn greenBtn confirm_check" value="确认"></span>
                                    <table class="table">
                                        <tbody>


                                        <tr class="thead_bg">
                                            <th><span>日期</span></th>
                                            <th><span>时间段</span></th>
                                            <th><span style="cursor: pointer;" class="time_choose_day_v" jid="1">午夜(00-03)</span></th>
                                            <th><span style="cursor: pointer;" class="time_choose_day_v" jid="2">凌晨(04-07)</span></th>
                                            <th><span style="cursor: pointer;" class="time_choose_day_v" jid="3">早上(08-11)</span></th>
                                            <th><span style="cursor: pointer;" class="time_choose_day_v" jid="4">中午(12-15)</span></th>
                                            <th><span style="cursor: pointer;" class="time_choose_day_v" jid="5">下午(16-19)</span></th>
                                            <th class="nor"><span style="cursor: pointer;" class="time_choose_day_v" jid="6">晚上(20-23)</span></th>
                                        </tr>

                                        <tr id="class2">
                                            <td>星期日</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="0">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="1_0" id="0_0" onclick="MobileAdvert.event_add_time('0_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="0_0" id="input_0_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="1_0" id="0_1" onclick="MobileAdvert.event_add_time('0_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="0_1" id="input_0_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="1_0" id="0_2" onclick="MobileAdvert.event_add_time('0_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="0_2" id="input_0_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="1_0" id="0_3" onclick="MobileAdvert.event_add_time('0_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="0_3" id="input_0_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="2_0" id="0_4" onclick="MobileAdvert.event_add_time('0_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="0_4" id="input_0_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="2_0" id="0_5" onclick="MobileAdvert.event_add_time('0_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="0_5" id="input_0_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="2_0" id="0_6" onclick="MobileAdvert.event_add_time('0_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="0_6" id="input_0_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="2_0" id="0_7" onclick="MobileAdvert.event_add_time('0_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="0_7" id="input_0_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="3_0" id="0_8" onclick="MobileAdvert.event_add_time('0_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="0_8" id="input_0_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="3_0" id="0_9" onclick="MobileAdvert.event_add_time('0_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="0_9" id="input_0_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="3_0" id="0_10" onclick="MobileAdvert.event_add_time('0_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="0_10" id="input_0_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="3_0" id="0_11" onclick="MobileAdvert.event_add_time('0_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="0_11" id="input_0_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="4_0" id="0_12" onclick="MobileAdvert.event_add_time('0_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="0_12" id="input_0_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="4_0" id="0_13" onclick="MobileAdvert.event_add_time('0_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="0_13" id="input_0_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="4_0" id="0_14" onclick="MobileAdvert.event_add_time('0_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="0_14" id="input_0_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="4_0" id="0_15" onclick="MobileAdvert.event_add_time('0_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="0_15" id="input_0_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="5_0" id="0_16" onclick="MobileAdvert.event_add_time('0_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="0_16" id="input_0_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="5_0" id="0_17" onclick="MobileAdvert.event_add_time('0_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="0_17" id="input_0_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="5_0" id="0_18" onclick="MobileAdvert.event_add_time('0_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="0_18" id="input_0_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="5_0" id="0_19" onclick="MobileAdvert.event_add_time('0_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="0_19" id="input_0_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="6_0" id="0_20" onclick="MobileAdvert.event_add_time('0_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="0_20" id="input_0_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="6_0" id="0_21" onclick="MobileAdvert.event_add_time('0_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="0_21" id="input_0_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="6_0" id="0_22" onclick="MobileAdvert.event_add_time('0_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="0_22" id="input_0_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="0_0" jid_i_v="6_0" id="0_23" onclick="MobileAdvert.event_add_time('0_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="0_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="0_23" id="input_0_23"></span>		                            		</td>
                                        </tr>
                                        <tr id="class2">
                                            <td>星期一</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="1">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="1_0" id="1_0" onclick="MobileAdvert.event_add_time('1_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="1_0" id="input_1_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="1_0" id="1_1" onclick="MobileAdvert.event_add_time('1_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="1_1" id="input_1_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="1_0" id="1_2" onclick="MobileAdvert.event_add_time('1_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="1_2" id="input_1_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="1_0" id="1_3" onclick="MobileAdvert.event_add_time('1_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="1_3" id="input_1_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="2_0" id="1_4" onclick="MobileAdvert.event_add_time('1_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="1_4" id="input_1_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="2_0" id="1_5" onclick="MobileAdvert.event_add_time('1_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="1_5" id="input_1_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="2_0" id="1_6" onclick="MobileAdvert.event_add_time('1_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="1_6" id="input_1_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="2_0" id="1_7" onclick="MobileAdvert.event_add_time('1_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="1_7" id="input_1_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="3_0" id="1_8" onclick="MobileAdvert.event_add_time('1_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="1_8" id="input_1_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="3_0" id="1_9" onclick="MobileAdvert.event_add_time('1_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="1_9" id="input_1_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="3_0" id="1_10" onclick="MobileAdvert.event_add_time('1_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="1_10" id="input_1_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="3_0" id="1_11" onclick="MobileAdvert.event_add_time('1_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="1_11" id="input_1_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="4_0" id="1_12" onclick="MobileAdvert.event_add_time('1_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="1_12" id="input_1_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="4_0" id="1_13" onclick="MobileAdvert.event_add_time('1_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="1_13" id="input_1_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="4_0" id="1_14" onclick="MobileAdvert.event_add_time('1_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="1_14" id="input_1_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="4_0" id="1_15" onclick="MobileAdvert.event_add_time('1_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="1_15" id="input_1_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="5_0" id="1_16" onclick="MobileAdvert.event_add_time('1_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="1_16" id="input_1_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="5_0" id="1_17" onclick="MobileAdvert.event_add_time('1_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="1_17" id="input_1_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="5_0" id="1_18" onclick="MobileAdvert.event_add_time('1_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="1_18" id="input_1_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="5_0" id="1_19" onclick="MobileAdvert.event_add_time('1_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="1_19" id="input_1_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="6_0" id="1_20" onclick="MobileAdvert.event_add_time('1_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="1_20" id="input_1_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="6_0" id="1_21" onclick="MobileAdvert.event_add_time('1_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="1_21" id="input_1_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="6_0" id="1_22" onclick="MobileAdvert.event_add_time('1_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="1_22" id="input_1_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="1_0" jid_i_v="6_0" id="1_23" onclick="MobileAdvert.event_add_time('1_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="1_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="1_23" id="input_1_23"></span>		                            		</td>
                                        </tr>
                                        <tr id="class2">
                                            <td>星期二</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="2">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="1_0" id="2_0" onclick="MobileAdvert.event_add_time('2_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="2_0" id="input_2_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="1_0" id="2_1" onclick="MobileAdvert.event_add_time('2_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="2_1" id="input_2_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="1_0" id="2_2" onclick="MobileAdvert.event_add_time('2_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="2_2" id="input_2_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="1_0" id="2_3" onclick="MobileAdvert.event_add_time('2_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="2_3" id="input_2_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="2_0" id="2_4" onclick="MobileAdvert.event_add_time('2_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="2_4" id="input_2_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="2_0" id="2_5" onclick="MobileAdvert.event_add_time('2_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="2_5" id="input_2_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="2_0" id="2_6" onclick="MobileAdvert.event_add_time('2_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="2_6" id="input_2_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="2_0" id="2_7" onclick="MobileAdvert.event_add_time('2_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="2_7" id="input_2_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="3_0" id="2_8" onclick="MobileAdvert.event_add_time('2_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="2_8" id="input_2_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="3_0" id="2_9" onclick="MobileAdvert.event_add_time('2_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="2_9" id="input_2_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="3_0" id="2_10" onclick="MobileAdvert.event_add_time('2_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="2_10" id="input_2_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="3_0" id="2_11" onclick="MobileAdvert.event_add_time('2_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="2_11" id="input_2_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="4_0" id="2_12" onclick="MobileAdvert.event_add_time('2_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="2_12" id="input_2_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="4_0" id="2_13" onclick="MobileAdvert.event_add_time('2_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="2_13" id="input_2_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="4_0" id="2_14" onclick="MobileAdvert.event_add_time('2_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="2_14" id="input_2_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="4_0" id="2_15" onclick="MobileAdvert.event_add_time('2_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="2_15" id="input_2_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="5_0" id="2_16" onclick="MobileAdvert.event_add_time('2_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="2_16" id="input_2_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="5_0" id="2_17" onclick="MobileAdvert.event_add_time('2_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="2_17" id="input_2_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="5_0" id="2_18" onclick="MobileAdvert.event_add_time('2_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="2_18" id="input_2_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="5_0" id="2_19" onclick="MobileAdvert.event_add_time('2_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="2_19" id="input_2_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="6_0" id="2_20" onclick="MobileAdvert.event_add_time('2_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="2_20" id="input_2_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="6_0" id="2_21" onclick="MobileAdvert.event_add_time('2_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="2_21" id="input_2_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="6_0" id="2_22" onclick="MobileAdvert.event_add_time('2_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="2_22" id="input_2_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="2_0" jid_i_v="6_0" id="2_23" onclick="MobileAdvert.event_add_time('2_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="2_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="2_23" id="input_2_23"></span>		                            		</td>
                                        </tr>
                                        <tr id="class2">
                                            <td>星期三</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="3">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="1_0" id="3_0" onclick="MobileAdvert.event_add_time('3_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="3_0" id="input_3_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="1_0" id="3_1" onclick="MobileAdvert.event_add_time('3_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="3_1" id="input_3_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="1_0" id="3_2" onclick="MobileAdvert.event_add_time('3_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="3_2" id="input_3_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="1_0" id="3_3" onclick="MobileAdvert.event_add_time('3_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="3_3" id="input_3_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="2_0" id="3_4" onclick="MobileAdvert.event_add_time('3_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="3_4" id="input_3_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="2_0" id="3_5" onclick="MobileAdvert.event_add_time('3_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="3_5" id="input_3_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="2_0" id="3_6" onclick="MobileAdvert.event_add_time('3_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="3_6" id="input_3_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="2_0" id="3_7" onclick="MobileAdvert.event_add_time('3_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="3_7" id="input_3_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="3_0" id="3_8" onclick="MobileAdvert.event_add_time('3_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="3_8" id="input_3_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="3_0" id="3_9" onclick="MobileAdvert.event_add_time('3_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="3_9" id="input_3_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="3_0" id="3_10" onclick="MobileAdvert.event_add_time('3_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="3_10" id="input_3_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="3_0" id="3_11" onclick="MobileAdvert.event_add_time('3_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="3_11" id="input_3_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="4_0" id="3_12" onclick="MobileAdvert.event_add_time('3_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="3_12" id="input_3_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="4_0" id="3_13" onclick="MobileAdvert.event_add_time('3_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="3_13" id="input_3_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="4_0" id="3_14" onclick="MobileAdvert.event_add_time('3_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="3_14" id="input_3_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="4_0" id="3_15" onclick="MobileAdvert.event_add_time('3_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="3_15" id="input_3_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="5_0" id="3_16" onclick="MobileAdvert.event_add_time('3_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="3_16" id="input_3_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="5_0" id="3_17" onclick="MobileAdvert.event_add_time('3_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="3_17" id="input_3_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="5_0" id="3_18" onclick="MobileAdvert.event_add_time('3_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="3_18" id="input_3_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="5_0" id="3_19" onclick="MobileAdvert.event_add_time('3_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="3_19" id="input_3_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="6_0" id="3_20" onclick="MobileAdvert.event_add_time('3_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="3_20" id="input_3_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="6_0" id="3_21" onclick="MobileAdvert.event_add_time('3_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="3_21" id="input_3_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="6_0" id="3_22" onclick="MobileAdvert.event_add_time('3_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="3_22" id="input_3_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="3_0" jid_i_v="6_0" id="3_23" onclick="MobileAdvert.event_add_time('3_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="3_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="3_23" id="input_3_23"></span>		                            		</td>
                                        </tr>
                                        <tr id="class2">
                                            <td>星期四</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="4">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="1_0" id="4_0" onclick="MobileAdvert.event_add_time('4_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="4_0" id="input_4_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="1_0" id="4_1" onclick="MobileAdvert.event_add_time('4_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="4_1" id="input_4_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="1_0" id="4_2" onclick="MobileAdvert.event_add_time('4_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="4_2" id="input_4_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="1_0" id="4_3" onclick="MobileAdvert.event_add_time('4_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="4_3" id="input_4_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="2_0" id="4_4" onclick="MobileAdvert.event_add_time('4_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="4_4" id="input_4_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="2_0" id="4_5" onclick="MobileAdvert.event_add_time('4_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="4_5" id="input_4_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="2_0" id="4_6" onclick="MobileAdvert.event_add_time('4_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="4_6" id="input_4_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="2_0" id="4_7" onclick="MobileAdvert.event_add_time('4_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="4_7" id="input_4_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="3_0" id="4_8" onclick="MobileAdvert.event_add_time('4_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="4_8" id="input_4_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="3_0" id="4_9" onclick="MobileAdvert.event_add_time('4_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="4_9" id="input_4_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="3_0" id="4_10" onclick="MobileAdvert.event_add_time('4_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="4_10" id="input_4_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="3_0" id="4_11" onclick="MobileAdvert.event_add_time('4_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="4_11" id="input_4_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="4_0" id="4_12" onclick="MobileAdvert.event_add_time('4_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="4_12" id="input_4_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="4_0" id="4_13" onclick="MobileAdvert.event_add_time('4_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="4_13" id="input_4_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="4_0" id="4_14" onclick="MobileAdvert.event_add_time('4_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="4_14" id="input_4_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="4_0" id="4_15" onclick="MobileAdvert.event_add_time('4_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="4_15" id="input_4_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="5_0" id="4_16" onclick="MobileAdvert.event_add_time('4_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="4_16" id="input_4_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="5_0" id="4_17" onclick="MobileAdvert.event_add_time('4_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="4_17" id="input_4_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="5_0" id="4_18" onclick="MobileAdvert.event_add_time('4_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="4_18" id="input_4_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="5_0" id="4_19" onclick="MobileAdvert.event_add_time('4_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="4_19" id="input_4_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="6_0" id="4_20" onclick="MobileAdvert.event_add_time('4_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="4_20" id="input_4_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="6_0" id="4_21" onclick="MobileAdvert.event_add_time('4_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="4_21" id="input_4_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="6_0" id="4_22" onclick="MobileAdvert.event_add_time('4_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="4_22" id="input_4_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="4_0" jid_i_v="6_0" id="4_23" onclick="MobileAdvert.event_add_time('4_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="4_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="4_23" id="input_4_23"></span>		                            		</td>
                                        </tr>
                                        <tr id="class2">
                                            <td>星期五</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="5">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="1_0" id="5_0" onclick="MobileAdvert.event_add_time('5_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="5_0" id="input_5_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="1_0" id="5_1" onclick="MobileAdvert.event_add_time('5_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="5_1" id="input_5_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="1_0" id="5_2" onclick="MobileAdvert.event_add_time('5_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="5_2" id="input_5_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="1_0" id="5_3" onclick="MobileAdvert.event_add_time('5_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="5_3" id="input_5_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="2_0" id="5_4" onclick="MobileAdvert.event_add_time('5_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="5_4" id="input_5_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="2_0" id="5_5" onclick="MobileAdvert.event_add_time('5_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="5_5" id="input_5_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="2_0" id="5_6" onclick="MobileAdvert.event_add_time('5_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="5_6" id="input_5_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="2_0" id="5_7" onclick="MobileAdvert.event_add_time('5_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="5_7" id="input_5_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="3_0" id="5_8" onclick="MobileAdvert.event_add_time('5_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="5_8" id="input_5_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="3_0" id="5_9" onclick="MobileAdvert.event_add_time('5_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="5_9" id="input_5_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="3_0" id="5_10" onclick="MobileAdvert.event_add_time('5_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="5_10" id="input_5_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="3_0" id="5_11" onclick="MobileAdvert.event_add_time('5_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="5_11" id="input_5_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="4_0" id="5_12" onclick="MobileAdvert.event_add_time('5_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="5_12" id="input_5_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="4_0" id="5_13" onclick="MobileAdvert.event_add_time('5_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="5_13" id="input_5_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="4_0" id="5_14" onclick="MobileAdvert.event_add_time('5_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="5_14" id="input_5_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="4_0" id="5_15" onclick="MobileAdvert.event_add_time('5_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="5_15" id="input_5_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="5_0" id="5_16" onclick="MobileAdvert.event_add_time('5_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="5_16" id="input_5_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="5_0" id="5_17" onclick="MobileAdvert.event_add_time('5_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="5_17" id="input_5_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="5_0" id="5_18" onclick="MobileAdvert.event_add_time('5_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="5_18" id="input_5_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="5_0" id="5_19" onclick="MobileAdvert.event_add_time('5_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="5_19" id="input_5_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="6_0" id="5_20" onclick="MobileAdvert.event_add_time('5_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="5_20" id="input_5_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="6_0" id="5_21" onclick="MobileAdvert.event_add_time('5_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="5_21" id="input_5_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="6_0" id="5_22" onclick="MobileAdvert.event_add_time('5_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="5_22" id="input_5_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="5_0" jid_i_v="6_0" id="5_23" onclick="MobileAdvert.event_add_time('5_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="5_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="5_23" id="input_5_23"></span>		                            		</td>
                                        </tr>
                                        <tr id="class2">
                                            <td>星期六</td>
                                            <td style="cursor:pointer;" class="time_choose_day" jid="6">全天</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="1_0" id="6_0" onclick="MobileAdvert.event_add_time('6_0')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="6_0" id="input_6_0"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="1_0" id="6_1" onclick="MobileAdvert.event_add_time('6_1')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="6_1" id="input_6_1"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="1_0" id="6_2" onclick="MobileAdvert.event_add_time('6_2')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="6_2" id="input_6_2"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="1_0" id="6_3" onclick="MobileAdvert.event_add_time('6_3')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="1_0" name="time_array[]" type="checkbox" value="6_3" id="input_6_3"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="2_0" id="6_4" onclick="MobileAdvert.event_add_time('6_4')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="6_4" id="input_6_4"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="2_0" id="6_5" onclick="MobileAdvert.event_add_time('6_5')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="6_5" id="input_6_5"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="2_0" id="6_6" onclick="MobileAdvert.event_add_time('6_6')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="6_6" id="input_6_6"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="2_0" id="6_7" onclick="MobileAdvert.event_add_time('6_7')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="2_0" name="time_array[]" type="checkbox" value="6_7" id="input_6_7"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="3_0" id="6_8" onclick="MobileAdvert.event_add_time('6_8')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="6_8" id="input_6_8"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="3_0" id="6_9" onclick="MobileAdvert.event_add_time('6_9')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="6_9" id="input_6_9"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="3_0" id="6_10" onclick="MobileAdvert.event_add_time('6_10')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="6_10" id="input_6_10"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="3_0" id="6_11" onclick="MobileAdvert.event_add_time('6_11')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="3_0" name="time_array[]" type="checkbox" value="6_11" id="input_6_11"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="4_0" id="6_12" onclick="MobileAdvert.event_add_time('6_12')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="6_12" id="input_6_12"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="4_0" id="6_13" onclick="MobileAdvert.event_add_time('6_13')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="6_13" id="input_6_13"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="4_0" id="6_14" onclick="MobileAdvert.event_add_time('6_14')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="6_14" id="input_6_14"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="4_0" id="6_15" onclick="MobileAdvert.event_add_time('6_15')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="4_0" name="time_array[]" type="checkbox" value="6_15" id="input_6_15"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="5_0" id="6_16" onclick="MobileAdvert.event_add_time('6_16')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="6_16" id="input_6_16"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="5_0" id="6_17" onclick="MobileAdvert.event_add_time('6_17')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="6_17" id="input_6_17"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="5_0" id="6_18" onclick="MobileAdvert.event_add_time('6_18')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="6_18" id="input_6_18"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="5_0" id="6_19" onclick="MobileAdvert.event_add_time('6_19')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="5_0" name="time_array[]" type="checkbox" value="6_19" id="input_6_19"></span>		                            		</td>
                                            <td width="100" style="padding-left:8px;">
                                                <i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="6_0" id="6_20" onclick="MobileAdvert.event_add_time('6_20')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="6_20" id="input_6_20"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="6_0" id="6_21" onclick="MobileAdvert.event_add_time('6_21')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="6_21" id="input_6_21"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="6_0" id="6_22" onclick="MobileAdvert.event_add_time('6_22')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="6_22" id="input_6_22"></span><i style="margin: 0 2px;" class="iconfont icon-xuankuang" jid_i="6_0" jid_i_v="6_0" id="6_23" onclick="MobileAdvert.event_add_time('6_23')"></i><span style="display:;"><input class="time_choose_input" jid_input="6_0" jid_input_v="6_0" name="time_array[]" type="checkbox" value="6_23" id="input_6_23"></span>		                            		</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--form_row end-->
                        <div class="form_row">
                            <div class="form-ti">定向地区：</div>
                            <div class="form_cont">
					<span class="form_group w100"> <label> <input type="radio" name="area" value="0" class="area" id="tfdq01" checked="checked"> 不限
					</label>
					</span> <span class="form_group w100"> <label> <input type="radio" name="area" value="1" class="area" id="tfdq02"> 选择地区
					</label>
					</span>
                                <div class="tableBox directSelect" id="p_c_area" style="display:none">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <th class="nor" style="text-align: left"><span>定向方式</span></th>
                                        </tr>
                                        <tr>
                                            <td><span style="width: 150px"><label><input type="radio" name="order_area_type" value="allow">定向</label></span> <span style="width: 150px"><label><input type="radio" name="order_area_type" value="forbid">排除</label></span></td>
                                        </tr>
                                        <tr>
                                            <th class="nor" style="text-align: left"><span>地区</span></th>
                                        </tr>
                                        <tr>
                                            <td>
					                             <span class="c_province">
                                                     <label class="c_province_b" pid="11"><input type="checkbox" class="province" id="p_11">北京</label>
                                                     <div class="c_city" style="display:none;" id="div_p_11">
                                                         <ul class="M-commonSLCSub">
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_1" pid="11" class="c_city_b" c_pid="c_p_11" value="11_101">东城</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_2" pid="11" class="c_city_b" c_pid="c_p_11" value="11_102">西城</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_3" pid="11" class="c_city_b" c_pid="c_p_11" value="11_103">崇文</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_4" pid="11" class="c_city_b" c_pid="c_p_11" value="11_104">宣武</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_5" pid="11" class="c_city_b" c_pid="c_p_11" value="11_105">朝阳</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_6" pid="11" class="c_city_b" c_pid="c_p_11" value="11_106">丰台</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_7" pid="11" class="c_city_b" c_pid="c_p_11" value="11_107">石景山</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_8" pid="11" class="c_city_b" c_pid="c_p_11" value="11_108">海淀</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_9" pid="11" class="c_city_b" c_pid="c_p_11" value="11_109">门头沟</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_10" pid="11" class="c_city_b" c_pid="c_p_11" value="11_111">房山</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_11" pid="11" class="c_city_b" c_pid="c_p_11" value="11_112">通州</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_12" pid="11" class="c_city_b" c_pid="c_p_11" value="11_113">顺义</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_13" pid="11" class="c_city_b" c_pid="c_p_11" value="11_114">昌平</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_14" pid="11" class="c_city_b" c_pid="c_p_11" value="11_115">大兴</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_15" pid="11" class="c_city_b" c_pid="c_p_11" value="11_116">怀柔</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_16" pid="11" class="c_city_b" c_pid="c_p_11" value="11_117">平谷</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_17" pid="11" class="c_city_b" c_pid="c_p_11" value="11_228">密云</label></li>
                                                            <li><label><input type="checkbox" name="area_array[]" data-type="sub" id="11_18" pid="11" class="c_city_b" c_pid="c_p_11" value="11_229">延庆</label></li>
                                                         </ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="22">
						                              				<input type="checkbox" class="province" id="p_22">
						                              				吉林</label>
						                              			<div class="c_city" style="display:none;" id="div_p_22">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_1" pid="22" class="c_city_b" c_pid="c_p_22" value="22_100">长春</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_2" pid="22" class="c_city_b" c_pid="c_p_22" value="22_200">吉林</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_3" pid="22" class="c_city_b" c_pid="c_p_22" value="22_300">四平</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_4" pid="22" class="c_city_b" c_pid="c_p_22" value="22_400">辽源</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_5" pid="22" class="c_city_b" c_pid="c_p_22" value="22_500">通化</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_6" pid="22" class="c_city_b" c_pid="c_p_22" value="22_600">白山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_7" pid="22" class="c_city_b" c_pid="c_p_22" value="22_700">松原</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_8" pid="22" class="c_city_b" c_pid="c_p_22" value="22_800">白城</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="22_9" pid="22" class="c_city_b" c_pid="c_p_22" value="22_2400">延边</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="35">
						                              				<input type="checkbox" class="province" id="p_35">
						                              				福建						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_35">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_1" pid="35" class="c_city_b" c_pid="c_p_35" value="35_100">福州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_2" pid="35" class="c_city_b" c_pid="c_p_35" value="35_200">厦门</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_3" pid="35" class="c_city_b" c_pid="c_p_35" value="35_300">莆田</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_4" pid="35" class="c_city_b" c_pid="c_p_35" value="35_400">三明</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_5" pid="35" class="c_city_b" c_pid="c_p_35" value="35_500">泉州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_6" pid="35" class="c_city_b" c_pid="c_p_35" value="35_600">漳州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_7" pid="35" class="c_city_b" c_pid="c_p_35" value="35_700">南平</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_8" pid="35" class="c_city_b" c_pid="c_p_35" value="35_800">龙岩</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="35_9" pid="35" class="c_city_b" c_pid="c_p_35" value="35_900">宁德</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="44">
						                              				<input type="checkbox" class="province" id="p_44">
						                              				广东						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_44">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_1" pid="44" class="c_city_b" c_pid="c_p_44" value="44_100">广州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_2" pid="44" class="c_city_b" c_pid="c_p_44" value="44_200">韶关</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_3" pid="44" class="c_city_b" c_pid="c_p_44" value="44_300">深圳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_4" pid="44" class="c_city_b" c_pid="c_p_44" value="44_400">珠海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_5" pid="44" class="c_city_b" c_pid="c_p_44" value="44_500">汕头</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_6" pid="44" class="c_city_b" c_pid="c_p_44" value="44_600">佛山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_7" pid="44" class="c_city_b" c_pid="c_p_44" value="44_700">江门</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_8" pid="44" class="c_city_b" c_pid="c_p_44" value="44_800">湛江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_9" pid="44" class="c_city_b" c_pid="c_p_44" value="44_900">茂名</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_10" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1200">肇庆</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_11" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1300">惠州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_12" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1400">梅州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_13" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1500">汕尾</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_14" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1600">河源</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_15" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1700">阳江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_16" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1800">清远</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_17" pid="44" class="c_city_b" c_pid="c_p_44" value="44_1900">东莞</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_18" pid="44" class="c_city_b" c_pid="c_p_44" value="44_2000">中山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_19" pid="44" class="c_city_b" c_pid="c_p_44" value="44_5100">潮州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_20" pid="44" class="c_city_b" c_pid="c_p_44" value="44_5200">揭阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="44_21" pid="44" class="c_city_b" c_pid="c_p_44" value="44_5300">云浮</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="53">
						                              				<input type="checkbox" class="province" id="p_53">
						                              				云南						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_53">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_1" pid="53" class="c_city_b" c_pid="c_p_53" value="53_100">昆明</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_2" pid="53" class="c_city_b" c_pid="c_p_53" value="53_300">曲靖</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_3" pid="53" class="c_city_b" c_pid="c_p_53" value="53_400">玉溪</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_4" pid="53" class="c_city_b" c_pid="c_p_53" value="53_500">保山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_5" pid="53" class="c_city_b" c_pid="c_p_53" value="53_600">昭通</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_6" pid="53" class="c_city_b" c_pid="c_p_53" value="53_700">丽江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_7" pid="53" class="c_city_b" c_pid="c_p_53" value="53_800">普洱</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_8" pid="53" class="c_city_b" c_pid="c_p_53" value="53_900">临沧</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_9" pid="53" class="c_city_b" c_pid="c_p_53" value="53_2300">楚雄</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_10" pid="53" class="c_city_b" c_pid="c_p_53" value="53_2500">红河</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_11" pid="53" class="c_city_b" c_pid="c_p_53" value="53_2600">文山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_12" pid="53" class="c_city_b" c_pid="c_p_53" value="53_2800">西双版纳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_13" pid="53" class="c_city_b" c_pid="c_p_53" value="53_2900">大理</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_14" pid="53" class="c_city_b" c_pid="c_p_53" value="53_3100">德宏</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_15" pid="53" class="c_city_b" c_pid="c_p_53" value="53_3300">怒江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="53_16" pid="53" class="c_city_b" c_pid="c_p_53" value="53_3400">迪庆</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="65">
						                              				<input type="checkbox" class="province" id="p_65">
						                              				新疆						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_65">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_1" pid="65" class="c_city_b" c_pid="c_p_65" value="65_100">乌鲁木齐</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_2" pid="65" class="c_city_b" c_pid="c_p_65" value="65_200">克拉玛依</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_3" pid="65" class="c_city_b" c_pid="c_p_65" value="65_2100">吐鲁番</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_4" pid="65" class="c_city_b" c_pid="c_p_65" value="65_2200">哈密</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_5" pid="65" class="c_city_b" c_pid="c_p_65" value="65_2300">昌吉</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_6" pid="65" class="c_city_b" c_pid="c_p_65" value="65_2700">博尔塔拉</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_7" pid="65" class="c_city_b" c_pid="c_p_65" value="65_2800">巴音郭楞</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_8" pid="65" class="c_city_b" c_pid="c_p_65" value="65_2900">阿克苏</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_9" pid="65" class="c_city_b" c_pid="c_p_65" value="65_3000">克孜勒苏</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_10" pid="65" class="c_city_b" c_pid="c_p_65" value="65_3100">喀什</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_11" pid="65" class="c_city_b" c_pid="c_p_65" value="65_3200">和田</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_12" pid="65" class="c_city_b" c_pid="c_p_65" value="65_4000">伊犁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_13" pid="65" class="c_city_b" c_pid="c_p_65" value="65_4200">塔城</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="65_14" pid="65" class="c_city_b" c_pid="c_p_65" value="65_4300">阿勒泰</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
					                              								                              			<span class="c_province">
						                              			<label class="c_province_b" pid="12">
						                              				<input type="checkbox" class="province" id="p_12">
						                              				天津						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_12">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_1" pid="12" class="c_city_b" c_pid="c_p_12" value="12_101">和平</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_2" pid="12" class="c_city_b" c_pid="c_p_12" value="12_102">河东</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_3" pid="12" class="c_city_b" c_pid="c_p_12" value="12_103">河西</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_4" pid="12" class="c_city_b" c_pid="c_p_12" value="12_104">南开</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_5" pid="12" class="c_city_b" c_pid="c_p_12" value="12_105">河北</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_6" pid="12" class="c_city_b" c_pid="c_p_12" value="12_106">红桥</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_7" pid="12" class="c_city_b" c_pid="c_p_12" value="12_110">东丽</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_8" pid="12" class="c_city_b" c_pid="c_p_12" value="12_111">西青</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_9" pid="12" class="c_city_b" c_pid="c_p_12" value="12_112">津南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_10" pid="12" class="c_city_b" c_pid="c_p_12" value="12_113">北辰</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_11" pid="12" class="c_city_b" c_pid="c_p_12" value="12_114">武清</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_12" pid="12" class="c_city_b" c_pid="c_p_12" value="12_115">宝坻</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_13" pid="12" class="c_city_b" c_pid="c_p_12" value="12_116">滨海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_14" pid="12" class="c_city_b" c_pid="c_p_12" value="12_221">宁河</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_15" pid="12" class="c_city_b" c_pid="c_p_12" value="12_223">静海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="12_16" pid="12" class="c_city_b" c_pid="c_p_12" value="12_225">蓟县</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="23">
						                              				<input type="checkbox" class="province" id="p_23">
						                              				黑龙江						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_23">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_1" pid="23" class="c_city_b" c_pid="c_p_23" value="23_100">哈尔滨</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_2" pid="23" class="c_city_b" c_pid="c_p_23" value="23_200">齐齐哈尔</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_3" pid="23" class="c_city_b" c_pid="c_p_23" value="23_300">鸡西</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_4" pid="23" class="c_city_b" c_pid="c_p_23" value="23_400">鹤岗</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_5" pid="23" class="c_city_b" c_pid="c_p_23" value="23_500">双鸭山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_6" pid="23" class="c_city_b" c_pid="c_p_23" value="23_600">大庆</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_7" pid="23" class="c_city_b" c_pid="c_p_23" value="23_700">伊春</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_8" pid="23" class="c_city_b" c_pid="c_p_23" value="23_800">佳木斯</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_9" pid="23" class="c_city_b" c_pid="c_p_23" value="23_900">七台河</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_10" pid="23" class="c_city_b" c_pid="c_p_23" value="23_1000">牡丹江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_11" pid="23" class="c_city_b" c_pid="c_p_23" value="23_1100">黑河</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_12" pid="23" class="c_city_b" c_pid="c_p_23" value="23_1200">绥化</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="23_13" pid="23" class="c_city_b" c_pid="c_p_23" value="23_2700">大兴安岭</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="36">
						                              				<input type="checkbox" class="province" id="p_36">
						                              				江西						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_36">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_1" pid="36" class="c_city_b" c_pid="c_p_36" value="36_100">南昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_2" pid="36" class="c_city_b" c_pid="c_p_36" value="36_200">景德镇</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_3" pid="36" class="c_city_b" c_pid="c_p_36" value="36_300">萍乡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_4" pid="36" class="c_city_b" c_pid="c_p_36" value="36_400">九江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_5" pid="36" class="c_city_b" c_pid="c_p_36" value="36_500">新余</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_6" pid="36" class="c_city_b" c_pid="c_p_36" value="36_600">鹰潭</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_7" pid="36" class="c_city_b" c_pid="c_p_36" value="36_700">赣州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_8" pid="36" class="c_city_b" c_pid="c_p_36" value="36_800">吉安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_9" pid="36" class="c_city_b" c_pid="c_p_36" value="36_900">宜春</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_10" pid="36" class="c_city_b" c_pid="c_p_36" value="36_1000">抚州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="36_11" pid="36" class="c_city_b" c_pid="c_p_36" value="36_1100">上饶</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="45">
						                              				<input type="checkbox" class="province" id="p_45">
						                              				广西						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_45">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_1" pid="45" class="c_city_b" c_pid="c_p_45" value="45_100">南宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_2" pid="45" class="c_city_b" c_pid="c_p_45" value="45_200">柳州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_3" pid="45" class="c_city_b" c_pid="c_p_45" value="45_300">桂林</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_4" pid="45" class="c_city_b" c_pid="c_p_45" value="45_400">梧州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_5" pid="45" class="c_city_b" c_pid="c_p_45" value="45_500">北海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_6" pid="45" class="c_city_b" c_pid="c_p_45" value="45_600">防城港</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_7" pid="45" class="c_city_b" c_pid="c_p_45" value="45_700">钦州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_8" pid="45" class="c_city_b" c_pid="c_p_45" value="45_800">贵港</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_9" pid="45" class="c_city_b" c_pid="c_p_45" value="45_900">玉林</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_10" pid="45" class="c_city_b" c_pid="c_p_45" value="45_1000">百色</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_11" pid="45" class="c_city_b" c_pid="c_p_45" value="45_1100">贺州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_12" pid="45" class="c_city_b" c_pid="c_p_45" value="45_1200">河池</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_13" pid="45" class="c_city_b" c_pid="c_p_45" value="45_1300">来宾</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="45_14" pid="45" class="c_city_b" c_pid="c_p_45" value="45_1400">崇左</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="54">
						                              				<input type="checkbox" class="province" id="p_54">
						                              				西藏						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_54">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_1" pid="54" class="c_city_b" c_pid="c_p_54" value="54_100">拉萨</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_2" pid="54" class="c_city_b" c_pid="c_p_54" value="54_2100">昌都</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_3" pid="54" class="c_city_b" c_pid="c_p_54" value="54_2200">山南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_4" pid="54" class="c_city_b" c_pid="c_p_54" value="54_2300">日喀则</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_5" pid="54" class="c_city_b" c_pid="c_p_54" value="54_2400">那曲</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_6" pid="54" class="c_city_b" c_pid="c_p_54" value="54_2500">阿里</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="54_7" pid="54" class="c_city_b" c_pid="c_p_54" value="54_2600">林芝</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
					                              								                              			<span class="c_province">
						                              			<label class="c_province_b" pid="13">
						                              				<input type="checkbox" class="province" id="p_13">
						                              				河北						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_13">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_1" pid="13" class="c_city_b" c_pid="c_p_13" value="13_100">石家庄</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_2" pid="13" class="c_city_b" c_pid="c_p_13" value="13_200">唐山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_3" pid="13" class="c_city_b" c_pid="c_p_13" value="13_300">秦皇岛</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_4" pid="13" class="c_city_b" c_pid="c_p_13" value="13_400">邯郸</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_5" pid="13" class="c_city_b" c_pid="c_p_13" value="13_500">邢台</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_6" pid="13" class="c_city_b" c_pid="c_p_13" value="13_600">保定</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_7" pid="13" class="c_city_b" c_pid="c_p_13" value="13_700">张家口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_8" pid="13" class="c_city_b" c_pid="c_p_13" value="13_800">承德</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_9" pid="13" class="c_city_b" c_pid="c_p_13" value="13_900">沧州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_10" pid="13" class="c_city_b" c_pid="c_p_13" value="13_1000">廊坊</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="13_11" pid="13" class="c_city_b" c_pid="c_p_13" value="13_1100">衡水</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="31">
						                              				<input type="checkbox" class="province" id="p_31">
						                              				上海						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_31">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_1" pid="31" class="c_city_b" c_pid="c_p_31" value="31_101">黄浦</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_2" pid="31" class="c_city_b" c_pid="c_p_31" value="31_103">卢湾</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_3" pid="31" class="c_city_b" c_pid="c_p_31" value="31_104">徐汇</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_4" pid="31" class="c_city_b" c_pid="c_p_31" value="31_105">长宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_5" pid="31" class="c_city_b" c_pid="c_p_31" value="31_106">静安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_6" pid="31" class="c_city_b" c_pid="c_p_31" value="31_107">普陀</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_7" pid="31" class="c_city_b" c_pid="c_p_31" value="31_108">闸北</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_8" pid="31" class="c_city_b" c_pid="c_p_31" value="31_109">虹口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_9" pid="31" class="c_city_b" c_pid="c_p_31" value="31_110">杨浦</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_10" pid="31" class="c_city_b" c_pid="c_p_31" value="31_112">闵行</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_11" pid="31" class="c_city_b" c_pid="c_p_31" value="31_113">宝山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_12" pid="31" class="c_city_b" c_pid="c_p_31" value="31_114">嘉定</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_13" pid="31" class="c_city_b" c_pid="c_p_31" value="31_115">浦东</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_14" pid="31" class="c_city_b" c_pid="c_p_31" value="31_116">金山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_15" pid="31" class="c_city_b" c_pid="c_p_31" value="31_117">松江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_16" pid="31" class="c_city_b" c_pid="c_p_31" value="31_118">青浦</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_17" pid="31" class="c_city_b" c_pid="c_p_31" value="31_120">奉贤</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="31_18" pid="31" class="c_city_b" c_pid="c_p_31" value="31_230">崇明</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="37">
						                              				<input type="checkbox" class="province" id="p_37">
						                              				山东						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_37">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_1" pid="37" class="c_city_b" c_pid="c_p_37" value="37_100">济南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_2" pid="37" class="c_city_b" c_pid="c_p_37" value="37_200">青岛</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_3" pid="37" class="c_city_b" c_pid="c_p_37" value="37_300">淄博</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_4" pid="37" class="c_city_b" c_pid="c_p_37" value="37_400">枣庄</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_5" pid="37" class="c_city_b" c_pid="c_p_37" value="37_500">东营</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_6" pid="37" class="c_city_b" c_pid="c_p_37" value="37_600">烟台</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_7" pid="37" class="c_city_b" c_pid="c_p_37" value="37_700">潍坊</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_8" pid="37" class="c_city_b" c_pid="c_p_37" value="37_800">济宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_9" pid="37" class="c_city_b" c_pid="c_p_37" value="37_900">泰安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_10" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1000">威海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_11" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1100">日照</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_12" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1200">莱芜</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_13" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1300">临沂</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_14" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1400">德州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_15" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1500">聊城</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_16" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1600">滨州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="37_17" pid="37" class="c_city_b" c_pid="c_p_37" value="37_1700">菏泽</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="46">
						                              				<input type="checkbox" class="province" id="p_46">
						                              				海南						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_46">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_1" pid="46" class="c_city_b" c_pid="c_p_46" value="46_100">海口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_2" pid="46" class="c_city_b" c_pid="c_p_46" value="46_200">三亚</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_3" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9001">五指山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_4" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9002">琼海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_5" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9003">儋州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_6" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9005">文昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_7" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9006">万宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_8" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9007">东方</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_9" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9021">定安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_10" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9022">屯昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_11" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9023">澄迈</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_12" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9024">临高</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_13" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9025">白沙</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_14" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9026">昌江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_15" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9027">乐东</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_16" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9028">陵水</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_17" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9029">保亭</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_18" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9030">琼中</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_19" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9031">西沙</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_20" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9032">南沙</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="46_21" pid="46" class="c_city_b" c_pid="c_p_46" value="46_9033">中沙</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="61">
						                              				<input type="checkbox" class="province" id="p_61">
						                              				陕西						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_61">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_1" pid="61" class="c_city_b" c_pid="c_p_61" value="61_100">西安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_2" pid="61" class="c_city_b" c_pid="c_p_61" value="61_200">铜川</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_3" pid="61" class="c_city_b" c_pid="c_p_61" value="61_300">宝鸡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_4" pid="61" class="c_city_b" c_pid="c_p_61" value="61_400">咸阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_5" pid="61" class="c_city_b" c_pid="c_p_61" value="61_500">渭南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_6" pid="61" class="c_city_b" c_pid="c_p_61" value="61_600">延安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_7" pid="61" class="c_city_b" c_pid="c_p_61" value="61_700">汉中</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_8" pid="61" class="c_city_b" c_pid="c_p_61" value="61_800">榆林</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_9" pid="61" class="c_city_b" c_pid="c_p_61" value="61_900">安康</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="61_10" pid="61" class="c_city_b" c_pid="c_p_61" value="61_1000">商洛</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
					                              								                              			<span class="c_province">
						                              			<label class="c_province_b" pid="14">
						                              				<input type="checkbox" class="province" id="p_14">
						                              				山西						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_14">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_1" pid="14" class="c_city_b" c_pid="c_p_14" value="14_100">太原</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_2" pid="14" class="c_city_b" c_pid="c_p_14" value="14_200">大同</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_3" pid="14" class="c_city_b" c_pid="c_p_14" value="14_300">阳泉</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_4" pid="14" class="c_city_b" c_pid="c_p_14" value="14_400">长治</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_5" pid="14" class="c_city_b" c_pid="c_p_14" value="14_500">晋城</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_6" pid="14" class="c_city_b" c_pid="c_p_14" value="14_600">朔州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_7" pid="14" class="c_city_b" c_pid="c_p_14" value="14_700">晋中</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_8" pid="14" class="c_city_b" c_pid="c_p_14" value="14_800">运城</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_9" pid="14" class="c_city_b" c_pid="c_p_14" value="14_900">忻州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_10" pid="14" class="c_city_b" c_pid="c_p_14" value="14_1000">临汾</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="14_11" pid="14" class="c_city_b" c_pid="c_p_14" value="14_1100">吕梁</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="32">
						                              				<input type="checkbox" class="province" id="p_32">
						                              				江苏						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_32">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_1" pid="32" class="c_city_b" c_pid="c_p_32" value="32_100">南京</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_2" pid="32" class="c_city_b" c_pid="c_p_32" value="32_200">无锡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_3" pid="32" class="c_city_b" c_pid="c_p_32" value="32_300">徐州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_4" pid="32" class="c_city_b" c_pid="c_p_32" value="32_400">常州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_5" pid="32" class="c_city_b" c_pid="c_p_32" value="32_500">苏州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_6" pid="32" class="c_city_b" c_pid="c_p_32" value="32_600">南通</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_7" pid="32" class="c_city_b" c_pid="c_p_32" value="32_700">连云港</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_8" pid="32" class="c_city_b" c_pid="c_p_32" value="32_800">淮安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_9" pid="32" class="c_city_b" c_pid="c_p_32" value="32_900">盐城</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_10" pid="32" class="c_city_b" c_pid="c_p_32" value="32_1000">扬州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_11" pid="32" class="c_city_b" c_pid="c_p_32" value="32_1100">镇江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_12" pid="32" class="c_city_b" c_pid="c_p_32" value="32_1200">泰州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="32_13" pid="32" class="c_city_b" c_pid="c_p_32" value="32_1300">宿迁</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="41">
						                              				<input type="checkbox" class="province" id="p_41">
						                              				河南						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_41">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_1" pid="41" class="c_city_b" c_pid="c_p_41" value="41_100">郑州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_2" pid="41" class="c_city_b" c_pid="c_p_41" value="41_200">开封</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_3" pid="41" class="c_city_b" c_pid="c_p_41" value="41_300">洛阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_4" pid="41" class="c_city_b" c_pid="c_p_41" value="41_400">平顶山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_5" pid="41" class="c_city_b" c_pid="c_p_41" value="41_500">安阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_6" pid="41" class="c_city_b" c_pid="c_p_41" value="41_600">鹤壁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_7" pid="41" class="c_city_b" c_pid="c_p_41" value="41_700">新乡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_8" pid="41" class="c_city_b" c_pid="c_p_41" value="41_800">焦作</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_9" pid="41" class="c_city_b" c_pid="c_p_41" value="41_900">濮阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_10" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1000">许昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_11" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1100">漯河</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_12" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1200">三门峡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_13" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1300">南阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_14" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1400">商丘</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_15" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1500">信阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_16" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1600">周口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_17" pid="41" class="c_city_b" c_pid="c_p_41" value="41_1700">驻马店</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="41_18" pid="41" class="c_city_b" c_pid="c_p_41" value="41_9001">济源</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="50">
						                              				<input type="checkbox" class="province" id="p_50">
						                              				重庆						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_50">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_1" pid="50" class="c_city_b" c_pid="c_p_50" value="50_101">万州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_2" pid="50" class="c_city_b" c_pid="c_p_50" value="50_102">涪陵</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_3" pid="50" class="c_city_b" c_pid="c_p_50" value="50_103">渝中</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_4" pid="50" class="c_city_b" c_pid="c_p_50" value="50_104">大渡口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_5" pid="50" class="c_city_b" c_pid="c_p_50" value="50_105">江北</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_6" pid="50" class="c_city_b" c_pid="c_p_50" value="50_106">沙坪坝</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_7" pid="50" class="c_city_b" c_pid="c_p_50" value="50_107">九龙坡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_8" pid="50" class="c_city_b" c_pid="c_p_50" value="50_108">南岸</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_9" pid="50" class="c_city_b" c_pid="c_p_50" value="50_109">北碚</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_10" pid="50" class="c_city_b" c_pid="c_p_50" value="50_110">万盛</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_11" pid="50" class="c_city_b" c_pid="c_p_50" value="50_111">双桥</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_12" pid="50" class="c_city_b" c_pid="c_p_50" value="50_112">渝北</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_13" pid="50" class="c_city_b" c_pid="c_p_50" value="50_113">巴南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_14" pid="50" class="c_city_b" c_pid="c_p_50" value="50_114">黔江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_15" pid="50" class="c_city_b" c_pid="c_p_50" value="50_115">长寿</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_16" pid="50" class="c_city_b" c_pid="c_p_50" value="50_116">江津</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_17" pid="50" class="c_city_b" c_pid="c_p_50" value="50_117">合川</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_18" pid="50" class="c_city_b" c_pid="c_p_50" value="50_118">永川</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_19" pid="50" class="c_city_b" c_pid="c_p_50" value="50_119">南川</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_20" pid="50" class="c_city_b" c_pid="c_p_50" value="50_222">綦江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_21" pid="50" class="c_city_b" c_pid="c_p_50" value="50_223">潼南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_22" pid="50" class="c_city_b" c_pid="c_p_50" value="50_224">铜梁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_23" pid="50" class="c_city_b" c_pid="c_p_50" value="50_225">大足</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_24" pid="50" class="c_city_b" c_pid="c_p_50" value="50_226">荣昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_25" pid="50" class="c_city_b" c_pid="c_p_50" value="50_227">璧山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_26" pid="50" class="c_city_b" c_pid="c_p_50" value="50_228">梁平</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_27" pid="50" class="c_city_b" c_pid="c_p_50" value="50_229">城口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_28" pid="50" class="c_city_b" c_pid="c_p_50" value="50_230">丰都</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_29" pid="50" class="c_city_b" c_pid="c_p_50" value="50_231">垫江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_30" pid="50" class="c_city_b" c_pid="c_p_50" value="50_232">武隆</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_31" pid="50" class="c_city_b" c_pid="c_p_50" value="50_233">忠县</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_32" pid="50" class="c_city_b" c_pid="c_p_50" value="50_234">开县</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_33" pid="50" class="c_city_b" c_pid="c_p_50" value="50_235">云阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_34" pid="50" class="c_city_b" c_pid="c_p_50" value="50_236">奉节</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_35" pid="50" class="c_city_b" c_pid="c_p_50" value="50_237">巫山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_36" pid="50" class="c_city_b" c_pid="c_p_50" value="50_238">巫溪</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_37" pid="50" class="c_city_b" c_pid="c_p_50" value="50_240">石柱</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_38" pid="50" class="c_city_b" c_pid="c_p_50" value="50_241">秀山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_39" pid="50" class="c_city_b" c_pid="c_p_50" value="50_242">酉阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="50_40" pid="50" class="c_city_b" c_pid="c_p_50" value="50_243">彭水</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="62">
						                              				<input type="checkbox" class="province" id="p_62">
						                              				甘肃						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_62">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_1" pid="62" class="c_city_b" c_pid="c_p_62" value="62_100">兰州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_2" pid="62" class="c_city_b" c_pid="c_p_62" value="62_200">嘉峪关</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_3" pid="62" class="c_city_b" c_pid="c_p_62" value="62_300">金昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_4" pid="62" class="c_city_b" c_pid="c_p_62" value="62_400">白银</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_5" pid="62" class="c_city_b" c_pid="c_p_62" value="62_500">天水</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_6" pid="62" class="c_city_b" c_pid="c_p_62" value="62_600">武威</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_7" pid="62" class="c_city_b" c_pid="c_p_62" value="62_700">张掖</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_8" pid="62" class="c_city_b" c_pid="c_p_62" value="62_800">平凉</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_9" pid="62" class="c_city_b" c_pid="c_p_62" value="62_900">酒泉</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_10" pid="62" class="c_city_b" c_pid="c_p_62" value="62_1000">庆阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_11" pid="62" class="c_city_b" c_pid="c_p_62" value="62_1100">定西</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_12" pid="62" class="c_city_b" c_pid="c_p_62" value="62_1200">陇南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_13" pid="62" class="c_city_b" c_pid="c_p_62" value="62_2900">临夏</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="62_14" pid="62" class="c_city_b" c_pid="c_p_62" value="62_3000">甘南</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
					                              								                              			<span class="c_province">
						                              			<label class="c_province_b" pid="15">
						                              				<input type="checkbox" class="province" id="p_15">
						                              				内蒙古						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_15">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_1" pid="15" class="c_city_b" c_pid="c_p_15" value="15_100">呼和浩特</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_2" pid="15" class="c_city_b" c_pid="c_p_15" value="15_200">包头</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_3" pid="15" class="c_city_b" c_pid="c_p_15" value="15_300">乌海</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_4" pid="15" class="c_city_b" c_pid="c_p_15" value="15_400">赤峰</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_5" pid="15" class="c_city_b" c_pid="c_p_15" value="15_500">通辽</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_6" pid="15" class="c_city_b" c_pid="c_p_15" value="15_600">鄂尔多斯</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_7" pid="15" class="c_city_b" c_pid="c_p_15" value="15_700">呼伦贝尔</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_8" pid="15" class="c_city_b" c_pid="c_p_15" value="15_800">巴彦淖尔</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_9" pid="15" class="c_city_b" c_pid="c_p_15" value="15_900">乌兰察布</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_10" pid="15" class="c_city_b" c_pid="c_p_15" value="15_2200">兴安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_11" pid="15" class="c_city_b" c_pid="c_p_15" value="15_2500">锡林郭勒</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="15_12" pid="15" class="c_city_b" c_pid="c_p_15" value="15_2900">阿拉善</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="33">
						                              				<input type="checkbox" class="province" id="p_33">
						                              				浙江						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_33">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_1" pid="33" class="c_city_b" c_pid="c_p_33" value="33_100">杭州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_2" pid="33" class="c_city_b" c_pid="c_p_33" value="33_200">宁波</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_3" pid="33" class="c_city_b" c_pid="c_p_33" value="33_300">温州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_4" pid="33" class="c_city_b" c_pid="c_p_33" value="33_400">嘉兴</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_5" pid="33" class="c_city_b" c_pid="c_p_33" value="33_500">湖州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_6" pid="33" class="c_city_b" c_pid="c_p_33" value="33_600">绍兴</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_7" pid="33" class="c_city_b" c_pid="c_p_33" value="33_700">金华</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_8" pid="33" class="c_city_b" c_pid="c_p_33" value="33_800">衢州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_9" pid="33" class="c_city_b" c_pid="c_p_33" value="33_900">舟山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_10" pid="33" class="c_city_b" c_pid="c_p_33" value="33_1000">台州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="33_11" pid="33" class="c_city_b" c_pid="c_p_33" value="33_1100">丽水</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="42">
						                              				<input type="checkbox" class="province" id="p_42">
						                              				湖北						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_42">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_1" pid="42" class="c_city_b" c_pid="c_p_42" value="42_100">武汉</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_2" pid="42" class="c_city_b" c_pid="c_p_42" value="42_200">黄石</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_3" pid="42" class="c_city_b" c_pid="c_p_42" value="42_300">十堰</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_4" pid="42" class="c_city_b" c_pid="c_p_42" value="42_500">宜昌</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_5" pid="42" class="c_city_b" c_pid="c_p_42" value="42_600">襄阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_6" pid="42" class="c_city_b" c_pid="c_p_42" value="42_700">鄂州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_7" pid="42" class="c_city_b" c_pid="c_p_42" value="42_800">荆门</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_8" pid="42" class="c_city_b" c_pid="c_p_42" value="42_900">孝感</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_9" pid="42" class="c_city_b" c_pid="c_p_42" value="42_1000">荆州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_10" pid="42" class="c_city_b" c_pid="c_p_42" value="42_1100">黄冈</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_11" pid="42" class="c_city_b" c_pid="c_p_42" value="42_1200">咸宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_12" pid="42" class="c_city_b" c_pid="c_p_42" value="42_1300">随州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_13" pid="42" class="c_city_b" c_pid="c_p_42" value="42_2800">恩施</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_14" pid="42" class="c_city_b" c_pid="c_p_42" value="42_9004">仙桃</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_15" pid="42" class="c_city_b" c_pid="c_p_42" value="42_9005">潜江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_16" pid="42" class="c_city_b" c_pid="c_p_42" value="42_9006">天门</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="42_17" pid="42" class="c_city_b" c_pid="c_p_42" value="42_9021">神农架</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="51">
						                              				<input type="checkbox" class="province" id="p_51">
						                              				四川						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_51">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_1" pid="51" class="c_city_b" c_pid="c_p_51" value="51_100">成都</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_2" pid="51" class="c_city_b" c_pid="c_p_51" value="51_300">自贡</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_3" pid="51" class="c_city_b" c_pid="c_p_51" value="51_400">攀枝花</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_4" pid="51" class="c_city_b" c_pid="c_p_51" value="51_500">泸州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_5" pid="51" class="c_city_b" c_pid="c_p_51" value="51_600">德阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_6" pid="51" class="c_city_b" c_pid="c_p_51" value="51_700">绵阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_7" pid="51" class="c_city_b" c_pid="c_p_51" value="51_800">广元</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_8" pid="51" class="c_city_b" c_pid="c_p_51" value="51_900">遂宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_9" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1000">内江</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_10" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1100">乐山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_11" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1300">南充</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_12" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1400">眉山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_13" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1500">宜宾</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_14" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1600">广安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_15" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1700">达州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_16" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1800">雅安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_17" pid="51" class="c_city_b" c_pid="c_p_51" value="51_1900">巴中</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_18" pid="51" class="c_city_b" c_pid="c_p_51" value="51_2000">资阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_19" pid="51" class="c_city_b" c_pid="c_p_51" value="51_3200">阿坝</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_20" pid="51" class="c_city_b" c_pid="c_p_51" value="51_3300">甘孜</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="51_21" pid="51" class="c_city_b" c_pid="c_p_51" value="51_3400">凉山</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="63">
						                              				<input type="checkbox" class="province" id="p_63">
						                              				青海						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_63">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_1" pid="63" class="c_city_b" c_pid="c_p_63" value="63_100">西宁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_2" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2100">海东</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_3" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2200">海北</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_4" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2300">黄南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_5" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2500">海南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_6" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2600">果洛</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_7" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2700">玉树</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="63_8" pid="63" class="c_city_b" c_pid="c_p_63" value="63_2800">海西</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
					                              								                              			<span class="c_province">
						                              			<label class="c_province_b" pid="21">
						                              				<input type="checkbox" class="province" id="p_21">
						                              				辽宁						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_21">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_1" pid="21" class="c_city_b" c_pid="c_p_21" value="21_100">沈阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_2" pid="21" class="c_city_b" c_pid="c_p_21" value="21_200">大连</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_3" pid="21" class="c_city_b" c_pid="c_p_21" value="21_300">鞍山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_4" pid="21" class="c_city_b" c_pid="c_p_21" value="21_400">抚顺</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_5" pid="21" class="c_city_b" c_pid="c_p_21" value="21_500">本溪</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_6" pid="21" class="c_city_b" c_pid="c_p_21" value="21_600">丹东</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_7" pid="21" class="c_city_b" c_pid="c_p_21" value="21_700">锦州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_8" pid="21" class="c_city_b" c_pid="c_p_21" value="21_800">营口</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_9" pid="21" class="c_city_b" c_pid="c_p_21" value="21_900">阜新</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_10" pid="21" class="c_city_b" c_pid="c_p_21" value="21_1000">辽阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_11" pid="21" class="c_city_b" c_pid="c_p_21" value="21_1100">盘锦</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_12" pid="21" class="c_city_b" c_pid="c_p_21" value="21_1200">铁岭</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_13" pid="21" class="c_city_b" c_pid="c_p_21" value="21_1300">朝阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="21_14" pid="21" class="c_city_b" c_pid="c_p_21" value="21_1400">葫芦岛</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="34">
						                              				<input type="checkbox" class="province" id="p_34">
						                              				安徽						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_34">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_1" pid="34" class="c_city_b" c_pid="c_p_34" value="34_100">合肥</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_2" pid="34" class="c_city_b" c_pid="c_p_34" value="34_200">芜湖</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_3" pid="34" class="c_city_b" c_pid="c_p_34" value="34_300">蚌埠</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_4" pid="34" class="c_city_b" c_pid="c_p_34" value="34_400">淮南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_5" pid="34" class="c_city_b" c_pid="c_p_34" value="34_500">马鞍山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_6" pid="34" class="c_city_b" c_pid="c_p_34" value="34_600">淮北</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_7" pid="34" class="c_city_b" c_pid="c_p_34" value="34_700">铜陵</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_8" pid="34" class="c_city_b" c_pid="c_p_34" value="34_800">安庆</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_9" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1000">黄山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_10" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1100">滁州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_11" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1200">阜阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_12" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1300">宿州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_13" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1400">巢湖</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_14" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1500">六安</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_15" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1600">亳州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_16" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1700">池州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="34_17" pid="34" class="c_city_b" c_pid="c_p_34" value="34_1800">宣城</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="43">
						                              				<input type="checkbox" class="province" id="p_43">
						                              				湖南						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_43">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_1" pid="43" class="c_city_b" c_pid="c_p_43" value="43_100">长沙</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_2" pid="43" class="c_city_b" c_pid="c_p_43" value="43_200">株洲</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_3" pid="43" class="c_city_b" c_pid="c_p_43" value="43_300">湘潭</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_4" pid="43" class="c_city_b" c_pid="c_p_43" value="43_400">衡阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_5" pid="43" class="c_city_b" c_pid="c_p_43" value="43_500">邵阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_6" pid="43" class="c_city_b" c_pid="c_p_43" value="43_600">岳阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_7" pid="43" class="c_city_b" c_pid="c_p_43" value="43_700">常德</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_8" pid="43" class="c_city_b" c_pid="c_p_43" value="43_800">张家界</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_9" pid="43" class="c_city_b" c_pid="c_p_43" value="43_900">益阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_10" pid="43" class="c_city_b" c_pid="c_p_43" value="43_1000">郴州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_11" pid="43" class="c_city_b" c_pid="c_p_43" value="43_1100">永州</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_12" pid="43" class="c_city_b" c_pid="c_p_43" value="43_1200">怀化</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_13" pid="43" class="c_city_b" c_pid="c_p_43" value="43_1300">娄底</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="43_14" pid="43" class="c_city_b" c_pid="c_p_43" value="43_3100">湘西</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="52">
						                              				<input type="checkbox" class="province" id="p_52">
						                              				贵州						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_52">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_1" pid="52" class="c_city_b" c_pid="c_p_52" value="52_100">贵阳</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_2" pid="52" class="c_city_b" c_pid="c_p_52" value="52_200">六盘水</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_3" pid="52" class="c_city_b" c_pid="c_p_52" value="52_300">遵义</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_4" pid="52" class="c_city_b" c_pid="c_p_52" value="52_400">安顺</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_5" pid="52" class="c_city_b" c_pid="c_p_52" value="52_2200">铜仁</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_6" pid="52" class="c_city_b" c_pid="c_p_52" value="52_2300">黔西南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_7" pid="52" class="c_city_b" c_pid="c_p_52" value="52_2400">毕节</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_8" pid="52" class="c_city_b" c_pid="c_p_52" value="52_2600">黔东南</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="52_9" pid="52" class="c_city_b" c_pid="c_p_52" value="52_2700">黔南</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                                <span class="c_province">
						                              			<label class="c_province_b" pid="64">
						                              				<input type="checkbox" class="province" id="p_64">
						                              				宁夏						                              			</label>
						                              			<div class="c_city" style="display:none;" id="div_p_64">
						                                  			<ul class="M-commonSLCSub">
						                                 		 								                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="64_1" pid="64" class="c_city_b" c_pid="c_p_64" value="64_100">银川</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="64_2" pid="64" class="c_city_b" c_pid="c_p_64" value="64_200">石嘴山</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="64_3" pid="64" class="c_city_b" c_pid="c_p_64" value="64_300">吴忠</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="64_4" pid="64" class="c_city_b" c_pid="c_p_64" value="64_400">固原</label></li>
						                                      									                                      			<li><label><input type="checkbox" name="area_array[]" data-type="sub" id="64_5" pid="64" class="c_city_b" c_pid="c_p_64" value="64_500">中卫</label></li>
						                                      									                                   			</ul>
						                              			</div>
					                          				</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--form_row end-->
                        <div class="form_row" id="os_terminal">
                            <div class="form-ti">定向终端：</div>
                            <div class="form_cont">
					<span class="form_group w100"> <label> <input type="radio" name="terminal" value="0" class="terminal" id="zdlx01" checked="checked"> 不限
					</label>
					</span> <span class="form_group w100"> <label> <input type="radio" name="terminal" value="1" class="terminal" id="zdlx02"> 选择终端
					</label>
					</span>
                                <div class="tableBox directSelect zdSelect" id="a_terminal" style="display:none">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <th class="nor" style="text-align:left"><span><label>Android</label></span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="17" class="c_terminal" tm_pid="13">魅族</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="19" class="c_terminal" tm_pid="13">小米</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="21" class="c_terminal" tm_pid="13">索尼爱立信</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="23" class="c_terminal" tm_pid="13">索尼</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="25" class="c_terminal" tm_pid="13">三星</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="27" class="c_terminal" tm_pid="13">联想</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="29" class="c_terminal" tm_pid="13">HTC</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="31" class="c_terminal" tm_pid="13">中兴</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="37" class="c_terminal" tm_pid="13">摩托罗拉</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="39" class="c_terminal" tm_pid="13">华为</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="41" class="c_terminal" tm_pid="13">VIVO</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="43" class="c_terminal" tm_pid="13">OPPO</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="45" class="c_terminal" tm_pid="13">SmartPhone</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="47" class="c_terminal" tm_pid="13">乐世</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="49" class="c_terminal" tm_pid="13">欧沃</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="51" class="c_terminal" tm_pid="13">欧奇</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="53" class="c_terminal" tm_pid="13">诺亚信</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="55" class="c_terminal" tm_pid="13">米哥</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="57" class="c_terminal" tm_pid="13">金立</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="59" class="c_terminal" tm_pid="13">朵唯</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="61" class="c_terminal" tm_pid="13">邦华</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="63" class="c_terminal" tm_pid="13">酷派</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="65" class="c_terminal" tm_pid="13">TCL</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="67" class="c_terminal" tm_pid="13">飞利浦</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="69" class="c_terminal" tm_pid="13">锤子</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="71" class="c_terminal" tm_pid="13">康佳</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="73" class="c_terminal" tm_pid="13">海信</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="75" class="c_terminal" tm_pid="13">美图</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="77" class="c_terminal" tm_pid="13">神舟</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="79" class="c_terminal" tm_pid="13">LG</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="81" class="c_terminal" tm_pid="13">欧博信</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="83" class="c_terminal" tm_pid="13">斐讯</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="85" class="c_terminal" tm_pid="13">昂达</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="87" class="c_terminal" tm_pid="13">小辣椒</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="89" class="c_terminal" tm_pid="13">优派</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="91" class="c_terminal" tm_pid="13">天语</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="93" class="c_terminal" tm_pid="13">华硕</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="95" class="c_terminal" tm_pid="13">宏碁</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="97" class="c_terminal" tm_pid="13">努比亚</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="99" class="c_terminal" tm_pid="13">夏新</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="101" class="c_terminal" tm_pid="13">360</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="103" class="c_terminal" tm_pid="13">一加</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="105" class="c_terminal" tm_pid="13">乐视</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="107" class="c_terminal" tm_pid="13">小米盒子</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="109" class="c_terminal" tm_pid="13">华为悦盒</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="111" class="c_terminal" tm_pid="13">诺基亚</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="113" class="c_terminal" tm_pid="13">MXQpro机顶盒</label></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="nor" style="text-align:left"><span><label>IOS</label></span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="33" class="c_terminal" tm_pid="15">iphone</label></span>
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="35" class="c_terminal" tm_pid="15">iPad</label></span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                        <!--form_row end-->
                        <div class="form_row">
                            <div class="form-ti">定向浏览器：</div>
                            <div class="form_cont">
                                <span class="form_group w100"><label><input type="radio" name="switch_browser" value="0" class="switch_browser" checked="checked"> 不限</label></span> <span class="form_group w100"><label><input type="radio" name="switch_browser" value="1" class="switch_browser"> 选择浏览器</label></span>
                                <div class="tableBox directSelect zdSelect" id="id_browser" style="display:none">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <th class="nor" style="text-align: left"><span>定向方式</span></th>
                                        </tr>
                                        <tr>
                                            <td><span style="width: 150px"><label><input type="radio" name="order_browser_type" value="allow">定向</label></span> <span style="width: 150px"><label><input type="radio" name="order_browser_type" value="forbid">排除</label></span></td>
                                        </tr>
                                        <tr>
                                            <th class="nor" style="text-align:left"><span>android</span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="91">Oppo浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="125">QQ内置浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="51">QQ浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="43">UC浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="101">vivo内置浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="89">小米浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="83">微信内置浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="85">手机百度浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="71">百度浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="61">谷歌浏览器</label></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="nor" style="text-align:left"><span>ios</span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="123">QQ内置浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="67">QQ浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="65">UC浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="81">微信内置浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="87">手机百度浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="73">百度浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="75">苹果浏览器</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="69">谷歌浏览器</label></span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                        <!--form_row end-->
                        <div class="form_row">
                            <div class="form-ti">定向网站类型：</div>
                            <div class="form_cont">
								<span class="form_group w100"> <label> <input type="radio" name="switch_domain_category" value="0" class="switch_domain_category" checked="checked"> 不限
								</label>
								</span> <span class="form_group w100"> <label> <input type="radio" name="switch_domain_category" value="1" class="switch_domain_category"> 选择网站类型
								</label>
								</span>
                                <div class="tableBox directSelect zdSelect" id="domain_category" style="display:none">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <th class="nor" style="text-align: left"><span>网站类型</span> <label><input type="checkbox" id="checked_all">全选</label></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="1">综合门户</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="3">新闻资讯</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="5">体育竞技</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="7">图片网站</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="9">明星八卦</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="11">小说B</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="13">聊天社区</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="15">动漫漫画</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="17">游戏娱乐</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="19">女性时尚</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="21">美食购物</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="23">生活旅游</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="25">行业相关</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="27">电脑软件</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="29">银行金融</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="31">教育教学</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="33">婚恋交友</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="35">其他网站</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="37">政治军事</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="39">言情小说</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="41">美女微拍</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="43">微信小说</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="53">玄幻小说</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="55">小说劫持</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="61">影视类</label></span>
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="57">影视劫持</label></span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                        <!--form_row end-->
                        <div class="form_row">
                            <div class="form-ti">定向网络类型：</div>
                            <div class="form_cont">
								<span class="form_group w100"> <label> <input type="radio" name="switch_nettype" value="0" class="switch_nettype" checked="checked"> 不限
								</label>
								</span> <span class="form_group w100"> <label> <input type="radio" name="switch_nettype" value="1" class="switch_nettype"> 选择网络类型
								</label>
								</span>
                                <div class="tableBox directSelect zdSelect" id="id_nettype" style="display:none">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="1">移动网络</label></span>
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="2">wifi网络</label></span>
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="3">以太网</label></span>
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="4">2G</label></span>
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="5">3G</label></span>
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="6">4G</label></span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                        <!--form_row end-->
                        <div class="form_row">
                            <div class="form-ti">定向运营商：</div>
                            <div class="form_cont">
								<span class="form_group w100"> <label> <input type="radio" name="switch_network" value="0" class="switch_network" checked="checked"> 不限
								</label>
								</span> <span class="form_group w100"> <label> <input type="radio" name="switch_network" value="1" class="switch_network"> 选择运营商
								</label>
								</span>
                                <div class="tableBox directSelect zdSelect" id="id_network" style="display:none">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                <span><label><input type="checkbox" name="network_id_array[]" value="1">移动</label></span>
                                                <span><label><input type="checkbox" name="network_id_array[]" value="2">联通</label></span>
                                                <span><label><input type="checkbox" name="network_id_array[]" value="3">电信</label></span>
                                                <span><label><input type="checkbox" name="network_id_array[]" value="4">其它</label></span>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </div>
                            </div>
                        </div>


                        <!--form_row end-->
                    </div>

                    <div class="button">
                        <input type="button" value="提交" class="button-1 jbtn_save_insert">
                        <input type="button" value="取消" class="button-2 jbtn_cancel">
                    </div>
                </div>
            </div>
        </form>




        <script>
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(3).addClass('active');
            $('.mb-menu li').eq(3).addClass('active');
        </script>

@endsection