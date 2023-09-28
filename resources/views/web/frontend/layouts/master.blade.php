<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fables">
    <meta name="author" content="Enterprise Development">
    <link rel="shortcut icon" href={{ asset("assets/custom/images/shortcut.png") }}>

    <title> LEXJOE </title>

    <!-- animate.css-->
    <link href={{ asset("assets/vendor/animate.css-master/animate.min.css") }} rel="stylesheet">
    <!-- Load Screen -->
    <link href={{ asset("assets/vendor/loadscreen/css/spinkit.css") }} rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- Font Awesome 5 -->
    <link href={{ asset("assets/vendor/fontawesome/css/fontawesome-all.min.css") }} rel="stylesheet">
    <!-- Fables Icons -->
    <link href={{ asset("assets/custom/css/fables-icons.css") }}rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href={{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/bootstrap/css/bootstrap-4-navbar.css") }} rel="stylesheet">
    <!-- portfolio filter gallery -->
    <link href={{ asset("assets/vendor/portfolio-filter-gallery/portfolio-filter-gallery.css") }} rel="stylesheet">
    <!-- FANCY BOX -->
    <link href={{ asset("assets/vendor/fancybox-master/jquery.fancybox.min.css") }} rel="stylesheet">
    <!-- RANGE SLIDER -->
    <link href={{ asset("assets/vendor/range-slider/range-slider.css") }} rel="stylesheet">
    <!-- OWL CAROUSEL  -->
    <link href={{ asset("assets/vendor/owlcarousel/owl.carousel.min.css") }} rel="stylesheet">
    <link href={{ asset("assets/vendor/owlcarousel/owl.theme.default.min.css") }} rel="stylesheet">
    <!-- FABLES CUSTOM CSS FILE -->
    <link href={{ asset("assets/custom/css/custom.css") }} rel="stylesheet">
    <!-- FABLES CUSTOM CSS RESPONSIVE FILE -->
    <link href={{ asset("assets/custom/css/custom-responsive.css") }} rel="stylesheet">

</head>
<body>

    <!-- Navigation Header -->
    @include('web.frontend.layouts.header')

    @yield('about')
    @yield('contact')
    @yield('blog')
    @yield('404')
    @yield('blog-details')
    @yield('testimonials')
    @yield('hotels-list')
    @yield('login')
    @yield('register')
    @yield('admin-login')

    <!-- Footer -->
    @include('web.frontend.layouts.footer')

    <script src={{ asset("assets/vendor/jquery/jquery-3.3.1.min.js") }}></script>
    <script src={{ asset("assets/vendor/loadscreen/js/ju-loading-screen.js") }}></script>
    <script src={{ asset("assets/vendor/jquery-circle-progress/circle-progress.min.js") }}></script>
    <script src={{ asset("assets/vendor/popper/popper.min.js") }}></script>
    <script src={{ asset("assets/vendor/jQuery.countdown-master/jquery.countdown.min.js") }}></script>
    <script src={{ asset("assets/vendor/timeline/jquery.timelify.js") }}></script>
    <script src={{ asset("assets/vendor/bootstrap/js/bootstrap.min.js") }}></script>
    <script src={{ asset("assets/vendor/bootstrap/js/bootstrap-4-navbar.js") }}></script>
    <script src={{ asset("assets/vendor/WOW-master/dist/wow.min.js") }}></script>
    <script src={{ asset("assets/vendor/owlcarousel/owl.carousel.min.js") }}></script>
    <script src={{ asset("assets/custom/js/jquery-data-to.js") }}></script>
    <script src={{ asset("assets/vendor/jquery-circle-progress/circle.js") }}></script>
    <script src={{ asset("assets/vendor/portfolio-filter-gallery/jquery.isotope.min.js") }}></script>
    <script src={{ asset("assets/vendor/portfolio-filter-gallery/portfolio-filter-gallery.js") }}></script>
    <script src={{ asset("assets/vendor/fancybox-master/jquery.fancybox.min.js") }}></script>
    <script src={{ asset("assets/custom/js/custom.js") }}></script>
    <script src={{ asset("assets/vendor/video-background/jquery.mb.YTPlayer.js") }}></script>
    <script>$(".player").mb_YTPlayer();</script>

</body>

</html>
