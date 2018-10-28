@extends('layouts.customer_app')

@section('content')

    <!-- /.header start -->
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
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                                </ul>
                            </div>
                        </li>

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


    <!--main-container-->
    <div class="main-container">

        <!-- page title & breadcrumbs start -->
        <div class="contact-bg page-head parallax overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <h3>Contact Us</h3>
                        </div>
                    </div>
                    <!-- /.colour-service-1-->
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="/home">home</a></li>
                            <li>।</li>
                            <li>contact</li>

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


    </div>
    <!--main container --end-->

    @include('inc.messages')

    <!--contact-area start-->
    <div class="contact-area pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                        </div>
                        <h3>leave your message</h3>
                        <p>get in touch with us</p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8">
                    <!--<div class="contact-form">
                       <div class="appointment-schedule">-->
                    <div class="row">
                        {!! Form::open(['url' => '/index/contact']) !!}
                        <div class="col-lg-12 form-group"><br>
                            {{Form::text('name', '',['class' => 'form-control form-dimensions' , 'placeholder' => 'Enter name'])}}
                            @if($errors -> has('name'))
                                <small class = "form-text invalid-feedback"> {{$errors -> first('name')}}</small>
                            @endif
                            <br>
                            {{Form::text('email', '',['class' => 'form-control form-dimensions', 'placeholder' => 'test@gmail.com'])}}
                            @if($errors -> has('email'))
                                <small class = "form-text invalid-feedback"> {{$errors -> first('email')}}</small>
                            @endif
                            <br>
                            {{Form::text('contact', '',['class' => 'form-control form-dimensions' , 'placeholder' => 'Enter contact number'])}}
                            @if($errors -> has('contact'))
                                <small class = "form-text invalid-feedback"> {{$errors -> first('contact')}}</small>
                            @endif
                            <br>
                            {{Form::textarea('message', '', ['class' => 'form-control form-dimensions', 'placeholder' => 'Enter message', 'height ' => "10", 'cols' => "10", 'rows' => "5" ])}}
                            @if($errors -> has('message'))
                                <small class = "form-text invalid-feedback"> {{$errors -> first('message')}}</small>
                            @endif
                            <br>
                            {{Form::submit('Send Message',['class' => 'btn btn-primary full-width active form-dimensions'])}}
                        </div>

                        {!! Form::close() !!}

                    </div>
                    <!-- /.row -->
                    <!--</div>
                </div>-->
                </div>


                <!-- /.col -->
                <div class="col-md-4">
                    <div class="location mt20">
                        <h4>Contact Info</h4>
                        <div class="ctc-content">
                            <i class="fa fa-mobile"></i>
                            <p>     Phone: 0778378162</p>
                        </div>
                        <div class="ctc-content">
                            <i class="fa fa-map-marker"></i>
                            <p>     N Studio Zumba,
                                <br>No.176D, Negombo Road,
                                <br>Rilaulla, Kandana,
                                <br>Sri Lanka</p>
                        </div>
                        <div class="ctc-content">
                            <i class="fa fa-envelope-o"></i>
                            <p>     ninidisilva@gmail.com</p>
                        </div>
                    </div>
                    <br>
                </div>
                <!-- /.col -->


                <br>

                <div class="col-lg-12 d-flex flex-column address-wrap">
                    <div class="head-contact" align="left"><br>
                        <h4>Location</h4>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6017395566364!2d79.89487731431873!3d7.055993994903764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f74786e080f3%3A0xd9aad78356eed66e!2s170c+Negombo+Rd%2C+Kandana!5e0!3m2!1sen!2slk!4v1536772243066" width="1200" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <br><br>
                </div>

            </div>
        </div>
        <!--/.container-->
    </div>
    <!--contact-area end-->

@endsection
