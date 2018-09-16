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
                        <li class="nav-item ">
                            <a class="nav-link " href="/index/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
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
                        <li class="nav-item">
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
    <div class="blog-bg page-head parallax overlay">
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

    <!--about-area start-->
    <div class="about-area pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Welcome to N Studio Zumba</h3>
                        <p>Let Zumba Fitness be your Stress Reliever </p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->



        <div class="container-fluid">

            <div class="row " style="margin-bottom: 20px">
                <div class="col-lg-4 col-md-2">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/p6.png') }}" width="350" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-2">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/p7.png') }}" width="350">
                    </div>
                </div>
                <div class="col-lg-4 col-md-2">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/p8.png') }}" width="350">
                    </div>
                </div>

            </div>




            <div class="row " style="margin-bottom: 20px" >
                <div class="col-lg-4 col-md-3">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/pic9.jpg') }}" width="350" height="300">
                    </div>
                </div>

                <div class="col-lg-4 col-md-3">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/pic7.jpg') }}" width="350" height="300">
                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/pic6.jpg') }}" width="350" height="300">
                    </div>
                </div>
            </div>


            <div class="row " style="margin-bottom: 20px">
                <div class="col-lg-4 col-md-2">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/1.jpg') }}" width="350" height="450" >
                    </div>
                </div>
                <div class="col-lg-4 col-md-2">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/p2.png') }}" width="350" height="450">
                    </div>
                </div>
                <div class="col-lg-4 col-md-2">
                    <div class="opening-img">
                        <img src="{{ URL::asset('images/about/p3.png') }}" width="350" height="450">
                    </div>
                </div>

                <div class="row "></div>


            </div>

        </div>
        </div>
    </div>
    <!-- about-area end-->

@endsection