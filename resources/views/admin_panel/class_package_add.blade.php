@extends('layouts.dashboard_app')



@section('content')
    <a href="/dashboard/class_packages" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>
    <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>
                <h3>Add Package</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="contact-form mt20">
                <div class="appointment-schedule">
                    <form class="appointment-form" method="POST" action="{{url('/dashboard/class_packages')}}">

                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Package Name</h5>
                                    <input type="text" name="name" placeholder="3 Days Per Week" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Package Price</h5>
                                    <input type="text" name="price" placeholder="1500" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Service</h5>
                                    <input type="text" name="services" placeholder="Zumba and Workout Session" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Classes Per Month</h5>
                                    <input type="number" name="classes_to_cover" placeholder="20" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bttn full-width">
                                    <button type="submit" class="btn active full-width btn-primary">Add</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection