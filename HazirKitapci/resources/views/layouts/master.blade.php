<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title>
    <!-- @vite(['resources/js/app.js', 'resources/css/app.scss']) -->
    <meta name="description" content="@yield('page_description')">
    <!-- @yield('page_head_css') -->
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="/css/nice-select.css">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="/css/icomoon.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    @include('layouts.header1')

    @yield('content')

    
    @include('layouts.footer1')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
        var path = window.location.pathname;
        $(`.nav-link[href="${path}"]`).addClass('active');
    </script>

    <!--<< All JS Plugins >>-->
    <script src="/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="/js/wow.min.js"></script>
    <!-- Gsap -->
    <script src="/js/gsap.min.js"></script>
    <!--<< Main.js >>-->
    <script src="/js/main.js"></script>

</body>

</html>