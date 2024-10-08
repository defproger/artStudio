<?php
require './app/db.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Art Studio</title>
    <link rel="stylesheet" href="./assets/css/fonts.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/hd.css">
    <link rel="stylesheet" href="./assets/css/mobile.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">

    <link rel="icon" href="favicon.png" type="image/png">
</head>
<body class="fixed">
<div id="preloader">
    <div class="preloader__text">discover art</div>
    <canvas id="canvas"></canvas>
    <div id="preloader_bar"></div>
</div>

<header>
    <div class="container">
        <button class="filter_button mobile" id="menu">
            <span class="filter_burger">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>
        <a href="index.php">
            <h1 class="pc">Elena Salova</h1>
            <h1 class="mobile">Elena S.</h1>
        </a>
        <nav class="pc">
            <a href="#collections" class="link">collections.</a>
            <a href="#gallery" class="link">gallery.</a>
            <a href="#drawForMe" class="link">draw for me.</a>
            <a href="#contacts" class="link">contacts.</a>
        </nav>
    </div>
    <span class="animhr"></span>
</header>

<div id="mainscreen">
    <div class="container">

        <h1 class="heading_text">ELENA SALOVA</h1>

        <ul id="slinky">
            <li class="layer" data-depth="0.11">
                <svg width="2102" height="782" viewBox="0 0 2102 782" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.7"
                          d="M2099.56 781.086C1755.28 471.667 887.845 -113.676 172.331 20.3074C-543.183 154.291 1159.02 583.32 2099.56 781.086Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0808">
                <svg width="2102" height="783" viewBox="0 0 2102 783" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.622222"
                          d="M2099.51 781.663C1755.23 472.244 887.798 -113.099 172.284 20.8844C-543.229 154.868 1158.97 583.897 2099.51 781.663Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0606">
                <svg width="2102" height="783" viewBox="0 0 2102 783" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.544444"
                          d="M2099.46 781.24C1755.18 471.821 887.751 -113.522 172.237 20.4615C-543.276 154.445 1158.92 583.474 2099.46 781.24Z"
                          stroke="#F9C04E"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0404">
                <svg width="2102" height="783" viewBox="0 0 2102 783" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.466667"
                          d="M2099.41 781.817C1755.14 472.398 887.704 -112.945 172.191 21.0385C-543.323 155.022 1158.88 584.051 2099.41 781.817Z"
                          stroke="#CB4D40"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0202">
                <svg width="2102" height="783" viewBox="0 0 2102 783" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.388889"
                          d="M2099.37 781.394C1755.09 471.975 887.657 -113.368 172.144 20.6156C-543.37 154.599 1158.83 583.628 2099.37 781.394Z"
                          stroke="#5E94AF"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.011">
                <svg width="2102" height="782" viewBox="0 0 2102 782" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.311111"
                          d="M2099.32 780.971C1755.04 471.552 887.61 -113.791 172.097 20.1926C-543.417 154.176 1158.78 583.205 2099.32 780.971Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0202">
                <svg width="2101" height="783" viewBox="0 0 2101 783" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.233333"
                          d="M2099.27 781.548C1755 472.129 887.564 -113.214 172.05 20.7697C-543.464 154.753 1158.74 583.782 2099.27 781.548Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0404">
                <svg width="2101" height="782" viewBox="0 0 2101 782" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.155556"
                          d="M2099.23 781.125C1754.95 471.706 887.517 -113.637 172.003 20.3468C-543.511 154.33 1158.69 583.359 2099.23 781.125Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0606">
                <svg width="2101" height="783" viewBox="0 0 2101 783" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.0777778"
                          d="M2099.18 781.702C1754.9 472.283 887.47 -113.06 171.956 20.9238C-543.558 154.908 1158.64 583.936 2099.18 781.702Z"
                          stroke="white"/>
                </svg>
            </li>
        </ul>
    </div>
    <div class="dots" data-num="20"></div>
</div>

<div id="author" class="container">
    <div class="slideIn slideIn2">
        <img src="assets/img/authr1.jpg" alt="">
    </div>
    <div class="texts">
        <p class="slideIn">
            <span class="big">E</span>lena Salova is a Ukrainian-born artist living in Spain, known for her innovative
            painting technique called <span class="red">"Multilayered Veil"</span>, developed in 2014. This technique
            emerged spontaneously before a major exhibition in Kyiv, where Elena, pressed for time, layered translucent
            oil paints to reveal hidden figures through delicate lines. It is a deeply intuitive process, likened to
            <span class="yellow">"developing a photograph"</span>.
        </p>
        <p class="slideIn">
            Elena studied monumental painting at the National Academy of Fine Arts in Kyiv and gained recognition with
            her 2013 show <span class="green">"Illusion"</span>. Her works have appeared in galleries across Europe,
            including Moscow, Ukraine, and the UK. In 2023, she exhibited at the <span
                    class="purple">Hotel Alfonso XIII</span> in Seville, where her pieces were acquired by Italian
            collectors.
        </p>
        <p class="slideIn">
            The war in Ukraine forced Elena to leave her home, finding solace in meditation and art. In Spain, she
            revived her passion for painting using her unique technique. She eventually opened a gallery in Seville,
            near the largest Gothic cathedral, where she restored antique masterpieces and showcased her own works,
            including pieces by <span class="red">Dalí</span>, <span class="green">Miró</span>, and <span
                    class="yellow">Goya</span>.
        </p>

        <div class="underline-btn-container">
            <a href="#gallery" class="underline-btn slideIn link">view gallery</a>
        </div>
    </div>
</div>

