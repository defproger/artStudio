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

function smoothScrollTo(element, duration) {
    const targetPosition = element.getBoundingClientRect().top;
    const startPosition = window.pageYOffset;
    let startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const run = ease(timeElapsed, startPosition, targetPosition, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    function ease(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(animation);
}

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

// Функция для замедления скролла
function slowScroll(event) {
    event.preventDefault();

    const scrollMultiplier = 0.5;
    const scrollY = window.scrollY;
    const newScrollY = scrollY + event.deltaY * scrollMultiplier;
    window.scrollTo({
        top: newScrollY,
        behavior: 'auto'
    });
}

window.addEventListener('wheel', slowScroll, {passive: false});