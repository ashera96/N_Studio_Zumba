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
                        {{--<li class="nav-item {{Request::is('home/payment') ? "active" : ""}}">--}}
                            {{--<a class="nav-link" href="/home/payment">payment</a>--}}
                        {{--</li>--}}
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
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            @if(count($Checkbox)>0)
                <div class="row"style="margin-left: 490px">
                    <a href="/home/change_schedule"><button class="btn active btn-primary" >Change Schedules</button></a>
                </div>
            @endif

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
                                        <div class="schdl-box1">
                                            <h5>{{$schedule_monday[0]->type}}</h5>
                                            <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                            <label style="color: black" id="b1">Book Now</label> <input type="checkbox" id="Checkbox1" name="Checkbox[]" value="1" onclick="f1()" {{in_array("1",$Checkbox)?"checked":""}}>
                                        </div>
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_monday[1]->type}}</h5>
                                        <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                        <label style="color: black" id="b2">Book Now</label> <input type="checkbox" id="Checkbox2" name="Checkbox[]" value="2" onclick="f2()"  {{in_array("2",$Checkbox)?"checked":""}}>
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
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_tuesday[2]->type}}</h5>
                                        <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                        <label style="color: black" id="b3">Book Now</label> <input type="checkbox" id="Checkbox3" name="Checkbox[]" value="3" onclick="f3()"  {{in_array("3",$Checkbox)?"checked":""}}>
                                    </div>
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_tuesday[3]->type}}</h5>
                                        <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                        <label style="color: black" id="b4">Book Now</label> <input type="checkbox" id="Checkbox4" name="Checkbox[]" value="4" onclick="f4()"  {{in_array("4",$Checkbox)?"checked":""}}>
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
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_wednesday[4]->type}}</h5>
                                        <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                        <label style="color: black" id="b5">Book Now</label> <input type="checkbox" id="Checkbox5" name="Checkbox[]" value="5" onclick="f5()"  {{in_array("5",$Checkbox)?"checked":""}}>
                                    </div>
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_wednesday[5]->type}}</h5>
                                        <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                        <label style="color: black" id="b6">Book Now</label> <input type="checkbox" id="Checkbox6" name="Checkbox[]" value="6" onclick="f6()"  {{in_array("6",$Checkbox)?"checked":""}}>
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
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_thursday[6]->type}}</h5>
                                        <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                        <label style="color: black" id="b7">Book Now</label> <input type="checkbox" id="Checkbox7" name="Checkbox[]" value="7" onclick="f7()"  {{in_array("7",$Checkbox)?"checked":""}}>
                                    </div>
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_thursday[7]->type}}</h5>
                                        <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                        <label style="color: black" id="b8">Book Now</label> <input type="checkbox" id="Checkbox8" name="Checkbox[]" value="8" onclick="f8()"  {{in_array("8",$Checkbox)?"checked":""}}>
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
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_friday[8]->type}}</h5>
                                        <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                        <label style="color: black" id="b9">Book Now</label> <input type="checkbox" id="Checkbox9" name="Checkbox[]" value="9" onclick="f9()"  {{in_array("9",$Checkbox)?"checked":""}}>
                                    </div>
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_friday[9]->type}}</h5>
                                        <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                        <label style="color: black" id="b10">Book Now</label> <input type="checkbox" id="Checkbox10" name="Checkbox[]" value="10"  onclick="f10()"  {{in_array("10",$Checkbox)?"checked":""}}>
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
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_saturday[10]->type}}</h5>
                                        <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                        <label style="color: black" id="b11">Book Now</label> <input type="checkbox" id="Checkbox11" name="Checkbox[]" value="11" onclick="f11()"  {{in_array("11",$Checkbox)?"checked":""}}>
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
                                    <div class="schdl-box1">
                                        <h5>{{$schedule_sunday[11]->type}}</h5>
                                        <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                        <label style="color: black" id="b12">Book Now</label> <input type="checkbox" id="Checkbox12" name="Checkbox[]" value="12" onclick="f12()"  {{in_array("12",$Checkbox)?"checked":""}}>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
                    @if(count($Checkbox)==0)
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none;margin-left: 150px" id="submit">
                                {{ __('SUBMIT') }}
                            </button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>

            {{--Schdeule Timetable End--}}

        </div>
        <!-- /.container -->
    </div>
    <!--schedule-area end-->

@endsection