<div id="collections">
    <div class="container">
        <h1 class="heading_text slideIn">SERIES
            <span class="pc">COLLECTIONS</span>
            <span class="mobile">COLLE CTIONS</span></h1>

        <div class="patterns">
            <div class="pattern-block slideIn slideLeft collection-tab-button active" data-tab="collection1">
                <picture>
                    <source media="(max-width: 1199px)" srcset="assets/img/patterns/pt1_mobile.png">
                    <img src="assets/img/patterns/pt1.png" alt="Pattern"/>
                </picture>
            </div>
            <div class="pattern-block slideIn slideLeft1 collection-tab-button" data-tab="collection2">
                <picture>
                    <source media="(max-width: 1199px)" srcset="assets/img/patterns/pt2_mobile.png">
                    <img src="assets/img/patterns/pt2.png" alt="Pattern"/>
                </picture>
            </div>
            <div class="pattern-block slideIn slideLeft2 collection-tab-button" data-tab="collection3">
                <picture>
                    <source media="(max-width: 1199px)" srcset="assets/img/patterns/pt3_mobile.png">
                    <img src="assets/img/patterns/pt3.png" alt="Pattern"/>
                </picture>
            </div>
            <div class="pattern-block slideIn slideLeft3 collection-tab-button" data-tab="collection4">
                <picture>
                    <source media="(max-width: 1199px)" srcset="assets/img/patterns/pt4_mobile.png">
                    <img src="assets/img/patterns/pt4.png" alt="Pattern"/>
                </picture>
            </div>
        </div>

        <div class="collection-prev-text active" id="collection1_text">
            <div class="collection_name collection_serie slideIn">
                <h2 class="heading_text">MUDRAS</h2>
                <p>S E R I E</p>
            </div>
            <p class="collection__under_text slideIn">The works from the Mudras collection depict elegant gestures of
                golden hands against abstract contrasts, symbolizing inner strength, power, and the balance between the
                physical and spiritual.</p>
        </div>
        <div class="collection-prev-text" id="collection2_text">
            <div class="collection_name collection_serie slideIn">
                <h2 class="heading_text">WATER</h2>
                <p>S E R I E</p>
            </div>
            <p class="collection__under_text slideIn">The Edge Between Reality and Dream, where figures dissolve in the
                play of light and water, creating the illusion of continuous movement and harmony</p>
        </div>
        <div class="collection-prev-text" id="collection3_text">
            <div class="collection_name collection_serie slideIn">
                <h2 class="heading_text">CIRCLES</h2>
                <p>S E R I E</p>
            </div>
            <p class="collection__under_text slideIn">Nature and Man in Unity, where each work on a circular canvas
                reflects the relationship between nature and human existence.</p>
        </div>
        <div class="collection-prev-text" id="collection4_text">
            <div class="collection_name collection_serie slideIn">
                <h2 class="heading_text">DIMENSIONS</h2>
                <p>S E R I E</p>
            </div>
            <p class="collection__under_text slideIn">Infinite intersections of nature and man, where on each canvas
                different worlds connect, revealing a multi-layered reality, where man and nature intertwine in a dance
                of forms and energies.</p>
        </div>
    </div>

    <div class="pattern_line">
        <img src="assets/img/patterns/big.png" alt="">
    </div>

    <div id="collection1" class="container collection-tab-content active">
        <div class="collection_flex first">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2>Open</h2>
                        <h3>oil on canvas</h3>
                        <p>40 X 5<span>0</span></p>
                        <p><span>1’3’’</span> X<span>1’6’’</span></p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>his painting masterfully balances contrasts and
                    symbolism. The artist draws attention to the golden hand, illuminated against a dark, abstract
                    backdrop. The hand feels more than just a physical object — it suggests power, control, or inner
                    strength. Its detailed, elegant lines, highlighted by light, sharply contrast with the blurred,
                    abstract background, evoking tension and mystery.</p>
            </div>
            <div class="photo">
                <img class="slideIn" src="assets/img/works/cl1.jpg" alt="">
                <div class="underline-btn-container">
                    <span class="slideIn slideIn2">SOLD</span>
                    <a href="artwork_info.php?id=31" target="_blank" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>his painting masterfully balances contrasts and
                symbolism. The artist draws attention to the golden hand, illuminated against a dark, abstract backdrop.
                The hand feels more than just a physical object — it suggests power, control, or inner strength. Its
                detailed, elegant lines, highlighted by light, sharply contrast with the blurred, abstract background,
                evoking tension and mystery.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=31" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>

        </div>

        <div class="collection_flex right">
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=32" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>his painting is filled with subtle symbolism and a sense
                of incompleteness. At the center of the composition is a golden hand, raised in a gesture that can be
                interpreted as a sign of approval, control, or inner harmony. The metallic texture of the hand gives it
                an artificial yet majestic quality, as if it were part of an ancient statue or artifact possessing
                special power.</p>
            <div class="photo">
                <img src="assets/img/works/cl2.jpg" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="artwork_info.php?id=32" target="_blank" class="underline-btn slideIn pc">read more.</a>
                    <span class="yellow slideIn slideIn2">IN PRIVATE<br>COLLECTION</span>
                </div>
            </div>
            <div class="dots" data-num="10"></div>
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Hope</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>40 X 50</p>
                        <p>1’3’’X1’6’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>his painting is filled with subtle symbolism and a sense
                    of incompleteness. At the center of the composition is a golden hand, raised in a gesture that can
                    be interpreted as a sign of approval, control, or inner harmony. The metallic texture of the hand
                    gives it an artificial yet majestic quality, as if it were part of an ancient statue or artifact
                    possessing special power.</p>
            </div>
        </div>

        <div class="collection_flex">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Gate</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>40 X 50</p>
                        <p>1’3’’X1’6’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>his painting represents a combination of realism and
                    abstraction. The central element of the composition is a hand extended forward, holding an unusual
                    object that resembles a stylized pomegranate or flower. The hand is depicted in a highly realistic
                    manner, with attention to light and shadow, emphasizing its three-dimensionality and texture.
                    Surrounding the hand are abstract, broad brushstrokes in various shades of brown, beige, and black,
                    creating a sense of movement and adding dynamism. These strokes give the painting a modern,
                    expressive quality.</p>
            </div>
            <div class="photo">
                <img src="assets/img/works/cl3.jpg" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a target="_blank" href="payment.php?id=33" class="underline-btn slideIn slideIn2">buy art.</a>
                    <a target="_blank" href="artwork_info.php?id=33" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>his painting represents a combination of realism and
                abstraction. The central element of the composition is a hand extended forward, holding an unusual
                object that resembles a stylized pomegranate or flower. The hand is depicted in a highly realistic
                manner, with attention to light and shadow, emphasizing its three-dimensionality and texture.
                Surrounding the hand are abstract, broad brushstrokes in various shades of brown, beige, and black,
                creating a sense of movement and adding dynamism. These strokes give the painting a modern, expressive
                quality.</p>
            <div class="underline-btn-container mobile">
                <a target="_blank" href="artwork_info.php?id=33" class="underline-btn slideIn">read more.</a>
            </div>
        </div>
    </div>
    <div id="collection2" class="container collection-tab-content">
        <div class="collection_flex first">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2>Swimmer</h2>
                        <h3>oil on canvas</h3>
                        <p>155 X 10<span>0</span></p>
                        <p><span>5’08’’</span> X<span>3’45’’</span></p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">I</span>n the silence of the evening twilight, as the last rays
                    of the sun touch the surface of the water, a mysterious figure emerges, submerged in the watery
                    depths. Only the upper part of the body and hands are visible above the surface, as if striving to
                    break free from the embrace of the water. Light patterns playing on the water create a whimsical
                    interplay of light and shadow, giving the painting a mystical depth and enigma.</p>
            </div>
            <div class="photo">
                <img class="slideIn" src="assets/img/works/w4.jpg" alt="">
                <div class="underline-btn-container">
                    <span class="slideIn slideIn2">SOLD</span>
                    <a href="artwork_info.php?id=22" target="_blank" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">I</span>n the silence of the evening twilight, as the last rays
                of the sun touch the surface of the water, a mysterious figure emerges, submerged in the watery depths.
                Only the upper part of the body and hands are visible above the surface, as if striving to break free
                from the embrace of the water. Light patterns playing on the water create a whimsical interplay of light
                and shadow, giving the painting a mystical depth and enigma.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=22" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>

        </div>

        <div class="collection_flex right">
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=24" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
            <p class="slideIn mobile"><span class="big">E</span>ach raindrop is a metaphor for a feeling that cannot be
                expressed. She gazes into the distance, but her eyes do not penetrate through the window. Her gaze is
                not directed outside, but inward—into the space of her own consciousness. The blue tones and soft light
                create an atmosphere of melancholy and solitude. The car, perhaps, is not just a vehicle, but a symbol
                of a journey through memories and reflections. Despite the glass separating her from the outside world,
                her image remains clear and strong, highlighting the depth and complexity of her inner state.</p>
            <div class="photo">
                <img src="assets/img/works/w2.png" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="artwork_info.php?id=24" target="_blank" class="underline-btn slideIn pc">read more.</a>
                    <span class="yellow slideIn slideIn2">AVAILABLE</span>
                </div>
            </div>
            <div class="dots" data-num="10"></div>
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Moment</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>120 x 80</p>
                        <p>3’9’’X2’6’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">E</span>ach raindrop is a metaphor for a feeling that cannot be
                    expressed. She gazes into the distance, but her eyes do not penetrate through the window. Her gaze
                    is not directed outside, but inward—into the space of her own consciousness. The blue tones and soft
                    light create an atmosphere of melancholy and solitude. The car, perhaps, is not just a vehicle, but
                    a symbol of a journey through memories and reflections. Despite the glass separating her from the
                    outside world, her image remains clear and strong, highlighting the depth and complexity of her
                    inner state.</p>
            </div>
        </div>

        <div class="collection_flex">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Alice</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>160 X 60</p>
                        <p>5’2’’X3’2’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>he woman gazes through a window covered in raindrops, as
                    if her thoughts and emotions are also drops—sliding down the glass, unable to escape.The raindrops
                    seem to divide her from the outside world. They create a barrier that distorts and blurs her
                    features, reminding us of how often our own feelings, fears, and dreams become hazy and impenetrable
                    to others. Her gaze is not directed at us, but inward, beyond reflections and memories. It is filled
                    with an indescribable calm, yet it carries the depth of untold stories.</p>
            </div>
            <div class="photo">
                <img src="assets/img/works/w1.png" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="payment.php?id=23" target="_blank" class="underline-btn slideIn slideIn2">buy art.</a>
                    <a href="artwork_info.php?id=23" target="_blank" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>he woman gazes through a window covered in raindrops, as
                if her thoughts and emotions are also drops—sliding down the glass, unable to escape.The raindrops seem
                to divide her from the outside world. They create a barrier that distorts and blurs her features,
                reminding us of how often our own feelings, fears, and dreams become hazy and impenetrable to others.
                Her gaze is not directed at us, but inward, beyond reflections and memories. It is filled with an
                indescribable calm, yet it carries the depth of untold stories.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=23" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
        </div>
    </div>
    <div id="collection3" class="container collection-tab-content">
        <div class="collection_flex first">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2>Wild</h2>
                        <h3>oil on canvas</h3>
                        <p>60 cm</p>
                        <p>2’6’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>he central figure is the head of a leopard, symbolizing
                    the primal power hidden within every living being. Its eyes are full of wisdom and instinct,
                    piercing through space as if opening a doorway to the natural world. Around it unfolds a whirlwind
                    of fantasies: images of horses, snakes, and human faces intertwine into a harmonious whole,
                    symbolizing the interconnectedness of all forms of life. Every detail here is not just part of the
                    background, but something alive, significant, as if everything is coming to life in a unified flow
                    of existence. The snakes and their patterns point to wisdom and hidden danger, while the human
                    figures perhaps reflect the spiritual essence within the context of nature.</p>
            </div>
            <div class="photo">
                <img class="slideIn" src="assets/img/works/c1.png" alt="">
                <div class="underline-btn-container">
                    <span class="slideIn slideIn2">AVAILABLE</span>
                    <a href="artwork_info.php?id=25" target="_blank" class="underline-btn slideIn pc">buy.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>he central figure is the head of a leopard, symbolizing
                the primal power hidden within every living being. Its eyes are full of wisdom and instinct, piercing
                through space as if opening a doorway to the natural world. Around it unfolds a whirlwind of fantasies:
                images of horses, snakes, and human faces intertwine into a harmonious whole, symbolizing the
                interconnectedness of all forms of life. Every detail here is not just part of the background, but
                something alive, significant, as if everything is coming to life in a unified flow of existence. The
                snakes and their patterns point to wisdom and hidden danger, while the human figures perhaps reflect the
                spiritual essence within the context of nature.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=25" target="_blank" class="underline-btn slideIn">buy.</a>
            </div>

        </div>

        <div class="collection_flex right">
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=28" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>he painting conveys a sense of movement and energy, with
                elements seemingly merging into one another, creating a harmonious and vibrant canvas. This artwork
                invites the viewer to immerse themselves in a world of fantasies and interpretations, where each person
                can see something unique and feel a connection to nature and its endless motion.</p>
            <div class="photo">
                <img src="assets/img/works/c7.png" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="artwork_info.php?id=28" target="_blank" class="underline-btn slideIn pc">read more.</a>
                    <span class="yellow slideIn slideIn2">AVAILABLE</span>
                </div>
            </div>
            <div class="dots" data-num="10"></div>
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Creation</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>50 cm</p>
                        <p>1’6’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>he painting conveys a sense of movement and energy, with
                    elements seemingly merging into one another, creating a harmonious and vibrant canvas. This artwork
                    invites the viewer to immerse themselves in a world of fantasies and interpretations, where each
                    person can see something unique and feel a connection to nature and its endless motion.</p>
            </div>
        </div>

        <div class="collection_flex">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Enigma</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>60 cm</p>
                        <p>2’6’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">A</span>t the center of the composition stands a mysterious
                    figure, partially obscured by a beige rectangle, possibly added to preserve secrecy or privacy.
                    Surrounding this central figure is a whole world of mythological and classical characters. Muscular
                    human forms and possibly deities, immersed in dynamic poses, create a sense of movement and energy.
                </p>
            </div>
            <div class="photo">
                <img src="assets/img/works/c3.png" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="payment.php?id=27" target="_blank" class="underline-btn slideIn slideIn2">buy art.</a>
                    <a href="artwork_info.php?id=27" target="_blank" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">A</span>t the center of the composition stands a mysterious
                figure, partially obscured by a beige rectangle, possibly added to preserve secrecy or privacy.
                Surrounding this central figure is a whole world of mythological and classical characters. Muscular
                human forms and possibly deities, immersed in dynamic poses, create a sense of movement and energy.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=27" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
        </div>
    </div>
    <div id="collection4" class="container collection-tab-content">
        <div class="collection_flex first">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2>Andalusian Dream</h2>
                        <h3>OIL and SPRAY ON CANVAS</h3>
                        <p>100 x 8<span>0</span></p>
                        <p><span>4’</span> X<span>2.7’’</span></p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>his painting exudes a dreamlike quality, blending
                    religious and cultural symbolism. The central figure appears to be a serene Madonna holding a child,
                    reminiscent of classical Christian iconography. Around her, other figures and symbols emerge softly,
                    as if from a hazy memory. The prominent white flowers, possibly magnolias, add a sense of purity and
                    grace, contrasting with the earth-toned palette. A man in the lower left corner smokes a cigar,
                    dressed in what looks like traditional attire, bringing an element of modernity and cultural
                    identity to the composition. A heart held by one of the figures on the right could symbolize deep
                    emotional or spiritual significance. The painting mixes fluid brushstrokes with more defined forms,
                    creating a layered, atmospheric effect, invoking themes of faith, memory, and identity.</p>
            </div>
            <div class="photo">
                <img class="slideIn" src="assets/img/works/adream.jpg" alt="">
                <div class="underline-btn-container">
                    <span class="slideIn slideIn2">AVAILABLE</span>
                    <a href="artwork_info.php?id=13" target="_blank" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>his painting exudes a dreamlike quality, blending
                religious and cultural symbolism. The central figure appears to be a serene Madonna holding a child,
                reminiscent of classical Christian iconography. Around her, other figures and symbols emerge softly, as
                if from a hazy memory. The prominent white flowers, possibly magnolias, add a sense of purity and grace,
                contrasting with the earth-toned palette. A man in the lower left corner smokes a cigar, dressed in what
                looks like traditional attire, bringing an element of modernity and cultural identity to the
                composition. A heart held by one of the figures on the right could symbolize deep emotional or spiritual
                significance. The painting mixes fluid brushstrokes with more defined forms, creating a layered,
                atmospheric effect, invoking themes of faith, memory, and identity.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=13" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>

        </div>

        <div class="collection_flex right">
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=11" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>his painting blends classical biblical themes with
                modern artistic techniques. At the center, Adam and Eve stand nude, holding the apple—a symbol of
                temptation and original sin. Their figures are depicted in a realistic, Renaissance-like style,
                contrasting with the vibrant, abstract background of bold brushstrokes. Surrounding them are various
                faces and creatures, including a Christ-like figure in the upper left, an owl, and other mystical
                beings. These elements deepen the metaphorical narrative of temptation and consequence. Unexpectedly, a
                French bulldog sits in the bottom right, adding a surreal and contemporary touch. The piece feels like a
                fusion of time periods, exploring timeless themes through a multi-layered, visually complex composition.
            </p>
            <div class="photo">
                <img src="assets/img/works/adamandeva.jpg" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="artwork_info.php?id=11" target="_blank" class="underline-btn slideIn pc">read more.</a>
                    <span class="yellow slideIn slideIn2">AVAILABLE</span>
                </div>
            </div>
            <div class="dots" data-num="10"></div>
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">Adam Eva</h2>
                        <h3 class="heading_text">OIL and ACRYLIC ON CANVAS</h3>
                        <p>100 х 72</p>
                        <p>3’2’’X2’4’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>his painting blends classical biblical themes with
                    modern artistic techniques. At the center, Adam and Eve stand nude, holding the apple—a symbol of
                    temptation and original sin. Their figures are depicted in a realistic, Renaissance-like style,
                    contrasting with the vibrant, abstract background of bold brushstrokes. Surrounding them are various
                    faces and creatures, including a Christ-like figure in the upper left, an owl, and other mystical
                    beings. These elements deepen the metaphorical narrative of temptation and consequence.
                    Unexpectedly, a French bulldog sits in the bottom right, adding a surreal and contemporary touch.
                    The piece feels like a fusion of time periods, exploring timeless themes through a multi-layered,
                    visually complex composition.</p>
            </div>
        </div>

        <div class="collection_flex">
            <div class="texts">
                <div class="ball slideIn slideIn2">
                    <div class="collection_name">
                        <h2 class="heading_text">The Wind</h2>
                        <h3 class="heading_text">oil on canvas</h3>
                        <p>100 X 73</p>
                        <p>3’3’’X2’4’’</p>
                    </div>
                </div>
                <p class="slideIn pc"><span class="big">T</span>his delicate painting, rendered in soft, flowing shades of blue and green, creates a dreamlike atmosphere, evoking a sense of fluidity and motion. Figures and animals seem to merge and dissolve into one another, symbolizing the interconnectedness of life and the blurred boundaries between human and nature. The use of transparent washes of color gives the work an ethereal, almost meditative quality, inviting the viewer to contemplate the transient and fleeting nature of existence. This piece would add a calming yet thought-provoking presence to any space, perfect for those who appreciate art that communicates both serenity and depth.</p>
            </div>
            <div class="photo">
                <img src="assets/img/works/wind.jpg" class="slideIn slideIn2" alt="">
                <div class="underline-btn-container">
                    <a href="payment.php?id=17" target="_blank" class="underline-btn slideIn slideIn2">buy art.</a>
                    <a href="artwork_info.php?id=17" target="_blank" class="underline-btn slideIn pc">read more.</a>
                </div>
            </div>
            <p class="slideIn mobile"><span class="big">T</span>his delicate painting, rendered in soft, flowing shades of blue and green, creates a dreamlike atmosphere, evoking a sense of fluidity and motion. Figures and animals seem to merge and dissolve into one another, symbolizing the interconnectedness of life and the blurred boundaries between human and nature. The use of transparent washes of color gives the work an ethereal, almost meditative quality, inviting the viewer to contemplate the transient and fleeting nature of existence. This piece would add a calming yet thought-provoking presence to any space, perfect for those who appreciate art that communicates both serenity and depth.</p>
            <div class="underline-btn-container mobile">
                <a href="artwork_info.php?id=17" target="_blank" class="underline-btn slideIn">read more.</a>
            </div>
        </div>
    </div>
