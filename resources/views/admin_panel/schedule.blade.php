@extends('layouts.dashboard_app')



@section('content')


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
                        <li class="nav-item">
                            <a class="nav-link " href="/index/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/dashboard/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="/dashboard/schedule">
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
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('login') }}">login</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>





    <link href="css/dash-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



    <body>







    <div class="cntn"></div>


    <header class="header">
        <nav class="navbar  navbar-dark">
            <div class="container-fluid">

                <!--  <div class="row"> -->

                <div class="navbar-header">




                    <div class=" col-md-2 col-xs-1">
                        <nav class=" menu-sidebar d-none d-lg-block bg-dark  " >
                            <!-- col-md-4 d-none d-md-block bg-dark sidebar-->
                            <div   class="collapse navbar-collapse" id="navbarNavDropdown">

                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/dashboard">
                                            <span data-feather="home"></span>
                                            DASHBOARD <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="/admin/receptionist">
                                            <span data-feather="user"></span>
                                            RECEPTIONIST
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="/admin/customers">
                                            <span data-feather="users"></span>
                                            CUSTOMERS
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">
                                            <span data-feather="bell"></span>
                                            NOTIFICATIONS
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">
                                            <span data-feather="dollar-sign"></span>
                                            PAYMENTS
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link disabled" href="#">
                                            <span data-feather="file-text"></span>
                                            REPORTS
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <!--schedule-area start-->
                    <div class="schedule-area parallax pad90">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-center">
                                        <div class="title-bar full-width mb20">
                                            <img src="{{ URL::asset('images/logo/ttl-bar2.png') }}" alt="title-img">
                                        </div>
                                        <h3 style="color: #FFFFFF" >class schedule</h3>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            {{--Schdeule Timetable Start--}}
                            <div class="container-fluid">
                                <div class="row">
                                    {{--<div col-md-1>--}}
                                    {{--</div>--}}
                                    <div class="col-lg-2 offset-lg-1 offset-md-0">
                                        <h3 class="text-uppercase text-center pad30">Monday</h3>
                                        <div class="tab-content1">
                                            <div class="tab-pane1 fade active show">
                                                @if(count($schedule_monday)>0)
                                                    @foreach($schedule_monday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 class="text-uppercase text-center pad30">Tuesday</h3>
                                        <div class="tab-content1">
                                            <div class="tab-pane1 fade active show">
                                                @if(count($schedule_tuesday)>0)
                                                    @foreach($schedule_tuesday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 class="text-uppercase text-center pad30">Wednesday</h3>
                                        <div id="tabsJustifiedContent" class="tab-content1">
                                            <div class="tab-pane1 fade active show">
                                                @if(count($schedule_wednesday)>0)
                                                    @foreach($schedule_wednesday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 class="text-uppercase text-center pad30">Thursday</h3>
                                        <div class="tab-content1">
                                            <div class="tab-pane1 fade active show">
                                                @if(count($schedule_thursday)>0)
                                                    @foreach($schedule_thursday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 class="text-uppercase text-center pad30">Friday</h3>
                                        <div class="tab-content1">
                                            <div class="tab-pane1 fade active show">
                                                @if(count($schedule_friday)>0)
                                                    @foreach($schedule_friday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
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
                                                    @foreach($schedule_saturday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 class="text-uppercase text-center pad30">Sunday</h3>
                                        <div class="tab-content1">
                                            <div class="tab-pane1 fade active show">
                                                @if(count($schedule_sunday)>0)
                                                    @foreach($schedule_sunday as $schedule)
                                                        <div class="schdl-box1">
                                                            <h5>{{$schedule->type}}</h5>
                                                            <p class="mb-0">{{$schedule->time_slot}}</p>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                    </div>
                                </div>
                            </div>

                            {{--Schdeule Timetable End--}}

                        </div>
                        <!-- /.container -->
                    </div>
                    <!--schedule-area end-->
                </div>
            </div>
        </nav>

    </header>