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
                <div class="col-lg-2 col-md-3">
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="/admin/reports" class="list-group-item active side-bar"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
                        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                        <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                    </div>
                </div>
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 pad30">
                    <!-- Website Overview -->
                    <div class="new">
                        <div class="panel panel-default">
                            <nav class="navbar navbar-default ">
                                <div class="container">
                                    <nav class="navbar navbar-expand-lg navbar-dark">
                                        <div class="container-fluid">
                                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                                <ul class="navbar-nav ml-auto">
                                                    <li class="nav-item ">
                                                        <a class="nav-link " href="/admin/reports">
                                                            Weight<span class="sr-only">(current)</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item active">
                                                        <a class="nav-link " href="/admin/reports_attendance">
                                                            Attendance<span class="sr-only">(current)</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div>
                        <div>
                            <br>
                            <div class="col-md-12" align="center">
                                <div class="row mb-0">
                                    <div class="card overview-block pad30 rounded">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class = "col-md-8 text-right">

                                                    <form method="post" class ="form-inline" action="{{url('admin/reports_attendance/search')}}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder ="Enter data" name="title" id="title">
                                                            <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> </button>
                                                        </div>

                                                    </form>
                                                    <div style="float: right;" >

                                                        <a href="{{url('/admin/reports_attendance/create')}}"><button class="addbtnattend">ADD ATTENDANCE</button></a>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover" width="80%"  >
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Total Classes</th>
                                                        <th>No of Attendance</th>
                                                        <th>Percentage(%)</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($attendances as $attendance)
                                                        <tr>
                                                            <td>{{$attendance->id}}</td>
                                                            <td>{{$attendance->month}}</td>
                                                            <td>{{$attendance->year}}</td>
                                                            <td>{{$attendance->totalclasses}}
                                                                @if($attendance->totalclasses)
                                                                    <a href="increTot/{{$attendance->id}}/{{$attendance->month}}/{{$attendance->year}}"><button class="add1">+</button></a>
                                                                @endif

                                                            </td>
                                                            <td>{{$attendance->attendanceclasses}}
                                                                @if($attendance->attendanceclasses)
                                                                    <a href="increAtt/{{$attendance->id}}/{{$attendance->month}}/{{$attendance->year}}"><button class="add1">+</button></a>
                                                                @endif

                                                            </td>
                                                            <td>{{$attendance->percentage}}
                                                                @if($attendance->percentage)
                                                                    <a href="updatePer/{{$attendance->id}}/{{$attendance->month}}/{{$attendance->year}}"><button class="add1">%</button></a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a href="{{url('admin/reports_attendance/'.$attendance ->id .'/'.$attendance ->month.'/'. $attendance ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ Form::open(['route' => ['reports_attendance.destroy',$attendance->id,$attendance->month,$attendance->year], 'method' => 'delete']) }}
                                                                <button type="submit" class="delbtn">Delete</button>
                                                                {{ Form::close() }}
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                {{$attendances->links()}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


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