</div>

<div id="quote">
    <div class="container">
        <ul id="quotes_slinky">
            <li class="layer" data-depth="0.11">
                <svg class="slideIn slideRight" width="2133" height="698" viewBox="0 0 2133 698" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.7"
                          d="M2130.74 696.629C1771.37 404.882 875.643 -136.177 167.758 33.5564C-540.128 203.29 1181.46 546.327 2130.74 696.629Z"
                          stroke="#C15E57"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0808">
                <svg class="slideIn slideRight1" width="2133" height="698" viewBox="0 0 2133 698" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.622222"
                          d="M2130.73 696.333C1771.36 404.586 875.633 -136.473 167.748 33.2605C-540.138 202.994 1181.45 546.031 2130.73 696.333Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0606">
                <svg class="slideIn slideRight2" width="2133" height="697" viewBox="0 0 2133 697" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.544444"
                          d="M2130.72 696.037C1771.35 404.29 875.623 -136.769 167.738 32.9646C-540.148 202.698 1181.44 545.735 2130.72 696.037Z"
                          stroke="#F9C04E"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0404">
                <svg class="slideIn slideRight3" width="2133" height="698" viewBox="0 0 2133 698" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.466667"
                          d="M2130.71 696.741C1771.34 404.995 875.613 -136.065 167.727 33.6687C-540.158 203.402 1181.43 546.439 2130.71 696.741Z"
                          stroke="#CB4D40"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0202">
                <svg class="slideIn slideRight4" width="2133" height="698" viewBox="0 0 2133 698" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.388889"
                          d="M2130.7 696.445C1771.33 404.699 875.603 -136.361 167.717 33.3728C-540.168 203.106 1181.42 546.143 2130.7 696.445Z"
                          stroke="#5E94AF"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.011">
                <svg class="slideIn slideRight5" width="2133" height="697" viewBox="0 0 2133 697" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.311111"
                          d="M2130.69 696.149C1771.32 404.403 875.593 -136.657 167.707 33.0769C-540.178 202.811 1181.41 545.847 2130.69 696.149Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0202">
                <svg class="slideIn slideRight6" width="2133" height="697" viewBox="0 0 2133 697" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.233333"
                          d="M2130.68 695.853C1771.31 404.107 875.583 -136.953 167.697 32.781C-540.188 202.515 1181.4 545.552 2130.68 695.853Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0404">
                <svg class="slideIn slideRight7" width="2133" height="698" viewBox="0 0 2133 698" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.155556"
                          d="M2130.67 696.557C1771.3 404.81 875.573 -136.249 167.687 33.4846C-540.198 203.218 1181.39 546.255 2130.67 696.557Z"
                          stroke="white"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0606">
                <svg class="slideIn slideRight8" width="2133" height="698" viewBox="0 0 2133 698" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.0777778"
                          d="M2130.66 696.261C1771.29 404.515 875.563 -136.545 167.677 33.1887C-540.208 202.922 1181.38 545.959 2130.66 696.261Z"
                          stroke="white"/>
                </svg>
            </li>
        </ul>
        <div class="quote_container">
            <img src="assets/img/quote1.png" class="slideIn slideIn2" alt="">
            <div class="texts">
                <p class="quote slideIn slideIn2">Art is something that blooms just a second before it evaporates
                    forever.</p>
                <span class="slideIn">ELENA</span>
            </div>
        </div>
        <div class="underline-btn-container">
            <p class="slideIn slideIn2">WANT MORE<br>COLLECTIONS?</p>
            <a href="#gallery" class="underline-btn slideIn link">watch more.</a>
        </div>
        <div class="dots" data-num="5"></div>


        <div class="after_quote">
            <div>
                <h1>
                    <span class="slideIn">A</span>
                    <span class="slideIn slideLeft">R</span>
                    <span class="slideIn slideLeft1">T</span>
                    <span class="slideIn slideLeft2">
                                <svg width="52" height="51" viewBox="0 0 52 51" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_50_2248" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0"
                                          y="0"
                                          width="52" height="51">
                                        <path d="M25.4688 0.0996094C32.6921 0.0996094 38.8319 2.52458 43.8882 7.37451C48.9445 12.2244 51.4727 18.2611 51.4727 25.4844C51.4727 32.5013 48.9445 38.4863 43.8882 43.4395C38.8319 48.3926 32.8984 50.8691 26.0879 50.8691C19.2773 50.8691 13.3439 48.341 8.2876 43.2847C3.23128 38.2284 0.703125 32.2949 0.703125 25.4844C0.703125 18.777 3.12809 12.8952 7.97803 7.83887C12.9312 2.67936 18.7614 0.0996094 25.4688 0.0996094Z"
                                              fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_50_2248)">
                                        <path d="M24.4512 6.19498C28.5254 5.25899 32.5869 7.80299 33.5229 11.8772C34.4589 15.9513 31.9149 20.0128 27.8407 20.9488C23.7666 21.8848 19.705 19.3408 18.7691 15.2666C17.8331 11.1925 20.3771 7.13096 24.4512 6.19498Z"
                                              fill="#B6A546"/>
                                        <path d="M22.1527 44.0085C26.2269 43.0725 30.2884 45.6165 31.2244 49.6906C32.1604 53.7648 29.6164 57.8263 25.5422 58.7623C21.468 59.6983 17.4065 57.1543 16.4705 53.0801C15.5346 49.006 18.0786 44.9444 22.1527 44.0085Z"
                                              fill="#264A7A"/>
                                        <path d="M49.4323 26.6803C53.5065 25.7443 57.568 28.2883 58.504 32.3625C59.44 36.4367 56.896 40.4982 52.8218 41.4342C48.7476 42.3702 44.6861 39.8262 43.7501 35.752C42.8142 31.6778 45.3582 27.6163 49.4323 26.6803Z"
                                              fill="#FE76AC"/>
                                        <path d="M10.7227 20.5741C10.4849 24.7477 6.9088 27.9382 2.73528 27.7004C-1.43825 27.4626 -4.62879 23.8866 -4.391 19.713C-4.15321 15.5395 -0.577135 12.349 3.59639 12.5867C7.76992 12.8245 10.9605 16.4006 10.7227 20.5741Z"
                                              fill="#C15E57"/>
                                        <path d="M-0.145671 49.4385C1.1039 45.4493 5.35073 43.2284 9.3399 44.478C13.3291 45.7276 15.5499 49.9744 14.3004 53.9636C13.0508 57.9527 8.80397 60.1736 4.8148 58.924C0.825638 57.6745 -1.39524 53.4276 -0.145671 49.4385Z"
                                              fill="#417E78"/>
                                        <path d="M17.1194 16.5739C21.1935 15.6379 25.2551 18.1819 26.1911 22.2561C27.127 26.3302 24.583 30.3917 20.5089 31.3277C16.4347 32.2637 12.3732 29.7197 11.4372 25.6456C10.5012 21.5714 13.0452 17.5099 17.1194 16.5739Z"
                                              fill="#264A7A"/>
                                        <path d="M66.5891 39.1015C66.3513 43.275 62.7752 46.4656 58.6017 46.2278C54.4281 45.99 51.2376 42.4139 51.4754 38.2404C51.7132 34.0668 55.2893 30.8763 59.4628 31.1141C63.6363 31.3519 66.8269 34.928 66.5891 39.1015Z"
                                              fill="#C15E57"/>
                                        <path d="M32.1657 42.9315C34.4924 39.4586 39.194 38.5294 42.6669 40.8561C46.1398 43.1828 47.0691 47.8843 44.7423 51.3572C42.4156 54.8302 37.7141 55.7594 34.2412 53.4327C30.7682 51.106 29.839 46.4044 32.1657 42.9315Z"
                                              fill="#5E94AF"/>
                                        <path d="M43.5251 29.8512C45.0528 33.7423 43.1368 38.1352 39.2457 39.6628C35.3545 41.1905 30.9617 39.2745 29.434 35.3834C27.9063 31.4922 29.8223 27.0994 33.7135 25.5717C37.6046 24.0441 41.9974 25.96 43.5251 29.8512Z"
                                              fill="#F9C04E"/>
                                        <path d="M31.79 -1.75136C33.3177 2.1398 31.4017 6.53262 27.5106 8.0603C23.6194 9.58798 19.2266 7.672 17.6989 3.78085C16.1712 -0.110304 18.0872 -4.50313 21.9784 -6.03081C25.8695 -7.55848 30.2623 -5.64251 31.79 -1.75136Z"
                                              fill="#F9C04E"/>
                                        <path d="M64.3448 54.2848C65.8724 58.1759 63.9565 62.5688 60.0653 64.0964C56.1742 65.6241 51.7813 63.7081 50.2537 59.817C48.726 55.9258 50.642 51.533 54.5331 50.0053C58.4243 48.4776 62.8171 50.3936 64.3448 54.2848Z"
                                              fill="#FE76AC"/>
                                        <path d="M6.6861 37.6237C10.7603 36.6877 14.8218 39.2317 15.7578 43.3059C16.6938 47.38 14.1498 51.4415 10.0756 52.3775C6.00143 53.3135 1.93991 50.7695 1.00392 46.6954C0.0679402 42.6212 2.61194 38.5597 6.6861 37.6237Z"
                                              fill="#FE76AC"/>
                                        <path d="M33.0237 37.6237C37.0979 36.6877 41.1594 39.2317 42.0954 43.3059C43.0314 47.38 40.4874 51.4415 36.4132 52.3775C32.3391 53.3135 28.2776 50.7695 27.3416 46.6954C26.4056 42.6212 28.9496 38.5597 33.0237 37.6237Z"
                                              fill="#FE76AC"/>
                                        <path d="M36.4744 49.4049C36.1322 53.5712 32.4773 56.6712 28.3111 56.329C24.1448 55.9868 21.0448 52.332 21.387 48.1657C21.7292 43.9994 25.384 40.8994 29.5503 41.2416C33.7165 41.5838 36.8166 45.2387 36.4744 49.4049Z"
                                              fill="#C15E57"/>
                                        <path d="M36.4744 49.4049C36.1322 53.5712 32.4773 56.6712 28.3111 56.329C24.1448 55.9868 21.0448 52.332 21.387 48.1657C21.7292 43.9994 25.384 40.8994 29.5503 41.2416C33.7165 41.5838 36.8166 45.2387 36.4744 49.4049Z"
                                              fill="#C15E57"/>
                                        <path d="M46.1267 14.6648C43.2466 11.6351 43.3678 6.84412 46.3976 3.96396C49.4274 1.08379 54.2183 1.20508 57.0985 4.23486C59.9787 7.26463 59.8574 12.0556 56.8276 14.9357C53.7978 17.8159 49.0069 17.6946 46.1267 14.6648Z"
                                              fill="#417E78"/>
                                        <path d="M15.2466 0.733336C19.3503 -0.0629536 23.3226 2.61827 24.1189 6.72203C24.9152 10.8258 22.234 14.798 18.1302 15.5943C14.0265 16.3906 10.0542 13.7094 9.2579 9.60564C8.46161 5.50189 11.1428 1.52962 15.2466 0.733336Z"
                                              fill="#5E94AF"/>
                                    </g>
                                </svg>
                            </span>
                </h1>
                <p class="slideIn slideIn2">ELENA SALOVA</p>
            </div>
        </div>
    </div>
