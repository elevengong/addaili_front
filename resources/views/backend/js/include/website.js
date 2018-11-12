function verifywebsite(web_id) {
    var index = layer.open({
        type: 2,
        title: "网站审核",
        closeBtn: 0,
        area: ['550px', '480px'], //宽高
        shadeClose: true,
        resize:false,
        content: '/backend/ads/verifyweb/'+ web_id
    });
}

function updatewebsitestatus(web_id) {
    var status = $.trim( $("#status").val() );
    if(status == 0)
    {
        layer.msg( '还没审核阿' );
        return false;
    }
    $.ajax({
        type:"post",
        url:"/backend/ads/verifyweb/"+ web_id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:{'status':status},
        success:function(data){
            if(data.status == 0)
            {
                layer.msg( data.msg );
            }else{
                layer.msg(data.msg,function(){
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