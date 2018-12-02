/*
* project : meces
*
* */



$(function() {

    if($("#mb-menu").length>0) {


        $(".mb-menu>li").addClass("li");

        $(".li").click(function(){
            $(this).addClass("menu-bt");
            $(this).siblings().removeClass("menu-bt");
            $('.menu-bt .mb-sub-menu').animate({height:'toggle'},400);
        });

        if($('.li').hasClass('sub-menu'))
        {
            $('.fa').show()
        }
        else {
                $('.fa').hide()
        }

        $("#close-bt").click(function(){
            $(".menu-con").css({width:'0'})
        });


        if($(".menu-button").length>0){
            $(".menu-button").click(function(event){
                $(".menu-con").css({width:'100%'})
                $("#log-res").css({display:'block'})
                $("#user-area a").css({display:'block'})
                $(".menu-con h3").css({display:'block'});
                $(".menu-con li").css({display:'block'});
                event=event||window.event;
                event.stopPropagation();
            });

            $(document).bind("click",function(e){
                var target  = $(e.target);
                if(target.closest(".mb-menu").length == 0){
                    $(".menu-con").css({width:'0'});
                    $(".menu-con h3").css({display:'none'});
                    $(".menu-con li").css({display:'none'});
                    $("#user-area a").css({display:'none'});
                }
            })
        }
    }



    // 窗口变化
    $(window).resize(function(){

        var ww = $(window).width();


        // DEVICE : Tablets
        if (ww>1280) {


        }

        // DEVICE : SmartPhone
        if (ww<768) {

            if($("#banner").length>0) {
                //co
                // banner.params.slidesPerView = 1;
            }

            if($("#intro-sw").length>0) {
                var swiper = new Swiper('#intro-sw', {
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    autoplay:{
                        delay:4000,
                    }
                });
            }

        }

        if($("#banner").length>0){
            banner.update();
        }

        if($("intro-sw").length>0){
            swiper.update();
        }


    });

    $(window).trigger('resize');

});









