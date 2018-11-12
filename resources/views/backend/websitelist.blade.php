@extends("backend.layout.layout")
@section("content")
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">
                {{csrf_field()}}
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                <span class="l">
                    <a href="javascript:;" onclick="addsite();" id="btn_add_account" class="btn btn-primary radius">
                        <i class="Hui-iconfont">&#xe600;</i> 添加网站
                    </a>
                </span>
                </div>
                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="10">网站名</th>
                            <th width="50">网址</th>
                            <th width="50">状态</th>
                            <th width="100">网站类型</th>
                            <th width="30">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($websites as $data)
                            <tr class="text-c">
                                <td>{{$data['web_name']}}</td>
                                <td>{{$data['web_url']}}</td>
                                <td>@if($data['status']==0)等待审核 @elseif($data['status']==1) 通过 @elseif($data['status']==2) 禁止 @elseif($data['status']==3) 暂停 @endif</td>
                                <td>{{$data['created_at']}}</td>
                                <td><a href="javascript:" onclick="">修改</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">
                    {{ $websites->links() }}
                </div>

            </article>
        </div>

        <hr />

    </section>
    <script>
        function addsite() {
            var index = layer.open({
                type: 2,
                title: "添加网站",
                closeBtn: 0,
                area: ['700px', '700px'], //宽高
                shadeClose: true,
                resize:false,
                content: '/backend/website/siteadd'
            });;
        }
    </script>



@endsection