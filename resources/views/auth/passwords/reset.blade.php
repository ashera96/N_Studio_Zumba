@extends('layouts.login_app')

@section('styling')
    <script src="{{ asset('js/Pwresetvalidation.js') }}" defer></script>
    <link href="{{ asset('css/RealtimeValid.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-10">
            <div class="card shadow" style="">
                <div class="card-body" style="background-color: rgba(0,0,0,0.66); position: absolute; width: 100%;padding: 0;">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid justify-content-center">
                            <div>
                                <a class="navbar-brand" href="/index"><img src={{ URL::asset('images/logo_nav.png') }}  alt="N_Studio_Zumba_Logo" style="width: 100px; height: 100px;"></a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="card-body" style="background-color: #FFFFFF; margin-top: 130px;">
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="alert-danger">
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <ul>
                                        <li>{{ $error }}</li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row" style="margin-top: 30px;">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-dark">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                               <!-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <div id="message2">
                                    <p id="weak" class="invalid"><b>Password Strength: Weak</b></p>
                                </div>
                                <div id="message3">
                                    <p id="medium" class="invalid"><b>Password Strength: Medium</b></p>
                                </div>
                                <div id="message4">
                                    <p id="strong" class="invalid"><b>Password Strength: Strong</b></p>
                                </div>
                               <!-- @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom: 50px;">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <div id="message5">
                                    <p id="con" class="invalid"><b>Password mismatched !</b></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn active btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{--@extends('layouts.login_app')--}}

{{--@section('content')--}}
    {{--<div class="container" style="margin-top: 70px;">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-lg-6 col-md-10">--}}
                {{--<div class="card shadow" style="">--}}
                    {{--<div class="card-body" style="background-color: rgba(0,0,0,0.66); position: absolute; width: 100%;padding: 0;">--}}
                        {{--<nav class="navbar navbar-expand-lg navbar-dark">--}}
                            {{--<div class="container-fluid justify-content-center">--}}
                                {{--<div>--}}
                                    {{--<a class="navbar-brand" href="/index"><img src={{ URL::asset('images/logo_nav.png') }}  alt="N_Studio_Zumba_Logo" style="width: 100px; height: 100px;"></a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</nav>--}}
                    {{--</div>--}}
                    {{--<div class="card-body" style="background-color: #FFFFFF; margin-top: 130px;">--}}
                        {{--<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
                            {{--@csrf--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="email" class="col-sm-4 col-form-label text-md-right text-dark">{{ __('Username Or Email') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="username" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>--}}

                                    {{--@if ($errors->has('username'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('username') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}

                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<label for="password" class="col-md-4 col-form-label text-md-right text-dark">{{ __('Password') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row text-center">--}}
                                {{--<div class="col-md-4 offset-md-4">--}}
                                    {{--<div class="form-check">--}}
                                        {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                        {{--<label class="form-check-label text-dark" for="remember">--}}
                                            {{--{{ __('Remember Me') }}--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row text-center">--}}
                                {{--<div class="col-md-4 offset-md-4">--}}
                                    {{--<button type="submit" class="btn active btn-primary align-content-center">--}}
                                        {{--{{ __('Login') }}--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row mb-0 text-center" style="padding: 0;">--}}
                                {{--<div class="col-md-4 offset-md-4">--}}
                                    {{--<a class="btn btn-link text-dark" href="{{ route('password.request') }}">--}}
                                        {{--{{ __('Forgot Your Password?') }}--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<hr style="border-color: #343a40;opacity: 0.4;">--}}

                            {{--<div class="form-group row text-center">--}}
                                {{--<div class="col-md-12 offset-md-0">--}}
                                    {{--<a class="btn btn-link text-dark" style="margin-bottom: 0" href="{{ route('register') }}">--}}
                                        {{--<label for="register" class="col-form-label">{{ __('Don\'t have an account?') }}</label>--}}
                                        {{--{{ __('Register') }}--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

{{--@endsection--}}
