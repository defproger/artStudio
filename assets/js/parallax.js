$('#quotes_slinky').parallax();
$('#gallery_form_slinky').parallax();

$(window).on('scroll', function () {
    let wHeight = $(window).height() - 100;
    let scrollTop = $(window).scrollTop() - 100;
    $('.pattern_line').css('transform', 'translate3d(0px, -' + (scrollTop - wHeight) * 0.75 + 'px , 0px)');
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

//todo for links
// document.addEventListener('DOMContentLoaded', (event) => {
//     const targetElement = document.getElementById('gallery');
//     smoothScrollTo(targetElement, 2000);
// });

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

  window.addEventListener('wheel', slowScroll, { passive: false });