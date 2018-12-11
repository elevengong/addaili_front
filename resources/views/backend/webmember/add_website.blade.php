@extends("backend.layout.weblayout")
@section("content")
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 添加新网站</p>
        <!--position-->

        <form id="form_insert">
            {{csrf_field()}}
            <div class="insert">
                <h5 class="head-title">添加新网站</h5>
                <p class="warning"><i class="iconfont icon-jingshi"></i>禁止淫秽、色情、赌博、暴力或者教唆犯罪等违反国家法律、法规的网站投放本联盟代码，一经发现，将立即做封号处理。</p>

                <div class="input-list">
                    <div class="input">
                        <span>网站名称：</span>

                        <input type="text" class="search-input" name="webname" id="webname">
                    </div>

                    <div class="input">
                        <span>域名：</span>

                        <input type="text" class="search-input" name="domain" id="domain">
                    </div>

                    <div class="input">
                        <span>网站备案号：</span>

                        <input type="text" class="search-input" name="icp" id="icp">
                    </div>

                    <div class="input">
                        <span>网站类型：</span>
                        <select name="webtype" id="webtype">
                            <option value="0" selected="selected">请选择网站类型</option>
                            @foreach($webTypeArray as $webType)
                            <option value="{{$webType['set_id']}}">{{$webType['remark']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="button">
                        <input class="big_btn subBtn jbtn_save" type="button" value="保 存">
                        <input class="big_btn grayBtn jbtn_cancel" type="button" value="取 消">
                    </div>
                </div>
            </div>
        </form>
        <script src="<?php echo asset( "/resources/views/frontend/pc/js/baseCheck.js") ?>"></script>
        <script type="text/javascript">
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(2).addClass('active');
            $('.mb-menu li').eq(2).addClass('active');
            
            $('.jbtn_save').click(function () {
                var webname = $.trim( $("#webname").val() );
                var domain = $.trim( $("#domain").val() );
                var icp = $.trim( $("#icp").val() );
                var webtype = $("#webtype  option:selected").val();

                if(webname == '')
                {
                    alert('请输入网站名称!');
                    return false;
                }
                if(!isUrl(domain) || domain == '')
                {
                    alert('域名格式错误或不能为空!');
                    return false;
                }
                if(icp == '')
                {
                    alert('请输入网站备案号!');
                    return false;
                }
                if(webtype == '' || webtype == 0)
                {
                    alert('请选择网站类型!');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:"/webmember/website/add",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:{'webname':webname,'domain':domain,'icp':icp,'webtype':webtype},
                    success:function(data){
                        if(data.status == 0)
                        {
                            alert(data.msg);
                        }else{
                            alert(data.msg);
                            window.location.href='/webmember/website/index';
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });

            });
        </script>

@endsection