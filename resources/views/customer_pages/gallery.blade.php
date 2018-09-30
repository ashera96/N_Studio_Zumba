@extends('layouts.customer_app')


@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home"><img src={{ URL::asset('images/logo/nav_logo.png') }}  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{Request::is('home') ? "active" : ""}}">
                            <a class="nav-link " href="/home">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/about') ? "active" : ""}}">
                            <a class="nav-link " href="/home/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/gallery') ? "active" : ""}}">
                            <a class="nav-link " href="/home/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/class_packages') ? "active" : ""}}">
                            <a class="nav-link " href="/home/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/schedule') ? "active" : ""}}">
                            <a class="nav-link " href="/index/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/testimonials') ? "active" : ""}}">
                            <a class="nav-link " href="/home/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/contact') ? "active" : ""}}">
                            <a class="nav-link" href="/home/contact">contact</a>
                        </li>
                        <li class="nav-item {{Request::is('home/payment') ? "active" : ""}}">
                            <a class="nav-link" href="/home/payment">payment</a>
                        </li>
                        <li class="nav-item {{Request::is('home/reports') ? "active" : ""}}">
                            <a class="nav-link" href="/home/reports">reports</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        {{--User name and logout button--}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->

    <!-- page title & breadcrumbs start -->
    <div class="gallery-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Gallery</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/index">home</a></li>
                        <li>।</li>
                        <li>Gallery</li>
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

    <!--gallery-area start-->

    <!--gallery-area end-->


    <!--portfolio area start-->
    <div class="portfolio-area parallax pad90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>workout classes</h3>
                        <p>Physical activity or exercise can improve your health </p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <div class="container-fluid pad30">
            <div class="port-carousel port-zoom">
                <div class="port-bcx primary-overlay">
                    <div class="port-img">
                        <img style="border: 2px" src="{{ URL::asset('images/gallery/1.jpg') }}" alt="gallery img">
                    </div>
                </div>
                <div class="port-bcx primary-overlay">
                    <div class="port-img">
                        <img src="{{ URL::asset('images/gallery/5.jpg') }}" alt="gallery img">
                    </div>
                </div>
                <div class="port-bcx primary-overlay">
                    <div class="port-img">
                        <img src="{{ URL::asset('images/gallery/4.jpg') }}" alt="gallery img">
                    </div>
                </div>
                <div class="port-bcx primary-overlay">
                    <div class="port-img">
                        <img src="{{ URL::asset('images/gallery/12.jpg') }}" alt="gallery img">
                    </div>
                </div>
                <div class="port-bcx primary-overlay">
                    <div class="port-img">
                        <img src="{{ URL::asset('images/gallery/1.jpg') }}" alt="gallery img">
                    </div>
                </div>
                <div class="port-bcx primary-overlay">
                    <div class="port-img">
                        <img src="{{ URL::asset('images/gallery/2.jpg') }}" alt="gallery img">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.port carousel -->
    </div>
    <!--portfolio area end-->

@endsection