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
                        <li class="nav-item active">
                            <a class="nav-link " href="/index/class_packages">
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

                    <!--pricing area start-->
                    <div class="pricing-area text-center pad30 col-md-10 px-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-center">
                                        <div class="title-bar full-width mb20">
                                            <img src="{{ URL::asset('images/logo/ttl-bar2.png') }}"  alt="title-img">
                                        </div>
                                        <h3 style="color: #FFFFFF" >packages and pricing plans</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row float-right pad30">
                                <a href="/index/class_packages/create" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">Add</a>
                            </div>
                            <div class="row">


                                @if(count($packages)>0)
                                    @foreach($packages as $package)
                                        <div class="col-md-4">
                                            <div class="price-box">
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
                                                            <a href="/index/class_packages/{{$package->id}}/edit" class="btn btn-primary">Edit</a>
                                                        </div>
                                                        <div class="price-btn bttn">
                                                            <form method="POST" action="{{route('class_packages.destroy',$package->id)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn button-delete">Delete</button>
                                                            </form>
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
                </div>
            </div>
        </nav>

    </header>