</div>

<div id="gallery">
    <div class="gallery_top"></div>
    <div class="gallery_body">
        <div class="container">
            <div class="filter_wrapper">
                <div class="filter">
                    <button class="filter_button" id="filterButton">
                        <span>FILTER</span>
                        <span class="filter_burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                    <div class="filter_popup closed" id="filterPopup">
                        <div class="popup_header">
                            <h2>FILTER</h2>
                            <button class="close-button" id="closeButton">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                        <div class="filter_categories">
                            <label class="custom-checkbox">
                                <input type="checkbox" class="filter-checkbox" value="sold.">
                                <span class="checkmark"></span>
                                <p>sold.</p>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox" class="filter-checkbox" value="available.">
                                <span class="checkmark"></span>
                                <p>available.</p>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox" class="filter-checkbox" value="in private collection.">
                                <span class="checkmark"></span>
                                <p>in private collection.</p>
                            </label>
                            <label class="custom-checkbox">
                                <input type="checkbox" class="filter-checkbox" value="sold in auction.">
                                <span class="checkmark"></span>
                                <p>sold in auction.</p>
                            </label>
                        </div>
                    </div>
                    <div class="chosen_filters" id="chosenFilters">
                    </div>
                </div>
                <span class="pc">GALLERY</span>
            </div>
            <div class="gallery">
                <?php
                $arts = db_getAll('gallery');
                shuffle($arts);
                foreach ($arts as $art):?>
                    <div class="gallery_block" data-id="<?= $art['id'] ?>" data-status="<?= $art['status'] ?>">
                        <div class="gallery_image_container">
                            <img src="/assets/img/works/<?= $art['image'] ?>" alt="">
                            <div class="magnifier">
                                <svg width="71" height="71" viewBox="0 0 71 71" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32.4305 56.1501C45.3171 56.1501 55.7638 45.7034 55.7638 32.8167C55.7638 19.9301 45.3171 9.4834 32.4305 9.4834C19.5439 9.4834 9.09717 19.9301 9.09717 32.8167C9.09717 45.7034 19.5439 56.1501 32.4305 56.1501Z"
                                          stroke="white" stroke-width="3" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M68.3799 65.9854L50.5698 49.6182" stroke="white" stroke-width="3"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                        <h1><?= $art['name'] ?></h1>
                        <p><?= $art['type'] ?></p>
                        <span><?= $art['size'] ?></span>
                        <button>
                            <span class="button-ball"></span>
                            <span><?= $art['status'] ?></span>
                        </button>
                        <div class="gallery_active_background"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="controls">
                <h4>THIS IS END, but</h4>
                <div class="control">
                    <span>SEE MORE ARTWORKS</span>
                </div>
            </div>
            <div class="callback-form">
                <ul id="gallery_form_slinky">
                    <li class="layer" data-depth="0.11">
                        <svg width="2096" height="749" viewBox="0 0 2096 749" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.544444"
                                  d="M2093.91 13.1791C1633.07 -30.3341 587.642 16.0824 92.6673 549.854C-402.307 1083.63 1220.59 414.475 2093.91 13.1791Z"
                                  stroke="#010101"/>
                        </svg>
                    </li>
                    <li class="layer" data-depth="0.0404">
                        <svg width="2097" height="749" viewBox="0 0 2097 749" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.466667"
                                  d="M2094.71 13.5229C1633.87 -29.9903 588.449 16.4261 93.4749 550.197C-401.499 1083.97 1221.4 414.819 2094.71 13.5229Z"
                                  stroke="#5D5D5D"/>
                        </svg>
                    </li>
                    <li class="layer" data-depth="-0.0404">
                        <svg width="2097" height="750" viewBox="0 0 2097 750" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.388889"
                                  d="M2094.52 13.8676C1633.68 -29.6456 588.257 16.7709 93.2825 550.542C-401.692 1084.31 1221.2 415.164 2094.52 13.8676Z"
                                  stroke="#C0C0C0"/>
                        </svg>
                    </li>
                </ul>
                <form class="form">
                    <h1>Always be first</h1>
                    <div class="input">
                        <input type="email" name="mail" placeholder="YOUR EMAIL">
                        <button type="button" class="next-btn">next.</button>
                    </div>
                    <div class="hidden_input">
                        <textarea name="message" placeholder="MESSAGE:"></textarea>
                    </div>
                    <p>
                        <span class="big">L</span>eave your email to connect with Elena, then click "Next" to send a
                        personal message. Share your thoughts on her art or
                        request something unique created just for you! A portrait or memorable place can be captured
                        forever.
                    </p>
                </form>
            </div>
        </div>
    </div>
    <div class="gallery_bottom"></div>
