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
    <script src="{{ asset('js/schedule_controlling.js') }}" defer></script>
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
    <div class="schedule-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>SCHEDULE</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/home">home</a></li>
                        <li>।</li>
                        <li>Schedule</li>
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

    @if (session('msgsuccess'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('msgsuccess') }}
        </div>
    @endif
    @if (session('msgfail'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('msgfail') }}
        </div>
    @endif
    @if (session('msgfail2'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('msgfail2') }}
        </div>
    @endif

    <!--schedule-area start-->
    <div class="schedule-area parallax pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>class schedule</h3>
                        <p>make yourself stronger than your excuses</p>
                        @isset($selected_package_name)
                            <h4 style="color: deeppink">Selected Package: {{$selected_package_name}} </h4>
                        @endisset
                        <p>You can select schedules from next month onwards</p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <br><br>

            {{--Schdeule Timetable Start--}}
            <div class="container-fluid">
                <form method="POST" action="{{ url('home/submit_schedules') }}"  aria-label="{{ __('Submit_Schedules') }}">
                    {{csrf_field()}}
                    <div class="row">
                        {{--<div col-md-1>--}}
                        {{--</div>--}}
                        <div class="col-lg-2 offset-lg-1 offset-md-0">
                            <h3 class="text-uppercase text-center pad30">Monday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_monday)>0)
                                        <div class="schdl-box1" id="sb1">
                                            <h5>1</h5>
                                            <h5>{{$schedule_monday[0]->type}}</h5>
                                            <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                        </div>
                                        <div class="schdl-box1" id="sb2">
                                            <h5>2</h5>
                                            <h5>{{$schedule_monday[1]->type}}</h5>
                                            <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Tuesday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_tuesday)>0)
                                        <div class="schdl-box1" id="sb3">
                                            <h5>3</h5>
                                            <h5>{{$schedule_tuesday[2]->type}}</h5>
                                            <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                        </div>
                                        <div class="schdl-box1" id="sb4">
                                            <h5>4</h5>
                                            <h5>{{$schedule_tuesday[3]->type}}</h5>
                                            <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Wednesday</h3>
                            <div id="tabsJustifiedContent" class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_wednesday)>0)
                                        <div class="schdl-box1" id="sb5">
                                            <h5>5</h5>
                                            <h5>{{$schedule_wednesday[4]->type}}</h5>
                                            <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                        </div>
                                        <div class="schdl-box1" id="sb6">
                                            <h5>6</h5>
                                            <h5>{{$schedule_wednesday[5]->type}}</h5>
                                            <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Thursday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_thursday)>0)
                                        <div class="schdl-box1" id="sb7">
                                            <h5>7</h5>
                                            <h5>{{$schedule_thursday[6]->type}}</h5>
                                            <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                        </div>
                                        <div class="schdl-box1" id="sb8">
                                            <h5>8</h5>
                                            <h5>{{$schedule_thursday[7]->type}}</h5>
                                            <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Friday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_friday)>0)
                                        <div class="schdl-box1" id="sb9">
                                            <h5>9</h5>
                                            <h5>{{$schedule_friday[8]->type}}</h5>
                                            <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                        </div>
                                        <div class="schdl-box1" id="sb10">
                                            <h5>10</h5>
                                            <h5>{{$schedule_friday[9]->type}}</h5>
                                            <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--<div col-md-1>--}}
                        {{--</div>--}}
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Saturday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_saturday)>0)
                                        <div class="schdl-box1" id="sb11">
                                            <h5>11</h5>
                                            <h5>{{$schedule_saturday[10]->type}}</h5>
                                            <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Sunday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_sunday)>0)
                                        <div class="schdl-box1" id="sb12">
                                            <h5>12</h5>
                                            <h5>{{$schedule_sunday[11]->type}}</h5>
                                            <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>
                </form>
            </div>

            {{--Schdeule Timetable End--}}

        </div>
        <!-- /.container -->
    </div>
    <!--schedule-area end-->

@endsection
