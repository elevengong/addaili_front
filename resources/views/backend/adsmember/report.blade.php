@extends("backend.layout.adslayout")
@section("content")

    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 数据报表</p>
        <!--position-->

        <div class="list-amount-web ads-stat">
            <div class="top search-area">
                <form action="/service/business/stat/mobile/action/lists" method="get" id="form_list">
                    <div class="input">
                        <ul class="date">
                            <li><input name="stime" type="text" value="" placeholder="" id="stime" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                            <li>至</li>
                            <li><input name="etime" type="text" value="" placeholder="" id="etime" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                        </ul>

                        <input type="text" class="search-input" placeholder="广告位ID|名称" name="keyword" value="">

                        <div class="date">
                            <select id="mobile_advert_type_id" name="mobile_advert_type_id">
                                <option value="" selected="selected">请选择广告类型</option>
                                <option value="1">横幅</option>
                                <option value="11">网摘</option>
                                <option value="13">横幅（微信）</option>
                                <option value="15">网摘（微信）</option>
                            </select>
                            <select id="mobile_charge_type_id" name="mobile_charge_type_id">
                                <option value="" selected="selected">请选择计费类型</option>
                                <option value="1">CPM</option>
                                <option value="3">CPC</option>
                            </select>																									<select id="show_type" name="show_type">
                                <option value="">数据查看方式</option>
                                <option value="single" selected="selected">单个广告</option>
                                <option value="all">所有广告</option>
                            </select>									                        </div>

                        <input type="button" value="查询" class="check check-h" onclick="search_data();">
                        <div class="bottom">
                            <input type="button" value="查询" class="check" onclick="search_data();">
                            <input type="button" value="关闭" class="check close-bt">
                        </div>
                    </div>
                </form>
            </div>

            <div class="search-area-bg"></div>
            <div class="mb-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">广告ID</th>
                        <th scope="col">广告名称</th>
                        <th scope="col">广告类型</th>
                        <th scope="col">计费类型</th>
                        <th scope="col">单价</th>
                        <th scope="col">交易量</th>
                        <th scope="col">广告金额</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr class="">
                        <td colspan="5" scope="row"><strong>合计：</strong></td>
                        <td><strong>0</strong></td>
                        <td><strong>￥0.00</strong></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p class="slide-tip">可左右滑动浏览</p>
        </div>

        <script src="<?php echo asset( "/resources/views/backend/js/laydate.js") ?>" type="text/javascript"></script>
        <script>
            laydate.render({
                elem: '#stime'
            });

            laydate.render({
                elem: '#etime'
            });

            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(4).addClass('active');
            $('.mb-menu li').eq(4).addClass('active');
        </script>


@endsection