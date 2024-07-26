$('#quotes_slinky').parallax();

$(window).on('scroll', function () {
    let wHeight = $(window).height() - 100;
    let scrollTop = $(window).scrollTop() - 100;
    $('.pattern_line').css('transform', 'translate3d(0px, -' + (scrollTop - wHeight) * 0.75 + 'px , 0px)');
});

$(window).on('scroll', function () {
    let wHeight = $(window).height() - 100;
    let scrollTop = $(window).scrollTop() - 100;
    $('.after_quote').css('transform', 'translate3d(0px, -' + (scrollTop - wHeight) * 0.75 + 'px , 0px)');
});