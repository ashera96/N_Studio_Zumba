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

    {{--JS functions related to packages start--}}
    <script>
        // Function called when the button is clicked
        function buttonClicked(packageId) {
            var buttonType = document.getElementById(packageId+'b').innerHTML;
            if(buttonType=="Cancel"){
                removeSelectedPackage();
            }
            else{
                addSelectedPackage(packageId);
            }
        }

        // Function to add the selection start
        function addSelectedPackage(packageId){
            var confirm_add = confirm("Confirm Selection?");
            if ( confirm_add == true ){
                var data = $('#'+packageId+'f').serialize();
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // catch JSON response
                        // var temp=JSON.parse(this.response);
                        // Use Json response
                        document.getElementById(packageId+'b').innerHTML = "Cancel";
                        document.getElementById(packageId).setAttribute('class','price-box selected-package');
                        onLoad();

                        // alert(this.response);
                    }
                };

                xhttp.open("POST", "/home/add_package", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(data);
            }
        }
        // Function to add the selection end

        // Function to delete the selection start
        function removeSelectedPackage(){
            var confirm_deletion = confirm("Confirm Deletion?");
            if( confirm_deletion == true){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // catch JSON response
                        var temp=JSON.parse(this.response);
                        // Use Json response
                        alert(temp.success);
                        for (var i=1;i<=4;i++){
                            document.getElementById(i+'b').innerHTML = "Buy Now";
                            document.getElementById(i+'b').setAttribute('class','btn btn-primary');
                            document.getElementById(i).setAttribute('class','price-box');
                        }

                        // alert(this.response);
                    }
                };

                var userId = document.getElementById("user_id").value;
                xhttp.open("GET", "/home/delete_package/"+userId, true);
                xhttp.send();
            }

        }
        // Function to delete the selection end

        // Function to load the current state of selections start
        function onLoad(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // catch JSON response
                    var temp=JSON.parse(this.response);
                    // Use Json response
                    for(var i=1;i<=4;i++){
                        if(i!=temp.selected_package){
                            document.getElementById(i+'b').setAttribute('class','btn btn-primary disabled');
                        }
                        else{
                            document.getElementById(i).setAttribute('class','price-box selected-package');
                            document.getElementById(i+'b').innerHTML = "Cancel";
                        }
                    }

                    // alert(temp.selected_package);
                }
            };

            var userId = document.getElementById("user_id").value;
            xhttp.open("GET", "/home/add_package/"+userId, true);
            xhttp.send();
        }
        // Function to load the current state of selections end

    </script>
    {{--JS functions related to packages end--}}

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
                        <li><a href="/home">home</a></li>
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
                        <p>You can only select one package at a time, but can always change the selected package</p>
                    </div>
                </div>
            </div>
            <div class="row">


                @if(count($packages)>0)
                    @foreach($packages as $package)
                        <div class="col-md-6">
                            <div class="price-box" id={{$package->id}}>
                            {{--<div class="price-box" id={{$package->id}}>--}}
                                <div class="price-empty">
                                </div>
                                <div class="price-quantity">
                                    <div class="qnty-box">
                                        <div class="box-element">
                                            <h5>Rs. {{$package->price}}</h5>
                                            <p>Monthly</p>
                                        </div>
                                    </div>
                                    <div class="price-dtl">
                                        <ul>
                                            <li class="first-child"><h3>{{$package->name}} Package</h3></li>
                                            <li>{{$package->services}}</li>
                                            <li><h3>Rs. {{$package->price}}</h3></li>
                                        </ul>
                                        <div class="price-btn bttn">
                                            {{--name -> cancel--}}
                                            <form action="" id={{$package->id.'f'}}>
                                                @csrf
                                                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                                                <input type="hidden" id="package_id" name="package_id" value="{{$package->id}}">
                                            </form>
                                            <a href="#" class="btn btn-primary" name="buy" id={{$package->id.'b'}} onclick="buttonClicked({{$package->id}})">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    @endforeach
                @endif

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!--pricing area end-->

    <script>
        onLoad();
    </script>

@endsection






