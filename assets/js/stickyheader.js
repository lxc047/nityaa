jQuery( document ).ready(function( $ ) {    

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var header = $('header').height();

        if (scroll >= header) {
            $("header").addClass("background-header");
        } else {
            $("header").removeClass("background-header");
        }
    });
    
});
