window.requestAnimFrame = (function () {
    return (
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        }
    );
})();

$(document).ready(function () {
    var creationAllowed = true; // Переменная для контроля создания новых шариков
    var startTime = Date.now(); // Запоминаем время начала
    var animId; // ID анимации

    var settings = {};
    let screenWidth = $(window).width();
    if (screenWidth > 1200) {
        settings = {
            travel_time: 3, // Время прохождения от левого до правого края в секундах
            speed_multiplier: 0.69, // Множитель скорости
            narrow_width: 1.4, // Ширина для заужения краев
            narrow_factor: 5.2, // Фактор заужения (чем больше, тем сильнее заужение)
            velocity_x: 0, // горизонтальная скорость
            y_center: 300, // вертикальная координата центра
            velocity_y: 2, // вертикальная скорость
            particles: 200, // количество частиц
            maxradius: 6, // максимальный радиус
            irregColors: true, // использование нерегулярных цветов
            decay: true, // включение угасания
            growth: true, // включение роста
            velocity_xSeed: 4.5, // случайная величина для горизонтальной скорости
            velocity_ySeed: 5, // случайная величина для вертикальной скорости
            opacMax: 0.42, // максимальная непрозрачность
            opacMin: 0.01, // минимальная непрозрачность
            opacSeed: 74, // случайная величина для непрозрачности
            colorPct: 10, // количество цветов
            parabola_h: 557, // вершина параболы по горизонтали
            parabola_a: -0.001, // форма параболы
            parabola_offset_range: 150, // диапазон отклонения параболы
            initial_particles: -5, // начальное количество частиц
            endTime: 5.5, // время окончания
            deleteTime: 6.5, // время удаления
            fade_start_pct: 0.8, // процент пути, с которого начинается угасание непрозрачности
            fade_duration: 0.5 // время потери непрозрачности в секундах
        };
    } else {
        settings = {
            travel_time: 3, // Время прохождения от левого до правого края в секундах
            speed_multiplier: 0.69, // Множитель скорости
            narrow_width: 1.6, // Ширина для заужения краев
            narrow_factor: 5, // Фактор заужения (чем больше, тем сильнее заужение)
            velocity_x: 0, // горизонтальная скорость
            y_center: 480, // вертикальная координата центра
            velocity_y: 2, // вертикальная скорость
            particles: 200, // количество частиц
            maxradius: 6, // максимальный радиус
            irregColors: true, // использование нерегулярных цветов
            decay: true, // включение угасания
            growth: true, // включение роста
            velocity_xSeed: 4.5, // случайная величина для горизонтальной скорости
            velocity_ySeed: 5, // случайная величина для вертикальной скорости
            opacMax: 0.42, // максимальная непрозрачность
            opacMin: 0.01, // минимальная непрозрачность
            opacSeed: 74, // случайная величина для непрозрачности
            colorPct: 10, // количество цветов
            parabola_h: 700, // вершина параболы по горизонтали
            parabola_a: -0.001, // форма параболы
            parabola_offset_range: 100, // диапазон отклонения параболы
            initial_particles: -5, // начальное количество частиц
            endTime: 5.5, // время окончания
            deleteTime: 6.5, // время удаления
            fade_start_pct: 0.8, // процент пути, с которого начинается угасание непрозрачности
            fade_duration: 0.5 // время потери непрозрачности в секундах
        };
    }


    // Запрет на создание новых шариков через 5 секунд
    setTimeout(function () {
        creationAllowed = false;
    }, settings.endTime * 1000);

    star = function () {
        this.offset = 0;
        this.x = 0;
        this.y = 0;
        this.delay = 0;
        this.params = {
            velocity_x: 1,
            velocity_y: 1,
            opacity: 1,
            lifetime: 3,
            x_offset: 0,
            y_offset: 0,
            radius: 0,
            decay: 0,
            growth: 0,
            color: "255,255,255",
            parabola_offset: 0
        };
    };

    star.prototype.init = function () {
        this.params.x_offset = 0; // Начинаем с левого края
        this.params.y_offset = settings.y_center;
        this.params.lifetime = Math.ceil(Math.random() * 3);
        this.params.velocity_x = 1000 / (settings.travel_time * 60); // Скорость, основанная на времени прохождения
        this.params.velocity_y = Math.random() * settings.velocity_ySeed;
        this.params.radius = settings.maxradius;
        this.params.opacity =
            Math.round(Math.random() * settings.opacSeed, 2) / 100;
        this.params.parabola_offset =
            (Math.random() - 0.5) * settings.parabola_offset_range; // Случайное отклонение

        if (settings.decay) {
            this.params.decay =
                Math.round(Math.random() * 1.5) * Math.random() * 0.01;
        }
        if (settings.growth) {
            this.params.growth =
                Math.round(Math.random() * 1.2) * Math.random() * 0.01;
        }
        if (settings.irregColors) {
            switch (Math.ceil(Math.random() * settings.colorPct)) {
                case 1:
                    this.params.color = "176, 140, 122";
                    break;
                case 2:
                    this.params.color = "65, 126, 120";
                    break;
                case 3:
                    this.params.color = "193, 94, 87";
                    break;
                case 4:
                    this.params.color = "144, 175, 160";
                    break;
                case 5:
                    this.params.color = "128, 109, 144";
                    break;
                case 6:
                    this.params.color = "135, 157, 176";
                    break;
                case 7:
                    this.params.color = "194, 164, 84";
                    break;
                case 8:
                    this.params.color = "203, 77, 64";
                    break;
                case 9:
                    this.params.color = "177, 118, 231";
                    break;
                case 10:
                    this.params.color = "175, 139, 122";
                    break;
                default:
                    this.params.color = "177, 118, 231";
                    break;
            }
        }
        this.x = this.params.x_offset;
    };

    star.prototype.draw = function (ctx) {
        this.offset += 1;
        var t = this.offset;

        // Уравнение параболы: y = a(x - h)^2 + k + offset
        // где (h, k) - вершина параболы
        var h = settings.parabola_h; // вершина параболы
        var k = settings.y_center;
        var a = settings.parabola_a; // форма параболы
        var offset = this.params.parabola_offset; // Отклонение параболы

        // Добавляем эффект заужения краев
        var narrowEffect = Math.pow(
            Math.abs(this.x - h) / h,
            settings.narrow_factor
        );
        var narrowWidth = settings.narrow_width * (1 - narrowEffect);

        this.x =
            this.params.x_offset +
            t * this.params.velocity_x * settings.speed_multiplier;
        this.y = a * Math.pow(this.x - h, 2) + k + offset * narrowWidth;

        // Проверяем, достиг ли шарик момента начала угасания
        var travelPct = this.x / 1000;
        if (travelPct > settings.fade_start_pct) {
            var fadeProgress = (travelPct - settings.fade_start_pct) / (settings.fade_duration / settings.travel_time);
            this.params.opacity = Math.max(settings.opacMax * (1 - fadeProgress), settings.opacMin);
        }

        if (this.params.opacity > settings.opacMax) {
            this.params.decay *= -1;
            this.params.lifetime--;
        } else if (this.params.opacity <= settings.opacMin) {
            this.params.lifetime--;
            this.params.decay *= -1;
            this.params.opacity = 0;
        }
        if (this.params.radius > settings.maxradius) {
            this.params.growth *= -1;
        } else if (this.params.radius <= 0.2) {
            this.params.growth *= -1;
            this.params.radius = 0.2;
        }
        this.params.radius += 2 * this.params.growth;
        this.params.opacity += 2 * this.params.decay;

        ctx.beginPath();
        ctx.fillStyle =
            "rgba(" +
            this.params.color +
            "," +
            Math.round(this.params.opacity * 100) / 100 +
            ")";
        ctx.arc(this.x, this.y, this.params.radius, 0, Math.PI * 2, false);
        ctx.fill();
    };

    var stars = [];
    var currentParticles = settings.initial_particles;

    init = function () {
        stars = [];
        currentParticles = settings.initial_particles;
        for (i = 0; i < settings.particles; i++) {
            stars[i] = new star();
            stars[i].init();
        }
    };

    init();
    var ctx = document.getElementById("canvas").getContext("2d");
    if (screenWidth > 1000) {
        ctx.canvas.width = 1000;
        ctx.canvas.height = 720;
    } else {
        ctx.canvas.width = screenWidth;
        ctx.canvas.height = $(window).height();
    }
    (function animloop() {
        animId = requestAnimFrame(animloop);
        ctx.fillStyle = "rgba(0,0,0,1)";
        ctx.fillRect(0, 0, 1000, 1000);

        // Проверяем время
        var elapsedTime = (Date.now() - startTime) / 1000;

        if (currentParticles < settings.particles && creationAllowed) {
            currentParticles += 1; // Постепенно увеличиваем количество частиц
        }

        for (i = 0; i < currentParticles; i++) {
            stars[i].draw(ctx);
            if (
                stars[i].x > 1000 ||
                (stars[i].params.lifetime < 0 && stars[i].params.opacity <= 0) ||
                stars[i].y < 0 - settings.maxradius ||
                stars[i].x < 0 - settings.maxradius ||
                stars[i].y > 500 + settings.maxradius
            ) {
                if (creationAllowed) {
                    stars[i] = new star();
                    stars[i].init();
                    stars[i].params.opacity = 0;
                }
            }
        }
    })();

    const bar = document.getElementById('preloader_bar');

    // время заполнения прогресс-бара
    bar.style.transition = 'width 5.5s ease-in';
    bar.style.width = '100%';

    // время спрятать прогресс-бар
    bar.addEventListener('transitionend', () => {
        bar.style.transition = 'bottom 1s ease';
        bar.style.bottom = '-8px';
    });

    // Останавливаем анимацию и очищаем контекст через 10 секунд
    setTimeout(function () {
        cancelAnimationFrame(animId);
        ctx.clearRect(0, 0, 1000, 1000);
        $("#preloader").remove();
        $("body").removeClass("fixed");

        $("#slinky svg").each(function (index) {
            let delay = ($("#slinky svg").length - 1 - index) * 0.2;
            let animationName = "slinkyStart" + (index + 1);
            $(this).css({
                "animation": "5s " + delay + "s forwards " + animationName,
                "animation-timing-function": "ease"
            });
        });

        setTimeout(function () {
            $('#slinky').parallax();
        }, 6000);
    }, settings.deleteTime * 1000);
});