
jQuery(function($){

    $('.next').click(function(){
        var newe =$('.nav-ul > .active').next('li');
        $('.nav-ul li').removeClass('active');
        $('.tab-pane').removeClass('in active');
        newe.addClass('active');

        $('#'+newe.attr('aria-controls')).addClass('in active');
        $('html, body').animate({scrollTop: $('#tabs').offset().top}, 500);
        $('#'+$(this).attr('data-id')).addClass('visited');
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
    $('.side-menu').css({'height': $('.inside-page').outerHeight() + $('.inside_header').outerHeight()});
    $('.single-details-post').css({'height': $('.all-post').outerHeight()});

    wow = new WOW(
        {
            animateClass: 'animated',
            offset:       100
        }
    );
    wow.init();


});


// Map






