@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<script src ="js/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-3 sideFix">
            <div class="list-group shadow-sm">
                <a href="/recep/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                <a href="/recep/profile" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Profile</a>
                <a href="/recep/cusprofile" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                <a href="/admin/schedules" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                <a href="/recep/fees" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Registration Fees</a>
                <a href="/recep/payments" class="list-group-item side-bar"><i class="fa fa-money fa-lg mr-1"></i> Monthly Payments</a>
                <a href="/recep/recep_reports" class="list-group-item active side-bar "><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

            </div>
        </div>
        <!--Sidebar-area end-->

        <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
            <div class="col-lg-10 col-md-9 mar30" style="margin-left: 140px">
            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>Show Attendance</h3>
            </div>

            <div>
                <br>
                <div class="col-md-12" align="center">
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-12 text-center">
                                        @if(isset($details))
                                            <br>
                                            <h3 class="myone">The Attendance Search results</h3>
                                            <br>

                                            <table class="table table-striped table-hover" width="100%"  >
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Total Classes</th>
                                                    <th>No of Attendance</th>
                                                    <th>Percentage(%)</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($details as $attendance)
                                                    <tr>
                                                        <td>{{$attendance->id}}</td>
                                                        <td>{{$attendance->month}}</td>
                                                        <td>{{$attendance->year}}</td>
                                                        <td>{{$attendance->totalclasses}}</td>
                                                        <td>{{$attendance->attendanceclasses}}</td>
                                                        <td>{{$attendance->percentage}}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="{{url('recep/recep_reports_attendance/'.$attendance ->id .'/'.$attendance ->month.'/'. $attendance ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ Form::open(['route' => ['recep_reports_attendance.destroy',$attendance->id,$attendance->month,$attendance->year], 'method' => 'delete']) }}
                                                            <button type="submit" class="delbtn">Delete</button>
                                                            {{ Form::close() }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
