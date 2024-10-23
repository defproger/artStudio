$('#quotes_slinky').parallax();
$('#gallery_form_slinky').parallax();
$('#callback_form_slinky').parallax();

$(window).on('scroll', function () {
    let wHeight = $(window).height() - 100;
    let scrollTop = $(window).scrollTop() - 100;

    let screenWidth = $(window).width();

    let coefficient = screenWidth < 1200 ? 0.35 : 0.75;

    $('.pattern_line').css('transform', 'translate3d(0px, -' + (scrollTop - wHeight) * coefficient + 'px , 0px)');
});

function longLoad() {
    $('.link').on('click', function () {
        var target = this.hash,
            $target = $(target);

        $('html, body').animate({
            'scrollTop': $target.offset().top
        }, 1000)
    });
}

longLoad();

function slowScroll(event) {
    event.preventDefault();

    const scrollMultiplier = 1;
    const scrollY = window.scrollY;
    const newScrollY = scrollY + event.deltaY * scrollMultiplier;
    window.scrollTo({
        top: newScrollY,
        behavior: 'auto'
    });
}

window.addEventListener('wheel', slowScroll, {passive: false});