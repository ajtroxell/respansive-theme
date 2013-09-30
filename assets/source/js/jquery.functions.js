jQuery(document).ready(function($) {
    
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

    $(document).ready(function () {
        $('.menu li:has(> ul)').addClass('parent');

        $('.menu li.parent>a').click(function () {
            if ($(this).parent('li').hasClass('open')) {
                $(this).parent('li').removeClass('open');
                $(this).next('ul').slideUp();
            } else {
                $(this).parent('li').siblings().find('ul').slideUp();
                $(this).parent('li').addClass('open');
                $(this).next('ul').slideToggle();
            }
            return false;
        });
    });

    $('#btn-search-open').click(function (a) {
        a.preventDefault();
        $('#search').slideToggle().addClass('open');
        $('#s').focus();
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

});