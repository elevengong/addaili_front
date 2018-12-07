@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 消息中心</p>
        <div class="list-news">
            <h5 class="head-title">消息中心</h5>

            <ul class="news-list">
                <li>暂无消息</li>
            </ul>
            <ul class="pagination">
            </ul>
        </div>
        <script>
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(6).addClass('active');
            $('.mb-menu li').eq(6).addClass('active');
        </script>
@endsection