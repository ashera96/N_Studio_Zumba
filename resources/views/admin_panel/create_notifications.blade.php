<!doctype html>
<html lang="en">

<head>
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


    {{--<!--[if lt IE 9]>--}}
    {{--<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>--}}
    {{--<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}

</head>

<div class="container">
    <!-- form for health tips notification-->
     <form method="POST" action="{{ url('admin/create_health_tips') }}"  aria-label="{{ __('Create_Notifications') }}">
         {{csrf_field()}}
         <h style="color: #e0c99f">Create Health Tips Notifications</h>
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
        <h style="color: #e0c99f">Send General Notifications</h>
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
        <h style="color: #e0c99f">Create General News Post</h>
        <br>

        <div class="form-group row">
            <div class="col-md-6">
                <textarea id="post_body" type="text" class="form-control{{ $errors->has('post_body') ? ' is-invalid' : '' }}" placeholder="General News" name="post_body" value="{{ old('post_body') }}" required></textarea>
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



