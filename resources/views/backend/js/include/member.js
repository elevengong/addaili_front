function changememberstatus(status,member_id) {
    var msg1, msg2 = '';
    if( status == 1 ){
        msg1 = "启用";
        msg2 = "冻结";
    }else{
        msg1 = "冻结";
        msg2 = "启用";
    }

    layer.confirm( "当前状态为【" + msg1 + "】，是否更改为【" + msg2 + "】？", function(){
        $.ajax({
            type:"post",
            url:"/backend/member/changememberstatus",
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:{'member_id':member_id, 'status':status},
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

function resetpwd(member_id) {
    var repwd  = $.trim( $('#repwd').val() );
    if(repwd == '')
    {
        layer.msg('密码不能为空');
        return false;
    }
    $.ajax({
        type:"post",
        url:"/backend/member/resetmemberpwd/" + member_id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:$("#form1").serialize(),
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                    parent.layer.close(index);
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });
}

function resetmemberpwd(member_id,name,type) {
    var index = layer.open({
        type: 2,
        title: "重设"+ type +"'"+ name + "'的密码",
        closeBtn: 0,
        area: ['450px', '300px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/member/resetmemberpwd/'+ member_id
    });
}

function setpersonalrate(member_id,personal_rate,member_name) {
    layer.prompt( { title: "请重新设定站长'"+ member_name +"'的扣量比例", formType: 0 , value:personal_rate}, function( rate, index ){
        if(isNaN(rate) || rate == '')
        {
            layer.msg('扣量比率数字和不能为空');
            return false;
        }
        if( rate > 1 ){
            layer.msg("扣量比率不能大于1");
            return false;
        }
        if( rate < 0 ){
            layer.msg("扣量比率不能小于0");
            return false;
        }

        $.ajax({
            type:"post",
            url:"/backend/member/setpersonalrate",
            dataType:'json',
            headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
            data:{personal_rate: rate, member_id:member_id},
            success:function(data){
                if(data.status == 0)
                {
                    layer.msg( data.msg );

                }else{
                    layer.msg( data.msg ,function () {
                        layer.close(index);
                        window.location.reload();
                    });
                }

            },
            error:function (data) {
                layer.msg("修改失败");
            }

        });

    });

}