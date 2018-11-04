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


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                <div class="col-lg-2 col-md-3">
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item active side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
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

                    <!-- Website overview start -->
                    <div class="row">
                        <div class="card pad30">
                            <div class="card-header">Website Overview</div>
                            <div class="card-body block">
                                hello
                            </div>
                        </div>
                    </div>
                    <!-- Website overview end -->


                    {{--<div class="card row">--}}
                        {{--<div class="card-header">Website Overview</div>--}}
                    {{--</div>--}}
                    {{--<!-- Website Overview -->--}}
                    {{--<div class="row">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-heading main-color-bg">--}}
                                {{--<h3 class="panel-title">Website Overview</h3>--}}
                            {{--</div>--}}
                            {{--<div class="panel-body">--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<div class="well dash-box">--}}
                                        {{--<h2><i class="material-icons prefix">people</i> 54</h2>--}}
                                        {{--<h4>Active Users</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<div class="well dash-box">--}}
                                        {{--<h2><i class="material-icons prefix">visibility_off</i> 12</h2>--}}
                                        {{--<h4>Inactive Users</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<div class="well dash-box">--}}
                                        {{--<h2><i class="material-icons prefix">delete</i> 6</h2>--}}
                                        {{--<h4>Deleted Users</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-3">--}}
                                    {{--<div class="well dash-box">--}}
                                        {{--<h2><i class="material-icons prefix">visibility</i> 128</h2>--}}
                                        {{--<h4>Visitors</h4>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- Website Overview end -->--}}

            </div>
            <!-- /.row -->
        </div>
    </div>




@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection