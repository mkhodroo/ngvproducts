jQuery(document).ready(function ($) {    
    jcf.replaceAll();

    //mobile-menu
    $('.mobile-menu').prepend('<div class="btn-close-menu"></div>');

    $('.primary-menu ul .menu-item-has-children').append('<div class="angle-down"></div>');
    $('.secondary-menu ul .menu-item-has-children').append('<div class="angle-down"></div>');

    $('.primary-menu ul li .angle-down').click(function(){
        $(this).prev().slideToggle();
        $(this).toggleClass('active');
    });

    $('.secondary-menu ul li .angle-down').click(function(){
        $(this).prev().slideToggle();
        $(this).toggleClass('active');
    });

    $('.menu-opener').click(function(){
        $('body').addClass('menu-open');
    });

    $('.btn-close-menu').click(function(){
        $('body').removeClass('menu-open');
    });

    $('.overlay').click(function(){
        $('body').removeClass('menu-open');
    });
});
