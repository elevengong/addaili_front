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

        <script class="script_webuploader" type="text/javascript" src="/js/webuploader/webuploader.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/webuploader/webuploader.css">
        <form id="form_insert">
            <div class="insert-app ads-advert-update">
                <input type="hidden" value="1" name="ajax_do">
                <input type="hidden" name="response" value="">
                <input type="hidden" name="mobile_user_id" id="mobile_user_id" value="34129">
                <h5 class="head-title">上传素材</h5>
                <div class="con">
                    <div class="form_row">
                        <span class="form-ti">素材类型：</span>
                        <select id="imagetype" name="imagetype">
                            <option value="0">全部</option>
                            @foreach($imageTypeArray as $imageType)
                            <option value="{{$imageType['id']}}">{{$imageType['remark']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_row">
                        <div class="form-ti">素材上传：</div>
                        <div class="form_cont">
                            <div class="upload_box"><span id="jbtn_upload_slave" class="webuploader-container"><div class="webuploader-pick">上传素材</div><div id="rt_rt_1cu4a1btu1c63fqq1d1aqemjue1" style="position: absolute; top: -15.2344px; left: 0px; width: 150px; height: 50px; overflow: hidden; bottom: auto; right: auto;"><input type="file" name="file" class="webuploader-element-invisible" multiple="multiple" accept="image/*"><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></span></div>
                            <div class="d_material_choose clearfix" style="display:none;">
                            </div>
                        </div>
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
        </script>
@endsection