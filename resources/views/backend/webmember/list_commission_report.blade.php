@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 佣金报表</p>
    <!--position-->

    <div class="list-amount-web">
        <div class="top search-area">
            <div class="input">
                <form id="ajax_search">
                    <ul class="date">
                        <li><input type="text" placeholder="开始时间" id="stime" name="stime" value="2018-12-04" lay-key="1"><i class="iconfont icon-gongdantubiao-"></i></li>
                        <li>至</li>
                        <li><input type="text" placeholder="结束时间" id="etime" name="etime" value="2018-12-11" lay-key="2"><i class="iconfont icon-gongdantubiao-"></i></li>
                    </ul>

                    <select id="mobile_advert_type_id" name="mobile_advert_type_id">
                        <option value="" selected="selected">选择广告类型</option>
                        <option value="1">横幅</option>
                        <option value="11">网摘</option>
                        <option value="19">小图标</option>
                        <option value="23">富媒体PC</option>
                        <option value="25">弹窗PC</option>
                    </select>							<select id="mobile_charge_type_id" name="mobile_charge_type_id">
                        <option value="" selected="selected">选择计费模式</option>
                        <option value="1">CPM</option>
                        <option value="3">CPC</option>
                    </select>							<select id="mobile_domain_id" name="mobile_domain_id">
                        <option value="" selected="selected">选择域名</option>
                    </select>
                    <input type="text" class="search-input" placeholder="广告位ID" name="mobile_space_id" value="" id="mobile_space_id">
                    <input type="submit" value="查询" class="check check-h">
                    <div class="bottom">
                        <input class="sm_btn check" type="submit" value="查 询">
                        <input type="button" value="关闭" class="check close-bt">
                    </div>
                </form>
            </div>
        </div>
        <div class="search-area-bg"></div>

        <div class="mb-table"><table class="table"><thead><tr><th scope="col">日期</th><th scope="col">佣金</th></tr></thead><tbody><tr scope="row"><td colspan="2">暂无数据！</td></tr></tbody></table><div class="loading" style="display: none;"><i class="iconfont icon-loading"></i><span>加载数据...</span></div></div>

        <p class="slide-tip">可左右滑动浏览</p>


    </div>
    <script src="<?php echo asset( "/resources/views/backend/js/laydate.js") ?>" type="text/javascript"></script>
    <script>
        //执行一个laydate实例
        laydate.render({
            elem: '#stime' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#etime' //指定元素
        });
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(5).addClass('active');
        $('.mb-menu li').eq(5).addClass('active');
    </script>

    @endsection