</div>

<div id="drawForMe">
    <div class="dots" data-num="15"></div>
    <div class="container">
        <h1>Draw<br>for me</h1>
        <p><span class="big">T</span>he "Multilayered Veil" technique, created by Elena Salova, is a unique painting
            process where the image gradually emerges through multiple layers of paint. The artist applies translucent
            layers of oil or watercolor, creating a soft, misty effect. With each new layer, parts of the painting seem
            to appear as if they were hidden beneath the surface, much like a photograph developing in a darkroom. Elena
            uses fine brushes to "reveal" hidden shapes, figures, and stories, as though they already exist on the
            canvas, waiting to be discovered.</p>
        <p><span class="big">A</span> painting in this technique consists of various interconnected parts, each adding
            depth and new elements to the overall composition. Each work is one-of-a-kind, as it is created intuitively
            without a predetermined plan. If you are interested in commissioning a work in the "Multilayered Veil"
            technique, please leave your email and a message below. You will be contacted via email.</p>


        <div class="slider-wrapper">
            <div class="white-block"></div>
            <div class="text-container">
                <div class="text-slide active"><span class="big">T</span>he first part depicts a bull adorned with an
                    intricate decorative mask, with a striking red accent that emphasizes its power and enigma. The
                    surrounding figures are ghostly, as if hovering on the edge of dream and reality. Doves fly above
                    the bull, symbolizing peace and spiritual ascension.
                </div>
                <div class="text-slide"><span class="big">T</span>he second part focuses on Cupid, a small boy with a
                    bow, poised to release an arrow. His figure expresses both concentration and tenderness. Behind him
                    unfolds an ethereal landscape, where shapes seem to dissolve into space.
                </div>
                <div class="text-slide"><span class="big">T</span>he third part complements the previous elements with
                    dragons and fantastical creatures, writhing among soft strokes of paint. A rainbow cuts through the
                    mist, symbolizing hope and the promise of harmony after struggle.
                </div>
                <div class="text-slide"><span class="big">T</span>hese three sections, representing parts of a larger
                    painting, intertwine elements of reality and mythology, blending them into a mystical harmony. All
                    three fragments are united by a sense of flowing energy: the bull represents strength, Cupid
                    symbolizes passion.
                </div>
            </div>

            <div class="slider-container">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/assets/img/slide1.jpg" alt="Image 1">
                        </div>
                        <div class="swiper-slide">
                            <img src="/assets/img/slide2.jpg" alt="Image 2">
                        </div>
                        <div class="swiper-slide">
                            <img src="/assets/img/slide4.jpg" alt="Image 2">
                        </div>
                        <div class="swiper-slide">
                            <img src="/assets/img/slide3.jpg" alt="Image 2">
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>

        <div class="callback-form">
            <form class="form black">
                <div class="input">
                    <input type="email" name="mail" placeholder="YOUR EMAIL">
                    <button type="button" class="next-btn">next.</button>
                </div>
                <div class="hidden_input">
                    <textarea name="message" placeholder="MESSAGE:"></textarea>
                </div>
                <p>
                    You can order a painting in her author's style right now!
                </p>
            </form>
        </div>
    </div>
