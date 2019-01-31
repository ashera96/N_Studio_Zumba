@extends('layouts.recep_app');

@section('content');

@extends('layouts.hori_sidebar');


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
                <a href="/recep/recep_reports" class="list-group-item active side-bar active"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

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

                <h3>Add Weights</h3>
            </div>

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-form mt20">
                        <div class="appointment-schedule">
                            <form class="appointment-form" method="POST" action="{{url('recep/recep_reports')}}">

                                @csrf


                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">User Id</h5>
                                            <input id="id" type="number"  placeholder="Enter user id" class="form-control" name="id" value="{{Request::old('id') }}" >
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
                                            <h5 style="color: #343a40">Weight</h5>
                                            <input id="weight" type="text"  placeholder="Enter weight" class="form-control" name="weight" value="{{Request::old('weight') }}" >
                                            @if($errors->has('weight'))
                                                <span class="form-text invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('weight')}}</strong>
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
    </div>
        <!-- /.col -->
    </div>
@endsection
