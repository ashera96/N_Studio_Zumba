@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}"  aria-label="{{ __('Register') }}">
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


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"  placeholder="Enter name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                <!--       @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="At least 4 characters" name="username" value="{{ old('username') }}" required>
                                    <div id="message2">
                                        <p id="lengthofusername" class="invalid"><b>Username should be at least 4 characters</b></p>
                                    </div>
                                <!--  @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="test@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                    <div id="message3">
                                        <p id="emailformat" class="invalid"><b>Invalid email format</b></p>
                                    </div>
                                <!-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nic" class="col-md-4 col-form-label text-md-right">{{ __('NIC') }}</label>

                                <div class="col-md-6">
                                    <input id="nic" type="text" placeholder="123456789V" class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}" name="nic" value="{{ old('nic') }}" required autofocus>
                                    <div id="message4">
                                        <p id="nicformat" class="invalid"><b>Invalid & unacceptable NIC format</b></p>
                                    </div>
                                <!-- @if ($errors->has('nic'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nic') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date"  class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>
                                    <div id="message5">
                                        <p id="age" class="invalid"><b>Your age is not suitable for Zumba Fitness</b></p>
                                    </div>
                                <!--
                                @if ($errors->has('dob'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" placeholder="Enter address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>
                                <!--
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="contactno" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                                <div class="col-md-6">
                                    <input id="contactno" pattern="[0]{1}[0-9]{9}" minlength="10" type="text" class="form-control{{ $errors->has('contactno') ? ' is-invalid' : '' }}" name="contactno" placeholder="xxxxxxxxxx" value="{{ old('contactno') }}" required autofocus>
                                    <div id="message6">
                                        <p id="phonenum" class="invalid"><b>Invalid phone number</b></p>
                                    </div>
                                <!--
                                @if ($errors->has('contactno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contactno') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="medicissue" class="col-md-4 col-form-label text-md-right">{{ __('Medical Issues(If any)') }}</label>

                                <div class="col-md-6">
                                    <input id="medicissue" type="text" class="form-control{{ $errors->has('medicissue') ? ' is-invalid' : '' }}" placeholder="Enter any medical issues" name="medicissue" value="{{ old('medicissue') }}" >
                                <!--
                                @if ($errors->has('medicissue'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('medicissue') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" minlength="6"  placeholder="Atleast 6 characters" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <div id="message7">
                                        <p id="weak" class="invalid"><b>Password Strength: Weak</b></p>
                                    </div>
                                    <div id="message8">
                                        <p id="medium" class="invalid"><b>Password Strength: Medium</b></p>
                                    </div>
                                    <div id="message9">
                                        <p id="strong" class="invalid"><b>Password Strength: Strong</b></p>
                                    </div>
                                <!--
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">

                                    <input id="password-confirm" type="password" placeholder="Re-enter password" class="form-control" name="password_confirmation" required>
                                    <div id="message10">
                                        <p id="con" class="invalid"><b>Password mismatched !</b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="signup">
                                        {{ __('Register') }}
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

