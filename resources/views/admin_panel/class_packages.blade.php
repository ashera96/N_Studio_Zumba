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
                        <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="/admin/reports" class="list-group-item side-bar"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
                        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                        <a href="/admin/dashboard/class_packages" class="list-group-item active side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                    </div>
                </div>
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 mainFix ">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Packages</h3>
                        <p>Manage Packages and Pricing Plans</p>
                    </div>

                    <!--packages area start-->
                    <div class="row float-right pad30">
                        <a href="/index/class_packages/create" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">Add</a>
                    </div>
                    <div class="pricing-area text-center pad30 col-md-10 px-4">
                        <div class="container">

                            <div class="row">


                                @if(count($packages)>0)
                                    @foreach($packages as $package)
                                        <div class="col-md-6">
                                            <div class="price-box">
                                                <div class="price-empty">
                                                </div>
                                                <div class="price-quantity">
                                                    <div class="qnty-box">
                                                        <div class="box-element">
                                                            <div class="admin-package">
                                                                <h5>Rs. {{$package->price}}</h5>
                                                                <p>Monthly</p>
                                                            </div>
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
                    <!--packages area end-->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!--Admin dashboard-area end-->
    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
