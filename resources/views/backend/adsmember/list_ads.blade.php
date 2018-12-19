@extends("backend.layout.adslayout")
@section("content")

    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 广告管理</p>
        <!--position-->

        <div class="list-space list-app ads-advert-list">
            <div class="button">
                <a href="/adsmember/ads/add" class="button-1">+ 创建广告</a>
            </div>

            <div class="top search-area">
                <form action="/adsmember/ads/lists" method="post">
                    <div class="input">
                        {{csrf_field()}}
                        <input class="ipt" type="text" name="ads_id" value="" placeholder="广告ID">
                        <input class="ipt" type="text" name="ads_name" value="" placeholder="名称">
                        <span><select id="adstype" name="adstype">
                                <option value="0" selected="selected">选择广告类型</option>
                                @foreach($adstypeArray as $adsType)
                                <option value="{{$adsType['set_id']}}">{{$adsType['remark']}}</option>
                                @endforeach
                                </select></span>
                        <span><select id="count_type" name="count_type">
                                <option value="0" selected="selected">选择计费类型</option>
                                @foreach($countTypeArray as $countType)
                                    <option value="{{$countType['set_id']}}">{{$countType['remark']}}</option>
                                @endforeach
                                </select></span>
                        <span><select id="status" name="status">
                                <option value="" selected="selected">选择状态</option>
                                <option value="0">待审</option>
                                <option value="1">正常</option>
                                <option value="2">暂停</option>
                                <option value="3">账户余额不足</option>
                                <option value="4">当天预算用完</option>
                                <option value="5">系统暂停</option>
                                </select></span>
                        <input type="submit" value="查询" class="check check-h">
                        <div class="bottom">
                            <input type="submit" value="查询" class="check">
                            <input type="button" value="关闭" class="check close-bt">
                        </div>
                    </div>
                </form>
            </div>

            <div class="search-area-bg"></div>

            <div class="mb-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">广告ID</th>
                        <th scope="col" class="br-table">广告名称</th>
                        <th scope="col">广告类型</th>
                        <th scope="col">计费类型</th>
                        <th scope="col">单价(千次)</th>
                        <th scope="col">总预算</th>
                        <th scope="col">每日预算</th>
                        <th scope="col">总剩余预算</th>
                        <th scope="col">每日剩余预算</th>
                        <th scope="col" class="br-table">状态</th>
                        {{--<th scope="col">备注</th>--}}
                        <th scope="col" class="long-table">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($adsArray as $ads)
                    <tr>
                        <th scope="row">{{$ads['ads_id']}}</th>
                        <td class="br-table">{{$ads['ads_name']}}</td>
                        <td>{{$setting[$ads['ads_type']]}}</td>
                        <td>{{$setting[$ads['ads_count_type']]}}</td>
                        <td>{{$ads['per_cost']*1000}}</td>
                        <td>{{$ads['total_budget']}}</td>
                        <td>{{$ads['daily_budget']}}</td>
                        <td>{{$ads['total_budget']}}</td>
                        <td>{{$ads['daily_budget']}}</td>
                        <td class=" br-table" id="state_{{$ads['ads_id']}}">
                            @if($ads['status']==0)审核中 @elseif($ads['status']==1)已审核 @elseif($ads['status']==2)已暂停 @elseif($ads['status']==3)账户余额不足 @elseif($ads['status']==4)当天预算用完 @elseif($ads['status']==5)已关闭@endif
                        </td>
                        {{--<td></td>--}}
                        <td>
                            <a href="/adsmember/ads/edit/{{$ads['ads_id']}}" title="编辑" class="icoOpr icoEdit">编辑</a>
                            @if($ads['status'] == 1)
                            <a href="javascript:" target="_blank" title="暂停" onclick="adschange('{{$ads['ads_id']}}',2)" class="icoOpr icoEdit">暂停</a>
                                @endif
                            @if($ads['status'] == 2)
                                <a href="javascript:" target="_blank" title="开始" onclick="adschange('{{$ads['ads_id']}}',1)" class="icoOpr icoEdit">开始</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <p class="slide-tip">可左右滑动浏览</p>

            {{$adsArray->links()}}
        </div>
        <!--list-ad-->
    </div>

    <script>
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(3).addClass('active');
        $('.mb-menu li').eq(3).addClass('active');

        function adschange(ads_id,status) {
            var msg = "您真的确定要暂停吗？\n\n请确认！";
            if (confirm(msg)==true){
                $.ajax({
                    type:"post",
                    url:"/adsmember/ads/changestatus/"+ads_id,
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{status:status},
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