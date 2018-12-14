laydate.render({
    elem: '#stime'
});
laydate.render({
    elem: '#etime'
});
$('.menu li').removeClass('active');
$('.mb-menu li').removeClass('active');
$('.menu li').eq(3).addClass('active');
$('.mb-menu li').eq(3).addClass('active');

auto_load_all_materials();

function auto_load_all_materials(){
    $.ajax({
        type:"post",
        url:"/adsmember/ads/getallmaterial",
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:{},
        // data:$("#form_insert").serialize(),
        success:function(data){
            if(data.status == 1)
            {
                $('.tab_box tbody').html(data.datas);
                $('#pagehere').html(data.paginate);
            }else{
                alert('none');
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });
}

$('.icon-shuaxin').click(function () {
    auto_load_all_materials();
});

$('.time_choose_day').click(function() {
    var t = $(this).attr('jid');
    var checkbox_v = false;
    for (i = 0; i <= 23; i++) {
        if ($('#' + t + '_' + i).attr('class') == 'iconfont icon-xuankuang') {
            checkbox_v = true;
            break;
        }
    }
    if (checkbox_v) {
        $('i[jid_i=' + t + '_0]').removeClass().addClass('iconfont icon-checkbox_true_part_focus');
        $('input[jid_input=' + t + '_0]').prop('checked', true);
    } else {
        $('i[jid_i=' + t + '_0]').removeClass().addClass('iconfont icon-xuankuang');
        $('input[jid_input=' + t + '_0]').prop('checked', false);
    }

});

$('.time_choose_day_v').click(function() {
    var t = $(this).attr('jid');
    var checkbox_v = false;
    for (j = 1; j <= 7; j++) {
        for (i = 0; i <= 3; i++) {
            var v = (t - 1) * 4 + i;
            if ($('#' + j + '_' + v).attr('class') == 'iconfont icon-xuankuang') {
                checkbox_v = true;
                break;
            }
        }
    }
    if (checkbox_v) {
        $('i[jid_i_v=' + t + '_0]').removeClass().addClass('iconfont icon-checkbox_true_part_focus');
        $('input[jid_input_v=' + t + '_0]').prop('checked', true);
    } else {
        $('i[jid_i_v=' + t + '_0]').removeClass().addClass('iconfont icon-xuankuang');
        $('input[jid_input_v=' + t + '_0]').prop('checked', false);
    }
});

$('.querk_choose_time').click(function() {
    var jid = $(this).attr('jid');
    if (jid == 1) {
        var checkbox_v = false;
        for (j = 1; j <= 7; j++) {
            for (i = 0; i <= 7; i++) {
                var v = i;
                if ($('#' + j + '_' + v).attr('class') == 'iconfont icon-xuankuang') {
                    checkbox_v = true;
                    break;
                }
            }
        }
        if (checkbox_v) {
            for (i = 1; i <= 2; i++) {
                $('i[jid_i_v=' + i + '_0]').removeClass().addClass('iconfont icon-checkbox_true_part_focus');
                $('input[jid_input_v=' + i + '_0]').prop('checked', true);
            }
        } else {
            for (i = 1; i <= 2; i++) {
                $('i[jid_i_v=' + i + '_0]').removeClass().addClass('iconfont icon-xuankuang');
                $('input[jid_input_v=' + i + '_0]').prop('checked', false);
            }
        }
    } else {
        var checkbox_v = false;
        for (j = 1; j <= 7; j++) {
            for (i = 8; i <= 23; i++) {
                var v = i;
                if ($('#' + j + '_' + v).attr('class') == 'iconfont icon-xuankuang') {
                    checkbox_v = true;
                    break;
                }
            }
        }
        if (checkbox_v) {
            for (i = 3; i <= 6; i++) {
                $('i[jid_i_v=' + i + '_0]').removeClass().addClass('iconfont icon-checkbox_true_part_focus');
                $('input[jid_input_v=' + i + '_0]').prop('checked', true);
            }
        } else {
            for (i = 3; i <= 6; i++) {
                $('i[jid_i_v=' + i + '_0]').removeClass().addClass('iconfont icon-xuankuang');
                $('input[jid_input_v=' + i + '_0]').prop('checked', false);
            }
        }

    }

});
$('.confirm_check').click(function() {
    var stime = $("#check_stime").val();
    var etime = $("#check_etime").val();
    console.log(stime);
    console.log(etime);
    var checkbox_v = false;
    for (j = 0; j <= 6; j++) {
        for (i = 0; i <= 23; i++) {
            if (i < stime || i > etime) {
                continue;
            }
            if ($('i[id=' + j + '_' + i + ']').attr('class') == 'iconfont icon-xuankuang') {
                checkbox_v = true;
                break;
            }
        }
        for (i = 0; i <= 23; i++) {
            if (i < stime || i > etime) {
                if ($('i[id=' + j + '_' + i + ']').attr('class') == 'iconfont icon-checkbox_true_part_focus') {
                    $('i[id=' + j + '_' + i + ']').removeClass().addClass('iconfont icon-xuankuang');
                    $('input[id=input_' + j + '_' + i + ']').prop('checked', false);
                }
            }
        }

    }
    if (checkbox_v) {
        for (j = 0; j <= 6; j++) {
            for (i = 0; i <= 23; i++) {
                if (i < stime || i > etime) {
                    continue;
                }
                $('i[id=' + j + '_' + i + ']').removeClass().addClass('iconfont icon-checkbox_true_part_focus');
                $('input[id=input_' + j + '_' + i + ']').prop('checked', true);
            }
        }
    } else {
        for (j = 0; j <= 6; j++) {
            for (i = 0; i <= 23; i++) {
                if (i < stime || i > etime) {
                    continue;
                }
                $('i[id=' + j + '_' + i + ']').removeClass().addClass('iconfont icon-xuankuang');
                $('input[id=input_' + j + '_' + i + ']').prop('checked', false);
            }
        }
    }

});

//            $('.time_choose_day').click(function () {
//                var val = $(this).attr("jid");
////                $("input[name='rank[]']").each(function(e){
////                    $(this).attr("checked",$('#rankclick').attr("checked"));
////                });
//                //$(this).attr("checked",'true');
//                $('#input_0_0').attr("checked",'true');
//                //alert(val);
//            });

$('#searchimageid').click(function () {
    var id = $.trim( $('#keyword').val() );
    $.ajax({
        type:"post",
        url:"/adsmember/ads/getmaterialbyid/"+ id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:{},
        // data:$("#form_insert").serialize(),
        success:function(data){
            if(data.status == 1)
            {
                $('.tab_box tbody').html(data.datas);
            }else{
                alert(data.datas);
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });
});

function choose(id) {
    $.ajax({
        type:"post",
        url:"/adsmember/ads/choosematerial/"+ id,
        dataType:'json',
        headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()},
        data:{},
        // data:$("#form_insert").serialize(),
        success:function(data){
            if(data.status == 1)
            {
                $('#creative_suite_li').append(data.data);
            }else{
                alert('none');
            }
        },
        error:function (data) {
            layer.msg(data.msg);
        }
    });
}

function removeimage(id){
    $("#material_item_"+id).remove();
}

$('.time_choose').click(function () {
    var val = $('input:radio[name="time"]:checked').val();
    if(val == 0)
    {
        $('#time_choose').css('display','none');
    }else{
        $('#time_choose').css('display','block');
    }
});
$('.area').click(function () {
    var val = $('input:radio[name="area"]:checked').val();
    if(val == 0)
    {
        $('#p_c_area').css('display','none');
    }else{
        $('#p_c_area').css('display','block');
    }
});
$('.terminal').click(function () {
    var val = $('input:radio[name="terminal"]:checked').val();
    if(val == 0)
    {
        $('#a_terminal').css('display','none');
    }else{
        $('#a_terminal').css('display','block');
    }
});
$('.switch_browser').click(function () {
    var val = $('input:radio[name="switch_browser"]:checked').val();
    if(val == 0)
    {
        $('#id_browser').css('display','none');
    }else{
        $('#id_browser').css('display','block');
    }
});
$('.switch_domain_category').click(function () {
    var val = $('input:radio[name="switch_domain_category"]:checked').val();
    if(val == 0)
    {
        $('#domain_category').css('display','none');
    }else{
        $('#domain_category').css('display','block');
    }
});
$('.switch_nettype').click(function () {
    var val = $('input:radio[name="switch_nettype"]:checked').val();
    if(val == 0)
    {
        $('#id_nettype').css('display','none');
    }else{
        $('#id_nettype').css('display','block');
    }
});
$('.switch_network').click(function () {
    var val = $('input:radio[name="switch_network"]:checked').val();
    if(val == 0)
    {
        $('#id_network').css('display','none');
    }else{
        $('#id_network').css('display','block');
    }
});

$('#checked_all').click(function() {
    var checked_check = $('#checked_all').is(":checked");
    if (checked_check) {
        $('input[name="domain_category_array[]"]').prop('checked', true);
    } else {
        $('input[name="domain_category_array[]"]').removeAttr('checked');
    }
});