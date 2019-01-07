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

        .stripe-button-el{
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        setInterval(function(){
            $('#x').load('/home/about #x')
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
                    <li class="nav-item {{Request::is('home/payment') ? "active" : ""}}">
                    <a class="nav-link" href="/home/payment">payment</a>
                    </li>
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
    <div class="services-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Monthly Payment</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/home">home</a></li>
                        <li>।</li>
                        <li>Payment</li>
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

    <!--payment-area start-->
    <div class="about-area pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">

                        {{--Flash message for success in payment start--}}
                        @if (session('msg_success'))
                            <div class="alert alert-success ml90 fs-15" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('msg_success') }}
                            </div>
                        @endif
                        {{--Flash message for success in payment end--}}

                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Settle Monthly Payment</h3>
                        <p>Monthly payment for the month of {{ now()->format('F') }}    </p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row pad60 justify-content-center">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card shadow-lg pl-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><strong>Month</strong></p>
                                </div>
                                <div class="col-sm-6">
                                    <p>{{now()->format('F')}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><strong>Package</strong></p>
                                </div>
                                <div class="col-sm-6">
                                    <p>{{$user_payment[0]->name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><strong>Price</strong></p>
                                </div>
                                <div class="col-sm-6">
                                    <p>{{$user_payment[0]->amount}}</p>
                                </div>
                            </div>

                            <div class="container row justify-content-center">
                                @if($user_payment[0]->payment_status == 0)

                                    {{--Code segment for the stripe payment start--}}
                                    <form action="/home/charge" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="amount" value="{{$user_payment[0]->amount}}">
                                        <script
                                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                data-key="{{ env('STRIPE_PUB_KEY') }}"
                                                data-amount=""
                                                data-name="Monthly Payment"
                                                data-description="Monthly payment for class package"
                                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                data-locale="auto"
                                                data-currency="usd">
                                        </script>
                                        <button type="submit" class="btn btn-primary active">Pay</button>
                                    </form>
                                    {{--Code segment for the stripe payment end--}}

                                @else
                                    <a href="#"><button class="btn btn-success disabled" >PAID</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- payment-area end-->

@endsection