</div>

<div id="contacts" class="container">
    <h1>Contacts</h1>
    <div class="contacts">
        <div class="contact">
            <img src="/assets/img/patterns/c1.png" class="pc" alt="">
            <img src="/assets/img/patterns/c1_mobile.png" class="mobile" alt="">

            <div class="contact-data email">
                <a href="mailto:elena.salova@gmail.com">elena.salova@gmail.com</a>
            </div>
        </div>
        <div class="contact">
            <img src="/assets/img/patterns/c2.png" class="pc" alt="">
            <img src="/assets/img/patterns/c2_mobile.png" class="mobile" alt="">

            <div class="contact-data adress">
                <a href="tel:34627327237">+34 627 327 237</a>
                <span>Spain, Sevilla Pl. del Cabildo, 41001</span>
            </div>

        </div>
        <div class="contact">
            <img src="/assets/img/patterns/c3.png" class="pc" alt="">
            <img src="/assets/img/patterns/c3_mobile.png" class="mobile" alt="">

            <div class="contact-data">
                <div class="underline-btn-container">
                    <a target="_blank" href="https://www.instagram.com/elena.art.studio.es/"
                       class="underline-btn slideIn">my instagram.</a>
                    <a target="_blank" href="#" class="underline-btn slideIn">my platforms.</a>
                </div>
                <div class="underline-btn-container">
                    <a target="_blank" href="https://t.me/Elenagreatart47" class="underline-btn slideIn">my telegram.</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="callbackFormContainer">
