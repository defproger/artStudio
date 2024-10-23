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
    var preloaderDate = localStorage.getItem('preloaderDate');
    var today = new Date().toDateString();

    if (preloaderDate === today) {
        // Preloader has already run today
        // Remove the preloader element
        $("#preloader").remove();
        $("body").removeClass("fixed");

        // Initialize any elements or functions that need to run after the preloader
        initializeAnimations(false); // Pass 'false' to indicate preloader was not shown
    } else {
        // Preloader has not run today
        // Proceed with the preloader code
        runPreloader();
    }
});

function initializeAnimations(preloaderShown) {
    // Adjust the animation delays for elements if preloader is not shown
    if (!preloaderShown) {
        // Elements with delayed animations
        $('#mainscreen h1').css('animation-delay', '0s');
        $('.dots').css('animation-delay', '0s');
        $('header').css('animation-delay', '0s');
        // Adjust any other elements with hardcoded animation delays
    }

    // Initialize slinky animations
    $("#slinky svg").each(function (index) {
        let delay = ($("#slinky svg").length - 1 - index) * (preloaderShown ? 0.2 : 0);
        let animationName = "slinkyStart" + (index + 1);
        $(this).css({
            "animation": "5s " + delay + "s forwards " + animationName,
            "animation-timing-function": "ease"
        });
    });

    // Initialize parallax after animations are set
    setTimeout(function () {
        $('#slinky').parallax();
    }, preloaderShown ? 6000 : 1000); // Adjust the timeout as needed
}

function runPreloader() {
    var creationAllowed = true; // Control variable for creating new particles
    var startTime = Date.now(); // Record the start time
    var animId; // Animation ID

    var settings = {};
    let screenWidth = $(window).width();
    if (screenWidth > 1200) {
        settings = {
            travel_time: 3, // Time for particles to travel across the screen in seconds
            speed_multiplier: 0.69,
            narrow_width: 1.4,
            narrow_factor: 5.2,
            velocity_x: 0,
            y_center: 300,
            velocity_y: 2,
            particles: 200,
            maxradius: 6,
            irregColors: true,
            decay: true,
            growth: true,
            velocity_xSeed: 4.5,
            velocity_ySeed: 5,
            opacMax: 0.42,
            opacMin: 0.01,
            opacSeed: 74,
            colorPct: 10,
            parabola_h: 557,
            parabola_a: -0.001,
            parabola_offset_range: 150,
            initial_particles: -5,
            endTime: 5.5,
            deleteTime: 6.5,
            fade_start_pct: 0.8,
            fade_duration: 0.5
        };
    } else {
        settings = {
            travel_time: 3,
            speed_multiplier: 0.69,
            narrow_width: 1.6,
            narrow_factor: 5,
            velocity_x: 0,
            y_center: 480,
            velocity_y: 2,
            particles: 200,
            maxradius: 6,
            irregColors: true,
            decay: true,
            growth: true,
            velocity_xSeed: 4.5,
            velocity_ySeed: 5,
            opacMax: 0.42,
            opacMin: 0.01,
            opacSeed: 74,
            colorPct: 10,
            parabola_h: 700,
            parabola_a: -0.001,
            parabola_offset_range: 100,
            initial_particles: -5,
            endTime: 5.5,
            deleteTime: 6.5,
            fade_start_pct: 0.8,
            fade_duration: 0.5
        };
    }

    // Stop creating new particles after a certain time
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
        this.params.x_offset = 0; // Start from the left edge
        this.params.y_offset = settings.y_center;
        this.params.lifetime = Math.ceil(Math.random() * 3);
        this.params.velocity_x = 1000 / (settings.travel_time * 60);
        this.params.velocity_y = Math.random() * settings.velocity_ySeed;
        this.params.radius = settings.maxradius;
        this.params.opacity =
            Math.round(Math.random() * settings.opacSeed, 2) / 100;
        this.params.parabola_offset =
            (Math.random() - 0.5) * settings.parabola_offset_range;

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

        // Parabola equation: y = a(x - h)^2 + k + offset
        var h = settings.parabola_h;
        var k = settings.y_center;
        var a = settings.parabola_a;
        var offset = this.params.parabola_offset;

        // Apply narrowing effect on edges
        var narrowEffect = Math.pow(
            Math.abs(this.x - h) / h,
            settings.narrow_factor
        );
        var narrowWidth = settings.narrow_width * (1 - narrowEffect);

        this.x =
            this.params.x_offset +
            t * this.params.velocity_x * settings.speed_multiplier;
        this.y = a * Math.pow(this.x - h, 2) + k + offset * narrowWidth;

        // Check if the particle should start fading
        var travelPct = this.x / 1000;
        if (travelPct > settings.fade_start_pct) {
            var fadeProgress =
                (travelPct - settings.fade_start_pct) /
                (settings.fade_duration / settings.travel_time);
            this.params.opacity = Math.max(
                settings.opacMax * (1 - fadeProgress),
                settings.opacMin
            );
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

        var elapsedTime = (Date.now() - startTime) / 1000;

        if (currentParticles < settings.particles && creationAllowed) {
            currentParticles += 1; // Gradually increase the number of particles
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

    // Set the progress bar filling time
    bar.style.transition = 'width 5.5s ease-in';
    bar.style.width = '100%';

    // Hide the progress bar after it's filled
    bar.addEventListener('transitionend', () => {
        bar.style.transition = 'bottom 1s ease';
        bar.style.bottom = '-8px';
    });

    // Stop the animation and clear the context after a certain time
    setTimeout(function () {
        cancelAnimationFrame(animId);
        ctx.clearRect(0, 0, 1000, 1000);
        $("#preloader").remove();
        $("body").removeClass("fixed");

        // Initialize animations
        initializeAnimations(true); // Pass 'true' to indicate preloader was shown

        // Store today's date in localStorage
        var today = new Date().toDateString();
        localStorage.setItem('preloaderDate', today);
    }, settings.deleteTime * 1000);
}