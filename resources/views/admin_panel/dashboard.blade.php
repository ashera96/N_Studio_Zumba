@extends('layouts.admin_app')

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
                        <li class="nav-item ">
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
                <div class="col-lg-2 col-md-3 sideFix" >
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item active side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="/admin/reports" class="list-group-item side-bar"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
                        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                        <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                    </div>
                </div>
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 pad30 mainFix ">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Dashboard</h3>
                        <p>Manage N Studio Zumba</p>
                    </div>

                    <!-- Website overview start -->
                    <div class="row">
                        <div class="card overview-block pad30 rounded">
                            <div class="card-header rounded mr-1 ml-1">Website Overview</div>
                            <div class="row card-body">
                                <div class="card-deck">
                                    <div class="card rounded">
                                        <div class="card-body">
                                            <h1 class="card-title mr-2 mb-0 text-dark text-center"><i class="fa fa-users fa-lg pad30"></i> 54</h1>
                                            <h4 class="card-text text-center text-dark">Active Users</h4>
                                        </div>
                                    </div>
                                    <div class="card rounded">
                                        <div class="card-body">
                                            <h1 class="card-title mr-2 mb-0 text-dark text-center"><i class="fa fa-eye-slash fa-lg pad30"></i> 12</h1>
                                            <h4 class="card-text text-center text-dark">Inactive Users</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Website overview end -->

                    <!-- Latest users start -->
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">
                            <div class="card-header rounded mr-1 ml-1">Latest Online Users</div>
                            <div class="row card-body">
                                <table class="table table-striped table-hover">
                                    <tr class="text-dark">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                    </tr>
                                    <tr>
                                        <td>Anushka</td>
                                        <td>anu@gmail.com</td>
                                        <td>Jan 18, 2018</td>
                                    </tr>
                                    <tr>
                                        <td>Shreya</td>
                                        <td>shreya@gmail.com</td>
                                        <td>June 6, 2017</td>
                                    </tr>
                                    <tr>
                                        <td>Jyothika</td>
                                        <td>jo@gmail.com</td>
                                        <td>Dec 28, 2015</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Latest users end -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