<div id="callbackForm" class="container">
    <h1>
        ELENA
        <span>SALOVA</span>
    </h1>
    <div class="callback-form">
        <ul id="callback_form_slinky">
            <li class="layer" data-depth="0.11">
                <svg width="2146" height="619" viewBox="0 0 2146 619" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.544444"
                          d="M2143.96 50.4013C1688.31 -31.1283 642.628 -71.4514 105.149 419.494C-432.331 910.438 1240.41 377.992 2143.96 50.4013Z"
                          stroke="#B4B4B4"/>
                </svg>
            </li>
            <li class="layer" data-depth="0.0404">
                <svg width="2147" height="619" viewBox="0 0 2147 619" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.466667"
                          d="M2144.21 50.495C1688.56 -31.0346 642.883 -71.3576 105.403 419.587C-432.077 910.532 1240.66 378.086 2144.21 50.495Z"
                          stroke="#417E78"/>
                </svg>
            </li>
            <li class="layer" data-depth="-0.0404">
                <svg width="2147" height="620" viewBox="0 0 2147 620" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.388889"
                          d="M2144.47 50.5888C1688.82 -30.9408 643.138 -71.2639 105.658 419.681C-431.822 910.626 1240.92 378.18 2144.47 50.5888Z"
                          stroke="#5E94AF"/>
                </svg>
            </li>
        </ul>
        <form class="form black">
            <div class="input">
                <input type="email" name="mail" placeholder="YOUR EMAIL">
                <button type="button" class="next-btn">next.</button>
            </div>
            <div class="hidden_input">
                <textarea name="message" placeholder="MESSAGE:"></textarea>
            </div>
            <p>
                It's time for art, order something you've been wanting for a long time.
            </p>
        </form>
    </div>
