/*
	Template Name: Cryptotale
	Author: Cryptotale - Crypto Marketing Agency
	Author URI: https://cryptotale.org/
	Description: Cryptotale – Crypto Marketing Agency
    Version: 3.0
*/

$(function ($) {
    "use strict"


    /*======================== 
        Index Search 
    ==========================*/
    if($(".header-search").length > 0) {
        var todg = true;
        $(".header-search > a").on("click", function (e) {
            e.preventDefault();
            if (todg) {
                $(".header-search-form").fadeIn("slow");
                todg = false;
            } else {
                $(".header-search-form").fadeOut("slow");
                todg = true;
            }
        });

        $(document).on('mouseup', function (e) {
            var container = $(".header-search");

            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $(".header-search-form").fadeOut("slow");
                todg = true;
            }

        });
    }

    

    /*======================== 
        navigation 
    ==========================*/
    if ($('.ts-main-menu').length > 0) {
        $(".ts-main-menu").navigation({
            effect: "fade",
            mobileBreakpoint: 992,
        });
    }


    
    /*======================== 
        most populer  
    ==========================*/
    if ($('.most-populers').length > 0) {
        $('.most-populers').owlCarousel({
            items: 3,
            dots: false,
            loop: true,
            nav: true,
            autoplayHoverPause: true,
            mouseDrag: false,
            touchDrag:false,
            margin: 30,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                // breakpoint from 0 up
                0: {
                    items: 1,
                },
                // breakpoint from 480 up
                480: {
                    items: 2,
                },
                // breakpoint from 768 up
                768: {
                    items: 2,
                },
                // breakpoint from 768 up
                1200: {
                    items: 3,
                }
            }
        });
    }



    /*======================== 
        Single Post Key Points  
    ==========================*/
    if(document.querySelector(".key-points ul li")) {
        let animation = anime({
            targets: '.key-points ul li',
            marginLeft: 50,
            delay: anime.stagger(1200),
            easing: 'cubicBezier(.48,-0.25,.45,1.08)',
            opacity: 1,
            duration: 1000,
            autoplay:false,
        });
    
        let animeCount = 0;
        window.onscroll = ()=> {
            if(animeCount == 0 && $(window).scrollTop() > 200) {
                animation.play();
                animeCount++;
            }
        }
    }



    /*======================== 
        Live wire read more button
    ==========================*/
    $(".lw-toggle-btn").click(function() {
        let lw_wrapper_el = this.closest(".lw-wrapper");

        $(this).toggleClass("active");

        $(lw_wrapper_el).children().find(".lw-content").toggleClass("active");

        if($(this).hasClass("active")) {
            $(this).text("Read Less");
        }
        else {
            $(this).text("Read More...");
        }
    });



    /*======================== 
        Home Slider
    ==========================*/
    var TIMER = 0;
    // console.log(TIMER);
    var pic_index = 0;
    // console.log('pic_index=' + pic_index);
    $('.home-carousel .container .slider ul li').eq(pic_index).css({
        top: 0
    });
    $('.home-carousel .container .menu ul li').eq(pic_index).addClass('active');
    TimerStart();

    function TimerStart() {
        if(TIMER>0) {return;}
        TIMER = setInterval(function() {
            $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
                top: '-100%'
            });

            if (pic_index < $('.home-carousel .container .slider ul li').length - 1) {
                pic_index++;
                // console.log('pic_index=' + pic_index);
            } else {
                pic_index = 0;
            }

            $('.home-carousel .container .slider ul li').eq(pic_index).css({
                top: '100%'
            });

            $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
                top: "0px"
            });

            $('.home-carousel .container .menu ul li').removeClass('active');
            $('.home-carousel .container .menu ul li').eq(pic_index).addClass('active');
        }, 5000);
        // console.log(TIMER);
    }

    function TimerStop() {
        clearInterval(TIMER);
        TIMER = 0;
        // console.log(TIMER);
    }

    $('.home-carousel .container .menu').hover(function() {
        TimerStop();
    }, function() {
        TimerStart();
    });

    // prev function
    $('.home-carousel .container .prev').click(function() {
        $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
            top: '100%'
        })

        if (pic_index > 0) {
            pic_index--;
        } else {
            pic_index = $('.home-carousel .container .slider ul li').last().index();
        }

        $('.home-carousel .container .slider ul li').eq(pic_index).css({
            top: '-100%'
        });

        $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
            top: "0px"
        });

        // console.log('pic_index=' + pic_index);
        $('.home-carousel .container .menu ul li').removeClass('active');
        $('.home-carousel .container .menu ul li').eq(pic_index).addClass('active');
        TimerStop();
        setTimeout(TimerStart, 5000);
        return false;
    })

    // next function
    $('.home-carousel .container .next').click(function(event) {
        $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
            top: '-100%'
        });

        if (pic_index < $('.home-carousel .container .slider ul li').length - 1) {
            pic_index++;
        } else {
            pic_index = 0;
        }

        $('.home-carousel .container .slider ul li').eq(pic_index).css({
            top: '100%'
        });

        $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
            top: "0px"
        });

        // console.log('pic_index=' + pic_index);
        $('.home-carousel .container .menu ul li').removeClass('active');
        $('.home-carousel .container .menu ul li').eq(pic_index).addClass('active');
        TimerStop();
        setTimeout(TimerStart, 5000);
        return false;
    });

    // menu function
    $('.home-carousel .container .menu ul li').click(function(event) {
        if (pic_index != $(this).index()) {
            $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({
                top: "-100%"
            });
            // console.log('pic_index=' + pic_index);
            pic_index = $(this).index();
            $('.home-carousel .container .menu ul li').removeClass('active');
            $(this).addClass('active');

            $('.home-carousel .container .slider ul li').eq(pic_index).css({
                top: '100%'
            });

            $('.home-carousel .container .slider ul li').eq(pic_index).stop(true, false).animate({ top: 0});
            TimerStop();
            setTimeout(TimerStart, 5000);
            return false;
        }
    });
});