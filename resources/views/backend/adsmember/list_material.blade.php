@extends("backend.layout.adslayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 创意管理</p>

        <div class="ads-creative-list">
            <div class="button"><a href="/adsmember/material/upload" target="_blank" class="button-1">+ 上传创意</a></div>
            <div class="top search-area">
                <div class="input">
                    <form action="/adsmember/material/lists" method="post" name="form_search" id="form_list">
                        {{csrf_field()}}
                        <input type="text" name="keyword" value="" class="search-input" placeholder="创意ID">
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
                    @foreach($materialArray as $material)
                    <tr>
                        <th class="txt_l">{{$material['id']}}</th>
                        <th class="txt_l"><a href="{{$material['image']}}" target="_blank"><img src="{{$material['image']}}" width="90"></a></th>
                        <th class="txt_l">@if($material['status']==0)审核中@elseif($material['status']==1)已审核@elseif($material['status']==2)不通过@endif</th>
                        <th class="txt_l">{{$material['size']}}</th>
                        <th class="txt_l">{{$material['filesize']}}KB</th>
                        <th class="txt_l">{{$material['created_at']}}</th>
                        <th class="txt_l">&nbsp;
                            @if($material['status']!=1)
                            <a href="javascript:void(false)" onclick="del('{{$material['id']}}');" title="刪除" class="icoOpr jajax_delete">刪除</a>
                             @endif
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <p class="slide-tip">可左右滑动浏览</p>
            {{ $materialArray->links() }}
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

            function del(id) {
                var msg = "您真的确定要删除吗？\n\n请确认！";
                if (confirm(msg)==true){
                    $.ajax({
                        type:"delete",
                        url:"/adsmember/material/del/"+id,
                        dataType:'json',
                        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                        data:{},
                        // data:$("#form_insert").serialize(),
                        success:function(data){
                            if(data.status == 0)
                            {
                                alert(data.msg);
                            }else{
                                alert(data.msg);
                                window.location.reload();
                            }
                        },
                        error:function (data) {
                            layer.msg(data.msg);
                        }
                    });

                }else{
                    return false;
                }
            }
        </script>

@endsection