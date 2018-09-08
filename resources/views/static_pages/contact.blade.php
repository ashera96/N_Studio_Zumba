<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>N Studio Zumba </title>
    <meta name="author" content="iThemesLab">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/favicon/favicon.ico">
    <link rel="apple-touch-icon" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">

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

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index"><img height="100px" width="100px" src={{ URL::asset('images/logo.png') }}  alt="BEFIT-logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="index">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index/about">
                                about us<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="index/contact">contact</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->
</div>
<!--main container --end-->

<!-- page title & breadcrumbs start -->
<div class="about-bg page-head parallax overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3>Contact Us</h3>
                </div>
            </div>
            <!-- /.colour-service-1-->
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">home</a></li>
                    <li>।</li>
                    <li>contact us</li>

                </ol>
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.page-header -->
<!-- page title & breadcrumbs end -->



<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 form-group"><br>
                            <div class="head-contact" align="left">
                                <h3><span>Contact Us</span></h3><br>
                            </div>


                            <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20  form-control" required="" type="text">
                            <br>
                            <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
                            <br>
                            <input name="subject" placeholder="Enter contact number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
                            <br>

                            <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
                            <br>
                            <div class="alert-msg" style="text-align: left;"></div> <br>
                            <button class="genric-btn primary" style="float: right;">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="contact-details">
                        <div class="head-contact" align="left"><br>
                            <h3><span>Contact Info details</span></h3><br>
                        </div>

                        <h5><span> 176D, Negombo Road, Rilaulla, Kandana</span></h5><br>

                        <h5>0778378162</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End contact-page Area -->



<footer>
    <div class="copyright pad30">
        <h4>Copyright © <span>iThemeslab</span> All Rights Reserved</h4>
    </div>
</footer>

</body>
</html>
