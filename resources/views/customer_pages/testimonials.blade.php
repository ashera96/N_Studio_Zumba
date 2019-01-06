@extends('layouts.customer_app')


@section('content')

    <!-- /.header start -->
    <style>
        .y{
            width:400px;
            display:inline-block;
            padding:3px 5px;
            text-align:left;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        setInterval(function(){
            $('#x').load('/home #x')
        },15000);
    </script>

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
                            <a class="nav-link " href="/home/schedule">
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
                        {{--<li class="nav-item {{Request::is('home/payment') ? "active" : ""}}">--}}
                            {{--<a class="nav-link" href="/home/payment">payment</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item {{Request::is('home/reports') ? "active" : ""}}">--}}
                            {{--<a class="nav-link" href="/home/reports">reports</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item d-none d-lg-inline">--}}
                            {{--<div class="icon-menu">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        <!--<li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                                </ul>
                            </div>
                        </li>-->
                        <!-- new notification dropdown for testing-->
                        @if(Auth::check())
                            <li id="x" class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i><span class="badge badge-danger" id="count-notification">
                                    {{auth()->user()->unreadNotifications->count()}}
                                </span><span class="caret"></span>
                                </a>
                                <ul id="notifications" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="max-width:1200px;max-height:400px;overflow-x:auto;overflow-y: auto;background-color: black" >
                                    <div class="y">
                                        @if(auth()->user()->notifications->count())
                                            <li style="background-color: #000000"><a style="display: inline-block;color: #51ce45" href="{{route('markAsRead')}}">Mark All As Read</a></li>
                                            @foreach(auth()->user()->unreadNotifications as $notification)
                                                <li style="background-color: #000000">
                                                    <a style="display: inline-block" href="#">
                                                        {{$notification->data['data']}}<br>
                                                        <small>{{$notification->created_at->diffForHumans()}}</small>
                                                    </a>
                                                </li>
                                            @endforeach
                                            @foreach(auth()->user()->readNotifications as $notification)
                                                <li style="background-color: #000000">
                                                    <a style="display: inline-block;color: #b39d7e" href="#">
                                                        {{$notification->data['data']}}<br>
                                                        <small style="color: #b39d7e">{{$notification->created_at->diffForHumans()}}</small>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <a class="dropdown-item" href="#" style="padding-left: 130px">
                                                No Notifications
                                            </a>
                                        @endif
                                    </div>
                                </ul>
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
                        <li><a href="/home">home</a></li>
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
                        <div class="col-lg-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>Before</h3>
                                </div>
                                <div class="opening-img">
                                    <img height="380px" width="320px" src="{{ URL::asset('images/testimonial/2-before.jpg') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>After</h3>
                                </div>
                                <div class="opening-img">
                                    <img height="380px" width="320px" src="{{ URL::asset('images/testimonial/2-after.jpg') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="pad30">I was introduced to N Studio Zumba thanks to a friend of mine. After that I really liked the concept: working out + dancing = lots of fun! Something I never thought it was possible when it comes to working out. I lost so much weight after attending zumba sessions, I made friends and Nilru kept us motivated. I know I have to keep working out so I can achieve my body goal but, what I've done so far it's been so much fun. All this has happened at this amazing place.</p>
                <!--image before-after end-->

                <!--image before-after start-->
                <div class="col-sm-8 offset-sm-2 col-xs-12 offset-xs-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>Before</h3>
                                </div>
                                <div class="opening-img">
                                    <img height="380px" width="320px" src="{{ URL::asset('images/testimonial/1-before.jpg') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>After</h3>
                                </div>
                                <div class="opening-img">
                                    <img height="380px" width="320px" src="{{ URL::asset('images/testimonial/1-after.jpg') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="pad30">I have been doing Zumba for about 6 months at N Studio Zumba. I go as often as I can. Nilru is a really great motivator because you enjoy dancing with her, she inspires you, and is always happy to see you. Her positive energy, talent for dance, welcoming energy and overall sweetness is hard to resist. She is very genuine and caring.  </p>
                <!--image before-after end-->

                <!--image before-after start-->
                <div class="col-sm-8 offset-sm-2 col-xs-12 offset-xs-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>Before</h3>
                                </div>
                                <div class="opening-img">
                                    <img height="380px" width="320px" src="{{ URL::asset('images/testimonial/3-before.jpg') }}" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-opening">
                                <div class="opening-hours text-center">
                                    <h3>After</h3>
                                </div>
                                <div class="opening-img">
                                    <img height="380px" width="320px" src="{{ URL::asset('images/testimonial/3-after.jpg') }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="pad30">Zumba with Nilru has changed my life. Before I started Zumba I was lazy and out of shape. I gained a lot of weight during the first year of college and never lost it. I know a lot of woman can relate to that story!  Until I went to N Studio Zumba, I was battling with stairmasters and treadmills.  Now, I look forward to my daily Zumba Class with a smile. We have fun and burn up to a 1000 calories in an hour. I never thought I would say this but I love looking good!<br><br>Thank You Zumba and Thank You Nilru!</p>
                <!--image before-after end-->

            </div>
        </div>
    </div>
    <!-- testimonials-area end-->

@endsection
