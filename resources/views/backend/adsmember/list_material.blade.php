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
                        <th scope="col">状态</th>
                        <th scope="col">尺寸</th>
                        <th scope="col">大小</th>
                        <th scope="col">创建时间</th>
                        <th scope="col">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($materialArray as $material)
                        <th class="txt_l">{{$material['id']}}</th>
                        <th class="txt_l"><a href="{{$material['image']}}" target="_blank" class="preview" height="250" width="300"><embed type="application/x-shockwave-flash" src="{{$material['image']}}" width="60" height="60" wmode="opaque"></a></th>
                        <th class="txt_l">{{$material['status']}}</th>
                        <th class="txt_l">640x200</th>
                        <th class="txt_l">102KB</th>
                        <th class="txt_l">{{$material['created_at']}}</th>
                        <th class="txt_l"><a href="javascript:void(false)" jid="189813" title="刪除" class="icoOpr jajax_delete">刪除</a></th>
                        @endforeach
                    </tr>
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