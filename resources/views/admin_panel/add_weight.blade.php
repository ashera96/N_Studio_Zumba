@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');



<!--<a href="/admin/receptionist" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a> -->


<div class="container-fluid">
    <div class="row">
        @extends('layouts.vertical_sidebar');

        <div class="col-lg-10 col-md-9 mar30">


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
                            <form class="appointment-form" method="POST" action="{{url('admin/reports')}}">

                                @csrf


                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5 style="color: #343a40">Id</h5>
                                            <input id="id" type="text"  placeholder="Enter id" class="form-control" name="id" value="{{Request::old('id') }}" >
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
                                            <input id="year" type="text"  placeholder="Enter year" class="form-control" name="year" value="{{Request::old('year') }}" >
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
        <!-- /.col -->
    </div>
@endsection
