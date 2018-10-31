@extends('layouts.login_app')

@section('content')
    <div class="container" style="margin-top: 70px">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="card shadow" style="background: rgba(0, 0, 0, 0.7); opacity: 0.8; position: absolute; top: 0; width: 100%;">

                    <div class="card-body">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <div class="container-fluid">
                                <div>
                                    <a class="navbar-brand" href="/index"><img src={{ URL::asset('images/logo_nav.png') }}  alt="N_Studio_Zumba_Logo" style="width: 100px; height: 100px;"></a>
                                </div>
                            </div>
                        </nav>
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right text-white">{{ __('Username Or Email') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-md-4 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label text-white" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn active btn-primary align-content-center">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <div class="form-group row mb-0 text-center" style="padding: 1px;">
                                <div class="col-md-4 offset-md-4">
                                    <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>

                            <hr style="border-color: #FFFFFF">
                            <div class="form-group row text-center">
                                {{--<label for="register" class="col-md-4 col-form-label">{{ __('Don\'t have an account?') }}</label>--}}
                                <div class="col-md-12 offset-md-0">
                                    <a class="btn btn-link text-white" href="{{ route('register') }}">
                                        <label for="register" class="col-form-label">{{ __('Don\'t have an account?') }}</label>
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
