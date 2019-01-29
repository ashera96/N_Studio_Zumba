@extends('layouts.admin_app');

@section('content');

    <!-- /.header start -->
    @extends('layouts.hori_sidebar');
    <!--header end-->

    <!--Notification-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                @extends('layouts.vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3 fs-15">

                    {{--<br><br><br><br>--}}
                    @if (session('message'))
                        <div class="alert alert-success ml200" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('msght'))
                        <div class="alert alert-success ml200" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msght') }}
                        </div>
                    @endif

                    @if (session('msgn'))
                        <div class="alert alert-success ml200" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgn') }}
                        </div>
                    @endif

                    @if (session('msgpst'))
                        <div class="alert alert-success ml200" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgpst') }}
                        </div>
                    @endif

                    <!--Health tip notification area start-->
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Health Tip Notifications</h3>
                    </div>

                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">

                            <!-- form for health tips notification-->
                            <form method="POST" action="{{ url('admin/create_health_tips') }}"  aria-label="{{ __('Create_Notifications') }}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-md-9" style="margin-left: 200px">
                                        <textarea id="healthtips" type="text"  class="form-control{{ $errors->has('healthtips') ? ' is-invalid' : '' }}" placeholder="Health Tips" name="healthtips" required autofocus>{{ old('healthtips') }}</textarea>
                                        <br>
                                        @if ($errors->has('healthtips'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>HealthTip Notification maximum length exceeded !</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn active btn-primary" id="create1">
                                                    {{ __('Create') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--Health tip notification area end-->

                    <!--General notification area start-->
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>General Notifications</h3>
                    </div>

                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">

                            <!-- form for general notification-->
                            <form method="POST" action="{{ url('admin/create_general_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-md-9" style="margin-left: 200px">
                                        <textarea id="general" type="text" class="form-control{{ $errors->has('general') ? ' is-invalid' : '' }}" placeholder="General Notifications" name="general" required>{{ old('general') }}</textarea>
                                        <br>
                                        @if ($errors->has('general'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>General Notification maximum length exceeded !</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn active btn-primary" id="create1">
                                                    {{ __('Create') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--General notification area end-->

                    <!--General post area start-->
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>General News Posts</h3>
                    </div>

                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">

                            <!-- form for general post-->
                            <form method="POST" action="{{ url('admin/create_post') }}"  aria-label="{{ __('Create_Notifications') }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group row">

                                    <div class="col-md-9" style="margin-left: 200px;">
                                        <label style="color: deeppink"> Upload Images: </label> <input style="color: red" type="file" name="upload_images"/>

                                        @if ($errors->has('upload_images'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('upload_images') }}</strong>
                                            </span>
                                        @endif

                                        <br><br>

                                        <input  type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"  placeholder="Post Title"  value="{{ old('title') }}" required><br>
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif

                                        <textarea id="post_body" style="height: 220px" type="text" class="form-control{{ $errors->has('post_body') ? ' is-invalid' : '' }}" placeholder="Post Body" name="post_body" required>{{ old('post_body') }}</textarea>
                                        @if ($errors->has('post_body'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('post_body') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn active btn-primary" id="create1">
                                                    {{ __('Create') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>
                            <div class="row"style="margin-left: 515px">
                                <a href="/admin/show_posts"><button class="btn active btn-primary" >View Posts</button></a>
                            </div>

                        </div>
                    </div>
                    <!--General post area end-->


<!-- forrm for medical issues notifications

<div class="container">
    <form method="POST" action="{{ url('admin/create_general_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <div class="section-title text-center">
            <div class="title-bar full-width mb20">
                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
            </div>
            <h3 style="font-size: medium;color: #d9534f">Health Advices</h3>
        </div>
        <br>
        <div class="form-group row" style="margin-left: 250px">
            <div class="col-md-8" >
                <textarea id="advice" type="text" class="form-control{{ $errors->has('advice') ? ' is-invalid' : '' }}" placeholder="Health Advice" name="advice" required>{{ old('advice') }}</textarea>
                <br>
                @if ($errors->has('advice'))
                    <span class="invalid-feedback" role="alert">
                        <strong>Health Advice maximum length exceeded !</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none" id="create1">
                        {{ __('Send') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div> -->


                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Medical Advices</h3>
                        <p><a href="/admin/send_health_advices"><button class="btn active btn-primary">Send Medical Advices</button></a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
