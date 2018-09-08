@extends('layouts.static_app')


@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index"><img height="80px" width="80px" src={{ URL::asset('images/logo_nav.png') }}  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="/N_Studio_Zumba/public/index">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/N_Studio_Zumba/public/index/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/N_Studio_Zumba/public/index/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="/N_Studio_Zumba/public/index/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/N_Studio_Zumba/public/index/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/N_Studio_Zumba/public/index/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/N_Studio_Zumba/public/index/contact">contact</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->



    <!-- page title & breadcrumbs start -->
    <div class="pricing-plan-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>class packages</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/N_Studio_Zumba/public/index">home</a></li>
                        <li>।</li>
                        <li>Classes</li>
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

    <!--pricing area start-->
    <div class="pricing-area text-center pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                        </div>
                        <h3>packages and pricing plans</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="price-box">
                        <div class="price-empty">
                        </div>
                        <div class="price-quantity">
                            <div class="qnty-box">
                                <div class="box-element">
                                    <h5>£85.00</h5>
                                    <p>Quarterly</p>
                                </div>
                            </div>
                            <div class="price-dtl">
                                <ul>
                                    <li class="first-child">3 Days of the week</li>
                                    <li>professional trainer</li>
                                    <li>Bodybuilding</li>
                                    <li>Free Hand</li>
                                    <li>Fitness & Boxing</li>
                                </ul>
                                <div class="price-btn bttn">
                                    <button type="submit" class="btn btn-primary">Buy now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="price-box active">
                        <div class="price-empty">
                        </div>
                        <div class="price-quantity">
                            <div class="qnty-box">
                                <div class="box-element">
                                    <h5>£130.00</h5>
                                    <p>half yearly</p>
                                </div>
                            </div>
                            <div class="price-dtl">
                                <ul>
                                    <li class="first-child">3 Days of the week</li>
                                    <li>professional trainer</li>
                                    <li>Bodybuilding</li>
                                    <li>Free Hand</li>
                                    <li>Fitness & Boxing</li>
                                </ul>
                                <div class="price-btn bttn">
                                    <button type="submit" class="btn btn-primary">Buy now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="price-box">
                        <div class="price-empty">
                        </div>
                        <div class="price-quantity">
                            <div class="qnty-box">
                                <div class="box-element">
                                    <h5>£85.00</h5>
                                    <p>£210.00</p>
                                </div>
                            </div>
                            <div class="price-dtl">
                                <ul>
                                    <li class="first-child">3 Days of the week</li>
                                    <li>professional trainer</li>
                                    <li>Bodybuilding</li>
                                    <li>Free Hand</li>
                                    <li>Fitness & Boxing</li>
                                </ul>
                                <div class="price-btn bttn">
                                    <button type="submit" class="btn btn-primary">Buy now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!--pricing area end-->


@endsection






