document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.swiper-container', {
        centeredSlides: true,
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        on: {
            slideChange: function () {
                var activeIndex = swiper.activeIndex;
                var textSlides = document.querySelectorAll('.text-slide');
                textSlides.forEach(function (slide, index) {
                    if (index === activeIndex) {
                        slide.classList.add('active');
                    } else {
                        slide.classList.remove('active');
                    }
                });
            },
        },
    });

    var textSlides = document.querySelectorAll('.text-slide');
    if (textSlides.length > 0) {
        textSlides[0].classList.add('active');
    }
});