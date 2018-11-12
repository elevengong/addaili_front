@extends("backend.layout.layout")
@section("content")
    <script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/traffic.js?ver=1.1"); ?>"></script>
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">
                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="50">IP</th>
                            <th width="50">站长ID</th>
                            <th width="50">网站ID</th>
                            <th width="50">显示网站</th>
                            <th width="50">来路</th>
                            <th width="50">广告ID</th>
                            <th width="50">点击？</th>
                            <th width="50">省</th>
                            <th width="50">市</th>
                            <th width="50">广告显示时间</th>
                            <th width="50">手机？</th>
                            <th width="50">系统版本</th>
                            <th width="50">浏览器版本</th>
                            <th width="50">是否扣费</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($traffics as $data)
                            <tr class="text-c">
                                <td>{{$data['ip']}}</td>
                                <td>{{$data['webmaster_id']}}</td>
                                <td>{{$data['web_id']}}</td>
                                <td>{{$data['web_domain']}}</td>
                                <td>{{$data['come_url']}}</td>
                                <td>{{$data['ads_id']}}</td>
                                <td>{{$data['click_status']}}</td>
                                <td>{{$data['region_id']}}</td>
                                <td>{{$data['city_id']}}</td>
                                <td>{{$data['visit_time']}}</td>
                                <td>{{$data['ismobile']}}</td>
                                <td>{{$data['vistor_system']}}</td>
                                <td>{{$data['vistor_exploer']}}</td>
                                <td>{{$data['earn_money']}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">
                    {{ $traffics->links() }}
                </div>

            </article>
        </div>

        <hr />

    </section>
    <script>
        function verifyads(ads_id,status) {
            var msg = '';
            if(status == 1)
            {
                msg = '审核通过';
            }else{
                msg = '禁止';
            }
            layer.confirm( "是否审核通过ID为:"+ads_id+"的广告位？", function(){
                $.ajax({
                    type:"post",
                    url:"/backend/ads/verifyads",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'ads_id':ads_id, 'status':status},
                    success:function(data){
                        if(data.status == 0)
                        {
                            layer.msg( data.msg );

                        }else{
                            window.location.reload();
                            layer.msg( data.msg );
                        }

                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });
            });
        }

    </script>



@endsection