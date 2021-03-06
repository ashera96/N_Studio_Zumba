@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<!--<a href="/admin/receptionist" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a> -->

<div class="container-fluid">
    <div class="row">
        <!--Sidebar-area start-->
        <div class="col-lg-2 col-md-3 ">
            <div class="list-group shadow-sm">
                <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                <a href="/admin/receptionist" class="list-group-item side-bar active"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                <a href="/admin/customers" class="list-group-item side-bar "><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                <a href="/admin/reports" class="list-group-item side-bar"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

            </div>
        </div>
        <!--Sidebar-area end-->

        <!-- Website Overview -->

        <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 ">

            <div class="col-lg-10 col-md-9 pad30" style="margin-left: 140px" >



            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>Edit Receptionist</h3>
            </div>




            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-form mt20">
                        <div class="appointment-schedule">
                            <form class="appointment-form" method="POST" action="{{ route('receptionist.update',$receptionist->id) }}">

                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Name</h5>
                                            <input type="text" name="name" value="{{ $receptionist->name }}" class="form-control" value="{{Request::old('name')}}">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>






                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">NIC</h5>
                                            <input type="text" name="nic" value="{{ $receptionist->nic }}" class="form-control " value="{{Request::old('nic')}}">
                                            @if ($errors->has('nic'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nic') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">DOB</h5>
                                            <input type="date" name="dob" value="{{ $receptionist->dob }}" class="form-control " value="{{Request::old('dob')}}">
                                            @if ($errors->has('dob'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Address</h5>
                                            <input type="text" name="address" value="{{ $receptionist->address }}" class="form-control " value="{{Request::old('address')}}">
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Phone</h5>
                                            <input type="tel" name="tpno" value="{{ $receptionist->tpno }}" class="form-control " value="{{Request::old('tpno')}}">
                                            @if ($errors->has('tpno'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tpno') }}</strong>
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
                            </form>
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
