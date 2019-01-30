+@extends('layouts.recep_app');

@section('content');

@extends('layouts.hori_sidebar');

<script language="JavaScript">
    <!--
    function calcPercent() {
        var total = document.getElementById('totalclasses').value;
        var attend = document.getElementById('attendanceclasses').value;
        var percent = attend*100/total;
        var per = percent.toFixed(2);
        //yourTextBox.Text = Math.Round(yourDouble, 2).ToString();
        document.getElementById('percentage').value= per;

    }
    //-->
</script>

<!--<a href="/admin/receptionist" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a> -->

<div class="container-fluid">
    <div class="row">
        <!--Sidebar-area start-->
        <div class="col-lg-2 col-md-3 ">
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

        <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 ">
            <div class="col-lg-10 col-md-9 mar30" style="margin-left: 140px">


                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <br><br><br>
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                    </div>

                    <h3>Edit Attendance</h3>
                </div>




                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="contact-form mt20">
                            <div class="appointment-schedule">
                                    {{ Form::open(['route' => ['recep_reports_attendance.update',$attendance->id,$attendance->month,$attendance->year], 'method' => 'post']) }}

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 style="color: #343a40">Id</h5>
                                                <input type="number" name="id" value="{{ $attendance->id }}" class="form-control" value="{{Request::old('id')}}">
                                                @if ($errors->has('id'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 style="color: #343a40">Month</h5>
                                                <select id="month" type="text" value="{{ $attendance->month }}"  class="form-control" name="month" value="{{Request::old('month') }}" >
                                                    <option value="Jan">Jan</option>
                                                    <option value="Feb">Feb</option>
                                                    <option value="Mar">Mar</option>
                                                    <option value="Apr">Apr</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="Jul">Jul</option>
                                                    <option value="Aug">Aug</option>
                                                    <option value="Sep">Sep</option>
                                                    <option value="Oct">Oct</option>
                                                    <option value="Nov">Nov</option>
                                                    <option value="Dec">Dec</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 style="color: #343a40">Year</h5>
                                                <input type="number" name="year" value="{{ $attendance->year }}" class="form-control " value="{{Request::old('year')}}">
                                                @if ($errors->has('year'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 style="color: #343a40">Total Classes</h5>
                                                <input type="number" name="totalclasses" id="totalclasses" value="{{ $attendance->totalclasses }}" class ="form-control " value="{{Request::old('totalclasses')}}">
                                                @if ($errors->has('totalclasses'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('totalclasses') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 style="color: #343a40">No of Attendance</h5>
                                                <input type="number" name="attendanceclasses" id="attendanceclasses" value="{{ $attendance->attendanceclasses }}" class ="form-control " value="{{Request::old('attendanceclasses')}}">
                                                @if ($errors->has('attendanceclasses'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('attendanceclasses') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 style="color: #343a40">Percentage(%)</h5>
                                                <input type="text" name="percentage" id="percentage"  onclick="calcPercent()" class ="form-control " value="{{Request::old('percentage')}}">
                                                @if ($errors->has('percentage'))
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('percentage') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="bttn full-width">

                                                <button name="submit" type="submit" class="btn active full-width btn-primary">Update</button>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                     {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>
</div>
@endsection
