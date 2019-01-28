@extends('layouts.login_app')

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
                <div class="card-body" style="margin-top: 130px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if (session('deactivated'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('deactivated') }}
                            </div>
                        @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" style="background-color: transparent;">
                        @csrf

                        <div class="form-group row pad30">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-dark">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row text-center">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn active btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
