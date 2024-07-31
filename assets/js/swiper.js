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
            slideChangeTransitionStart: function () {
                var activeIndex = swiper.activeIndex;
                var previousIndex = swiper.previousIndex;
                var textSlides = document.querySelectorAll('.text-slide');

                var direction = activeIndex > previousIndex ? 'next' : 'prev';

                textSlides.forEach(function (slide, index) {
                    if (index === previousIndex) {
                        slide.style.transition = 'opacity 0.3s ease-in-out, transform 0.6s ease';
                        slide.style.transform = direction === 'next' ? 'translateX(-60%)' : 'translateX(60%)';
                        slide.style.opacity = 0;
                        setTimeout(function () {
                            slide.classList.remove('active');
                            slide.style.display = 'none';
                            slide.style.transform = 'translateX(0)';
                        }, 500);
                    }
                    if (index === activeIndex) {
                        slide.classList.add('active');
                        slide.style.display = 'block';
                        slide.style.transition = 'none';
                        slide.style.transform = direction === 'next' ? 'translateX(60%)' : 'translateX(-60%)';
                        setTimeout(function () {
                            slide.style.transition = 'opacity 0.3s ease-in-out, transform 0.6s ease';
                            slide.style.transform = 'translateX(0)';
                            slide.style.opacity = 1;
                        }, 10);
                    }
                });
            },
        },
    });

    var textSlides = document.querySelectorAll('.text-slide');
    if (textSlides.length > 0) {
        textSlides[0].classList.add('active');
        textSlides[0].style.display = 'block';
        textSlides[0].style.opacity = 1;
    }
});