</div>
</div>
<footer>
    <nav>
        <a href="#collections" class="link">collections.</a>
        <a href="#gallery" class="link">gallery.</a>
        <a href="#drawForMe" class="link">draw for me.</a>
        <a href="#contacts" class="link">contacts.</a>
    </nav>
    <div class="footer_body">
        <div class="footer_texts">
            <a href="privacy.html" target="_blank">Privacy</a>
            <span>All Rights Reserved</span>
            <span>2024</span>
        </div>
        <div class="footer_texts">
            <span>Designed and Developed by <br>Pavlo Chistiakov  and  Andrii Bondarenko</span>
            <button>sirius</button>
        </div>
    </div>
</footer>


<div class="filter_popup closed" id="filterPopupMobile">
    <div class="popup_header">
        <h2>FILTER</h2>
        <button class="close-button" id="closeButtonMobile">
            <span></span>
            <span></span>
        </button>
    </div>
    <div class="filter_categories">
        <label class="custom-checkbox">
            <input type="checkbox" class="filter-checkbox-mobile" value="sold.">
            <span class="checkmark"></span>
            <p>sold.</p>
        </label>
        <label class="custom-checkbox">
            <input type="checkbox" class="filter-checkbox-mobile" value="available.">
            <span class="checkmark"></span>
            <p>available.</p>
        </label>
        <label class="custom-checkbox">
            <input type="checkbox" class="filter-checkbox-mobile" value="in private collection.">
            <span class="checkmark"></span>
            <p>in private collection.</p>
        </label>
        <label class="custom-checkbox">
            <input type="checkbox" class="filter-checkbox-mobile" value="sold in auction.">
            <span class="checkmark"></span>
            <p>sold in auction.</p>
        </label>
    </div>
</div>

<div class="filter_popup menu_popup closed" id="menuPopup">
    <div class="popup_header menu_popup">
        <button class="close-button" id="closeMenuButton">
            <span></span>
            <span></span>
        </button>
    </div>
    <nav>
        <a href="#collections" class="link">collections.</a>
        <a href="#gallery" class="link">gallery.</a>
        <a href="#drawForMe" class="link">draw for me.</a>
        <a href="#contacts" class="link">contacts.</a>
    </nav>
</div>

<div id="galleryImagePopup">
    <div class="galleryImagePopup_wrapper">
        <div class="galleryImagePopup_container">
            <img src="" alt="">
            <button class="close-button" id="closeGalleryPopupButton">
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</div>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/dat.gui.min.js"></script>
<script src="assets/js/jquery.parallax.js"></script>
<script src="assets/js/preloader.js"></script>
<script src="assets/js/parallax.js"></script>
<script src="assets/js/collections.js"></script>
<script src="assets/js/slideIn.js"></script>
<script src="assets/js/filters.js"></script>
<script src="assets/js/menu.js"></script>
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/swiper.js"></script>
<script src="assets/js/dots.js"></script>
<script src="assets/js/jquery-ui.js"></script>
<script src="assets/js/mailForm.js"></script>
</body>
</html>