<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/stylesheet/swiper-bundle.min.css" />

    <style>
        .swiper {
            width: 400px;
            height: 400px;
        }

        img {
            max-width: 80%;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="assets/images/erp.png" alt="">
            </div>
            <div class="swiper-slide">
                <img src="assets/images/pos.png" alt="">
            </div>
            <div class="swiper-slide">
                <img src="assets/images/fd.png" alt="">

            </div>
            <div class="swiper-slide">
                <img src="assets/images/park.png" alt="">
            </div>
            ...
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>

    <script src="assets/javascript/swiper-bundle.min.js"></script>

    <script type="module">
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            effect: 'fade',

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },

            centeredSlides: true,
        });
    </script>

    <!-- Demo styles -->
    <style>
        html,
        /* body {
            position: relative;
            height: 100%;
        } */

        /* body {
            background: #eee;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #000;
            margin: 0;
            padding: 0;
        } */

        .swiper {
            width: 60%;
            height: 60%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>

</body>

</html>