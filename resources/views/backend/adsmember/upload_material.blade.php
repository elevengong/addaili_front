@extends("backend.layout.adslayout")
@section("content")
    <style>
        .webuploader-container {
            position: relative;
        }
        .webuploader-element-invisible {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
            clip: rect(1px,1px,1px,1px);
        }
        .webuploader-pick {
            position: relative;
            display: inline-block;
            cursor: pointer;
            background: #50A9B6;
            padding: 0 15px;
            color: #fff;
            text-align: center;
            border-radius: 3px;
            overflow: hidden;
            width: 150px;
            height: 50px;
            font-size: 16px;
            line-height: 50px;
            vertical-align: middle;
        }
        .webuploader-pick-hover {
            background: #76BDC7;
        }

        .webuploader-pick-disable {
            opacity: 0.6;
            pointer-events:none;
        }

    </style>
    <div class="right-area">
        <p class="position">当前位置：管理后台 &gt; 添加</p>

        <form id="form_insert">
            <div class="insert-app ads-advert-update">
                <h5 class="head-title">上传素材</h5>
                <div class="con">
                    <div class="form_row">
                        <span class="form-ti">素材类型：</span>
                        <select id="imagetype" name="settinggroup">
                            <option value="0" selected="selected">全部</option>
                            @foreach($imageTypeArray as $imageType)
                            <option value="{{$imageType['id']}}">{{$imageType['remark']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_row">
                        {{csrf_field()}}
                        <div class="form-ti">素材上传：</div>
                        <div class="form_cont">
                            <div class="upload_box">
                                <span id="jbtn_upload_slave" class="webuploader-container">
                                    <div id="rt_rt_1cu4a1btu1c63fqq1d1aqemjue1" style=" top: -15.2344px; left: 0px; width: 150px; height: 50px; overflow: hidden; bottom: auto; right: auto;">
                                        <input type="button" value="上传图片" onclick="photo1.click()" style=""  class="webuploader-pick"/>
                                        <p><input type="file" id="photo1" name="photo1" onchange="upload(this);" style="display:none" /></p>
                                        <input type="hidden" id="adsimage" name="image" value="">
                                    </div>
                                </span>
                            </div>
                            <div class="d_material_choose clearfix" style="display:none;">
                            </div>
                        </div>
                    </div>
                    <div class="form_row">
                        <div class="form-ti">&nbsp;</div>
                        <div id="show" style="float:left;padding-left:7px;"></div>
                    </div>
                    <div class="form_row">
                        <span class="form-ti">温馨提示：</span>
                        系统已对接阿里AI智能鉴黄系统，凡是违规素材一律拒绝上传和使用
                    </div>
                    <div class="form_row"><div class="form_tit">&nbsp;</div><div class="form_cont btn_box" style="text-align: unset;"><input class="big_btn subBtn jbtn_save" type="button" value="提 交"></div></div>
                </div>
            </div>
        </form>
        <script>
            $('.menu li').removeClass('active');
            $('.mb-menu li').removeClass('active');
            $('.menu li').eq(2).addClass('active');
            $('.mb-menu li').eq(2).addClass('active');

            $('.big_btn').click(function () {
                var adsimage  = $.trim( $('#adsimage').val() );
                var imagetype  = $.trim( $('#imagetype').val() );
                if(adsimage == '')
                {
                    alert('没有上传素材!');
                    return false;
                }
                if(imagetype == 0)
                {
                    alert('请选择素材类型!');
                    return false;
                }

                $.ajax({
                    type:"post",
                    url:"/adsmember/material/upload/process",
                    dataType:'json',
                    headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                    data:$("#form_insert").serialize(),
                    success:function(data){
                        if(data.status == 0)
                        {
                            alert(data.msg);
                        }else{
                            alert(data.msg);
                            window.location.href = '/adsmember/material/lists';
                        }
                    },
                    error:function (data) {
                        layer.msg(data.msg);
                    }
                });

            });



            function upload(obj){
                var id = $(obj).attr("id");
                var animateimg = $(obj).val();//获取上传的图片名 带//
                var imgarr=animateimg.split('\\'); //分割
                var myimg=imgarr[imgarr.length-1]; //去掉 // 获取图片名
                var houzui = myimg.lastIndexOf('.'); //获取 . 出现的位置
                var ext = myimg.substring(houzui, myimg.length).toUpperCase();  //切割 . 获取文件后缀

                var file = $(obj).get(0).files[0]; //获取上传的文件
                var fileSize = file.size;           //获取上传的文件大小
                var maxSize = 10485760;              //最大10MB
                if(ext !='.PNG' && ext !='.GIF' && ext !='.JPG' && ext !='.JPEG' && ext !='.BMP'){
                    layer.msg('文件类型错误,请上传图片类型');
                    return false;
                }else if(parseInt(fileSize) >= parseInt(maxSize)){
                    layer.msg('上传的文件不能超过1MB');
                    return false;
                }else{
                    var data = new FormData($('#form_insert')[0]);

                    $.ajax({
                        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
                        url: "/backend/uploadphoto/"+id,
                        type: 'POST',
                        data: data,
                        //data:{'data':data, 'id':id},
                        dataType: 'JSON',
                        cache: false,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            if(data.status == 0)
                            {
                                alert(data.msg);

                            }else{
                                //window.location.reload();
                                var result = '<img id="img" src="'+data.pic+'" width="180">';
                                $('#show').html(result);
                                $('#adsimage').val(data.pic);

                            }

                        },
                        error:function (data) {
                            layer.msg(data.msg);

                        }
                    });
                    return false;
                }
            }
        </script>
@endsection