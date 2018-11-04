@extends('layouts.admin_app');

@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home"><img src="{{ URL::asset('images/logo/nav_logo.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
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

    {{--<div class="container-fluid pad90">--}}
        {{--<div class="nav-side-menu">--}}
            {{--<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>--}}

            {{--<div class="menu-list">--}}

                {{--<ul id="menu-content" class="menu-content collapse out">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="fa fa-dashboard fa-lg"></i> Dashboard--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li  data-toggle="collapse" data-target="#products" class="collapsed active">--}}
                        {{--<a href="#"><i class="fa fa-gift fa-lg"></i> UI Elements <span class="arrow"></span></a>--}}
                    {{--</li>--}}
                    {{--<ul class="sub-menu collapse" id="products">--}}
                        {{--<li class="active"><a href="#">CSS3 Animation</a></li>--}}
                        {{--<li><a href="#">General</a></li>--}}
                        {{--<li><a href="#">Buttons</a></li>--}}
                        {{--<li><a href="#">Tabs & Accordions</a></li>--}}
                        {{--<li><a href="#">Typography</a></li>--}}
                        {{--<li><a href="#">FontAwesome</a></li>--}}
                        {{--<li><a href="#">Slider</a></li>--}}
                        {{--<li><a href="#">Panels</a></li>--}}
                        {{--<li><a href="#">Widgets</a></li>--}}
                        {{--<li><a href="#">Bootstrap Model</a></li>--}}
                    {{--</ul>--}}


                    {{--<li data-toggle="collapse" data-target="#service" class="collapsed">--}}
                        {{--<a href="#"><i class="fa fa-globe fa-lg"></i> Services <span class="arrow"></span></a>--}}
                    {{--</li>--}}
                    {{--<ul class="sub-menu collapse" id="service">--}}
                        {{--<li>New Service 1</li>--}}
                        {{--<li>New Service 2</li>--}}
                        {{--<li>New Service 3</li>--}}
                    {{--</ul>--}}


                    {{--<li data-toggle="collapse" data-target="#new" class="collapsed">--}}
                        {{--<a href="#"><i class="fa fa-car fa-lg"></i> New <span class="arrow"></span></a>--}}
                    {{--</li>--}}
                    {{--<ul class="sub-menu collapse" id="new">--}}
                        {{--<li>New New 1</li>--}}
                        {{--<li>New New 2</li>--}}
                        {{--<li>New New 3</li>--}}
                    {{--</ul>--}}


                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="fa fa-user fa-lg"></i> Profile--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<i class="fa fa-users fa-lg"></i> Users--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                <div class="col-lg-2 col-md-3">
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item main-color-bg side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="users.html" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="users.html" class="list-group-item side-bar"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
                    </div>
                </div>
                <!--Sidebar-area end-->


                <div class="col-lg-10 col-md-9 pad30">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Dashboard</h3>
                        <p>Manage N Studio Zumba</p>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>




@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection