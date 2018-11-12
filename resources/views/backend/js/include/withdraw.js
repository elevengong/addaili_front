function dealwithdraw(withdraw_id) {
    var index = layer.open({
        type: 2,
        title: "处理站长提款订单",
        closeBtn: 0,
        area: ['700px', '700px'], //宽高
        shadeClose: true,
        resize: false,
        content: '/backend/money/dealwithdraworder/' + withdraw_id
    });
}

function updatewithdraworder(withdraw_id) {
    var status = $.trim( $('#status').val() );
    var remark  = $.trim( $('#remark').val() );
    if( $.inArray(status, ['1', '2']) == -1){
        layer.msg("状态异常");
        return false;
    }
    $.ajax({
        type:"post",
        url:"/backend/money/updatewithdraworder/" + withdraw_id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:{'status':status, 'remark':remark},
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg( data.msg ,function () {
                    window.parent.location.reload();
                    window.location.close();
                });
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });
}