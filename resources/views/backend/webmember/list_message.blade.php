@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 消息中心</p>
        <!--position-->

        <div class="list-news">
            <h5 class="head-title">消息中心</h5>

            <ul class="news-list">
                @foreach($allMessageArray as $message)
                <li>
                    <a href="javascript:void(0);" class="readMessage " jid="{{$message['msg_id']}}site_affiche">
                        <p>{{$message['message_title']}}</p>

                        <span>{{$message['created_at']}}</span>
                    </a>

                    <div class="con" id="m_{{$message['msg_id']}}site_affiche" style="display:none" data="0" data_state="read" data_slave_id="">
                        <p><span style="color: rgb(51, 51, 51); font-family: arial, Tahoma, Verdana; text-align: center;  background-color: rgb(246, 246, 246);">{{$message['message_content']}}</span><br></p>
                    </div>
                </li>
                @endforeach

            </ul>

            {{$allMessageArray->links()}}


        </div>

        <script type="text/javascript">
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(7).addClass('active');
            $('.mb-menu li').eq(7).addClass('active');

            $(".readMessage").click(function() {
                var $this = $(this);
                var id = $this.attr('jid')
                var hide = $("#m_" + id).attr('data');
                var state = $("#m_" + id).attr('data_state');
                var slave_id = $("#m_" + id).attr('data_slave_id');
                var staff_id = $("#staff_id").val();
                if (hide == 0) {
                    $("#m_" + id).slideDown(300);
                    if (state == 'unread' && staff_id != '0') {
                        $.post(InstationMessage.ctl + 'public_update_state', {
                            id : slave_id
                        }, function(ret) {
                            if (ret.code == 1) {
                                $("#m_" + id).attr('data_state', 'read');
                                $this.removeClass('unread');
                            } else {
                                alert(ret.message);
                            }
                        }, 'json');
                    }
                    $("#m_" + id).attr('data', '1');
                } else {
                    $("#m_" + id).slideUp(300);
                    $("#m_" + id).attr('data', '0');
                }
            });
        </script>

@endsection