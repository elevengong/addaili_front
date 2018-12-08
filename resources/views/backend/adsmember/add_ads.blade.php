@extends("backend.layout.adslayout")
@section("content")

    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 发布广告</p>
        <!--position-->
        <form id="form_insert" method="post">
            {{csrf_field()}}
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
                            @foreach($countTypeArray as $countType)
                            <span class="form_group w150"> <label> <input type="radio" name="count_type" value="{{$countType['set_id']}}" id="cti_{{$countType['set_id']}}">{{$countType['value']}}</label> </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="form_row">
                        <span class="form-ti">广告类型：</span>
                        <div class="form_cont">
                            @foreach($adsTypeArray as $adsType)
                            <span class="form_group w150" style=""> <label> <input type="radio" name="adstype" value="{{$adsType['set_id']}}" id="ati_{{$adsType['set_id']}}"> {{$adsType['remark']}}</label></span>
                            @endforeach
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
                        <span class="form-ti">选择广告素材：</span>

                        <div class="form_cont">
                            <div class="form-border form-border-no d_material_choose clearfix" id="creative_suite_li">
                            </div>

                            <div class="form-border">

                                <div class="input">
                                    <input type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="search-input" id="keyword" name="keyword" placeholder="素材ID">

                                    <input type="button" value="查询" class="check check-h btnsearch" id="searchimageid">

                                    <span class="refresh"><i class="iconfont icon-shuaxin btnsearch"></i></span>

                                    <a href="/adsmember/material/upload" target="_blank" class="right add_btn">+ 添加素材</a>
                                </div>

                                <div class="search-area-bg"></div>
                                <div class="tab_block clearfix" id="creative_suite">
                                    <div class="tab_box mb-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="mb-hide">ID</th>
                                                <th scope="col">图片</th>
                                                <th scope="col" class="mb-hide">广告投放类型</th>
                                                <th scope="col" class="mb-hide">状态</th>
                                                <th scope="col" class="long-table">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <script type="text/Javascript" src="/js/image_preview.js"></script>
                                    <script type="text/javascript">
                                            $(document).ready(function(){
                                                imagePreview();
                                            });
                                    </script></div>

                                <p class="slide-tip">可左右滑动浏览</p>

                            </div>
                        </div>
                    </div>

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
                                <div class="table_Box M_tableBox" id="time_choose" style="display:block;">

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
                                <div class="tableBox directSelect" id="p_c_area" style="display:block;">
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
                                                @foreach($ProvinceArray as $province)
					                             <span class="c_province">
                                                     <label class="c_province_b" pid="{{$province['id']}}"><input type="checkbox" class="province" id="p_{{$province['id']}}" value="{{$province['id']}}">{{$province['remark']}}</label>
					                          	</span>
                                                 @endforeach
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
                                <div class="tableBox directSelect zdSelect" id="a_terminal" style="display:block;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <th class="nor" style="text-align:left"><span><label>Android</label></span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @foreach($AndroidMobileArray as $AndroidMobile)
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="{{$AndroidMobile['set_id']}}" class="c_terminal" tm_pid="47">{{$AndroidMobile['remark']}}</label></span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="nor" style="text-align:left"><span><label>IOS</label></span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @foreach($IOSMobileArray as $IOSMobile)
                                                <span style="width:120px;"><label><input type="checkbox" name="terminal_id_array[]" value="{{$IOSMobile['set_id']}}" class="c_terminal" tm_pid="48">{{$IOSMobile['remark']}}</label></span>
                                                @endforeach
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
                                <div class="tableBox directSelect zdSelect" id="id_browser" style="display:block;">
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
                                                @foreach($AndroidBrowserArray as $AndroidBrowser)
                                                <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="{{$AndroidBrowser['set_id']}}">{{$AndroidBrowser['remark']}}</label></span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="nor" style="text-align:left"><span>ios</span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @foreach($IOSBrowserArray as $IOSBrowser)
                                                    <span style="width:150px"><label><input type="checkbox" name="browser_id_array[]" value="{{$IOSBrowser['set_id']}}">{{$IOSBrowser['remark']}}</label></span>
                                                @endforeach
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
                                <div class="tableBox directSelect zdSelect" id="domain_category" style="display:block;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <th class="nor" style="text-align: left"><span>网站类型</span> <label><input type="checkbox" id="checked_all">全选</label></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                @foreach($WebTypeArray as $WebType)
                                                <span style="width:150px"><label><input type="checkbox" name="domain_category_array[]" value="{{$WebType['set_id']}}">{{$WebType['remark']}}</label></span>
                                                @endforeach
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
                                <div class="tableBox directSelect zdSelect" id="id_nettype" style="display:block;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                @foreach($NetworkTypeArray as $NetworkType)
                                                <span><label><input type="checkbox" name="nettype_id_array[]" value="{{$NetworkType['set_id']}}">{{$NetworkType['remark']}}</label></span>
                                                @endforeach
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
                                <div class="tableBox directSelect zdSelect" id="id_network" style="display:block;">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td>
                                                @foreach($OperatorArray as $Operator)
                                                <span><label><input type="checkbox" name="network_id_array[]" value="{{$Operator['set_id']}}">{{$Operator['remark']}}</label></span>
                                                @endforeach
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
        <div id="abc"></div>




        <script>
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(3).addClass('active');
            $('.mb-menu li').eq(3).addClass('active');

            $('.right-area').ready(function () {
                alert('eee');
            });

            auto_load_all_materials();

            function auto_load_all_materials(){
                $.ajax({
                    type:"post",
                    url:"/adsmember/ads/getallmaterial",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{},
                    // data:$("#form_insert").serialize(),
                    success:function(data){
                        if(data.status == 1)
                        {
                            $('.tab_box tbody').html(data.datas);
                            $('.tab_box').after(data.paginate);
                        }else{
                            alert('none');
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });
            }

            $('.icon-shuaxin').click(function () {
                auto_load_all_materials();
            });

            $('#searchimageid').click(function () {
                var id = $.trim( $('#keyword').val() );
                $.ajax({
                    type:"post",
                    url:"/adsmember/ads/getmaterialbyid/"+ id,
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{},
                    // data:$("#form_insert").serialize(),
                    success:function(data){
                        if(data.status == 1)
                        {
                            $('.tab_box tbody').html(data.datas);
                        }else{
                            alert(data.datas);
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });
            });

            function choose(id) {
                $.ajax({
                    type:"post",
                    url:"/adsmember/ads/choosematerial/"+ id,
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{},
                    // data:$("#form_insert").serialize(),
                    success:function(data){
                        if(data.status == 1)
                        {
                            $('#creative_suite_li').append(data.data);
                        }else{
                            alert('none');
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });
            }

            function removeimage(id){
                $("#material_item_"+id).remove();
            }
        </script>

@endsection