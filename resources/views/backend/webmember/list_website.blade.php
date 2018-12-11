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
                        <form method="get" action="/webmember/website/index" name="form_search" id="form_list">
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
                        <th scope="col">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($allWebsiteArray as $website)
                    <tr>
                        <td>{{$website['web_id']}}</td>
                        <td>{{$website['web_name']}}</td>
                        <td>{{$website['domain']}}</td>
                        <td>{{$website['remark']}}</td>
                        <td>{{$website['icp']}}</td>
                        <td>@if($website['status']==0)审核中@elseif($website['status']==1)审核已通过@elseif($website['status']==2)审核没通过@endif</td>
                        <td><a href="javascript:void(false)" onclick="del('{{$website['web_id']}}');" title="刪除">删除</a></td>
                    </tr>
                    @endforeach
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

            function del(id) {
                var msg = "您真的确定要删除吗？\n\n请确认！";
                if (confirm(msg)==true){
                    $.ajax({
                        type:"delete",
                        url:"/webmember/website/delete/"+id,
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