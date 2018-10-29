<link rel="shortcut icon" href="{{ URL::asset('favicon/logo144x144.png') }}">
<link rel="apple-touch-icon" href="{{ URL::asset('favicon/logo_57x57.png') }}">
<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('favicon/logo_72x72.png') }}">
<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('favicon/logo114x114.png') }}">
<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('favicon/logo144x144.png') }}">

<div class="container">
    <!-- form for health tips notification-->
     <form method="POST" action="{{ url('admin/create_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
         {{csrf_field()}}

        <div class="form-group row">

            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Create Health Tips Notifications') }}</label>
            <br>
            <div class="col-md-6">
                <textarea id="healthtips" type="text" class="form-control{{ $errors->has('healthtips') ? ' is-invalid' : '' }}" placeholder="Health Tips" name="healthtips" value="{{ old('healthtips') }}" required></textarea>
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

            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Send General Notifications') }}</label>
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
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Send Medical Issues Notifications') }}</label>


 </div>




