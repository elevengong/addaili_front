@extends("backend.layout.weblayout")
@section("content")
<div class="right-area">
    <p class="position">当前位置：管理后台 &gt; 添加广告位</p>
    <!--position-->

    <form id="form_insert">
        {{csrf_field()}}
        <div class="insert-form">
            <h5 class="head-title">添加广告位</h5>
            <p class="warning"><i class="iconfont icon-jingshi"></i>根据您选择的广告类型，系统自动显示广告，可以获取的更多的广告费，广告数据每2分钟返回一次。</p>
            <div class="con">
                <div class="input">
                    <span>广告位名称：</span>
                    <input type="text" class="search-input" name="name" id="name">
                </div>

                <div class="form_row">
                    <div class="form_tit">广告类型：</div>

                    <div class="form_cont">
                        @foreach($adsTypeArray as $adsType)
                        <span class="form_group w150">
							<label for="ati_1">
							<input class="jmobile_advert_type" type="radio" name="ads_type" value="{{$adsType['set_id']}}">{{$adsType['remark']}}
                            </label>
                        </span>
                        @endforeach
                    </div>
                </div>

                <div class="form_row">
                    <div class="form_tit">计费类型：</div>
                    <div class="form_cont">
                        @foreach($countTypeArray as $countType)
                        <span class="form_group w150">
                            <label for="ti_1">
                                <input class="jmobile_charge_type_id" type="radio" name="ads_count_type" value="{{$countType['set_id']}}">{{$countType['remark']}}
                            </label>
                        </span>
                        @endforeach
                    </div>
                </div>

                <div class="button">
                    <input class="big_btn subBtn jbtn_save" type="button" value="保 存">
                    <input class="big_btn grayBtn jbtn_cancel" type="button" value="取 消">
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $('.menu li').removeClass('active');
        $('.mb-menu li').removeClass('active');
        $('.menu li').eq(4).addClass('active');
        $('.mb-menu li').eq(4).addClass('active');

        $('.jbtn_save').click(function () {
            var name = $.trim( $("#name").val() );
            var ads_type = $('input[name="ads_type"]:checked').val();
            var ads_count_type = $('input[name="ads_count_type"]:checked').val();

            if(name == '')
            {
                alert('广告位名称不能为空!');
                return false;
            }
            if(ads_type === undefined || ads_type == '')
            {
                alert('广告类型不能为空!');
                return false;
            }
            if(ads_count_type === undefined || ads_count_type == '')
            {
                alert('计费类型不能为空!');
                return false;
            }
            $.ajax({
                type:"post",
                url:"/webmember/ads/add",
                dataType:'json',
                headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                data:{'name':name,'ads_type':ads_type,'ads_count_type':ads_count_type},
                success:function(data){
                    if(data.status == 0)
                    {
                        alert(data.msg);
                    }else{
                        alert(data.msg);
                        window.location.href='/webmember/ads/management';
                    }
                },
                error:function (data) {
                    layer.msg(data.msg);
                }
            });

        });

    </script>
@endsection