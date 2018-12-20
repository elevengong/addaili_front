@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 广告位管理</p>
        <!--position-->

        <div class="list-space">
            <div class="top">
                <div class="button">
                    <a href="/webmember/ads/add" class="button-1">+ 添加广告位</a>
                </div>
                <div class="top search-area">
                    <div class="input">
                        <form method="post" action="/webmember/ads/management" name="form_search" id="form_list">
                            {{csrf_field()}}
                            <input class="ipt" type="text" placeholder="广告位ID" name="keywordId" value="">
                            <input class="ipt" type="text" placeholder="广告位名称" name="keywordName" value="">
                            <select id="mobile_advert_type_id" name="adstype">
                                <option value="0" selected="selected">选择广告类型</option>
                                @foreach($adsTypeArray as $adsType)
                                <option value="{{$adsType['set_id']}}">{{$adsType['remark']}}</option>
                                @endforeach
                            </select>
                            <select id="mobile_charge_type_id" name="counttype">
                                <option value="0" selected="selected">选择计费模式</option>
                                @foreach($countTypeArray as $countType)
                                    <option value="{{$countType['set_id']}}">{{$countType['remark']}}</option>
                                @endforeach
                            </select>
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
                        <th scope="col">广告位ID</th>
                        <th scope="col" class="long-table">名称</th>
                        <th scope="col">广告类型</th>
                        <th scope="col">计费类型</th>
                        <th scope="col" class="mb-hide">创建时间</th>
                        <th scope="col" class="long-table">操作</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($allAdsArray as $allAds)
                    <tr>
                        <th scope="row">{{$allAds['webmaster_ads_id']}}</th>
                        <td class="long-table">{{$allAds['name']}}</td>
                        <td>{{$settingArray[$allAds['ads_type']]}}</td>
                        <td>{{$settingArray[$allAds['ads_count_type']]}}</td>
                        <td class="mb-hide">{{$allAds['created_at']}}</td>
                        <td class="long-table"><a href="/webmember/ads/getadscode/{{$allAds['webmaster_ads_id']}}" title="获取代码">获取代码</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <p class="slide-tip">可左右滑动浏览</p>

            {{$allAdsArray->links()}}

        </div>
        <script type="text/javascript">
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(4).addClass('active');
            $('.mb-menu li').eq(4).addClass('active');
        </script>

@endsection