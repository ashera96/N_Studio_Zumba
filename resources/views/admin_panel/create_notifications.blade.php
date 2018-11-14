<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>N Studio Zumba</title>
<meta name="author" content="">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicons -->
<link rel="shortcut icon" href="{{ URL::asset('favicon/logo144x144.png') }}">
<link rel="apple-touch-icon" href="{{ URL::asset('favicon/logo_57x57.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('favicon/logo_72x72.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('favicon/logo114x114.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('favicon/logo144x144.png') }}">

<!--All Css Here-->

<!--Bootstrap Css-->
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<!--revolution slider-->
<link rel="stylesheet" href="{{ URL::asset('css/settings.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/navigation.css') }}">
<!--Font-Awesome Css-->
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
<!--flat-icon-->
<link rel="stylesheet" href="{{ URL::asset('css/flaticon.css') }}">
<!--Owl-Carousel Css-->
<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
<!--Animate Css-->
<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}">
<!--Animate Css-->
<link rel="stylesheet" href="{{ URL::asset('css/magnific-popup.css') }}">
<!--Jquery Ui Css-->
<link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}">
<!--Style Css-->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<!--Responsive Css-->
<link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
<!--Modernizr Css-->
<script src="{{ URL::asset('js/modernizr-2.8.3.min.js') }}"></script>

<!-- /.header start -->
<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home"><img src="{{ URL::asset('images/logo/nav_logo.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link " href="/home">
                            home<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/index/about">
                            about<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/dashboard/admin_gallery">
                            gallery<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/index/class_packages">
                            classes<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/index/schedule">
                            schedule<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/index/testimonials">
                            testimonials<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index/contact">contact</a>
                    </li>

                    {{--User name and logout button start--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{--User name and logout button end--}}

                </ul>
            </div>
        </div>
    </nav>
</header>
<!--header end-->

<br><br><br><br>

<div class="container">
    <!-- form for health tips notification-->
    <form method="POST" action="{{ url('admin/create_health_tips') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <h style="color: deeppink">Create Health Tips Notifications</h>
        <br>
        <div class="form-group row">
            <div class="col-md-6">
                <textarea id="healthtips" type="text"  class="form-control{{ $errors->has('healthtips') ? ' is-invalid' : '' }}" placeholder="Health Tips" name="healthtips" required autofocus>{{ old('healthtips') }}</textarea>
                <br>
                @if ($errors->has('healthtips'))
                    <span class="invalid-feedback" role="alert">
                        <strong>HealthTip Notification maximum length exceeded !</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" id="create1">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- forrm for general notifications -->
<div class="container">
    <form method="POST" action="{{ url('admin/create_general_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <h style="color: deeppink">Send General Notifications</h>
        <br>
        <div class="form-group row">
            <div class="col-md-6">
                <textarea id="general" type="text" class="form-control{{ $errors->has('general') ? ' is-invalid' : '' }}" placeholder="General Notifications" name="general" required>{{ old('general') }}</textarea>
                <br>
                @if ($errors->has('general'))
                    <span class="invalid-feedback" role="alert">
                        <strong>General Notification maximum length exceeded !</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" id="create1">
                        {{ __('Send') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- forrm for general notification post -->
<div class="container">
    <form method="POST" action="{{ url('admin/create_post') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <h style="color: deeppink">Create General News Post</h>
        <br>

        <div class="form-group row">
            <div class="col-md-6">
                <input  type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"  placeholder="Post Title"  value="{{ old('title') }}" required><br>
                <textarea id="post_body" type="text" class="form-control{{ $errors->has('post_body') ? ' is-invalid' : '' }}" placeholder="Post Body" name="post_body" required>{{ old('post_body') }}</textarea>
                <br>
                @if ($errors->has('post_body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('post_body') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" id="create1">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>
<!-- forrm for medical issues notifications -->






