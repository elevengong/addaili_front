@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 网站管理</p>
        <!--position-->

        <div class="list-space web-list">
            <div class="top">
                <div class="button">
                    <a href="/webmember/website/add" class="button-1">+ 添加域名</a>
                </div>

                <div class="top search-area">
                    <div class="input">
                        <form method="get" action="http://www.17un.com/service/customer/mobile/domain/action/lists.html" name="form_search" id="form_list">
                            <input class="search-input" type="text" name="keyword" value="" placeholder="ID|网站名称|域名">
                            <input type="submit" value="查询" class="check check-h">
                            <div class="bottom">
                                <input class="sm_btn check" type="submit" value="查 询">
                                <input type="button" value="关闭" class="check close-bt">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="search-area-bg"></div>
            <div class="mb-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="mb-hide">编号</th>
                        <th scope="col" class="mb-hide">网站名称</th>
                        <th scope="col">域名</th>
                        <th scope="col">网站类型</th>
                        <th scope="col" class="mb-hide">备案号</th>
                        <th scope="col">状态</th>
                        <th scope="col" class="mb-hide">审核时间</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td colspan="8">没有数据信息</td>
                    </tr>

                    </tbody>
                </table>
            </div>

            <p class="slide-tip">可左右滑动浏览</p>

            <ul class="pagination">
            </ul>
        </div>
        <script type="text/javascript">
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(2).addClass('active');
            $('.mb-menu li').eq(2).addClass('active');
        </script>

@endsection