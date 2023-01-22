jQuery(document).ready(function($) {

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });
    $('.menu-toggle').click(function() {
        $('.main-navigation').toggleClass('toggled');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */

    $(window).on('load resize', function() {
        if ($(window).width() < 1024 && $(window).width() >= 768) {
            $('.main-navigation').find("a").unbind('keydown');
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#site-header').find('.menu-toggle').focus();
                }
            });
        } else if ($(window).width() < 768) {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#site-header').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
            $('.main-navigation').find("a").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('.menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    // Nivo slider 
    $('#slider').nivoSlider();
    
});