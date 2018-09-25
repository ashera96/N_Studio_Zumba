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
                        <li class="nav-item">
                            <a class="nav-link " href="/index/schedule">
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

                        <!--login button by weere -->
                        <li class="nav-item">
                            <a  class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            <!--login button by weere -->
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
                                    <li class="nav-item active">
                                        <a class="nav-link" href="/dashboard">
                                            <span data-feather="home"></span>
                                            DASHBOARD <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="/receptionist">
                                            <span data-feather="user"></span>
                                            RECEPTIONIST
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="customers">
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



                    <div role="main" class="col-md-10 col-xs-2 px-4" >
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <img src="{{ URL::asset('images/services/1.jpg') }}" alt="title-img" width="1090">
                            <!--<div class=" col-md-6 col-lg-8" style="background-color:#FF1493;"> -->
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>
