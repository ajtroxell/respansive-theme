$(document).ready(function () {
    //SEARCH CLEAR AND RESTORE VALUE
    var el = $('input[type=text], input[type=email], textarea, input.header-search');
    el.focus(function(e) {
        if (e.target.value === e.target.defaultValue)
            e.target.value = '';
    });
    el.blur(function(e) {
        if (e.target.value === '')
            e.target.value = e.target.defaultValue;
    });

    $(function() {
        $('#btn-nav').on('click', function(e) {
            e.preventDefault();
            var body = $('body');
            if(body.hasClass('offcanvas')) {
                body.removeClass('offcanvas');
            } else {
                body.addClass('offcanvas');
            }
        });
        $('#btn-nav-close').on('click', function(e) {
            e.preventDefault();
            var body = $('body');
            body.removeClass('offcanvas');
        });
    });

    $('ul.sub-menu').hide();

    $('ul.sub-menu').closest('li').attr('id', 'parent-menu');

    $('li#parent-menu').click(function (a) {
        a.preventDefault();
        if ($(this).find('ul').is(':visible')) {
            $(this).find('ul').stop().slideUp(function () {
                $(this).closest('li').removeClass('active');
            });
        } else {
            $(this).find('ul').stop().slideDown();
            $(this).closest('li').addClass('active');
        }
        return false;
    });

    $('#btn-search-open').click(function (a) {
        a.preventDefault();
        $('#search').slideToggle();
        $(this).toggleClass('active');
        return false;
    });

    $(document).click(function(e){
        if ($('#search').is(':visible')) {
            if (!$(e.target).is('#search *')) {
                $('#search').slideUp();
                $('#search').removeClass('active');
            }
        }
    });

    $('article img').loadComplete(function(){
        $(this).fadeIn(800);
    });

});