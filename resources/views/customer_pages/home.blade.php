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
        setInterval(function(){
            $('#posts').load('/home #posts')
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
                <ul class="collapse navbar-collapse" id="navbarNavDropdown">
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
                       <!-- notification bell commented out
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        -->

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

    <br><br><br>

    <!--features-area start-->
    <div class="features-area pb30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-body">
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">zumba classes</h4>
                                <p class="mb20">Everybody and every body! Each zumba class is designed to bring people together to sweat it on.<br></p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/1.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">workout sessions</h4>
                                <p class="mb20">A total workout combining cardio, muscle conditioning, boosted energy, balance and flexibility.</p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/2.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements" style="margin-bottom: 18px">
                                <h4 class="mb20">cardio fitness</h4>
                                <p class="mb20">Effective cardiovascular program to optimize fat burning, improve mood and reduce stress.<br></p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/3.jpg') }}"  alt="feature img"></a>
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
    <!--features-area end-->

    {{--JS Files to calculate the BMI start--}}
    <script language="JavaScript">
        <!--
        function calculateBmi() {
            var weight = document.bmiForm.weight.value
            var height = document.bmiForm.height.value
            if(weight > 0 && height > 0){
                var finalBmi = weight/(height/100*height/100)
                document.bmiForm.bmi.value = finalBmi
                if(finalBmi < 18.5){
                    document.bmiForm.meaning.value = "Under Weight"
                }
                if(finalBmi > 18.5 && finalBmi < 25){
                    document.bmiForm.meaning.value = "Healthy"
                }
                if(finalBmi > 25){
                    document.bmiForm.meaning.value = "Over Weight"
                }
            }
            else{
                alert("Please Fill in everything correctly")
            }
        }
        //-->
    </script>
    {{--JS Files to calculate the BMI end--}}

    <!--BMI calculating area start-->
    <div class="portfolio-area title-white bg1 parallax overlay pad90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Calculate your BMI</h3>
                        <p>Body mass index (BMI) is a measure of body fat based on height and weight.</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6">
                                    <form name="bmiForm">
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Weight</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="weight" class="form-control"  placeholder="50kg" size="10" ><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Height</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="height" class="form-control"  placeholder="160cm" size="10" ><br />
                                            </div>
                                        </div>
                                        <input type="button" class="btn active btn-primary" id="bmi-button" value="Calculate BMI" onClick="calculateBmi()"><br /><br />

                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your BMI</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="bmi" class="form-control" placeholder="BMI Value" size="10" ><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Status</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="meaning" class="form-control"  placeholder="BMI Status" size="25" ><br />
                                            </div>
                                        </div>
                                        <input type="reset" class="btn active btn-success" id="bmi-button" value="Reset" /><br />

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.port carousel -->
    </div>
    <!--BMI calculating area end-->

    <br>
    <h2 style="color: #e83e8c;padding: 15px">Notifications</h2>

    <div id="posts" style="color: gray ;
    padding: 15px;
    background-clip: padding-box;font-size: medium">
        @foreach($posts as $post)
            <div>
                <b style="color: #d9534f">{{$post->title}}</b>
                <br>
                {{$post->post_body}}
                <br>
                <small style="color: #2c2c2c">Posted at : {{$post->created_at}}</small>
            </div>
            <br>
        @endforeach
    </div>



@endsection
