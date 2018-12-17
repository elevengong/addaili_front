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
                <form action="#" method="get">
                    <div class="input">
                        <input class="ipt" type="text" name="keyword" value="" placeholder="广告ID | 名称">
                        <span><select id="mobile_advert_type_id" name="mobile_advert_type_id">
                                <option value="" selected="selected">选择广告类型</option>
                                <option value="1">横幅</option>
                                <option value="11">网摘</option>
                                <option value="13">横幅（微信）</option>
                                <option value="15">网摘（微信）</option>
                                <option value="21">小图标（微信）</option>
                                <option value="19">小图标</option>
                                <option value="27">互动广告</option>
                                <option value="31">视频广告</option>
                                <option value="33">网摘双图</option>
                                </select></span>
                        <span><select id="mobile_charge_type_id" name="mobile_charge_type_id">
                                <option value="" selected="selected">选择计费类型</option>
                                <option value="1">CPM</option>
                                <option value="3">CPC</option>
                                </select></span>
                        <span><select id="state" name="state">
                                <option value="" selected="selected">选择状态</option>
                                <option value="ready">待审</option>
                                <option value="open">正常</option>
                                <option value="pause">暂停</option>
                                <option value="stop">系统暂停</option>
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
                            <a href="/adsmember/ads/edit/{{$ads['ads_id']}}" title="编辑" class="icoOpr icoEdit">编辑</a>&nbsp;&nbsp;
                            <a href="#" target="_blank" title="暂停" class="icoOpr icoEdit">暂停</a>
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
    </script>
@endsection