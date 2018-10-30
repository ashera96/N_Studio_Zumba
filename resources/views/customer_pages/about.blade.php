@extends('layouts.customer_app')


@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
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
                        <!--
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                                </ul>
                            </div>
                        </li> -->

                        <!-- new notification dropdown for testing-->
                        @if(Auth::check())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i><span class="badge badge-danger" id="count-notification">
                                    {{auth()->user()->unreadNotifications->count()}}
                                </span><span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="max-width:1200px;max-height:400px;overflow-x:auto;overflow-y: auto;" >
                                    @if(auth()->user()->notifications->count())
                                        @foreach(auth()->user()->notifications as $notification)
                                            <a class="dropdown-item" href="#" style="background-color:#000000">
                                                <b style="color: #4c5054">HealthTip : </b>{{$notification->data['data']}}<br>
                                                <small style="color: #4c5054">{{$notification->created_at->diffForHumans()}}</small>
                                                <?php $notification->markAsRead()?>
                                            </a>
                                        @endforeach
                                    @else
                                        <a class="dropdown-item" href="#">
                                            No Notifications
                                        </a>
                                    @endif
                                </div>
                            </li>
                        @endif
                    <!--end of testing -->

                        {{--User name and logout button start--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        {{--User name and logout button end--}}

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->


    <!-- page title & breadcrumbs start -->
    <div class="about-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>about us</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/home">home</a></li>
                        <li>।</li>
                        <li>About</li>
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
                        <p>Push Harder Than Yesterday If You Want A Better Tomorrow </p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="aboutus-box">
                        <div class="about-desc">
                            <p>"It is not a dance class it is a party! No one is judging you by your dance abilities just have fun and feel the music."</p> <br>
                        </div>
                        <div class="about-benefit">
                            <a href="#"><span><i class="fa fa fa-stop-circle"></i></span>ZIN™ Since</a>
                            <p>February 2018</p>
                        </div>
                        <div class="about-benefit">
                            <a href="#"><span><i class="fa fa fa-stop-circle"></i></span>Location</a>
                            <p>No. 176D, Negombo Road, Rilaulla, Kandana, Gampaha LK</p>
                        </div>
                        <div class="about-benefit">
                            <a href="#"><span><i class="fa fa fa-stop-circle"></i></span>Licensed To Teach</a>
                            <p>Zumba</p>
                        </div>
                        <div class="about-benefit mt50">
                            <h4><p>Hello! I'm Nilru De Silva. I've been a ZIN™ Member since Feb 2018 and I absolutely love teaching Zumba classes. The reason is simple: Every class feels like a party! I am currently licensed to teach Zumba. Come join me, I guarantee you will have a blast! Got questions, don't hesitate to drop me a message!</p></h4>
                            <p>We have been teaching women of all walks of life how to love themselves trough music & dance. That's very powerful and brings us joy and satisfaction. Music and dance helps us connect with people on a different level. It gives us an opportunity to empower them, rejuvenate them, brings them closer to their friends and family while improving their health and happiness. We hope to see you on the dance floor!
                            </p>
                        </div>
                    </div>
                </div>

                <!--Side Image Start-->
                <div class="col-lg-4 col-md-12">
                    <div class="about-opening">
                        <div class="opening-hours text-center">
                            <h3>Nilru De Silva</h3>
                        </div>
                        <div class="opening-img">
                            <img src="{{ URL::asset('images/about/1.jpg') }}" >
                        </div>
                    </div>
                </div>
                <!--Side Image End-->

            </div>
        </div>
    </div>
    <!-- about-area end-->

@endsection
