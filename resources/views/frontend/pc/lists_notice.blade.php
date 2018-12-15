@extends("frontend.pc.layout.layout")
@section("content")
    <style>
        .pagination li{
            float: left;
        }
        .pagination .active span{
            width: auto;
            line-height: 30px;
            padding: 0 11px;
            display: block;
            font-size: 14px;
            color: white;
            text-decoration: none;
            border: solid 1px #ddd;
            border-radius: 4px;
            float: left;
            margin: 0 5px;
            background: #007bff;
        }
        .pagination .disabled{
            display: none;
        }
    </style>
<div class="page-banner" style="background-image: url('{{url('/resources/views/frontend/pc/images/page-banner-3.jpg')}}')">
    <h5>公告中心</h5>

    <h6>announcement</h6>
</div>
<!--page-banner-->

<div class="news-page">
    <div class="container">
        <ul class="news">
            @foreach($messageArray as $message)
            <li>
                <a href="/notice/{{$message['msg_id']}}.html" class="con">
                    <h5>{{$message['message_title']}}</h5>

                    <h6>{{mb_substr($message['message_content'] , 0 , 40)}}...</h6>

                    <p>{{$message['created_at']}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    {{$messageArray->links()}}

</div>
<!--news-page-->
<script>
    $('.header-menu li').removeClass('active');
    $('.menu li').removeClass('active');
    $('.menu li:eq(2)').addClass('active');
    $('.header-menu li:eq(2)').addClass('active');
</script>
@endsection