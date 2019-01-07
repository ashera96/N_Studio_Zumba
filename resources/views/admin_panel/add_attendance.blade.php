@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');



<!--<a href="/admin/receptionist" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a> -->

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


<!--suppress ALL -->
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
                <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                <a href="/admin/reports" class="list-group-item active side-bar active"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

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

                <h3>Add Attendances</h3>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-form mt20">
                        <div class="appointment-schedule">
                            <form class="attendForm" method="POST" action="{{url('admin/reports_attendance')}}">

                                @csrf


                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Id</h5>
                                            <input id="id" type="number"  placeholder="Enter id" class="form-control" name="id" value="{{Request::old('id') }}" >
                                            @if($errors->has('id'))
                                                <span class="form-text invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('id')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Month</h5>
                                            <select id="month" type="text"  placeholder="Enter month" class="form-control" name="month" value="{{Request::old('month') }}" >
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
                                            <input id="year" type="number"  placeholder="Enter year" class="form-control" name="year" value="{{Request::old('year') }}" >
                                            @if($errors->has('year'))
                                                <span class="form-text invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('year')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Total No of Classes</h5>
                                            <input id="totalclasses" type="number"  placeholder="Enter total classes" class="form-control" name="totalclasses" value="{{Request::old('totalclasses') }}" >
                                            @if($errors->has('totalclasses'))
                                                <span class="form-text invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('totalclasses')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">No of Attend Classes</h5>
                                            <input id="attendanceclasses" type="number"  placeholder="Enter attend classes" class="form-control" name="attendanceclasses" value="{{Request::old('attendanceclasses') }}" >
                                            @if($errors->has('attendanceclasses'))
                                                <span class="form-text invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('attendanceclasses')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Percentage</h5>
                                            <input id="percentage" type="text"  placeholder="Percentage Value"  class="form-control" name="percentage" onclick="calcPercent()" value="{{Request::old('percentage') }}" >
                                            @if($errors->has('percentage'))
                                                <span class="form-text invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('percentage')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bttn full-width">
                                            <button name="submit" type="submit" class="btn active full-width btn-primary">Add</button>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /.col -->
    </div>
</div>
@endsection



