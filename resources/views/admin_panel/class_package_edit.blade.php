@extends('layouts.dashboard_app')



@section('content')
    <a href="/admin/dashboard/class_packages" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>
    <div class="row">
        <div class="col-md-12">
            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>
                <h3>Edit Package</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="contact-form mt20">
                <div class="appointment-schedule">
                    <form action="{{route('class_packages.update', $package->id)}}" class="appointment-form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Package Name</h5>
                                    <input type="text" name="name" value="{{$package->name}}" class="form-control ">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Package Price</h5>
                                    <input type="text" name="price" value="{{$package->price}}" class="form-control">
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Service</h5>
                                    <input type="text" name="services" value="{{$package->services}}" class="form-control">
                                    @if ($errors->has('services'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('services') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 style="color: #343a40">Classes Per Month</h5>
                                    <input type="number" name="classes_to_cover" value="{{$package->classes_to_cover}}" class="form-control">
                                    @if ($errors->has('classes_to_cover'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('classes_to_cover') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bttn full-width">
                                    <button type="submit" class="btn active full-width btn-primary">Update</button>
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
