@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<!--<a href="/admin/receptionist" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a> -->

<div class="container-fluid">
    <div class="row">
        <!--Sidebar-area start-->
        <div class="col-lg-2 col-md-3 sideFix">
            <div class="list-group shadow-sm" >
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

        <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 " style="margin-left: 140px">
            <div class="col-lg-10 col-md-9 mar30">



            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>Edit Weight</h3>
            </div>




            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-form mt20">
                        <div class="appointment-schedule">

                            {{ Form::open(['route' => ['reports.update',$weight->id,$weight->month,$weight->year], 'method' => 'post']) }}

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">User Id</h5>
                                            <input type="number" disabled name="id" value="{{ $weight->id }}" class="form-control" value="{{Request::old('id')}}">
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
                                            <select id="month" type="text" value="{{ $weight->month }}"  class="form-control" name="month" value="{{Request::old('month') }}" >
                                                <option value="Jan" {{old('month',$weight->month)=="Jan"? 'selected':''}}>Jan</option>
                                                <option value="Feb" {{old('month',$weight->month)=="Feb"? 'selected':''}}>Feb</option>
                                                <option value="Mar" {{old('month',$weight->month)=="Mar"? 'selected':''}}>Mar</option>
                                                <option value="Apr" {{old('month',$weight->month)=="Apr"? 'selected':''}}>Apr</option>
                                                <option value="May" {{old('month',$weight->month)=="May"? 'selected':''}}>May</option>
                                                <option value="Jun" {{old('month',$weight->month)=="Jun"? 'selected':''}}>Jun</option>
                                                <option value="Jul" {{old('month',$weight->month)=="Jul"? 'selected':''}}>Jul</option>
                                                <option value="Aug" {{old('month',$weight->month)=="Aug"? 'selected':''}}>Aug</option>
                                                <option value="Sep" {{old('month',$weight->month)=="Sep"? 'selected':''}}>Sep</option>
                                                <option value="Oct" {{old('month',$weight->month)=="Oct"? 'selected':''}}>Oct</option>
                                                <option value="Nov" {{old('month',$weight->month)=="Nov"? 'selected':''}}>Nov</option>
                                                <option value="Dec" {{old('month',$weight->month)=="Dec"? 'selected':''}}>Dec</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Year</h5>
                                            <input type="number" name="year" value="{{ $weight->year }}" class="form-control " value="{{Request::old('year')}}">
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Weight</h5>
                                            <input type="text" name="weight" value="{{ $weight->weight }}" class ="form-control " value="{{Request::old('weight')}}">
                                            @if ($errors->has('weight'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('weight') }}</strong>
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
        </div>
    </div>
        <!-- /.col -->
    </div>
@endsection
