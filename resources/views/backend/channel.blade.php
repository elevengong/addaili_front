@extends("backend.layout.layout")
@section("content")
    <script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/ads.js?ver=1.1"); ?>"></script>
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">
                {{csrf_field()}}
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                <span class="l">
                    <a href="javascript:;" onclick="addads();" id="btn_add_account" class="btn btn-primary radius">
                        <i class="Hui-iconfont">&#xe600;</i> 添加广告渠道
                    </a>
                </span>
                </div>
                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="10">广告渠道ID</th>
                            <th width="50">广告渠道名称</th>
                            <th width="50">链接</th>
                            <th width="100">广告图</th>
                            <th width="50">广告类型</th>
                            <th width="50">计费类型</th>
                            <th width="50">展示平台</th>
                            <th width="50">余额</th>
                            <th width="50">广告单价</th>
                            <th width="50">总花费</th>
                            <th width="50">展示数</th>
                            <th width="50">点击数</th>
                            <th width="50">展示时间段</th>
                            <th width="30">状态</th>
                            <th width="30">申请时间</th>
                            <th width="30">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($adsListArray as $data)
                            <tr class="text-c">
                                <td>{{$data['ads_id']}}</td>
                                <td>{{$data['ads_name']}}</td>
                                <td>{{$data['ads_link']}}</td>
                                <td><a href="{{$data['ads_photo']}}" target="_blank"><img style="max-width: 100px;" src="{{$data['ads_photo']}}"></a></td>
                                <td>{{$adsTypeArray[$data['ads_type']]}}</td>
                                <td>{{$adsCountTypeArray[$data['ads_count_type']]}}</td>
                                <td>@if($data['ismobile']==0)PC @else 手机 @endif</td>
                                <td>{{$data['ads_balance']}}</td>
                                <td>{{$data['ads_per_cost']}}</td>
                                <td>{{$data['ads_amount_cost']}}</td>
                                <td>{{$data['show_times']}}</td>
                                <td>{{$data['click_times']}}</td>
                                <td>@if($data['ads_time_period']=='')全天24小时 @else $data['ads_time_period'] @endif</td>
                                <td>@if($data['status']==0)等待审核 @elseif($data['status']==1) 通过 @elseif($data['status']==2) 暂停 @elseif($data['status']==3) 禁止 @endif</td>
                                <td>{{$data['created_at']}}</td>
                                <td><a href="javascript:" onclick="">修改</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">
                    {{ $adsListArray->links() }}
                </div>

            </article>
        </div>

        <hr />

    </section>
    <script>
        function addads() {
            var index = layer.open({
                type: 2,
                title: "添加广告渠道",
                closeBtn: 0,
                area: ['700px', '700px'], //宽高
                shadeClose: true,
                resize:false,
                content: '/backend/ads/channeladd'
            });;
        }
    </script>



@endsection