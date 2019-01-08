@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                <div class="col-lg-2 col-md-3 ">
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                        <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                        <a href="/admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="/admin/reports" class="list-group-item active side-bar active"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

                    </div>
                </div>
                <!--Sidebar-area end-->

                    <!-- Website Overview -->

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 ">

                <div class="col-lg-10 col-md-9 pad30" style="margin-left: 140px" >

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Attendance Reports</h3>
                        <p>Manage Attendance Reports</p>
                    </div>
                    <!-- Website Overview -->
                    <div class="new" >
                        <div class="panel panel-default"  >
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
                            @if(session('message1'))
                                <div class="alert alert-danger" role="alert">
                                    <button type=" button" class="close" data-dismiss="alert">x</button>
                                    {{session('message1')}}
                                </div>
                            @endif
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
                                                    <div class="row float-right pad30">
                                                        <a href="{{url('/admin/reports_attendance/create')}}" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">ADD ATTENDANCE</a>
                                                    </div>
                                                </div>
                                                <table class="table table-striped table-hover" width="80%"  >
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Total Classes</th>
                                                        <th>Classes Attended</th>
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
    </div>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
