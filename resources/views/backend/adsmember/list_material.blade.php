@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 创意管理</p>

        <div class="ads-creative-list">
            <div class="button"><a href="/adsmember/material/upload" target="_blank" class="button-1">+ 上传创意</a></div>
            <div class="top search-area">
                <div class="input">
                    <form action="/adsmember/material/lists" method="get" name="form_search" id="form_list">
                        <input type="text" name="keyword" value="" class="search-input" placeholder="创意ID|名称">
                        <input type="submit" value="查询" class="check check-h">
                    </form>
                </div>
            </div>
            <div class="search-area-bg"></div>
            <div class="mb-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">创意ID</th>
                        <th scope="col">创意图</th>
                        <th scope="col">创意名称</th>
                        <th scope="col">状态</th>
                        <th scope="col">尺寸</th>
                        <th scope="col">大小</th>
                        <th scope="col">创建时间</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td colspan="8">暂无数据</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="slide-tip">可左右滑动浏览</p>
            <ul class="pagination"></ul>
        </div>
        <style>
            <!--
            .tdpic img {
                width: 50px;
                height: 50px;
                vertical-align: middle;
                margin-right: 5px;
            }
            -->
        </style>
        <script>
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(2).addClass('active');
            $('.mb-menu li').eq(2).addClass('active');
        </script>

@endsection