@extends('layouts.static_app')


@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/index"><img height="80px" width="80px" src="{{ URL::asset('images/logo_nav.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="/index">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="/index/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/index/contact">contact</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->


    <!-- page title & breadcrumbs start -->
    <div class="testimonials-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>testimonials</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/index">home</a></li>
                        <li>।</li>
                        <li>Testimonials</li>
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

    <!--testimonials-area start-->
    <div class="about-area pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Success Stories</h3>
                        <p>You're only one workout away from a good mood</p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">

                <!--image before-after start-->
                <div class="col-sm-8 offset-sm-2 col-xs-12 offset-xs-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>Before</h3>
                                </div>
                                <div class="opening-img">
                                    <img src="{{ URL::asset('images/about/1.jpg') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>After</h3>
                                </div>
                                <div class="opening-img">
                                    <img src="{{ URL::asset('images/about/1.jpg') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="pad30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur culpa dicta, distinctio exercitationem fugiat ipsam itaque labore laborum libero minus molestiae, nulla odio possimus, reprehenderit tempora vel? Fuga, sed.</p>
                <!--image before-after end-->

                <!--image before-after start-->
                <div class="col-sm-8 offset-sm-2 col-xs-12 offset-xs-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>Before</h3>
                                </div>
                                <div class="opening-img">
                                    <img src="{{ URL::asset('images/about/1.jpg') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>After</h3>
                                </div>
                                <div class="opening-img">
                                    <img src="{{ URL::asset('images/about/1.jpg') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="pad30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur culpa dicta, distinctio exercitationem fugiat ipsam itaque labore laborum libero minus molestiae, nulla odio possimus, reprehenderit tempora vel? Fuga, sed.</p>
                <!--image before-after end-->

                <!--image before-after start-->
                <div class="col-sm-8 offset-sm-2 col-xs-12 offset-xs-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>Before</h3>
                                </div>
                                <div class="opening-img">
                                    <img src="{{ URL::asset('images/about/1.jpg') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>After</h3>
                                </div>
                                <div class="opening-img">
                                    <img src="{{ URL::asset('images/about/1.jpg') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="pad30">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur culpa dicta, distinctio exercitationem fugiat ipsam itaque labore laborum libero minus molestiae, nulla odio possimus, reprehenderit tempora vel? Fuga, sed.</p>
                <!--image before-after end-->

            </div>
        </div>
    </div>
    <!-- testimonials-area end-->

@endsection