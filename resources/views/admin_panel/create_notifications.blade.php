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
     <form method="POST" action="{{ url('admin/create_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
         {{csrf_field()}}

        <div class="form-group row">

            <h style="color: #ae003e">Create Health Tips Notifications</h>
            <br>
            <div class="col-md-6">
                <textarea id="healthtips" type="text"  class="form-control{{ $errors->has('healthtips') ? ' is-invalid' : '' }}" placeholder="Health Tips" name="healthtips" value="{{ old('healthtips') }}" required></textarea>
                <br>
                @if ($errors->has('healthtips'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('healthtips') }}</strong>
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

    <!-- forrm for general notifications -->

    <form method="POST" action="{{ route('register') }}"  aria-label="{{ __('Register') }}">
        <div class="form-group row">

            <h style="color: #ae003e">Send General Notifications</h>
            <br>
            <div class="col-md-6">
                <textarea id="post" type="text" class="form-control{{ $errors->has('post') ? ' is-invalid' : '' }}" placeholder="General Notifications" name="post" value="{{ old('post') }}" required></textarea>
                <br>
                @if ($errors->has('post'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('post') }}</strong>
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

    <!-- forrm for general notification e-mail -->
    <form method="POST" action="{{ route('register') }}"  aria-label="{{ __('Register') }}">
        <div class="form-group row">

            <h style="color: #ae003e">Send General Notification E-mail</h>
            <br>
            <div class="col-md-6">
                <textarea id="mail" type="text" class="form-control{{ $errors->has('mail') ? ' is-invalid' : '' }}" placeholder="General Notification Email" name="mail" value="{{ old('mail') }}" required></textarea>
                <br>
                @if ($errors->has('mail'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mail') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" id="create1">
                        {{ __('Send E-mail') }}
                    </button>
                </div>
            </div>

        </div>
    </form>

    <!-- forrm for medical issues notifications -->





