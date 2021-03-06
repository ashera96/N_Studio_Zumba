<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>N Studio Zumba</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon/logo144x144.png') }}">
    <link rel="apple-touch-icon" href="{{ URL::asset('favicon/logo_57x57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('favicon/logo_72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('favicon/logo114x114.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('favicon/logo144x144.png') }}">

    <!--All Css Here-->

    <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <!--revolution slider-->
    <link rel="stylesheet" href="{{ URL::asset('css/settings.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/navigation.css') }}">
    <!--Font-Awesome Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <!--flat-icon-->
    <link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
    <!--Owl-Carousel Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
    <!--Animate Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
    <!--Animate Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
    <!--Jquery Ui Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}">
    <!--Style Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <!--Responsive Css-->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!--Modernizr Css-->
    <script src="{{ URL::asset('js/modernizr-2.8.3.min.js') }}"></script>




    {{--<!--[if lt IE 9]>--}}
    {{--<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>--}}
    {{--<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}

</head>
<body>

<!--main-container-->
<div class="main-container">
    @yield('content')
</div>
<!--main-container-->


<!--Search Popup-->
<div id="search-popup" class="search-popup">
    <div class="close-search theme-btn"><span class="fa fa-close"></span></div>
    <div class="popup-inner">

        <div class="search-form">
            <form method="post" action="index">
                <div class="form-group">
                    <fieldset>
                        <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required>
                        <input type="submit" value="Search" class="theme-btn">
                    </fieldset>
                </div>
            </form>

            <br>
            <h3>Recent Search Keywords</h3>
        </div>
    </div>
</div>
<!--End Search Popup-->


<!--All Js Here-->
<!-- jquery latest version -->
<script data-cfasync="false" src="{{ URL::asset('js/email-decode.min.js') }}"></script><script src="{{ URL::asset('js/jquery-3.2.1.min.js') }}"></script>
<!--Migrate Js-->
<script src="{{ URL::asset('js/jquery-migrate.js') }}"></script>
<!--Popper Js-->
<script src="{{ URL::asset('js/popper-1.12.3.min.js') }}"></script>
<!--Bootstrap Js-->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<!--Owl-Carousel Js-->
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
<!--counter Js-->
<script src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ URL::asset('js/waypoints-jquery.js') }}"></script>
<!--Isotop Js-->
<script src="{{ URL::asset('js/isotope.pkgd.min.js') }}"></script>

<!-- revolution slider js files start -->
<script src="{{ URL::asset('js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.min.js') }}"></script>

<script src="{{ URL::asset('js/revolution.extension.actions.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.migration.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ URL::asset('js/revolution.extension.video.min.js') }}"></script>
<!-- revolution slider js files end -->


@yield('js_styling')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>


<!--magnific popup Js-->
<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
<!--scrollUp js-->
<script src="{{ URL::asset('js/jquery.scrollUp.js') }}"></script>
<!--Jquery Ui Js-->
<script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
<!--Wow Js-->
<script src="{{ URL::asset('js/wow.min.js') }}"></script>

<!-- template main js file -->
<script src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>
