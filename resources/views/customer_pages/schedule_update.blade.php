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
    <script src="{{ asset('js/schedule_controlling_update.js') }}" defer></script>
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
                        <li class="nav-item active {{Request::is('home/schedule') ? "active" : ""}}">
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
                        <h3>UPDATE SCHEDULE</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/home">home</a></li>
                        <li>।</li>
                        <li>Update Schedule</li>
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
                        <h3>update class schedules</h3>
                        <p>make yourself stronger than your excuses</p>
                        <h4 style="color: deeppink">Selected Package: {{$selected_package_name}} </h4>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            {{--Schdeule Timetable Start--}}
            <div class="container-fluid">
                <form method="POST" action="{{ url('home/update_schedule') }}"  aria-label="{{ __('Submit_Schedules') }}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="row">
                        {{--<div col-md-1>--}}
                        {{--</div>--}}
                        <div class="col-lg-2 offset-lg-1 offset-md-0">
                            <h3 class="text-uppercase text-center pad30">Monday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_monday)>0)
                                        @if($counter1->counter < $schedule_limit->client_limit && !in_array(1,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>1</h5>
                                                <h5>{{$schedule_monday[0]->type}}</h5>
                                                <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                                <label style="color: black" id="b1">Book Now</label> <input type="checkbox" id="Checkbox1" name="Checkbox[]" value="1" onclick="f1()" {{in_array("1",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter1->counter == $schedule_limit->client_limit && in_array(1,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>1</h5>
                                                <h5>{{$schedule_monday[0]->type}}</h5>
                                                <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                                <label style="color: black" id="b1">Filled</label> <input type="checkbox" id="Checkbox1" name="Checkbox[]" value="1" onclick="f1()" {{in_array("1",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter1->counter < $schedule_limit->client_limit && in_array(1,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>1</h5>
                                                <h5>{{$schedule_monday[0]->type}}</h5>
                                                <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                                <label style="color: black" id="b1">Booked</label> <input type="checkbox" id="Checkbox1" name="Checkbox[]" value="1" onclick="f1()" {{in_array("1",$Checkbox)?"checked":""}}>
                                            </div>
                                        @else
                                            <div class="schdl-box1">
                                                <h5>1</h5>
                                                <h5>{{$schedule_monday[0]->type}}</h5>
                                                <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                                <label style="color: black" id="b1">Filled</label>
                                            </div>
                                        @endif

                                        @if($counter2->counter < $schedule_limit->client_limit && !in_array(2,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>2</h5>
                                                <h5>{{$schedule_monday[1]->type}}</h5>
                                                <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                                <label style="color: black" id="b2">Book Now</label> <input type="checkbox" id="Checkbox2" name="Checkbox[]" value="2" onclick="f2()"  {{in_array("2",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter2->counter == $schedule_limit->client_limit && in_array(2,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>2</h5>
                                                    <h5>{{$schedule_monday[1]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                                    <label style="color: black" id="b2">Filled</label> <input type="checkbox" id="Checkbox2" name="Checkbox[]" value="2" onclick="f2()"  {{in_array("2",$Checkbox)?"checked":""}}>
                                                </div>
                                        @elseif($counter2->counter < $schedule_limit->client_limit && in_array(2,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>2</h5>
                                                    <h5>{{$schedule_monday[1]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                                    <label style="color: black" id="b2">Booked</label> <input type="checkbox" id="Checkbox2" name="Checkbox[]" value="2" onclick="f2()"  {{in_array("2",$Checkbox)?"checked":""}}>
                                                </div>
                                         @else
                                                <div class="schdl-box1">
                                                    <h5>2</h5>
                                                    <h5>{{$schedule_monday[1]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                                    <label style="color: black" id="b2">Filled</label>
                                                </div>
                                         @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Tuesday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_tuesday)>0)
                                        @if($counter3->counter < $schedule_limit->client_limit && !in_array(3,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>3</h5>
                                                <h5>{{$schedule_tuesday[2]->type}}</h5>
                                                <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                                <label style="color: black" id="b3">Book Now</label> <input type="checkbox" id="Checkbox3" name="Checkbox[]" value="3" onclick="f3()"  {{in_array("3",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter3->counter == $schedule_limit->client_limit && in_array(3,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>3</h5>
                                                <h5>{{$schedule_tuesday[2]->type}}</h5>
                                                <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                                <label style="color: black" id="b3">Filled</label> <input type="checkbox" id="Checkbox3" name="Checkbox[]" value="3" onclick="f3()"  {{in_array("3",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter3->counter < $schedule_limit->client_limit && in_array(3,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>3</h5>
                                                <h5>{{$schedule_tuesday[2]->type}}</h5>
                                                <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                                <label style="color: black" id="b3">Booked</label> <input type="checkbox" id="Checkbox3" name="Checkbox[]" value="3" onclick="f3()"  {{in_array("3",$Checkbox)?"checked":""}}>
                                            </div>
                                        @else
                                            <div class="schdl-box1">
                                                <h5>3</h5>
                                                <h5>{{$schedule_tuesday[2]->type}}</h5>
                                                <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                                <label style="color: black" id="b3">Filled</label>
                                            </div>
                                        @endif

                                            @if($counter4->counter < $schedule_limit->client_limit && !in_array(4,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>4</h5>
                                                <h5>{{$schedule_tuesday[3]->type}}</h5>
                                                <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                                <label style="color: black" id="b4">Book Now</label> <input type="checkbox" id="Checkbox4" name="Checkbox[]" value="4" onclick="f4()"  {{in_array("4",$Checkbox)?"checked":""}}>
                                            </div>
                                            @elseif($counter4->counter == $schedule_limit->client_limit && in_array(4,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>4</h5>
                                                    <h5>{{$schedule_tuesday[3]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                                    <label style="color: black" id="b4">Filled</label> <input type="checkbox" id="Checkbox4" name="Checkbox[]" value="4" onclick="f4()"  {{in_array("4",$Checkbox)?"checked":""}}>
                                                </div>
                                            @elseif($counter4->counter < $schedule_limit->client_limit && in_array(4,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>4</h5>
                                                    <h5>{{$schedule_tuesday[3]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                                    <label style="color: black" id="b4">Booked</label> <input type="checkbox" id="Checkbox4" name="Checkbox[]" value="4" onclick="f4()"  {{in_array("4",$Checkbox)?"checked":""}}>
                                                </div>
                                            @else
                                                <div class="schdl-box1">
                                                    <h5>4</h5>
                                                    <h5>{{$schedule_tuesday[3]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                                    <label style="color: black" id="b4">Filled</label>
                                                </div>
                                            @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Wednesday</h3>
                            <div id="tabsJustifiedContent" class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_wednesday)>0)
                                        @if($counter5->counter < $schedule_limit->client_limit && !in_array(5,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>5</h5>
                                                <h5>{{$schedule_wednesday[4]->type}}</h5>
                                                <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                                <label style="color: black" id="b5">Book Now</label> <input type="checkbox" id="Checkbox5" name="Checkbox[]" value="5" onclick="f5()"  {{in_array("5",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter5->counter == $schedule_limit->client_limit && in_array(5,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>5</h5>
                                                <h5>{{$schedule_wednesday[4]->type}}</h5>
                                                <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                                <label style="color: black" id="b5">Filled</label> <input type="checkbox" id="Checkbox5" name="Checkbox[]" value="5" onclick="f5()"  {{in_array("5",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter5->counter < $schedule_limit->client_limit && in_array(5,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>5</h5>
                                                <h5>{{$schedule_wednesday[4]->type}}</h5>
                                                <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                                <label style="color: black" id="b5">Booked</label> <input type="checkbox" id="Checkbox5" name="Checkbox[]" value="5" onclick="f5()"  {{in_array("5",$Checkbox)?"checked":""}}>
                                            </div>
                                        @else
                                            <div class="schdl-box1">
                                                <h5>5</h5>
                                                <h5>{{$schedule_wednesday[4]->type}}</h5>
                                                <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                                <label style="color: black" id="b5">Filled</label>
                                            </div>
                                        @endif

                                        @if($counter6->counter < $schedule_limit->client_limit && !in_array(6,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>6</h5>
                                                <h5>{{$schedule_wednesday[5]->type}}</h5>
                                                <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                                <label style="color: black" id="b6">Book Now</label> <input type="checkbox" id="Checkbox6" name="Checkbox[]" value="6" onclick="f6()"  {{in_array("6",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter6->counter == $schedule_limit->client_limit && in_array(6,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>6</h5>
                                                    <h5>{{$schedule_wednesday[5]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                                    <label style="color: black" id="b6">Filled</label> <input type="checkbox" id="Checkbox6" name="Checkbox[]" value="6" onclick="f6()"  {{in_array("6",$Checkbox)?"checked":""}}>
                                                </div>
                                        @elseif($counter6->counter < $schedule_limit->client_limit && in_array(6,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>6</h5>
                                                    <h5>{{$schedule_wednesday[5]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                                    <label style="color: black" id="b6">Booked</label> <input type="checkbox" id="Checkbox6" name="Checkbox[]" value="6" onclick="f6()"  {{in_array("6",$Checkbox)?"checked":""}}>
                                                </div>
                                        @else
                                                <div class="schdl-box1">
                                                    <h5>6</h5>
                                                    <h5>{{$schedule_wednesday[5]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                                    <label style="color: black" id="b6">Filled</label>
                                                </div>

                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Thursday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_thursday)>0)
                                        @if($counter7->counter < $schedule_limit->client_limit && !in_array(7,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>7</h5>
                                                <h5>{{$schedule_thursday[6]->type}}</h5>
                                                <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                                <label style="color: black" id="b7">Book Now</label> <input type="checkbox" id="Checkbox7" name="Checkbox[]" value="7" onclick="f7()"  {{in_array("7",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter7->counter == $schedule_limit->client_limit && in_array(7,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>7</h5>
                                                <h5>{{$schedule_thursday[6]->type}}</h5>
                                                <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                                <label style="color: black" id="b7">Filled</label> <input type="checkbox" id="Checkbox7" name="Checkbox[]" value="7" onclick="f7()"  {{in_array("7",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter7->counter < $schedule_limit->client_limit && in_array(7,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>7</h5>
                                                <h5>{{$schedule_thursday[6]->type}}</h5>
                                                <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                                <label style="color: black" id="b7">Booked</label> <input type="checkbox" id="Checkbox7" name="Checkbox[]" value="7" onclick="f7()"  {{in_array("7",$Checkbox)?"checked":""}}>
                                            </div>
                                        @else
                                            <div class="schdl-box1">
                                                <h5>7</h5>
                                                <h5>{{$schedule_thursday[6]->type}}</h5>
                                                <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                                <label style="color: black" id="b7">Filled</label>
                                            </div>
                                        @endif

                                        @if($counter8->counter < $schedule_limit->client_limit && !in_array(8,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>8</h5>
                                                <h5>{{$schedule_thursday[7]->type}}</h5>
                                                <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                                <label style="color: black" id="b8">Book Now</label> <input type="checkbox" id="Checkbox8" name="Checkbox[]" value="8" onclick="f8()"  {{in_array("8",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter8->counter == $schedule_limit->client_limit && in_array(8,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>8</h5>
                                                    <h5>{{$schedule_thursday[7]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                                    <label style="color: black" id="b8">Filled</label> <input type="checkbox" id="Checkbox8" name="Checkbox[]" value="8" onclick="f8()"  {{in_array("8",$Checkbox)?"checked":""}}>
                                                </div>
                                        @elseif($counter8->counter < $schedule_limit->client_limit && in_array(8,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>8</h5>
                                                    <h5>{{$schedule_thursday[7]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                                    <label style="color: black" id="b8">Booked</label> <input type="checkbox" id="Checkbox8" name="Checkbox[]" value="8" onclick="f8()"  {{in_array("8",$Checkbox)?"checked":""}}>
                                                </div>
                                        @else
                                                <div class="schdl-box1">
                                                    <h5>8</h5>
                                                    <h5>{{$schedule_thursday[7]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                                    <label style="color: black" id="b8">Filled</label>
                                                </div>
                                        @endif

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Friday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_friday)>0)
                                        @if($counter9->counter < $schedule_limit->client_limit && !in_array(9,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>9</h5>
                                                <h5>{{$schedule_friday[8]->type}}</h5>
                                                <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                                <label style="color: black" id="b9">Book Now</label> <input type="checkbox" id="Checkbox9" name="Checkbox[]" value="9" onclick="f9()"  {{in_array("9",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter9->counter == $schedule_limit->client_limit && in_array(9,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>9</h5>
                                                <h5>{{$schedule_friday[8]->type}}</h5>
                                                <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                                <label style="color: black" id="b9">Filled</label> <input type="checkbox" id="Checkbox9" name="Checkbox[]" value="9" onclick="f9()"  {{in_array("9",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter9->counter < $schedule_limit->client_limit && in_array(9,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>9</h5>
                                                <h5>{{$schedule_friday[8]->type}}</h5>
                                                <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                                <label style="color: black" id="b9">Booked</label> <input type="checkbox" id="Checkbox9" name="Checkbox[]" value="9" onclick="f9()"  {{in_array("9",$Checkbox)?"checked":""}}>
                                            </div>
                                        @else
                                            <div class="schdl-box1">
                                                <h5>9</h5>
                                                <h5>{{$schedule_friday[8]->type}}</h5>
                                                <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                                <label style="color: black" id="b9">Filled</label>
                                            </div>
                                        @endif

                                        @if($counter10->counter < $schedule_limit->client_limit && !in_array(10,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>10</h5>
                                                <h5>{{$schedule_friday[9]->type}}</h5>
                                                <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                                <label style="color: black" id="b10">Book Now</label> <input type="checkbox" id="Checkbox10" name="Checkbox[]" value="10"  onclick="f10()"  {{in_array("10",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter10->counter == $schedule_limit->client_limit && in_array(10,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>10</h5>
                                                    <h5>{{$schedule_friday[9]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                                    <label style="color: black" id="b10">Filled</label> <input type="checkbox" id="Checkbox10" name="Checkbox[]" value="10"  onclick="f10()"  {{in_array("10",$Checkbox)?"checked":""}}>
                                                </div>
                                        @elseif($counter10->counter < $schedule_limit->client_limit && in_array(10,$Checkbox))
                                                <div class="schdl-box1">
                                                    <h5>10</h5>
                                                    <h5>{{$schedule_friday[9]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                                    <label style="color: black" id="b10">Booked</label> <input type="checkbox" id="Checkbox10" name="Checkbox[]" value="10"  onclick="f10()"  {{in_array("10",$Checkbox)?"checked":""}}>
                                                </div>
                                        @else
                                                <div class="schdl-box1">
                                                    <h5>10</h5>
                                                    <h5>{{$schedule_friday[9]->type}}</h5>
                                                    <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                                    <label style="color: black" id="b10">Filled</label>
                                                </div>
                                        @endif
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
                                        @if($counter11->counter < $schedule_limit->client_limit && !in_array(11,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>11</h5>
                                                <h5>{{$schedule_saturday[10]->type}}</h5>
                                                <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                                <label style="color: black" id="b11">Book Now</label> <input type="checkbox" id="Checkbox11" name="Checkbox[]" value="11" onclick="f11()"  {{in_array("11",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter11->counter == $schedule_limit->client_limit && in_array(11,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>11</h5>
                                                <h5>{{$schedule_saturday[10]->type}}</h5>
                                                <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                                <label style="color: black" id="b11">Filled</label> <input type="checkbox" id="Checkbox11" name="Checkbox[]" value="11" onclick="f11()"  {{in_array("11",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter11->counter < $schedule_limit->client_limit && in_array(11,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>11</h5>
                                                <h5>{{$schedule_saturday[10]->type}}</h5>
                                                <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                                <label style="color: black" id="b11">Booked</label> <input type="checkbox" id="Checkbox11" name="Checkbox[]" value="11" onclick="f11()"  {{in_array("11",$Checkbox)?"checked":""}}>
                                            </div>
                                        @else
                                            <div class="schdl-box1">
                                                <h5>11</h5>
                                                <h5>{{$schedule_saturday[10]->type}}</h5>
                                                <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                                <label style="color: black" id="b11">Filled</label>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <h3 class="text-uppercase text-center pad30">Sunday</h3>
                            <div class="tab-content1">
                                <div class="tab-pane1 fade active show">
                                    @if(count($schedule_sunday)>0)
                                        @if($counter12->counter < $schedule_limit->client_limit && !in_array(12,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>12</h5>
                                                <h5>{{$schedule_sunday[11]->type}}</h5>
                                                <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                                <label style="color: black" id="b12">Book Now</label> <input type="checkbox" id="Checkbox12" name="Checkbox[]" value="12" onclick="f12()"  {{in_array("12",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter12->counter == $schedule_limit->client_limit && in_array(12,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>12</h5>
                                                <h5>{{$schedule_sunday[11]->type}}</h5>
                                                <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                                <label style="color: black" id="b12">Filled</label> <input type="checkbox" id="Checkbox12" name="Checkbox[]" value="12" onclick="f12()"  {{in_array("12",$Checkbox)?"checked":""}}>
                                            </div>
                                        @elseif($counter12->counter < $schedule_limit->client_limit && in_array(12,$Checkbox))
                                            <div class="schdl-box1">
                                                <h5>12</h5>
                                                <h5>{{$schedule_sunday[11]->type}}</h5>
                                                <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                                <label style="color: black" id="b12">Booked</label> <input type="checkbox" id="Checkbox12" name="Checkbox[]" value="12" onclick="f12()"  {{in_array("12",$Checkbox)?"checked":""}}>
                                            </div>
                                         @else
                                            <div class="schdl-box1">
                                                <h5>12</h5>
                                                <h5>{{$schedule_sunday[11]->type}}</h5>
                                                <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                                <label style="color: black" id="b12">Filled</label>
                                            </div>
                                         @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        </div>
                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#fc328a ;border:none;margin-left: 135px;margin-top: 30px;margin-bottom: 30px;" id="submit">
                                    {{ __('UPDATE') }}
                                </button>
                            </div>
                        </div>

                </form>
            </div>

            {{--Schdeule Timetable End--}}

        </div>
        <!-- /.container -->

        <div class="col-md-12">
            <div class="section-title text-center">
                <p>Any inquiries about filled slots?</p>
                <button type="button" class="btn btn-primary" style="margin-top: -55px;background-color:#fc328a;border: none;" data-toggle="modal" data-target="#myModal">
                    Contact Admin
                </button>
            </div>
        </div>

        <!--modal-->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog bg-white">
                <div class="modal-content" style="height: 300px;background-color: lightyellow">
                    <!-- Modal Header -->
                    <div class="modal-header bg-white">
                        <h4 class="modal-title" style="color: deeppink">Send Inquiries</h4>
                        <button type="button" class="close" style="color:#fc328a" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body bg-white" style="color: black">
                        <form method="POST" action="{{ url('home/send_inquiries') }}"  aria-label="{{ __('Send_Inquiry') }}">
                            {{csrf_field()}}
                            <div class="form-horizontal">
                                <div>
                                    <!--take  hidden input-->
                                    <input type="hidden" name="email_data" value={{$sys_user_email->email}} >
                                    <!-- done -->
                                    <textarea id="inquiry" type="text" style="height: 150px; width:465px;"  placeholder="Inquiry" name="inquiry" required autofocus></textarea>
                                    <br>
                                </div>

                                <div class="form-horizontal">
                                    <button type="submit" class="btn btn-primary" style="background-color:#fc328a;border:none;margin-left: 200px" id="create1">
                                        {{ __('Send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of the modal -->

    </div>
    <!--schedule-area end-->

@endsection
