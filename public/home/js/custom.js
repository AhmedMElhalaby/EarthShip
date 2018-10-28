
jQuery(function($){



    $(".notifications > .notifications-ul > li").click(function(){
        $(this).addClass('read');
    });

    $("#simple-account-dropdown > .dropdown > .scroll > li").click(function(){
        console.log('HHHHHHHHHiiiii');
        $(this).addClass('read');
    });


    $("#simple-account-dropdown > .account").click(function(){

        $('#simple-account-dropdown  > .account > i').toggleClass('active');
        $(this).siblings('.dropdown').fadeToggle("fast", function(){
            if($(this).css('display') == "none")
                $(this).removeClass("active");
            else
                $(this).addClass("active");
        });
    });

    $("#simple-account-dropdown2 > .account").click(function(){
        $(this).siblings('.dropdown').fadeToggle("fast", function(){
            if($(this).css('display') == "none")
                $(this).removeClass("active");
            else
                $(this).addClass("active");
        });
    });

    $(document).click(function(event){
        // console.log('test')
        if ($("#simple-account-dropdown > .dropdown").hasClass('active')) {
            // console.log('test333')
            $("#simple-account-dropdown > .dropdown").removeClass("active");
            $("#simple-account-dropdown > .account > i").removeClass("active");
            $("#simple-account-dropdown > .dropdown").css('display','none');
        }

        if ($("#simple-account-dropdown2 > .dropdown").hasClass('active')) {
            // console.log('test333')
            $("#simple-account-dropdown2 > .dropdown").removeClass("active");
            $("#simple-account-dropdown2 > .account").removeClass("active");
            $("#simple-account-dropdown2 > .dropdown").css('display','none');
        }
    });

    $('.next').click(function(){
        var newe =$('.nav-ul > .active').next('li');
        $('.nav-ul li').removeClass('active');
        $('.tab-pane').removeClass('in active')
        newe.addClass('active');

        $('#'+newe.attr('aria-controls')).addClass('in active');
        $('html, body').animate({scrollTop: $('#tabs').offset().top}, 500);
        $('#'+$(this).attr('data-id')).addClass('visited');
        // $('.nav-item').addClass('visited');
    });

    $('.prev').click(function(){
        var newe =$('.nav-ul > .active').prev('li');
        $('.nav-ul li').removeClass('active');
        $('.tab-pane').removeClass('in active')
        newe.addClass('active');

        $('#'+newe.attr('aria-controls')).addClass('in active');
        $('html, body').animate({scrollTop: $('#tabs').offset().top}, 500);
        $('#'+$(this).attr('data-id')).removeClass('visited');
        // $('.nav-item').addClass('visited');
    });
    $(".nav-tabs li[data-toggle=tab]").on("click", function(e) {
        e.preventDefault();
        return false;
    });
    $('.itme-info a').on('click',function () {
        $('.coll').removeClass('in');
        $(this).closest('coll').toggleClass('in');
    })

    $('.click').on('click','a',function(){
        $('.click').children().removeClass('active');
        $(this).toggleClass('active');
    });
    $('.accordion .item .heading').click(function() {

        var a = $(this).closest('.item');
        var b = $(a).hasClass('open');
        var c = $(a).closest('.accordion').find('.open');

        if(b != true) {
            $(c).find('.content').slideUp(200);
            $(c).removeClass('open');
        }

        $(a).toggleClass('open');
        $(a).find('.content').slideToggle(200);

    });
    $('.sign-free').hover(function () {
        $('.card1').toggleClass('active');
    });
    $('.prem').hover(function () {
        $('.card2').toggleClass('active');
    })


    /* ----------------------------------------------------------- */
    /*  1. Superslides Slider
    /* ----------------------------------------------------------- */


    /* ----------------------------------------------------------- */
    /*  2. Fixed Top Menubar
    /* ----------------------------------------------------------- */

    // For fixed top bar


    /* ----------------------------------------------------------- */
    /*  3. Featured Slider
    /* ----------------------------------------------------------- */

    var menu = $('#menu'),
        pos = menu.offset();
    if(pos){

        $(window).scroll(function(){
            if($(this).scrollTop() >menu.height() && menu.hasClass('default')){
                menu.fadeOut('fast', function(){
                    $(this).removeClass('default').addClass('fixed').fadeIn('fast');
                });
            } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
                menu.fadeOut('fast', function(){
                    $(this).removeClass('fixed').addClass('default').fadeIn('fast');
                });
            }
        });
    }



    var header = $('#header');
    $(window).scroll(function(){
            if($(window).scrollTop() >header.height() + $('#myCarousel').height() ){
                $('.fixed_center').css({'opacity' :  1 })
            }
            if($(window).scrollTop() <header.height()-400 ){
                $('.fixed_center').css({'opacity' :  0 })
            }
            if($(window).scrollTop() > ($(document).height() - 950)){
                $('.fixed_center ').css({'opacity' : 0})
            }
        }
    );

// $('.blog_slider').slick({
//       dots: false,
//       infinite: true,
//       speed: 300,
//       slidesToShow: 3,
//       slidesToScroll: 3,
//       responsive: [
//         {
//           breakpoint: 1024,
//           settings: {
//             slidesToShow: 3,
//             slidesToScroll: 3,
//             infinite: true,
//             dots: true
//           }
//         },
//         {
//           breakpoint: 900,
//           settings: {
//             slidesToShow: 2,
//             slidesToScroll: 2
//           }
//         },
//         {
//           breakpoint: 480,
//           settings: {
//             slidesToShow: 1,
//             slidesToScroll: 1
//           }
//         }
//     ]
//   });


    //   $('.navbar-nav').on('click', 'li a', function() {
    //   $('.navbar-collapse').collapse('hide');
    // });


    /* ----------------------------------------------------------- */
    /*  5. Wow smooth animation
    /* ----------------------------------------------------------- */
    // $('.side-menu').css({'height': $('.inside-page').outerHeight() + $('.inside_header').outerHeight()});
    // $('.single-details-post').css({'height': $('.all-post').outerHeight()});

    // wow = new WOW(
    //     {
    //       animateClass: 'animated',
    //       offset:       100
    //     }
    //   );
    //   wow.init();


});

function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                let element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                $(this).find('input').css("cursor","pointer");
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                });
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                    var inn = $('.file-ii').val();
                    var child = '<div class="input-group input-file mb" name="Fichier1"><span class="input-group-btn"><button class="btn btn-default btn-choose" type="button">Choose</button></span><input type="text" class="form-control" placeholder="Choose a file..."/><span class="input-group-btn"><button class="btn btn-danger btn-reset" type="button">Reset</button></span></div>';
                    if(inn){
                        $('.input-files').append(child);
                        bs_input_file();

                    }
                });
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();

                    return false;
                });
                return element;
            }


        }
    );
}


// Map




