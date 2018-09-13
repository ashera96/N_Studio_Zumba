@extends('layouts.static_app')


@section('content')

    <!-- /.header start -->
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
                        <li class="nav-item">
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
                            <a class="nav-link " href="/index/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
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
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">register</a>
                        </li>
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
                        <li><a href="/index">home</a></li>
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

            {{--Testing  Schdeule --}}
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div col-md-3>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>TEsaaaaaaaaaaaaaaaaaaaaaaaaaaaaat</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>aaaaaaaaaaaaaaaaaaaaaaTEst</h2>
                            </div>
                        </div>
                    </div>
                    <div col-md-3>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>TEst</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>TEst</h2>
                            </div>
                        </div>
                    </div>
                    <div col-md-3>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>TEst</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>TEst</h2>
                            </div>
                        </div>
                    </div>
                    <div col-md-3>
                        <div class="row">
                            <div class="col-md-6">
                                <h2>TEst</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>TEst</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Testing  Schdeule --}}




            <div class="row">
                <div class="col-md-12">

                </div>
                @if(count($schedules)>0)
                    @foreach($schedules as $schedule)
                        <h3>{{$schedule->day}}</h3>
                    @endforeach
                @endif
                <div class="col-md-12">
                    <ul id="tabsJustified" class="nav nav-tabs schdl-tab-area">
                        <li class="nav-item full-width"><a href="#" data-target="#level1" data-toggle="tab" class="nav-link small text-uppercase active">monday </a></li>
                        <li class="nav-item full-width"><a href="#" data-target="#level2" data-toggle="tab" class="nav-link small text-uppercase ">tuesday</a></li>
                        <li class="nav-item full-width"><a href="#" data-target="#level3" data-toggle="tab" class="nav-link small text-uppercase ">wednesday</a></li>
                        <li class="nav-item full-width"><a href="#" data-target="#level4" data-toggle="tab" class="nav-link small text-uppercase ">thursday</a></li>
                        <li class="nav-item full-width"><a href="#" data-target="#level5" data-toggle="tab" class="nav-link small text-uppercase ">friday</a></li>
                        <li class="nav-item full-width"><a href="#" data-target="#level6" data-toggle="tab" class="nav-link small text-uppercase ">saturday</a></li>
                        <li class="nav-item full-width"><a href="#" data-target="#level7" data-toggle="tab" class="nav-link small text-uppercase ">sunday</a></li>
                    </ul>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!--schedule-area end-->



@endsection





                {{--<div id="tabsJustifiedContent" class="tab-content">--}}
                    {{--<div id="level1" class="tab-pane fade active show">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>boxing</h5>--}}
                            {{--<p class="mb-0">06.00 am – 07.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">07.00 am – 08.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>bodybuiling</h5>--}}
                            {{--<p class="mb-0">08.00 am – 09.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">09.00 am – 10.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>crosfit</h5>--}}
                            {{--<p class="mb-0">10.00 am – 11.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">1.00 am – 12.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>fitness</h5>--}}
                            {{--<p class="mb-0">04.00 pm – 05.00pm</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>cardio</h5>--}}
                            {{--<p class="mb-0">05.00 pm – 06.00pm</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">07.00 pm – 08.00pm</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>bodybuiling</h5>--}}
                            {{--<p class="mb-0">08.00 pm – 09.00pm</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="level2" class="tab-pane fade">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>boxing</h5>--}}
                            {{--<p class="mb-0">06.00 am – 07.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">07.00 am – 08.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>bodybuiling</h5>--}}
                            {{--<p class="mb-0">08.00 am – 09.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">09.00 am – 10.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>crosfit</h5>--}}
                            {{--<p class="mb-0">10.00 am – 11.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">1.00 am – 12.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>fitness</h5>--}}
                            {{--<p class="mb-0">04.00 pm – 05.00pm</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="level3" class="tab-pane fade">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>boxing</h5>--}}
                            {{--<p class="mb-0">06.00 am – 07.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">09.00 am – 10.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>crosfit</h5>--}}
                            {{--<p class="mb-0">10.00 am – 11.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">1.00 am – 12.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>fitness</h5>--}}
                            {{--<p class="mb-0">04.00 pm – 05.00pm</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="level4" class="tab-pane fade">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>boxing</h5>--}}
                            {{--<p class="mb-0">06.00 am – 07.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">07.00 am – 08.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">1.00 am – 12.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>fitness</h5>--}}
                            {{--<p class="mb-0">04.00 pm – 05.00pm</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="level5" class="tab-pane fade">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>boxing</h5>--}}
                            {{--<p class="mb-0">06.00 am – 07.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">07.00 am – 08.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>bodybuiling</h5>--}}
                            {{--<p class="mb-0">08.00 am – 09.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">09.00 am – 10.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>crosfit</h5>--}}
                            {{--<p class="mb-0">10.00 am – 11.00am</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="level6" class="tab-pane fade">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">09.00 am – 10.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>crosfit</h5>--}}
                            {{--<p class="mb-0">10.00 am – 11.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">1.00 am – 12.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>fitness</h5>--}}
                            {{--<p class="mb-0">04.00 pm – 05.00pm</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="level7" class="tab-pane fade">--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>bodybuiling</h5>--}}
                            {{--<p class="mb-0">08.00 am – 09.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">09.00 am – 10.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>crosfit</h5>--}}
                            {{--<p class="mb-0">10.00 am – 11.00am</p>--}}
                        {{--</div>--}}
                        {{--<div class="schdl-box">--}}
                            {{--<h5>-----</h5>--}}
                            {{--<p class="mb-0">1.00 am – 12.00am</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
